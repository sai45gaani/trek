<?php
// Set page specific variables
$page_title = 'श्रेणीनुसार किल्ले - कठिणाई स्तरानुसार | Trekshitz';
$meta_description = 'सोपे, मध्यम, कठीण आणि अत्यंत कठीण श्रेणीनुसार महाराष्ट्रातील किल्ल्यांची यादी. ट्रेकिंग कठिणाई स्तरानुसार किल्ले शोधा.';
$meta_keywords = 'किल्ले श्रेणी, ट्रेकिंग कठिणाई, सोपे किल्ले, कठीण किल्ले, ग्रेडिंग सिस्टम';

// Include header
include './includes/header.php';

// Complete grade-wise forts data
$gradeData = [
    'सोपा' => [
        'name' => 'सोपा',
        'description' => 'नवशिक्यांसाठी योग्य किल्ले - कमी तांत्रिक कौशल्य आवश्यक',
        'forts' => ['सिंधुदुर्ग', 'जयगड', 'विकतगड', 'अर्नाळा', 'कुलाबा', 'कोकणकडा', 'सुवर्णदुर्ग', 'श्रीवर्धन', 'हरिहरगड', 'अशेरी', 'मुरुडगड', 'कंडक गड'],
        'color' => 'bg-green-100 dark:bg-green-900',
        'icon' => 'fa-smile',
        'duration' => '2-4 तास',
        'experience' => 'नवशिक्या',
        'equipment' => 'मूलभूत ट्रेकिंग गियर',
        'tips' => 'पाणी आणि स्नॅक्स घ्या, योग्य शूज वापरा'
    ],
    'मध्यम' => [
        'name' => 'मध्यम', 
        'description' => 'मध्यम अनुभव आवश्यक - काही तांत्रिक भाग आणि चढाई',
        'forts' => ['रायगड', 'प्रतापगड', 'सिंहगड', 'लोहगड', 'भाजे', 'कार्ला', 'तोरणा', 'पुरंदर', 'शिवनेरी', 'दौलतगिरी', 'हडसर', 'कोंढाणा'],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'icon' => 'fa-meh',
        'duration' => '4-6 तास',
        'experience' => 'मध्यम अनुभव',
        'equipment' => 'ट्रेकिंग पोल, हेल्मेट, फर्स्ट एड',
        'tips' => 'मार्गदर्शकासोबत जा, हवामानाची तपासणी करा'
    ],
    'कठीण' => [
        'name' => 'कठीण',
        'description' => 'अनुभवी ट्रेकर्ससाठी - तांत्रिक चढाई आणि रॉक क्लाइंबिंग',
        'forts' => ['मदन', 'कल्याणगड', 'भैरवगड', 'महुली', 'धक', 'इरशालगड', 'कोतलीगड', 'गेहू', 'चंद्रगड', 'रामशेज', 'आवंडगड', 'अवंडगड'],
        'color' => 'bg-orange-100 dark:bg-orange-900',
        'icon' => 'fa-frown',
        'duration' => '6-8 तास',
        'experience' => 'अनुभवी',
        'equipment' => 'रॉक क्लाइंबिंग गियर, रोप, हार्नेस',
        'tips' => 'गटात जा, तज्ञांसोबत चढा, सुरक्षा उपकरणे वापरा'
    ],
    'अत्यंत कठीण' => [
        'name' => 'अत्यंत कठीण',
        'description' => 'तज्ञांसाठी - अत्यंत धोकादायक आणि तांत्रिक चढाई',
        'forts' => ['अलंग', 'मदनगड-कल्याणगड', 'कुलंग', 'रतनगड', 'अंधेरी', 'राम', 'व्यापारगड', 'नाणेघाट', 'केळवे', 'तुंगी', 'तिकोना', 'घोरपडे'],
        'color' => 'bg-red-100 dark:bg-red-900',
        'icon' => 'fa-skull',
        'duration' => '8+ तास',
        'experience' => 'तज्ञ',
        'equipment' => 'संपूर्ण क्लाइंबिंग गियर, रेस्क्यू उपकरणे',
        'tips' => 'फक्त तज्ञांसोबत, हवामान चांगले असावे, इमर्जन्सी प्लॅन ठेवा'
    ]
];

// Get current grade from URL parameter
$currentGrade = isset($_GET['grade']) ? $_GET['grade'] : '';
$selectedGrade = $currentGrade && isset($gradeData[$currentGrade]) ? $gradeData[$currentGrade] : null;
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"grade-pattern\" x=\"0\" y=\"0\" width=\"25\" height=\"25\" patternUnits=\"userSpaceOnUse\"><rect x=\"10\" y=\"0\" width=\"5\" height=\"25\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"0\" y=\"10\" width=\"25\" height=\"5\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23grade-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    श्रेणीनुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up font-devanagari">
                    कठिणाई स्तरानुसार महाराष्ट्रातील किल्ल्यांची संपूर्ण माहिती
                </p>
                <p class="text-lg mb-8 opacity-80 animate-fade-in-up">
                    सोपे, मध्यम, कठीण आणि अत्यंत कठीण श्रेणीतील किल्ले
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/marathi/forts-alphabetical" class="hover:text-accent transition-colors">मुळाक्षरानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-range" class="hover:text-accent transition-colors">डोंगररांगेनुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-district" class="hover:text-accent transition-colors">जिल्ह्यानुसार</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">श्रेणीनुसार</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-green-500 mb-2 animate-number" data-target="<?php echo count($gradeData['सोपा']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">सोपे किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-yellow-500 mb-2 animate-number" data-target="<?php echo count($gradeData['मध्यम']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">मध्यम किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-orange-500 mb-2 animate-number" data-target="<?php echo count($gradeData['कठीण']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">कठीण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-red-500 mb-2 animate-number" data-target="<?php echo count($gradeData['अत्यंत कठीण']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">अत्यंत कठीण</div>
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
                            <i class="fas fa-signal mr-2"></i>कठिणाई निवडा
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">सर्व श्रेणी</option>
                            <option value="सोपा">सोपा</option>
                            <option value="मध्यम">मध्यम</option>
                            <option value="कठीण">कठीण</option>
                            <option value="अत्यंत कठीण">अत्यंत कठीण</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Clear
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
                    'सोपा' => 'from-green-500 to-green-600',
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
                            <h2 class="text-4xl md:text-5xl font-bold font-devanagari"><?php echo $selectedGrade['name']; ?> श्रेणी</h2>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>परत
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
                                <div class="text-sm opacity-75">उपकरणे</div>
                                <div class="font-semibold text-xs"><?php echo $selectedGrade['equipment']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white font-devanagari text-center">
                        या श्रेणीतील किल्ले
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedGrade['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
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
                                    <a href="/fort/<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        माहिती
                                    </a>
                                    <a href="/trek/<?php echo strtolower(str_replace(' ', '-', $fort)); ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2 px-3 rounded-lg text-sm font-semibold transition-colors">
                                        <i class="fas fa-route mr-1"></i>
                                        ट्रेक
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Tips Section -->
                    <div class="mt-8 bg-blue-50 dark:bg-blue-900 p-6 rounded-xl">
                        <h4 class="text-lg font-bold text-blue-800 dark:text-blue-200 mb-3 font-devanagari">
                            <i class="fas fa-lightbulb mr-2"></i>महत्वाच्या सूचना
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
                            कठिणाई श्रेणी
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                        आपल्या अनुभवानुसार योग्य श्रेणी निवडा
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8" id="gradeGrid">
                    <?php foreach($gradeData as $key => $grade): ?>
                        <?php
                        $iconColorMap = [
                            'सोपा' => 'bg-green-500',
                            'मध्यम' => 'bg-yellow-500',
                            'कठीण' => 'bg-orange-500',
                            'अत्यंत कठीण' => 'bg-red-500'
                        ];
                        $iconColor = $iconColorMap[$grade['name']] ?? 'bg-primary';
                        ?>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:transform hover:scale-105 searchable-grade" 
                             data-name="<?php echo $grade['name']; ?>">
                            
                            <div class="p-8">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 <?php echo $iconColor; ?> rounded-full flex items-center justify-center mr-4">
                                        <i class="fas <?php echo $grade['icon']; ?> text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white font-devanagari">
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
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 font-devanagari">
                                        काही उदाहरणे:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach(array_slice($grade['forts'], 0, 4) as $fort): ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer">
                                                <?php echo $fort; ?>
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
                                        तपशील पाहा
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
                        कोणते परिणाम सापडले नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        कृपया वेगळे कीवर्ड वापरून पुन्हा प्रयत्न करा
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
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        मुळाक्षरानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        अ, ब, च... अनुक्रमाने
                    </p>
                </a>
                
                <a href="/marathi/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        डोंगररांगेनुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        सह्याद्री, पश्चिम घाट इत्यादी
                    </p>
                </a>
                
                <a href="/marathi/forts-by-district" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        जिल्ह्यानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        पुणे, मुंबई, नाशिक इत्यादी
                    </p>
                </a>
                
                <a href="/marathi/forts-by-category" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        प्रकारानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        पर्वतीय, समुद्रकिनारी इत्यादी
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
                        ट्रेकिंग मार्गदर्शन
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-smile text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white font-devanagari">सोपे ट्रेक</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            नवशिक्यांसाठी योग्य. मूलभूत फिटनेस पुरेसे. चांगल्या रस्त्यांनी जाणे.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-yellow-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-meh text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white font-devanagari">मध्यम ट्रेक</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            काही अनुभव आवश्यक. चांगली फिटनेस. काही तांत्रिक भाग.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-frown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white font-devanagari">कठीण ट्रेक</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            अनुभवी ट्रेकर्स. उत्तम फिटनेस. रॉक क्लाइंबिंग आवश्यक.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-skull text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white font-devanagari">अत्यंत कठीण</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            फक्त तज्ञांसाठी. तांत्रिक चढाई. धोकादायक.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4 font-devanagari">
                        सुरक्षा सूचना
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        ट्रेकिंगच्या आधी सर्व सुरक्षा नियम वाचा आणि योग्य तयारी करा
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/safety-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-shield-alt mr-2"></i>
                            सुरक्षा मार्गदर्शिका
                        </a>
                        <a href="/equipment-guide" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-tools mr-2"></i>
                            उपकरणे यादी
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

<?php include './includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('gradeSearch');
    const difficultyFilter = document.getElementById('difficultyFilter');
    const gradeCards = document.querySelectorAll('.searchable-grade');
    const noResults = document.getElementById('noResults');
    
    function filterGrades() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedDifficulty = difficultyFilter.value.toLowerCase().trim();
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
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
        
        updateResultsCount(visibleCount);
    }
    
    function updateResultsCount(count) {
        console.log(`Showing ${count} difficulty grades`);
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
    
    // Enhanced hover effects for fort tags
    const fortTags = document.querySelectorAll('.bg-gray-100, .dark\\:bg-gray-700');
    fortTags.forEach(tag => {
        if (tag.textContent && tag.textContent.trim()) {
            tag.addEventListener('click', function(e) {
                e.preventDefault();
                const fortName = this.textContent.trim();
                console.log('Clicked on fort:', fortName);
                // You can add navigation to individual fort pages here
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
    
    console.log('Forts by Grade (Marathi) page loaded successfully');
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
    
    .from-green-500 {
        --tw-gradient-from: #10b981;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(16, 185, 129, 0));
    }
    
    .to-green-600 {
        --tw-gradient-to: #059669;
    }
    
    .from-yellow-500 {
        --tw-gradient-from: #f59e0b;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(245, 158, 11, 0));
    }
    
    .to-yellow-600 {
        --tw-gradient-to: #d97706;
    }
    
    .from-orange-500 {
        --tw-gradient-from: #f97316;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(249, 115, 22, 0));
    }
    
    .to-orange-600 {
        --tw-gradient-to: #ea580c;
    }
    
    .from-red-500 {
        --tw-gradient-from: #ef4444;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(239, 68, 68, 0));
    }
    
    .to-red-600 {
        --tw-gradient-to: #dc2626;
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