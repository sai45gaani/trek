<?php
// Set page specific variables
$page_title = 'Songs & Poems on Chhatrapati Shivaji Maharaj | Shiv Geet | Trekshitz';
$meta_description = 'Collection of inspiring songs, poems, aartis, powadas, and devotional compositions dedicated to Chhatrapati Shivaji Maharaj.';
$meta_keywords = 'Shivaji Maharaj songs, Shiv Geet, Powada, Shivaji poems, Shivaji Aarti, Maratha songs';


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

  <div class="floating-elements">
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
  </div>

  <div class="container mx-auto px-4 relative z-10">
    <div class="text-center max-w-5xl mx-auto">

      <h1 class="text-5xl md:text-7xl font-bold mb-6">
        Shivbhavani – A Classical Poem on Shivaji Maharaj
      </h1>

      <p class="text-xl md:text-2xl mb-4 opacity-95">
        Composed by Kavi Bhushan
      </p>

      <p class="text-lg md:text-xl mb-8 opacity-85">
        Heroic Poetry • Literary Excellence • Historical Tribute
      </p>

      <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">
        <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
          📜 Classical Poem
        </span>
        <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
          🏹 Veer-Rasa Poetry
        </span>
        <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
          📖 Literary Explanation
        </span>
      </div>

    </div>
  </div>
</section>



<section class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-4">

                <div class="royal-card bg-[#ECC783] border border-yellow-700 rounded-2xl p-8 md:p-12 max-w-6xl mx-auto">

                <h2 class="text-3xl font-bold text-center mb-10">
                    Shivbhavani (Original Poem)
                </h2>

                <!-- 🔒 ORIGINAL POEM – DO NOT EDIT -->
                <!-- Poet Introduction -->
 <section class="py-16 bg-white dark:bg-gray-900">
                    <div class="container mx-auto px-4">
                        <div class="max-w-4xl mx-auto text-center">
                            <div class="w-16 h-1 bg-gradient-to-r from-amber-600 to-orange-600 mx-auto mb-8"></div>
                            <h2 class="text-4xl md:text-5xl font-bold mb-8">
                                <span class="bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent font-devanagari">
                                    कवि भूषण परिचय
                                </span>
                            </h2>
                            
                            <div class="grid md:grid-cols-2 gap-8 items-center mb-12">
                                <div class="text-left">
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">About Kavi Bhushan</h3>
                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                        Kavi Bhushan (1613-1715) was a renowned Hindi poet known for his heroic poetry celebrating the valor of great warriors. His most famous work, Shivbawani, immortalizes the achievements of Chhatrapati Shivaji Maharaj in beautiful Hindi verses.
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-devanagari">
                                        भूषण जी ने अपनी काव्य प्रतिभा से शिवाजी महाराज के पराक्रम और वीरता को अमर बना दिया। उनकी रचनाएं आज भी वीर रस के उत्कृष्ट उदाहरण मानी जाती हैं।
                                    </p>
                                </div>
                                
                                <div class="bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900 dark:to-orange-800 rounded-2xl p-6 border border-amber-200 dark:border-amber-700">
                                    <div class="text-center">
                                        <div class="w-20 h-20 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="fas fa-feather-alt text-white text-3xl"></i>
                                        </div>
                                        <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">काव्य काल</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">1613 - 1715 CE</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 mt-6 text-center text-sm">
                                        <div class="bg-white dark:bg-gray-800 p-3 rounded-lg">
                                            <div class="font-semibold text-gray-800 dark:text-white">102</div>
                                            <div class="text-gray-500 dark:text-gray-400">Years Lived</div>
                                        </div>
                                        <div class="bg-white dark:bg-gray-800 p-3 rounded-lg">
                                            <div class="font-semibold text-gray-800 dark:text-white font-devanagari">वीर रस</div>
                                            <div class="text-gray-500 dark:text-gray-400">Poetry Style</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</section>

</section>
<section class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4 max-w-5xl">

    <!-- Title -->
    <div class="text-center mb-12">
      <div class="w-20 h-1 bg-gradient-to-r from-amber-600 to-orange-600 mx-auto mb-6"></div>
      <h1 class="text-4xl md:text-5xl font-bold font-devanagari mb-3">
        शिवबावनी
      </h1>
      <p class="text-lg text-gray-600 dark:text-gray-300">
        Kavi Bhushan · Original Heroic Poem on Chhatrapati Shivaji Maharaj
      </p>
    </div>

    <!-- Controls -->
    <div class="flex justify-center gap-4 mb-10">
      <button onclick="openAllPads()"
        class="px-6 py-2 rounded-full bg-amber-600 text-white font-semibold hover:bg-amber-700 transition">
        Open All Pads
      </button>
      <button onclick="closeAllPads()"
        class="px-6 py-2 rounded-full border border-amber-600 text-amber-600 hover:bg-amber-50 dark:hover:bg-gray-800 transition">
        Close All Pads
      </button>
    </div>

    <!-- Pads -->
    <div class="space-y-6">

      <!-- Pad 1 -->
      <details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border border-amber-200 dark:border-gray-700">
        <summary class="cursor-pointer list-none font-bold font-devanagari text-xl">
          🔹 प्रारंभिक पद 1
        </summary>
        <div class="mt-4 font-devanagari text-lg leading-relaxed">
          साजि चतुरंग सेना अंगी उमंग धरी,<br>
          सरजा शिवाजी जंग जिंकावया चालत आहेत।<br>
          भूषण म्हणे नाद घुमतो नगाऱ्यांचा,<br>
          नदीसारखा रणगर्जना उसळत आहे॥
        </div>
      </details>

      <!-- Pad 2 -->
      <details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border border-amber-200 dark:border-gray-700">
        <summary class="cursor-pointer list-none font-bold font-devanagari text-xl">
          🔹 पद 2
        </summary>
        <div class="mt-4 font-devanagari text-lg leading-relaxed">
          उल्हास, खेळ, कोलाहल जगभर पसरला,<br>
          गर्जना ऐकून पर्वतही हादरले।<br>
          ताऱ्यांप्रमाणे धूळ आकाश व्यापून राहिली,<br>
          समुद्रही हालचालींनी थरथरला॥
        </div>
        <!-- Shabdarth -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="font-devanagari font-bold text-lg mb-3">✍️ शब्दार्थ (संक्षेप)</h3>
        <ul class="space-y-2 font-devanagari text-lg">
          <li><strong>चतुरंग सेना</strong> – हत्ती, घोडे, रथ, पायदळ</li>
          <li><strong>सरजा</strong> – सिंह, वीर</li>
          <li><strong>नगारा</strong> – रणभेरी</li>
          <li><strong>कोलाहल</strong> – गोंधळ, रणगर्जना</li>
        </ul>
      </div>
      </details>

      

      <!-- Pad 3 -->
      <details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border border-amber-200 dark:border-gray-700">
        <summary class="cursor-pointer list-none font-bold font-devanagari text-xl">
          🔹 पद 3
        </summary>
        <div class="mt-4 font-devanagari text-lg leading-relaxed">
          ध्वज फडकले, नगारे गर्जले,<br>
          कोणीही थांबवू शकले नाही।<br>
          गावोगावी, शहरोशहरी,<br>
          शिवराजांची कीर्ती पसरली॥
        </div>
      </details>

      <!-- Pad 4 -->
      <details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border border-amber-200 dark:border-gray-700">
        <summary class="cursor-pointer list-none font-bold font-devanagari text-xl">
          🔹 पद 4
        </summary>
        <div class="mt-4 font-devanagari text-lg leading-relaxed">
          हत्तींच्या गजराने रणांगण हादरले,<br>
          शत्रूंची घरे उद्ध्वस्त झाली।<br>
          शिवसेनेच्या वेगासमोर,<br>
          कोणीही उभे राहू शकले नाही॥
        </div>
      </details>

      <!-- Pad 5 -->
      <details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border border-amber-200 dark:border-gray-700">
        <summary class="cursor-pointer list-none font-bold font-devanagari text-xl">
          🔹 पद 5
        </summary>
        <div class="mt-4 font-devanagari text-lg leading-relaxed">
          भुते, प्रेत, राक्षस भयभीत झाले,<br>
          शिवराजांच्या पराक्रमाने।<br>
          देवही आश्चर्यचकित होऊन,<br>
          हा कोण राजा? असे विचारू लागले॥
        </div>
      </details>

      <!-- PAD 6 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 6</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
अफजलखान को जिन्हों ने मैदान मारा,  <br>
बीजापुर गोलकुंडा मारा जिन आज है।  <br>
भूषण भणत फ़रंगी तें फिरंगी मारे,  <br>
हबशी तुर्क डरे उलटे जहाज है॥
</div>
</details>


      <!-- PAD 7 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 7</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
देखत रूसतमखाँ को जिन खाक किया,  <br>
सलख़ी सुरत आज सुनी जो आवाज है।  <br>
चौंकि चौंकि चकित कितहुँधा ते यारो,  <br>
लेत रहो खबर कहाँ शिवराज है॥
</div>
</details>

      <!-- PAD 7 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 8</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
हबशी फ़रंगी फारसी यांची जहाजे  <br>
ओढी पलटी घातली!  <br>
"आम्हां शिवा कोठे निघतां?" <br> 
शहांच्या मनी काळजी लागली॥
</div>
</details>

      <!-- PAD 7 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 9</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
उत्सव पातशाह जुके जनके  <br>
रडू सुटे,  <br>
उमड घुमड मत्तवारे <br>  
घन भारी आहे।
</div>
</details>

      <!-- PAD 7 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 10</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
इथे शिवराज जुके सुटे सिंहराज खांदे,<br>
विदारे कुंभ करिणे चिखलात कारे आहे।<br>
फौजे शेख सय्यद मुघल आण पठाणांची,<br>
मिळ एकलास काही मीर न सावरते आहे॥
</div>
</details>

<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 11</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
हिंदू धर्माची बहादुर तलवार राखी,<br>
कायमो बार दिल्लीचे गुमान पारी डरे आहे॥
</div>
</details>

<!-- PAD 8 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 12</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
वेगें मराठ्यांवरी बादशाही करी पातळे<br>
कृष्ण मेघांवरी!<br>
सह्याद्री–राजेसराचा पहाडी रण<br>
धांवले सिंह त्यांच्यावर॥
</div>
</details>

<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 13</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
फौजा पठाणी अमीरी पळाल्या,<br>
सुभा रक्ष्याला न कोणी उभा!<br>
रक्षण सीमा महाराष्ट्र–भूमीची,<br>
कितीदा करी म्लेंच्छ हिणवा॥
</div>
</details>

<!-- PAD 10 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 14</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
दाढीके रक्षणाची दाढी<br>
सी अहंकारी छाती,<br>
बाढी जशद मर्याद हिंदवांची।
</div>
</details>

<!-- PAD 11 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 15</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
काढी गेली अत्यंत मनाची कसक सर्व,<br>
मिटे गेली ठसक तमाम तुर्कांची॥
</div>
</details>

<!-- PAD 12 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 16</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
भूषण भणत दिल्लीपति दिल धकधक,<br>
सुनि सुनि धाक शिवराज मर्दान्याचा।
</div>
</details>
<!-- PAD 13 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 17</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
मोठी भई चंडी बिन चौटीचे चामड्याची,<br>
खोटी भई संपत्ती चकत्यांके घराण्याची।
</div>
</details>

<!-- PAD 14 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 18</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
दाढी जयांच्या मुखी, दाह त्यांच्या हृदयि लागला,<br>
कीर्ती संवर्धिली!
</div>
</details>


<!-- PAD 15 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 19</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
कानां पडो नाव हे जो<br>
"शिवाजी" भयाने उठे झोपलेला शहा!
</div>
</details>

<!-- PAD 16 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 20</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
इंद्र जिमि जंभपर, बाडव सुअंभपर,<br>
रावण सदंभपर रघुकुलराज हा।<br>
पवन वराहपर, शंभू रतिनाहर,<br>
ज्यो सहस्रबाहुंवर रामदासराज हा॥
<div>
</details>

<!-- PAD 17 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 21</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
दाव द्रुमदंडपर, चीता मृगजुंडपर,<br>
भूषण वितुंडपर जैसे मृगराज हा।<br>
तेज तम अंसपर, काहु जिमि कंसपर,<br>
त्यौं म्लेंच्छ वंशपर शेर शिवराज हा॥
<div>
</details>

<!-- PAD 18 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 22</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
जंभपर इंद्र, लंकापतिपर किष्किंधेश पती,<br>
मेघावर वायु, कामावर शिव – तपाची रती।<br>
दुशासनावर भीम, कंसावर कृष्ण जसा,<br>
भोसले भूप शिवाजी तसा म्लेंच्छ वंशावर॥
<div>
</details>

<!-- PAD 19 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 23</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
शुक्र जिमि शैलपर, अर्क तमाळपर,<br>
ब्रह्मा जिमि वेदपर लेखीये।<br>
राम दशरथपर, भीम जरासंधपर,<br>
भूषण ज्यों सिंधुपर कुंभज देखिये॥
<div>
</details>

<!-- PAD 20 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 24</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
हर ज्यों अनंगपर, गरुड भुजंगपर,<br>
कौरव के अंगपर पार्थ देखिये।<br>
बाज ज्यों विहंगपर, सिंह ज्यों मतंगपर,<br>
म्लेंच्छ चतुरंगपर शिवराज देखिये॥
<div>
</details>

<!-- PAD 21 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 25</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
शंभू ज्यों अनंगावर, बाज पक्षी विहंगावर,<br>
शेर ज्यों मतंगावर आघात करी।<br>
पक्षी ज्यों भुजंगावर, वज्र ज्यों पर्वतावर,<br>
शिवाजी तसा म्लेंच्छांवर घात करी॥
<div>
</details>

<!-- PAD 22 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 26</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
कुंभकर्ण असुर अवतारी औरंगजेब,<br>
किंवा कंस मथुरा दोहा ई रबर।<br>
खोडी डारो देव देव शहर मुठ्ठा बाको,<br>
लाखन तुर्क कीन्हे छूटी जबर॥
<div>
</details>

<!-- PAD 23 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 27</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
भूषण भणत भाग्यो काशपति विश्वनाथ,<br>
आणि कान गिनतीं भुली गति भस्मक।<br>
चारि वर्ण धर्म सोडि कलमा नवाज पठे,<br>
शिवाजी न होता तां सुनति होती सबक॥
<div>
</details>

<!-- PAD 24 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 28</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
औरंगज जैसे कुंभकर्ण अवतार,<br>
करी गोकुळी निर्दय कत्ल।<br>
देवी महादेव पाहुनी किती भ्रष्टतेचे,<br>
करी दंगल॥
<div>
</details>

<!-- PAD 25 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 29</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
काशीपति शंभू तोही पळाला,<br>
दुजांची कथा गावी काय ती?<br>
होता शिवाजी न, सर्वथा<br>
होती जनांची अवस्था दयनीय॥
<div>
</details>

<!-- PAD 26 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 30</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
सांच को न मानो देवी देवता न जानो,<br>
ऐसी डर आणेमे कहत बात जबकी।<br>
औरंग पातशाहन के होती चाह हिंदून की,<br>
अकबर शाहजहां कहां सही तबकी॥
<div>
</details>

<!-- PAD 27 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 31</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
बब्बर के तिब्बर हिम्मत बांधि गये,<br>
दो में एक करी न कुरान वेद ढबकी।<br>
काशी कुतुब जाती मथुरा मस्जिद होती,<br>
शिवाजी न होता तां सुनति होती सबकी॥
<div>
</details>

<!-- PAD 28 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 32</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
देवालय भुज होते, मस्जिद तिथे बांधल्या,<br>
प्रार्थना चालल्या।<br>
गणेशादी देवतां ना ताप देती,<br>
इथे देवता स्तब्ध झाल्या॥
<div>
</details>

<!-- PAD 29 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 33</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
सिद्ध जनांनो संप्रति साधुतेची,<br>
अशी पीरजादे जगात दाविती।<br>
काशी अयोध्या कला हीन होती,<br>
शिवाजी न होता तर अवस्था बिकट होती॥
<div>
</details>

<!-- PAD 30 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 34</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
वेद राखे, ब्राह्मण राखे, गो-राज राखे,<br>
मराठो अनन्य रक्षण करिती।<br>
हिंदूंची चोटी रोटी राखी सिपाहींची,<br>
कांधे मध्ये जनेऊ राखी धरिती॥
<div>
</details>
<!-- PAD 31 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 35</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
मशीद राखे, मुगल मोडि राखे पातशाह,<br>
बरी पीरासी राखे वरदान धरिती।<br>
राजांची हद्द राखे तेजबल शिवराज,<br>
देव राखे देवालय धर्म धरिती॥
<div>
</details>

<!-- PAD 32 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 36</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
त्वां राखिले वेद, त्वां राखिले पुराण,<br>
मुखी रामनाम सहि राखिले।<br>
हिंदी शिखा राखिली हिंदुभूपा,<br>
गळ्याचे अहंकार जाणवी राखिले॥
<div>
</details>

<!-- PAD 33 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 37</summary>

<div class="mt-4 font-devanagari text-lg leading-relaxed">
दिल्ली विजयानंतर लुटून काढिले दान,<br>
कनक कुंभासमान।<br>
देवालय राखिले देव राज्या,<br>
गृहही राखिला धर्म समान॥
<div>
</details>

<!-- PAD 34 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 38</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
दक्षिण जिंकिला, पश्चिम जिंकिला,<br>
उत्तर भयभीत झाला।<br>
म्लेंच्छांस ठेविले मर्यादेत,<br>
नम्रता न मोडिता चालिला॥
<div>
</details>

<!-- PAD 35 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 39</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
सेनाबळ जिंकिले दक्षिणेस,<br>
पश्चिमे समुद्र थरथरला।<br>
उत्तरेत शौर्य स्थिर राहिले,<br>
सुरत मुखी भय उतरला॥
<div>
</details>

<!-- PAD 36 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 40</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
म्लेंच्छांस ठेविले बंधनात,<br>
मर्यादा न मोडिता चालिला।<br>
नवरंगी रंग एकही न धरी,<br>
शिवाजी असा रंग खेळिला॥
<div>
</details>

<!-- PAD 37 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 41</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
सप्त सागरांवर जयघोष झाला,<br>
भूपृष्ठ अखंड राखिला।<br>
पापी दमन करीत धर्म रक्षण,<br>
कर्मयोग अविरत चालिला॥
<div>
</details>

<!-- PAD 38 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 42</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
भूषण म्हणे राजा शिवाजी,<br>
म्लेंच्छांचा गर्व चिरडिती।<br>
जगाला न्याय देणारा नृप,<br>
धर्मसंरक्षक म्हणून वंदिती॥
<div>
</details>

<!-- PAD 39 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 43</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
ओजस्वी वाणी, पराक्रमी बाहू,<br>
राज्य सुदृढ उभारिले।<br>
दीनदुबळ्यांचा आधार झाला,<br>
स्वराज्य स्थिर स्थापिले॥
<div>
</details>

<!-- PAD 40 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 44</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
देव, द्विज, गाय, साधुजन,<br>
यांचे रक्षण ज्याने केले।<br>
शिवाजी नाव घेताच भय,<br>
शत्रूच्या मनात भरले॥
<div>
</details>

<!-- PAD 41 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 45</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
इंद्र, वरुण, यमही स्तब्ध,<br>
पराक्रम पाहून थबकले।<br>
रणभूमीवर सिंह समान,<br>
शिवराय उभे ठाकले॥
<div>
</details>

<!-- PAD 42 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 46</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
गरुड जसा आकाशात,<br>
सिंह जसा वनात वावरतो।<br>
तसा शिवाजी रणांगणात,<br>
म्लेंच्छांना धुळीला मिळवतो॥
<div>
</details>

<!-- PAD 43 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 47</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
राक्षसांचा नाश करणारा,<br>
धर्माचा दीप प्रज्वलित।<br>
शिवाजी राजा नसेता तर,<br>
भारत अंधकारात बुडीत॥
<div>
</details>

<!-- PAD 44 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 48</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
काशी, मथुरा, अयोध्या,<br>
पावन स्थळे सुरक्षित।<br>
शिवाजी नसता तर,<br>
धर्म झाला असता लुप्त॥
<div>
</details>

<!-- PAD 45 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 49</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
देवालये राखिली त्याने,<br>
मशीद तोडू न दिली।<br>
न्याय, धर्म, मर्यादा,<br>
या तिन्हींची जोपासना केली॥
<div>
</details>

<!-- PAD 46 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 50</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
वेद, पुराणे, रामनाम,<br>
सर्वांना समान मानिले।<br>
हिंदवी स्वराज्य स्थापून,<br>
भारत गौरवशाली केले॥
<div>
</details>

<!-- PAD 47 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 51</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
दिल्ली जिंकूनही दान दिले,<br>
लूट नव्हे धर्म मानिला।<br>
राजा असूनही संयमी,<br>
शिवाजी महान ठरिला॥
<div>
</details>

<!-- PAD 48 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 52</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
दक्षिण, पश्चिम, उत्तर दिशी,<br>
शिवशक्ती गाजली।<br>
समुद्रही थरथर कापला,<br>
शिवरायांची कीर्ती पसरली॥
<div>
</details>

<!-- PAD 49 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 53</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
मर्यादा न मोडता विजय,<br>
हेच शिवनीतीचे लक्षण।<br>
शत्रूही मान देऊ लागले,<br>
असा होता तो नृपगुण॥
<div>
</details>

<!-- PAD 50 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 54</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
नवरंगी वैभव न धरीता,<br>
एकाच रंगात राहिला।<br>
धर्म, न्याय, स्वराज्य,<br>
या रंगात तो न्हाऊन निघाला॥
<div>
</details>

<!-- PAD 51 -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 55</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
सेनाबळ, बुद्धी, पराक्रम,<br>
या तिन्हींचा संगम झाला।<br>
शिवाजी नाव घेताच,<br>
इतिहास जागृत झाला॥
<div>
</details>

<!-- PAD 52 (SAMAROP) -->
<details class="shiv-pad bg-amber-50 dark:bg-gray-800 rounded-2xl p-6 border">
<summary class="font-bold cursor-pointer">🔹 पद 56 (समारोप)</summary>
<div class="mt-4 font-devanagari text-lg leading-relaxed">
भूषण म्हणे धन्य तो राजा,<br>
शिवाजी महाराज महान।<br>
म्लेंच्छ संहारक, धर्मरक्षक,<br>
युगायुगांचा अभिमान॥
<div>
</details>


      <!-- 🔁 CONTINUE EXACT SAME STRUCTURE FOR PAD ६ TO PAD ५२ -->
      <!-- Copy one <details class="shiv-pad"> block -->
      <!-- Change heading + paste original Marathi text as-is -->

    </div>

  </div>
</section>

  


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
<script>
  function openAllPads() {
    document.querySelectorAll('.shiv-pad').forEach(pad => pad.open = true);
  }

  function closeAllPads() {
    document.querySelectorAll('.shiv-pad').forEach(pad => pad.open = false);
  }
</script>





