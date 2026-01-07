<?php
// Set page specific variables
$page_title = 'जिल्ह्यानुसार किल्ले - महाराष्ट्रातील सर्व जिल्हे | Trekshitz';
$meta_description = 'महाराष्ट्रातील सर्व जिल्ह्यांमधील किल्ल्यांची संपूर्ण यादी. पुणे, मुंबई, नाशिक, सातारा आणि इतर जिल्ह्यांमधील ऐतिहासिक किल्ल्यांची माहिती.';
$meta_keywords = 'महाराष्ट्र जिल्हे, पुणे किल्ले, मुंबई किल्ले, नाशिक किल्ले, सातारा किल्ले, रायगड किल्ले, सिंधुदुर्ग किल्ले';

require_once './config/database.php';
// Include header
include './includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Districts data organized by regions
$districts = [
    'पुणे' => [
        'name' => 'पुणे',
        'description' => 'पश्चिम महाराष्ट्रातील सह्याद्री पर्वतरांगेतील सर्वाधिक किल्ले असलेला जिल्हा',
        'forts' => ['शिवनेरी', 'लोहगड', 'राजगड', 'सिंहगड', 'तोरणा', 'पुरंदर', 'आंद्रडगड', 'कोरायगड', 'कोकंडगड', 'घुळेगड', 'हडसर', 'नानेघाट', 'माथेरान', 'कुंजरगड', 'धाक', 'इंद्रायणीगड', 'ससिवेकड्या', 'विसापूर', 'नावरगड', 'जिंजी'],
        'color' => 'bg-blue-100 dark:bg-blue-900',
        'region' => 'पश्चिम महाराष्ट्र',
        'famous_for' => 'छत्रपती शिवाजी महाराजांचे जन्मस्थान'
    ],
    'रायगड' => [
        'name' => 'रायगड',
        'description' => 'मराठा साम्राज्याची राजधानी आणि अनेक समुद्रकिनारी किल्ले',
        'forts' => ['रायगड', 'प्रतापगड', 'सुवर्णदुर्ग', 'रेवदंडा', 'जंजिरा', 'कोरलाई', 'कुंडलिका', 'काशिद', 'मुरुड', 'कोलाबा', 'अळिबाग', 'सागरगड', 'महादेवगड', 'तुंग', 'केदार', 'ढाकगड', 'पेब', 'माहिमगड', 'कडयावराचा किल्ला'],
        'color' => 'bg-red-100 dark:bg-red-900',
        'region' => 'कोकण',
        'famous_for' => 'मराठा साम्राज्याची राजधानी'
    ],
    'सातारा' => [
        'name' => 'सातारा',
        'description' => 'अजिंक्यतारा आणि प्रतापगड यासह अनेक महत्त्वाचे किल्ले',
        'forts' => ['अजिंक्यतारा', 'प्रतापगड', 'महाबळेश्वर', 'कमळगड', 'चंदन-वंदन', 'गुइंदी', 'जावळी', 'कास पठार', 'वासोटा', 'मकरंदगड', 'कामळगड', 'चंदन वंदन', 'सज्जनगड', 'यावगड', 'वराठगड', 'भैरावगड', 'होल', 'पराली वैजनाथ'],
        'color' => 'bg-green-100 dark:bg-green-900',
        'region' => 'पश्चिम महाराष्ट्र',
        'famous_for' => 'छत्रपती शिवाजी महाराजांचे राज्याभिषेक'
    ],
    'नाशिक' => [
        'name' => 'नाशिक',
        'description' => 'उत्तर महाराष्ट्रातील अजंता-सातमाळा पर्वतरांगेतील किल्ले',
        'forts' => ['सप्तश्रुंगी', 'अंजनेरी', 'हातगड', 'सलहेर', 'मुल्हेर', 'रामशेज', 'हरिश्चंद्रगड', 'मलाड', 'त्र्यंबकेश्वर', 'ब्रह्मगिरी', 'कांचनगड', 'कावंठगड', 'गणेश गुफा', 'धूपगड', 'मोदक सागर', 'कल्याण दुर्ग', 'बागलण', 'भंडारदरा'],
        'color' => 'bg-purple-100 dark:bg-purple-900',
        'region' => 'उत्तर महाराष्ट्र',
        'famous_for' => 'त्र्यंबकेश्वर ज्योतिर्लिंग'
    ],
    'सिंधुदुर्ग' => [
        'name' => 'सिंधुदुर्ग',
        'description' => 'समुद्रकिनारी किल्ले आणि कोकणातील मजबूत संरक्षण',
        'forts' => ['सिंधुदुर्ग', 'विजयदुर्ग', 'रत्नागिरी', 'पडगड', 'भगवती', 'गोपालगड', 'मुजरा', 'कांकेश्वर', 'वेदी', 'रामराजगड', 'दाभोळ', 'आंजरले', 'फतेहगड', 'बांटवडा'],
        'color' => 'bg-cyan-100 dark:bg-cyan-900',
        'region' => 'कोकण',
        'famous_for' => 'नौदल आणि समुद्री व्यापार'
    ],
    'कोल्हापूर' => [
        'name' => 'कोल्हापूर',
        'description' => 'दक्षिण महाराष्ट्रातील ऐतिहासिक किल्ले आणि महालक्ष्मी मंदिर',
        'forts' => ['पन्हाळा', 'विशाळगड', 'भुदरगड', 'रंगना', 'बावडा', 'कोप्रगड', 'मसैनागड', 'पाराळी', 'राधानगरी', 'कगल', 'गागंबावडा', 'हातकणंगले', 'ईचळकरंजी'],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'region' => 'दक्षिण महाराष्ट्र',
        'famous_for' => 'महालक्ष्मी मंदिर आणि शाहू महाराज'
    ],
    'सांगली' => [
        'name' => 'सांगली',
        'description' => 'कृष्णा नदीकाठील किल्ले आणि ऐतिहासिक वारसा',
        'forts' => ['अवंडगड', 'डांगी', 'कृष्णानगर', 'पाटण', 'करवीर', 'मिरज', 'आसंडी', 'वारणी', 'आयत्या', 'तासगाव', 'जत', 'खानापूर', 'वाळवा'],
        'color' => 'bg-orange-100 dark:bg-orange-900',
        'region' => 'दक्षिण महाराष्ट्र',
        'famous_for' => 'ऊस उत्पादन आणि व्यापार'
    ],
    'औरंगाबाद' => [
        'name' => 'औरंगाबाद',
        'description' => 'अजंता-एलोरा गुफा आणि मराठा काळातील किल्ले',
        'forts' => ['दौलताबाद', 'अजंता', 'एलोरा', 'औरंगाबाद किल्ला', 'खुल्दाबाद', 'सिल्लोड', 'गंगापूर', 'पैठण', 'कन्नड', 'वैजापूर', 'सोयगाव', 'गेवराई', 'फुलंब्री', 'वाघरी'],
        'color' => 'bg-indigo-100 dark:bg-indigo-900',
        'region' => 'मराठवाडा',
        'famous_for' => 'अजंता-एलोरा जागतिक वारसा'
    ],
    'अहमदनगर' => [
        'name' => 'अहमदनगर',
        'description' => 'निजामशाही आणि मराठा काळातील महत्त्वाचे किल्ले',
        'forts' => ['अहमदनगर किल्ला', 'हरिश्चंद्रगड', 'अजरा', 'नगर', 'कोपरगाव', 'राहुरी', 'नेवासा', 'पाटोदा', 'जामखेड', 'कर्जत', 'पारनेर', 'संगमनेर', 'आकोले', 'राजूर'],
        'color' => 'bg-pink-100 dark:bg-pink-900',
        'region' => 'पश्चिम महाराष्ट्र',
        'famous_for' => 'निजामशाही राजधानी'
    ],
    'ठाणे' => [
        'name' => 'ठाणे',
        'description' => 'मुंबईजवळील पर्वतीय आणि तटीय किल्ले',
        'forts' => ['कळसुबाई', 'हरिश्चंद्रगड', 'इडराई', 'आकासगंगा', 'रतनवली', 'भैरवनाथ', 'डिंडोशी', 'मशालगड', 'आवेश्वर', 'इगतपूरी', 'जवहार', 'मोखाडा', 'शहापूर', 'कर्जत'],
        'color' => 'bg-teal-100 dark:bg-teal-900',
        'region' => 'कोकण',
        'famous_for' => 'कळसुबाई - महाराष्ट्राची सर्वोच्च शिखर'
    ]
];

// Get current district from URL parameter
$currentDistrict = isset($_GET['district']) ? $_GET['district'] : '';
$selectedDistrict = $currentDistrict && isset($districts[$currentDistrict]) ? $districts[$currentDistrict] : null;
?>

<style>
/* District-specific styles */
.district-card {
    background: white;
    border-radius: 1.5rem;
    padding: 1.5rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.dark .district-card {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.district-card::before {
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

.district-card:hover::before {
    transform: scaleX(1);
}

.district-card:hover {
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

.district-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 2.5rem;
    border-radius: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.district-header::before {
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

.district-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
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

.famous-for-badge {
    background: var(--earth-brown);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

@media (max-width: 768px) {
    .district-grid {
        grid-template-columns: 1fr;
    }
    
    .district-header {
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
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"district-pattern\" x=\"0\" y=\"0\" width=\"25\" height=\"20\" patternUnits=\"userSpaceOnUse\"><rect x=\"2\" y=\"2\" width=\"21\" height=\"16\" fill=\"%23ffffff\" opacity=\"0.1\" rx=\"2\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23district-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    जिल्ह्यानुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up font-devanagari">
                    महाराष्ट्रातील सर्व जिल्ह्यांमधील किल्ल्यांची संपूर्ण माहिती
                </p>
                <p class="text-lg mb-8 opacity-80 animate-fade-in-up">
                    पुणे, रायगड, सातारा, नाशिक आणि इतर जिल्ह्यांमधील ऐतिहासिक किल्ले
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
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($districts); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">मुख्य जिल्हे</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">एकूण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="36">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">एकूण जिल्हे</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="5">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-devanagari">प्रमुख विभाग</div>
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
                            <i class="fas fa-search mr-2"></i>जिल्हा शोधा
                        </label>
                        <input 
                            type="text" 
                            id="districtSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white"
                            placeholder="जिल्ह्याचे नाव टाइप करा..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>विभाग निवडा
                        </label>
                        <select id="regionFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-800 dark:text-white">
                            <option value="">सर्व विभाग</option>
                            <option value="पश्चिम महाराष्ट्र">पश्चिम महाराष्ट्र</option>
                            <option value="कोकण">कोकण</option>
                            <option value="उत्तर महाराष्ट्र">उत्तर महाराष्ट्र</option>
                            <option value="मराठवाडा">मराठवाडा</option>
                            <option value="दक्षिण महाराष्ट्र">दक्षिण महाराष्ट्र</option>
                            <option value="विदर्भ">विदर्भ</option>
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
                <div class="district-header">
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-4xl md:text-5xl font-bold font-devanagari"><?php echo $selectedDistrict['name']; ?> जिल्हा</h2>
                            <a href="?" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>परत
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedDistrict['description']; ?></p>
                        <div class="flex flex-wrap gap-3">
                            <span class="fort-count-badge">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedDistrict['forts']); ?> किल्ले
                            </span>
                            <span class="region-badge">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo $selectedDistrict['region']; ?>
                            </span>
                            <span class="famous-for-badge">
                                <i class="fas fa-star mr-2"></i>
                                <?php echo $selectedDistrict['famous_for']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white font-devanagari text-center">
                        <?php echo $selectedDistrict['name']; ?> जिल्ह्यातील किल्ले
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedDistrict['forts'] as $fort): ?>
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
                                        <span><?php echo $selectedDistrict['name']; ?> जिल्हा</span>
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
        <!-- Districts Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gradient mb-4">महाराष्ट्रातील जिल्हे</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                        प्रत्येक जिल्ह्यातील किल्ल्यांची संपूर्ण माहिती
                    </p>
                </div>

                <div class="district-grid" id="districtGrid">
                    <?php foreach($districts as $key => $district): ?>
                        <div class="district-card searchable-district" 
                             data-name="<?php echo $district['name']; ?>"
                             data-region="<?php echo $district['region']; ?>">
                            
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">
                                    <?php echo $district['name']; ?> जिल्हा
                                </h3>
                                <i class="fas fa-map text-2xl text-accent"></i>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                <?php echo $district['description']; ?>
                            </p>
                            
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-sm mb-3">
                                    <span class="region-badge">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        <?php echo $district['region']; ?>
                                    </span>
                                    <span class="fort-count-badge">
                                        <?php echo count($district['forts']); ?> किल्ले
                                    </span>
                                </div>
                                <span class="famous-for-badge">
                                    <i class="fas fa-star mr-1"></i>
                                    <?php echo $district['famous_for']; ?>
                                </span>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 font-devanagari">
                                    या जिल्ह्यातील प्रमुख किल्ले:
                                </h4>
                                <div class="flex flex-wrap">
                                    <?php 
                                    $displayForts = array_slice($district['forts'], 0, 8);
                                    foreach($displayForts as $fort): 
                                    ?>
                                        <span class="fort-tag" title="<?php echo $fort; ?> - अधिक माहितीसाठी क्लिक करा">
                                            <?php echo $fort; ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if(count($district['forts']) > 8): ?>
                                        <span class="fort-tag bg-gray-300 text-gray-600 cursor-default">
                                            +<?php echo count($district['forts']) - 8; ?> आणखी
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 dark:text-gray-400 text-sm">
                                    <i class="fas fa-hiking mr-1"></i>
                                    ट्रेकिंग उपलब्ध
                                </span>
                                
                                <a href="?district=<?php echo urlencode($key); ?>" 
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
                        कोणते जिल्हे सापडले नाहीत
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
                
                <a href="/marathi/forts-by-range" class="card p-6 text-center hover-lift group">
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
                    जिल्ह्यांबद्दल माहिती
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="card p-8 text-center">
                        <div class="w-20 h-20 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-crown text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 font-devanagari">ऐतिहासिक महत्त्व</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            प्रत्येक जिल्ह्याचे अनन्य ऐतिहासिक महत्त्व आणि मराठा साम्राज्यातील भूमिका
                        </p>
                    </div>
                    
                    <div class="card p-8 text-center">
                        <div class="w-20 h-20 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-route text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">ट्रेकिंग मार्ग</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            प्रत्येक जिल्ह्यातील किल्ल्यांसाठी विशिष्ट ट्रेकिंग मार्ग आणि सुरक्षिततेच्या सूचना
                        </p>
                    </div>
                    
                    <div class="card p-8 text-center">
                        <div class="w-20 h-20 bg-accent rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-users text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 font-devanagari">स्थानिक संस्कृती</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            प्रत्येक प्रदेशाची स्थानिक संस्कृती, परंपरा आणि स्थापत्यकलेचे वैशिष्ट्य
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-nature text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4 font-devanagari">
                        जिल्हानिहाय ट्रेकिंग गाइड
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        प्रत्येक जिल्ह्यातील किल्ल्यांसाठी संपूर्ण गाइड, स्थानिक माहिती आणि प्रवास नियोजन
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/district-guide" class="btn btn-accent">
                            <i class="fas fa-download mr-2"></i>
                            जिल्हा गाइड डाउनलोड करा
                        </a>
                        <a href="/local-info" class="btn btn-secondary">
                            <i class="fas fa-info-circle mr-2"></i>
                            स्थानिक माहिती
                        </a>
                        <a href="/transport-info" class="btn btn-secondary">
                            <i class="fas fa-bus mr-2"></i>
                            वाहतूक माहिती
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
    const districtCardsAnimation = document.querySelectorAll('.district-card');
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
    const fortTags = document.querySelectorAll('.fort-tag:not(.cursor-default)');
    fortTags.forEach(tag => {
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
        const suggestions = Array.from(districtCards).map(card => card.dataset.name);
        let suggestionsContainer;
        
        // Create suggestions container
        suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'absolute top-full left-0 right-0 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg mt-2 shadow-lg z-50 max-h-60 overflow-y-auto hidden';
        searchInput.parentElement.style.position = 'relative';
        searchInput.parentElement.appendChild(suggestionsContainer);
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            if (searchTerm.length >= 2) {
                const matches = suggestions.filter(name => 
                    name.toLowerCase().includes(searchTerm)
                ).slice(0, 5);
                
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
            if (!searchInput.parentElement.contains(e.target)) {
                hideSuggestions();
            }
        });
        
        function showSuggestions(matches, searchTerm) {
            suggestionsContainer.innerHTML = matches.map(name => {
                const highlighted = name.replace(new RegExp(`(${searchTerm})`, 'gi'), '<mark class="bg-yellow-200 dark:bg-yellow-600">$1</mark>');
                return `
                    <div class="suggestion-item px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0" data-name="${name}">
                        <i class="fas fa-map text-accent mr-2"></i>
                        ${highlighted} जिल्हा
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
                    
                    // Scroll to the selected district card
                    const targetCard = Array.from(districtCards).find(card => card.dataset.name === selectedName);
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
    }
    
    console.log('Forts by District (Marathi) page loaded successfully');
});

// Add CSS for suggestion highlighting and animations
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