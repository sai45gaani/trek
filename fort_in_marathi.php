<?php
// Set page specific variables
$page_title = 'महाराष्ट्रातील किल्ले - मुळाक्षरानुसार | Trekshitz';
$meta_description = 'महाराष्ट्रातील 350+ किल्ल्यांची संपूर्ण यादी मुळाक्षरानुसार. सह्याद्री पर्वतरांगेतील सर्व किल्ल्यांची माहिती, नकाशे आणि ट्रेकिंग मार्गदर्शन.';
$meta_keywords = 'महाराष्ट्र किल्ले, सह्याद्री किल्ले, मराठी किल्ले, ट्रेकिंग, हिस्टोरिकल फोर्ट्स, शिवाजी महाराज किल्ले';

require_once './config/database.php';
// Include header
include './includes/header.php';

function getDifficultyInMarathi($english) {
    return match (strtolower(trim($english))) {
        'easy' => 'सोपा',
        'medium' => 'मध्यम',
        'hard', 'difficult' => 'कठीण',
        'very hard', 'very difficult', 'extreme' => 'अत्यंत कठीण',
        default => 'मध्यम'
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

$fortsData = [];

 // Fetch FortName and Grade from database
    $query = "SELECT FortName, Grade FROM ei_tblfortinfo WHERE FortName IS NOT NULL ORDER BY FortName ASC";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $fortName = trim($row['FortName']);
        $slug = slugify($fortName);
        $difficulty = getDifficultyInMarathi($row['Grade'] ?? '');

        // Get the first character in Marathi safely
        $firstLetter = mb_substr($fortName, 0, 1, "UTF-8");

        // Grouping under the first letter
        $fortsData[$firstLetter][] = [
            'name' => $fortName,
            'slug' => $slug,
            'difficulty' => $difficulty
        ];
    }

   // echo "<pre>";
   // print_r($fortsData);
   // echo "</pre>";


// Fort data organized alphabetically in Marathi
/*
$fortsData = [
    'अ' => [
        ['name' => 'आड', 'slug' => 'aad-fort', 'difficulty' => 'सोपा'],
        ['name' => 'आमनेर', 'slug' => 'aamner-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अचला', 'slug' => 'achala-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अचलपूरचा किल्ला', 'slug' => 'achalpur-fort', 'difficulty' => 'सोपा'],
        ['name' => 'अग्वाडा', 'slug' => 'aguada-fort', 'difficulty' => 'सोपा'],
        ['name' => 'अहिवंत', 'slug' => 'ahivant-fort', 'difficulty' => 'कठीण'],
        ['name' => 'अजिंक्यतारा', 'slug' => 'ajinkyatara-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अजिंठा', 'slug' => 'ajintha-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अजिंठा सराई', 'slug' => 'ajintha-sarai', 'difficulty' => 'सोपा'],
        ['name' => 'अजमेरा', 'slug' => 'ajmera-fort', 'difficulty' => 'कठीण'],
        ['name' => 'आजोबा (आजा पर्वत)', 'slug' => 'ajoba-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अकलूजचा किल्ला', 'slug' => 'akluj-fort', 'difficulty' => 'सोपा'],
        ['name' => 'अलंग', 'slug' => 'alang-fort', 'difficulty' => 'अत्यंत कठीण'],
        ['name' => 'अंमळनेर', 'slug' => 'amalner-fort', 'difficulty' => 'सोपा'],
        ['name' => 'अंबागड', 'slug' => 'ambagad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'आंबोळगड', 'slug' => 'ambolgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अमरावतीचा किल्ला', 'slug' => 'amravati-fort', 'difficulty' => 'सोपा'],
        ['name' => 'अनंतपूर किल्ला', 'slug' => 'anantpur-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अणघई', 'slug' => 'anghai-fort', 'difficulty' => 'कठीण'],
        ['name' => 'अंजनेरी', 'slug' => 'anjaneri-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अंकाई(अणकाई)', 'slug' => 'ankai-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अंतुर', 'slug' => 'antoor-fort', 'difficulty' => 'कठीण'],
        ['name' => 'अर्जूनगड', 'slug' => 'arjungad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अर्नाळा', 'slug' => 'arnala-fort', 'difficulty' => 'सोपा'],
        ['name' => 'आसावा', 'slug' => 'asawa-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अशेरीगड', 'slug' => 'asherigad-fort', 'difficulty' => 'कठीण'],
        ['name' => 'औंढा (अवंध)', 'slug' => 'aundha-fort', 'difficulty' => 'सोपा'],
        ['name' => 'औसा', 'slug' => 'ausa-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'अवचितगड', 'slug' => 'avchitgad-fort', 'difficulty' => 'कठीण'],
        ['name' => 'आवाडे कोट', 'slug' => 'awade-kot-fort', 'difficulty' => 'सोपा']
    ],
    'ब' => [
        ['name' => 'बहादरपूर', 'slug' => 'bahadurpur-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बहादूरगड (पेडगावचा किल्ला)', 'slug' => 'bahadurgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'बहादूरवाडी गड', 'slug' => 'bahadurwadi-gad', 'difficulty' => 'मध्यम'],
        ['name' => 'बहुला', 'slug' => 'bahula-fort', 'difficulty' => 'कठीण'],
        ['name' => 'बाळापूर किल्ला', 'slug' => 'balapur-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बल्लाळगड', 'slug' => 'ballalgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'बळवंतगड', 'slug' => 'balwantgad-fort', 'difficulty' => 'कठीण'],
        ['name' => 'बांदा किल्ला', 'slug' => 'banda-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बांद्रयाचा किल्ला', 'slug' => 'bandra-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बाणकोट', 'slug' => 'bankot-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बारवाई', 'slug' => 'barvai-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'बेलापूरचा किल्ला', 'slug' => 'belapur-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बेळगावचा किल्ला', 'slug' => 'belgaum-fort', 'difficulty' => 'सोपा'],
        ['name' => 'भगवंतगड', 'slug' => 'bhagwantgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भैरवगड (सातारा)', 'slug' => 'bhairavgad-satara', 'difficulty' => 'मध्यम'],
        ['name' => 'भैरवगड(कोथळे)', 'slug' => 'bhairavgad-kothale', 'difficulty' => 'मध्यम'],
        ['name' => 'भैरवगड (मोरोशी)', 'slug' => 'bhairavgad-moroshi', 'difficulty' => 'कठीण'],
        ['name' => 'भैरवगड(शिरपुंजे)', 'slug' => 'bhairavgad-shirpunje', 'difficulty' => 'मध्यम'],
        ['name' => 'भामेर', 'slug' => 'bhamer-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भंडारदुर्ग/भांडारदुर्ग', 'slug' => 'bhandardurg-fort', 'difficulty' => 'सोपा'],
        ['name' => 'भांगसी गड (भांगसाई गड)', 'slug' => 'bhangsigad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भरतगड', 'slug' => 'bharatgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भास्करगड (बसगड)', 'slug' => 'bhaskargad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भवानगड', 'slug' => 'bhavangad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भवानीगड', 'slug' => 'bhavanigad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भिलाई', 'slug' => 'bhilai-fort', 'difficulty' => 'सोपा'],
        ['name' => 'भीमाशंकर', 'slug' => 'bhimashankar-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भिवागड', 'slug' => 'bhivagad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भिवगड / भिमगड', 'slug' => 'bhivgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भोरगिरी', 'slug' => 'bhorgiri-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भोरवाडीचा किल्ला', 'slug' => 'bhorwadi-fort', 'difficulty' => 'सोपा'],
        ['name' => 'भुदरगड', 'slug' => 'bhudargad-fort', 'difficulty' => 'कठीण'],
        ['name' => 'भूपाळगड (बाणूर गड)', 'slug' => 'bhupalgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भूपतगड', 'slug' => 'bhupatgad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'भूषणगड', 'slug' => 'bhushangad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'बिरवाडी', 'slug' => 'birwadi-fort', 'difficulty' => 'सोपा'],
        ['name' => 'बिष्टा', 'slug' => 'bishta-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'बितनगड', 'slug' => 'bitangad-fort', 'difficulty' => 'मध्यम']
    ],
    'च' => [
        ['name' => 'चाकणचा किल्ला', 'slug' => 'chakan-fort', 'difficulty' => 'सोपा'],
        ['name' => 'चांभारगड', 'slug' => 'chambhargad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'चंदन वंदन', 'slug' => 'chandan-vandan', 'difficulty' => 'सोपा'],
        ['name' => 'चंदेरी', 'slug' => 'chanderi-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'चंद्रगड ते आर्थरसीट रेंज ट्रेक', 'slug' => 'chandragad-arthur-seat', 'difficulty' => 'कठीण'],
        ['name' => 'चंद्रगड(ढवळगड)', 'slug' => 'chandragad-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'चांदवड', 'slug' => 'chandwad-fort', 'difficulty' => 'सोपा'],
        ['name' => 'चापोरा किल्ला', 'slug' => 'chapora-fort', 'difficulty' => 'सोपा'],
        ['name' => 'चौगावचा किल्ला', 'slug' => 'chaugaon-fort', 'difficulty' => 'सोपा'],
        ['name' => 'चौल्हेर', 'slug' => 'chaulher-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'चावंड', 'slug' => 'chavand-fort', 'difficulty' => 'मध्यम'],
        ['name' => 'कुलाबा किल्ला', 'slug' => 'colaba-fort', 'difficulty' => 'सोपा']
    ]
    
];
*/
// Get current filter from URL parameter
$currentFilter = isset($_GET['letter']) ? $_GET['letter'] : 'अ';
?>

<style>
/* Fort-specific styles */
.fort-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.fort-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: var(--accent-color);
}

.difficulty-badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 1rem;
    font-weight: 600;
}

.difficulty-easy {
    background-color: #10b981;
    color: white;
}

.difficulty-medium {
    background-color: #f59e0b;
    color: white;
}

.difficulty-hard {
    background-color: #ef4444;
    color: white;
}

.difficulty-extreme {
    background-color: #8b5cf6;
    color: white;
}

.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.alphabet-btn {
    padding: 0.5rem 1rem;
    border: 2px solid var(--primary-color);
    background: transparent;
    color: var(--primary-color);
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 1.1rem;
}

.alphabet-btn:hover,
.alphabet-btn.active {
    background: var(--primary-color);
    color: white;
    transform: scale(1.05);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 1.5rem;
    border-radius: 1rem;
    text-align: center;
}

.search-container {
    position: relative;
    max-width: 500px;
    margin: 0 auto 2rem;
}

.search-input {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 2rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(127, 176, 105, 0.1);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
}

@media (max-width: 768px) {
    .alphabet-filter {
        gap: 0.25rem;
    }
    
    .alphabet-btn {
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-nature text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort-pattern\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"10,2 18,10 10,18 2,10\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    महाराष्ट्रातील <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up font-devanagari">
                    सह्याद्री पर्वतरांगेतील 350+ किल्ल्यांची संपूर्ण माहिती
                </p>
                <p class="text-lg mb-8 opacity-80 animate-fade-in-up">
                    मुळाक्षरानुसार व्यवस्थित केलेली सर्व किल्ल्यांची यादी
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2 animate-number" data-target="350">0</div>
                    <div class="text-lg">एकूण किल्ले</div>
                </div>
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2 animate-number" data-target="15">0</div>
                    <div class="text-lg">जिल्हे</div>
                </div>
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2 animate-number" data-target="5">0</div>
                    <div class="text-lg">पर्वतरांगा</div>
                </div>
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2 animate-number" data-target="500">0</div>
                    <div class="text-lg">वर्षांचा इतिहास</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <!-- Search Bar -->
            <div class="search-container">
                <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
                <input 
                    type="text" 
                    class="search-input" 
                    placeholder="किल्ल्याचे नाव शोधा..." 
                    id="fortSearch"
                    autocomplete="off"
                >
            </div>

            <!-- Alphabet Filter -->
            <div class="alphabet-filter">
                <?php 
                $marathi_letters = ['अ', 'ब', 'च', 'द', 'फ', 'ग', 'ह', 'इ', 'ज', 'क', 'ल', 'म', 'न', 'प', 'र', 'स', 'त', 'उ', 'व', 'व', 'य'];
                foreach($marathi_letters as $letter): 
                ?>
                    <a href="?letter=<?php echo urlencode($letter); ?>" 
                       class="alphabet-btn <?php echo ($currentFilter === $letter) ? 'active' : ''; ?>">
                        <?php echo $letter; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Forts Listing Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <?php if(isset($fortsData[$currentFilter])): ?>
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-center text-gradient mb-4">
                        <?php echo $currentFilter; ?> - अक्षरापासून सुरू होणारे किल्ले
                    </h2>
                    <p class="text-center text-gray-600 dark:text-gray-300">
                        <?php echo count($fortsData[$currentFilter]); ?> किल्ले सापडले
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="fortsGrid">
                    <?php foreach($fortsData[$currentFilter] as $fort): ?>
                        <div class="fort-card rounded-2xl p-6 hover-lift searchable-fort" 
                             data-name="<?php echo htmlspecialchars($fort['name']); ?>">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">
                                    <?php echo htmlspecialchars($fort['name']); ?>
                                </h3>
                                <?php
                                $difficultyClass = 'difficulty-medium';
                                switch($fort['difficulty']) {
                                    case 'सोपा': $difficultyClass = 'difficulty-easy'; break;
                                    case 'कठीण': $difficultyClass = 'difficulty-hard'; break;
                                    case 'अत्यंत कठीण': $difficultyClass = 'difficulty-extreme'; break;
                                }
                                ?>
                                <span class="difficulty-badge <?php echo $difficultyClass; ?>">
                                    <?php echo $fort['difficulty']; ?>
                                </span>
                            </div>
                            
                            <div class="mb-6">
                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                                    <i class="fas fa-mountain mr-2 text-accent"></i>
                                    <span class="text-sm">पर्वतीय किल्ला</span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                                    <i class="fas fa-map-marker-alt mr-2 text-accent"></i>
                                    <span class="text-sm">महाराष्ट्र</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="/fort/<?php echo $fort['slug']; ?>" 
                                   class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2 px-4 rounded-lg font-semibold transition-colors duration-300">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    माहिती
                                </a>
                                <a href="/trek/<?php echo $fort['slug']; ?>" 
                                   class="flex-1 bg-accent hover:bg-primary text-white text-center py-2 px-4 rounded-lg font-semibold transition-colors duration-300">
                                    <i class="fas fa-route mr-1"></i>
                                    ट्रेक
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-20">
                    <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        या अक्षरासाठी किल्ले उपलब्ध नाहीत
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        कृपया दुसरे अक्षर निवडा
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Additional Information Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-gradient mb-8">
                    किल्ल्यांबद्दल अधिक माहिती
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="card p-8">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 font-devanagari">छत्रपती शिवाजी महाराज</h3>
                        <p class="text-gray-600 dark:text-gray-300 font-devanagari">
                            महान मराठा योद्धा राजा शिवाजी महाराजांनी बांधलेले आणि जिंकलेले किल्ले
                        </p>
                    </div>
                    
                    <div class="card p-8">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-hiking text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">ट्रेकिंग मार्गदर्शन</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            प्रत्येक किल्ल्यासाठी संपूर्ण ट्रेकिंग मार्गदर्शन आणि सुरक्षिततेच्या सूचना
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-nature text-white p-8 rounded-2xl">
                    <h3 class="text-2xl font-bold mb-4 font-devanagari">
                        आमच्यासोबत जुडा
                    </h3>
                    <p class="text-lg mb-6 opacity-90">
                        नियमित ट्रेक्स, कार्यशाळा आणि किल्ल्यांबद्दलच्या नवीन माहितीसाठी आमच्यासोबत जुडा
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#treks" class="btn btn-accent">
                            <i class="fas fa-calendar mr-2"></i>
                            यावणारे ट्रेक्स
                        </a>
                        <a href="#newsletter" class="btn btn-secondary">
                            <i class="fas fa-envelope mr-2"></i>
                            न्यूझलेटर सबस्क्राइब करा
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Navigation -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gradient mb-12">
                इतर श्रेणींनुसार शोधा
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/marathi/forts-by-range" class="card p-6 text-center hover-lift group">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-secondary transition-colors">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        डोंगररांगेनुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        सह्याद्री, पश्चिम घाट इत्यादी
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
</main>

<?php include './includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('fortSearch');
    const fortCards = document.querySelectorAll('.searchable-fort');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            fortCards.forEach(function(card) {
                const fortName = card.dataset.name.toLowerCase();
                if (fortName.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.classList.remove('hidden');
                } else {
                    card.style.display = 'none';
                    card.classList.add('hidden');
                }
            });
            
            // Update results count
            const visibleCards = Array.from(fortCards).filter(card => !card.classList.contains('hidden'));
            updateResultsCount(visibleCards.length);
        });
    }
    
    function updateResultsCount(count) {
        const resultsText = document.querySelector('.results-count');
        if (resultsText) {
            resultsText.textContent = `${count} किल्ले सापडले`;
        }
    }
    
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
        });
        
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
    
    // Add loading animation to cards
    const fortCards_animation = document.querySelectorAll('.fort-card');
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
    
    fortCards_animation.forEach(card => {
        cardObserver.observe(card);
    });
    
    // Add hover effects to alphabet buttons
    const alphabetBtns = document.querySelectorAll('.alphabet-btn');
    alphabetBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05) translateY(-2px)';
        });
        
        btn.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1) translateY(0)';
            }
        });
    });
    
    // Enhanced search with autocomplete suggestions
    const searchContainer = document.querySelector('.search-container');
    let suggestionsContainer;
    
    if (searchInput && fortCards.length > 0) {
        // Create suggestions container
        suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'absolute top-full left-0 right-0 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg mt-2 shadow-lg z-50 max-h-60 overflow-y-auto hidden';
        searchContainer.appendChild(suggestionsContainer);
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            if (searchTerm.length >= 2) {
                const matches = Array.from(fortCards)
                    .map(card => card.dataset.name)
                    .filter(name => name.toLowerCase().includes(searchTerm))
                    .slice(0, 8);
                
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
            if (!searchContainer.contains(e.target)) {
                hideSuggestions();
            }
        });
    }
    
    function showSuggestions(matches, searchTerm) {
        suggestionsContainer.innerHTML = matches.map(name => {
            const highlighted = name.replace(new RegExp(`(${searchTerm})`, 'gi'), '<mark class="bg-yellow-200 dark:bg-yellow-600">$1</mark>');
            return `
                <div class="suggestion-item px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0" data-name="${name}">
                    <i class="fas fa-fort-awesome text-accent mr-2"></i>
                    ${highlighted}
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
                
                // Scroll to the selected fort card
                const targetCard = Array.from(fortCards).find(card => card.dataset.name === selectedName);
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
    
    // Keyboard navigation for search
    searchInput.addEventListener('keydown', function(e) {
        const suggestions = suggestionsContainer.querySelectorAll('.suggestion-item');
        let currentIndex = Array.from(suggestions).findIndex(item => item.classList.contains('highlighted'));
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                if (currentIndex < suggestions.length - 1) {
                    if (currentIndex >= 0) suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[currentIndex + 1].classList.add('highlighted');
                } else if (suggestions.length > 0) {
                    if (currentIndex >= 0) suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[0].classList.add('highlighted');
                }
                break;
                
            case 'ArrowUp':
                e.preventDefault();
                if (currentIndex > 0) {
                    suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[currentIndex - 1].classList.add('highlighted');
                } else if (suggestions.length > 0) {
                    if (currentIndex >= 0) suggestions[currentIndex].classList.remove('highlighted');
                    suggestions[suggestions.length - 1].classList.add('highlighted');
                }
                break;
                
            case 'Enter':
                e.preventDefault();
                if (currentIndex >= 0 && suggestions[currentIndex]) {
                    suggestions[currentIndex].click();
                }
                break;
                
            case 'Escape':
                hideSuggestions();
                break;
        }
    });
    
    console.log('Forts in Maharashtra (Marathi) page loaded successfully');
});

// Add CSS for suggestion highlighting
const style = document.createElement('style');
style.textContent = `
    .suggestion-item.highlighted {
        background-color: var(--accent-color) !important;
        color: white !important;
    }
    
    .suggestion-item mark {
        background-color: rgba(255, 255, 0, 0.3);
        color: inherit;
        padding: 0;
    }
    
    .suggestion-item.highlighted mark {
        background-color: rgba(255, 255, 255, 0.3);
    }
`;
document.head.appendChild(style);
</script>