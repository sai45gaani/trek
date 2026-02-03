   
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
            'forts' => $conn->query("SELECT COUNT(*) c FROM EI_tblFortInfo")->fetch_assoc()['c'],
            'treks' => $conn->query("SELECT COUNT(*) c FROM TS_tblTrekDetails")->fetch_assoc()['c'],
            'photos' => $conn->query("SELECT COUNT(*) c FROM pm_tblphotos_clean")->fetch_assoc()['c']
        ];

        /* ============ UPCOMING TREKS ============ */
        $treks = $conn->query("
            SELECT TrekId, Place, TrekDate, Leader 
            FROM TS_tblTrekDetails
            WHERE TrekDate >= CURDATE()
            ORDER BY TrekDate ASC
            LIMIT 4
        ");

        /* ============ FEATURED FORTS ============ */
        $forts = $conn->query("
            SELECT f.FortName, f.FortDistrict, p.PIC_NAME
            FROM EI_tblFortInfo f
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

                /* Slide 1: Upcoming Trek */
        $heroTrek = $conn->query("
            SELECT TrekId, Place, TrekDate , Grade
            FROM TS_tblTrekDetails
            WHERE TrekDate >= CURDATE()
            ORDER BY TrekDate ASC
            LIMIT 1
        ")->fetch_assoc();

        /* Slide 2: Featured Fort */
        $heroFort = $conn->query("
            SELECT f.FortName, f.FortDistrict, p.PIC_NAME
            FROM EI_tblFortInfo f
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
        <section id="home" class="relative h-screen overflow-hidden">
            <div class="swiper hero-swiper h-full">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');"></div>
                        <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">
                            <div class="max-w-4xl">
                                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                                    Explore <span class="text-accent">Sahyadri</span>
                                </h1>
                                <p class="text-xl md:text-2xl mb-8 opacity-90">
                                    Climb the majestic peaks of Sahyadri and embark on an unforgettable journey with nature
                                </p>
                                <div class="space-x-4">
                                    <a href="./trek_schedule.php">
                                    <button class="btn btn-primary">
                                        Start Your Journey
                                    </button>
                                    </a>
                                    <a href="./treks.php">
                                    <button class="btn btn-secondary">
                                        View Treks
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2 -->
                    <div class="swiper-slide relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');"></div>
                        <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">
                            <div class="max-w-4xl">
                                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                                    Ancient <span class="text-accent">Forts</span>
                                </h1>
                                <p class="text-xl md:text-2xl mb-8 opacity-90">
                                    Information about 350+ forts, their history and trekking guidance
                                </p>
                                <div class="space-x-4">
                                    <a href="./fort_information.php">
                                    <button class="btn btn-primary">
                                    Explore Forts
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                   <!-- <div class="swiper-slide relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1464822759844-d5709c4c2d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');"></div>
                        <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">
                            <div class="max-w-4xl">
                                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                                    Join Our <span class="text-accent">Community</span>
                                </h1>
                                <p class="text-xl md:text-2xl mb-8 opacity-90">
                                    A community of trekking enthusiasts - share experiences and make new friends
                                </p>
                                <div class="space-x-4">
                                    <button class="btn btn-primary">
                                        Join Community
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>-->
                            <!-- SLIDE 1: UPCOMING TREK -->
                    <?php if ($heroTrek): ?>
                                <div class="swiper-slide relative">

                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40 z-10"></div>

                                    <!-- Background image -->
                                    <div class="absolute inset-0 bg-cover bg-center"
                                        style="background-image:url('/assets/images/hero/trek-bg.jpg')">
                                    </div>

                                    <!-- Content -->
                                    <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">
                                        <div class="max-w-4xl">

                                            <span class="inline-block mb-4 px-5 py-1 text-sm font-semibold bg-accent text-black rounded-full">
                                                Upcoming Trek
                                            </span>

                                            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                                                <?= htmlspecialchars($heroTrek['Place']) ?>
                                            </h1>

                                            <p class="text-xl md:text-2xl mb-4 opacity-90">
                                                📅 <?= date('d F Y', strtotime($heroTrek['TrekDate'])) ?>
                                                <?php if (!empty($heroTrek['Grade'])): ?>
                                                    · 🥾 <?= htmlspecialchars($heroTrek['Grade']) ?>
                                                <?php endif; ?>
                                            </p>

                                            <p class="text-lg md:text-xl mb-8 opacity-80">
                                                Join us for another unforgettable Sahyadri adventure
                                            </p>

                                            <div class="flex justify-center gap-4 flex-wrap">
                                                <a href="./trek-details.php?id=<?= $heroTrek['TrekId'] ?>"
                                                class="px-8 py-3 bg-primary text-white rounded-full font-semibold hover:bg-secondary transition">
                                                    View Details
                                                </a>

                                                <a href="./trek_schedule.php"
                                                class="px-8 py-3 text-white rounded-full font-semibold hover:bg-white hover:text-black transition btn-secondary">
                                                    Full Schedule
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    <?php endif; ?>




                 <?php if (!$heroTrek): ?>
                        <div class="swiper-slide relative">

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40 z-10"></div>

                            <!-- Background -->
                            <div class="absolute inset-0 bg-cover bg-center"
                                style="background-image:url('/assets/images/hero/no-trek-bg.jpg')">
                            </div>

                            <!-- Content -->
                            <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-4">
                                <div class="max-w-4xl">

                                    <span class="inline-block mb-4 px-5 py-1 text-sm font-semibold bg-accent text-black rounded-full">
                                        Trek Schedule Update
                                    </span>

                                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                                        No Treks Scheduled Right Now
                                    </h1>

                                    <p class="text-xl md:text-2xl mb-8 opacity-90 leading-relaxed">
                                        We are currently planning our next adventures in the Sahyadri mountains.
                                        New trek schedules will be announced soon.
                                    </p>

                                    <div class="flex justify-center gap-4 flex-wrap">
                                        <a href="./gallery/gallery.php"
                                        class="px-8 py-3 bg-accent text-black rounded-full font-semibold hover:bg-primary hover:text-white transition">
                                            Explore Gallery
                                        </a>

                                        <!--<a href="/contact"
                                        class="px-8 py-3 border border-white text-white rounded-full font-semibold hover:bg-white hover:text-black transition">
                                            Get Notified
                                        </a>-->
                                    </div>

                                    <p class="mt-6 text-sm opacity-70">
                                        Follow us to stay updated with upcoming trek announcements
                                    </p>

                                </div>
                            </div>
                        </div>
                <?php endif; ?>


                    <div class="swiper-slide relative">
                                <div class="absolute inset-0 bg-black/70 z-10"></div>
                                <div class="absolute inset-0 bg-cover bg-center"
                                    style="background-image:url('/assets/images/hero/gallery-bg.jpg')"></div>

                                <div class="relative z-20 h-full flex items-center justify-center text-white px-6">
                                    <div class="max-w-6xl w-full">
                                        <h1 class="text-5xl font-bold text-center mb-10">
                                            Explore Our <span class="text-accent">Gallery</span>
                                        </h1>

                                        <div class="grid md:grid-cols-3 gap-6">
                                            
                                            <!-- Fort Gallery -->
                                            <a href="./gallery/fort-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Fort/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">Fort Photos</h3>
                                                    <p class="text-sm opacity-80">Historic forts of Sahyadri</p>
                                                </div>
                                            </a>

                                            <!-- Maps Gallery -->
                                            <a href="./gallery/map-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Maps/MapImages/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">Fort Maps</h3>
                                                    <p class="text-sm opacity-80">Routes & navigation</p>
                                                </div>
                                            </a>

                                            <!-- Sketches -->
                                            <a href="./gallery/sketches-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Sketches/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">Sketches</h3>
                                                    <p class="text-sm opacity-80">Art inspired by forts</p>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                    </div>

                    <div class="swiper-slide relative">
                                    <div class="absolute inset-0 bg-black/70 z-10"></div>
                                    <div class="absolute inset-0 bg-cover bg-center"
                                        style="background-image:url('/assets/images/hero/nature-bg.jpg')"></div>

                                    <div class="relative z-20 h-full flex items-center justify-center text-white px-6">
                                        <div class="max-w-6xl w-full">
                                            <h1 class="text-5xl font-bold text-center mb-10">
                                                Nature of <span class="text-accent">Sahyadri</span>
                                            </h1>

                                         
                                            <div class="grid md:grid-cols-3 gap-6">
                                            
                                            <!-- Fort Gallery -->
                                            <a href="./gallery/butterfly-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Fort/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">Butterfly Photos</h3>
                                                    <p class="text-sm opacity-80">Butterflies</p>
                                                </div>
                                            </a>

                                            <!-- Maps Gallery -->
                                            <a href="./gallery/caves-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Maps/MapImages/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">Caves Photos</h3>
                                                    <p class="text-sm opacity-80">Caves</p>
                                                </div>
                                            </a>

                                            <!-- Sketches -->
                                            <a href="./gallery/flower-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Sketches/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">Flowers Photos</h3>
                                                    <p class="text-sm opacity-80">Flowers</p>
                                                </div>
                                            </a>

                                        </div>
                                        </div>
                                    </div>
                    </div>

                    <div class="swiper-slide relative">
                                    <div class="absolute inset-0 bg-black/80 z-10"></div>
                                    <div class="absolute inset-0 bg-cover bg-center"
                                        style="background-image:url('/assets/images/hero/shivaji-bg.jpg')"></div>

                                    <div class="relative z-20 h-full flex items-center justify-center text-center text-white px-6">
                                        <div class="max-w-4xl">
                                            <h1 class="text-6xl font-extrabold mb-6 tracking-wide">
                                                Chhatrapati Shivaji Maharaj
                                            </h1>
                                            <p class="text-xl leading-relaxed mb-8 opacity-90">
                                                Founder of the Maratha Empire · Master of Guerrilla Warfare ·
                                                The soul behind Sahyadri forts
                                            </p>
                                            <a href="./shivaji_maharaja.php"
                                            class="inline-flex items-center px-8 py-3 bg-accent text-black font-bold rounded-lg hover:bg-primary transition">
                                                Read Legacy
                                            </a>
                                        </div>
                                    </div>
                    </div>
                </div>
                
                <!-- Navigation -->
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
               <section class="py-16 bg-cream-light dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">

            <!-- Forts -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                        transform hover:-translate-y-2 transition-all duration-300">
                <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                    <?= $stats['forts'] ?>+
                </div>
                <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                    Historic Forts
                </div>
            </div>

            <!-- Treks -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                        transform hover:-translate-y-2 transition-all duration-300">
                <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                    <?= $stats['treks'] ?>+
                </div>
                <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                    Trek Programs
                </div>
            </div>

            <!-- Photos -->
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



        <!-- Upcoming Treks Section -->
        <section id="treks" class="py-20 bg-white dark:bg-gray-900">
                        <div class="container mx-auto px-4">

                            <!-- Section Heading -->
                            <div class="text-center mb-16">
                                <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4 p-4">
                                    Upcoming Treks
                                </h2>
                                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                                    Upcoming trek programs – get ready to explore your favorite destinations
                                </p>
                            </div>

                            <?php if ($treks && $treks->num_rows > 0): ?>

                                <!-- Treks Grid -->
                                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                                    <?php while ($t = $treks->fetch_assoc()): ?>
                                        <div class="card hover-lift bg-white dark:bg-gray-800 rounded-2xl 
                                                    overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">

                                            <!-- Image Placeholder -->
                                            <div class="h-44 bg-gradient-to-br from-primary/80 to-primary 
                                                        flex items-center justify-center text-white text-3xl font-bold">
                                                <?= strtoupper(substr($t['Place'], 0, 1)) ?>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-6">
                                                <h3 class="text-2xl font-bold text-primary dark:text-accent mb-3">
                                                    <?= htmlspecialchars($t['Place']) ?>
                                                </h3>

                                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                                                    <i class="fas fa-calendar mr-2"></i>
                                                    <?= date('d M Y', strtotime($t['TrekDate'])) ?>
                                                </div>

                                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-5">
                                                    <i class="fas fa-user mr-2"></i>
                                                    By <?= htmlspecialchars($t['Leader']) ?>
                                                </div>

                                                <a href="./trek-details.php?id=<?= $t['TrekId'] ?>" 
                                                class="btn btn-primary w-full text-center">
                                                    View Trek
                                                </a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>

                                </div>

                            <?php else: ?>

                                <!-- No Treks Found UI -->
                                <div class="max-w-xl mx-auto text-center bg-gray-50 dark:bg-gray-800 
                                            p-12 rounded-3xl shadow-md">

                                    <div class="text-6xl mb-6">🥾</div>

                                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                                        No Upcoming Treks
                                    </h3>

                                    <p class="text-gray-600 dark:text-gray-300 mb-8">
                                        We’re currently planning our next adventures.  
                                        Stay tuned — exciting treks are coming soon!
                                    </p>

                                    <a href="./gallery/gallery.php" class="btn btn-primary px-8">
                                        Explore Gallery
                                    </a>
                                </div>

                <?php endif; ?>

            </div>
        </section>



<!-- Features Grid Section -->
<section class="py-20 bg-cream-light dark:bg-gray-800">
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
            <a href="./fort_in_english.php" class="block h-full group focus:outline-none">
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
                        Learn More →
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