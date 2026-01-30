<?php
// Set page specific variables
$page_title = 'TreKshitiZ विषयी – सह्याद्रीतील ट्रेकिंग व दुर्गसंवर्धन संस्था';

$meta_description = 'TreKshitiZ विषयी जाणून घ्या – महाराष्ट्रातील अग्रगण्य ट्रेकिंग व दुर्गसंवर्धन संस्था. सह्याद्री पर्वतरांगांतील ४०० पेक्षा अधिक किल्ल्यांचे दस्तऐवजीकरण, सुधागड संवर्धन प्रकल्प आणि १०००+ ट्रेकर्सचा सक्रिय समुदाय.';

$meta_keywords = 'TreKshitiZ, ट्रेकिंग संस्था महाराष्ट्र, सह्याद्री किल्ले, दुर्गसंवर्धन, सुधागड प्रकल्प, ट्रेकिंग समुदाय, किल्ले दस्तऐवजीकरण, निसर्ग छायाचित्रण';
// Include header
include './../includes/header_marathi.php';
?>

<style>
        /* About Us specific styles with enhanced design */
        .about-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(127, 176, 105, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .about-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(45, 80, 22, 0.2);
            border-color: var(--accent-color);
        }

        .about-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(127, 176, 105, 0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s;
            opacity: 0;
        }

        .about-card:hover::before {
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

        .project-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .dark .project-card {
            background: var(--surface-dark);
            border-color: var(--dark-border);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(45, 80, 22, 0.15);
            border-color: var(--accent-color);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
            transition: all 0.3s ease;
        }

        .feature-icon:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .stats-counter {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .dark .stats-counter {
            color: var(--accent-color);
        }

        .hero-pattern {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hero-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><polygon points="10,2 18,10 10,18 2,10" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23hero-pattern)"/></svg>');
        }

        .section-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            margin: 0 auto 2rem;
            border-radius: 2px;
        }

        .timeline-item {
            border-left: 3px solid var(--accent-color);
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 0;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: var(--primary-color);
            border: 3px solid var(--accent-color);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            background: rgba(127, 176, 105, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 60%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .testimonial-card {
            background: linear-gradient(135deg, var(--background-light), white);
            border-radius: 1rem;
            padding: 2rem;
            position: relative;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .dark .testimonial-card {
            background: linear-gradient(135deg, var(--surface-dark), var(--background-dark));
            border-color: var(--dark-border);
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(45, 80, 22, 0.1);
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 4rem;
            color: var(--accent-color);
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .stats-counter {
                font-size: 2rem;
            }
            
            .feature-icon {
                width: 60px;
                height: 60px;
            }
            
            .floating-element {
                display: none;
            }
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 1rem;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 1rem;
        }

        .interactive-map {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: 1rem;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .dark .interactive-map {
            background: linear-gradient(135deg, #1e293b, #334155);
        }

        .map-pin {
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--accent-color);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .map-pin:hover {
            transform: scale(1.5);
            background: var(--primary-color);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(127, 176, 105, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(127, 176, 105, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(127, 176, 105, 0);
            }
        }
</style>

<main id="main-content" class="">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary via-secondary to-accent text-white overflow-hidden">
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-5xl mx-auto">
                <div class="flex justify-center mb-4">
                    <!--<div class="w-20 h-1 bg-yellow-300 rounded-full"></div>-->
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="text-yellow-300">TreKshitiZ विषयी</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    महाराष्ट्रातील अग्रगण्य ट्रेकिंग व किल्ले संवर्धन संस्था
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                सह्याद्री पर्वतरांगांमध्ये ट्रेकिंग, दुर्गभ्रमंती आणि ऐतिहासिक किल्ल्यांच्या जतन-संवर्धनासाठी सातत्याने कार्यरत असलेली एक अग्रणी संस्था.
             </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-mountain mr-2"></i>
                        ४०० पेक्षा अधिक किल्ले
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-users mr-2"></i>
                         १००० पेक्षा अधिक ट्रेकर्स
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-calendar mr-2"></i>
                        स्थापना : सन २०००
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">

            <!-- Section Header -->
            <div class="max-w-4xl mx-auto text-center mb-16">
                <div class="section-divider"></div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        आमची वाटचाल
                    </span>
                </h2>
                

                <p class="text-xl text-gray-600 dark:text-gray-300">
                   ट्रेक क्षितिज संस्था, डोंबिवली – क्षितिजाकडे नेणारी एक प्रेरणादायी यात्रा
                </p>

                <p class="mt-2 text-gray-500 italic">
                     दुर्गभ्रमंतीचं स्वप्न आणि क्षितिजाचं आव्हान
                </p>
            </div>

            <!-- Content -->
            <div class="max-w-4xl mx-auto space-y-6 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">

                <p>
                    ट्रेक क्षितिजची सुरुवात चार महाविद्यालयीन मित्रांच्या एका छोट्या उपक्रमातून झाली.
                ट्रेकिंग आणि किल्ल्यांच्या भटकंतीची समान आवड असलेल्या या मित्रांनी सुरुवातीला
                साध्या ट्रेक्सपासून वाटचाल सुरू केली. हळूहळू हीच भटकंती कुतूहल, शिस्त
                आणि ऐतिहासिक वारशाविषयी आदर या मूल्यांवर आधारित एका संघटित चळवळीत रूपांतरित झाली.
                </p>

                <p>
                   सन २००१ मध्ये <strong>प्रमोद जोशीसर</strong> यांच्या मार्गदर्शनाखाली
                डोंबिवलीतील तेरा दुर्गप्रेमींनी
                <em>“दुर्गभ्रमंतीचं स्वप्न, क्षितिजाचं आव्हान”</em>
                या ब्रीदवाक्यासह ‘क्षितिज गट’ औपचारिकरित्या स्थापन केला.
                ट्रेक क्षितिज संस्था ही ट्रेकिंग, दस्तऐवजीकरण
                आणि किल्ले संवर्धनासाठी कार्यरत असलेली नोंदणीकृत सार्वजनिक संस्था (एनजीओ) आहे.
                </p>

                <p>
                    माहितीचे शिस्तबद्ध जतन आणि प्रसार किती आवश्यक आहे हे ओळखून,
                त्या काळात दुर्मिळ असलेल्या डिजिटल दस्तऐवजीकरणाकडे संस्थेने पाऊल टाकले.
                याच वर्षी
                <a href="https://www.trekshitiz.com" target="_blank" rel="noopener"
                   class="text-primary font-semibold hover:underline">
                    www.trekshitiz.com
                </a>
                ही संकेतस्थळ सुरू करण्यात आली.
                मराठीत किल्ल्यांची शास्त्रीय आणि सुसंगत माहिती देणारे हे पहिले व्यासपीठ ठरले.
                आज या संकेतस्थळावर
                <strong>४०० पेक्षा अधिक किल्ल्यांची माहिती</strong>,
                सुमारे <strong>१०,००० छायाचित्रे</strong>,
                संगणकावर तयार केलेले नकाशे,
                ट्रेकिंगसंबंधी मार्गदर्शन आणि उपयुक्त माहिती उपलब्ध आहे.
                </p>

                <p>
                     केवळ माहितीपुरतेच मर्यादित न राहता,
                ट्रेक क्षितिज संस्थेने प्रत्यक्ष वारसा संवर्धनालाही प्राधान्य दिले आहे.
                <strong>सुधागड किल्ला संवर्धन प्रकल्प</strong>
                हा संस्थेचा एक महत्त्वाचा दीर्घकालीन उपक्रम असून,
                गेल्या अनेक वर्षांपासून स्वयंसेवकांनी
                स्वच्छता, वृक्षारोपण, देखभाल
                आणि संवर्धनात्मक कामांमध्ये सातत्याने योगदान दिले आहे.
                </p>

                <p>
                   सामाजिक जबाबदारी हा संस्थेच्या कार्याचा अविभाज्य भाग आहे.
                ट्रेकिंग परिसरातील गावांमध्ये
                शालेय ग्रंथालयांची उभारणी,
                शैक्षणिक सुविधा सुधारणा
                तसेच विद्यार्थ्यांसाठी शैक्षणिक आणि आरोग्यविषयक उपक्रम
                राबविण्यात संस्थेने मोलाची भूमिका बजावली आहे.
                </p>

                <p>
                   सर्जनशील दस्तऐवजीकरणाद्वारे जनजागृती करणे हेही संस्थेचे एक महत्त्वाचे उद्दिष्ट आहे.
                आतापर्यंत
                <strong>२०० पेक्षा अधिक किल्ल्यांवरील स्लाइड शो</strong>,
                छायाचित्र प्रदर्शन,
                विषयानुरूप दिनदर्शिका
                तसेच किल्ल्यांच्या प्रतिकृती बनवण्याच्या स्पर्धा
                आयोजित करून तरुण पिढीला इतिहास आणि पर्यावरणाशी जोडण्याचा प्रयत्न केला आहे.
                </p>

                <p>
                    ट्रेक क्षितिजच्या कार्याची दखल घेत
                <strong>गिरीमित्र संस्था सन्मान</strong>
                आणि <strong>स्वराज्य भूषण पुरस्कार</strong>
                असे विविध सन्मान संस्थेला प्राप्त झाले आहेत.
                विशेषतः किल्ल्यांच्या नकाशा दस्तऐवजीकरणासाठी
                संस्थेच्या प्रकाशन कार्याला राष्ट्रीय पातळीवर मान्यता मिळाली आहे.
                </p>

                <p>
                   आज ट्रेक क्षितिज सह्याद्री पर्वतरांगांमध्ये नियमित ट्रेक्स आयोजित करत असून,
                भौगोलिक आणि ऐतिहासिक अभ्यासासोबत
                प्रत्यक्ष अनुभवाची सांगड घालते.
                इतिहासतज्ज्ञ आणि निसर्ग अभ्यासकांच्या मार्गदर्शनाखाली
                आयोजित विशेष ट्रेक्समुळे
                सहभागी सदस्यांना महाराष्ट्राच्या समृद्ध वारशाची
                सखोल ओळख मिळते.
                </p>

                <p>
                   अनेक महाविद्यालयीन गट कालांतराने विस्कळीत होत असताना,
                ट्रेक क्षितिज मात्र अनुभवसंपन्न सदस्य
                आणि नव्या पिढीच्या सहभागातून
                सातत्याने पुढे जात आहे —
                क्षितिजाच्या दिशेने अखंड वाटचाल करत.
                </p>

            </div>
        </div>
    </section>



    <!-- Our Impact (Compact Version) -->
<section class="py-14 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">

        <!-- Section Header -->
        <div class="text-center mb-10">
            <div class="section-divider mb-4"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-3">
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                     आमचा प्रभाव
                </span>
            </h2>
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-300">
                 आमच्या प्रवासाचा आणि योगदानाचा एक झलक
            </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="350">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    दस्तऐवजीकरण केलेले किल्ले
                </div>
            </div>

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="5000">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    छायाचित्रे
                </div>
            </div>

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="1000">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                   समुदाय सदस्य
                </div>
            </div>

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="24">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    वर्षांची परंपरा
                </div>
            </div>

        </div>
    </div>
</section>


  
  <!-- Major Initiatives & Projects -->
<!-- Major Initiatives & Projects -->
<?php include './our_major_initiatives.php'; ?>


    <!-- Call to Action Section -->
<?php include './our_call_to_actions.php';  ?>    


</main>

<?php include './../includes/footer_marathi.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('About Us page loaded');
    
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.animate-number');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateNumber(counter, target);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => observer.observe(counter));
    }
    
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 25);
    }
    
    // Card Animation on Scroll
    function animateCards() {
        const cards = document.querySelectorAll('.about-card, .project-card, .testimonial-card');
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '50px' });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            cardObserver.observe(card);
        });
    }
    
    // Enhanced Hover Effects
    function setupHoverEffects() {
        const featureIcons = document.querySelectorAll('.feature-icon');
        featureIcons.forEach(icon => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.15) rotate(10deg)';
                this.style.boxShadow = '0 15px 30px rgba(45, 80, 22, 0.3)';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
                this.style.boxShadow = 'none';
            });
        });
        
        // Project cards hover effects
        const projectCards = document.querySelectorAll('.project-card');
        projectCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
                const img = this.querySelector('div[style*="background-image"]');
                if (img) {
                    img.style.transform = 'scale(1.1)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                const img = this.querySelector('div[style*="background-image"]');
                if (img) {
                    img.style.transform = 'scale(1)';
                }
            });
        });
    }
    
    // Interactive Map Functionality
    function setupInteractiveMap() {
        const mapPins = document.querySelectorAll('.map-pin');
        
        mapPins.forEach(pin => {
            pin.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.5)';
                this.style.zIndex = '10';
                
                // Show tooltip
                const tooltip = document.createElement('div');
                tooltip.className = 'absolute bg-gray-800 text-white p-2 rounded text-xs whitespace-nowrap z-20 -top-8 left-1/2 transform -translate-x-1/2';
                tooltip.textContent = this.getAttribute('title');
                this.appendChild(tooltip);
            });
            
            pin.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.zIndex = '1';
                
                // Remove tooltip
                const tooltip = this.querySelector('.absolute');
                if (tooltip) {
                    tooltip.remove();
                }
            });
        });
    }
    
    // Smooth Scrolling for Navigation Links
    function setupSmoothScrolling() {
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
    }
    
    // Parallax Effect for Hero Section
    function setupParallax() {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = scrolled * 0.1;
            
            const heroSection = document.querySelector('section');
            if (heroSection) {
                heroSection.style.transform = `translateY(${parallax}px)`;
            }
        });
    }
    
    // Loading Animation
    function setupLoadingAnimation() {
        const elements = document.querySelectorAll('.animate-fade-in-up');
        elements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(50px)';
            
            setTimeout(() => {
                element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, index * 200);
        });
    }
    
    // Timeline Animation
    function animateTimeline() {
        const timelineItems = document.querySelectorAll('.timeline-item');
        const timelineObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                    timelineObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        timelineItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-30px)';
            item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            timelineObserver.observe(item);
        });
    }
    
    // Statistics Click Interaction
    function setupStatisticsInteraction() {
        const statsCounters = document.querySelectorAll('.stats-counter');
        
        statsCounters.forEach(counter => {
            counter.addEventListener('click', function() {
                this.style.transform = 'scale(1.2)';
                this.style.color = 'var(--accent-color)';
                
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.color = '';
                }, 300);
                
                // Show additional info (could be implemented as modal)
                const value = this.textContent;
                console.log('Clicked stat:', value);
            });
        });
    }
    
    // Testimonial Carousel (if multiple testimonials)
    function setupTestimonialInteraction() {
        const testimonials = document.querySelectorAll('.testimonial-card');
        
        testimonials.forEach(testimonial => {
            testimonial.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.boxShadow = '0 20px 40px rgba(45, 80, 22, 0.15)';
            });
            
            testimonial.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '';
            });
        });
    }
    
    // Error Handling
    function setupErrorHandling() {
        window.addEventListener('error', function(e) {
            console.error('About Us Page Error:', e.error);
        });
    }
    
    // Initialize all functions
    function initializeAll() {
        try {
            animateCounters();
            animateCards();
            setupHoverEffects();
            setupInteractiveMap();
            setupSmoothScrolling();
            setupParallax();
            setupLoadingAnimation();
            animateTimeline();
            setupStatisticsInteraction();
            setupTestimonialInteraction();
            setupErrorHandling();
            
            console.log('About Us: All functionality initialized successfully');
        } catch (error) {
            console.error('Initialization error:', error);
        }
    }
    
    // Run initialization
    initializeAll();
    
    // Performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', function() {
            setTimeout(() => {
                const perfData = performance.getEntriesByType('navigation')[0];
                console.log('About Us Page Load Time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
            }, 0);
        });
    }
});

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Optimized scroll handler
const optimizedScrollHandler = debounce(function() {
    // Handle scroll-based animations with better performance
    const scrollY = window.pageYOffset;
    // Add scroll-based logic here
}, 10);

window.addEventListener('scroll', optimizedScrollHandler);

// Export functions for potential external use
window.AboutUsPage = {
    animateCounters: function() {
        document.querySelectorAll('.animate-number').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateNumber(counter, target);
        });
    }
};

console.log('About Us: Enhanced functionality loaded successfully');
</script>