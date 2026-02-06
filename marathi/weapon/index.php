<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: /marathi/weapon_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$weaponName = ucwords(str_replace('-', ' ', $slug));

require_once '../../config/database.php';
include '../../includes/header_marathi.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch weapon
$stmt = $conn->prepare(
    "SELECT * FROM mi_tblweaponinfo_unicode 
     WHERE WeaponName LIKE ? 
     LIMIT 1"
);
$search = "%$weaponName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="text-center py-20">शस्त्र सापडले नाही</div>';
    exit;
}

$weapon = $result->fetch_assoc();

// Fetch photos
$imgStmt = $conn->prepare(
    "SELECT * FROM pm_tblweaponphotos 
     WHERE WeaponName = ?"
);
$imgStmt->bind_param("s", $weapon['WeaponName']);
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
<section class="relative py-24 bg-gradient-to-r from-slate-800 to-gray-700 text-white">
    <div class="container mx-auto px-6">
        <a href="../weapon_information.php"
           class="text-white opacity-90 hover:opacity-100">
            ← शस्त्र यादीकडे परत
        </a>

        <h1 class="text-5xl font-bold mt-6">
            <?php echo htmlspecialchars($weapon['WeaponNameMar']); ?>
        </h1>

        <p class="mt-3 text-lg opacity-90">
            <?php echo htmlspecialchars($weapon['WeaponTypeMar'] ?? ''); ?>
        </p>
    </div>
</section>

<!-- Front Image -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img
            src="../../assets/images/Photos/Weapon/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($weapon['WeaponNameMar']); ?>"
            class="rounded-2xl shadow-xl w-full max-h-[500px] object-cover"
        >
    </div>
</section>
<?php endif; ?>

<!-- Content -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-10">

<?php if (!empty($weapon['Introduction'])): ?>
<div>
    <h2 class="section-title">प्रस्तावना</h2>
    <p class="section-text"><?php echo nl2br($weapon['Introduction']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['History'])): ?>
<div>
    <h2 class="section-title">इतिहास</h2>
    <p class="section-text"><?php echo nl2br($weapon['History']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['TechnologyMar'])): ?>
<div>
    <h2 class="section-title">तंत्रज्ञान</h2>
    <p class="section-text"><?php echo nl2br($weapon['TechnologyMar']); ?></p>
</div>
<?php endif; ?>

<div>
    <h2 class="section-title">तांत्रिक माहिती</h2>
    <ul class="list-disc ml-6 text-gray-700 dark:text-gray-300">
        <?php if (!empty($weapon['MaterialsUsedMar'])): ?>
            <li><strong>साहित्य:</strong> <?php echo $weapon['MaterialsUsedMar']; ?></li>
        <?php endif; ?>
        <?php if (!empty($weapon['Weight'])): ?>
            <li><strong>वजन:</strong> <?php echo $weapon['Weight']; ?></li>
        <?php endif; ?>
        <?php if (!empty($weapon['RangeCapacity'])): ?>
            <li><strong>पल्ला:</strong> <?php echo $weapon['RangeCapacity']; ?></li>
        <?php endif; ?>
        <?php if (!empty($weapon['FiringMechanismMar'])): ?>
            <li><strong>कार्यपद्धती:</strong> <?php echo $weapon['FiringMechanismMar']; ?></li>
        <?php endif; ?>
    </ul>
</div>

<?php if (!empty($weapon['NotableUsageInIndia'])): ?>
<div>
    <h2 class="section-title">भारतातील वापर</h2>
    <p class="section-text"><?php echo nl2br($weapon['NotableUsageInIndia']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Advantages'])): ?>
<div>
    <h2 class="section-title">फायदे</h2>
    <p class="section-text"><?php echo nl2br($weapon['Advantages']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Limitations'])): ?>
<div>
    <h2 class="section-title">मर्यादा</h2>
    <p class="section-text"><?php echo nl2br($weapon['Limitations']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Notes'])): ?>
<div>
    <h2 class="section-title">टीपा</h2>
    <p class="section-text"><?php echo nl2br($weapon['Notes']); ?></p>
</div>
<?php endif; ?>

<!-- Gallery -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="section-title">छायाचित्र संग्रह</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($images as $img): ?>
            <img
                src="../../assets/images/Photos/Weapon/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
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