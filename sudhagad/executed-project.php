<?php
// Set page specific variables
$page_title = 'How Executed - Sudhagad Project | TreKshitiZ';
$meta_description = 'Learn how Sudhagad Project is being executed through coordination team, financial support, and local community involvement. Official activity by Kshitiz Group.';
$meta_keywords = 'Sudhagad project execution, coordination team, financial support, local support, Kshitiz Group, NGO, fort conservation management';

// Include header
include '../includes/header.php';
?>

<style>
/* How Executed specific styles */
.execution-hero {
    background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(160, 82, 45, 0.8)), 
                url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.execution-section {
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.dark .execution-section {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.execution-section:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.execution-card {
    background: linear-gradient(135deg, rgba(139, 69, 19, 0.1), rgba(160, 82, 45, 0.05));
    border: 1px solid rgba(139, 69, 19, 0.2);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.execution-card:hover {
    transform: translateY(-5px);
    border-color: rgba(139, 69, 19, 0.4);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.1);
}

.execution-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(139, 69, 19, 0.05), transparent);
    transform: rotate(45deg);
    transition: all 0.6s;
    opacity: 0;
}

.execution-card:hover::before {
    animation: shimmer 2s ease-in-out;
}

@keyframes shimmer {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
}

.execution-icon {
    width: 4rem;
    height: 4rem;
    background: linear-gradient(135deg, #8b4513, #a0522d);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.execution-icon::after {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 50%;
    background: linear-gradient(135deg, #8b4513, #a0522d);
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
    background: linear-gradient(135deg, #8b4513, #a0522d);
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
    background: linear-gradient(135deg, #8b4513, #a0522d);
    color: white;
    transform: translateX(5px);
}

.execution-point {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 0.75rem;
    border-left: 4px solid #8b4513;
    transition: all 0.3s ease;
}

.dark .execution-point {
    background: rgba(0, 0, 0, 0.2);
}

.execution-point:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
}

.highlight-box {
    background: linear-gradient(135deg, rgba(139, 69, 19, 0.1), rgba(160, 82, 45, 0.05));
    border: 1px solid rgba(139, 69, 19, 0.2);
    border-radius: 0.75rem;
    padding: 1.5rem;
    margin: 1rem 0;
}

.ngo-badge {
    display: inline-block;
    background: linear-gradient(135deg, #8b4513, #a0522d);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 600;
    margin-top: 1rem;
}

.team-structure {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.team-member {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.dark .team-member {
    background: var(--surface-dark);
    border-color: var(--dark-border);
}

.team-member:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.support-flow {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 2rem;
}

.support-step {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(139, 69, 19, 0.05);
    border-radius: 0.75rem;
    border: 1px solid rgba(139, 69, 19, 0.1);
    transition: all 0.3s ease;
}

.support-step:hover {
    background: rgba(139, 69, 19, 0.1);
    transform: translateY(-2px);
}

.step-number {
    width: 2.5rem;
    height: 2.5rem;
    background: linear-gradient(135deg, #8b4513, #a0522d);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    flex-shrink: 0;
}
</style>

<!-- Hero Section -->
<section class="execution-hero min-h-[60vh] flex items-center justify-center text-white relative">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                How Executed
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Project Execution Strategy
            </p>
            <p class="text-lg mb-8 opacity-80 max-w-2xl mx-auto">
                How is Sudhagad Project being executed? Learn about our organized approach to fort conservation
            </p>
            <div class="ngo-badge">
                <i class="fas fa-certificate mr-2"></i>
                Official Activity by Kshitiz Group
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
                        <a href="/about/sudhagad-project/execution" class="nav-link active">
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
                <div class="execution-section p-8 mb-8">
                    <div class="section-icon">
                        <i class="fas fa-project-diagram text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">How is Sudhagad Project being executed?</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        Sudhagad project is an official activity undertaken by the <strong>Kshitiz Group</strong>. The project follows a structured 
                        approach with dedicated teams and systematic execution methodology.
                    </p>
                </div>

                <!-- Co-ordination Team -->
                <div class="execution-card">
                    <div class="execution-icon">
                        <i class="fas fa-users-cog text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Co-ordination Team</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Any such project needs a lot of planning and organization. This activity can be done effectively, if a small group of 
                            people is assigned to it. Keeping this in mind, a <strong>"Co-ordination Team"</strong> was set up in September 2005.
                        </p>
                        <p class="mb-4">
                            <strong>Team Responsibility:</strong> Task of this team is to meet regularly and to make all the planning and organization 
                            required to execute the project. Practically, any individual - whether a member of Kshitiz group or not - can be part 
                            of the co-ordination team, provided he / she is willing to work on the project more or less regularly on mid / long term.
                        </p>
                        <p class="mb-4">
                            However, setting up of the team does not mean that all the activities are carried out only by the co-ordination team members. 
                            In fact, for actual execution of various activities in the project, a support from as many individuals as possible is required.
                        </p>
                        <p class="font-semibold text-amber-600 dark:text-amber-400">
                            Any person, who is interested in contributing to this project, can take part for any of the activity treks.
                        </p>
                        
                        <div class="not-prose highlight-box">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-lightbulb text-amber-500 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-amber-700 dark:text-amber-400 mb-2">Open Participation</h4>
                                    <p class="text-amber-600 dark:text-amber-300 text-sm">
                                        The coordination team welcomes participation from anyone committed to long-term involvement, 
                                        regardless of their affiliation with Kshitiz group.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financial Support -->
                <div class="execution-card">
                    <div class="execution-icon">
                        <i class="fas fa-hand-holding-usd text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Financial Support</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Fort conservation needs money. In the initial phase of the project, the interested individuals used to gather their own 
                            contribution to execute various tasks. (E.g. for employing labour in removal of soil from the Mahadarvaza).
                        </p>
                        <p class="mb-4">
                            However, as the <strong>Kshitiz Group is now a registered NGO</strong>, individuals / organizations interested in fort 
                            conservation can donate money directly to the group, which will be used specifically for this purpose.
                        </p>
                        
                        <div class="not-prose">
                            <div class="support-flow">
                                <div class="support-step">
                                    <div class="step-number">1</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 dark:text-white mb-1">Initial Phase</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                                            Individual contributions from interested participants for immediate project needs
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="support-step">
                                    <div class="step-number">2</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 dark:text-white mb-1">NGO Registration</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                                            Kshitiz Group achieved registered NGO status for better financial management
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="support-step">
                                    <div class="step-number">3</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 dark:text-white mb-1">Direct Donations</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                                            Organizations and individuals can now donate directly to the registered NGO
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="support-step">
                                    <div class="step-number">4</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 dark:text-white mb-1">Dedicated Usage</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                                            All donations are used specifically for Sudhagad conservation purposes
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="not-prose highlight-box mt-4">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-certificate text-amber-500 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-amber-700 dark:text-amber-400 mb-2">NGO Status Benefits</h4>
                                    <p class="text-amber-600 dark:text-amber-300 text-sm">
                                        Registered NGO status ensures transparency, accountability, and proper utilization of donated funds 
                                        for conservation activities.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Local Support -->
                <div class="execution-card">
                    <div class="execution-icon">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Local Support</h3>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                        <p class="mb-4">
                            Money is one thing. But any fort conservation project can not be successful without gathering support from the local people. 
                            In that regard this project has been quite lucky from the beginning.
                        </p>
                        <p class="mb-4">
                            The project is supported by many local residents. Especially <strong>Shri Puranik</strong> (vice Principal at the 
                            <strong>J.N.Paliwala College, Pali</strong>) and his motivated students have been with the project from its initial stage.
                        </p>
                        <p class="font-semibold text-amber-600 dark:text-amber-400">
                            Continuation of this project without such local support is unthinkable.
                        </p>
                        
                        <div class="not-prose team-structure">
                            <div class="team-member">
                                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-user-tie text-white text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white mb-2">Shri Puranik</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Vice Principal</p>
                                <p class="text-gray-500 dark:text-gray-400 text-xs">J.N.Paliwala College, Pali</p>
                            </div>
                            
                            <div class="team-member">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-users text-white text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white mb-2">College Students</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Motivated Volunteers</p>
                                <p class="text-gray-500 dark:text-gray-400 text-xs">Active since initial stage</p>
                            </div>
                            
                            <div class="team-member">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-home text-white text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white mb-2">Local Residents</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Community Support</p>
                                <p class="text-gray-500 dark:text-gray-400 text-xs">Ongoing assistance</p>
                            </div>
                        </div>
                        
                        <div class="not-prose highlight-box mt-4">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-heart text-red-500 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-red-700 dark:text-red-400 mb-2">Community Partnership</h4>
                                    <p class="text-red-600 dark:text-red-300 text-sm">
                                        The success of Sudhagad project depends heavily on the continued support and participation 
                                        of the local community, particularly the educational institutions.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Execution Process -->
                <div class="execution-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-cogs text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Execution Process</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Planning Phase</h3>
                            <div class="space-y-3">
                                <div class="execution-point">
                                    <i class="fas fa-calendar-alt text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-white">Regular Team Meetings</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">Coordination team meets regularly for planning</p>
                                    </div>
                                </div>
                                <div class="execution-point">
                                    <i class="fas fa-map-marked-alt text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-white">Site Assessment</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">Detailed evaluation of conservation needs</p>
                                    </div>
                                </div>
                                <div class="execution-point">
                                    <i class="fas fa-clipboard-list text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-white">Activity Planning</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">Structured approach to conservation tasks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Implementation Phase</h3>
                            <div class="space-y-3">
                                <div class="execution-point">
                                    <i class="fas fa-hands-helping text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-white">Volunteer Mobilization</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">Organizing volunteers for activity treks</p>
                                    </div>
                                </div>
                                <div class="execution-point">
                                    <i class="fas fa-tools text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-white">Field Execution</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">Hands-on conservation work at the site</p>
                                    </div>
                                </div>
                                <div class="execution-point">
                                    <i class="fas fa-chart-line text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-white">Progress Monitoring</h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">Regular assessment of project outcomes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Success Factors -->
                <div class="execution-section p-8">
                    <div class="section-icon">
                        <i class="fas fa-key text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Key Success Factors</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-lg border border-green-200 dark:border-green-800">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-green-800 dark:text-green-400">Structured Organization</h3>
                                <i class="fas fa-sitemap text-green-600 text-2xl"></i>
                            </div>
                            <p class="text-green-700 dark:text-green-300 text-sm">
                                Well-defined coordination team with clear roles and responsibilities for systematic execution
                            </p>
                        </div>
                        
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg border border-blue-200 dark:border-blue-800">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-blue-800 dark:text-blue-400">Financial Transparency</h3>
                                <i class="fas fa-balance-scale text-blue-600 text-2xl"></i>
                            </div>
                            <p class="text-blue-700 dark:text-blue-300 text-sm">
                                Registered NGO status ensures proper financial management and accountability to donors
                            </p>
                        </div>
                        
                        <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-lg border border-purple-200 dark:border-purple-800">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-purple-800 dark:text-purple-400">Community Integration</h3>
                                <i class="fas fa-users text-purple-600 text-2xl"></i>
                            </div>
                            <p class="text-purple-700 dark:text-purple-300 text-sm">
                                Strong local support creates sustainable foundation for long-term conservation efforts
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-amber-600 to-amber-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Join Our Systematic Conservation Approach</h2>
            <p class="text-xl mb-8 opacity-90">
                Be part of our well-organized, transparent, and community-supported conservation initiative
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/about/sudhagad-project/contact" class="bg-white text-amber-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Contact Team
                </a>
                <a href="/about/sudhagad-project/activities" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-amber-600 transition-colors">
                    <i class="fas fa-hand-helping mr-2"></i>
                    Get Involved
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Add interactive animations
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for sections
    const sections = document.querySelectorAll('.execution-card, .execution-section');
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

    // Animate support flow steps
    const steps = document.querySelectorAll('.support-step');
    steps.forEach((step, index) => {
        step.style.opacity = '0';
        step.style.transform = 'translateX(-20px)';
        step.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        
        setTimeout(() => {
            step.style.opacity = '1';
            step.style.transform = 'translateX(0)';
        }, index * 200);
    });

    // Team member hover effects
    const teamMembers = document.querySelectorAll('.team-member');
    teamMembers.forEach(member => {
        member.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        member.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>

<?php
// Include footer
include '../includes/footer.php';
?>