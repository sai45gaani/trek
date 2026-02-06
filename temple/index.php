<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: /english/temple_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$templeName = ucwords(str_replace('-', ' ', $slug));

require_once '../config/database.php';
include '../includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch temple
$stmt = $conn->prepare(
    "SELECT * FROM ei_tbltempleinfo 
     WHERE TempleName LIKE ? 
     LIMIT 1"
);
$search = "%$templeName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="text-center py-20">Temple not found</div>';
    exit;
}

$temple = $result->fetch_assoc();

// Fetch photos
$imgStmt = $conn->prepare(
    "SELECT * FROM pm_tbltemplephotos 
     WHERE TempleName = ?"
);
$imgStmt->bind_param("s", $temple['TempleName']);
$imgStmt->execute();
$images = $imgStmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Front image
$frontImage = null;
foreach ($images as $img) {
    if ($img['PIC_FRONT_IMAGE'] === 'y') {
        $frontImage = $img;
        break;
    }
}
?>

<style>

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
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
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
    color: #60a5fa;
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
    background: #1e3a8a;
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: bold;
}

.alphabet-filter a:hover,
.alphabet-filter a.active {
    background: #60a5fa;
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
    background: #1e3a8a;
    color: white;
}

.pagination a:hover {
    background: #60a5fa;
}

.pagination .current {
    background: #60a5fa;
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
    background: #1e3a8a;
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

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-orange-700 to-red-700 text-white">
    <div class="container mx-auto px-6">

        <a href="../temple_information.php" class="inline-flex items-center text-white/90 hover:text-white mb-6">
            <i class="fas fa-arrow-left mr-2"></i> Back to Temple List
        </a>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php echo htmlspecialchars($temple['TempleName']); ?>
        </h1>

        <div class="flex flex-wrap gap-3">
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <i class="fas fa-map-marker-alt mr-2"></i>
                <?php echo htmlspecialchars($temple['District']); ?>
            </span>

            <?php if (!empty($temple['BestSeasonToVisit'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <i class="fas fa-calendar-alt mr-2"></i>
                <?php echo htmlspecialchars($temple['BestSeasonToVisit']); ?>
            </span>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- FEATURE IMAGE -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img src="../../assets/images/Photos/Temple/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
             class="rounded-2xl shadow-2xl w-full max-h-[520px] object-cover">
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-14">

<!-- INTRODUCTION (FLOWING) -->
<?php if (!empty($temple['Introduction'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-orange-600 mr-4"></span>
        Introduction
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['Introduction']); ?>
    </div>
</div>
<?php endif; ?>

<!-- IMPORTANCE (CARD – HIGHLIGHT) -->
<?php if (!empty($temple['Importance'])): ?>
<div class="bg-orange-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-orange-600">
    <h2 class="text-2xl font-bold mb-4 flex items-center">
        <i class="fas fa-om text-orange-600 mr-3"></i>
        Religious Importance
    </h2>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
        <?php echo nl2br($temple['Importance']); ?>
    </p>
</div>
<?php endif; ?>

<!-- HISTORY (FLOWING) -->
<?php if (!empty($temple['History'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-orange-600 mr-4"></span>
        History
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['History']); ?>
    </div>
</div>
<?php endif; ?>

<!-- ARCHITECTURE (FLOWING) -->
<?php if (!empty($temple['Architecture'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-orange-600 mr-4"></span>
        Architecture
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['Architecture']); ?>
    </div>
</div>
<?php endif; ?>

<!-- HOW TO REACH (SOFT CARD) -->
<?php if (!empty($temple['HowToReach'])): ?>
<div class="bg-green-50 dark:bg-gray-800 rounded-2xl p-8">
    <h2 class="text-2xl font-bold mb-4 flex items-center">
        <i class="fas fa-route text-green-600 mr-3"></i>
        How to Reach
    </h2>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
        <?php echo nl2br($temple['HowToReach']); ?>
    </p>
</div>
<?php endif; ?>

<!-- TREKKING ROUTES (FLOWING) -->
<?php if (!empty($temple['TrekkingRoutes'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-orange-600 mr-4"></span>
        Trekking Routes
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['TrekkingRoutes']); ?>
    </div>
</div>
<?php endif; ?>

<!-- NOTES (CARD – CALLOUT) -->
<?php if (!empty($temple['Notes'])): ?>
<div class="bg-yellow-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-yellow-500">
    <h2 class="text-2xl font-bold mb-4 flex items-center">
        <i class="fas fa-clipboard text-yellow-600 mr-3"></i>
        Notes
    </h2>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
        <?php echo nl2br($temple['Notes']); ?>
    </p>
</div>
<?php endif; ?>

</div>
</section>

<!-- GALLERY -->
<?php if (count($images) > 1): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold mb-6 flex items-center">
            <i class="fas fa-images text-orange-600 mr-3"></i>
            Photo Gallery
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($images as $img): ?>
            <div class="aspect-square rounded-xl overflow-hidden shadow hover:shadow-xl transition">
                <img src="../../assets/images/Photos/Temple/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
                     class="w-full h-full object-cover hover:scale-110 transition duration-300">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- VISIT TIPS -->
<section class="py-12 bg-gradient-to-r from-orange-700 to-red-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8">Temple Visit Tips</h2>

        <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <div class="bg-white bg-opacity-10 p-6 rounded-xl">
                <i class="fas fa-praying-hands text-4xl mb-3"></i>
                <h3 class="font-bold">Maintain Silence</h3>
                <p class="text-sm opacity-90">Respect the spiritual environment</p>
            </div>

            <div class="bg-white bg-opacity-10 p-6 rounded-xl">
                <i class="fas fa-tshirt text-4xl mb-3"></i>
                <h3 class="font-bold">Dress Modestly</h3>
                <p class="text-sm opacity-90">Wear appropriate clothing</p>
            </div>

            <div class="bg-white bg-opacity-10 p-6 rounded-xl">
                <i class="fas fa-clock text-4xl mb-3"></i>
                <h3 class="font-bold">Check Timings</h3>
                <p class="text-sm opacity-90">Confirm darshan & aarti timings</p>
            </div>
        </div>
    </div>
</section>
</main>
<?php include '../includes/footer.php'; ?>