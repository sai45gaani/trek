<?php
// Set page specific variables
$page_title = 'होर्हखाते – छत्रपती शिवाजी महाराजांचे गुप्तचर खाते | Trekshitz';
$meta_description = 'छत्रपती शिवाजी महाराजांच्या गुप्तचर खात्याची (होर्हखाते) सविस्तर माहिती, त्याची रचना, कार्यपद्धती व ऐतिहासिक महत्त्व.';
$meta_keywords = 'होर्हखाते, शिवाजी महाराज गुप्तचर, मराठा गुप्तहेर व्यवस्था';


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
           होर्हखाते – गुप्तचर व्यवस्था
        </h1>

        <!-- Subtitle -->
        <p class="text-xl md:text-2xl mb-4 opacity-95">
          स्वराज्याच्या सुरक्षेचा कणा
        </p>
        <!-- Tagline -->
         <p class="text-lg md:text-xl mb-8 opacity-85">
         गुप्तहेर • कूटनीती • मानसिक युद्ध
        </p>

        <!-- Key Highlights -->
        <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-coins mr-2"></i>
   गुप्तचर जाळे
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-ship mr-2"></i>
    हेरगिरी
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-balance-scale mr-2"></i>
          धोरणात्मक प्रशासन
            </span>

        

        </div>

    </div>
</div>

</section>


        

<!-- MODERN MAIN CONTENT : MARATHI -->
<section class="relative py-16 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4 max-w-6xl">

    <!-- Section Header -->
    <div class="text-center mb-12">
      <div class="section-indicator"></div>
      <h2 class="text-4xl md:text-5xl font-bold mb-4">
        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
          स्वराज्याचे हेरखाते
        </span>
      </h2>
      <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
        छत्रपती शिवाजी महाराजांचे अत्यंत गोपनीय, प्रभावी व गतिमान गुप्तचर तंत्र
      </p>
    </div>

    <!-- Content Card -->
    <div class="royal-card bg-[#ECC783] border border-yellow-700 rounded-2xl p-8 space-y-6">

      <p class="text-justify">
        अफजलखानाचा वध, सुरतची लूट, शाइस्तेखानाशी झालेली झुंज अशा घटनांवरून
        छत्रपती शिवाजी महाराजांचे <strong>हेरखाते किती प्रभावी</strong> होते,
        हे स्पष्टपणे दिसून येते. या खात्याचे कार्य अत्यंत गोपनीय स्वरूपाचे
        असल्याने त्यासंबंधी सविस्तर नोंदी फारच दुर्मीळ आहेत.
      </p>

      <p class="text-justify">
        हेरखात्यातील फारच थोडी नावे इतिहासात ज्ञात आहेत. त्यामध्ये
        <strong>बहिर्जी नाईक</strong> हे नाव विशेष उल्लेखनीय असून त्यांनी
        गुप्त माहिती संकलन व मोहिमांमध्ये मोलाची भूमिका बजावली.
      </p>

      <!-- Grid Sections -->
      <div class="grid md:grid-cols-3 gap-6 pt-6">

        <!-- Spy Network -->
        <div class="bg-white/60 rounded-xl p-6 border border-yellow-600">
          <h3 class="text-xl font-semibold mb-3 text-maratha flex items-center">
            <i class="fas fa-eye mr-2"></i>
            हेरांचे प्रमुख कार्य
          </h3>
          <p class="text-sm text-justify">
            शत्रूंची हालचाल, मोहिमेचे मार्ग, वेळापत्रक, अंतर्गत संघर्ष,
            सैन्याची तयारी व योजना यांची अचूक माहिती मिळविणे हे हेरांचे
            मुख्य कार्य होते. कोणतीही मोठी मोहीम हाती घेण्यापूर्वी
            ही माहिती महाराजांपर्यंत पोहोचवली जात असे.
          </p>
        </div>

        <!-- Espionage -->
        <div class="bg-white/60 rounded-xl p-6 border border-yellow-600">
          <h3 class="text-xl font-semibold mb-3 text-maratha flex items-center">
            <i class="fas fa-user-secret mr-2"></i>
            गुप्तहेरगिरी व प्रतिहेरगिरी
          </h3>
          <p class="text-sm text-justify">
            महाराजांचे हेर शत्रूंच्या गोटात खोलवर जाऊन प्रत्यक्ष माहिती
            मिळवत असत. अफजलखान भेट, शाइस्तेखान प्रकरण तसेच
            कर्तलबखानाविरुद्ध झालेल्या अंबरखिंडच्या लढाईत
            ही माहिती निर्णायक ठरली.
          </p>
        </div>

        <!-- Diplomacy -->
        <div class="bg-white/60 rounded-xl p-6 border border-yellow-600">
          <h3 class="text-xl font-semibold mb-3 text-maratha flex items-center">
            <i class="fas fa-handshake mr-2"></i>
            मुत्सद्देगिरी म्हणजेच हेरगिरी
          </h3>
          <p class="text-sm text-justify">
            <strong>सोनोपंत डबीर</strong> व <strong>पंताजी गोपीनाथ</strong> यांसारखे
            मुत्सद्दी दूत हे राजनैतिक बोलणी करतानाच हेरगिरीचेही कार्य
            पार पाडत असत. शत्रूंच्या गोटात फूट पाडणे व परिस्थिती
            स्वराज्याच्या बाजूने वळवणे हे त्यांचे उद्दिष्ट असे.
          </p>
        </div>

      </div>

      <p class="font-medium text-justify pt-4">
        स्वराज्याचे हेरखाते हे एखाद्या ठराविक चौकटीत अडकलेले नसून
        परिस्थितीनुसार कार्य करणारे, लवचिक व अत्यंत बुद्धिमान तंत्र होते —
        त्या काळातील एक अद्वितीय गुप्तचर व्यवस्था.
      </p>

    </div>
  </div>
</section>

<!-- ARCHIVAL / DETAILED NOTES -->
<section class="max-w-6xl mx-auto px-4 pb-20">
  <details open class="royal-card bg-[#FFF4D6] border border-yellow-700 rounded-2xl p-6">
    <summary class="cursor-pointer text-xl font-bold text-center hover:text-maratha">
      📜 सविस्तर ऐतिहासिक व धोरणात्मक नोंदी पहा
    </summary>

    <div class="mt-6 space-y-4 text-justify">
      <p>
        छत्रपती शिवाजी महाराज आपल्या हेरांवर पूर्ण विश्वास ठेवत असत.
        उपयुक्त माहिती मिळाल्यास त्वरित बक्षीस दिले जाई; मात्र
        निष्काळजीपणा किंवा चुकीची माहिती दिल्यास कठोर शिक्षा होत असे.
      </p>

      <p>
        शत्रूंना गोंधळात टाकण्यासाठी जाणीवपूर्वक अफवा पसरविण्याची
        रणनीती वापरण्यात आली. बसूरच्या सागरी मोहिमेदरम्यान
        हा मानसशास्त्रीय डाव अत्यंत प्रभावी ठरला.
      </p>

      <p>
        परिस्थितीनुसार सतत बदलणारे हे हेरखाते शत्रूंना ओळखणे
        व त्यावर उपाययोजना करणे अत्यंत अवघड ठरत असे.
      </p>
    </div>
  </details>
</section>




<!-- Information Cards Section -->
<?php include 'all_sections_infromation_about_shivaji_maharaj.php'; ?>



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
                काळाच्या पलीकडे जाणारी प्रेरणा — छत्रपती शिवाजी महाराजांचे विचार आणि आदर्श आजही जिवंत आहेत
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
                    छत्रपती शिवाजी महाराजांनी मांडलेली स्वराज्याची क्रांतिकारी कल्पना पुढे भारताच्या स्वातंत्र्य चळवळीचा भक्कम पाया ठरली.
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
                    सर्व धर्मांप्रती आदर, सलोखा आणि समानतेवर आधारित धर्मनिरपेक्ष शासनपद्धतीमुळे साम्राज्यात ऐक्य आणि परस्पर सन्मान टिकून राहिला.
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
                    जनतेचे हित हेच राज्यकर्त्याचे सर्वोच्च कर्तव्य मानणारी शासनव्यवस्था — जी आजच्या लोकशाही मूल्यांनाही प्रेरणा देते.
                </p>
            </div>

        </div>
    </div>
</section>



</main>

<?php include './../../includes/footer_marathi.php'; ?>

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




