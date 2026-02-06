<?php
// Page SEO
$page_title = 'भारत व महाराष्ट्रातील जंगल व व्याघ्र प्रकल्प | Trekshitz';
$meta_description = 'भारत व महाराष्ट्रातील प्रमुख जंगल व व्याघ्र प्रकल्पांची संपूर्ण माहिती – कान्हा, ताडोबा आणि इतर.';
$meta_keywords = 'जंगल, व्याघ्र प्रकल्प, टायगर रिझर्व, Tadoba, Kanha';

require_once './../config/database.php';
include './../includes/header_marathi.php';

// DB
$db = new Database();
$conn = $db->getConnection();

// Fetch all jungles
$query = "
    SELECT j.*, p.PIC_NAME 
    FROM mi_tbljungleinfo_unicode j
    LEFT JOIN pm_tbljunglephotos p 
        ON j.JungleName = p.JungleName AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY j.JungleNameMar ASC
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
            जंगल व <span class="text-accent">व्याघ्र प्रकल्प</span>
        </h1>
        <p class="text-xl opacity-90">
            भारतातील प्रसिद्ध जंगल व व्याघ्र प्रकल्पांची माहिती
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
                                alt="<?php echo htmlspecialchars($jungle['JungleNameMar']); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                                <?php echo htmlspecialchars($jungle['JungleNameMar']); ?>
                            </h3>

                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                                <?php echo htmlspecialchars($jungle['DistrictMar'] . ', ' . $jungle['StateMar']); ?>
                            </p>

                            <p class="text-gray-700 dark:text-gray-300 text-sm line-clamp-3 mb-4">
                                <?php echo strip_tags(mb_substr($jungle['IntroductionMar'], 0, 120)); ?>...
                            </p>

                            <span class="inline-flex items-center justify-center w-full bg-primary hover:bg-secondary text-white py-2 rounded-lg font-semibold">
                                माहिती पहा
                            </span>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>

</main>

<?php include './../includes/footer_marathi.php'; ?>