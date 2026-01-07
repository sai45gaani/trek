<?php
// Set page-specific variables
$page_title = 'Trekshitz - Explore Sahyadri Mountains | Trekking Adventures';
$meta_description = 'Explore the beautiful Sahyadri mountains with Trekshitz. Join our trekking adventures, discover ancient forts, and connect with nature.';
$meta_keywords = 'trekking, sahyadri, forts, hiking, adventure, nature, maharashtra, mountains';

// Static data for upcoming treks (replace with database queries later)
$upcoming_treks = [
    [
        'id' => 1,
        'title' => 'Domzira Waterfall',
        'trek_date' => '15 June 2025',
        'organizer_name' => 'Tanmay Joshi',
        'image' => 'https://images.unsplash.com/photo-1586348943529-beaae6c28db9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'difficulty' => 'Easy',
        'slug' => 'domzira-waterfall'
    ],
    [
        'id' => 2,
        'title' => 'Ramsej Fort',
        'trek_date' => '22 June 2025',
        'organizer_name' => 'Sunit Pendse',
        'image' => 'https://images.unsplash.com/photo-1605538883669-825200433431?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
        'difficulty' => 'Moderate',
        'slug' => 'ramsej-fort'
    ]
];

// Include header
include 'includes/header.php';
?>

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
                                सह्याद्रीच्या गर्विष्ठ शिखरांवर चढणे आणि निसर्गाच्या सोबत एक अविस्मरणीय प्रवास
                            </p>
                            <div class="space-x-4">
                                <a href="treks.php" class="btn btn-primary">
                                    Start Your Journey
                                </a>
                                <a href="#treks" class="btn btn-outline text-white border-white hover:bg-white hover:text-primary">
                                    View Treks
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
                                350+ किल्ल्यांची माहिती, इतिहास आणि ट्रेकिंग मार्गदर्शन
                            </p>
                            <div class="space-x-4">
                                <a href="forts.php" class="btn btn-primary">
                                    Explore Forts
                                </a>
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
                                ट्रेकिंग प्रेमींचा समुदाय - अनुभव सामायिक करा आणि नवीन मित्र बनवा
                            </p>
                            <div class="space-x-4">
                                <a href="forum.php" class="btn btn-primary">
                                    Join Community
                                </a>
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
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="hover-lift">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2">350+</div>
                    <div class="text-gray-600 dark:text-gray-300">किल्ले</div>
                </div>
                <div class="hover-lift">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2">1000+</div>
                    <div class="text-gray-600 dark:text-gray-300">Trekkers</div>
                </div>
                <div class="hover-lift">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2">50+</div>
                    <div class="text-gray-600 dark:text-gray-300">Monthly Treks</div>
                </div>
                <div class="hover-lift">
                    <div class="text-4xl font-bold text-primary dark:text-accent mb-2">15+</div>
                    <div class="text-gray-600 dark:text-gray-300">Years Experience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Treks Section -->
    <section id="treks" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4">Upcoming Treks</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    यावणारे ट्रेक कार्यक्रम - आपल्या आवडत्या ठिकाणी जाण्यासाठी तयार व्हा
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <?php foreach ($upcoming_treks as $trek): ?>
                <!-- Trek Card -->
                <div class="card hover-lift">
                    <div class="h-48 bg-cover bg-center rounded-t-2xl" style="background-image: url('<?php echo $trek['image']; ?>');"></div>
                    <div class="card-body">
                        <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">
                            <?php echo htmlspecialchars($trek['title']); ?>
                        </h3>
                        <div class="flex items-center text-gray-600 dark:text-gray-300 mb-2">
                            <i class="fas fa-calendar mr-2"></i>
                            <span><?php echo $trek['trek_date']; ?></span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300 mb-4">
                            <i class="fas fa-user mr-2"></i>
                            <span>By <?php echo htmlspecialchars($trek['organizer_name']); ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="badge <?php echo $trek['difficulty'] === 'Easy' ? 'badge-accent' : ($trek['difficulty'] === 'Moderate' ? 'badge-secondary' : 'badge-primary'); ?>">
                                <?php echo $trek['difficulty']; ?>
                            </span>
                            <a href="trek-details.php?trek=<?php echo $trek['slug']; ?>" class="btn btn-primary">
                                Join Trek
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-12">
                <a href="treks.php" class="btn btn-outline btn-lg">
                    View All Treks
                </a>
            </div>
        </div>
    </section>

    <!-- Features Grid Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gradient mb-4">Explore With Us</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    आमच्यासोबत सह्याद्रीचे सौंदर्य अनुभवा
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="card hover-lift hover-glow">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-fort-awesome text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">किल्ल्यांची माहिती</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            350+ किल्ल्यांची सविस्तर माहिती, छायाचित्रे व नकाशांसहित
                        </p>
                        <a href="forts.php" class="text-primary dark:text-accent font-semibold hover:underline">
                            अधिक जाणून घ्या →
                        </a>
                    </div>
                </div>
                
                <!-- Feature Card 2 -->
                <div class="card hover-lift hover-glow">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-images text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Picture Gallery</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Forts, Butterflies, Caves, Flowers and more beautiful captures
                        </p>
                        <a href="gallery.php" class="text-primary dark:text-accent font-semibold hover:underline">
                            View Gallery →
                        </a>
                    </div>
                </div>
                
                <!-- Feature Card 3 -->
                <div class="card hover-lift hover-glow">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-comments text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Discussion Forum</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Connect with fellow trekkers, share experiences and get guidance
                        </p>
                        <a href="forum.php" class="text-primary dark:text-accent font-semibold hover:underline">
                            Join Discussion →
                        </a>
                    </div>
                </div>
                
                <!-- Feature Card 4 -->
                <div class="card hover-lift hover-glow">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-crown text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">राजा शिवछत्रपती</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Learn about the great Maratha warrior king and his forts
                        </p>
                        <a href="shivaji.php" class="text-primary dark:text-accent font-semibold hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
                
                <!-- Feature Card 5 -->
                <div class="card hover-lift hover-glow">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-earth rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-map text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Maps (नकाशे)</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Detailed maps of forts and surrounding regions for better navigation
                        </p>
                        <a href="maps.php" class="text-primary dark:text-accent font-semibold hover:underline">
                            View Maps →
                        </a>
                    </div>
                </div>
                
                <!-- Feature Card 6 -->
                <div class="card hover-lift hover-glow">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-mountain rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-book text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">इ-मासिक</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            ट्रेकक्षितीज संस्थेचे इ-मासिक: गड किल्ले, निसर्ग, तज्ञांचे मार्गदर्शन
                        </p>
                        <a href="magazine.php" class="text-primary dark:text-accent font-semibold hover:underline">
                            Read Magazine →
                        </a>
                    </div>
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

<?php
// Include footer
include 'includes/footer.php';
?>