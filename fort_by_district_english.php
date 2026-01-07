<?php
// Set page specific variables
$page_title = 'Forts by District - Maharashtra | Trekshitz';
$meta_description = 'Complete list of forts in Maharashtra organized by districts. Explore forts in Pune, Mumbai, Nashik, Satara, Kolhapur and other districts with detailed information.';
$meta_keywords = 'Maharashtra forts by district, Pune forts, Mumbai forts, Nashik forts, Satara forts, Kolhapur forts, district wise forts';

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

// District data with complete information
$districts = [
    'Ahmednagar' => [
        'name' => 'Ahmednagar',
        'description' => 'Historical district with numerous Maratha era forts',
        'forts' => ['Ahmednagar Fort', 'Harishchandragad', 'Ratangad', 'Bhandardara Fort', 'Kalsubai', 'Ankai Fort', 'Tankai Fort'],
        'color' => 'bg-red-100 dark:bg-red-900',
        'region' => 'North Maharashtra',
        'elevation' => '1695m',
        'climate' => 'Semi-arid'
    ],
    'Akola' => [
        'name' => 'Akola',
        'description' => 'Eastern Maharashtra district with ancient fortifications',
        'forts' => ['Akola Fort', 'Narnala Fort', 'Gawilgarh Fort'],
        'color' => 'bg-blue-100 dark:bg-blue-900',
        'region' => 'Vidarbha',
        'elevation' => '307m',
        'climate' => 'Tropical'
    ],
    'Amravati' => [
        'name' => 'Amravati',
        'description' => 'Central Maharashtra district with strategic hill forts',
        'forts' => ['Amravati Fort', 'Melghat Fort', 'Chikhaldara Fort'],
        'color' => 'bg-green-100 dark:bg-green-900',
        'region' => 'Vidarbha',
        'elevation' => '343m',
        'climate' => 'Tropical'
    ],
    'Aurangabad' => [
        'name' => 'Aurangabad',
        'description' => 'Historical city with Mughal and Maratha heritage',
        'forts' => ['Daulatabad Fort', 'Aurangabad Fort', 'Antur Fort', 'Parli Fort', 'Jalna Fort'],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'region' => 'Marathwada',
        'elevation' => '568m',
        'climate' => 'Semi-arid'
    ],
    'Beed' => [
        'name' => 'Beed',
        'description' => 'Marathwada district with ancient hill fortifications',
        'forts' => ['Beed Fort', 'Parali Fort', 'Wadgaon Fort'],
        'color' => 'bg-purple-100 dark:bg-purple-900',
        'region' => 'Marathwada',
        'elevation' => '465m',
        'climate' => 'Semi-arid'
    ],
    'Bhandara' => [
        'name' => 'Bhandara',
        'description' => 'Eastern district known for rice cultivation and forts',
        'forts' => ['Bhandara Fort', 'Tumsar Fort'],
        'color' => 'bg-indigo-100 dark:bg-indigo-900',
        'region' => 'Vidarbha',
        'elevation' => '268m',
        'climate' => 'Tropical'
    ],
    'Buldhana' => [
        'name' => 'Buldhana',
        'description' => 'Central Maharashtra with historic fortifications',
        'forts' => ['Buldhana Fort', 'Lonar Fort', 'Sindkhed Raja Fort'],
        'color' => 'bg-teal-100 dark:bg-teal-900',
        'region' => 'Vidarbha',
        'elevation' => '425m',
        'climate' => 'Semi-arid'
    ],
    'Chandrapur' => [
        'name' => 'Chandrapur',
        'description' => 'Eastern district with ancient Gond dynasty forts',
        'forts' => ['Chandrapur Fort', 'Ballarpur Fort', 'Korpana Fort'],
        'color' => 'bg-pink-100 dark:bg-pink-900',
        'region' => 'Vidarbha',
        'elevation' => '189m',
        'climate' => 'Tropical'
    ],
    'Dhule' => [
        'name' => 'Dhule',
        'description' => 'North Maharashtra district with Khandesh heritage',
        'forts' => ['Dhule Fort', 'Laling Fort', 'Songir Fort', 'Thalner Fort'],
        'color' => 'bg-cyan-100 dark:bg-cyan-900',
        'region' => 'North Maharashtra',
        'elevation' => '244m',
        'climate' => 'Semi-arid'
    ],
    'Gadchiroli' => [
        'name' => 'Gadchiroli',
        'description' => 'Eastern tribal district with natural fortifications',
        'forts' => ['Gadchiroli Fort', 'Chaprala Fort', 'Tipagad'],
        'color' => 'bg-orange-100 dark:bg-orange-900',
        'region' => 'Vidarbha',
        'elevation' => '208m',
        'climate' => 'Tropical'
    ],
    'Gondiya' => [
        'name' => 'Gondiya',
        'description' => 'Northern Vidarbha district with tribal heritage',
        'forts' => ['Gondiya Fort', 'Tirora Fort'],
        'color' => 'bg-lime-100 dark:bg-lime-900',
        'region' => 'Vidarbha',
        'elevation' => '356m',
        'climate' => 'Tropical'
    ],
    'Hingoli' => [
        'name' => 'Hingoli',
        'description' => 'Marathwada district with ancient fortifications',
        'forts' => ['Hingoli Fort', 'Aundha Fort'],
        'color' => 'bg-emerald-100 dark:bg-emerald-900',
        'region' => 'Marathwada',
        'elevation' => '408m',
        'climate' => 'Semi-arid'
    ],
    'Jalgaon' => [
        'name' => 'Jalgaon',
        'description' => 'North Maharashtra district with banana cultivation',
        'forts' => ['Jalgaon Fort', 'Muktainagar Fort', 'Raver Fort'],
        'color' => 'bg-violet-100 dark:bg-violet-900',
        'region' => 'North Maharashtra',
        'elevation' => '209m',
        'climate' => 'Semi-arid'
    ],
    'Jalna' => [
        'name' => 'Jalna',
        'description' => 'Marathwada district with historic Maratha forts',
        'forts' => ['Jalna Fort', 'Partur Fort', 'Bhokardan Fort'],
        'color' => 'bg-fuchsia-100 dark:bg-fuchsia-900',
        'region' => 'Marathwada',
        'elevation' => '508m',
        'climate' => 'Semi-arid'
    ],
    'Kolhapur' => [
        'name' => 'Kolhapur',
        'description' => 'Southern Maharashtra with rich Maratha heritage',
        'forts' => ['Panhala Fort', 'Vishalgad', 'Bhudargad', 'Rangna Fort', 'Samangad', 'Bavda Fort'],
        'color' => 'bg-rose-100 dark:bg-rose-900',
        'region' => 'Western Maharashtra',
        'elevation' => '550m',
        'climate' => 'Tropical'
    ]
];

// Get current district from URL parameter
$currentDistrict = isset($_GET['district']) ? $_GET['district'] : '';
$selectedDistrict = $currentDistrict && isset($districts[$currentDistrict]) ? $districts[$currentDistrict] : null;
?>
<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"district-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"15,2 25,18 5,18\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23district-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Forts by <span class="text-accent">District</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Explore forts in all districts of Maharashtra with detailed information
                </p>
                <p class="text-lg mb-8 opacity-80">
                    From Pune's historic forts to Mumbai's coastal fortifications and beyond
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/english/forts-alphabetical" class="hover:text-accent transition-colors">Alphabetical</a>
                    <span>•</span>
                    <a href="/english/forts-by-range" class="hover:text-accent transition-colors">By Mountain Range</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">By District</span>
                    <span>•</span>
                    <a href="/english/forts-by-category" class="hover:text-accent transition-colors">By Type</a>
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
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($districts); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Districts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="5">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Regions</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1695">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Meters (Highest)</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2"></i>Search District
                        </label>
                        <input 
                            type="text" 
                            id="districtSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white"
                            placeholder="Type district name..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-globe mr-2"></i>Select Region
                        </label>
                        <select id="regionFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Regions</option>
                            <option value="North Maharashtra">North Maharashtra</option>
                            <option value="Vidarbha">Vidarbha</option>
                            <option value="Marathwada">Marathwada</option>
                            <option value="Western Maharashtra">Western Maharashtra</option>
                            <option value="Konkan">Konkan</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Clear
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedDistrict): ?>
        <!-- Detailed District View -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl mb-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-48 h-48 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <polygon points="30,70 50,30 70,70" fill="white"/>
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-4xl md:text-5xl font-bold"><?php echo $selectedDistrict['name']; ?> District</h2>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Back
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedDistrict['description']; ?></p>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedDistrict['forts']); ?> Forts
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo $selectedDistrict['region']; ?>
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-mountain mr-2"></i>
                                <?php echo $selectedDistrict['elevation']; ?>
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-cloud-sun mr-2"></i>
                                <?php echo $selectedDistrict['climate']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">
                        Forts in <?php echo $selectedDistrict['name']; ?> District
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedDistrict['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-mountain mr-2 text-accent"></i>
                                        <span>Hill Fort</span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-map-marker-alt mr-2 text-accent"></i>
                                        <span><?php echo $selectedDistrict['name']; ?></span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-globe mr-2 text-accent"></i>
                                        <span><?php echo $selectedDistrict['region']; ?></span>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <a href="/fort/<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Details
                                    </a>
                                    <a href="/trek/<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fas fa-route mr-1"></i>
                                        Trek
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Districts Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            Districts in Maharashtra
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Complete information about forts in each district
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="districtGrid">
                    <?php foreach($districts as $key => $district): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:transform hover:-translate-y-2 hover:shadow-2xl searchable-district" 
                             data-name="<?php echo $district['name']; ?>"
                             data-region="<?php echo $district['region']; ?>">
                            
                            <div class="h-1 bg-gradient-to-r from-primary to-accent"></div>
                            
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $district['name']; ?>
                                    </h3>
                                    <i class="fas fa-map-marked-alt text-2xl text-accent"></i>
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                    <?php echo $district['description']; ?>
                                </p>
                                
                                <div class="mb-4">
                                    <div class="grid grid-cols-2 gap-2 text-xs mb-3">
                                        <span class="bg-gradient-to-r from-forest to-mountain text-white px-2 py-1 rounded-full text-center font-semibold">
                                            <i class="fas fa-globe mr-1"></i>
                                            <?php echo $district['region']; ?>
                                        </span>
                                        <span class="bg-accent text-white px-2 py-1 rounded-full text-center font-semibold">
                                            <?php echo count($district['forts']); ?> Forts
                                        </span>
                                        <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-center font-semibold">
                                            <i class="fas fa-mountain mr-1"></i>
                                            <?php echo $district['elevation']; ?>
                                        </span>
                                        <span class="bg-green-500 text-white px-2 py-1 rounded-full text-center font-semibold">
                                            <i class="fas fa-thermometer-half mr-1"></i>
                                            <?php echo $district['climate']; ?>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        Major forts in this district:
                                    </h4>
                                    <div class="flex flex-wrap gap-1">
                                        <?php 
                                        $displayForts = array_slice($district['forts'], 0, 4);
                                        foreach($displayForts as $fort): 
                                        ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-lg text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer" title="<?php echo $fort; ?> - Click for more details">
                                                <?php echo $fort; ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if(count($district['forts']) > 4): ?>
                                            <span class="bg-accent text-white px-2 py-1 rounded-lg text-xs font-semibold">
                                                +<?php echo count($district['forts']) - 4; ?> more
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-hiking mr-1"></i>
                                        Trekking Available
                                    </span>
                                    
                                    <a href="?district=<?php echo urlencode($key); ?>" 
                                       class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 text-sm group">
                                        Explore Forts
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
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        No Districts Found
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        Please try different keywords to search again
                    </p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Quick Navigation -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                    Explore by Other Categories
                </span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/english/forts-alphabetical" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-secondary transition-colors">
                        <i class="fas fa-sort-alpha-down text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        Alphabetical
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        A, B, C... order
                    </p>
                </a>
                
                <a href="/english/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Mountain Range
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Sahyadri, Western Ghats, etc.
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
    <!-- Additional Information Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        About Maharashtra Districts
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-20 h-20 bg-accent rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-hiking text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Trekking Adventures</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            From easy day treks to challenging expeditions, each district offers diverse trekking experiences suitable for all skill levels.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        District-wise Fort Explorer Guide
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Complete district-wise guide with maps, weather information, local transportation and cultural insights
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/district-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Download District Guide
                        </a>
                        <a href="/transportation" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-bus mr-2"></i>
                            Transportation Info
                        </a>
                        <a href="/local-culture" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-users mr-2"></i>
                            Local Culture
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
    const searchInput = document.getElementById('districtSearch');
    const regionFilter = document.getElementById('regionFilter');
    const districtCards = document.querySelectorAll('.searchable-district');
    const noResults = document.getElementById('noResults');
    
    function filterDistricts() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedRegion = regionFilter.value.toLowerCase().trim();
        let visibleCount = 0;
        
        districtCards.forEach(function(card) {
            const districtName = card.dataset.name.toLowerCase();
            const districtRegion = card.dataset.region.toLowerCase();
            
            const matchesSearch = !searchTerm || districtName.includes(searchTerm);
            const matchesRegion = !selectedRegion || districtRegion.includes(selectedRegion);
            
            if (matchesSearch && matchesRegion) {
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
        
        updateResultsCount(visibleCount);
    }
    
    function updateResultsCount(count) {
        console.log(`Showing ${count} districts`);
    }
    
    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterDistricts);
    }
    
    if (regionFilter) {
        regionFilter.addEventListener('change', filterDistricts);
    }
    
    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (regionFilter) regionFilter.value = '';
        filterDistricts();
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
    const districtCardsAnimation = document.querySelectorAll('.bg-white, .dark\\:bg-gray-800');
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
    
    districtCardsAnimation.forEach(card => {
        if (card.classList.contains('searchable-district')) {
            cardObserver.observe(card);
        }
    });
    
    // Enhanced hover effects for fort tags
    const fortTags = document.querySelectorAll('.bg-gray-100, .dark\\:bg-gray-700');
    fortTags.forEach(tag => {
        if (tag.textContent && tag.textContent.trim() && !tag.textContent.includes('+')) {
            tag.addEventListener('click', function(e) {
                e.preventDefault();
                const fortName = this.textContent.trim();
                console.log('Clicked on fort:', fortName);
                // You can add navigation to individual fort pages here
                // Example: window.location.href = `/fort/${fortName.toLowerCase().replace(/\s+/g, '-')}`;
            });
            
            tag.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05) translateY(-2px)';
                this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            });
            
            tag.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) translateY(0)';
                this.style.boxShadow = 'none';
            });
        }
    });
    
    // Search suggestions functionality
    if (searchInput) {
        const suggestions = Object.keys(<?php echo json_encode($districts); ?>);
        let suggestionsContainer;
        
        // Create suggestions container
        suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'absolute top-full left-0 right-0 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg mt-2 shadow-xl z-50 max-h-48 overflow-y-auto hidden';
        searchInput.parentElement.style.position = 'relative';
        searchInput.parentElement.appendChild(suggestionsContainer);
        
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            
            if (query.length >= 2) {
                const matches = suggestions.filter(item => 
                    item.toLowerCase().includes(query)
                ).slice(0, 5);
                
                if (matches.length > 0) {
                    showSuggestions(matches, query);
                } else {
                    hideSuggestions();
                }
            } else {
                hideSuggestions();
            }
        });
        
        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.parentElement.contains(e.target)) {
                hideSuggestions();
            }
        });
        
        function showSuggestions(matches, query) {
            suggestionsContainer.innerHTML = matches.map(name => {
                const highlighted = name.replace(new RegExp(`(${query})`, 'gi'), '<mark class="bg-yellow-200 dark:bg-yellow-600">$1</mark>');
                return `
                    <div class="suggestion-item px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0 transition-colors" data-name="${name}">
                        <i class="fas fa-map-marked-alt text-accent mr-2"></i>
                        ${highlighted}
                    </div>
                `;
            }).join('');
            
            suggestionsContainer.classList.remove('hidden');
            
            // Add click handlers to suggestions
            suggestionsContainer.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function() {
                    searchInput.value = this.dataset.name;
                    hideSuggestions();
                    filterDistricts();
                });
            });
        }
        
        function hideSuggestions() {
            if (suggestionsContainer) {
                suggestionsContainer.classList.add('hidden');
            }
        }
    }
    
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
    
    console.log('Forts by District page loaded successfully');
});

// Add CSS for animations and styling
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
    
    .suggestion-item mark {
        background-color: rgba(255, 255, 0, 0.3);
        color: inherit;
        padding: 0;
    }
    
    .bg-gradient-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
    
    .from-primary {
        --tw-gradient-from: var(--primary-color);
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(45, 80, 22, 0));
    }
    
    .to-accent {
        --tw-gradient-to: var(--accent-color);
    }
    
    .to-secondary {
        --tw-gradient-to: var(--secondary-color);
    }
    
    .from-forest {
        --tw-gradient-from: var(--forest);
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(53, 94, 59, 0));
    }
    
    .to-mountain {
        --tw-gradient-to: var(--mountain);
    }
    
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
`;
document.head.appendChild(style);
</script>