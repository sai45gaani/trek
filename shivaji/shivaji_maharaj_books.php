<?php
// Set page specific variables
$page_title = 'Books & Literature on Shivaji Maharaj | Historical Books & Literature | Trekshitz';
$meta_description = 'A complete collection of historical books, novels, and literature on Chhatrapati Shivaji Maharaj, including classical works, modern research, and biographical publications.';
$meta_keywords = 'Shivaji Maharaj books, historical literature, Maratha history books, Shivaji biography, Maratha literature, research publications';

$books_english = [
    ["title" => "Raja Shivchhatrapati", "author" => "Balaji Deshpande"],
    ["title" => "The Greatness of Shivaji Maharaj", "author" => "Shridhar Savarkar"],
    ["title" => "Shivaji Maharaj’s Royal Edict (Agyapatra)", "author" => "Babasaheb Purandare"],
    ["title" => "In Search of Shivshahi", "author" => "Vasant Kanetkar"],
    ["title" => "Shivaji Maharaj and His Influence", "author" => "Setu Madhavrao Pagde"],
    ["title" => "Agra Escape", "author" => "V. S. Inamdar"],
    ["title" => "The Great Emperor", "author" => "Babasaheb Purandare"],
    ["title" => "Military History of the Marathas", "author" => "Brigadier F. G. Pitre"],
    ["title" => "Pawankhind", "author" => "Ranjit Desai"],
    ["title" => "The Fort Was Won, the Lion Was Lost", "author" => "Harinarayan Apte"],
    ["title" => "Panhala Fort", "author" => "Babasaheb Purandare"],
    ["title" => "Raigad Fort", "author" => "Babasaheb Purandare"],
    ["title" => "Rajgad Fort", "author" => "Babasaheb Purandare"],
    ["title" => "Sinhagad Fort", "author" => "Babasaheb Purandare"],
    ["title" => "Pratapgad Fort", "author" => "Babasaheb Purandare"],
    ["title" => "Chakan", "author" => "Babasaheb Purandare"],
    ["title" => "The Battle of Purandar", "author" => "Colonel B. S. Paranjpe"],
    ["title" => "Battle of Pratapgad", "author" => "G. V. Modak"],
    ["title" => "Purandar Fort", "author" => "K. B. Purandare"],
    ["title" => "Murud-Janjira", "author" => "A. R. Patil"],
    ["title" => "History of Janjira State", "author" => "B. K. Bhosale"],
    ["title" => "Kanhoji Angre", "author" => "Mrs. Shila Saraswade"],
    ["title" => "Collection of Letters", "author" => "Editor: Sunil Chicholikar"],
    ["title"=>"Chhatrapati (Volumes 1–4)","author"=>"Manmohan"],
    ["title"=>"In the Shadow of Chhatrapati","author"=>"V. P. Dangre"],
    ["title"=>"Leadership of Chhatrapati","author"=>"M. V. Gogate"],
    ["title"=>"Chhatrapati and His Influence","author"=>"Setu Madhavrao"],
    ["title"=>"Questions to Chhatrapati","author"=>"V. V. Hadap"],
    ["title"=>"Chhatrapati Shivaraya","author"=>"Yashwant Pendharkar"],
    ["title"=>"Chhatrapati Shivaji","author"=>"Bhakar Machve"],
    ["title"=>"Chhatrapati Shivaji","author"=>"Hardas Balshastri"],
    ["title"=>"Shivaji Maharaj and Samarth Ramdas","author"=>"Bhat V. V."],
    ["title"=>"Chhatrapati Shivaji Maharaj","author"=>"R. R. Bhagwat"],
    ["title"=>"Chhatrapati Shivaji Maharaj","author"=>"D. V. Kale"],
    ["title"=>"Chhatrapati Shivaji Maharaj","author"=>"Ghosalbuddhe"],
    ["title"=>"Chhatrapati Shivaji Maharaj","author"=>"Keluskar"],
    ["title"=>"Life Secrets of Shivaji Maharaj","author"=>"Nahar Kundkar"],
    ["title"=>"Forts of Shivaji Maharaj","author"=>"Government of Maharashtra"],
    ["title"=>"Chhatrapati Shivaji Raje","author"=>"S. N. Joshi"],
    ["title"=>"Raja Shivaji","author"=>"Mahadev Kunte"],
    ["title"=>"Coronation","author"=>"G. O. Agashe"],
    ["title"=>"Coronation Ceremony","author"=>"N. A. Chitnis"],
    ["title"=>"Raja Shivchhatrapati","author"=>"Babasaheb Purandare"],
    ["title"=>"Raja Shivchhatrapati","author"=>"Kamlakar Nadkarni"],
    ["title"=>"Raja Shivaji","author"=>"G. R. Sardesai"],
    ["title"=>"Raja Shivaji","author"=>"Dr. M. Kunte"],
    ["title"=>"Raja Shivaji","author"=>"Kumud Ogle"],
    ["title"=>"Raja Sambhaji Chhatrapati","author"=>"Vijay Deshmukh"],
    ["title"=>"Escape from Agra","author"=>"N. R. Inamdar"],
    ["title"=>"Ramdas and Shivaji","author"=>"Hari P. Bokil"],
    ["title"=>"Shivkalyan Raja","author"=>"Bal Samant"],
    ["title"=>"Women in the Shivaji Era","author"=>"Deshmukh"],
    ["title"=>"Shivaji Era Documents","author"=>"Hari G. Khobragade"],
    ["title"=>"Shivaji Era Fortifications","author"=>"Dho. Mu. Deshpande"],
    ["title"=>"Shivaji Era Maharashtra","author"=>"V. K. Bhave"],
    ["title"=>"Letters of Shivaji Era","author"=>"Reference Compilation"],
    ["title"=>"Poetry of Shivaji Era","author"=>"V. B. Bhave"],
    ["title"=>"Maharashtra in Shivaji Era","author"=>"A. R. Kulkarni"],
    ["title"=>"Biography of Shivaji","author"=>"Setu Madhavrao"],
    ["title"=>"Shivaji Biography Series","author"=>"G. S. Khole"],
    ["title"=>"Shivaji Biography Series","author"=>"Babasaheb Purandare"],
    ["title"=>"Biography of Shivaji","author"=>"G. H. Khare"],
    ["title"=>"Biography of Shivaji – Pradeep Divekar","author"=>"Apte"],
    ["title"=>"Shivaji Essays Collection","author"=>"Various"],
    ["title"=>"Shivaji Documents Collection","author"=>"P. B. Desai"],
    ["title"=>"Shivaji Literature","author"=>"S. N. Joshi"],
    ["title"=>"Shivaji Literature","author"=>"K. V. Purandare"],
    ["title"=>"Aspects of Shivaji’s Life","author"=>"D. V. Potdar"],
    ["title"=>"Shivaji Thought Reforms","author"=>"Bhogleadar"],
    ["title"=>"Shivchhatrapati","author"=>"P. R. Khandekar"],
    ["title"=>"Shivchhatrapati","author"=>"V. P. Sathe"],
    ["title"=>"Shivchhatrapati","author"=>"B. R. Kelkar"],
    ["title"=>"Shivchhatrapati","author"=>"R. K. Sabhasad"],
    ["title"=>"History and Biography of Shivchhatrapati","author"=>"Y. D. Phadke"],
    ["title"=>"109-Point Chronicle of Shivchhatrapati","author"=>"R. N. Deshpande"],
    ["title"=>"91-Point Chronicle of Shivchhatrapati","author"=>"V. R. Vakaskar"],
    ["title"=>"Biography of Shivchhatrapati","author"=>"R. K. Sabhasad"],
    ["title"=>"Shivchhatrapati","author"=>"M. R. Kelkar"],
    ["title"=>"Biography of Shivchhatrapati","author"=>"K. N. Sane"],
    ["title"=>"Shivchhatrapati Maharaj","author"=>"—"],
    ["title"=>"Dimensions of Shivchhatrapati","author"=>"B. K. Patwardhan"],
    ["title"=>"Coronation of Shivchhatrapati","author"=>"Krishna Mate"],
    ["title"=>"Victory of Shivchhatrapati","author"=>"A. M. Joshi"],
    ["title"=>"Birth Anniversary of Shivaji","author"=>"—"],
    ["title"=>"Shiv Jayanti Festival","author"=>"—"],
    ["title"=>"Shivkalyan Raja","author"=>"Bhaskar Marathe"],
    ["title"=>"Divine Victory of Shivaji","author"=>"R. C. Thore"],
    ["title"=>"Prelude of Shivneri","author"=>"Yashwantrao Chavan"],
    ["title"=>"Shiv Memorial","author"=>"V. N. Wad"],
    ["title"=>"Shivnabharati Drama","author"=>"S. K. Kolhatkar"],
    ["title"=>"Warriors of Shivaji","author"=>"G. N. Dandekar"],
    ["title"=>"Coronation Poetry","author"=>"S. G. Prabhu"],
    ["title"=>"Shivyogi Shivshahi","author"=>"G. S. Khole"],
    ["title"=>"Wealth of Shivrajya","author"=>"G. G. Bhatt"],
    ["title"=>"Adornment of Shivrajya","author"=>"D. A. Tiwari"],
    ["title"=>"The Glory of Shivaji","author"=>"T. V. Jadhav"],
    ["title"=>"Victory Chant of Shivaji","author"=>"Bhaskar Rane"],
    ["title"=>"Shivshahi","author"=>"M. Y. Deshmukh"],
    ["title"=>"Meaning of Shivshahi","author"=>"V. V. Hadap"],
    ["title"=>"End of Shivshahi","author"=>"—"],
    ["title"=>"Impact of Shivshahi","author"=>"—"],
    ["title"=>"Voice of Shivshahi","author"=>"A. B. Joshi-Chandodkar"],
    ["title"=>"Crown Jewel of Shivshahi","author"=>"Abasaheb Acharekar"],
    ["title"=>"Enemies of Shivshahi","author"=>"V. V. Hadap"],
    ["title"=>"Search of Shivshahi","author"=>"Vasant Kanetkar"],
    ["title"=>"Golden Age of Shivshahi","author"=>"V. V. Hadap"],
    ["title"=>"From Shivshahi to Peshwai","author"=>"G. Ramsane"],
    ["title"=>"Shiv Sangram","author"=>"S. G. Prabhu"],
    ["title"=>"Message of Shivaji","author"=>"Moropant Kar"],
    ["title"=>"Rise of Shivaji","author"=>"V. V. Khare"],
    ["title"=>"Epic of Shivaji","author"=>"Kadam"],
    ["title"=>"Shivneri","author"=>"B. Purandare"],
    ["title"=>"Devotion of Yesubai","author"=>"Lata Khedkar"],
    ["title"=>"Resolve of Shivaji","author"=>"Nath Madhav"],
    ["title"=>"Shiv Movement","author"=>"V. A. Kolhatkar"],
    ["title"=>"Shivaji Maharaj","author"=>"Kanetkar"],
    ["title"=>"Musical Shivaji","author"=>"H. P. Wagle"],
    ["title"=>"Shivaji (English)","author"=>"J. L. Mankar"],
    ["title"=>"Shivaji and Chandrarao More","author"=>"C. V. Vaidya"],
    ["title"=>"Shivaji and His Era","author"=>"Vilas Bhoir"],
    ["title"=>"Shivaji and the Shiv Yug","author"=>"Sadanand Athawale"],
    ["title"=>"Biography of Shivaji","author"=>"Shyamkumar Loh"],
    ["title"=>"Contribution of Shivaji","author"=>"E. B. Athawale"],
    ["title"=>"Who Was Shivaji","author"=>"S. P. Joshi"],
    ["title"=>"Legacy of Shivaji Maharaj","author"=>"G. G. Desai"],
    ["title"=>"Merit of Shivaji Maharaj","author"=>"H. R. Bhagwat"],
    ["title"=>"Biography of Shivaji Maharaj","author"=>"—"],
    ["title"=>"Mavalas of Shivaji Maharaj","author"=>"Saubhadrā"],
    ["title"=>"Career of Shivaji Maharaj","author"=>"—"],
    ["title"=>"Description of Shivaji Raja","author"=>"—"],
    ["title"=>"Omkar Raja","author"=>"18 Purandare"],
    ["title"=>"Shriman Yogi","author"=>"Ranjit Desai"],
    ["title"=>"Biography of Shivchhatrapati","author"=>"Dattatraya Bhagwat"],
    ["title"=>"Raja Shivchhatrapati","author"=>"Babasaheb Purandare"],
    ["title"=>"History and Biography of Shivchhatrapati","author"=>"Editorial Board"],
    ["title"=>"Shri Raja Shivchhatrapati (Vol 1 & 2)","author"=>"G. B. Mehendale"],
    ["title"=>"Search of Shivshahi","author"=>"Vasant Kanetkar"],
    ["title"=>"Greatness of Shivaji","author"=>"Shrinivas Sawant"],
    ["title"=>"Maharaj","author"=>"Babasaheb Purandare"]
];

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
           Books & Literature on Chhatrapati Shivaji Maharaj    </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-4 opacity-95">
                Historical Books & Literature on Shivaji Maharaj
                </p>

            <!-- Tagline -->
            <p class="text-lg md:text-xl mb-8 opacity-85">
                Warfare and Strategic Battle Tactics
            </p>

            <!-- Key Highlights -->
            <div class="flex flex-wrap justify-center gap-4 text-sm md:text-base opacity-95">

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    Classical Works
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-flag mr-2"></i>
                    Modern Research
                </span>

                <span class="bg-white bg-opacity-20 px-5 py-2 rounded-full backdrop-blur">
                    <i class="fas fa-calendar-alt mr-2"></i>
                   Biographical Literature
                </span>

             

            </div>

        </div>
    </div>
</section>


        
<div class="container mx-auto px-4 py-10">
    <div class="text-center mb-16">
            <div class="section-indicator"></div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                    Books Of Chhatrapati Shivaji Maharaj
                </span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
            List of Books
            </p>
    </div>

    <div class="overflow-x-auto royal-card rounded-xl">
        <table class="min-w-full border border-gray-200 dark:border-gray-700">
            <thead class="bg-gradient-to-r from-red-700 to-yellow-600 text-white">
                <tr>
      <th width="5%">No</th>
      <th width="45%" id="thTitle">Book Title</th>
      <th width="50%" id="thAuthor">Author</th>
    </tr>
            </thead>

            <tbody id="booksBody" class="bg-white dark:bg-gray-900">
                <!-- JS will inject rows here -->
            </tbody>
        </table>
    </div>

    <!-- Pagination Controls -->
    <div class="flex justify-between items-center mt-6">
        <button id="prevBtn"
            class="px-6 py-2 bg-gray-300 dark:bg-gray-700 rounded disabled:opacity-50">
            Previous
        </button>

        <span id="pageInfo" class="text-sm text-gray-600 dark:text-gray-300"></span>

        <button id="nextBtn"
            class="px-6 py-2 bg-red-600 text-white rounded hover:bg-yellow-600">
            Next
        </button>
    </div>

</div>



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
    const booksData = <?php echo json_encode($books_english); ?>;
</script>
<script>
    const rowsPerPage = 15;
    let currentPage = 1;
    let currentLang = 'mr'; // mr | en

    function renderBooksTable() {
        const tbody = document.getElementById('booksBody');
        tbody.innerHTML = '';

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = booksData.slice(start, end);

        pageData.forEach((book, index) => {
            const i = start + index + 1;

            const title  =  book.title ;
            const author =  book.author ;

            const row = `
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-4 py-2">${i}</td>
                    <td class="px-4 py-2 font-semibold">${title}</td>
                    <td class="px-4 py-2">${author}</td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        updateBooksControls();
    }

    function updateBooksControls() {
        const totalPages = Math.ceil(booksData.length / rowsPerPage);

        document.getElementById('pageInfo').innerText =
            `Page ${currentPage} of ${totalPages}`;

        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages;
    }

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderBooksTable();
        }
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        const totalPages = Math.ceil(booksData.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderBooksTable();
        }
    });

    function switchBooksLanguage(lang) {
        currentLang = lang;
        renderBooksTable();
    }

    // Initial Load
    renderBooksTable();
</script>



