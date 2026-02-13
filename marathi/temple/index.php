<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: ./../temple_information.php');
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
if (strtoupper($img['PIC_FRONT_IMAGE']) === 'Y') {
    $frontImage = $img;
    break;
}
}
?>

<main id="main-content">

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-orange-800 to-red-700 text-white">
    <div class="container mx-auto px-6">

        <a href="../temple_information.php"
           class="inline-flex items-center text-white/90 hover:text-white mb-6">
            <i class="fas fa-arrow-left mr-2"></i>
            मंदिर यादीकडे परत
        </a>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php echo htmlspecialchars($temple['TempleNameMar']); ?>
        </h1>

        <div class="flex flex-wrap gap-3">
            <?php if (!empty($temple['DistrictMar'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($temple['DistrictMar']); ?>
            </span>
            <?php endif; ?>

            <?php if (!empty($temple['MainDeityMar'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($temple['MainDeityMar']); ?>
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
            src="../../assets/images/Photos/Temple/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            class="rounded-2xl shadow-2xl w-full md:w-3/5 max-h-[520px] object-cover"
            alt="<?php echo htmlspecialchars($frontImage['PIC_DESC'] ?? 'Temple Image'); ?>"
            loading="lazy"
        >
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-14">

<!-- प्रस्तावना -->
<?php if (!empty($temple['Introduction'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        प्रस्तावना
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['Introduction']); ?>
    </div>
</div>
<?php endif; ?>

<!-- महत्त्व (Highlight card) -->
<?php if (!empty($temple['ImportanceMar'])): ?>
<div class="bg-amber-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-accent">
    <h2 class="text-2xl font-bold mb-4">महत्त्व</h2>
    <p><?php echo nl2br($temple['ImportanceMar']); ?></p>
</div>
<?php endif; ?>

<!-- इतिहास -->
<?php if (!empty($temple['History'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        इतिहास
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['History']); ?>
    </div>
</div>
<?php endif; ?>

<!-- स्थापत्य -->
<?php if (!empty($temple['Architecture'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        स्थापत्यशास्त्र
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['Architecture']); ?>
    </div>
</div>
<?php endif; ?>

<!-- कसे पोहोचावे -->
<?php if (!empty($temple['HowToReachMar'])): ?>
<div class="bg-green-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-green-600">
    <h2 class="text-2xl font-bold mb-4">कसे पोहोचावे</h2>
    <p><?php echo nl2br($temple['HowToReachMar']); ?></p>
</div>
<?php endif; ?>

<!-- ट्रेकिंग मार्ग -->
<?php if (!empty($temple['TrekkingRoutesMar'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        ट्रेकिंग मार्ग
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($temple['TrekkingRoutesMar']); ?>
    </div>
</div>
<?php endif; ?>

<!-- भेट देण्याचा उत्तम काळ -->
<?php if (!empty($temple['BestSeasonToVisitMar'])): ?>
<div class="bg-blue-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-blue-600">
    <h2 class="text-2xl font-bold mb-4">भेट देण्याचा उत्तम काळ</h2>
    <p><?php echo htmlspecialchars($temple['BestSeasonToVisitMar']); ?></p>
</div>
<?php endif; ?>

<!-- टीपा -->
<?php if (!empty($temple['NotesMar'])): ?>
<div class="bg-gray-100 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-gray-500">
    <h2 class="text-2xl font-bold mb-4">टीपा</h2>
    <p><?php echo nl2br($temple['NotesMar']); ?></p>
</div>
<?php endif; ?>

<!-- GALLERY -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        छायाचित्र संग्रह
    </h2>

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