<?php
// Set page specific variables
$page_title = 'ट्रेकिंग - Trekking Activities | TreKshitiZ';
$meta_description = 'Join TreKshitiZ trekking community for regular adventures across Sahyadri mountains. Explore 350+ forts with expert guides and fellow trekking enthusiasts.';
$meta_keywords = 'ट्रेकिंग, trekking, Sahyadri trekking, Maharashtra forts, adventure activities, guided treks, trekking community';

// Include header
include '../includes/header.php';
?>

<style>
/* Trekking specific styles */
.trekking-hero {
    background: linear-gradient(135deg, rgba(45, 80, 22, 0.9), rgba(127, 176, 105, 0.8)), 
                url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.trekking-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .trekking-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.trekking-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.marathi-content {
    font-family: 'Noto Sans Devanagari', 'Mangal', serif;
    line-height: 1.8;
}

.activity-card {
    background: linear-gradient(135deg, rgba(45, 80, 22, 0.1), rgba(127, 176, 105, 0.05));
    border: 1px solid rgba(127, 176, 105, 0.3);
    border-radius: 1rem;
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.activity-card:hover {
    transform: translateY(-3px);
    border-color: var(--accent-color);
    box-shadow: 0 15px 30px rgba(45, 80, 22, 0.1);
}

.activity-card::before {
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

.activity-card:hover::before {
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

.trek-difficulty {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.difficulty-easy {
    background: rgba(34, 197, 94, 0.2);
    color: #16a34a;
}

.difficulty-moderate {
    background: rgba(251, 191, 36, 0.2);
    color: #d97706;
}

.difficulty-hard {
    background: rgba(239, 68, 68, 0.2);
    color: #dc2626;
}

.section-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

.stat-card {
    text-align: center;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.trek-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(127, 176, 105, 0.05);
    border-radius: 0.75rem;
    border-left: 4px solid var(--accent-color);
    transition: all 0.3s ease;
}

.feature-item:hover {
    background: rgba(127, 176, 105, 0.1);
    transform: translateX(5px);
}
</style>

<!-- Hero Section -->
<section class="trekking-hero min-h-screen flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 marathi-content">
                ट्रेकिंग
            </h1>
            <p class="text-2xl md:text-3xl mb-8 opacity-90">
                Sahyadri Adventure Activities
            </p>
            <p class="text-xl mb-12 opacity-80 max-w-3xl mx-auto leading-relaxed marathi-content">
                सह्याद्री पर्वतरांगेतील साहसी प्रवास - Join our community for regular trekking adventures
            </p>
            
            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2">350+</div>
                    <div class="text-sm opacity-80 marathi-content">किल्ले</div>
                </div>
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2">50+</div>
                    <div class="text-sm opacity-80">Treks/Month</div>
                </div>
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2">1000+</div>
                    <div class="text-sm opacity-80">Active Trekkers</div>
                </div>
                <div class="stat-card">
                    <div class="text-3xl font-bold mb-2">20+</div>
                    <div class="text-sm opacity-80">Years Experience</div>
                </div>
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
        <!-- Main Description -->
        <div class="trekking-section p-8 mb-8">
            <div class="section-icon">
                <i class="fas fa-mountain text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 marathi-content">ट्रेकिंग उपक्रम</h2>
            <div class="prose prose-lg text-gray-600 dark:text-gray-300 marathi-content">
                <p class="mb-4">
                    क्षितिज गुणाने सतत आयोजित या विषयावर उपक्रम म्हणजे सर्व निष्णातीमीना ट्रेकिंगचा फेरून जाणे आणि अधिकारिक लोकांमध्ये ट्रेकिंगबद्दल आवड निर्माण करणे.
                </p>
                <p class="mb-4">
                    TreKshitiZ community conducts regular trekking expeditions across the Sahyadri mountain range, providing comprehensive guidance 
                    and safety measures for both beginners and experienced trekkers.
                </p>
            </div>
        </div>

        <!-- Content from Screenshots -->
        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Main Objectives -->
            <div class="trekking-section p-8">
                <div class="section-icon">
                    <i class="fas fa-bullseye text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 marathi-content">मुख्य उद्देश</h3>
                <div class="space-y-4">
                    <div class="activity-card">
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">सहाद्रीच्या वळणांत शिरणे व अच्छे स्वरूपावर शत्रुता पाहणे</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Exploring the curves of Sahyadri mountains and observing their pristine natural beauty and historical significance.
                        </p>
                    </div>
                    
                    <div class="activity-card">
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">महाराष्ट्राच्या इतिहासपद्धती, मराठी संस्कृती जागते आणि शिवरायांचा संहास शोधणे पाहणे</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Understanding Maharashtra's historical heritage, Marathi culture, and tracing the legacy of Chhatrapati Shivaji Maharaj.
                        </p>
                    </div>
                    
                    <div class="activity-card">
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">स्वराज्याच्या रक्षणात स्पर्धीकांनी सुर देखील व बाळीची पठसणी माहिती</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Learning about the defense strategies of Swarajya and gaining detailed knowledge about fort architecture and military tactics.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Trekking Features -->
            <div class="trekking-section p-8">
                <div class="section-icon">
                    <i class="fas fa-hiking text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Trekking Features</h3>
                <div class="trek-features">
                    <div class="feature-item">
                        <i class="fas fa-users text-2xl text-accent"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Expert Guides</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Experienced trekking leaders with deep knowledge of local history</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <i class="fas fa-shield-alt text-2xl text-accent"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Safety First</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Comprehensive safety measures and first aid support</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <i class="fas fa-map-marked-alt text-2xl text-accent"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Route Planning</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Well-researched routes with detailed trail information</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <i class="fas fa-camera text-2xl text-accent"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Photography</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Capture stunning moments with guidance from our photographers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Content from Screenshots -->
        <div class="trekking-section p-8 mb-8">
            <div class="section-icon">
                <i class="fas fa-info-circle text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 marathi-content">मुख्य शैक्षणिक</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="activity-card">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-book text-xl text-accent mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">कळणे सहत अपकरण मोघमत न ठाण, गडरोंच्या इतिहासार्थी ठाणी माहीती करातो उत्ती जाऊन पाहणे</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                Understanding ancient equipment and gaining historical knowledge about forts by visiting and observing them firsthand.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="activity-card">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-eye text-xl text-accent mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">गडाच्या रक्षके(काकरक्ष गोळा कुरणे व पाच्छी सादारण प्रेमणीस भेट</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                Meeting with fort guardians and local communities to learn about traditional practices and oral histories.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trek Categories -->
        <div class="trekking-section p-8 mb-8">
            <div class="section-icon">
                <i class="fas fa-layer-group text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Trek Categories</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="activity-card text-center">
                    <i class="fas fa-seedling text-4xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Beginner Treks</h3>
                    <span class="difficulty-easy trek-difficulty mb-3">Easy</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-3">
                        Perfect for newcomers with moderate difficulty and comprehensive guidance
                    </p>
                    <div class="mt-4">
                        <p class="text-xs text-gray-500">Duration: 4-6 hours</p>
                        <p class="text-xs text-gray-500">Altitude: 500-1000m</p>
                    </div>
                </div>
                
                <div class="activity-card text-center">
                    <i class="fas fa-mountain text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Intermediate Treks</h3>
                    <span class="difficulty-moderate trek-difficulty mb-3">Moderate</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-3">
                        For experienced trekkers looking for challenging routes and scenic views
                    </p>
                    <div class="mt-4">
                        <p class="text-xs text-gray-500">Duration: 6-8 hours</p>
                        <p class="text-xs text-gray-500">Altitude: 1000-1500m</p>
                    </div>
                </div>
                
                <div class="activity-card text-center">
                    <i class="fas fa-flag-checkered text-4xl text-red-500 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Advanced Treks</h3>
                    <span class="difficulty-hard trek-difficulty mb-3">Hard</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-3">
                        Challenging expeditions for seasoned trekkers with overnight camping
                    </p>
                    <div class="mt-4">
                        <p class="text-xs text-gray-500">Duration: 8+ hours</p>
                        <p class="text-xs text-gray-500">Altitude: 1500m+</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Community & Benefits -->
        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <div class="trekking-section p-8">
                <div class="section-icon">
                    <i class="fas fa-heart text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 marathi-content">समुदायिक फायदे</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Physical Fitness</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Improve cardiovascular health and build endurance</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white marathi-content">सांस्कृतिक ज्ञान</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Deep understanding of Marathi culture and history</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Network Building</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Connect with like-minded adventure enthusiasts</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800 dark:text-white">Stress Relief</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Mental wellness through nature immersion</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="trekking-section p-8">
                <div class="section-icon">
                    <i class="fas fa-calendar-alt text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Monthly Schedule</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="font-semibold text-gray-800 dark:text-white">Weekend Treks</span>
                        <span class="text-primary">8-10/month</span>
                    </div>
                    
                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="font-semibold text-gray-800 dark:text-white">Night Treks</span>
                        <span class="text-primary">2-3/month</span>
                    </div>
                    
                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="font-semibold text-gray-800 dark:text-white">Multi-day Expeditions</span>
                        <span class="text-primary">1-2/month</span>
                    </div>
                    
                    <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="font-semibold text-gray-800 dark:text-white">Special Events</span>
                        <span class="text-primary">3-4/month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="inline-block bg-gradient-to-r from-green-600 to-green-800 rounded-2xl p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-4 marathi-content">ट्रेकिंगमध्ये सामील व्हा</h2>
                    <p class="text-xl mb-6 opacity-90">
                        Join our vibrant trekking community and explore the majestic Sahyadri
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/contact" class="bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                            <i class="fas fa-user-plus mr-2"></i>
                            Join Community
                        </a>
                        <a href="/treks/upcoming" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-green-600 transition-colors">
                            <i class="fas fa-calendar mr-2"></i>
                            View Schedule
                        </a>
                    </div>
                    <div class="mt-6 flex flex-wrap justify-center gap-6 text-sm opacity-90">
                        <span><i class="fas fa-phone mr-1"></i> Contact: +91-98765-43210</span>
                        <span><i class="fas fa-envelope mr-1"></i> trekshitiz@example.com</span>
                    </div>
                </div>
                
                <!-- Background Animation -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-4 left-4 w-8 h-8 border-2 border-white rounded-full animate-pulse"></div>
                    <div class="absolute top-1/2 right-8 w-6 h-6 border-2 border-white rounded-full animate-ping"></div>
                    <div class="absolute bottom-8 left-1/3 w-4 h-4 border-2 border-white rounded-full animate-bounce"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Treks Section -->
<section class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4 marathi-content">लोकप्रिय ट्रेक</h2>
            <p class="text-gray-600 dark:text-gray-300">Most popular trekking destinations with our community</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="activity-card text-center">
                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                     alt="Rajgad Fort" class="w-full h-32 object-cover rounded-lg mb-3">
                <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">राजगड</h3>
                <span class="difficulty-moderate trek-difficulty mb-2">Moderate</span>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Historical capital of Maratha Empire</p>
            </div>
            
            <div class="activity-card text-center">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                     alt="Sinhagad Fort" class="w-full h-32 object-cover rounded-lg mb-3">
                <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">सिंहगड</h3>
                <span class="difficulty-easy trek-difficulty mb-2">Easy</span>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Perfect for beginners near Pune</p>
            </div>
            
            <div class="activity-card text-center">
                <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                     alt="Harishchandragad" class="w-full h-32 object-cover rounded-lg mb-3">
                <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">हरिश्चंद्रगड</h3>
                <span class="difficulty-hard trek-difficulty mb-2">Hard</span>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Challenging overnight trek</p>
            </div>
            
            <div class="activity-card text-center">
                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                     alt="Sudhagad Fort" class="w-full h-32 object-cover rounded-lg mb-3">
                <h3 class="font-bold text-gray-800 dark:text-white mb-2 marathi-content">सुधागड</h3>
                <span class="difficulty-moderate trek-difficulty mb-2">Moderate</span>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Conservation project destination</p>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for sections
    const sections = document.querySelectorAll('.trekking-section, .activity-card');
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

    // Stat counter animation
    const statNumbers = document.querySelectorAll('.stat-card .text-3xl');
    statNumbers.forEach(stat => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.textContent);
                    let current = 0;
                    const increment = target / 50;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        entry.target.textContent = Math.floor(current) + (entry.target.textContent.includes('+') ? '+' : '');
                    }, 40);
                }
            });
        });
        observer.observe(stat);
    });
});
</script>

<?php
// Include footer
include '../includes/footer.php';
?>