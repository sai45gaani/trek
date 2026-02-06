<?php
// SEO
$page_title = 'Historical Weapons of India | Trekshitz';
$meta_description = 'Detailed information about historical weapons of India including type, era, technology and usage.';
$meta_keywords = 'historical weapons, indian weapons, ancient weapons, medieval weapons';

require_once './../config/database.php';
include './../includes/header_english.php';

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

<!-- Hero -->
<section class="relative py-20 bg-gradient-to-r from-slate-800 to-gray-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">
            Historical <span class="text-accent">Weapons</span>
        </h1>
        <p class="text-xl opacity-90">
            Explore ancient and medieval weapons used in Indian history
        </p>
    </div>
</section>

<!-- Weapon Cards -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">

        <?php if (count($weapons) > 0): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($weapons as $weapon): ?>
                <a href="./weapon/index.php?slug=<?php echo weaponSlug($weapon['WeaponName']); ?>"
                   class="block group">

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:-translate-y-1 transition-all">

                        <!-- Image -->
                        <div class="h-56 overflow-hidden bg-gray-200">
                            <img
                                src="../assets/images/Photos/Weapon/<?php echo htmlspecialchars($weapon['PIC_NAME'] ?? 'default-weapon.jpg'); ?>"
                                alt="<?php echo htmlspecialchars($weapon['WeaponName']); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                                <?php echo htmlspecialchars($weapon['WeaponName']); ?>
                            </h3>

                            <?php if (!empty($weapon['WeaponType'])): ?>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                                <strong>Type:</strong> <?php echo htmlspecialchars($weapon['WeaponType']); ?>
                            </p>
                            <?php endif; ?>

                            <?php if (!empty($weapon['WeaponEra'])): ?>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                                <strong>Era:</strong> <?php echo htmlspecialchars($weapon['WeaponEra']); ?>
                            </p>
                            <?php endif; ?>

                            <span class="inline-flex items-center justify-center w-full bg-primary hover:bg-secondary text-white py-2 rounded-lg font-semibold">
                                View Details
                            </span>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>

        </div>
        <?php else: ?>
            <p class="text-center text-gray-600 dark:text-gray-300">
                Weapon information is currently unavailable.
            </p>
        <?php endif; ?>

    </div>
</section>

</main>

<?php include './../includes/footer_english.php'; ?>