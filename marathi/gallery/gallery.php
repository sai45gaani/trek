<?php
$page_title = 'छायाचित्र संग्रह | TreKshitiZ';

$meta_description = 'TreKshitiZ छायाचित्र संग्रह – सह्याद्रीतील किल्ले, ट्रेक्स, निसर्ग, वन्यजीवन व दुर्गसंवर्धन उपक्रमांची सुंदर छायाचित्रे पहा. महाराष्ट्रातील किल्ल्यांचा दृश्य इतिहास.';

$meta_keywords = 'TreKshitiZ गॅलरी, किल्ल्यांची छायाचित्रे, सह्याद्री निसर्ग छायाचित्रण, ट्रेकिंग फोटो, महाराष्ट्र किल्ले गॅलरी, दुर्गसंवर्धन छायाचित्रे, निसर्ग फोटोग्राफी';

require_once './../../config/database.php';
include './../../includes/header_marathi.php';

$db = new Database();
$conn = $db->getConnection();

/*
|--------------------------------------------------------------------------
| Fort Photos Count
|--------------------------------------------------------------------------
*/
$fortPhotoRes = $conn->query("
    SELECT COUNT(*) AS total
    FROM pm_tblphotos_clean
");
$fortPhotos = $fortPhotoRes->fetch_assoc()['total'] ?? 0;

/*
|--------------------------------------------------------------------------
| Fort Maps Count
|--------------------------------------------------------------------------
*/
$fortMapRes = $conn->query("
    SELECT COUNT(*) AS total
    FROM mm_tblmapinfo_clean
    WHERE MapPath IS NOT NULL
");
$fortMaps = $fortMapRes->fetch_assoc()['total'] ?? 0;

/*
|--------------------------------------------------------------------------
| Function to get category stats (Nature, Cave, Butterfly, Sketch)
|--------------------------------------------------------------------------
*/
function getCategoryCount($conn, $type)
{
    $stmt = $conn->prepare("
        SELECT COUNT(*) AS total
        FROM sw_tblcategories
        WHERE CAT_TYPE = ?
    ");
    $stmt->bind_param('s', $type);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    return $res['total'] ?? 0;
}

// Category-based galleries
$natureCount     = getCategoryCount($conn, 'Flower');
$caveCount       = getCategoryCount($conn, 'Cave');
$butterflyCount  = getCategoryCount($conn, 'Butterfly');
$sketchCount     = getCategoryCount($conn, 'Sketches');
?>

<main id="main-content">

<!-- ================= HERO / INTRO ================= -->
  <section class="relative py-20 bg-gradient-to-r from-primary to-secondary text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><rect x=\"6\" y=\"6\" width=\"8\" height=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"7\" y=\"4\" width=\"6\" height=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 mt-6 font-bilingual">
                   📸 ट्रेकशितीज छायाचित्र संग्रह
                </h1>
              
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                   सह्याद्री पर्वतरांगांतील ट्रेकिंग दरम्यान टिपलेले ऐतिहासिक किल्ल्यांचे मनमोहक क्षण
                </p>
                
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 max-w-6xl">

       <!-- Heading -->
<!-- Story Section -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl font-extrabold mb-6 tracking-wide text-gray-800 dark:text-white">
                आमची कहाणी
            </h1>

            <!-- Divider -->
            <div class="w-24 h-1 bg-accent mx-auto mb-10 rounded-full"></div>

            <!-- Content -->
            <div class="space-y-6 text-lg leading-relaxed text-gray-600 dark:text-gray-300">

                        <p>
                            ट्रेकशितीज गेल्या अनेक दशकांपासून सह्याद्रीच्या समृद्ध वारशाचे दस्तऐवजीकरण करत आहे —
                            भव्य डोंगरी किल्ले, प्राचीन लेणी संकुले, विविध वनस्पती, वन्यजीवन
                            आणि पर्वतरांगांपासून प्रेरित कलात्मक मांडणीपर्यंत.
                        </p>

                        <p>
                            ही गॅलरी एक केंद्रीकृत दृश्य संग्रह म्हणून कार्य करते, ज्यामध्ये
                            हजारो छायाचित्रे, सविस्तर नकाशे, हस्तरेखाचित्रे
                            आणि निसर्ग नोंदी समाविष्ट आहेत.
                            हे सर्व ट्रेक्स, शोधमोहीम, संशोधन भेटी
                            आणि महाराष्ट्र व पश्चिम घाटातील समुदायाच्या योगदानातून संकलित करण्यात आले आहे.
                        </p>

                        <p>
                            गॅलरीतील प्रत्येक विभाग हा शोधाच्या वेगवेगळ्या क्षेत्राचे प्रतिनिधित्व करतो —
                            रणनीतिक मार्ग नकाशांसह ऐतिहासिक किल्ले,
                            नैसर्गिक भू-दृश्ये व फुले, फुलपाखरे व जैवविविधता,
                            शैलकृती लेणी तसेच प्रदेशाची सांस्कृतिक
                            आणि नैसर्गिक ओळख जपणारी कलात्मक रेखाचित्रे.
                        </p>

                        <p class="font-semibold text-gray-700 dark:text-gray-200">
                            खालील विभागांचा अभ्यास करून,
                            ट्रेकशितीजसोबत सह्याद्रीचा शाश्वत वारसा
                            जाणून घ्या, शोधा आणि दृश्य स्वरूपात अनुभवा.
                        </p>
                        </div>
        </div>
    </div>
</section>



        <!-- Gallery Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
                $galleries = [
                    [
                        'title' => '🏰 किल्ल्यांची छायाचित्रे',
                        'desc'  => 'विविध ट्रेक्स आणि ऋतूंमध्ये टिपलेले ऐतिहासिक किल्ले.',
                        'count' => $fortPhotos,
                        'link'  => './fort-gallery.php'
                    ],
                    [
                        'title' => '🗺️ किल्ल्यांचे नकाशे',
                        'desc'  => 'सह्याद्रीतील किल्ल्यांचे मार्गनकाशे व दिशादर्शन.',
                        'count' => $fortMaps,
                        'link'  => './map-gallery.php'
                    ],
                    [
                        'title' => '🌿 निसर्ग',
                        'desc'  => 'वनस्पती, भू-दृश्ये, पावसाळी सौंदर्य आणि जंगलातील निसर्ग.',
                        'count' => $natureCount,
                        'link'  => './flower-gallery.php'
                    ],
                    [
                        'title' => '🦋 फुलपाखरे',
                        'desc'  => 'पश्चिम घाटात आढळणाऱ्या विविध फुलपाखरांच्या प्रजाती.',
                        'count' => $butterflyCount,
                        'link'  => './butterfly-gallery.php'
                    ],
                    [
                        'title' => '🕳️ लेणी',
                        'desc'  => 'प्राचीन शैलकृती लेणी आणि लपलेली गुहा प्रणाली.',
                        'count' => $caveCount,
                        'link'  => './caves-gallery.php'
                    ],
                    [
                        'title' => '🎨 रेखाचित्रे व कला',
                        'desc'  => 'हस्तरेखाचित्रांमधून साकारलेले किल्ले व कलात्मक मांडणी.',
                        'count' => $sketchCount,
                        'link'  => './sketches-gallery.php'
                    ]
                ];
            foreach ($galleries as $g): ?>
                        <a href="<?= $g['link'] ?>"
                    class="block focus:outline-none group mb-6">

                        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 
                                    shadow-sm hover:shadow-2xl transition-all duration-300 
                                    p-7 flex flex-col relative overflow-hidden h-full">

                            <!-- Accent strip -->
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-primary to-accent"></div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white 
                                    group-hover:text-primary transition">
                                <?= $g['title'] ?>
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed flex-grow">
                                <?= $g['desc'] ?>
                            </p>

                            <!-- Footer -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                                <span class="inline-flex items-center text-sm font-semibold text-green-600">
                                    <i class="fas fa-images mr-2 opacity-80"></i>
                                    <?= $g['count'] ?> items
                                </span>

                                <!-- Fake link (card itself is clickable) -->
                                <span class="inline-flex items-center text-primary font-semibold 
                                            group-hover:translate-x-1 transition">
                                    Explore
                                    <span class="ml-1">→</span>
                                </span>
                            </div>

                        </div>
                    </a>

<?php endforeach; ?>


        </div>
    </div>
</main>

<?php include './../../includes/footer_marathi.php'; ?>
