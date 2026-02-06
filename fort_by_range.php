<?php
// Set page specific variables
$page_title = 'Forts by Mountain Range - Sahyadri Mountains | Trekshitz';
$meta_description = 'Complete list of forts in Sahyadri, Ajanta, Satmala and other mountain ranges. Forts in Maharashtra organized by mountain ranges with detailed information.';
$meta_keywords = 'Sahyadri forts, mountain ranges, Ajanta range, Satmala, Western Ghats, Maharashtra mountains';

require_once './config/database.php';
// Include header
include './includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Function to get region/district info for a range
function getRegionForRange($forts, $conn) {
    if (empty($forts)) return 'Unknown';
    
    // Get districts for this range's forts
    $fortNames = "'" . implode("','", array_map(function($fort) use ($conn) {
        return $conn->real_escape_string($fort);
    }, $forts)) . "'";
    
    $query = "SELECT DISTINCT FortDistrict FROM EI_tblFortInfo WHERE FortName IN ($fortNames) AND FortDistrict IS NOT NULL AND FortDistrict != ''";
    $result = $conn->query($query);
    
    $districts = [];
    while ($row = $result->fetch_assoc()) {
        if (!empty(trim($row['FortDistrict']))) {
            $districts[] = trim($row['FortDistrict']);
        }
    }
    
    return empty($districts) ? 'Maharashtra' : implode(', ', array_unique($districts));
}

// Function to generate description for a range
function generateRangeDescription($rangeName, $fortCount) {
    $descriptions = [
        'Sahyadri' => 'The main Western Ghats range, home to most of Shivaji Maharaj\'s forts',
        'Ajanta Satmala' => 'Extensive mountain range in North Maharashtra with historic significance',
        'Ratnagiri' => 'Coastal range in Konkan region with scenic forts',
        'Konkan' => 'Beautiful coastal mountain range with Arabian Sea views',
        'default' => "Mountain range with $fortCount historic forts offering excellent trekking opportunities"
    ];
    
    // Check if range name contains any key words
    foreach ($descriptions as $key => $desc) {
        if ($key !== 'default' && stripos($rangeName, $key) !== false) {
            return $desc;
        }
    }
    
    return $descriptions['default'];
}

// Function to get color class for range
function getRangeColor($index) {
    $colors = [
        'bg-red-100 dark:bg-red-900',
        'bg-blue-100 dark:bg-blue-900', 
        'bg-green-100 dark:bg-green-900',
        'bg-yellow-100 dark:bg-yellow-900',
        'bg-purple-100 dark:bg-purple-900',
        'bg-indigo-100 dark:bg-indigo-900',
        'bg-pink-100 dark:bg-pink-900',
        'bg-teal-100 dark:bg-teal-900',
        'bg-orange-100 dark:bg-orange-900',
        'bg-cyan-100 dark:bg-cyan-900'
    ];
    
    return $colors[$index % count($colors)];
}

// Build mountain ranges array from database
$mountainRanges = [];

// Query to get all ranges and their forts
$query = "SELECT FortRange, FortName, FortDistrict 
          FROM EI_tblFortInfo 
          WHERE FortRange IS NOT NULL 
          AND FortRange != '' 
          AND FortRange != 'N/A'
          AND FortName IS NOT NULL 
          ORDER BY FortRange, FortName";

$result = $conn->query($query);

// Group forts by range
$rangeData = [];
while ($row = $result->fetch_assoc()) {
    $range = trim($row['FortRange']);
    $fortName = trim($row['FortName']);
    
    if (!empty($range) && !empty($fortName)) {
        if (!isset($rangeData[$range])) {
            $rangeData[$range] = [];
        }
        $rangeData[$range][] = $fortName;
    }
}

// Convert to the expected format
$colorIndex = 0;
foreach ($rangeData as $rangeName => $forts) {
    // Clean range name and create key
    $rangeKey = str_replace(' ', '_', $rangeName);
    
    $mountainRanges[$rangeKey] = [
        'name' => $rangeName,
        'description' => generateRangeDescription($rangeName, count($forts)),
        'forts' => $forts,
        'color' => getRangeColor($colorIndex),
        'region' => getRegionForRange($forts, $conn)
    ];
    
    $colorIndex++;
}

// Get current range from URL parameter
$currentRange = isset($_GET['range']) ? $_GET['range'] : '';
$selectedRange = $currentRange && isset($mountainRanges[$currentRange]) ? $mountainRanges[$currentRange] : null;
?>

<main id="main-content" class="">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"mountain-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"15,2 25,18 5,18\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23mountain-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Forts by <span class="text-accent">Mountain Range</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Complete information about forts in various mountain ranges of Maharashtra
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Historical forts in Sahyadri, Ajanta, Satmala and other mountain ranges
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="./fort_information.php" class="hover:text-accent transition-colors">Alphabetical</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">By Mountain Range</span>
                    <span>•</span>
                    <a href="./fort_by_district.php" class="hover:text-accent transition-colors">By District</a>
                    <span>•</span>
                    <a href="./fort_by_category.php" class="hover:text-accent transition-colors">By Type</a>
                    <span>•</span>
                    <a href="./fort_by_grade.php" class="hover:text-accent transition-colors">By Difficulty</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($mountainRanges); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Mountain Ranges</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo array_sum(array_map(function($range) { return count($range['forts']); }, $mountainRanges)); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count(array_unique(array_column($mountainRanges, 'region'))); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Regions</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Years of History</div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedRange): ?>
        <!-- Selected Range Details -->
        <section class="py-20 bg-gradient-to-r from-primary to-secondary text-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-8">
                        <div class="mb-6">
                            <a href="?range=" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Back
                            </a>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold mb-4"><?php echo $selectedRange['name']; ?> Range</h2>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedRange['description']; ?></p>
                        <div class="flex flex-wrap justify-center gap-3">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedRange['forts']); ?> Forts
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo $selectedRange['region']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">
                        Forts in This Mountain Range
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedRange['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <span class="inline-block bg-primary text-white px-2 py-1 rounded text-xs">
                                        <i class="fas fa-mountain mr-1"></i>
                                        <?php echo $selectedRange['name']; ?>
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-hiking mr-1"></i>
                                        Trekking Available
                                    </span>
                                    
                                    <a href="./fort/index.php?slug=<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="bg-accent hover:bg-primary text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 text-sm group">
                                        View Details
                                        <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Search and Filter Section -->
        <section class="py-16 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4">
                <!-- Search and Filter Controls - Match Original Layout -->
                <div class="max-w-6xl mx-auto mb-12">
                    <div class="flex flex-col md:flex-row gap-4 items-end justify-center">
                        <!-- Search Mountain Range -->
                        <div class="w-full md:w-80">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-search mr-2"></i>Search Mountain Range
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="rangeSearch" 
                                    placeholder="Type to search ranges..." 
                                    class="w-full px-4 py-3 pl-10 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                                >
                                <i class="fas fa-search absolute left-3 top-4 text-gray-400 text-sm"></i>
                            </div>
                        </div>

                        <!-- District Filter -->
                        <div class="w-full md:w-64">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-map-marker-alt mr-2"></i>Select District
                            </label>
                            <select 
                                id="districtFilter" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                            >
                                <option value="">All Districts</option>
                                <?php 
                                // Get unique districts from all ranges
                                $allDistricts = [];
                                foreach($mountainRanges as $range) {
                                    $districts = explode(', ', $range['region']);
                                    foreach($districts as $district) {
                                        $district = trim($district);
                                        if (!empty($district) && !in_array($district, $allDistricts)) {
                                            $allDistricts[] = $district;
                                        }
                                    }
                                }
                                sort($allDistricts);
                                foreach($allDistricts as $district): 
                                ?>
                                    <option value="<?php echo htmlspecialchars($district); ?>"><?php echo htmlspecialchars($district); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Clear Button -->
                        <div class="w-full md:w-32">
                            <button 
                                id="clearFilters" 
                                class="w-full bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 flex items-center justify-center mt-6 md:mt-0"
                            >
                                <i class="fas fa-times mr-2"></i>Clear
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-white mb-4">
                        Mountain Ranges
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Complete information about forts in each mountain range
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="rangeGrid">
                    <?php foreach($mountainRanges as $key => $range): ?>
                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 searchable-range" 
                             data-name="<?php echo $range['name']; ?>"
                             data-region="<?php echo $range['region']; ?>">
                            
                            <div class="p-6 flex flex-col h-full">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $range['name']; ?>
                                    </h3>
                                    <i class="fas fa-mountain text-2xl text-accent"></i>
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                    <?php echo $range['description']; ?>
                                </p>
                                
                                <div class="mb-4">
                                    <div class="flex items-center justify-between text-sm mb-3">
                                        <span class="bg-gradient-to-r from-forest to-mountain text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            <?php echo $range['region']; ?>
                                        </span>
                                        <span class="bg-accent text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            <?php echo count($range['forts']); ?> Forts
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        Forts in this range:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach(array_slice($range['forts'], 0, 8) as $fort): ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-lg text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer" title="<?php echo $fort; ?> - Click for more details">
                                                <?php echo $fort; ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (count($range['forts']) > 8): ?>
                                            <span class="bg-accent text-white px-2 py-1 rounded-lg text-xs">
                                                +<?php echo count($range['forts']) - 8; ?> more
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center mt-auto">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-hiking mr-1"></i>
                                        Trekking Available
                                    </span>
                                    
                                    <a href="?range=<?php echo urlencode($key); ?>" 
                                       class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 text-sm group">
                                        View Details
                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="text-center py-20 hidden">
                    <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-400 mb-4">No ranges found</h3>
                    <p class="text-gray-500 dark:text-gray-500">Try adjusting your search terms</p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php include './our_more_about_fort_info.php'; ?>
</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript for Search and Interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get filter elements
    const searchInput = document.getElementById('rangeSearch');
    const districtFilter = document.getElementById('districtFilter');
    const clearButton = document.getElementById('clearFilters');
    const rangeCards = document.querySelectorAll('.searchable-range');
    const noResults = document.getElementById('noResults');
    const rangeGrid = document.getElementById('rangeGrid');
    
    // Filter function
    function filterRanges() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const selectedDistrict = districtFilter ? districtFilter.value.toLowerCase().trim() : '';
        let visibleCount = 0;
        
        rangeCards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const region = card.dataset.region.toLowerCase();
            
            // Check search term match
            const searchMatch = searchTerm === '' || 
                               name.includes(searchTerm) || 
                               region.includes(searchTerm);
            
            // Check district filter match
            const districtMatch = selectedDistrict === '' || 
                                region.includes(selectedDistrict);
            
            const isVisible = searchMatch && districtMatch;
            
            card.style.display = isVisible ? 'block' : 'none';
            if (isVisible) visibleCount++;
        });
        
        // Show/hide no results message
        if (visibleCount === 0 && (searchTerm.length > 0 || selectedDistrict.length > 0)) {
            noResults.classList.remove('hidden');
            rangeGrid.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            rangeGrid.classList.remove('hidden');
        }
        
        // Update URL parameters (optional)
        updateUrlParams(searchTerm, selectedDistrict);
    }
    
    // Update URL parameters
    function updateUrlParams(search, district) {
        const url = new URL(window.location);
        
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        
        if (district) {
            url.searchParams.set('district', district);
        } else {
            url.searchParams.delete('district');
        }
        
        // Update URL without page reload
        window.history.replaceState({}, '', url);
    }
    
    // Load filters from URL parameters
    function loadFiltersFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        const districtParam = urlParams.get('district');
        
        if (searchParam && searchInput) {
            searchInput.value = searchParam;
        }
        
        if (districtParam && districtFilter) {
            districtFilter.value = districtParam;
        }
        
        // Apply filters
        if (searchParam || districtParam) {
            filterRanges();
        }
    }
    
    // Clear all filters
    function clearAllFilters() {
        if (searchInput) searchInput.value = '';
        if (districtFilter) districtFilter.value = '';
        
        // Show all cards
        rangeCards.forEach(card => {
            card.style.display = 'block';
        });
        
        noResults.classList.add('hidden');
        rangeGrid.classList.remove('hidden');
        
        // Clear URL parameters
        const url = new URL(window.location);
        url.searchParams.delete('search');
        url.searchParams.delete('district');
        window.history.replaceState({}, '', url);
    }
    
    // Event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterRanges);
    }
    
    if (districtFilter) {
        districtFilter.addEventListener('change', filterRanges);
    }
    
    if (clearButton) {
        clearButton.addEventListener('click', clearAllFilters);
    }
    
    // Initialize filters from URL
    loadFiltersFromUrl();
    
    // Animate counters
    function animateCounters() {
        const counters = document.querySelectorAll('.animate-number');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateNumber(counter, target);
        });
    }
    
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 25);
    }
    
    // Initialize animations
    animateCounters();
    
    // Enhanced search with suggestions (optional)
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.placeholder = 'Type to search ranges...';
        });
        
        searchInput.addEventListener('blur', function() {
            this.placeholder = 'Search Mountain Range';
        });
    }
    
    console.log('Forts by Range (Database-driven with filters) loaded successfully');
    console.log(`Total ranges: ${rangeCards.length}`);
});
</script>

<style>
.card {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.animate-number {
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .grid.md\\:grid-cols-2.xl\\:grid-cols-3 {
        grid-template-columns: 1fr;
    }
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--secondary-color);
}
</style>