<?php
// ================= PAGE META =================
$page_title = 'Treks & Adventures in Sahyadri | Trekshitz';
$meta_description = 'Explore upcoming and past treks by Trekshitz. Join Sahyadri adventures, fort treks, and nature trails with expert leaders.';
$meta_keywords = 'treks, sahyadri treks, trekshitz, upcoming treks, past treks, fort trekking';

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
                <span class="text-yellow-300">TreKshitiZ ट्रेक्स</span>
            </h1>

            <p class="text-xl md:text-2xl mb-4 opacity-90">
                सह्याद्रीतील नियोजनबद्ध व अनुभवी मार्गदर्शनाखाली ट्रेक्स
            </p>

            <p class="text-lg md:text-xl mb-8 opacity-80">
                सह्याद्रीतील किल्ले, निसर्गरम्य वाटा आणि मनमोहक दृश्यांचा अनुभव घ्या —
                अनुभवी ट्रेक लीडर्सच्या मार्गदर्शनाखाली आयोजित केलेल्या ट्रेक्समध्ये सहभागी व्हा.
            </p>

            <!-- Stats Pills -->
            <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">

                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-mountain mr-2"></i>
                    ४००+ किल्ले
                </span>

                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-route mr-2"></i>
                     नियमित ट्रेक्स
                </span>

                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                    <i class="fas fa-calendar mr-2"></i>
                    सन २००० पासून
                </span>

            </div>

        </div>
    </div>
</section>


<section class="bg-gray-50 dark:bg-gray-900 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <!-- Header -->
        <span class="text-3xl sm:text-4xl font-semibold uppercase tracking-wider text-primary dark:text-accent">
           ट्रेकिंग
        </span>

        <h2 class="mt-3 text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white">
            आमचा मुख्य उद्देश
        </h2>

        <p class="mt-6 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
             ट्रेकिंग ही TreKshitiZ समूहाची सर्वात जिव्हाळ्याची आणि महत्त्वाची गतिविधी आहे.
            आमचा उद्देश केवळ निसर्गात फिरणे एवढाच नसून, अधिकाधिक निसर्गप्रेमींमध्ये
            ट्रेकिंग, इतिहास आणि संवर्धन याबाबत जाणीव निर्माण करणे हाच आहे.
        </p>

        <!-- Divider -->
        <div class="w-24 h-1 bg-primary dark:bg-accent mx-auto my-10 rounded-full"></div>

        <!-- Objectives -->
        <div class="text-left">
            <h3 class="text-2xl font-bold text-primary dark:text-white mb-8 text-center">
                 मुख्य उद्दिष्टे
            </h3>

            <ul class="space-y-6 text-gray-700 dark:text-gray-300">
                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    सह्याद्री पर्वतरांगांच्या बळावर हिंदवी स्वराज्याची संकल्पना साकार करणाऱ्या
                    छत्रपती शिवाजी महाराजांचे दूरदृष्टीचे कार्य लोकांपर्यंत पोहोचवणे.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    महाराष्ट्राच्या इतिहासाला आकार देणाऱ्या, मराठा संस्कृती जपणाऱ्या
                    आणि स्वराज्याच्या प्रवासाचे साक्षीदार असलेल्या किल्ल्यांविषयी
                    ऐतिहासिक जाणीव निर्माण करणे.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    तानाजी मालुसरे, बाजीप्रभू देशपांडे, मुरारबाजी देशपांडे
                    तसेच अनेक अज्ञात वीरांच्या बलिदान व पराक्रमाच्या कथा पुढील पिढीपर्यंत पोहोचवणे.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                     आपल्या प्रेरणादायी इतिहासाची जपणूक करताना,
                    भूतकाळातील चुका आणि त्यांचे परिणाम यांमधून शिकणे.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    दैनंदिन जीवनातील तणावातून मुक्तता मिळावी,
                    आनंद व मानसिक शांती मिळावी यासाठी नियोजनबद्ध ट्रेक्स आयोजित करणे.
                </li>

                <li class="flex items-start gap-4">
                    <span class="text-primary dark:text-accent font-bold mt-1">•</span>
                    मानवी दुर्लक्षामुळे होणाऱ्या किल्ल्यांच्या ऱ्हासास प्रतिबंध करणे
                    आणि नैसर्गिक साधनसंपत्तीचे संरक्षण करणे.
                </li>
            </ul>
        </div>

        <!-- Features Card -->
        <div class="mt-16 bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-lg text-left">
            <h3 class="text-2xl font-bold text-primary dark:text-white mb-6 text-center">
                आमच्या ट्रेक्सची वैशिष्ट्ये
            </h3>

            <ul class="space-y-6 text-gray-700 dark:text-gray-300">
                <li>
                    TreKshitiZ सोबतची ट्रेकिंग केवळ फिरणे किंवा करमणूक नाही.
                    प्रत्येक सहभागीला किल्ल्याचा इतिहास, भौगोलिक महत्त्व
                    आणि महत्त्वाच्या घटनांची सखोल माहिती दिली जाते —
                    ज्यामुळे किल्ला केवळ पाहिला जात नाही, तर अनुभवला जातो.
                </li>

                <li>
                   ट्रेक्सदरम्यान किल्ल्यांची स्वच्छता मोहीम राबवली जाते,
                    ज्यामध्ये कचरा संकलन, योग्य विल्हेवाट
                    आणि जबाबदार व पर्यावरणपूरक वर्तनासाठी सूचना फलक बसवले जातात.
            </ul>
        </div>

    </div>
</section>


<!-- ================= TREK INFORMATION ================= -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 grid md:grid-cols-3 gap-8">

        <div class="card p-6 text-center">
            <i class="fas fa-backpack text-4xl text-accent mb-4"></i>
            <h3 class="text-xl font-bold mb-2">काय सोबत आणावे</h3>
            <p class="text-gray-600 text-sm">
                 ट्रेकिंग शूज, पाणी (किमान २ लिटर), हलके खाद्यपदार्थ,
                पावसापासून संरक्षण, वैयक्तिक औषधे.
            </p>
        </div>

        <div class="card p-6 text-center">
            <i class="fas fa-shield-alt text-4xl text-accent mb-4"></i>
            <h3 class="text-xl font-bold mb-2">सुरक्षितता प्रथम</h3>
            <p class="text-gray-600 text-sm">
                 प्रशिक्षित ट्रेक लीडर्स, प्रथमोपचार सुविधा,
                गटशिस्तीचे पालन, कचरा न टाकण्याचे नियम.
            </p>
        </div>

        <div class="card p-6 text-center">
            <i class="fas fa-signal text-4xl text-accent mb-4"></i>
            <h3 class="text-xl font-bold mb-2">अवघडपणाची पातळी</h3>
            <p class="text-gray-600 text-sm">
                सोपा • मध्यम • अवघड – आपल्या क्षमतेनुसार ट्रेक निवडा.
            </p>
        </div>

    </div>
</section>

<!-- ================= UPCOMING TREKS ================= -->
<section id="upcoming" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary">आगामी ट्रेक्स</h2>
            <p class="text-gray-600 mt-2">आत्ताच नोंदणी करा आणि आमच्या पुढील साहसाचा भाग बना</p>
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
                        <a href="./trek-details.php?id=<?= $t['TrekId'] ?>" class="btn btn-primary w-full">तपशील</a>
                        <a href="tel:<?= $t['ContDetails'] ?>" class="btn btn-secondary w-full">कॉल करा</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

<a href="./trek_schedule.php" class="block group bg-accent/10 hover:bg-accent/20 rounded-2xl">
    <div class="text-center mt-8 px-8 py-4 rounded-2xl 
                transition-all duration-300 cursor-pointer
                max-w-md mx-auto">

        <span class="text-primary font-semibold text-lg group-hover:underline">
            संपूर्ण ट्रेक वेळापत्रक पहा →
        </span>

    </div>
</a>



        <?php else: ?>
            <p class="text-center text-gray-500">सध्या कोणतेही आगामी ट्रेक्स जाहीर करण्यात आलेले नाहीत.</p>
        <?php endif; ?>
    </div>
</section>

<!-- ================= PAST TREKS ================= -->
<section id="past" class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-primary">मागील ट्रेक्स</h2>
            <p class="text-gray-600 mt-2">आमच्या यशस्वी ट्रेक्समधील आठवणी</p>
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
                           आठवणी पहा
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

<a href="./past-treks.php" class="block group bg-accent/10 hover:bg-accent/20 rounded-2xl">
    <div class="text-center mt-8 px-8 py-4 rounded-2xl 
                transition-all duration-300 cursor-pointer
                max-w-md mx-auto">

        <span class="text-primary font-semibold text-lg group-hover:underline">
            सर्व मागील ट्रेक्स पहा →
        </span>

    </div>
</a>



        <?php else: ?>
            <p class="text-center text-gray-500">सध्या कोणतेही मागील ट्रेक्स उपलब्ध नाहीत.</p>
        <?php endif; ?>
    </div>
</section>

<?php include './our_important_information_for_trek.php'; ?>

</main>

<?php include './../includes/footer_marathi.php'; ?>
