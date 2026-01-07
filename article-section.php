<?php
// Set page specific variables
$page_title = 'Articles & Trek Experiences | TreKshitiZ - Stories from the Mountains';
$meta_description = 'Read inspiring trek experiences and articles by TreKshitiZ members. Discover stories from Malshej, Mangi Tungi, Panhala to Vishalgad, and many more Sahyadri adventures.';
$meta_keywords = 'trek articles, trekking experiences, Sahyadri stories, Malshej, Mangi Tungi, Panhala, Vishalgad, mountain adventures, TreKshitiZ members';

// Include header
include './includes/header.php';
?>

<style>
/* Articles page specific styles */
.article-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(127, 176, 105, 0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.dark .article-card {
    background: linear-gradient(135deg, rgba(31, 41, 55, 0.9), rgba(31, 41, 55, 0.8));
    border-color: rgba(127, 176, 105, 0.3);
}

.article-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(45, 80, 22, 0.15);
    border-color: var(--accent-color);
}

.article-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(127, 176, 105, 0.1), transparent);
    transition: left 0.6s;
}

.article-card:hover::before {
    left: 100%;
}

.language-tab {
    position: relative;
    overflow: hidden;
}

.language-tab::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #7fb069, #4a7c23);
    transition: width 0.3s ease;
}

.language-tab.active::after {
    width: 100%;
}

.new-badge {
    background: linear-gradient(45deg, #ff6b6b, #ee5a24);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: bold;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.article-icon {
    background: linear-gradient(135deg, #7fb069, #4a7c23);
    width: 50px;
    height: 50px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    transition: all 0.3s ease;
}

.article-card:hover .article-icon {
    transform: rotate(5deg) scale(1.1);
    box-shadow: 0 8px 16px rgba(127, 176, 105, 0.3);
}

.author-tag {
    background: linear-gradient(135deg, rgba(127, 176, 105, 0.1), rgba(74, 124, 35, 0.1));
    border: 1px solid rgba(127, 176, 105, 0.3);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    color: #4a7c23;
}

.dark .author-tag {
    color: #7fb069;
    background: linear-gradient(135deg, rgba(127, 176, 105, 0.2), rgba(74, 124, 35, 0.2));
}

.article-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

@media (max-width: 768px) {
    .article-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}
</style>

<main class="min-h-screen pt-20 bg-gradient-to-br from-green-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    
    <!-- Hero Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl text-center">
            <div class="mb-8">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 dark:text-white mb-6">
                    Trek <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Articles</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Discover inspiring stories and experiences from our fellow trekkers. Read about thrilling adventures across the majestic Sahyadri mountains, from ancient forts to scenic valleys.
                </p>
                <p class="text-lg text-gray-500 dark:text-gray-400 mt-4 font-devanagari">
                    आमच्या ट्रेकर्सच्या प्रेरणादायी कथा आणि अनुभव वाचा
                </p>
            </div>
            
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mb-12">
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400">15+</div>
                    <div class="text-gray-600 dark:text-gray-300">Published Articles</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400">10+</div>
                    <div class="text-gray-600 dark:text-gray-300">Contributing Authors</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-600 dark:text-purple-400">350+</div>
                    <div class="text-gray-600 dark:text-gray-300">Forts Covered</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Language Tabs -->
    <section class="pb-8 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="flex justify-center mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-2 shadow-lg border border-gray-200 dark:border-gray-700">
                    <button class="language-tab active px-8 py-3 rounded-xl font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300" 
                            data-lang="english">
                        <i class="fas fa-globe mr-2"></i>English Articles
                    </button>
                    <button class="language-tab px-8 py-3 rounded-xl font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300 font-devanagari" 
                            data-lang="marathi">
                        <i class="fas fa-language mr-2"></i>मराठी लेख
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- English Articles Section -->
    <section id="english-articles" class="pb-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-mountain text-green-600 mr-3"></i>
                    English Articles
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="article-grid">
                <!-- Malshej Visit Article -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-cloud-rain"></i>
                        </div>
                        <span class="new-badge">NEW</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/Malshej visit.pdf" target="_blank" class="hover:text-green-600 transition-colors">
                            Malshej Visit
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        Experience the monsoon magic of Malshej Ghat, where cascading waterfalls and misty landscapes create an enchanting atmosphere perfect for nature lovers.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Abhijit Avalaskar</span>
                        <a href="articles/Malshej visit.pdf" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Mangi Tungi Article -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/Mungi Tungi.html" target="_blank" class="hover:text-green-600 transition-colors">
                            Mangi Tungi Adventure
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        Discover the twin pinnacles of Mangi Tungi, a challenging trek that rewards you with panoramic views of the Sahyadri ranges and spiritual serenity.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Jitendra Gupta</span>
                        <a href="articles/Mungi Tungi.html" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Cycling Trek Article -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-bicycle"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/cyclictrek.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            Cycling Trek Experience
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        A unique combination of cycling and trekking through scenic routes, offering an eco-friendly way to explore the beautiful landscapes of Maharashtra.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Sameer Kelkar</span>
                        <a href="articles/cyclictrek.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Panhala to Vishalgad -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-route"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/panhalgad_to_vishalgad__kaushal.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            Panhala to Vishalgad
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        An epic trek connecting two historic forts, following ancient paths through dense forests and experiencing the rich heritage of Maratha empire.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Kaushal</span>
                        <a href="articles/panhalgad_to_vishalgad__kaushal.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- A Wonderful Experience -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/supriya.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            A Wonderful Experience
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        A heartfelt account of discovering the joy of trekking and the camaraderie found in the trekking community, perfect for beginners seeking inspiration.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Supriya Bhole</span>
                        <a href="articles/supriya.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- There is KshitiZ on the Horizon -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-sun"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/prasad_nikte.asp" target="_blank" class="hover:text-green-600 transition-colors">
                            There is KshitiZ on the Horizon
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        A philosophical journey through the mountains, exploring the deeper meaning of trekking and the horizon that always calls us forward.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Prasad Nikte</span>
                        <a href="articles/prasad_nikte.asp" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- More English Articles -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-laugh"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/Peth_harshal.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            Peth – A Hilarious Account
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        A humorous take on trekking adventures, filled with funny incidents and memorable moments that every trekker can relate to.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Harshal Mahajan</span>
                        <a href="articles/Peth_harshal.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-hiking"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/Alang_madan.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            Trek to Alang-Madan
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        Experience one of the most challenging treks in Sahyadri - the formidable Alang-Madan-Kulang range with its steep climbs and breathtaking views.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Harshal Mahajan</span>
                        <a href="articles/Alang_madan.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-dove"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/Party in a Avian World.pdf" target="_blank" class="hover:text-green-600 transition-colors">
                            Party in an Avian World
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        A bird watcher's paradise - discover the rich avian life in the Western Ghats and learn about the diverse species that call these mountains home.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Abhijit Avalaskar</span>
                        <a href="articles/Party in a Avian World.pdf" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">
                        <a href="articles/Thrill_karnala.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            Thrill at Karnala
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        Experience the adrenaline rush at Karnala Bird Sanctuary and fort, where nature and adventure combine to create an unforgettable experience.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">Vinit Vartak</span>
                        <a href="articles/Thrill_karnala.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Marathi Articles Section -->
    <section id="marathi-articles" class="pb-16 px-4 hidden">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4 font-devanagari">
                    <i class="fas fa-mountain text-green-600 mr-3"></i>
                    मराठी लेख
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="article-grid">
                <!-- Ankai-Tankai Article -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-flag"></i>
                        </div>
                        <span class="new-badge">नवीन</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/Ankaai-Tankaai - Swatantrata Sangram Trek.pdf" target="_blank" class="hover:text-green-600 transition-colors">
                            अंकाई-तंकाई (स्वातंत्र्य संग्राम ट्रेक)
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        स्वातंत्र्य संग्रामाच्या इतिहासातील महत्वाची भूमिका बजावणाऱ्या अंकाई-तंकाई किल्ल्यांची रोमांचक गाथा.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">निरंजन सराडे</span>
                        <a href="articles/Ankaai-Tankaai - Swatantrata Sangram Trek.pdf" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- 5 Years of Kshitiz Poem -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-feather-alt"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/niranjan_kavita.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            क्षितिजच्या ५ वर्षांची कविता
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        ट्रेकशितिजच्या पाच वर्षांच्या प्रवासावर एक भावनापूर्ण कविता जी आमच्या समुदायाची वाढ दर्शवते.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">निरंजन सराडे</span>
                        <a href="articles/niranjan_kavita.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Vasota-Nageshwar -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-water"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/vasota-nageshwar.pdf" target="_blank" class="hover:text-green-600 transition-colors">
                            वसोटा-नागेश्वर
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        कोयना धरणाच्या पाण्यात वेढलेला वसोटा किल्ला आणि नागेश्वर मंदिराचा अविस्मरणीय प्रवास.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">निरंजन सराडे</span>
                        <a href="articles/vasota-nageshwar.pdf" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Fansad-Korlai -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-anchor"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/fansad - korlai.pdf" target="_blank" class="hover:text-green-600 transition-colors">
                            फानसाड-कोर्लाई
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        समुद्रकिनारी असलेल्या ऐतिहासिक फानसाड आणि कोर्लाई किल्ल्यांचा समुद्री हवेत केलेला ट्रेक.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">निरंजन सराडे</span>
                        <a href="articles/fansad - korlai.pdf" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Additional Marathi Articles -->
                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-temple-hindu"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/article_chatali.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            चाताळी गड
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        चाताळी गडाच्या ऐतिहासिक महत्वाचा आणि तेथील ट्रेकिंग अनुभवाचा तपशीलवार लेख.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">मॅन्सी आगटे</span>
                        <a href="articles/article_chatali.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/Art1.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            पेठ - एक अद्वितीय अनुभव
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        पेठ गडावरील ट्रेकचा एक अनोखा अनुभव जो प्रत्येक ट्रेकरला प्रेरणा देतो.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">मानसी श्रीकांत कुलकर्णी</span>
                        <a href="articles/Art1.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/Art2.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            लोहगड - एक साक्षात्कार
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        लोहगडावरील प्रवासातील अनुभव आणि तेथील निसर्ग सौंदर्याचे वर्णन.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">क्षितिज ग्रुप</span>
                        <a href="articles/Art2.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-dream"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/Intro.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            स्वप्न दुर्गभ्रमणाचे, आव्हान क्षितिजाचे
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        ट्रेकशितिजच्या स्थापनेची कहाणी आणि दुर्गभ्रमणाच्या स्वप्नाचे वास्तव.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">क्षितिज ग्रुप</span>
                        <a href="articles/Intro.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/Rajmachi.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            राजमाची
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        लोणावळ्याजवळील प्रसिद्ध राजमाची किल्ल्याचा ट्रेकिंग अनुभव आणि तेथील ऐतिहासिक वारसा.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">क्षितिज ग्रुप</span>
                        <a href="articles/Rajmachi.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-mountain-sun"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/loh-vis.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            लोहगड-विसापूर : एक थरारक ट्रेक
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        दोन प्रसिद्ध किल्ल्यांना जोडणारा रोमांचक ट्रेक जो निसर्गप्रेमींसाठी आदर्श आहे.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">क्षितिज ग्रुप</span>
                        <a href="articles/loh-vis.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <article class="article-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-start justify-between mb-4">
                        <div class="article-icon">
                            <i class="fas fa-sparkles"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 font-devanagari">
                        <a href="articles/visapur_shubhda.htm" target="_blank" class="hover:text-green-600 transition-colors">
                            "विसापूर - गतवैभवाची साक्ष"
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed">
                        विसापूर किल्ल्याच्या वैभवशाली इतिहासाची आणि वर्तमान स्थितीची तुलनात्मक मांडणी.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="author-tag">शुभदा जगताप</span>
                        <a href="articles/visapur_shubhda.htm" target="_blank" class="text-green-600 hover:text-green-700 font-semibold flex items-center">
                            वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 px-4 bg-gradient-to-r from-green-600 to-blue-600 text-white">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Share Your Trek Story
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Have an amazing trek experience? We'd love to hear your story and share it with our community!
            </p>
            <p class="text-lg mb-8 opacity-80 font-devanagari">
                तुमचा ट्रेकिंग अनुभव आमच्यासोबत शेअर करा
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-pen-fancy mr-2"></i>
                    Submit Your Article
                </a>
                <a href="#treks" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-green-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-hiking mr-2"></i>
                    Join Our Next Trek
                </a>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Articles page loaded');
    
    // Language Tab Functionality
    const languageTabs = document.querySelectorAll('.language-tab');
    const englishSection = document.getElementById('english-articles');
    const marathiSection = document.getElementById('marathi-articles');
    
    languageTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const language = this.getAttribute('data-lang');
            
            // Remove active class from all tabs
            languageTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Show/hide sections based on language
            if (language === 'english') {
                englishSection.classList.remove('hidden');
                marathiSection.classList.add('hidden');
            } else if (language === 'marathi') {
                englishSection.classList.add('hidden');
                marathiSection.classList.remove('hidden');
            }
            
            // Smooth scroll to articles section
            setTimeout(() => {
                const activeSection = language === 'english' ? englishSection : marathiSection;
                activeSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        });
    });
    
    // Article card hover effects
    const articleCards = document.querySelectorAll('.article-card');
    
    articleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            
            if (!targetId || targetId === '#' || targetId.length <= 1) {
                e.preventDefault();
                return;
            }
            
            try {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const headerHeight = 80;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            } catch (error) {
                console.warn('Invalid selector:', targetId);
                e.preventDefault();
            }
        });
    });
    
    // Add loading animation for external links
    document.querySelectorAll('a[href$=".pdf"], a[href$=".htm"], a[href$=".html"], a[href$=".asp"]').forEach(link => {
        link.addEventListener('click', function() {
            const icon = this.querySelector('i.fa-arrow-right');
            if (icon) {
                icon.classList.remove('fa-arrow-right');
                icon.classList.add('fa-spinner', 'fa-spin');
                
                setTimeout(() => {
                    icon.classList.remove('fa-spinner', 'fa-spin');
                    icon.classList.add('fa-arrow-right');
                }, 2000);
            }
        });
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all article cards
    articleCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        observer.observe(card);
    });
    
    // Add CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);
    
    console.log('Articles page: All functionality initialized');
});

// Export functions for debugging
window.articlesDebug = {
    switchToEnglish: function() {
        document.querySelector('[data-lang="english"]').click();
    },
    switchToMarathi: function() {
        document.querySelector('[data-lang="marathi"]').click();
    },
    highlightNewArticles: function() {
        document.querySelectorAll('.new-badge').forEach(badge => {
            badge.style.animation = 'pulse 1s infinite';
        });
    }
};
</script>

<!-- Additional CSS for animations -->
<style>
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

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

/* Loading spinner for external links */
.fa-spinner {
    animation: fa-spin 1s infinite linear;
}

@keyframes fa-spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

/* Enhanced hover effects */
.article-card:hover .article-icon {
    animation: iconBounce 0.6s ease;
}

@keyframes iconBounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    40% {
        transform: translateY(-10px) rotate(5deg);
    }
    60% {
        transform: translateY(-5px) rotate(-2deg);
    }
}

/* Responsive improvements */
@media (max-width: 640px) {
    .article-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .article-card {
        padding: 1rem;
    }
    
    .language-tab {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
}
</style>