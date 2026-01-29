<?php
// Set page specific variables
$page_title = 'आरमार (नौदल) - छत्रपती शिवाजी महाराज | Maratha Navy | Trekshitz';
$meta_description = 'छत्रपती शिवाजी महाराजांनी उभारलेले स्वदेशी आरमार, जलदुर्ग, नौदल धोरण आणि कोकण किनाऱ्याच्या संरक्षणाची सविस्तर माहिती.';
$meta_keywords = 'Shivaji Maharaj navy, Maratha navy, Aarmar Shivaji Maharaj, मराठा आरमार, शिवाजी महाराज नौदल';


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
               छत्रपती शिवाजी महाराजांचे आरमार (नौदल)
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-4 opacity-95">
                   स्वराज्याच्या समुद्री सामर्थ्याची भक्कम पायाभरणी
            </p>
            <!-- Tagline -->
            <p class="text-lg md:text-xl mb-8 opacity-85">
                जलदुर्ग, नौदल आणि कोकण किनाऱ्याचे संरक्षण
            </p>

            <!-- Key Highlights -->
            <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-coins mr-2"></i>
           स्वदेशी नौदल
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-ship mr-2"></i>
       जलदुर्ग व्यवस्था
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-balance-scale mr-2"></i>
                किनारी सुरक्षा
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
         मराठा आरमाराची स्थापना
        </span>
      </h2>
        <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
        छत्रपती शिवाजी महाराजांच्या नेतृत्वाखाली उभ्या राहिलेल्या स्वदेशी नौदलाची गौरवशाली वाटचाल
        </p>
    </div>

    <!-- Content Card -->
    <div class="royal-card rounded-2xl p-8 md:p-12 max-w-6xl mx-auto bg-[#ECC783] border border-yellow-700">

      <!-- Intro -->
      <p class="mb-6 text-justify text-lg">
            छत्रपती शिवाजी महाराज हे भारतातील पहिले राजे होते ज्यांनी समुद्री शक्तीचे
            धोरणात्मक महत्त्व ओळखले. कोकण किनारपट्टीवर पोर्तुगीज, इंग्रज, सिद्दी
            यांसारख्या परकीय शक्तींचा वाढता प्रभाव स्वराज्यासाठी धोकादायक ठरत होता.
      </p>

      <p class="mb-10 text-justify text-lg">
           या पार्श्वभूमीवर इ.स. १६५६–५७ पासून शिवाजी महाराजांनी एक सशक्त आरमार उभारण्यास
            सुरुवात केली. स्वराज्याच्या समुद्री सीमांचे संरक्षण करणे आणि व्यापारी
            मार्ग सुरक्षित ठेवणे हा आरमार स्थापनेचा मुख्य उद्देश होता.
      </p>

      <!-- Grid Sections -->
      <div class="grid md:grid-cols-2 gap-10">

        <!-- Naval Forts -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-fort-awesome text-red-600 mr-2"></i>
           जलदुर्ग व किनारी संरक्षण
          </h3>

          <p class="mb-4 text-justify">
           शिवाजी महाराजांनी सिंधुदुर्ग, विजयदुर्ग, सुवर्णदुर्ग, खांदेरी आणि उंदेरी
            यांसारखे जलदुर्ग उभारले. हे किल्ले समुद्रातील हालचालींवर लक्ष ठेवण्यासाठी
            अत्यंत उपयुक्त ठरले.
          </p>

          <p class="text-justify">
          सिंधुदुर्ग, रत्नागिरी आणि इतर ठिकाणी जहाजबांधणी केंद्रे उभारण्यात आली.
            यामुळे आरमारासाठी आवश्यक नौका स्वदेशी पातळीवर तयार करता येऊ लागल्या.
          </p>
        </div>

        <!-- Warships -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-ship text-yellow-700 mr-2"></i>
           नौका व युद्धनौका
          </h3>

          <p class="mb-4 text-justify">
            मराठा आरमारात मोठ्या युरोपीय जहाजांपेक्षा लहान, हलक्या व वेगवान नौकांचा
            अधिक वापर करण्यात येत असे. किनारी युद्धासाठी या नौका अधिक प्रभावी ठरत.
          </p>

          <p class="text-justify">
               गुराब, गलबत, शिवाड, तारांडी, पाल, माचवा, जुग इत्यादी नौकांचा वापर होत असे.
            गुराब ही सर्वात मोठी युद्धनौका असून ती २०० ते ३०० टन वजनाची असे.
          </p>
        </div>

        <!-- Administration -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-users-cog text-green-700 mr-2"></i>
              आरमार प्रशासन
          </h3>

          <p class="mb-4 text-justify">
           मराठा आरमारातील अधिकारी विविध जाती-धर्मातील असत. गुणवत्ता, शौर्य आणि
            निष्ठा यांना प्राधान्य दिले जात असे. दार्यासारंग, मायनाक, सुभेदार
            ही प्रमुख पदे होती.
          </p>

          <p class="text-justify">
      मायनाक भंडारी, दौलतखान आणि कान्होजी आंग्रे यांसारख्या पराक्रमी सरदारांनी
            मराठा आरमाराच्या बळकटीस मोठे योगदान दिले.
          </p>
        </div>

        <!-- Campaigns -->
        <div>
          <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-700 pb-2">
            <i class="fas fa-anchor text-blue-700 mr-2"></i>
            प्रमुख नौदल मोहिमा
          </h3>

          <p class="mb-4 text-justify">
            बसुर (१६६५) येथील समुद्री स्वारी आणि खांदेरी युद्ध (१६७९) या दोन महत्त्वाच्या
            नौदल मोहिमा इतिहासात विशेष उल्लेखनीय आहेत.
          </p>

          <p class="text-justify">
          खांदेरी बेटावर किल्ला उभारणे हा शिवाजी महाराजांचा अत्यंत धाडसी निर्णय होता.
            यामुळे इंग्रज व सिद्दी यांच्या संयुक्त आरमाराला मराठ्यांनी पराभूत केले.
          </p>
        </div>

      </div>

      <!-- Conclusion -->
      <div class="mt-12 border-t border-yellow-700 pt-6">
        <p class="font-medium text-lg text-justify">
          In conclusion, the Maratha Navy laid the foundation of India’s indigenous naval
          tradition and remains one of the greatest military achievements of
          Chhatrapati Shivaji Maharaj.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- LEGACY SECTION -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    आरमाराचा चिरंतन वारसा
                </span>
            </h2>
            <p class="text-xl text-gray-600">
                भारतातील स्वदेशी नौदल परंपरेचा पाया
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="royal-card rounded-2xl p-8 text-center">
                <i class="fas fa-ship text-4xl text-red-600 mb-4"></i>
                <h3 class="text-2xl font-bold mb-3">स्वदेशी नौदल</h3>
                <p class="text-gray-600">
                    भारतातील पहिले संघटित व स्वदेशी आरमार म्हणून मराठा नौदलाचा इतिहासात
                    मानाचा स्थान आहे.
                </p>
            </div>

            <div class="royal-card rounded-2xl p-8 text-center">
                <i class="fas fa-fort-awesome text-4xl text-yellow-600 mb-4"></i>
                <h3 class="text-2xl font-bold mb-3">जलदुर्ग धोरण</h3>
                <p class="text-gray-600">
                    समुद्रातील किल्ल्यांद्वारे किनारी संरक्षण ही एक अद्वितीय लष्करी
                    संकल्पना होती.
                </p>
            </div>

            <div class="royal-card rounded-2xl p-8 text-center">
                <i class="fas fa-anchor text-4xl text-green-600 mb-4"></i>
                <h3 class="text-2xl font-bold mb-3">समुद्री स्वातंत्र्य</h3>
                <p class="text-gray-600">
                    स्वराज्याच्या समुद्री सीमा सुरक्षित ठेवून व्यापार आणि जनतेचे
                    संरक्षण करण्यात आले.
                </p>
            </div>
        </div>
    </div>
</section>


<section class="max-w-6xl mx-auto px-4 pb-16">
  <details open class="royal-card bg-[#FFF4D6] border border-yellow-700 rounded-xl p-6">
    <summary class="cursor-pointer text-xl font-bold text-center mb-4 hover:text-maratha">
      📜 View Detailed Historical & Technical Notes
    </summary>

    <div class="mt-6 space-y-4 text-justify">

      <p>
        During Shivaji Maharaj’s reign, the Maratha Navy included approximately
        <strong>640 small and medium vessels</strong> and nearly
        <strong>30 large Gurab warships</strong>. Smaller ships ensured speed and
        flexibility in shallow waters.
      </p>

      <p>
        Gurabs weighed between <strong>200–300 tons</strong> and carried long-range
        cannons. Galbats, though similar in structure, were lighter (70–80 tons) and
        faster.
      </p>

      <p>
        Other ship types included <strong>Shivad, Tarande, Pal, Machwa, Jug, Virkati,
        Dabari, and Mahagiri</strong>, each designed for specific naval operations.
      </p>

      <p>
        Shipyards at <strong>Sindhudurg, Ratnagiri, and coastal Konkan</strong> enabled
        continuous shipbuilding and maintenance. European shipbuilding technology was
        selectively studied but adapted to Indian coastal needs.
      </p>

      <p>
        Two landmark naval events were the <strong>Basrur Sea Campaign (1665)</strong> and
        the <strong>Battle of Khanderi (1679)</strong>. The capture and fortification of
        Khanderi Island, located just eleven miles from Mumbai, directly challenged
        British naval dominance.
      </p>

      <p>
        The Maratha Navy consisted of officers from all communities, reflecting Shivaji
        Maharaj’s inclusive governance and administrative foresight.
      </p>

    </div>
  </details>
</section>


<!-- Information Cards Section -->
<section class="max-w-6xl mx-auto px-4 pb-16">
  <details open class="royal-card bg-[#FFF4D6] border border-yellow-700 rounded-xl p-6">
    <summary class="cursor-pointer text-xl font-bold text-center mb-4 hover:text-maratha">
      📜 सविस्तर ऐतिहासिक व तांत्रिक माहिती पहा
    </summary>

    <div class="mt-6 space-y-4 text-justify">

      <p>
        छत्रपती शिवाजी महाराजांच्या कारकिर्दीत मराठा नौदलामध्ये सुमारे
        <strong>६४० लहान व मध्यम आकाराच्या नौका</strong> तसेच जवळपास
        <strong>३० मोठ्या गुराब युद्धनौका</strong> समाविष्ट होत्या.
        उथळ पाण्यात वेग व चपळता राखण्यासाठी लहान नौका अत्यंत उपयुक्त ठरत होत्या.
      </p>

      <p>
        गुराब या नौकांचे वजन साधारणपणे <strong>२०० ते ३०० टन</strong> इतके असून
        त्यावर लांब पल्ल्याच्या तोफा बसविलेल्या असत. रचनेने समान असलेल्या
        गलबत या नौका मात्र हलक्या (७०–८० टन) व अधिक वेगवान असत.
      </p>

      <p>
        याशिवाय <strong>शिवाड, तरांडे, पाल, माचवा, जुग, विरकटी,
        दाबरी आणि महागिरी</strong> अशा विविध प्रकारच्या नौका नौदलात होत्या,
        ज्या विशिष्ट समुद्री मोहिमांसाठी वापरल्या जात.
      </p>

      <p>
        <strong>सिंधुदुर्ग, रत्नागिरी व कोकण किनारपट्टीवरील</strong> गोदामांमध्ये
        सातत्याने जहाजबांधणी व दुरुस्ती केली जात होती.
        युरोपीय जहाजबांधणी तंत्रज्ञानाचा अभ्यास करून ते भारतीय किनारपट्टीच्या
        गरजेनुसार रूपांतरित करण्यात आले होते.
      </p>

      <p>
        मराठा नौदलाच्या इतिहासातील दोन महत्त्वाच्या घटना म्हणजे
        <strong>बसूर समुद्र मोहिम (१६६५)</strong> आणि
        <strong>खांदेरीचे युद्ध (१६७९)</strong>.
        मुंबईपासून केवळ अकरा मैल अंतरावर असलेल्या खांदेरी बेटाचे किल्लेबांधकाम
        करून इंग्रजांच्या नौदल वर्चस्वाला थेट आव्हान देण्यात आले.
      </p>

      <p>
        मराठा नौदलामध्ये सर्व जाती–धर्मांतील अधिकाऱ्यांचा समावेश होता,
        ज्यातून छत्रपती शिवाजी महाराजांची समावेशक प्रशासनपद्धती
        आणि दूरदृष्टी स्पष्टपणे दिसून येते.
      </p>

    </div>
  </details>
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




