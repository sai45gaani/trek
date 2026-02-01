<?php
// Set page specific variables
$page_title = 'Project Sudhagad | Fort Conservation | TrekshitiZ';
$meta_description = 'Project Sudhagad – a fort conservation initiative by TreKshitiZ to preserve the historic Sudhagad fort near Pali.';
$meta_keywords = 'Project Sudhagad, Sudhagad Fort, Fort Conservation, TrekshitiZ';

// Include header
include './includes/header.php';
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

/* =========================
   Project Sudhagad – Nature Theme
   ========================= */

.nature-indicator {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #166534, #4d7c0f);
    margin: 0 auto 2rem;
}

.nature-card {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(22, 101, 52, 0.25);
    border-radius: 1.25rem;
    transition: all 0.3s ease;
}

.dark .nature-card {
    background: rgba(17, 24, 39, 0.9);
    border-color: rgba(74, 222, 128, 0.25);
}

.nature-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 35px rgba(22, 101, 52, 0.15);
}

.nature-gradient {
    background: linear-gradient(135deg, #166534, #4d7c0f);
}

html {
    scroll-behavior: smooth;
}

@media (max-width: 768px) {
    .hero-slider {
        height: 70vh;
    }
}

.section-sudhagad {
  padding: 5rem 0;
}

.section-sudhagad h2 {
  font-size: 2rem;
  font-weight: 700;
}

.section-sudhagad p {
  font-size: 1.05rem;
  line-height: 1.75;
}

.nature-card {
  background: linear-gradient(180deg, #ffffff, #f7fbf7);
  border: 1px solid rgba(16, 185, 129, 0.15);
  border-radius: 1.5rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.nature-card h2 {
  font-size: 1.75rem;
  font-weight: 700;
}

.nature-card p,
.nature-card li {
  font-size: 1.05rem;
  line-height: 1.75;
}


</style>
<main id="main-content" class="">


<!-- Project Sudhagad – Hero Section -->
<section id="sudhagad-overview"
         class="relative pt-32 pb-24 bg-gradient-to-br from-green-800 via-green-700 to-emerald-600 text-white overflow-hidden">

    <!-- Subtle Nature Texture -->
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.25),transparent_70%)]"></div>

    <div class="container mx-auto max-w-5xl px-4 relative z-10 text-center">

        <div class="nature-indicator bg-white/70"></div>

        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Project Sudhagad
        </h1>

        <p class="text-xl md:text-2xl text-green-100 mb-6">
            Last Chance of Fort Conservation
        </p>

        <p class="text-lg text-green-100/90 leading-relaxed max-w-3xl mx-auto">
            A conservation initiative by <strong>TreKshitiZ</strong> to prevent further
            deterioration of the historic Sudhagad Fort near Pali — an invaluable
            archaeological and cultural heritage.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">

            <a href="#sudhagad-join"
               class="inline-flex items-center px-8 py-3 rounded-full bg-white text-green-800 font-semibold hover:bg-green-100 transition">
                Join the Conservation
            </a>

            <a href="#sudhagad-media"
               class="inline-flex items-center px-8 py-3 rounded-full border border-white/70 text-white hover:bg-white/10 transition">
                View Media
            </a>

        </div>

    </div>
</section>


<section id="sudhagad-media" class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto max-w-6xl px-4">

    <div class="text-center mb-12">
      <div class="nature-indicator"></div>
      <h2 class="text-3xl md:text-4xl font-bold">
        Sudhagad Through Visuals
      </h2>
    </div>

    <div class="grid md:grid-cols-2 gap-8 items-center">

      <!-- YouTube Video -->
      <div class="aspect-video rounded-2xl overflow-hidden border shadow-sm">
        <iframe
          src="https://www.youtube.com/embed/vyQYL0THnKs"
          class="w-full h-full"
          frameborder="0"
          allowfullscreen>
        </iframe>
      </div>

      <!-- Maha Darwaza Image -->
      <div class="nature-card p-6 text-center">
        <img
          src="./sudhagad/Sudha_darwaja.jpg"
          alt="Maha Darwaza of Sudhagad Fort"
          class="w-full h-auto max-h-[320px] object-contain mx-auto rounded-xl mb-4"
        />

        <h3 class="text-xl font-semibold mb-2">
          Maha Darwaza
        </h3>

        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
          The historic main entrance of Sudhagad Fort, which was once completely
          blocked due to landslides and is now being gradually restored through
          conservation efforts.
        </p>
      </div>

    </div>
  </div>
</section>



<section id="sudhagad-what" class="py-20 bg-white">
  <div class="container mx-auto max-w-5xl px-4">

    <div class="nature-card p-10">

      <div class="flex items-center gap-4 mb-6">
        <div class="w-14 h-14 bg-green-700 rounded-full flex items-center justify-center">
          <i class="fas fa-leaf text-white text-xl"></i>
        </div>
        <h2>What is Project Sudhagad?</h2>
      </div>

      <p>
        Sudhagad is a historic fort near <strong>Pali</strong>, an Ashtavinayaka
        pilgrimage town. It remained well maintained under the princely state
        of <em>Bhor</em> until India’s independence.
      </p>

      <p class="mt-4">
        Over decades of neglect, many fortifications suffered damage.
        <strong>Project Sudhagad</strong> is a conservation initiative by
        <strong>TreKshitiZ</strong> to prevent further deterioration of this
        priceless heritage.
      </p>

    </div>

  </div>
</section>

<section id="sudhagad-why" class="py-10 bg-green-50">
  <div class="container mx-auto max-w-5xl px-4">

    <div class="nature-card p-10">

      <div class="flex items-center gap-4 mb-6">
        <div class="w-14 h-14 bg-lime-700 rounded-full flex items-center justify-center">
          <i class="fas fa-mountain text-white text-xl"></i>
        </div>
        <h2>Why Sudhagad?</h2>
      </div>

      <ul class="space-y-4 list-disc pl-6">
        <li>Easy accessibility from Mumbai and nearby suburbs</li>
        <li>Large portion of fort structures still intact</li>
        <li>Abundant water sources and shelter</li>
        <li>Ideal for overnight conservation activities</li>
      </ul>

    </div>

  </div>
</section>

<section id="sudhagad-damage" class="py-10 bg-white">
  <div class="container mx-auto max-w-5xl px-4">

    <div class="nature-card p-10">

      <div class="flex items-center gap-4 mb-8">
        <div class="w-14 h-14 bg-emerald-700 rounded-full flex items-center justify-center">
          <i class="fas fa-exclamation-triangle text-white text-xl"></i>
        </div>
        <h2>What is Causing Deterioration?</h2>
      </div>

      <div class="space-y-6">

        <p>
          <strong>Vegetation Growth:</strong> Large trees growing on fort walls
          exert massive pressure through roots, displacing heavy stone blocks.
        </p>

        <p>
          <strong>Rainwater Damage:</strong> Blocked drainage systems force water
          to flow over steps and walls, accelerating erosion.
        </p>

        <p>
          <strong>Human Interference:</strong> Graffiti, littering, and careless
          tourism contribute significantly to structural damage.
        </p>

      </div>

    </div>

  </div>
</section>

<section id="sudhagad-work" class="py-10 bg-green-50">
  <div class="container mx-auto max-w-5xl px-4">

    <div class="nature-card p-10">

      <div class="flex items-center gap-4 mb-6">
        <div class="w-14 h-14 bg-green-800 rounded-full flex items-center justify-center">
          <i class="fas fa-hands-helping text-white text-xl"></i>
        </div>
        <h2>Work Done So Far</h2>
      </div>

      <ul class="space-y-3 list-disc pl-6">
        <li>Removal of shrubs, cactus, and small trees</li>
        <li>Clearing soil and rocks from Maha Darwaza</li>
        <li>Plastic waste cleanup drives</li>
        <li>Plantation and environmental activities</li>
      </ul>

    </div>

  </div>
</section>

<section id="sudhagad-future" class="py-10 bg-white">
  <div class="container mx-auto max-w-5xl px-4">

    <div class="nature-card p-10 text-center">

      <div class="w-16 h-16 bg-teal-700 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="fas fa-seedling text-white text-2xl"></i>
      </div>

      <h2 class="mb-4">What More Can Be Done?</h2>

      <p>
        Sudhagad is vast and rich in historic structures.
        What TreKshitiZ started in 2004 is only the beginning.
      </p>

      <p class="mt-4">
        With sustained effort, resources, and public participation,
        Sudhagad can be preserved close to its original glory.
      </p>

      <p class="mt-6 font-semibold text-lg text-green-700">
        YOU can make the difference.
      </p>

    </div>

  </div>
</section>

<section id="sudhagad-join" class="py-12 bg-green-50">
  <div class="container mx-auto max-w-4xl px-4">

    <div class="nature-card p-10 text-center bg-white">

      <div class="w-16 h-16 bg-green-700 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="fas fa-user-plus text-white text-2xl"></i>
      </div>

      <h2 class="mb-4">Join the Conservation</h2>

      <p class="mb-8">
        A priceless archaeological heritage will be lost if not saved in time.
        Be part of the movement to preserve Sudhagad.
      </p>

      <a href="./contact-us.php"
         class="inline-flex px-8 py-3 rounded-full bg-green-700 text-white font-semibold hover:bg-green-800 transition">
        Get Involved
      </a>

    </div>

  </div>
</section>

<section class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto px-4">

    <!-- Header -->
    <div class="text-center mb-16">
      <div class="nature-indicator"></div>
      <h2 class="text-4xl md:text-5xl font-bold mb-6">
        <span class="text-green-700 dark:text-green-400">
          Project Sudhagad
        </span>
      </h2>
      <p class="text-xl text-gray-600 dark:text-gray-300">
        Conservation initiative to protect and preserve Sudhagad Fort
      </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Project Sudhagad -->
      <a href="#sudhagad-overview" class="block focus:outline-none">
        <div class="nature-card p-6 text-center hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-green-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-leaf text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
            Project Sudhagad
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            Overview of the Sudhagad fort conservation initiative.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
          </span>

        </div>
      </a>


      <!-- Project Structure -->
      <a href="project-sudhagad-overview.php#sudhagad-structure" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-lime-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-sitemap text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
            Project Structure
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            How the conservation project is structured and organized.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
          </span>

        </div>
      </a>


            <!-- Future Activities -->
            <a href="project-sudhagad-overview.php#sudhagad-future" class="block focus:outline-none group">
              <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
                
                <div class="w-16 h-16 bg-teal-700 rounded-full flex items-center justify-center mx-auto mb-6">
                  <i class="fas fa-seedling text-white text-2xl"></i>
                </div>

                <h3 class="text-xl font-bold mb-3">
                  Future Activities
                </h3>

                <p class="text-sm text-gray-600 mb-6">
                  Planned conservation and restoration activities.
                </p>

                <span class="text-green-700 font-semibold">
                  Open <i class="fas fa-arrow-right ml-1"></i>
                </span>

              </div>
      </a>


      <!-- Activities Performed -->
      <a href="project-sudhagad-overview.php#sudhagad-work" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-green-800 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-hands-helping text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
            Activities Performed
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            Conservation work completed so far at Sudhagad.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
          </span>

        </div>
      </a>


      <!-- How Executed -->
      <a href="project-sudhagad-overview.php#sudhagad-execution" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-emerald-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-cogs text-white text-2xl"></i>
          </div>

          <h3 class="text-xl font-bold mb-3">
            How Executed
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            Methodology and execution process of the project.
          </p>

          <span class="text-green-700 font-semibold">
            Open <i class="fas fa-arrow-right ml-1"></i>
          </span>

        </div>
      </a>


      <!-- Contact Us -->
      <a href="project-sudhagad-overview.php#sudhagad-future" class="block focus:outline-none group">
          <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
            
            <div class="w-16 h-16 bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fas fa-user-plus text-white text-2xl"></i>
            </div>

            <h3 class="text-xl font-bold mb-3">
              Contact / Join
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              Be part of the Sudhagad conservation initiative.
            </p>

            <span class="text-green-700 font-semibold">
              Join <i class="fas fa-arrow-right ml-1"></i>
            </span>

          </div>
      </a>


    </div>
  </div>
</section>



</main>

<?php include './includes/footer.php'; ?>

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