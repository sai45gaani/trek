<?php
// Set page specific variables
$page_title = 'आर्थिक धोरण - शिवाजी महाराज | Economic Policy of Shivaji Maharaj | Trekshitz';
$meta_description = 'Complete information about the economic policies, trade relations, revenue systems, and financial administration of Chhatrapati Shivaji Maharaj and the Maratha Empire.';
$meta_keywords = 'Shivaji economic policy, Maratha revenue system, Chauth, Sardeshmukhi, trade policies, आर्थिक धोरण, शिवाजी अर्थव्यवस्था';

// Include header
include '../includes/header.php';
?>

<style>
/* Economic Policy specific styles with enhanced Maratha theme */
.economic-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 153, 51, 0.3);
    transition: all 0.3s ease;
}

.economic-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
    border-color: #ff9933;
}

.revenue-chart {
    position: relative;
    height: 200px;
    display: flex;
    align-items: end;
    justify-content: space-around;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 1rem;
    padding: 1rem;
    overflow: hidden;
}

.dark .revenue-chart {
    background: linear-gradient(135deg, #374151, #1f2937);
}

.revenue-bar {
    width: 60px;
    background: linear-gradient(to top, #dc2626, #ff9933);
    border-radius: 4px 4px 0 0;
    display: flex;
    align-items: end;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 0.8rem;
    padding-bottom: 0.5rem;
    position: relative;
    transition: all 0.5s ease;
    opacity: 0;
    transform: scaleY(0);
}

.revenue-bar.animate {
    opacity: 1;
    transform: scaleY(1);
}

.revenue-bar:hover {
    transform: scaleY(1) scale(1.1);
    box-shadow: 0 8px 16px rgba(220, 38, 38, 0.3);
}

.maratha-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="maratha-coin" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="3" fill="%23ff9933" opacity="0.1"/><circle cx="10" cy="10" r="1" fill="%23dc2626" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23maratha-coin)"/></svg>');
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #dc2626, #ff9933);
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.policy-highlight {
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(255, 153, 51, 0.1));
    border-left: 4px solid #ff9933;
    padding: 1rem;
    border-radius: 0 0.5rem 0.5rem 0;
}

.dark .policy-highlight {
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.2), rgba(255, 153, 51, 0.2));
}

@media (max-width: 768px) {
    .revenue-chart {
        height: 150px;
    }
    
    .revenue-bar {
        width: 40px;
        font-size: 0.7rem;
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-red-600 to-yellow-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"coin-pattern\" x=\"0\" y=\"0\" width=\"30\" height=\"30\" patternUnits=\"userSpaceOnUse\"><circle cx=\"15\" cy=\"15\" r=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"15\" cy=\"15\" r=\"4\" fill=\"%23ffffff\" opacity=\"0.05\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23coin-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">आर्थिक</span> <span class="text-yellow-400">धोरण</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Economic Policy of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    मराठा साम्राज्याची आर्थिक व्यवस्था आणि व्यापारिक धोरणे
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Revenue Systems</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Trade Policies</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Financial Administration</span>
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
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Economic Vision
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                    Chhatrapati Shivaji Maharaj revolutionized not just warfare and administration, but also established a comprehensive economic system that ensured the prosperity of his subjects while maintaining a strong treasury for defense and development.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 font-devanagari leading-relaxed">
                    शिवरायांनी केवळ युद्ध आणि प्रशासनच नाही, तर एक संपूर्ण आर्थिक व्यवस्था उभी केली ज्यामुळे प्रजेची समृद्धी वाढली आणि राज्याचा खजिना भरून राहिला.
                </p>
            </div>

            <!-- Economic Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2 counter" data-target="40">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">कर प्रकार</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Tax Types</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 counter" data-target="25">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">% Revenue from Trade</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">व्यापारातून महसूल</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900 dark:to-yellow-800 rounded-2xl border border-yellow-200 dark:border-yellow-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-yellow-600 dark:text-yellow-400 mb-2 counter" data-target="200">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Trading Centers</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">व्यापारी केंद्रे</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 rounded-2xl border border-purple-200 dark:border-purple-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="15">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Mint Houses</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">नाणे घरे</div>
                </div>
            </div>

            <!-- Revenue Chart -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-8 mb-16">
                <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                    महसूल वितरण
                </h3>
                <div class="revenue-chart" id="revenueChart">
                    <div class="revenue-bar" data-height="75" data-delay="0">
                        <span>40%</span>
                        <div class="absolute -bottom-8 text-xs text-gray-600 dark:text-gray-300 text-center w-full font-devanagari">भूमी</div>
                    </div>
                    <div class="revenue-bar" data-height="60" data-delay="200">
                        <span>25%</span>
                        <div class="absolute -bottom-8 text-xs text-gray-600 dark:text-gray-300 text-center w-full font-devanagari">चौथ</div>
                    </div>
                    <div class="revenue-bar" data-height="40" data-delay="400">
                        <span>20%</span>
                        <div class="absolute -bottom-8 text-xs text-gray-600 dark:text-gray-300 text-center w-full">Trade</div>
                    </div>
                    <div class="revenue-bar" data-height="30" data-delay="600">
                        <span>10%</span>
                        <div class="absolute -bottom-8 text-xs text-gray-600 dark:text-gray-300 text-center w-full">सरदेशमुखी</div>
                    </div>
                    <div class="revenue-bar" data-height="20" data-delay="800">
                        <span>5%</span>
                        <div class="absolute -bottom-8 text-xs text-gray-600 dark:text-gray-300 text-center w-full">Other</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Revenue System -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800 maratha-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        महसूल व्यवस्था
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Innovative Revenue Collection System
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Chauth System -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">चौथ व्यवस्था</h3>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">25% Revenue</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-percentage text-red-500 mr-3 w-5"></i>
                            <span class="font-semibold">25% of total revenue</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-shield-alt text-red-500 mr-3 w-5"></i>
                            <span>Protection money from neighboring territories</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-handshake text-red-500 mr-3 w-5"></i>
                            <span>Non-interference agreement</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Chauth was a tax of 25% levied on neighboring territories in exchange for protection from external invasions and non-interference in their internal affairs. This innovative system generated substantial revenue while maintaining diplomatic relations.
                    </p>
                    
                    <div class="policy-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">व्यावहारिक महत्त्व:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Provided steady income without direct conquest, maintained regional stability, and established Maratha influence across the Deccan.
                        </p>
                    </div>
                </div>

                <!-- Sardeshmukhi System -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">सरदेशमुखी</h3>
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">10% Revenue</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-percentage text-red-500 mr-3 w-5"></i>
                            <span class="font-semibold">10% of total revenue</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-crown text-red-500 mr-3 w-5"></i>
                            <span>Hereditary right as overlord</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-map text-red-500 mr-3 w-5"></i>
                            <span>Administrative oversight</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Sardeshmukhi was an additional 10% tax claimed by Shivaji as the hereditary Sardeshmukh (overlord) of the Deccan territories. This established legitimacy and provided additional revenue stream.
                    </p>
                    
                    <div class="policy-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Legal Foundation:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Based on historical claims and administrative traditions, legitimizing Maratha authority over vast territories.
                        </p>
                    </div>
                </div>

                <!-- Land Revenue -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">भूमी महसूल</h3>
                        <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Primary Source</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-seedling text-red-500 mr-3 w-5"></i>
                            <span class="font-semibold">Based on agricultural productivity</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-balance-scale text-red-500 mr-3 w-5"></i>
                            <span>Fair assessment system</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-users text-red-500 mr-3 w-5"></i>
                            <span>Protection of farmer rights</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Land revenue formed the backbone of Maratha finances. Shivaji implemented fair assessment based on actual productivity, soil quality, and local conditions, ensuring both state revenue and farmer welfare.
                    </p>
                    
                    <div class="policy-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">कृषक कल्याण:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Introduced crop insurance, disaster relief, and encouraged agricultural innovation and irrigation projects.
                        </p>
                    </div>
                </div>

                <!-- Trade Taxes -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">व्यापारी कर</h3>
                        <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Growing Source</span>
                    </div>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-ship text-red-500 mr-3 w-5"></i>
                            <span class="font-semibold">Port duties and customs</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-road text-red-500 mr-3 w-5"></i>
                            <span>Transit fees and market taxes</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-coins text-red-500 mr-3 w-5"></i>
                            <span>Mint charges and currency regulation</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Trade taxes from coastal ports, inland markets, and transit routes provided significant revenue. Shivaji encouraged trade while ensuring fair taxation that didn't burden merchants.
                    </p>
                    
                    <div class="policy-highlight">
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Commercial Policy:</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Promoted free trade, protected merchant interests, and established standardized weights and measures across the empire.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trade and Commerce -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Trade & Commerce
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    व्यापार आणि वाणिज्य धोरणे
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <!-- Trade Routes and Centers -->
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="text-center p-6 bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900 dark:to-orange-900 rounded-2xl border border-amber-200 dark:border-amber-700 hover:scale-105 transition-transform duration-300 trade-card">
                        <div class="w-16 h-16 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-anchor text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">समुद्री व्यापार</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Coastal ports like Raigad, Kalyan, and Chaul became major trading hubs connecting with Arab, European, and Southeast Asian merchants.
                        </p>
                    </div>
                    
                    <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900 dark:to-emerald-900 rounded-2xl border border-green-200 dark:border-green-700 hover:scale-105 transition-transform duration-300 trade-card">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-route text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Inland Trade Routes</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Established secure trade corridors connecting Deccan with northern India, facilitating movement of goods and generating transit revenues.
                        </p>
                    </div>
                    
                    <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-900 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300 trade-card">
                        <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">बाजार नियंत्रण</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Standardized weights, measures, and currency across the empire, ensuring fair trade practices and reducing commercial disputes.
                        </p>
                    </div>
                </div>

                <!-- Economic Innovations -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900 dark:to-purple-900 rounded-3xl p-8 border border-indigo-200 dark:border-indigo-700">
                    <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                        आर्थिक नवकल्पना
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Currency System</h4>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-coins text-yellow-500 mr-3 mt-1"></i>
                                    <span>Introduction of Marathi inscriptions on coins</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-coins text-yellow-500 mr-3 mt-1"></i>
                                    <span>Standardized silver and copper currency</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-coins text-yellow-500 mr-3 mt-1"></i>
                                    <span>Established mint houses in major cities</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-coins text-yellow-500 mr-3 mt-1"></i>
                                    <span>Prevented currency debasement and counterfeiting</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">आर्थिक सुधारणा</h4>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-chart-line text-green-500 mr-3 mt-1"></i>
                                    <span>Agricultural development and irrigation projects</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chart-line text-green-500 mr-3 mt-1"></i>
                                    <span>Promotion of local industries and crafts</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chart-line text-green-500 mr-3 mt-1"></i>
                                    <span>Infrastructure development for trade</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chart-line text-green-500 mr-3 mt-1"></i>
                                    <span>Protection of merchant and artisan communities</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Administration -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        आर्थिक प्रशासन
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Financial Administration and Treasury Management
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Treasury Management -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-vault text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">खजिना व्यवस्थापन</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Established secure treasury systems with proper accounting, auditing, and fund allocation for military, administration, and public welfare.
                    </p>
                </div>

                <!-- Tax Collection -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-receipt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Tax Collection System</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Implemented efficient tax collection through trained officials with transparent processes and appeal mechanisms for taxpayers.
                    </p>
                </div>

                <!-- Budget Planning -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-calculator text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">अर्थसंकल्प नियोजन</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Strategic budget allocation prioritizing defense, infrastructure, agriculture, and public welfare with emergency reserves for natural disasters.
                    </p>
                </div>

                <!-- Revenue Audit -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-search-dollar text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Revenue Audit</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Regular auditing of revenue collection, expenditure tracking, and prevention of corruption through strict oversight mechanisms.
                    </p>
                </div>

                <!-- Economic Intelligence -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-chart-network text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">आर्थिक बुद्धिमत्ता</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Gathering economic intelligence about neighboring kingdoms, trade patterns, and market conditions to make informed policy decisions.
                    </p>
                </div>

                <!-- Welfare Programs -->
                <div class="economic-card bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-hands-helping text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Welfare Programs</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Dedicated funds for drought relief, temple maintenance, education, and support for widows, orphans, and disabled citizens.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Legacy and Impact -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Economic Legacy
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    आर्थिक वारसा आणि प्रभाव
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-red-50 to-yellow-50 dark:from-red-900 dark:to-yellow-900 rounded-3xl p-8 border border-red-200 dark:border-red-700">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">दीर्घकालीन प्रभाव</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-red-500 mr-3 mt-1"></i>
                                    <span>Foundation for modern taxation principles</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-red-500 mr-3 mt-1"></i>
                                    <span>Maritime trade regulation models</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-red-500 mr-3 mt-1"></i>
                                    <span>Agricultural reform inspirations</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-red-500 mr-3 mt-1"></i>
                                    <span>Commercial law precedents</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Modern Relevance</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Balanced taxation philosophy</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Economic nationalism concepts</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Regional economic integration</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-3 mt-1"></i>
                                    <span>Welfare state foundations</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation to Related Pages -->
    <section class="py-16 bg-gradient-to-r from-red-600 to-yellow-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">
                अन्य प्रशासकीय विषय
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Explore more aspects of Maratha administration and governance
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="/shivaji/battles" class="inline-flex items-center px-8 py-4 bg-white text-red-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-sword mr-2"></i>
                    Military Campaigns
                </a>
                <a href="/shivaji/justice-system" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-balance-scale mr-2"></i>
                    न्याय व्यवस्था
                </a>
                <a href="/shivaji/army" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Military Organization
                </a>
            </div>
            
            <!-- Quick Links -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <a href="/shivaji/factories" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-industry mr-2"></i>
                    Industries
                </a>
                <a href="/shivaji/navy" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-ship mr-2"></i>
                    Naval Trade
                </a>
                <a href="/shivaji/intelligence-network" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-eye mr-2"></i>
                    Intelligence System
                </a>
                <a href="/shivaji/books-literature" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-book mr-2"></i>
                    Economic Literature
                </a>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Economic Policy page loaded');
    
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
    
    // Revenue Chart Animation
    function animateRevenueChart() {
        const chartObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bars = entry.target.querySelectorAll('.revenue-bar');
                    bars.forEach(bar => {
                        const height = bar.getAttribute('data-height');
                        const delay = parseInt(bar.getAttribute('data-delay'));
                        
                        setTimeout(() => {
                            bar.style.height = height + '%';
                            bar.classList.add('animate');
                        }, delay);
                    });
                    chartObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        const chart = document.getElementById('revenueChart');
        if (chart) {
            chartObserver.observe(chart);
        }
    }
    
    // Card Animation on Scroll
    function animateCards() {
        const cards = document.querySelectorAll('.economic-card, .trade-card');
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
    
    // Enhanced Hover Effects
    function setupHoverEffects() {
        const economicCards = document.querySelectorAll('.economic-card');
        economicCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(220, 38, 38, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-8px) scale(1)';
                this.style.boxShadow = '0 20px 40px rgba(220, 38, 38, 0.15)';
            });
        });
        
        const tradeCards = document.querySelectorAll('.trade-card');
        tradeCards.forEach(card => {
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
    
    // Revenue Bar Tooltips
    function setupTooltips() {
        const revenueBars = document.querySelectorAll('.revenue-bar');
        revenueBars.forEach(bar => {
            bar.addEventListener('mouseenter', function() {
                const tooltip = document.createElement('div');
                tooltip.className = 'absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-xs whitespace-nowrap z-10';
                tooltip.textContent = this.textContent + ' of total revenue';
                this.appendChild(tooltip);
            });
            
            bar.addEventListener('mouseleave', function() {
                const tooltip = this.querySelector('.absolute');
                if (tooltip) {
                    tooltip.remove();
                }
            });
        });
    }
    
    // Parallax Effect for Hero Section
    function setupParallax() {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('section');
            
            if (heroSection) {
                const speed = scrolled * 0.5;
                heroSection.style.transform = `translateY(${speed}px)`;
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
    
    // Theme Detection and Handling
    function handleThemeChanges() {
        window.addEventListener('themeChanged', function(e) {
            console.log('Theme changed to:', e.detail.theme);
            // Add any theme-specific animations or updates here
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
                
                // You can add more detailed information display here
                console.log('Stat clicked:', target);
            });
        });
    }
    
    // Initialize all functions
    animateCounters();
    animateRevenueChart();
    animateCards();
    setupSmoothScrolling();
    setupHoverEffects();
    setupTooltips();
    setupParallax();
    setupLoadingAnimation();
    handleThemeChanges();
    setupInteractiveStats();
    
    console.log('Economic Policy: All animations and interactions initialized');
});

// Additional utility functions
function showDetailedInfo(category) {
    // Function to show detailed information about specific economic policies
    console.log('Showing detailed info for:', category);
    // You can implement modal or sidebar functionality here
}

function downloadEconomicData() {
    // Function to download economic data or generate reports
    console.log('Downloading economic data...');
    // Implementation for data export functionality
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

// Optimized scroll handler
const optimizedScrollHandler = debounce(function() {
    // Handle scroll-based animations with better performance
    const scrollY = window.pageYOffset;
    // Add scroll-based logic here
}, 10);

window.addEventListener('scroll', optimizedScrollHandler);

// Add CSS for enhanced animations
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
    
    .revenue-bar {
        transform-origin: bottom;
    }
    
    .economic-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .economic-card:hover::before {
        left: 100%;
    }
    
    .section-divider {
        animation: expandWidth 1s ease-out;
    }
    
    @keyframes expandWidth {
        from { width: 0; }
        to { width: 100px; }
    }
`;
document.head.appendChild(enhancedStyle);
</script>