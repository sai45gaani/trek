<?php
// Set page specific variables
$page_title = 'Contact Us - Sudhagad Project | TreKshitiZ';
$meta_description = 'Contact TreKshitiZ Sudhagad Project team. Get in touch with Sudhir Puranik, Rahul Meshram, and Prasad Nikte for fort conservation activities and collaboration.';
$meta_keywords = 'Sudhagad project contact, TreKshitiZ contact, Sudhir Puranik, Rahul Meshram, Prasad Nikte, fort conservation contact, Dombivli';

// Include header
include '../includes/header.php';
?>

<style>
/* Contact specific styles */
.contact-hero {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.contact-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .contact-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.contact-section:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.contact-card {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05));
    border: 1px solid rgba(16, 185, 129, 0.2);
    border-radius: 1.5rem;
    padding: 2rem;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.contact-card:hover {
    transform: translateY(-5px);
    border-color: rgba(16, 185, 129, 0.4);
    box-shadow: 0 20px 40px rgba(16, 185, 129, 0.1);
}

.contact-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(16, 185, 129, 0.05), transparent);
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

.contact-avatar {
    width: 5rem;
    height: 5rem;
    background: linear-gradient(135deg, #10b981, #059669);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    position: relative;
    z-index: 1;
}

.contact-avatar::after {
    content: '';
    position: absolute;
    inset: -3px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981, #059669);
    opacity: 0.3;
    z-index: -1;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.2); opacity: 0.1; }
}

.section-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, #10b981, #059669);
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
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    transform: translateX(5px);
}

.contact-detail {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 0.75rem;
    border-left: 4px solid #10b981;
    transition: all 0.3s ease;
}

.dark .contact-detail {
    background: rgba(0, 0, 0, 0.3);
}

.contact-detail:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(16, 185, 129, 0.1);
}

.contact-icon {
    width: 2.5rem;
    height: 2.5rem;
    background: linear-gradient(135deg, #10b981, #059669);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.contact-action {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    border-radius: 2rem;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.contact-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
}

.organization-info {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05));
    border: 1px solid rgba(16, 185, 129, 0.2);
    border-radius: 1rem;
    padding: 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.organization-logo {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, #10b981, #059669);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.email-highlight {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 1rem 2rem;
    border-radius: 2rem;
    text-align: center;
    margin: 2rem 0;
    font-size: 1.1rem;
    font-weight: 600;
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
}

.location-badge {
    display: inline-block;
    background: rgba(16, 185, 129, 0.1);
    color: #065f46;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 600;
    margin-top: 1rem;
}

.dark .location-badge {
    background: rgba(16, 185, 129, 0.2);
    color: #10b981;
}
</style>

<!-- Hero Section -->
<section class="contact-hero min-h-[60vh] flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Contact Us
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Get in Touch with Project Team
            </p>
            <p class="text-lg mb-8 opacity-80 max-w-2xl mx-auto">
                Connect with TreKshitiZ Sudhagad Project coordinators for participation, collaboration, and support
            </p>
            <div class="flex flex-wrap justify-center gap-6 text-sm">
                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
                    <i class="fas fa-phone mr-2"></i>
                    Direct Contact
                </span>
                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
                    <i class="fas fa-envelope mr-2"></i>
                    Email Support
                </span>
                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Dombivli Based
                </span>
            </div>
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
                        <a href="/about/sudhagad-project/contact" class="nav-link active">
                            <i class="fas fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3">
                <!-- Contact Introduction -->
                <div class="contact-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-address-book text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Project Team Contacts</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        Connect with our dedicated team members for any inquiries related to Sudhagad fort conservation project, 
                        volunteer opportunities, or collaboration proposals.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div class="contact-grid">
                    <!-- 1. Shree Sudhir Puranik -->
                    <div class="contact-card">
                        <div class="contact-avatar">
                            <i class="fas fa-user-tie text-white text-2xl"></i>
                        </div>
                        <div class="text-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Shree Sudhir Puranik</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-1">Professor of Physics</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">J.N.Paliwala College, Pali</p>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-phone text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Phone</h4>
                                    <p class="text-gray-600 dark:text-gray-300">02142 242033</p>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">(from Mumbai dial 952142)</p>
                                </div>
                            </div>
                            
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Email</h4>
                                    <p class="text-gray-600 dark:text-gray-300">sudhirpuranik@hotmail.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-center gap-3 mt-4">
                            <a href="tel:02142242033" class="contact-action">
                                <i class="fas fa-phone"></i>
                                Call
                            </a>
                            <a href="mailto:sudhirpuranik@hotmail.com" class="contact-action">
                                <i class="fas fa-envelope"></i>
                                Email
                            </a>
                        </div>
                    </div>

                    <!-- 2. Rahul Meshram -->
                    <div class="contact-card">
                        <div class="contact-avatar">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        <div class="text-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Rahul Meshram</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-1">TreKshitiz Sanstha Member</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Project Coordinator</p>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-mobile-alt text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Mobile</h4>
                                    <p class="text-gray-600 dark:text-gray-300">+91 9987647607</p>
                                </div>
                            </div>
                            
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Email</h4>
                                    <p class="text-gray-600 dark:text-gray-300">rahul.mesh@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-center gap-3 mt-4">
                            <a href="tel:+919987647607" class="contact-action">
                                <i class="fas fa-mobile-alt"></i>
                                Call
                            </a>
                            <a href="mailto:rahul.mesh@gmail.com" class="contact-action">
                                <i class="fas fa-envelope"></i>
                                Email
                            </a>
                        </div>
                    </div>

                    <!-- 3. Prasad Nikte -->
                    <div class="contact-card">
                        <div class="contact-avatar">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        <div class="text-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Prasad Nikte</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-1">TreKshitiz Sanstha Member</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Team Member</p>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-phone text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Phone</h4>
                                    <p class="text-gray-600 dark:text-gray-300">022 2544 1072</p>
                                </div>
                            </div>
                            
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-mobile-alt text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Mobile</h4>
                                    <p class="text-gray-600 dark:text-gray-300">098201 83101</p>
                                </div>
                            </div>
                            
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Email</h4>
                                    <p class="text-gray-600 dark:text-gray-300">Prasad.Nikte@siemens.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-center gap-3 mt-4">
                            <a href="tel:02225441072" class="contact-action">
                                <i class="fas fa-phone"></i>
                                Call
                            </a>
                            <a href="mailto:Prasad.Nikte@siemens.com" class="contact-action">
                                <i class="fas fa-envelope"></i>
                                Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- General Contact Information -->
                <div class="contact-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-info-circle text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">General Information</h2>
                    
                    <div class="email-highlight">
                        <i class="fas fa-envelope mr-3"></i>
                        You can always write us at: <strong>harshal.r.mahajan@gmail.com</strong>
                    </div>
                    
                    <div class="organization-info">
                        <div class="organization-logo">
                            <i class="fas fa-mountain text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">TreKshitiz Sanstha</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Registered NGO dedicated to fort conservation and heritage preservation
                        </p>
                        <div class="location-badge">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Dombivli, Maharashtra
                        </div>
                    </div>
                </div>

                <!-- Contact Guidelines -->
                <div class="contact-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-handshake text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">How to Reach Us</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">For Project Participation</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Contact <strong>Rahul Meshram</strong> for upcoming activities</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Join our conservation treks and volunteer programs</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Get updates on project progress and events</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">For Academic Collaboration</h3>
                            <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Contact <strong>Prof. Sudhir Puranik</strong> for research collaboration</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Educational institution partnerships</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Student project opportunities</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-emerald-600 to-emerald-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Ready to Join Our Conservation Mission?</h2>
            <p class="text-xl mb-8 opacity-90">
                Connect with our team today and become part of Sudhagad's preservation journey
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:+919987647607" class="bg-white text-emerald-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    <i class="fas fa-phone mr-2"></i>
                    Call Rahul Meshram
                </a>
                <a href="mailto:harshal.r.mahajan@gmail.com" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-emerald-600 transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Send Email
                </a>
            </div>
            <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm opacity-90">
                <span><i class="fas fa-clock mr-1"></i> Response within 24 hours</span>
                <span><i class="fas fa-users mr-1"></i> All welcome to participate</span>
                <span><i class="fas fa-heart mr-1"></i> Volunteer-driven initiative</span>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations and contact interactions
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for sections
    const sections = document.querySelectorAll('.contact-card, .contact-section');
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

    // Contact card interactions
    const contactCards = document.querySelectorAll('.contact-card');
    contactCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Phone number and email click animations
    const contactActions = document.querySelectorAll('.contact-action');
    contactActions.forEach(action => {
        action.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });

    // Copy to clipboard functionality for email
    const emailHighlight = document.querySelector('.email-highlight');
    if (emailHighlight) {
        emailHighlight.addEventListener('click', function() {
            const email = 'harshal.r.mahajan@gmail.com';
            navigator.clipboard.writeText(email).then(() => {
                // Show temporary feedback
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check mr-3"></i>Email copied to clipboard!';
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 2000);
            });
        });
        
        emailHighlight.style.cursor = 'pointer';
        emailHighlight.title = 'Click to copy email';
    }
});
</script>

<?php
// Include footer
include '../includes/footer.php';
?>