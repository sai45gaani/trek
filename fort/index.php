<?php
// Get fort slug from URL - supports both /fort/index.php?slug=rajgad-fort and direct query string
$fort_slug = '';


// ✅ Just check the query string
if (isset($_GET['slug']) && !empty($_GET['slug'])) {
    $fort_slug = trim($_GET['slug']);
} else {
    // If no slug found, redirect
    header('Location: /english/fort-in-english');
    exit;
}

// Convert slug to fort name (e.g., "rajgad-fort" -> "Rajgad")
function slugToFortName($slug) {
    $name = str_replace('-fort', '', $slug);
    $name = str_replace('-', ' ', $name);
    return ucwords($name);
}

//echo $fort_slug;
//echo "<br>";
$fort_name_search = slugToFortName($fort_slug);
//echo $fort_name_search;

require_once '../config/database.php';

// Set page variables (will be updated after fetching data)
$page_title = 'Fort Details | Trekshitz';
$meta_description = 'Explore detailed information about forts in Maharashtra';
$meta_keywords = 'Maharashtra forts, trekking, fort information';


// Helper function for difficulty color
function getDifficultyColor($grade) {
    return match (strtolower(trim($grade))) {
        'easy' => 'bg-green-500',
        'medium' => 'bg-yellow-500',
        'hard', 'difficult' => 'bg-orange-500',
        'very hard', 'very difficult', 'extreme' => 'bg-red-500',
        default => 'bg-yellow-500'
    };
}

// Connect to database
$db = new Database();
$conn = $db->getConnection();

$fortData = null;
$fascinatingSpots = [];
$waysToReach = [];
$relatedForts = [];
$fortPhotos = [];

try {
    // Fetch main fort information
    $query = "SELECT * FROM EI_tblFortInfo WHERE FortName LIKE ? LIMIT 1";
   // echo $query;
   // echo "<br>";
    $stmt = $conn->prepare($query);
    $search_param = "%{$fort_name_search}%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $fortData = $result->fetch_assoc();
        
        // Update page title with fort name
        $page_title = $fortData['FortName'] . ' Fort - Complete Information | Trekshitz';
        $meta_description = 'Complete information about ' . $fortData['FortName'] . ' fort including history, ways to reach, facilities, and trekking details.';
        
        // Fetch front/cover image
        $front_img_query = "SELECT * FROM PM_tblPhotos_clean WHERE FortName LIKE ? AND PIC_FRONT_IMAGE = 'y' LIMIT 1";
        $front_stmt = $conn->prepare($front_img_query);
        $front_stmt->bind_param("s", $search_param);
        $front_stmt->execute();
        $front_result = $front_stmt->get_result();
        if ($front_result->num_rows > 0) {
            $frontImage = $front_result->fetch_assoc();
        }
        $front_stmt->close();
        
        // Fetch maps (maximum 4)
        $maps_query = "SELECT * FROM MM_tblMapInfo_clean WHERE FortName = ? LIMIT 4";
        $maps_stmt = $conn->prepare($maps_query);
        $maps_stmt->bind_param("s", $fortData['FortName']);
        $maps_stmt->execute();
        $maps_result = $maps_stmt->get_result();
        while ($row = $maps_result->fetch_assoc()) {
            $fortMaps[] = $row;
        }
        $maps_stmt->close();


        // Fetch fascinating spots
        $spots_query = "SELECT * FROM ei_tblfascinatingspots WHERE FortName = ?";
        $spots_stmt = $conn->prepare($spots_query);
        $spots_stmt->bind_param("s", $fortData['FortName']);
        $spots_stmt->execute();
        $spots_result = $spots_stmt->get_result();
        while ($row = $spots_result->fetch_assoc()) {
            $fascinatingSpots[] = $row;
        }
        
        // Fetch ways to reach
        $ways_query = "SELECT * FROM ei_tblwaystoreach WHERE FortName = ?";
        $ways_stmt = $conn->prepare($ways_query);
        $ways_stmt->bind_param("s", $fortData['FortName']);
        $ways_stmt->execute();
        $ways_result = $ways_stmt->get_result();
        while ($row = $ways_result->fetch_assoc()) {
            $waysToReach[] = $row;
        }
        
        // Fetch related forts (same range)
        if (!empty($fortData['FortRange']) && $fortData['FortRange'] != 'N/A') {
            $related_query = "SELECT FortName, Grade FROM EI_tblFortInfo WHERE FortRange = ? AND FortName != ? LIMIT 6";
            $related_stmt = $conn->prepare($related_query);
            $related_stmt->bind_param("ss", $fortData['FortRange'], $fortData['FortName']);
            $related_stmt->execute();
            $related_result = $related_stmt->get_result();
            while ($row = $related_result->fetch_assoc()) {
                $relatedForts[] = $row;
            }
        }
        
        // Fetch photos
        $photos_query = "SELECT * FROM PM_tblPhotos_clean WHERE FortName = ? LIMIT 12";
        $photos_stmt = $conn->prepare($photos_query);
        $photos_stmt->bind_param("s", $fortData['FortName']);
        $photos_stmt->execute();
        $photos_result = $photos_stmt->get_result();
        while ($row = $photos_result->fetch_assoc()) {
            $fortPhotos[] = $row;
        }
    }
    else{
      //  echo "no rows";
    }
    
} catch (Exception $e) {
    error_log("Fort Details Error: " . $e->getMessage());
}

// If fort not found, redirect
if (!$fortData) {
    echo "Fort not found";
    //header('Location: /english/fort-in-english');
    exit;
}


// Helper to create slug
function createSlug($name) {
    return strtolower(str_replace(' ', '-', trim($name))) . '-fort';
}

// Include header
include '../includes/header.php';

?>



<main id="main-content" class="">
    <!-- Hero Section with Fort Name -->
    <section class="relative py-16 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
           <!-- <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort-pattern\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><polygon points=\"10,2 18,10 10,18 2,10\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort-pattern)\"/></svg>');"></div>-->
        </div>
        
        <div class="container mx-auto px-8 relative z-10">
            <!-- Back Button & Search -->
            <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
                <a href="javascript:history.back()" class="inline-flex items-center text-white hover:text-accent transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Back to Forts List</span>
                </a>
                
                <div class="flex gap-2">
                    <!--<a href="../fort_in_english.php" class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg transition-colors">
                        <i class="fas fa-search mr-2"></i>
                        Search Forts
                    </a>-->
                <!--    <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg transition-colors">
                        <i class="fas fa-print mr-2"></i>
                        Print
                    </button>-->
                </div>
            </div>
            
            <div class="max-w-4xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    <?php echo htmlspecialchars($fortData['FortName']); ?>
                </h1>
                
                <div class="flex flex-wrap gap-3 mb-4">
                    <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                        <i class="fas fa-fort-awesome mr-2"></i>
                        <?php echo htmlspecialchars($fortData['FortType']); ?>
                    </span>
                    <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <?php echo htmlspecialchars($fortData['FortDistrict']); ?>
                    </span>
                    <?php if (!empty($fortData['FortRange']) && $fortData['FortRange'] != 'N/A'): ?>
                        <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                            <i class="fas fa-mountain mr-2"></i>
                            <?php echo htmlspecialchars($fortData['FortRange']); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Info Cards -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-3xl mb-2">🏔️</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Difficulty</div>
                    <div class="font-bold text-gray-800 dark:text-white">
                        <span class="px-3 py-1 rounded-full text-white text-sm <?php echo getDifficultyColor($fortData['Grade']); ?>">
                            <?php echo htmlspecialchars($fortData['Grade']); ?>
                        </span>
                    </div>
                </div>

                <?php if (!empty($fortData['Height'])): ?>
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-3xl mb-2">📏</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Height</div>
                    <div class="font-bold text-gray-800 dark:text-white"><?php echo htmlspecialchars($fortData['Height']); ?></div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($fortData['TimeToReach'])): ?>
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-3xl mb-2">⏱️</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Trek Duration</div>
                    <div class="font-bold text-gray-800 dark:text-white text-sm"><?php echo htmlspecialchars(substr($fortData['TimeToReach'], 0, 50)); ?></div>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($fortData['BestSeasonToVisit'])): ?>
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-3xl mb-2">🌤️</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Best Season</div>
                    <div class="font-bold text-gray-800 dark:text-white text-sm"><?php echo htmlspecialchars($fortData['BestSeasonToVisit']); ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    
    <!-- Fort Image & Maps Gallery Section -->
    <?php if ($frontImage || !empty($fortMaps)): ?>
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 gap-8">
                    
                    <!-- Front/Hero Image -->
                    <?php if ($frontImage): ?>
                    <div class="relative group">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-accent text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                <i class="fas fa-camera mr-2"></i>Featured Photo
                            </span>
                        </div>
                        <div class="relative overflow-hidden rounded-2xl shadow-2xl aspect-[4/3] bg-gray-200 dark:bg-gray-700">
                            <img src="../assets/images/Photos/Picture/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>" 
                                 alt="<?php echo htmlspecialchars($frontImage['PIC_DESC'] ?? $fortData['FortName']); ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                 >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <p class="text-sm font-semibold">
                                    <?php echo htmlspecialchars($frontImage['PIC_DESC'] ?? 'View of ' . $fortData['FortName']); ?>
                                </p>
                            </div>
                        </div>
                        <a href="../gallery/fort-gallery.php?fort=<?php echo urlencode($fortData['FortName']); ?>" 
                           class="mt-4 inline-flex items-center text-accent hover:text-primary font-semibold transition-colors">
                            <i class="fas fa-images mr-2"></i>
                            View Full Photo Gallery
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Maps Gallery -->
                    <div>
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 flex items-center">
                                <i class="fas fa-map text-accent mr-3"></i>
                                Maps & Routes
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                Explore detailed maps and trekking routes to reach the fort
                            </p>
                        </div>
                        
                        <?php if (!empty($fortMaps)): ?>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <?php foreach ($fortMaps as $index => $map): ?>
                            <div class="relative group cursor-pointer">
                                <div class="relative overflow-hidden rounded-xl shadow-lg aspect-square bg-gray-100 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600">
                                    <img src="../assets/images/Photos/Maps/MapImages/<?php echo htmlspecialchars($map['MapPath'] ?? $map['MapName']); ?>" 
                                         alt="<?php echo htmlspecialchars($map['MapType'] ?? 'Map ' . ($index + 1)); ?>"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                         >
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                    </div>
                                </div>
                                <div class="mt-2 text-center">
                                    <p class="text-xs font-semibold text-gray-700 dark:text-gray-300">
                                        <?php echo htmlspecialchars($map['MapType'] ?? 'Map ' . ($index + 1)); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <a href="/maps?fort=<?php echo urlencode($fortData['FortName']); ?>" 
                           class="inline-flex items-center justify-center w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors">
                            <i class="fas fa-map-marked-alt mr-2"></i>
                            View All Maps & Download
                        </a>
                        
                        <?php else: ?>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-8 text-center border-2 border-dashed border-gray-300 dark:border-gray-600">
                            <i class="fas fa-map text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">No maps available yet</p>
                            <a href="/maps" class="text-accent hover:text-primary font-semibold">
                                Browse All Maps
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Main Content -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                
                <!-- Introduction -->
                <?php if (!empty($fortData['Introduction'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        Introduction
                    </h2>
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php /*echo nl2br(htmlspecialchars($fortData['Introduction']));*/ ?>
                            <?php echo $fortData['Introduction']; ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- History -->
                <?php if (!empty($fortData['History'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        Historical Background
                    </h2>
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-8 border-l-4 border-accent">
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($fortData['History'])); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Geography -->
                <?php if (!empty($fortData['Geography'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        Geography & Location
                    </h2>
                    <div class="bg-blue-50 dark:bg-gray-800 rounded-2xl p-8">
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($fortData['Geography'])); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Ways to Reach -->
                <?php if (!empty($waysToReach) || !empty($fortData['IntroductionWTR'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        <i class="fas fa-route text-accent mr-3"></i>
                        How to Reach
                    </h2>
                    
                    <?php if (!empty($fortData['IntroductionWTR'])): ?>
                    <div class="mb-6 p-6 bg-green-50 dark:bg-gray-800 rounded-xl">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php echo nl2br(htmlspecialchars($fortData['IntroductionWTR'])); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($waysToReach)): ?>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php foreach ($waysToReach as $way): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold text-primary dark:text-accent mb-3 flex items-center">
                                <i class="fas fa-map-signs mr-3"></i>
                                <?php echo htmlspecialchars($way['NameOfWay']); ?>
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($way['Description'])); ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- Fascinating Spots -->
                <?php if (!empty($fascinatingSpots) || !empty($fortData['IntroductionFS'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        <i class="fas fa-star text-accent mr-3"></i>
                        Points of Interest
                    </h2>
                    
                    <?php if (!empty($fortData['IntroductionFS'])): ?>
                    <div class="mb-6 p-6 bg-purple-50 dark:bg-gray-800 rounded-xl">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php echo nl2br(htmlspecialchars($fortData['IntroductionFS'])); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($fascinatingSpots)): ?>
                    <div class="space-y-4">
                        <?php foreach ($fascinatingSpots as $spot): ?>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6 border-l-4 border-accent">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                                <i class="fas fa-location-dot text-accent mr-2"></i>
                                <?php echo htmlspecialchars($spot['NameOfSpot']); ?>
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($spot['Description'])); ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- Facilities -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        <i class="fas fa-concierge-bell text-accent mr-3"></i>
                        Facilities & Amenities
                    </h2>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php if (!empty($fortData['AccommodationFacility'])): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="text-4xl mb-4">🏠</div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3">Accommodation</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($fortData['AccommodationFacility'])); ?>
                            </p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($fortData['FoodFacility'])): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="text-4xl mb-4">🍽️</div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3">Food</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($fortData['FoodFacility'])); ?>
                            </p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($fortData['DrinkingWaterFacility'])): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="text-4xl mb-4">💧</div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3">Water</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo nl2br(htmlspecialchars($fortData['DrinkingWaterFacility'])); ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Wildlife & Nature -->
                <?php if (!empty($fortData['Birds']) || !empty($fortData['Animals']) || !empty($fortData['Flowers'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        <i class="fas fa-leaf text-accent mr-3"></i>
                        Wildlife & Flora
                    </h2>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php if (!empty($fortData['Birds'])): ?>
                        <div class="bg-sky-50 dark:bg-gray-800 rounded-xl p-6 border-l-4 border-sky-500">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3">
                                <i class="fas fa-dove mr-2 text-sky-500"></i>Birds
                            </h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300"><?php echo htmlspecialchars($fortData['Birds']); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($fortData['Animals'])): ?>
                        <div class="bg-green-50 dark:bg-gray-800 rounded-xl p-6 border-l-4 border-green-500">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3">
                                <i class="fas fa-paw mr-2 text-green-500"></i>Animals
                            </h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300"><?php echo htmlspecialchars($fortData['Animals']); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($fortData['Flowers'])): ?>
                        <div class="bg-pink-50 dark:bg-gray-800 rounded-xl p-6 border-l-4 border-pink-500">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3">
                                <i class="fas fa-seedling mr-2 text-pink-500"></i>Flora
                            </h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300"><?php echo htmlspecialchars($fortData['Flowers']); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Photos Gallery Preview -->
                <?php if (!empty($fortPhotos)): ?>
                <!--<div class="mb-12">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center">
                            <span class="w-1 h-8 bg-accent mr-4"></span>
                            <i class="fas fa-images text-accent mr-3"></i>
                            Photo Gallery
                        </h2>
                        <a href="/gallery?fort=<?php echo urlencode($fortData['FortName']); ?>" class="text-accent hover:text-primary font-semibold">
                            View All Photos <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <?php foreach (array_slice($fortPhotos, 0, 8) as $photo): ?>
                        <div class="aspect-square bg-gray-200 dark:bg-gray-700 rounded-xl overflow-hidden hover:shadow-xl transition-shadow cursor-pointer">
                            <img src="/images/forts/<?php echo htmlspecialchars($photo['PIC_NAME']); ?>" 
                                 alt="<?php echo htmlspecialchars($photo['PIC_DESC'] ?? $fortData['FortName']); ?>"
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                 onerror="this.src='https://images.unsplash.com/photo-1605538883669-825200433431?w=400&h=400&fit=crop'">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>-->
                <?php endif; ?>

                <!-- Maps Link -->
                <div class="mb-12">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl p-8 text-white text-center">
                        <i class="fas fa-map-marked-alt text-5xl mb-4"></i>
                        <h3 class="text-2xl font-bold mb-4">Location Maps</h3>
                        <p class="mb-6 opacity-90">View detailed maps and trekking routes</p>
                        <a href="/maps?fort=<?php echo urlencode($fortData['FortName']); ?>" 
                           class="inline-flex items-center px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            <i class="fas fa-map mr-2"></i>
                            View Maps
                        </a>
                    </div>
                </div>

                <!-- Additional Notes -->
                <?php if (!empty($fortData['Notes'])): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        <i class="fas fa-clipboard text-accent mr-3"></i>
                        Additional Information
                    </h2>
                    <div class="bg-yellow-50 dark:bg-gray-800 rounded-xl p-6 border-l-4 border-yellow-500">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php echo nl2br(htmlspecialchars($fortData['Notes'])); ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Nearby Villages -->
                <?php if (!empty($fortData['NearbyVillages']) && $fortData['NearbyVillages'] != 'null'): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        <i class="fas fa-home text-accent mr-3"></i>
                        Nearby Villages
                    </h2>
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            <?php echo htmlspecialchars($fortData['NearbyVillages']); ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Related Forts -->
                <?php if (!empty($relatedForts)): ?>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                        <span class="w-1 h-8 bg-accent mr-4"></span>
                        Other Forts in <?php echo htmlspecialchars($fortData['FortRange']); ?>
                    </h2>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php foreach ($relatedForts as $related): ?>
                        <a href="/fort/index.php?slug=<?php echo createSlug($related['FortName']); ?>" 
                           class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all hover:scale-105">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                                <?php echo htmlspecialchars($related['FortName']); ?>
                            </h3>
                            <span class="text-sm px-2 py-1 rounded-full text-white <?php echo getDifficultyColor($related['Grade']); ?>">
                                <?php echo htmlspecialchars($related['Grade']); ?>
                            </span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Share & Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center py-8">
                    <a href="/trek-schedule" class="inline-flex items-center px-6 py-3 bg-primary hover:bg-secondary text-white rounded-lg font-semibold transition-colors">
                        <i class="fas fa-hiking mr-2"></i>
                        Join Trek to This Fort
                    </a>
                    <button onclick="shareThis()" class="inline-flex items-center px-6 py-3 bg-accent hover:bg-primary text-white rounded-lg font-semibold transition-colors">
                        <i class="fas fa-share-alt mr-2"></i>
                        Share This Fort
                    </button>
                    <button onclick="window.print()" class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition-colors">
                        <i class="fas fa-print mr-2"></i>
                        Print Info
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- Trek Tips Section -->
    <section class="py-12 bg-gradient-to-r from-forest to-mountain text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Planning Your Trek?</h2>
                
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm">
                        <i class="fas fa-backpack text-4xl mb-3 text-accent"></i>
                        <h3 class="text-lg font-bold mb-2">Pack Smart</h3>
                        <p class="text-sm opacity-90">Carry essentials, water, and first aid kit</p>
                    </div>
                    
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm">
                        <i class="fas fa-clock text-4xl mb-3 text-accent"></i>
                        <h3 class="text-lg font-bold mb-2">Start Early</h3>
                        <p class="text-sm opacity-90">Begin your trek early in the morning</p>
                    </div>
                    
                    <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm">
                        <i class="fas fa-users text-4xl mb-3 text-accent"></i>
                        <h3 class="text-lg font-bold mb-2">Trek in Groups</h3>
                        <p class="text-sm opacity-90">Always trek with companions for safety</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/trek-schedule" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        View Upcoming Treks
                    </a>
                    <a href="/safety-guidelines" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Safety Guidelines
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Share functionality
    window.shareThis = function() {
        const fortName = '<?php echo addslashes($fortData['FortName']); ?>';
        const shareUrl = window.location.href;
        const shareText = `Check out ${fortName} fort on Trekshitz - Complete trekking and historical information!`;
        
        if (navigator.share) {
            navigator.share({
                title: fortName + ' Fort',
                text: shareText,
                url: shareUrl
            }).catch(() => {
                // User cancelled
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(`${shareText}\n${shareUrl}`).then(() => {
                showNotification('Link copied to clipboard!', 'success');
            }).catch(() => {
                prompt('Copy this link:', shareUrl);
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
    
    // Smooth scroll for any anchor links
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
    
    // Image gallery lightbox (optional - simple implementation)
    const galleryImages = document.querySelectorAll('.grid .aspect-square img');
    galleryImages.forEach(img => {
        img.addEventListener('click', function() {
            const lightbox = document.createElement('div');
            lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
            lightbox.innerHTML = `
                <div class="relative max-w-4xl w-full">
                    <button class="absolute top-4 right-4 text-white text-3xl hover:text-accent transition-colors" onclick="this.closest('.fixed').remove()">
                        <i class="fas fa-times"></i>
                    </button>
                    <img src="${this.src}" alt="${this.alt}" class="w-full h-auto rounded-lg">
                </div>
            `;
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    lightbox.remove();
                }
            });
            document.body.appendChild(lightbox);
        });
    });
    
    // Add fade-in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(20px)';
                entry.target.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('section > div > div').forEach(el => {
        observer.observe(el);
    });
    
    console.log('Fort details page loaded successfully');
});

// Add CSS for text gradient
document.addEventListener('DOMContentLoaded', function() {
    const style = document.createElement('style');
    style.textContent = `
        .prose p {
            margin-bottom: 1rem;
        }
        @media print {
            .no-print, header, footer, button {
                display: none !important;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>