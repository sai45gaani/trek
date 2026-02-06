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

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-slate-800 to-gray-700 text-white">
    <div class="container mx-auto px-6">

        <a href="../weapon_information.php"
           class="inline-flex items-center text-white/90 hover:text-white mb-6">
            <i class="fas fa-arrow-left mr-2"></i>
            शस्त्र यादीकडे परत
        </a>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php echo htmlspecialchars($weapon['WeaponNameMar']); ?>
        </h1>

        <div class="flex flex-wrap gap-3">
            <?php if (!empty($weapon['WeaponTypeMar'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($weapon['WeaponTypeMar']); ?>
            </span>
            <?php endif; ?>

            <?php if (!empty($weapon['WeaponEraMar'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($weapon['WeaponEraMar']); ?>
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
            src="../../assets/images/Photos/Weapon/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($weapon['WeaponNameMar']); ?>"
            class="rounded-2xl shadow-2xl w-full max-h-[520px] object-cover"
        >
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-14">

<!-- प्रस्तावना -->
<?php if (!empty($weapon['Introduction'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        प्रस्तावना
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['Introduction']); ?>
    </div>
</div>
<?php endif; ?>

<!-- इतिहास -->
<?php if (!empty($weapon['History'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        इतिहास
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['History']); ?>
    </div>
</div>
<?php endif; ?>

<!-- तंत्रज्ञान (Highlight card) -->
<?php if (!empty($weapon['TechnologyMar'])): ?>
<div class="bg-amber-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-accent">
    <h2 class="text-2xl font-bold mb-4">तंत्रज्ञान</h2>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
        <?php echo nl2br($weapon['TechnologyMar']); ?>
    </p>
</div>
<?php endif; ?>

<!-- तांत्रिक माहिती -->
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        तांत्रिक माहिती
    </h2>

    <div class="grid md:grid-cols-2 gap-6">
        <?php if (!empty($weapon['MaterialsUsedMar'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>साहित्य:</strong><br>
            <?php echo htmlspecialchars($weapon['MaterialsUsedMar']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($weapon['Weight'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>वजन:</strong><br>
            <?php echo htmlspecialchars($weapon['Weight']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($weapon['RangeCapacity'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>पल्ला:</strong><br>
            <?php echo htmlspecialchars($weapon['RangeCapacity']); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($weapon['FiringMechanismMar'])): ?>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
            <strong>कार्यपद्धती:</strong><br>
            <?php echo htmlspecialchars($weapon['FiringMechanismMar']); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- भारतातील वापर -->
<?php if (!empty($weapon['NotableUsageInIndia'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        भारतातील वापर
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['NotableUsageInIndia']); ?>
    </div>
</div>
<?php endif; ?>

<!-- फायदे -->
<?php if (!empty($weapon['Advantages'])): ?>
<div class="bg-green-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-green-600">
    <h2 class="text-2xl font-bold mb-4">फायदे</h2>
    <p><?php echo nl2br($weapon['Advantages']); ?></p>
</div>
<?php endif; ?>

<!-- मर्यादा -->
<?php if (!empty($weapon['Limitations'])): ?>
<div class="bg-red-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-red-600">
    <h2 class="text-2xl font-bold mb-4">मर्यादा</h2>
    <p><?php echo nl2br($weapon['Limitations']); ?></p>
</div>
<?php endif; ?>

<!-- टीपा -->
<?php if (!empty($weapon['Notes'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        टीपा
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['Notes']); ?>
    </div>
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
        <div class="aspect-square rounded-xl overflow-hidden shadow hover:shadow-xl transition">
            <img
                src="../../assets/images/Photos/Weapon/<?php echo htmlspecialchars($img['PIC_NAME']); ?>"
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

<?php include '../../includes/footer_marathi.php'; ?>