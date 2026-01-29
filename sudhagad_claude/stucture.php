<?php
// Set page specific variables
$page_title = 'Project Structure - Sudhagad Conservation | TreKshitiZ';
$meta_description = 'Structure of Sudhagad Project - Conservation, Exploration, Supporting Activities, and Social Support initiatives for fort preservation.';
$meta_keywords = 'Sudhagad project structure, fort conservation, exploration activities, social support, heritage preservation';

// Include header
include '../../includes/header.php';
?>

<style>
/* Project Structure specific styles */
.structure-hero {
    background: linear-gradient(135deg, rgba(168, 85, 247, 0.9), rgba(59, 130, 246, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.structure-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .structure-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.structure-section:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.activity-card {
    background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(59, 130, 246, 0.05));
    border: 1px solid rgba(168, 85, 247, 0.2);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.activity-card:hover {
    transform: translateY(-5px);
    border-color: rgba(168, 85, 247, 0.4);
    box-shadow: 0 20px 40px rgba(168, 85, 247, 0.1);
}

.activity-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(168, 85, 247, 0.05), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
    opacity: 0;
}

.activity-card:hover::before {
    animation: shimmer 2s ease-in-out;
}

@keyframes shimmer {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
}

.activity-icon {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, #a855f7, #3b82f6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.activity-icon::after {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 50%;
    background: linear-gradient(135deg, #a855f7, #3b82f6);
    opacity: 0.3;
    z-index: -1;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.1); opacity: 0.1; }
}

.section-icon {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, #a855f7, #3b82f6);
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
    background: linear-gradient(135deg, #a855f7, #3b82f6);
    color: white;
    transform: translateX(5px);
}
</style>

<!-- Hero Section -->
<section class="structure-hero min-h-[60vh] flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Project Structure
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Structure of Sudhagad Conservation Project
            </p>
            <p class="text-lg mb-8 opacity-80 max-w-2xl mx-auto">
                The project is sub-divided into following activities for systematic conservation approach
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
                        <a href="/about/sudhagad-project/structure" class="nav-link active">
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
                        <a href="/about/sudhagad-project/contact" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3">
                <!-- Introduction -->
                <div class="structure-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-project-diagram text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Structure of Sudhagad Project</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        The project is sub-divided into following activities to ensure systematic and comprehensive approach 
                        towards fort conservation and community development.
                    </p>
                </div>

                <!-- A. Conservation -->
                <div class="activity-card">
                    <div class="activity-icon">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">A. Conservation</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Conservation of Sudhagad fort is the primary aim of this project. There are many reasons like growth of plants on ramparts, 
                            flow of water, accumulation of soil and human intervention that are causing gradual disintegration of the structures on Sudhagad.
                        </p>
                        <p class="mb-4">
                            The primary aim of this project is to minimize further deterioration of the structures that are still intact. 
                            Restoration is also a part of conservation. However, presently there are many limitations like lack of expertise, 
                            unavailability of funding mechanism for such restoration work and foremost the restrictions in altering the historical sites.
                        </p>
                        <p class="font-semibold text-purple-600 dark:text-purple-400">
                            Hence restoration is presently not a part of the project.
                        </p>
                    </div>
                </div>

                <!-- B. Exploration -->
                <div class="activity-card">
                    <div class="activity-icon">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">B. Exploration</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Though Sudhagad was under good maintenance till India's independence, a lot of construction is now covered by jungle. 
                            Also, many structures are getting buried under soil or have become inaccessible due to land slides.
                        </p>
                        <p class="mb-4">
                            Hence some areas on Sudhagad are either not known to exist anymore or, due to the lack of accessibility, are known to 
                            very few individuals. If maximum structures on Sudhagad are to be conserved, first we should also know, what all exists there.
                        </p>
                        <p class="mb-4">
                            For this reason exploration is also a part of the Sudhagad project. Along with the activities being performed for the 
                            conservation of the site, special exploration treks are also carried out to know more about this beautiful fort.
                        </p>
                    </div>
                </div>

                <!-- C. Supporting Activities -->
                <div class="activity-card">
                    <div class="activity-icon">
                        <i class="fas fa-hands-helping text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">C. Supporting Activities</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            A lot many activities like plantation, study of the plants and animals in that region etc can be taken up when one visits 
                            a fort like Sudhagad. As activities like plantation are of great importance today, the project also involves carrying out 
                            such supportive activities.
                        </p>
                        <p class="font-semibold text-blue-600 dark:text-blue-400">
                            These activities can be easily clubbed with the fort conservation treks.
                        </p>
                    </div>
                </div>

                <!-- D. Social Support -->
                <div class="activity-card">
                    <div class="activity-icon">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">D. Social Support</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Most of the forts in the Sahyadris are in remote areas. Many times the local residents do not have access to jobs, 
                            education or medical facilities like we have in the cities. Visiting these areas, a sensitive mind would always try to think, 
                            <em>"What can I do for these people?"</em>
                        </p>
                        <p class="mb-4">
                            Conservation of any fort ignoring the people inhabiting the surrounding areas will be inhumane. That's why social activity 
                            is also a part of Sudhagad project.
                        </p>
                        <p class="font-semibold text-green-600 dark:text-green-400">
                            E.g. In November 2005 a library was set up Pachchhapur, the base village for Sudhagad.
                        </p>
                    </div>
                </div>

                <!-- Summary -->
                <div class="structure-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-clipboard-check text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Project Summary</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Primary Focus</h3>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Fort Conservation</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Structure Preservation</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Historical Documentation</li>
                            </ul>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3">Supporting Activities</h3>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                                <li><i class="fas fa-check text-blue-500 mr-2"></i>Exploration & Research</li>
                                <li><i class="fas fa-check text-blue-500 mr-2"></i>Environmental Conservation</li>
                                <li><i class="fas fa-check text-blue-500 mr-2"></i>Community Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Join Our Conservation Mission</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
                Be part of this structured approach to heritage conservation and community development
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/about/sudhagad-project/activities-done" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-full font-semibold transition-colors">
                    <i class="fas fa-eye mr-2"></i>
                    View Our Work
                </a>
                <a href="/about/sudhagad-project/contact" class="border-2 border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white px-8 py-3 rounded-full font-semibold transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Get Involved
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for activity cards
    const cards = document.querySelectorAll('.activity-card, .structure-section');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>

<?php
// Include footer
include '../../includes/footer.php';
?>