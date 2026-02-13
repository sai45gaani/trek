<!-- Include Header Component -->
    <?php 
    // Default values (can be overridden by individual pages)
    $page_title = "ट्रेकशितिज – सह्याद्रीतील किल्ले व ट्रेक्स";
    $meta_description =  "ट्रेकशितिज सोबत सह्याद्रीतील किल्ले, निसर्ग आणि ट्रेकिंगचा अनुभव घ्या.";
    $meta_keywords = "ट्रेकिंग, किल्ले, सह्याद्री, महाराष्ट्र, निसर्गभ्रमंती";

    require_once './../config/database.php';
    include './../includes/header_marathi.php'; 
    $db = new Database();
    $conn = $db->getConnection();

        /* ================= STATS ================= */
        $stats = [
            'forts' => $conn->query("SELECT COUNT(*) c FROM mi_tblfortinfo_unicode")->fetch_assoc()['c'],
            'treks' => $conn->query("SELECT COUNT(*) c FROM ts_tbltrekdetails")->fetch_assoc()['c'],
            'photos' => $conn->query("SELECT COUNT(*) c FROM pm_tblphotos_clean")->fetch_assoc()['c']
        ];

        /* ============ UPCOMING TREKS ============ */
        $treks = $conn->query("
            SELECT TrekId, Place, TrekDate, Leader 
            FROM ts_tbltrekdetails
            WHERE TrekDate >= CURDATE()
            ORDER BY TrekDate ASC
            LIMIT 4
        ");

        /* ============ FEATURED FORTS ============ */
        $forts = $conn->query("
            SELECT f.FortName, f.FortDistrict, p.PIC_NAME
            FROM mi_tblfortinfo_unicode f
            LEFT JOIN pm_tblphotos_clean p 
                ON p.FortName = f.FortName AND p.PIC_FRONT_IMAGE = 'Y'
            ORDER BY f.FortName ASC
            LIMIT 6
        ");

        /* ============ GALLERY PREVIEW ============ */
        $gallery = $conn->query("
            SELECT PIC_NAME, PIC_DESC 
            FROM pm_tblphotos_clean 
            ORDER BY PIC_ID DESC 
            LIMIT 8
        ");

               // $gallery_home_page = $conn->query("SELECT PIC_ID,PIC_NAME,SORT_ORDER FROM pm_tblhomephotos")->fetch_assoc();
        $gallery_home_page = [];

        $result = $conn->query("SELECT PIC_ID, PIC_NAME, SORT_ORDER FROM pm_tblhomephotos order by SORT_ORDER");

        while ($row = $result->fetch_assoc()) {
            $gallery_home_page[] = $row;    
        }


                /* Slide 1: Upcoming Trek */
        $heroTrek = $conn->query("
            SELECT TrekId, Place, TrekDate , Grade
            FROM ts_tbltrekdetails
            WHERE TrekDate >= CURDATE()
            ORDER BY TrekDate ASC
            LIMIT 1
        ")->fetch_assoc();

        /* Slide 2: Featured Fort */
        $heroFort = $conn->query("
            SELECT f.FortName, f.FortDistrict, p.PIC_NAME
            FROM mi_tblfortinfo_unicode f
            LEFT JOIN pm_tblphotos_clean p 
                ON p.FortName = f.FortName AND p.PIC_FRONT_IMAGE = 'Y'
            ORDER BY RAND()
            LIMIT 1
        ")->fetch_assoc();

        /* Slide 3: Latest Gallery */
        $heroGallery = $conn->query("
            SELECT PIC_NAME, PIC_DESC
            FROM pm_tblphotos_clean
            ORDER BY PIC_ID DESC
            LIMIT 1
        ")->fetch_assoc();

        /* Slide 4: Fort Map */
        $heroMap = $conn->query("
            SELECT FortName, MapName, MapPath
            FROM mm_tblmapinfo_clean
            ORDER BY MapID DESC
            LIMIT 1
        ")->fetch_assoc();

        /* Slide 5: Nature Category */
        $heroNature = $conn->query("
            SELECT CAT_NAME, CAT_IMAGE, CAT_TYPE
            FROM sw_tblcategories
            ORDER BY RAND()
            LIMIT 1
        ")->fetch_assoc();

    
    ?>

    
    <!-- Main Content Area -->
     <main id="main-content">
        <!-- Hero Section with Swiper -->
<section id="home" class="relative overflow-hidden" style="height:100vh;">

<div class="swiper hero-swiper" style="height:100%; width:100%;">

<div class="swiper-wrapper" style="height:100%;">

<!-- ================= SLIDE 1 ================= -->
    <div class="swiper-slide relative" style="height:100%;">

    <div class="absolute inset-0 bg-cover bg-center"
    style="background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[0]['PIC_NAME']); ?>')"></div>

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

    <div class="max-w-4xl">
    <h1 class="text-4xl md:text-7xl font-bold mb-4">
    सह्याद्री <span class="text-accent">अन्वेषण</span>
    </h1>

    <p class="text-lg md:text-2xl mb-6">
    सह्याद्रीच्या गड-किल्ल्यांची सफर
    </p>

    <div class="flex flex-wrap justify-center gap-3">
    <a href="./treks.php" class="btn btn-primary">ट्रेक सुरू करा</a>
    <a href="./trek_schedule.php" class="btn btn-secondary">ट्रेक वेळापत्रक</a>
    </div>
    </div>
    </div>
    </div>

        <!-- ================= SLIDE 2 ================= -->
        <div class="swiper-slide relative" style="height:100%;">

        <div class="absolute inset-0 bg-cover bg-center"
        style="background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[1]['PIC_NAME']); ?>')"></div>

        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

        <div class="max-w-4xl">
        <h1 class="text-4xl md:text-7xl font-bold mb-4">
        ऐतिहासिक <span class="text-accent">किल्ले</span>
        </h1>

        <p class="text-lg md:text-2xl mb-6">
        ३५०+ किल्ल्यांची माहिती
        </p>

        <a href="./fort_information.php" class="btn btn-primary">किल्ले पहा</a>
        </div>
        </div>
        </div>

        <!-- ================= UPCOMING TREK ================= -->
        <?php if ($heroTrek): ?>
        <div class="swiper-slide relative" style="height:100%;">

        <div class="absolute inset-0 bg-cover bg-center"
        style="background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[2]['PIC_NAME']); ?>')"></div>

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

        <div class="max-w-4xl">

        <span class="inline-block mb-3 px-4 py-1 text-sm font-semibold bg-accent text-black rounded-full">
        आगामी ट्रेक
        </span>

        <h1 class="text-4xl md:text-6xl font-bold mb-4">
        <?= htmlspecialchars($heroTrek['Place']) ?>
        </h1>

        <p class="mb-6">
        📅 <?= date('d F Y', strtotime($heroTrek['TrekDate'])) ?>
        </p>

        <div class="flex justify-center gap-3">
        <a href="./trek-details.php?id=<?= $heroTrek['TrekId'] ?>" class="btn btn-primary">तपशील</a>
        <a href="./trek_schedule.php" class="btn btn-secondary">संपूर्ण वेळापत्रक</a>
        </div>

        </div>
        </div>
        </div>
        <?php endif; ?>

<!-- ================= EXPLORE GALLERY ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[3]['PIC_NAME']); ?>')"></div>

<div class="absolute inset-0 bg-black/60"></div>

<div class="relative z-20 h-full flex items-center justify-center text-white px-4">

<div class="max-w-5xl w-full">

<h1 class="text-3xl md:text-5xl font-bold text-center mb-2">
आमची <span class="text-accent">गॅलरी</span>
</h1>

<p class="text-center text-sm md:text-lg opacity-80 mb-6">
किल्ले, नकाशे आणि कलाकृती
</p>

<div class="grid grid-cols-3 gap-4">

<div class="group relative h-40 md:h-64 rounded-xl overflow-hidden">
<a href="./gallery/fort-gallery.php">
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
style="background-image:url('../assets/images/Photos/Fort/Aad_Fort1.jpg')"></div>
<div class="absolute inset-0 bg-black/50"></div>
<div class="relative z-10 h-full flex items-end p-3 font-bold">किल्ले</div>
</a>
</div>

<div class="group relative h-40 md:h-64 rounded-xl overflow-hidden">
<a href="./gallery/map-gallery.php">
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
style="background-image:url('../assets/images/Photos/Maps/MapImages/Arnala.jpg')"></div>
<div class="absolute inset-0 bg-black/50"></div>
<div class="relative z-10 h-full flex items-end p-3 font-bold">नकाशे</div>
</a>
</div>

<div class="group relative h-40 md:h-64 rounded-xl overflow-hidden">
<a href="./gallery/sketches-gallery.php">
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
style="background-image:url('../assets/images/Photos/CATEGORY/Sketches/sketch_1.jpg')"></div>
<div class="absolute inset-0 bg-black/50"></div>
<div class="relative z-10 h-full flex items-end p-3 font-bold">रेखाचित्रे</div>
</a>
</div>

</div>
</div>
</div>
</div>


<!-- ================= NATURE OF SAHYADRI ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[4]['PIC_NAME']); ?>')"></div>

<div class="absolute inset-0 bg-black/60"></div>

<div class="relative z-20 h-full flex items-center justify-center text-white px-4">

<div class="max-w-5xl w-full">

<h1 class="text-3xl md:text-5xl font-bold text-center mb-2">
सह्याद्रीचा <span class="text-accent">निसर्ग</span>
</h1>

<p class="text-center text-sm md:text-lg opacity-80 mb-6">
फुलपाखरे, गुहा आणि रानफुले
</p>

<div class="grid grid-cols-3 gap-4">

<div class="group relative h-40 md:h-64 rounded-xl overflow-hidden">
<a href="./gallery/butterfly-gallery.php">
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
style="background-image:url('../assets/images/Photos/CATEGORY/Butterfly/Baronet-1.jpg')"></div>
<div class="absolute inset-0 bg-black/50"></div>
<div class="relative z-10 h-full flex items-end p-3 font-bold">फुलपाखरे</div>
</a>
</div>

<div class="group relative h-40 md:h-64 rounded-xl overflow-hidden">
<a href="./gallery/caves-gallery.php">
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
style="background-image:url('../assets/images/Photos/CATEGORY/Cave/lonad2.jpg')"></div>
<div class="absolute inset-0 bg-black/50"></div>
<div class="relative z-10 h-full flex items-end p-3 font-bold">गुहा</div>
</a>
</div>

<div class="group relative h-40 md:h-64 rounded-xl overflow-hidden">
<a href="./gallery/flower-gallery.php">
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
style="background-image:url('../assets/images/Photos/CATEGORY/Flower/Flower56.jpg')"></div>
<div class="absolute inset-0 bg-black/50"></div>
<div class="relative z-10 h-full flex items-end p-3 font-bold">फुले</div>
</a>
</div>

</div>
</div>
</div>
</div>

<!-- ================= SHIVAJI ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[5]['PIC_NAME']); ?>')"></div>

<div class="absolute inset-0 bg-black/70"></div>

<div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

<div class="max-w-4xl">

<h1 class="text-4xl md:text-6xl font-extrabold mb-4">
छत्रपती शिवाजी महाराज
</h1>

<p class="mb-6">
स्वराज्याचे संस्थापक – गडकोटांचे रक्षक
</p>

<a href="./shivaji_maharaja.php" class="px-8 py-3 bg-accent text-black font-bold rounded-lg">
इतिहास वाचा
</a>

</div>
</div>
</div>

</div>

<div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-t from-black/80 to-transparent z-20"></div>


<!-- ===== Stats Bar ===== -->
<div class="absolute bottom-0 left-0 w-full z-30 px-3 pb-4">
<div class="max-w-6xl mx-auto">

<div class="grid grid-cols-3 gap-2 sm:gap-4 bg-black/50 backdrop-blur-md rounded-xl p-3 text-center text-white">

    <div>
    <div class="text-xl sm:text-3xl font-bold text-accent"><?= $stats['forts'] ?>+</div>
    <div class="text-xs sm:text-sm">Forts</div>
    </div>

    <div>
    <div class="text-xl sm:text-3xl font-bold text-accent"><?= $stats['treks'] ?>+</div>
    <div class="text-xs sm:text-sm">Treks</div>
    </div>

    <div>
    <div class="text-xl sm:text-3xl font-bold text-accent"><?= $stats['photos'] ?>+</div>
    <div class="text-xs sm:text-sm">Photos</div>
    </div>

</div>
</div>
</div>

<div class="swiper-pagination"></div>
<div class="swiper-button-next text-white"></div>
<div class="swiper-button-prev text-white"></div>

</div>
</section>

        <!-- Quick Stats Section -->
      <!--  <section class="py-16 bg-cream-light dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="transform hover:scale-105 transition-transform">
                        <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="350">0</div>
                        <div class="text-gray-600 dark:text-gray-300">Forts</div>
                    </div>
                    <div class="transform hover:scale-105 transition-transform">
                        <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="1000">0</div>
                        <div class="text-gray-600 dark:text-gray-300">Trekkers</div>
                    </div>
                    <div class="transform hover:scale-105 transition-transform">
                        <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="50">0</div>
                        <div class="text-gray-600 dark:text-gray-300">Monthly Treks</div>
                    </div>
                    <div class="transform hover:scale-105 transition-transform">
                        <div class="text-4xl font-bold text-primary dark:text-accent mb-2 animate-number" data-target="15">0</div>
                        <div class="text-gray-600 dark:text-gray-300">Years Experience</div>
                    </div>
                </div>
            </div>
        </section>-->
            <!--   <section class="py-16 bg-cream-light dark:bg-gray-800">
                    <div class="container mx-auto px-4">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">

                            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                                        transform hover:-translate-y-2 transition-all duration-300">
                                <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                                    <?= $stats['forts'] ?>+
                                </div>
                                <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                                ऐतिहासिक किल्ले
                                </div>
                            </div>

                            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                                        transform hover:-translate-y-2 transition-all duration-300">
                                <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                                    <?= $stats['treks'] ?>+
                                </div>
                                <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                                ट्रेक कार्यक्रम
                                </div>
                            </div>

                            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                                        transform hover:-translate-y-2 transition-all duration-300">
                                <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                                    <?= $stats['photos'] ?>+
                                </div>
                                <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                                    छायाचित्रे
                                </div>
                            </div>

                        </div>
                    </div>
            </section>-->


<?php  include 'home_section_slider_round.php' ?>

        <!-- Upcoming Treks Section -->
<section id="treks" class="relative py-24 bg-white dark:bg-gray-900"
        style="
        background-image:url('../assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[4]['PIC_NAME']); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        ">

        <!-- Dark overlay for readability -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

        <div class="relative container mx-auto px-4">

        <!-- Heading -->
        <div class="text-center mb-16">

        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">
        आगामी ट्रेक्स
        </h2>

        <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
        आगामी ट्रेक कार्यक्रम – तुमच्या आवडत्या स्थळांचा शोध घेण्यासाठी सज्ज व्हा
        </p>

        </div>

        <?php if ($treks && $treks->num_rows > 0): ?>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        <?php while ($t = $treks->fetch_assoc()): ?>

        <a href="./trek-details.php?id=<?= $t['TrekId'] ?>"
        class="group bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">

        <!-- Top Initial -->
        <div class="h-40 bg-gradient-to-br from-primary to-green-700 flex items-center justify-center text-white text-4xl font-bold">
        <?= strtoupper(substr($t['Place'], 0, 1)) ?>
        </div>

        <div class="p-6">

        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary">
        <?= htmlspecialchars($t['Place']) ?>
        </h3>

        <div class="text-sm text-gray-600 dark:text-gray-300 mb-1">
        <i class="fas fa-calendar mr-1"></i>
        <?= date('d M Y', strtotime($t['TrekDate'])) ?>
        </div>

        <div class="text-sm text-gray-600 dark:text-gray-300 mb-5">
        <i class="fas fa-user mr-1"></i>
        <?= htmlspecialchars($t['Leader']) ?>
        </div>

        <span class="block text-center bg-primary text-white py-2 rounded-lg text-sm font-medium">
        ट्रेक पहा
        </span>

        </div>

        </a>

        <?php endwhile; ?>

        </div>

        <?php else: ?>

        <!-- Empty State -->
        <div class="max-w-xl mx-auto text-center bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-3xl p-10 shadow-xl">

        <div class="text-6xl mb-4">🥾</div>

        <h3 class="text-3xl font-bold mb-3 text-gray-900 dark:text-white">
        सध्या कोणतेही ट्रेक उपलब्ध नाहीत
        </h3>

        <p class="text-gray-600 dark:text-gray-300 mb-6">
        आम्ही पुढील साहसी प्रवासाची योजना करत आहोत. लवकरच भेट द्या!
        </p>

        <a href="./gallery/gallery.php"
        class="inline-block bg-primary text-white px-8 py-3 rounded-lg">
        गॅलरी पहा
        </a>

        </div>

        <?php endif; ?>

        </div>
</section>


<?php include 'home_section_left_right.php'  ?>


<!-- Features Grid Section -->
<section class="py-20 bg-cream-light dark:bg-gray-800" style="background: linear-gradient(to bottom, #fff7ed, #fde68a);">
        <div class="container mx-auto px-4 ">

            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4 pb-2 pt-4">
                    आमच्यासोबत सह्याद्रीचा शोध घ्या
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    आमच्यासोबत सह्याद्रीचे नैसर्गिक सौंदर्य अनुभवा
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Fort Information -->
                <a href="./fort_information.php" class="block h-full group focus:outline-none">
                    <div class="card hover-lift p-8 h-full flex flex-col">

                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-info text-2xl text-white"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                            किल्ल्यांची माहिती
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            ४०० पेक्षा अधिक किल्ल्यांची सविस्तर माहिती, छायाचित्रे व नकाशांसह
                        </p>

                        <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                            अधिक जाणून घ्या →
                        </span>
                    </div>
                </a>

                <!-- Maps -->
                <a href="./gallery/map-gallery.php" class="block h-full group focus:outline-none">
                    <div class="card hover-lift p-8 h-full flex flex-col">

                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-map text-2xl text-white"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                            नकाशे
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            किल्ले व आजूबाजूच्या परिसराचे सविस्तर नकाशे – मार्गदर्शनासाठी उपयुक्त
                        </p>

                        <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                            नकाशे पहा →
                        </span>
                    </div>
                </a>

                <!-- Upcoming Treks -->
                <a href="./trek_schedule.php" class="block h-full group focus:outline-none">
                    <div class="card hover-lift p-8 h-full flex flex-col">

                        <div class="w-16 h-16 bg-earth rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-comments text-2xl text-white"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                            आगामी ट्रेक्स
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            सह्याद्रीतील आगामी ट्रेक्सची माहिती, अनुभवांची देवाणघेवाण व मार्गदर्शन
                        </p>

                        <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                            वेळापत्रक पहा →
                        </span>
                    </div>
                </a>

                <!-- Picture Gallery -->
                <a href="./gallery/gallery.php" class="block h-full group focus:outline-none">
                    <div class="card hover-lift p-8 h-full flex flex-col">

                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-images text-2xl text-white"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                            छायाचित्र संग्रह
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            किल्ले, फुलपाखरे, गुहा, फुले व निसर्गाची मनमोहक छायाचित्रे
                        </p>

                        <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                            संग्रह पहा →
                        </span>
                    </div>
                </a>

                <!-- King Shivaji Maharaj -->
                <a href="./shivaji_maharaja.php" class="block h-full group focus:outline-none">
                    <div class="card hover-lift p-8 h-full flex flex-col">

                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                            छत्रपती शिवाजी महाराज
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            महान मराठा योद्धा छत्रपती शिवाजी महाराज व त्यांच्या किल्ल्यांची माहिती
                        </p>

                        <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                            अधिक वाचा →
                        </span>
                    </div>
                </a>

                <!-- E-Magazine -->
                <a href="./emagazine.php" class="block h-full group focus:outline-none">
                    <div class="card hover-lift p-8 h-full flex flex-col">

                        <div class="w-16 h-16 bg-earth rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-book text-2xl text-white"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                            ई-मॅगझिन
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            ट्रेकशितीज संस्थेचे ई-मॅगझिन – किल्ले, निसर्ग व तज्ज्ञ मार्गदर्शन
                        </p>

                        <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                            मॅगझिन वाचा →
                        </span>
                    </div>
                </a>

            </div>
        </div>
</section>


        <!-- Newsletter Section -->
     <!--   <section class="py-20 bg-gradient-nature text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Stay Updated</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Subscribe to get updates about upcoming treks, fort information, and trekking tips
                </p>
                <form class="newsletter-form max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Enter your email" 
                        class="flex-1 px-6 py-3 rounded-l-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-accent"
                        required
                    >
                    <button 
                        type="submit" 
                        class="bg-accent hover:bg-primary px-8 py-3 rounded-r-full font-semibold transition-colors"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </section>-->
    </main>

    <!-- Include Footer Component -->
    <?php include './../includes/footer_marathi.php'; ?>

    <!-- External Scripts -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Main JavaScript File -->
    <script src="./../assets/js/main.js"></script>

    <!-- Google Analytics Placeholder -->
    <script>
        // Add your Google Analytics tracking code here
        // gtag('config', 'GA_MEASUREMENT_ID');
    </script>

</body>
</html>