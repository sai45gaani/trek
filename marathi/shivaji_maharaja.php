<?php
// Set page specific variables
$page_title = 'छत्रपती शिवाजी महाराज | स्वराज्याचे संस्थापक | ट्रेकशितीज';

$meta_description = 'छत्रपती शिवाजी महाराज यांची संपूर्ण ऐतिहासिक माहिती – स्वराज्याचे संस्थापक, महान मराठा योद्धा राजा, कुशल प्रशासक आणि दूरदृष्टी असलेले नेतृत्व.';

$meta_keywords = 'छत्रपती शिवाजी महाराज, स्वराज्य, मराठा साम्राज्य, महाराष्ट्राचा इतिहास, किल्ले, लढाया, मराठा राजा, शिवराय';
// Include header
include './../includes/header_marathi.php';
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
<section class="relative py-20 bg-gradient-to-br from-red-700 via-yellow-600 to-orange-500 text-white overflow-hidden">

    <!-- Floating Decorative Elements -->
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-5xl mx-auto">

            <!-- Title -->
             <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up mt-6">
            छत्रपती शिवाजी महाराज
        </h1>

            <!-- Subtitle -->
             <p class="text-xl md:text-2xl mb-4 opacity-95">
            स्वराज्याचे संस्थापक • महान मराठा योद्धा राजा
        </p>

            <!-- Tagline -->
             <p class="text-lg md:text-xl mb-8 opacity-85">
            दूरदृष्टी असलेले शासक, कुशल युद्धनीतीकार आणि स्वशासनाचे अमर प्रतीक
        </p>    

            <!-- Key Highlights -->
            <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                ३५०+ गड-किल्ले
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                स्वराज्य
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                इ.स. १६३० – १६८०
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                भारतीय आरमाराचे जनक
            </span>

            </div>

        </div>
    </div>
</section>


<!-- PREFACE IMAGE SECTION -->
<section class="py-16 bg-cream-medium dark:bg-gray-800">
    <div class="container mx-auto px-4">

        <div class="max-w-5xl mx-auto text-center">

            <!-- Image Card -->
            <div class="royal-card rounded-2xl overflow-hidden border border-mountain shadow-lg">

                <img 
    src="./shivaji/photos/maharaj_prastavna.jpg"
    alt="Chhatrapati Shivaji Maharaj - Preface"
    class="w-full  max-w-[700px] mx-auto h-auto max-h-[680px] object-contain"
/>


                <!-- Optional Caption -->
                <div class="bg-cream-light dark:bg-gray-900 p-6">
                    <p class="text-lg text-gray-800 dark:text-gray-200">
                        स्वराज्याचे स्वप्न पाहणारे दूरदृष्टी असलेले राजा — एका युगाचे नेतृत्व करणारे महापुरुष
                    </p>

                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        छत्रपती शिवाजी महाराज — भारतीय इतिहासाला नवे वळण देणारे दूरदृष्टी नेतृत्व
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>

        
        <!-- ABOUT SHIVAJI MAHARAJ -->
<section id="about" class="py-20 bg-cream-light dark:bg-gray-900">
    <div class="container mx-auto max-w-5xl px-4">

                <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    छत्रपती शिवाजी महाराजांविषयी
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                स्वराज्याचे दूरदृष्टी असलेले संस्थापक आणि भारतीय इतिहासातील महान नेतृत्वांपैकी एक
            </p>
        </div>

        <!-- Content Card -->
        <div class="royal-card rounded-2xl p-8 md:p-10 space-y-6">

            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                इ.स. १६३० मध्ये <strong>शिवनेरी किल्ल्यावर</strong> जन्मलेले छत्रपती शिवाजी महाराज
                भारतीय इतिहासाची दिशा बदलणारे एक महान नेतृत्व म्हणून उदयास आले.
                त्यांनी <strong>मराठा साम्राज्याची</strong> स्थापना केली आणि
                <strong>स्वराज्य</strong> या संकल्पनेला मूर्त रूप दिले — जी न्याय,
                समानता आणि जनकल्याणावर आधारित होती.
            </p>

            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                कुशल युद्धनीतीकार असलेल्या शिवाजी महाराजांनी
                <strong>गनिमी कावा</strong> या युद्धतंत्राचा प्रभावी वापर केला,
                सामर्थ्यशाली <strong>आरमार</strong> उभारले आणि शिस्तबद्ध
                प्रशासकीय व्यवस्था निर्माण केली.
                त्यांच्या शासनकाळात भूमी, संस्कृती आणि जनतेचा सन्मान सुरक्षित राहिला,
                तसेच सहिष्णुता, धैर्य आणि न्यायपूर्ण राज्यकारभाराचे मूल्य जपले गेले.
            </p>

            <!-- Highlights -->
            <div class="flex flex-wrap gap-4 pt-6">

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-red-600 text-white text-sm font-semibold">
                    स्वराज्याचे संस्थापक
                </span>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-yellow-500 text-white text-sm font-semibold">
                    महान युद्धनीतीकार
                </span>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-green-600 text-white text-sm font-semibold">
                    आरमाराचे दूरदृष्टी नेतृत्व
                </span>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-gray-800 text-white text-sm font-semibold">
                    जनकेंद्रित राजा
                </span>

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
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    छत्रपती शिवाजी महाराजांची सविस्तर माहिती
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                महान मराठा शासक छत्रपती शिवाजी महाराजांचे जीवन, प्रशासन, युद्धनीती आणि ऐतिहासिक वारसा याविषयी सखोल माहिती
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Battles -->
            <a href="./shivaji/shivaji_battles.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        छत्रपती शिवाजी महाराजांच्या लढाया
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        छत्रपती शिवाजी महाराजांनी लढलेल्या प्रमुख लढायांची सविस्तर माहिती, त्यातील युद्धनीती आणि परिणामांसह.
                    </p>
                    <span class="mt-auto text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2 bottom-4"></i>
                    </span>
                </div>
            </a>

            <!-- Books -->
                    <a href="./shivaji/shivaji_maharaj_books.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-teal-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-book text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        पुस्तके आणि साहित्य
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        छत्रपती शिवाजी महाराजांच्या जीवनकार्य व पराक्रमावर आधारित ऐतिहासिक पुस्तके, कादंबऱ्या आणि साहित्यिक लेखन.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2 bottom-4"></i>
                    </span>
                </div>
            </a>
            <!-- Economic Policy -->
             
                <a href="./shivaji/shivaji_maharaj_economic_policy.php" class="block group focus:outline-none">
                    <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                            <i class="fas fa-coins text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                            आर्थिक धोरण
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                            मराठा साम्राज्याच्या आर्थिक सुधारणा, व्यापार व्यवस्था, करप्रणाली आणि वित्तीय प्रशासनाची सविस्तर माहिती.
                        </p>
                        <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                            अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </span>
                    </div>
                </a>

            <!-- Photos -->
            
                    <a href="./shivaji/shivaji_maharaj_photos.php" class="block group focus:outline-none">
                    <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                            <i class="fas fa-camera text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                            छायाचित्रे आणि चित्रकला
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                            छत्रपती शिवाजी महाराजांची ऐतिहासिक छायाचित्रे, व्यक्तिचित्रे, चित्रे आणि कलात्मक प्रतिमा.
                        </p>
                        <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                            अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </span>
                    </div>
                </a>

            <!-- Navy -->
    
            <a href="./shivaji/shivaji_maharaj_navy_page.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-ship text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        मराठा आरमार
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        पश्चिम किनारपट्टीचे संरक्षण करण्यासाठी छत्रपती शिवाजी महाराजांनी उभारलेले सामर्थ्यशाली आरमार.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>
            <!-- Spy Network -->
             
            <a href="./shivaji/shivaji_maharaj_herchate.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-eye text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        गुप्तचर व माहिती यंत्रणा
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        लष्करी मोहिमा आणि प्रशासनातील यशात महत्त्वाची भूमिका बजावणारी छत्रपती शिवाजी महाराजांची प्रभावी गुप्तचर व्यवस्था.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>

            <!-- Army -->
    
            <a href="./shivaji/shivaji_maharaj_lakshar_army.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        मराठा लष्कर
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        मराठा लष्कराची रचना, शिस्त, युद्धतंत्र आणि ऐतिहासिक सामर्थ्याची सविस्तर माहिती.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>

            <!-- Justice -->
             
                    <a href="./shivaji/shivaji_maharaj_justice.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-balance-scale text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        न्यायव्यवस्था
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        छत्रपती शिवाजी महाराजांच्या काळातील न्यायव्यवस्था, कायदेविषयक सुधारणा आणि प्रशासकीय धोरणांची माहिती.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>
            <!-- Factories -->
                
            <a href="./shivaji/shivaji_maharaj_factories.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-industry text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        उद्योगधंदे व कार्यशाळा
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        मराठा काळातील औद्योगिक उपक्रम, उत्पादन केंद्रे आणि व्यापारी आस्थापनांची सविस्तर माहिती.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>

            <!-- Palaces -->
                
            <a href="./shivaji/shivaji_maharaj_palaces.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-pink-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-landmark text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        राजवाडे आणि निवासस्थाने
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        मराठा साम्राज्यातील राजवाडे, वास्तुशिल्पाचे अद्भुत नमुने आणि राजकीय निवासस्थाने.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>

            <!-- Unknown Facts -->
                <a href="./shivaji/shivaji_maharaj_unknown_info.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-violet-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-question-circle text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        अल्पज्ञात तथ्ये
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        छत्रपती शिवाजी महाराजांविषयी दुर्मिळ, अल्पज्ञात आणि रंजक ऐतिहासिक तथ्यांची माहिती.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>

            <!-- Songs -->
    
                <a href="./shivaji/shivaji_maharaj_songs.php" class="block group focus:outline-none">
                    <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                            <i class="fas fa-music text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                            गीते आणि कविता
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                            छत्रपती शिवाजी महाराजांच्या पराक्रम आणि वारशाला अर्पण केलेली गीते, कविता आणि संगीतात्मक अभिव्यक्ती.
                        </p>
                        <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                            अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                        </span>
                    </div>
                </a>
            <!-- Shivbawani -->
    
                    <a href="./shivaji/shivaji_maharaj_shivbhawani_all.php" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-amber-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                        <i class="fas fa-scroll text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        शिवभवानी – कवी भूषण
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                        कवी भूषण यांनी रचलेली शास्त्रीय काव्यरचना, ज्यामध्ये छत्रपती शिवाजी महाराजांचा पराक्रम व कार्य गौरविले आहे.
                    </p>
                    <span class="mt-auto items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                        अधिक वाचा <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </div>
            </a>

            <!-- Shivbawani Part 2 -->
            <!--
            <a href="./shivaji/shivaji_battles.php" class="block group focus:outline-none">
            <div class="royal-card rounded-2xl p-6 text-center group h-full flex flex-col">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-feather-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – Part II
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The second part of the famous Shivbawani poetry composed by the renowned poet Kavi Bhushan.
                </p>
                <span  class="items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>   
                </span>
            </div>
            </a>
            -->
        </div>
    </div>
</section>


<!-- KEY CONTRIBUTIONS -->
<section class="py-20 bg-cream-warm dark:bg-gray-800">
    <div class="container mx-auto max-w-6xl px-4">

        <!-- Section Header -->
                <div class="text-center mb-14">
                <div class="section-indicator"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        प्रमुख योगदान
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    मराठा साम्राज्याची घडण घडवणारी आणि पिढ्यान्‌पिढ्या प्रेरणा देणारी अविस्मरणीय कामगिरी
                </p>
            </div>
        <!-- Cards -->
        <div class="grid md:grid-cols-3 gap-8">

            <!-- Swarajya -->
                        <div class="royal-card bg-cream-light dark:bg-gray-900 p-8 rounded-2xl border border-mountain text-center hover:shadow-xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-flag text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-primary mb-3">
                    स्वराज्य
                </h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    न्याय, स्वशासन आणि सामान्य जनतेच्या कल्याणावर आधारित स्वतंत्र व जनकेंद्रित राज्याची स्थापना.
                </p>
            </div>

            <!-- Military Strategy -->
                    <div class="royal-card bg-cream-light dark:bg-gray-900 p-8 rounded-2xl border border-mountain text-center hover:shadow-xl transition-all">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-orange-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-sword text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-primary mb-3">
                    युद्धनीती
                </h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    गनिमी कावा या युद्धतंत्राची प्रभावी मांडणी करून युद्धभूमीवरील रणनीतीत क्रांतिकारक बदल घडवून आणले, जे आजही अभ्यासले जातात.
                </p>
            </div>
            <!-- Fort Administration -->
                        <div class="royal-card bg-cream-light dark:bg-gray-900 p-8 rounded-2xl border border-mountain text-center hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-emerald-700 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-fort-awesome text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">
                        किल्ले प्रशासन
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        सह्याद्री पर्वतरांगांमध्ये असलेल्या <strong>३००हून अधिक किल्ल्यांचे</strong>
                        सुदृढीकरण, व्यवस्थापन आणि रणनीतिक नियंत्रण प्रभावीपणे केले.
                    </p>
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
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    छत्रपती शिवाजी महाराजांचा कालपट
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                महान मराठा योद्धा राजाच्या जीवनातील महत्त्वाच्या घटना
            </p>
        </div>

            <div class="max-w-4xl mx-auto">
            <div class="space-y-8">

                            <div class="timeline-item pl-8 py-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">१६३०</h3>
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                                    जन्म
                                </h4>
                                <p class="text-gray-600 dark:text-gray-300">
                                    १९ फेब्रुवारी १६३० रोजी शिवनेरी किल्ल्यावर शहाजी भोसले आणि जिजाबाई यांच्या पोटी जन्म.
                                </p>
                            </div>

                            <div class="timeline-item pl-8 py-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">१६४५</h3>
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                                    पहिला किल्ला जिंकला
                                </h4>
                                <p class="text-gray-600 dark:text-gray-300">
                                    वयाच्या १५व्या वर्षी तोरणा किल्ला जिंकून लष्करी नेतृत्वाच्या प्रवासाची सुरुवात केली.
                                </p>
                            </div>

                            <div class="timeline-item pl-8 py-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">१६५९</h3>
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                                    अफझलखान वध
                                </h4>
                                <p class="text-gray-600 dark:text-gray-300">
                                    प्रतापगडावर झालेल्या ऐतिहासिक भेटीत अफझलखानाचा पराभव करून असाधारण धैर्य व युद्धनीतीचे दर्शन घडवले.
                                </p>
                            </div>

                            <div class="timeline-item pl-8 py-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">१६७४</h3>
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                                    राज्याभिषेक
                                </h4>
                                <p class="text-gray-600 dark:text-gray-300">
                                    रायगड किल्ल्यावर छत्रपती म्हणून राज्याभिषेक होऊन मराठा साम्राज्याची औपचारिक स्थापना झाली.
                                </p>
                            </div>

                            <div class="timeline-item pl-8 py-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">१६८०</h3>
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                                    निधन
                                </h4>
                                <p class="text-gray-600 dark:text-gray-300">
                                    ३ एप्रिल १६८० रोजी रायगड किल्ल्यावर निधन झाले; परंतु एक अजरामर आणि प्रेरणादायी वारसा मागे राहिला.
                                </p>
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
                    शाश्वत वारसा
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                काळाच्या पलीकडे असलेली प्रेरणा — छत्रपती शिवाजी महाराजांचे आदर्श आजही जिवंत आहेत
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Swarajya -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-flag text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    स्वराज्याची संकल्पना
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    छत्रपती शिवाजी महाराजांनी मांडलेली स्वराज्याची क्रांतिकारी संकल्पना पुढे भारताच्या स्वातंत्र्य चळवळीचा पाया ठरली.
                </p>
            </div>

            <!-- Religious Tolerance -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-heart text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    धार्मिक सहिष्णुता
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    सर्व धर्मांप्रती आदर आणि सलोखा जपणारी धर्मनिरपेक्ष राज्यव्यवस्था, ज्यामुळे साम्राज्यात ऐक्य आणि विश्वास निर्माण झाला.
                </p>
            </div>

            <!-- Welfare of People -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-users text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    जनकल्याण
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    जनतेचे कल्याण हेच राज्यकर्त्याचे प्रमुख कर्तव्य मानणारी शासनपद्धती, जी आजच्या लोकशाही मूल्यांनाही प्रेरणा देते.
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
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    छत्रपती शिवाजी महाराजांचे किल्ले
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                छत्रपती शिवाजी महाराजांशी संबंधित भव्य व ऐतिहासिक किल्ल्यांचा शोध घ्या
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Raigad -->
            <a href="./fort/index.php?slug=raigad-fort" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 group h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                         style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                            रायगड किल्ला
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            मराठा साम्राज्याची राजधानी आणि छत्रपती शिवाजी महाराजांचा राज्याभिषेक झालेला ऐतिहासिक किल्ला.
                        </p>
                        <span class="mt-auto text-red-600 hover:text-yellow-500 font-semibold">
                            किल्ला पाहा <i class="fas fa-arrow-right ml-1"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Pratapgad -->
            <a href="./fort/index.php?slug=pratapgad-fort" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 group h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                         style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                            प्रतापगड किल्ला
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            छत्रपती शिवाजी महाराज आणि अफझलखान यांच्यातील ऐतिहासिक भेट घडलेला पराक्रमी किल्ला.
                        </p>
                        <span class="mt-auto text-red-600 hover:text-yellow-500 font-semibold">
                            किल्ला पाहा <i class="fas fa-arrow-right ml-1"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Shivneri -->
            <a href="./fort/index.php?slug=shivneri-fort" class="block group focus:outline-none">
                <div class="royal-card rounded-2xl p-6 group h-full flex flex-col">
                    <div class="h-48 bg-cover bg-center group-hover:scale-110 transition-transform duration-500"
                         style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                            शिवनेरी किल्ला
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                            छत्रपती शिवाजी महाराजांचे जन्मस्थान आणि मराठा इतिहासातील अत्यंत पूजनीय किल्ला.
                        </p>
                        <span class="mt-auto text-red-600 hover:text-yellow-500 font-semibold">
                            किल्ला पाहा <i class="fas fa-arrow-right ml-1"></i>
                        </span>
                    </div>
                </div>
            </a>

        </div>

        <div class="text-center mt-12">
            <a href="./fort_in_english.php"
               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-semibold rounded-full hover:from-yellow-500 hover:to-red-600 transition-all duration-300">
                <i class="fas fa-fort-awesome mr-2"></i>
                सर्व शिवाजी महाराजांचे किल्ले पहा
            </a>
        </div>
    </div>
</section>


</main>

<?php include './../includes/footer_marathi.php'; ?>

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