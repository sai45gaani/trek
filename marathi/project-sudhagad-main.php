<?php
// Set page specific variables
$page_title = 'प्रकल्प सुधागड | किल्ला संवर्धन | TrekshitiZ';

$meta_description = 'प्रकल्प सुधागड — पालीजवळील ऐतिहासिक सुधागड किल्ल्याचे जतन व संवर्धन करण्यासाठी TrekshitiZ द्वारे राबविण्यात येणारी विशेष मोहीम.';

$meta_keywords = 'प्रकल्प सुधागड, सुधागड किल्ला, किल्ला संवर्धन, TrekshitiZ';

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
                प्रकल्प सुधागड
            </h1>

            <p class="text-xl md:text-2xl text-green-100 mb-6">
                किल्ला संवर्धनाची शेवटची संधी
            </p>

            <p class="text-lg text-green-100/90 leading-relaxed max-w-3xl mx-auto">
                <strong>TreKshitiZ</strong> द्वारे राबविण्यात येणारी ही संवर्धन मोहीम पालीजवळील ऐतिहासिक सुधागड किल्ल्याचे
                अधिक नुकसान होऊ नये यासाठी — हा अमूल्य पुरातत्व व सांस्कृतिक वारसा जतन करण्याचा प्रयत्न.
            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">

                <a href="#sudhagad-join"
                  class="inline-flex items-center px-8 py-3 rounded-full bg-white text-green-800 font-semibold hover:bg-green-100 transition">
                    संवर्धनात सहभागी व्हा
                </a>

                <a href="#sudhagad-media"
                  class="inline-flex items-center px-8 py-3 rounded-full border border-white/70 text-white hover:bg-white/10 transition">
                    मीडिया पाहा
                </a>

            </div>


    </div>
</section>


<section id="sudhagad-media" class="py-20 bg-white dark:bg-gray-900">
  <div class="container mx-auto max-w-6xl px-4">

    <!-- Section Heading -->
    <div class="text-center mb-12">
      <div class="nature-indicator"></div>
      <h2 class="text-3xl md:text-4xl font-bold">
        छायाचित्रांतून सुधागड
      </h2>
    </div>

    <!-- YouTube Video (Centered, Top) -->
    <div class="mb-12 flex justify-center">
      <div class="aspect-video w-full max-w-4xl rounded-2xl overflow-hidden border shadow-sm">
        <iframe
          src="https://www.youtube.com/embed/vyQYL0THnKs"
          class="w-full h-full"
          frameborder="0"
          allowfullscreen>
        </iframe>
      </div>
    </div>

    <!-- Image + Content (Left / Right) -->
    <div class="grid md:grid-cols-2 gap-8 items-center">

      <!-- Image -->
      <div class="nature-card p-6 text-center">
        <img
          src="./../sudhagad/Sudha_darwaja.jpg"
          alt="महादरवाजा, सुधागड किल्ला"
          class="w-full h-auto max-h-[320px] object-contain mx-auto rounded-xl mb-4"
        />
      </div>

      <!-- Content -->
      <div>
        <h3 class="text-3xl font-semibold mb-3">
          महादरवाजा
        </h3>

        <p class="text-gray-600 dark:text-gray-300 text-xl leading-relaxed">
          सुधागड किल्ल्याचा ऐतिहासिक मुख्य प्रवेशद्वार, जे एकेकाळी दरड कोसळल्यामुळे पूर्णपणे बंद झाले होते,
          आणि सध्या संवर्धनाच्या प्रयत्नांद्वारे हळूहळू पुनर्संचयित केले जात आहे.
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
        <h2>प्रकल्प सुधागड म्हणजे काय?</h2>
      </div>

            <p>
            सुधागड हा <strong>पाली</strong>जवळील ऐतिहासिक किल्ला असून पाली हे अष्टविनायक तीर्थक्षेत्र आहे.
            भारताच्या स्वातंत्र्यापर्यंत <em>भोर</em> संस्थानाच्या काळात या किल्ल्याची योग्य देखभाल करण्यात येत होती.
        </p>

        <p class="mt-4">
            मात्र अनेक वर्षांच्या दुर्लक्षामुळे किल्ल्याच्या अनेक बांधकामांना नुकसान झाले.
            या अमूल्य वारशाचे अधिक नुकसान होऊ नये म्हणून <strong>TreKshitiZ</strong> तर्फे
            राबविण्यात येणारी संवर्धन मोहीम म्हणजेच <strong>प्रकल्प सुधागड</strong>.
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
        <h2>सुधागड का?</h2>
      </div>

      <ul class="space-y-4 list-disc pl-6">
    <li>मुंबई आणि आसपासच्या उपनगरांमधून सहज पोहोचता येणारा किल्ला</li>
    <li>किल्ल्याच्या अनेक ऐतिहासिक वास्तू आजही सुस्थितीत आहेत</li>
    <li>पिण्याच्या पाण्याचे मुबलक स्रोत आणि निवाऱ्याची चांगली सोय</li>
    <li>रात्रीच्या संवर्धन आणि ट्रेकिंग उपक्रमांसाठी अत्यंत योग्य</li>
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
              <h2>झीज होण्याची कारणे कोणती?</h2>
            </div>

            <div class="space-y-6">

              <p>
                <strong>वनस्पतींची वाढ:</strong> किल्ल्याच्या भिंतींवर उगवलेली मोठी झाडे मुळांद्वारे प्रचंड दाब टाकतात, त्यामुळे जड दगडी बांधकाम सरकते.
              </p>

              <p>
                <strong>पावसाच्या पाण्यामुळे होणारे नुकसान:</strong> पाण्याचा निचरा अडकल्यामुळे पाणी पायऱ्या आणि भिंतींवरून वाहते, ज्यामुळे धूप वेगाने वाढते.
              </p>

              <p>
                <strong>मानवी हस्तक्षेप:</strong> भित्तीलेखन, कचरा टाकणे आणि निष्काळजी पर्यटनामुळे किल्ल्याच्या रचनेचे मोठ्या प्रमाणावर नुकसान होते.
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
          <h2>आतापर्यंत केलेली कामे</h2>
        </div>

        <ul class="space-y-3 list-disc pl-6">
          <li>झुडपे, निवडुंग आणि लहान झाडे काढून टाकणे</li>
          <li>महादरवाज्यातील माती आणि दगड साफ करणे</li>
          <li>प्लास्टिक कचरा स्वच्छता मोहिमा</li>
          <li>वृक्षारोपण आणि पर्यावरणपूरक उपक्रम</li>
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
        <h2 class="mb-4">आणखी काय करता येईल?</h2>

        <p>
          सुधागड हा विशाल असून ऐतिहासिक वास्तूंनी समृद्ध आहे.
          ट्रेकशित्झने २००४ साली सुरू केलेले कार्य ही केवळ सुरुवात आहे.
        </p>

        <p class="mt-4">
          सातत्यपूर्ण प्रयत्न, आवश्यक साधनसामग्री आणि जनसहभाग यांच्या माध्यमातून
          सुधागडला त्याच्या मूळ वैभवाच्या जवळपास जपता येऊ शकते.
        </p>

        <p class="mt-6 font-semibold text-lg text-green-700">
          तुम्हीच हा बदल घडवू शकता.
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
        <h2 class="mb-4">संवर्धनासाठी सहभागी व्हा</h2>

        <p class="mb-8">
          वेळेत जतन न केल्यास हा अमूल्य पुरातत्व वारसा नष्ट होऊ शकतो.
          सुधागडाच्या संवर्धन चळवळीत सहभागी व्हा.
        </p>

        <a href="./contact-us.php"
          class="inline-flex px-8 py-3 rounded-full bg-green-700 text-white font-semibold hover:bg-green-800 transition">
          सहभागी व्हा
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
       प्रकल्प सुधागड
        </span>
      </h2>
      <p class="text-xl text-gray-600 dark:text-gray-300">
          सुधागड किल्ल्याचे संरक्षण आणि संवर्धनासाठीची उपक्रम योजना
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
              प्रकल्प सुधागड
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              सुधागड किल्ला संवर्धन उपक्रमाचा आढावा.
            </p>

            <span class="text-green-700 font-semibold">
              उघडा <i class="fas fa-arrow-right ml-1"></i>
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
              प्रकल्प रचना
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              संवर्धन प्रकल्पाची रचना आणि कार्यपद्धती.
            </p>

            <span class="text-green-700 font-semibold">
              उघडा <i class="fas fa-arrow-right ml-1"></i>
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
                  आगामी उपक्रम
                </h3>

                <p class="text-sm text-gray-600 mb-6">
                  नियोजित संवर्धन आणि पुनर्संचयित उपक्रम.
                </p>

                <span class="text-green-700 font-semibold">
                  उघडा <i class="fas fa-arrow-right ml-1"></i>
                </span>

              </div>
      </a>


      <!-- Activities Performed -->
      <a href="project-sudhagad-overview.php#sudhagad-activities" class="block focus:outline-none group">
        <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
          
          <div class="w-16 h-16 bg-green-800 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-hands-helping text-white text-2xl"></i>
          </div>
            <h3 class="text-xl font-bold mb-3">
              आतापर्यंत केलेले उपक्रम
            </h3>

            <p class="text-sm text-gray-600 mb-6">
              सुधागडावर आतापर्यंत पूर्ण करण्यात आलेली संवर्धन कामे.
            </p>

            <span class="text-green-700 font-semibold">
              उघडा <i class="fas fa-arrow-right ml-1"></i>
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
            अंमलबजावणी पद्धत
          </h3>

          <p class="text-sm text-gray-600 mb-6">
            प्रकल्पाची कार्यपद्धती आणि अंमलबजावणी प्रक्रिया.
          </p>

          <span class="text-green-700 font-semibold">
            उघडा <i class="fas fa-arrow-right ml-1"></i>
          </span>


        </div>
      </a>


      <!-- Contact Us -->
      <a href="project-sudhagad-overview.php#sudhagad-contacts" class="block focus:outline-none group">
          <div class="nature-card p-6 text-center h-full hover:scale-[1.02] transition-transform">
            
            <div class="w-16 h-16 bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fas fa-user-plus text-white text-2xl"></i>
            </div>
              <h3 class="text-xl font-bold mb-3">
                संपर्क / सहभागी व्हा
              </h3>

              <p class="text-sm text-gray-600 mb-6">
                सुधागड संवर्धन उपक्रमाचा भाग बना.
              </p>

              <span class="text-green-700 font-semibold">
                सहभागी व्हा <i class="fas fa-arrow-right ml-1"></i>
              </span>


          </div>
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