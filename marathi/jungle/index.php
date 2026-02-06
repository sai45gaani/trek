<?php
// Get slug
if (!isset($_GET['slug'])) {
    header('Location: /marathi/jungle_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$jungleName = ucwords(str_replace('-', ' ', $slug));

require_once '../../../config/database.php';
include '../../../includes/header_marathi.php';

$db = new Database();
$conn = $db->getConnection();

// Fetch jungle
$stmt = $conn->prepare("SELECT * FROM mi_tbljungleinfo_unicode WHERE JungleName LIKE ? LIMIT 1");
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
            ← जंगल यादीकडे परत
        </a>

        <h1 class="text-5xl font-bold mt-6">
            <?php echo htmlspecialchars($jungle['JungleNameMar']); ?>
        </h1>

        <p class="mt-3 text-lg opacity-90">
            <?php echo htmlspecialchars($jungle['DistrictMar'] . ', ' . $jungle['StateMar']); ?>
        </p>
    </div>
</section>

<!-- Hero Image -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img
            src="../../assets/images/Photos/Jungle/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($jungle['JungleNameMar']); ?>"
            class="rounded-2xl shadow-xl w-full max-h-[500px] object-cover"
        >
    </div>
</section>
<?php endif; ?>

<!-- Content -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 max-w-5xl">

        <!-- Introduction -->
        <?php if (!empty($jungle['IntroductionMar'])): ?>
        <h2 class="section-title">प्रस्तावना</h2>
        <p class="section-text"><?php echo $jungle['IntroductionMar']; ?></p>
        <?php endif; ?>

        <!-- History -->
        <?php if (!empty($jungle['HistoryMar'])): ?>
        <h2 class="section-title">इतिहास</h2>
        <p class="section-text"><?php echo nl2br($jungle['HistoryMar']); ?></p>
        <?php endif; ?>

        <!-- Safari -->
        <h2 class="section-title">सफारी माहिती</h2>
        <ul class="list-disc ml-6 text-gray-700 dark:text-gray-300">
            <li><strong>वेळा:</strong> <?php echo $jungle['SafariTimingsMar']; ?></li>
            <li><strong>भेट देण्याचा काळ:</strong> <?php echo $jungle['BestSeasonToVisitMar']; ?></li>
        </ul>

        <!-- How to Reach -->
        <h2 class="section-title">कसे पोहोचावे</h2>
        <ul class="list-disc ml-6 text-gray-700 dark:text-gray-300">
            <li>जवळचे शहर: <?php echo $jungle['NearestCityMar']; ?></li>
            <li>रेल्वे स्थानक: <?php echo $jungle['NearestRailwayStationMar']; ?></li>
            <li>विमानतळ: <?php echo $jungle['NearestAirportMar']; ?></li>
        </ul>

        <!-- Wildlife -->
        <h2 class="section-title">वन्यजीवन</h2>
        <p><strong>प्राणी:</strong> <?php echo $jungle['AnimalsMar']; ?></p>
        <p><strong>पक्षी:</strong> <?php echo $jungle['BirdsMar']; ?></p>
        <p><strong>वनस्पती:</strong> <?php echo $jungle['TreesMar']; ?></p>

        <!-- Interesting Facts -->
        <?php if (!empty($jungle['InterestingFactsMar'])): ?>
        <h2 class="section-title">रोचक माहिती</h2>
        <p class="section-text"><?php echo nl2br($jungle['InterestingFactsMar']); ?></p>
        <?php endif; ?>

        <!-- Conservation -->
        <?php if (!empty($jungle['ConservationInfoMar'])): ?>
        <h2 class="section-title">संवर्धन माहिती</h2>
        <p class="section-text"><?php echo nl2br($jungle['ConservationInfoMar']); ?></p>
        <?php endif; ?>

        <!-- Gallery -->
        <?php if (count($images) > 1): ?>
        <h2 class="section-title">छायाचित्र संग्रह</h2>
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

<?php include '../../../includes/footer_marathi.php'; ?>