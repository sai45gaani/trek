<?php
// Set page specific variables
$page_title = 'Forts by Category - Hill Forts, Sea Forts & More | Trekshitz';
$meta_description = 'Complete categorization of forts in Maharashtra by type - Hill forts, Sea forts, Land forts, and Cave forts. Detailed information about different types of forts with trekking guides.';
$meta_keywords = 'hill forts, sea forts, land forts, cave forts, Maharashtra fort types, Sahyadri fort categories, fort classification';

// Include header
include './includes/header.php';

// Complete fort categories data
$fortCategories = [
    'Hill Forts' => [
        'name' => 'Hill Forts',
        'description' => 'Forts built on hills and mountains for strategic advantage',
        'forts' => [
            'Rajgad', 'Raigad', 'Pratapgad', 'Sinhagad', 'Lohagad', 'Visapur', 
            'Tikona', 'Torna', 'Purandar', 'Shivneri', 'Harishchandragad', 
            'Kalsubai', 'Ratangad', 'Sandhan Valley', 'Alang', 'Madan', 
            'Kulang', 'Chandragad', 'Mahuli', 'Karnala', 'Prabalgad', 
            'Irshalgad', 'Manikgad', 'Bhimashankar', 'Ajoba', 'Ghangad',
            'Kothaligad Peth', 'Naneghat', 'Malshej Ghat', 'Bhandardara',
            'Anjaneri', 'Brahmagiri', 'Trimbakeshwar', 'Harihar', 'Bitangad',
            'Chavand', 'Sudhagad', 'Songad', 'Sarasgad', 'Makrandgad'
        ],
        'color' => 'bg-green-100 dark:bg-green-900',
        'icon' => 'fas fa-mountain',
        'total_count' => 280,
        'difficulty_range' => 'Easy to Extreme',
        'best_season' => 'October to March',
        'features' => [
            'Strategic mountain locations',
            'Natural defense advantages', 
            'Panoramic valley views',
            'Ancient architecture',
            'Challenging trekking routes'
        ]
    ],
    'Sea Forts' => [
        'name' => 'Sea Forts',
        'description' => 'Coastal forts built on islands and rocky outcrops in the Arabian Sea',
        'forts' => [
            'Janjira', 'Murud-Janjira', 'Suvarnadurg', 'Padmadurg', 
            'Khanderi', 'Underi', 'Kolaba', 'Alibag Fort', 'Revdanda',
            'Chaul', 'Korlai', 'Bankot', 'Vijaydurg', 'Sindhudurg',
            'Malvan Fort', 'Rajkot Fort', 'Sarjekot', 'Yeshwantgad',
            'Anjanvel', 'Kanakdurg', 'Gopalgad', 'Redi Fort', 'Tiracol Fort'
        ],
        'color' => 'bg-blue-100 dark:bg-blue-900',
        'icon' => 'fas fa-anchor',
        'total_count' => 35,
        'difficulty_range' => 'Easy to Medium',
        'best_season' => 'November to February',
        'features' => [
            'Naval strategic importance',
            'Unique island locations',
            'Boat access required',
            'Maritime architecture',
            'Coastal defense systems'
        ]
    ],
    'Land Forts' => [
        'name' => 'Land Forts',
        'description' => 'Forts built on plains and plateaus for territorial control',
        'forts' => [
            'Ahmednagar Fort', 'Daulatabad', 'Parenda', 'Solapur Fort',
            'Naldurg', 'Tuljapur', 'Sholapur', 'Kalyani Chalukya Fort',
            'Bidar Fort', 'Udgir Fort', 'Ausa Fort', 'Nanded Fort',
            'Mahur Fort', 'Kinwat Fort', 'Yavatmal Fort', 'Akola Fort',
            'Amravati Fort', 'Nagpur Fort', 'Ramtek Fort', 'Sewagram Fort',
            'Wardha Fort', 'Chandrapur Fort', 'Gadchiroli Fort', 'Gondia Fort',
            'Bhandara Fort', 'Balaghat Fort', 'Chhindwara Fort', 'Betul Fort'
        ],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'icon' => 'fas fa-city',
        'total_count' => 45,
        'difficulty_range' => 'Easy to Medium',
        'best_season' => 'October to March',
        'features' => [
            'Strategic plain locations',
            'Administrative centers',
            'Urban fort complexes',
            'Trade route control',
            'Cultural significance'
        ]
    ],
    'Cave Forts' => [
        'name' => 'Cave Forts',
        'description' => 'Natural and artificial caves fortified for defense',
        'forts' => [
            'Karla Caves', 'Bhaja Caves', 'Bedse Caves', 'Lenyadri',
            'Junnar Caves', 'Tulja Caves', 'Elephanta Caves', 'Kanheri Caves',
            'Mahakali Caves', 'Jogeshwari Caves', 'Mandapeshwar Caves',
            'Magathane Caves', 'Kondane Caves', 'Shivleni Caves',
            'Pandavleni Caves', 'Aurangabad Caves', 'Ellora Caves',
            'Ajanta Caves', 'Pitalkhora Caves', 'Ghatotkacha Caves'
        ],
        'color' => 'bg-purple-100 dark:bg-purple-900',
        'icon' => 'fas fa-archway',
        'total_count' => 25,
        'difficulty_range' => 'Easy to Hard',
        'best_season' => 'October to March',
        'features' => [
            'Natural cave systems',
            'Buddhist heritage sites',
            'Ancient rock-cut architecture',
            'Archaeological importance',
            'Religious significance'
        ]
    ],
    'Water Forts' => [
        'name' => 'Water Forts',
        'description' => 'Forts built around or within water bodies like lakes and rivers',
        'forts' => [
            'Bhandardara Fort', 'Koyna Fort', 'Wai Fort', 'Karad Fort',
            'Sangli Fort', 'Miraj Fort', 'Kolhapur Fort', 'Panhala',
            'Bahubali Fort', 'Jayakwadi Fort', 'Ujjani Fort', 'Temghar Fort',
            'Mulshi Fort', 'Varasgaon Fort', 'Bhatghar Fort', 'Pawna Fort'
        ],
        'color' => 'bg-cyan-100 dark:bg-cyan-900',
        'icon' => 'fas fa-water',
        'total_count' => 20,
        'difficulty_range' => 'Easy to Medium',
        'best_season' => 'November to February',
        'features' => [
            'Water body integration',
            'Unique access challenges',
            'Scenic beauty',
            'Engineering marvels',
            'Monsoon attractions'
        ]
    ],
    'Border Forts' => [
        'name' => 'Border Forts',
        'description' => 'Strategic forts built along territorial boundaries',
        'forts' => [
            'Goa Border Forts', 'Karnataka Border Forts', 'Telangana Border Forts',
            'Madhya Pradesh Border Forts', 'Gujarat Border Forts', 'Belgaum Fort',
            'Nipani Fort', 'Miraj Fort', 'Sangli Fort', 'Kolhapur Forts',
            'Yavatmal Border Forts', 'Nanded Border Forts', 'Osmanabad Forts'
        ],
        'color' => 'bg-red-100 dark:bg-red-900',
        'icon' => 'fas fa-flag',
        'total_count' => 15,
        'difficulty_range' => 'Easy to Hard',
        'best_season' => 'October to March',
        'features' => [
            'Strategic border locations',
            'Multi-state significance',
            'Trade route monitoring',
            'Cultural exchange points',
            'Historical importance'
        ]
    ]
];

// Get current category from URL parameter
$currentCategory = isset($_GET['category']) ? $_GET['category'] : '';
$selectedCategory = $currentCategory && isset($fortCategories[$currentCategory]) ? $fortCategories[$currentCategory] : null;
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort-pattern\" x=\"0\" y=\"0\" width=\"25\" height=\"25\" patternUnits=\"userSpaceOnUse\"><circle cx=\"12.5\" cy=\"12.5\" r=\"3\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"8\" y=\"8\" width=\"9\" height=\"9\" fill=\"%23ffffff\" opacity=\"0.05\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Forts by <span class="text-accent">Category</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Explore different types of forts in Maharashtra - Hill, Sea, Land, Cave, and more
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Discover the unique characteristics and strategic importance of each fort category
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/english/forts-alphabetical" class="hover:text-accent transition-colors">Alphabetical</a>
                    <span>•</span>
                    <a href="/english/forts-by-range" class="hover:text-accent transition-colors">By Mountain Range</a>
                    <span>•</span>
                    <a href="/english/forts-by-district" class="hover:text-accent transition-colors">By District</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">By Category</span>
                    <span>•</span>
                    <a href="/english/forts-by-grade" class="hover:text-accent transition-colors">By Difficulty</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($fortCategories); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Fort Categories</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="280">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Hill Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="35">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Sea Forts</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 mb-8">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2 text-accent"></i>Search Fort Category
                        </label>
                        <input 
                            type="text" 
                            id="categorySearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white transition-all duration-300"
                            placeholder="Type category name (Hill, Sea, Land, etc.)..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-signal mr-2 text-accent"></i>Select Difficulty
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white transition-all duration-300">
                            <option value="">All Difficulties</option>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                            <option value="Extreme">Extreme</option>
                        </select>
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2 text-accent"></i>Best Season
                        </label>
                        <select id="seasonFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white transition-all duration-300">
                            <option value="">All Seasons</option>
                            <option value="October to March">October to March</option>
                            <option value="November to February">November to February</option>
                            <option value="Year Round">Year Round</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors duration-300 transform hover:scale-105">
                        <i class="fas fa-times mr-2"></i>Clear
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedCategory): ?>
        <!-- Detailed Category View -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl mb-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-48 h-48 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <polygon points="20,80 50,20 80,80" fill="white"/>
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <div class="flex flex-col lg:flex-row items-start justify-between mb-6">
                            <div class="flex items-center gap-4 mb-4 lg:mb-0">
                                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center transform transition-transform hover:scale-110">
                                    <i class="<?php echo $selectedCategory['icon']; ?> text-3xl text-white"></i>
                                </div>
                                <div>
                                    <h2 class="text-4xl md:text-5xl font-bold mb-2"><?php echo $selectedCategory['name']; ?></h2>
                                    <p class="text-xl opacity-90"><?php echo $selectedCategory['description']; ?></p>
                                </div>
                            </div>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-arrow-left mr-2"></i>Back
                            </a>
                        </div>
                        
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                                <i class="fas fa-fort-awesome"></i>
                                <?php echo $selectedCategory['total_count']; ?> Forts
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                                <i class="fas fa-signal"></i>
                                <?php echo $selectedCategory['difficulty_range']; ?>
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                                <i class="fas fa-calendar"></i>
                                <?php echo $selectedCategory['best_season']; ?>
                            </span>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-bold mb-3">Key Features:</h3>
                                <ul class="space-y-2">
                                    <?php foreach($selectedCategory['features'] as $feature): ?>
                                        <li class="flex items-center text-white opacity-90">
                                            <i class="fas fa-check text-accent mr-2"></i>
                                            <?php echo $feature; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">Category Statistics:</h3>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div class="bg-white bg-opacity-10 p-3 rounded-lg backdrop-blur-sm">
                                        <div class="text-2xl font-bold"><?php echo $selectedCategory['total_count']; ?></div>
                                        <div class="opacity-80">Total Forts</div>
                                    </div>
                                    <div class="bg-white bg-opacity-10 p-3 rounded-lg backdrop-blur-sm">
                                        <div class="text-2xl font-bold"><?php echo count($selectedCategory['forts']); ?></div>
                                        <div class="opacity-80">Listed Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">
                        Popular <?php echo $selectedCategory['name']; ?>
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        <?php foreach(array_slice($selectedCategory['forts'], 0, 12) as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-2 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="<?php echo $selectedCategory['icon']; ?> text-accent text-xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-tag mr-2 text-accent w-4"></i>
                                        <span><?php echo $selectedCategory['name']; ?></span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-map-marker-alt mr-2 text-accent w-4"></i>
                                        <span>Maharashtra</span>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <a href="/fort/<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-all duration-300 transform hover:scale-105">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Details
                                    </a>
                                    <a href="/trek/<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-all duration-300 transform hover:scale-105">
                                        <i class="fas fa-route mr-1"></i>
                                        Trek
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if(count($selectedCategory['forts']) > 12): ?>
                        <div class="text-center mt-8">
                            <button class="bg-primary hover:bg-secondary text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl" onclick="loadMoreForts()">
                                <i class="fas fa-plus mr-2"></i>
                                View All <?php echo $selectedCategory['total_count']; ?> Forts
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Fort Categories Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            Fort Categories in Maharashtra
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Explore different types of forts based on their location and purpose
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8" id="categoryGrid">
                    <?php foreach($fortCategories as $key => $category): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-accent group searchable-category relative overflow-hidden" 
                             data-name="<?php echo $category['name']; ?>"
                             data-difficulty="<?php echo $category['difficulty_range']; ?>"
                             data-season="<?php echo $category['best_season']; ?>">
                            
                            <!-- Hover Effect Border -->
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-primary to-accent transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                            
                            <!-- Category Icon -->
                            <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent text-white rounded-2xl flex items-center justify-center mx-auto mb-6 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                                <i class="<?php echo $category['icon']; ?> text-2xl"></i>
                            </div>
                            
                            <!-- Category Name -->
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white text-center mb-3 group-hover:text-primary dark:group-hover:text-accent transition-colors">
                                <?php echo $category['name']; ?>
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 dark:text-gray-300 text-center mb-6 leading-relaxed">
                                <?php echo $category['description']; ?>
                            </p>
                            
                            <!-- Stats Grid -->
                            <div class="grid grid-cols-3 gap-3 mb-6">
                                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg text-center transition-colors hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="text-2xl font-bold text-primary dark:text-accent"><?php echo $category['total_count']; ?></div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Total Forts</div>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg text-center transition-colors hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="text-lg font-bold text-accent">
                                        <i class="fas fa-signal"></i>
                                    </div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400"><?php echo explode(' to ', $category['difficulty_range'])[0]; ?></div>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg text-center transition-colors hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="text-lg font-bold text-secondary">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Best Season</div>
                                </div>
                            </div>
                            <!-- Key Features -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                                    <i class="fas fa-star text-accent mr-2"></i>Key Features:
                                </h4>
                                <ul class="space-y-1">
                                    <?php foreach(array_slice($category['features'], 0, 3) as $feature): ?>
                                        <li class="text-sm text-gray-600 dark:text-gray-300 flex items-center">
                                            <i class="fas fa-check text-accent mr-2 text-xs"></i>
                                            <?php echo $feature; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            
                            <!-- Popular Forts -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                                    <i class="fas fa-fort-awesome text-accent mr-2"></i>Popular Forts:
                                </h4>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach(array_slice($category['forts'], 0, 6) as $fort): ?>
                                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-md text-xs border hover:bg-primary hover:text-white transition-all duration-300 cursor-pointer transform hover:scale-105" title="<?php echo $fort; ?> - Click for more details">
                                            <?php echo strlen($fort) > 12 ? substr($fort, 0, 12) . '...' : $fort; ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if(count($category['forts']) > 6): ?>
                                        <span class="text-xs text-gray-500 px-2 py-1 bg-gray-50 dark:bg-gray-600 rounded-md">
                                            +<?php echo count($category['forts']) - 6; ?> more
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Badges and CTA -->
                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="bg-gradient-to-r from-forest to-mountain text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        <?php echo $category['difficulty_range']; ?>
                                    </span>
                                    <span class="bg-gradient-to-r from-earth to-accent text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        <?php echo explode(' to ', $category['best_season'])[0]; ?> Season
                                    </span>
                                </div>
                                
                                <a href="?category=<?php echo urlencode($key); ?>" 
                                   class="block w-full bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 text-center group-hover:shadow-lg transform hover:scale-105">
                                    Explore <?php echo $category['name']; ?>
                                    <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="text-center py-20 hidden">
                    <div class="max-w-md mx-auto">
                        <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                        <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                            No Fort Categories Found
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 text-lg mb-6">
                            Please try different keywords to search again
                        </p>
                        <button onclick="clearFilters()" class="bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            Clear Filters
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Quick Navigation -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                    Explore by Other Classifications
                </span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/english/forts-alphabetical" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-accent group">
                    <div class="w-16 h-16 bg-primary group-hover:bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto transition-all duration-300 transform group-hover:scale-110">
                        <i class="fas fa-sort-alpha-down text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 group-hover:text-primary dark:group-hover:text-accent transition-colors">
                        Alphabetical
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        A, B, C... order
                    </p>
                </a>
                
                <a href="/english/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-accent group">
                    <div class="w-16 h-16 bg-secondary group-hover:bg-primary rounded-2xl flex items-center justify-center mb-4 mx-auto transition-all duration-300 transform group-hover:scale-110">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 group-hover:text-secondary dark:group-hover:text-accent transition-colors">
                        By Mountain Range
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Sahyadri, Western Ghats, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-district" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-accent group">
                    <div class="w-16 h-16 bg-accent group-hover:bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto transition-all duration-300 transform group-hover:scale-110">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 group-hover:text-accent dark:group-hover:text-accent transition-colors">
                        By District
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Pune, Mumbai, Nashik, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-grade" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-accent group">
                    <div class="w-16 h-16 bg-forest group-hover:bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto transition-all duration-300 transform group-hover:scale-110">
                        <i class="fas fa-signal text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 group-hover:text-forest dark:group-hover:text-accent transition-colors">
                        By Difficulty
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Easy, Medium, Hard, etc.
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- Additional Information Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Understanding Fort Categories
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-transform hover:scale-110">
                            <i class="fas fa-mountain text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Hill Forts</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Built on elevated terrain for strategic military advantage. These forts dominated the landscape and controlled important trade routes through mountain passes.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-transform hover:scale-110">
                            <i class="fas fa-anchor text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Sea Forts</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Coastal fortifications built to protect harbors and control maritime trade. These unique island forts showcase advanced naval engineering of their time.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-transform hover:scale-110">
                            <i class="fas fa-archway text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Cave Forts</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Natural and artificial caves fortified for defense and religious purposes. Many feature ancient Buddhist architecture and rock-cut temples.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        Fort Category Exploration Guide
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Detailed guides for each fort category with historical context, trekking information, and safety guidelines
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/category-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-download mr-2"></i>
                            Download Category Guide
                        </a>
                        <a href="/historical-significance" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-all duration-300 border border-white border-opacity-30 transform hover:scale-105">
                            <i class="fas fa-book mr-2"></i>
                            Historical Significance
                        </a>
                        <a href="/trekking-by-category" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-all duration-300 border border-white border-opacity-30 transform hover:scale-105">
                            <i class="fas fa-route mr-2"></i>
                            Trekking by Category
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('categorySearch');
    const difficultyFilter = document.getElementById('difficultyFilter');
    const seasonFilter = document.getElementById('seasonFilter');
    const categoryCards = document.querySelectorAll('.searchable-category');
    const noResults = document.getElementById('noResults');
    
    function filterCategories() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedDifficulty = difficultyFilter.value.toLowerCase().trim();
        const selectedSeason = seasonFilter.value.toLowerCase().trim();
        let visibleCount = 0;
        
        categoryCards.forEach(function(card) {
            const categoryName = card.dataset.name.toLowerCase();
            const categoryDifficulty = card.dataset.difficulty.toLowerCase();
            const categorySeason = card.dataset.season.toLowerCase();
            
            const matchesSearch = !searchTerm || categoryName.includes(searchTerm);
            const matchesDifficulty = !selectedDifficulty || categoryDifficulty.includes(selectedDifficulty);
            const matchesSeason = !selectedSeason || categorySeason.includes(selectedSeason);
            
            if (matchesSearch && matchesDifficulty && matchesSeason) {
                card.style.display = 'block';
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.style.display = 'none';
                card.classList.add('hidden');
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
    
    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterCategories);
    }
    
    if (difficultyFilter) {
        difficultyFilter.addEventListener('change', filterCategories);
    }
    
    if (seasonFilter) {
        seasonFilter.addEventListener('change', filterCategories);
    }
    
    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (difficultyFilter) difficultyFilter.value = '';
        if (seasonFilter) seasonFilter.value = '';
        filterCategories();
    };
    
    // Load more forts function
    window.loadMoreForts = function() {
        console.log('Loading more forts...');
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
    const categoryCardsAnimation = document.querySelectorAll('.searchable-category');
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(30px)';
                    entry.target.style.transition = 'all 0.6s ease-out';
                    
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 150);
                cardObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });
    
    categoryCardsAnimation.forEach(card => {
        cardObserver.observe(card);
    });
    
    console.log('Forts by Category (English) page loaded successfully');
});
</script>