<?php
// Set page specific variables
$page_title = 'Photo Gallery - Explore Sahyadri Heritage & Nature | Trekshitz';
$meta_description = 'Complete photo gallery collection featuring historic forts, beautiful butterflies, ancient caves, and wildflowers of Maharashtra. Professional nature and heritage photography from Sahyadri mountains.';
$meta_keywords = 'photo gallery, Maharashtra, Sahyadri, forts, butterflies, caves, flowers, nature photography, heritage, trekking, Western Ghats';

// Include header
include '../includes/header.php';
?>

<style>
/* Main Gallery specific styles */
.gallery-category-card {
    position: relative;
    overflow: hidden;
    border-radius: 1.5rem;
    transition: all 0.4s ease;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border: 2px solid transparent;
    cursor: pointer;
    min-height: 400px;
}

.gallery-category-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    border-color: var(--accent-color);
}

.card-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: all 0.5s ease;
    filter: brightness(0.7);
}

.gallery-category-card:hover .card-background {
    transform: scale(1.1);
    filter: brightness(0.9);
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4));
    transition: all 0.3s ease;
}

.gallery-category-card:hover .card-overlay {
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.2));
}

.card-content {
    position: relative;
    z-index: 10;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 2rem;
    color: white;
}

.category-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.gallery-category-card:hover .category-icon {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.category-stats {
    display: flex;
    justify-content: space-around;
    margin-top: 1.5rem;
    width: 100%;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
    padding: 0.75rem 1rem;
    border-radius: 0.75rem;
    min-width: 80px;
}

.stat-number {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.75rem;
    opacity: 0.9;
}

.gallery-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.1;
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="gallery" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect x="2" y="2" width="6" height="6" fill="%23ffffff" opacity="0.3"/><rect x="12" y="2" width="6" height="6" fill="%23ffffff" opacity="0.3"/><rect x="2" y="12" width="6" height="6" fill="%23ffffff" opacity="0.3"/><rect x="12" y="12" width="6" height="6" fill="%23ffffff" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23gallery)"/></svg>');
}

.feature-highlight {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
}

.feature-highlight:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-5px);
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    overflow: hidden;
}

.floating-icon {
    position: absolute;
    color: rgba(255, 255, 255, 0.1);
    font-size: 3rem;
    animation: float 6s ease-in-out infinite;
}

.floating-icon:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.floating-icon:nth-child(2) { top: 20%; right: 15%; animation-delay: 1s; }
.floating-icon:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 2s; }
.floating-icon:nth-child(4) { bottom: 15%; right: 10%; animation-delay: 3s; }

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@media (max-width: 768px) {
    .gallery-category-card {
        min-height: 350px;
    }
    
    .category-stats {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .stat-item {
        margin: 0 auto;
        width: 120px;
    }
}
</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="gallery-hero py-20 text-white relative">
        <div class="hero-pattern"></div>
        <div class="floating-elements">
            <div class="floating-icon"><i class="fas fa-fort-awesome"></i></div>
            <div class="floating-icon"><i class="fas fa-butterfly"></i></div>
            <div class="floating-icon"><i class="fas fa-mountain"></i></div>
            <div class="floating-icon"><i class="fas fa-seedling"></i></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 font-bilingual">
                    📸 फोटो गॅलरी संग्रह
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Complete Photo Gallery Collection
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Explore the rich heritage and natural beauty of Maharashtra through our comprehensive photography collection
                </p>
                <div class="grid md:grid-cols-4 gap-6 mt-12">
                    <div class="feature-highlight">
                        <i class="fas fa-fort-awesome text-3xl mb-3 text-orange-300"></i>
                        <h3 class="text-lg font-bold mb-2">Historic Forts</h3>
                        <p class="text-sm opacity-80">350+ Maratha fortresses</p>
                    </div>
                    <div class="feature-highlight">
                        <i class="fas fa-butterfly text-3xl mb-3 text-pink-300"></i>
                        <h3 class="text-lg font-bold mb-2">Beautiful Butterflies</h3>
                        <p class="text-sm opacity-80">50+ Species documented</p>
                    </div>
                    <div class="feature-highlight">
                        <i class="fas fa-mountain text-3xl mb-3 text-gray-300"></i>
                        <h3 class="text-lg font-bold mb-2">Ancient Caves</h3>
                        <p class="text-sm opacity-80">Buddhist & Natural caves</p>
                    </div>
                    <div class="feature-highlight">
                        <i class="fas fa-seedling text-3xl mb-3 text-green-300"></i>
                        <h3 class="text-lg font-bold mb-2">Wild Flowers</h3>
                        <p class="text-sm opacity-80">Botanical diversity</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Categories -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    Explore Our Gallery Collections
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Discover Maharashtra's cultural heritage and natural wonders through our professionally curated photo galleries. 
                    Each collection tells a unique story of the Sahyadri mountains and Western Ghats.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                
                <!-- Forts Gallery Card -->
                <div class="gallery-category-card" onclick="openGallery('forts')">
                    <div class="card-background" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="category-icon">
                            <i class="fas fa-fort-awesome text-orange-400"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-3">Historic Forts</h3>
                        <p class="text-lg mb-4 opacity-90 font-devanagari">ऐतिहासिक किल्ले</p>
                        <p class="text-base opacity-80 leading-relaxed">
                            Explore the magnificent fortresses of the Maratha Empire. From Raigad to Sinhagad, 
                            discover the architectural marvels that shaped Maharashtra's history.
                        </p>
                        <div class="category-stats">
                            <div class="stat-item">
                                <span class="stat-number">150+</span>
                                <span class="stat-label">Forts</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">2000+</span>
                                <span class="stat-label">Photos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">350+</span>
                                <span class="stat-label">Years Old</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Butterflies Gallery Card -->
                <div class="gallery-category-card" onclick="openGallery('butterflies')">
                    <div class="card-background" style="background-image: url('https://images.unsplash.com/photo-1518854050639-7d4c9ad5f9e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="category-icon">
                            <i class="fas fa-butterfly text-pink-400"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-3">Beautiful Butterflies</h3>
                        <p class="text-lg mb-4 opacity-90 font-devanagari">सुंदर फुलपाखरे</p>
                        <p class="text-base opacity-80 leading-relaxed">
                            Witness the incredible diversity of butterfly species found in the Western Ghats. 
                            From Blue Mormons to Common Tigers, explore nature's flying jewels.
                        </p>
                        <div class="category-stats">
                            <div class="stat-item">
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Species</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">150+</span>
                                <span class="stat-label">Photos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">25+</span>
                                <span class="stat-label">Locations</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Caves Gallery Card -->
                <div class="gallery-category-card" onclick="openGallery('caves')">
                    <div class="card-background" style="background-image: url('https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="category-icon">
                            <i class="fas fa-mountain text-gray-300"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-3">Ancient Caves</h3>
                        <p class="text-lg mb-4 opacity-90 font-devanagari">प्राचीन गुहा</p>
                        <p class="text-base opacity-80 leading-relaxed">
                            Journey through time in ancient Buddhist caves and natural rock formations. 
                            From Bhaja to Lenyadri, explore 2000-year-old monastic complexes.
                        </p>
                        <div class="category-stats">
                            <div class="stat-item">
                                <span class="stat-number">5+</span>
                                <span class="stat-label">Complexes</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">31+</span>
                                <span class="stat-label">Photos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">2000+</span>
                                <span class="stat-label">Years Old</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flowers Gallery Card -->
                <div class="gallery-category-card" onclick="openGallery('flowers')">
                    <div class="card-background" style="background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="category-icon">
                            <i class="fas fa-seedling text-green-400"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-3">Wild Flowers</h3>
                        <p class="text-lg mb-4 opacity-90 font-devanagari">वन्य फुले</p>
                        <p class="text-base opacity-80 leading-relaxed">
                            Discover the botanical treasures of the Sahyadri mountains. From monsoon blooms 
                            to rare endemic species, explore nature's colorful palette.
                        </p>
                        <div class="category-stats">
                            <div class="stat-item">
                                <span class="stat-number">19+</span>
                                <span class="stat-label">Species</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">25+</span>
                                <span class="stat-label">Photos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">12+</span>
                                <span class="stat-label">Families</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Gallery Features -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    Why Our Photo Galleries?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Professional nature and heritage photography with educational content
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-camera text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Professional Photography</h3>
                    <p class="text-gray-600 dark:text-gray-300">High-quality images captured during trekking expeditions</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-book text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Educational Content</h3>
                    <p class="text-gray-600 dark:text-gray-300">Detailed information about history, species, and culture</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-accent rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-search text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Easy Discovery</h3>
                    <p class="text-gray-600 dark:text-gray-300">Search, filter, and browse with advanced navigation tools</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-forest rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-mobile-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Mobile Friendly</h3>
                    <p class="text-gray-600 dark:text-gray-300">Optimized viewing experience on all devices</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-br from-primary via-secondary to-accent text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Start Your Visual Journey</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Join thousands of nature lovers and history enthusiasts exploring Maharashtra's treasures through our lens
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="openGallery('forts')" class="inline-flex items-center px-8 py-4 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-fort-awesome mr-2"></i>
                    Explore Forts
                </button>
                <button onclick="openGallery('butterflies')" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                    <i class="fas fa-butterfly mr-2"></i>
                    Discover Wildlife
                </button>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    console.log('Main Photo Gallery loaded');
    
    // Add entrance animations
    $('.gallery-category-card').each(function(index) {
        $(this).css({
            'opacity': '0',
            'transform': 'translateY(50px)'
        }).delay(index * 200).animate({
            'opacity': '1'
        }, 600, function() {
            $(this).css('transform', 'translateY(0)');
        });
    });
});

// Open specific gallery
function openGallery(type) {
    console.log('Opening gallery:', type);
    
    // Add loading animation
    $('body').append('<div id="page-loader" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"><div class="bg-white p-6 rounded-lg text-center"><i class="fas fa-spinner fa-spin text-2xl text-primary mb-4"></i><p class="text-gray-700">Loading ' + type + ' gallery...</p></div></div>');
    
    // Simulate loading time and redirect
    setTimeout(() => {
        let targetPage = '';
        switch(type) {
            case 'forts':
                targetPage = 'fort-photo-gallery.php';
                break;
            case 'butterflies':
                targetPage = 'butterfly-photo-gallery.php';
                break;
            case 'caves':
                targetPage = 'cave-photo-gallery.php';
                break;
            case 'flowers':
                targetPage = 'flower-photo-gallery.php';
                break;
            default:
                targetPage = '#';
        }
        
        if (targetPage !== '#') {
            window.location.href = targetPage;
        } else {
            $('#page-loader').remove();
            alert('Gallery page: ' + type + ' - Coming soon!');
        }
    }, 1000);
}

// Add hover sound effects (optional)
$('.gallery-category-card').hover(
    function() {
        $(this).find('.category-icon').addClass('animate-pulse');
    },
    function() {
        $(this).find('.category-icon').removeClass('animate-pulse');
    }
);

// Add smooth scrolling
$('a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    const target = $(this.getAttribute('href'));
    if (target.length) {
        $('html, body').animate({
            scrollTop: target.offset().top - 100
        }, 800);
    }
});

// Add keyboard navigation
$(document).keydown(function(e) {
    switch(e.keyCode) {
        case 49: // Number 1
            openGallery('forts');
            break;
        case 50: // Number 2
            openGallery('butterflies');
            break;
        case 51: // Number 3
            openGallery('caves');
            break;
        case 52: // Number 4
            openGallery('flowers');
            break;
    }
});

// Add stats counter animation
function animateCounters() {
    $('.stat-number').each(function() {
        const $this = $(this);
        const target = parseInt($this.text().replace('+', ''));
        const duration = 2000;
        const step = target / (duration / 50);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            $this.text(Math.floor(current) + (target >= 100 ? '+' : ''));
        }, 50);
    });
}

// Trigger counter animation when in view
const observerOptions = {
    threshold: 0.5,
    triggerOnce: true
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

$('.category-stats').each(function() {
    observer.observe(this);
});

// Add accessibility improvements
$('.gallery-category-card').attr('tabindex', '0').keydown(function(e) {
    if (e.keyCode === 13 || e.keyCode === 32) { // Enter or Space
        e.preventDefault();
        $(this).click();
    }
});

console.log('Main Photo Gallery: All functionality loaded successfully');
console.log('Keyboard shortcuts: Press 1-4 to open galleries directly');
</script>