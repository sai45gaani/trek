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
    FROM ts_tbltrekdetails
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



<?php include './our_important_information_for_trek.php';  ?>

</main>

<?php include './includes/footer.php'; ?>
