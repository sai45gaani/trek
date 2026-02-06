<?php
// SEO
$page_title = 'Temples in Maharashtra | Trekshitz';
$meta_description = 'Complete information about famous temples in Maharashtra including deity, history, importance and architecture.';
$meta_keywords = 'temples in maharashtra, indian temples, hindu temples, pilgrimage';

require_once './config/database.php';
include './includes/header.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch temples with front image
$query = "
    SELECT t.*, p.PIC_NAME
    FROM ei_tbltempleinfo t
    LEFT JOIN pm_tbltemplephotos p
        ON t.TempleName = p.TempleName AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY t.TempleName ASC
";
$result = $conn->query($query);

$temples = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $temples[] = $row;
    }
}

// Slug helper
function templeSlug($name) {
    return strtolower(str_replace(' ', '-', trim($name)));
}
?>

<main id="main-content">

<!-- Hero -->
<section class="relative py-20 bg-gradient-to-r from-orange-700 to-red-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">
            Temples in <span class="text-accent">Maharashtra</span>
        </h1>
        <p class="text-xl opacity-90">
            Explore famous temples, their history and spiritual importance
        </p>
    </div>
</section>

<!-- Temple Cards -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">

        <?php if (count($temples) > 0): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($temples as $temple): ?>
                <a href="./temple/index.php?slug=<?php echo templeSlug($temple['TempleName']); ?>"
                   class="block group">

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:-translate-y-1 transition-all">

                        <!-- Image -->
                        <div class="h-56 overflow-hidden bg-gray-200">
                            <img
                                src="../assets/images/Photos/Temple/<?php echo htmlspecialchars($temple['PIC_NAME'] ?? 'default-temple.jpg'); ?>"
                                alt="<?php echo htmlspecialchars($temple['TempleName']); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                                <?php echo htmlspecialchars($temple['TempleName']); ?>
                            </h3>

                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                                <?php echo htmlspecialchars($temple['District']); ?>
                            </p>

                            <?php if (!empty($temple['MainDeity'])): ?>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                                <strong>Deity:</strong> <?php echo htmlspecialchars($temple['MainDeity']); ?>
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
                Temple information is currently unavailable.
            </p>
        <?php endif; ?>

    </div>
</section>

</main>

<?php include './includes/footer.php'; ?>