<?php
// Set page specific variables
$page_title = 'न्याय-नीती – छत्रपती शिवाजी महाराजांची न्यायव्यवस्था | न्यायप्रणाली | Trekshitz';
$meta_description = 'छत्रपती शिवाजी महाराजांची न्याय-नीती, स्वराज्यातील न्यायव्यवस्था, तिची तत्त्वे, प्रशासन, लोककल्याणावर आधारित धोरणे व ऐतिहासिक महत्त्व याबाबत सविस्तर माहिती.';
$meta_keywords = 'न्याय-नीती, शिवाजी महाराज न्यायव्यवस्था, मराठा न्यायप्रणाली, स्वराज्याचा न्याय, धर्माधिष्ठित कायदा, शिवाजी प्रशासन';


// Include header
include './../includes/header.php';
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
          न्याय-नीती – छत्रपती शिवाजी महाराजांची न्यायव्यवस्था
        </h1>

        <!-- Subtitle -->
        <p class="text-xl md:text-2xl mb-4 opacity-95">
          स्वराज्याची न्याय्य, मानवतावादी व धर्माधिष्ठित न्यायप्रणाली
        </p>
        <!-- Tagline -->
         <p class="text-lg md:text-xl mb-8 opacity-85">
         समता • नैतिक शासन • प्रजाहित
        </p>

        <!-- Key Highlights -->
        <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-coins mr-2"></i>
     न्यायाचे राज्य
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-ship mr-2"></i>
 प्रजेस संरक्षण
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-balance-scale mr-2"></i>
          धर्माधिष्ठित कायदा
            </span>

        

        </div>

    </div>
</div>

</section>


        

<section class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">

    <!-- Section Header -->
    <div class="text-center mb-16">
      <div class="section-indicator"></div>
      <h2 class="text-4xl md:text-5xl font-bold mb-6">
        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
          छत्रपती शिवाजी महाराजांची न्याय-नीती
        </span>
      </h2>
      <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
        धर्माधिष्ठित, मानवतावादी व लोककेंद्रित न्यायव्यवस्था – स्वराज्याची आधारशिला
      </p>
    </div>

    <!-- Content Card -->
    <div class="royal-card rounded-2xl p-8 md:p-12 max-w-6xl mx-auto bg-[#ECC783] border border-yellow-700">

      <!-- Intro -->
      <p class="mb-6 text-justify text-lg">
        छत्रपती शिवाजी महाराजांचे महानत्व केवळ त्यांच्या लष्करी पराक्रमापुरते मर्यादित
        नव्हते, तर त्यांच्या उत्कृष्ट न्याय-नीतीतही ते स्पष्टपणे दिसून येते.
        त्यांचे शासन धर्मनिष्ठा, नैतिक शिस्त आणि निःपक्षपाती न्यायावर आधारित होते.
      </p>

      <p class="mb-10 text-justify text-lg">
        स्वराज्याच्या स्थापनेपूर्वी महाराष्ट्रात अन्यायी व जुलमी राजवटींचा अनुभव
        जनतेने घेतला होता. पूर्वीच्या हिंदू राजांच्या न्यायपरंपरेचा वारसा
        स्वीकारत शिवाजी महाराजांनी लोकाभिमुख व न्यायप्रधान व्यवस्था निर्माण केली.
      </p>

      <!-- Grid Sections -->
      <div class="grid md:grid-cols-2 gap-10">

        <!-- Public Welfare -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-users text-red-600 mr-2"></i>
            लोककल्याणासाठी न्याय
          </h3>

          <p class="mb-4 text-justify">
            राजा हा प्रजेच्या कल्याणासाठीच असतो, अशी शिवाजी महाराजांची ठाम धारणा होती.
            त्यामुळे स्वराज्यातील न्यायदान पारदर्शक, सहज उपलब्ध आणि मानवतावादी होते.
          </p>

          <p class="text-justify">
            न्याय केवळ उच्चवर्गापुरता मर्यादित नव्हता — सामान्य नागरिक, महिला,
            शेतकरी आणि गरीब यांनाही समान संरक्षण मिळत असे.
            सामाजिक स्थानाचा न्यायनिर्णयांवर कोणताही परिणाम होत नसे.
          </p>
        </div>

        <!-- Dharma-based System -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-balance-scale text-yellow-700 mr-2"></i>
            धर्माधिष्ठित न्यायव्यवस्था
          </h3>

          <p class="mb-4 text-justify">
            न्यायनिर्णय हे हिंदू धर्माच्या तत्त्वांवर, नीतीमत्तेवर
            आणि नैतिक मूल्यांवर आधारित असत.
            दिवाणी व फौजदारी दोन्ही प्रकारच्या प्रकरणांमध्ये निःपक्षपाती न्याय दिला जाई.
          </p>

          <p class="text-justify">
            धर्म, जात किंवा पंथ यांच्या आधारे कोणताही भेदभाव केला जात नसे.
            दोषी आढळल्यास उच्चपदस्थ अधिकारीसुद्धा शिक्षेस पात्र ठरत.
          </p>
        </div>

        <!-- Fearless Justice -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-gavel text-green-700 mr-2"></i>
            निर्भय व निःपक्ष न्याय
          </h3>

          <p class="mb-4 text-justify">
            शिवाजी महाराजांनी सत्तेपेक्षा न्याय श्रेष्ठ मानला.
            अधिकार किंवा पदाच्या जोरावर कोणीही शिक्षेपासून वाचू शकत नसे.
          </p>

          <p class="text-justify">
            न्यायदानातील धैर्य व नैतिक स्पष्टतेमुळे
            स्वराज्याच्या प्रशासनावर जनतेचा विश्वास अधिक दृढ झाला.
          </p>
        </div>

        <!-- Moral Governance -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-scroll text-blue-700 mr-2"></i>
            नैतिक व मूल्याधिष्ठित शासन
          </h3>

          <p class="mb-4 text-justify">
            न्यायनिर्णयांद्वारे नैतिक मूल्ये व सामाजिक शिस्त
            यांचे संरक्षण केले जात असे.
          </p>

          <p class="text-justify">
            न्यायव्यवस्था ही स्वराज्याची नैतिक कणा बनली
            आणि समाजात शिस्त, सलोखा व स्थैर्य निर्माण झाले.
          </p>
        </div>

      </div>

      <!-- Conclusion -->
      <div class="mt-12 border-t border-yellow-700 pt-6">
        <p class="font-medium text-lg text-justify">
          निष्कर्षतः, शिवाजी महाराजांची न्याय-नीती ही
          न्याय्य, नैतिक आणि लोककल्याणाभिमुख शासनपद्धतीचे उत्कृष्ट उदाहरण ठरते.
          आजही ही नीती स्वराज्याच्या सर्वात मजबूत स्तंभांपैकी एक मानली जाते.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- संग्रहित / सविस्तर नोंदी -->
<section class="max-w-6xl mx-auto px-4 pb-20">
  <details open class="royal-card bg-[#FFF4D6] border border-yellow-700 rounded-2xl p-6">
    <summary class="cursor-pointer text-xl font-bold text-center hover:text-maratha">
      📜 न्याय व प्रशासकीय सविस्तर नोंदी
    </summary>

    <div class="mt-6 space-y-4 text-justify">
      <p>
        छत्रपती शिवाजी महाराज कोणत्याही पद, दर्जा किंवा अधिकाराची पर्वा न करता
        गुन्हेगारांना कठोर शिक्षा देत असत. निर्भयपणे व पक्षपातरहितपणे न्याय दिला जात असे.
      </p>

      <p>
        न्यायनिर्णयांद्वारे नैतिक मूल्ये व सामाजिक शिस्त यांचे संरक्षण केले जाई,
        ज्यामुळे समाजात स्थैर्य आणि सलोखा निर्माण झाला.
      </p>

      <p>
        महाराजांची न्यायव्यवस्था ही स्वराज्याची नैतिक पायाभरणी ठरली
        आणि शासनावर जनतेचा विश्वास अधिक दृढ झाला.
      </p>
    </div>
  </details>
</section>






<!-- Information Cards Section -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Information about Chhatrapati Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Detailed insights into the life, administration, warfare, and legacy of the great Maratha ruler
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Battles -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-sword text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Battles of Shivaji Maharaj
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Detailed accounts of the major battles fought by Shivaji Maharaj, including strategies and outcomes.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Battles-of-Shivaji-Maharaj1.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Books -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-teal-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-book text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Books & Literature
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Historical books, novels, and literary works written on the life and achievements of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Historical-Books-Novels-on-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Economic Policy -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-coins text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Economic Policy
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Economic reforms, trade systems, taxation methods, and financial administration of the Maratha Empire.
                </p>
                <a href="https://trekshitiz.com/Shivaji/ECONOMIC-POLICY-OF-SHIVAJI-MAHARAJ.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Photos -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-camera text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Photographs & Paintings
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Historic photographs, portraits, paintings, and artistic depictions of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Shivaji-Maharaj-Photos.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Navy -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-ship text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Maratha Navy
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The powerful naval force established by Shivaji Maharaj to protect the western coastline.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Aarmar-Navey-of-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Spy Network -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-eye text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Intelligence & Spy Network
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The efficient intelligence system that played a vital role in military and administrative success.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Herkhate-Spy-Department-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Army -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Maratha Army
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Military organization, discipline, and the legendary structure of the Maratha army.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Lashkar-Army-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Justice -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-balance-scale text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Justice System
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Judicial system, legal reforms, and policies implemented during Shivaji Maharaj’s rule.
                </p>
                <a href="https://trekshitiz.com/Shivaji/NyayNiti-Policy-of-Justice-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Factories -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-industry text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Industries & Workshops
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Industrial activities, production centers, and trade establishments during the Maratha period.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Karkhane-Factories-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Palaces -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-600 to-pink-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-landmark text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Palaces & Residences
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Royal palaces, architectural marvels, and residential complexes of the Maratha Empire.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Mahal-Palaces-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Unknown Facts -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-violet-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-question-circle text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Lesser-known Facts
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Rare, lesser-known, and interesting facts about Chhatrapati Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Unknown-Information-of-Shivaji.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Songs -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-music text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Songs & Poetry
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Songs, poems, and musical tributes dedicated to the bravery and legacy of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Songs-of-Shivaji-Maharaj.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Shivbawani -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-amber-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-scroll text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – by Kavi Bhushan
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    Classical poetry by Kavi Bhushan glorifying the valor and achievements of Shivaji Maharaj.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Shivbawni-Kavi-Bhushan.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Shivbawani Part 2 -->
            <div class="royal-card rounded-2xl p-6 text-center group">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform">
                    <i class="fas fa-feather-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Shivbawani – Part II
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 text-sm leading-relaxed">
                    The second part of the famous Shivbawani poetry composed by the renowned poet Kavi Bhushan.
                </p>
                <a href="https://trekshitiz.com/Shivaji/Shiv-bawani2-Kavi-Bhushan.htm" class="inline-flex items-center text-red-600 hover:text-yellow-500 font-semibold transition-colors">
                    Read More <i class="fas fa-arrow-right ml-2"></i>
                </a>
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
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Timeless inspiration — ideals of Shivaji Maharaj that continue to live on
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Swarajya -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-flag text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Concept of Swarajya
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    The revolutionary idea of Swarajya (self-rule) introduced by Shivaji Maharaj later became the foundation of India’s freedom movement.
                </p>
            </div>

            <!-- Religious Tolerance -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-heart text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Religious Tolerance
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Principles of religious harmony and secular governance that ensured unity and respect among diverse communities within the empire.
                </p>
            </div>

            <!-- Welfare of People -->
            <div class="royal-card rounded-2xl p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-users text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Welfare of the People
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Governance centered on public welfare — a ruler’s foremost duty — a philosophy that continues to inspire modern democratic values.
                </p>
            </div>

        </div>
    </div>
</section>



</main>

<?php include './../includes/footer.php'; ?>

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
<script>
const photoList = <?= json_encode($photos); ?>;
let currentPhoto = 0;

function openPhoto(index) {
    currentPhoto = index;
    document.getElementById('modalImage').src = 'photos/' + photoList[index];
    document.getElementById('photoModal').classList.remove('hidden');
    document.getElementById('photoModal').classList.add('flex');
}

function closePhoto() {
    document.getElementById('photoModal').classList.add('hidden');
}

function navigatePhoto(step) {
    currentPhoto = (currentPhoto + step + photoList.length) % photoList.length;
    document.getElementById('modalImage').src = 'photos/' + photoList[currentPhoto];
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closePhoto();
    if (e.key === 'ArrowLeft') navigatePhoto(-1);
    if (e.key === 'ArrowRight') navigatePhoto(1);
});
</script>




