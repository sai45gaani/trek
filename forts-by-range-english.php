<?php
// Set page specific variables
$page_title = 'Forts by Mountain Range - Sahyadri Mountains | Trekshitz';
$meta_description = 'Complete list of forts in Sahyadri, Ajanta, Satmala and other mountain ranges. Forts in Maharashtra organized by mountain ranges with detailed information.';
$meta_keywords = 'Sahyadri forts, mountain ranges, Ajanta range, Satmala, Western Ghats, Maharashtra mountains';

// Include header
include './includes/header.php';

// Complete mountain ranges data translated to English
$mountainRanges = [
    'Ajanta' => [
        'name' => 'Ajanta',
        'description' => 'Historical forts in the Ajanta mountain range',
        'forts' => ['Antoor', 'Vetalwadi Gad'],
        'color' => 'bg-red-100 dark:bg-red-900',
        'region' => 'Aurangabad'
    ],
    'Ajanta Satmala' => [
        'name' => 'Ajanta Satmala', 
        'description' => 'Extensive mountain range in North Maharashtra',
        'forts' => ['Hatgad', 'Kanhergad', 'Makedya', 'Saptashrungi'],
        'color' => 'bg-blue-100 dark:bg-blue-900',
        'region' => 'Nashik, Dhule'
    ],
    'Avandgad' => [
        'name' => 'Avandgad',
        'description' => 'Single mountain in Sangli district',
        'forts' => ['Avandgad'],
        'color' => 'bg-green-100 dark:bg-green-900',
        'region' => 'Sangli'
    ],
    'Anvali Pavtarang (Nashik)' => [
        'name' => 'Anvali Pavtarang (Nashik)',
        'description' => 'Small mountain range in Nashik district',
        'forts' => ['Gadgada (Ghargad)'],
        'color' => 'bg-yellow-100 dark:bg-yellow-900',
        'region' => 'Nashik'
    ],
    'Amboli (Sindhudurg)' => [
        'name' => 'Amboli (Sindhudurg)',
        'description' => 'Hill station area in Western Ghats',
        'forts' => ['Mahadevgad', 'Manohar-Mansantosh Gad', 'Narayangad (Amboli)'],
        'color' => 'bg-purple-100 dark:bg-purple-900',
        'region' => 'Sindhudurg'
    ],
    'Anghai' => [
        'name' => 'Anghai',
        'description' => 'Single mountain in Pune district',
        'forts' => ['Anghai'],
        'color' => 'bg-indigo-100 dark:bg-indigo-900',
        'region' => 'Pune'
    ],
    'Bhugiri Gad (Bhugavai Gad)' => [
        'name' => 'Bhugiri Gad (Bhugavai Gad)',
        'description' => 'Mountainous region in North Maharashtra',
        'forts' => ['Idrai', 'Kala', 'Pedka', 'Sutonda (Naygaon Fort)'],
        'color' => 'bg-teal-100 dark:bg-teal-900',
        'region' => 'Thane, Raigad'
    ],
    'Hatgad Kanhergad' => [
        'name' => 'Hatgad Kanhergad',
        'description' => 'Twin mountains in Nashik district',
        'forts' => ['Hatgad', 'Kanhergad', 'Kanhergad (Chalisgaon)', 'Pedka', 'Rajdher'],
        'color' => 'bg-pink-100 dark:bg-pink-900', 
        'region' => 'Nashik'
    ],
    'Kanchan' => [
        'name' => 'Kanchan',
        'description' => 'Mountainous region in Nashik district',
        'forts' => ['Kanchan', 'Linza', 'Rajdher (Dheri)', 'Karnerang (Chalisgaon)', 'Manikpunj', 'Rajdher'],
        'color' => 'bg-cyan-100 dark:bg-cyan-900',
        'region' => 'Nashik'
    ],
    'Lahugad' => [
        'name' => 'Lahugad',
        'description' => 'Single mountain in Satara district',
        'forts' => ['Lahugad'],
        'color' => 'bg-orange-100 dark:bg-orange-900',
        'region' => 'Satara'
    ]
];

// Get current range from URL parameter
$currentRange = isset($_GET['range']) ? $_GET['range'] : '';
$selectedRange = $currentRange && isset($mountainRanges[$currentRange]) ? $mountainRanges[$currentRange] : null;
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
                    Forts by <span class="text-accent">Mountain Range</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Complete information about forts in various mountain ranges of Maharashtra
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Historical forts in Sahyadri, Ajanta, Satmala and other mountain ranges
                </p>
                
                <!-- Navigation breadcrumb -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/english/forts-alphabetical" class="hover:text-accent transition-colors">Alphabetical</a>
                    <span>•</span>
                    <span class="text-accent font-semibold">By Mountain Range</span>
                    <span>•</span>
                    <a href="/english/forts-by-district" class="hover:text-accent transition-colors">By District</a>
                    <span>•</span>
                    <a href="/english/forts-by-category" class="hover:text-accent transition-colors">By Type</a>
                    <span>•</span>
                    <a href="/english/forts-by-grade" class="hover:text-accent transition-colors">By Difficulty</a>
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
                    <div class="text-gray-600 dark:text-gray-300">Mountain Ranges</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="15">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Districts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1500">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Meters (Highest)</div>
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
                            <i class="fas fa-search mr-2"></i>Search Mountain Range
                        </label>
                        <input 
                            type="text" 
                            id="rangeSearch" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white"
                            placeholder="Type mountain range name..."
                            autocomplete="off"
                        >
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>Select District
                        </label>
                        <select id="regionFilter" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Districts</option>
                            <option value="Aurangabad">Aurangabad</option>
                            <option value="Nashik">Nashik</option>
                            <option value="Pune">Pune</option>
                            <option value="Sindhudurg">Sindhudurg</option>
                            <option value="Sangli">Sangli</option>
                            <option value="Dhule">Dhule</option>
                            <option value="Thane">Thane</option>
                            <option value="Raigad">Raigad</option>
                            <option value="Satara">Satara</option>
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
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl mb-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-48 h-48 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <polygon points="20,80 50,20 80,80" fill="white"/>
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-4xl md:text-5xl font-bold"><?php echo $selectedRange['name']; ?></h2>
                            <a href="?" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Back
                            </a>
                        </div>
                        <p class="text-xl mb-6 opacity-90"><?php echo $selectedRange['description']; ?></p>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <?php echo count($selectedRange['forts']); ?> Forts
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
                        Forts in This Mountain Range
                    </h3>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($selectedRange['forts'] as $fort): ?>
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:transform hover:scale-105 border border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-xl font-bold text-gray-800 dark:text-white">
                                        <?php echo $fort; ?>
                                    </h4>
                                    <i class="fas fa-fort-awesome text-accent text-2xl"></i>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-mountain mr-2 text-accent"></i>
                                        <span>Hill Fort</span>
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
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Mountain Ranges Grid -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            Mountain Ranges in Maharashtra
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Complete information about forts in each mountain range
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="rangeGrid">
                    <?php foreach($mountainRanges as $key => $range): ?>
                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 searchable-range" 
                             data-name="<?php echo $range['name']; ?>"
                             data-region="<?php echo $range['region']; ?>">
                            
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
                                            <?php echo count($range['forts']); ?> Forts
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        Forts in this range:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach($range['forts'] as $fort): ?>
                                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-lg text-xs border hover:bg-primary hover:text-white transition-colors cursor-pointer" title="<?php echo $fort; ?> - Click for more details">
                                                <?php echo $fort; ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 dark:text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-hiking mr-1"></i>
                                        Trekking Available
                                    </span>
                                    
                                    <a href="?range=<?php echo urlencode($key); ?>" 
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
                        No Mountain Ranges Found
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
                <a href="/english/forts-alphabetical" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
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
                
                <a href="/english/forts-by-district" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By District
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Pune, Mumbai, Nashik, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-category" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-layer-group text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Type
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Hill forts, Sea forts, etc.
                    </p>
                </a>
                
                <a href="/english/forts-by-grade" class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center hover-lift group shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-signal text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        By Difficulty
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Easy, Medium, Hard, etc.
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- Additional Information Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        About Mountain Ranges
                    </span>
                </h2>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-20 h-20 bg-primary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-mountain text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Sahyadri Mountains</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            The largest mountain range in the Western Ghats with the most forts. Many important forts from the time of Chhatrapati Shivaji Maharaj are located here.
                        </p>
                    </div>
                    
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-20 h-20 bg-secondary rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-route text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Trekking Routes</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Specific trekking routes, difficulty levels and safety instructions are available for each mountain range.
                        </p>
                    </div>
                    
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-20 h-20 bg-accent rounded-2xl flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-history text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Historical Significance</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Important forts from the Maratha Empire period, their history and architectural information.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        Mountain Range Trekking Guide
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Complete trekking guide, maps, weather information and safety instructions for each mountain range
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/trekking-guide" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Download Trekking Guide
                        </a>
                        <a href="/safety-tips" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-shield-alt mr-2"></i>
                            Safety Instructions
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
    const rangeCardsAnimation = document.querySelectorAll('.card');
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
    const fortTags = document.querySelectorAll('.bg-gray-100, .dark\\:bg-gray-700');
    fortTags.forEach(tag => {
        if (tag.textContent && tag.textContent.trim()) {
            tag.addEventListener('click', function(e) {
                e.preventDefault();
                const fortName = this.textContent.trim();
                console.log('Clicked on fort:', fortName);
                // You can add navigation to individual fort pages here
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
        }
    });
    
    // Search suggestions functionality
    if (searchInput) {
        const suggestions = Object.keys(<?php echo json_encode($mountainRanges); ?>);
        let suggestionsContainer;
        
        // Create suggestions container
        suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'absolute top-full left-0 right-0 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg mt-2 shadow-xl z-50 max-h-48 overflow-y-auto hidden';
        searchInput.parentElement.style.position = 'relative';
        searchInput.parentElement.appendChild(suggestionsContainer);
        
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            
            if (query.length >= 2) {
                const matches = suggestions.filter(item => 
                    item.toLowerCase().includes(query)
                ).slice(0, 5);
                
                if (matches.length > 0) {
                    showSuggestions(matches, query);
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
        
        function showSuggestions(matches, query) {
            suggestionsContainer.innerHTML = matches.map(name => {
                const highlighted = name.replace(new RegExp(`(${query})`, 'gi'), '<mark class="bg-yellow-200 dark:bg-yellow-600">$1</mark>');
                return `
                    <div class="suggestion-item px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0 transition-colors" data-name="${name}">
                        <i class="fas fa-mountain text-accent mr-2"></i>
                        ${highlighted}
                    </div>
                `;
            }).join('');
            
            suggestionsContainer.classList.remove('hidden');
            
            // Add click handlers to suggestions
            suggestionsContainer.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function() {
                    searchInput.value = this.dataset.name;
                    hideSuggestions();
                    filterRanges();
                });
            });
        }
        
        function hideSuggestions() {
            if (suggestionsContainer) {
                suggestionsContainer.classList.add('hidden');
            }
        }
    }
    
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
    
    console.log('Forts by Mountain Range (English) page loaded successfully');
});

// Add CSS for animations and styling
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
    
    .suggestion-item mark {
        background-color: rgba(255, 255, 0, 0.3);
        color: inherit;
        padding: 0;
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
    
    .from-forest {
        --tw-gradient-from: var(--forest);
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(53, 94, 59, 0));
    }
    
    .to-mountain {
        --tw-gradient-to: var(--mountain);
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