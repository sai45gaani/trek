<?php
// Set page specific variables
$page_title = 'गीते व कविता - शिवाजी महाराज | Songs and Poetry of Shivaji Maharaj | Trekshitz';
$meta_description = 'Explore the rich musical heritage dedicated to Chhatrapati Shivaji Maharaj. Traditional folk songs, classical compositions, bhajans, and modern tributes celebrating the great Maratha king.';
$meta_keywords = 'Shivaji songs, Marathi poetry, folk songs, भजन, शिवाजी गीते, traditional music, cultural heritage';

// Include header
include '../includes/header.php';
?>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"music-pattern\" x=\"0\" y=\"0\" width=\"25\" height=\"25\" patternUnits=\"userSpaceOnUse\"><circle cx=\"12.5\" cy=\"12.5\" r=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/><path d=\"M8 15 Q12.5 8 17 15\" stroke=\"%23ffffff\" stroke-width=\"1\" fill=\"none\" opacity=\"0.05\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23music-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-1 bg-pink-400 rounded-full animate-pulse"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                    <span class="font-devanagari">गीते</span> <span class="text-pink-400">व कविता</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Songs and Poetry of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    शिवरायांच्या स्मरणार्थ रचलेली गीते, कविता आणि भजने
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Folk Songs</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Classical Music</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">भजन आणि कीर्तन</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Musical Heritage Statistics -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-gradient-to-br from-rose-50 to-pink-100 dark:from-rose-900 dark:to-pink-800 rounded-2xl border border-rose-200 dark:border-rose-700 hover:scale-105 transition-transform duration-300 music-card">
                    <div class="text-4xl font-bold text-rose-600 dark:text-rose-400 mb-2 counter" data-target="200">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">लोकगीते</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Folk Songs</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-800 rounded-2xl border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300 music-card">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2 counter" data-target="75">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Classical Compositions</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">शास्त्रीय संगीत</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-amber-50 to-yellow-100 dark:from-amber-900 dark:to-yellow-800 rounded-2xl border border-amber-200 dark:border-amber-700 hover:scale-105 transition-transform duration-300 music-card">
                    <div class="text-4xl font-bold text-amber-600 dark:text-amber-400 mb-2 counter" data-target="150">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold font-devanagari">भजने</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Devotional Songs</div>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-emerald-50 to-green-100 dark:from-emerald-900 dark:to-green-800 rounded-2xl border border-emerald-200 dark:border-emerald-700 hover:scale-105 transition-transform duration-300 music-card">
                    <div class="text-4xl font-bold text-emerald-600 dark:text-emerald-400 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Modern Tributes</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">आधुनिक गीते</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Song Categories -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="w-16 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-6"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent font-devanagari">
                        संगीत परंपरा
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Musical Traditions Celebrating the Great King
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Folk Songs -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-guitar text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">लोकगीते</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-orange-50 dark:bg-orange-900 p-4 rounded-lg border-l-4 border-orange-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"राजा शिव छत्रपती"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Traditional folk ballad celebrating his coronation and achievements.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-music mr-2"></i>
                                <span>महाराष्ट्रीय लोकगीत</span>
                            </div>
                        </div>
                        <div class="bg-orange-50 dark:bg-orange-900 p-4 rounded-lg border-l-4 border-orange-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2">"Powada of Shivaji"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Epic narrative songs recounting his military victories and valor.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-scroll mr-2"></i>
                                <span>Traditional Ballads</span>
                            </div>
                        </div>
                        <div class="bg-orange-50 dark:bg-orange-900 p-4 rounded-lg border-l-4 border-orange-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"गडकिल्ल्यांची गाणी"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Songs about forts and battles, sung by folk artists across Maharashtra.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-fort-awesome mr-2"></i>
                                <span>Fort Ballads</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Classical Music -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-music text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Classical Compositions</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg border-l-4 border-blue-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"शिवराज्य स्तोत्र"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Sanskrit hymns composed in classical ragas praising his rule.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-om mr-2"></i>
                                <span>Raag Bhairav</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg border-l-4 border-blue-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2">"Maratha Sangeet"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Court musicians' compositions performed during royal ceremonies.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-crown mr-2"></i>
                                <span>Royal Court Music</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-lg border-l-4 border-blue-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"वीर रस गायन"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Heroic compositions in classical style celebrating his bravery.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-shield-alt mr-2"></i>
                                <span>Heroic Ragas</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Devotional Songs -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-praying-hands text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white font-devanagari">भक्ती संगीत</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg border-l-4 border-yellow-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"शिवाजी महाराज आरती"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Traditional aarti sung in temples and homes honoring the king.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-diya-lamp mr-2"></i>
                                <span>Temple Worship</span>
                            </div>
                        </div>
                        <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg border-l-4 border-yellow-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2">"Bhajan Compositions"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Devotional songs comparing him to divine protectors and heroes.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-heart mr-2"></i>
                                <span>Devotional Music</span>
                            </div>
                        </div>
                        <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg border-l-4 border-yellow-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"कीर्तन परंपरा"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Kirtan traditions that include stories and songs about his life.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-users mr-2"></i>
                                <span>Community Singing</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modern Tributes -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-microphone text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Modern Musical Tributes</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-purple-50 dark:bg-purple-900 p-4 rounded-lg border-l-4 border-purple-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Contemporary Albums</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Modern music albums by renowned artists celebrating his legacy.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-compact-disc mr-2"></i>
                                <span>Studio Recordings</span>
                            </div>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900 p-4 rounded-lg border-l-4 border-purple-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">"चित्रपट गीते"</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Bollywood and Marathi film songs featuring his stories and valor.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-film mr-2"></i>
                                <span>Cinema Music</span>
                            </div>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900 p-4 rounded-lg border-l-4 border-purple-500">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Festival Performances</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Live performances during Shiv Jayanti and cultural festivals.</p>
                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <span>Cultural Events</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Famous Compositions Showcase -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="w-16 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-6"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Famous Compositions
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    प्रसिद्ध रचना आणि गीते
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Composition 1 -->
                <div class="bg-gradient-to-br from-rose-50 to-pink-100 dark:from-rose-900 dark:to-pink-800 rounded-2xl p-6 border border-rose-200 dark:border-rose-700 hover:scale-105 transition-transform duration-300 composition-card">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-rose-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-scroll text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">शिवगीता</h3>
                        <span class="text-sm text-rose-600 dark:text-rose-400 font-semibold">संत तुकाराम</span>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <p class="text-gray-600 dark:text-gray-300 text-sm italic text-center font-devanagari">
                            "शिवराया झालसे राजा<br>
                            धर्मवीर गुणी आजा<br>
                            स्वराज्याचा दिला संदेश<br>
                            जगभर पसरला यश"
                        </p>
                    </div>
                    <div class="text-center mt-4">
                        <span class="text-xs text-gray-500 dark:text-gray-400">17th Century | Classical</span>
                    </div>
                </div>

                <!-- Composition 2 -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900 dark:to-indigo-800 rounded-2xl p-6 border border-blue-200 dark:border-blue-700 hover:scale-105 transition-transform duration-300 composition-card">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-music text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Maratha Sanskriti</h3>
                        <span class="text-sm text-blue-600 dark:text-blue-400 font-semibold">Folk Tradition</span>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <p class="text-gray-600 dark:text-gray-300 text-sm italic text-center">
                            "Shivaji the great king<br>
                            Mountains echo his name<br>
                            Freedom's eternal flame<br>
                            Forever shall remain"
                        </p>
                    </div>
                    <div class="text-center mt-4">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Traditional | Folk</span>
                    </div>
                </div>

                <!-- Composition 3 -->
                <div class="bg-gradient-to-br from-amber-50 to-yellow-100 dark:from-amber-900 dark:to-yellow-800 rounded-2xl p-6 border border-amber-200 dark:border-amber-700 hover:scale-105 transition-transform duration-300 composition-card">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-crown text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">छत्रपती गीत</h3>
                        <span class="text-sm text-amber-600 dark:text-amber-400 font-semibold">Modern Tribute</span>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                        <p class="text-gray-600 dark:text-gray-300 text-sm italic text-center font-devanagari">
                            "छत्रपती शिवाजी महाराज<br>
                            तुझे नाम अमर राहील<br>
                            स्वराज्याचे स्वप्न तुझे<br>
                            चिरकाल उजळत राहील"
                        </p>
                    </div>
                    <div class="text-center mt-4">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Contemporary | Devotional</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Impact -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <div class="w-16 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-6"></div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            Musical Legacy
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                        संगीत परंपरेचा प्रभाव
                    </p>
                </div>

                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900 dark:to-purple-900 rounded-3xl p-8 border border-indigo-200 dark:border-indigo-700">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">सांस्कृतिक महत्त्व</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-music text-indigo-500 mr-3 mt-1"></i>
                                    <span>Preservation of Marathi cultural identity through music</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-users text-indigo-500 mr-3 mt-1"></i>
                                    <span>Community bonding through collective singing traditions</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-heart text-indigo-500 mr-3 mt-1"></i>
                                    <span>Emotional connection to historical heritage</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-graduation-cap text-indigo-500 mr-3 mt-1"></i>
                                    <span>Educational tool for teaching history</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Modern Influence</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-broadcast-tower text-purple-500 mr-3 mt-1"></i>
                                    <span>Radio and digital music platform presence</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-theater-masks text-purple-500 mr-3 mt-1"></i>
                                    <span>Integration in theater and cultural performances</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-school text-purple-500 mr-3 mt-1"></i>
                                    <span>Teaching in schools and cultural institutions</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-globe text-purple-500 mr-3 mt-1"></i>
                                    <span>International recognition of Maratha musical heritage</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">
                संगीत परंपरा जपा
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Preserve and celebrate the musical heritage of Chhatrapati Shivaji Maharaj
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shivaji/audio-collection" class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-headphones mr-2"></i>
                    Listen to Songs
                </a>
                <a href="/shivaji/poetry" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-indigo-600 transition-colors">
                    <i class="fas fa-scroll mr-2"></i>
                    कविता संग्रह
                </a>
                <a href="/cultural-events" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-indigo-600 transition-colors">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Cultural Events
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
    
    // Music Card Animations
    function animateMusicCards() {
        const musicCards = document.querySelectorAll('.music-card, .composition-card');
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
        }, { threshold: 0.1, rootMargin: '50px' });
        
        musicCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px) scale(0.95)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            cardObserver.observe(card);
        });
    }
    
    // Musical Note Animation Effect
    function setupMusicalEffects() {
        const musicCards = document.querySelectorAll('.music-card');
        musicCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.08) rotate(1deg)';
                this.style.boxShadow = '0 20px 40px rgba(99, 102, 241, 0.2)';
                
                // Add floating musical note effect
                createFloatingNote(this);
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1.05) rotate(0deg)';
                this.style.boxShadow = 'none';
            });
        });
    }
    
    function createFloatingNote(element) {
        const note = document.createElement('div');
        note.innerHTML = '♪';
        note.style.cssText = `
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: rgba(99, 102, 241, 0.6);
            animation: floatNote 2s ease-out forwards;
            pointer-events: none;
            z-index: 10;
        `;
        
        element.style.position = 'relative';
        element.appendChild(note);
        
        setTimeout(() => {
            if (note.parentNode) {
                note.parentNode.removeChild(note);
            }
        }, 2000);
    }
    
    // Composition Card Interactions
    function setupCompositionCards() {
        const compositionCards = document.querySelectorAll('.composition-card');
        compositionCards.forEach(card => {
            card.addEventListener('click', function() {
                // Add pulse effect
                this.style.animation = 'pulse 0.6s ease-in-out';
                
                setTimeout(() => {
                    this.style.animation = '';
                }, 600);
                
                console.log('Playing composition:', this.querySelector('h3').textContent);
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
    
    // Initialize all functions
    animateCounters();
    animateMusicCards();
    setupMusicalEffects();
    setupCompositionCards();
    setupSmoothScrolling();
    
    console.log('Shivaji Songs and Poetry page loaded successfully');
});

// Add CSS for enhanced animations
const style = document.createElement('style');
style.textContent = `
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    @keyframes floatNote {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(-30px) rotate(360deg);
            opacity: 0;
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeIn 1s ease-out;
    }
    
    .music-card:hover {
        cursor: pointer;
    }
    
    .composition-card:hover {
        cursor: pointer;
        transform: scale(1.08) !important;
    }
`;
document.head.appendChild(style);
</script>