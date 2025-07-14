<?php
// Set page specific variables
$page_title = 'मराठा नौदल - Maratha Navy | Shivaji Maharaj Naval Legacy | Trekshitz';
$meta_description = 'Complete history of the Maratha Navy established by Chhatrapati Shivaji Maharaj. Learn about naval forts, Admiral Kanhoji Angre, ship types, and maritime strategy.';
$meta_keywords = 'Maratha Navy, Shivaji naval power, Kanhoji Angre, sea forts, Vijaydurg, Sindhudurg, मराठा नौदल, naval history India';

// Include header
include '../includes/header.php';
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-blue-600 via-indigo-700 to-blue-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"wave-pattern\" x=\"0\" y=\"0\" width=\"40\" height=\"20\" patternUnits=\"userSpaceOnUse\"><path d=\"M0 10 Q 10 5 20 10 T 40 10\" stroke=\"%23ffffff\" stroke-width=\"0.5\" fill=\"none\" opacity=\"0.2\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23wave-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center animate-pulse">
                        <i class="fas fa-ship text-4xl"></i>
                    </div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">मराठा</span> <span class="text-cyan-300">नौदल</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    The Maratha Navy - Father of Indian Maritime Power
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    समुद्राचा शेणाई - भारतीय नौदलाचे जनक शिवाजी महाराज
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full flex items-center">
                        <i class="fas fa-anchor mr-2"></i>Naval Forts
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full flex items-center">
                        <i class="fas fa-crown mr-2"></i>Admiral Kanhoji Angre
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full flex items-center">
                        <i class="fas fa-flag mr-2"></i>Maritime Legacy
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction & Vision -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Vision of Maritime Power
                    </span>
                </h2>
                <div class="mb-8">
                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4 font-devanagari">
                        "जलमेव यस्य, बलमेव तस्य"
                    </p>
                    <p class="text-lg text-gray-600 dark:text-gray-300 italic">
                        "He who rules the seas is all powerful"
                    </p>
                </div>
                <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                    Chhatrapati Shivaji Maharaj is universally acclaimed as the Father of Indian Navy for his unparalleled contributions to maritime warfare and strategy. At a time when the significance of naval power was largely overlooked in India, Shivaji Maharaj had the foresight to recognize its vital role in both defense and offense.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 font-devanagari leading-relaxed">
                    He laid the foundation of the Maratha naval force in 1654 near Kalyan and went on to build multiple fortified naval bases along the western coastline. शिवरायांनी समुद्री शक्तीचे महत्त्व ओळखून भारतीय नौदलाची पायाभरणी केली.
                </p>
            </div>

            <!-- Key Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-cyan-100 dark:from-blue-900 dark:to-cyan-800 rounded-2xl">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 animate-number" data-target="500">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Naval Ships</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-indigo-50 to-blue-100 dark:from-indigo-900 dark:to-blue-800 rounded-2xl">
                    <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-2 animate-number" data-target="20">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Sea Forts</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-cyan-50 to-teal-100 dark:from-cyan-900 dark:to-teal-800 rounded-2xl">
                    <div class="text-4xl font-bold text-cyan-600 dark:text-cyan-400 mb-2 animate-number" data-target="5000">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Naval Personnel</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-teal-50 to-green-100 dark:from-teal-900 dark:to-green-800 rounded-2xl">
                    <div class="text-4xl font-bold text-teal-600 dark:text-teal-400 mb-2 animate-number" data-target="150">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Coastal Miles</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Historical Development -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent font-devanagari">
                        नौदलाचा विकास
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Development of the Maratha Navy</p>
            </div>

            <div class="max-w-6xl mx-auto">
                <!-- Timeline -->
                <div class="relative">
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-500 to-cyan-500"></div>
                    
                    <!-- 1654 - Foundation -->
                    <div class="flex items-center mb-12">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg border border-blue-200 dark:border-blue-700">
                                <h3 class="text-2xl font-bold text-blue-600 mb-2">1654</h3>
                                <h4 class="text-xl font-semibold mb-3 font-devanagari">नौदलाची स्थापना</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Shivaji's empire reached the west coast after 1656-57 when his dominions touched Kalyan. In the same year, he decided to establish a navy.
                                </p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white dark:border-gray-800"></div>
                        <div class="w-1/2"></div>
                    </div>

                    <!-- 1659 - Initial Fleet -->
                    <div class="flex items-center mb-12">
                        <div class="w-1/2"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-indigo-500 rounded-full border-4 border-white dark:border-gray-800"></div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg border border-indigo-200 dark:border-indigo-700">
                                <h3 class="text-2xl font-bold text-indigo-600 mb-2">1659</h3>
                                <h4 class="text-xl font-semibold mb-3">Initial Fleet</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Circa 1659, the Maratha Navy consisted of around 20 warships. Fleet commanded by Admirals Maynak Bhandari and Daulet Khan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 1674 - Peak Recognition -->
                    <div class="flex items-center mb-12">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg border border-cyan-200 dark:border-cyan-700">
                                <h3 class="text-2xl font-bold text-cyan-600 mb-2">1674</h3>
                                <h4 class="text-xl font-semibold mb-3 font-devanagari">राज्याभिषेक काळ</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    In 1674, the year of Shivaji's coronation, the Portuguese at Goa acknowledged the Maratha naval power and sent their emissary to Shivaji with gifts; they signed a treaty of friendship. Around this time, the Maratha Navy's strength was around 5,000 men and 57 warships.
                                </p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-cyan-500 rounded-full border-4 border-white dark:border-gray-800"></div>
                        <div class="w-1/2"></div>
                    </div>

                    <!-- 1698 - Kanhoji Era -->
                    <div class="flex items-center">
                        <div class="w-1/2"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-teal-500 rounded-full border-4 border-white dark:border-gray-800"></div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg border border-teal-200 dark:border-teal-700">
                                <h3 class="text-2xl font-bold text-teal-600 mb-2">1698</h3>
                                <h4 class="text-xl font-semibold mb-3">Admiral Kanhoji Angre</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    After the death of Admiral Sidhoji Gujar around 1698, the Maratha Navy survived because of the extensive efforts of Kanhoji Angre. He was originally appointed as Sarkhel or Darya-Saranga (Admiral) by the chief of Satara in c. 1698.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ship Types and Naval Technology -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Naval Fleet & Technology
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    जहाजे आणि नौवहतूक तंत्रज्ञान
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Ship Types -->
                <div class="space-y-8">
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 text-center">Types of Warships</h3>
                    
                    <!-- Gurab/Grab -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900 dark:to-indigo-900 rounded-2xl p-6 border border-blue-200 dark:border-blue-700">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-2xl font-bold text-blue-600 dark:text-blue-400 font-devanagari">गुराब (Gurab/Grab)</h4>
                            <i class="fas fa-ship text-3xl text-blue-500"></i>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300 mb-4">
                            <div><i class="fas fa-weight-hanging text-blue-500 mr-2"></i>Displacement: Up to 400 tons</div>
                            <div><i class="fas fa-anchor text-blue-500 mr-2"></i>Role: Main battleship</div>
                            <div><i class="fas fa-cannon text-blue-500 mr-2"></i>Features: Three-masted, heavily armed</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">
                            The primary warship of the Maratha fleet, equipped with multiple cannons and capable of long-range operations.
                        </p>
                    </div>

                    <!-- Gallivat -->
                    <div class="bg-gradient-to-r from-cyan-50 to-teal-50 dark:from-cyan-900 dark:to-teal-900 rounded-2xl p-6 border border-cyan-200 dark:border-cyan-700">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-2xl font-bold text-cyan-600 dark:text-cyan-400">Gallivat (गल्बत)</h4>
                            <i class="fas fa-sailboat text-3xl text-cyan-500"></i>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300 mb-4">
                            <div><i class="fas fa-weight-hanging text-cyan-500 mr-2"></i>Displacement: 30-150 tons</div>
                            <div><i class="fas fa-tachometer-alt text-cyan-500 mr-2"></i>Role: Fast attack vessel</div>
                            <div><i class="fas fa-wind text-cyan-500 mr-2"></i>Features: Highly maneuverable</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">
                            Swift and agile boats used for coastal patrols, surprise attacks, and boarding enemy vessels.
                        </p>
                    </div>

                    <!-- Pal -->
                    <div class="bg-gradient-to-r from-teal-50 to-green-50 dark:from-teal-900 dark:to-green-900 rounded-2xl p-6 border border-teal-200 dark:border-teal-700">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-2xl font-bold text-teal-600 dark:text-teal-400">Pal (पाल)</h4>
                            <i class="fas fa-dharmachakra text-3xl text-teal-500"></i>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300 mb-4">
                            <div><i class="fas fa-crosshairs text-teal-500 mr-2"></i>Type: Maratha Man-of-war</div>
                            <div><i class="fas fa-ship text-teal-500 mr-2"></i>Features: Three-masted boat</div>
                            <div><i class="fas fa-cannon text-teal-500 mr-2"></i>Armament: Guns on broadsides</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">
                            Three-masted boat with guns peeping on the broadsides. Used for medium-range naval operations.
                        </p>
                    </div>
                </div>

                <!-- Naval Strategy -->
                <div class="space-y-8">
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 text-center font-devanagari">युद्ध रणनीती</h3>
                    
                    <!-- Guerrilla Naval Tactics -->
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900 dark:to-red-900 rounded-2xl p-6 border border-orange-200 dark:border-orange-700">
                        <h4 class="text-2xl font-bold text-orange-600 dark:text-orange-400 mb-4 flex items-center">
                            <i class="fas fa-tactics mr-3"></i>Guerrilla Naval Warfare
                        </h4>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-orange-500 mr-2 mt-1"></i>
                                <span>Use smaller but fast and manoeuvrable vessels to approach a European ship from astern in order to avoid the cannon broadside</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-orange-500 mr-2 mt-1"></i>
                                <span>Tow a larger cannon-laden vessel that would direct its fire at the sails and rigging in order to disable the ship</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-orange-500 mr-2 mt-1"></i>
                                <span>Quick boarding and hand-to-hand combat tactics</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Coastal Advantage -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900 dark:to-emerald-900 rounded-2xl p-6 border border-green-200 dark:border-green-700">
                        <h4 class="text-2xl font-bold text-green-600 dark:text-green-400 mb-4 flex items-center">
                            <i class="fas fa-water mr-3"></i>Coastal Water Supremacy
                        </h4>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                <span>As far as possible, no engagement on the high seas; coastal waters were preferred</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                <span>Deep knowledge of local currents and coastal geography</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                <span>Support from local fishing communities and coastal forts</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Revenue System -->
                    <div class="bg-gradient-to-br from-purple-50 to-violet-50 dark:from-purple-900 dark:to-violet-900 rounded-2xl p-6 border border-purple-200 dark:border-purple-700">
                        <h4 class="text-2xl font-bold text-purple-600 dark:text-purple-400 mb-4 flex items-center">
                            <i class="fas fa-coins mr-3"></i>Chauth System
                        </h4>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-rupee-sign text-purple-500 mr-2 mt-1"></i>
                                <span>Any ship voyaging through Maratha territorial waters was to pay a levy called Chouth</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-shield-alt text-purple-500 mr-2 mt-1"></i>
                                <span>Protection fees for safe passage through Maratha waters</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-crown text-purple-500 mr-2 mt-1"></i>
                                <span>Revenue used to maintain and expand naval forces</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sea Forts -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent font-devanagari">
                        समुद्री किल्ले
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Strategic Sea Forts & Naval Bases</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Sindhudurg -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-600 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <i class="fas fa-fort-awesome text-3xl mb-2"></i>
                            <h3 class="text-2xl font-bold font-devanagari">सिंधुदुर्ग</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                            <div><i class="fas fa-calendar text-blue-500 mr-2"></i>Built: 1664-1667</div>
                            <div><i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Location: Kurte Island, Malvan</div>
                            <div><i class="fas fa-shield text-blue-500 mr-2"></i>Purpose: Naval defense against Portuguese</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            Built on the Kurte Island, the fort served as a formidable defense against naval threats from the Portuguese and Siddis. One of Shivaji's most remarkable naval achievements.
                        </p>
                    </div>
                </div>

                <!-- Vijaydurg -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-teal-600 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <i class="fas fa-crown text-3xl mb-2"></i>
                            <h3 class="text-2xl font-bold">विजयदुर्ग</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                            <div><i class="fas fa-calendar text-green-500 mr-2"></i>Captured: 1653</div>
                            <div><i class="fas fa-map-marker-alt text-green-500 mr-2"></i>Location: Devgad coast</div>
                            <div><i class="fas fa-anchor text-green-500 mr-2"></i>Role: Naval headquarters</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            Originally known as Gheria, renamed "Fort of Victory" by Shivaji. Became the main base for Admiral Kanhoji Angre and vital for controlling Arabian Sea trade routes.
                        </p>
                    </div>
                </div>

                <!-- Suvarnadurg -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-600 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <i class="fas fa-gem text-3xl mb-2"></i>
                            <h3 class="text-2xl font-bold">सुवर्णदुर्ग</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                            <div><i class="fas fa-calendar text-yellow-500 mr-2"></i>Built: 1660</div>
                            <div><i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i>Location: Ratnagiri coast</div>
                            <div><i class="fas fa-coins text-yellow-500 mr-2"></i>Role: Trade route protection</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            "Golden Fort" positioned at northern entrance of Kanakadurga Creek. Key role in protecting trade routes along Konkan coast and birthplace of Admiral Kanhoji Angre.
                        </p>
                    </div>
                </div>

                <!-- Padmadurg -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-pink-400 to-purple-600 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <i class="fas fa-lotus text-3xl mb-2"></i>
                            <h3 class="text-2xl font-bold">पद्मदुर्ग</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                            <div><i class="fas fa-calendar text-pink-500 mr-2"></i>Built: 1670s</div>
                            <div><i class="fas fa-map-marker-alt text-pink-500 mr-2"></i>Location: Near Alibaug</div>
                            <div><i class="fas fa-crosshairs text-pink-500 mr-2"></i>Purpose: Counter Siddi influence</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            Also known as Kasa Fort, built on an island to counter growing Siddi influence. Served as vital naval base for controlling surrounding waters and protecting Maratha ships.
                        </p>
                    </div>
                </div>

                <!-- Khanderi -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-blue-600 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <i class="fas fa-island-tropical text-3xl mb-2"></i>
                            <h3 class="text-2xl font-bold">खंडेरी</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                            <div><i class="fas fa-calendar text-indigo-500 mr-2"></i>Annexed: 1679</div>
                            <div><i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>Location: 11 miles off Mumbai</div>
                            <div><i class="fas fa-shield-alt text-indigo-500 mr-2"></i>Strategic: Mumbai entrance control</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            Island fortress 11 miles off Mumbai entrance. Now named Kanhoji Angre Island. The Anglo-Siddi combine made several sea-borne attacks but could not dislodge the Marathas.
                        </p>
                    </div>
                </div>

                <!-- Kolaba -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-teal-400 to-cyan-600 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <i class="fas fa-anchor text-3xl mb-2"></i>
                            <h3 class="text-2xl font-bold">कोलाबा</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-2 mb-4 text-sm text-gray-600 dark:text-gray-300">
                            <div><i class="fas fa-calendar text-teal-500 mr-2"></i>Built: 1678-79</div>
                            <div><i class="fas fa-map-marker-alt text-teal-500 mr-2"></i>Location: Alibag coast</div>
                            <div><i class="fas fa-headquarters text-teal-500 mr-2"></i>Role: Admiral headquarters</div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            Kanhoji Angre's main headquarters. Construction began to counter the Siddis of Janjira's alliance with the English East India Company. Center of Maratha naval operations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admiral Kanhoji Angre -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Admiral Kanhoji Angre
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    सरखेल कान्होजी आंग्रे - समुद्राचा शिवाजी
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Biography -->
                    <div class="space-y-8">
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900 dark:to-cyan-900 rounded-2xl p-8 border border-blue-200 dark:border-blue-700">
                            <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-6 flex items-center">
                                <i class="fas fa-user-crown mr-3"></i>
                                Biography
                            </h3>
                            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                                <div class="flex items-start">
                                    <i class="fas fa-birthday-cake text-blue-500 mr-3 mt-1"></i>
                                    <div>
                                        <p><strong>Born:</strong> August 1669, Suvarnadurg Fort</p>
                                        <p><strong>Died:</strong> 4 July 1729</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-crown text-blue-500 mr-3 mt-1"></i>
                                    <div>
                                        <p><strong>Title:</strong> Sarkhel (Admiral) of Maratha Navy</p>
                                        <p><strong>Also known as:</strong> Samudratla Shivaji (Shivaji of the seas)</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-map-marked text-blue-500 mr-3 mt-1"></i>
                                    <div>
                                        <p><strong>Territory:</strong> Western coast from Mumbai to Vingoria</p>
                                        <p><strong>Period:</strong> Master of 150 miles of coastline for 30+ years</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Achievements -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900 dark:to-emerald-900 rounded-2xl p-8 border border-green-200 dark:border-green-700">
                            <h3 class="text-2xl font-bold text-green-600 dark:text-green-400 mb-6 flex items-center">
                                <i class="fas fa-trophy mr-3"></i>
                                Major Achievements
                            </h3>
                            <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-ship text-green-500 mr-2 mt-1"></i>
                                    <span>Captured more than 50 European trading ships from 1707 to 1729</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-crosshairs text-green-500 mr-2 mt-1"></i>
                                    <span>Famous capture of British ship "Success" in 1721</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-shield text-green-500 mr-2 mt-1"></i>
                                    <span>Remained undefeated against combined British-Portuguese Naval forces</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-fort-awesome text-green-500 mr-2 mt-1"></i>
                                    <span>Commanded 26 forts and fortified places of Maharashtra</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-anchor text-green-500 mr-2 mt-1"></i>
                                    <span>Developed dockyard facilities and naval infrastructure</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Fleet Statistics -->
                    <div class="space-y-8">
                        <div class="bg-gradient-to-br from-purple-50 to-violet-50 dark:from-purple-900 dark:to-violet-900 rounded-2xl p-8 border border-purple-200 dark:border-purple-700">
                            <h3 class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-6 text-center">
                                Naval Fleet Under Kanhoji
                            </h3>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center">
                                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="10">0</div>
                                    <div class="text-gray-700 dark:text-gray-300">Grabs/Gurabs</div>
                                    <div class="text-sm text-gray-500">Main warships</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="50">0</div>
                                    <div class="text-gray-700 dark:text-gray-300">Gallivats</div>
                                    <div class="text-sm text-gray-500">Fast attack boats</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="400">0</div>
                                    <div class="text-gray-700 dark:text-gray-300">Max tonnage</div>
                                    <div class="text-sm text-gray-500">Largest grabs</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2 counter" data-target="30">0</div>
                                    <div class="text-gray-700 dark:text-gray-300">Years service</div>
                                    <div class="text-sm text-gray-500">1698-1729</div>
                                </div>
                            </div>
                        </div>

                        <!-- Famous Battles -->
                        <div class="bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-900 dark:to-orange-900 rounded-2xl p-8 border border-red-200 dark:border-red-700">
                            <h3 class="text-2xl font-bold text-red-600 dark:text-red-400 mb-6 flex items-center">
                                <i class="fas fa-swords mr-3"></i>
                                Notable Naval Battles
                            </h3>
                            <div class="space-y-4">
                                <div class="border-l-4 border-red-500 pl-4">
                                    <h4 class="font-bold text-gray-800 dark:text-white">Battle of Mumbai (Bombay)</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Successfully defended Mumbai against repeated British East India Company attacks</p>
                                </div>
                                <div class="border-l-4 border-orange-500 pl-4">
                                    <h4 class="font-bold text-gray-800 dark:text-white">Battle of Khanderi and Underi</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Decisively defeated combined British and Portuguese forces</p>
                                </div>
                                <div class="border-l-4 border-yellow-500 pl-4">
                                    <h4 class="font-bold text-gray-800 dark:text-white">Siege of Vijaydurg (1718, 1722)</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">Multiple failed attempts by European powers to capture his main base</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Legacy & Modern Recognition -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Legacy & Modern Recognition
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    वारसा आणि आधुनिक मान्यता
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <!-- Modern Indian Navy Recognition -->
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-6 flex items-center">
                            <i class="fas fa-anchor mr-3"></i>
                            Indian Navy Honors
                        </h3>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-medal text-blue-500 mr-2 mt-1"></i>
                                <span><strong>INS Angre:</strong> Western Naval Command named after Admiral Kanhoji Angre</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-ship text-blue-500 mr-2 mt-1"></i>
                                <span><strong>INS Khanderi:</strong> Two submarines named after Maratha sea fort</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-graduation-cap text-blue-500 mr-2 mt-1"></i>
                                <span><strong>INS Shivaji:</strong> Training establishment in Lonavla</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-flag text-blue-500 mr-2 mt-1"></i>
                                <span><strong>Naval Ensign (2022):</strong> Modified to include octagon from Shivaji's royal seal</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <h3 class="text-2xl font-bold text-cyan-600 dark:text-cyan-400 mb-6 flex items-center">
                            <i class="fas fa-landmark mr-3"></i>
                            Modern Memorials
                        </h3>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-island-tropical text-cyan-500 mr-2 mt-1"></i>
                                <span><strong>Kanhoji Angre Island:</strong> Khanderi Island renamed in his honor</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-monument text-cyan-500 mr-2 mt-1"></i>
                                <span><strong>Mumbai Naval Base:</strong> Statue overlooking the harbor mouth</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-stamp text-cyan-500 mr-2 mt-1"></i>
                                <span><strong>Commemorative Stamp:</strong> Indian Postal Service released stamp depicting Gurab</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-tomb text-cyan-500 mr-2 mt-1"></i>
                                <span><strong>Samadhi:</strong> Mausoleum at Alibag, Maharashtra</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Strategic Impact -->
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900 dark:to-cyan-900 rounded-2xl p-8 border border-blue-200 dark:border-blue-700">
                    <h3 class="text-3xl font-bold text-center mb-8 text-blue-600 dark:text-blue-400">
                        Strategic Impact on Indian Maritime History
                    </h3>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-shield-alt text-white text-2xl"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Coastal Defense</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                Established principle of protecting Indian coastline from foreign naval powers and securing maritime sovereignty.
                            </p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-route text-white text-2xl"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Trade Protection</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                Pioneered concept of protecting Indian maritime trade routes and levying taxes on foreign ships in territorial waters.
                            </p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-tactics text-white text-2xl"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Naval Strategy</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                Developed indigenous naval tactics adapted to coastal waters and influenced modern Indian naval strategic thinking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-cyan-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">
                समुद्री वारसा शोधा
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Explore the maritime heritage and naval legacy of Chhatrapati Shivaji Maharaj
            </p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <a href="/shivaji/battles" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-sword mr-2"></i>Naval Battles
                </a>
                <a href="/forts/sea-forts" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-fort-awesome mr-2"></i>Sea Forts
                </a>
                <a href="/shivaji/economic-policy" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-coins mr-2"></i>Economic Strategy
                </a>
                <a href="/shivaji/unknown-facts" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-question-circle mr-2"></i>Unknown Facts
                </a>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter animations
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 50);
    }
    
    // Animate numbers on scroll
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target || entry.target.textContent);
                animateCounter(entry.target, target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    document.querySelectorAll('.animate-number, .counter').forEach(el => {
        counterObserver.observe(el);
    });
    
    // Card entrance animations
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0) scale(1)';
                }, index * 150);
                cardObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    // Observe fort cards and other animatable elements
    document.querySelectorAll('.bg-white.dark\\:bg-gray-900, .bg-gradient-to-br').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px) scale(0.95)';
        card.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        cardObserver.observe(card);
    });
    
    // Enhanced hover effects for fort cards
    document.querySelectorAll('.hover\\:shadow-2xl').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '';
        });
    });
    
    // Floating animation for ship icon in hero
    const shipIcon = document.querySelector('.fa-ship');
    if (shipIcon) {
        shipIcon.style.animation = 'float 3s ease-in-out infinite';
    }
    
// Timeline scroll effects
    const timelineItems = document.querySelectorAll('.timeline-item');
    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateX(0)';
            }
        });
    }, { threshold: 0.3 });
    
    timelineItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = index % 2 === 0 ? 'translateX(-50px)' : 'translateX(50px)';
        item.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        timelineObserver.observe(item);
    });
    
    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.relative.py-20.bg-gradient-to-r');
        if (heroSection) {
            const rate = scrolled * -0.5;
            heroSection.style.transform = `translateY(${rate}px)`;
        }
    });
    
    // Interactive ship movement animation
    const shipCards = document.querySelectorAll('.hover\\:shadow-2xl');
    shipCards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.02)`;
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0) scale(1)';
        });
    });
    
    // Naval statistics animation
    const statisticsCards = document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4 > div');
    statisticsCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.2}s`;
        card.classList.add('animate-bounce-in');
    });
    
    // Smooth reveal for achievement lists
    const achievementLists = document.querySelectorAll('ul.space-y-3');
    achievementLists.forEach(list => {
        const items = list.querySelectorAll('li');
        items.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-20px)';
            item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        });
        
        const listObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const listItems = entry.target.querySelectorAll('li');
                    listItems.forEach(item => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    });
                    listObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        
        listObserver.observe(list);
    });
    
    // Enhanced scroll animations for quotes
    const quotes = document.querySelectorAll('.text-2xl.font-bold.text-blue-600');
    quotes.forEach(quote => {
        quote.style.opacity = '0';
        quote.style.transform = 'scale(0.8)';
        quote.style.transition = 'opacity 1s ease, transform 1s ease';
        
        const quoteObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'scale(1)';
                    quoteObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        quoteObserver.observe(quote);
    });
    
    // Water wave effect for naval sections
    function createWaveEffect() {
        const sections = document.querySelectorAll('.bg-gradient-to-r.from-blue-600');
        sections.forEach(section => {
            section.style.position = 'relative';
            section.style.overflow = 'hidden';
            
            const wave = document.createElement('div');
            wave.className = 'wave-animation';
            wave.style.cssText = `
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
                animation: wave 3s ease-in-out infinite;
                z-index: 0;
            `;
            section.appendChild(wave);
        });
    }
    
    createWaveEffect();
    
    // Dynamic fort card interactions
    const fortCards = document.querySelectorAll('.bg-white.dark\\:bg-gray-900.rounded-2xl');
    fortCards.forEach((card, index) => {
        card.addEventListener('click', function() {
            // Add click ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(59, 130, 246, 0.3);
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (event.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (event.clientY - rect.top - size / 2) + 'px';
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Auto-scroll timeline effect
    let isScrolling = false;
    
    function autoScrollTimeline() {
        if (!isScrolling) {
            const timeline = document.querySelector('.relative.max-w-6xl.mx-auto');
            if (timeline) {
                timeline.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            }
        }
    }
    
    // Trigger auto-scroll when timeline section becomes visible
    const timelineSection = document.querySelector('.py-20.bg-gray-50.dark\\:bg-gray-800');
    if (timelineSection) {
        const timelineSectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(autoScrollTimeline, 1000);
                    timelineSectionObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        timelineSectionObserver.observe(timelineSection);
    }
    
    // Naval battle sound effects (optional - requires user interaction)
    function addSoundEffects() {
        const battleCards = document.querySelectorAll('.border-l-4');
        battleCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                // Subtle visual feedback for battle descriptions
                this.style.backgroundColor = 'rgba(239, 68, 68, 0.05)';
                this.style.transform = 'translateX(5px)';
                this.style.transition = 'all 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.backgroundColor = 'transparent';
                this.style.transform = 'translateX(0)';
            });
        });
    }
    
    addSoundEffects();
    
    console.log('Maratha Navy page loaded successfully with enhanced animations');
});

// Add CSS animations
const additionalStyles = document.createElement('style');
additionalStyles.textContent = `
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes wave {
        0% { left: -100%; }
        100% { left: 100%; }
    }
    
    @keyframes ripple {
        to { transform: scale(4); opacity: 0; }
    }
    
    @keyframes bounce-in {
        0% { opacity: 0; transform: scale(0.3); }
        50% { opacity: 1; transform: scale(1.05); }
        70% { transform: scale(0.9); }
        100% { opacity: 1; transform: scale(1); }
    }
    
    .animate-bounce-in {
        animation: bounce-in 0.8s ease-out forwards;
    }
    
    .wave-animation {
        pointer-events: none;
    }
    
    /* Enhanced hover effects */
    .hover\\:shadow-2xl {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    /* Timeline dot pulse effect */
    .absolute.left-1\\/2.transform.-translate-x-1\\/2.w-4.h-4 {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    /* Gradient text animation */
    .bg-gradient-to-r.from-blue-600.to-cyan-500.bg-clip-text.text-transparent {
        background-size: 200% 200%;
        animation: gradient-shift 3s ease infinite;
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
`;
document.head.appendChild(additionalStyles);