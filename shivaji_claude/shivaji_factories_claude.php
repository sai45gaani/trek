<?php
// Set page specific variables
$page_title = 'कारखाने - शिवाजी महाराज | Factories of Shivaji Maharaj | Trekshitz';
$meta_description = 'Complete information about the industrial development, manufacturing units, and trade establishments during the rule of Chhatrapati Shivaji Maharaj and the Maratha Empire.';
$meta_keywords = 'Shivaji factories, Maratha industries, Karkhane, manufacturing, industrial development, कारखाने, शिवाजी उद्योग';

// Include header
include '../includes/header.php';
?>

<style>
/* Factory specific styles with industrial theme */
.factory-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(99, 102, 241, 0.3);
    transition: all 0.3s ease;
}

.factory-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(79, 70, 229, 0.15);
    border-color: #4f46e5;
}

.industrial-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="industry" x="0" y="0" width="25" height="25" patternUnits="userSpaceOnUse"><rect x="5" y="10" width="15" height="10" fill="%234f46e5" opacity="0.1"/><circle cx="12.5" cy="5" r="2" fill="%236366f1" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23industry)"/></svg>');
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #4f46e5, #6366f1);
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.production-meter {
    width: 100%;
    height: 20px;
    background: #e5e7eb;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
}

.production-fill {
    height: 100%;
    background: linear-gradient(90deg, #4f46e5, #6366f1);
    width: 0%;
    transition: width 2s ease;
    border-radius: 10px;
}

.production-fill.animate {
    width: var(--production-level);
}

.workshop-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0.5rem;
    max-width: 200px;
    margin: 0 auto;
}

.workshop-unit {
    width: 40px;
    height: 40px;
    background: #4f46e5;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.8rem;
    transition: all 0.3s ease;
    opacity: 0;
    transform: scale(0);
}

.workshop-unit.animate {
    opacity: 1;
    transform: scale(1);
}

.workshop-unit:hover {
    transform: scale(1.1);
    background: #3730a3;
}

@media (max-width: 768px) {
    .workshop-grid {
        grid-template-columns: repeat(3, 1fr);
        max-width: 150px;
    }
    
    .workshop-unit {
        width: 35px;
        height: 35px;
        font-size: 0.7rem;
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-indigo-600 to-indigo-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 industrial-pattern"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">कारखाने</span> <span class="text-indigo-300">& उद्योग</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Industrial Development under Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    मराठा साम्राज्यातील औद्योगिक विकास आणि उत्पादन केंद्रे
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Manufacturing</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Weapon Production</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Trade Centers</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Industrial Statistics -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-indigo-50 to-blue-100 dark:from-indigo-900 dark:to-blue-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2 counter" data-target="120">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">कारखाने</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Factories</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2 counter" data-target="25000">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Workers</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">कारागार</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900 dark:to-orange-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Product Types</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">उत्पादन प्रकार</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="15">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Major Centers</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">मुख्य केंद्रे</div>
                </div>
            </div>

            <!-- Production Visualization -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-8 mb-16">
                <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                    उत्पादन क्षमता
                </h3>
                <div class="workshop-grid" id="workshopGrid">
                    <!-- JavaScript will populate this -->
                </div>
                <p class="text-center text-gray-600 dark:text-gray-300 mt-6 text-sm">
                    Manufacturing Workshops Network (Click to activate)
                </p>
            </div>
        </div>
    </section>

    <!-- Factory Types -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800 industrial-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-indigo-600 to-indigo-800 bg-clip-text text-transparent font-devanagari">
                        औद्योगिक केंद्रे
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Major Industrial Establishments</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Weapon Manufacturing -->
                <div class="factory-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-sword text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">शस्त्र निर्माण</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Advanced weapon manufacturing including swords, cannons, and firearms for military use.
                    </p>
                    <div class="production-meter mb-2">
                        <div class="production-fill" style="--production-level: 85%;"></div>
                    </div>
                    <div class="text-xs text-gray-500">Production: 85%</div>
                </div>

                <!-- Shipbuilding -->
                <div class="factory-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-ship text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">नौका निर्माण</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Naval shipyards producing war vessels and merchant ships for the Maratha navy.
                    </p>
                    <div class="production-meter mb-2">
                        <div class="production-fill" style="--production-level: 70%;"></div>
                    </div>
                    <div class="text-xs text-gray-500">Production: 70%</div>
                </div>

                <!-- Textile Mills -->
                <div class="factory-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-tshirt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">वस्त्र उद्योग</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Textile production centers for cotton, silk, and specialized military uniforms.
                    </p>
                    <div class="production-meter mb-2">
                        <div class="production-fill" style="--production-level: 90%;"></div>
                    </div>
                    <div class="text-xs text-gray-500">Production: 90%</div>
                </div>

                <!-- Iron Works -->
                <div class="factory-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-hammer text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">लोहार कारखाना</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Iron and steel works producing tools, weapons, and construction materials.
                    </p>
                    <div class="production-meter mb-2">
                        <div class="production-fill" style="--production-level: 75%;"></div>
                    </div>
                    <div class="text-xs text-gray-500">Production: 75%</div>
                </div>

                <!-- Gunpowder Mills -->
                <div class="factory-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bomb text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">बारूद उत्पादन</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Gunpowder and explosives manufacturing for military and mining operations.
                    </p>
                    <div class="production-meter mb-2">
                        <div class="production-fill" style="--production-level: 60%;"></div>
                    </div>
                    <div class="text-xs text-gray-500">Production: 60%</div>
                </div>

                <!-- Jewelry & Crafts -->
                <div class="factory-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-gem text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">दागिने व हस्तकला</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Jewelry making and handicrafts supporting trade and royal court requirements.
                    </p>
                    <div class="production-meter mb-2">
                        <div class="production-fill" style="--production-level: 95%;"></div>
                    </div>
                    <div class="text-xs text-gray-500">Production: 95%</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Major Industrial Centers -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-indigo-600 to-indigo-800 bg-clip-text text-transparent">
                        Major Industrial Centers
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">प्रमुख औद्योगिक शहरे</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Raigad -->
                <div class="text-center p-8 bg-gradient-to-br from-red-50 to-pink-100 dark:from-red-900 dark:to-pink-800 rounded-2xl border border-red-200 dark:border-red-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-crown text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">राजगड</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                        Capital's manufacturing hub with royal workshops, weapon production, and luxury goods.
                    </p>
                </div>

                <!-- Kalyan -->
                <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-800 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-anchor text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">कल्याण</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                        Major port city with shipbuilding yards, textile mills, and international trade centers.
                    </p>
                </div>

                <!-- Pune -->
                <div class="text-center p-8 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-800 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-cogs text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">पुणे</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                        Strategic manufacturing center with metalworks, textile production, and military supplies.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Economic Impact -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <div class="section-divider"></div>
                    <h2 class="text-4xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-indigo-600 to-indigo-800 bg-clip-text text-transparent font-devanagari">
                            आर्थिक प्रभाव
                        </span>
                    </h2>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Economic Benefits -->
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Economic Benefits</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-chart-line text-indigo-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Revenue Generation</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Factories contributed 30% of total state revenue through production and exports.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-users text-indigo-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">रोजगार निर्मिती</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Created employment for 25,000+ skilled workers and artisans across the empire.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-globe text-indigo-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Export Economy</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Established trade relations with European, Arab, and Asian markets.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Innovation & Technology -->
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 font-devanagari">तंत्रज्ञान प्रगती</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-lightbulb text-indigo-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Technical Innovation</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Advanced metallurgy, gunpowder chemistry, and precision manufacturing techniques.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-graduation-cap text-indigo-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Skill Development</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Training programs for craftsmen and establishment of guilds for quality control.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-handshake text-indigo-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">अंतर्राष्ट्रीय सहयोग</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Technology transfer through foreign experts and diplomatic missions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation to Related Pages -->
    <section class="py-16 bg-gradient-to-r from-indigo-600 to-indigo-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">संबंधित विषय</h2>
            <p class="text-xl mb-8 opacity-90">Explore more aspects of Maratha economy and administration</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shivaji/economic-policy" class="inline-flex items-center px-8 py-4 bg-white text-indigo-700 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-coins mr-2"></i>
                    आर्थिक धोरण
                </a>
                <a href="/shivaji/navy" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-indigo-700 transition-colors">
                    <i class="fas fa-ship mr-2"></i>
                    Naval Industries
                </a>
                <a href="/shivaji/army" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-indigo-700 transition-colors">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Military Production
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
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current).toLocaleString();
        }, 25);
    }

    // Workshop Grid Animation
    function setupWorkshopGrid() {
        const grid = document.getElementById('workshopGrid');
        const icons = ['🏭', '⚒️', '🔧', '⚙️', '🛠️', '🔨', '⚡', '🔥', '💎', '🎯', '📦', '🚢', '⚔️', '🧵', '🏺', '🪙'];
        
        for (let i = 0; i < 16; i++) {
            const unit = document.createElement('div');
            unit.className = 'workshop-unit';
            unit.textContent = icons[i % icons.length];
            unit.setAttribute('data-delay', i * 80);
            grid.appendChild(unit);
        }

        grid.addEventListener('click', () => {
            const units = grid.querySelectorAll('.workshop-unit');
            units.forEach((unit, index) => {
                const delay = parseInt(unit.getAttribute('data-delay'));
                setTimeout(() => {
                    unit.classList.toggle('animate');
                }, delay);
            });
        });

        // Auto-animate on scroll
        const gridObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => grid.click(), 500);
                    gridObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        gridObserver.observe(grid);
    }

    // Production Meter Animation
    function animateProductionMeters() {
        const meters = document.querySelectorAll('.production-fill');
        const meterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    meterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        meters.forEach(meter => meterObserver.observe(meter));
    }

    // Enhanced Card Animations
    function animateCards() {
        const cards = document.querySelectorAll('.factory-card');
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
        }, { threshold: 0.1 });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            cardObserver.observe(card);
        });
    }

    // Factory Card Hover Effects
    function setupFactoryHover() {
        const factoryCards = document.querySelectorAll('.factory-card');
        factoryCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(79, 70, 229, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-8px) scale(1)';
                this.style.boxShadow = '0 20px 40px rgba(79, 70, 229, 0.15)';
            });
        });
    }

    // Interactive Statistics
    function setupInteractiveStats() {
        const statCards = document.querySelectorAll('[data-target]');
        statCards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(1.1)';
                this.style.transition = 'transform 0.2s ease';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1.05)';
                }, 200);
                
                console.log('Factory stat clicked:', this.getAttribute('data-target'));
            });
        });
    }

    // Smooth Scrolling
    function setupSmoothScrolling() {
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
    }

    // Loading Animation
    function setupLoadingAnimation() {
        const elements = document.querySelectorAll('.animate-fade-in-up');
        elements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(50px)';
            
            setTimeout(() => {
                element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, index * 200);
        });
    }

    // Initialize all functions
    animateCounters();
    setupWorkshopGrid();
    animateProductionMeters();
    animateCards();
    setupFactoryHover();
    setupInteractiveStats();
    setupSmoothScrolling();
    setupLoadingAnimation();
    
    console.log('Factories page loaded successfully');
});

// Enhanced CSS for animations
const style = document.createElement('style');
style.textContent = `
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    .text-transparent {
        color: transparent;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .factory-card {
        transition: all 0.3s ease;
    }
    .production-meter {
        position: relative;
        overflow: hidden;
    }
    .production-meter::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shimmer 2s infinite;
    }
    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }
`;
document.head.appendChild(style);
</script>