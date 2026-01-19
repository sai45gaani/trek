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
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string); // Remove punctuation
    $string = preg_replace('/\s+/u', '-', trim($string));      // Replace spaces with hyphens
    return mb_strtolower($string) . '-fort';                    // Convert to lowercase and add '-fort'
}

// Connect to database
$db = new Database();
$conn = $db->getConnection();

$fortsData = [];

 // Fetch FortName and Grade from database
    $query = "SELECT FortName, Grade FROM ei_tblfortinfo WHERE FortName IS NOT NULL ORDER BY FortName ASC";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $fortName = trim($row['FortName']);
        $slug = slugify($fortName);
        $difficulty = getDifficultyInEnglish($row['Grade'] ?? '');

        // Get the first character in English safely
        $firstLetter = strtoupper(mb_substr($fortName, 0, 1, "UTF-8"));

        // Grouping under the first letter
        $fortsData[$firstLetter][] = [
            'name' => $fortName,
            'slug' => $slug,
            'difficulty' => $difficulty
        ];
    }

// Get current filter from URL parameter
$currentFilter = isset($_GET['letter']) ? strtoupper($_GET['letter']) : 'A';
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
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
                    Complete information about 350+ forts in Sahyadri mountain range
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Alphabetically organized list of all forts with detailed information
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="15">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Districts</div>
                </div>
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="5">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Mountain Ranges</div>
                </div>
                <div class="transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Years of History</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <!-- Search Bar -->
            <div class="relative max-w-500px mx-auto mb-8">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input 
                    type="text" 
                    class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-full focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-300" 
                    placeholder="Search fort name..." 
                    id="fortSearch"
                    autocomplete="off"
                >
            </div>

            <!-- Alphabet Filter -->
            <div class="flex flex-wrap justify-center gap-2 mb-8">
                <?php 
                $english_letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                foreach($english_letters as $letter): 
                ?>
                    <a href="?letter=<?php echo urlencode($letter); ?>" 
                       class="px-4 py-2 border-2 border-primary rounded-lg font-semibold transition-all duration-300 hover:bg-primary hover:text-white <?php echo ($currentFilter === $letter) ? 'bg-primary text-white' : 'text-primary bg-transparent'; ?>">
                        <?php echo $letter; ?>
                    </a>
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
                        <?php echo count($fortsData[$currentFilter]); ?> forts found
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="fortsGrid">
                    <?php foreach($fortsData[$currentFilter] as $fort): ?>
                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 searchable-fort" 
                             data-name="<?php echo htmlspecialchars($fort['name']); ?>">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                                    <?php echo htmlspecialchars($fort['name']); ?>
                                </h3>
                                <?php
                                $difficultyClass = 'bg-yellow-500';
                                switch($fort['difficulty']) {
                                    case 'Easy': $difficultyClass = 'bg-green-500'; break;
                                    case 'Hard': $difficultyClass = 'bg-orange-500'; break;
                                    case 'Extreme': $difficultyClass = 'bg-red-500'; break;
                                }
                                ?>
                                <span class="px-3 py-1 text-xs font-bold text-white rounded-full <?php echo $difficultyClass; ?>">
                                    <?php echo $fort['difficulty']; ?>
                                </span>
                            </div>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <i class="fas fa-mountain text-accent mr-3 w-4"></i>
                                    <span>Hill Fort</span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                    <i class="fas fa-map-marker-alt text-accent mr-3 w-4"></i>
                                    <span>Maharashtra</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="/fort/<?php echo $fort['slug']; ?>" 
                                   class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Details
                                </a>
                                <a href="/trek/<?php echo $fort['slug']; ?>" 
                                   class="flex-1 bg-accent hover:bg-primary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                    <i class="fas fa-route mr-1"></i>
                                    Trek
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        More About the Forts
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Chhatrapati Shivaji Maharaj</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Forts built and conquered by the great Maratha warrior king Shivaji Maharaj, showcasing the rich heritage of Maharashtra.
                        </p>
                    </div>
                    
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-hiking text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Trekking Guidance</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Complete trekking guidance and safety instructions for each fort to ensure a safe and enjoyable adventure.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl">
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
                <a href="/english/forts-by-range" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
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
                
                <a href="/english/forts-by-district" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
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
                
                <a href="/english/forts-by-category" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
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
                
                <a href="/english/forts-by-grade" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
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
    // Search functionality
    const searchInput = document.getElementById('fortSearch');
    const fortCards = document.querySelectorAll('.searchable-fort');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            fortCards.forEach(function(card) {
                const fortName = card.dataset.name.toLowerCase();
                if (fortName.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.classList.remove('hidden');
                } else {
                    card.style.display = 'none';
                    card.classList.add('hidden');
                }
            });
            
            // Update results count
            const visibleCards = Array.from(fortCards).filter(card => !card.classList.contains('hidden'));
            updateResultsCount(visibleCards.length);
        });
    }
    
    function updateResultsCount(count) {
        // Update the count display if you have one
        console.log(`Showing ${count} forts`);
    }
    
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
    const fortCardsAnimation = document.querySelectorAll('.card');
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-fade-in-up');
                }, index * 100);
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
    const searchContainer = searchInput.parentElement;
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
                    .map(card => card.dataset.name)
                    .filter(name => name.toLowerCase().includes(searchTerm))
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
        suggestionsContainer.innerHTML = matches.map(name => {
            const highlighted = name.replace(new RegExp(`(${searchTerm})`, 'gi'), '<mark class="bg-yellow-200 dark:bg-yellow-600">$1</mark>');
            return `
                <div class="suggestion-item px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0 transition-colors" data-name="${name}">
                    <i class="fas fa-fort-awesome text-accent mr-2"></i>
                    ${highlighted}
                </div>
            `;
        }).join('');
        
        suggestionsContainer.classList.remove('hidden');
        
        // Add click handlers to suggestions
        suggestionsContainer.querySelectorAll('.suggestion-item').forEach(item => {
            item.addEventListener('click', function() {
                const selectedName = this.dataset.name;
                searchInput.value = selectedName;
                searchInput.dispatchEvent(new Event('input'));
                hideSuggestions();
                
                // Scroll to the selected fort card
                const targetCard = Array.from(fortCards).find(card => card.dataset.name === selectedName);
                if (targetCard) {
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
        const suggestions = suggestionsContainer.querySelectorAll('.suggestion-item');
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
    
    console.log('Forts in Maharashtra (English) page loaded successfully');
});

// Add CSS for animations and suggestion highlighting
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
    
    .suggestion-item mark {
        background-color: rgba(255, 255, 0, 0.3);
        color: inherit;
        padding: 0;
    }
    
    .suggestion-item.highlighted mark {
        background-color: rgba(255, 255, 255, 0.3);
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);
</script>