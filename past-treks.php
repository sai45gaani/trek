<?php
// Set page specific variables
$page_title = 'Past Treks - Completed Adventures | Trekshitz';
$meta_description = 'Explore our completed treks and adventures. See the amazing places we have visited with Trekshitz including forts, waterfalls, and heritage walks in the Sahyadri mountains.';
$meta_keywords = 'past treks, completed treks, Trekshitz adventures, Maharashtra trekking history, fort expeditions, waterfall treks';

require_once './config/database.php';
// Include header
include './includes/header.php';

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

function getCategoryFromPlace($place, $description = '') {
    $place_lower = strtolower($place . ' ' . $description);
    
    if (strpos($place_lower, 'waterfall') !== false) return 'Waterfall';
    if (strpos($place_lower, 'sea fort') !== false || strpos($place_lower, 'janjira') !== false) return 'Sea Fort';
    if (strpos($place_lower, 'fort') !== false || strpos($place_lower, 'gad') !== false) return 'Fort';
    if (strpos($place_lower, 'heritage') !== false || strpos($place_lower, 'walk') !== false) return 'Heritage';
    if (strpos($place_lower, 'wildlife') !== false || strpos($place_lower, 'safari') !== false || strpos($place_lower, 'birding') !== false) return 'Wildlife';
    if (strpos($place_lower, 'valley') !== false) return 'Valley';
    if (strpos($place_lower, 'peak') !== false || strpos($place_lower, 'summit') !== false) return 'Peak';
    if (strpos($place_lower, 'rafting') !== false || strpos($place_lower, 'cliff') !== false) return 'Adventure';
    
    // Check if multiple forts mentioned
    if (substr_count($place_lower, 'gad') > 1 || substr_count($place_lower, ',') >= 2) return 'Multi-Fort';
    
    return 'Adventure';
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
    if (!$date) return '';
    
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
    if (!$date) return 'N/A';
    
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

function getTrekImage($place, $category) {
    $images = [
        'fort' => 'https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'waterfall' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'sea fort' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'wildlife' => 'https://images.unsplash.com/photo-1549366021-9f761d040ed2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'heritage' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'adventure' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'valley' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'peak' => 'https://images.unsplash.com/photo-1464822759844-d5709c4c2d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'default' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
    ];
    
    return $images[strtolower($category)] ?? $images['default'];
}

// Connect to database
$db = new Database();
$conn = $db->getConnection();

$pastTreksData = [];
$total_treks_count = 0;
$total_participants = 0;
$categories = [];
$years = [];

try {
    // Get filter parameters
    $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
    $filter_category = isset($_GET['category']) ? trim($_GET['category']) : '';
    $filter_year = isset($_GET['year']) ? trim($_GET['year']) : '';
    
    // Build WHERE clause for filters
    $where_conditions = ["TrekDate < CURDATE()"]; // Only show past treks
    $params = [];
    $types = "";
    
    // Search filter
    if (!empty($search_query)) {
        $where_conditions[] = "(Place LIKE ? OR Leader LIKE ? OR Description LIKE ?)";
        $search_param = "%{$search_query}%";
        $params[] = $search_param;
        $params[] = $search_param;
        $params[] = $search_param;
        $types .= "sss";
    }
    
    // Year filter
    if (!empty($filter_year)) {
        $where_conditions[] = "YEAR(TrekDate) = ?";
        $params[] = $filter_year;
        $types .= "i";
    }
    
    $where_clause = implode(" AND ", $where_conditions);
    
    // Get total participants count
    $count_query = "SELECT COUNT(*) as total, SUM(MaxParticipants) as participants FROM TS_tblTrekDetails WHERE " . $where_clause;
    $count_stmt = $conn->prepare($count_query);
    
    if (!empty($params)) {
        $count_stmt->bind_param($types, ...$params);
    }
    
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $count_row = $count_result->fetch_assoc();
    $total_treks_count = $count_row['total'];
    $total_participants = $count_row['participants'] ?? 0;
    $count_stmt->close();
    
    // Pagination
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $limit = 9;
    $offset = ($page - 1) * $limit;
    
    // Fetch trek data with pagination
    $query = "SELECT 
                TrekId,
                Place,
                TrekDate,
                Leader,
                ContDetails,
                DisplayDate,
                Cost,
                Grade,
                LDateBooking,
                MeetingPlace,
                MaxParticipants,
                Description,
                Notes
              FROM TS_tblTrekDetails 
              WHERE " . $where_clause . "
              ORDER BY TrekDate DESC
              LIMIT ? OFFSET ?";
    
    $stmt = $conn->prepare($query);
    
    // Add pagination parameters
    $params[] = $limit;
    $params[] = $offset;
    $types .= "ii";
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $categoryStats = [];
    
    while ($row = $result->fetch_assoc()) {
        // Determine category from place name
        $category = getCategoryFromPlace($row['Place'], $row['Description']);
        
        // Process the data
        $trek = [
            'id' => $row['TrekId'],
            'name' => trim($row['Place']),
            'date' => $row['TrekDate'],
            'category' => $category,
            'participants' => intval($row['MaxParticipants']) ?: 25,
            'leader' => trim($row['Leader']),
            'grade' => trim($row['Grade']) ?: 'Medium',
            'location' => trim($row['MeetingPlace']) ?: 'Maharashtra',
            'description' => trim($row['Description']) ?: 'Completed trek with Trekshitz',
            'notes' => trim($row['Notes']) ?: '',
            'image' => getTrekImage($row['Place'], $category)
        ];
        
        // Track categories for stats
        if (!isset($categoryStats[$category])) {
            $categoryStats[$category] = ['count' => 0, 'participants' => 0];
        }
        $categoryStats[$category]['count']++;
        $categoryStats[$category]['participants'] += $trek['participants'];
        
        // Apply category filter if set
        if (empty($filter_category) || strtolower($category) === strtolower($filter_category)) {
            $pastTreksData[] = $trek;
        }
    }
    
    $stmt->close();
    
    // Get unique categories and years for filters
    $cat_query = "SELECT DISTINCT YEAR(TrekDate) as year FROM TS_tblTrekDetails WHERE TrekDate < CURDATE() ORDER BY year DESC";
    $cat_result = $conn->query($cat_query);
    while ($row = $cat_result->fetch_assoc()) {
        $years[] = $row['year'];
    }
    
    $categories = array_keys($categoryStats);
    
} catch (Exception $e) {
    error_log("Past Treks Error: " . $e->getMessage());
    $pastTreksData = [];
    $total_treks_count = 0;
    $categoryStats = [];
}

// Apply pagination to filtered data
//$total_treks = count($pastTreksData);
//$total_pages = ceil($total_treks / $limit);
//$paginatedTreks = array_slice($pastTreksData, 0, $limit);
$total_pages = ceil($total_treks_count / $limit);
$paginatedTreks = $pastTreksData;


// Get suggestions for search
$suggestions = [];
try {
    $sugg_query = "SELECT DISTINCT Place FROM TS_tblTrekDetails WHERE TrekDate < CURDATE() ORDER BY TrekDate DESC LIMIT 20";
    $sugg_result = $conn->query($sugg_query);
    while ($row = $sugg_result->fetch_assoc()) {
        $suggestions[] = trim($row['Place']);
    }
} catch (Exception $e) {
    $suggestions = [];
}
?>

<main id="main-content" class="">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
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
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo $total_treks_count; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Completed Treks</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accentmb-2 animate-number" data-target="<?php echo $total_participants; ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Total Participants</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="<?php echo count($categories); ?>">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Categories Covered</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="8">0</div>
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
                                <option value="<?php echo $year; ?>" <?php echo $filter_year == $year ? 'selected' : ''; ?>>
                                    <?php echo $year; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-2">
                        <button type="submit" class="bg-primary hover:bg-mountain text-white px-6 py-3 rounded-lg transition-colors font-semibold">
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
                    <h2 class="text-4xl md:text-5xl font-bold text-center text-gradient text-primary mb-4">
                        Our Adventure Chronicles
                    </h2>
                    <p class="text-center text-gray-600 dark:text-gray-300 text-lg">
                        Showing <?php echo count($paginatedTreks); ?> of <?php echo $total_treks_count; ?> completed adventures
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
                                    <?php echo htmlspecialchars($trek['category']); ?>
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
                                            <?php echo htmlspecialchars($trek['grade']); ?>
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
                                    <a href="./trek-details.php?id=<?php echo $trek['id']; ?>" 
                                       class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                        <i class="fas fa-eye mr-1"></i>
                                        View Details
                                    </a>
                                  <!--  <a href="/trek-photos/<?php echo $trek['id']; ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                        <i class="fas fa-images mr-1"></i>
                                        Photos
                                    </a>-->
                                    <button onclick="shareTrek(<?php echo $trek['id']; ?>, '<?php echo addslashes($trek['name']); ?>', '<?php echo $trek['date']; ?>')" 
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
                
                <div class="grid md:grid-cols-3 lg:grid-cols-3 gap-6 mb-12">
                    <?php foreach($categoryStats as $category => $stats): ?>
                        <div class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 hover-lift">
                            <div class="w-16 h-16 <?php echo getCategoryColor($category); ?> rounded-2xl flex items-center justify-center mb-4 mx-auto">
                                <i class="<?php echo getCategoryIcon($category); ?> text-2xl text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white"><?php echo htmlspecialchars($category); ?></h3>
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
                
               
            </div>
        </div>
    </section>

    <?php include './our_important_information_for_trek.php';  ?>

   
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
        const suggestions = <?php echo json_encode($suggestions); ?>;
        
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
    window.shareTrek = function(trekId, trekName, trekDate) {
        const shareText = `Check out this amazing trek: ${trekName} on ${trekDate} with Trekshitz!`;
        const shareUrl = `${window.location.origin}/trek-details/${trekId}`;
        
        if (navigator.share) {
            navigator.share({
                title: trekName,
                text: shareText,
                url: shareUrl
            }).catch(() => {
                // User cancelled share
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(`${shareText} ${shareUrl}`).then(() => {
                showNotification('Trek details copied to clipboard!', 'success');
            }).catch(() => {
                alert(`${shareText}\n${shareUrl}`);
            });
        }
    };
    
    // Notification system
    function showNotification(message, type = 'info') {
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => notification.remove());

        const notification = document.createElement('div');
        notification.className = `notification fixed top-20 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300`;
        
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

        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

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