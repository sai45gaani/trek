<?php
// Set page specific variables
$page_title = 'Economic Policy of Shivaji Maharaj | Maratha Economic System | Trekshitz';
$meta_description = 'Detailed information on the economic policies, revenue system, trade relations, and financial administration of Chhatrapati Shivaji Maharaj and the Maratha Empire.';
$meta_keywords = 'Shivaji Maharaj economic policy, Maratha revenue system, Chauth, Sardeshmukhi, Maratha trade policy, Shivaji economy';


// Include header
include './../../includes/header_marathi.php';
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
                छत्रपती शिवाजी महाराजांचे आर्थिक धोरण
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-4 opacity-95">
                मराठा साम्राज्याची आर्थिक प्रशासन व्यवस्था आणि महसूल प्रणाली
            </p>

            <!-- Tagline -->
            <p class="text-lg md:text-xl mb-8 opacity-85">
                व्यापार, करप्रणाली, भूमी महसूल आणि राज्याची अर्थव्यवस्था
            </p>

            <!-- Key Highlights -->
            <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-coins mr-2"></i>
                    भूमी महसूल व्यवस्था
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-ship mr-2"></i>
                    व्यापार आणि जकात कर
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-balance-scale mr-2"></i>
                    करप्रणाली आणि प्रशासन
                </span>

            </div>

        </div>
</div>

</section>


        
<section class="max-w-6xl mx-auto px-4 py-8">
  <div class="bg-[#ECC783] border border-yellow-700 rounded-lg p-6">

    <h2 class="text-3xl font-bold text-center mb-6">
      छत्रपती शिवाजी महाराजांचे आर्थिक धोरण
    </h2>

    <p class="mb-4 text-justify">
      आधुनिक राज्यांमध्ये कर, शुल्क, दंड, सार्वजनिक कर्ज, अनुदाने आणि जकात अशा अनेक उत्पन्न स्रोतांचा वापर केला जातो.
      मात्र सतराव्या शतकात अशी परिस्थिती नव्हती. छत्रपती शिवाजी महाराजांच्या काळात राज्यकारभार व
      लष्करी खर्च भागवण्यासाठी मर्यादित अंतर्गत साधनसंपत्तीवर अवलंबून राहावे लागत होते.
    </p>

    <p class="mb-6 text-justify">
      शिवाजी महाराजांनी अत्यल्प संसाधनांतून नव्याने उभे राहत असलेले छोटे राज्य निर्माण केले.
      तरीही त्यांनी उत्कृष्ट प्रशासकीय कौशल्य आणि आर्थिक शहाणपण दाखवले.
      प्रजेवर अतिरिक्त आर्थिक बोजा न टाकता स्वराज्य मजबूत करणे हे त्यांचे प्रमुख उद्दिष्ट होते.
    </p>

    <!-- Booty & Tribute -->
    <h3 class="text-2xl font-semibold mb-3 border-b border-yellow-700">
      लुट आणि खंडणी
    </h3>

    <p class="mb-4 text-justify">
      मराठा राज्याचा सर्वात महत्त्वाचा उत्पन्न स्रोत म्हणजे लढायांमधून मिळणारी लूट आणि खंडणी होय.
      प्रशासन व संरक्षणासाठी आवश्यक निधी मिळवण्यासाठी शिवाजी महाराजांनी मुघल आणि विजापूरच्या
      आदिलशाही प्रदेशांवर मोहिमा आखल्या.
    </p>

    <p class="mb-4 text-justify">
      अफझलखानावरील विजयातून हत्ती, अरबी घोडे, उंट, मौल्यवान दागिने, सोने, रोख रक्कम,
      शस्त्रास्त्रे आणि लष्करी साहित्य मिळाले.
      ही संपत्ती स्वराज्याच्या विस्तारासाठी अत्यंत उपयुक्त ठरली.
    </p>

    <p class="mb-6 text-justify">
      सुरतची लूट हे याचे महत्त्वाचे उदाहरण आहे. येथे श्रीमंत व्यापाऱ्यांनाच लक्ष्य करण्यात आले.
      स्त्रिया, मुले, गरीब जनता आणि धार्मिक स्थळांचे पूर्ण संरक्षण करण्यात आले.
      मिळालेली संपत्ती केवळ राज्यनिर्मितीसाठी वापरली गेली.
    </p>

    <!-- Land Revenue -->
    <h3 class="text-2xl font-semibold mb-3 border-b border-yellow-700">
      भूमी महसूल व्यवस्था
    </h3>

    <p class="mb-4 text-justify">
      लुटीनंतर सर्वात स्थिर उत्पन्न स्रोत म्हणजे भूमी महसूल होता.
      याला <strong>राजभाग</strong> असे म्हटले जात असे.
      साधारणपणे पिकाच्या उत्पन्नाच्या एक-तृतीयांश किंवा दोन-पंचमांश हिस्सा राज्याचा असे.
    </p>

    <p class="mb-6 text-justify">
      पेशवे अण्णाजी दत्तो यांच्या देखरेखीखाली भूमापन आणि जमिनीचे सर्वेक्षण करण्यात आले.
      मागील तीन वर्षांच्या सरासरी उत्पादनावर महसूल निश्चित केला जात असे,
      ज्यामुळे शेतकऱ्यांचे शोषण टाळले जाई.
    </p>

    <!-- Taxation -->
    <h3 class="text-2xl font-semibold mb-3 border-b border-yellow-700">
      करप्रणाली
    </h3>

    <p class="mb-4 text-justify">
      शिवाजी महाराज कर लावण्यात अत्यंत सावध होते.
      शेतकरी आणि सामान्य जनतेवर कमीत कमी करभार ठेवण्यात आला.
      कर वसुली पाटील, देशमुख यांसारख्या गाव पातळीवरील अधिकाऱ्यांमार्फत केली जात असे.
    </p>

    <ul class="list-disc pl-6 mb-6">
      <li><strong>शासकीय कर:</strong> इनामपट्टी, मिरासपट्टी, देशमुखपट्टी, सरदेशमुखपट्टी</li>
      <li><strong>व्यावसायिक कर:</strong> तेलपट्टी, सराफपट्टी, हेजबट्टी, वेठबेगारी</li>
    </ul>

    <!-- Indirect Taxes -->
    <h3 class="text-2xl font-semibold mb-3 border-b border-yellow-700">
      अप्रत्यक्ष कर आणि जकात
    </h3>

    <p class="mb-4 text-justify">
      जकात कर हा राज्याच्या उत्पन्नाचा महत्त्वाचा घटक होता.
      चौल, दाभोळ, वेंगुर्ला, राजापूर आणि रत्नागिरी ही प्रमुख व्यापारी बंदरे होती.
    </p>

    <p class="mb-6 text-justify">
      आयात-निर्यात मालावर व प्रवास शुल्कावर जकात आकारली जात असे.
      <strong>जकात</strong> हा अत्यंत विश्वासार्ह आणि नियमित उत्पन्नाचा स्रोत होता.
    </p>

    <!-- Other Sources -->
    <h3 class="text-2xl font-semibold mb-3 border-b border-yellow-700">
      इतर उत्पन्न स्रोत
    </h3>

    <ul class="list-disc pl-6 mb-6">
      <li>सरदार, दूत आणि अधीनस्थ राजांकडून मिळणाऱ्या भेटवस्तू व नजराणे</li>
      <li>न्यायालयीन दंड आणि दंडात्मक शुल्क</li>
      <li>नाणे टाकसाळींमधून मिळणारे उत्पन्न</li>
    </ul>

    <p class="text-justify font-medium">
      एकूणच, छत्रपती शिवाजी महाराजांचे आर्थिक धोरण शिस्त, न्याय आणि दूरदृष्टीवर आधारित होते.
      त्यांच्या आर्थिक व्यवस्थेने लष्करी सामर्थ्य वाढवताना जनतेच्या कल्याणाचे संरक्षण केले
      आणि स्वराज्याचा मजबूत पाया घातला.
    </p>

  </div>
</section>




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



