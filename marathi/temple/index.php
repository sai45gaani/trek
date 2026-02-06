<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: /marathi/temple_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$templeName = ucwords(str_replace('-', ' ', $slug));

require_once '../../config/database.php';
include '../../includes/header_marathi.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch temple
$stmt = $conn->prepare(
    "SELECT * FROM mi_tbltempleinfo_unicode 
     WHERE TempleName LIKE ? 
     LIMIT 1"
);
$search = "%$templeName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="text-center py-20">मंदिर सापडले नाही</div>';
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

<main id="main-content">

<!-- Hero -->
<section class="relative py-24 bg-gradient-to-r from-orange-800 to-red-700 text-white">
    <div class="container mx-auto px-6">
        <a href="../temple_information.php"
           class="text-white opacity-90 hover:opacity-100">
            ← मंदिर यादीकडे परत
        </a>

        <h1 class="text-5xl font-bold mt-6">
            <?php echo htmlspecialchars($temple['TempleNameMar']); ?>
        </h1>

        <p class="mt-3 text-lg opacity-90">
            <?php echo htmlspecialchars($temple['DistrictMar']); ?>
        </p>
    </div>
</section>

<!-- Front Image -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img
            src="../../assets/images/Photos/Temple/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($temple['TempleNameMar']); ?>"
            class="rounded-2xl shadow-xl w-full max-h-[500px] object-cover"
        >
    </div>
</section>
<?php endif; ?>

<!-- Content -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-10">

<?php if (!empty($temple['Introduction'])): ?>
<div>
    <h2 class="section-title">प्रस्तावना</h2>
    <p class="section-text"><?php echo nl2br($temple['Introduction']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['ImportanceMar'])): ?>
<div>
    <h2 class="section-title">महत्त्व</h2>
    <p class="section-text"><?php echo nl2br($temple['ImportanceMar']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['History'])): ?>
<div>
    <h2 class="section-title">इतिहास</h2>
    <p class="section-text"><?php echo nl2br($temple['History']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['Architecture'])): ?>
<div>
    <h2 class="section-title">स्थापत्यशास्त्र</h2>
    <p class="section-text"><?php echo nl2br($temple['Architecture']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['HowToReachMar'])): ?>
<div>
    <h2 class="section-title">कसे पोहोचावे</h2>
    <p class="section-text"><?php echo nl2br($temple['HowToReachMar']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['TrekkingRoutesMar'])): ?>
<div>
    <h2 class="section-title">ट्रेकिंग मार्ग</h2>
    <p class="section-text"><?php echo nl2br($temple['TrekkingRoutesMar']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['BestSeasonToVisitMar'])): ?>
<div>
    <h2 class="section-title">भेट देण्याचा उत्तम काळ</h2>
    <p class="section-text"><?php echo $temple['BestSeasonToVisitMar']; ?></p>
</div>
<?php endif; ?>

<?php if (!empty($temple['NotesMar'])): ?>
<div>
    <h2 class="section-title">टीपा</h2>
    <p class="section-text"><?php echo nl2br($temple['NotesMar']); ?></p>
</div>
<?php endif; ?>

<!-- Gallery -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="section-title">छायाचित्र संग्रह</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($images as $img): ?>
            <img
                src="../../assets/images/Photos/Temple/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
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