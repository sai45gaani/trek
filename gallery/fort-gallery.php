<?php
// Set page specific variables
$page_title = 'Photo Gallery of Forts in Sahyadri | Trekshitz';
$meta_description = 'Photographs of trekking, camping, outings etc. in wild forests, hills, forts, palaces, valleys, ravines etc. in Maharashtra.';
$meta_keywords = 'Photos, pictures, Images, Sahyadri, Western ghats, trekking, hiking, wildlife, mumbai trek, pune trek, tourists, trek, adventure sports, forts, palaces';

require_once '../config/database.php';

// Include header
include '../includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Pagination settings
$fortsPerPage = 16;
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($currentPage - 1) * $fortsPerPage;

// Get filter letter
$filterLetter = isset($_GET['letter']) ? strtoupper($_GET['letter']) : 'ALL';

// Build query based on filter
$whereClause = "";
if ($filterLetter !== 'ALL') {
    $whereClause = " AND f.FortName LIKE '" . $conn->real_escape_string($filterLetter) . "%'";
}

// Get total count for pagination
$countQuery = "SELECT COUNT(DISTINCT f.FortName) as total 
               FROM EI_tblFortInfo f 
               LEFT JOIN PM_tblPhotos_clean p ON f.FortName = p.FortName 
               WHERE p.PIC_FRONT_IMAGE = 'Y' $whereClause";
$countResult = $conn->query($countQuery);
$totalForts = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalForts / $fortsPerPage);

// Main query to get forts with their featured images
$query = "SELECT 
            f.FortName,
            f.FortDistrict,
            f.FortType,
            p.PIC_NAME,
            p.PIC_DESC,
            (SELECT COUNT(*) FROM PM_tblPhotos_clean WHERE FortName = f.FortName) as PhotoCount
          FROM EI_tblFortInfo f
          LEFT JOIN PM_tblPhotos_clean p ON f.FortName = p.FortName AND p.PIC_FRONT_IMAGE = 'Y'
          WHERE p.PIC_NAME IS NOT NULL $whereClause
          ORDER BY f.FortName ASC
          LIMIT $fortsPerPage OFFSET $offset";
//echo $query;

$result = $conn->query($query);

// Get forts data
$fortsData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fortsData[] = $row;
    }
}



// Get actual stats from database
$statsQuery = "SELECT 
                (SELECT COUNT(DISTINCT FortName) FROM EI_tblFortInfo) as totalForts,
                (SELECT COUNT(*) FROM PM_tblPhotos_clean) as totalPhotos,
                (SELECT COUNT(DISTINCT FortDistrict) FROM EI_tblFortInfo WHERE FortDistrict IS NOT NULL) as totalDistricts";
$statsResult = $conn->query($statsQuery);
$stats = $statsResult->fetch_assoc();
?>

<style>
/* Fort Gallery specific styles */
.fort-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #000;
    position: relative;
}

.fort-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.fort-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.fort-card:hover .fort-image {
    transform: scale(1.1);
    filter: brightness(1.1);
}

.fort-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
    color: white;
    padding: 1.5rem 1rem 1rem;
    opacity: 1;
    transition: all 0.3s ease;
}

.fort-card:hover .fort-overlay {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.98) 0%, rgba(0, 0, 0, 0.8) 70%, transparent 100%);
}

.fort-stats {
    background: linear-gradient(135deg, #2d5016, #4a7c23);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.photo-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(127, 176, 105, 0.3);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.fort-modal-header {
    background: linear-gradient(135deg, #2d5016, #4a7c23);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

.fort-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.fort-photo-item {
    cursor: pointer;
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
}

.fort-photo-item:hover {
    transform: scale(1.05);
}

.location-name {
    font-style: italic;
    color: #7fb069;
    font-size: 0.9rem;
}

.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin: 2rem 0;
}

.alphabet-filter a {
    padding: 0.5rem 1rem;
    background: #2d5016;
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: bold;
}

.alphabet-filter a:hover,
.alphabet-filter a.active {
    background: #7fb069;
    transform: translateY(-2px);
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin: 2rem 0;
    flex-wrap: wrap;
}

.pagination a,
.pagination span {
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination a {
    background: #2d5016;
    color: white;
}

.pagination a:hover {
    background: #7fb069;
}

.pagination .current {
    background: #7fb069;
    color: white;
    font-weight: bold;
}

.lightbox-image-container {
    position: relative;
    text-align: center;
}

.lightbox-prev, .lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.5rem;
    transition: background 0.3s ease;
    z-index: 10;
}

.lightbox-prev {
    left: 10px;
}

.lightbox-next {
    right: 10px;
}

.lightbox-prev:hover, .lightbox-next:hover {
    background: rgba(0, 0, 0, 0.9);
}

.lightbox-thumbnails {
    max-height: 100px;
    overflow-x: auto;
    padding: 0.5rem 0;
}

.lightbox-thumbnails::-webkit-scrollbar {
    height: 4px;
}

.lightbox-thumbnails::-webkit-scrollbar-thumb {
    background: #2d5016;
    border-radius: 2px;
}

@media (max-width: 768px) {
    .fort-image {
        height: 150px;
    }
    
    .fort-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .alphabet-filter {
        gap: 0.25rem;
    }
    
    .alphabet-filter a {
        padding: 0.4rem 0.8rem;
        font-size: 0.9rem;
    }
}
</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-green-700 via-green-600 to-green-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><rect x=\"6\" y=\"6\" width=\"8\" height=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"7\" y=\"4\" width=\"6\" height=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 mt-6 font-bilingual">
                    🏰 किल्ल्यांची गॅलरी
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Photo Gallery of Forts In Sahyadri
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Historic fortresses captured during trekking adventures in Sahyadri mountains
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-green-700 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-camera mr-2"></i>
                        Browse Gallery
                    </a>
                    <a href="#alphabetical" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-green-700 transition-colors">
                        <i class="fas fa-sort-alpha-down mr-2"></i>
                        Alphabetical View
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Box -->
    <div class="container mx-auto px-4 py-4">
        <div class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" id="fort-search" placeholder="Search forts by name or location..." 
                       class="w-full px-4 py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-green-600"
                       onkeyup="searchForts()">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Stats - DYNAMIC DATA -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="fort-stats mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2"><?php echo $stats['totalForts']; ?>+</div>
                        <p class="opacity-90">Historic Forts</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2"><?php echo $stats['totalPhotos']; ?>+</div>
                        <p class="opacity-90">Photographs</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2"><?php echo $stats['totalDistricts']; ?>+</div>
                        <p class="opacity-90">Locations Covered</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alphabetical Filter -->
    <section id="alphabetical" class="py-8 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Browse Forts by Name
                </h3>
                <p class="text-gray-600 dark:text-gray-300">* Click on the photo to see more photos of the fort</p>
            </div>
            
            <div class="alphabet-filter">
                <a href="?letter=ALL&page=1" class="<?php echo $filterLetter === 'ALL' ? 'active' : ''; ?>">ALL</a>
                <?php foreach (range('A', 'Z') as $letter): ?>
                    <a href="?letter=<?php echo $letter; ?>&page=1" class="<?php echo $filterLetter === $letter ? 'active' : ''; ?>"><?php echo $letter; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Fort Gallery - DYNAMIC DATA -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div id="gallery-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php if (count($fortsData) > 0): ?>
                        <?php foreach ($fortsData as $fort): 
                            $fortName = htmlspecialchars($fort['FortName']);
                            $fortDistrict = htmlspecialchars($fort['FortDistrict'] ?? 'Unknown District');
                            $picName = htmlspecialchars($fort['PIC_NAME']);
                            $photoCount = (int)$fort['PhotoCount'];
                            $imagePath = "../assets/images/Photos/Picture/" . $picName;
                            $firstLetter = strtoupper(substr($fortName, 0, 1));
                            $defaultImage = "../assets/images/default-fort.svg";
                        ?>
                            <div class="fort-card" data-alphabet="<?php echo $firstLetter; ?>" data-fort-name="<?php echo $fortName; ?>">
                                <img src="<?php echo $imagePath; ?>" 
                                     alt="<?php echo $fortName; ?>" 
                                     class="fort-image"
                                     onerror="this.onerror=null; this.src='<?php echo $defaultImage; ?>';">
                                <div class="fort-overlay">
                                    <h3 class="font-bold text-lg mb-1 text-white"><?php echo $fortName; ?></h3>
                                    <p class="location-name mb-2"><?php echo $fortDistrict; ?></p>
                                    <div class="photo-badge">
                                        <i class="fas fa-camera mr-2"></i>
                                        <?php echo $photoCount; ?> Photos Inside
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center py-12">
                            <i class="fas fa-image text-6xl text-gray-400 mb-4"></i>
                            <p class="text-xl text-gray-600 dark:text-gray-300">No forts found for this filter.</p>
                            <a href="?letter=ALL&page=1" class="inline-block mt-4 px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700">
                                View All Forts
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Pagination - DYNAMIC -->
                <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <?php if ($currentPage > 1): ?>
                        <a href="?letter=<?php echo $filterLetter; ?>&page=<?php echo $currentPage - 1; ?>">&lt;&lt; Previous</a>
                    <?php endif; ?>
                    
                    <?php 
                    // Show max 10 page numbers
                    $startPage = max(1, $currentPage - 5);
                    $endPage = min($totalPages, $currentPage + 4);
                    
                    if ($startPage > 1): ?>
                        <a href="?letter=<?php echo $filterLetter; ?>&page=1">1</a>
                        <?php if ($startPage > 2): ?>
                            <span>...</span>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                        <?php if ($i == $currentPage): ?>
                            <span class="current"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?letter=<?php echo $filterLetter; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($endPage < $totalPages): ?>
                        <?php if ($endPage < $totalPages - 1): ?>
                            <span>...</span>
                        <?php endif; ?>
                        <a href="?letter=<?php echo $filterLetter; ?>&page=<?php echo $totalPages; ?>"><?php echo $totalPages; ?></a>
                    <?php endif; ?>
                    
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?letter=<?php echo $filterLetter; ?>&page=<?php echo $currentPage + 1; ?>">Next &gt;&gt;</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Featured Fort Types -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-star mr-3 text-green-600"></i>
                    Featured Fort Categories
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Explore different types of forts found in Maharashtra
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Hill Forts</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Majestic fortresses built on mountain peaks and ridges</p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-water text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Sea Forts</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Coastal fortifications protecting ancient harbors</p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-yellow-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-crown text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Maratha Forts</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Historic strongholds of the Maratha Empire</p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Fort Detail Modal -->
<div id="fort-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
    <div class="bg-gray-900 rounded-xl max-w-6xl max-h-[90vh] overflow-y-auto w-full relative">
        <div class="fort-modal-header relative">
            <button onclick="closeFortModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="modal-header"></div>
        </div>
        <div class="modal-body p-6"></div>
    </div>
</div>

<!-- Lightbox Modal -->
 <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-[9999] hidden items-center justify-center p-4">
    <div class="lightbox-content max-w-5xl w-full">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <div class="lightbox-body text-center"></div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<script>
$(document).ready(function() {
    console.log('Fort Photo Gallery loaded - Dynamic Version');
    
    // Add click handlers to fort cards
    $('.fort-card').click(function() {
        const fortName = $(this).data('fort-name');
        openFortGallery(fortName);
    });
});

// Open fort gallery in modal - AJAX LOAD
function openFortGallery(fortName) {
    // Show loading state
    $('#fort-modal .modal-body').html('<div class="text-center py-12"><i class="fas fa-spinner fa-spin text-4xl text-white"></i><p class="text-white mt-4">Loading photos...</p></div>');
    $('#fort-modal').removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
    
    // AJAX request to get all photos for this fort
    $.ajax({
        url: '../api/get_fort_photos.php',
        method: 'POST',
        data: { fortName: fortName },
        dataType: 'json',
        success: function(response) {
            if (response.status === "200") {
                displayFortGallery(response.data);
            } else {
                $('#fort-modal .modal-body').html('<div class="text-center py-12"><i class="fas fa-exclamation-triangle text-4xl text-yellow-500"></i><p class="text-white mt-4">' + response.message + '</p></div>');
            }
        },
        error: function() {
            $('#fort-modal .modal-body').html('<div class="text-center py-12"><i class="fas fa-exclamation-triangle text-4xl text-red-500"></i><p class="text-white mt-4">Error loading photos. Please try again.</p></div>');
        }
    });
}

// Display fort gallery in modal
function displayFortGallery(data) {
    const fortName = data.fortName;
    const fortDistrict = data.fortDistrict;
    const photos = data.photos;
    
    let modalContent = `
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold mb-2 text-white">
                <i class="fas fa-fort-awesome mr-2"></i>
                ${fortName}
            </h2>
            <p class="text-green-300 italic text-lg mb-2">${fortDistrict}</p>
            <p class="text-gray-300">${photos.length} Photographs Available</p>
        </div>
        <div class="fort-photo-grid">
    `;
    
    photos.forEach((photo, index) => {
        modalContent += `
            <div class="fort-photo-item" onclick="openLightbox(${index}, '${fortName}')">
                <img src="../${photo.path}" alt="${photo.description || fortName}" class="w-full h-48 object-cover rounded-lg" onerror="this.src='../assets/images/default-fort.svg';">
                <div class="photo-info mt-2">
                    <p class="text-white text-sm">${photo.description || 'Photo ' + (index + 1)}</p>
                </div>
            </div>
        `;
    });
    
    modalContent += '</div>';
    
    $('#fort-modal .modal-body').html(modalContent);
    
    // Store photos data globally for lightbox
    window.currentFortPhotos = photos;
    window.currentFortName = fortName;
}

// Close fort modal
function closeFortModal() {
    $('#fort-modal').addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}

// Open lightbox for individual photo
function openLightbox(index, fortName) {
    const photos = window.currentFortPhotos;
    
    if (!photos || photos.length === 0) return;
    
    let lightboxContent = `
        <div class="lightbox-header mb-4">
            <h3 class="text-white text-xl mb-1">${fortName}</h3>
            <p class="text-green-300 text-sm mb-1">${photos[index].description || 'Fort Photo'}</p>
            <p class="text-gray-300 text-sm">Photo ${index + 1} of ${photos.length}</p>
        </div>
        <div class="lightbox-image-container relative">
            <img src="../${photos[index].path}" alt="${photos[index].description}" class="max-w-full max-h-[70vh] object-contain rounded-lg mx-auto" onerror="this.src='../assets/images/default-fort.svg';">
            ${index > 0 ? '<button class="lightbox-prev" onclick="navigateLightbox(' + (index - 1) + ')"><i class="fas fa-chevron-left"></i></button>' : ''}
            ${index < photos.length - 1 ? '<button class="lightbox-next" onclick="navigateLightbox(' + (index + 1) + ')"><i class="fas fa-chevron-right"></i></button>' : ''}
        </div>
        <div class="lightbox-thumbnails mt-4 flex gap-2 overflow-x-auto justify-center">
    `;
    
    photos.forEach((photo, i) => {
        lightboxContent += `
            <img src="../${photo.path}" 
                 alt="${photo.description}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-green-500' : 'opacity-60'}"
                 onclick="navigateLightbox(${i})"
                 onerror="this.src='../assets/images/default-fort.svg';">
        `;
    });
    
    lightboxContent += '</div>';
    
    $('#lightbox .lightbox-body').html(lightboxContent);
    $('#fort-modal').addClass('hidden'); // hide background modal
    $('#lightbox').removeClass('hidden').addClass('flex');
}

// Navigate lightbox
function navigateLightbox(index) {
    openLightbox(index, window.currentFortName);
}

// Close lightbox
function closeLightbox() {
     $('#lightbox').addClass('hidden').removeClass('flex');
    $('#fort-modal').removeClass('hidden').addClass('flex');
}

// Search functionality for forts
function searchForts() {
    const searchTerm = $('#fort-search').val().toLowerCase();
    let visibleCount = 0;
    
    $('.fort-card').each(function() {
        const fortName = $(this).find('h3').text().toLowerCase();
        const locationName = $(this).find('.location-name').text().toLowerCase();
        
        if (fortName.includes(searchTerm) || locationName.includes(searchTerm)) {
            $(this).show();
            visibleCount++;
        } else {
            $(this).hide();
        }
    });
    
    // Show message if no results
    if (visibleCount === 0 && searchTerm.length > 0) {
        if ($('#no-results-message').length === 0) {
            $('#gallery-grid').append(`
                <div id="no-results-message" class="col-span-full text-center py-12">
                    <i class="fas fa-search text-6xl text-gray-400 mb-4"></i>
                    <p class="text-xl text-gray-600 dark:text-gray-300">No forts found matching "${searchTerm}"</p>
                    <button onclick="clearSearch()" class="mt-4 px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700">
                        Clear Search
                    </button>
                </div>
            `);
        }
    } else {
        $('#no-results-message').remove();
    }
}

// Clear search
function clearSearch() {
    $('#fort-search').val('');
    $('.fort-card').show();
    $('#no-results-message').remove();
}

// Keyboard navigation for lightbox
$(document).keydown(function(e) {
    if ($('#lightbox').hasClass('flex')) {
        if (e.keyCode == 37) { // Left arrow
            $('.lightbox-prev').click();
        } else if (e.keyCode == 39) { // Right arrow
            $('.lightbox-next').click();
        } else if (e.keyCode == 27) { // Escape
            closeLightbox();
        }
    }
    
    if ($('#fort-modal').hasClass('flex') && e.keyCode == 27) {
        closeFortModal();
    }
});

// Click outside modal to close
$('#fort-modal').click(function(e) {
    if ($(e.target).is('#fort-modal')) {
        closeFortModal();
    }
});

$('#lightbox').click(function(e) {
    if ($(e.target).is('#lightbox')) {
        closeLightbox();
    }
});

// Smooth scroll to gallery
$('a[href^="#"]').on('click', function(e) {
    const target = $(this.getAttribute('href'));
    if (target.length) {
        e.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top - 80
        }, 800);
    }
});

// Add animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '0';
            entry.target.style.transform = 'translateY(20px)';
            setTimeout(() => {
                entry.target.style.transition = 'all 0.5s ease';
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }, 100);
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all fort cards
$('.fort-card').each(function() {
    observer.observe(this);
});

// Initialize tooltips
$('.photo-badge').attr('title', 'Click to view all photos');

console.log('Fort Photo Gallery: Dynamic version loaded successfully');
console.log('Total forts on page: ' + $('.fort-card').length);
console.log('Current filter: <?php echo $filterLetter; ?>');
console.log('Current page: <?php echo $currentPage; ?>');
</script>