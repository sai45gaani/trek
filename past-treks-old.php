<?php
// Set page specific variables
$page_title = 'Past Treks - Completed Adventures | Trekshitz';
$meta_description = 'Explore our completed treks and adventures. See the amazing places we have visited with Trekshitz including forts, waterfalls, and heritage walks in the Sahyadri mountains.';
$meta_keywords = 'past treks, completed treks, Trekshitz adventures, Maharashtra trekking history, fort expeditions, waterfall treks';

// Include header
include './includes/header.php';

// Static past treks data based on your screenshot
$pastTreksData = [
    [
        'id' => 1,
        'name' => 'Secret Waterfall (Cliff Jumping)',
        'date' => '2025-06-29',
        'category' => 'Waterfall',
        'participants' => 35,
        'leader' => 'Rohit Patil',
        'grade' => 'Medium',
        'location' => 'Western Ghats',
        'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Adventure trek to a hidden waterfall with cliff jumping activities'
    ],
    [
        'id' => 2,
        'name' => 'Ramsej Fort',
        'date' => '2025-06-22',
        'category' => 'Fort',
        'participants' => 28,
        'leader' => 'Sunit Pendse',
        'grade' => 'Easy',
        'location' => 'Nashik',
        'image' => 'https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Historical fort trek with panoramic views of surrounding valleys'
    ],
    [
        'id' => 3,
        'name' => 'Domzira Waterfall',
        'date' => '2025-06-15',
        'category' => 'Waterfall',
        'participants' => 42,
        'leader' => 'Tanmay Joshi',
        'grade' => 'Medium',
        'location' => 'Konkan',
        'image' => 'https://images.unsplash.com/photo-1586348943529-beaae6c28db9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Monsoon trek to the spectacular Domzira waterfall'
    ],
    [
        'id' => 4,
        'name' => 'Sinhgad (Night Stay with Historian Balkawde Sir)',
        'date' => '2025-06-07',
        'category' => 'Fort',
        'participants' => 25,
        'leader' => 'Dr. Balkawde',
        'grade' => 'Easy',
        'location' => 'Pune',
        'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Historical night trek with expert historian guidance'
    ],
    [
        'id' => 5,
        'name' => 'Rajgad Fort (with Historian Sachin Joshi Sir)',
        'date' => '2025-05-24',
        'category' => 'Fort',
        'participants' => 38,
        'leader' => 'Sachin Joshi',
        'grade' => 'Medium',
        'location' => 'Pune',
        'image' => 'https://images.unsplash.com/photo-1464822759844-d5709c4c2d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Royal capital of Chhatrapati Shivaji Maharaj with historical insights'
    ],
    [
        'id' => 6,
        'name' => 'Plus Valley',
        'date' => '2025-05-10',
        'category' => 'Valley',
        'participants' => 22,
        'leader' => 'Amit Kulkarni',
        'grade' => 'Hard',
        'location' => 'Sahyadri',
        'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Challenging valley trek through dense forests and rocky terrain'
    ],
    [
        'id' => 7,
        'name' => 'Ranthambore National Park Safari (Rajasthan)',
        'date' => '2025-04-24',
        'category' => 'Wildlife',
        'participants' => 18,
        'leader' => 'Wildlife Expert',
        'grade' => 'Easy',
        'location' => 'Rajasthan',
        'image' => 'https://images.unsplash.com/photo-1549366021-9f761d040ed2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Wildlife safari in the famous Ranthambore National Park'
    ],
    [
        'id' => 8,
        'name' => 'Kalmandavi Waterfall (Cliff Jumping Special)',
        'date' => '2025-04-20',
        'category' => 'Waterfall',
        'participants' => 31,
        'leader' => 'Adventure Team',
        'grade' => 'Medium',
        'location' => 'Western Ghats',
        'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Thrilling waterfall trek with cliff jumping activities'
    ],
    [
        'id' => 9,
        'name' => 'Padargad',
        'date' => '2025-03-02',
        'category' => 'Fort',
        'participants' => 27,
        'leader' => 'Historical Team',
        'grade' => 'Medium',
        'location' => 'Sahyadri',
        'image' => 'https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Ancient fort trek with rich Maratha history'
    ],
    [
        'id' => 10,
        'name' => 'Murud Janjira with Historian Sachin Joshi Sir',
        'date' => '2025-02-16',
        'category' => 'Sea Fort',
        'participants' => 33,
        'leader' => 'Sachin Joshi',
        'grade' => 'Easy',
        'location' => 'Raigad',
        'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Unconquered sea fort with fascinating maritime history'
    ],
    [
        'id' => 11,
        'name' => 'Sattal Birding Tour (Uttarakhand)',
        'date' => '2025-02-06',
        'category' => 'Wildlife',
        'participants' => 15,
        'leader' => 'Bird Watching Expert',
        'grade' => 'Easy',
        'location' => 'Uttarakhand',
        'image' => 'https://images.unsplash.com/photo-1516466723877-e4ec1d736c8a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Bird watching expedition in the beautiful Sattal lakes'
    ],
    [
        'id' => 12,
        'name' => 'Ajinkyatara and Sajjangad',
        'date' => '2025-02-02',
        'category' => 'Fort',
        'participants' => 29,
        'leader' => 'Cultural Team',
        'grade' => 'Medium',
        'location' => 'Satara',
        'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Twin fort trek combining history and spirituality'
    ],
    [
        'id' => 13,
        'name' => 'Sudhagad Activity Trek',
        'date' => '2025-01-25',
        'category' => 'Adventure',
        'participants' => 24,
        'leader' => 'Adventure Sports Team',
        'grade' => 'Hard',
        'location' => 'Raigad',
        'image' => 'https://images.unsplash.com/photo-1464822759844-d5709c4c2d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Adventure activities combined with fort exploration'
    ],
    [
        'id' => 14,
        'name' => 'Bahadurwadi, Vilasgad, Banurgad, Machhidragad',
        'date' => '2025-01-11',
        'category' => 'Multi-Fort',
        'participants' => 35,
        'leader' => 'Expert Guide Team',
        'grade' => 'Hard',
        'location' => 'Multiple Locations',
        'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Multi-fort expedition covering four historical forts'
    ],
    [
        'id' => 15,
        'name' => 'Gingee (Tamilnadu)',
        'date' => '2024-12-13',
        'category' => 'Fort',
        'participants' => 20,
        'leader' => 'South India Expert',
        'grade' => 'Medium',
        'location' => 'Tamil Nadu',
        'image' => 'https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Exploring the Troy of the East - Gingee Fort complex'
    ],
    [
        'id' => 16,
        'name' => 'Chakdev, Mahimandangad and Parbat',
        'date' => '2024-11-30',
        'category' => 'Multi-Fort',
        'participants' => 31,
        'leader' => 'Heritage Guide',
        'grade' => 'Medium',
        'location' => 'Maharashtra',
        'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Triple fort expedition in the Sahyadri ranges'
    ],
    [
        'id' => 17,
        'name' => 'Trimbakgad (Bramhagiri) Fort',
        'date' => '2024-11-24',
        'category' => 'Fort',
        'participants' => 26,
        'leader' => 'Spiritual Guide',
        'grade' => 'Medium',
        'location' => 'Nashik',
        'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Sacred fort trek near the source of river Godavari'
    ],
    [
        'id' => 18,
        'name' => 'Pune Heritage Walk with Shri Balkawde Sir',
        'date' => '2024-11-10',
        'category' => 'Heritage',
        'participants' => 45,
        'leader' => 'Dr. Balkawde',
        'grade' => 'Easy',
        'location' => 'Pune',
        'image' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Historical walk through the cultural heritage of Pune city'
    ],
    [
        'id' => 19,
        'name' => 'Tahuli Trek',
        'date' => '2024-10-13',
        'category' => 'Peak',
        'participants' => 23,
        'leader' => 'Mountain Guide',
        'grade' => 'Hard',
        'location' => 'Sahyadri',
        'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Challenging peak trek with breathtaking summit views'
    ],
    [
        'id' => 20,
        'name' => 'Hadsar Fort',
        'date' => '2024-10-06',
        'category' => 'Fort',
        'participants' => 28,
        'leader' => 'Local Expert',
        'grade' => 'Medium',
        'location' => 'Maharashtra',
        'image' => 'https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'description' => 'Lesser-known fort with pristine natural surroundings'
    ]
];

// Helper functions
function getGradeColor($grade) {
    return match (strtolower(trim($grade))) {
        'easy' => 'bg-green-500',
        'medium' => 'bg-yellow-500',
        'hard', 'difficult' => 'bg-orange-500',
        'very hard', 'very difficult', 'extreme' => 'bg-red-500',
        default => 'bg-yellow-500'
    };
}

function getCategoryColor($category) {
    return match (strtolower(trim($category))) {
        'fort' => 'bg-blue-500',
        'waterfall' => 'bg-cyan-500',
        'sea fort' => 'bg-indigo-500',
        'wildlife' => 'bg-green-600',
        'heritage' => 'bg-purple-500',
        'adventure' => 'bg-red-600',
        'multi-fort' => 'bg-gray-600',
        'valley' => 'bg-teal-500',
        'peak' => 'bg-orange-600',
        default => 'bg-gray-500'
    };
}

function getCategoryIcon($category) {
    return match (strtolower(trim($category))) {
        'fort' => 'fas fa-fort-awesome',
        'waterfall' => 'fas fa-tint',
        'sea fort' => 'fas fa-anchor',
        'wildlife' => 'fas fa-paw',
        'heritage' => 'fas fa-landmark',
        'adventure' => 'fas fa-mountain',
        'multi-fort' => 'fas fa-layer-group',
        'valley' => 'fas fa-tree',
        'peak' => 'fas fa-flag',
        default => 'fas fa-hiking'
    };
}

function formatDate($date) {
    $months = [
        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
    ];
    
    $timestamp = strtotime($date);
    $day = date('d', $timestamp);
    $month = $months[(int)date('m', $timestamp)];
    $year = date('Y', $timestamp);
    
    return "$day $month $year";
}

function getTimeAgo($date) {
    $today = new DateTime();
    $trek_date = new DateTime($date);
    $diff = $today->diff($trek_date);
    
    if ($diff->days == 0) {
        return 'Today';
    } elseif ($diff->days == 1) {
        return '1 day ago';
    } elseif ($diff->days < 30) {
        return $diff->days . ' days ago';
    } elseif ($diff->days < 365) {
        $months = floor($diff->days / 30);
        return $months == 1 ? '1 month ago' : $months . ' months ago';
    } else {
        $years = floor($diff->days / 365);
        return $years == 1 ? '1 year ago' : $years . ' years ago';
    }
}

// Pagination and filtering
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

// Apply filters
$filteredTreks = $pastTreksData;

// Search filter
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
if (!empty($search_query)) {
    $filteredTreks = array_filter($filteredTreks, function($trek) use ($search_query) {
        return stripos($trek['name'], $search_query) !== false || 
               stripos($trek['location'], $search_query) !== false ||
               stripos($trek['leader'], $search_query) !== false;
    });
}

// Category filter
$filter_category = isset($_GET['category']) ? $_GET['category'] : '';
if (!empty($filter_category)) {
    $filteredTreks = array_filter($filteredTreks, function($trek) use ($filter_category) {
        return strtolower($trek['category']) === strtolower($filter_category);
    });
}

// Year filter
$filter_year = isset($_GET['year']) ? $_GET['year'] : '';
if (!empty($filter_year)) {
    $filteredTreks = array_filter($filteredTreks, function($trek) use ($filter_year) {
        return date('Y', strtotime($trek['date'])) == $filter_year;
    });
}

$total_treks = count($filteredTreks);
$total_pages = ceil($total_treks / $limit);
$paginatedTreks = array_slice($filteredTreks, $offset, $limit);

// Get unique categories and years for filters
$categories = array_unique(array_column($pastTreksData, 'category'));
$years = array_unique(array_map(function($trek) { return date('Y', strtotime($trek['date'])); }, $pastTreksData));
rsort($years);
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-forest to-mountain text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"past-trek-pattern\" x=\"0\" y=\"0\" width=\"25\" height=\"25\" patternUnits=\"userSpaceOnUse\"><circle cx=\"12.5\" cy=\"12.5\" r=\"3\" fill=\"%23ffffff\" opacity=\"0.1\"/><path d=\"M5,20 L20,5\" stroke=\"%23ffffff\" stroke-width=\"0.5\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23past-trek-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Past <span class="text-accent">Adventures</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Relive Our Amazing Trek Memories
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Explore the incredible journeys we've completed together across Maharashtra and beyond
                </p>
                
                <!-- Quick Navigation -->
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <a href="/trek-schedule" class="flex items-center gap-2 hover:text-accent transition-colors">
                        <i class="fas fa-calendar-plus"></i>
                        <span>Upcoming Treks</span>
                    </a>
                    <span class="text-accent">•</span>
                    <span class="text-accent font-semibold">Past Adventures</span>
                    <span class="text-accent">•</span>
                    <a href="/gallery" class="flex items-center gap-2 hover:text-accent transition-colors">
                        <i class="fas fa-images"></i>
                        <span>Photo Gallery</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-forest dark:text-accent mb-2 animate-number" data-target="<?php echo count($pastTreksData); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Completed Treks</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-forest dark:text-accent mb-2 animate-number" data-target="<?php echo array_sum(array_column($pastTreksData, 'participants')); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Participants</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-forest dark:text-accent mb-2 animate-number" data-target="<?php echo count($categories); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Categories Covered</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-forest dark:text-accent mb-2 animate-number" data-target="8">0</div>
                    <div class="text-gray-600 dark:text-gray-300">States Explored</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                <form method="GET" class="flex flex-col lg:flex-row gap-4 items-end">
                    <!-- Search -->
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search mr-2"></i>Search Past Treks
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                name="search"
                                value="<?php echo htmlspecialchars($search_query); ?>"
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-full focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-300" 
                                placeholder="Search by trek name, location, or leader..."
                                autocomplete="off"
                            >
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="w-full lg:w-48">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tags mr-2"></i>Category
                        </label>
                        <select name="category" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Categories</option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo strtolower($category); ?>" <?php echo $filter_category === strtolower($category) ? 'selected' : ''; ?>>
                                    <?php echo $category; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Year Filter -->
                    <div class="w-full lg:w-48">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2"></i>Year
                        </label>
                        <select name="year" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Years</option>
                            <?php foreach($years as $year): ?>
                                <option value="<?php echo $year; ?>" <?php echo $filter_year === $year ? 'selected' : ''; ?>>
                                    <?php echo $year; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-2">
                        <button type="submit" class="bg-forest hover:bg-mountain text-white px-6 py-3 rounded-lg transition-colors font-semibold">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                        <a href="?" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                            <i class="fas fa-times mr-2"></i>Clear
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Past Treks Listing Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <?php if(!empty($paginatedTreks)): ?>
                <div class="mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-center text-gradient mb-4">
                        Our Adventure Chronicles
                    </h2>
                    <p class="text-center text-gray-600 dark:text-gray-300 text-lg">
                        Showing <?php echo count($paginatedTreks); ?> of <?php echo $total_treks; ?> completed adventures
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="pastTreksGrid">
                    <?php foreach($paginatedTreks as $trek): ?>
                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300">
                            <!-- Trek Image -->
                            <div class="relative h-48 bg-cover bg-center" style="background-image: url('<?php echo $trek['image']; ?>');">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                
                                <!-- Category Badge -->
                                <span class="absolute top-4 right-4 px-3 py-1 text-xs font-bold text-white rounded-full <?php echo getCategoryColor($trek['category']); ?>">
                                    <i class="<?php echo getCategoryIcon($trek['category']); ?> mr-1"></i>
                                    <?php echo $trek['category']; ?>
                                </span>
                                
                                <!-- Time Ago Badge -->
                                <span class="absolute top-4 left-4 px-3 py-1 text-xs font-semibold bg-black bg-opacity-50 text-white rounded-full">
                                    <?php echo getTimeAgo($trek['date']); ?>
                                </span>

                                <!-- Participants Count -->
                                <div class="absolute bottom-4 right-4 flex items-center bg-accent text-white px-3 py-1 rounded-full text-sm font-bold">
                                    <i class="fas fa-users mr-1"></i>
                                    <?php echo $trek['participants']; ?>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <!-- Trek Name and Date -->
                                <div class="mb-4">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 line-clamp-2">
                                        <?php echo htmlspecialchars($trek['name']); ?>
                                    </h3>
                                    <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm">
                                        <i class="fas fa-calendar-check text-accent mr-2"></i>
                                        <span><?php echo formatDate($trek['date']); ?></span>
                                    </div>
                                </div>

                                <!-- Trek Details -->
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center justify-between text-sm">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <i class="fas fa-map-marker-alt text-accent mr-2 w-4"></i>
                                            <span class="font-medium"><?php echo htmlspecialchars($trek['location']); ?></span>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-bold text-white rounded-full <?php echo getGradeColor($trek['grade']); ?>">
                                            <?php echo $trek['grade']; ?>
                                        </span>
                                    </div>
                                    
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-user-tie text-accent mr-2 w-4"></i>
                                        <span>Led by: <strong><?php echo htmlspecialchars($trek['leader']); ?></strong></span>
                                    </div>
                                </div>

                                <!-- Trek Description -->
                                <div class="mb-6">
                                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed line-clamp-3">
                                        <?php echo htmlspecialchars($trek['description']); ?>
                                    </p>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <a href="/trek-details/<?php echo $trek['id']; ?>" 
                                       class="flex-1 bg-forest hover:bg-mountain text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                        <i class="fas fa-eye mr-1"></i>
                                        View Details
                                    </a>
                                    <a href="/trek-photos/<?php echo $trek['id']; ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                        <i class="fas fa-images mr-1"></i>
                                        Photos
                                    </a>
                                    <button onclick="shareTrek(<?php echo $trek['id']; ?>)" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if($total_pages > 1): ?>
                    <div class="flex justify-center items-center gap-2 mt-12">
                        <?php if($page > 1): ?>
                            <a href="?page=<?php echo $page-1; ?>&search=<?php echo urlencode($search_query); ?>&category=<?php echo urlencode($filter_category); ?>&year=<?php echo urlencode($filter_year); ?>" 
                               class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                                <i class="fas fa-chevron-left mr-2"></i>Previous
                            </a>
                        <?php endif; ?>
                        
                        <?php
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);
                        
                        for($i = $start_page; $i <= $end_page; $i++):
                        ?>
                            <?php if($i == $page): ?>
                                <span class="px-4 py-2 text-sm font-medium text-white bg-forest border border-forest rounded-lg">
                                    <?php echo $i; ?>
                                </span>
                            <?php else: ?>
                                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search_query); ?>&category=<?php echo urlencode($filter_category); ?>&year=<?php echo urlencode($filter_year); ?>" 
                                   class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                                    <?php echo $i; ?>
                                </a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        
                        <?php if($page < $total_pages): ?>
                            <a href="?page=<?php echo $page+1; ?>&search=<?php echo urlencode($search_query); ?>&category=<?php echo urlencode($filter_category); ?>&year=<?php echo urlencode($filter_year); ?>" 
                               class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                                Next<i class="fas fa-chevron-right ml-2"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
            <?php else: ?>
                <!-- No Results -->
                <div class="text-center py-20">
                    <i class="fas fa-history text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        No Past Treks Found
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8 text-lg">
                        No treks match your current filters. Try adjusting your search criteria.
                    </p>
                    <a href="?" class="inline-flex items-center px-6 py-3 bg-forest hover:bg-mountain text-white font-semibold rounded-lg transition-colors">
                        <i class="fas fa-refresh mr-2"></i>View All Past Treks
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Trek Categories Overview -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gradient mb-12">
                    Our Adventure Categories
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    <?php 
                    $categoryStats = [];
                    foreach($pastTreksData as $trek) {
                        $cat = $trek['category'];
                        if(!isset($categoryStats[$cat])) {
                            $categoryStats[$cat] = ['count' => 0, 'participants' => 0];
                        }
                        $categoryStats[$cat]['count']++;
                        $categoryStats[$cat]['participants'] += $trek['participants'];
                    }
                    
                    foreach($categoryStats as $category => $stats):
                    ?>
                        <div class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 hover-lift">
                            <div class="w-16 h-16 <?php echo getCategoryColor($category); ?> rounded-2xl flex items-center justify-center mb-4 mx-auto">
                                <i class="<?php echo getCategoryIcon($category); ?> text-2xl text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white"><?php echo $category; ?></h3>
                            <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-hiking mr-2 text-accent"></i>
                                    <span><?php echo $stats['count']; ?> Treks Completed</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-users mr-2 text-accent"></i>
                                    <span><?php echo $stats['participants']; ?> Total Participants</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="bg-gradient-to-r from-forest to-mountain text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        Want to Join Our Next Adventure?
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Check out our upcoming treks and be part of our growing community
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/trek-schedule" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-calendar-plus mr-2"></i>
                            View Upcoming Treks
                        </a>
                        <a href="/gallery" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-images mr-2"></i>
                            View Photo Gallery
                        </a>
                        <a href="/testimonials" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-heart mr-2"></i>
                            Read Stories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gradient mb-12">
                Recent Adventure Timeline
            </h2>
            
            <div class="max-w-4xl mx-auto">
                <div class="relative">
                    <!-- Timeline line -->
                    <div class="absolute left-1/2 transform -translate-x-0.5 w-1 h-full bg-accent"></div>
                    
                    <?php 
                    $recentTreks = array_slice($pastTreksData, 0, 6);
                    foreach($recentTreks as $index => $trek): 
                    $isLeft = $index % 2 == 0;
                    ?>
                        <div class="relative flex items-center mb-8">
                            <!-- Timeline dot -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-accent rounded-full border-4 border-white dark:border-gray-800 z-10"></div>
                            
                            <!-- Content -->
                            <div class="<?php echo $isLeft ? 'w-1/2 pr-8 text-right' : 'w-1/2 ml-auto pl-8'; ?>">
                                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center <?php echo $isLeft ? 'justify-end' : 'justify-start'; ?> mb-2">
                                        <span class="px-2 py-1 text-xs font-bold text-white rounded-full <?php echo getCategoryColor($trek['category']); ?>">
                                            <?php echo $trek['category']; ?>
                                        </span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-1">
                                        <?php echo htmlspecialchars($trek['name']); ?>
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                        <?php echo formatDate($trek['date']); ?> • <?php echo $trek['participants']; ?> participants
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Led by <?php echo htmlspecialchars($trek['leader']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
    
    // Search functionality with suggestions
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        const suggestions = [
            'Rajmachi Fort', 'Sinhgad', 'Rajgad Fort', 'Domzira Waterfall', 'Ramsej Fort',
            'Secret Waterfall', 'Plus Valley', 'Ranthambore', 'Murud Janjira', 'Ajinkyatara'
        ];
        
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
                        <i class="fas fa-history text-accent mr-2"></i>
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
                });
            });
        }
        
        function hideSuggestions() {
            if (suggestionsContainer) {
                suggestionsContainer.classList.add('hidden');
            }
        }
    }
    
    // Share trek functionality
    window.shareTrek = function(trekId) {
        const trek = <?php echo json_encode($pastTreksData); ?>.find(t => t.id == trekId);
        if (trek) {
            const shareText = `Check out this amazing trek: ${trek.name} on ${trek.date} with Trekshitz!`;
            const shareUrl = `${window.location.origin}/trek-details/${trekId}`;
            
            if (navigator.share) {
                navigator.share({
                    title: trek.name,
                    text: shareText,
                    url: shareUrl
                });
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(`${shareText} ${shareUrl}`).then(() => {
                    showNotification('Trek details copied to clipboard!', 'success');
                });
            }
        }
    };
    
    // Notification system
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => notification.remove());

        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification fixed top-20 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300`;
        
        // Set type-specific styling
        switch (type) {
            case 'success':
                notification.classList.add('bg-green-500', 'text-white');
                notification.innerHTML = `<i class="fas fa-check-circle mr-2"></i>${message}`;
                break;
            case 'error':
                notification.classList.add('bg-red-500', 'text-white');
                notification.innerHTML = `<i class="fas fa-exclamation-circle mr-2"></i>${message}`;
                break;
            default:
                notification.classList.add('bg-blue-500', 'text-white');
                notification.innerHTML = `<i class="fas fa-info-circle mr-2"></i>${message}`;
        }

        document.body.appendChild(notification);

        // Show notification
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Hide notification after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
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
    
    console.log('Past Treks page loaded successfully');
});

// Add CSS classes for text gradient and line clamp using Tailwind
document.addEventListener('DOMContentLoaded', function() {
    const textGradientElements = document.querySelectorAll('.text-gradient');
    textGradientElements.forEach(element => {
        element.classList.add('bg-gradient-to-r', 'from-forest', 'to-accent', 'bg-clip-text', 'text-transparent');
    });
    
    // Add line clamp utility
    const style = document.createElement('style');
    style.textContent = `
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
});
</script>