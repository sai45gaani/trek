<?php
// Set page specific variables
$page_title = 'कठीणतेनुसार किल्ले - ट्रेकिंग स्तर | Trekshitz';
$meta_description = 'महाराष्ट्रातील सोपे, मध्यम, कठीण आणि अत्यंत कठीण किल्ले. आपल्या ट्रेकिंग अनुभव आणि फिटनेस स्तरानुसार किल्ले शोधा.';
$meta_keywords = 'किल्ल्यांची श्रेणी, ट्रेकिंग कठीणता, सोपे किल्ले, कठीण किल्ले, श्रेणी प्रणाली, किल्ला वर्गीकरण';

require_once './../config/database.php';
// Include header
include './../includes/header_marathi.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Predefined grade information in Marathi
$gradeInfo = [
    'सोपी' => [
        'description' => 'नवशिक्यांसाठी योग्य - किमान तांत्रिक कौशल्याची आवश्यकता',
        'icon' => 'fa-smile',
        'duration' => '२-४ तास',
        'experience' => 'नवशिक्या',
        'equipment' => 'मूलभूत ट्रेकिंग साधने',
        'tips' => 'पाणी आणि स्नॅक्स सोबत घ्या, योग्य बूट घाला'
    ],
    'मध्यम' => [
        'description' => 'मध्यम अनुभव आवश्यक - काही तांत्रिक भाग आणि चढाई',
        'icon' => 'fa-meh',
        'duration' => '४-६ तास',
        'experience' => 'मध्यम',
        'equipment' => 'ट्रेकिंग खांबे, हेल्मेट, प्रथमोपचार',
        'tips' => 'मार्गदर्शकासोबत जा, हवामान तपासा'
    ],
    'कठीण' => [
        'description' => 'अनुभवी ट्रेकर्ससाठी - तांत्रिक चढाई आणि खडक चढाई आवश्यक',
        'icon' => 'fa-frown',
        'duration' => '६-८ तास',
        'experience' => 'अनुभवी',
        'equipment' => 'खडक चढाई साधने, दोरी, हार्नेस',
        'tips' => 'गटात जा, तज्ञांसोबत चढा, सुरक्षा साधने वापरा'
    ],
    'अत्यंत कठीण' => [
        'description' => 'केवळ तज्ञांसाठी - अत्यंत धोकादायक आणि तांत्रिक चढाई',
        'icon' => 'fa-skull',
        'duration' => '८+ तास',
        'experience' => 'तज्ञ',
        'equipment' => 'संपूर्ण चढाई साधने, बचाव उपकरणे',
        'tips' => 'फक्त तज्ञांसोबत, चांगले हवामान आवश्यक, आपत्कालीन योजना ठेवा'
    ]
];

// Slug generation function
function slugify($string) {
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    $string = preg_replace('/\s+/u', '-', trim($string));
    return mb_strtolower($string) . '-fort';
}

// Build grade data from database
$gradeData = [];

// Initialize empty arrays for each grade
foreach ($gradeInfo as $gradeName => $info) {
    $gradeData[$gradeName] = array_merge([
        'name' => $gradeName,
        'forts' => [],
        'color' => ''
    ], $info);
}

// Set colors for each grade
$gradeData['सोपी']['color'] = 'bg-green-100 dark:bg-green-900';
$gradeData['मध्यम']['color'] = 'bg-yellow-100 dark:bg-yellow-900';
$gradeData['कठीण']['color'] = 'bg-orange-100 dark:bg-orange-900';
$gradeData['अत्यंत कठीण']['color'] = 'bg-red-100 dark:bg-red-900';

// Query to get all forts with their grades from Marathi table
$query = "SELECT FortName, FortNameMar, GradeMar, FortTypeMar 
          FROM mi_tblfortinfo_unicode 
          WHERE FortNameMar IS NOT NULL 
          AND GradeMar IS NOT NULL 
          AND GradeMar != ''
          ORDER BY GradeMar, FortNameMar";

$result = $conn->query($query);

// Group forts by grade
while ($row = $result->fetch_assoc()) {
    $fortNameMar = trim($row['FortNameMar']);
    $fortNameEng = trim($row['FortName']);
    $gradeMar = trim($row['GradeMar']);
    $fortType = trim($row['FortTypeMar'] ?? 'डोंगर किल्ला');
    
    if (!empty($fortNameMar) && isset($gradeData[$gradeMar])) {
        $gradeData[$gradeMar]['forts'][] = [
            'nameMar' => $fortNameMar,
            'nameEng' => $fortNameEng,
            'slug' => slugify($fortNameEng),
            'type' => $fortType
        ];
    }
}

// Get current grade from URL parameter
$currentGrade = isset($_GET['grade']) ? $_GET['grade'] : '';
$selectedGrade = $currentGrade && isset($gradeData[$currentGrade]) ? $gradeData[$currentGrade] : null;

// Calculate total forts
$totalForts = array_sum(array_map(function($grade) { return count($grade['forts']); }, $gradeData));
?>

<main id="main-content" class="">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"grade-pattern\" x=\"0\" y=\"0\" width=\"25\" height=\"25\" patternUnits=\"userSpaceOnUse\"><rect x=\"10\" y=\"0\" width=\"5\" height=\"25\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"0\" y=\"10\" width=\"25\" height=\"5\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23grade-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    कठीणतेनुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    कठीणता स्तरानुसार व्यवस्थित केलेल्या महाराष्ट्रातील किल्ल्यांची संपूर्ण माहिती
                </p>
                <p class="text-lg mb-8 opacity-80">
                    सर्व अनुभव स्तरांसाठी सोपी, मध्यम, कठीण आणि अत्यंत कठीण श्रेणीचे किल्ले
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/marathi/forts-alphabetical" class="hover:text-accent transition-colors">मुळाक्षरानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-range" class="hover:text-accent transition-colors">डोंगररांगेनुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-district" class="hover:text-accent transition-colors">जिल्ह्यानुसार</a>
                     <span>•</span>
                    <a href="./fort_by_category_marathi.php" class="hover:text-accent transition-colors">प्रकारानुसार</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">कठीणतेनुसार</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-green-500 mb-2 animate-number" data-target="<?php echo count($gradeData['सोपी']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">सोपी किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-yellow-500 mb-2 animate-number" data-target="<?php echo count($gradeData['मध्यम']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">मध्यम किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-orange-500 mb-2 animate-number" data-target="<?php echo count($gradeData['कठीण']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">कठीण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-red-500 mb-2 animate-number" data-target="<?php echo count($gradeData['अत्यंत कठीण']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">अत्यंत कठीण</div>
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
                            <i class="fas fa-search mr-2"></i>किल्ला शोधा
                        </label>
                        <input 
                            type="text" 
                            id="gradeSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white"
                            placeholder="किल्ल्याचे नाव टाइप करा..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-signal mr-2"></i>कठीणता निवडा
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">सर्व श्रेणी</option>
                            <option value="सोपी">सोपी</option>
                            <option value="मध्यम">मध्यम</option>
                            <option value="कठीण">कठीण</option>
                            <option value="अत्यंत कठीण">अत्यंत कठीण</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>साफ करा
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedGrade): ?>
        <!-- Detailed Grade View -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <?php
                $gradeColorMap = [
                    'सोपी' => 'from-green-500 to-green-600',
                    'मध्यम' => 'from-yellow-500 to-yellow-600',
                    'कठीण' => 'from-orange-500 to-orange-600',
                    'अत्यंत कठीण' => 'from-red-500 to-red-600'
                ];
                $gradientClass = $gradeColorMap[$selectedGrade['name']] ?? 'from-primary to-secondary';
                ?>
                
                <div class="bg-gradient-to-r <?php echo $gradientClass; ?> text-white p-8 rounded-2xl mb-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-48 h-48 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <polygon points="20,80 50,20 80,80" fill="white"/>
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-4xl md:text-5xl font-bold"><?php echo $selectedGrade['name']; ?> श्रेणीचे किल्ले</h2>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>मागे
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedGrade['description']; ?></p>
                        <div class="grid md:grid-cols-4 gap-4">
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">कालावधी</div>
                                <div class="font-semibold"><?php echo $selectedGrade['duration']; ?></div>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">अनुभव</div>
                                <div class="font-semibold"><?php echo $selectedGrade['experience']; ?></div>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">किल्ले</div>
                                <div class="font-semibold"><?php echo count($selectedGrade['forts']); ?></div>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">साधने</div>
                                <div class="font-semibold text-xs"><?php echo $selectedGrade['equipment']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">
                        या श्रेणीत <?php echo count($selectedGrade['forts']); ?> किल्ले
                    </h3>
                    
                    <?php if (count($selectedGrade['forts']) > 0): ?>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedGrade['forts'] as $fort): ?>
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
                                        <span><?php echo $selectedGrade['name']; ?> श्रेणी</span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-clock mr-2 text-accent"></i>
                                        <span><?php echo $selectedGrade['duration']; ?></span>
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
                        <p class="text-gray-600 dark:text-gray-400 text-lg">या श्रेणीत किल्ले सापडले नाहीत</p>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Tips Section -->
                    <div class="mt-8 bg-blue-50 dark:bg-blue-900 p-6 rounded-xl">
                        <h4 class="text-lg font-bold text-blue-800 dark:text-blue-200 mb-3">
                            <i class="fas fa-lightbulb mr-2"></i>महत्त्वाच्या सूचना
                        </h4>
                        <p class="text-blue-700 dark:text-blue-300"><?php echo $selectedGrade['tips']; ?></p>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Grade Categories Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            कठीणता श्रेणी
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        आपल्या अनुभव स्तरावर आधारित योग्य श्रेणी निवडा
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8" id="gradeGrid">
                    <?php foreach($gradeData as $key => $grade): ?>
                        <?php
                        $iconColorMap = [
                            'सोपी' => 'bg-green-500',
                            'मध्यम' => 'bg-yellow-500',
                            'कठीण' => 'bg-orange-500',
                            'अत्यंत कठीण' => 'bg-red-500'
                        ];
                        $iconColor = $iconColorMap[$grade['name']] ?? 'bg-primary';
                        ?>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:transform hover:scale-105 searchable-grade" 
                             data-name="<?php echo htmlspecialchars($grade['name']); ?>">
                            
                            <div class="h-1 bg-gradient-to-r from-primary to-accent"></div>
                            
                            <div class="p-8">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 <?php echo $iconColor; ?> rounded-full flex items-center justify-center mr-4">
                                        <i class="fas <?php echo $grade['icon']; ?> text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">
                                            <?php echo $grade['name']; ?>
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo count($grade['forts']); ?> किल्ले
                                        </p>
                                    </div>
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                    <?php echo $grade['description']; ?>
                                </p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                                    <div>
                                        <div class="text-gray-500 dark:text-gray-400">कालावधी</div>
                                        <div class="font-semibold text-gray-800 dark:text-white"><?php echo $grade['duration']; ?></div>
                                    </div>
                                    <div>
                                        <div class="text-gray-500 dark:text-gray-400">अनुभव स्तर</div>
                                        <div class="font-semibold text-gray-800 dark:text-white"><?php echo $grade['experience']; ?></div>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        काही उदाहरणे:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach(array_slice($grade['forts'], 0, 4) as $fort): ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer">
                                                <?php echo htmlspecialchars($fort['nameMar']); ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if(count($grade['forts']) > 4): ?>
                                            <span class="text-gray-500 text-xs">+<?php echo count($grade['forts']) - 4; ?> अधिक</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-shield-alt mr-1"></i>
                                        सुरक्षा मार्गदर्शन
                                    </span>
                                    
                                    <a href="?grade=<?php echo urlencode($key); ?>" 
                                       class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 text-sm group">
                                        तपशील पहा
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
                        कोणतेही परिणाम सापडले नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        कृपया वेगळे कीवर्ड वापरून पुन्हा शोधा
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
                    इतर श्रेणींनुसार शोधा
                </span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/marathi/forts-alphabetical" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
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
                
                <a href="/marathi/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
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
                
                <a href="/marathi/forts-by-district" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        जिल्ह्यानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        पुणे, मुंबई, नाशिक इ.
                    </p>
                </a>
                
                <a href="/marathi/forts-by-category" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        प्रकारानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        डोंगर, समुद्र किल्ले इ.
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- Safety and Tips Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        ट्रेकिंग मार्गदर्शक तत्त्वे
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <?php foreach($gradeData as $grade): ?>
                    <?php
                    $iconColorMap = [
                        'सोपी' => 'bg-green-500',
                        'मध्यम' => 'bg-yellow-500',
                        'कठीण' => 'bg-orange-500',
                        'अत्यंत कठीण' => 'bg-red-500'
                    ];
                    $iconColor = $iconColorMap[$grade['name']] ?? 'bg-primary';
                    ?>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 <?php echo $iconColor; ?> rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas <?php echo $grade['icon']; ?> text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white"><?php echo $grade['name']; ?> ट्रेक्स</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            <?php echo $grade['description']; ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        सुरक्षा सूचना
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        ट्रेकिंगपूर्वी सर्व सुरक्षा मार्गदर्शक तत्त्वे वाचा आणि पुरेशी तयारी करा
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/safety-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-shield-alt mr-2"></i>
                            सुरक्षा मार्गदर्शन
                        </a>
                        <a href="/equipment-guide" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-tools mr-2"></i>
                            साधने यादी
                        </a>
                        <a href="/weather-info" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-cloud-sun mr-2"></i>
                            हवामान माहिती
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './../includes/footer_marathi.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('gradeSearch');
    const difficultyFilter = document.getElementById('difficultyFilter');
    const gradeCards = document.querySelectorAll('.searchable-grade');
    const noResults = document.getElementById('noResults');
    const gradeGrid = document.getElementById('gradeGrid');
    
    function filterGrades() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const selectedDifficulty = difficultyFilter ? difficultyFilter.value.toLowerCase().trim() : '';
        let visibleCount = 0;
        
        gradeCards.forEach(function(card) {
            const gradeName = card.dataset.name.toLowerCase();
            
            const matchesSearch = !searchTerm || gradeName.includes(searchTerm);
            const matchesDifficulty = !selectedDifficulty || gradeName.includes(selectedDifficulty);
            
            if (matchesSearch && matchesDifficulty) {
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
            if (noResults) noResults.classList.remove('hidden');
            if (gradeGrid) gradeGrid.style.display = 'none';
        } else {
            if (noResults) noResults.classList.add('hidden');
            if (gradeGrid) gradeGrid.style.display = 'grid';
        }
        
        updateResultsCount(visibleCount);
    }
    
    function updateResultsCount(count) {
        console.log(`${count} कठीणता श्रेणी दाखवत आहे`);
    }
    
    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterGrades);
    }
    
    if (difficultyFilter) {
        difficultyFilter.addEventListener('change', filterGrades);
    }
    
    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (difficultyFilter) difficultyFilter.value = '';
        filterGrades();
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
        const increment = target / 30;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 50);
    }
    
    // Initialize animations
    animateNumbers();
    
    // Add loading animation to cards
    const gradeCardsAnimation = document.querySelectorAll('.searchable-grade, .bg-white');
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
    
    gradeCardsAnimation.forEach(card => {
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
    
    console.log('कठीणतेनुसार किल्ले (मराठी) पृष्ठ यशस्वीरित्या लोड झाले');
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
    
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    .searchable-grade {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    
    .searchable-grade.hidden {
        opacity: 0;
        transform: scale(0.95);
    }
`;
document.head.appendChild(style);
</script>