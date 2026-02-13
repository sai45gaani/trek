<?php
// Set page specific variables
$page_title = 'Trek Schedule - Upcoming Treks | Trekshitz';
$meta_description = 'Explore upcoming treks with Trekshitz. Join our scheduled treks to Rajmachi, Peb, Aadrai and other exciting destinations in Sahyadri mountains.';
$meta_keywords = 'trek schedule, upcoming treks, Trekshitz treks, Maharashtra trekking, Sahyadri treks, adventure tours';

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

function getDaysUntilTrek($date) {
    if (!$date) return 'N/A';
    
    $today = new DateTime();
    $trek_date = new DateTime($date);
    $diff = $today->diff($trek_date);
    
    if ($trek_date < $today) {
        return 'Completed';
    }
    
    return $diff->days . ' days';
}

function getUrgencyClass($date) {
    if (!$date) return 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200';
    
    $today = new DateTime();
    $trek_date = new DateTime($date);
    $diff = $today->diff($trek_date);
    
    if ($diff->days <= 7) {
        return 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
    } elseif ($diff->days <= 15) {
        return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
    } else {
        return 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
    }
}

function getTrekImage($place) {
    // Default images based on trek type/name
    $images = [
        'fort' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'peak' => 'https://images.unsplash.com/photo-1464822759844-d5709c4c2d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'forest' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'rafting' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'default' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
    ];
    
    $place_lower = strtolower($place);
    
    if (strpos($place_lower, 'fort') !== false) return $images['fort'];
    if (strpos($place_lower, 'peak') !== false || strpos($place_lower, 'kalsubai') !== false) return $images['peak'];
    if (strpos($place_lower, 'forest') !== false) return $images['forest'];
    if (strpos($place_lower, 'rafting') !== false) return $images['rafting'];
    
    return $images['default'];
}

// Connect to database
$db = new Database();
$conn = $db->getConnection();

$treksData = [];
$total_treks_count = 0;

try {
    // Get filter parameters
    $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
    $filter_grade = isset($_GET['grade']) ? trim($_GET['grade']) : '';
    $filter_month = isset($_GET['month']) ? trim($_GET['month']) : '';
    
    // Build WHERE clause for filters
    $where_conditions = ["TrekDate >= CURDATE()"]; // Only show upcoming treks
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
    
    // Grade filter
    if (!empty($filter_grade)) {
        $where_conditions[] = "LOWER(Grade) = ?";
        $params[] = strtolower($filter_grade);
        $types .= "s";
    }
    
    // Month filter
    if (!empty($filter_month)) {
        $where_conditions[] = "MONTH(TrekDate) = ?";
        $params[] = $filter_month;
        $types .= "i";
    }
    
    $where_clause = implode(" AND ", $where_conditions);
    
    // Count total treks (for statistics)
    $count_query = "SELECT COUNT(*) as total FROM ts_tbltrekdetails WHERE " . $where_clause;
    $count_stmt = $conn->prepare($count_query);
    
    if (!empty($params)) {
        $count_stmt->bind_param($types, ...$params);
    }
    
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $total_treks_count = $count_result->fetch_assoc()['total'];
    $count_stmt->close();
    
    // Pagination
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $limit = 6;
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
              FROM ts_tbltrekdetails 
              WHERE " . $where_clause . "
              ORDER BY TrekDate ASC
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
    
    while ($row = $result->fetch_assoc()) {
        // Process the data
        $trek = [
            'id' => $row['TrekId'],
            'name' => trim($row['Place']),
            'date' => $row['TrekDate'],
            'end_date' => null, // Can be calculated from DisplayDate if needed
            'leader' => trim($row['Leader']),
            'contact' => trim($row['ContDetails']),
            'cost' => floatval($row['Cost']),
            'grade' => trim($row['Grade']) ?: 'Medium',
            'last_booking_date' => $row['LDateBooking'],
            'meeting_place' => trim($row['MeetingPlace']) ?: 'Please contact Trek Leader for Details',
            'max_participants' => intval($row['MaxParticipants']) ?: 25,
            'description' => trim($row['Description']) ?: 'Please contact Trek Leader for Trek Cost',
            'notes' => trim($row['Notes']) ?: '',
            'image' => getTrekImage($row['Place']),
            'status' => 'open'
        ];
        
        $treksData[] = $trek;
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    error_log("Trek Schedule Error: " . $e->getMessage());
    $treksData = [];
    $total_treks_count = 0;
}

$total_pages = ceil($total_treks_count / $limit);
$paginatedTreks = $treksData; // Already paginated from query

// Get all trek names for search suggestions
$suggestions = [];
try {
    $sugg_query = "SELECT DISTINCT Place FROM ts_tbltrekdetails WHERE TrekDate >= CURDATE() ORDER BY Place ASC LIMIT 20";
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
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"trek-pattern\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"10,2 18,10 10,18 2,10\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23trek-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Trek <span class="text-accent">Schedule</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Upcoming Treks & Adventure Activities
                </p>
                <p class="text-lg mb-8 opacity-80">
                    Join us for exciting treks in the beautiful Sahyadri mountains
                </p>
                
                <!-- Quick Stats -->
                <div class="flex flex-wrap justify-center gap-6 text-sm opacity-90">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-accent"></i>
                        <span><?php echo $total_treks_count; ?> Upcoming Treks</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-users text-accent"></i>
                        <span>Open for Registration</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-mountain text-accent"></i>
                        <span>All Difficulty Levels</span>
                    </div>
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
                    <div class="text-gray-600 dark:text-gray-300">Upcoming Treks</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="15">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Years Experience</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1000">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Happy Trekkers</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="50">0</div>
                    <div class="text-gray-600 dark:text-gray-300">Monthly Treks</div>
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
                            <i class="fas fa-search mr-2"></i>Search Treks
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
                                placeholder="Search by trek name, leader, or description..."
                                autocomplete="off"
                            >
                        </div>
                    </div>

                    <!-- Grade Filter -->
                    <div class="w-full lg:w-48">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-signal mr-2"></i>Difficulty
                        </label>
                        <select name="grade" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Levels</option>
                            <option value="easy" <?php echo $filter_grade === 'easy' ? 'selected' : ''; ?>>Easy</option>
                            <option value="medium" <?php echo $filter_grade === 'medium' ? 'selected' : ''; ?>>Medium</option>
                            <option value="hard" <?php echo $filter_grade === 'hard' ? 'selected' : ''; ?>>Hard</option>
                        </select>
                    </div>

                    <!-- Month Filter -->
                    <div class="w-full lg:w-48">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2"></i>Month
                        </label>
                        <select name="month" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Months</option>
                            <option value="1" <?php echo $filter_month === '1' ? 'selected' : ''; ?>>January</option>
                            <option value="2" <?php echo $filter_month === '2' ? 'selected' : ''; ?>>February</option>
                            <option value="3" <?php echo $filter_month === '3' ? 'selected' : ''; ?>>March</option>
                            <option value="4" <?php echo $filter_month === '4' ? 'selected' : ''; ?>>April</option>
                            <option value="5" <?php echo $filter_month === '5' ? 'selected' : ''; ?>>May</option>
                            <option value="6" <?php echo $filter_month === '6' ? 'selected' : ''; ?>>June</option>
                            <option value="7" <?php echo $filter_month === '7' ? 'selected' : ''; ?>>July</option>
                            <option value="8" <?php echo $filter_month === '8' ? 'selected' : ''; ?>>August</option>
                            <option value="9" <?php echo $filter_month === '9' ? 'selected' : ''; ?>>September</option>
                            <option value="10" <?php echo $filter_month === '10' ? 'selected' : ''; ?>>October</option>
                            <option value="11" <?php echo $filter_month === '11' ? 'selected' : ''; ?>>November</option>
                            <option value="12" <?php echo $filter_month === '12' ? 'selected' : ''; ?>>December</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-2">
                        <button type="submit" class="bg-primary hover:bg-secondary text-white px-6 py-3 rounded-lg transition-colors font-semibold">
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

    <!-- Treks Listing Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <?php if(!empty($paginatedTreks)): ?>
                <div class="mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-center text-gradient mb-4">
                        Upcoming Treks & Adventures
                    </h2>
                    <p class="text-center text-gray-600 dark:text-gray-300 text-lg">
                        Showing <?php echo count($paginatedTreks); ?> of <?php echo $total_treks_count; ?> treks
                    </p>
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8" id="treksGrid">
                    <?php foreach($paginatedTreks as $trek): ?>
                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300">
                            <!-- Trek Image -->
                            <div class="relative h-48 bg-cover bg-center" style="background-image: url('<?php echo $trek['image']; ?>');">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                
                                <!-- Difficulty Badge -->
                                <span class="absolute top-4 right-4 px-3 py-1 text-xs font-bold text-white rounded-full <?php echo getGradeColor($trek['grade']); ?>">
                                    <?php echo htmlspecialchars($trek['grade']); ?>
                                </span>
                                
                                <!-- Days Until Trek Badge -->
                                <span class="absolute top-4 left-4 px-3 py-1 text-xs font-semibold rounded-full <?php echo getUrgencyClass($trek['date']); ?>">
                                    <?php echo getDaysUntilTrek($trek['date']); ?>
                                </span>

                                <!-- Cost Badge -->
                                <?php if($trek['cost'] > 0): ?>
                                    <div class="absolute bottom-4 right-4 bg-accent text-white px-3 py-1 rounded-full text-sm font-bold">
                                        ₹<?php echo number_format($trek['cost']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="p-6">
                                <!-- Trek Name -->
                                <div class="mb-4">
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                                        <?php echo htmlspecialchars($trek['name']); ?>
                                    </h3>
                                    <?php if($trek['cost'] == 0): ?>
                                        <span class="text-sm text-gray-500 dark:text-gray-400 italic">
                                            Contact leader for cost details
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Trek Details -->
                                <div class="space-y-2 mb-6">
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-calendar text-accent mr-3 w-4"></i>
                                        <span class="font-semibold">
                                            <?php echo formatDate($trek['date']); ?>
                                            <?php if($trek['end_date']): ?>
                                                - <?php echo formatDate($trek['end_date']); ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-user-tie text-accent mr-3 w-4"></i>
                                        <span>Leader: <strong><?php echo htmlspecialchars($trek['leader']); ?></strong></span>
                                    </div>
                                    
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-phone text-accent mr-3 w-4"></i>
                                        <a href="tel:<?php echo $trek['contact']; ?>" class="text-accent hover:text-primary font-semibold hover:underline">
                                            <?php echo htmlspecialchars($trek['contact']); ?>
                                        </a>
                                    </div>
                                    
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-users text-accent mr-3 w-4"></i>
                                        <span>Max: <strong><?php echo $trek['max_participants']; ?> people</strong></span>
                                    </div>
                                    
                                    <div class="flex items-start text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-map-marker-alt text-accent mr-3 w-4 mt-0.5"></i>
                                        <span class="flex-1"><?php echo htmlspecialchars($trek['meeting_place']); ?></span>
                                    </div>
                                    
                                    <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                        <i class="fas fa-clock text-accent mr-3 w-4"></i>
                                        <span>Book by: <strong><?php echo formatDate($trek['last_booking_date']); ?></strong></span>
                                    </div>
                                </div>

                                <!-- Trek Description -->
                                <div class="mb-6">
                                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                        <?php echo htmlspecialchars($trek['description']); ?>
                                    </p>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <a href="tel:<?php echo $trek['contact']; ?>" 
                                       class="flex-1 bg-primary hover:bg-secondary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                        <i class="fas fa-phone mr-1"></i>
                                        Call
                                    </a>
                                    <a href="./trek-details.php?id=<?php echo $trek['id']; ?>" 
                                       class="flex-1 bg-accent hover:bg-primary text-white text-center py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300 text-sm">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Details
                                    </a>
                                    <a href="https://wa.me/91<?php echo str_replace(' ', '', $trek['contact']); ?>?text=Hi, I want to join <?php echo urlencode($trek['name']); ?> trek on <?php echo formatDate($trek['date']); ?>" 
                                       target="_blank"
                                       class="bg-green-600 hover:bg-green-700 text-white py-2.5 px-3 rounded-lg font-semibold transition-colors duration-300">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if($total_pages > 1): ?>
                    <div class="flex justify-center items-center gap-2 mt-12">
                        <?php if($page > 1): ?>
                            <a href="?page=<?php echo $page-1; ?>&search=<?php echo urlencode($search_query); ?>&grade=<?php echo urlencode($filter_grade); ?>&month=<?php echo urlencode($filter_month); ?>" 
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
                                <span class="px-4 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-lg">
                                    <?php echo $i; ?>
                                </span>
                            <?php else: ?>
                                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search_query); ?>&grade=<?php echo urlencode($filter_grade); ?>&month=<?php echo urlencode($filter_month); ?>" 
                                   class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                                    <?php echo $i; ?>
                                </a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        
                        <?php if($page < $total_pages): ?>
                            <a href="?page=<?php echo $page+1; ?>&search=<?php echo urlencode($search_query); ?>&grade=<?php echo urlencode($filter_grade); ?>&month=<?php echo urlencode($filter_month); ?>" 
                               class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                                Next<i class="fas fa-chevron-right ml-2"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
            <?php else: ?>
                <!-- No Results -->
                <div class="text-center py-20">
                    <i class="fas fa-hiking text-6xl text-gray-400 mb-6"></i>
                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300 mb-4">
                        No Treks Found
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8 text-lg">
                        No treks match your current filters. Try adjusting your search criteria.
                    </p>
                    <a href="?" class="btn btn-primary inline-flex items-center px-6 py-3 bg-primary hover:bg-secondary text-white font-semibold rounded-lg transition-colors">
                        <i class="fas fa-refresh mr-2"></i>View All Treks
                    </a>
                </div>
            <?php endif; ?>
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
                        <i class="fas fa-hiking text-accent mr-2"></i>
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
    
    // Copy contact number functionality for desktop
    const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
    phoneLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // For mobile devices, let the default action happen
            if (window.innerWidth <= 768) {
                return;
            }
            
            // For desktop, copy to clipboard
            e.preventDefault();
            const phoneNumber = this.href.replace('tel:', '');
            navigator.clipboard.writeText(phoneNumber).then(() => {
                showNotification('Phone number copied to clipboard!', 'success');
            }).catch(() => {
                // Fallback: show phone number in alert
                alert('Phone number: ' + phoneNumber);
            });
        });
    });
    
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
    
    // Add loading states for external links
    const externalLinks = document.querySelectorAll('a[target="_blank"]');
    externalLinks.forEach(link => {
        link.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon && !icon.classList.contains('fa-spinner')) {
                const originalClass = icon.className;
                icon.className = 'fas fa-spinner fa-spin mr-2';
                setTimeout(() => {
                    icon.className = originalClass;
                }, 2000);
            }
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
    
    console.log('Trek Schedule page loaded successfully');
});

// Add CSS classes for text gradient using Tailwind
document.addEventListener('DOMContentLoaded', function() {
    const textGradientElements = document.querySelectorAll('.text-gradient');
    textGradientElements.forEach(element => {
        element.classList.add('bg-gradient-to-r', 'from-primary', 'to-accent', 'bg-clip-text', 'text-transparent');
    });
});
</script>