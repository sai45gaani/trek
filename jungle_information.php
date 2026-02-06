<?php
// Page SEO
$page_title = 'Jungles & Tiger Reserves in India | Trekshitz';
$meta_description = 'Complete information about famous jungles and tiger reserves in India including Kanha, Tadoba and more.';
$meta_keywords = 'jungles of india, tiger reserve, kanha, tadoba';

require_once './config/database.php';
// Include header
include './includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch jungles with front image
$query = "
    SELECT j.*, p.PIC_NAME
    FROM ei_tbljungleinfo j
    LEFT JOIN pm_tbljunglephotos p
        ON j.JungleName = p.JungleName AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY j.JungleName ASC
";
$result = $conn->query($query);

$jungles = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $jungles[] = $row;
    }
}

// Slug function
function jungleSlug($name) {
    return strtolower(str_replace(' ', '-', trim($name)));
}
?>

<main id="main-content">

<!-- Hero -->
<section class="relative py-20 bg-gradient-to-r from-green-800 to-emerald-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">
            Jungles & <span class="text-accent">Tiger Reserves</span>
        </h1>
        <p class="text-xl opacity-90">
            Explore India’s famous jungles and wildlife reserves
        </p>
    </div>
</section>

<!-- Jungle Cards -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($jungles as $jungle): ?>
                <a href="./jungle/index.php?slug=<?php echo jungleSlug($jungle['JungleName']); ?>"
                   class="block group">

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:-translate-y-1 transition-all">

                        <!-- Image -->
                        <div class="h-56 overflow-hidden bg-gray-200">
                            <img
                                src="../assets/images/Photos/Jungle/<?php echo htmlspecialchars($jungle['PIC_NAME'] ?? 'default-jungle.jpg'); ?>"
                                alt="<?php echo htmlspecialchars($jungle['JungleName']); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                                <?php echo htmlspecialchars($jungle['JungleName']); ?>
                            </h3>

                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                                <?php echo htmlspecialchars($jungle['District'] . ', ' . $jungle['State']); ?>
                            </p>

                            <p class="text-gray-700 dark:text-gray-300 text-sm line-clamp-3 mb-4">
                                <?php echo strip_tags(substr($jungle['Introduction'], 0, 120)); ?>...
                            </p>

                            <span class="inline-flex items-center justify-center w-full bg-primary hover:bg-secondary text-white py-2 rounded-lg font-semibold">
                                View Details
                            </span>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>

</main>

<?php include './includes/footer.php'; ?>