<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: ./../jungle_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$jungleName = ucwords(str_replace('-', ' ', $slug));

require_once '../../config/database.php';
include '../../includes/header_marathi.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch jungle
$stmt = $conn->prepare(
    "SELECT * FROM mi_tbljungleinfo_unicode
     WHERE JungleName LIKE ?
     LIMIT 1"
);
$search = "%$jungleName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="text-center py-20">जंगल सापडले नाही</div>';
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
if (strtoupper($img['PIC_FRONT_IMAGE']) === 'Y') {
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
            जंगल यादीकडे परत
        </a>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php echo htmlspecialchars($jungle['JungleNameMar']); ?>
        </h1>

        <div class="flex flex-wrap gap-3">
            <?php if (!empty($jungle['DistrictMar']) || !empty($jungle['StateMar'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($jungle['DistrictMar'] . ', ' . $jungle['StateMar']); ?>
            </span>
            <?php endif; ?>

            <?php if (!empty($jungle['BestSeasonToVisitMar'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                भेट देण्याचा काळ: <?php echo htmlspecialchars($jungle['BestSeasonToVisitMar']); ?>
            </span>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- FEATURE IMAGE -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 flex justify-center">
        <img
            src="../../assets/images/Photos/jungle/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            class="rounded-2xl shadow-2xl w-full md:w-3/5 max-h-[520px] object-cover"
            alt="<?php echo htmlspecialchars($frontImage['PIC_DESC'] ?? 'Jungle Image'); ?>"
            loading="lazy"
        >
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-14">

<!-- प्रस्तावना -->
<?php if (!empty($jungle['IntroductionMar'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        प्रस्तावना
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($jungle['IntroductionMar']); ?>
    </div>
</div>
<?php endif; ?>

<!-- इतिहास -->
<?php if (!empty($jungle['HistoryMar'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        इतिहास
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($jungle['HistoryMar']); ?>
    </div>
</div>
<?php endif; ?>

<!-- SAFARI INFO (HIGHLIGHT CARD) -->
<?php if (!empty($jungle['SafariTimingsMar']) || !empty($jungle['BestSeasonToVisitMar'])): ?>
<div class="bg-emerald-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-emerald-600">
    <h2 class="text-2xl font-bold mb-4">सफारी माहिती</h2>
    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
        <?php if (!empty($jungle['SafariTimingsMar'])): ?>
        <li><strong>वेळा:</strong> <?php echo htmlspecialchars($jungle['SafariTimingsMar']); ?></li>
        <?php endif; ?>
        <?php if (!empty($jungle['BestSeasonToVisitMar'])): ?>
        <li><strong>भेट देण्याचा काळ:</strong> <?php echo htmlspecialchars($jungle['BestSeasonToVisitMar']); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>

<!-- HOW TO REACH -->
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        कसे पोहोचावे
    </h2>

    <div class="grid md:grid-cols-3 gap-6">
        <?php if (!empty($jungle['NearestCityMar'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>जवळचे शहर</strong><br>
            <?php echo htmlspecialchars($jungle['NearestCityMar']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($jungle['NearestRailwayStationMar'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>रेल्वे स्थानक</strong><br>
            <?php echo htmlspecialchars($jungle['NearestRailwayStationMar']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($jungle['NearestAirportMar'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>विमानतळ</strong><br>
            <?php echo htmlspecialchars($jungle['NearestAirportMar']); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- WILDLIFE -->
<?php if (!empty($jungle['AnimalsMar']) || !empty($jungle['BirdsMar']) || !empty($jungle['TreesMar'])): ?>
<div class="bg-green-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-green-600">
    <h2 class="text-2xl font-bold mb-4">वन्यजीवन व वनस्पती</h2>
    <?php if (!empty($jungle['AnimalsMar'])): ?>
    <p><strong>प्राणी:</strong> <?php echo htmlspecialchars($jungle['AnimalsMar']); ?></p>
    <?php endif; ?>
    <?php if (!empty($jungle['BirdsMar'])): ?>
    <p><strong>पक्षी:</strong> <?php echo htmlspecialchars($jungle['BirdsMar']); ?></p>
    <?php endif; ?>
    <?php if (!empty($jungle['TreesMar'])): ?>
    <p><strong>वनस्पती:</strong> <?php echo htmlspecialchars($jungle['TreesMar']); ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- INTERESTING FACTS -->
<?php if (!empty($jungle['InterestingFactsMar'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        रोचक माहिती
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($jungle['InterestingFactsMar']); ?>
    </div>
</div>
<?php endif; ?>

<!-- CONSERVATION -->
<?php if (!empty($jungle['ConservationInfoMar'])): ?>
<div class="bg-yellow-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-yellow-600">
    <h2 class="text-2xl font-bold mb-4">संवर्धन माहिती</h2>
    <p><?php echo nl2br($jungle['ConservationInfoMar']); ?></p>
</div>
<?php endif; ?>

<!-- GALLERY -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-green-600 mr-4"></span>
        छायाचित्र संग्रह
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($images as $img): ?>
            <img
                src="../../assets/images/Photos/Jungle/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
                class="rounded-xl shadow hover:scale-105 transition cursor-pointer"
            >
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

</div>
</section>

</main>

<?php include '../../includes/footer_marathi.php'; ?>