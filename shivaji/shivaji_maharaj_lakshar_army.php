<?php
// Set page specific variables
$page_title = 'Lakshar Army of Chhatrapati Shivaji Maharaj | Maratha Army & Military System | TrekshitiZ';

$meta_description = 'Detailed information about the Lakshar Army of Chhatrapati Shivaji Maharaj, including the structure of the Maratha army, infantry, cavalry, forts-based defense system, military discipline, and administration that strengthened Swarajya.';

$meta_keywords = 'Lakshar Army, Maratha Army, Shivaji Maharaj army, Maratha military system, Shivaji military administration, infantry cavalry forts, Swarajya army';

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
          Lashkar – Army of Chhatrapati Shivaji Maharaj
        </h1>

        <!-- Subtitle -->
        <p class="text-xl md:text-2xl mb-4 opacity-95">
          Military Organization, Discipline & Strategic Strength of Swarajya
        </p>
        <!-- Tagline -->
         <p class="text-lg md:text-xl mb-8 opacity-85">
         Infantry • Cavalry • Navy • Command Structure
        </p>

        <!-- Key Highlights -->
        <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-coins mr-2"></i>
      Military Discipline
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-ship mr-2"></i>
    Professional Army
            </span>

            <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                <i class="fas fa-balance-scale mr-2"></i>
           Loyalty to Swarajya
            </span>

        

        </div>

    </div>
</div>

</section>


        

<!-- ARMY OF SHIVAJI MAHARAJ : ENGLISH -->
<section class="relative py-16 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4 max-w-6xl">

    <!-- Header -->
    <div class="text-center mb-12">
      <div class="section-indicator"></div>
      <h2 class="text-4xl md:text-5xl font-bold mb-4">
        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
          Military System of Shivaji Maharaj
        </span>
      </h2>
      <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
        Discipline, merit, sacrifice, and people-centric warfare formed the backbone of Swarajya
      </p>
    </div>

    <!-- Main Card -->
    <div class="royal-card bg-[#ECC783] border border-yellow-700 rounded-2xl p-8 space-y-6">

      <p class="text-justify">
        The strength and expansion of the Maratha Empire were rooted in the disciplined
        and morally driven military system established by Chhatrapati Shivaji Maharaj.
        The army was the most crucial pillar of Swarajya — essential for maintaining peace,
        defending the state, and expanding its boundaries.
      </p>

      <p class="text-justify">
        Shivaji Maharaj’s soldiers were united, loyal, and ideologically driven.
        They fought not merely as warriors but as protectors of Swarajya and its people.
      </p>

      <!-- Principles -->
      <h3 class="text-2xl font-semibold border-b border-yellow-700 pb-2">
        Fundamental Military Principles
      </h3>

      <ul class="list-disc pl-6 space-y-2">
        <li>Appointments were strictly based on merit, not lineage.</li>
        <li>Soldiers received regular salaries; no jagirs or land grants were given.</li>
        <li>Women and families were strictly prohibited from accompanying campaigns.</li>
        <li>All war booty had to be deposited into the state treasury.</li>
        <li>Harassment of civilians or forced requisition was strictly forbidden.</li>
      </ul>

      <!-- Army Structure -->
      <h3 class="text-2xl font-semibold border-b border-yellow-700 pb-2 mt-6">
        Structure of the Maratha Army
      </h3>

      <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white/60 rounded-xl p-6 border border-yellow-600">
          <h4 class="font-semibold text-lg mb-2">Infantry</h4>
          <p class="text-sm text-justify">
            The infantry followed a structured hierarchy — Naik, Havaldar, Jumledar,
            Hazari, and Sarnaubat — ensuring strict discipline and accountability.
          </p>
        </div>

        <div class="bg-white/60 rounded-xl p-6 border border-yellow-600">
          <h4 class="font-semibold text-lg mb-2">Cavalry</h4>
          <p class="text-sm text-justify">
            Divided into Bargirs (state-provided horses) and Shiledars (private horses),
            supported by logistical staff like blacksmiths and water carriers.
          </p>
        </div>

        <div class="bg-white/60 rounded-xl p-6 border border-yellow-600">
          <h4 class="font-semibold text-lg mb-2">Navy</h4>
          <p class="text-sm text-justify">
            The naval wing consisted primarily of Koli and Bhandari warriors and was
            commanded by the Daryasarang.
          </p>
        </div>

      </div>

      <p class="text-justify font-medium">
        Shivaji Maharaj personally led his army from the front, sharing risks with his
        soldiers. He never allowed unnecessary casualties and was willing to endanger
        his own life to protect his forces.
      </p>

      <p class="text-justify">
        His leadership inspired unmatched loyalty, enabling the Maratha army to continue
        fighting even after his lifetime.
      </p>

    </div>
  </div>
</section>

<!-- ARCHIVAL / DETAILED NOTES -->
<!-- ARCHIVAL / DETAILED NOTES : ARMY -->
<section class="max-w-6xl mx-auto px-4 pb-20">
  <details open class="royal-card bg-[#FFF4D6] border border-yellow-700 rounded-2xl p-6">
    <summary class="cursor-pointer text-xl font-bold text-center hover:text-maratha">
      📜 View Detailed Historical & Military Notes
    </summary>

    <div class="mt-6 space-y-4 text-justify">

      <p>
        During the reign of Chhatrapati Shivaji Maharaj, the military system of Swarajya
        was built on discipline, merit, and moral conduct. Recruitment was strictly
        based on capability rather than heredity, ensuring efficiency and loyalty
        within the ranks.
      </p>

      <p>
        Soldiers were paid regular salaries, and the practice of granting jagirs or
        personal land holdings was avoided. This ensured that the army remained
        directly loyal to the state rather than to individual commanders.
      </p>

      <p>
        Strict military ethics were enforced. Soldiers were forbidden from harassing
        civilians, forcibly collecting supplies, or harming women and non-combatants.
        Any war booty collected during campaigns was mandatorily deposited into the
        state treasury.
      </p>

      <p>
        The Maratha Army was broadly divided into three wings —
        <strong>Infantry, Cavalry, and Navy</strong>.
        The infantry followed a well-defined hierarchical structure, while the cavalry
        was divided into Bargirs (state horses) and Shiledars (private horses),
        each supported by logistical staff such as water carriers and farriers.
      </p>

      <p>
        Shivaji Maharaj personally led many campaigns, often placing himself at the
        forefront of battle. He never allowed unnecessary loss of life and willingly
        risked his own safety to protect his soldiers.
      </p>

      <p>
        The bond of trust between the king and his army inspired unmatched courage and
        loyalty. This moral strength enabled the Maratha forces to continue resisting
        powerful enemies even after Shivaji Maharaj’s lifetime.
      </p>

    </div>
  </details>
</section>


<?php include 'all_sections_infromation_about_shivaji_maharaj.php'; ?>


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




