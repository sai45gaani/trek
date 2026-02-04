<?php
// ================= PAGE META =================
$page_title = 'सह्याद्रीतील ट्रेक्स आणि साहसी मोहिमा | Trekshitz';

$meta_description = 'Trekshitz सोबत येणाऱ्या व झालेल्या ट्रेक्सची माहिती येथे पाहा. सह्याद्रीतील किल्ले ट्रेक्स, निसर्ग भटकंती आणि साहसी मोहिमांमध्ये अनुभवी मार्गदर्शकांसोबत सहभागी व्हा.';

$meta_keywords = 'ट्रेक्स, सह्याद्री ट्रेक्स, trekshitz, येणारे ट्रेक्स, मागील ट्रेक्स, किल्ले ट्रेकिंग, साहसी भटकंती';

// ================= INCLUDES =================
require_once './../config/database.php';
include './../includes/header_marathi.php';

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
                            <span class="text-yellow-300">संपर्क करा</span>
                        </h1>

                        <p class="text-xl md:text-2xl mb-4 opacity-90">
                            ट्रेकशितीज संस्था
                        </p>

                        <p class="text-lg md:text-xl mb-8 opacity-80"> 
                            आम्हाला नेहमीच सह्याद्रीप्रेमी ट्रेकर्स आणि निसर्गप्रेमींशी संवाद साधायला आनंद वाटतो
                        </p>

                        <!-- Stats Pills -->
                        <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">

                            <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                                <i class="fas fa-mountain mr-2"></i>
                                ३५०+ किल्ले
                            </span>

                            <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                                <i class="fas fa-route mr-2"></i>
                                नियमित ट्रेक्स
                            </span>

                            <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                                <i class="fas fa-calendar mr-2"></i>
                                २००० पासून
                            </span>

                        </div>

        </div>
    </div>
</section>

    <!-- Contact Info Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">

            <!-- Section Header -->
            <div class="text-center mb-14">
                <div class="section-divider mb-4"></div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                            संपर्क साधा
                        </span>
                    </h2>

                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        ट्रेकशितीज संस्थेशी कधीही संपर्क करा
                    </p>

            </div>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">

                <!-- Location -->
                <div class="about-card rounded-2xl p-8 text-center bg-green-100">
                    <div class="feature-icon bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 mb-4">
                        <i class="fas fa-map-marker-alt text-3xl"></i>
                    </div>
                        <h3 class="text-2xl font-semibold mb-3 text-gray-800 dark:text-white">
                            ठिकाण
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            डोंबिवली, <br>
                            महाराष्ट्र, भारत<br>
                        </p>

                </div>

                <!-- Email -->
                <div class="about-card rounded-2xl p-8 text-center bg-blue-100">
                    <div class="feature-icon bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 mb-4">
                        <i class="fas fa-envelope text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-gray-800 dark:text-white">
                          ई-मेल
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        <a href="mailto:info@trekshitz.com" class="text-primary font-semibold hover:underline">
                            info@trekshitz.com
                        </a>
                    </p>
                    <p class="mt-2 text-sm text-gray-500">
                        २४/७ सहाय्य उपलब्ध
                    </p>
                </div>

                <!-- Contact -->
                <div class="about-card rounded-2xl p-8 text-center bg-yellow-100">
                    <div class="feature-icon bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300 mb-4">
                        <i class="fas fa-phone-alt text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-gray-800 dark:text-white">
                        संपर्क
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 font-semibold">
                        +91 98765 43210
                    </p>
                    <p class="mt-2 text-sm text-gray-500">
                        सोमवार – रविवार • ८:०० ते २०:००
                    </p>
                </div>

            </div>
        </div>
    </section>





<?php 
//   include './our_important_information_for_trek.php'; 
 ?>

</main>


<?php include './../includes/footer_marathi.php'; ?>