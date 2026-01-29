<?php
// Set page specific variables
$page_title = 'मराठा सेना - शिवाजी महाराज | Maratha Army of Shivaji Maharaj | Trekshitz';
$meta_description = 'Complete information about the military organization, training, and legendary army structure of Chhatrapati Shivaji Maharaj and the Maratha Empire.';
$meta_keywords = 'Shivaji army, Maratha military, Lashkar, army organization, मराठा सेना, शिवाजी सेना';

// Include header
include '../includes/header.php';
?>

<style>
/* Army specific styles with military theme */
.army-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(34, 197, 94, 0.3);
    transition: all 0.3s ease;
}

.army-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(22, 163, 74, 0.15);
    border-color: #16a34a;
}

.military-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="military" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><polygon points="10,2 18,10 10,18 2,10" fill="%2316a34a" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23military)"/></svg>');
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #16a34a, #22c55e);
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.rank-badge {
    background: linear-gradient(135deg, #16a34a, #15803d);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.formation-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 0.5rem;
    max-width: 300px;
    margin: 0 auto;
}

.soldier-unit {
    width: 30px;
    height: 30px;
    background: #16a34a;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.7rem;
    transition: all 0.3s ease;
    opacity: 0;
    transform: scale(0);
}

.soldier-unit.animate {
    opacity: 1;
    transform: scale(1);
}

.soldier-unit:hover {
    transform: scale(1.2);
    background: #15803d;
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-green-600 to-green-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 military-pattern"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">मराठा</span> <span class="text-green-300">सेना</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    The Legendary Army of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    शिवरायांची अपराजित लष्करी शक्ति आणि संघटना
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Military Organization</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Training Systems</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Battle Formations</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Army Statistics -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2 counter" data-target="100000">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">सैनिक</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Total Soldiers</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 counter" data-target="40000">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Cavalry</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">घोडदळ</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900 dark:to-red-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-red-600 dark:text-red-400 mb-2 counter" data-target="60000">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Infantry</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">पायदळ</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900 dark:to-orange-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-2 counter" data-target="400">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Forts</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">किल्ले</div>
                </div>
            </div>

            <!-- Army Formation Visualization -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-8 mb-16">
                <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                    व्यूह रचना
                </h3>
                <div class="formation-grid" id="armyFormation">
                    <!-- JavaScript will populate this -->
                </div>
                <p class="text-center text-gray-600 dark:text-gray-300 mt-4 text-sm">
                    Traditional Maratha Battle Formation (Click to animate)
                </p>
            </div>
        </div>
    </section>

    <!-- Military Organization -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800 military-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent font-devanagari">
                        सेना संघटना
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Military Organization and Hierarchy</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Senapati -->
                <div class="army-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">सेनापती</h3>
                        <span class="rank-badge">Commander-in-Chief</span>
                    </div>
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-crown text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Supreme military commander responsible for overall strategy and army coordination.
                    </p>
                </div>

                <!-- Hazari -->
                <div class="army-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">हजारी</h3>
                        <span class="rank-badge">Regiment Commander</span>
                    </div>
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Commands 1000 soldiers, responsible for regional military operations and fort defense.
                    </p>
                </div>

                <!-- Jumladar -->
                <div class="army-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">जुमलेदार</h3>
                        <span class="rank-badge">Company Commander</span>
                    </div>
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Commands 200-500 soldiers, leads battlefield units and tactical operations.
                    </p>
                </div>

                <!-- Hawaldar -->
                <div class="army-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">हवालदार</h3>
                        <span class="rank-badge">Squad Leader</span>
                    </div>
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Commands 25-50 soldiers, manages daily operations and training of troops.
                    </p>
                </div>

                <!-- Naik -->
                <div class="army-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">नायक</h3>
                        <span class="rank-badge">Team Leader</span>
                    </div>
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-friends text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Commands 5-10 soldiers, responsible for small unit tactics and discipline.
                    </p>
                </div>

                <!-- Sipahi -->
                <div class="army-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">सिपाही</h3>
                        <span class="rank-badge">Soldier</span>
                    </div>
                    <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Basic soldier trained in weapons, tactics, and fort warfare techniques.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Military Specialties -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">
                        Military Specialties
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">विशेष सैन्य शाखा</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mavali Infantry -->
                <div class="text-center p-8 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-800 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-mountain text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">मावळी पायदळ</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Elite hill fighters from Sahyadri mountains, masters of guerrilla warfare and fort assault tactics.
                    </p>
                </div>

                <!-- Bargir Cavalry -->
                <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-800 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-horse text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">बारगीर घोडदळ</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Professional cavalry units with standardized equipment, forming the backbone of mobile warfare.
                    </p>
                </div>

                <!-- Artillery Corps -->
                <div class="text-center p-8 bg-gradient-to-br from-red-50 to-pink-100 dark:from-red-900 dark:to-pink-800 rounded-2xl border border-red-200 dark:border-red-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bomb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">तोफखाना</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Cannon and siege warfare specialists, crucial for fort capture and defensive operations.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Training and Equipment -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Training -->
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 font-devanagari">सैन्य प्रशिक्षण</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-sword text-green-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Weapon Training</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Mastery of swords, spears, bows, and firearms through rigorous daily practice.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-running text-green-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">शारीरिक फिटनेस</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Mountain climbing, swimming, and endurance training for battlefield readiness.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-chess text-green-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Tactical Knowledge</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Study of battle formations, siege techniques, and guerrilla warfare strategies.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Equipment -->
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Military Equipment</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-shield text-blue-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">शस्त्रे आणि चिलखत</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Traditional weapons with chainmail armor and distinctive Maratha helmets.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-horse-head text-blue-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Cavalry Equipment</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Light horses, specialized saddles, and mobile warfare gear for quick strikes.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-flag text-blue-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">ध्वज आणि चिन्हे</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Distinctive banners and symbols for unit identification and battlefield coordination.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation to Related Pages -->
    <section class="py-16 bg-gradient-to-r from-green-600 to-green-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">इतर सैन्य विषय</h2>
            <p class="text-xl mb-8 opacity-90">Explore more aspects of Maratha military system</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shivaji/battles" class="inline-flex items-center px-8 py-4 bg-white text-green-700 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-sword mr-2"></i>Famous Battles
                </a>
                <a href="/shivaji/spy-network" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-green-700 transition-colors">
                    <i class="fas fa-eye mr-2"></i>हरखारे विभाग
                </a>
                <a href="/shivaji/navy" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-green-700 transition-colors">
                    <i class="fas fa-ship mr-2"></i>Maratha Navy
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
            element.textContent = Math.floor(current).toLocaleString();
        }, 30);
    }

    // Army Formation Animation
    function setupArmyFormation() {
        const formation = document.getElementById('armyFormation');
        const icons = ['👤', '🏹', '⚔️', '🛡️', '🐎', '⚡'];
        
        for (let i = 0; i < 24; i++) {
            const unit = document.createElement('div');
            unit.className = 'soldier-unit';
            unit.textContent = icons[i % icons.length];
            unit.setAttribute('data-delay', i * 50);
            formation.appendChild(unit);
        }

        formation.addEventListener('click', () => {
            const units = formation.querySelectorAll('.soldier-unit');
            units.forEach((unit, index) => {
                const delay = parseInt(unit.getAttribute('data-delay'));
                setTimeout(() => {
                    unit.classList.toggle('animate');
                }, delay);
            });
        });

        // Auto-animate on scroll
        const formationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    formation.click();
                    formationObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        formationObserver.observe(formation);
    }

    // Enhanced Card Animations
    function animateCards() {
        const cards = document.querySelectorAll('.army-card');
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

    // Initialize all functions
    animateCounters();
    setupArmyFormation();
    animateCards();
    
    console.log('Maratha Army page loaded successfully');
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
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>