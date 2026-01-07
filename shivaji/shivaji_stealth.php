<?php
// Set page specific variables
$page_title = 'हरखारे विभाग - शिवाजी महाराज | Spy Department of Shivaji Maharaj | Trekshitz';
$meta_description = 'Complete information about the intelligence network, spy system, and information gathering methods of Chhatrapati Shivaji Maharaj and the Maratha Empire.';
$meta_keywords = 'Shivaji spy network, Maratha intelligence, Harkhare department, espionage system, हरखारे विभाग, गुप्तचर विभाग';

// Include header
include '../includes/header.php';
?>

<style>
/* Spy Network specific styles with enhanced stealth theme */
.spy-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(107, 114, 128, 0.3);
    transition: all 0.3s ease;
}

.spy-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(75, 85, 99, 0.15);
    border-color: #6b7280;
}

.intelligence-network {
    position: relative;
    height: 300px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 1rem;
    padding: 2rem;
    overflow: hidden;
}

.dark .intelligence-network {
    background: linear-gradient(135deg, #374151, #1f2937);
}

.network-node {
    position: absolute;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #6b7280, #4b5563);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.8rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    transform: scale(0);
}

.network-node.animate {
    opacity: 1;
    transform: scale(1);
}

.network-node:hover {
    transform: scale(1.2);
    box-shadow: 0 8px 16px rgba(75, 85, 99, 0.3);
    z-index: 10;
}

.network-connection {
    position: absolute;
    height: 2px;
    background: linear-gradient(90deg, #6b7280, #9ca3af);
    transform-origin: left;
    opacity: 0;
    transition: all 0.5s ease;
}

.network-connection.animate {
    opacity: 0.6;
}

.stealth-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="stealth" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%236b7280" opacity="0.1"/><path d="M5,5 L15,10 L5,15 Z" fill="%234b5563" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23stealth)"/></svg>');
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #6b7280, #9ca3af);
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.intelligence-highlight {
    background: linear-gradient(135deg, rgba(75, 85, 99, 0.1), rgba(107, 114, 128, 0.1));
    border-left: 4px solid #6b7280;
    padding: 1rem;
    border-radius: 0 0.5rem 0.5rem 0;
}

.dark .intelligence-highlight {
    background: linear-gradient(135deg, rgba(75, 85, 99, 0.2), rgba(107, 114, 128, 0.2));
}

.spy-rank {
    position: relative;
    overflow: hidden;
}

.spy-rank::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.8s ease;
}

.spy-rank:hover::before {
    left: 100%;
}

@media (max-width: 768px) {
    .intelligence-network {
        height: 250px;
        padding: 1rem;
    }
    
    .network-node {
        width: 30px;
        height: 30px;
        font-size: 0.7rem;
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-gray-700 to-gray-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"spy-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"30\" patternUnits=\"userSpaceOnUse\"><circle cx=\"15\" cy=\"15\" r=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/><path d=\"M10,10 L20,15 L10,20 Z\" fill=\"%23ffffff\" opacity=\"0.05\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23spy-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-1 bg-gray-300 rounded-full"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">हरखारे</span> <span class="text-gray-300">विभाग</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Intelligence Network of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    मराठा साम्राज्याची गुप्तचर व्यवस्था आणि माहिती संकलन तंत्र
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Intelligence Operations</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Spy Networks</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Information Warfare</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    <span class="bg-gradient-to-r from-gray-700 to-gray-500 bg-clip-text text-transparent">
                        The Eyes and Ears of Empire
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                    Chhatrapati Shivaji Maharaj established one of the most sophisticated intelligence networks in medieval India. The Harkhare (हरखारे) department was instrumental in gathering crucial information about enemy movements, political developments, and economic conditions across the region.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 font-devanagari leading-relaxed">
                    शिवरायांच्या हरखारे विभागाने मराठा साम्राज्याला शत्रूंच्या हालचालींची, राजकीय घडामोडींची आणि आर्थिक परिस्थितीची अचूक माहिती पुरवली. ही गुप्तचर व्यवस्था त्या काळातील अत्याधुनिक होती.
                </p>
            </div>

            <!-- Intelligence Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 counter" data-target="1000">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">हरखारे</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Active Spies</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Cities Covered</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">गुप्तचर केंद्रे</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-2xl border border-purple-200 dark:border-purple-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="12">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Kingdoms Monitored</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">निरीक्षित राज्ये</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900 dark:to-orange-800 rounded-2xl border border-orange-200 dark:border-orange-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-2 counter" data-target="24">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Hours Response</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">माहिती वेळ</div>
                </div>
            </div>

            <!-- Intelligence Network Visualization -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-8 mb-16">
                <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                    गुप्तचर जाळे
                </h3>
                <div class="intelligence-network" id="intelligenceNetwork">
                    <!-- Central Node - Raigad -->
                    <div class="network-node" data-delay="0" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" title="Raigad - Central Command">
                        <i class="fas fa-crown"></i>
                    </div>
                    
                    <!-- Regional Nodes -->
                    <div class="network-node" data-delay="200" style="top: 20%; left: 30%;" title="Pune Region">
                        <i class="fas fa-fort-awesome"></i>
                    </div>
                    <div class="network-node" data-delay="400" style="top: 20%; right: 30%;" title="Mumbai Region">
                        <i class="fas fa-ship"></i>
                    </div>
                    <div class="network-node" data-delay="600" style="bottom: 20%; left: 20%;" title="Kolhapur Region">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="network-node" data-delay="800" style="bottom: 20%; right: 20%;" title="Nashik Region">
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="network-node" data-delay="1000" style="top: 50%; left: 15%;" title="Bijapur Intelligence">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="network-node" data-delay="1200" style="top: 50%; right: 15%;" title="Mughal Territory">
                        <i class="fas fa-search"></i>
                    </div>
                    
                    <!-- Connection lines will be drawn by JavaScript -->
                </div>
                <p class="text-center text-gray-600 dark:text-gray-300 mt-4 text-sm font-devanagari">
                    राजगडपासून सुरू होणारे गुप्तचर तंत्र संपूर्ण दक्खनमध्ये पसरलेले होते
                </p>
            </div>
        </div>
    </section>

    <!-- Spy Hierarchy -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800 stealth-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-700 to-gray-500 bg-clip-text text-transparent font-devanagari">
                        हरखारे श्रेणी
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Hierarchy and Classification of Intelligence Personnel
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Mukhya Harkhare (Chief Spies) -->
                <div class="spy-card spy-rank bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">मुख्य हरखारे</h3>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Level 1</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-user-secret text-gray-500 mr-3 w-5"></i>
                            <span class="font-semibold">Direct access to Shivaji Maharaj</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-crown text-gray-500 mr-3 w-5"></i>
                            <span>Strategic intelligence operations</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-shield-alt text-gray-500 mr-3 w-5"></i>
                            <span>Counter-intelligence activities</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Chief spies who reported directly to Shivaji Maharaj. They handled the most sensitive intelligence operations, including infiltration of enemy courts and gathering strategic military information.
                    </p>
                    
                    <div class="intelligence-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">विशेष अधिकार:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Authority to recruit agents, allocate resources, and execute covert operations without prior approval.
                        </p>
                    </div>
                </div>

                <!-- Pradhan Harkhare (Regional Chiefs) -->
                <div class="spy-card spy-rank bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">प्रधान हरखारे</h3>
                        <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Level 2</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-map text-gray-500 mr-3 w-5"></i>
                            <span class="font-semibold">Regional intelligence coordination</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-users text-gray-500 mr-3 w-5"></i>
                            <span>Network management and supervision</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-file-alt text-gray-500 mr-3 w-5"></i>
                            <span>Intelligence analysis and reporting</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Regional intelligence chiefs responsible for specific territories. They managed local spy networks, coordinated information flow, and provided detailed reports on regional developments.
                    </p>
                    
                    <div class="intelligence-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Operational Scope:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Covered major cities, trade routes, and enemy territories with dedicated intelligence cells.
                        </p>
                    </div>
                </div>

                <!-- Guptchar (Field Agents) -->
                <div class="spy-card spy-rank bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">गुप्तचर</h3>
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Level 3</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-mask text-gray-500 mr-3 w-5"></i>
                            <span class="font-semibold">Undercover field operations</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-camera text-gray-500 mr-3 w-5"></i>
                            <span>Surveillance and reconnaissance</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-comments text-gray-500 mr-3 w-5"></i>
                            <span>Information gathering and communication</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Field agents who operated undercover in enemy territories, markets, and social gatherings. They gathered day-to-day intelligence and maintained communication networks.
                    </p>
                    
                    <div class="intelligence-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">कार्य पद्धती:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Disguised as merchants, pilgrims, or craftsmen to blend into local populations.
                        </p>
                    </div>
                </div>

                <!-- Khabari (Informants) -->
                <div class="spy-card spy-rank bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">खबरी</h3>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Level 4</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-ear-listen text-gray-500 mr-3 w-5"></i>
                            <span class="font-semibold">Local information collection</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-handshake text-gray-500 mr-3 w-5"></i>
                            <span>Community liaison and contacts</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-coins text-gray-500 mr-3 w-5"></i>
                            <span>Part-time informants and supporters</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Local informants including merchants, farmers, and artisans who provided information about enemy movements, local sentiments, and regional developments.
                    </p>
                    
                    <div class="intelligence-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Network Reach:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Extended to villages, marketplaces, temples, and trade centers across the Deccan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intelligence Operations -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-700 to-gray-500 bg-clip-text text-transparent">
                        Intelligence Operations
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    गुप्तचर कारवाया आणि रणनीती
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <!-- Operation Types -->
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="text-center p-6 bg-gradient-to-br from-indigo-50 to-purple-100 dark:from-indigo-900 dark:to-purple-900 rounded-2xl border border-indigo-200 dark:border-indigo-700 hover:scale-105 transition-transform duration-300 operation-card">
                        <div class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-binoculars text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">शत्रू निरीक्षण</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Continuous monitoring of enemy movements, troop deployments, and strategic planning through embedded agents.
                        </p>
                    </div>
                    
                    <div class="text-center p-6 bg-gradient-to-br from-red-50 to-pink-100 dark:from-red-900 dark:to-pink-900 rounded-2xl border border-red-200 dark:border-red-700 hover:scale-105 transition-transform duration-300 operation-card">
                        <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exchange-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Counter-Intelligence</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Identifying and neutralizing enemy spies, protecting state secrets, and spreading disinformation when necessary.
                        </p>
                    </div>
                    
                    <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-900 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform duration-300 operation-card">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">आर्थिक गुप्तचर</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Gathering economic intelligence about trade routes, taxation systems, and financial weaknesses of enemies.
                        </p>
                    </div>
                </div>

                <!-- Famous Intelligence Successes -->
                <div class="bg-gradient-to-r from-gray-50 to-slate-50 dark:from-gray-900 dark:to-slate-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                        प्रसिद्ध गुप्तचर यश
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Afzal Khan Intelligence</h4>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Advance warning of Afzal Khan's march to Deccan</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Details of his military strength and strategy</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Information about his treacherous plans</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Enabled strategic preparation at Pratapgad</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">आगऱ्यातून सुटका</h4>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                                    <span>Intelligence network inside Mughal court</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                                    <span>Coordination for escape from Agra</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                                    <span>Safe passage arrangements through spies</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                                    <span>Communication with Maratha territories</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Communication Methods -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-700 to-gray-500 bg-clip-text text-transparent font-devanagari">
                        संदेश व्यवस्था
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Communication Systems and Secret Methods
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Coded Messages -->
                <div class="spy-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-code text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">गुप्त संकेत</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Coded messages using symbols, religious texts, and merchant ledgers to hide intelligence from enemy detection.
                    </p>
                </div>

                <!-- Signal Systems -->
                <div class="spy-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-fire text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Signal Networks</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Fire signals from hill tops, drum codes, and mirror flashes for rapid communication across mountainous terrain.
                    </p>
                </div>

                <!-- Disguised Messengers -->
                <div class="spy-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-theater-masks text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">छद्मवेशी दूत</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Messengers disguised as pilgrims, traders, or entertainers carried information across enemy territories safely.
                    </p>
                </div>

                <!-- Dead Drops -->
                <div class="spy-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-archive text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Secret Caches</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Hidden message drops in temples, caves, and market places for secure information exchange without direct contact.
                    </p>
                </div>

                <!-- Naval Intelligence -->
                <div class="spy-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-navy-500 to-blue-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-anchor text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">नौदल गुप्तचर</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Maritime intelligence network monitoring Portuguese, Dutch, and English naval activities along the coast.
                    </p>
                </div>

                <!-- Economic Intelligence -->
                <div class="spy-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Trade Intelligence</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Monitoring trade routes, taxation policies, and economic conditions in neighboring kingdoms for strategic advantage.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Training and Recruitment -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-700 to-gray-500 bg-clip-text text-transparent">
                        Training & Recruitment
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    हरखारे प्रशिक्षण आणि निवड
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-slate-50 to-gray-50 dark:from-slate-900 dark:to-gray-900 rounded-3xl p-8 border border-slate-200 dark:border-slate-700">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">निवड निकष</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-brain text-purple-500 mr-3 mt-1"></i>
                                    <span>Intelligence and quick thinking ability</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-heart text-red-500 mr-3 mt-1"></i>
                                    <span>Loyalty to Maratha cause and Swaraj</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-language text-blue-500 mr-3 mt-1"></i>
                                    <span>Multi-lingual capabilities</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-running text-green-500 mr-3 mt-1"></i>
                                    <span>Physical fitness and endurance</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-mask text-orange-500 mr-3 mt-1"></i>
                                    <span>Acting and disguise abilities</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Training Modules</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-eye text-indigo-500 mr-3 mt-1"></i>
                                    <span>Observation and memory techniques</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-comments text-teal-500 mr-3 mt-1"></i>
                                    <span>Communication and coding methods</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-fist-raised text-red-500 mr-3 mt-1"></i>
                                    <span>Self-defense and combat skills</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-map text-green-500 mr-3 mt-1"></i>
                                    <span>Geography and route knowledge</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-user-secret text-gray-500 mr-3 mt-1"></i>
                                    <span>Infiltration and cover identity</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Legacy and Impact -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-700 to-gray-500 bg-clip-text text-transparent">
                        Intelligence Legacy
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    गुप्तचर वारसा आणि आधुनिक प्रभाव
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-gray-50 to-slate-50 dark:from-gray-900 dark:to-slate-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-700">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">ऐतिहासिक महत्त्व</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>First organized intelligence system in Deccan</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Model for future Indian intelligence operations</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Integration with military strategy</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Contributed to Maratha expansion</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Modern Relevance</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Foundation principles of modern intelligence</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Network-based information gathering</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Counter-intelligence methodologies</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-gray-500 mr-3 mt-1"></i>
                                    <span>Inspiration for national security strategies</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation to Related Pages -->
    <section class="py-16 bg-gradient-to-r from-gray-700 to-gray-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">
                अन्य प्रशासकीय विषय
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Explore more aspects of Maratha administration and governance
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="/shivaji/battles" class="inline-flex items-center px-8 py-4 bg-white text-gray-700 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-sword mr-2"></i>
                    Military Campaigns
                </a>
                <a href="/shivaji/economic-policy" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-gray-700 transition-colors">
                    <i class="fas fa-coins mr-2"></i>
                    आर्थिक धोरण
                </a>
                <a href="/shivaji/justice-system" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-gray-700 transition-colors">
                    <i class="fas fa-balance-scale mr-2"></i>
                    न्याय व्यवस्था
                </a>
            </div>
            
            <!-- Quick Links -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <a href="/shivaji/army" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Military Organization
                </a>
                <a href="/shivaji/navy" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-ship mr-2"></i>
                    Naval Intelligence
                </a>
                <a href="/shivaji/factories" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-industry mr-2"></i>
                    Industrial Network
                </a>
                <a href="/shivaji/books-literature" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-book mr-2"></i>
                    Intelligence Literature
                </a>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Spy Network page loaded');
    
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
    
    // Intelligence Network Animation
    function animateIntelligenceNetwork() {
        const networkObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const nodes = entry.target.querySelectorAll('.network-node');
                    const connections = [];
                    
                    // Animate nodes
                    nodes.forEach(node => {
                        const delay = parseInt(node.getAttribute('data-delay'));
                        setTimeout(() => {
                            node.classList.add('animate');
                        }, delay);
                    });
                    
                    // Create and animate connections
                    setTimeout(() => {
                        createNetworkConnections(entry.target, nodes);
                    }, 1400);
                    
                    networkObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        const network = document.getElementById('intelligenceNetwork');
        if (network) {
            networkObserver.observe(network);
        }
    }
    
    function createNetworkConnections(container, nodes) {
        const centerNode = nodes[0]; // Central node (Raigad)
        const otherNodes = Array.from(nodes).slice(1);
        
        otherNodes.forEach((node, index) => {
            setTimeout(() => {
                const connection = document.createElement('div');
                connection.className = 'network-connection';
                
                const centerRect = centerNode.getBoundingClientRect();
                const nodeRect = node.getBoundingClientRect();
                const containerRect = container.getBoundingClientRect();
                
                const centerX = centerRect.left - containerRect.left + centerRect.width / 2;
                const centerY = centerRect.top - containerRect.top + centerRect.height / 2;
                const nodeX = nodeRect.left - containerRect.left + nodeRect.width / 2;
                const nodeY = nodeRect.top - containerRect.top + nodeRect.height / 2;
                
                const distance = Math.sqrt((nodeX - centerX) ** 2 + (nodeY - centerY) ** 2);
                const angle = Math.atan2(nodeY - centerY, nodeX - centerX);
                
                connection.style.left = centerX + 'px';
                connection.style.top = centerY + 'px';
                connection.style.width = distance + 'px';
                connection.style.transform = `rotate(${angle}rad)`;
                
                container.appendChild(connection);
                
                setTimeout(() => {
                    connection.classList.add('animate');
                }, 100);
            }, index * 200);
        });
    }
    
    // Card Animation on Scroll
    function animateCards() {
        const cards = document.querySelectorAll('.spy-card, .operation-card');
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
        const spyCards = document.querySelectorAll('.spy-card');
        spyCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(75, 85, 99, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-8px) scale(1)';
                this.style.boxShadow = '0 20px 40px rgba(75, 85, 99, 0.15)';
            });
        });
        
        const operationCards = document.querySelectorAll('.operation-card');
        operationCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.08)';
                this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1.05)';
                this.style.boxShadow = 'none';
            });
        });
    }
    
    // Network Node Tooltips
    function setupNodeTooltips() {
        const networkNodes = document.querySelectorAll('.network-node');
        networkNodes.forEach(node => {
            node.addEventListener('mouseenter', function() {
                const tooltip = document.createElement('div');
                tooltip.className = 'absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1 rounded text-xs whitespace-nowrap z-20 pointer-events-none';
                tooltip.textContent = this.getAttribute('title');
                this.appendChild(tooltip);
                
                // Add glow effect
                this.style.boxShadow = '0 0 20px rgba(107, 114, 128, 0.6)';
            });
            
            node.addEventListener('mouseleave', function() {
                const tooltip = this.querySelector('.absolute');
                if (tooltip) {
                    tooltip.remove();
                }
                this.style.boxShadow = '0 8px 16px rgba(75, 85, 99, 0.3)';
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
    
    // Interactive Statistics
    function setupInteractiveStats() {
        const statCards = document.querySelectorAll('[data-target]');
        statCards.forEach(card => {
            card.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                this.style.transform = 'scale(1.1)';
                this.style.transition = 'transform 0.2s ease';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1.05)';
                }, 200);
                
                console.log('Intelligence stat clicked:', target);
            });
        });
    }
    
    // Stealth Mode Animation (Easter Egg)
    function setupStealthMode() {
        let clickCount = 0;
        const logo = document.querySelector('h1');
        
        if (logo) {
            logo.addEventListener('click', function() {
                clickCount++;
                if (clickCount === 5) {
                    // Activate stealth mode
                    document.body.style.filter = 'grayscale(100%) contrast(150%)';
                    this.style.color = '#6b7280';
                    
                    // Add stealth overlay
                    const stealthOverlay = document.createElement('div');
                    stealthOverlay.className = 'fixed inset-0 pointer-events-none z-50';
                    stealthOverlay.style.background = 'radial-gradient(circle at center, transparent 20%, rgba(0,0,0,0.8) 100%)';
                    stealthOverlay.style.animation = 'stealthPulse 2s ease-in-out infinite';
                    document.body.appendChild(stealthOverlay);
                    
                    // Show stealth message
                    const stealthMessage = document.createElement('div');
                    stealthMessage.className = 'fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-gray-300 text-xl font-bold z-50 pointer-events-none';
                    stealthMessage.innerHTML = '🕵️ STEALTH MODE ACTIVATED 🕵️<br><span class="text-sm font-devanagari">गुप्तचर मोड सक्रिय</span>';
                    stealthMessage.style.textAlign = 'center';
                    stealthMessage.style.textShadow = '0 0 10px rgba(107, 114, 128, 0.8)';
                    document.body.appendChild(stealthMessage);
                    
                    // Hide all network nodes temporarily
                    const networkNodes = document.querySelectorAll('.network-node');
                    networkNodes.forEach(node => {
                        node.style.opacity = '0.3';
                        node.style.transform = 'scale(0.8)';
                    });
                    
                    setTimeout(() => {
                        document.body.style.filter = 'none';
                        this.style.color = '';
                        clickCount = 0;
                        
                        // Remove stealth effects
                        if (stealthOverlay) stealthOverlay.remove();
                        if (stealthMessage) stealthMessage.remove();
                        
                        // Restore network nodes
                        networkNodes.forEach(node => {
                            node.style.opacity = '1';
                            node.style.transform = 'scale(1)';
                        });
                    }, 3000);
                }
            });
        }
    }
    
    // Loading Animation for Page Elements
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
    
    // Theme Detection and Handling
    function handleThemeChanges() {
        window.addEventListener('themeChanged', function(e) {
            console.log('Theme changed to:', e.detail.theme);
            
            // Update network visualization for theme
            const networkNodes = document.querySelectorAll('.network-node');
            if (e.detail.theme === 'dark') {
                networkNodes.forEach(node => {
                    node.style.background = 'linear-gradient(135deg, #4b5563, #374151)';
                });
            } else {
                networkNodes.forEach(node => {
                    node.style.background = 'linear-gradient(135deg, #6b7280, #4b5563)';
                });
            }
        });
    }
    
    // Parallax Effect for Hero Section
    function setupParallax() {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('section');
            
            if (heroSection) {
                const speed = scrolled * 0.3;
                heroSection.style.transform = `translateY(${speed}px)`;
            }
        });
    }
    
    // Initialize all functions
    animateCounters();
    animateIntelligenceNetwork();
    animateCards();
    setupHoverEffects();
    setupNodeTooltips();
    setupSmoothScrolling();
    setupInteractiveStats();
    setupStealthMode();
    setupLoadingAnimation();
    handleThemeChanges();
    setupParallax();
    
    console.log('Spy Network: All animations and interactions initialized');
});

// Additional utility functions for intelligence operations
function showSpyDetails(spyType) {
    console.log('Showing details for spy type:', spyType);
    // Function to show detailed information about specific spy categories
}

function demonstrateIntelligenceNetwork() {
    console.log('Demonstrating intelligence network connections...');
    // Function to animate network connections dynamically
}

function revealSecretMessage() {
    console.log('Revealing secret coded message...');
    // Function to show example of coded communication
}

// Performance optimization
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

// Optimized scroll handler for better performance
const optimizedScrollHandler = debounce(function() {
    const scrollY = window.pageYOffset;
    
    // Update network visualization based on scroll
    const networkNodes = document.querySelectorAll('.network-node');
    const scrollProgress = Math.min(scrollY / 1000, 1);
    
    networkNodes.forEach((node, index) => {
        const delay = index * 0.1;
        const opacity = Math.max(0.3, 1 - scrollProgress + delay);
        node.style.opacity = opacity;
    });
}, 10);

window.addEventListener('scroll', optimizedScrollHandler);

// Add enhanced CSS for stealth mode and animations
const enhancedStyle = document.createElement('style');
enhancedStyle.textContent = `
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
    
    @keyframes stealthPulse {
        0%, 100% {
            opacity: 0.8;
        }
        50% {
            opacity: 0.4;
        }
    }
    
    @keyframes networkPulse {
        0%, 100% {
            box-shadow: 0 0 5px rgba(107, 114, 128, 0.5);
        }
        50% {
            box-shadow: 0 0 20px rgba(107, 114, 128, 0.8);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    .network-node {
        animation: networkPulse 3s ease-in-out infinite;
    }
    
    .network-node:hover {
        animation-play-state: paused;
    }
    
    .spy-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
        z-index: 1;
    }
    
    .spy-card:hover::before {
        left: 100%;
    }
    
    .spy-card > * {
        position: relative;
        z-index: 2;
    }
    
    .section-divider {
        animation: expandWidth 1s ease-out;
    }
    
    @keyframes expandWidth {
        from { width: 0; }
        to { width: 100px; }
    }
    
    .intelligence-highlight {
        position: relative;
        overflow: hidden;
    }
    
    .intelligence-highlight::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(107, 114, 128, 0.1), transparent);
        transition: left 0.8s ease;
    }
    
    .intelligence-highlight:hover::after {
        left: 100%;
    }
    
    /* Custom scrollbar for spy theme */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    
    .dark ::-webkit-scrollbar-track {
        background: #1e293b;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #6b7280, #4b5563);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #4b5563, #374151);
    }
`;
document.head.appendChild(enhancedStyle);
</script>