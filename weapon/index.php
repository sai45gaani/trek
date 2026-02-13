<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: ./weapon_information.php');
    exit;
}

$slug = trim($_GET['slug']);
$weaponName = ucwords(str_replace('-', ' ', $slug));

require_once '../config/database.php';
include '../includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch weapon
$stmt = $conn->prepare(
    "SELECT * FROM ei_tblweaponinfo
     WHERE WeaponName LIKE ?
     LIMIT 1"
);
$search = "%$weaponName%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="text-center py-20">Weapon not found</div>';
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
if (strtoupper($img['PIC_FRONT_IMAGE']) === 'Y') {
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
            Back to Weapons List
        </a>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            <?php echo htmlspecialchars($weapon['WeaponName']); ?>
        </h1>

        <div class="flex flex-wrap gap-3">
            <?php if (!empty($weapon['WeaponType'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($weapon['WeaponType']); ?>
            </span>
            <?php endif; ?>

            <?php if (!empty($weapon['WeaponEra'])): ?>
            <span class="px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-semibold">
                <?php echo htmlspecialchars($weapon['WeaponEra']); ?>
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
            src="../assets/images/Photos/weapon/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            class="rounded-2xl shadow-2xl w-full md:w-3/5 max-h-[520px] object-cover"
            alt="<?php echo htmlspecialchars($frontImage['PIC_DESC'] ?? 'Weapon Image'); ?>"
            loading="lazy"
        >
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4 max-w-5xl space-y-14">

<!-- INTRODUCTION -->
<?php if (!empty($weapon['Introduction'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        Introduction
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['Introduction']); ?>
    </div>
</div>
<?php endif; ?>

<!-- HISTORY -->
<?php if (!empty($weapon['History'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        Historical Background
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['History']); ?>
    </div>
</div>
<?php endif; ?>

<!-- TECHNOLOGY (HIGHLIGHT CARD) -->
<?php if (!empty($weapon['Technology'])): ?>
<div class="bg-blue-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-blue-600">
    <h2 class="text-2xl font-bold mb-4">Technology</h2>
    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
        <?php echo nl2br($weapon['Technology']); ?>
    </p>
</div>
<?php endif; ?>

<!-- TECHNICAL DETAILS -->
<div class="grid md:grid-cols-2 gap-6">

<?php if (!empty($weapon['MaterialsUsed'])): ?>
<div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
    <strong>Materials Used:</strong><br>
    <?php echo htmlspecialchars($weapon['MaterialsUsed']); ?>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Weight'])): ?>
<div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
    <strong>Weight:</strong><br>
    <?php echo htmlspecialchars($weapon['Weight']); ?>
</div>
<?php endif; ?>

<?php if (!empty($weapon['RangeCapacity'])): ?>
<div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
    <strong>Range / Capacity:</strong><br>
    <?php echo htmlspecialchars($weapon['RangeCapacity']); ?>
</div>
<?php endif; ?>

<?php if (!empty($weapon['FiringMechanism'])): ?>
<div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow border">
    <strong>Firing Mechanism:</strong><br>
    <?php echo htmlspecialchars($weapon['FiringMechanism']); ?>
</div>
<?php endif; ?>

</div>

<!-- USAGE -->
<?php if (!empty($weapon['NotableUsageInIndia'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        Usage in India
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['NotableUsageInIndia']); ?>
    </div>
</div>
<?php endif; ?>

<!-- BATTLES -->
<?php if (!empty($weapon['RelatedBattles'])): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        Related Battles
    </h2>
    <div class="prose prose-lg dark:prose-invert max-w-none">
        <?php echo nl2br($weapon['RelatedBattles']); ?>
    </div>
</div>
<?php endif; ?>

<!-- ADVANTAGES -->
<?php if (!empty($weapon['Advantages'])): ?>
<div class="bg-green-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-green-600">
    <h2 class="text-2xl font-bold mb-4">Advantages</h2>
    <p><?php echo nl2br($weapon['Advantages']); ?></p>
</div>
<?php endif; ?>

<!-- LIMITATIONS -->
<?php if (!empty($weapon['Limitations'])): ?>
<div class="bg-red-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-red-600">
    <h2 class="text-2xl font-bold mb-4">Limitations</h2>
    <p><?php echo nl2br($weapon['Limitations']); ?></p>
</div>
<?php endif; ?>

<!-- NOTES -->
<?php if (!empty($weapon['Notes'])): ?>
<div class="bg-yellow-50 dark:bg-gray-800 rounded-2xl p-8 border-l-4 border-yellow-600">
    <h2 class="text-2xl font-bold mb-4">Notes</h2>
    <p><?php echo nl2br($weapon['Notes']); ?></p>
</div>
<?php endif; ?>

<!-- GALLERY -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="text-3xl font-bold mb-6 flex items-center">
        <span class="w-1 h-8 bg-accent mr-4"></span>
        Photo Gallery
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

<?php include '../includes/footer.php'; ?>