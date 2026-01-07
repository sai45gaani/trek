<?php
// Set page specific variables
$page_title = 'जिल्ह्यानुसार किल्ले - महाराष्ट्र | Trekshitz';
$meta_description = 'महाराष्ट्रातील जिल्ह्यांनुसार व्यवस्थित केलेली किल्ल्यांची संपूर्ण यादी. पुणे, मुंबई, नाशिक, सातारा, कोल्हापूर आणि इतर जिल्ह्यांमधील किल्ल्यांची सविस्तर माहिती.';
$meta_keywords = 'जिल्ह्यानुसार किल्ले, पुणे किल्ले, मुंबई किल्ले, नाशिक किल्ले, सातारा किल्ले, कोल्हापूर किल्ले, महाराष्ट्र किल्ले';

require_once './config/database.php';
// Include header
include './includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Predefined district information in Marathi
$districtInfo = [
    'नगर' => [
        'description' => 'मराठा काळातील असंख्य किल्ल्यांसह ऐतिहासिक जिल्हा',
        'region' => 'उत्तर महाराष्ट्र',
        'elevation' => '१६९५ मी',
        'climate' => 'अर्ध-शुष्क'
    ],
    'नाशिक' => [
        'description' => 'समृद्ध ऐतिहासिक आणि धार्मिक महत्त्व असलेले प्राचीन शहर',
        'region' => 'उत्तर महाराष्ट्र',
        'elevation' => '६०० मी',
        'climate' => 'अर्ध-शुष्क'
    ],
    'पुणे' => [
        'description' => 'सर्वाधिक ऐतिहासिक किल्ले असलेली सांस्कृतिक राजधानी',
        'region' => 'पश्चिम महाराष्ट्र',
        'elevation' => '५६० मी',
        'climate' => 'समशीतोष्ण'
    ],
    'रायगड' => [
        'description' => 'शिवाजी महाराजांच्या राजधानीचे ठिकाण आणि असंख्य किनारी किल्ले',
        'region' => 'कोकण',
        'elevation' => '८२० मी',
        'climate' => 'उष्णकटिबंधीय'
    ],
    'सातारा' => [
        'description' => 'मजबूत मराठा वारसा आणि डोंगर किल्ले असलेला जिल्हा',
        'region' => 'पश्चिम महाराष्ट्र',
        'elevation' => '६२५ मी',
        'climate' => 'समशीतोष्ण'
    ],
    'कोल्हापूर' => [
        'description' => 'समृद्ध मराठा वारसा असलेला दक्षिण महाराष्ट्र',
        'region' => 'पश्चिम महाराष्ट्र',
        'elevation' => '५५० मी',
        'climate' => 'उष्णकटिबंधीय'
    ],
    'रत्नागिरी' => [
        'description' => 'समुद्री आणि डोंगर किल्ले असलेला कोकण किनारी जिल्हा',
        'region' => 'कोकण',
        'elevation' => '४५० मी',
        'climate' => 'उष्णकटिबंधीय'
    ],
    'सिंधुदुर्ग' => [
        'description' => 'समुद्री किल्ले असलेला सर्वात दक्षिणेकडील किनारी जिल्हा',
        'region' => 'कोकण',
        'elevation' => '३०० मी',
        'climate' => 'उष्णकटिबंधीय'
    ],
    'ठाणे' => [
        'description' => 'किनारी आणि डोंगर किल्ले असलेला मुंबई महानगर प्रदेश',
        'region' => 'कोकण',
        'elevation' => '४०० मी',
        'climate' => 'उष्णकटिबंधीय'
    ],
    'बुलढाणा' => [
        'description' => 'मराठा आणि मुघल वारसा असलेला ऐतिहासिक जिल्हा',
        'region' => 'विदर्भ',
        'elevation' => '५६८ मी',
        'climate' => 'अर्ध-शुष्क'
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

// Slug generation function
function slugify($string) {
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    $string = preg_replace('/\s+/u', '-', trim($string));
    return mb_strtolower($string) . '-fort';
}

// Build districts array from database
$districts = [];

// Query to get all districts and their forts from Marathi table
$query = "SELECT FortDistrictMar, FortNameMar, FortName, GradeMar, FortTypeMar 
          FROM mi_tblfortinfo_unicode 
          WHERE FortDistrictMar IS NOT NULL 
          AND FortDistrictMar != '' 
          AND FortNameMar IS NOT NULL 
          ORDER BY FortDistrictMar, FortNameMar";

$result = $conn->query($query);

// Group forts by district
$districtData = [];
while ($row = $result->fetch_assoc()) {
    $district = trim($row['FortDistrictMar']);
    $fortNameMar = trim($row['FortNameMar']);
    $fortNameEng = trim($row['FortName']);
    $difficulty = trim($row['GradeMar'] ?? 'मध्यम');
    $fortType = trim($row['FortTypeMar'] ?? 'डोंगर किल्ला');
    
    if (!empty($district) && !empty($fortNameMar)) {
        if (!isset($districtData[$district])) {
            $districtData[$district] = [];
        }
        $districtData[$district][] = [
            'nameMar' => $fortNameMar,
            'nameEng' => $fortNameEng,
            'slug' => slugify($fortNameEng),
            'difficulty' => $difficulty,
            'type' => $fortType
        ];
    }
}

// Convert to the expected format
$colorIndex = 0;
foreach ($districtData as $districtName => $forts) {
    // Get predefined info or use defaults
    $info = $districtInfo[$districtName] ?? [
        'description' => count($forts) . " किल्ल्यांसह ऐतिहासिक जिल्हा",
        'region' => 'महाराष्ट्र',
        'elevation' => 'विविध',
        'climate' => 'उष्णकटिबंधीय'
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

// Sort districts alphabetically in Marathi
ksort($districts, SORT_LOCALE_STRING);

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
                    जिल्ह्यानुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    सविस्तर माहितीसह महाराष्ट्रातील सर्व जिल्ह्यांमधील किल्ल्यांचा शोध घ्या
                </p>
                <p class="text-lg mb-8 opacity-80">
                    पुण्याच्या ऐतिहासिक किल्ल्यांपासून मुंबईच्या किनारी तटबंदीपर्यंत आणि त्यापुढे
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/marathi/forts-alphabetical" class="hover:text-accent transition-colors">मुळाक्षरानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-range" class="hover:text-accent transition-colors">डोंगररांगेनुसार</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">जिल्ह्यानुसार</span>
                    <span>•</span>
                    <a href="/marathi/forts-by-category" class="hover:text-accent transition-colors">प्रकारानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-grade" class="hover:text-accent transition-colors">कठीणतेनुसार</a>
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
                    <div class="text-gray-600 dark:text-gray-300">जिल्हे</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $totalForts; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">एकूण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $uniqueRegions; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">प्रदेश</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">वर्षांचा इतिहास</div>
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
                            <i class="fas fa-search mr-2"></i>जिल्हा शोधा
                        </label>
                        <input 
                            type="text" 
                            id="districtSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white"
                            placeholder="जिल्ह्याचे नाव टाइप करा..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-globe mr-2"></i>प्रदेश निवडा
                        </label>
                        <select id="regionFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">सर्व प्रदेश</option>
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
                        <i class="fas fa-times mr-2"></i>साफ करा
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
                            <h2 class="text-4xl md:text-5xl font-bold"><?php echo $selectedDistrict['name']; ?> जिल्हा</h2>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>मागे
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedDistrict['description']; ?></p>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedDistrict['forts']); ?> किल्ले
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
                        <?php echo $selectedDistrict['name']; ?> जिल्ह्यातील <?php echo count($selectedDistrict['forts']); ?> किल्ले
                    </h3>
                    
                    <?php if (count($selectedDistrict['forts']) > 0): ?>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedDistrict['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">
                                        <?php echo htmlspecialchars($fort['nameMar']); ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-mountain mr-2 text-accent"></i>
                                        <span><?php echo htmlspecialchars($fort['type']); ?></span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-signal mr-2 text-accent"></i>
                                        <span><?php echo htmlspecialchars($fort['difficulty']); ?></span>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <a href="/fort/<?php echo $fort['slug']; ?>" 
                                       class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        माहिती
                                    </a>
                                    <a href="/trek/<?php echo $fort['slug']; ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fas fa-route mr-1"></i>
                                        ट्रेक
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-12">
                        <i class="fas fa-mountain text-6xl text-gray-400 mb-4"></i>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">या जिल्ह्यात किल्ले सापडले नाहीत</p>
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
                            महाराष्ट्रातील जिल्हे
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        प्रत्येक जिल्ह्यातील किल्ल्यांची संपूर्ण माहिती
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="districtGrid">
                    <?php foreach($districts as $key => $district): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:transform hover:-translate-y-2 hover:shadow-2xl searchable-district" 
                             data-name="<?php echo htmlspecialchars($district['name']); ?>"
                             data-region="<?php echo htmlspecialchars($district['region']); ?>">
                            
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
                                            <?php echo count($district['forts']); ?> किल्ले
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
                                        या जिल्ह्यातील प्रमुख किल्ले:
                                    </h4>
                                    <div class="flex flex-wrap gap-1">
                                        <?php 
                                        $displayForts = array_slice($district['forts'], 0, 4);
                                        foreach($displayForts as $fort): 
                                        ?>
                                            <span class="text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded">
                                                <?php echo htmlspecialchars($fort['nameMar']); ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (count($district['forts']) > 4): ?>
                                            <span class="text-xs bg-primary text-white px-2 py-1 rounded font-semibold">
                                                +<?php echo count($district['forts']) - 4; ?> अधिक
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <a href="?district=<?php echo urlencode($district['name']); ?>" 
                                   class="block w-full bg-primary hover:bg-secondary text-white text-center py-3 px-4 rounded-lg font-semibold transition-colors duration-300">
                                    सर्व किल्ले पहा
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- No Results Message (Initially Hidden) -->
                <div id="noResults" class="text-center py-20 hidden">
                    <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        कोणतेही जिल्हे सापडले नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        कृपया वेगळे कीवर्ड वापरून पुन्हा शोधा
                    </p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Additional Resources Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        अतिरिक्त माहिती
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">छत्रपती शिवाजी महाराज</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            महान मराठा योद्धा राजा शिवाजी महाराजांनी बांधलेले आणि जिंकलेले किल्ले महाराष्ट्राचा समृद्ध वारसा दर्शवतात.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-hiking text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">ट्रेकिंग मार्गदर्शन</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            सुरक्षित आणि आनंददायी साहस सुनिश्चित करण्यासाठी प्रत्येक किल्ल्यासाठी संपूर्ण ट्रेकिंग मार्गदर्शन आणि सुरक्षा सूचना.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                        <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-map text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">नकाशे आणि मार्ग</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            सविस्तर नकाशे, जीपीएस निर्देशांक आणि प्रत्येक किल्ल्यापर्यंत पोहोचण्यासाठी मार्ग माहिती.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        जिल्हा-निहाय किल्ला शोधक मार्गदर्शक
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        नकाशे, हवामान माहिती, स्थानिक वाहतूक आणि सांस्कृतिक अंतर्दृष्टीसह संपूर्ण जिल्हा-निहाय मार्गदर्शक
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/district-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            जिल्हा मार्गदर्शक डाउनलोड करा
                        </a>
                        <a href="/transportation" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-bus mr-2"></i>
                            वाहतूक माहिती
                        </a>
                        <a href="/local-culture" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-users mr-2"></i>
                            स्थानिक संस्कृती
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
                    इतर श्रेणींनुसार शोधा
                </span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/marathi/forts-alphabetical" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-secondary transition-colors">
                        <i class="fas fa-sort-alpha-down text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        मुळाक्षरानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        अ, आ, इ... क्रमाने
                    </p>
                </a>
                
                <a href="/marathi/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        डोंगररांगेनुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        सह्याद्री, पश्चिम घाट इ.
                    </p>
                </a>
                
                <a href="/marathi/forts-by-category" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        प्रकारानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        डोंगर, समुद्र किल्ले इ.
                    </p>
                </a>
                
                <a href="/marathi/forts-by-grade" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-signal text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        कठीणतेनुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        सोपे, मध्यम, कठीण इ.
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
    const searchInput = document.getElementById('districtSearch');
    const regionFilter = document.getElementById('regionFilter');
    const districtCards = document.querySelectorAll('.searchable-district');
    const districtGrid = document.getElementById('districtGrid');
    const noResults = document.getElementById('noResults');
    
    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedRegion = regionFilter.value.toLowerCase().trim();
        
        let visibleCount = 0;
        
        districtCards.forEach(function(card) {
            const districtName = card.dataset.name.toLowerCase();
            const region = card.dataset.region.toLowerCase();
            
            const searchMatch = searchTerm === '' || districtName.includes(searchTerm);
            const regionMatch = selectedRegion === '' || region === selectedRegion;
            
            if (searchMatch && regionMatch) {
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
            if (districtGrid) districtGrid.style.display = 'none';
            if (noResults) noResults.classList.remove('hidden');
        } else {
            if (districtGrid) districtGrid.style.display = 'grid';
            if (noResults) noResults.classList.add('hidden');
        }
    }
    
    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }
    
    if (regionFilter) {
        regionFilter.addEventListener('change', applyFilters);
    }
    
    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (regionFilter) regionFilter.value = '';
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
    const districtCardsAnimation = document.querySelectorAll('.searchable-district, .bg-gray-50');
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
    
    districtCardsAnimation.forEach(card => {
        cardObserver.observe(card);
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
    
    console.log('जिल्ह्यानुसार किल्ले (मराठी) पृष्ठ यशस्वीरित्या लोड झाले');
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
    
    .searchable-district {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    
    .searchable-district.hidden {
        opacity: 0;
        transform: scale(0.95);
    }
`;
document.head.appendChild(style);
</script>