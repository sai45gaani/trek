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
    FROM TS_tblTrekDetails
    WHERE TrekDate >= CURDATE()
    ORDER BY TrekDate ASC
    LIMIT 6
");

// ================= PAST TREKS =================
$pastTreks = $conn->query("
    SELECT TrekId, Place, TrekDate, Leader, Grade
    FROM TS_tblTrekDetails
    WHERE TrekDate < CURDATE()
    ORDER BY TrekDate DESC
    LIMIT 6
");
?>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
<section class="py-20 bg-gradient-to-r from-primary to-secondary text-white text-center">
    <h1 class="text-5xl font-bold mb-4">Trekshitz Treks</h1>
    <p class="text-xl max-w-3xl mx-auto opacity-90">
        Join our expertly planned trekking adventures across Sahyadri – forts, nature trails, and unforgettable experiences.
    </p>
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
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-8 text-center">
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
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
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
            <h2 class="text-4xl font-bold">Upcoming Treks</h2>
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

        <div class="text-center mt-8">
            <a href="./trek_schedule.php" class="text-accent font-semibold hover:underline">
                View Full Schedule →
            </a>
        </div>

        <?php else: ?>
            <p class="text-center text-gray-500">No upcoming treks announced yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- ================= PAST TREKS ================= -->
<section id="past" class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold">Past Treks</h2>
            <p class="text-gray-600 mt-2">Memories from our completed adventures</p>
        </div>

        <?php if ($pastTreks->num_rows): ?>
        <div class="grid md:grid-cols-3 gap-8">
            <?php while ($t = $pastTreks->fetch_assoc()): ?>
                <div class="card p-6">
                    <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($t['Place']) ?></h3>
                    <p class="text-sm text-gray-600 mb-1">
                        <i class="fas fa-calendar-check"></i> <?= formatDate($t['TrekDate']) ?>
                    </p>
                    <p class="text-sm text-gray-600 mb-1">
                        <i class="fas fa-user"></i> <?= htmlspecialchars($t['Leader']) ?>
                    </p>
                    <span class="inline-block px-3 py-1 text-xs text-white rounded-full <?= getGradeColor($t['Grade']) ?>">
                        <?= htmlspecialchars($t['Grade']) ?>
                    </span>

                    <div class="mt-4">
                        <a href="./trek-details.php?id=<?= $t['TrekId'] ?>" class="btn btn-secondary w-full">
                            View Memories
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="text-center mt-8">
            <a href="./past-treks.php" class="text-accent font-semibold hover:underline">
                View All Past Treks →
            </a>
        </div>

        <?php else: ?>
            <p class="text-center text-gray-500">No past treks found.</p>
        <?php endif; ?>
    </div>
</section>
  <!-- Trek Information Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gradient mb-12">
                    Important Information for Trekkers
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-backpack text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">What to Bring</h3>
                        <ul class="text-gray-600 dark:text-gray-300 space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Comfortable trekking shoes with good grip</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Water bottle (minimum 2 liters)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Light snacks and energy food</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>First aid kit and personal medicines</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Sun hat and sunscreen (SPF 30+)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Raincoat (during monsoon season)</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-shield-alt text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Safety Guidelines</h3>
                        <ul class="text-gray-600 dark:text-gray-300 space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Follow trek leader's instructions at all times</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Stay with the group, don't venture alone</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Inform about any medical conditions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Carry emergency contact numbers</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Don't litter - keep nature clean</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-accent mr-3 mt-1 flex-shrink-0"></i>
                                <span>Start early to avoid afternoon heat</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-leaf text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Easy Level</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            Suitable for beginners. 2-4 hours duration with minimal elevation gain.
                        </p>
                    </div>
                    
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-yellow-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-mountain text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Medium Level</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            Moderate fitness required. 4-6 hours with some steep sections.
                        </p>
                    </div>
                    
                    <div class="card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700">
                        <div class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-flag text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Hard Level</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                            Good fitness required. 6+ hours with challenging terrain.
                        </p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-2xl text-center">
                    <h3 class="text-3xl font-bold mb-4">
                        Ready for Adventure?
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Join our trekking community and explore the beautiful Sahyadri mountains
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="https://wa.me/919876543210" target="_blank" class="inline-flex items-center justify-center px-6 py-3 bg-accent hover:bg-forest text-white font-semibold rounded-lg transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Join WhatsApp Group
                        </a>
                        <a href="#newsletter" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-envelope mr-2"></i>
                            Subscribe Newsletter
                        </a>
                        <a href="/safety-guidelines" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-book mr-2"></i>
                            Safety Guidelines
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include './includes/footer.php'; ?>
