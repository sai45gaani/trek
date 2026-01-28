<?php
// Set page specific variables
$page_title = 'शिवबावनी भाग २ - कवि भूषण | Shivbawani Part 2 - Kavi Bhushan | Trekshitz';
$meta_description = 'Second part of the famous Shivbawani poetry collection by Kavi Bhushan celebrating the valor, victories, and glory of Chhatrapati Shivaji Maharaj with detailed verses and meanings.';
$meta_keywords = 'Shivbawani Part 2, Kavi Bhushan, Shivaji poetry, Marathi literature, Sanskrit verses, शिवबावनी भाग २, कवि भूषण, शिवाजी काव्य';

// Include header
include '../includes/header.php';
?>

<style>
/* Shivbawani Part 2 specific styles with enhanced poetic theme */
.poetry-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 153, 51, 0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.poetry-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
    border-color: #ff9933;
}

.poetry-card::before {
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

.poetry-card:hover::before {
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

.verse-container {
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(255, 153, 51, 0.1));
    border-left: 4px solid #ff9933;
    border-radius: 0 1rem 1rem 0;
    position: relative;
}

.dark .verse-container {
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.2), rgba(255, 153, 51, 0.2));
}

.verse-text {
    font-family: 'Noto Sans Devanagari', 'serif';
    line-height: 1.8;
    font-size: 1.1rem;
    color: #2d3748;
    position: relative;
}

.dark .verse-text {
    color: #e2e8f0;
}

.verse-number {
    background: linear-gradient(135deg, #dc2626, #ff9933);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    position: absolute;
    left: -20px;
    top: 20px;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
}

.meaning-box {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 1rem;
    padding: 1.5rem;
    margin-top: 1rem;
    position: relative;
}

.dark .meaning-box {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(139, 92, 246, 0.2));
    border-color: rgba(59, 130, 246, 0.4);
}

.section-divider {
    width: 120px;
    height: 4px;
    background: linear-gradient(90deg, #dc2626, #ff9933);
    margin: 0 auto 2rem;
    border-radius: 2px;
    position: relative;
}

.section-divider::before {
    content: '';
    position: absolute;
    top: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 12px;
    height: 8px;
    background: #ff9933;
    border-radius: 2px;
}

.poetic-pattern {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="poetry-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><text x="10" y="15" text-anchor="middle" font-size="12" fill="%23ff9933" opacity="0.1">ॐ</text></pattern></defs><rect width="100" height="100" fill="url(%23poetry-pattern)"/></svg>');
}

.verse-highlight {
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.2), rgba(255, 87, 34, 0.2));
    padding: 0.5rem;
    border-radius: 0.5rem;
    border-left: 3px solid #ff9933;
    margin: 0.5rem 0;
}

.audio-player {
    background: linear-gradient(135deg, #1f2937, #374151);
    border-radius: 1rem;
    padding: 1rem;
    color: white;
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
}

.play-button {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, #dc2626, #ff9933);
    border: none;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.play-button:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(220, 38, 38, 0.4);
}

.theme-toggle {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #dc2626, #ff9933);
    border: none;
    color: white;
    cursor: pointer;
    z-index: 1000;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
}

.theme-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(220, 38, 38, 0.5);
}

@media (max-width: 768px) {
    .verse-text {
        font-size: 1rem;
        line-height: 1.6;
    }
    
    .verse-number {
        width: 32px;
        height: 32px;
        left: -16px;
        top: 16px;
        font-size: 0.8rem;
    }
    
    .meaning-box {
        padding: 1rem;
    }
}

.scroll-indicator {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: rgba(255, 153, 51, 0.2);
    z-index: 1000;
}

.scroll-progress {
    height: 100%;
    background: linear-gradient(90deg, #dc2626, #ff9933);
    width: 0%;
    transition: width 0.1s ease;
}

.floating-nav {
    position: fixed;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.nav-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 153, 51, 0.3);
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-dot.active {
    background: #ff9933;
    transform: scale(1.2);
}

.nav-dot:hover {
    background: #ff9933;
    transform: scale(1.1);
}

@media (max-width: 1024px) {
    .floating-nav {
        display: none;
    }
}
</style>

<main id="main-content" class="pt-20">
    <!-- Scroll Progress Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-progress" id="scrollProgress"></div>
    </div>

    <!-- Floating Navigation -->
    <div class="floating-nav">
        <div class="nav-dot active" data-section="hero"></div>
        <div class="nav-dot" data-section="introduction"></div>
        <div class="nav-dot" data-section="verses"></div>
        <div class="nav-dot" data-section="themes"></div>
        <div class="nav-dot" data-section="legacy"></div>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="relative py-20 bg-gradient-to-br from-red-600 via-orange-500 to-yellow-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 poetic-pattern"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-5xl mx-auto">
                <div class="flex justify-center mb-8">
                    <div class="w-20 h-1 bg-yellow-300 rounded-full"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">शिवबावनी</span>
                </h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-4 text-yellow-200">
                    भाग २
                </h2>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Second Part of the Epic Poetry by Kavi Bhushan
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    महाकवि भूषण द्वारा रचित शिवाजी महाराजांच्या गौरवगाथेचा दुसरा भाग
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-scroll mr-2"></i>
                        Sanskrit Verses
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-crown mr-2"></i>
                        Royal Glory
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-feather-alt mr-2"></i>
                        Epic Poetry
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section id="introduction" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        About Shivbawani Part 2
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                    The second part of Shivbawani continues the magnificent portrayal of Chhatrapati Shivaji Maharaj's heroic deeds, administrative wisdom, and spiritual strength. Kavi Bhushan's masterful verses capture the essence of the great Maratha king's later victories and his establishment of Swarajya.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-300 font-devanagari leading-relaxed">
                    शिवबावनी के इस दूसरे भाग में महाकवि भूषण ने छत्रपति शिवाजी महाराज के उत्तरकालीन शौर्य, राज्याभिषेक, और स्वराज्य की स्थापना का भव्य चित्रण किया है। यह काव्य संग्रह हिंदी साहित्य की अमूल्य धरोहर है।
                </p>
            </div>

            <!-- Poet Information -->
            <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">
                <div class="space-y-6">
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white">
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                            Kavi Bhushan
                        </span>
                    </h3>
                    <div class="verse-container p-6 relative">
                        <div class="verse-number">कवि</div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg pl-8">
                            Kavi Bhushan (1613-1715) was one of the greatest Hindi poets of the 17th century, known for his heroic poetry (Veer Rasa). His admiration for Shivaji Maharaj resulted in this immortal collection of verses that celebrate the Maratha king's valor and righteousness.
                        </p>
                        <div class="meaning-box mt-4">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">कवि परिचय:</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                भूषण रीतिकालीन हिंदी साहित्य के महान कवि थे। उनकी वीर रस से भरपूर कविताएं शिवाजी महाराज के चरित्र और कार्यों को अमर बनाती हैं।
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="poetry-card p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-feather-alt text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-center mb-4 text-gray-800 dark:text-white font-devanagari">
                        काव्य विशेषताएं
                    </h3>
                    <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                            <span>Heroic sentiment (वीर रस) predominance</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                            <span>Rich imagery and metaphorical language</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                            <span>Historical accuracy with poetic beauty</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                            <span>Spiritual and philosophical depth</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Verses Section -->
    <section id="verses" class="py-20 bg-gray-50 dark:bg-gray-800 poetic-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        प्रमुख छंद
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Selected Verses from Shivbawani Part 2
                </p>
            </div>

            <div class="max-w-6xl mx-auto space-y-12">
                <!-- Verse 1 -->
                <div class="verse-container p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 relative">
                    <div class="verse-number">१</div>
                    <div class="pl-8">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">राज्याभिषेक गान</h3>
                        <div class="verse-text mb-6 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900 dark:to-orange-900 rounded-lg">
                            <p class="font-devanagari text-lg leading-relaxed">
                                "सिवराज सिर छत्र छबि धारी।<br>
                                बीर बिराजत छत्रपति भारी।।<br>
                                राज तिलक अरु मुकुट सुहावन।<br>
                                करत सकल जग जय जयकारन।।"
                            </p>
                        </div>
                        <div class="meaning-box">
                            <h4 class="font-semibold text-gray-800 dark:text-white mb-2">
                                <i class="fas fa-language mr-2 text-blue-500"></i>
                                Meaning:
                            </h4>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                With justice, punishment, and excellent policies, he established a great system for protecting the subjects. 
                                Suppressing the wicked and uplifting the righteous - there is no one as distinguished as Shivaji.
                            </p>
                        </div>
                        <div class="audio-player mt-4">
                            <button class="play-button">
                                <i class="fas fa-play"></i>
                            </button>
                            <div class="flex-1">
                                <p class="text-sm text-gray-300 mb-1">Listen to Verse 5</p>
                                <div class="w-full bg-gray-600 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-red-500 to-yellow-500 h-2 rounded-full" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Themes Section -->
    <section id="themes" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Poetic Themes
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    शिवबावनी के मुख्य विषय
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Theme 1: Valor -->
                <div class="poetry-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-orange-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-sword text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        वीर रस
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        The heroic sentiment dominates throughout the verses, celebrating Shivaji's military prowess and battlefield courage.
                    </p>
                    <div class="bg-red-50 dark:bg-red-900 p-3 rounded-lg">
                        <p class="text-xs text-red-700 dark:text-red-300 font-devanagari">
                            "शिवा शाहू शुभ नाम प्रतापी" - The glorious name of Shiva brings victory
                        </p>
                    </div>
                </div>

                <!-- Theme 2: Righteousness -->
                <div class="poetry-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-balance-scale text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        धर्म निष्ठा
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Emphasis on dharma, justice, and righteous governance as the foundation of Shivaji's empire.
                    </p>
                    <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg">
                        <p class="text-xs text-blue-700 dark:text-blue-300 font-devanagari">
                            "धर्म हेतु युद्ध करै" - He fights for dharma
                        </p>
                    </div>
                </div>

                <!-- Theme 3: Patriotism -->
                <div class="poetry-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-emerald-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-flag text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        देश भक्ति
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Deep love for motherland and commitment to establishing indigenous rule (Swarajya).
                    </p>
                    <div class="bg-green-50 dark:bg-green-900 p-3 rounded-lg">
                        <p class="text-xs text-green-700 dark:text-green-300 font-devanagari">
                            "स्वराज स्थापना करी" - Established self-rule
                        </p>
                    </div>
                </div>

                <!-- Theme 4: Divine Grace -->
                <div class="poetry-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-om text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        दैवी कृपा
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Recognition of divine blessings and spiritual strength behind Shivaji's success.
                    </p>
                    <div class="bg-purple-50 dark:bg-purple-900 p-3 rounded-lg">
                        <p class="text-xs text-purple-700 dark:text-purple-300 font-devanagari">
                            "भवानी कृपा से" - By Bhavani's grace
                        </p>
                    </div>
                </div>

                <!-- Theme 5: Social Welfare -->
                <div class="poetry-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-orange-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        प्रजा कल्याण
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Focus on welfare of subjects, protection of the weak, and promotion of prosperity.
                    </p>
                    <div class="bg-yellow-50 dark:bg-yellow-900 p-3 rounded-lg">
                        <p class="text-xs text-yellow-700 dark:text-yellow-300 font-devanagari">
                            "प्रजा सुखी करै" - Makes subjects happy
                        </p>
                    </div>
                </div>

                <!-- Theme 6: Cultural Pride -->
                <div class="poetry-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-blue-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-temple text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                        संस्कृति गौरव
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Celebration of Indian culture, traditions, and the restoration of Hindu values.
                    </p>
                    <div class="bg-indigo-50 dark:bg-indigo-900 p-3 rounded-lg">
                        <p class="text-xs text-indigo-700 dark:text-indigo-300 font-devanagari">
                            "मंदिर मठ पूजारी" - Temples and monasteries worship
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Literary Analysis -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        साहित्यिक विश्लेषण
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Literary Analysis and Poetic Excellence
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Poetic Devices -->
                    <div class="poetry-card bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 font-devanagari">
                            काव्य उपकरण
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-quote-left text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">अनुप्रास (Alliteration)</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Beautiful sound patterns and rhythmic flow</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-eye text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">रूपक (Metaphor)</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Rich metaphorical language comparing Shivaji to divine figures</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-heart text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">वीर रस (Heroic Sentiment)</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Dominant emotion celebrating courage and valor</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <i class="fas fa-music text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">छंद विधान (Meter)</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Perfect adherence to traditional Hindi poetic meters</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Historical Context -->
                    <div class="poetry-card bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                            Historical Context
                        </h3>
                        <div class="space-y-6">
                            <div class="border-l-4 border-red-500 pl-4">
                                <h4 class="font-semibold text-gray-800 dark:text-white mb-2">17th Century India</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Written during the peak of Maratha power when Shivaji had established a strong kingdom
                                </p>
                            </div>
                            <div class="border-l-4 border-orange-500 pl-4">
                                <h4 class="font-semibold text-gray-800 dark:text-white mb-2 font-devanagari">रीतिकाल</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Part of the Riti period in Hindi literature, known for ornate and elaborate poetry
                                </p>
                            </div>
                            <div class="border-l-4 border-yellow-500 pl-4">
                                <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Political Significance</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Served as inspiration for resistance against foreign rule and cultural renaissance
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparative Analysis -->
                <div class="mt-12 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900 dark:to-purple-900 rounded-3xl p-8 border border-indigo-200 dark:border-indigo-700">
                    <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white">
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                            Comparison with Part 1
                        </span>
                    </h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">भाग १ की विशेषताएं</h4>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-red-500 mr-2"></i>
                                    Early military campaigns and victories
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-red-500 mr-2"></i>
                                    Focus on individual heroic acts
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-red-500 mr-2"></i>
                                    Emphasis on personal valor
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-red-500 mr-2"></i>
                                    Foundation of resistance movement
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">भाग २ की विशेषताएं</h4>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-2"></i>
                                    Coronation and establishment of empire
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-2"></i>
                                    Administrative and governance themes
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-2"></i>
                                    Mature leadership qualities
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-arrow-right text-yellow-500 mr-2"></i>
                                    Legacy and lasting impact
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Legacy Section -->
    <section id="legacy" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Literary Legacy
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">
                    साहित्यिक विरासत और प्रभाव
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-book-open text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">साहित्यिक प्रभाव</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Inspired generations of Hindi poets and became a model for heroic poetry in Indian literature.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-flag text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">राष्ट्रीय चेतना</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Played a crucial role in awakening national consciousness during the freedom struggle.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Educational Value</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Continues to be studied in schools and universities as an exemplary work of Hindi literature.
                        </p>
                    </div>
                </div>

                <!-- Modern Relevance -->
                <div class="bg-gradient-to-r from-red-50 to-yellow-50 dark:from-red-900 dark:to-yellow-900 rounded-3xl p-8 border border-red-200 dark:border-red-700">
                    <h3 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white font-devanagari">
                        आधुनिक प्रासंगिकता
                    </h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Contemporary Relevance</h4>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Values of good governance and administration</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Cultural pride and indigenous leadership</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Social justice and protection of the weak</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                    <span>Unity in diversity and religious tolerance</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">शिक्षाप्रद संदेश</h4>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                                    <span>Importance of righteous leadership</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                                    <span>Courage in face of adversity</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                                    <span>Dedication to motherland and dharma</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                                    <span>Balance between power and responsibility</span>
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
                संबंधित विषय
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Explore more about Shivaji Maharaj and Maratha heritage
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="/shivaji/shivbawani-part1" class="inline-flex items-center px-8 py-4 bg-white text-red-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-scroll mr-2"></i>
                    Shivbawani Part 1
                </a>
                <a href="/shivaji/poetry-songs" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-music mr-2"></i>
                    गीते व कविता
                </a>
                <a href="/shivaji/historical-books" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-book mr-2"></i>
                    Historical Literature
                </a>
            </div>
            
            <!-- Quick Links -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <a href="/shivaji" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-crown mr-2"></i>
                    Shivaji Maharaj
                </a>
                <a href="/shivaji/battles" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-sword mr-2"></i>
                    Battles
                </a>
                <a href="/shivaji/forts" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    Forts
                </a>
                <a href="/shivaji/administration" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-users mr-2"></i>
                    Administration
                </a>
            </div>
        </div>
    </section>

    <!-- Theme Toggle Button -->
    <button class="theme-toggle" id="poetryThemeToggle" title="Toggle Theme">
        <i class="fas fa-palette"></i>
    </button>
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Shivbawani Part 2 page loaded');
    
    // Scroll Progress Indicator
    function updateScrollProgress() {
        const scrollProgress = document.getElementById('scrollProgress');
        const scrollTop = window.pageYOffset;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        if (scrollProgress) {
            scrollProgress.style.width = Math.min(scrollPercent, 100) + '%';
        }
    }
    
    window.addEventListener('scroll', updateScrollProgress);
    
    // Floating Navigation
    function setupFloatingNav() {
        const navDots = document.querySelectorAll('.nav-dot');
        const sections = ['hero', 'introduction', 'verses', 'themes', 'legacy'];
        
        function updateActiveNavDot() {
            const scrollPosition = window.pageYOffset + 100;
            
            sections.forEach((sectionId, index) => {
                const section = document.getElementById(sectionId);
                if (section) {
                    const sectionTop = section.offsetTop;
                    const sectionBottom = sectionTop + section.offsetHeight;
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                        navDots.forEach(dot => dot.classList.remove('active'));
                        if (navDots[index]) {
                            navDots[index].classList.add('active');
                        }
                    }
                }
            });
        }
        
        // Add click handlers to nav dots
        navDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                const section = document.getElementById(sections[index]);
                if (section) {
                    const headerHeight = 80;
                    const targetPosition = section.offsetTop - headerHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        window.addEventListener('scroll', updateActiveNavDot);
        updateActiveNavDot(); // Initial call
    }
    
    // Audio Player Functionality (Mock)
    function setupAudioPlayers() {
        const playButtons = document.querySelectorAll('.play-button');
        
        playButtons.forEach(button => {
            button.addEventListener('click', function() {
                const isPlaying = this.classList.contains('playing');
                
                // Reset all other players
                playButtons.forEach(btn => {
                    btn.classList.remove('playing');
                    btn.innerHTML = '<i class="fas fa-play"></i>';
                    const progressBar = btn.parentElement.querySelector('.bg-gradient-to-r');
                    if (progressBar) {
                        progressBar.style.width = '0%';
                    }
                });
                
                if (!isPlaying) {
                    this.classList.add('playing');
                    this.innerHTML = '<i class="fas fa-pause"></i>';
                    
                    // Mock audio progress
                    const progressBar = this.parentElement.querySelector('.bg-gradient-to-r');
                    if (progressBar) {
                        let progress = 0;
                        const interval = setInterval(() => {
                            progress += 2;
                            progressBar.style.width = progress + '%';
                            
                            if (progress >= 100) {
                                clearInterval(interval);
                                this.classList.remove('playing');
                                this.innerHTML = '<i class="fas fa-play"></i>';
                                progressBar.style.width = '0%';
                            }
                        }, 100);
                    }
                }
            });
        });
    }
    
    // Verse Animation on Scroll
    function animateVerses() {
        const verses = document.querySelectorAll('.verse-container');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    
                    // Animate verse number
                    const verseNumber = entry.target.querySelector('.verse-number');
                    if (verseNumber) {
                        setTimeout(() => {
                            verseNumber.style.transform = 'scale(1.2)';
                            setTimeout(() => {
                                verseNumber.style.transform = 'scale(1)';
                            }, 300);
                        }, 200);
                    }
                    
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2, rootMargin: '50px' });
        
        verses.forEach(verse => {
            verse.style.opacity = '0';
            verse.style.transform = 'translateY(50px)';
            verse.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(verse);
        });
    }
    
    // Poetry Cards Animation
    function animatePoetryCards() {
        const cards = document.querySelectorAll('.poetry-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) scale(1)';
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '50px' });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px) scale(0.95)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    }
    
    // Enhanced Hover Effects
    function setupHoverEffects() {
        const poetryCards = document.querySelectorAll('.poetry-card');
        
        poetryCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(220, 38, 38, 0.2)';
                
                // Add shimmer effect
                this.style.setProperty('--shimmer-opacity', '1');
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-8px) scale(1)';
                this.style.boxShadow = '0 20px 40px rgba(220, 38, 38, 0.15)';
                
                // Remove shimmer effect
                this.style.setProperty('--shimmer-opacity', '0');
            });
        });
        
        // Verse highlighting on hover
        const verseTexts = document.querySelectorAll('.verse-text');
        verseTexts.forEach(verse => {
            verse.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
                this.style.backgroundColor = 'rgba(255, 193, 7, 0.1)';
            });
            
            verse.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.backgroundColor = '';
            });
        });
    }
    
    // Theme Toggle Functionality
    function setupThemeToggle() {
        const themeToggle = document.getElementById('poetryThemeToggle');
        
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
                document.body.classList.toggle('dark');
                
                // Save theme preference
                const isDark = document.documentElement.classList.contains('dark');
                localStorage.setItem('poetryTheme', isDark ? 'dark' : 'light');
                
                // Animate button
                this.style.transform = 'scale(1.2) rotate(180deg)';
                setTimeout(() => {
                    this.style.transform = 'scale(1) rotate(0deg)';
                }, 300);
                
                // Dispatch theme change event
                window.dispatchEvent(new CustomEvent('themeChanged', { 
                    detail: { theme: isDark ? 'dark' : 'light' } 
                }));
            });
        }
        
        // Load saved theme
        const savedTheme = localStorage.getItem('poetryTheme');
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            document.body.classList.add('dark');
        }
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
    
    // Verse Reading Mode
    function setupReadingMode() {
        let readingMode = false;
        
        // Add reading mode toggle
        const readingToggle = document.createElement('button');
        readingToggle.className = 'fixed bottom-20 right-20 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg opacity-70 hover:opacity-100 transition-opacity z-50';
        readingToggle.innerHTML = '<i class="fas fa-book-reader"></i>';
        readingToggle.title = 'Toggle Reading Mode';
        document.body.appendChild(readingToggle);
        
        readingToggle.addEventListener('click', function() {
            readingMode = !readingMode;
            
            if (readingMode) {
                document.body.classList.add('reading-mode');
                this.innerHTML = '<i class="fas fa-times"></i>';
                this.style.backgroundColor = '#dc2626';
            } else {
                document.body.classList.remove('reading-mode');
                this.innerHTML = '<i class="fas fa-book-reader"></i>';
                this.style.backgroundColor = '#2563eb';
            }
        });
    }
    
    // Verse Search Functionality
    function setupVerseSearch() {
        const searchButton = document.createElement('button');
        searchButton.className = 'fixed bottom-20 left-20 w-12 h-12 bg-green-600 text-white rounded-full shadow-lg opacity-70 hover:opacity-100 transition-opacity z-50';
        searchButton.innerHTML = '<i class="fas fa-search"></i>';
        searchButton.title = 'Search Verses';
        document.body.appendChild(searchButton);
        
        searchButton.addEventListener('click', function() {
            const searchTerm = prompt('Search in verses (Hindi/English):');
            if (searchTerm) {
                searchInVerses(searchTerm);
            }
        });
    }
    
    function searchInVerses(term) {
        const verses = document.querySelectorAll('.verse-text, .meaning-box');
        let found = false;
        
        verses.forEach(verse => {
            const text = verse.textContent.toLowerCase();
            if (text.includes(term.toLowerCase())) {
                verse.scrollIntoView({ behavior: 'smooth', block: 'center' });
                verse.style.backgroundColor = 'rgba(255, 255, 0, 0.3)';
                setTimeout(() => {
                    verse.style.backgroundColor = '';
                }, 3000);
                found = true;
                return;
            }
        });
        
        if (!found) {
            alert('No verses found containing: ' + term);
        }
    }
    
    // Parallax Effect for Hero Section
    function setupParallax() {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.getElementById('hero');
            
            if (heroSection) {
                const speed = scrolled * 0.3;
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
    
    // Copy Verse Functionality
    function setupCopyVerse() {
        const verses = document.querySelectorAll('.verse-text');
        
        verses.forEach(verse => {
            // Add copy button
            const copyButton = document.createElement('button');
            copyButton.className = 'absolute top-2 right-2 w-8 h-8 bg-gray-600 bg-opacity-70 text-white rounded-full opacity-0 hover:opacity-100 transition-opacity';
            copyButton.innerHTML = '<i class="fas fa-copy text-xs"></i>';
            copyButton.title = 'Copy Verse';
            
            verse.style.position = 'relative';
            verse.appendChild(copyButton);
            
            copyButton.addEventListener('click', function() {
                const text = verse.textContent.trim();
                navigator.clipboard.writeText(text).then(() => {
                    this.innerHTML = '<i class="fas fa-check text-xs"></i>';
                    this.style.backgroundColor = '#10b981';
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-copy text-xs"></i>';
                        this.style.backgroundColor = '';
                    }, 2000);
                });
            });
            
            verse.addEventListener('mouseenter', function() {
                copyButton.style.opacity = '1';
            });
            
            verse.addEventListener('mouseleave', function() {
                copyButton.style.opacity = '0';
            });
        });
    }
    
    // Interactive Statistics
    function setupInteractiveStats() {
        const statElements = document.querySelectorAll('[data-stat]');
        
        statElements.forEach(element => {
            element.addEventListener('click', function() {
                const stat = this.getAttribute('data-stat');
                showStatDetails(stat);
            });
        });
    }
    
    function showStatDetails(stat) {
        // Mock function for showing detailed statistics
        console.log('Showing details for:', stat);
        // Could implement modal or detailed view here
    }
    
    // Keyboard Shortcuts
    function setupKeyboardShortcuts() {
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch(e.key) {
                    case 'f':
                        e.preventDefault();
                        const searchTerm = prompt('Search in verses:');
                        if (searchTerm) searchInVerses(searchTerm);
                        break;
                    case 'd':
                        e.preventDefault();
                        document.getElementById('poetryThemeToggle').click();
                        break;
                    case 'r':
                        e.preventDefault();
                        document.querySelector('.reading-mode-toggle')?.click();
                        break;
                }
            }
            
            // Navigation shortcuts
            switch(e.key) {
                case 'ArrowUp':
                    if (e.ctrlKey) {
                        e.preventDefault();
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                    break;
                case 'ArrowDown':
                    if (e.ctrlKey) {
                        e.preventDefault();
                        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
                    }
                    break;
            }
        });
    }
    
    // Error Handling and Performance Monitoring
    function setupErrorHandling() {
        window.addEventListener('error', function(e) {
            console.error('Shivbawani Part 2 Error:', e.error);
        });
        
        // Performance monitoring
        if ('performance' in window) {
            window.addEventListener('load', function() {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    console.log('Page Load Time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
                }, 0);
            });
        }
    }
    
    // Initialize all functions
    function initializeAll() {
        try {
            setupFloatingNav();
            setupAudioPlayers();
            animateVerses();
            animatePoetryCards();
            setupHoverEffects();
            setupThemeToggle();
            setupSmoothScrolling();
            setupReadingMode();
            setupVerseSearch();
            setupParallax();
            setupLoadingAnimation();
            setupCopyVerse();
            setupInteractiveStats();
            setupKeyboardShortcuts();
            setupErrorHandling();
            
            console.log('Shivbawani Part 2: All functionality initialized successfully');
        } catch (error) {
            console.error('Initialization error:', error);
        }
    }
    
    // Run initialization
    initializeAll();
    
    // Additional utility functions
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ${type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500'} text-white`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
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
        updateScrollProgress();
        updateActiveNavDot();
    }, 10);
    
    window.addEventListener('scroll', optimizedScrollHandler);
});

// Add enhanced CSS for reading mode and additional effects
const enhancedStyles = document.createElement('style');
enhancedStyles.textContent = `
    /* Reading Mode Styles */
    .reading-mode {
        background-color: #f9f9f9 !important;
        color: #333 !important;
    }
    
    .reading-mode .verse-text {
        font-size: 1.2rem !important;
        line-height: 2 !important;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .reading-mode .poetry-card {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
    }
    
    .reading-mode .meaning-box {
        background: #f0f0f0 !important;
        border: 1px solid #ccc !important;
    }
    
    /* Enhanced Animations */
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
    
    /* Gradient Text Support */
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    /* Enhanced Shimmer Effect */
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
    
    /* Verse Highlight Animation */
    @keyframes verseHighlight {
        0% { background-color: rgba(255, 255, 0, 0); }
        50% { background-color: rgba(255, 255, 0, 0.3); }
        100% { background-color: rgba(255, 255, 0, 0); }
    }
    
    .verse-highlight-animate {
        animation: verseHighlight 2s ease-in-out;
    }
    
    /* Responsive Enhancements */
    @media (max-width: 640px) {
        .reading-mode .verse-text {
            font-size: 1.1rem !important;
            line-height: 1.8 !important;
            padding: 1rem !important;
        }
        
        .theme-toggle, .fixed.bottom-20 {
            bottom: 10px !important;
            width: 48px !important;
            height: 48px !important;
        }
        
        .floating-nav {
            right: 10px !important;
        }
        
        .nav-dot {
            width: 10px !important;
            height: 10px !important;
        }
    }
    
    /* Dark Mode Enhancements */
    .dark .reading-mode {
        background-color: #1a1a1a !important;
        color: #e5e5e5 !important;
    }
    
    .dark .reading-mode .meaning-box {
        background: #2d2d2d !important;
        border: 1px solid #444 !important;
    }
    
    .dark .reading-mode .poetry-card {
        background: #2d2d2d !important;
        border: 1px solid #444 !important;
    }
    
    /* Print Styles */
    @media print {
        .fixed, .floating-nav, .theme-toggle {
            display: none !important;
        }
        
        .poetry-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
            break-inside: avoid;
        }
        
        .verse-container {
            break-inside: avoid;
            margin-bottom: 20px;
        }
        
        .verse-text {
            font-size: 14pt !important;
            line-height: 1.6 !important;
        }
    }
    
    /* Accessibility Improvements */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }
    
    /* Focus Styles for Keyboard Navigation */
    .nav-dot:focus,
    .play-button:focus,
    .theme-toggle:focus {
        outline: 2px solid #ff9933;
        outline-offset: 2px;
    }
    
    /* Loading Spinner */
    .loading-spinner {
        border: 3px solid rgba(255, 153, 51, 0.3);
        border-top: 3px solid #ff9933;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Smooth Transitions */
    * {
        transition-property: transform, opacity, background-color, border-color, color;
        transition-duration: 0.3s;
        transition-timing-function: ease;
    }
    
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #dc2626, #ff9933);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #b91c1c, #f59e0b);
    }
    
    .dark ::-webkit-scrollbar-track {
        background: #374151;
    }
`;

document.head.appendChild(enhancedStyles);

// Export functions for potential external use
window.ShivbawaniPart2 = {
    searchInVerses,
    showNotification,
    debounce
};

console.log('Shivbawani Part 2: Enhanced functionality loaded successfully');
</script>
       