<?php
// Set page specific variables
$page_title = 'Activities Performed - Sudhagad Project | TreKshitiZ';
$meta_description = 'Detailed documentation of activities performed by TreKshitiZ for Sudhagad fort conservation including soil removal, water tank cleaning, rampart maintenance, and exploration work.';
$meta_keywords = 'Sudhagad activities performed, Mahadarvaza soil removal, water tank cleaning, rampart conservation, fort exploration, TreKshitiZ conservation work';

// Include header
include '../includes/header.php';
?>

<style>
/* Activities Performed specific styles */
.activities-hero {
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.9), rgba(234, 88, 12, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.activities-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .activities-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.activities-section:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.activity-item {
    background: linear-gradient(135deg, rgba(249, 115, 22, 0.1), rgba(234, 88, 12, 0.05));
    border: 1px solid rgba(249, 115, 22, 0.2);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.activity-item:hover {
    transform: translateY(-5px);
    border-color: rgba(249, 115, 22, 0.4);
    box-shadow: 0 20px 40px rgba(249, 115, 22, 0.1);
}

.activity-item::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(249, 115, 22, 0.05), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
    opacity: 0;
}

.activity-item:hover::before {
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
    background: linear-gradient(135deg, #f97316, #ea580c);
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
    background: linear-gradient(135deg, #f97316, #ea580c);
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
    background: linear-gradient(135deg, #f97316, #ea580c);
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
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: white;
    transform: translateX(5px);
}

.exploration-list {
    background: rgba(249, 115, 22, 0.05);
    border-radius: 0.75rem;
    padding: 1rem;
    margin-top: 1rem;
}

.exploration-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
    padding: 0.75rem;
    background: white;
    border-radius: 0.5rem;
    border-left: 4px solid #f97316;
    transition: all 0.3s ease;
}

.dark .exploration-item {
    background: var(--surface-dark);
}

.exploration-item:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(249, 115, 22, 0.1);
}

.progress-bar {
    background: #e5e7eb;
    border-radius: 1rem;
    height: 0.75rem;
    overflow: hidden;
    margin-top: 1rem;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #f97316, #ea580c);
    border-radius: 1rem;
    transition: width 1s ease;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.stat-card {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.dark .stat-card {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.image-placeholder {
    width: 100%;
    height: 200px;
    background: linear-gradient(135deg, #f97316, #ea580c);
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin: 1rem 0;
}
</style>

<!-- Hero Section -->
<section class="activities-hero min-h-[60vh] flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Activities Performed
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Conservation Work by TreKshitiZ
            </p>
            <p class="text-lg mb-8 opacity-80 max-w-2xl mx-auto">
                Detailed documentation of all conservation activities performed at Sudhagad fort
            </p>
            <div class="flex flex-wrap justify-center gap-6 text-sm">
                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
                    <i class="fas fa-hammer mr-2"></i>
                    Soil Removal
                </span>
                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
                    <i class="fas fa-tint mr-2"></i>
                    Water Tank Cleaning
                </span>
                <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full backdrop-blur-sm">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Rampart Conservation
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
                        <a href="/about/sudhagad-project/activities-done" class="nav-link active">
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
                <div class="activities-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-clipboard-check text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Activities Performed by TreKshitiZ</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        Since the inception of Project Sudhagad in June 2004, TreKshitiZ has undertaken numerous conservation activities 
                        to preserve this historic fort. Below is a comprehensive overview of all the work completed so far.
                    </p>
                </div>

                <!-- 1. Soil Removal from Mahadarvaza -->
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-hammer text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Soil Removal from Mahadarvaza</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Over the years heavy monsoon has caused a lot of land slides on Sudhagad. Due to this the Mahadarvaza of Sudhagad 
                            was completely filled with soil and boulders. At one point of time there was so much of debris that it was difficult 
                            even to pass through the Darvaza.
                        </p>
                        <p class="mb-4">
                            In the late 1980s, <strong>"Nisargamitra" of Panvel</strong> had carried out soil removal at Sudhagad Mahadarvaza. 
                            Today TreKshitiZ is taking that task further.
                        </p>
                        <p class="mb-4">
                            <strong>Current Progress:</strong> Till date more than 50% of the soil is already removed and the target is to complete 
                            the removal of all the soil and debris from this entrance.
                        </p>
                        <p class="mb-4">
                            <strong>Collaborators:</strong> Paliwala College (Lead by Puranik Sir), Girimitra Pratishthan have also contributed to this activity.
                        </p>
                        
                        <!-- Progress Bar -->
                        <div class="not-prose">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Progress</span>
                                <span class="text-sm font-semibold text-orange-600">50%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 50%;"></div>
                            </div>
                        </div>
                        
                        <!-- Photo Gallery Placeholder -->
                        <div class="image-placeholder mt-4">
                            <div class="text-center">
                                <i class="fas fa-images text-4xl mb-2"></i>
                                <p>Photo Gallery: Mahadarvaza Soil Removal</p>
                                <p class="text-sm opacity-75">Before & After Documentation</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Water Tank Cleaning Activities -->
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-tint text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Water Tank Cleaning Activities</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Sudhagad has around <strong>15 water tanks</strong> in its periphery which were constructed when fort was at its reign. 
                            Team TreKshitiZ has decided to clean 3 major water tanks which are on the southern face of this fort.
                        </p>
                        <p class="mb-4">
                            <strong>Supporting Organizations:</strong> Many organisations like <strong>Durgmitra, Panvel</strong> and 
                            <strong>Durgmitra, Dombivli</strong> have selflessly supported and also taken this initiative further.
                        </p>
                        
                        <div class="not-prose">
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <div class="text-3xl font-bold text-orange-600 mb-2">15</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Total Water Tanks</div>
                                </div>
                                <div class="stat-card">
                                    <div class="text-3xl font-bold text-orange-600 mb-2">3</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Major Tanks Cleaned</div>
                                </div>
                                <div class="stat-card">
                                    <div class="text-3xl font-bold text-orange-600 mb-2">3</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Partner Organizations</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Cleaning of Ramparts -->
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Cleaning of Ramparts</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            A lot of structure at Sudhagad is still intact. Many walls, including the ramparts at the Maha- and the Chordarvaza 
                            are in good condition. However, these walls are getting destroyed due to the growth of shrubs and even big trees on them.
                        </p>
                        <p class="mb-4">
                            <strong>The Problem:</strong> The force exerted by the roots of these trees is at times so great, that even stone bricks 
                            weighing hundreds of kilos are actually lifted from their locations.
                        </p>
                        <p class="mb-4">
                            <strong>Our Solution:</strong> In order to prevent further damage to these structures, removal of this vegetation from 
                            the walls is undertaken from time to time.
                        </p>
                        
                        <div class="not-prose bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border-l-4 border-red-500 mt-4">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-exclamation-triangle text-red-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-red-700 dark:text-red-400 mb-2">Critical Issue</h4>
                                    <p class="text-red-600 dark:text-red-300 text-sm">
                                        Tree roots can displace stone blocks weighing hundreds of kilograms, causing structural damage
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Plantation -->
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-seedling text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Plantation</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Today any single tree, either saved or planted is of great value. Keeping this in mind plantation activity is undertaken 
                            during group treks at the end of the summer season.
                        </p>
                        
                        <div class="not-prose bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border-l-4 border-green-500 mt-4">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-leaf text-green-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-green-700 dark:text-green-400 mb-2">Environmental Impact</h4>
                                    <p class="text-green-600 dark:text-green-300 text-sm">
                                        Strategic plantation efforts help restore the fort's ecosystem while preserving its historical integrity
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Library -->
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-book text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Library</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            A library has been set up at <strong>Pachchhapur</strong>, which is the base village for Sudhagad. This library was 
                            established by the joint efforts of <strong>Kshitiz Groups</strong> and the <strong>Paliwala College, Pali</strong>.
                        </p>
                        <p class="mb-4">
                            <strong>Infrastructure:</strong> Space for the library is provided by <strong>Shri Ghosalkar</strong>, who runs a school at Pachchhapur.
                        </p>
                        
                        <div class="not-prose bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border-l-4 border-blue-500 mt-4">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-graduation-cap text-blue-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-blue-700 dark:text-blue-400 mb-2">Community Development</h4>
                                    <p class="text-blue-600 dark:text-blue-300 text-sm">
                                        The library serves as an educational resource for the local community, promoting literacy and awareness
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Exploration -->
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Exploration</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">Following exploration work is done so far:</p>
                        
                        <div class="not-prose exploration-list">
                            <div class="exploration-item">
                                <div class="text-orange-600 text-xl">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-1">Eastern Buruz Discovery</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                                        Finding of an almost unknown Buruz on the eastern side of the fort
                                    </p>
                                </div>
                            </div>
                            
                            <div class="exploration-item">
                                <div class="text-orange-600 text-xl">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-1">Dhondase Buruz Access</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                                        Accessing the Buruz (Bastian) on Dhondase side. This Buruz has a "duheree" (double) construction and very beautiful carvings
                                    </p>
                                </div>
                            </div>
                            
                            <div class="exploration-item">
                                <div class="text-orange-600 text-xl">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-1">Chor Darvaza Buruz</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                                        Accessing the Buruz opposite to the Chor Darvaza. Due to landslides this Buruz has become less accessible. 
                                        Present approach has a lot of scree on it, and hence a bit risky. So better not to be tried alone / without proper knowledge.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="exploration-item">
                                <div class="text-orange-600 text-xl">
                                    <i class="fas fa-route"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-1">Various Routes to Reach Top</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                                        There are four different routes to reach the top of Sudhagad from its base:
                                        <br>1. Through Mahadarvaza
                                        <br>2. Through Chordarvaza
                                        <br>3. From Thakurvadi
                                        <br>4. Through the gorge between "Bolate Kade"
                                        <br><em>All are easy climbs.</em>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="exploration-item">
                                <div class="text-orange-600 text-xl">
                                    <i class="fas fa-walking"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 dark:text-white mb-1">Sudhagad Pradakshina</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                                        A very interesting and easy trek around the fort perimeter
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Summary -->
                <div class="activities-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Overall Progress Summary</h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-lg border border-green-200 dark:border-green-800">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-green-800 dark:text-green-400">Completed Activities</h3>
                                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                            </div>
                            <ul class="space-y-2 text-green-700 dark:text-green-300 text-sm">
                                <li>• Library establishment</li>
                                <li>• Plantation drives</li>
                                <li>• Exploration mapping</li>
                                <li>• Water tank cleaning (3/15)</li>
                            </ul>
                        </div>
                        
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 p-6 rounded-lg border border-yellow-200 dark:border-yellow-800">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-400">Ongoing Activities</h3>
                                <i class="fas fa-clock text-yellow-600 text-2xl"></i>
                            </div>
                            <ul class="space-y-2 text-yellow-700 dark:text-yellow-300 text-sm">
                                <li>• Mahadarvaza soil removal (50%)</li>
                                <li>• Rampart vegetation cleaning</li>
                                <li>• Structural documentation</li>
                                <li>• Community engagement</li>
                            </ul>
                        </div>
                        
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg border border-blue-200 dark:border-blue-800">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-blue-800 dark:text-blue-400">Future Plans</h3>
                                <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                            </div>
                            <ul class="space-y-2 text-blue-700 dark:text-blue-300 text-sm">
                                <li>• Complete soil removal</li>
                                <li>• Remaining water tanks</li>
                                <li>• Advanced exploration</li>
                                <li>• Heritage documentation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-orange-600 to-orange-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Support Our Conservation Efforts</h2>
            <p class="text-xl mb-8 opacity-90">
                Join us in preserving Sudhagad's heritage through active participation in our conservation activities
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/about/sudhagad-project/activities" class="bg-white text-orange-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    <i class="fas fa-hand-helping mr-2"></i>
                    Get Involved
                </a>
                <a href="/about/sudhagad-project/execution" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-orange-600 transition-colors">
                    <i class="fas fa-cogs mr-2"></i>
                    How We Execute
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations and progress bar animation
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for sections
    const sections = document.querySelectorAll('.activity-item, .activities-section');
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

    // Progress bar animation
    const progressBars = document.querySelectorAll('.progress-fill');
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const width = entry.target.style.width;
                entry.target.style.width = '0%';
                setTimeout(() => {
                    entry.target.style.width = width;
                }, 500);
            }
        });
    });

    progressBars.forEach(bar => {
        progressObserver.observe(bar);
    });

    // Stat counter animation
    const statNumbers = document.querySelectorAll('.stat-card .text-3xl');
    statNumbers.forEach(stat => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.textContent);
                    let current = 0;
                    const increment = target / 30;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        entry.target.textContent = Math.floor(current);
                    }, 50);
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