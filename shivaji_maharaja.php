<?php
// Set page specific variables
$page_title = 'Chhatrapati Shivaji Maharaj | Founder of Swarajya | TrekshitiZ';
$meta_description = 'Complete historical information about Chhatrapati Shivaji Maharaj – founder of Swarajya, great Maratha warrior king, administrator, and visionary leader.';
$meta_keywords = 'Shivaji Maharaj, Maratha Empire, Maharashtra history, forts, battles, warrior king, swarajya';

// Include header
include './includes/header.php';
?>

<style>
/* Custom styles for Shivaji Maharaj theme */
.hero-slider {
    position: relative;
    height: 100vh;
    overflow: hidden;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.slide.active {
    opacity: 1;
}

.slide::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.8), rgba(255, 153, 51, 0.6));
    z-index: 1;
}

.slide-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
}

.royal-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 153, 51, 0.3);
    transition: all 0.3s ease;
}

.royal-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);
    border-color: #ff9933;
}

.section-indicator {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #dc2626, #ff9933);
    margin: 0 auto 2rem;
}

.maratha-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="maratha" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="%23ff9933" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23maratha)"/></svg>');
}

.timeline-item {
    border-left: 3px solid #ff9933;
    position: relative;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -8px;
    top: 1rem;
    width: 13px;
    height: 13px;
    border-radius: 50%;
    background: #dc2626;
    border: 3px solid #ff9933;
}

.saffron {
    color: #ff9933;
}

.maratha {
    color: #dc2626;
}

.bg-saffron {
    background-color: #ff9933;
}

.bg-maratha {
    background-color: #dc2626;
}

.text-saffron {
    color: #ff9933;
}

.text-maratha {
    color: #dc2626;
}

.hover\:text-saffron:hover {
    color: #ff9933;
}

.hover\:text-maratha:hover {
    color: #dc2626;
}

.hover\:bg-saffron:hover {
    background-color: #ff9933;
}

.hover\:bg-maratha:hover {
    background-color: #dc2626;
}

.from-maratha {
    --tw-gradient-from: #dc2626;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(220, 38, 38, 0));
}

.to-saffron {
    --tw-gradient-to: #ff9933;
}

.from-saffron {
    --tw-gradient-from: #ff9933;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(255, 153, 51, 0));
}

.to-maratha {
    --tw-gradient-to: #dc2626;
}

@media (max-width: 768px) {
    .hero-slider {
        height: 70vh;
    }
}
</style>
<main id="main-content" class="">
<section class="relative py-20 bg-gradient-to-br from-red-700 via-yellow-600 to-orange-500 text-white overflow-hidden">

    <!-- Floating Decorative Elements -->
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-5xl mx-auto">

            <!-- Title -->
            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up mt-6">
                Chhatrapati Shivaji Maharaj
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-4 opacity-95">
                Founder of Swarajya • The Great Maratha Warrior King
            </p>

            <!-- Tagline -->
            <p class="text-lg md:text-xl mb-8 opacity-85">
                A visionary ruler, brilliant strategist, and an eternal symbol of self-rule
            </p>

            <!-- Key Highlights -->
            <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    350+ Forts
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-flag mr-2"></i>
                    Swarajya
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    1630 – 1680
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-ship mr-2"></i>
                    Father of the Indian Navy
                </span>

            </div>

        </div>
    </div>
</section>


<!-- PREFACE IMAGE SECTION -->
<section class="py-16 bg-cream-medium dark:bg-gray-800">
    <div class="container mx-auto px-4">

        <div class="max-w-5xl mx-auto text-center">

            <!-- Image Card -->
            <div class="royal-card rounded-2xl overflow-hidden border border-mountain shadow-lg">

                <img 
    src="./shivaji/photos/maharaj_prastavna.jpg"
    alt="Chhatrapati Shivaji Maharaj - Preface"
    class="w-full  max-w-[700px] mx-auto h-auto max-h-[680px] object-contain"
/>


                <!-- Optional Caption -->
                <div class="bg-cream-light dark:bg-gray-900 p-6">
                    <p class="text-lg text-gray-800 dark:text-gray-200">
                        A visionary king who dreamed of Swarajya — a man of an era
                    </p>

                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        Chhatrapati Shivaji Maharaj — a visionary who reshaped Indian history
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>

        
        <!-- ABOUT SHIVAJI MAHARAJ -->
<section id="about" class="py-20 bg-cream-light dark:bg-gray-900">
    <div class="container mx-auto max-w-5xl px-4">

        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    About Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                The visionary founder of Swarajya and one of the greatest leaders in Indian history
            </p>
        </div>

        <!-- Content Card -->
        <div class="royal-card rounded-2xl p-8 md:p-10 space-y-6">

            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                Born in 1630 at <strong>Shivneri Fort</strong>, Chhatrapati Shivaji Maharaj emerged as a
                legendary ruler who reshaped the course of Indian history. He founded the
                <strong>Maratha Empire</strong> and established the concept of
                <strong>Swarajya</strong> (self-rule), grounded in justice, equality, and the welfare
                of the people.
            </p>

            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                A master military strategist, Shivaji Maharaj pioneered
                <strong>guerrilla warfare (Ganimi Kava)</strong>, built a formidable
                <strong>navy</strong>, and created a disciplined administrative system.
                His governance protected the land, culture, and dignity of the people while
                upholding values of tolerance, courage, and righteous rule.
            </p>

            <!-- Highlights -->
            <div class="flex flex-wrap gap-4 pt-6">

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-red-600 text-white text-sm font-semibold">
                    <i class="fas fa-flag mr-2"></i>
                    Founder of Swarajya
                </span>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-yellow-500 text-white text-sm font-semibold">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Military Strategist
                </span>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-green-600 text-white text-sm font-semibold">
                    <i class="fas fa-ship mr-2"></i>
                    Naval Visionary
                </span>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-gray-800 text-white text-sm font-semibold">
                    <i class="fas fa-users mr-2"></i>
                    People-Centric Ruler
                </span>

            </div>
        </div>

    </div>
</section>


<!-- Information Cards Section -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Information about Chhatrapati Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Detailed insights into the life, administration, warfare, and legacy of the great Maratha ruler
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Battles -->
            <a href="./shivaji/shivaji_battles.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-sword text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Battles of Shivaji Maharaj
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Detailed accounts of the major battles fought by Shivaji Maharaj, including strategies and outcomes.
                </p>
                <span href="./shivaji/shivaji_battles.php" class="text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </span>
            </div>
            </a>

            <!-- Books -->
            <a href="./shivaji/shivaji_maharaj_books.php" class="block group focus:outline-none">
             
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-teal-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-book text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Books & Literature
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Historical books, novels, and literary works written on the life and achievements of Shivaji Maharaj.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </span>
            </div>
            </a>
            <!-- Economic Policy -->
             
            <a href="./shivaji/shivaji_maharaj_economic_policy.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-coins text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Economic Policy
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Economic reforms, trade systems, taxation methods, and financial administration of the Maratha Empire.
                </p>
                <span class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </span>
            </div>
            </a>

            <!-- Photos -->
            
            <a href="./shivaji/shivaji_maharaj_photos.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-camera text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Photographs & Paintings
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Historic photographs, portraits, paintings, and artistic depictions of Shivaji Maharaj.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Navy -->
    
            <a href="./shivaji/shivaji_maharaj_navy_page.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-ship text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Maratha Navy
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The powerful naval force established by Shivaji Maharaj to protect the western coastline.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>
            <!-- Spy Network -->
             
            <a href="./shivaji/shivaji_maharaj_herchate.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-eye text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Intelligence & Spy Network
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The efficient intelligence system that played a vital role in military and administrative success.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Army -->
    
            <a href="./shivaji/shivaji_maharaj_lakshar_army.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Maratha Army
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Military organization, discipline, and the legendary structure of the Maratha army.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Justice -->
             
            <a href="./shivaji/shivaji_maharaj_justice.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-balance-scale text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Justice System
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Judicial system, legal reforms, and policies implemented during Shivaji Maharaj’s rule.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Factories -->
    
            <a href="./shivaji/shivaji_maharaj_factories.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-industry text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Industries & Workshops
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Industrial activities, production centers, and trade establishments during the Maratha period.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Palaces -->
    
            <a href="./shivaji/shivaji_maharaj_palaces.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-pink-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-landmark text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Palaces & Residences
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Royal palaces, architectural marvels, and residential complexes of the Maratha Empire.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Unknown Facts -->
    
            <a href="./shivaji/shivaji_maharaj_unknown_info.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-violet-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-question-circle text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Lesser-known Facts
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Rare, lesser-known, and interesting facts about Chhatrapati Shivaji Maharaj.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Songs -->
    
            <a href="./shivaji/shivaji_maharaj_songs.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-music text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Songs & Poetry
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Songs, poems, and musical tributes dedicated to the bravery and legacy of Shivaji Maharaj.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Shivbawani -->
    
            <a href="./shivaji/shivaji_maharaj_shivbhawani_all.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-amber-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-scroll text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – by Kavi Bhushan
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Classical poetry by Kavi Bhushan glorifying the valor and achievements of Shivaji Maharaj.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
</a>

            <!-- Shivbawani Part 2 -->
    <!--
            <a href="./shivaji/shivaji_battles.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-feather-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – Part II
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The second part of the famous Shivbawani poetry composed by the renowned poet Kavi Bhushan.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
            </a>
-->
        </div>
    </div>
</section>


<!-- KEY CONTRIBUTIONS -->
<section class="py-20 bg-cream-warm dark:bg-gray-800">
    <div class="container mx-auto max-w-6xl px-4">

        <!-- Section Header -->
        <div class="text-center mb-14">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Key Contributions
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                Enduring achievements that shaped the Maratha Empire and inspired generations
            </p>
        </div>

        <!-- Cards -->
        <div class="grid md:grid-cols-3 gap-8">

            <!-- Swarajya -->
            <div class="royal-card bg-cream-light dark:bg-gray-900 p-8 rounded-2xl border border-mountain text-center hover:shadow-xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-flag text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-primary mb-3">
                    Swarajya
                </h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Established an independent and people-centric kingdom founded on justice,
                    self-rule, and the welfare of the common people.
                </p>
            </div>

            <!-- Military Strategy -->
            <div class="royal-card bg-cream-light dark:bg-gray-900 p-8 rounded-2xl border border-mountain text-center hover:shadow-xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-orange-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-sword text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-primary mb-3">
                    Military Strategy
                </h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Pioneered guerrilla warfare techniques (Ganimi Kava) that revolutionized
                    battlefield tactics and are studied even today.
                </p>
            </div>

            <!-- Fort Administration -->
            <div class="royal-card bg-cream-light dark:bg-gray-900 p-8 rounded-2xl border border-mountain text-center hover:shadow-xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-emerald-700 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-fort-awesome text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-primary mb-3">
                    Fort Administration
                </h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Strengthened, administered, and strategically managed more than
                    <strong>300 forts</strong> across the Sahyadri mountain range.
                </p>
            </div>

        </div>
    </div>
</section>

 
    <!-- Timeline Section -->
<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Timeline of Chhatrapati Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Important events in the life of the great Maratha warrior king
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">

                <div class="timeline-item pl-8 py-6">
                    <h3 class="text-2xl font-bold text-red-600 mb-2">1630</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Birth
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Born on 19th February 1630 at Shivneri Fort to Shahaji Bhosale and Jijabai.
                    </p>
                </div>

                <div class="timeline-item pl-8 py-6">
                    <h3 class="text-2xl font-bold text-red-600 mb-2">1645</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        First Fort Capture
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Captured Torna Fort at the age of 15, marking the beginning of his journey as a military leader.
                    </p>
                </div>

                <div class="timeline-item pl-8 py-6">
                    <h3 class="text-2xl font-bold text-red-600 mb-2">1659</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Slaying of Afzal Khan
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Defeated Afzal Khan in a historic encounter at Pratapgad, showcasing exceptional courage and strategy.
                    </p>
                </div>

                <div class="timeline-item pl-8 py-6">
                    <h3 class="text-2xl font-bold text-red-600 mb-2">1674</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Coronation
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Coronated as Chhatrapati at Raigad Fort, formally establishing the Maratha Empire.
                    </p>
                </div>

                <div class="timeline-item pl-8 py-6">
                    <h3 class="text-2xl font-bold text-red-600 mb-2">1680</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Demise
                    </h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Passed away on 3rd April 1680 at Raigad Fort, leaving behind a powerful and enduring legacy.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Legacy Section -->
<section id="legacy" class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Eternal Legacy
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Timeless inspiration — ideals of Shivaji Maharaj that continue to live on
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Swarajya -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-flag text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Concept of Swarajya
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    The revolutionary idea of Swarajya (self-rule) introduced by Shivaji Maharaj later became the foundation of India’s freedom movement.
                </p>
            </div>

            <!-- Religious Tolerance -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-heart text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Religious Tolerance
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Principles of religious harmony and secular governance that ensured unity and respect among diverse communities within the empire.
                </p>
            </div>

            <!-- Welfare of People -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-users text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Welfare of the People
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Governance centered on public welfare — a ruler’s foremost duty — a philosophy that continues to inspire modern democratic values.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Forts Gallery Section -->
<section id="forts" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Forts of Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Explore the magnificent forts associated with Chhatrapati Shivaji Maharaj
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Raigad -->
            <div class="royal-card rounded-2xl overflow-hidden group">
                <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                     style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                        Raigad Fort
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        The capital fort of the Maratha Empire and the site of Chhatrapati Shivaji Maharaj’s coronation.
                    </p>
                    <a href="/forts/raigad" class="text-red-600 hover:text-yellow-500 font-semibold">
                        Explore Fort <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Pratapgad -->
            <div class="royal-card rounded-2xl overflow-hidden group">
                <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                     style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                        Pratapgad Fort
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        The historic fort where the legendary encounter between Shivaji Maharaj and Afzal Khan took place.
                    </p>
                    <a href="/forts/pratapgad" class="text-red-600 hover:text-yellow-500 font-semibold">
                        Explore Fort <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Shivneri -->
            <div class="royal-card rounded-2xl overflow-hidden group">
                <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                     style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                        Shivneri Fort
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        The birthplace of Chhatrapati Shivaji Maharaj and one of the most revered forts in Maratha history.
                    </p>
                    <a href="/forts/shivneri" class="text-red-600 hover:text-yellow-500 font-semibold">
                        Explore Fort <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="text-center mt-12">
            <a href="/forts/shivaji-forts"
               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-semibold rounded-full hover:from-yellow-500 hover:to-red-600 transition-all duration-300">
                <i class="fas fa-fort-awesome mr-2"></i>
                View All Shivaji Forts
            </a>
        </div>
    </div>
</section>


</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider functionality
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-white', i === index);
            dot.classList.toggle('bg-white/50', i !== index);
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    // Auto slide every 5 seconds
    const slideInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-slide on hover
    const heroSlider = document.querySelector('.hero-slider');
    if (heroSlider) {
        heroSlider.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        heroSlider.addEventListener('mouseleave', () => {
            setInterval(nextSlide, 5000);
        });
    }
    
    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
    
    // Initialize first slide
    showSlide(0);
    
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = 80;
                const targetPosition = target.offsetTop - headerHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Animate cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all cards
    document.querySelectorAll('.royal-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
    
    // Add parallax effect to hero background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallax = scrolled * 0.5;
        
        slides.forEach(slide => {
            slide.style.transform = `translateY(${parallax}px)`;
        });
    });
    
    // Add typing effect to hero title
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    
    // Initialize typing effect for main title after page load
    setTimeout(() => {
        const mainTitle = document.querySelector('.slide.active h1');
        if (mainTitle) {
            const originalText = mainTitle.textContent;
            typeWriter(mainTitle, originalText, 80);
        }
    }, 1000);
    
    console.log('Shivaji Maharaj page loaded successfully');
});

// Add CSS for better animations
const style = document.createElement('style');
style.textContent = `
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 1s ease-out;
    }
    
    .royal-card {
        position: relative;
        overflow: hidden;
    }
    
    .royal-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transform: rotate(45deg);
        transition: all 0.6s;
        opacity: 0;
    }
    
    .royal-card:hover::before {
        animation: shimmer 1.5s ease-in-out;
    }
    
    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>