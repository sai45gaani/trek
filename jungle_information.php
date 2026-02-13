<?php
// Page SEO
$page_title = 'Jungles & Tiger Reserves in India | Trekshitz';
$meta_description = 'Complete information about famous jungles and tiger reserves in India including Kanha, Tadoba and more.';
$meta_keywords = 'jungles of india, tiger reserve, kanha, tadoba';

require_once './config/database.php';
include './includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch jungles with front image
$query = "
    SELECT j.*, p.PIC_NAME
    FROM ei_tbljungleinfo j
    LEFT JOIN pm_tbljunglephotos p
        ON j.JungleName = p.JungleName
        AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY j.JungleName ASC
";
$result = $conn->query($query);

$jungles = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $jungles[] = $row;
    }
}

// Slug helper
function jungleSlug($name) {
    return strtolower(str_replace(' ', '-', trim($name)));
}
?>

<main id="main-content">

<!-- HERO -->
<section class="relative py-24 bg-gradient-to-r from-green-800 to-emerald-600 text-white overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Jungles & <span class="text-accent">Tiger Reserves</span>
        </h1>

        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
            Explore India’s rich forests, wildlife sanctuaries, and tiger reserves
        </p>

    </div>
</section>

<!-- JUNGLE LISTING -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4">

<?php if (count($jungles) > 0): ?>

<!-- GRID -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 items-stretch">

<?php foreach ($jungles as $jungle): ?>

<a href="./jungle/index.php?slug=<?php echo jungleSlug($jungle['JungleName']); ?>"
   class="group h-full">

<article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col">

    <!-- IMAGE -->
    <div class="relative h-60 bg-gray-200 overflow-hidden">
        <img
            src="./assets/images/Photos/Jungle/<?php echo htmlspecialchars($jungle['PIC_NAME'] ?? 'default-jungle.jpg'); ?>"
            alt="<?php echo htmlspecialchars($jungle['JungleName']); ?>"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >
    </div>

    <!-- CONTENT -->
    <div class="p-6 flex flex-col flex-1">

        <!-- TEXT -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 leading-snug">
                <?php echo htmlspecialchars($jungle['JungleName']); ?>
            </h3>

            <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center mb-3">
                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                <?php echo htmlspecialchars($jungle['District'] . ', ' . $jungle['State']); ?>
            </p>

            <?php if (!empty($jungle['Introduction'])): ?>
            <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-3">
                <?php echo strip_tags(substr($jungle['Introduction'], 0, 120)); ?>…
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
    Jungle information is currently unavailable.
</p>

<?php endif; ?>

</div>
</section>

</main>

<?php include './includes/footer.php'; ?>