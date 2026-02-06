<?php
// SEO
$page_title = 'ऐतिहासिक शस्त्रे | Trekshitz';
$meta_description = 'भारत व महाराष्ट्रातील ऐतिहासिक शस्त्रांची माहिती – प्रकार, कालखंड, वापर व इतिहास.';
$meta_keywords = 'ऐतिहासिक शस्त्रे, मराठी शस्त्रे, युद्ध शस्त्रे, भारतीय शस्त्रे';

require_once './../config/database.php';
include './../includes/header_marathi.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch weapons with front image
$query = "
    SELECT w.*, p.PIC_NAME
    FROM mi_tblweaponinfo_unicode w
    LEFT JOIN pm_tblweaponphotos p
        ON w.WeaponName = p.WeaponName
        AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY w.WeaponNameMar ASC
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
<section class="relative py-24 bg-gradient-to-r from-slate-800 to-gray-700 text-white">
    <div class="container mx-auto px-6 text-center">

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            ऐतिहासिक <span class="text-accent">शस्त्रे</span>
        </h1>

        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
            प्राचीन व मध्ययुगीन काळातील शस्त्रांची सविस्तर माहिती
        </p>

    </div>
</section>

<!-- WEAPON LIST -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4">

<?php if (count($weapons) > 0): ?>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 items-stretch">

<?php foreach ($weapons as $weapon): ?>

<a href="./weapon/index.php?slug=<?php echo weaponSlug($weapon['WeaponName']); ?>"
   class="group h-full">

<article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col">

    <!-- IMAGE -->
    <div class="relative h-60 bg-gray-200 overflow-hidden">
        <img
            src="../assets/images/Photos/Weapon/<?php echo htmlspecialchars($weapon['PIC_NAME'] ?? 'default-weapon.jpg'); ?>"
            alt="<?php echo htmlspecialchars($weapon['WeaponNameMar']); ?>"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >
    </div>

    <!-- CONTENT -->
    <div class="p-6 flex flex-col flex-1">

        <!-- TEXT -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 leading-snug">
                <?php echo htmlspecialchars($weapon['WeaponNameMar']); ?>
            </h3>

            <?php if (!empty($weapon['WeaponTypeMar'])): ?>
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                <strong>प्रकार:</strong> <?php echo htmlspecialchars($weapon['WeaponTypeMar']); ?>
            </p>
            <?php endif; ?>

            <?php if (!empty($weapon['WeaponEraMar'])): ?>
            <p class="text-sm text-gray-600 dark:text-gray-300">
                <strong>कालखंड:</strong> <?php echo htmlspecialchars($weapon['WeaponEraMar']); ?>
            </p>
            <?php endif; ?>
        </div>

        <!-- CTA (ALWAYS BOTTOM) -->
        <div class="mt-auto pt-6">
            <span class="block w-full text-center bg-primary hover:bg-secondary text-white py-2.5 rounded-lg font-semibold transition-colors">
                माहिती पहा
            </span>
        </div>

    </div>

</article>
</a>

<?php endforeach; ?>

</div>

<?php else: ?>

<p class="text-center text-gray-600 dark:text-gray-300 text-lg">
    सध्या शस्त्रांची माहिती उपलब्ध नाही.
</p>

<?php endif; ?>

</div>
</section>

</main>

<?php include './../includes/footer_marathi.php'; ?>