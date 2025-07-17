<?php
// Set page specific variables
$page_title = 'न्याय व्यवस्था - शिवाजी महाराज | Justice System of Shivaji Maharaj | Trekshitz';
$meta_description = 'Complete information about the justice system, legal reforms, and judicial policies of Chhatrapati Shivaji Maharaj and the Maratha Empire.';
$meta_keywords = 'Shivaji justice system, Maratha law, Nyaya Niti, legal reforms, न्याय व्यवस्था, शिवाजी कानून';

// Include header
include '../includes/header.php';
?>

<style>
/* Justice system specific styles with legal theme */
.justice-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(147, 51, 234, 0.3);
    transition: all 0.3s ease;
}

.justice-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(124, 58, 237, 0.15);
    border-color: #7c3aed;
}

.legal-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="legal" x="0" y="0" width="25" height="25" patternUnits="userSpaceOnUse"><path d="M12.5,5 L20,12.5 L12.5,20 L5,12.5 Z" fill="%237c3aed" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23legal)"/></svg>');
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #7c3aed, #a855f7);
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.law-scale {
    position: relative;
    width: 200px;
    height: 150px;
    margin: 0 auto;
}

.scale-beam {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120px;
    height: 4px;
    background: #7c3aed;
    transform: translate(-50%, -50%);
    border-radius: 2px;
    transition: transform 0.5s ease;
}

.scale-pan {
    position: absolute;
    width: 40px;
    height: 20px;
    background: #a855f7;
    border-radius: 0 0 20px 20px;
    top: 60%;
    transition: all 0.5s ease;
}

.scale-pan.left {
    left: 10%;
}

.scale-pan.right {
    right: 10%;
}

.scale-post {
    position: absolute;
    width: 4px;
    height: 80px;
    background: #7c3aed;
    left: 50%;
    top: 20%;
    transform: translateX(-50%);
}

.principle-highlight {
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(168, 85, 247, 0.1));
    border-left: 4px solid #7c3aed;
    padding: 1rem;
    border-radius: 0 0.5rem 0.5rem 0;
}

.dark .principle-highlight {
    background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(168, 85, 247, 0.2));
}

.court-level {
    position: relative;
    overflow: hidden;
}

.court-level::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.8s ease;
}

.court-level:hover::before {
    left: 100%;
}

@media (max-width: 768px) {
    .law-scale {
        width: 150px;
        height: 120px;
    }
    
    .scale-beam {
        width: 90px;
    }
    
    .scale-pan {
        width: 30px;
        height: 15px;
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-purple-600 to-purple-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 legal-pattern"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">न्याय</span> <span class="text-purple-300">व्यवस्था</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Justice System of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    शिवरायांची न्यायप्रिय आणि समतावादी न्याय व्यवस्था
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Equal Justice</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Legal Reforms</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Fair Trials</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Justice Statistics -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-violet-100 dark:from-purple-900 dark:to-violet-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="18">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">न्यायालये</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Courts</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Legal Reforms</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">कानूनी सुधारणा</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2 counter" data-target="95">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">% Fair Trials</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">निष्पक्ष न्याय</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900 dark:to-orange-800 rounded-2xl hover:scale-105 transition-transform">
                    <div class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-2 counter" data-target="24">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Hours Max Trial</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">जलद न्याय</div>
                </div>
            </div>

            <!-- Justice Scale Visualization -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-8 mb-16">
                <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                    न्यायाचे तराजू
                </h3>
                <div class="law-scale" id="justiceScale">
                    <div class="scale-post"></div>
                    <div class="scale-beam"></div>
                    <div class="scale-pan left">
                        <div class="text-xs text-center text-white mt-1 font-devanagari">धर्म</div>
                    </div>
                    <div class="scale-pan right">
                        <div class="text-xs text-center text-white mt-1">Justice</div>
                    </div>
                </div>
                <p class="text-center text-gray-600 dark:text-gray-300 mt-4 text-sm">
                    Symbol of balanced and impartial justice (Click to balance)
                </p>
            </div>
        </div>
    </section>

    <!-- Court Hierarchy -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800 legal-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent font-devanagari">
                        न्यायालय व्यवस्था
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Court System and Judicial Hierarchy</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Royal Court -->
                <div class="justice-card court-level bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">राजा न्यायालय</h3>
                        <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Supreme</span>
                    </div>
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-crown text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Highest court presided by Shivaji Maharaj for major crimes and appeals.
                    </p>
                </div>

                <!-- Prant Court -->
                <div class="justice-card court-level bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">प्रांत न्यायालय</h3>
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Regional</span>
                    </div>
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-gavel text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Provincial courts handling regional disputes and administrative matters.
                    </p>
                </div>

                <!-- Mahal Court -->
                <div class="justice-card court-level bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">महाल न्यायालय</h3>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">District</span>
                    </div>
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-balance-scale text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        District level courts for local disputes, land matters, and civil cases.
                    </p>
                </div>

                <!-- Village Panchayat -->
                <div class="justice-card court-level bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">ग्राम पंचायत</h3>
                        <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Village</span>
                    </div>
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Village councils resolving local disputes and minor civil matters.
                    </p>
                </div>

                <!-- Commercial Court -->
                <div class="justice-card court-level bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">व्यापारी न्यायालय</h3>
                        <span class="bg-teal-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Commercial</span>
                    </div>
                    <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Specialized courts for trade disputes and commercial matters.
                    </p>
                </div>

                <!-- Military Court -->
                <div class="justice-card court-level bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white font-devanagari">सैन्य न्यायालय</h3>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Military</span>
                    </div>
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Military tribunals for army discipline and war-related offenses.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Legal Principles -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">
                        Legal Principles
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">न्यायाची मूलभूत तत्त्वे</p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Core Principles -->
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 font-devanagari">मूलभूत तत्त्वे</h3>
                        <div class="space-y-6">
                            <div class="principle-highlight">
                                <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">धर्मनिरपेक्षता</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">Equal justice regardless of religion, caste, or social status - revolutionary for its time.</p>
                            </div>
                            <div class="principle-highlight">
                                <h4 class="font-bold text-gray-800 dark:text-white mb-2">Swift Justice</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">Cases resolved within 24 hours to prevent prolonged suffering and corruption.</p>
                            </div>
                            <div class="principle-highlight">
                                <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">साक्षी आधारित</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">Evidence-based trials with witness testimony and physical proof requirements.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Legal Reforms -->
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Legal Reforms</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-female text-purple-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">महिला न्याय</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Protection of women's rights and separate courts for sensitive cases.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-seedling text-purple-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2">Land Rights</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Clear land ownership laws protecting farmers from exploitation.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-handshake text-purple-500 mr-4 mt-1 text-xl"></i>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-2 font-devanagari">व्यापार संरक्षण</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Commercial laws protecting merchants and promoting fair trade.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Punishment System -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent font-devanagari">
                        दंड व्यवस्था
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Punishment and Rehabilitation System</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Minor Crimes -->
                <div class="text-center p-8 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-800 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-hand-paper text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">लघु गुन्हे</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                        Fines, community service, and public apology for minor offenses with focus on rehabilitation.
                    </p>
                </div>

                <!-- Major Crimes -->
                <div class="text-center p-8 bg-gradient-to-br from-orange-50 to-red-100 dark:from-orange-900 dark:to-red-800 rounded-2xl border border-orange-200 dark:border-red-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">मध्यम गुन्हे</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                        Imprisonment, heavy fines, and supervised rehabilitation for serious but non-violent crimes.
                    </p>
                </div>

                <!-- Serious Crimes -->
                <div class="text-center p-8 bg-gradient-to-br from-red-50 to-pink-100 dark:from-red-900 dark:to-pink-800 rounded-2xl border border-red-200 dark:border-red-700 hover:scale-105 transition-transform">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-gavel text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">गंभीर गुन्हे</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                        Severe punishment including banishment for crimes against state, treason, and violence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Legacy and Modern Relevance -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <div class="section-divider"></div>
                    <h2 class="text-4xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">
                            Legal Legacy
                        </span>
                    </h2>
                </div>
                
                <div class="bg-gradient-to-r from-purple-50 to-violet-50 dark:from-purple-900 dark:to-violet-900 rounded-3xl p-8 border border-purple-200 dark:border-purple-700">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">आधुनिक प्रभाव</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Foundation for secular justice system</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Women's rights protection principles</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Swift justice delivery concepts</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Evidence-based trial procedures</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Contemporary Relevance</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Inspiration for fast-track courts</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Restorative justice principles</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Alternative dispute resolution</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mr-3 mt-1"></i>
                                    <span>Community-based justice systems</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation to Related Pages -->
    <section class="py-16 bg-gradient-to-r from-purple-600 to-purple-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">इतर प्रशासकीय विषय</h2>
            <p class="text-xl mb-8 opacity-90">Explore more aspects of Maratha administration</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shivaji/economic-policy" class="inline-flex items-center px-8 py-4 bg-white text-purple-700 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-coins mr-2"></i>
                    आर्थिक धोरण
                </a>
                <a href="/shivaji/army" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-purple-700 transition-colors">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Military System
                </a>
                <a href="/shivaji/spy-network" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-purple-700 transition-colors">
                    <i class="fas fa-eye mr-2"></i>
                    हरखारे विभाग
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

    // Justice Scale Animation
    function setupJusticeScale() {
        const scale = document.getElementById('justiceScale');
        const beam = scale.querySelector('.scale-beam');
        const leftPan = scale.querySelector('.scale-pan.left');
        const rightPan = scale.querySelector('.scale-pan.right');
        
        let balanced = false;
        
        scale.addEventListener('click', () => {
            if (!balanced) {
                // Balance the scale
                beam.style.transform = 'translate(-50%, -50%) rotate(0deg)';
                leftPan.style.transform = 'translateY(0px)';
                rightPan.style.transform = 'translateY(0px)';
                balanced = true;
            } else {
                // Unbalance the scale
                beam.style.transform = 'translate(-50%, -50%) rotate(-5deg)';
                leftPan.style.transform = 'translateY(-5px)';
                rightPan.style.transform = 'translateY(5px)';
                balanced = false;
            }
        });

        // Auto-balance on scroll
        const scaleObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !balanced) {
                    setTimeout(() => scale.click(), 500);
                    scaleObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        scaleObserver.observe(scale);
    }

    // Enhanced Card Animations
    function animateCards() {
        const cards = document.querySelectorAll('.justice-card');
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

    // Principle Highlights Animation
    function animatePrinciples() {
        const principles = document.querySelectorAll('.principle-highlight');
        principles.forEach((principle, index) => {
            principle.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px) scale(1.02)';
                this.style.boxShadow = '0 8px 25px rgba(124, 58, 237, 0.2)';
            });
            
            principle.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0) scale(1)';
                this.style.boxShadow = 'none';
            });
        });
    }

    // Court Level Hover Effects
    function setupCourtHover() {
        const courtLevels = document.querySelectorAll('.court-level');
        courtLevels.forEach(court => {
            court.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(124, 58, 237, 0.2)';
            });
            
            court.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-8px) scale(1)';
                this.style.boxShadow = '0 20px 40px rgba(124, 58, 237, 0.15)';
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
                
                console.log('Justice stat clicked:', this.getAttribute('data-target'));
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

    // Theme Detection
    function handleThemeChanges() {
        window.addEventListener('themeChanged', function(e) {
            console.log('Theme changed to:', e.detail.theme);
        });
    }

    // Initialize all functions
    animateCounters();
    setupJusticeScale();
    animateCards();
    animatePrinciples();
    setupCourtHover();
    setupSmoothScrolling();
    setupInteractiveStats();
    setupLoadingAnimation();
    handleThemeChanges();
    
    console.log('Justice System page loaded successfully');
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
    .principle-highlight {
        transition: all 0.3s ease;
    }
    .court-level {
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);
</script>