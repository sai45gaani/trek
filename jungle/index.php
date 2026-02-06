<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: /english/jungle_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$jungleName = ucwords(str_replace('-', ' ', $slug));

require_once '../config/database.php';
include '../includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch jungle
$stmt = $conn->prepare(
    "SELECT * FROM ei_tbljungleinfo
     WHERE JungleName LIKE ?
     LIMIT 1"
);
$search = "%$jungleName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="text-center py-20">Jungle not found</div>';
    exit;
}

$jungle = $result->fetch_assoc();

// Fetch images
$imgStmt = $conn->prepare(
    "SELECT * FROM pm_tbljunglephotos
     WHERE JungleName = ?"
);
$imgStmt->bind_param("s", $jungle['JungleName']);
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

<main id="main-content">

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-green-900 to-emerald-700 text-white">
    <div class="container mx-auto px-6">

        <a href="../jungle_information.php"
           class="inline-flex items-center text-white/90 hover:text-white mb-6">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Jungle List
        </a>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php echo htmlspecialchars($jungle['JungleName']); ?>
        </h1>

        <div class="flex flex-wrap gap-3">
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($jungle['District'] . ', ' . $jungle['State']); ?>
            </span>

            <?php if (!empty($jungle['BestSeasonToVisit'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                Best Season: <?php echo htmlspecialchars($jungle['BestSeasonToVisit']); ?>
            </span>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- FEATURE IMAGE -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img
            src="../../assets/images/Photos/Jungle/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($jungle['JungleName']); ?>"
            class="rounded-2xl shadow-2xl w-full max-h-[520px] object-cover"
        >
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-14">

<!-- INTRODUCTION -->
<?php if (!empty($jungle['Introduction'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        Introduction
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo $jungle['Introduction']; ?>
    </div>
</div>
<?php endif; ?>

<!-- HISTORY -->
<?php if (!empty($jungle['History'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        History
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($jungle['History']); ?>
    </div>
</div>
<?php endif; ?>

<!-- SAFARI INFO (HIGHLIGHT CARD) -->
<?php if (!empty($jungle['SafariTimings']) || !empty($jungle['BestSeasonToVisit'])): ?>
<div class="bg-emerald-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-emerald-600">
    <h2 class="text-2xl font-bold mb-4">Safari Information</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
        <?php if (!empty($jungle['SafariTimings'])): ?>
        <li><strong>Timings:</strong> <?php echo htmlspecialchars($jungle['SafariTimings']); ?></li>
        <?php endif; ?>
        <?php if (!empty($jungle['BestSeasonToVisit'])): ?>
        <li><strong>Best Season:</strong> <?php echo htmlspecialchars($jungle['BestSeasonToVisit']); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>

<!-- HOW TO REACH -->
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        How to Reach
    </h2>

    <div class="grid md:grid-cols-3 gap-6">
        <?php if (!empty($jungle['NearestCity'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>Nearest City</strong><br>
            <?php echo htmlspecialchars($jungle['NearestCity']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($jungle['NearestRailwayStation'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>Railway Station</strong><br>
            <?php echo htmlspecialchars($jungle['NearestRailwayStation']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($jungle['NearestAirport'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>Airport</strong><br>
            <?php echo htmlspecialchars($jungle['NearestAirport']); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- WILDLIFE -->
<?php if (!empty($jungle['Animals']) || !empty($jungle['Birds']) || !empty($jungle['Trees'])): ?>
<div class="bg-green-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-green-600">
    <h2 class="text-2xl font-bold mb-4">Wildlife & Flora</h2>
    <?php if (!empty($jungle['Animals'])): ?>
    <p><strong>Animals:</strong> <?php echo htmlspecialchars($jungle['Animals']); ?></p>
    <?php endif; ?>
    <?php if (!empty($jungle['Birds'])): ?>
    <p><strong>Birds:</strong> <?php echo htmlspecialchars($jungle['Birds']); ?></p>
    <?php endif; ?>
    <?php if (!empty($jungle['Trees'])): ?>
    <p><strong>Trees:</strong> <?php echo htmlspecialchars($jungle['Trees']); ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- INTERESTING FACTS -->
<?php if (!empty($jungle['InterestingFacts'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        Interesting Facts
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($jungle['InterestingFacts']); ?>
    </div>
</div>
<?php endif; ?>

<!-- CONSERVATION -->
<?php if (!empty($jungle['ConservationInfo'])): ?>
<div class="bg-yellow-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-yellow-600">
    <h2 class="text-2xl font-bold mb-4">Conservation Information</h2>
    <p><?php echo nl2br($jungle['ConservationInfo']); ?></p>
</div>
<?php endif; ?>

<!-- GALLERY -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        Photo Gallery
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($images as $img): ?>
        <div class="aspect-square rounded-xl overflow-hidden shadow hover:shadow-xl transition">
            <img
                src="../../assets/images/Photos/Jungle/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
                class="w-full h-full object-cover hover:scale-110 transition duration-300"
            >
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

</div>
</section>

</main>

<?php include '../includes/footer.php'; ?>