<?php
// Set page specific variables
$page_title = 'Forts by District - Maharashtra | Trekshitz';
$meta_description = 'Complete list of forts in Maharashtra organized by districts. Explore forts in Pune, Mumbai, Nashik, Satara, Kolhapur and other districts with detailed information.';
$meta_keywords = 'Maharashtra forts by district, Pune forts, Mumbai forts, Nashik forts, Satara forts, Kolhapur forts, district wise forts';

require_once './config/database.php';
// Include header
include './includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Predefined district information (for descriptions and metadata)
$districtInfo = [
    'Ahmednagar' => [
        'description' => 'Historical district with numerous Maratha era forts',
        'region' => 'North Maharashtra',
        'elevation' => '1695m',
        'climate' => 'Semi-arid'
    ],
    'Nashik' => [
        'description' => 'Ancient city with rich historical and religious significance',
        'region' => 'North Maharashtra',
        'elevation' => '600m',
        'climate' => 'Semi-arid'
    ],
    'Pune' => [
        'description' => 'Cultural capital with maximum number of historical forts',
        'region' => 'Western Maharashtra',
        'elevation' => '560m',
        'climate' => 'Moderate'
    ],
    'Raigad' => [
        'description' => 'Home to Shivaji Maharaj\'s capital and numerous coastal forts',
        'region' => 'Konkan',
        'elevation' => '820m',
        'climate' => 'Tropical'
    ],
    'Satara' => [
        'description' => 'District with strong Maratha heritage and hill forts',
        'region' => 'Western Maharashtra',
        'elevation' => '625m',
        'climate' => 'Moderate'
    ],
    'Kolhapur' => [
        'description' => 'Southern Maharashtra with rich Maratha heritage',
        'region' => 'Western Maharashtra',
        'elevation' => '550m',
        'climate' => 'Tropical'
    ],
    'Ratnagiri' => [
        'description' => 'Konkan coastal district with sea and hill forts',
        'region' => 'Konkan',
        'elevation' => '450m',
        'climate' => 'Tropical'
    ],
    'Sindhudurg' => [
        'description' => 'Southernmost coastal district with sea forts',
        'region' => 'Konkan',
        'elevation' => '300m',
        'climate' => 'Tropical'
    ],
    'Thane' => [
        'description' => 'Mumbai metropolitan region with coastal and hill forts',
        'region' => 'Konkan',
        'elevation' => '400m',
        'climate' => 'Tropical'
    ],
    'Aurangabad' => [
        'description' => 'Historical city with Mughal and Maratha heritage',
        'region' => 'Marathwada',
        'elevation' => '568m',
        'climate' => 'Semi-arid'
    ]
];

// Function to get color for district
function getDistrictColor($index) {
    $colors = [
        'bg-red-100 dark:bg-red-900',
        'bg-blue-100 dark:bg-blue-900',
        'bg-green-100 dark:bg-green-900',
        'bg-yellow-100 dark:bg-yellow-900',
        'bg-purple-100 dark:bg-purple-900',
        'bg-indigo-100 dark:bg-indigo-900',
        'bg-teal-100 dark:bg-teal-900',
        'bg-pink-100 dark:bg-pink-900',
        'bg-cyan-100 dark:bg-cyan-900',
        'bg-orange-100 dark:bg-orange-900'
    ];
    
    return $colors[$index % count($colors)];
}

// Build districts array from database
$districts = [];

// Query to get all districts and their forts
$query = "SELECT FortDistrict, FortName 
          FROM EI_tblFortInfo 
          WHERE FortDistrict IS NOT NULL 
          AND FortDistrict != '' 
          AND FortName IS NOT NULL 
          ORDER BY FortDistrict, FortName";

$result = $conn->query($query);

// Group forts by district
$districtData = [];
while ($row = $result->fetch_assoc()) {
    $district = trim($row['FortDistrict']);
    $fortName = trim($row['FortName']);
    
    if (!empty($district) && !empty($fortName)) {
        if (!isset($districtData[$district])) {
            $districtData[$district] = [];
        }
        $districtData[$district][] = $fortName;
    }
}

// Convert to the expected format
$colorIndex = 0;
foreach ($districtData as $districtName => $forts) {
    // Get predefined info or use defaults
    $info = $districtInfo[$districtName] ?? [
        'description' => "Historic district with " . count($forts) . " forts offering excellent trekking opportunities",
        'region' => 'Maharashtra',
        'elevation' => 'Varies',
        'climate' => 'Tropical'
    ];
    
    $districts[$districtName] = [
        'name' => $districtName,
        'description' => $info['description'],
        'forts' => $forts,
        'color' => getDistrictColor($colorIndex),
        'region' => $info['region'],
        'elevation' => $info['elevation'],
        'climate' => $info['climate']
    ];
    
    $colorIndex++;
}

// Sort districts alphabetically
ksort($districts);

// Get current district from URL parameter
$currentDistrict = isset($_GET['district']) ? $_GET['district'] : '';
$selectedDistrict = $currentDistrict && isset($districts[$currentDistrict]) ? $districts[$currentDistrict] : null;

// Calculate statistics
$totalForts = array_sum(array_map(function($d) { return count($d['forts']); }, $districts));
$uniqueRegions = count(array_unique(array_column($districts, 'region')));
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
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $totalForts; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $uniqueRegions; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Regions</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Years of History</div>
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
                            <?php 
                            $regions = array_unique(array_column($districts, 'region'));
                            sort($regions);
                            foreach($regions as $region): 
                            ?>
                                <option value="<?php echo htmlspecialchars($region); ?>"><?php echo htmlspecialchars($region); ?></option>
                            <?php endforeach; ?>
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
                        <?php echo count($selectedDistrict['forts']); ?> Forts in <?php echo $selectedDistrict['name']; ?> District
                    </h3>
                    
                    <?php if (count($selectedDistrict['forts']) > 0): ?>
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
                    <?php else: ?>
                    <div class="text-center py-12">
                        <i class="fas fa-mountain text-6xl text-gray-400 mb-4"></i>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">No forts found in this district</p>
                    </div>
                    <?php endif; ?>
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
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Trekking Adventures</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            From easy day treks to challenging expeditions, each district offers diverse trekking experiences suitable for all skill levels.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-20 h-20 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-landmark text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Rich Heritage</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Explore centuries of Maratha history through magnificent forts built by Shivaji Maharaj and his successors across Maharashtra.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-20 h-20 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-camera text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Scenic Beauty</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Capture breathtaking views from hilltops, witness stunning sunrises and sunsets, and enjoy the natural beauty of Sahyadri ranges.
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
    const districtCardsAnimation = document.querySelectorAll('.searchable-district');
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
        cardObserver.observe(card);
    });
    
    // Enhanced hover effects for fort tags
    const fortTags = document.querySelectorAll('.bg-gray-100, .dark\\:bg-gray-700');
    fortTags.forEach(tag => {
        if (tag.textContent && tag.textContent.trim() && !tag.textContent.includes('+')) {
            tag.addEventListener('click', function(e) {
                e.preventDefault();
                const fortName = this.textContent.trim();
                console.log('Clicked on fort:', fortName);
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
    
    console.log('Forts by District (Database-driven) page loaded successfully');
});

// Add CSS for animations
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