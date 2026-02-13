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
                                   सह्याद्रीचा <span class="text-accent">शोध</span>
                                </h1>
                                <p class="text-xl md:text-2xl mb-8 opacity-90">
                                    सह्याद्रीच्या पर्वतरांगांमध्ये ट्रेकिंग आणि किल्ले अनुभवण्यासाठी आमच्यासोबत या
                                </p>
                                <div class="space-x-4">
                                    <a href="./trek_schedule.php">
                                    <button class="btn btn-primary">
                                       तुमचा प्रवास सुरू करा
                                    </button>
                                    </a>
                                    <a href="./treks.php">
                                    <button class="btn btn-secondary">
                                         ट्रेक्स पहा
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
                                    ऐतिहासिक <span class="text-accent">किल्ले</span>
                                </h1>
                                <p class="text-xl md:text-2xl mb-8 opacity-90">
                                     ३५०+ किल्ल्यांची सविस्तर माहिती, इतिहास आणि ट्रेक मार्गदर्शन
                                </p>
                                <div class="space-x-4">
                                    <a href="./fort_information.php">
                                    <button class="btn btn-primary">
                                    किल्ले पाहा
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
                                                आगामी ट्रेक
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
                                               सह्याद्रीतील आणखी एका अविस्मरणीय साहसासाठी आमच्यासोबत सहभागी व्हा
                                            </p>

                                            <div class="flex justify-center gap-4 flex-wrap">
                                                <a href="./trek-details.php?id=<?= $heroTrek['TrekId'] ?>"
                                                class="px-8 py-3 bg-primary text-white rounded-full font-semibold hover:bg-secondary transition">
                                                     तपशील पहा
                                                </a>

                                                <a href="./trek_schedule.php"
                                                class="px-8 py-3 text-white rounded-full font-semibold hover:bg-white hover:text-black transition btn-secondary">
                                                    संपूर्ण वेळापत्रक
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
                                        नवीन ट्रेक वेळापत्रक
                                    </span>

                                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                                        सध्या ट्रेक उपलब्ध नाहीत
                                    </h1>

                                    <p class="text-xl md:text-2xl mb-8 opacity-90 leading-relaxed">
                                        सध्या सह्याद्री पर्वतरांगांतील पुढील साहसांचे नियोजन सुरू आहे.
                                        नवीन ट्रेक वेळापत्रक लवकरच जाहीर केले जाईल.
                                    </p>

                                    <div class="flex justify-center gap-4 flex-wrap">
                                        <a href="./gallery/gallery.php"
                                        class="px-8 py-3 bg-accent text-black rounded-full font-semibold hover:bg-primary hover:text-white transition">
                                           छायाचित्र संग्रह पहा
                                        </a>

                                        <!--<a href="/contact"
                                        class="px-8 py-3 border border-white text-white rounded-full font-semibold hover:bg-white hover:text-black transition">
                                           सूचना मिळवा
                                        </a>-->
                                    </div>

                                    <p class="mt-6 text-sm opacity-70">
                                        आगामी ट्रेक घोषणांसाठी आमचे अनुसरण करा
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
                                           आमची <span class="text-accent">फोटो गॅलरी</span> पहा
                                        </h1>

                                        <div class="grid md:grid-cols-3 gap-6">
                                            
                                            <!-- Fort Gallery -->
                                           <a href="./gallery/fort-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Fort/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">किल्ल्यांचे फोटो</h3>
                                                    <p class="text-sm opacity-80">सह्याद्रीचे ऐतिहासिक किल्ले</p>
                                                </div>
                                            </a>

                                            <!-- Maps Gallery -->
                                             <a href="./gallery/map-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Maps/MapImages/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">किल्ल्यांचे नकाशे</h3>
                                                    <p class="text-sm opacity-80">मार्गदर्शन</p>
                                                </div>
                                            </a>

                                            <!-- Sketches -->
                                            <a href="./gallery/sketches-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Sketches/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">रेखाचित्रे</h3>
                                                    <p class="text-sm opacity-80">किल्ल्यांवर आधारित कला</p>
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
                                                सह्याद्रीची <span class="text-accent">निसर्गसंपदा</span>
                                            </h1>

                                         
                                            <div class="grid md:grid-cols-3 gap-6">
                                            
                                            <!-- Fort Gallery -->
                                            <a href="./gallery/butterfly-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Fort/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">फुलपाखरांचे फोटो</h3>
                                                    <p class="text-sm opacity-80">फुलपाखरे</p>
                                                </div>
                                            </a>

                                            <!-- Maps Gallery -->
                                            <a href="./gallery/caves-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Maps/MapImages/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">गुहांचे फोटो</h3>
                                                    <p class="text-sm opacity-80">गुहा</p>
                                                </div>
                                            </a>

                                            <!-- Sketches -->
                                            <a href="./gallery/flower-gallery.php"
                                            class="group relative h-64 rounded-xl overflow-hidden">
                                                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-110 transition"
                                                    style="background-image:url('/assets/images/Photos/Sketches/sample.jpg')"></div>
                                                <div class="absolute inset-0 bg-black/50"></div>
                                                <div class="relative z-10 h-full flex flex-col justify-end p-5">
                                                    <h3 class="text-2xl font-bold">फुलांचे फोटो</h3>
                                                    <p class="text-sm opacity-80">फुले</p>

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
                                                छत्रपती शिवाजी महाराज
                                            </h1>

                                            <p class="text-xl leading-relaxed mb-8 opacity-90">
                                                मराठा साम्राज्याचे संस्थापक · गनिमी काव्याचे जनक ·
                                                सह्याद्रीतील किल्ल्यांचे आत्मा
                                            </p>

                                            <a href="./shivaji_maharaja.php"
                                            class="inline-flex items-center px-8 py-3 bg-accent text-black font-bold rounded-lg hover:bg-primary transition">
                                                वारसा वाचा
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
                   ऐतिहासिक किल्ले
                </div>
            </div>

            <!-- Treks -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-md hover:shadow-xl 
                        transform hover:-translate-y-2 transition-all duration-300">
                <div class="text-4xl md:text-5xl font-extrabold text-primary dark:text-accent mb-3">
                    <?= $stats['treks'] ?>+
                </div>
                <div class="text-gray-600 dark:text-gray-300 text-lg font-medium">
                   ट्रेक कार्यक्रम
                </div>
            </div>

            <!-- Photos -->
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
</section>



        <!-- Upcoming Treks Section -->
        <section id="treks" class="py-20 bg-white dark:bg-gray-900">
                        <div class="container mx-auto px-4">

                            <!-- Section Heading -->
                            <div class="text-center mb-16">
                                <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4 p-4">
                                   आगामी ट्रेक
                                </h2>
                                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                                    आगामी ट्रेक कार्यक्रम – आपल्या आवडत्या स्थळांचा शोध घेण्यासाठी सज्ज व्हा
                                </p>
                            </div>

                            <?php if ($treks && $treks->num_rows > 0): ?>

                                <!-- Treks Grid -->
                                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                                   <?php while ($t = $treks->fetch_assoc()): ?>
                                        <a href="./trek-details.php?id=<?= $t['TrekId'] ?>"
                                        class="group block bg-white dark:bg-gray-800 rounded-2xl 
                                                overflow-hidden shadow-md hover:shadow-xl 
                                                transition-all duration-300 hover:-translate-y-1
                                                focus:outline-none cursor-pointer">

                                            <!-- Image Placeholder -->
                                            <div class="h-44 bg-gradient-to-br from-primary/80 to-primary 
                                                        flex items-center justify-center text-white text-3xl font-bold">
                                                <?= strtoupper(substr($t['Place'], 0, 1)) ?>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-6 flex flex-col h-full">

                                                <h3 class="text-2xl font-bold text-primary dark:text-accent mb-3 
                                                        group-hover:underline">
                                                    <?= htmlspecialchars($t['Place']) ?>
                                                </h3>

                                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                                                    <i class="fas fa-calendar mr-2"></i>
                                                    <?= date('d M Y', strtotime($t['TrekDate'])) ?>
                                                </div>

                                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-6">
                                                    <i class="fas fa-user mr-2"></i>
                                                    <?= htmlspecialchars($t['Leader']) ?>
                                                </div>

                                                <!-- Button LOOK only (card handles click) -->
                                                <span class="btn btn-primary w-full text-center pointer-events-none">
                                                    ट्रेक पहा
                                                </span>

                                            </div>
                                        </a>
                                    <?php endwhile; ?>

                                </div>

                            <?php else: ?>

                                <!-- No Treks Found UI -->
                                <div class="max-w-xl mx-auto text-center bg-gray-50 dark:bg-gray-800 
                                            p-12 rounded-3xl shadow-md">

                                    <div class="text-6xl mb-6">🥾</div>

                                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                                        सध्या नवीन ट्रेक नियोजित नाहीत
                                    </h3>

                                    <p class="text-gray-600 dark:text-gray-300 mb-8">
                                        सध्या आमच्या पुढील साहसांचे नियोजन सुरू आहे.
                                        थोडा वेळ थांबा - लवकरच रोमांचक ट्रेक येत आहेत!
                                    </p>

                                    <a href="./gallery/gallery.php" class="btn btn-primary px-8">
                                        गॅलरी पहा
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