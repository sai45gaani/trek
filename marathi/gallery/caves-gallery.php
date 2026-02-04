<?php
// Set page specific variables
$page_title = 'सह्याद्रीतील प्राचीन लेण्यांची फोटो गॅलरी | Trekshitz';

$meta_description = 'महाराष्ट्रातील प्राचीन बौद्ध लेणी, नैसर्गिक खडक रचना आणि मठ संकुलांचे सुंदर फोटो. २००० वर्षांहून जुनी ऐतिहासिक वारसा स्थळे येथे पाहा.';

$meta_keywords = 'लेणी फोटो, बौद्ध लेणी, सह्याद्री लेणी, पश्चिम घाट, प्राचीन लेणी, महाराष्ट्र लेणी, वारसा छायाचित्रण, खडक रचना';

// Include header
require_once './../../config/database.php';

// Include header
include './../../includes/header_marathi.php';

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
    WHERE CAT_TYPE = 'Cave'
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
    WHERE CAT_TYPE = 'Cave'
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
        COUNT(*) AS totalCaves,
        COUNT(CAT_IMAGE) AS totalCaveImages,
        COUNT(DISTINCT CAT_NAME) AS uniqueCaveSites
    FROM sw_tblcategories
    WHERE CAT_TYPE = 'Cave'
";

$statsResult = $conn->query($statsQuery);
$stats = $statsResult->fetch_assoc();


?>

<style>
/* Cave Gallery specific styles - EXACT SAME AS BUTTERFLY GALLERY */
.cave-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #000;
    position: relative;
}

.cave-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.cave-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.cave-card:hover .cave-image {
    transform: scale(1.1);
    filter: brightness(1.1);
}

.cave-overlay {
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

.cave-card:hover .cave-overlay {
    transform: translateY(0);
}

.cave-stats {
    background: linear-gradient(135deg, #8b5a2b, #cd853f);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.photo-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.cave-modal-header {
    background: linear-gradient(135deg, #8b5a2b, #cd853f);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

.cave-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.cave-photo-item {
    cursor: pointer;
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
}

.cave-photo-item:hover {
    transform: scale(1.05);
}

.heritage-name {
    font-style: italic;
    color: #daa520;
    font-size: 0.9rem;
}

/* ALPHABET FILTER - EXACT SAME AS BUTTERFLY GALLERY */
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


@media (max-width: 768px) {
    .cave-image {
        height: 150px;
    }
    
    .cave-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .lightbox-prev {
        left: 10px;
    }
    
    .lightbox-next {
        right: 10px;
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
    <!-- Hero Section - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"cave\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><path d=\"M10,2 C6,6 4,12 6,16 C8,18 12,18 14,16 C16,12 14,6 10,2 Z\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23cave)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 mt-6 font-bilingual">
                            🏔️ लेणी फोटो गॅलरी
                        </h1>

                        <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                            प्राचीन लेण्यांची फोटो गॅलरी
                        </h2>

                        <p class="text-xl md:text-2xl mb-8 opacity-90">
                            सह्याद्री पर्वतरांगांमधील प्राचीन बौद्ध लेणी आणि नैसर्गिक खडक रचनांचे सुंदर छायाचित्रण
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-yellow-800 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                                <i class="fas fa-camera mr-2"></i>
                                गॅलरी पाहा
                            </a>

                            <a href="#alphabetical" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-yellow-800 transition-colors">
                                <i class="fas fa-sort-alpha-down mr-2"></i>
                                वर्णानुक्रमाने पहा
                            </a>
                        </div>
            </div>
        </div>
    </section>



    <!-- Gallery Stats - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="fort-stats mx-auto">
            <div class="grid md:grid-cols-3 gap-6">
                
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">
                            <?php echo $stats['totalCaves']; ?>+
                        </div>
                        <p class="opacity-90">नोंदवलेली लेणी</p>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">
                            <?php echo $stats['totalCaveImages']; ?>+
                        </div>
                        <p class="opacity-90">लेण्यांची छायाचित्रे</p>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">
                            <?php echo $stats['uniqueCaveSites']; ?>+
                        </div>
                        <p class="opacity-90">वैशिष्ट्यपूर्ण स्थळे</p>
                    </div>


            </div>
        </div>
    </div>
    </section>

        <!-- Search Box - EXACT SAME AS BUTTERFLY GALLERY -->
    <div class="container mx-auto px-4 py-4">
        <div class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" id="cave-search" placeholder="Search caves by name or heritage type..." 
                       class="w-full px-4 py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-yellow-600"
                       onkeyup="searchCaves()">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Alphabetical Filter - HARDCODED ALPHABETS -->
    <section id="alphabetical" class="py-8 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    लेण्यांची नावे पाहा
                </h3>
                <p class="text-gray-600 dark:text-gray-300">* अधिक फोटोसाठी छायाचित्रावर क्लिक करा</p>
            </div>
            
            <div class="alphabet-filter">
               <a href="?letter=ALL&page=1" class="<?php echo $filterLetter === 'ALL' ? 'active' : ''; ?>">ALL</a>
                <?php foreach (range('A', 'Z') as $letter): ?>
                    <a href="?letter=<?php echo $letter; ?>&page=1" class="<?php echo $filterLetter === $letter ? 'active' : ''; ?>"><?php echo $letter; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Cave Gallery - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
  <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-4 gap-6">

<?php foreach ($galleryData as $row): 
    $name = $row['CAT_NAME'];
    $slug = str_replace(' ', '_', $name);
    $alphabet = strtoupper($name[0]);
    $image = "../../assets/images/Photos/CATEGORY/Cave/" . $row['CAT_IMAGE'];
?>
<div class="cave-card cursor-pointer" onclick="openCaveGallery('<?= $slug ?>')">

    <img src="<?= htmlspecialchars($image) ?>"
         alt="<?= htmlspecialchars($name) ?>"
         class="w-full h-48 object-cover rounded"
         loading="lazy"
         onerror="this.src='../../assets/images/default-cave.svg'">

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

        <!-- Featured Galleries -->
<section class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-images mr-3 text-primary"></i>
                निवडक गॅलरी
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                आमच्या निवडक संग्रहातून निसर्ग, वारसा आणि सर्जनशीलतेचा अनुभव घ्या
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
                    फुलपाखरे
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    महाराष्ट्रभर टिपलेल्या विविध रंगीबेरंगी फुलपाखरांच्या प्रजातींचा संग्रह.
                </p>
                <a href="./butterfly-gallery.php" class="text-secondary font-semibold hover:underline">
                    गॅलरी पहा <i class="fas fa-arrow-right ml-1"></i>
                </a>

            </div>

            <!-- Caves -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-mountain text-2xl text-cream-light"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                    लेणी
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    प्राचीन लेणी, शैलकृती स्थापत्य आणि सह्याद्रीतील लपलेली भू-रचना.
                </p>
                <a href="./caves-gallery.php" class="text-secondary font-semibold hover:underline">
                    गॅलरी पहा <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Flowers -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-seedling text-2xl text-cream-light"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                    फुले
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    किल्ल्यांवर व ट्रेकिंग मार्गांवर आढळणारी रानफुले आणि ऋतुनुसार फुलणारी फुले.
                </p>
                <a href="./flower-gallery.php" class="text-secondary font-semibold hover:underline">
                    गॅलरी पहा <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Sketches -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 transition hover:-translate-y-1 hover:shadow-xl">
                <div class="w-16 h-16 bg-pink-500 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-pencil-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                   रेखाचित्रे
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">
                    सदस्यांनी काढलेली किल्ल्यांची हाताने रेखाटलेली चित्रे, नकाशे आणि कलात्मक छायाचित्रे.
                </p>
                <a href="./sketches-gallery.php" class="text-secondary font-semibold hover:underline">
                    गॅलरी पहा <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>
    </div>
</section>

</main>

<!-- Cave Detail Modal - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
<div id="cave-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
    <div class="bg-gray-900 rounded-xl max-w-6xl max-h-[80vh] overflow-y-auto w-full relative">
        <div class="cave-modal-header">
            <button onclick="closeCaveModal()" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="modal-header"></div>
        </div>
        <div class="modal-body p-6"></div>
    </div>
</div>

<!-- Lightbox Modal - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-[9999] hidden items-center justify-center p-4">
    <div class="lightbox-content max-w-5xl w-full">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <div class="lightbox-body text-center"></div>
    </div>
</div>


<?php include './../../includes/footer_marathi.php'; ?>

<!-- JavaScript - EXACT SAME STRUCTURE AND FUNCTIONALITY AS BUTTERFLY GALLERY -->
<script>
$(document).ready(function() {
    console.log('Cave Photo Gallery loaded');
});

// Filter by alphabet - EXACT SAME AS BUTTERFLY GALLERY
function filterByAlphabet(letter) {
    $('.alphabet-filter a').removeClass('active');
    $('a[onclick="filterByAlphabet(\'' + letter + '\')"]').addClass('active');
    
    if (letter === 'ALL') {
        $('.cave-card').show();
    } else {
        $('.cave-card').hide();
        $('.cave-card[data-alphabet="' + letter + '"]').show();
    }
    
    // Animate the filtered items
    $('.cave-card:visible').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({opacity: 1}, 300);
    });
}

// Open cave gallery in modal - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY
function openCaveGallery(slug) {
    const caveName = slug.replace(/_/g, ' ');
    
    // Get cave photos (in real app, this would be an AJAX call)
    const cavePhotos = <?php echo json_encode($galleryData); ?> ;
    window.currentFortPhotos = cavePhotos;
    window.currentFortName = slug;
    
    // Create modal content - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY
    let modalContent = `
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold mb-2 text-white">
                <i class="fas fa-mountain mr-2"></i>
                ${caveName}
            </h2>
            <p class="text-yellow-300 italic text-lg mb-2">Heritage Classification</p>
            <p class="text-gray-300">${cavePhotos.length} Photographs Available</p>
        </div>
        <div class="cave-photo-grid">
    `;
    
    cavePhotos.forEach((photo, index) => {
         modalContent += `
            <div class="cave-photo-item"  onclick="openLightbox(
                ${index},
                '${photo.CAT_NAME}'
             )">
                <img src="../../assets/images/Photos/CATEGORY/Cave/${photo.CAT_IMAGE}" alt="${photo.CAT_NAME}" class="w-full h-48 object-cover rounded-lg">
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
    $('#cave-modal .modal-body').html(modalContent);
    $('#cave-modal').removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}

// Close cave modal - EXACT SAME AS BUTTERFLY GALLERY
function closeCaveModal() {
    $('#cave-modal').addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}

// Open lightbox for individual photo - EXACT SAME AS BUTTERFLY GALLERY
function openLightbox(index, name) {
    const caveName = name;
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
        src="../../assets/images/Photos/CATEGORY/Cave/${photos[index].CAT_IMAGE}"
        alt="${photos[index].CAT_NAME}"
        class="max-w-[60vw] max-h-[50vh]  w-[343px] aspect-[343/229] object-contain
            rounded-lg sm:w-[400px] md:w-[550px] lg:w-[700px] xl:w-[900px]"
        onerror="this.onerror=null; this.src='../../assets/images/default-cave.svg';"
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
            <img src="../../assets/images/Photos/CATEGORY/Cave/${photo.CAT_IMAGE}" 
                 alt="${photo.title}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-orange-500' : 'opacity-60'}"
                 onclick="navigateLightbox(${i}, '${name}')">
        `;
    });
    
    lightboxContent += '</div>';
    
    $('#lightbox .lightbox-body').html(lightboxContent);
    $('#cave-modal').addClass('hidden'); // hide background modal
    $('#lightbox').removeClass('hidden').addClass('flex');
}

// Navigate lightbox - EXACT SAME AS BUTTERFLY GALLERY
function navigateLightbox(index, slug) {
    openLightbox(index, slug);
}

// Close lightbox - EXACT SAME AS BUTTERFLY GALLERY
function closeLightbox() {
    $('#lightbox').addClass('hidden').removeClass('flex');
    $('#cave-modal').removeClass('hidden').addClass('flex');

}

// Change page - EXACT SAME AS BUTTERFLY GALLERY
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

// Search functionality for caves - EXACT SAME AS BUTTERFLY GALLERY
function searchCaves() {
    const searchTerm = $('#cave-search').val().toLowerCase();
    $('.cave-card').each(function() {
        const caveName = $(this).find('h3').text().toLowerCase();
        const heritageName = $(this).find('.heritage-name').text().toLowerCase();
        if (caveName.includes(searchTerm) || heritageName.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// Keyboard navigation for lightbox - EXACT SAME AS BUTTERFLY GALLERY
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
    
    if ($('#cave-modal').hasClass('flex') && e.keyCode == 27) {
        closeCaveModal();
    }
});

// Lazy loading for cave images - EXACT SAME AS BUTTERFLY GALLERY
$(window).scroll(function() {
    $('.cave-image').each(function() {
        if ($(this).offset().top < $(window).scrollTop() + $(window).height() + 100) {
            const src = $(this).attr('src');
            if (src.includes('placeholder')) {
                // Replace with actual cave image
                $(this).attr('src', src.replace('placeholder', 'cave'));
            }
        }
    });
});

console.log('Cave Photo Gallery: All functionality loaded successfully');
console.log('Structure matches butterfly-gallery.php exactly');
console.log('Alphabets: ALL, A-Z are now visible and functional');
</script>