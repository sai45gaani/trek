<?php
// Set page specific variables
$page_title = 'स्लाईड-शो - Photography Documentation | TreKshitiZ';
$meta_description = 'स्लाईड-शो प्रकल्प - किल्ल्यांची आणि निसर्गाची छायाचित्रे. Interactive slide presentations showcasing Maharashtra forts and heritage through stunning photography.';
$meta_keywords = 'स्लाईड-शो, slide show, fort photography, Maharashtra heritage, Sahyadri photography, किल्ला छायाचित्रण';

// Include header
include '../includes/header.php';
?>

<style>
/* Slide Show specific styles */
.slideshow-hero {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.9), rgba(147, 51, 234, 0.8)), 
                url('https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.slideshow-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .slideshow-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.slideshow-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.marathi-content {
    font-family: 'Noto Sans Devanagari', 'Mangal', serif;
    line-height: 1.8;
}

.content-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 1rem;
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.content-card:hover {
    transform: translateY(-3px);
    border-color: rgba(59, 130, 246, 0.5);
    box-shadow: 0 15px 30px rgba(59, 130, 246, 0.1);
}

.gallery-preview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.gallery-item {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.dark .gallery-item {
    background: var(--surface-dark);
}

.gallery-item:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.gallery-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-image {
    transform: scale(1.1);
}

.section-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, #3b82f6, #9333ea);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}
</style>

<!-- Hero Section -->
<section class="slideshow-hero min-h-screen flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 marathi-content">
                स्लाईड-शो
            </h1>
            <p class="text-2xl md:text-3xl mb-8 opacity-90">
                Photography Documentation Project
            </p>
            <p class="text-xl mb-12 opacity-80 max-w-3xl mx-auto leading-relaxed marathi-content">
                किल्ल्यांची आणि निसर्गाची छायाचित्रे - Interactive slide presentations showcasing Maharashtra's heritage
            </p>
            <div class="flex flex-wrap justify-center gap-6 text-lg">
                <span class="bg-white bg-opacity-20 px-6 py-3 rounded-full backdrop-blur-sm">
                    <i class="fas fa-camera mr-2"></i>
                    5000+ Photos
                </span>
                <span class="bg-white bg-opacity-20 px-6 py-3 rounded-full backdrop-blur-sm">
                    <i class="fas fa-mountain mr-2"></i>
                    350+ Forts
                </span>
                <span class="bg-white bg-opacity-20 px-6 py-3 rounded-full backdrop-blur-sm">
                    <i class="fas fa-play-circle mr-2"></i>
                    Interactive Shows
                </span>
            </div>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-2xl opacity-60"></i>
    </div>
</section>

<!-- Main Content -->
<section class="py-20 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <!-- Project Overview -->
        <div class="slideshow-section p-8 mb-8">
            <div class="section-icon">
                <i class="fas fa-images text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 marathi-content">स्लाईड-शो प्रकल्प</h2>
            <div class="prose prose-lg text-gray-600 dark:text-gray-300 marathi-content">
                <p class="mb-4">
                    हा प्रकल्प महाराष्ट्रातील किल्ल्यांची आणि सह्याद्री पर्वतरांगेतील निसर्गसौंदर्याची छायाचित्रे संकलित करून 
                    interactive slide show च्या माध्यमातून प्रस्तुत करण्याचा आहे.
                </p>
                <p class="mb-4">
                    TreKshitiZ.com ची ही अनोखी पहल आहे ज्यामध्ये आम्ही किल्ल्यांचे सौंदर्य, त्यांचा इतिहास आणि वारसा 
                    छायाचित्रांच्या माध्यमातून जतन करत आहोत.
                </p>
            </div>
        </div>

        <!-- Features -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <div class="content-card text-center">
                <i class="fas fa-camera-retro text-4xl text-blue-500 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 marathi-content">व्यापक संग्रह</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    5000+ photographs showcasing various moods of forts, nature, and cultural heritage sites across Maharashtra.
                </p>
            </div>
            
            <div class="content-card text-center">
                <i class="fas fa-play-circle text-4xl text-purple-500 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Interactive Presentations</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Dynamic slide shows with detailed information, historical context, and navigation features for enhanced learning experience.
                </p>
            </div>
            
            <div class="content-card text-center">
                <i class="fas fa-map-marked-alt text-4xl text-green-500 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 marathi-content">भौगोलिक विभागणी</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Categorized presentations based on geographical regions, making it easy to explore specific areas of interest.
                </p>
            </div>
        </div>

        <!-- Gallery Preview -->
        <div class="slideshow-section p-8">
            <div class="section-icon">
                <i class="fas fa-image text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Featured Collections</h2>
            <div class="gallery-preview">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Sahyadri Forts" class="gallery-image">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">सह्याद्रीचे किल्ले</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Majestic forts of the Western Ghats</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Nature Photography" class="gallery-image">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">निसर्ग सौंदर्य</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Natural beauty of Maharashtra</p>
                    </div>
                </div>
                
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Historical Architecture" class="gallery-image">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">ऐतिहासिक वास्तू</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Ancient architectural marvels</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content from Screenshots -->
        <div class="slideshow-section p-8">
            <div class="section-icon">
                <i class="fas fa-info-circle text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 marathi-content">स्लाईड - शो चे विविध विषय</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="content-card">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-3 marathi-content">सहाद्रीचे पोहोचंपक, सौंदर्यिक आणि तेजस्वी महत्व</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Western Ghats' accessibility, beauty, and radiant significance showcased through comprehensive photographic documentation.
                    </p>
                </div>
                
                <div class="content-card">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-3 marathi-content">सहाद्रीतील विविध किल्ल्यांची माहिती</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Detailed information about various forts in the Sahyadri range with historical context and architectural details.
                    </p>
                </div>
                
                <div class="content-card">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-3 marathi-content">शिवरायांचे चरित्र</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Biography and achievements of Chhatrapati Shivaji Maharaj presented through visual storytelling.
                    </p>
                </div>
                
                <div class="content-card">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-3 marathi-content">शिवरायांची मुद्रिका</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Documentation of Shivaji Maharaj's seals and their historical significance in Maratha administration.
                    </p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl p-8 text-white">
                <h2 class="text-3xl font-bold mb-4 marathi-content">स्लाईड-शो पहा</h2>
                <p class="text-xl mb-6 opacity-90">
                    Experience Maharashtra's heritage through our interactive presentations
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#gallery" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                        <i class="fas fa-play mr-2"></i>
                        Start Slideshow
                    </a>
                    <a href="/gallery" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                        <i class="fas fa-images mr-2"></i>
                        View Gallery
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for sections
    const sections = document.querySelectorAll('.slideshow-section, .content-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });
});
</script>

<?php
// Include footer
include '../includes/footer.php';
?>