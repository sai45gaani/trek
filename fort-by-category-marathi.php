<?php
// Set page specific variables
$page_title = 'प्रकारानुसार किल्ले - पर्वतीय, समुद्रकिनारी आणि इतर प्रकार | Trekshitz';
$meta_description = 'महाराष्ट्रातील किल्ल्यांचे प्रकारानुसार वर्गीकरण. पर्वतीय, समुद्रकिनारी, गिरीदुर्ग, जलदुर्ग आणि भूमिदुर्ग यांची संपूर्ण माहिती.';
$meta_keywords = 'किल्ले प्रकार, पर्वतीय किल्ले, समुद्रकिनारी किल्ले, गिरीदुर्ग, जलदुर्ग, भूमिदुर्ग, महाराष्ट्र किल्ले';

require_once './config/database.php';
// Include header
include './includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Fort categories data organized by types - COMPLETE DATA
$fortCategories = [
    'गिरीदुर्ग' => [
        'name' => 'गिरीदुर्ग (पर्वतीय किल्ले)',
        'description' => 'डोंगराच्या माथ्यावर बांधलेले किल्ले जे नैसर्गिक संरक्षण देतात आणि शत्रूंविरुद्ध मजबूत स्थान प्रदान करतात',
        'forts' => [
            'राजगड', 'सिंहगड', 'लोहगड', 'तोरणा', 'शिवनेरी', 'प्रतापगड', 'रायगड', 'हरिश्चंद्रगड', 
            'कळसुबाई', 'सलहेर', 'मुल्हेर', 'अजिंक्यतारा', 'पुरंदर', 'रामशेज', 'माथेरान', 'महाबळेश्वर', 
            'लोणावळा', 'खंडाळा', 'पन्हाळा', 'विशाळगड', 'भैरवगड', 'कोरायगड', 'आंद्रडगड', 'घुळेगड',
            'कुंजरगड', 'धाक', 'इंद्रायणीगड', 'ससिवेकड्या', 'विसापूर', 'नावरगड', 'जिंजी', 'हडसर',
            'नानेघाट', 'कोकंडगड', 'माळशेज', 'अणघाई', 'अलंग', 'मदन', 'कुळांग'
        ],
        'color' => 'bg-green-100 dark:bg-green-900',
        'icon' => 'fas fa-mountain',
        'characteristics' => ['उंच स्थान', 'नैसर्गिक संरक्षण', 'पाण्याचे साठे', 'दूरदर्शी दृष्टी', 'हवाई हल्ल्यांपासून सुरक्षा'],
        'difficulty' => 'मध्यम ते कठीण',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'total_count' => 150,
        'strategic_importance' => 'सर्वाधिक महत्त्वाचे संरक्षणात्मक किल्ले',
        'architectural_style' => 'पारंपरिक मराठा वास्तुकला'
    ],
    'जलदुर्ग' => [
        'name' => 'जलदुर्ग (समुद्रकिनारी किल्ले)',
        'description' => 'समुद्राच्या किनाऱ्यावर किंवा बेटांवर बांधलेले नौदल संरक्षणासाठी आणि व्यापारी मार्ग नियंत्रणासाठी',
        'forts' => [
            'जंजिरा', 'सिंधुदुर्ग', 'विजयदुर्ग', 'सुवर्णदुर्ग', 'कोरलाई', 'रेवदंडा', 'कोलाबा', 
            'अर्नाळा', 'बासेईन', 'वसाई', 'मनोरा', 'कन्हेरी', 'एलिफंटा', 'मडगाव', 'चापोरा', 
            'रेडी', 'तिरकोल', 'आगुआडा', 'अंजरले', 'गोपालगड', 'पडगड', 'भगवती', 'मुजरा',
            'कांकेश्वर', 'वेदी', 'रामराजगड', 'दाभोळ', 'फतेहगड', 'बांटवडा', 'रत्नागिरी',
            'गुहागर', 'जयगड', 'गंगावल्ली', 'कुंडालिका'
        ],
        'color' => 'bg-blue-100 dark:bg-blue-900',
        'icon' => 'fas fa-water',
        'characteristics' => ['समुद्राने वेढलेले', 'नौदल संरक्षण', 'व्यापारी मार्ग नियंत्रण', 'तोफखाना', 'जहाजांचे आश्रयस्थान'],
        'difficulty' => 'सोपा ते मध्यम',
        'best_season' => 'नोव्हेंबर ते फेब्रुवारी',
        'total_count' => 85,
        'strategic_importance' => 'नौदल आणि व्यापारी नियंत्रण',
        'architectural_style' => 'समुद्री वास्तुकला'
    ],
    'भूमिदुर्ग' => [
        'name' => 'भूमिदुर्ग (मैदानी किल्ले)',
        'description' => 'समतल जमिनीवर बांधलेले किल्ले जे शहरी संरक्षणासाठी आणि प्रशासकीय केंद्र म्हणून कार्य करतात',
        'forts' => [
            'दौलताबाद', 'अहमदनगर किल्ला', 'औरंगाबाद किल्ला', 'बीदर किल्ला', 'गुलबर्गा किल्ला', 
            'सातारा किल्ला', 'कोल्हापूर किल्ला', 'सांगली किल्ला', 'नाशिक किल्ला', 'पुणे किल्ला', 
            'अकोला किल्ला', 'नागपूर किल्ला', 'चंद्रपूर किल्ला', 'वर्धा किल्ला', 'यवतमाळ किल्ला',
            'अमरावती किल्ला', 'बुलढाणा किल्ला', 'वाशिम किल्ला', 'हिंगोली किल्ला', 'नांदेड किल्ला',
            'लातूर किल्ला', 'उस्मानाबाद किल्ला', 'सोलापूर किल्ला', 'बीड किल्ला', 'जालना किल्ला',
            'परभणी किल्ला', 'जलगाव किल्ला', 'धुळे किल्ला', 'नंदुरबार किल्ला'
        ],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'icon' => 'fas fa-chess-rook',
        'characteristics' => ['समतल भूमी', 'शहरी संरक्षण', 'प्रशासकीय केंद्र', 'व्यापारी केंद्र', 'लोकसंख्या संरक्षण'],
        'difficulty' => 'सोपा',
        'best_season' => 'संपूर्ण वर्ष',
        'total_count' => 65,
        'strategic_importance' => 'प्रशासन आणि शहरी संरक्षण',
        'architectural_style' => 'मुघल-मराठा मिश्रित वास्तुकला'
    ],
    'वनदुर्ग' => [
        'name' => 'वनदुर्ग (जंगलातील किल्ले)',
        'description' => 'दाट जंगलात बांधलेले किल्ले जे लपवून ठेवण्यासाठी आणि गुप्त कारवाईसाठी वापरले जातात',
        'forts' => [
            'माळशेज', 'भैरवगड', 'कोकंडगड', 'आंद्रडगड', 'तेलबैला', 'भिमाशंकर', 'त्र्यंबकेश्वर', 
            'अजंता', 'एलोरा', 'नाणेघाट', 'डिग्रस', 'कातळगड', 'अवचितगड', 'महुळी', 'भीमगड',
            'कन्हेरी', 'भाजा', 'कारला', 'बेडसे', 'शिवलेनी', 'पिठळखोरा', 'एलिफंटा',
            'जोगेश्वरी', 'मंडपेश्वर', 'महालक्ष्मी', 'घटकोपर', 'कान्हा राष्ट्रीय उद्यान'
        ],
        'color' => 'bg-emerald-100 dark:bg-emerald-900',
        'icon' => 'fas fa-tree',
        'characteristics' => ['दाट जंगल', 'नैसर्गिक आच्छादन', 'गुप्त मार्ग', 'वन्यजीव संरक्षण', 'पर्यावरणीय संरक्षण'],
        'difficulty' => 'कठीण',
        'best_season' => 'ऑक्टोबर ते मार्च',
        'total_count' => 45,
        'strategic_importance' => 'गुप्त कारवाई आणि निवारा',
        'architectural_style' => 'नैसर्गिक वास्तुकला'
    ]
];

// Get current category from URL parameter
$currentCategory = isset($_GET['category']) ? $_GET['category'] : '';
$selectedCategory = $currentCategory && isset($fortCategories[$currentCategory]) ? $fortCategories[$currentCategory] : null;
?>

<style>
/* Enhanced Category-specific styles */
.category-card {
    background: white;
    border-radius: 1.5rem;
    padding: 1.5rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    min-height: 400px;
}

.dark .category-card {
    background: var(--surface-dark);
    border-color: var(--dark-border);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
}

.category-card::before {
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

.category-card:hover::before {
    transform: scaleX(1);
}

.category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
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
    cursor: pointer;
}

.dark .fort-tag {
    background: var(--surface-dark);
    color: var(--accent-color);
    border-color: var(--accent-color);
}

.fort-tag:hover {
    background: var(--primary-color);
    color: white;
    transform: scale(1.05) translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.category-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 2.5rem;
    border-radius: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.category-header::before {
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
    border: 1px solid #e5e7eb;
}

.dark .search-container {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
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

.difficulty-badge {
    background: linear-gradient(45deg, var(--forest), var(--mountain));
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.season-badge {
    background: var(--earth-brown);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.characteristic-item {
    background: var(--background-light);
    color: var(--text-dark);
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.8rem;
    margin: 0.25rem;
    display: inline-flex;
    align-items: center;
    border: 1px solid var(--primary-color);
    transition: all 0.3s ease;
}

.dark .characteristic-item {
    background: var(--surface-dark);
    color: var(--accent-color);
    border-color: var(--accent-color);
}

.characteristic-item:hover {
    transform: scale(1.05);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.category-icon-wrapper {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.category-icon-wrapper:hover {
    transform: scale(1.1) rotate(5deg);
}

@media (max-width: 768px) {
    .category-grid {
        grid-template-columns: 1fr;
    }
    
    .category-header {
        padding: 1.5rem;
    }
    
    .search-container {
        padding: 1rem;
    }
    
    .category-card {
        min-height: auto;
    }
}

/* Stats animation */
.stats-container {
    background: linear-gradient(135deg, rgba(45, 80, 22, 0.1), rgba(127, 176, 105, 0.1));
    border-radius: 1rem;
    padding: 1rem;
    transition: all 0.3s ease;
}

.stats-container:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-nature text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"category-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"30\" patternUnits=\"userSpaceOnUse\"><rect x=\"5\" y=\"5\" width=\"20\" height=\"20\" fill=\"%23ffffff\" opacity=\"0.1\" rx=\"3\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23category-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    प्रकारानुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up font-devanagari">
                    किल्ल्यांचे प्रकारानुसार वैज्ञानिक वर्गीकरण आणि त्यांची संपूर्ण वैशिष्ट्ये
                </p>
                <p class="text-lg mb-8 opacity-80 animate-fade-in-up">
                    गिरीदुर्ग, जलदुर्ग, भूमिदुर्ग, वनदुर्ग आणि इतर प्रकारच्या किल्ल्यांची सविस्तर माहिती
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/marathi/forts-alphabetical" class="hover:text-accent transition-colors">मुळाक्षरानुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-range" class="hover:text-accent transition-colors">डोंगररांगेनुसार</a>
                    <span>•</span>
                    <a href="/marathi/forts-by-district" class="hover:text-accent transition-colors">जिल्ह्यानुसार</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">प्रकारानुसार</span>
                    <span>•</span>
                    <a href="/marathi/forts-by-grade" class="hover:text-accent transition-colors">श्रेणीनुसार</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stats-container text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($fortCategories); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">मुख्य प्रकार</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">वैज्ञानिक वर्गीकरण</div>
                </div>
                <div class="stats-container text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">एकूण किल्ले</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">महाराष्ट्रात</div>
                </div>
                <div class="stats-container text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="150">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">गिरीदुर्ग</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">सर्वाधिक संख्या</div>
                </div>
                <div class="stats-container text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="500">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">वर्षांचा इतिहास</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">ऐतिहासिक वारसा</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Enhanced Search Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="search-container">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2"></i>प्रकार शोधा
                        </label>
                        <input 
                            type="text" 
                            id="categorySearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white"
                            placeholder="किल्ल्याचा प्रकार टाइप करा... (उदा: गिरीदुर्ग)"
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-filter mr-2"></i>कठिणाई पातळी
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white">
                            <option value="">सर्व पातळ्या</option>
                            <option value="सोपा">सोपा</option>
                            <option value="मध्यम">मध्यम</option>
                            <option value="कठीण">कठीण</option>
                            <option value="अत्यंत कठीण">अत्यंत कठीण</option>
                        </select>
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2"></i>योग्य हंगाम
                        </label>
                        <select id="seasonFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white">
                            <option value="">सर्व हंगाम</option>
                            <option value="ऑक्टोबर ते मार्च">हिवाळा</option>
                            <option value="नोव्हेंबर ते फेब्रुवारी">थंडी</option>
                            <option value="संपूर्ण वर्ष">संपूर्ण वर्ष</option>
                        </select>
                    </div>
                    
                    <button onclick="clearFilters()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
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
                <div class="category-header">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-4xl md:text-5xl font-bold font-devanagari"><?php echo $selectedCategory['name']; ?></h2>
                            <a href="?" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>परत
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedCategory['description']; ?></p>
                        <div class="flex flex-wrap gap-3">
                            <span class="fort-count-badge">
                                <i class="<?php echo $selectedCategory['icon']; ?> mr-2"></i>
                                <?php echo count($selectedCategory['forts']); ?> किल्ले
                            </span>
                            <span class="difficulty-badge">
                                <i class="fas fa-signal mr-2"></i>
                                <?php echo $selectedCategory['difficulty']; ?>
                            </span>
                            <span class="season-badge">
                                <i class="fas fa-calendar mr-2"></i>
                                <?php echo $selectedCategory['best_season']; ?>
                            </span>
                            <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-chess-king mr-2"></i>
                                <?php echo $selectedCategory['strategic_importance']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Category Statistics -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white font-devanagari">एकूण संख्या</h3>
                            <i class="fas fa-chart-bar text-accent text-2xl"></i>
                        </div>
                        <div class="text-3xl font-bold text-primary dark:text-accent"><?php echo $selectedCategory['total_count']; ?></div>
                        <div class="text-sm text-gray-600 dark:text-gray-300">या प्रकारातील किल्ले</div>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white font-devanagari">वास्तुकला</h3>
                            <i class="fas fa-drafting-compass text-accent text-2xl"></i>
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-300"><?php echo $selectedCategory['architectural_style']; ?></div>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white font-devanagari">रणनीतिक महत्त्व</h3>
                            <i class="fas fa-shield-alt text-accent text-2xl"></i>
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-300"><?php echo $selectedCategory['strategic_importance']; ?></div>
                    </div>
                </div>
                
                <!-- Characteristics Section -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl mb-8 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white font-devanagari text-center">
                        या प्रकारची मुख्य वैशिष्ट्ये
                    </h3>
                    
                    <div class="flex flex-wrap justify-center gap-3 mb-8">
                        <?php foreach($selectedCategory['characteristics'] as $index => $characteristic): ?>
                            <span class="characteristic-item animate-fade-in-up" style="animation-delay: <?php echo $index * 0.1; ?>s">
                                <i class="fas fa-check-circle mr-2 text-accent"></i>
                                <?php echo $characteristic; ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Additional Information -->
                    <div class="grid md:grid-cols-2 gap-6 mt-8 p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3 font-devanagari">
                                <i class="fas fa-info-circle text-accent mr-2"></i>ट्रेकिंग माहिती
                            </h4>
                            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                <li><i class="fas fa-signal text-accent mr-2"></i>कठिणाई: <?php echo $selectedCategory['difficulty']; ?></li>
                                <li><i class="fas fa-calendar text-accent mr-2"></i>योग्य हंगाम: <?php echo $selectedCategory['best_season']; ?></li>
                                <li><i class="fas fa-clock text-accent mr-2"></i>सरासरी ट्रेकिंग वेळ: 4-8 तास</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3 font-devanagari">
                                <i class="fas fa-exclamation-triangle text-accent mr-2"></i>सुरक्षा सूचना
                            </h4>
                            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                <li><i class="fas fa-users text-accent mr-2"></i>गटात प्रवास करा</li>
                                <li><i class="fas fa-water text-accent mr-2"></i>पुरेसे पाणी घेऊन जा</li>
                                <li><i class="fas fa-first-aid text-accent mr-2"></i>प्राथमिक उपचार किट आवश्यक</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Forts Grid -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white font-devanagari text-center">
                        या प्रकारातील किल्ले
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedCategory['forts'] as $index => $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700 animate-fade-in-up" style="animation-delay: <?php echo ($index % 9) * 0.1; ?>s">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="<?php echo $selectedCategory['icon']; ?> text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-tag mr-2 text-accent"></i>
                                        <span><?php echo explode(' (', $selectedCategory['name'])[0]; ?></span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-signal mr-2 text-accent"></i>
                                        <span><?php echo $selectedCategory['difficulty']; ?></span>
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-calendar mr-2 text-accent"></i>
                                        <span><?php echo $selectedCategory['best_season']; ?></span>
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
        <!-- Categories Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gradient mb-4">किल्ल्यांचे प्रकार</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                        प्रत्येक प्रकारच्या किल्ल्यांची वैशिष्ट्ये, इतिहास आणि त्यांची संपूर्ण माहिती
                    </p>
                </div>

                <div class="category-grid" id="categoryGrid">
                    <?php foreach($fortCategories as $key => $category): ?>
                        <div class="category-card searchable-category animate-fade-in-up" 
                             data-name="<?php echo $category['name']; ?>"
                             data-difficulty="<?php echo $category['difficulty']; ?>"
                             data-season="<?php echo $category['best_season']; ?>">
                            
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center">
                                    <div class="category-icon-wrapper">
                                        <i class="<?php echo $category['icon']; ?> text-2xl text-white"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">
                                            <?php echo explode(' (', $category['name'])[0]; ?>
                                        </h3>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            <?php echo $category['total_count']; ?> किल्ले
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                <?php echo $category['description']; ?>
                            </p>
                            
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-sm mb-3">
                                    <span class="difficulty-badge">
                                        <i class="fas fa-signal mr-1"></i>
                                        <?php echo $category['difficulty']; ?>
                                    </span>
                                    <span class="fort-count-badge">
                                        <?php echo count($category['forts']); ?> किल्ले
                                    </span>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="season-badge">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <?php echo $category['best_season']; ?>
                                    </span>
                                    <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                        <?php echo $category['strategic_importance']; ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 font-devanagari">
                                    मुख्य वैशिष्ट्ये:
                                </h4>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach($category['characteristics'] as $characteristic): ?>
                                        <span class="characteristic-item text-xs">
                                            <i class="fas fa-check-circle mr-1 text-accent text-xs"></i>
                                            <?php echo $characteristic; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 font-devanagari">
                                    या प्रकारातील प्रमुख किल्ले:
                                </h4>
                                <div class="flex flex-wrap gap-1">
                                    <?php 
                                    $displayForts = array_slice($category['forts'], 0, 8);
                                    foreach($displayForts as $fort): 
                                    ?>
                                        <span class="fort-tag text-xs" title="<?php echo $fort; ?> - अधिक माहितीसाठी क्लिक करा">
                                            <?php echo $fort; ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if(count($category['forts']) > 8): ?>
                                        <span class="fort-tag bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-400 cursor-default text-xs">
                                            +<?php echo count($category['forts']) - 8; ?> आणखी
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-600">
                                <span class="text-gray-500 dark:text-gray-400 text-sm">
                                    <i class="fas fa-hiking mr-1"></i>
                                    ट्रेकिंग उपलब्ध
                                </span>
                                
                                <a href="?category=<?php echo urlencode($key); ?>" 
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
                        कोणते प्रकार सापडले नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        कृपया वेगळे कीवर्ड वापरून पुन्हा प्रयत्न करा
                    </p>
                </div>
            </div>
        </section>
    <?php endif; ?>