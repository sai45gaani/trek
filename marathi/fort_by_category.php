<?php
// Set page specific variables
$page_title = 'प्रकारानुसार किल्ले - पर्वतीय, समुद्र व इतर किल्ले | Trekshitz';
$meta_description = 'महाराष्ट्रातील किल्ल्यांचे प्रकारानुसार संपूर्ण वर्गीकरण - पर्वतीय किल्ले, समुद्र किल्ले, भूदुर्ग आणि गुहा किल्ले. प्रत्येक प्रकारच्या किल्ल्यांची सविस्तर माहिती.';
$meta_keywords = 'पर्वतीय किल्ले, समुद्र किल्ले, भूदुर्ग, गुहा किल्ले, महाराष्ट्र किल्ले प्रकार, सह्याद्री किल्ले वर्गीकरण';

$categorySlugMap = [
    'hill-forts' => 'पर्वतीय किल्ले',
    'sea-forts'  => 'समुद्र किल्ले'
];

$categorySlugReverseMap = array_flip($categorySlugMap);

$currentSlug = $_GET['category'] ?? '';
$currentCategory = $categorySlugMap[$currentSlug] ?? '';
require_once './../config/database.php';
include './../includes/header_marathi.php';

$db = new Database();
$conn = $db->getConnection();

function normalizeFortTypeMarathi($type) {
    $type = trim(mb_strtolower($type, 'UTF-8'));
    $typeMap = [
        'पर्वतीय किल्ला' => 'पर्वतीय किल्ले',
        'डोंगर किल्ला' => 'पर्वतीय किल्ले',
        'डोंगरी किल्ला' => 'पर्वतीय किल्ले',
        'गिरीदुर्ग' => 'पर्वतीय किल्ले',
        'hill fort' => 'पर्वतीय किल्ले',
        'समुद्र किल्ला' => 'समुद्र किल्ले',
        'समुद्री किल्ला' => 'समुद्र किल्ले',
        'जलदुर्ग' => 'समुद्र किल्ले',
        'sea fort' => 'समुद्र किल्ले',
        'समुद्रकिनारी किल्ला' => 'समुद्रकिनारी किल्ले',
        'किनारी किल्ला' => 'समुद्रकिनारी किल्ले',
        'coastal fort' => 'समुद्रकिनारी किल्ले',
        'भूदुर्ग' => 'भूदुर्ग',
        'जमीनी किल्ला' => 'भूदुर्ग',
        'मैदानी किल्ला' => 'भूदुर्ग',
        'land fort' => 'भूदुर्ग',
        'गुहा किल्ला' => 'गुहा किल्ले',
        'गुफा किल्ला' => 'गुहा किल्ले',
        'cave fort' => 'गुहा किल्ले',
        'वनकिल्ला' => 'वनकिल्ले',
        'जंगली किल्ला' => 'वनकिल्ले',
        'forest fort' => 'वनकिल्ले',
        'नदी किल्ला' => 'जलकिल्ले',
        'water fort' => 'जलकिल्ले',
        'सीमांत किल्ला' => 'सीमांत किल्ले',
        'border fort' => 'सीमांत किल्ले'
    ];
    return $typeMap[$type] ?? 'पर्वतीय किल्ले';
}

function slugify($string) {
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    $string = preg_replace('/\s+/u', '-', trim($string));
    return mb_strtolower($string, 'UTF-8') . '-fort';
}

$categoryInfo = [
    'पर्वतीय किल्ले' => [
        'description' => 'धोरणात्मक फायद्यासाठी डोंगर आणि पर्वतांवर बांधलेले किल्ले',
        'icon' => 'fas fa-mountain',
        'difficulty_range' => 'सोपा ते अत्यंत कठीण',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'features' => ['धोरणात्मक डोंगर स्थाने', 'नैसर्गिक संरक्षणाचे फायदे', 'दरीचे विहंगम दृश्य', 'प्राचीन वास्तुकला', 'आव्हानात्मक ट्रेकिंग मार्ग'],
        'color' => 'bg-green-100 dark:bg-green-900'
    ],
    'समुद्र किल्ले' => [
        'description' => 'अरबी समुद्रातील खडकाळ टेकड्यांवर बांधलेले बेट किल्ले',
        'icon' => 'fas fa-anchor',
        'difficulty_range' => 'सोपा ते मध्यम',
        'best_season' => 'नोव्हेंबर ते फेब्रुवारी',
        'features' => ['नौदल धोरणात्मक महत्त्व', 'समुद्रातील बेट स्थान', 'बोटीने प्रवेश आवश्यक', 'सागरी वास्तुकला', 'समुद्री संरक्षण प्रणाली'],
        'color' => 'bg-blue-100 dark:bg-blue-900'
    ],
    'समुद्रकिनारी किल्ले' => [
        'description' => 'बंदरे आणि किनारे संरक्षित करण्यासाठी समुद्रकिनाऱ्यावर बांधलेले किल्ले',
        'icon' => 'fas fa-umbrella-beach',
        'difficulty_range' => 'सोपा ते मध्यम',
        'best_season' => 'नोव्हेंबर ते फेब्रुवारी',
        'features' => ['किनारी धोरणात्मक स्थाने', 'बंदर संरक्षण', 'समुद्रकिनारा प्रवेश उपलब्ध', 'व्यापार मार्ग नियंत्रण', 'सूर्यास्त दर्शनीय स्थळ'],
        'color' => 'bg-cyan-100 dark:bg-cyan-900'
    ],
    'वनकिल्ले' => [
        'description' => 'दाट जंगल आणि अरण्य प्रदेशात लपलेले किल्ले',
        'icon' => 'fas fa-tree',
        'difficulty_range' => 'मध्यम ते कठीण',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'features' => ['दाट वन आच्छादन', 'नैसर्गिक गुप्तता', 'वन्यजीव निवासस्थान', 'अनोखी जैवविविधता', 'साहसी ट्रेकिंग'],
        'color' => 'bg-emerald-100 dark:bg-emerald-900'
    ],
    'भूदुर्ग' => [
        'description' => 'प्रादेशिक नियंत्रणासाठी मैदान आणि पठारांवर बांधलेले किल्ले',
        'icon' => 'fas fa-city',
        'difficulty_range' => 'सोपा ते मध्यम',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'features' => ['धोरणात्मक मैदानी स्थाने', 'प्रशासकीय केंद्रे', 'शहरी किल्ला परिसर', 'व्यापार मार्ग नियंत्रण', 'सांस्कृतिक महत्त्व'],
        'color' => 'bg-yellow-100 dark:bg-yellow-900'
    ],
    'गुहा किल्ले' => [
        'description' => 'संरक्षणासाठी तटबंदी केलेल्या नैसर्गिक आणि कृत्रिम गुहा',
        'icon' => 'fas fa-archway',
        'difficulty_range' => 'सोपा ते कठीण',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'features' => ['नैसर्गिक गुहा प्रणाली', 'बौद्ध वारसा स्थळे', 'प्राचीन खडकात कोरीव वास्तुकला', 'पुरातत्व महत्त्व', 'धार्मिक महत्त्व'],
        'color' => 'bg-purple-100 dark:bg-purple-900'
    ],
    'जलकिल्ले' => [
        'description' => 'तलाव आणि नद्यांसारख्या जलस्रोतांभोवती बांधलेले किल्ले',
        'icon' => 'fas fa-water',
        'difficulty_range' => 'सोपा ते मध्यम',
        'best_season' => 'नोव्हेंबर ते फेब्रुवारी',
        'features' => ['जलस्रोत एकत्रीकरण', 'अनोखी प्रवेश आव्हाने', 'नैसर्गिक सौंदर्य', 'अभियांत्रिकी चमत्कार', 'पावसाळी आकर्षणे'],
        'color' => 'bg-teal-100 dark:bg-teal-900'
    ],
    'सीमांत किल्ले' => [
        'description' => 'प्रादेशिक सीमांवर बांधलेले धोरणात्मक किल्ले',
        'icon' => 'fas fa-flag',
        'difficulty_range' => 'सोपा ते कठीण',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'features' => ['धोरणात्मक सीमा स्थाने', 'बहु-राज्य महत्त्व', 'व्यापार मार्ग निरीक्षण', 'सांस्कृतिक देवाणघेवाण बिंदू', 'ऐतिहासिक महत्त्व'],
        'color' => 'bg-red-100 dark:bg-red-900'
    ]
];

$fortCategories = [];
$query = "SELECT FortTypeMar, FortNameMar, FortName 
          FROM mi_tblfortinfo_unicode 
          WHERE FortTypeMar IS NOT NULL 
          AND FortTypeMar != '' 
          AND FortNameMar IS NOT NULL 
          ORDER BY FortTypeMar, FortNameMar";

$result = $conn->query($query);
$typeData = [];

while ($row = $result->fetch_assoc()) {
    $type = normalizeFortTypeMarathi($row['FortTypeMar']);
    $fortNameMar = trim($row['FortNameMar']);
    $fortNameEng = trim($row['FortName']);
    
    if (!empty($type) && !empty($fortNameMar)) {
        if (!isset($typeData[$type])) {
            $typeData[$type] = [];
        }
        $typeData[$type][] = [
            'nameMar' => $fortNameMar,
            'nameEng' => $fortNameEng
        ];
    }
}

foreach ($typeData as $typeName => $forts) {
    $info = $categoryInfo[$typeName] ?? [
        'description' => $typeName . " च्या " . count($forts) . " ऐतिहासिक स्थळांसह किल्ले",
        'icon' => 'fas fa-fort-awesome',
        'difficulty_range' => 'बदलते',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'features' => ['ऐतिहासिक महत्त्व', 'सांस्कृतिक वारसा', 'वास्तुकला सौंदर्य', 'ट्रेकिंग संधी', 'निसर्गरम्य स्थाने'],
        'color' => 'bg-gray-100 dark:bg-gray-900'
    ];
    
    $fortCategories[$typeName] = [
        'name' => $typeName,
        'description' => $info['description'],
        'forts' => $forts,
        'total_count' => count($forts),
        'icon' => $info['icon'],
        'difficulty_range' => $info['difficulty_range'],
        'best_season' => $info['best_season'],
        'features' => $info['features'],
        'color' => $info['color']
    ];
}

//$currentCategory = isset($_GET['category']) ? $_GET['category'] : '';
$selectedCategory = $currentCategory && isset($fortCategories[$currentCategory]) ? $fortCategories[$currentCategory] : null;

$totalForts = array_sum(array_map(function($cat) { return $cat['total_count']; }, $fortCategories));
$hillFortsCount = isset($fortCategories['पर्वतीय किल्ले']) ? $fortCategories['पर्वतीय किल्ले']['total_count'] : 0;
$seaFortsCount = isset($fortCategories['समुद्र किल्ले']) ? $fortCategories['समुद्र किल्ले']['total_count'] : 0;
?>

<main id="main-content" class="">
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    <span class="text-accent">प्रकारानुसार</span> किल्ले
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    महाराष्ट्रातील विविध प्रकारचे किल्ले - पर्वतीय, समुद्र, भू, गुहा आणि अधिक
                </p>
               <div class="flex flex-wrap justify-center gap-3 text-sm">

                    <!-- Alphabetical -->
                    <a href="./fort_information.php"
                    class="px-5 py-2 rounded-full bg-orange-500/20 text-white border border-orange-300 
                    hover:bg-white hover:text-orange-600 transition shadow tracking-wide">
                        मुळाक्षरानुसार
                    </a>

                    <!-- Mountain Range -->
                    <a href="./fort_by_range.php"
                    class="px-5 py-2 rounded-full bg-orange-500/20 text-white border border-orange-300 
                    hover:bg-white hover:text-orange-600 transition shadow tracking-wide">
                        डोंगररांगेनुसार
                    </a>

                    <!-- District -->
                    <a href="./fort_by_district.php"
                    class="px-5 py-2 rounded-full bg-orange-500/20 text-white border border-orange-300 
                    hover:bg-white hover:text-orange-600 transition shadow tracking-wide">
                        जिल्ह्यानुसार
                    </a>

                    <!-- Active Tab -->
                    <span class="px-5 py-2 rounded-full bg-white text-orange-600 font-semibold shadow-md border border-orange-400 tracking-wide">
                        प्रकारानुसार
                    </span>

                    <!-- Difficulty -->
                    <a href="./fort_by_grade.php"
                    class="px-5 py-2 rounded-full bg-orange-500/20 text-white border border-orange-300 
                    hover:bg-white hover:text-orange-600 transition shadow tracking-wide">
                        कठीणतेनुसार
                    </a>

                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($fortCategories); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">किल्ले प्रकार</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $totalForts; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">एकूण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $hillFortsCount; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">पर्वतीय किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $seaFortsCount; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">समुद्र किल्ले</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 mb-8">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                  <!--  <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2 text-accent"></i>किल्ला प्रकार शोधा
                        </label>
                        <input type="text" id="categorySearch" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white transition-all duration-300" placeholder="प्रकाराचे नाव टाइप करा..." autocomplete="off">
                    </div>-->
                    <!--<div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-signal mr-2 text-accent"></i>कठीणता निवडा
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white transition-all duration-300">
                            <option value="">सर्व कठीणता</option>
                            <option value="सोपा">सोपा</option>
                            <option value="मध्यम">मध्यम</option>
                            <option value="कठीण">कठीण</option>
                            <option value="अत्यंत कठीण">अत्यंत कठीण</option>
                        </select>
                    </div>-->
                    <!--<div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2 text-accent"></i>उत्तम हंगाम
                        </label>
                        <select id="seasonFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-accent dark:bg-gray-700 dark:text-white transition-all duration-300">
                            <option value="">सर्व हंगाम</option>
                            <option value="ऑक्टोबर ते मार्च">ऑक्टोबर ते मार्च</option>
                            <option value="नोव्हेंबर ते फेब्रुवारी">नोव्हेंबर ते फेब्रुवारी</option>
                        </select>
                    </div>-->
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-signal mr-2 text-accent"></i>Select Category
                        </label>
                        <select id="CategoryFilter" name="category"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600
                            rounded-lg focus:ring-2 focus:ring-accent focus:border-accent
                            dark:bg-gray-700 dark:text-white transition-all duration-300">

                        <option value="">सर्व प्रकार</option>

                        <option value="hill-forts" <?= $currentSlug === 'hill-forts' ? 'selected' : '' ?>>
                            पर्वतीय किल्ले
                        </option>

                        <option value="sea-forts" <?= $currentSlug === 'sea-forts' ? 'selected' : '' ?>>
                            समुद्र किल्ले
                        </option>

                    </select>

                    </div>
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors duration-300">
                        <i class="fas fa-times mr-2"></i>साफ करा
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedCategory): ?>
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl mb-8">
                <div class="flex flex-col lg:flex-row items-start justify-between mb-6">
                    <div class="flex items-center gap-4 mb-4 lg:mb-0">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center">
                            <i class="<?php echo $selectedCategory['icon']; ?> text-3xl text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-4xl md:text-5xl font-bold mb-2"><?php echo $selectedCategory['name']; ?></h2>
                            <p class="text-xl opacity-90"><?php echo $selectedCategory['description']; ?></p>
                        </div>
                    </div>
                    <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-arrow-left mr-2"></i>परत
                    </a>
                </div>
                <div class="flex flex-wrap gap-3 mb-6">
                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-fort-awesome"></i> <?php echo $selectedCategory['total_count']; ?> किल्ले
                    </span>
                    <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-signal"></i> <?php echo $selectedCategory['difficulty_range']; ?>
                    </span>
                    <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fas fa-calendar"></i> <?php echo $selectedCategory['best_season']; ?>
                    </span>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-bold mb-3">मुख्य वैशिष्ट्ये:</h3>
                        <ul class="space-y-2">
                            <?php foreach($selectedCategory['features'] as $feature): ?>
                            <li class="flex items-center text-white opacity-90">
                                <i class="fas fa-check text-accent mr-2"></i><?php echo $feature; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl">
                <h3 class="text-3xl font-bold mb-8 text-center">
                    महाराष्ट्रातील <?php echo $selectedCategory['total_count']; ?> <?php echo $selectedCategory['name']; ?>
                </h3>
                <?php if(count($selectedCategory['forts']) > 0): ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php foreach($selectedCategory['forts'] as $fort): ?>
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-xl transition-all flex flex-col h-full p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-bold"><?php echo htmlspecialchars($fort['nameMar']); ?></h4>
                            <i class="<?php echo $selectedCategory['icon']; ?> text-accent text-xl"></i>
                        </div>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-tag mr-2 text-accent"></i>
                                <span><?php echo $selectedCategory['name']; ?></span>
                            </div>
                        </div>
                        <div class="flex gap-2 mt-auto">
                            <a href="./fort/index.php?slug=<?php echo slugify($fort['nameEng']); ?>" class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2 px-3 rounded-lg text-sm">
                                <i class="fas fa-info-circle mr-1"></i>माहिती
                            </a>
                           <!-- <a href="/trek/<?php echo slugify($fort['nameEng']); ?>" class="flex-1 bg-accent hover:bg-primary text-white text-center py-2 px-3 rounded-lg text-sm">
                                <i class="fas fa-route mr-1"></i>ट्रेक
                            </a>-->
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php else: ?>
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        महाराष्ट्रातील किल्ल्यांचे प्रकार
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    त्यांच्या स्थान आणि उद्देशानुसार विविध प्रकारचे किल्ले शोधा
                </p>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8" id="categoryGrid">
                <?php foreach($fortCategories as $key => $category): ?>
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:border-accent group searchable-category flex flex-col h-full p-6" 
                     data-name="<?php echo $category['name']; ?>"
                     data-difficulty="<?php echo $category['difficulty_range']; ?>"
                     data-season="<?php echo $category['best_season']; ?>">
                    
                    <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent text-white rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="<?php echo $category['icon']; ?> text-2xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-center mb-3"><?php echo $category['name']; ?></h3>
                    <p class="text-gray-600 dark:text-gray-300 text-center mb-6"><?php echo $category['description']; ?></p>
                    
                    <div class="grid grid-cols-3 gap-3 mb-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg text-center">
                            <div class="text-2xl font-bold text-primary dark:text-accent"><?php echo $category['total_count']; ?></div>
                            <div class="text-xs text-gray-600 dark:text-gray-400">एकूण किल्ले</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg text-center">
                            <div class="text-lg font-bold text-accent"><i class="fas fa-signal"></i></div>
                            <div class="text-xs text-gray-600 dark:text-gray-400">कठीणता</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg text-center">
                            <div class="text-lg font-bold text-secondary"><i class="fas fa-calendar"></i></div>
                            <div class="text-xs text-gray-600 dark:text-gray-400">हंगाम</div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <i class="fas fa-star text-accent mr-2"></i>मुख्य वैशिष्ट्ये:
                        </h4>
                        <ul class="space-y-1">
                            <?php foreach(array_slice($category['features'], 0, 3) as $feature): ?>
                            <li class="text-sm text-gray-600 dark:text-gray-300 flex items-center">
                                <i class="fas fa-check text-accent mr-2 text-xs"></i><?php echo $feature; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <i class="fas fa-fort-awesome text-accent mr-2"></i>लोकप्रिय किल्ले:
                        </h4>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach(array_slice($category['forts'], 0, 6) as $fort): ?>
                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-md text-xs border hover:bg-primary hover:text-white transition-all cursor-pointer" title="<?php echo htmlspecialchars($fort['nameMar']); ?>">
                                <?php echo mb_strlen($fort['nameMar'], 'UTF-8') > 12 ? mb_substr($fort['nameMar'], 0, 12, 'UTF-8') . '...' : $fort['nameMar']; ?>
                            </span>
                            <?php endforeach; ?>
                            <?php if(count($category['forts']) > 6): ?>
                            <span class="text-xs text-gray-500 px-2 py-1 bg-gray-50 dark:bg-gray-600 rounded-md">
                                +<?php echo count($category['forts']) - 6; ?> अधिक
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="space-y-3 mt-auto">
                    <a href="?category=<?php echo $categorySlugReverseMap[$key] ?? ''; ?>" class="block w-full bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg font-semibold transition-all text-center">
                        <?php echo $category['name']; ?> पहा
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div id="noResults" class="text-center py-20 hidden">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-search text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        किल्ल्याचे प्रकार आढळले नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg mb-6">
                        कृपया पुन्हा शोधण्यासाठी भिन्न मुख्यशब्द वापरा
                    </p>
                    <button onclick="clearFilters()" class="bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg font-semibold">
                        फिल्टर साफ करा
                    </button>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Additional Information Section -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            किल्ल्यांचे प्रकार समजून घ्या
                        </span>
                    </h2>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                        
                        <!-- Hill Forts -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-transform hover:scale-110">
                                <i class="fas fa-mountain text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">डोंगरी किल्ले</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                उंच डोंगरावर बांधलेले किल्ले लष्करी दृष्टिकोनातून अत्यंत महत्त्वाचे होते.
                                घाटमार्गांवर नियंत्रण ठेवण्यासाठी आणि शत्रूच्या हालचालींवर नजर ठेवण्यासाठी
                                या किल्ल्यांचा मोठ्या प्रमाणावर उपयोग केला जात असे.
                            </p>
                        </div>
                        
                        <!-- Sea Forts -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-transform hover:scale-110">
                                <i class="fas fa-anchor text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">सागरी किल्ले</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                समुद्रकिनाऱ्यावर किंवा समुद्रात उभारलेले सागरी किल्ले बंदरे सुरक्षित ठेवण्यासाठी
                                आणि सागरी व्यापारावर नियंत्रण मिळवण्यासाठी बांधले गेले.
                                हे किल्ले नौदल अभियांत्रिकीचे उत्तम उदाहरण आहेत.
                            </p>
                        </div>
                        
                        <!-- Cave Forts -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-transform hover:scale-110">
                                <i class="fas fa-archway text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">गुंफा किल्ले</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                नैसर्गिक किंवा मानवनिर्मित गुंफांमध्ये बांधलेले किल्ले संरक्षणासोबतच
                                धार्मिक आणि सांस्कृतिक कारणांसाठी वापरले जात.
                                अनेक गुंफा किल्ल्यांमध्ये प्राचीन बौद्ध लेणी आणि दगडी कोरीव काम आढळते.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    <?php include './our_more_about_fort_info.php'; ?>

</main>

<?php include './../includes/footer_marathi.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
        
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
    
    if (searchInput) searchInput.addEventListener('input', filterCategories);
    if (difficultyFilter) difficultyFilter.addEventListener('change', filterCategories);
    if (seasonFilter) seasonFilter.addEventListener('change', filterCategories);
    
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (difficultyFilter) difficultyFilter.value = '';
        if (seasonFilter) seasonFilter.value = '';
        filterCategories();
    };
    
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
    
    animateNumbers();
    
    console.log('प्रकारानुसार किल्ले (डेटाबेस-चालित) पृष्ठ यशस्वीरित्या लोड झाले');
});

const categoryFilter = document.getElementById('CategoryFilter');
const filterButton = document.getElementById('applyFilter');

function applyCategoryFilter() {
    const category = categoryFilter.value;

    if (category) {
        window.location.href = `fort_by_category.php?category=${category}`;
    } else {
        window.location.href = 'fort_by_category.php';
    }
}

// Filter button click
if (filterButton) {
    filterButton.addEventListener('click', function () {
        applyCategoryFilter();
    });
}

// Enter key support
if (categoryFilter) {
    categoryFilter.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            applyCategoryFilter();
        }
    });
}

</script>