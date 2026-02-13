<?php
// ================= PAGE META =================
$page_title = 'Treks & Adventures in Sahyadri | Trekshitz';
$meta_description = 'Explore upcoming and past treks by Trekshitz. Join Sahyadri adventures, fort treks, and nature trails with expert leaders.';
$meta_keywords = 'treks, sahyadri treks, trekshitz, upcoming treks, past treks, fort trekking';

// ================= INCLUDES =================
require_once './config/database.php';
include './includes/header.php';

$db = new Database();
$conn = $db->getConnection();

// ================= HELPERS =================
function formatDate($date) {
    return date('d M Y', strtotime($date));
}

function getGradeColor($grade) {
    return match (strtolower(trim($grade))) {
        'easy' => 'bg-green-500',
        'medium' => 'bg-yellow-500',
        'hard', 'difficult' => 'bg-orange-500',
        'very hard', 'extreme' => 'bg-red-500',
        default => 'bg-gray-500'
    };
}

// ================= UPCOMING TREKS =================
$upcomingTreks = $conn->query("
    SELECT TrekId, Place, TrekDate, Leader, Grade, ContDetails
    FROM ts_tbltrekdetails
    WHERE TrekDate >= CURDATE()
    ORDER BY TrekDate ASC
    LIMIT 6
");

// ================= PAST TREKS =================
$pastTreks = $conn->query("
    SELECT TrekId, Place, TrekDate, Leader, Grade
    FROM ts_tbltrekdetails
    WHERE TrekDate < CURDATE()
    ORDER BY TrekDate DESC
    LIMIT 6
");
?>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
<section class="relative py-20 bg-gradient-to-br from-primary via-secondary to-accent text-white overflow-hidden">
    
    <!-- Floating background elements -->
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-5xl mx-auto">

            <div class="flex justify-center mb-4">
                <!-- optional divider -->
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                <span class="text-yellow-300">TreKshitiZ Treks</span>
            </h1>

            <p class="text-xl md:text-2xl mb-4 opacity-90">
                Expertly Planned Trekking Adventures in the Sahyadri
            </p>

            <p class="text-lg md:text-xl mb-8 opacity-80">
                Join our well-organized treks across Sahyadri forts, scenic trails,
                and breathtaking landscapes, guided by experienced trek leaders.
            </p>

            <!-- Stats Pills -->
            <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">

                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-mountain mr-2"></i>
                    350+ Forts
                </span>

                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-route mr-2"></i>
                    Regular Treks
                </span>

                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-calendar mr-2"></i>
                    Since 2000
                </span>

            </div>

        </div>
    </div>
</section>


<section class="bg-gray-50 dark:bg-gray-900 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <!-- Header -->
        <span class="text-3xl sm:text-4xl font-semibold uppercase tracking-wider text-primary dark:text-accent">
            Trekking
        </span>

        <h2 class="mt-3 text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white">
            Our Core Motive
        </h2>

        <p class="mt-6 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
            Trekking is the most cherished activity of the Trek Kshitij Group. Our aim is not only to trek
            through nature, but also to inspire more nature lovers to develop a deeper connection with
            trekking, history, and conservation.
        </p>

        <!-- Divider -->
        <div class="w-24 h-1 bg-primary dark:bg-accent mx-auto my-10 rounded-full"></div>

        <!-- Objectives -->
        <div class="text-left">
            <h3 class="text-2xl font-bold text-primary dark:text-white mb-8 text-center">
                Main Objectives
            </h3>

            <ul class="space-y-6 text-gray-700 dark:text-gray-300">
                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    To introduce the visionary work of Chhatrapati Shivaji Maharaj, who dreamed of Hindu
                    Swarajya and achieved it through leadership and the strength of the Sahyadri ranges.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    To create historical awareness about the forts that shaped Maharashtra’s history,
                    preserved Maratha culture, and witnessed the journey of Swarajya.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    To pass on the stories of sacrifice and bravery of Tanaji Malusare, Baji Prabhu
                    Deshpande, Murarbaji Deshpande, and many unsung heroes.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    To keep our inspiring history alive while learning from past mistakes and their
                    consequences.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    To organize treks that provide joy, peace, and relief from the stress of everyday
                    life.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    To prevent the deterioration of forts due to human negligence and protect natural
                    resources.
                </li>
            </ul>
        </div>

        <!-- Features Card -->
        <div class="mt-16 bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-lg text-left">
            <h3 class="text-2xl font-bold text-primary dark:text-white mb-6 text-center">
                Key Features of Our Treks
            </h3>

            <ul class="space-y-6 text-gray-700 dark:text-gray-300">
                <li>
                    Trekking with Trek Kshitij is not just about travel or recreation. Participants are
                    provided with in-depth knowledge of the fort’s history, geographical importance, and
                    key events—ensuring that the fort is truly experienced, not just visited.
                </li>

                <li>
                    Fort cleanliness drives are conducted during treks, including garbage collection,
                    proper waste disposal, and installation of preventive boards to encourage responsible
                    and eco-friendly behavior.
                </li>
            </ul>
        </div>

    </div>
</section>


<!-- ================= TREK INFORMATION ================= -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 grid md:grid-cols-3 gap-8">

        <div class="card p-6 text-center">
            <i class="fas fa-backpack text-4xl text-accent mb-4"></i>
            <h3 class="text-xl font-bold mb-2">What to Carry</h3>
            <p class="text-gray-600 text-sm">
                Trek shoes, water (2L), snacks, rain protection, personal medicines.
            </p>
        </div>

        <div class="card p-6 text-center">
            <i class="fas fa-shield-alt text-4xl text-accent mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Safety First</h3>
            <p class="text-gray-600 text-sm">
                Certified leaders, first aid, group discipline, no littering policy.
            </p>
        </div>

        <div class="card p-6 text-center">
            <i class="fas fa-signal text-4xl text-accent mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Difficulty Levels</h3>
            <p class="text-gray-600 text-sm">
                Easy • Medium • Hard – choose what suits your fitness.
            </p>
        </div>

    </div>
</section>

<!-- ================= UPCOMING TREKS ================= -->
<section id="upcoming" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary">Upcoming Treks</h2>
            <p class="text-gray-600 mt-2">Register now and be part of our next adventure</p>
        </div>

        <?php if ($upcomingTreks->num_rows): ?>
        <div class="grid md:grid-cols-3 gap-8">
            <?php while ($t = $upcomingTreks->fetch_assoc()): ?>
                <div class="card p-6">
                    <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($t['Place']) ?></h3>
                    <p class="text-sm text-gray-600 mb-1">
                        <i class="fas fa-calendar"></i> <?= formatDate($t['TrekDate']) ?>
                    </p>
                    <p class="text-sm text-gray-600 mb-1">
                        <i class="fas fa-user"></i> <?= htmlspecialchars($t['Leader']) ?>
                    </p>
                    <span class="inline-block px-3 py-1 text-xs text-white rounded-full <?= getGradeColor($t['Grade']) ?>">
                        <?= htmlspecialchars($t['Grade']) ?>
                    </span>

                    <div class="mt-4 flex gap-2">
                        <a href="./trek-details.php?id=<?= $t['TrekId'] ?>" class="btn btn-primary w-full">Details</a>
                        <a href="tel:<?= $t['ContDetails'] ?>" class="btn btn-secondary w-full">Call</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

<a href="./trek_schedule.php" class="block group bg-accent/10 hover:bg-accent/20 rounded-2xl">
    <div class="text-center mt-8 px-8 py-4 rounded-2xl 
                transition-all duration-300 cursor-pointer
                max-w-md mx-auto">

        <span class="text-primary font-semibold text-lg group-hover:underline">
            View Full Schedule →
        </span>

    </div>
</a>



        <?php else: ?>
            <p class="text-center text-gray-500">No upcoming treks announced yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- ================= PAST TREKS ================= -->
<section id="past" class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary">Past Treks</h2>
            <p class="text-gray-600 mt-2">Memories from our completed adventures</p>
        </div>

        <?php if ($pastTreks->num_rows): ?>
        <div class="grid md:grid-cols-3 gap-8">
    <?php while ($t = $pastTreks->fetch_assoc()): ?>

        <a href="./trek-details.php?id=<?= $t['TrekId'] ?>"
           class="block h-full group focus:outline-none">

            <div class="card bg-white dark:bg-gray-800
                        p-6 rounded-2xl border border-gray-200 dark:border-gray-700
                        shadow-lg hover:shadow-2xl transition-all duration-300
                        h-full flex flex-col hover:-translate-y-1">

                <!-- Trek Title -->
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3">
                    <?= htmlspecialchars($t['Place']) ?>
                </h3>

                <!-- Meta Info -->
                <div class="space-y-1 text-sm text-gray-600 dark:text-gray-300 mb-4">
                    <p class="flex items-center">
                        <i class="fas fa-calendar-check text-accent mr-2"></i>
                        <?= formatDate($t['TrekDate']) ?>
                    </p>

                    <p class="flex items-center">
                        <i class="fas fa-user text-accent mr-2"></i>
                        <?= htmlspecialchars($t['Leader']) ?>
                    </p>
                </div>

                <!-- Grade -->
                <div class="mb-6">
                    <span class="inline-block px-3 py-1 text-xs font-bold text-white rounded-full
                        <?= getGradeColor($t['Grade']) ?>">
                        <?= htmlspecialchars($t['Grade']) ?>
                    </span>
                </div>

                <!-- CTA pinned to bottom -->
                <div class="mt-auto">
                    <span class="block w-full text-center
                                 bg-primary group-hover:bg-secondary
                                 text-white font-semibold
                                 py-2.5 rounded-lg
                                 transition-colors duration-300">
                        <i class="fas fa-images mr-1"></i>
                        View Memories
                    </span>
                </div>

            </div>
        </a>

    <?php endwhile; ?>

        </div>

<a href="./past-treks.php" class="block group bg-accent/10 hover:bg-accent/20 rounded-2xl">
    <div class="text-center mt-8 px-8 py-4 rounded-2xl 
                transition-all duration-300 cursor-pointer
                max-w-md mx-auto">

        <span class="text-primary font-semibold text-lg group-hover:underline">
            View All Past Treks →
        </span>

    </div>
</a>



        <?php else: ?>
            <p class="text-center text-gray-500">No past treks found.</p>
        <?php endif; ?>
    </div>
</section>

<?php include './our_important_information_for_trek.php';  ?>

</main>

<?php include './includes/footer.php'; ?>
