<?php
// Set page specific variables
$page_title = 'About TreKshitiZ - Explore Sahyadri Mountains | Trekking Community';
$meta_description = 'Learn about TreKshitiZ.com - Maharashtra\'s premier trekking website. Discover our mission, projects like Sudhagad conservation, and join our community of 1000+ trekkers exploring 350+ forts.';
$meta_keywords = 'About TreKshitiZ, Maharashtra trekking, Sahyadri forts, fort conservation, Sudhagad project, trekking community, nature photography';

// Include header
include './includes/header.php';
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
                    <span class="text-yellow-300">About TreKshitiZ</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Maharashtra's Premier Trekking & Fort Conservation Community
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    A leading organization for trekking and fort conservation in the Sahyadri mountain range.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-mountain mr-2"></i>
                        350+ Forts
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-users mr-2"></i>
                        1000+ Trekkers
                    </span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                        <i class="fas fa-calendar mr-2"></i>
                        Since 2000
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
                        Our Story
                    </span>
                </h2>
                

                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Trek Kshitij Sanstha, Dombivli – A Journey Towards the Horizon
                </p>

                <p class="mt-2 text-gray-500 italic">
                    The Challenge of Dream Fort Exploration
                </p>
            </div>

            <!-- Content -->
            <div class="max-w-4xl mx-auto space-y-6 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">

                <p>
                    Trek Kshitij began as a small initiative among four college friends who shared a passion for
                    trekking and fort exploration. What started as casual treks gradually evolved into a
                    structured movement driven by curiosity, discipline, and respect for heritage.
                </p>

                <p>
                    In 2001, under the guidance of <strong>Pramod Joshisar</strong>, a group of thirteen trekking
                    enthusiasts from Dombivli formally established the Kshitij Group with the guiding motto:
                    <em>“Dream of Fort Wandering, Challenge of Kshitij.”</em>
                    Trek Kshitij Sanstha is a registered Public Trust (NGO) dedicated to trekking, documentation,
                    and fort conservation.
                </p>

                <p>
                    Recognizing the importance of structured knowledge sharing, the group ventured into digital
                    documentation at a time when such initiatives were rare. In the same year,
                    <a href="https://www.trekshitiz.com" target="_blank" rel="noopener"
                    class="text-primary font-semibold hover:underline">
                        www.trekshitiz.com
                    </a>
                    was launched, becoming the first platform to provide systematic fort information in Marathi.
                    Over time, the website expanded to include information on more than
                    <strong>350 forts</strong>, nearly <strong>10,000 photographs</strong>,
                    computer-generated maps, trekking resources, and travel guidance.
                </p>

                <p>
                    Beyond documentation, Trek Kshitij actively works toward heritage awareness and conservation.
                    One of its most significant long-term initiatives is the conservation effort at
                    <strong>Sudhagad Fort</strong>, where volunteers have continuously contributed through
                    cleaning, plantation, maintenance, and restoration support for over a decade.
                </p>

                <p>
                    Social responsibility forms an integral part of the organization’s philosophy. Trek Kshitij
                    has supported educational initiatives in villages near trekking regions by developing school
                    libraries, improving infrastructure, and organizing educational and health programs for
                    students.
                </p>

                <p>
                    Creative documentation has also played a major role in spreading awareness. The organization
                    has produced over <strong>200 fort-related slide shows</strong>, organized photo exhibitions,
                    published themed calendars, and conducted fort model-making competitions to engage younger
                    generations in heritage and environmental awareness.
                </p>

                <p>
                    Trek Kshitij’s contributions have been recognized through several honors, including the
                    <strong>Girimitra Sanstha Samman</strong> and the
                    <strong>Swarajya Bhushan Puraskar</strong>. Its publication efforts, particularly fort map
                    documentation, have received national-level recognition.
                </p>

                <p>
                    Today, Trek Kshitij continues to organize regular treks across the Sahyadri range, combining
                    physical exploration with historical and geographical learning. Special treks led by
                    historians and naturalists offer participants deeper insights into Maharashtra’s rich
                    heritage.
                </p>

                <p>
                    While many college-based trekking groups dissolve over time, Trek Kshitij continues its
                    journey with strength and purpose — carried forward by both experienced members and new
                    generations, steadily moving toward the horizon.
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
                    Our Impact
                </span>
            </h2>
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-300">
                A snapshot of our journey and contribution
            </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="350">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Forts Documented
                </div>
            </div>

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="5000">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Photographs
                </div>
            </div>

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="1000">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Community Members
                </div>
            </div>

            <div class="text-center">
                <div class="stats-counter animate-number text-3xl md:text-4xl" data-target="24">0</div>
                <div class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Years of Legacy
                </div>
            </div>

        </div>
    </div>
</section>


  
  <!-- Major Initiatives & Projects -->
<!-- Major Initiatives & Projects -->
<section class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">

        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="section-divider"></div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                    Our Major Initiatives
                </span>
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                Key initiatives undertaken by Trek Kshitij Sanstha in the areas of fort conservation,
                trekking, documentation, education, and community development.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Sudhagad Project -->
            <div class="project-card group">
                <div class="h-40 bg-cover bg-center rounded-t-xl"
                     style="background-image:url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="p-5">
                    <span class="inline-block mb-2 text-xs font-semibold text-red-700 bg-red-100 px-3 py-1 rounded-full">
                        Conservation
                    </span>
                    <h3 class="text-lg font-bold mb-2">Project Sudhagad</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        A long-running fort conservation initiative at Sudhagad near Pali, focusing on
                        restoration, cleaning, plantation, and heritage protection.
                    </p>
                    <a href="/about/sudhagad-project" class="text-sm font-semibold text-primary hover:text-accent">
                        Learn more →
                    </a>
                </div>
            </div>

            <!-- Trekking Activities -->
            <div class="project-card group">
                <div class="h-40 bg-cover bg-center rounded-t-xl"
                     style="background-image:url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="p-5">
                    <span class="inline-block mb-2 text-xs font-semibold text-green-700 bg-green-100 px-3 py-1 rounded-full">
                        Adventure
                    </span>
                    <h3 class="text-lg font-bold mb-2">Trekking Activities</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Regular fort treks, educational heritage walks, and expert-led explorations across
                        the Sahyadri mountain range.
                    </p>
                    <a href="/about/trekking-activities" class="text-sm font-semibold text-primary hover:text-accent">
                        View activities →
                    </a>
                </div>
            </div>

            <!-- Slide Shows -->
            <div class="project-card group">
                <div class="h-40 bg-cover bg-center rounded-t-xl"
                    style="background-image:url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
           <div class="p-5">
                    <span class="inline-block mb-2 text-xs font-semibold text-blue-700 bg-blue-100 px-3 py-1 rounded-full">
                        Documentation
                    </span>
                    <h3 class="text-lg font-bold mb-2">Slide Shows</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        More than 200 educational slide shows showcasing forts, history, trekking routes,
                        and natural heritage.
                    </p>
                    <a href="/about/slide-shows" class="text-sm font-semibold text-primary hover:text-accent">
                        Explore →
                    </a>
                </div>
            </div>

            <!-- Photography & Sketches -->
            <div class="project-card group">
                <div class="h-40 bg-cover bg-center rounded-t-xl"
                     style="background-image:url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="p-5">
                    <span class="inline-block mb-2 text-xs font-semibold text-purple-700 bg-purple-100 px-3 py-1 rounded-full">
                        Art & Media
                    </span>
                    <h3 class="text-lg font-bold mb-2">Photography & Sketches</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        A rich archive of fort photography, hand-drawn sketches, and visual documentation
                        created by Trek Kshitij members.
                    </p>
                    <a href="/about/photography-sketches" class="text-sm font-semibold text-primary hover:text-accent">
                        View collection →
                    </a>
                </div>
            </div>

            <!-- Publications & Maps -->
            <div class="project-card group">
                <div class="h-40 bg-cover bg-center rounded-t-xl"
                    style="background-image:url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
           <div class="p-5">
                    <span class="inline-block mb-2 text-xs font-semibold text-yellow-700 bg-yellow-100 px-3 py-1 rounded-full">
                        Research
                    </span>
                    <h3 class="text-lg font-bold mb-2">Publications & Maps</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Books, fort maps, and research publications documenting Sahyadri forts for
                        educational and preservation purposes.
                    </p>
                    <a href="/about/publications" class="text-sm font-semibold text-primary hover:text-accent">
                        Read more →
                    </a>
                </div>
            </div>

            <!-- Sanstha & Social Initiatives -->
            <div class="project-card group">
                <div class="h-40 bg-cover bg-center rounded-t-xl"
                     style="background-image:url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                <div class="p-5">
                    <span class="inline-block mb-2 text-xs font-semibold text-indigo-700 bg-indigo-100 px-3 py-1 rounded-full">
                        Community
                    </span>
                    <h3 class="text-lg font-bold mb-2">Social & Educational Initiatives</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Shivotsav programs, lectures, exhibitions, school support initiatives, and
                        community awareness activities conducted by the Sanstha.
                    </p>
                    <a href="/about/community-initiatives" class="text-sm font-semibold text-primary hover:text-accent">
                        Learn more →
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Call to Action Section -->
    
<section class="py-16 bg-gradient-to-r from-primary to-secondary text-white">
    <div class="container mx-auto px-4 text-center">

        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Join the Trek Kshitij Community
        </h2>

        <p class="text-lg md:text-xl mb-8 opacity-90 max-w-3xl mx-auto">
            Be a part of our journey to explore, document, and preserve the forts and natural heritage
            of the Sahyadri mountains.
        </p>

        <!-- Primary Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-10">
            <a href="/trek-schedule"
               class="inline-flex items-center justify-center px-8 py-3 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">
                <i class="fas fa-hiking mr-2"></i>
                Join Our Treks
            </a>

            <a href="/community"
               class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                <i class="fas fa-users mr-2"></i>
                Explore the Community
            </a>
        </div>

        <!-- Social Media -->
        <div class="flex justify-center space-x-5">
            <a href="https://www.facebook.com/groups/trekshitiz/" target="_blank"
               class="w-11 h-11 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <a href="https://www.instagram.com/trekshitiz_ts/" target="_blank"
               class="w-11 h-11 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-instagram text-lg"></i>
            </a>
            <a href="https://www.youtube.com/channel/UCfcgOwwtNbKxZZEGZG8ndgg" target="_blank"
               class="w-11 h-11 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
                <i class="fab fa-youtube text-lg"></i>
            </a>
        </div>

    </div>
</section>

</main>

<?php include './includes/footer.php'; ?>

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