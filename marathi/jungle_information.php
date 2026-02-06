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

// Fetch jungles with front image
$query = "
    SELECT j.*, p.PIC_NAME
    FROM mi_tbljungleinfo_unicode j
    LEFT JOIN pm_tbljunglephotos p
        ON j.JungleName = p.JungleName
        AND p.PIC_FRONT_IMAGE = 'y'
    ORDER BY j.JungleNameMar ASC
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
<section class="relative py-24 bg-gradient-to-r from-green-800 to-emerald-600 text-white">
    <div class="container mx-auto px-6 text-center">

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            जंगल व <span class="text-accent">व्याघ्र प्रकल्प</span>
        </h1>

        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto">
            भारत व महाराष्ट्रातील प्रसिद्ध जंगल व व्याघ्र प्रकल्पांची माहिती
        </p>

    </div>
</section>

<!-- JUNGLE LIST -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto px-4">

<?php if (count($jungles) > 0): ?>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 items-stretch">

<?php foreach ($jungles as $jungle): ?>

<a href="./jungle/index.php?slug=<?php echo jungleSlug($jungle['JungleName']); ?>"
   class="group h-full">

<article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 h-full flex flex-col">

    <!-- IMAGE -->
    <div class="relative h-60 bg-gray-200 overflow-hidden">
        <img
            src="../assets/images/Photos/Jungle/<?php echo htmlspecialchars($jungle['PIC_NAME'] ?? 'default-jungle.jpg'); ?>"
            alt="<?php echo htmlspecialchars($jungle['JungleNameMar']); ?>"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
        >
    </div>

    <!-- CONTENT -->
    <div class="p-6 flex flex-col flex-1">

        <!-- TEXT -->
        <div>
            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 leading-snug">
                <?php echo htmlspecialchars($jungle['JungleNameMar']); ?>
            </h3>

            <?php if (!empty($jungle['DistrictMar']) || !empty($jungle['StateMar'])): ?>
            <p class="text-sm text-gray-600 dark:text-gray-300 flex items-center mb-3">
                <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                <?php echo htmlspecialchars($jungle['DistrictMar'] . ', ' . $jungle['StateMar']); ?>
            </p>
            <?php endif; ?>

            <?php if (!empty($jungle['IntroductionMar'])): ?>
            <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-3">
                <?php echo strip_tags(mb_substr($jungle['IntroductionMar'], 0, 120)); ?>…
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
    सध्या जंगलांची माहिती उपलब्ध नाही.
</p>

<?php endif; ?>

</div>
</section>

</main>

<?php include './../includes/footer_marathi.php'; ?>