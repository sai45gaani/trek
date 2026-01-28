<?php
$page_title = 'Gallery | Trekshitiz';

require_once './../config/database.php';
include './../includes/header.php';

$db = new Database();
$conn = $db->getConnection();

/*
|--------------------------------------------------------------------------
| Fort Photos Count
|--------------------------------------------------------------------------
*/
$fortPhotoRes = $conn->query("
    SELECT COUNT(*) AS total
    FROM pm_tblphotos_clean
");
$fortPhotos = $fortPhotoRes->fetch_assoc()['total'] ?? 0;

/*
|--------------------------------------------------------------------------
| Fort Maps Count
|--------------------------------------------------------------------------
*/
$fortMapRes = $conn->query("
    SELECT COUNT(*) AS total
    FROM mm_tblmapinfo_clean
    WHERE MapPath IS NOT NULL
");
$fortMaps = $fortMapRes->fetch_assoc()['total'] ?? 0;

/*
|--------------------------------------------------------------------------
| Function to get category stats (Nature, Cave, Butterfly, Sketch)
|--------------------------------------------------------------------------
*/
function getCategoryCount($conn, $type)
{
    $stmt = $conn->prepare("
        SELECT COUNT(*) AS total
        FROM sw_tblcategories
        WHERE CAT_TYPE = ?
    ");
    $stmt->bind_param('s', $type);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    return $res['total'] ?? 0;
}

// Category-based galleries
$natureCount     = getCategoryCount($conn, 'Flower');
$caveCount       = getCategoryCount($conn, 'Cave');
$butterflyCount  = getCategoryCount($conn, 'Butterfly');
$sketchCount     = getCategoryCount($conn, 'Sketches');
?>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
  <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><rect x=\"6\" y=\"6\" width=\"8\" height=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"7\" y=\"4\" width=\"6\" height=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 mt-6 font-bilingual">
                   📸 Trekshitiz Gallery
                </h1>
              
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Historic fortresses captured during trekking adventures in Sahyadri mountains
                </p>
                
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 max-w-6xl">

       <!-- Heading -->
<!-- Story Section -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 tracking-wide text-gray-800 dark:text-white">
                Our Story
            </h1>

            <!-- Divider -->
            <div class="w-24 h-1 bg-accent mx-auto mb-10 rounded-full"></div>

            <!-- Content -->
            <div class="space-y-6 text-lg leading-relaxed text-gray-600 dark:text-gray-300">

                <p>
                    Trekshitiz has been documenting the rich heritage of Sahyadri for decades — 
                    from majestic hill forts and ancient cave complexes to diverse flora, wildlife, 
                    and artistic interpretations inspired by the mountains.
                </p>

                <p>
                    This gallery serves as a centralized visual archive showcasing thousands of 
                    photographs, detailed maps, hand-drawn sketches, and nature records collected 
                    during treks, explorations, research visits, and community contributions across 
                    Maharashtra and the Western Ghats.
                </p>

                <p>
                    Each gallery section represents a distinct domain of exploration — historic forts 
                    with strategic route maps, natural landscapes and flowers, butterflies and biodiversity, 
                    rock-cut caves, and artistic sketches that preserve the cultural and natural identity 
                    of the region.
                </p>

                <p class="font-semibold text-gray-700 dark:text-gray-200">
                    Explore the sections below to learn, discover, and visually experience the 
                    timeless legacy of Sahyadri with Trekshitiz.
                </p>

            </div>
        </div>
    </div>
</section>



        <!-- Gallery Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
            $galleries = [
                [
                    'title' => '🏰 Fort Photography',
                    'desc'  => 'Historic forts captured across treks and seasons.',
                    'count' => $fortPhotos,
                    'link'  => '/gallery/fort-photos.php'
                ],
                [
                    'title' => '🗺️ Fort Maps',
                    'desc'  => 'Route maps and navigation layouts of Sahyadri forts.',
                    'count' => $fortMaps,
                    'link'  => '/maps/map-gallery.php'
                ],
                [
                    'title' => '🌿 Nature',
                    'desc'  => 'Flora, landscapes, monsoon beauty, and wilderness.',
                    'count' => $natureCount,
                    'link'  => '/gallery/nature.php'
                ],
                [
                    'title' => '🦋 Butterflies',
                    'desc'  => 'Butterfly species documented across the Western Ghats.',
                    'count' => $butterflyCount,
                    'link'  => '/gallery/butterflies.php'
                ],
                [
                    'title' => '🕳️ Caves',
                    'desc'  => 'Ancient rock-cut caves and hidden cave systems.',
                    'count' => $caveCount,
                    'link'  => '/gallery/caves.php'
                ],
                [
                    'title' => '🎨 Sketches & Art',
                    'desc'  => 'Hand-drawn forts and artistic impressions.',
                    'count' => $sketchCount,
                    'link'  => '/gallery/sketches.php'
                ]
            ];

            foreach ($galleries as $g): ?>
    <div class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 
                shadow-sm hover:shadow-2xl transition-all duration-300 
                p-7 flex flex-col relative overflow-hidden mb-6">

        <!-- Accent strip -->
        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-primary to-accent"></div>

        <!-- Title -->
        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white group-hover:text-primary transition">
            <?= $g['title'] ?>
        </h3>

        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed flex-grow">
            <?= $g['desc'] ?>
        </p>

        <!-- Footer -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
            <span class="inline-flex items-center text-sm font-semibold text-green-600">
                <i class="fas fa-images mr-2 opacity-80"></i>
                <?= $g['count'] ?> items
            </span>

            <a href="<?= $g['link'] ?>"
               class="inline-flex items-center text-primary font-semibold hover:underline group-hover:translate-x-1 transition">
                Explore
                <span class="ml-1">→</span>
            </a>
        </div>
    </div>
<?php endforeach; ?>


        </div>
    </div>
</main>

<?php include './../includes/footer.php'; ?>
