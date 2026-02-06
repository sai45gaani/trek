<?php
// Slug check
if (!isset($_GET['slug'])) {
    header('Location: /english/weapon_information.php');
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
            ← Back to Weapons List
        </a>

        <h1 class="text-5xl font-bold mt-6">
            <?php echo htmlspecialchars($weapon['WeaponName']); ?>
        </h1>

        <p class="mt-3 text-lg opacity-90">
            <?php echo htmlspecialchars($weapon['WeaponType'] . ' • ' . $weapon['WeaponEra']); ?>
        </p>
    </div>
</section>

<!-- Front Image -->
<?php if ($frontImage): ?>
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <img
            src="../../assets/images/Photos/Weapon/<?php echo htmlspecialchars($frontImage['PIC_NAME']); ?>"
            alt="<?php echo htmlspecialchars($weapon['WeaponName']); ?>"
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
    <h2 class="section-title">Introduction</h2>
    <p class="section-text"><?php echo nl2br($weapon['Introduction']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['History'])): ?>
<div>
    <h2 class="section-title">History</h2>
    <p class="section-text"><?php echo nl2br($weapon['History']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Technology'])): ?>
<div>
    <h2 class="section-title">Technology</h2>
    <p class="section-text"><?php echo nl2br($weapon['Technology']); ?></p>
</div>
<?php endif; ?>

<div class="grid md:grid-cols-2 gap-6">
    <?php if (!empty($weapon['MaterialsUsed'])): ?>
    <p><strong>Materials Used:</strong> <?php echo htmlspecialchars($weapon['MaterialsUsed']); ?></p>
    <?php endif; ?>

    <?php if (!empty($weapon['Weight'])): ?>
    <p><strong>Weight:</strong> <?php echo htmlspecialchars($weapon['Weight']); ?></p>
    <?php endif; ?>

    <?php if (!empty($weapon['RangeCapacity'])): ?>
    <p><strong>Range / Capacity:</strong> <?php echo htmlspecialchars($weapon['RangeCapacity']); ?></p>
    <?php endif; ?>

    <?php if (!empty($weapon['FiringMechanism'])): ?>
    <p><strong>Firing Mechanism:</strong> <?php echo htmlspecialchars($weapon['FiringMechanism']); ?></p>
    <?php endif; ?>
</div>

<?php if (!empty($weapon['NotableUsageInIndia'])): ?>
<div>
    <h2 class="section-title">Usage in India</h2>
    <p class="section-text"><?php echo nl2br($weapon['NotableUsageInIndia']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['RelatedBattles'])): ?>
<div>
    <h2 class="section-title">Related Battles</h2>
    <p class="section-text"><?php echo nl2br($weapon['RelatedBattles']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Advantages'])): ?>
<div>
    <h2 class="section-title">Advantages</h2>
    <p class="section-text"><?php echo nl2br($weapon['Advantages']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Limitations'])): ?>
<div>
    <h2 class="section-title">Limitations</h2>
    <p class="section-text"><?php echo nl2br($weapon['Limitations']); ?></p>
</div>
<?php endif; ?>

<?php if (!empty($weapon['Notes'])): ?>
<div>
    <h2 class="section-title">Notes</h2>
    <p class="section-text"><?php echo nl2br($weapon['Notes']); ?></p>
</div>
<?php endif; ?>

<!-- Gallery -->
<?php if (count($images) > 1): ?>
<div>
    <h2 class="section-title">Photo Gallery</h2>
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

<?php include '../includes/footer.php'; ?>