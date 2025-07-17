<?php
// Set page specific variables
$page_title = 'About TreKshitiZ - Explore Sahyadri Mountains | Trekking Community';
$meta_description = 'Learn about TreKshitiZ.com - Maharashtra\'s premier trekking website. Discover our mission, projects like Sudhagad conservation, and join our community of 1000+ trekkers exploring 350+ forts.';
$meta_keywords = 'About TreKshitiZ, Maharashtra trekking, Sahyadri forts, fort conservation, Sudhagad project, trekking community, nature photography';

// Include header
include './includes/header.php';
?>

<style>
/* About Us specific styles with enhanced design */
.about-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(127, 176, 105, 0.3);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.about-card:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 25px 50px rgba(45, 80, 22, 0.2);
    border-color: var(--accent-color);
}

.about-card::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(127, 176, 105, 0.1), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
    opacity: 0;
}

.about-card:hover::before {
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

.project-card {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.dark .project-card {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(45, 80, 22, 0.15);
    border-color: var(--accent-color);
}

.feature-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    position: relative;
    transition: all 0.3s ease;
}

.feature-icon:hover {
    transform: scale(1.1) rotate(5deg);
}

.stats-counter {
    font-size: 3rem;
    font-weight: bold;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.dark .stats-counter {
    color: var(--accent-color);
}

.hero-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hero-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><polygon points="10,2 18,10 10,18 2,10" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23hero-pattern)"/></svg>');
}

.section-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.timeline-item {
    border-left: 3px solid var(--accent-color);
    position: relative;
    padding-left: 2rem;
    margin-bottom: 2rem;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -8px;
    top: 0;
    width: 13px;
    height: 13px;
    border-radius: 50%;
    background: var(--primary-color);
    border: 3px solid var(--accent-color);
}

.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.floating-element {
    position: absolute;
    background: rgba(127, 176, 105, 0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.floating-element:nth-child(1) {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.floating-element:nth-child(2) {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.floating-element:nth-child(3) {
    width: 60px;
    height: 60px;
    top: 80%;
    left: 60%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

.testimonial-card {
    background: linear-gradient(135deg, var(--background-light), white);
    border-radius: 1rem;
    padding: 2rem;
    position: relative;
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.dark .testimonial-card {
    background: linear-gradient(135deg, var(--surface-dark), var(--background-dark));
    border-color: var(--dark-border);
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(45, 80, 22, 0.1);
}

.testimonial-card::before {
    content: '"';
    position: absolute;
    top: -10px;
    left: 20px;
    font-size: 4rem;
    color: var(--accent-color);
    opacity: 0.3;
}

@media (max-width: 768px) {
    .stats-counter {
        font-size: 2rem;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
    }
    
    .floating-element {
        display: none;
    }
}

.video-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 1rem;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 1rem;
}

.interactive-map {
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
    border-radius: 1rem;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.dark .interactive-map {
    background: linear-gradient(135deg, #1e293b, #334155);
}

.map-pin {
    position: absolute;
    width: 20px;
    height: 20px;
    background: var(--accent-color);
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    animation: pulse 2s infinite;
}

.map-pin:hover {
    transform: scale(1.5);
    background: var(--primary-color);
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(127, 176, 105, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(127, 176, 105, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(127, 176, 105, 0);
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary via-secondary to-accent text-white overflow-hidden hero-pattern">
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-5xl mx-auto">
                <div class="flex justify-center mb-8">
                    <div class="w-20 h-1 bg-yellow-300 rounded-full"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    About <span class="text-yellow-300">TreKshitiZ</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Maharashtra's Premier Trekking & Fort Conservation Community
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    सह्याद्री पर्वतरांगेतील ट्रेकिंग आणि किल्ला संवर्धनाची अग्रणी संस्था
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-mountain mr-2"></i>
                        350+ Forts
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-users mr-2"></i>
                        1000+ Trekkers
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-calendar mr-2"></i>
                        Since 2001
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Our Story
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                    Every person in his life whatever background he may be having does have some liking towards traveling to various 
                    destinations near and abroad. Members of KshitiZ group are also of these feelings mainly liking to Sahyadri.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-devanagari">
                    TreKshitiZ.com वर आपले स्वागत आहे - महाराष्ट्रातील सर्वात मोठे ट्रेकिंग आणि किल्ला माहिती पोर्टल.
                </p>
            </div>

            <!-- Mission & Vision -->
            <div class="grid lg:grid-cols-2 gap-12 mb-16">
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Our Mission</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        To preserve and promote the rich heritage of Maharashtra's forts while providing comprehensive 
                        information to trekking enthusiasts. We aim to create awareness about fort conservation and 
                        build a strong community of nature and history lovers.
                    </p>
                </div>
                
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-gradient-to-br from-accent to-forest rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">आमची दृष्टी</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        To become the most trusted platform for trekking information in Maharashtra and to actively 
                        participate in heritage conservation. We envision a future where every fort is preserved 
                        and every trekker is well-informed about safety and conservation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Our Impact
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Numbers that reflect our commitment to trekking and conservation
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="stats-counter animate-number" data-target="350">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-semibold mt-2 font-devanagari">किल्ले</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Documented Forts</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="stats-counter animate-number" data-target="5000">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-semibold mt-2">Photos</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">High Quality Images</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="stats-counter animate-number" data-target="1000">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-semibold mt-2">Trekkers</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Active Community</div>
                </div>
                <div class="text-center transform hover:scale-105 transition-transform duration-300">
                    <div class="stats-counter animate-number" data-target="24">0</div>
                    <div class="text-gray-600 dark:text-gray-300 font-semibold mt-2">Years</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Since 2001</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Website Features Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Website Features
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    TreKshitiZ.com ची मुख्य वैशिष्ट्ये
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                    <div class="feature-icon bg-gradient-to-br from-blue-500 to-blue-600">
                        <i class="fas fa-language text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Bilingual Content</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        First website to display information of forts in Marathi as well as English, making it accessible to a wider audience.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                    <div class="feature-icon bg-gradient-to-br from-green-500 to-green-600">
                        <i class="fas fa-database text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">व्यापक माहिती</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Information of more than 335 forts, categorized to perfection with detailed descriptions and historical context.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                    <div class="feature-icon bg-gradient-to-br from-purple-500 to-purple-600">
                        <i class="fas fa-camera text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Photo Gallery</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        More than 5000 photographs for various moods of forts and nature, capturing the essence of Maharashtra's heritage.
                    </p>
                </div>
                
                <!-- Feature 4 -->
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                    <div class="feature-icon bg-gradient-to-br from-red-500 to-red-600">
                        <i class="fas fa-bus text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Travel Information</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Bus time table of nearby depots to all the forts mentioned on website with comprehensive travel guides.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                    <div class="feature-icon bg-gradient-to-br from-yellow-500 to-orange-500">
                        <i class="fas fa-comments text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">समुदाय मंच</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        A unique forum for nature lovers, trekkers & history lovers from all over the world to connect and share.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700 text-center">
                    <div class="feature-icon bg-gradient-to-br from-indigo-500 to-indigo-600">
                        <i class="fas fa-map text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Interactive Maps</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        The Map section gives useful information about location of various places on each fort and surrounding region.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Major Projects Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Our Major Projects
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    आमचे प्रमुख प्रकल्प आणि उपक्रम
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Sudhagad Project -->
                <div class="project-card group">
                    <div class="h-48 bg-cover bg-center rounded-t-2xl" style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 px-3 py-1 rounded-full text-xs font-semibold">
                                Conservation
                            </span>
                            <i class="fas fa-fort-awesome text-2xl text-accent"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3">Project Sudhagad</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                            Fort conservation initiative to prevent deterioration of Sudhagad - a beautiful fort near Pali. 
                            Last chance to save this valueless treasure from destruction.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-users mr-1"></i>
                                Active Project
                            </span>
                            <a href="/about/sudhagad-project" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors group-hover:bg-accent">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Slide Show Project -->
                <div class="project-card group">
                    <div class="h-48 bg-cover bg-center rounded-t-2xl" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 px-3 py-1 rounded-full text-xs font-semibold">
                                Photography
                            </span>
                            <i class="fas fa-images text-2xl text-accent"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">स्लाईड-शो</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                            Interactive slide presentations showcasing the beauty of Maharashtra's forts, nature, and cultural heritage 
                            through stunning photography and detailed information.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-photo-video mr-1"></i>
                                5000+ Images
                            </span>
                            <a href="/about/slide-show" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors group-hover:bg-accent">
                                View Gallery
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Trekking Activities -->
                <div class="project-card group">
                    <div class="h-48 bg-cover bg-center rounded-t-2xl" style="background-image: url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-3 py-1 rounded-full text-xs font-semibold">
                                Adventure
                            </span>
                            <i class="fas fa-hiking text-2xl text-accent"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">ट्रेकिंग</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                            Comprehensive trekking guidance, safety instructions, and group activities. 
                            Join our community for regular treks and adventure activities across Sahyadri.
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-mountain mr-1"></i>
                                50+ Treks/Month
                            </span>
                            <a href="/about/activities-trekking" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors group-hover:bg-accent">
                                Join Treks
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Our Journey
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    TreKshitiZ चा प्रवास - 2001 पासून आजपर्यंत
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="timeline-item">
                    <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">2001</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Website Launch</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        TreKshitiZ.com was launched on 27th February 2001 with the vision of serving the trekking community 
                        and providing comprehensive information about Maharashtra's forts.
                    </p>
                </div>
                
                <div class="timeline-item">
                    <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">2004</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">प्रोजेक्ट सुधागड</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Started Project Sudhagad in June 2004 - our first major fort conservation initiative 
                        by Kshitiz group of Dombivli to prevent deterioration of heritage structures.
                    </p>
                </div>
                
                <div class="timeline-item">
                    <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">2010</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Community Expansion</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Reached 1000+ active trekkers in our community and expanded our database to include 
                        detailed information about 300+ forts across Maharashtra.
                    </p>
                </div>
                
                <div class="timeline-item">
                    <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">2015</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Digital Innovation</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Introduced mobile-friendly interface, interactive maps, and comprehensive photo galleries 
                        with over 5000 high-quality images of forts and nature.
                    </p>
                </div>
                
                <div class="timeline-item">
                    <h3 class="text-2xl font-bold text-primary dark:text-accent mb-2">2025</h3>
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Modern Platform</h4>
                    <p class="text-gray-600 dark:text-gray-300">
                        Launched completely redesigned platform with modern UI/UX, enhanced search capabilities, 
                        and improved community features while maintaining our core mission of heritage conservation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Our Reach
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Covering forts across Maharashtra and beyond
                </p>
            </div>
            
            <div class="max-w-6xl mx-auto">
                <div class="interactive-map relative h-96">
                    <h3 class="text-2xl font-bold text-center mb-8 text-gray-800 dark:text-white">
                        Maharashtra Fort Distribution Map
                    </h3>
                    <div class="relative h-64 bg-gradient-to-br from-blue-100 to-green-100 dark:from-blue-900 dark:to-green-900 rounded-lg overflow-hidden">
                        <!-- Map pins for different regions -->
                        <div class="map-pin" style="top: 30%; left: 25%;" title="Mumbai Region - 45 Forts"></div>
                        <div class="map-pin" style="top: 25%; left: 40%;" title="Pune Region - 85 Forts"></div>
                        <div class="map-pin" style="top: 20%; left: 55%;" title="Nashik Region - 65 Forts"></div>
                        <div class="map-pin" style="top: 45%; left: 35%;" title="Satara Region - 70 Forts"></div>
                        <div class="map-pin" style="top: 60%; left: 20%;" title="Ratnagiri Region - 35 Forts"></div>
                        <div class="map-pin" style="top: 40%; left: 65%;" title="Aurangabad Region - 50 Forts"></div>
                        
                        <!-- Region labels -->
                        <div class="absolute top-4 left-4 bg-white dark:bg-gray-800 p-2 rounded shadow">
                            <p class="text-xs font-semibold text-gray-800 dark:text-white">Hover over pins to see fort count</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Testimonials -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Community Voice
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    आमच्या समुदायाचे अनुभव
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800 dark:text-white">Anil Joshi</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Regular Trekker</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        TreKshitiZ has been my go-to resource for fort information for over 10 years. 
                        The detailed guides and safety tips have made my trekking experiences both safe and memorable.
                    </p>
                </div>
                
                <div class="testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold">
                            प
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800 dark:text-white font-devanagari">प्रिया शर्मा</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Photography Enthusiast</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed font-devanagari">
                        या वेबसाइटच्या फोटो गॅलरी अप्रतिम आहे. मी माझ्या ट्रेकिंग प्लान्स बनवण्यासाठी नेहमी TreKshitiZ वापरते.
                    </p>
                </div>
                
                <div class="testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                            R
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800 dark:text-white">Rohan Patil</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">History Enthusiast</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        The historical information provided here is incredibly accurate and detailed. 
                        It's wonderful to see such dedication to preserving our heritage.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-secondary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 font-devanagari">
                आमच्यासोबत जुडा
            </h2>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Join our mission to explore, preserve, and promote Maharashtra's heritage
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="/trek-schedule" class="inline-flex items-center px-8 py-4 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-hiking mr-2"></i>
                    Join Our Treks
                </a>
                <a href="/community" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                    <i class="fas fa-users mr-2"></i>
                    Community Forum
                </a>
                <a href="/contact" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Contact Us
                </a>
            </div>
            
            <!-- Social Media Links -->
            <div class="flex justify-center space-x-6">
                <a href="#" class="w-12 h-12 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center transition-colors">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center transition-colors">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center transition-colors">
                    <i class="fab fa-youtube text-xl"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center transition-colors">
                    <i class="fab fa-whatsapp text-xl"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Links to Main Sections -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                    Explore Our Website
                </span>
            </h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/forts" class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 group">
                    <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-secondary transition-colors">
                        <i class="fas fa-fort-awesome text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        किल्ल्यांची माहिती
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        350+ forts database
                    </p>
                </a>
                
                <a href="/gallery" class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 group">
                    <div class="w-16 h-16 bg-secondary rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-primary transition-colors">
                        <i class="fas fa-images text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        Photo Gallery
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        5000+ photographs
                    </p>
                </a>
                
                <a href="/shivaji" class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 group">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-forest transition-colors">
                        <i class="fas fa-crown text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 font-devanagari">
                        शिवाजी महाराज
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Complete information
                    </p>
                </a>
                
                <a href="/trek-schedule" class="about-card bg-white dark:bg-gray-800 rounded-2xl p-6 text-center shadow-xl border border-gray-200 dark:border-gray-700 group">
                    <div class="w-16 h-16 bg-forest rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-accent transition-colors">
                        <i class="fas fa-hiking text-2xl text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">
                        Trek Schedule
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Upcoming events
                    </p>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('About Us page loaded');
    
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.animate-number');
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
            element.textContent = Math.floor(current);
        }, 25);
    }
    
    // Card Animation on Scroll
    function animateCards() {
        const cards = document.querySelectorAll('.about-card, .project-card, .testimonial-card');
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
    
    // Enhanced Hover Effects
    function setupHoverEffects() {
        const featureIcons = document.querySelectorAll('.feature-icon');
        featureIcons.forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.15) rotate(10deg)';
                this.style.boxShadow = '0 15px 30px rgba(45, 80, 22, 0.3)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
                this.style.boxShadow = 'none';
            });
        });
        
        // Project cards hover effects
        const projectCards = document.querySelectorAll('.project-card');
        projectCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                const img = this.querySelector('div[style*="background-image"]');
                if (img) {
                    img.style.transform = 'scale(1.1)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                const img = this.querySelector('div[style*="background-image"]');
                if (img) {
                    img.style.transform = 'scale(1)';
                }
            });
        });
    }
    
    // Interactive Map Functionality
    function setupInteractiveMap() {
        const mapPins = document.querySelectorAll('.map-pin');
        
        mapPins.forEach(pin => {
            pin.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.5)';
                this.style.zIndex = '10';
                
                // Show tooltip
                const tooltip = document.createElement('div');
                tooltip.className = 'absolute bg-gray-800 text-white p-2 rounded text-xs whitespace-nowrap z-20 -top-8 left-1/2 transform -translate-x-1/2';
                tooltip.textContent = this.getAttribute('title');
                this.appendChild(tooltip);
            });
            
            pin.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.zIndex = '1';
                
                // Remove tooltip
                const tooltip = this.querySelector('.absolute');
                if (tooltip) {
                    tooltip.remove();
                }
            });
        });
    }
    
    // Smooth Scrolling for Navigation Links
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
    
    // Parallax Effect for Hero Section
    function setupParallax() {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = scrolled * 0.3;
            
            const heroSection = document.querySelector('section');
            if (heroSection) {
                heroSection.style.transform = `translateY(${parallax}px)`;
            }
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
    
    // Timeline Animation
    function animateTimeline() {
        const timelineItems = document.querySelectorAll('.timeline-item');
        const timelineObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                    timelineObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        timelineItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-30px)';
            item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            timelineObserver.observe(item);
        });
    }
    
    // Statistics Click Interaction
    function setupStatisticsInteraction() {
        const statsCounters = document.querySelectorAll('.stats-counter');
        
        statsCounters.forEach(counter => {
            counter.addEventListener('click', function() {
                this.style.transform = 'scale(1.2)';
                this.style.color = 'var(--accent-color)';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.color = '';
                }, 300);
                
                // Show additional info (could be implemented as modal)
                const value = this.textContent;
                console.log('Clicked stat:', value);
            });
        });
    }
    
    // Testimonial Carousel (if multiple testimonials)
    function setupTestimonialInteraction() {
        const testimonials = document.querySelectorAll('.testimonial-card');
        
        testimonials.forEach(testimonial => {
            testimonial.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.boxShadow = '0 20px 40px rgba(45, 80, 22, 0.15)';
            });
            
            testimonial.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '';
            });
        });
    }
    
    // Error Handling
    function setupErrorHandling() {
        window.addEventListener('error', function(e) {
            console.error('About Us Page Error:', e.error);
        });
    }
    
    // Initialize all functions
    function initializeAll() {
        try {
            animateCounters();
            animateCards();
            setupHoverEffects();
            setupInteractiveMap();
            setupSmoothScrolling();
            setupParallax();
            setupLoadingAnimation();
            animateTimeline();
            setupStatisticsInteraction();
            setupTestimonialInteraction();
            setupErrorHandling();
            
            console.log('About Us: All functionality initialized successfully');
        } catch (error) {
            console.error('Initialization error:', error);
        }
    }
    
    // Run initialization
    initializeAll();
    
    // Performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', function() {
            setTimeout(() => {
                const perfData = performance.getEntriesByType('navigation')[0];
                console.log('About Us Page Load Time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
            }, 0);
        });
    }
});

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Optimized scroll handler
const optimizedScrollHandler = debounce(function() {
    // Handle scroll-based animations with better performance
    const scrollY = window.pageYOffset;
    // Add scroll-based logic here
}, 10);

window.addEventListener('scroll', optimizedScrollHandler);

// Export functions for potential external use
window.AboutUsPage = {
    animateCounters: function() {
        document.querySelectorAll('.animate-number').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateNumber(counter, target);
        });
    }
};

console.log('About Us: Enhanced functionality loaded successfully');
</script>