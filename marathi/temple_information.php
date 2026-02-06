<?php
// SEO
$page_title = 'महाराष्ट्रातील मंदिरे | Trekshitz';
$meta_description = 'महाराष्ट्रातील प्रसिद्ध मंदिरे, देवता, इतिहास, महत्त्व व दर्शनाची माहिती.';
$meta_keywords = 'महाराष्ट्र मंदिरे, देवस्थान, मराठी मंदिरे';

require_once './../config/database.php';
include './../includes/header_marathi.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch temples with front image
$query = "
    SELECT t.*, p.PIC_NAME
    FROM mi_tbltempleinfo_unicode t
    LEFT JOIN pm_tbltemplephotos p
        ON t.TempleName = p.TempleName AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY t.TempleNameMar ASC
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
            महाराष्ट्रातील <span class="text-accent">मंदिरे</span>
        </h1>
        <p class="text-xl opacity-90">
            देवस्थानांची संपूर्ण माहिती, इतिहास व महत्त्व
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
                                alt="<?php echo htmlspecialchars($temple['TempleNameMar']); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                                <?php echo htmlspecialchars($temple['TempleNameMar']); ?>
                            </h3>

                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                                <?php echo htmlspecialchars($temple['DistrictMar']); ?>
                            </p>

                            <?php if (!empty($temple['MainDeityMar'])): ?>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                                <strong>देवता:</strong> <?php echo htmlspecialchars($temple['MainDeityMar']); ?>
                            </p>
                            <?php endif; ?>

                            <span class="inline-flex items-center justify-center w-full bg-primary hover:bg-secondary text-white py-2 rounded-lg font-semibold">
                                माहिती पहा
                            </span>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>

        </div>
        <?php else: ?>
            <p class="text-center text-gray-600 dark:text-gray-300">
                सध्या मंदिरांची माहिती उपलब्ध नाही.
            </p>
        <?php endif; ?>

    </div>
</section>

</main>

<?php include './../includes/footer_marathi.php'; ?>