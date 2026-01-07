<?php
// Set page specific variables
$page_title = 'Future Activities - Sudhagad Project | TreKshitiZ';
$meta_description = 'Future activities planned for Sudhagad fort conservation project. Contact Rahul Meshram for participation and collaboration opportunities.';
$meta_keywords = 'Sudhagad future activities, fort conservation plans, heritage preservation, volunteer opportunities, Rahul Meshram';

// Include header
include '../includes/header.php';
?>

<style>
/* Future Activities specific styles */
.future-hero {
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.9), rgba(16, 185, 129, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.future-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .future-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.future-section:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.contact-card {
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(16, 185, 129, 0.05));
    border: 2px solid rgba(34, 197, 94, 0.2);
    border-radius: 1.5rem;
    padding: 3rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
    border-color: rgba(34, 197, 94, 0.4);
    box-shadow: 0 25px 50px rgba(34, 197, 94, 0.1);
}

.contact-card::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(34, 197, 94, 0.1), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
    opacity: 0;
}

.contact-card:hover::before {
    animation: shimmer 2s ease-in-out;
}

@keyframes shimmer {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
}

.contact-icon {
    width: 5rem;
    height: 5rem;
    background: linear-gradient(135deg, #22c55e, #10b981);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    position: relative;
    z-index: 1;
}

.contact-icon::after {
    content: '';
    position: absolute;
    inset: -3px;
    border-radius: 50%;
    background: linear-gradient(135deg, #22c55e, #10b981);
    opacity: 0.3;
    z-index: -1;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.2); opacity: 0.1; }
}

.phone-number {
    font-size: 1.5rem;
    font-weight: bold;
    color: #22c55e;
    margin: 1rem 0;
    letter-spacing: 1px;
}

.section-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, #22c55e, #10b981);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
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
    background: linear-gradient(135deg, #22c55e, #10b981);
    color: white;
    transform: translateX(5px);
}

.activity-preview {
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.05), rgba(16, 185, 129, 0.03));
    border: 1px solid rgba(34, 197, 94, 0.1);
    border-radius: 1rem;
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.activity-preview:hover {
    transform: translateY(-2px);
    border-color: rgba(34, 197, 94, 0.3);
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.05);
}
</style>

<!-- Hero Section -->
<section class="future-hero min-h-[60vh] flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Future Activities
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Planned Conservation Initiatives
            </p>
            <p class="text-lg mb-8 opacity-80 max-w-2xl mx-auto">
                Upcoming activities and opportunities to contribute to Sudhagad fort conservation
            </p>
        </div>
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
                        <a href="/about/sudhagad-project" class="nav-link">
                            <i class="fas fa-info-circle"></i>
                            <span>Project Overview</span>
                        </a>
                        <a href="/about/sudhagad-project/structure" class="nav-link">
                            <i class="fas fa-sitemap"></i>
                            <span>Project Structure</span>
                        </a>
                        <a href="/about/sudhagad-project/activities" class="nav-link active">
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
                        <a href="/about/sudhagad-project/contact" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3">
                <!-- Future Activities Overview -->
                <div class="future-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-calendar-plus text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Upcoming Conservation Activities</h2>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-6">
                            The Sudhagad conservation project continues to evolve with planned activities aimed at preserving this historic fort 
                            for future generations. We are always planning new initiatives and welcome community participation.
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-6 not-prose">
                            <div class="activity-preview">
                                <div class="flex items-center gap-3 mb-3">
                                    <i class="fas fa-hammer text-green-600 text-xl"></i>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Structural Restoration</h3>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Continuing restoration work on damaged fortifications and historical structures
                                </p>
                            </div>
                            
                            <div class="activity-preview">
                                <div class="flex items-center gap-3 mb-3">
                                    <i class="fas fa-seedling text-green-600 text-xl"></i>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Environmental Conservation</h3>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Plantation drives and ecosystem restoration around the fort premises
                                </p>
                            </div>
                            
                            <div class="activity-preview">
                                <div class="flex items-center gap-3 mb-3">
                                    <i class="fas fa-search text-green-600 text-xl"></i>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Archaeological Survey</h3>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Systematic documentation and exploration of unexplored areas of the fort
                                </p>
                            </div>
                            
                            <div class="activity-preview">
                                <div class="flex items-center gap-3 mb-3">
                                    <i class="fas fa-users text-green-600 text-xl"></i>
                                    <h3 class="font-bold text-gray-800 dark:text-white">Community Engagement</h3>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Educational programs and workshops for local communities and schools
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact for Future Activities -->
                <div class="contact-card relative">
                    <div class="contact-icon">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">For Future Activities Please Contact</h2>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg max-w-md mx-auto relative z-10">
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Rahul Meshram</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Project Coordinator</p>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex items-center justify-center gap-3">
                                <i class="fas fa-mobile-alt text-green-600 text-xl"></i>
                                <div class="phone-number">+91 9987647607</div>
                            </div>
                            
                            <div class="flex items-center justify-center gap-3">
                                <i class="fas fa-envelope text-green-600"></i>
                                <span class="text-gray-600 dark:text-gray-300">rahul.mesh@gmail.com</span>
                            </div>
                            
                            <div class="flex items-center justify-center gap-3">
                                <i class="fas fa-users text-green-600"></i>
                                <span class="text-gray-600 dark:text-gray-300">TreKshitiz Sanstha Member</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Get involved in our conservation efforts and help preserve Sudhagad's heritage
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="tel:+919987647607" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-semibold transition-colors">
                                <i class="fas fa-phone mr-2"></i>
                                Call Now
                            </a>
                            <a href="mailto:rahul.mesh@gmail.com" class="border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white px-6 py-3 rounded-full font-semibold transition-colors">
                                <i class="fas fa-envelope mr-2"></i>
                                Send Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- How to Participate -->
                <div class="future-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-hands-helping text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">How to Participate</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Individual Volunteers</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Join weekend conservation treks</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Participate in cleanup activities</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Contribute to documentation work</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Support fundraising initiatives</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Organizations</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Sponsor conservation activities</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Provide technical expertise</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Organize educational programs</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Collaborate on research projects</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="future-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Activity Timeline</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar text-green-600 dark:text-green-400"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Monthly Activities</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Regular conservation treks, cleanup drives, and maintenance activities conducted every month
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-leaf text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Seasonal Programs</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Special plantation drives during monsoon season and intensive restoration work during winter months
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-purple-600 dark:text-purple-400"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Annual Events</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Heritage awareness programs, photography exhibitions, and community festivals celebrating fort conservation
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-green-600 to-green-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Ready to Make a Difference?</h2>
            <p class="text-xl mb-8 opacity-90">
                Join our mission to preserve Sudhagad fort for future generations through active conservation efforts
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:+919987647607" class="bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    <i class="fas fa-phone mr-2"></i>
                    Contact Rahul Meshram
                </a>
                <a href="/about/sudhagad-project/activities-done" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-green-600 transition-colors">
                    <i class="fas fa-history mr-2"></i>
                    See Our Progress
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for sections
    const sections = document.querySelectorAll('.future-section, .contact-card, .activity-preview');
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

    // Phone number click animation
    const phoneNumber = document.querySelector('.phone-number');
    if (phoneNumber) {
        phoneNumber.addEventListener('click', function() {
            this.style.transform = 'scale(1.1)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
        });
    }
});
</script>

<?php
// Include footer
include '../includes/footer.php';
?>