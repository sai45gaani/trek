<?php
// Set page specific variables
$page_title = 'Photo Gallery of Butterflies | Trekshitz';
$meta_description = 'Beautiful butterfly photographs captured during trekking adventures in Sahyadri, Western Ghats, Maharashtra. Explore diverse butterfly species found in forests and hills.';
$meta_keywords = 'butterfly photos, Sahyadri butterflies, Western ghats, trekking, wildlife, Maharashtra butterflies, nature photography';

require_once '../config/database.php';

// Include header
include '../includes/header.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();


// Pagination settings
$itemsPerPage = 16;
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Get filter letter
$filterLetter = isset($_GET['letter']) ? strtoupper($_GET['letter']) : 'ALL';

// Build query based on filter
$whereClause = "";
if ($filterLetter !== 'ALL') {
    $whereClause = " AND CAT_NAME LIKE '" . $conn->real_escape_string($filterLetter) . "%'";
}
// Get total count for pagination
$countQuery = "
    SELECT COUNT(*) AS total
    FROM sw_tblcategories
    WHERE CAT_TYPE = 'Butterfly'
    $whereClause
";

$countResult = $conn->query($countQuery);
$totalItems = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Main query to get forts with their featured images
$query = "
    SELECT 
        CAT_ID,
        CAT_NAME,
        CAT_IMAGE,
        CAT_TYPE
    FROM sw_tblcategories
    WHERE CAT_TYPE = 'Butterfly'
    $whereClause
    ORDER BY CAT_NAME ASC
    LIMIT $itemsPerPage OFFSET $offset
";

$result = $conn->query($query);

// Get forts data
$galleryData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $galleryData[] = $row;
    }
}



// Get actual stats from database


$statsQuery = "
    SELECT
        COUNT(*) AS totalButterflies,
        COUNT(CAT_IMAGE) AS totalButterflyImages,
        COUNT(DISTINCT CAT_NAME) AS uniqueButterflySpecies
    FROM sw_tblcategories
    WHERE CAT_TYPE = 'Butterfly'
";

$statsResult = $conn->query($statsQuery);
$stats = $statsResult->fetch_assoc();


?>

<style>
/* Butterfly Gallery specific styles */
.butterfly-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #000;
    position: relative;
}

.butterfly-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.butterfly-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.butterfly-card:hover .butterfly-image {
    transform: scale(1.1);
    filter: brightness(1.1);
}

.butterfly-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
    color: white;
    padding: 1.5rem 1rem 1rem;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.butterfly-card:hover .butterfly-overlay {
    transform: translateY(0);
}

.butterfly-stats {
    background: linear-gradient(135deg, #ff6b6b, #ffa500);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.species-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.butterfly-modal-header {
    background: linear-gradient(135deg, #ff6b6b, #ffa500);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

.butterfly-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.butterfly-photo-item {
    cursor: pointer;
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
}

.butterfly-photo-item:hover {
    transform: scale(1.05);
}

.scientific-name {
    font-style: italic;
    color: #ffa500;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .butterfly-image {
        height: 150px;
    }
    
    .butterfly-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
.butterfly-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #2b1a0f; /* dark earthy base */
    position: relative;
}

.butterfly-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.45); /* primary shadow */
}

.butterfly-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.butterfly-card:hover .butterfly-image {
    transform: scale(1.1);
    filter: brightness(1.08) contrast(1.05);
}

/* Overlay with fort-style dark gradient */
.butterfly-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(
        to top,
        rgba(43, 26, 15, 0.95),
        rgba(43, 26, 15, 0.6),
        transparent
    );
    color: #fff;
    padding: 1.5rem 1rem 1rem;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.butterfly-card:hover .butterfly-overlay {
    transform: translateY(0);
}

/* Stats section */
.butterfly-stats {
    background: linear-gradient(135deg, #8B4513, #D2691E);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
    box-shadow: 0 12px 30px rgba(139, 69, 19, 0.4);
}

/* Badge */
.species-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(244, 164, 96, 0.25); /* accent tint */
    color: #F4A460;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    border: 1px solid rgba(244, 164, 96, 0.4);
}

/* Modal Header */
.butterfly-modal-header {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

/* Photo Grid */
.butterfly-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.butterfly-photo-item {
    cursor: pointer;
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
}

.butterfly-photo-item:hover {
    transform: scale(1.05);
}

/* Scientific name – fort accent style */
.scientific-name {
    font-style: italic;
    color: #DEB887; /* mountain / parchment tone */
    font-size: 0.9rem;
}

/* Responsive */
@media (max-width: 768px) {
    .butterfly-image {
        height: 150px;
    }

    .butterfly-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
            .fort-stats {
                background: linear-gradient(
                    135deg,
                    #8B4513,  /* primary */
                    #D2691E   /* secondary */
                );
                color: #FFFEF7;
                padding: 2rem;
                border-radius: 1rem;
                text-align: center;
                margin: 2rem 0; 
            }


</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"butterfly\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><path d=\"M10,8 C8,6 6,8 8,12 C6,14 8,16 10,14 C12,16 14,14 12,12 C14,8 12,6 10,8 Z\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23butterfly)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 mt-6 font-bilingual">
                    🦋 Butterfly Gallery
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Photo Gallery of Butterflies
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Beautiful butterfly species captured during trekking adventures in Sahyadri mountains
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-camera mr-2"></i>
                        Browse Gallery
                    </a>
                    <a href="#alphabetical" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                        <i class="fas fa-sort-alpha-down mr-2"></i>
                        Alphabetical View
                    </a>
                </div>
            </div>
        </div>
    </section>




        <!-- Gallery Stats -->
<!-- Butterfly Gallery Stats - DYNAMIC DATA -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800" id="butterfly-statistics">
            <div class="container mx-auto px-4">
                <div class="fort-stats mx-auto">
                    <div class="grid md:grid-cols-3 gap-6">
                        
                        <div class="text-center">
                            <div class="text-3xl font-bold mb-2">
                                <?php echo $stats['totalButterflies']; ?>+
                            </div>
                            <p class="opacity-90">Butterflies Listed</p>
                        </div>

                        <div class="text-center">
                            <div class="text-3xl font-bold mb-2">
                                <?php echo $stats['totalButterflyImages']; ?>+
                            </div>
                            <p class="opacity-90">Butterfly Images</p>
                        </div>

                        <div class="text-center">
                            <div class="text-3xl font-bold mb-2">
                                <?php echo $stats['uniqueButterflySpecies']; ?>+
                            </div>
                            <p class="opacity-90">Unique Species</p>
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
                    Browse Butterflies by Name
                </h3>
                <p class="text-gray-600 dark:text-gray-300">* Click on the photo to see more photos of the butterfly species</p>
            </div>
            
            <div class="alphabet-filter">
               <a href="?letter=ALL&page=1" class="<?php echo $filterLetter === 'ALL' ? 'active' : ''; ?>">ALL</a>
                <?php foreach (range('A', 'Z') as $letter): ?>
                    <a href="?letter=<?php echo $letter; ?>&page=1" class="<?php echo $filterLetter === $letter ? 'active' : ''; ?>"><?php echo $letter; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- Butterfly Gallery -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-4 gap-6">

<?php foreach ($galleryData as $row): 
    $name = $row['CAT_NAME'];
    $slug = str_replace(' ', '_', $name);
    $alphabet = strtoupper($name[0]);
    $image = "../assets/images/Photos/CATEGORY/Butterfly/" . $row['CAT_IMAGE'];
?>
<div class="butterfly-card cursor-pointer" onclick="openButterflyGallery('<?= $slug ?>')">

    <img src="<?= htmlspecialchars($image) ?>"
         alt="<?= htmlspecialchars($name) ?>"
         class="w-full h-48 object-cover rounded"
         loading="lazy"
         onerror="this.src='../assets/images/default-butterfly.svg'">

    <div class="p-3 bg-black text-white">
        <h3 class="font-bold"><?= htmlspecialchars($name) ?></h3>
        <p class="text-sm italic text-orange-300"><?= htmlspecialchars($name) ?></p>
    </div>
</div>
<?php endforeach; ?>

</div>
    </section>

    <!-- ================= PAGINATION ================= -->
<div class="pagination flex justify-center gap-2 py-8">
<?php if ($currentPage > 1): ?>
<a href="?page=<?= $currentPage - 1 ?>&letter=<?= $filterLetter ?>">&laquo; Prev</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
<?php if ($i == $currentPage): ?>
<span class="font-bold"><?= $i ?></span>
<?php else: ?>
<a href="?page=<?= $i ?>&letter=<?= $filterLetter ?>"><?= $i ?></a>
<?php endif; ?>
<?php endfor; ?>

<?php if ($currentPage < $totalPages): ?>
<a href="?page=<?= $currentPage + 1 ?>&letter=<?= $filterLetter ?>">Next &raquo;</a>
<?php endif; ?>
</div>

    <!-- Featured Butterfly Types -->
    
    <!-- Featured Galleries -->
<section class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-images mr-3 text-primary"></i>
                Featured Galleries
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Explore nature, heritage, and creativity through our curated collections
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Butterflies -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-4 ">
                    <i class="fas fa-mountain text-2xl text-cream-light"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                    Butterflies
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    A colorful collection of butterfly species captured across Maharashtra.
                </p>
                <a href="./butterfly-gallery.php" class="text-secondary font-semibold hover:underline">
                    View Gallery <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Caves -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-mountain text-2xl text-cream-light"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                    Caves
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    Ancient caves, rock-cut architecture, and hidden formations of Sahyadri.
                </p>
                <a href="./caves-gallery.php" class="text-secondary font-semibold hover:underline">
                    View Gallery <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Flowers -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-seedling text-2xl text-cream-light"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                    Flowers
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    Wildflowers and seasonal blooms found on forts and trekking routes.
                </p>
                <a href="./flower-gallery.php" class="text-secondary font-semibold hover:underline">
                    View Gallery <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Sketches -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-pink-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-pencil-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                    Sketches
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    Hand-drawn fort sketches, maps, and artistic impressions by members.
                </p>
                <a href="./sketches-gallery.php" class="text-secondary font-semibold hover:underline">
                    View Gallery <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>
    </div>
</section>


    <!-- Butterfly Detail Modal -->
    <div id="butterfly-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
        <div class="bg-gray-900 rounded-xl max-w-6xl max-h-[90vh] overflow-y-auto w-full relative">
            <div class="butterfly-modal-header">
                <button onclick="closeButterflyModal()" class="absolute top-4 right-4 text-white hover:text-gray-300">
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

<style>
.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin: 2rem 0;
}

.alphabet-filter a {
    padding: 0.5rem 1rem;
    background: #8B4513; /* primary */
    color: #FFF8DC; /* cream */
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(139, 69, 19, 0.35);
}

.alphabet-filter a:hover,
.alphabet-filter a.active {
    background: #D2691E; /* secondary */
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(210, 105, 30, 0.45);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin: 2rem 0;
}

.pagination a,
.pagination span {
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
}

.pagination a {
    background: #8B4513; /* primary */
    color: #FFF8DC;
    box-shadow: 0 4px 10px rgba(139, 69, 19, 0.35);
}

.pagination a:hover {
    background: #CD853F; /* forest */
    transform: translateY(-2px);
}

.pagination .current {
    background: #F4A460; /* accent */
    color: #3b1f0f;
    font-weight: bold;
}

/* Lightbox */
.lightbox-image-container {
    position: relative;
    text-align: center;
}

.lightbox-prev,
.lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(43, 26, 15, 0.85); /* dark earth */
    color: #FFF8DC;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
}

.lightbox-prev {
    left: -20px;
}

.lightbox-next {
    right: -20px;
}

.lightbox-prev:hover,
.lightbox-next:hover {
    background: rgba(139, 69, 19, 0.95); /* primary hover */
    transform: translateY(-50%) scale(1.1);
}

/* Thumbnails scrollbar */
.lightbox-thumbnails {
    max-height: 100px;
    overflow-x: auto;
}

.lightbox-thumbnails::-webkit-scrollbar {
    height: 4px;
}

.lightbox-thumbnails::-webkit-scrollbar-thumb {
    background: #8B4513; /* primary */
    border-radius: 2px;
}

/* Responsive */
@media (max-width: 768px) {
    .butterfly-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .lightbox-prev {
        left: 10px;
    }

    .lightbox-next {
        right: 10px;
    }
}
</style>
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    console.log('Butterfly Photo Gallery loaded');
});

// Filter by alphabet
function filterByAlphabet(letter) {
    $('.alphabet-filter a').removeClass('active');
    $('a[onclick="filterByAlphabet(\'' + letter + '\')"]').addClass('active');
    
    if (letter === 'ALL') {
        $('.butterfly-card').show();
    } else {
        $('.butterfly-card').hide();
        $('.butterfly-card[data-alphabet="' + letter + '"]').show();
    }
    
    // Animate the filtered items
    $('.butterfly-card:visible').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({opacity: 1}, 300);
    });
}

// Open butterfly gallery in modal
function openButterflyGallery(slug) {
     const butterflyName = slug.replace(/_/g, ' ');
    
    // Get butterfly photos (in real app, this would be an AJAX call)
    const butterflyPhotos = <?php echo json_encode($galleryData); ?> ;
    window.currentFortPhotos = butterflyPhotos;
    window.currentFortName = slug;
    
    // Create modal content
    let modalContent = `
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold mb-2 text-white">
                <i class="fas fa-butterfly mr-2"></i>
                Butterfly species
            </h2>
            <p class="text-orange-300 italic text-lg mb-2">Scientific Classification</p>
            <p class="text-gray-300">${butterflyPhotos.length} Photographs Available</p>
        </div>
        <div class="butterfly-photo-grid">
    `;
    
    butterflyPhotos.forEach((photo, index) => {
        modalContent += `
            <div class="butterfly-photo-item"  onclick="openLightboxSimple(
                ${index},
                '${photo.CAT_NAME}'
             )">
                <img src="../assets/images/Photos/CATEGORY/Butterfly/${photo.CAT_IMAGE}" alt="${photo.CAT_NAME}" class="w-full h-48 object-cover rounded-lg">
                <div class="photo-info mt-2">
                   <p class="text-white text-sm font-semibold">
                    ${photo.CAT_NAME}
                </p>
                   
                </div>
            </div>
        `;
    });
    
    modalContent += '</div>';
    
    // Show modal
    $('#butterfly-modal .modal-body').html(modalContent);
    $('#butterfly-modal').removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}


// Close butterfly modal
function closeButterflyModal() {
    $('#butterfly-modal').addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}



function openLightboxSimple(index, name) {
    const butterflyname = name;
    const photos = window.currentFortPhotos;
    console.log(photos);
    console.log('Opening lightbox for', name, 'at index', index);
    
    let lightboxContent = `
        <div class="lightbox-header mb-4">
            <h3 class="text-white text-xl mb-1">${photos[index].CAT_NAME}</h3>
            <p class="text-orange-300 text-sm mb-1">📍 ${photos[index].CAT_TYPE}</p>
            <p class="text-gray-300 text-sm">Photo ${index + 1} of ${photos.length}</p>
        </div>
        <div class="lightbox-image-container relative flex items-center justify-center min-h-[70vh]">
    <img 
        src="../assets/images/Photos/CATEGORY/Butterfly/${photos[index].CAT_IMAGE}"
        alt="${photos[index].CAT_NAME}"
        class="max-w-[60vw] max-h-[50vh]  w-[343px] aspect-[343/229] object-contain
            rounded-lg sm:w-[400px] md:w-[550px] lg:w-[700px] xl:w-[900px]"
        onerror="this.onerror=null; this.src='../assets/images/default-butterfly.svg';"
    >

    ${index > 0
        ? `<button class="lightbox-prev" onclick="navigateLightbox(${index - 1})">
                <i class="fas fa-chevron-left"></i>
           </button>`
        : ''
    }

    ${index < photos.length - 1
        ? `<button class="lightbox-next" onclick="navigateLightbox(${index + 1})">
                <i class="fas fa-chevron-right"></i>
           </button>`
        : ''
    }
</div>

        <div class="lightbox-thumbnails mt-4 flex gap-2 overflow-x-auto">
    `;
    
    photos.forEach((photo, i) => {
        lightboxContent += `
            <img src="../assets/images/Photos/CATEGORY/Butterfly/${photo.CAT_IMAGE}" 
                 alt="${photo.title}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-orange-500' : 'opacity-60'}"
                 onclick="navigateLightbox(${i}, '${name}')">
        `;
    });
    
    lightboxContent += '</div>';
    
    $('#lightbox .lightbox-body').html(lightboxContent);
    $('#butterfly-modal').addClass('hidden'); // hide background modal
    $('#lightbox').removeClass('hidden').addClass('flex');
}

// Navigate lightbox
function navigateLightbox(index, name) {
    openLightboxSimple(index, name);
}

// Close lightbox
function closeLightbox() {
    $('#lightbox').addClass('hidden').removeClass('flex');
    $('#butterfly-modal').removeClass('hidden').addClass('flex');
}

// Change page
function changePage(page) {
    console.log('Changing to page:', page);
    // In real implementation, load new page content via AJAX
    $('.pagination .current').removeClass('current').wrap('<a href="#" onclick="changePage(' + $('.pagination .current').text() + ')"></a>');
    $('.pagination a').each(function() {
        if ($(this).text() == page) {
            $(this).addClass('current').contents().unwrap();
        }
    });
}

// Search functionality for butterflies
function searchButterflies() {
    const searchTerm = $('#butterfly-search').val().toLowerCase();
    $('.butterfly-card').each(function() {
        const butterflyName = $(this).find('h3').text().toLowerCase();
        const scientificName = $(this).find('.scientific-name').text().toLowerCase();
        if (butterflyName.includes(searchTerm) || scientificName.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
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
    
    if ($('#butterfly-modal').hasClass('flex') && e.keyCode == 27) {
        closeButterflyModal();
    }
});

// Lazy loading for butterfly images
$(window).scroll(function() {
    $('.butterfly-image').each(function() {
        if ($(this).offset().top < $(window).scrollTop() + $(window).height() + 100) {
            const src = $(this).attr('src');
            if (src.includes('placeholder')) {
                // Replace with actual butterfly image
                $(this).attr('src', src.replace('placeholder', 'butterfly'));
            }
        }
    });
});

// Add search functionality to the page
$(document).ready(function() {
    // Add search box after the hero section
    const searchBox = `
        <div class="container mx-auto px-4 py-4">
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="butterfly-search" placeholder="Search butterflies by name or scientific name..." 
                           class="w-full px-4 py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-orange-500"
                           onkeyup="searchButterflies()">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $('#alphabetical').before(searchBox);
});
</script>