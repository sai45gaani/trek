<?php
// Set page specific variables
$page_title = 'डोंगररांगेनुसार किल्ले - सह्याद्री पर्वत | Trekshitz';
$meta_description = 'सह्याद्री, अजिंठा, सातमाळ आणि इतर डोंगररांगांमधील किल्ल्यांची संपूर्ण यादी. सविस्तर माहितीसह डोंगररांगांनुसार व्यवस्थित केलेले महाराष्ट्रातील किल्ले.';
$meta_keywords = 'सह्याद्री किल्ले, डोंगररांग, अजिंठा रांग, सातमाळ, पश्चिम घाट, महाराष्ट्र डोंगर';

require_once './../config/database.php';
// Include header
include './../includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Function to get region/district info for a range
function getRegionForRange($forts, $conn) {
    if (empty($forts)) return 'अज्ञात';
    
    // Get districts for this range's forts
    $fortNamesEng = array_map(function($fort) {
        return $fort['nameEng'];
    }, $forts);
    
    $fortNames = "'" . implode("','", array_map(function($name) use ($conn) {
        return $conn->real_escape_string($name);
    }, $fortNamesEng)) . "'";
    
    $query = "SELECT DISTINCT FortDistrictMar FROM mi_tblfortinfo_unicode WHERE FortName IN ($fortNames) AND FortDistrictMar IS NOT NULL AND FortDistrictMar != ''";
    $result = $conn->query($query);
    
    $districts = [];
    while ($row = $result->fetch_assoc()) {
        if (!empty(trim($row['FortDistrictMar']))) {
            $districts[] = trim($row['FortDistrictMar']);
        }
    }
    
    return empty($districts) ? 'महाराष्ट्र' : implode(', ', array_unique($districts));
}

// Function to generate description for a range in Marathi
function generateRangeDescription($rangeName, $fortCount) {
    $descriptions = [
        'सह्याद्री' => 'मुख्य पश्चिम घाट रांग, शिवाजी महाराजांच्या बहुतेक किल्ल्यांचे ठिकाण',
        'अजिंठा' => 'ऐतिहासिक महत्त्व असलेली उत्तर महाराष्ट्रातील विस्तृत डोंगररांग',
        'सातमाळ' => 'उत्तर महाराष्ट्रातील ऐतिहासिक किल्ल्यांची समृद्ध रांग',
        'रत्नागिरी' => 'निसर्गरम्य किल्ल्यांसह कोकणातील किनारी रांग',
        'कोकण' => 'अरबी समुद्राच्या दृश्यांसह सुंदर किनारी डोंगररांग',
        'default' => "$fortCount ऐतिहासिक किल्ल्यांसह उत्कृष्ट ट्रेकिंग संधी देणारी डोंगररांग"
    ];
    
    // Check if range name contains any key words
    foreach ($descriptions as $key => $desc) {
        if ($key !== 'default' && stripos($rangeName, $key) !== false) {
            return $desc;
        }
    }
    
    return $descriptions['default'];
}

// Function to get color class for range
function getRangeColor($index) {
    $colors = [
        'bg-red-100 dark:bg-red-900',
        'bg-blue-100 dark:bg-blue-900', 
        'bg-green-100 dark:bg-green-900',
        'bg-yellow-100 dark:bg-yellow-900',
        'bg-purple-100 dark:bg-purple-900',
        'bg-indigo-100 dark:bg-indigo-900',
        'bg-pink-100 dark:bg-pink-900',
        'bg-teal-100 dark:bg-teal-900',
        'bg-orange-100 dark:bg-orange-900',
        'bg-cyan-100 dark:bg-cyan-900'
    ];
    
    return $colors[$index % count($colors)];
}

// Slug generation function
function slugify($string) {
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
    $string = preg_replace('/\s+/u', '-', trim($string));
    return mb_strtolower($string) . '-fort';
}

// Build mountain ranges array from database
$mountainRanges = [];

// Query to get all ranges and their forts from Marathi table
$query = "SELECT FortRangeMar, FortNameMar, FortName, FortDistrictMar, GradeMar, FortTypeMar 
          FROM mi_tblfortinfo_unicode 
          WHERE FortRangeMar IS NOT NULL 
          AND FortRangeMar != '' 
          AND FortRangeMar != 'डोंगररांग नाही'
          AND FortNameMar IS NOT NULL 
          ORDER BY FortRangeMar, FortNameMar";

$result = $conn->query($query);

// Group forts by range
$rangeData = [];
while ($row = $result->fetch_assoc()) {
    $range = trim($row['FortRangeMar']);
    $fortNameMar = trim($row['FortNameMar']);
    $fortNameEng = trim($row['FortName']);
    $difficulty = trim($row['GradeMar'] ?? 'मध्यम');
    $fortType = trim($row['FortTypeMar'] ?? 'डोंगर किल्ला');
    
    if (!empty($range) && !empty($fortNameMar)) {
        if (!isset($rangeData[$range])) {
            $rangeData[$range] = [];
        }
        $rangeData[$range][] = [
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
foreach ($rangeData as $rangeName => $forts) {
    // Clean range name and create key
    $rangeKey = str_replace(' ', '_', $rangeName);
    
    $mountainRanges[$rangeKey] = [
        'name' => $rangeName,
        'description' => generateRangeDescription($rangeName, count($forts)),
        'forts' => $forts,
        'color' => getRangeColor($colorIndex),
        'region' => getRegionForRange($forts, $conn)
    ];
    
    $colorIndex++;
}

// Sort ranges alphabetically in Marathi
ksort($mountainRanges, SORT_LOCALE_STRING);

// Get current range from URL parameter
$currentRange = isset($_GET['range']) ? $_GET['range'] : '';
$selectedRange = $currentRange && isset($mountainRanges[$currentRange]) ? $mountainRanges[$currentRange] : null;

// Calculate total forts
$totalForts = array_sum(array_map(function($range) { return count($range['forts']); }, $mountainRanges));
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"mountain-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"15,2 25,18 5,18\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23mountain-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    डोंगररांगेनुसार <span class="text-accent">किल्ले</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    महाराष्ट्रातील विविध डोंगररांगांमधील किल्ल्यांची संपूर्ण माहिती
                </p>
                <p class="text-lg mb-8 opacity-80">
                    सह्याद्री, अजिंठा, सातमाळ आणि इतर डोंगररांगांमधील ऐतिहासिक किल्ले
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="./fort_in_marathi.php" class="hover:text-accent transition-colors">मुळाक्षरानुसार</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">डोंगररांगेनुसार</span>
                    <span>•</span>
                    <a href="./fort_by_district_marathi.php" class="hover:text-accent transition-colors">जिल्ह्यानुसार</a>
                    <span>•</span>
                    <a href="./fort_by_category_marathi.php" class="hover:text-accent transition-colors">प्रकारानुसार</a>
                    <span>•</span>
                    <a href="./fort_by_grade_marathi.php" class="hover:text-accent transition-colors">कठीणतेनुसार</a>
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
                    <div class="text-gray-600 dark:text-gray-300">डोंगररांगा</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $totalForts; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">एकूण किल्ले</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count(array_unique(array_column($mountainRanges, 'region'))); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">प्रदेश</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">वर्षांचा इतिहास</div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($selectedRange): ?>
        <!-- Selected Range Details -->
        <section class="py-20 bg-gradient-to-r from-primary to-secondary text-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-8">
                        <div class="mb-6">
                            <a href="?range=" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>मागे
                            </a>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold mb-4"><?php echo $selectedRange['name']; ?> रांग</h2>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedRange['description']; ?></p>
                        <div class="flex flex-wrap justify-center gap-3">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedRange['forts']); ?> किल्ले
                            </span>
                            <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo $selectedRange['region']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">
                        या डोंगररांगेतील किल्ले
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedRange['forts'] as $fort): ?>
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
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Search and Filter Section -->
        <section class="py-16 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4">
                <!-- Search and Filter Controls -->
                <div class="max-w-6xl mx-auto mb-12">
                    <div class="flex flex-col md:flex-row gap-4 items-end justify-center">
                        <!-- Search Mountain Range -->
                        <div class="w-full md:w-80">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-search mr-2"></i>डोंगररांग शोधा
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="rangeSearch" 
                                    placeholder="रांग शोधण्यासाठी टाइप करा..." 
                                    class="w-full px-4 py-3 pl-10 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                                >
                                <i class="fas fa-search absolute left-3 top-4 text-gray-400 text-sm"></i>
                            </div>
                        </div>

                        <!-- District Filter -->
                        <div class="w-full md:w-64">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-map-marker-alt mr-2"></i>जिल्हा निवडा
                            </label>
                            <select 
                                id="districtFilter" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-white focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                            >
                                <option value="">सर्व जिल्हे</option>
                                <?php 
                                // Get unique districts from all ranges
                                $allDistricts = [];
                                foreach($mountainRanges as $range) {
                                    $districts = explode(', ', $range['region']);
                                    foreach($districts as $district) {
                                        $district = trim($district);
                                        if (!empty($district) && !in_array($district, $allDistricts)) {
                                            $allDistricts[] = $district;
                                        }
                                    }
                                }
                                sort($allDistricts);
                                foreach($allDistricts as $district): 
                                ?>
                                    <option value="<?php echo htmlspecialchars($district); ?>"><?php echo htmlspecialchars($district); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Clear Button -->
                        <div class="w-full md:w-32">
                            <button 
                                id="clearFilters" 
                                class="w-full bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 flex items-center justify-center mt-6 md:mt-0"
                            >
                                <i class="fas fa-times mr-2"></i>साफ करा
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            डोंगररांगा
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        प्रत्येक डोंगररांगेतील किल्ल्यांची संपूर्ण माहिती
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="rangeGrid">
                    <?php foreach($mountainRanges as $key => $range): ?>
                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 searchable-range" 
                             data-name="<?php echo htmlspecialchars($range['name']); ?>"
                             data-region="<?php echo htmlspecialchars($range['region']); ?>">
                            
                            <div class="h-1 bg-gradient-to-r from-primary to-accent"></div>
                            
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $range['name']; ?>
                                    </h3>
                                    <i class="fas fa-mountain text-2xl text-accent"></i>
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                    <?php echo $range['description']; ?>
                                </p>
                                
                                <div class="mb-4">
                                    <div class="flex items-center justify-between text-sm mb-3">
                                        <span class="bg-gradient-to-r from-forest to-mountain text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            <?php echo $range['region']; ?>
                                        </span>
                                        <span class="bg-accent text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            <?php echo count($range['forts']); ?> किल्ले
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        या रांगेतील किल्ले:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach(array_slice($range['forts'], 0, 6) as $fort): ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-lg text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer" title="<?php echo htmlspecialchars($fort['nameMar']); ?>">
                                                <?php echo htmlspecialchars($fort['nameMar']); ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (count($range['forts']) > 6): ?>
                                            <span class="bg-accent text-white px-2 py-1 rounded-lg text-xs">
                                                +<?php echo count($range['forts']) - 6; ?> अधिक
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-hiking mr-1"></i>
                                        ट्रेकिंग उपलब्ध
                                    </span>
                                    
                                    <a href="?range=<?php echo urlencode($key); ?>" 
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
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-400 mb-4">कोणत्याही रांगा सापडल्या नाहीत</h3>
                    <p class="text-gray-500 dark:text-gray-500">आपले शोध शब्द समायोजित करून पहा</p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Additional Information Section -->
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
                            <i class="fas fa-mountain text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">सह्याद्री पर्वत</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            पश्चिम घाटातील सह्याद्री रांग महाराष्ट्राच्या बहुतेक ऐतिहासिक किल्ल्यांचे ठिकाण आहे.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        डोंगररांग शोधक मार्गदर्शक
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        संपूर्ण रांग मार्गदर्शक डाउनलोड करा ज्यामध्ये नकाशे, हवामान माहिती आणि ट्रेकिंग मार्ग आहेत
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/range-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            रांग मार्गदर्शक डाउनलोड करा
                        </a>
                        <a href="/trek-routes" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-route mr-2"></i>
                            ट्रेक मार्ग
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
                
                <a href="/marathi/forts-by-district" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:transform hover:-translate-y-2 transition-all duration-300 group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        जिल्ह्यानुसार
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        पुणे, मुंबई, नाशिक इ.
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

<?php include './../includes/footer.php'; ?>

<!-- JavaScript for Search and Interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get filter elements
    const searchInput = document.getElementById('rangeSearch');
    const districtFilter = document.getElementById('districtFilter');
    const clearButton = document.getElementById('clearFilters');
    const rangeCards = document.querySelectorAll('.searchable-range');
    const noResults = document.getElementById('noResults');
    const rangeGrid = document.getElementById('rangeGrid');
    
    // Filter function
    function filterRanges() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const selectedDistrict = districtFilter ? districtFilter.value.toLowerCase().trim() : '';
        let visibleCount = 0;
        
        rangeCards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const region = card.dataset.region.toLowerCase();
            
            // Check search term match
            const searchMatch = searchTerm === '' || 
                               name.includes(searchTerm) || 
                               region.includes(searchTerm);
            
            // Check district filter match
            const districtMatch = selectedDistrict === '' || 
                                region.includes(selectedDistrict);
            
            const isVisible = searchMatch && districtMatch;
            
            card.style.display = isVisible ? 'block' : 'none';
            if (isVisible) visibleCount++;
        });
        
        // Show/hide no results message
        if (visibleCount === 0 && (searchTerm.length > 0 || selectedDistrict.length > 0)) {
            noResults.classList.remove('hidden');
            rangeGrid.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            rangeGrid.classList.remove('hidden');
        }
        
        // Update URL parameters (optional)
        updateUrlParams(searchTerm, selectedDistrict);
    }
    
    // Update URL parameters
    function updateUrlParams(search, district) {
        const url = new URL(window.location);
        
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        
        if (district) {
            url.searchParams.set('district', district);
        } else {
            url.searchParams.delete('district');
        }
        
        // Update URL without page reload
        window.history.replaceState({}, '', url);
    }
    
    // Load filters from URL parameters
    function loadFiltersFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        const districtParam = urlParams.get('district');
        
        if (searchParam && searchInput) {
            searchInput.value = searchParam;
        }
        
        if (districtParam && districtFilter) {
            districtFilter.value = districtParam;
        }
        
        // Apply filters
        if (searchParam || districtParam) {
            filterRanges();
        }
    }
    
    // Clear all filters
    function clearAllFilters() {
        if (searchInput) searchInput.value = '';
        if (districtFilter) districtFilter.value = '';
        
        // Show all cards
        rangeCards.forEach(card => {
            card.style.display = 'block';
        });
        
        noResults.classList.add('hidden');
        rangeGrid.classList.remove('hidden');
        
        // Clear URL parameters
        const url = new URL(window.location);
        url.searchParams.delete('search');
        url.searchParams.delete('district');
        window.history.replaceState({}, '', url);
    }
    
    // Event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterRanges);
    }
    
    if (districtFilter) {
        districtFilter.addEventListener('change', filterRanges);
    }
    
    if (clearButton) {
        clearButton.addEventListener('click', clearAllFilters);
    }
    
    // Initialize filters from URL
    loadFiltersFromUrl();
    
    // Animate counters
    function animateCounters() {
        const counters = document.querySelectorAll('.animate-number');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateNumber(counter, target);
        });
    }
    
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 25);
    }
    
    // Initialize animations
    animateCounters();
    
    // Add loading animation to cards
    const rangeCardsAnimation = document.querySelectorAll('.searchable-range');
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
    
    rangeCardsAnimation.forEach(card => {
        cardObserver.observe(card);
    });
    
    console.log('डोंगररांगेनुसार किल्ले (मराठी) पृष्ठ यशस्वीरित्या लोड झाले');
    console.log(`एकूण रांगा: ${rangeCards.length}`);
});
</script>

<style>
.card {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.animate-number {
    transition: all 0.3s ease;
}

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

@media (max-width: 768px) {
    .grid.md\\:grid-cols-2.xl\\:grid-cols-3 {
        grid-template-columns: 1fr;
    }
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--secondary-color);
}

/* Searchable range transitions */
.searchable-range {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.searchable-range[style*="display: none"] {
    opacity: 0;
    transform: scale(0.95);
}
</style>
