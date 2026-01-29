<?php
// Set page specific variables
$page_title = 'Project Sudhagad - Fort Conservation Initiative | TreKshitiZ';
$meta_description = 'Project Sudhagad - Last chance of Fort Conservation. Learn about our heritage preservation initiative at Sudhagad fort near Pali, started by Kshitiz group in 2004.';
$meta_keywords = 'Project Sudhagad, fort conservation, Sudhagad fort, Pali, Kshitiz group, heritage preservation, Maha Darwaza, fort restoration, Maharashtra forts';

// Include header
include './includes/header.php';
?>

<style>
/* Sudhagad Project specific styles */
.project-hero {
    background: linear-gradient(135deg, rgba(45, 80, 22, 0.9), rgba(127, 176, 105, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.content-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.dark .content-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.content-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.section-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.reason-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(127, 176, 105, 0.3);
    border-radius: 1rem;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.reason-card:hover {
    transform: translateY(-5px);
    border-color: var(--accent-color);
    box-shadow: 0 15px 30px rgba(45, 80, 22, 0.1);
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: rgba(127, 176, 105, 0.05);
    border-radius: 0.75rem;
    border-left: 4px solid var(--accent-color);
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.activity-item:hover {
    background: rgba(127, 176, 105, 0.1);
    transform: translateX(5px);
}

.deterioration-cause {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
    border: 1px solid rgba(239, 68, 68, 0.2);
    border-radius: 1rem;
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.deterioration-cause:hover {
    border-color: rgba(239, 68, 68, 0.4);
    transform: translateY(-2px);
}

.navigation-sidebar {
    position: sticky;
    top: 100px;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    border: 1px solid #e5e7eb;
}

.dark .navigation-sidebar {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    color: #6b7280;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-bottom: 0.5rem;
}

.nav-link:hover, .nav-link.active {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    transform: translateX(5px);
}

.fort-image {
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.fort-image:hover {
    transform: scale(1.05);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.call-to-action {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border-radius: 1.5rem;
    padding: 3rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.call-to-action::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
}
</style>

<!-- Hero Section -->
<section class="project-hero min-h-screen flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                Project Sudhagad
            </h1>
            <p class="text-2xl md:text-3xl mb-8 opacity-90">
                Last Chance of Fort Conservation
            </p>
            <p class="text-xl mb-12 opacity-80 max-w-3xl mx-auto leading-relaxed">
                An initiative by Kshitiz group of Dombivli to prevent further deterioration of this valueless treasure
            </p>
            <div class="flex flex-wrap justify-center gap-6 text-lg">
                <span class="bg-white bg-opacity-20 px-6 py-3 rounded-full backdrop-blur-sm">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Started June 2004
                </span>
                <span class="bg-white bg-opacity-20 px-6 py-3 rounded-full backdrop-blur-sm">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Near Pali, Maharashtra
                </span>
                <span class="bg-white bg-opacity-20 px-6 py-3 rounded-full backdrop-blur-sm">
                    <i class="fas fa-users mr-2"></i>
                    Kshitiz Group
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
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1">
                <div class="navigation-sidebar">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Project Navigation</h3>
                    <nav>
                        <a href="#overview" class="nav-link active">
                            <i class="fas fa-info-circle"></i>
                            <span>Project Overview</span>
                        </a>
                        <a href="/about/sudhagad-project/structure" class="nav-link">
                            <i class="fas fa-sitemap"></i>
                            <span>Project Structure</span>
                        </a>
                        <a href="/about/sudhagad-project/activities" class="nav-link">
                            <i class="fas fa-tasks"></i>
                            <span>Future Activities</span>
                        </a>
                        <a href="/about/sudhagad-project/activities-done" class="nav-link">
                            <i class="fas fa-check-circle"></i>
                            <span>Activities Performed</span>
                        </a>
                        <a href="/about/sudhagad-project/execution" class="nav-link">
                            <i class="fas fa-cogs"></i>
                            <span>How Executed</span>
                        </a>
                        <a href="/contact" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3">
                <!-- What is Project Sudhagad -->
                <div id="overview" class="content-section p-8 mb-8">
                    <div class="grid md:grid-cols-3 gap-8 items-center mb-8">
                        <div class="md:col-span-1">
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Maha Darwaza - Sudhagad Fort" 
                                 class="fort-image w-full h-80 object-cover">
                            <p class="text-center mt-4 font-bold text-gray-700 dark:text-gray-300">Maha Darwaza</p>
                        </div>
                        <div class="md:col-span-2">
                            <div class="section-icon">
                                <i class="fas fa-question-circle text-white text-xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">What is Project Sudhagad?</h2>
                            <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                                <p class="mb-4">
                                    Sudhagad is a beautiful fort located near the town of <strong>Pali</strong> (famous as one of the <em>Ashtavinayaka</em> locations). 
                                    The fort was under the princely state of <em>Bhor</em> and hence was under maintenance till India's independence. 
                                    Due to this fact a lot of construction on the fort is intact.
                                </p>
                                <p class="mb-4">
                                    However, neglect over the past five decades has caused a lot of damage to the surviving fortifications.
                                </p>
                                <p class="font-semibold text-primary">
                                    Project Sudhagad is an activity taken up by Kshitiz group of Dombivli in order to prevent further 
                                    deterioration of this valueless treasure.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why Sudhagad -->
                <div class="content-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-bullseye text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Why Sudhagad?</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        There are over 300 forts in this region. However, Sudhagad was chosen for the activity for the following main reasons:
                    </p>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="reason-card">
                            <div class="text-center mb-4">
                                <i class="fas fa-road text-3xl text-accent mb-3"></i>
                                <h3 class="font-bold text-gray-800 dark:text-white">Easy Access</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                Comparative ease of access from Mumbai and its suburbs
                            </p>
                        </div>
                        <div class="reason-card">
                            <div class="text-center mb-4">
                                <i class="fas fa-building text-3xl text-accent mb-3"></i>
                                <h3 class="font-bold text-gray-800 dark:text-white">Intact Structure</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                A good amount of structure is intact. So there is scope to save a lot
                            </p>
                        </div>
                        <div class="reason-card">
                            <div class="text-center mb-4">
                                <i class="fas fa-home text-3xl text-accent mb-3"></i>
                                <h3 class="font-bold text-gray-800 dark:text-white">Accommodation</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                With abundant water and shelter a big group can stay overnight for the activity
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Deterioration Causes -->
                <div class="content-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">What is causing Sudhagad's deterioration?</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        As is the unfortunate case with most of our forts, following are the main reasons why Sudhagad is getting destroyed day by day:
                    </p>
                    
                    <div class="deterioration-cause">
                        <div class="flex items-start gap-4">
                            <div class="text-red-500 text-2xl mt-1">
                                <i class="fas fa-tree"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Growth of vegetation on fortifications</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Large trees have grown on the fortifications. The force exerted by their roots is so enormous, 
                                    that even huge stone bricks weighing hundreds of kgs are actually displaced from their location. 
                                    This in turn causes gradual collapse of the structures.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="deterioration-cause">
                        <div class="flex items-start gap-4">
                            <div class="text-red-500 text-2xl mt-1">
                                <i class="fas fa-tint"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Effects of Rainwater</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    The original structure has provisions for drainage of rainwater. However, these gutters and channels 
                                    are blocked by soil and rocks, forcing the water to flow over the steps causing erosion.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="deterioration-cause">
                        <div class="flex items-start gap-4">
                            <div class="text-red-500 text-2xl mt-1">
                                <i class="fas fa-user-times"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Human Interference</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Graffiti, carelessness etc., which is unfortunately seen at all our archeological sites.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activities Done -->
                <div class="content-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">What has been done so far under the Project?</h2>
                    
                    <div class="activity-item">
                        <div class="text-green-500 text-xl">
                            <i class="fas fa-cut"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 dark:text-white">Vegetation Removal</h3>
                            <p class="text-gray-600 dark:text-gray-300">Partial removal of small trees, shrubs and cactus from important fortifications</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="text-green-500 text-xl">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 dark:text-white">Maha Darwaza Restoration</h3>
                            <p class="text-gray-600 dark:text-gray-300">Started removal of soil and rocks that are piled up in the <em>Maha Darwaza</em></p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="text-green-500 text-xl">
                            <i class="fas fa-trash"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 dark:text-white">Waste Management</h3>
                            <p class="text-gray-600 dark:text-gray-300">Removal of plastic garbage</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="text-green-500 text-xl">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 dark:text-white">Environmental Conservation</h3>
                            <p class="text-gray-600 dark:text-gray-300">Plantation activities</p>
                        </div>
                    </div>
                </div>

                <!-- Future Scope -->
                <div class="content-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-future text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">What still could be done?</h2>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Sudhagad is a fort with a large area on top and has many interesting structures. What Kshitiz started in 
                            June 2004 is just the beginning. A lot can be done to bring Sudhagad as close to its past glory as possible. 
                            However, need of the day is to prevent its destruction.
                        </p>
                        <p class="mb-4">
                            Though a Herculean task, it can be accomplished with the help of right resources and more importantly, our will!
                        </p>
                        <p class="mb-6">
                            A beautiful archeological site closely related to our recent history will soon be destroyed, if not saved in time. 
                            And to do that we need...
                        </p>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="call-to-action relative">
                    <h2 class="text-4xl font-bold mb-4">YOU !!</h2>
                    <p class="text-xl mb-8 opacity-90">
                        Be part of the team for conservation of Sudhagad.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/contact" class="bg-white text-primary px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                            <i class="fas fa-envelope mr-2"></i>
                            Contact Us
                        </a>
                        <a href="/about/sudhagad-project/activities" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-primary transition-colors">
                            <i class="fas fa-tasks mr-2"></i>
                            View Activities
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<section class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Related Projects</h2>
            <p class="text-gray-600 dark:text-gray-300">Explore our other conservation and documentation initiatives</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="content-section p-6 text-center">
                <i class="fas fa-images text-4xl text-accent mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Slide Show Project</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Interactive presentations showcasing Maharashtra's forts through stunning photography
                </p>
                <a href="/about/slide-show" class="text-primary hover:text-secondary font-semibold">
                    Learn More <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="content-section p-6 text-center">
                <i class="fas fa-hiking text-4xl text-accent mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Trekking Activities</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Join our regular trekking expeditions and adventure activities across Sahyadri
                </p>
                <a href="/about/activities-trekking" class="text-primary hover:text-secondary font-semibold">
                    Join Treks <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Smooth scrolling for navigation links
document.querySelectorAll('.nav-link[href^="#"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Update active navigation based on scroll position
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('[id]');
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (window.pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// Add some interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for content sections
    const sections = document.querySelectorAll('.content-section');
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
include './includes/footer.php';
?>