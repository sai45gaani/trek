<?php
// ================= PAGE SETUP =================
require_once './config/database.php';


$db = new Database();
$conn = $db->getConnection();

// ================= GET TREK ID =================
$trekId = $_GET['id'] ?? null;

if (!$trekId || !is_numeric($trekId)) {
    header('Location: ./treks.php');
    exit;
}

// ================= FETCH TREK =================
$stmt = $conn->prepare("
    SELECT TrekId, Place, TrekDate, Leader, Grade, ContDetails, Description
    FROM TS_tblTrekDetails
    WHERE TrekId = ?
");
$stmt->bind_param("i", $trekId);
$stmt->execute();
$trek = $stmt->get_result()->fetch_assoc();

if (!$trek) {
    header('Location: ./treks.php');
    exit;
}

// ================= HELPERS =================
function formatDate($date) {
    return date('d M Y', strtotime($date));
}

$isUpcoming = strtotime($trek['TrekDate']) >= strtotime(date('Y-m-d'));

/*$image = !empty($trek['Image'])
    ? $trek['Image']
    : '/assets/images/default-trek.jpg';*/

// ================= PAGE META =================
$page_title = htmlspecialchars($trek['Place']) . ' Trek | Trekshitiz';
$meta_description = 'Join the ' . htmlspecialchars($trek['Place']) . ' trek with Trekshitiz. Explore Sahyadri forts and nature with expert trek leaders.';
include './includes/header.php';
?>

<main id="main-content">

<!-- ================= HERO SECTION ================= -->
<section class="relative h-[70vh] min-h-[520px]">
        <img src="https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
         alt="<?= htmlspecialchars($trek['Place']) ?>"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 h-full flex items-center">
        <div class="text-white max-w-3xl">

            <span class="inline-block px-4 py-1 text-sm rounded-full mb-4
                <?= $isUpcoming ? 'bg-accent text-black' : 'bg-gray-300 text-black' ?>">
                <?= $isUpcoming ? 'Upcoming Trek' : 'Past Trek' ?>
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                <?= htmlspecialchars($trek['Place']) ?>
            </h1>

            <div class="flex flex-wrap gap-5 text-sm opacity-90">
                <span><i class="fas fa-calendar"></i> <?= formatDate($trek['TrekDate']) ?></span>
                <span><i class="fas fa-user"></i> Leader: <?= htmlspecialchars($trek['Leader']) ?></span>
                <span><i class="fas fa-signal"></i> Grade: <?= htmlspecialchars($trek['Grade']) ?></span>
            </div>

        </div>
    </div>
</section>

<!-- ================= TREK OVERVIEW ================= -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-5xl mx-auto px-4 text-center">

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">
            Trek Overview
        </h2>

        <!-- Divider -->
        <div class="w-24 h-1 bg-primary dark:bg-accent mx-auto mb-10 rounded-full"></div>

        <!-- Key Trek Info -->
        <div class="flex flex-wrap justify-center gap-6 mb-12 text-sm md:text-base">

            <div class="flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-full">
                <i class="fas fa-calendar text-accent"></i>
                <span class="font-medium">
                    <?= formatDate($trek['TrekDate']) ?>
                </span>
            </div>

            <div class="flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-full">
                <i class="fas fa-user text-accent"></i>
                <span class="font-medium">
                    Leader: <?= htmlspecialchars($trek['Leader']) ?>
                </span>
            </div>

            <div class="flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-full">
                <i class="fas fa-signal text-accent"></i>
                <span class="font-medium">
                    Difficulty: <?= htmlspecialchars($trek['Grade']) ?>
                </span>
            </div>

            <?php if (!empty($trek['ContDetails'])): ?>
            <div class="flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-full">
                <i class="fas fa-phone text-accent"></i>
                <span class="font-medium">
                    <?= htmlspecialchars($trek['ContDetails']) ?>
                </span>
            </div>
            <?php endif; ?>

        </div>

        <!-- Description -->
        <div class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed space-y-6">
            <?= nl2br(htmlspecialchars(
                $trek['Description']
                ?? 'Detailed trek and fort information will be shared soon.'
            )) ?>
        </div>

    </div>
</section>



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
                       <!-- <a href="#newsletter" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
                            <i class="fas fa-envelope mr-2"></i>
                            Subscribe Newsletter
                        </a>-->
                        <a href="./trek-gear.php" class="inline-flex items-center justify-center px-6 py-3 bg-white bg-opacity-20 hover:bg-opacity-30 text-white font-semibold rounded-lg transition-colors border border-white border-opacity-30">
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
