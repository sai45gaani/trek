<?php
// Set page specific variables
$page_title = 'छत्रपति शिवाजी महाराज | Chhatrapati Shivaji Maharaj | Trekshitz';
$meta_description = 'Complete information about Chhatrapati Shivaji Maharaj - the great Maratha warrior king. History, battles, administration, forts, and legacy.';
$meta_keywords = 'Shivaji Maharaj, Maratha Empire, Maharashtra history, forts, battles, warrior king, स्वराज्य';

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
    <!-- Hero Slider Section -->
    <section id="home" class="hero-slider">
        <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80');">
            <div class="slide-content">
                <div class="max-w-4xl px-4">
                    <h1 class="text-6xl md:text-8xl font-bold mb-6 font-devanagari animate-fade-in">
                        छत्रपति शिवाजी महाराज
                    </h1>
                    <p class="text-2xl md:text-3xl mb-8 opacity-90">
                        The Great Maratha Warrior King
                    </p>
                    <p class="text-lg md:text-xl mb-8 font-devanagari opacity-80">
                        स्वराज्य के संस्थापक, मराठा साम्राज्य के जनक
                    </p>
                </div>
            </div>
        </div>
        
        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80');">
            <div class="slide-content">
                <div class="max-w-4xl px-4">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        350+ Forts Legacy
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 opacity-90 font-devanagari">
                        सह्याद्रीच्या प्रत्येक शिखरावर शिवरायांचे स्वप्न
                    </p>
                    <a href="#forts" class="inline-flex items-center px-8 py-4 bg-yellow-500 hover:bg-red-600 text-white font-semibold rounded-full transition-colors">
                        <i class="fas fa-fort-awesome mr-2"></i>
                        Explore Forts
                    </a>
                </div>
            </div>
        </div>
        
        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80');">
            <div class="slide-content">
                <div class="max-w-4xl px-4">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        Maratha Navy
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 opacity-90 font-devanagari">
                        समुद्राचा शेणाई - भारतीय नौदलाचे जनक
                    </p>
                    <a href="#navy" class="inline-flex items-center px-8 py-4 bg-yellow-500 hover:bg-red-600 text-white font-semibold rounded-full transition-colors">
                        <i class="fas fa-ship mr-2"></i>
                        Naval History
                    </a>
                </div>
            </div>
        </div>
        
        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80');">
            <div class="slide-content">
                <div class="max-w-4xl px-4">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 font-devanagari">
                        स्वराज्य
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 opacity-90">
                        Self-Rule | Independent Maratha Kingdom
                    </p>
                    <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                        प्रजाहित हेच राज्यकारण
                    </p>
                </div>
            </div>
        </div>
        
        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80');">
            <div class="slide-content">
                <div class="max-w-4xl px-4">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        Guerrilla Warfare
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 opacity-90 font-devanagari">
                        गनिमी कावा - छापामार युद्धाचे जनक
                    </p>
                    <a href="#battles" class="inline-flex items-center px-8 py-4 bg-yellow-500 hover:bg-red-600 text-white font-semibold rounded-full transition-colors">
                        <i class="fas fa-sword mr-2"></i>
                        Battle Strategies
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Slider Controls -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="0"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="1"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="2"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="3"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="4"></button>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 maratha-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-indicator"></div>
                <h2 class="text-5xl md:text-6xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        The Great King
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto font-devanagari">
                    छत्रपति शिवाजी महाराज - एक महान योद्धा, कुशल प्रशासक, आणि स्वातंत्र्याचे स्वप्न पाहणारा राजा
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white font-devanagari">
                        जीवनपरिचय
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                        Born in 1630 at Shivneri Fort, Chhatrapati Shivaji Maharaj became one of the greatest rulers in Indian history. He founded the Maratha Empire and pioneered guerrilla warfare tactics that would influence military strategy for centuries.
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg font-devanagari">
                        शिवनेरी किल्ल्यावर जन्मलेल्या शिवरायांनी आपल्या जीवनकाळात ३०० किल्ले जिंकून मराठा साम्राज्याची स्थापना केली. त्यांच्या स्वराज्याच्या कल्पनेने संपूर्ण भारतीय इतिहासाला नवी दिशा दिली.
                    </p>
                    
                    <div class="flex flex-wrap gap-4 mt-8">
                        <div class="bg-red-600 text-white px-6 py-3 rounded-full">
                            <i class="fas fa-calendar mr-2"></i>
                            1630 - 1680
                        </div>
                        <div class="bg-yellow-500 text-white px-6 py-3 rounded-full">
                            <i class="fas fa-crown mr-2"></i>
                            Maratha Empire Founder
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="bg-gradient-to-br from-red-600 to-yellow-500 p-1 rounded-2xl">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Shivaji Maharaj" 
                             class="w-full h-96 object-cover rounded-2xl">
                    </div>
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
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        महाराजांची माहिती
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Complete information about Shivaji Maharaj's life, administration, and legacy
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- Battles Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-sword text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        शिवरायांच्या लढाया
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Complete details of all battles fought by Shivaji Maharaj, including strategies and outcomes.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Battles-of-Shivaji-Maharaj1.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Books Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-teal-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-book text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        पुस्तके व साहित्य
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Historical books, novels, and literature about Chhatrapati Shivaji Maharaj.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Historical-Books-Novels-on-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Economy Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-coins text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        आर्थिक धोरण
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Economic policies, trade relations, and financial administration of the empire.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/ECONOMIC-POLICY-OF-SHIVAJI-MAHARAJ.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Photos Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-camera text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        छायाचित्रे
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Historical photographs, paintings, and visual representations of Shivaji Maharaj.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Shivaji-Maharaj-Photos.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Navy Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-ship text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        मराठा नौदल
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        The powerful Maratha Navy and its role in coastal defense and trade protection.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Aarmar-Navey-of-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Spy Network Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-eye text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        हरखारे विभाग
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Intelligence network, spy system, and information gathering methods of the empire.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Herkhate-Spy-Department-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Army Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        मराठा सेना
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Military organization, training, and the legendary Maratha army structure.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Lashkar-Army-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Justice Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-balance-scale text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        न्याय व्यवस्था
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Justice system, legal reforms, and judicial policies of Shivaji Maharaj's administration.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/NyayNiti-Policy-of-Justice-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Factories Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-industry text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        कारखाने
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Industrial development, manufacturing units, and trade establishments during Maratha rule.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Karkhane-Factories-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Palaces Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-pink-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-palace text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        राजवाडे व महाल
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Royal palaces, architecture, and residential complexes of the Maratha Empire.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Mahal-Palaces-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Unknown Information Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-violet-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-question-circle text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        अज्ञात माहिती
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Lesser-known facts and hidden information about Chhatrapati Shivaji Maharaj.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Unknown-Information-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Songs Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-music text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        गीते व कविता
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Songs, poems, and musical tributes dedicated to Chhatrapati Shivaji Maharaj.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Songs-of-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Shivbawani by Kavi Bhushan Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-amber-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-scroll text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        शिवबावनी - कवि भूषण
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Classic poetry by Kavi Bhushan celebrating the valor and achievements of Shivaji Maharaj.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Shivbawni-Kavi-Bhushan.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Shivbawani Part 2 Card -->
                <div class="royal-card rounded-2xl p-6 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-feather-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        शिवबावनी भाग २
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        Second part of the famous Shivbawani poetry collection by renowned poet Kavi Bhushan.
                    </p>
                    <a href="https://trekshitiz.com/Shivaji/Shiv-bawani2-Kavi-Bhushan.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
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
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        शिवरायांचा काळक्रम
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Important events in the life of Chhatrapati Shivaji Maharaj
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="space-y-8">
                    <div class="timeline-item pl-8 py-6">
                        <h3 class="text-2xl font-bold text-red-600 mb-2">1630</h3>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">जन्म</h4>
                        <p class="text-gray-600 dark:text-gray-300">Born at Shivneri Fort to Shahaji Bhosale and Jijabai on 19th February 1630.</p>
                    </div>
                    
                    <div class="timeline-item pl-8 py-6">
                        <h3 class="text-2xl font-bold text-red-600 mb-2">1645</h3>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">First Fort Capture</h4>
                        <p class="text-gray-600 dark:text-gray-300">Captured Torna Fort at the age of 15, marking the beginning of his military career.</p>
                    </div>
                    
                    <div class="timeline-item pl-8 py-6">
                        <h3 class="text-2xl font-bold text-red-600 mb-2">1659</h3>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">अफझल खानाचा वध</h4>
                        <p class="text-gray-600 dark:text-gray-300">Killed Afzal Khan in a famous encounter at Pratapgad, demonstrating strategic brilliance.</p>
                    </div>
                    
                    <div class="timeline-item pl-8 py-6">
                        <h3 class="text-2xl font-bold text-red-600 mb-2">1674</h3>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">राज्याभिषेक</h4>
                        <p class="text-gray-600 dark:text-gray-300">Coronated as Chhatrapati at Raigad Fort, formally establishing the Maratha Empire.</p>
                    </div>
                    
                    <div class="timeline-item pl-8 py-6">
                        <h3 class="text-2xl font-bold text-red-600 mb-2">1680</h3>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">स्वर्गवास</h4>
                        <p class="text-gray-600 dark:text-gray-300">Passed away on 3rd April 1680 at Raigad Fort, leaving behind a powerful empire.</p>
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
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    शाश्वत प्रेरणा - आजही जगणारे शिवरायांचे आदर्श
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="royal-card rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-flag text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">स्वराज्याची संकल्पना</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        The concept of Swaraj (self-rule) introduced by Shivaji Maharaj became the foundation for India's independence movement centuries later.
                    </p>
                </div>
                
                <div class="royal-card rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-heart text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">धर्मसहिष्णुता</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Religious tolerance and secular governance principles that promoted unity among diverse communities in his empire.
                    </p>
                </div>
                
                <div class="royal-card rounded-2xl p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-users text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">प्रजाहिताची भावना</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Welfare of subjects as the primary duty of a ruler - a principle that continues to inspire modern democratic governance.
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
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        शिवरायांचे किल्ले
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Explore the magnificent forts associated with Chhatrapati Shivaji Maharaj
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="royal-card rounded-2xl overflow-hidden group">
                    <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">राजगड</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">The capital fort and seat of Maratha Empire where Shivaji Maharaj was coronated.</p>
                        <a href="/forts/raigad" class="text-red-600 hover:text-yellow-500 font-semibold">
                            Explore Fort <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <div class="royal-card rounded-2xl overflow-hidden group">
                    <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">प्रतापगड</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">Historic fort where the famous encounter with Afzal Khan took place.</p>
                        <a href="/forts/pratapgad" class="text-red-600 hover:text-yellow-500 font-semibold">
                            Explore Fort <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <div class="royal-card rounded-2xl overflow-hidden group">
                    <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">शिवनेरी</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">Birth place of Chhatrapati Shivaji Maharaj, a sacred fort in Maratha history.</p>
                        <a href="/forts/shivneri" class="text-red-600 hover:text-yellow-500 font-semibold">
                            Explore Fort <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="/forts/shivaji-forts" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-semibold rounded-full hover:from-yellow-500 hover:to-red-600 transition-all duration-300">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    View All Shivaji Forts
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-red-600 to-yellow-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 font-devanagari">
                शिवरायांच्या पावलावर चला
            </h2>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Join us in exploring the legacy and history of the great Maratha Empire
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/trek-schedule" class="inline-flex items-center px-8 py-4 bg-white text-red-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-hiking mr-2"></i>
                    Join Fort Treks
                </a>
                <a href="#newsletter" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Subscribe Newsletter
                </a>
                <a href="/community" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-users mr-2"></i>
                    Join Community
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