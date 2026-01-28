<?php
// Set page specific variables
$page_title = 'Forts in Maharashtra - Alphabetical List | Trekshitz';
$meta_description = 'Complete list of 350+ forts in Maharashtra arranged alphabetically. Information about all forts in Sahyadri mountain range, maps and trekking guides.';
$meta_keywords = 'Maharashtra forts, Sahyadri forts, English forts, trekking, historical forts, Shivaji Maharaj forts';

require_once './config/database.php';
// Include header
include './includes/header.php';

function getDifficultyInEnglish($english) {
    return match (strtolower(trim($english))) {
        'easy' => 'Easy',
        'medium' => 'Medium',
        'hard', 'difficult' => 'Hard',
        'very hard', 'very difficult', 'extreme' => 'Extreme',
        default => 'Medium'
    };
}

// Slug generation
function slugify($string) {
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    $string = preg_replace('/\s+/u', '-', trim($string));
    return mb_strtolower($string) . '-fort';
}

// Connect to database
$db = new Database();
$conn = $db->getConnection();

$fortsData = [];
$totalForts = 0;
$districtCount = 0;
$fortTypeStats = [];

// Fetch comprehensive fort data from ei_tblfortinfo
$query = "SELECT FortID, FortName, Grade, FortType, FortDistrict, FortRange 
          FROM ei_tblfortinfo 
          WHERE FortName IS NOT NULL 
          ORDER BY FortName ASC";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $fortName = trim($row['FortName']);
        $slug = slugify($fortName);
        $difficulty = getDifficultyInEnglish($row['Grade'] ?? '');
        $fortType = $row['FortType'] ?? 'Hill Fort';
        $district = $row['FortDistrict'] ?? 'Maharashtra';
        $range = $row['FortRange'] ?? '';

        // Get the first character in English
        $firstLetter = strtoupper(mb_substr($fortName, 0, 1, "UTF-8"));

        // Grouping under the first letter
        $fortsData[$firstLetter][] = [
            'id' => $row['FortID'],
            'name' => $fortName,
            'slug' => $slug,
            'difficulty' => $difficulty,
            'type' => $fortType,
            'district' => $district,
            'range' => $range
        ];
        
        $totalForts++;
        
        // Count fort types for stats
        if (!isset($fortTypeStats[$fortType])) {
            $fortTypeStats[$fortType] = 0;
        }
        $fortTypeStats[$fortType]++;
    }
}

// Sort alphabetically
ksort($fortsData);

// Get unique districts count
$districtQuery = "SELECT COUNT(DISTINCT FortDistrict) as count FROM ei_tblfortinfo WHERE FortDistrict IS NOT NULL";
$districtResult = $conn->query($districtQuery);
if ($districtRow = $districtResult->fetch_assoc()) {
    $districtCount = $districtRow['count'];
}

// Get current filter from URL parameter
$currentFilter = isset($_GET['letter']) ? strtoupper($_GET['letter']) : 'A';

// If current filter doesn't exist in data, get first available letter
if (!isset($fortsData[$currentFilter]) && count($fortsData) > 0) {
    $currentFilter = array_key_first($fortsData);
}
?>

<style>
/* Enhanced Fort-specific styles */
.fort-card {
    background: white;
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.dark .fort-card {
    background: #1f2937;
    border-color: #374151;
}

.fort-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: var(--accent-color);
}

.difficulty-badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 1rem;
    font-weight: 600;
}

.difficulty-easy { background-color: #10b981; color: white; }
.difficulty-medium { background-color: #f59e0b; color: white; }
.difficulty-hard { background-color: #ef4444; color: white; }
.difficulty-extreme { background-color: #8b5cf6; color: white; }

.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.alphabet-btn {
    padding: 0.5rem 1rem;
    border: 2px solid var(--primary-color);
    background: transparent;
    color: var(--primary-color);
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 1.1rem;
    min-width: 45px;
    text-align: center;
}

.alphabet-btn:hover,
.alphabet-btn.active {
    background: var(--primary-color);
    color: white;
    transform: scale(1.05);
}

.search-filter-card {
    background: white;
    border: 1px solid #e5e7eb;
}

.dark .search-filter-card {
    background: #1f2937;
    border-color: #374151;
}

@media (max-width: 768px) {
    .alphabet-filter {
        gap: 0.25rem;
    }
    
    .alphabet-btn {
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        min-width: 40px;
    }
}
</style>

<main id="main-content" class="">
    <!-- Hero Section with Breadcrumb Navigation -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort-pattern\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"10,2 18,10 10,18 2,10\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Forts in <span class="text-accent">Maharashtra</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Complete information about <?php echo $totalForts; ?>+ forts in Sahyadri mountain range
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Alphabetically organized list of all forts with detailed information
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="text-accent font-semibold">Alphabetical</span>
                    <span>•</span>
                    <a href="./fort_by_range_english.php" class="hover:text-accent transition-colors">By Mountain Range</a>
                    <span>•</span>
                    <a href="./fort_by_district_english.php" class="hover:text-accent transition-colors">By District</a>
                    <span>•</span>
                    <a href="./fort-by-category-english.php" class="hover:text-accent transition-colors">By Type</a>
                    <span>•</span>
                    <a href="./fort_by_grade_english.php" class="hover:text-accent transition-colors">By Difficulty</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $totalForts; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $districtCount; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Districts</div>
                </div>
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($fortsData); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Letters</div>
                </div>
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Years of History</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Search and Filter Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <!-- Search Filter Card -->
            <div class="search-filter-card rounded-2xl p-6 shadow-xl mb-8">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2"></i>Search Fort Name
                        </label>
                        <input 
                            type="text" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white" 
                            placeholder="Type fort name..." 
                            id="fortSearch"
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-filter mr-2"></i>Select Difficulty
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Difficulties</option>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                            <option value="Extreme">Extreme</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Clear
                    </button>
                </div>
            </div>

            <!-- Alphabet Filter -->
            <div class="alphabet-filter">
                <?php 
                $english_letters = range('A', 'Z');
                foreach($english_letters as $letter): 
                    $hasForts = isset($fortsData[$letter]);
                    $count = $hasForts ? count($fortsData[$letter]) : 0;
                ?>
                    <?php if ($hasForts): ?>
                        <a href="?letter=<?php echo urlencode($letter); ?>" 
                           class="alphabet-btn <?php echo ($currentFilter === $letter) ? 'active' : ''; ?>"
                           title="<?php echo $count; ?> forts">
                            <?php echo $letter; ?>
                        </a>
                    <?php else: ?>
                        <span class="alphabet-btn opacity-30 cursor-not-allowed" 
                              title="No forts available">
                            <?php echo $letter; ?>
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Forts Listing Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <?php if(isset($fortsData[$currentFilter])): ?>
                <div class="mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-center mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            Forts Starting with '<?php echo $currentFilter; ?>'
                        </span>
                    </h2>
                    <p class="text-center text-gray-600 dark:text-gray-300 text-lg">
                        <span id="visibleCount"><?php echo count($fortsData[$currentFilter]); ?></span> forts found
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="fortsGrid">
                    <?php foreach($fortsData[$currentFilter] as $fort): ?>
                        <div class="fort-card rounded-2xl p-6 shadow-xl searchable-fort" 
                             data-name="<?php echo htmlspecialchars($fort['name']); ?>"
                             data-difficulty="<?php echo htmlspecialchars($fort['difficulty']); ?>"
                             data-district="<?php echo htmlspecialchars($fort['district']); ?>">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                                    <?php echo htmlspecialchars($fort['name']); ?>
                                </h3>
                                <?php
                                $difficultyClass = 'difficulty-medium';
                                switch($fort['difficulty']) {
                                    case 'Easy': $difficultyClass = 'difficulty-easy'; break;
                                    case 'Hard': $difficultyClass = 'difficulty-hard'; break;
                                    case 'Extreme': $difficultyClass = 'difficulty-extreme'; break;
                                }
                                ?>
                                <span class="difficulty-badge <?php echo $difficultyClass; ?>">
                                    <?php echo $fort['difficulty']; ?>
                                </span>
                            </div>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <i class="fas fa-mountain text-accent mr-3 w-4"></i>
                                    <span><?php echo htmlspecialchars($fort['type']); ?></span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <i class="fas fa-map-marker-alt text-accent mr-3 w-4"></i>
                                    <span><?php echo htmlspecialchars($fort['district']); ?></span>
                                </div>
                                <?php if (!empty($fort['range']) && strtolower($fort['range']) != 'none'): ?>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <i class="fas fa-mountain text-accent mr-3 w-4"></i>
                                    <span><?php echo htmlspecialchars($fort['range']); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="./fort/index.php?slug=<?php echo $fort['slug']; ?>" 
                                   class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Details
                                </a>
                                <a href="./trek/index.php?slug=<?php echo $fort['slug']; ?>" 
                                   class="flex-1 bg-accent hover:bg-primary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                    <i class="fas fa-route mr-1"></i>
                                    Trek
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- No Results Message (Initially Hidden) -->
                <div id="noResults" class="text-center py-20 hidden">
                    <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        No Forts Found
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        Please try different filters or search terms
                    </p>
                </div>
            <?php else: ?>
                <div class="text-center py-20">
                    <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        No Forts Found for This Letter
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        Please select a different letter from the alphabet
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Additional Information Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        More About the Forts
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Chhatrapati Shivaji Maharaj</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center">
                            Forts built and conquered by the great Maratha warrior king Shivaji Maharaj, showcasing the rich heritage of Maharashtra.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-hiking text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Trekking Guidance</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-center">
                            Complete trekking guidance and safety instructions for each fort to ensure a safe and enjoyable adventure.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        Join Our Community
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Connect with us for regular treks, workshops, and latest information about forts
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/trek-schedule" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-calendar mr-2"></i>
                            Upcoming Treks
                        </a>
                        <a href="#newsletter" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-envelope mr-2"></i>
                            Subscribe Newsletter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Navigation -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                    Explore by Other Categories
                </span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/english/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-secondary transition-colors">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Mountain Range
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Sahyadri, Western Ghats, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-district" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By District
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Pune, Mumbai, Nashik, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-category" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Type
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Hill forts, Sea forts, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-grade" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-signal text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Difficulty
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Easy, Medium, Hard, etc.
                    </p>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search and filter functionality
    const searchInput = document.getElementById('fortSearch');
    const difficultyFilter = document.getElementById('difficultyFilter');
    const fortCards = document.querySelectorAll('.searchable-fort');
    const fortsGrid = document.getElementById('fortsGrid');
    const noResults = document.getElementById('noResults');
    const visibleCount = document.getElementById('visibleCount');
    
    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedDifficulty = difficultyFilter.value.toLowerCase().trim();
        
        let visibleFortsCount = 0;
        
        fortCards.forEach(function(card) {
            const fortName = card.dataset.name.toLowerCase();
            const difficulty = card.dataset.difficulty.toLowerCase();
            
            // Check search match
            const searchMatch = searchTerm === '' || fortName.includes(searchTerm);
            
            // Check difficulty match
            const difficultyMatch = selectedDifficulty === '' || difficulty === selectedDifficulty;
            
            // Show/hide card based on both filters
            if (searchMatch && difficultyMatch) {
                card.style.display = 'block';
                card.classList.remove('hidden');
                visibleFortsCount++;
            } else {
                card.style.display = 'none';
                card.classList.add('hidden');
            }
        });
        
        // Update visible count
        if (visibleCount) {
            visibleCount.textContent = visibleFortsCount;
        }
        
        // Show/hide no results message
        if (visibleFortsCount === 0) {
            if (fortsGrid) fortsGrid.style.display = 'none';
            if (noResults) noResults.classList.remove('hidden');
        } else {
            if (fortsGrid) fortsGrid.style.display = 'grid';
            if (noResults) noResults.classList.add('hidden');
        }
    }
    
    // Event listeners for filters
    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }
    
    if (difficultyFilter) {
        difficultyFilter.addEventListener('change', applyFilters);
    }
    
    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (difficultyFilter) difficultyFilter.value = '';
        applyFilters();
    };
    
    // Number animation for stats
    const animateNumbers = () => {
        const numbers = document.querySelectorAll('.animate-number');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.target);
                    animateNumber(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        numbers.forEach(number => observer.observe(number));
    };
    
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 30);
    }
    
    // Initialize animations
    animateNumbers();
    
    // Add loading animation to cards
    const fortCardsAnimation = document.querySelectorAll('.fort-card');
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-fade-in-up');
                }, index * 50);
                cardObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });
    
    fortCardsAnimation.forEach(card => {
        cardObserver.observe(card);
    });
    
    // Enhanced search with autocomplete suggestions
    const searchContainer = searchInput.parentElement.parentElement;
    let suggestionsContainer;
    
    if (searchInput && fortCards.length > 0) {
        // Create suggestions container
        suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'absolute top-full left-0 right-0 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg mt-2 shadow-xl z-50 max-h-60 overflow-y-auto hidden';
        searchContainer.style.position = 'relative';
        searchContainer.appendChild(suggestionsContainer);
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            if (searchTerm.length >= 2) {
                const matches = Array.from(fortCards)
                    .map(card => ({
                        name: card.dataset.name,
                        difficulty: card.dataset.difficulty,
                        district: card.dataset.district
                    }))
                    .filter(fort => fort.name.toLowerCase().includes(searchTerm))
                    .slice(0, 8);
                
                if (matches.length > 0) {
                    showSuggestions(matches, searchTerm);
                } else {
                    hideSuggestions();
                }
            } else {
                hideSuggestions();
            }
        });
        
        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchContainer.contains(e.target)) {
                hideSuggestions();
            }
        });
    }
    
    function showSuggestions(matches, searchTerm) {
        suggestionsContainer.innerHTML = matches.map(fort => {
            const highlighted = fort.name.replace(
                new RegExp(`(${searchTerm})`, 'gi'), 
                '<mark class="bg-yellow-200 dark:bg-yellow-600">$1</mark>'
            );
            
            // Difficulty color
            let difficultyColor = 'bg-yellow-100 text-yellow-800';
            if (fort.difficulty === 'Easy') {
                difficultyColor = 'bg-green-100 text-green-800';
            } else if (fort.difficulty === 'Hard') {
                difficultyColor = 'bg-orange-100 text-orange-800';
            } else if (fort.difficulty === 'Extreme') {
                difficultyColor = 'bg-red-100 text-red-800';
            }
            
            return `
                <div class="suggestion-item px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0 transition-colors" 
                     data-name="${fort.name}">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center flex-1">
                            <i class="fas fa-fort-awesome text-accent mr-2"></i>
                            <div>
                                <div class="font-semibold">${highlighted}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <i class="fas fa-map-marker-alt mr-1"></i>${fort.district}
                                </div>
                            </div>
                        </div>
                        <span class="text-xs px-2 py-1 rounded ${difficultyColor} ml-2">
                            ${fort.difficulty}
                        </span>
                    </div>
                </div>
            `;
        }).join('');
        
        suggestionsContainer.classList.remove('hidden');
        
        // Add click handlers to suggestions
        suggestionsContainer.querySelectorAll('.suggestion-item').forEach(item => {
            item.addEventListener('click', function() {
                const selectedName = this.dataset.name;
                searchInput.value = selectedName;
                applyFilters();
                hideSuggestions();
                
                // Scroll to the selected fort card
                const targetCard = Array.from(fortCards).find(card => card.dataset.name === selectedName);
                if (targetCard && !targetCard.classList.contains('hidden')) {
                    targetCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    targetCard.style.border = '2px solid var(--accent-color)';
                    setTimeout(() => {
                        targetCard.style.border = '';
                    }, 3000);
                }
            });
        });
    }
    
    function hideSuggestions() {
        if (suggestionsContainer) {
            suggestionsContainer.classList.add('hidden');
        }
    }
    
    // Keyboard navigation for search
    searchInput.addEventListener('keydown', function(e) {
        const suggestions = suggestionsContainer?.querySelectorAll('.suggestion-item');
        if (!suggestions || suggestions.length === 0) return;
        
        let currentIndex = Array.from(suggestions).findIndex(item => item.classList.contains('highlighted'));
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                if (currentIndex < suggestions.length - 1) {
                    if (currentIndex >= 0) suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[currentIndex + 1].classList.add('highlighted');
                } else if (suggestions.length > 0) {
                    if (currentIndex >= 0) suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[0].classList.add('highlighted');
                }
                break;
                
            case 'ArrowUp':
                e.preventDefault();
                if (currentIndex > 0) {
                    suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[currentIndex - 1].classList.add('highlighted');
                } else if (suggestions.length > 0) {
                    if (currentIndex >= 0) suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[suggestions.length - 1].classList.add('highlighted');
                }
                break;
                
            case 'Enter':
                e.preventDefault();
                if (currentIndex >= 0 && suggestions[currentIndex]) {
                    suggestions[currentIndex].click();
                }
                break;
                
            case 'Escape':
                hideSuggestions();
                break;
        }
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = 80;
                const targetPosition = target.offsetTop - headerHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    console.log('Forts in Maharashtra (English - Enhanced) page loaded successfully');
});

// Add CSS for animations and enhancements
const style = document.createElement('style');
style.textContent = `
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .suggestion-item.highlighted {
        background-color: var(--accent-color) !important;
        color: white !important;
    }
    
    .suggestion-item.highlighted mark {
        background-color: rgba(255, 255, 255, 0.3);
        color: white;
    }
    
    .suggestion-item mark {
        background-color: rgba(255, 255, 0, 0.3);
        color: inherit;
        padding: 0;
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
    
    /* Smooth transitions for filter changes */
    .searchable-fort {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    
    .searchable-fort.hidden {
        opacity: 0;
        transform: scale(0.95);
    }
    
    /* Enhanced alphabet buttons */
    .alphabet-btn.opacity-30 {
        background-color: #f3f4f6;
        border-color: #d1d5db;
    }
    
    .dark .alphabet-btn.opacity-30 {
        background-color: #374151;
        border-color: #4b5563;
    }
`;
document.head.appendChild(style);
</script>