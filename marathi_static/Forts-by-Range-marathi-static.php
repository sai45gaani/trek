<?php
// Set page specific variables
$page_title = 'डोंगररांगेनुसार किल्ले - सह्याद्री पर्वतरांग | Trekshitz';
$meta_description = 'सह्याद्री, अजंता, सातमाळा आणि इतर पर्वतरांगेतील किल्ल्यांची संपूर्ण यादी. पर्वतरांगेनुसार व्यवस्थित केलेली महाराष्ट्रातील किल्ल्यांची माहिती.';
$meta_keywords = 'सह्याद्री किल्ले, पर्वतरांग, अजंता पर्वतरांग, सातमाळा, पश्चिम घाट, महाराष्ट्र पर्वत';

// Include header
include './includes/header.php';

// Complete mountain ranges data from the original source
$mountainRanges = [
    'अजंता' => [
        'name' => 'अजंता',
        'description' => 'अजंता पर्वतरांगेतील ऐतिहासिक किल्ले',
        'forts' => ['अंतूर', 'वेताळवाडी गड'],
        'color' => 'bg-red-100 dark:bg-red-900',
        'region' => 'औरंगाबाद'
    ],
    'अजंता सातमाळा' => [
        'name' => 'अजंता सातमाळा', 
        'description' => 'उत्तर महाराष्ट्रातील विस्तृत पर्वतरांग',
        'forts' => ['हातगड', 'कण्हेरगड', 'माकेड्या', 'सप्तश्रुंगी'],
        'color' => 'bg-blue-100 dark:bg-blue-900',
        'region' => 'नाशिक, धुळे'
    ],
    'अवंडगड' => [
        'name' => 'अवंडगड',
        'description' => 'सांगली जिल्ह्यातील एकल पर्वत',
        'forts' => ['अवंडगड'],
        'color' => 'bg-green-100 dark:bg-green-900',
        'region' => 'सांगली'
    ],
    'अंवळी पवटारंग (नाशिक)' => [
        'name' => 'अंवळी पवटारंग (नाशिक)',
        'description' => 'नाशिक जिल्ह्यातील छोटी पर्वतरांग',
        'forts' => ['गडगडा (घरगड)'],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'region' => 'नाशिक'
    ],
    'आंबोली (सिंधुदुर्ग)' => [
        'name' => 'आंबोली (सिंधुदुर्ग)',
        'description' => 'पश्चिम घाटातील हिल स्टेशन परिसर',
        'forts' => ['महादेवगड', 'मनोहर-मनसंतोष गड', 'नारायणगड (आंबोली)'],
        'color' => 'bg-purple-100 dark:bg-purple-900',
        'region' => 'सिंधुदुर्ग'
    ],
    'अणघाई' => [
        'name' => 'अणघाई',
        'description' => 'पुणे जिल्ह्यातील एकल पर्वत',
        'forts' => ['अणघाई'],
        'color' => 'bg-indigo-100 dark:bg-indigo-900',
        'region' => 'पुणे'
    ],
    'भुगिरी गड (भूगावई गड)' => [
        'name' => 'भुगिरी गड (भूगावई गड)',
        'description' => 'उत्तर महाराष्ट्रातील पर्वतीय प्रदेश',
        'forts' => ['इद्राई', 'काला', 'पेडका', 'सुतोंडा (नायगावचा किल्ला)'],
        'color' => 'bg-teal-100 dark:bg-teal-900',
        'region' => 'ठाणे, रायगड'
    ],
    'हातगड कण्हेरगड' => [
        'name' => 'हातगड कण्हेरगड',
        'description' => 'नाशिक जिल्ह्यातील जुडवा पर्वत',
        'forts' => ['हातगड', 'कण्हेरगड', 'कण्हेरगड(चाळीसगाव)', 'पेडका', 'राजधेर'],
        'color' => 'bg-pink-100 dark:bg-pink-900', 
        'region' => 'नाशिक'
    ],
    'कांचन' => [
        'name' => 'कांचन',
        'description' => 'नाशिक जिल्ह्यातील पर्वतीय प्रदेश',
        'forts' => ['कांचन', 'लींझा', 'राजदेहेर (ढेरी)', 'करणेरंग(चाळीसगाव)', 'मणिकपूंज', 'राजधेर'],
        'color' => 'bg-cyan-100 dark:bg-cyan-900',
        'region' => 'नाशिक'
    ],
    'लहुगड' => [
        'name' => 'लहुगड',
        'description' => 'सातारा जिल्ह्यातील एकल पर्वत',
        'forts' => ['लहुगड'],
        'color' => 'bg-orange-100 dark:bg-orange-900',
        'region' => 'सातारा'
    ]
];

// Get current range from URL parameter
$currentRange = isset($_GET['range']) ? $_GET['range'] : '';
$selectedRange = $currentRange && isset($mountainRanges[$currentRange]) ? $mountainRanges[$currentRange] : null;
?>

<style>
/* Enhanced Range-specific styles */
.range-card {
    background: white;
    border-radius: 1.5rem;
    padding: 1.5rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.dark .range-card {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.range-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.range-card:hover::before {
    transform: scaleX(1);
}

.range-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-color: var(--accent-color);
}

.fort-tag {
    background: var(--background-light);
    color: var(--primary-color);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    margin: 0.25rem 0.25rem 0.25rem 0;
    display: inline-block;
    border: 1px solid var(--primary-color);
    transition: all 0.3s ease;
    font-weight: 500;
}

.dark .fort-tag {
    background: var(--surface-dark);
    color: var(--accent-color);
    border-color: var(--accent-color);
}

.fort-tag:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.05);
    cursor: pointer;
}

.range-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 2.5rem;
    border-radius: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.range-header::before {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 200px;
    height: 200px;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><polygon points="20,80 50,20 80,80" fill="%23ffffff" opacity="0.1"/></svg>');
    background-size: contain;
    background-repeat: no-repeat;
}

.search-container {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.dark .search-container {
    background: var(--surface-dark);
}

.range-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 1.5rem;
}

.fort-count-badge {
    background: var(--accent-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.region-badge {
    background: linear-gradient(45deg, var(--forest), var(--mountain));
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

@media (max-width: 768px) {
    .range-grid {
        grid-template-columns: 1fr;
    }
    
    .range-header {
        padding: 1.5rem;
    }
    
    .search-container {
        padding: 1rem;
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-nature text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"mountain-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"15,2 25,18 5,18\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23mountain-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    डोंगररांगेनुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up font-devanagari">
                    महाराष्ट्रातील विविध पर्वतरांगेतील किल्ल्यांची संपूर्ण माहिती
                </p>
                <p class="text-lg mb-8 opacity-80 animate-fade-in-up">
                    सह्याद्री, अजंता, सातमाळा आणि इतर पर्वतरांगांमधील ऐतिहासिक किल्ले
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/marathi/forts-alphabetical" class="hover:text-accent transition-colors">मुळाक्षरानुसार</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">डोंगररांगेनुसार</span>
                    <span>•</span>
                    <a href="/marathi/forts-by-district" class="hover:text-accent transition-colors">जिल्ह्यानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-category" class="hover:text-accent transition-colors">प्रकारानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-grade" class="hover:text-accent transition-colors">श्रेणीनुसार</a>
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
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">पर्वतरांगा</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">एकूण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="15">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">जिल्हे</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">मीटर (सर्वोच्च)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="search-container">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2"></i>पर्वतरांग शोधा
                        </label>
                        <input 
                            type="text" 
                            id="rangeSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white"
                            placeholder="पर्वतरांगाचे नाव टाइप करा..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>जिल्हा निवडा
                        </label>
                        <select id="regionFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white">
                            <option value="">सर्व जिल्हे</option>
                            <option value="औरंगाबाद">औरंगाबाद</option>
                            <option value="नाशिक">नाशिक</option>
                            <option value="पुणे">पुणे</option>
                            <option value="सिंधुदुर्ग">सिंधुदुर्ग</option>
                            <option value="सांगली">सांगली</option>
                            <option value="धुळे">धुळे</option>
                            <option value="ठाणे">ठाणे</option>
                            <option value="रायगड">रायगड</option>
                            <option value="सातारा">सातारा</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Clear
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedRange): ?>
        <!-- Detailed Range View -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="range-header">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-4xl md:text-5xl font-bold font-devanagari"><?php echo $selectedRange['name']; ?></h2>
                            <a href="?" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>परत
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedRange['description']; ?></p>
                        <div class="flex flex-wrap gap-3">
                            <span class="fort-count-badge">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedRange['forts']); ?> किल्ले
                            </span>
                            <span class="region-badge">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo $selectedRange['region']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white font-devanagari text-center">
                        या पर्वतरांगेतील किल्ले
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedRange['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-mountain mr-2 text-accent"></i>
                                        <span>पर्वतीय किल्ला</span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-map-marker-alt mr-2 text-accent"></i>
                                        <span><?php echo $selectedRange['region']; ?></span>
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
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Mountain Ranges Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gradient mb-4">महाराष्ट्रातील पर्वतरांगा</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                        प्रत्येक पर्वतरांगेतील किल्ल्यांची संपूर्ण माहिती
                    </p>
                </div>

                <div class="range-grid" id="rangeGrid">
                    <?php foreach($mountainRanges as $key => $range): ?>
                        <div class="range-card searchable-range" 
                             data-name="<?php echo $range['name']; ?>"
                             data-region="<?php echo $range['region']; ?>">
                            
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">
                                    <?php echo $range['name']; ?>
                                </h3>
                                <i class="fas fa-mountain text-2xl text-accent"></i>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                <?php echo $range['description']; ?>
                            </p>
                            
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-sm mb-3">
                                    <span class="region-badge">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        <?php echo $range['region']; ?>
                                    </span>
                                    <span class="fort-count-badge">
                                        <?php echo count($range['forts']); ?> किल्ले
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 font-devanagari">
                                    या पर्वतरांगेतील किल्ले:
                                </h4>
                                <div class="flex flex-wrap">
                                    <?php foreach($range['forts'] as $fort): ?>
                                        <span class="fort-tag" title="<?php echo $fort; ?> - अधिक माहितीसाठी क्लिक करा">
                                            <?php echo $fort; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 dark:text-gray-400 text-sm">
                                    <i class="fas fa-hiking mr-1"></i>
                                    ट्रेकिंग उपलब्ध
                                </span>
                                
                                <a href="?range=<?php echo urlencode($key); ?>" 
                                   class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 text-sm group">
                                    तपशील पाहा
                                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="text-center py-20 hidden">
                    <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        कोणत्याही पर्वतरांगा सापडल्या नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        कृपया वेगळे कीवर्ड वापरून पुन्हा प्रयत्न करा
                    </p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Quick Navigation -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gradient mb-12">
                इतर श्रेणींनुसार शोधा
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/marathi/forts-alphabetical" class="card p-6 text-center hover-lift group">
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
                
                <a href="/marathi/forts-by-district" class="card p-6 text-center hover-lift group">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        जिल्ह्यानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        पुणे, मुंबई, नाशिक इत्यादी
                    </p>
                </a>
                
                <a href="/marathi/forts-by-category" class="card p-6 text-center hover-lift group">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        प्रकारानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        पर्वतीय, समुद्रकिनारी इत्यादी
                    </p>
                </a>
                
                <a href="/marathi/forts-by-grade" class="card p-6 text-center hover-lift group">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-signal text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        श्रेणीनुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        सोपे, मध्यम, कठीण इत्यादी
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- Additional Information Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center text-gradient mb-12">
                    पर्वतरांगांबद्दल माहिती
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="card p-8 text-center">
                        <div class="w-20 h-20 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-mountain text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 font-devanagari">सह्याद्री पर्वतरांग</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            पश्चिम घाटातील सर्वात मोठी पर्वतरांग ज्यामध्ये सर्वाधिक किल्ले आहेत. छत्रपती शिवाजी महाराजांच्या काळातील अनेक महत्त्वाचे किल्ले येथे आहेत.
                        </p>
                    </div>
                    
                    <div class="card p-8 text-center">
                        <div class="w-20 h-20 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-route text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">ट्रेकिंग मार्ग</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            प्रत्येक पर्वतरांगेसाठी विशिष्ट ट्रेकिंग मार्ग, कठिणाई स्तर आणि सुरक्षिततेच्या सूचना उपलब्ध आहेत.
                        </p>
                    </div>
                    
                    <div class="card p-8 text-center">
                        <div class="w-20 h-20 bg-accent rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-history text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 font-devanagari">ऐतिहासिक महत्त्व</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            मराठा साम्राज्याच्या काळातील महत्त्वाचे किल्ले, त्यांचा इतिहास आणि स्थापत्यकलेची माहिती.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-nature text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4 font-devanagari">
                        पर्वतरांग ट्रेकिंग गाइड
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        प्रत्येक पर्वतरांगेसाठी संपूर्ण ट्रेकिंग गाइड, नकाशे, हवामान माहिती आणि सुरक्षिततेच्या सूचना
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/trekking-guide" class="btn btn-accent">
                            <i class="fas fa-download mr-2"></i>
                            ट्रेकिंग गाइड डाउनलोड करा
                        </a>
                        <a href="/safety-tips" class="btn btn-secondary">
                            <i class="fas fa-shield-alt mr-2"></i>
                            सुरक्षिततेच्या सूचना
                        </a>
                        <a href="/weather-info" class="btn btn-secondary">
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
    const searchInput = document.getElementById('rangeSearch');
    const regionFilter = document.getElementById('regionFilter');
    const rangeCards = document.querySelectorAll('.searchable-range');
    const noResults = document.getElementById('noResults');
    
    function filterRanges() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedRegion = regionFilter.value.toLowerCase().trim();
        let visibleCount = 0;
        
        rangeCards.forEach(function(card) {
            const rangeName = card.dataset.name.toLowerCase();
            const rangeRegion = card.dataset.region.toLowerCase();
            
            const matchesSearch = !searchTerm || rangeName.includes(searchTerm);
            const matchesRegion = !selectedRegion || rangeRegion.includes(selectedRegion);
            
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
        // You can add a results counter here if needed
        console.log(`Showing ${count} mountain ranges`);
    }
    
    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterRanges);
    }
    
    if (regionFilter) {
        regionFilter.addEventListener('change', filterRanges);
    }
    
    // Clear filters function
    window.clearFilters = function() {
        if (searchInput) searchInput.value = '';
        if (regionFilter) regionFilter.value = '';
        filterRanges();
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
    const rangeCardsAnimation = document.querySelectorAll('.range-card');
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
    
    rangeCardsAnimation.forEach(card => {
        cardObserver.observe(card);
    });
    
    // Enhanced hover effects for fort tags
    const fortTags = document.querySelectorAll('.fort-tag');
    fortTags.forEach(tag => {
        tag.addEventListener('click', function(e) {
            e.preventDefault();
            const fortName = this.textContent.trim();
            // You can add navigation to individual fort pages here
            console.log('Clicked on fort:', fortName);
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
    
    // Add search suggestions (optional enhancement)
    if (searchInput) {
        const suggestions = Array.from(rangeCards).map(card => card.dataset.name);
        
        searchInput.addEventListener('focus', function() {
            // You can implement autocomplete suggestions here
        });
    }
    
    console.log('Forts by Mountain Range (Marathi) page loaded successfully');
});

// Add CSS for enhanced animations
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
    
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }
    
    .btn-accent {
        background-color: var(--accent-color);
        color: white;
    }
    
    .btn-accent:hover {
        background-color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .btn-secondary {
        background-color: var(--secondary-color);
        color: white;
    }
    
    .btn-secondary:hover {
        background-color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .text-gradient {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
`;
document.head.appendChild(style);
</script>