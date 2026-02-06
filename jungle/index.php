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

$db = new Database();
$conn = $db->getConnection();

// Fetch jungle
$stmt = $conn->prepare("SELECT * FROM ei_tbljungleinfo WHERE JungleName LIKE ? LIMIT 1");
$search = "%$jungleName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Jungle not found";
    exit;
}

$jungle = $result->fetch_assoc();

// Fetch images
$imgStmt = $conn->prepare("SELECT * FROM pm_tbljunglephotos WHERE JungleName = ?");
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

<!-- Hero -->
<section class="relative py-24 bg-gradient-to-r from-green-900 to-emerald-700 text-white">
    <div class="container mx-auto px-6">
        <a href="../jungle_information.php" class="text-white opacity-90 hover:opacity-100">
            ← Back to Jungle List
        </a>

        <h1 class="text-5xl font-bold mt-6">
            <?php echo htmlspecialchars($jungle['JungleName']); ?>
        </h1>

        <p class="mt-3 text-lg opacity-90">
            <?php echo htmlspecialchars($jungle['District'] . ', ' . $jungle['State']); ?>
        </p>
    </div>
</section>

<!-- Hero Image -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img
            src="../../assets/images/Photos/Jungle/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($jungle['JungleName']); ?>"
            class="rounded-2xl shadow-xl w-full max-h-[500px] object-cover"
        >
    </div>
</section>
<?php endif; ?>

<!-- Content -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 max-w-5xl">

        <?php if (!empty($jungle['Introduction'])): ?>
        <h2 class="section-title">Introduction</h2>
        <p class="section-text"><?php echo $jungle['Introduction']; ?></p>
        <?php endif; ?>

        <?php if (!empty($jungle['History'])): ?>
        <h2 class="section-title">History</h2>
        <p class="section-text"><?php echo nl2br($jungle['History']); ?></p>
        <?php endif; ?>

        <h2 class="section-title">Safari Information</h2>
        <ul class="list-disc ml-6">
            <li><strong>Timings:</strong> <?php echo $jungle['SafariTimings']; ?></li>
            <li><strong>Best Season:</strong> <?php echo $jungle['BestSeasonToVisit']; ?></li>
        </ul>

        <h2 class="section-title">How to Reach</h2>
        <ul class="list-disc ml-6">
            <li>Nearest City: <?php echo $jungle['NearestCity']; ?></li>
            <li>Railway Station: <?php echo $jungle['NearestRailwayStation']; ?></li>
            <li>Airport: <?php echo $jungle['NearestAirport']; ?></li>
        </ul>

        <h2 class="section-title">Wildlife</h2>
        <p><strong>Animals:</strong> <?php echo $jungle['Animals']; ?></p>
        <p><strong>Birds:</strong> <?php echo $jungle['Birds']; ?></p>
        <p><strong>Trees:</strong> <?php echo $jungle['Trees']; ?></p>

        <?php if (!empty($jungle['InterestingFacts'])): ?>
        <h2 class="section-title">Interesting Facts</h2>
        <p class="section-text"><?php echo nl2br($jungle['InterestingFacts']); ?></p>
        <?php endif; ?>

        <?php if (!empty($jungle['ConservationInfo'])): ?>
        <h2 class="section-title">Conservation Information</h2>
        <p class="section-text"><?php echo nl2br($jungle['ConservationInfo']); ?></p>
        <?php endif; ?>

        <?php if (count($images) > 1): ?>
        <h2 class="section-title">Photo Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($images as $img): ?>
                <img
                    src="../../assets/images/Photos/Jungle/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
                    class="rounded-xl shadow cursor-pointer hover:scale-105 transition"
                >
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>

</main>

<?php include '../includes/footer.php'; ?>