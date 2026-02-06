<?php
// Set page specific variables

$page_title = 'छत्रपती शिवाजी महाराजांची गीते व काव्य | शिवगीते | Trekshitz';
$meta_description = 'छत्रपती शिवाजी महाराजांवरील प्रेरणादायी आरती, पोवाडे, भक्तिगीते व काव्य यांचा संग्रह.';
$meta_keywords = 'शिवाजी महाराज गीते, शिवगीते, पोवाडे, शिवाजी कविता, शिवभक्ती गीत';



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
        छत्रपती शिवाजी महाराजांची गीते व काव्य
      </h1>

      <!-- Subtitle -->
      <p class="text-xl md:text-2xl mb-4 opacity-95">
       प्रेरणादायी आरती, पोवाडे व भक्तिगीते
      </p>

      <!-- Tagline -->
      <p class="text-lg md:text-xl mb-8 opacity-85">
        आरती • पोवाडा • काव्य • शिवभक्ती
      </p>

      <!-- Key Highlights -->
      <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

                    <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur font-devanagari">
            <i class="fas fa-music mr-2"></i>
            भक्तिगीते
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur font-devanagari">
            <i class="fas fa-feather-alt mr-2"></i>
            पोवाडे व काव्य
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur font-devanagari">
            <i class="fas fa-book-open mr-2"></i>
            साहित्यिक गौरव
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
                        छत्रपती शिवाजी महाराजांवरील गीते व कविता
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    छत्रपती शिवाजी महाराजांचे जीवन, शौर्य, पराक्रम आणि अमर वारसा साजरा करणाऱ्या
                    प्रेरणादायी आरत्या, पोवाडे, कविता आणि भक्तिगीतांचा संग्रह
                </p>
            </div>



            <!-- Content Card -->
   <div class="royal-card bg-[#ECC783] border border-yellow-700 rounded-2xl p-10 max-w-5xl mx-auto font-devanagari">

      <ul class="space-y-4 text-lg">

        <li>1. <a href="Shivaji-Maharaj-Aarti.htm">श्री शिवाजी महाराजांची आरती</a></li>
        <li>2. <a href="SherShiva-Ka-Chhava-Tha-Shivaji-Geet.htm">शेर शिवा का छावा था</a></li>
        <li>3. <a href="Shur-Aamhi-Sardar-Shivaji-Geet.htm">शूर आम्ही सरदार</a></li>
        <li>4. <a href="Pratapshali-Shiv-Samtrata-Shivaji-Geet.htm">प्रतापशाली शिवसम्राट</a></li>
        <li>5. <a href="Mawla-Song-Aami-Dongarche-Rahanar-Shivaji.htm">आम्ही डोंगरचे राहणार</a></li>
        <li>6. <a href="Rani-Fadakati-Lakho-Zende-Shivaji-Geet.htm">रणी फडकती लाखो झेंडे</a></li>
        <li>7. <a href="Shivaji-Prayer-Song-Hindu-Nrusinha.htm">हे हिंदुनृसिंहा प्रभो</a></li>
        <li>8. <a href="He-Raigadche-kade-Shivaji-Geet.htm">हे रायगडचे कडे</a></li>
        <li>9. <a href="Jai-bhavani-Shivaji-Geet.htm">जय भवानी जय शिवराय</a></li>
        <li>10. <a href="Vijapurcha-Sardar-Letter-From-Ramdas-to-Shivaji.htm">अफजलखान निघाला – सन १६५९</a></li>
        <li>11. <a href="Nishchyacha-Mahameru-Shivaji-Geet.htm">निश्चयाचा महामेरू</a></li>
        <li>12. <a href="Vedaat-Marathe-Veer-Doudale-Saat-Shivaji-Geet.htm">वेडात मराठे वीर</a></li>
        <li>13. <a href="Sarnar-Kadhi-Ran-Shivaji-Geet.htm">सरणार कधी रण</a></li>
        <li>14. <a href="Trivar-JayJayKar-Shivaji-Geet.htm">त्रिवार जयजयकार</a></li>
        <li>15. <a href="Kavi-Bhushan-Poems-on-Shivaji.htm">कवी भूषण</a></li>
        <li>16. <a href="Vaghachya-Jabdyat-Ghaluni-Haat-Shivaji-Geet.htm">वाघाच्या जबड्यात</a></li>
        <li>17. <a href="Shiv-Gaan-Shivaji-Geet.htm">शिवगान</a></li>
        <li>18. <a href="Kesari-Guhesamip-matta-hatti-Shivaji-Geet.htm">केसरी गुहेसमीप</a></li>

      </ul>

    </div>
  </div>
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




