<?php
// Set page specific variables
$page_title = 'Forts by Difficulty Grade - Trekking Levels | Trekshitz';
$meta_description = 'Easy, Medium, Hard and Extreme difficulty level forts in Maharashtra. Find forts according to your trekking experience and fitness level.';
$meta_keywords = 'fort grades, trekking difficulty, easy forts, hard forts, grading system, fort classification';

require_once './config/database.php';
// Include header
include './includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Function to normalize grade names from database
function normalizeGrade($grade) {
    $grade = trim(strtolower($grade));
    
    // Map various grade names to standard grades
    $gradeMap = [
        'easy' => 'Easy',
        'simple' => 'Easy',
        'beginner' => 'Easy',
        'medium' => 'Medium',
        'moderate' => 'Medium',
        'intermediate' => 'Medium',
        'hard' => 'Hard',
        'difficult' => 'Hard',
        'challenging' => 'Hard',
        'extreme' => 'Extreme',
        'very hard' => 'Extreme',
        'very difficult' => 'Extreme',
        'expert' => 'Extreme'
    ];
    
    return $gradeMap[$grade] ?? 'Medium'; // Default to Medium if unknown
}

// Predefined grade information
$gradeInfo = [
    'Easy' => [
        'description' => 'Perfect for beginners - requires minimal technical skills',
        'icon' => 'fa-smile',
        'duration' => '2-4 hours',
        'experience' => 'Beginner',
        'equipment' => 'Basic trekking gear',
        'tips' => 'Carry water and snacks, wear proper shoes'
    ],
    'Medium' => [
        'description' => 'Moderate experience required - some technical sections and climbing',
        'icon' => 'fa-meh',
        'duration' => '4-6 hours',
        'experience' => 'Intermediate',
        'equipment' => 'Trekking poles, helmet, first aid',
        'tips' => 'Go with a guide, check weather conditions'
    ],
    'Hard' => [
        'description' => 'For experienced trekkers - technical climbing and rock climbing required',
        'icon' => 'fa-frown',
        'duration' => '6-8 hours',
        'experience' => 'Experienced',
        'equipment' => 'Rock climbing gear, ropes, harness',
        'tips' => 'Go in groups, climb with experts, use safety equipment'
    ],
    'Extreme' => [
        'description' => 'For experts only - extremely dangerous and technical climbing',
        'icon' => 'fa-skull',
        'duration' => '8+ hours',
        'experience' => 'Expert',
        'equipment' => 'Complete climbing gear, rescue equipment',
        'tips' => 'Only with experts, good weather required, have emergency plan'
    ]
];

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
$gradeData['Easy']['color'] = 'bg-green-100 dark:bg-green-900';
$gradeData['Medium']['color'] = 'bg-yellow-100 dark:bg-yellow-900';
$gradeData['Hard']['color'] = 'bg-orange-100 dark:bg-orange-900';
$gradeData['Extreme']['color'] = 'bg-red-100 dark:bg-red-900';

// Query to get all forts with their grades
$query = "SELECT FortName, Grade 
          FROM EI_tblFortInfo 
          WHERE FortName IS NOT NULL 
          AND Grade IS NOT NULL 
          AND Grade != ''
          ORDER BY Grade, FortName";

$result = $conn->query($query);

// Group forts by grade
while ($row = $result->fetch_assoc()) {
    $fortName = trim($row['FortName']);
    $grade = normalizeGrade($row['Grade']);
    
    if (!empty($fortName) && isset($gradeData[$grade])) {
        $gradeData[$grade]['forts'][] = $fortName;
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
                    Forts by <span class="text-accent">Difficulty Grade</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Complete information about forts in Maharashtra organized by difficulty levels
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Easy, Medium, Hard and Extreme grade forts for all experience levels
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="./fort_in_english.php" class="hover:text-accent transition-colors">Alphabetical</a>
                    <span>•</span>
                    <a href="./fort_by_range_english.php" class="hover:text-accent transition-colors">By Mountain Range</a>
                    <span>•</span>
                    <a href="./fort_by_district_english.php" class="hover:text-accent transition-colors">By District</a>
                       <span>•</span>
                    <a href="./fort-by-category-english.php" class="hover:text-accent transition-colors">By Type</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">By Difficulty</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-green-500 mb-2 animate-number" data-target="<?php echo count($gradeData['Easy']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Easy Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-yellow-500 mb-2 animate-number" data-target="<?php echo count($gradeData['Medium']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Medium Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-orange-500 mb-2 animate-number" data-target="<?php echo count($gradeData['Hard']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Hard Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-red-500 mb-2 animate-number" data-target="<?php echo count($gradeData['Extreme']['forts']); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Extreme Forts</div>
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
                            <i class="fas fa-search mr-2"></i>Search Fort
                        </label>
                        <input 
                            type="text" 
                            id="gradeSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white"
                            placeholder="Type fort name..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-signal mr-2"></i>Select Difficulty
                        </label>
                        <select id="difficultyFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Grades</option>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                            <option value="Extreme">Extreme</option>
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
                    'Easy' => 'from-green-500 to-green-600',
                    'Medium' => 'from-yellow-500 to-yellow-600',
                    'Hard' => 'from-orange-500 to-orange-600',
                    'Extreme' => 'from-red-500 to-red-600'
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
                            <h2 class="text-4xl md:text-5xl font-bold"><?php echo $selectedGrade['name']; ?> Grade Forts</h2>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Back
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedGrade['description']; ?></p>
                        <div class="grid md:grid-cols-4 gap-4">
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">Duration</div>
                                <div class="font-semibold"><?php echo $selectedGrade['duration']; ?></div>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">Experience</div>
                                <div class="font-semibold"><?php echo $selectedGrade['experience']; ?></div>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">Forts</div>
                                <div class="font-semibold"><?php echo count($selectedGrade['forts']); ?></div>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                                <div class="text-sm opacity-75">Equipment</div>
                                <div class="font-semibold text-xs"><?php echo $selectedGrade['equipment']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">
                        <?php echo count($selectedGrade['forts']); ?> Forts in This Grade
                    </h3>
                    
                    <?php if (count($selectedGrade['forts']) > 0): ?>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedGrade['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-signal mr-2 text-accent"></i>
                                        <span><?php echo $selectedGrade['name']; ?> Grade</span>
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
                        <p class="text-gray-600 dark:text-gray-400 text-lg">No forts found in this grade level</p>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Tips Section -->
                    <div class="mt-8 bg-blue-50 dark:bg-blue-900 p-6 rounded-xl">
                        <h4 class="text-lg font-bold text-blue-800 dark:text-blue-200 mb-3">
                            <i class="fas fa-lightbulb mr-2"></i>Important Tips
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
                            Difficulty Grades
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Choose the appropriate grade based on your experience level
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8" id="gradeGrid">
                    <?php foreach($gradeData as $key => $grade): ?>
                        <?php
                        $iconColorMap = [
                            'Easy' => 'bg-green-500',
                            'Medium' => 'bg-yellow-500',
                            'Hard' => 'bg-orange-500',
                            'Extreme' => 'bg-red-500'
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
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">
                                            <?php echo $grade['name']; ?>
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <?php echo count($grade['forts']); ?> forts
                                        </p>
                                    </div>
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                                    <?php echo $grade['description']; ?>
                                </p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                                    <div>
                                        <div class="text-gray-500 dark:text-gray-400">Duration</div>
                                        <div class="font-semibold text-gray-800 dark:text-white"><?php echo $grade['duration']; ?></div>
                                    </div>
                                    <div>
                                        <div class="text-gray-500 dark:text-gray-400">Experience Level</div>
                                        <div class="font-semibold text-gray-800 dark:text-white"><?php echo $grade['experience']; ?></div>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        Some examples:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach(array_slice($grade['forts'], 0, 4) as $fort): ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer">
                                                <?php echo $fort; ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if(count($grade['forts']) > 4): ?>
                                            <span class="text-gray-500 text-xs">+<?php echo count($grade['forts']) - 4; ?> more</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-shield-alt mr-1"></i>
                                        Safety Guidelines
                                    </span>
                                    
                                    <a href="?grade=<?php echo urlencode($key); ?>" 
                                       class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 text-sm group">
                                        View Details
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
                        No Results Found
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
                <a href="/english/forts-alphabetical" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
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
                
                <a href="/english/forts-by-range" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
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
                
                <a href="/english/forts-by-district" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By District
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Pune, Mumbai, Nashik, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-category" class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 hover:transform hover:scale-105 group shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Type
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Hill forts, Sea forts, etc.
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
                        Trekking Guidelines
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <?php foreach($gradeData as $grade): ?>
                    <?php
                    $iconColorMap = [
                        'Easy' => 'bg-green-500',
                        'Medium' => 'bg-yellow-500',
                        'Hard' => 'bg-orange-500',
                        'Extreme' => 'bg-red-500'
                    ];
                    $iconColor = $iconColorMap[$grade['name']] ?? 'bg-primary';
                    ?>
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 <?php echo $iconColor; ?> rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas <?php echo $grade['icon']; ?> text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white"><?php echo $grade['name']; ?> Treks</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            <?php echo $grade['description']; ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        Safety Instructions
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Read all safety guidelines before trekking and prepare adequately
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/safety-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-shield-alt mr-2"></i>
                            Safety Guidelines
                        </a>
                        <a href="/equipment-guide" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-tools mr-2"></i>
                            Equipment List
                        </a>
                        <a href="/weather-info" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-cloud-sun mr-2"></i>
                            Weather Information
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
    
    console.log('Forts by Grade (Database-driven) page loaded successfully');
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