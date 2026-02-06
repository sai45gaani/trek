<?php
// SEO
$page_title = 'Historical Weapons of India | Trekshitz';
$meta_description = 'Detailed information about historical weapons of India including type, era, technology and usage.';
$meta_keywords = 'historical weapons, indian weapons, ancient weapons, medieval weapons';

require_once './config/database.php';
include './includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch weapons with front image
$query = "
    SELECT w.*, p.PIC_NAME
    FROM ei_tblweaponinfo w
    LEFT JOIN pm_tblweaponphotos p
        ON w.WeaponName = p.WeaponName
        AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY w.WeaponName ASC
";
$result = $conn->query($query);

$weapons = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $weapons[] = $row;
    }
}

// Slug helper
function weaponSlug($name) {
    return strtolower(str_replace(' ', '-', trim($name)));
}
?>

<main id="main-content">

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-slate-800 to-gray-700 text-white overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Historical <span class="text-accent">Weapons</span>
        </h1>

        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
            Explore ancient and medieval weapons that shaped Indian warfare and history
        </p>

    </div>
</section>

<!-- WEAPON LISTING -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4">

<?php if (count($weapons) > 0): ?>

<!-- GRID -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 items-stretch">

<?php foreach ($weapons as $weapon): ?>

<a href="./weapon/index.php?slug=<?php echo weaponSlug($weapon['WeaponName']); ?>"
   class="group h-full">

<article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col">

    <!-- IMAGE -->
    <div class="relative h-60 bg-gray-200 overflow-hidden">
        <img
            src="../assets/images/Photos/Weapon/<?php echo htmlspecialchars($weapon['PIC_NAME'] ?? 'default-weapon.jpg'); ?>"
            alt="<?php echo htmlspecialchars($weapon['WeaponName']); ?>"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >
    </div>

    <!-- CONTENT -->
    <div class="p-6 flex flex-col flex-1">

        <!-- TEXT CONTENT -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 leading-snug">
                <?php echo htmlspecialchars($weapon['WeaponName']); ?>
            </h3>

            <?php if (!empty($weapon['WeaponType'])): ?>
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                <strong>Type:</strong> <?php echo htmlspecialchars($weapon['WeaponType']); ?>
            </p>
            <?php endif; ?>

            <?php if (!empty($weapon['WeaponEra'])): ?>
            <p class="text-sm text-gray-600 dark:text-gray-300">
                <strong>Era:</strong> <?php echo htmlspecialchars($weapon['WeaponEra']); ?>
            </p>
            <?php endif; ?>
        </div>

        <!-- CTA (ALWAYS BOTTOM) -->
        <div class="mt-auto pt-6">
            <span class="block w-full text-center bg-primary hover:bg-secondary text-white py-2.5 rounded-lg font-semibold transition-colors">
                View Details
            </span>
        </div>

    </div>

</article>
</a>

<?php endforeach; ?>

</div>

<?php else: ?>

<p class="text-center text-gray-600 dark:text-gray-300 text-lg">
    Weapon information is currently unavailable.
</p>

<?php endif; ?>

</div>
</section>

</main>

<?php include './includes/footer.php'; ?>