<?php
// Set page specific variables
$page_title = 'राजवाडे व महाल - शिवाजी महाराज | Royal Palaces of Shivaji Maharaj | Trekshitz';
$meta_description = 'Explore the magnificent royal palaces and architectural marvels of Chhatrapati Shivaji Maharaj. Detailed information about Raigad Palace, construction techniques, and Maratha architecture.';
$meta_keywords = 'Shivaji palaces, Maratha architecture, Raigad palace, royal buildings, शिवाजी राजवाडे, मराठा वास्तुकला';

// Include header
include '../includes/header.php';
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-red-600 to-yellow-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"palace-pattern\" x=\"0\" y=\"0\" width=\"40\" height=\"40\" patternUnits=\"userSpaceOnUse\"><rect x=\"10\" y=\"10\" width=\"20\" height=\"15\" fill=\"%23ffffff\" opacity=\"0.1\"/><polygon points=\"10,10 20,5 30,10\" fill=\"%23ffffff\" opacity=\"0.05\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23palace-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    <span class="font-devanagari">राजवाडे</span> <span class="text-yellow-400">व महाल</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Royal Palaces of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    मराठा साम्राज्याची भव्य वास्तुकला आणि राजकीय केंद्रे
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Maratha Architecture</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Royal Residences</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Administrative Centers</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Palace Statistics -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900 dark:to-orange-800 rounded-2xl border border-amber-200 dark:border-amber-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-amber-600 dark:text-amber-400 mb-2 counter" data-target="25">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">राजवाडे</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Royal Palaces</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-emerald-50 to-green-100 dark:from-emerald-900 dark:to-green-800 rounded-2xl border border-emerald-200 dark:border-emerald-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-emerald-600 dark:text-emerald-400 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Administrative Buildings</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">प्रशासकीय इमारती</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-800 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 counter" data-target="15">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Major Forts</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">मुख्य किल्ले</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-violet-100 dark:from-purple-900 dark:to-violet-800 rounded-2xl border border-purple-200 dark:border-purple-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="350">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Years Legacy</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">वर्षांचा वारसा</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Major Palaces -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-6"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        प्रमुख राजवाडे
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Magnificent Royal Palaces and Administrative Centers
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Raigad Palace -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-64 bg-gradient-to-br from-red-400 to-orange-400 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-2xl font-bold font-devanagari">राजगडाचा राजवाडा</h3>
                            <p class="text-sm opacity-90">The Capital Palace</p>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">मुख्य राजधानी</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                <i class="fas fa-crown text-yellow-500 mr-2"></i>
                                <span>Coronation Palace</span>
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                <i class="fas fa-calendar text-blue-500 mr-2"></i>
                                <span>1674</span>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                            The grand palace at Raigad where Shivaji Maharaj was coronated as Chhatrapati. Featured magnificent throne hall, royal quarters, and administrative chambers.
                        </p>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                <i class="fas fa-home mr-2 text-amber-500"></i>
                                <span>35 Rooms</span>
                            </div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                <i class="fas fa-users mr-2 text-green-500"></i>
                                <span>Royal Court</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pune Palace -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-64 bg-gradient-to-br from-green-400 to-emerald-400 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-2xl font-bold font-devanagari">पुण्याचा राजवाडा</h3>
                            <p class="text-sm opacity-90">Administrative Center</p>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold">प्रशासकीय</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                <i class="fas fa-building text-blue-500 mr-2"></i>
                                <span>Administrative Hub</span>
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 text-sm">
                                <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                <span>Pune</span>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                            Strategic administrative palace in Pune, serving as regional headquarters with sophisticated court chambers and military planning rooms.
                        </p>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                <i class="fas fa-shield-alt mr-2 text-blue-500"></i>
                                <span>Defense Hub</span>
                            </div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                <i class="fas fa-scroll mr-2 text-purple-500"></i>
                                <span>Records Office</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Architectural Features -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-6"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Architectural Excellence
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    मराठा वास्तुकलेची खासियत
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Design Elements -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-900 dark:to-orange-900 rounded-2xl p-6 border border-amber-200 dark:border-amber-700 hover:scale-105 transition-transform duration-300">
                    <div class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-drafting-compass text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">वास्तू डिझाइन</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Unique blend of Deccan, Mughal, and traditional Marathi architectural styles with intricate wooden carvings and stone work.
                    </p>
                </div>

                <!-- Defense Architecture -->
                <div class="bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900 dark:to-pink-900 rounded-2xl p-6 border border-red-200 dark:border-red-700 hover:scale-105 transition-transform duration-300">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Defense Features</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Strategic defensive elements including secret passages, watchtowers, and fortified entrances integrated into palace design.
                    </p>
                </div>

                <!-- Royal Chambers -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 dark:from-purple-900 dark:to-violet-900 rounded-2xl p-6 border border-purple-200 dark:border-purple-700 hover:scale-105 transition-transform duration-300">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bed text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">राजकीय कक्ष</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Luxurious royal chambers with carved pillars, decorative balconies, and elaborate interiors reflecting Maratha grandeur.
                    </p>
                </div>

                <!-- Court Halls -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900 dark:to-indigo-900 rounded-2xl p-6 border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-university text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Court Halls</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Grand durbar halls with high ceilings, ornate columns, and royal thrones where important state decisions were made.
                    </p>
                </div>

                <!-- Gardens & Water Features -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900 dark:to-emerald-900 rounded-2xl p-6 border border-green-200 dark:border-green-700 hover:scale-105 transition-transform duration-300">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-leaf text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">बाग व पाणी</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Beautiful gardens, fountains, and water systems including stepped wells and cisterns for water storage and aesthetics.
                    </p>
                </div>

                <!-- Construction Materials -->
                <div class="bg-gradient-to-br from-gray-50 to-slate-50 dark:from-gray-900 dark:to-slate-900 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform duration-300">
                    <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-hammer text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Construction Materials</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Local basalt stone, teak wood, lime mortar, and iron reinforcements showcasing indigenous construction techniques.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Palace Legacy -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-6"></div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                            Architectural Legacy
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                        वास्तुकलेचा शाश्वत वारसा
                    </p>
                </div>

                <div class="bg-gradient-to-r from-red-50 to-yellow-50 dark:from-red-900 dark:to-yellow-900 rounded-3xl p-8 border border-red-200 dark:border-red-700">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">ऐतिहासिक महत्त्व</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-star text-red-500 mr-3 mt-1"></i>
                                    <span>Centers of Maratha administration and culture</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-red-500 mr-3 mt-1"></i>
                                    <span>Venues for royal ceremonies and coronations</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-red-500 mr-3 mt-1"></i>
                                    <span>Symbols of Maratha power and sovereignty</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-red-500 mr-3 mt-1"></i>
                                    <span>Architectural innovation in fort design</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Modern Influence</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Inspiration for contemporary Indian architecture</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Tourism and cultural heritage sites</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Archaeological and historical research</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Conservation and restoration projects</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-red-600 to-yellow-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">
                राजवाड्यांचा अभ्यास करा
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Explore more about Maratha architecture and royal heritage
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shivaji/forts" class="inline-flex items-center px-8 py-4 bg-white text-red-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    Explore Forts
                </a>
                <a href="/shivaji/architecture" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-building mr-2"></i>
                    मराठा वास्तुकला
                </a>
                <a href="/virtual-tour" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-vr-cardboard mr-2"></i>
                    Virtual Tour
                </a>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateNumber(counter, target);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => observer.observe(counter));
    }
    
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 30);
    }
    
    // Card Animation on Scroll
    function animateCards() {
        const cards = document.querySelectorAll('.bg-gradient-to-br, .bg-white');
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '50px' });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            cardObserver.observe(card);
        });
    }
    
    // Smooth Scrolling
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
    
    // Initialize animations
    animateCounters();
    animateCards();
    
    console.log('Shivaji Palaces page loaded successfully');
});

// Add enhanced CSS
const style = document.createElement('style');
style.textContent = `
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    .group:hover .group-hover\\:scale-110 {
        transform: scale(1.1);
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
`;
document.head.appendChild(style);
</script>