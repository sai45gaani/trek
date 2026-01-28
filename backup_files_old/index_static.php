<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the beautiful Sahyadri mountains with Trekshitz. Join our trekking adventures, discover ancient forts, and connect with nature.">
    <meta name="keywords" content="trekking, sahyadri, forts, hiking, adventure, nature, maharashtra, mountains">
    <meta name="author" content="Trekshitz">
    <meta property="og:title" content="Trekshitz - Explore Sahyadri Mountains">
    <meta property="og:description" content="Join us for amazing trekking adventures in the beautiful Sahyadri mountain range">
    <meta property="og:type" content="website">
    <title>Trekshitz - Explore Sahyadri Mountains | Trekking Adventures</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts - English + Devanagari -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@300;400;500;600;700&family=Mukti:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#8B4513',      // Saddle Brown (was #2d5016)
                        secondary: '#D2691E',    // Chocolate Orange (was #4a7c23)
                        accent: '#F4A460',       // Sandy Brown (was #7fb069)
                        forest: '#CD853F',       // Peru (was #355e3b)
                        earth: '#A0522D',        // Sienna (was #8b4513)
                        mountain: '#DEB887',      // Burlywood (was #708090)
                         // NEW CREAM COLORS
                    'cream-light': '#FFFEF7',    // Very light cream
                    'cream-medium': '#FFF8DC',   // Cornsilk (main cream)
                    'cream-warm': '#FAF0E6',     // Linen (warm cream)
                    'cream-dark': '#F5F5DC'      // Beige (darker cream)
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'devanagari': ['Noto Sans Devanagari', 'Mukti', 'sans-serif'],
                        'bilingual': ['Poppins', 'Noto Sans Devanagari', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins bg-cream-medium dark:bg-gray-900 transition-colors duration-300">
    
    <!-- Include Header Component -->
    <?php include 'includes/header.php'; ?>
    
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
                                    <button class="btn btn-primary">
                                        Start Your Journey
                                    </button>
                                    <button class="btn btn-secondary">
                                        View Treks
                                    </button>
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
                                    <button class="btn btn-primary">
                                        Explore Forts
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                    <div class="swiper-slide relative">
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

        <!-- Upcoming Treks Section -->
        <section id="treks" class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4">Upcoming Treks</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Upcoming trek programs - get ready to visit your favorite destinations
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Trek Card 1 -->
                    <div class="card hover-lift">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1586348943529-beaae6c28db9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');"></div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">Domzira Waterfall</h3>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>15 June 2025</span>
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 mb-4">
                                <i class="fas fa-user mr-2"></i>
                                <span>By Tanmay Joshi</span>
                            </div>
                            <button class="btn btn-primary w-full">
                                Join Trek
                            </button>
                        </div>
                    </div>
                    
                    <!-- Trek Card 2 -->
                    <div class="card hover-lift">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');"></div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">Ramsej Fort</h3>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>22 June 2025</span>
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 mb-4">
                                <i class="fas fa-user mr-2"></i>
                                <span>By Sunit Pendse</span>
                            </div>
                            <button class="btn btn-primary w-full">
                                Join Trek
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Grid Section -->
        <section class="py-20 bg-cream-light dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4">Explore With Us</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Experience the beauty of Sahyadri with us
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature Card 1 -->
                    <div class="card hover-lift p-8">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-fort-awesome text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Fort Information</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Detailed information about 350+ forts, photographs and maps included
                        </p>
                        <a href="#" class="text-primary dark:text-accent font-semibold hover:underline">
                            Learn More →
                        </a>
                    </div>
                    
                    <!-- Feature Card 2 -->
                    <div class="card hover-lift p-8">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-images text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Picture Gallery</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Forts, Butterflies, Caves, Flowers and more beautiful captures
                        </p>
                        <a href="#" class="text-primary dark:text-accent font-semibold hover:underline">
                            View Gallery →
                        </a>
                    </div>
                    
                    <!-- Feature Card 3 -->
                    <div class="card hover-lift p-8">
                        <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-comments text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Discussion Forum</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Connect with fellow trekkers, share experiences and get guidance
                        </p>
                        <a href="#" class="text-primary dark:text-accent font-semibold hover:underline">
                            Join Discussion →
                        </a>
                    </div>
                    
                    <!-- Feature Card 4 -->
                    <div class="card hover-lift p-8">
                        <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">King Shivaji Maharaj</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Learn about the great Maratha warrior king and his forts
                        </p>
                        <a href="#" class="text-primary dark:text-accent font-semibold hover:underline">
                            Read More →
                        </a>
                    </div>
                    
                    <!-- Feature Card 5 -->
                    <div class="card hover-lift p-8">
                        <div class="w-16 h-16 bg-earth rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-map text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Maps</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Detailed maps of forts and surrounding regions for better navigation
                        </p>
                        <a href="#" class="text-primary dark:text-accent font-semibold hover:underline">
                            View Maps →
                        </a>
                    </div>
                    
                    <!-- Feature Card 6 -->
                    <div class="card hover-lift p-8">
                        <div class="w-16 h-16 bg-mountain rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-book text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">E-Magazine</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Trekshitiz organization's e-magazine: forts, nature, expert guidance
                        </p>
                        <a href="#" class="text-primary dark:text-accent font-semibold hover:underline">
                            Read Magazine →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="py-20 bg-gradient-nature text-white">
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
        </section>
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