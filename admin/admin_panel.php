<?php
session_start();

// Check if user is logged in
/*
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}
*/

$page_title = 'Dashboard - Trekshitz Admin Panel';
$current_page = 'dashboard';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2d5016',
                        secondary: '#4a7c23',
                        accent: '#7fb069',
                        forest: '#355e3b',
                        admin: {
                            sidebar: '#1e293b',
                            hover: '#334155',
                            active: '#0f766e'
                        }
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #7fb069;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4a7c23;
        }
    </style>
</head>
<body class="font-poppins bg-gray-50">
    
    <!-- Top Navigation Bar -->
    <nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-primary to-secondary shadow-lg">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <!-- Left: Menu Toggle & Logo -->
                <div class="flex items-center justify-start">
                    <button id="sidebar-toggle" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all">
                        <span class="sr-only">Toggle sidebar</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="admin_dashboard.php" class="flex ml-2 md:mr-24">
                        <i class="fas fa-mountain text-2xl text-white mr-2"></i>
                        <span class="self-center text-xl font-bold whitespace-nowrap text-white">Trekshitz Admin</span>
                    </a>
                </div>
                
                <!-- Right: User Info & Logout -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 text-white">
                        <div class="hidden md:block text-right">
                            <p class="text-sm font-semibold"><?php echo isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'Admin'; ?></p>
                            <p class="text-xs opacity-75">Administrator</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center font-bold text-white border-2 border-white/30">
                            <?php echo strtoupper(substr($_SESSION['admin_username'] ?? 'A', 0, 1)); ?>
                        </div>
                    </div>
                    <a href="admin_logout.php" class="px-4 py-2 text-sm font-medium text-white bg-white/20 rounded-lg hover:bg-white/30 transition-all border border-white/30 hover:border-white/50">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span class="hidden md:inline">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-admin-sidebar border-r border-gray-700 sm:translate-x-0">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            
            <!-- Dashboard -->
            <ul class="space-y-2 font-medium mb-6">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Main Navigation</p>
                </li>
                <li>
                    <a href="admin_dashboard.php" class="flex items-center p-3 text-white rounded-lg bg-admin-active hover:bg-admin-hover group transition-all">
                        <i class="fas fa-tachometer-alt text-accent w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
            </ul>

            <!-- Forts & Historical -->
            <ul class="space-y-2 font-medium mb-6">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Forts & Historical</p>
                </li>
                <li>
                    <button onclick="toggleDropdown('forts-dropdown')" class="flex items-center w-full p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-fort-awesome text-accent w-5"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Forts Management</span>
                        <i class="fas fa-chevron-down w-4 transition-transform" id="forts-dropdown-icon"></i>
                    </button>
                    <ul id="forts-dropdown" class="hidden pl-11 space-y-2 mt-2">
                        <li><a href="admin_forts.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">All Forts</a></li>
                        <li><a href="admin_forts_add.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Add New Fort</a></li>
                        <li><a href="admin_fascinating_spots.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Fascinating Spots</a></li>
                        <li><a href="admin_ways_to_reach.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Ways to Reach</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Trekking -->
            <ul class="space-y-2 font-medium mb-6">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Trekking</p>
                </li>
                <li>
                    <button onclick="toggleDropdown('trek-dropdown')" class="flex items-center w-full p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-hiking text-accent w-5"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Trek Management</span>
                        <i class="fas fa-chevron-down w-4 transition-transform" id="trek-dropdown-icon"></i>
                    </button>
                    <ul id="trek-dropdown" class="hidden pl-11 space-y-2 mt-2">
                        <li><a href="admin_treks.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">All Treks</a></li>
                        <li><a href="admin_treks_add.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Add New Trek</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Nature & Wildlife -->
            <ul class="space-y-2 font-medium mb-6">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Nature & Wildlife</p>
                </li>
                <li>
                    <button onclick="toggleDropdown('nature-dropdown')" class="flex items-center w-full p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-leaf text-accent w-5"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Nature Content</span>
                        <i class="fas fa-chevron-down w-4 transition-transform" id="nature-dropdown-icon"></i>
                    </button>
                    <ul id="nature-dropdown" class="hidden pl-11 space-y-2 mt-2">
                        <li><a href="admin_birds.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Birds</a></li>
                        <li><a href="admin_butterflies.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Butterflies</a></li>
                        <li><a href="admin_flowers.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Flowers</a></li>
                        <li><a href="admin_temples.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Temples</a></li>
                        <li><a href="admin_caves.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Caves</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Gallery -->
            <ul class="space-y-2 font-medium mb-6">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Media</p>
                </li>
                <li>
                    <button onclick="toggleDropdown('gallery-dropdown')" class="flex items-center w-full p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-images text-accent w-5"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Gallery</span>
                        <i class="fas fa-chevron-down w-4 transition-transform" id="gallery-dropdown-icon"></i>
                    </button>
                    <ul id="gallery-dropdown" class="hidden pl-11 space-y-2 mt-2">
                        <li><a href="admin_photos.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">All Photos</a></li>
                        <li><a href="admin_categories.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Categories</a></li>
                        <li><a href="admin_photo_upload.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Upload Photos</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Events & Organizations -->
            <ul class="space-y-2 font-medium mb-6">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Events</p>
                </li>
                <li>
                    <button onclick="toggleDropdown('events-dropdown')" class="flex items-center w-full p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-calendar-alt text-accent w-5"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Events & Orgs</span>
                        <i class="fas fa-chevron-down w-4 transition-transform" id="events-dropdown-icon"></i>
                    </button>
                    <ul id="events-dropdown" class="hidden pl-11 space-y-2 mt-2">
                        <li><a href="admin_events.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">All Events</a></li>
                        <li><a href="admin_organizations.php" class="block p-2 text-sm text-gray-300 rounded-lg hover:bg-admin-hover hover:text-white transition-all">Organizations</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Settings -->
            <ul class="space-y-2 font-medium">
                <li class="mb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 py-2">Settings</p>
                </li>
                <li>
                    <a href="admin_settings.php" class="flex items-center p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-cog text-accent w-5"></i>
                        <span class="ml-3">Configuration</span>
                    </a>
                </li>
                <li>
                    <a href="admin_users.php" class="flex items-center p-3 text-white rounded-lg hover:bg-admin-hover group transition-all">
                        <i class="fas fa-users text-accent w-5"></i>
                        <span class="ml-3">Admin Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64 mt-14">
        <div class="p-4">
            <!-- Page Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard</h1>
                <nav class="text-sm">
                    <span class="text-gray-500">Admin</span>
                    <span class="text-gray-400 mx-2">/</span>
                    <span class="text-primary font-medium">Dashboard</span>
                </nav>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Total Forts -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-fort-awesome text-2xl text-primary"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Total Forts</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-2">350+</p>
                    <p class="text-xs text-green-600"><i class="fas fa-arrow-up mr-1"></i>Active records</p>
                </div>

                <!-- Total Treks -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-hiking text-2xl text-blue-600"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Trek Schedules</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-2">25</p>
                    <p class="text-xs text-blue-600"><i class="fas fa-calendar mr-1"></i>Upcoming</p>
                </div>

                <!-- Gallery Photos -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-images text-2xl text-purple-600"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Gallery Photos</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-2">1,200+</p>
                    <p class="text-xs text-purple-600"><i class="fas fa-photo-video mr-1"></i>Media files</p>
                </div>

                <!-- Events -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar-check text-2xl text-orange-600"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Active Events</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-2">12</p>
                    <p class="text-xs text-orange-600"><i class="fas fa-clock mr-1"></i>This month</p>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="admin_forts_add.php" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors group">
                            <i class="fas fa-plus-circle text-2xl text-primary mr-3"></i>
                            <div>
                                <p class="font-medium text-gray-900">Add New Fort</p>
                                <p class="text-sm text-gray-500">Create fort information</p>
                            </div>
                            <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-primary transition-colors"></i>
                        </a>
                        <a href="admin_treks_add.php" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                            <i class="fas fa-route text-2xl text-blue-600 mr-3"></i>
                            <div>
                                <p class="font-medium text-gray-900">Schedule Trek</p>
                                <p class="text-sm text-gray-500">Add new trek schedule</p>
                            </div>
                            <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                        </a>
                        <a href="admin_photo_upload.php" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors group">
                            <i class="fas fa-upload text-2xl text-purple-600 mr-3"></i>
                            <div>
                                <p class="font-medium text-gray-900">Upload Photos</p>
                                <p class="text-sm text-gray-500">Add to gallery</p>
                            </div>
                            <i class="fas fa-arrow-right ml-auto text-gray-400 group-hover:text-purple-600 transition-colors"></i>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Recent Activity</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2 mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900 font-medium">Fort "Rajgad" updated</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900 font-medium">New trek scheduled</p>
                                <p class="text-xs text-gray-500">5 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900 font-medium">25 photos uploaded</p>
                                <p class="text-xs text-gray-500">1 day ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900 font-medium">Event "Monsoon Trek" created</p>
                                <p class="text-xs text-gray-500">2 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Dropdown Toggle Function
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const icon = document.getElementById(dropdownId + '-icon');
            
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Close sidebar on mobile when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = sidebarToggle.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth < 640) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>