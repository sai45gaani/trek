   
    <!-- Include Header Component -->
    <?php 
    $page_title = "Trekshitz - Explore Sahyadri Mountains | Trekking Adventures";
    $meta_description = "Explore the beautiful Sahyadri mountains with Trekshitz. Join our trekking adventures, discover ancient forts, and connect with nature.";
    $meta_keywords = "trekking, sahyadri, forts, hiking, adventure, nature, maharashtra, mountains";

    require_once './config/database.php';
    include 'includes/header.php'; 
    $db = new Database();
    $conn = $db->getConnection();

        /* ================= STATS ================= */
        $stats = [
            'forts' => $conn->query("SELECT COUNT(*) c FROM ei_tblfortinfo")->fetch_assoc()['c'],
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
            FROM ei_tblfortinfo f
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
            FROM ei_tblfortinfo f
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

    <style>
        /* ===== FIX HERO SWIPER FULL HEIGHT ===== */

#home .swiper,
#home .swiper-wrapper,
#home .swiper-slide {
    height: 100%;
}
        </style>
    <!-- Main Content Area -->
     <main id="main-content">
        <!-- Hero Section with Swiper -->
<section id="home" class="relative overflow-hidden" style="height:100vh;">

<div class="swiper hero-swiper" style="height:100%; width:100%;">

<div class="swiper-wrapper" style="height:100%;">

<!-- ================= SLIDE 1 ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[0]['PIC_NAME']); ?>')">
</div>

<div class="absolute inset-0 bg-black/40"></div>

<div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

<div class="max-w-4xl">
<h1 class="text-4xl md:text-7xl font-bold mb-4">
Explore <span class="text-accent">Sahyadri</span>
</h1>

<p class="text-lg md:text-2xl mb-6">
Climb the majestic peaks of Sahyadri
</p>

<div class="flex flex-wrap justify-center gap-3">
<a href="./treks.php" class="btn btn-primary">Start Journey</a>
<a href="./trek_schedule.php" class="btn btn-secondary">View Treks</a>
</div>
</div>

</div>
</div>


<!-- ================= SLIDE 2 ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[1]['PIC_NAME']); ?>')">
</div>

<div class="absolute inset-0 bg-black/40"></div>

<div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

<div class="max-w-4xl">
<h1 class="text-4xl md:text-7xl font-bold mb-4">
Ancient <span class="text-accent">Forts</span>
</h1>

<p class="text-lg md:text-2xl mb-6">
Information about 350+ forts
</p>

<a href="./fort_information.php" class="btn btn-primary">Explore Forts</a>
</div>

</div>
</div>


<!-- ================= UPCOMING TREK ================= -->
<?php if ($heroTrek): ?>
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[2]['PIC_NAME']); ?>')">
</div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

<div class="max-w-4xl">

<span class="inline-block mb-3 px-4 py-1 text-sm font-semibold bg-accent text-black rounded-full">
Upcoming Trek
</span>

<h1 class="text-4xl md:text-6xl font-bold mb-4">
<?= htmlspecialchars($heroTrek['Place']) ?>
</h1>

<p class="text-lg md:text-xl mb-6">
📅 <?= date('d F Y', strtotime($heroTrek['TrekDate'])) ?>
</p>

<div class="flex flex-wrap justify-center gap-3">
<a href="./trek-details.php?id=<?= $heroTrek['TrekId'] ?>" class="btn btn-primary">View Details</a>
<a href="./trek_schedule.php" class="btn btn-secondary">Full Schedule</a>
</div>

</div>
</div>
</div>
<?php endif; ?>


<!-- ================= EXPLORE GALLERY ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[3]['PIC_NAME']); ?>')">
</div>

<div class="absolute inset-0 bg-black/60"></div>

<div class="relative z-20 h-full flex items-center justify-center text-white px-4">

<div class="max-w-5xl w-full">

<h1 class="text-3xl md:text-5xl font-bold text-center mb-6">
Explore Our <span class="text-accent">Gallery</span>
</h1>

<div class="grid grid-cols-3 gap-3 sm:gap-5">

<!-- Fort Gallery -->
<a href="./gallery/fort-gallery.php"
class="group relative h-32 sm:h-48 md:h-64 rounded-xl overflow-hidden">

<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition duration-300"
style="background-image:url('./assets/images/Photos/Fort/Aad_Fort1.jpg')"></div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-10 h-full flex flex-col justify-end p-3">
<h3 class="text-sm sm:text-lg font-bold">Fort Photos</h3>
<p class="text-xs sm:text-sm opacity-80">Historic forts of Sahyadri</p>
</div>

</a>


<!-- Maps Gallery -->
<a href="./gallery/map-gallery.php"
class="group relative h-32 sm:h-48 md:h-64 rounded-xl overflow-hidden">

<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition duration-300"
style="background-image:url('./assets/images/Photos/Maps/MapImages/Arnala.jpg')"></div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-10 h-full flex flex-col justify-end p-3">
<h3 class="text-sm sm:text-lg font-bold">Fort Maps</h3>
<p class="text-xs sm:text-sm opacity-80">Routes & Navigation</p>
</div>

</a>


<!-- Sketches Gallery -->
<a href="./gallery/sketches-gallery.php"
class="group relative h-32 sm:h-48 md:h-64 rounded-xl overflow-hidden">

<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition duration-300"
style="background-image:url('./assets/images/Photos/CATEGORY/Sketches/sketch_1.jpg')"></div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-10 h-full flex flex-col justify-end p-3">
<h3 class="text-sm sm:text-lg font-bold">Sketches</h3>
<p class="text-xs sm:text-sm opacity-80">Art Inspired by Forts</p>
</div>

</a>

</div>
</div>
</div>
</div>
<!-- ================= NATURE ================= -->
<!-- ================= NATURE OF SAHYADRI ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[4]['PIC_NAME']); ?>')">
</div>

<div class="absolute inset-0 bg-black/60"></div>

<div class="relative z-20 h-full flex items-center justify-center text-white px-4">

<div class="max-w-5xl w-full">

<h1 class="text-3xl md:text-5xl font-bold text-center mb-6">
Nature of <span class="text-accent">Sahyadri</span>
</h1>

<div class="grid grid-cols-3 gap-3 sm:gap-5">

<!-- Butterflies -->
<a href="./gallery/butterfly-gallery.php"
class="group relative h-32 sm:h-48 md:h-64 rounded-xl overflow-hidden">

<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition duration-300"
style="background-image:url('./assets/images/Photos/CATEGORY/Butterfly/Baronet-1.jpg')"></div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-10 h-full flex flex-col justify-end p-3">
<h3 class="text-sm sm:text-lg font-bold">Butterflies</h3>
<p class="text-xs sm:text-sm opacity-80">Beautiful Sahyadri butterfly species</p>
</div>

</a>


<!-- Caves -->
<a href="./gallery/caves-gallery.php"
class="group relative h-32 sm:h-48 md:h-64 rounded-xl overflow-hidden">

<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition duration-300"
style="background-image:url('./assets/images/Photos/CATEGORY/Cave/lonad2.jpg')"></div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-10 h-full flex flex-col justify-end p-3">
<h3 class="text-sm sm:text-lg font-bold">Caves</h3>
<p class="text-xs sm:text-sm opacity-80">Ancient and natural cave formations</p>
</div>

</a>


<!-- Flowers -->
<a href="./gallery/flower-gallery.php"
class="group relative h-32 sm:h-48 md:h-64 rounded-xl overflow-hidden">

<div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition duration-300"
style="background-image:url('./assets/images/Photos/CATEGORY/Flower/Flower56.jpg')"></div>

<div class="absolute inset-0 bg-black/50"></div>

<div class="relative z-10 h-full flex flex-col justify-end p-3">
<h3 class="text-sm sm:text-lg font-bold">Flowers</h3>
<p class="text-xs sm:text-sm opacity-80">Seasonal Sahyadri wildflowers</p>
</div>

</a>

</div>
</div>
</div>
</div>
<!-- ================= SHIVAJI ================= -->
<div class="swiper-slide relative" style="height:100%;">

<div class="absolute inset-0 bg-cover bg-center"
style="background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[5]['PIC_NAME']); ?>')">
</div>

<div class="absolute inset-0 bg-black/70"></div>

<div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">

<div class="max-w-4xl">
<h1 class="text-4xl md:text-6xl font-extrabold mb-4">
Chhatrapati Shivaji Maharaj
</h1>

<a href="./shivaji_maharaja.php"
class="px-8 py-3 bg-accent text-black font-bold rounded-lg">
Read Legacy
</a>
</div>

</div>
</div>


</div>


<!-- ===== Bottom Fade ===== -->
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
</section>        <!-- Quick Stats Section -->
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
<!--               <section class="py-16 bg-cream-light dark:bg-gray-800">
                        <div class="container mx-auto px-4">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">

                                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                                            transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                                        <?= $stats['forts'] ?>+
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                                        Historic Forts
                                    </div>
                                </div>

                                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                                            transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                                        <?= $stats['treks'] ?>+
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                                        Trek Programs
                                    </div>
                                </div>

                                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                                            transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                                        <?= $stats['photos'] ?>+
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                                        Photographs
                                    </div>
                                </div>

                            </div>
                        </div>
                </section>
-->
<?php  include 'home_section_slider_round.php' ?>

        <section id="treks" class="relative py-24 bg-white dark:bg-gray-900"
                style="
                background-image:url('assets/images/Photos/Home/<?php echo rawurlencode($gallery_home_page[4]['PIC_NAME']); ?>');
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
                        Upcoming Treks
                        </h2>

                        <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
                        Upcoming trek programs – get ready to explore your favorite destinations
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
                        View Trek
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
                        No Upcoming Treks
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                        We’re planning our next adventures. Stay tuned!
                        </p>

                        <a href="./gallery/gallery.php"
                        class="inline-block bg-primary text-white px-8 py-3 rounded-lg">
                        Explore Gallery
                        </a>

                        </div>

                        <?php endif; ?>

                        </div>
        </section>


<?php include 'home_section_left_right.php'  ?>
        <!-- Upcoming Treks Section -->



<!-- Features Grid Section -->
<section class="py-20 bg-cream-light dark:bg-gray-800" style="background: linear-gradient(to bottom, #fff7ed, #fde68a);">
    <div class="container mx-auto px-4">

        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4">
                Explore With Us
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Experience the beauty of Sahyadri with us
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
                        Fort Information
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Detailed information about 350+ forts, photographs and maps included
                    </p>

                    <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                        View Forts →
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
                        Maps
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Detailed maps of forts and surrounding regions for better navigation
                    </p>

                    <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                        View Maps →
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
                        Upcoming Treks
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Connect with fellow trekkers, share experiences and get guidance
                    </p>

                    <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                        View Schedule →
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
                        Picture Gallery
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Forts, Butterflies, Caves, Flowers and more beautiful captures
                    </p>

                    <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                        View Gallery →
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
                        King Shivaji Maharaj
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Learn about the great Maratha warrior king and his forts
                    </p>

                    <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                        Read More →
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
                        E-Magazine
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Trekshitiz organization's e-magazine: forts, nature, expert guidance
                    </p>

                    <span class="mt-auto text-primary dark:text-accent font-semibold hover:underline">
                        Read Magazine →
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
    <?php include 'includes/footer.php'; ?>

    <!-- External Scripts -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Main JavaScript File -->
    <script src="assets/js/main.js"></script>

    <!-- Google Analytics Placeholder -->
    <script>
        // Add your Google Analytics tracking code here
        // gtag('config', 'GA_MEASUREMENT_ID');
    </script>

</body>
</html>