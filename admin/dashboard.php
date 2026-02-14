<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

require_once '../config/database.php';

// Handle AJAX requests
if (isset($_GET['action']) && $_GET['action'] === 'load_content') {
    $page = $_GET['page'] ?? 'dashboard';
    
    // Load appropriate content based on page
    switch($page) {
        case 'dashboard':
            include 'partials/dashboard_content.php';
            break;
        case 'forts':
            include 'partials/forts_list.php';
            break;
        case 'forts-add':
            include 'partials/forts_add.php';
            break;
        case 'fascinating-spots':
            include 'partials/fascinating_spots.php';
            break;
        case 'ways-to-reach':
            include 'partials/ways_to_reach.php';
            break;
        case 'treks':
            include 'partials/treks_list.php';
            break;
        case 'treks-add':
            include 'partials/treks_add_sidebar.php';
            break;
        case 'birds':
            include 'partials/birds_list.php';
            break;
        case 'butterflies':
            include 'partials/butterflies_list.php';
            break;
        case 'flowers':
            include 'partials/flowers_list.php';
            break;
        case 'temples':
            include 'partials/temples_list.php';
            break;
        case 'temples-add':
            include 'partials/temples_add.php';
            break;
        case 'jungles':
            include 'partials/jungles_list.php';
            break;
        case 'jungles-add':
            include 'partials/jungles_add.php';
            break;
        case 'weapons':
            include 'partials/weapons_list.php';
            break;
        case 'weapons-add':
            include 'partials/weapons_add.php';
            break;
        case 'caves':
            include 'partials/caves_list.php';
            break;
        case 'photos':
            include 'partials/photos_list.php';
            break;
        case 'categories':
            include 'partials/categories_list.php';
            break;
        case 'photo-upload':
            include 'partials/photo_upload.php';
            break;
        case 'fort-photos':
            include 'partials/fort_photos.php';
            break;
        case 'temple-photos':
            include 'partials/temple_photos.php';
            break;
        case 'weapon-photos':
            include 'partials/weapon_photos.php';
            break;
        case 'jungle-photos':
            include 'partials/jungle_photos.php';
            break;
        case 'map-photos':
            include 'partials/map_photos.php';
            break;
        case 'nature-photos':
            include 'partials/nature_photos.php';
            break;
        case 'home-photos':
            include 'partials/home_photos.php';
            break;
        case 'trek-photos':
            include 'partials/trek_photos.php';
            break;
        case 'events':
            include 'partials/events_list.php';
            break;
        case 'organizations':
            include 'partials/organizations_list.php';
            break;
        case 'settings':
            include 'partials/settings_ui.php';
            break;
        case 'users':
            include 'partials/admin_users.php';
            break;
        default:
            echo '<div class="p-6"><h2 class="text-2xl font-bold">Page not found</h2></div>';
    }
    exit;
}

$page_title = 'Admin Dashboard - Trekshitz';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2d5016',
                        secondary: '#4a7c23',
                        accent: '#7fb069'
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Compact scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #7fb069;
            border-radius: 3px;
        }
        
        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.3s ease;
        }
        
        .dropdown-content.open {
            max-height: 500px;
            opacity: 1;
        }
        
        /* Fade animations */
        .fade-out {
            animation: fadeOut 0.2s ease-out forwards;
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease-in forwards;
        }
        
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-10px);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom Scrollbar for content areas */
.custom-scrollbar::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #e5e7eb;
    border-radius: 4px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #9ca3af;
    border-radius: 4px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #6b7280;
}

/* Smooth scrolling */
.custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: #9ca3af #e5e7eb;
}
    
    </style>
</head>
<body class="bg-gray-100 font-sans">
    
    <!-- Compact Top Navbar -->
    <nav class="fixed top-0 left-0 right-0 h-12 bg-gradient-to-r from-primary to-secondary shadow-md z-50">
        <div class="flex items-center justify-between h-full px-3">
            <!-- Left -->
            <div class="flex items-center gap-2">
                <button id="sidebar-toggle" class="text-white hover:bg-white/10 p-1.5 rounded">
                    <i class="fas fa-bars text-sm"></i>
                </button>
                <i class="fas fa-mountain text-white text-lg"></i>
                <span class="text-white font-bold text-sm">Trekshitz Admin</span>
            </div>
            
            <!-- Right -->
            <div class="flex items-center gap-2">
                <span class="text-white text-xs hidden md:inline"><?php echo $_SESSION['admin_username'] ?? 'Admin'; ?></span>
                <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-white text-xs font-bold border border-white/30">
                    <?php echo strtoupper(substr($_SESSION['admin_username'] ?? 'A', 0, 1)); ?>
                </div>
                <a href="admin_logout.php" class="text-white hover:bg-white/10 px-2 py-1 rounded text-xs">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Compact Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-12 bottom-0 w-52 bg-gray-800 text-white overflow-y-auto transition-transform duration-300 z-40">
        <div class="p-2">
            
            <!-- Dashboard -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Main Navigation</p>
                <a href="#" data-page="dashboard" class="nav-link flex items-center px-2 py-1.5 rounded hover:bg-gray-700 text-sm active">
                    <i class="fas fa-tachometer-alt w-4 mr-2 text-accent text-xs"></i>
                    <span>Dashboard</span>
                </a>
                <!-- Dashboard Marathi (FULL PAGE LOAD) -->
                <a href="dashboard_marathi.php"
                   class="nav-link-full flex items-center px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <i class="fas fa-language w-4 mr-2 text-accent text-xs"></i>
                    <span>Dashboard (मराठी)</span>
                </a>
                
            </div>

            <!-- Forts & Historical -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Forts & Historical</p>
                <button onclick="toggleDropdown('forts-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-fort-awesome w-4 mr-2 text-accent text-xs"></i>
                        <span>Forts Management</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="forts-menu-icon"></i>
                </button>
                <div id="forts-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="forts" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">All Forts</a>
                    <a href="#" data-page="forts-add" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Add New Fort</a>
                    <a href="#" data-page="fascinating-spots" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Fascinating Spots</a>
                    <a href="#" data-page="ways-to-reach" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Ways to Reach</a>
                </div>
            </div>

            <!-- Important Information -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">
                    Important Information
                </p>

                <button onclick="toggleDropdown('important-menu')"
                    class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle w-4 mr-2 text-accent text-xs"></i>
                        <span>Important Info</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform"
                    id="important-menu-icon"></i>
                </button>

                <div id="important-menu" class="dropdown-content pl-6">

                    <!-- Temples -->
                    <a href="#"
                    data-page="temples"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Temples
                    </a>

                    <a href="#"
                    data-page="temples-add"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Add Temple
                    </a>

                    <!-- Jungle -->
                    <a href="#"
                    data-page="jungles"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Jungles
                    </a>

                    <a href="#"
                    data-page="jungles-add"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Add Jungle
                    </a>

                    <!-- Weapons -->
                    <a href="#"
                    data-page="weapons"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Weapons
                    </a>

                    <a href="#"
                    data-page="weapons-add"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Add Weapon
                    </a>

                </div>
            </div>

            <!-- Trekking -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Trekking</p>
                <button onclick="toggleDropdown('trek-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-hiking w-4 mr-2 text-accent text-xs"></i>
                        <span>Trek Management</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="trek-menu-icon"></i>
                </button>
                <div id="trek-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="treks" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">All Treks</a>
                    <a href="#" data-page="treks-add" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Add New Trek</a>
                </div>
            </div>

            <!-- Nature & Wildlife -->
           <!-- <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Nature & Wildlife</p>
                <button onclick="toggleDropdown('nature-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-leaf w-4 mr-2 text-accent text-xs"></i>
                        <span>Nature Content</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="nature-menu-icon"></i>
                </button>
                <div id="nature-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="birds" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Birds</a>
                    <a href="#" data-page="butterflies" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Butterflies</a>
                    <a href="#" data-page="flowers" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Flowers</a>
                    <a href="#" data-page="temples" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Temples</a>
                    <a href="#" data-page="caves" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Caves</a>
                </div>
            </div>-->

            <!-- Gallery -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Media</p>
                <button onclick="toggleDropdown('gallery-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-images w-4 mr-2 text-accent text-xs"></i>
                        <span>Gallery</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="gallery-menu-icon"></i>
                </button>
                <div id="gallery-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="fort-photos" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Fort Photos</a>
                    <a href="#"
                    data-page="temple-photos"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Temple Photos
                    </a>
                    <a href="#"
                        data-page="weapon-photos"
                        class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                            Weapon Photos
                    </a>
                    <a href="#"
                    data-page="jungle-photos"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Jungle Photos
                    </a>
                    <a href="#" data-page="trek-photos"
                     class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Trek Photos
                    </a>
                    <a href="#" data-page="map-photos" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Map Photos</a>
                    <a href="#" data-page="nature-photos" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Nature Photos</a>
                    <a href="#"
                    data-page="home-photos"
                    class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">
                        Home Page Photos
                    </a>
                    <!--  <a href="#" data-page="photos" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">All Photos</a>
                    <a href="#" data-page="categories" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Categories</a>
                    <a href="#" data-page="photo-upload" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Upload Photos</a>-->
                </div>
            </div>

            <!-- Events & Organizations -->
         <!--   <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Events</p>
                <button onclick="toggleDropdown('events-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt w-4 mr-2 text-accent text-xs"></i>
                        <span>Events & Orgs</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="events-menu-icon"></i>
                </button>
                <div id="events-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="events" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">All Events</a>
                    <a href="#" data-page="organizations" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Organizations</a>
                </div>
            </div>-->

            <!-- Settings -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Settings</p>
              <!--  <a href="#" data-page="settings" class="nav-link flex items-center px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <i class="fas fa-cog w-4 mr-2 text-accent text-xs"></i>
                    <span>Configuration</span>
                </a>-->
                <a href="#" data-page="users" class="nav-link flex items-center px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <i class="fas fa-users w-4 mr-2 text-accent text-xs"></i>
                    <span>Admin Users</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main id="main-content" class="ml-52 mt-12 p-4 transition-all duration-300">
        <!-- Loading Spinner -->
        <div id="loading" class="hidden fixed inset-0 bg-black/20 flex items-center justify-center z-50">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <i class="fas fa-spinner fa-spin text-2xl text-primary"></i>
                <p class="text-sm mt-2">Loading...</p>
            </div>
        </div>

        <!-- Content will be loaded here dynamically -->
        <div id="content-container">
            <!-- Default Dashboard Content -->
            <?php include 'partials/dashboard_content.php'; ?>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        // Sidebar toggle
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            sidebar.classList.toggle('-translate-x-full');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                mainContent.classList.remove('ml-52');
                mainContent.classList.add('ml-0');
            } else {
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-52');
            }
        });

        // Dropdown toggle function
        function toggleDropdown(menuId) {
            const menu = document.getElementById(menuId);
            const icon = document.getElementById(menuId + '-icon');
            
            menu.classList.toggle('open');
            icon.classList.toggle('rotate-180');
        }

        // Navigation - Load content via AJAX
     /*   document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const page = this.getAttribute('data-page');
                if (page) {
                    loadContent(page);
                    
                    // Update active state
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active', 'bg-gray-700'));
                    this.classList.add('active', 'bg-gray-700');
                }
            });
        });*/

        document.addEventListener('click', function (e) {
                    const link = e.target.closest('.nav-link');
                    if (!link) return;

                      // ❌ Not a SPA link → let browser handle it
                    if (!link || !link.hasAttribute('data-page')) {
                        return;
                    }

                    const page = link.getAttribute('data-page');
                    if (!page) return;

                    e.preventDefault();

            // Remove active state
            document.querySelectorAll('.nav-link').forEach(l =>
                l.classList.remove('active', 'bg-gray-700')
            );

            // Add active state
            link.classList.add('active', 'bg-gray-700');

            // Load content
            loadContent(page);
        });


        // Load content function
        function loadContent(page) {
            const contentContainer = document.getElementById('content-container');
            const loading = document.getElementById('loading');
            
            // Add fade-out animation
            contentContainer.classList.add('fade-out');
            
            // Wait for fade-out to complete
            setTimeout(() => {
                // Show loading
                loading.classList.remove('hidden');
                
                // Fetch content via AJAX
                fetch(`?action=load_content&page=${page}`)
                    .then(response => response.text())
                    .then(html => {
                        // Remove fade-out class
                        contentContainer.classList.remove('fade-out');
                        
                        // Set new content
                        contentContainer.innerHTML = html;
                        
                        // Add fade-in animation
                        contentContainer.classList.add('fade-in');
                        
                        // Remove fade-in class after animation
                        setTimeout(() => {
                            contentContainer.classList.remove('fade-in');
                        }, 300);
                        
                        loading.classList.add('hidden');
                        
                        // Scroll to top smoothly
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    })
                    .catch(error => {
                        console.error('Error loading content:', error);
                        contentContainer.classList.remove('fade-out');
                        contentContainer.innerHTML = '<div class="p-6"><div class="bg-red-50 border border-red-200 rounded p-4"><i class="fas fa-exclamation-circle text-red-500 mr-2"></i>Error loading content. Please try again.</div></div>';
                        contentContainer.classList.add('fade-in');
                        setTimeout(() => {
                            contentContainer.classList.remove('fade-in');
                        }, 300);
                        loading.classList.add('hidden');
                    });
            }, 200); // Wait for fade-out animation
        }

        // Mobile responsive
        if (window.innerWidth < 768) {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('main-content').classList.remove('ml-52');
            document.getElementById('main-content').classList.add('ml-0');
        }

        console.log('SPA Admin Dashboard loaded');
    </script>
    
<script>
function saveNewFort() {
    const form = document.getElementById('add-fort-form');
    if (!form) return;

    // Collect required fields
    const requiredFields = [
        { name: 'FortName', label: 'Fort Name' },
        { name: 'FortType', label: 'Fort Type' },
        { name: 'FortDistrict', label: 'District' },
        { name: 'FortRange', label: 'Range' },
        { name: 'Grade', label: 'Grade' }
    ];

    let firstInvalidField = null;
    let errors = [];

    requiredFields.forEach(field => {
        const input = form.querySelector(`[name="${field.name}"]`);
        if (!input || !input.value.trim()) {
            errors.push(field.label);
            input?.classList.add('border-red-500');
            if (!firstInvalidField) firstInvalidField = input;
        } else {
            input.classList.remove('border-red-500');
        }
    });

    // ❌ Stop if validation fails
    if (errors.length > 0) {
        alert('Please fill the following required fields:\n\n• ' + errors.join('\n• '));
        firstInvalidField?.focus();
        return; // ⛔ STOP here — no API call
    }

    // ✅ All good — submit via AJAX
    const formData = new FormData(form);

    fetch('./api/add_fort.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === 'success') {
            alert('Fort added successfully!');
            loadContent('forts');
        } else {
            alert(res.message || 'Failed to add fort');
        }
    })
    .catch(() => alert('Server error'));
}

document.addEventListener('submit', function (e) {
    if (e.target && e.target.id === 'add-fort-form') {
        e.preventDefault();
    }
});
</script>

 <script>
        // ===== GLOBAL VARIABLES =====
        let currentFortId = null;
        let isEditMode = false;

        // ===== FORTS LIST & FILTERING FUNCTIONS =====
        
        // Load forts page without filters (for navigation menu)
        function loadFortsPage(page) {
            fetch(`?action=load_content&page=forts&p=${page}`)
                .then(response => response.text())
                .then(html => {
                    const contentContainer = document.getElementById('content-container');
                    contentContainer.classList.add('fade-out');
                    
                    setTimeout(() => {
                        contentContainer.innerHTML = html;
                        contentContainer.classList.remove('fade-out');
                        contentContainer.classList.add('fade-in');
                        
                        setTimeout(() => {
                            contentContainer.classList.remove('fade-in');
                        }, 300);
                        
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }, 200);
                });
        }

        // Load forts page with current filters
        function loadFortsPageWithFilters(page) {
            const searchInput = document.getElementById('search-input');
            const typeFilter = document.getElementById('type-filter');
            
            const search = searchInput ? searchInput.value.trim() : '';
            const type = typeFilter ? typeFilter.value : '';
            
            let params = new URLSearchParams();
            params.append('action', 'load_content');
            params.append('page', 'forts');
            params.append('p', page);
            
            if (search) params.append('search', search);
            if (type) params.append('type', type);
            
            fetch(`?${params.toString()}`)
                .then(response => response.text())
                .then(html => {
                    const contentContainer = document.getElementById('content-container');
                    contentContainer.classList.add('fade-out');
                    
                    setTimeout(() => {
                        contentContainer.innerHTML = html;
                        contentContainer.classList.remove('fade-out');
                        contentContainer.classList.add('fade-in');
                        
                        setTimeout(() => {
                            contentContainer.classList.remove('fade-in');
                        }, 300);
                        
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }, 200);
                });
        }

        // Apply filters
        function applyFilters() {
            const searchInput = document.getElementById('search-input');
            const typeFilter = document.getElementById('type-filter');
            
            const search = searchInput ? searchInput.value.trim() : '';
            const type = typeFilter ? typeFilter.value : '';
            
            let params = new URLSearchParams();
            params.append('action', 'load_content');
            params.append('page', 'forts');
            
            if (search) params.append('search', search);
            if (type) params.append('type', type);
            
            fetch(`?${params.toString()}`)
                .then(response => response.text())
                .then(html => {
                    const contentContainer = document.getElementById('content-container');
                    contentContainer.classList.add('fade-out');
                    
                    setTimeout(() => {
                        contentContainer.innerHTML = html;
                        contentContainer.classList.remove('fade-out');
                        contentContainer.classList.add('fade-in');
                        
                        setTimeout(() => {
                            contentContainer.classList.remove('fade-in');
                        }, 300);
                        
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }, 200);
                });
        }

        // Clear all filters
        function clearFilters() {
            loadFortsPage(1);
        }

        // Clear search only
        function clearSearch() {
            const searchInput = document.getElementById('search-input');
            if (searchInput) {
                searchInput.value = '';
                applyFilters();
            }
        }

        // Clear type filter only
        function clearTypeFilter() {
            const typeFilter = document.getElementById('type-filter');
            if (typeFilter) {
                typeFilter.value = '';
                applyFilters();
            }
        }

        // ===== FORT VIEW/EDIT FUNCTIONS =====
        
        // View Fort
        function viewFort(fortId) {
            currentFortId = fortId;
            isEditMode = false;
            
            const modal = document.getElementById('fort-modal');
            const modalTitle = document.getElementById('modal-title');
            const saveBtn = document.getElementById('save-btn');
            
            if (!modal || !modalTitle || !saveBtn) return;
            
            modalTitle.textContent = 'View Fort Details';
            saveBtn.classList.add('hidden');
            modal.classList.remove('hidden');
            
            // Fetch fort details
            fetch(`partials/ajax/get_fort_details.php?id=${fortId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('modal-content').innerHTML = `<p class="text-red-500">${data.error}</p>`;
                    } else {
                        displayFortDetails(data, false);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('modal-content').innerHTML = '<p class="text-red-500">Error loading fort details</p>';
                });
        }

        // Edit Fort
        function editFort(fortId) {
            currentFortId = fortId;
            isEditMode = true;
            
            const modal = document.getElementById('fort-modal');
            const modalTitle = document.getElementById('modal-title');
            const saveBtn = document.getElementById('save-btn');
            
            if (!modal || !modalTitle || !saveBtn) return;
            
            modalTitle.textContent = 'Edit Fort';
            saveBtn.classList.remove('hidden');
            modal.classList.remove('hidden');
            
            // Fetch fort details
            fetch(`partials/ajax/get_fort_details.php?id=${fortId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        document.getElementById('modal-content').innerHTML = `<p class="text-red-500">${data.error}</p>`;
                    } else {
                        displayFortDetails(data, true);
                        
                        // Initialize TinyMCE for textareas
                        setTimeout(() => {
                            if (typeof tinymce !== 'undefined') {
                                tinymce.remove('.rich-editor');
                                tinymce.init({
                                    selector: '.rich-editor',
                                    height: 300,
                                    menubar: false,
                                    plugins: 'lists link image code',
                                    toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
                                    branding: false,
                                    statusbar: false
                                });
                            }
                        }, 100);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('modal-content').innerHTML = '<p class="text-red-500">Error loading fort details</p>';
                });
        }

        // Display fort details
        function displayFortDetails(data, editable) {
            let html = '<div class="space-y-6">';
            
            if (editable) {
                // EDIT MODE
                html += `
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-primary mr-2"></i>
                            Basic Information
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-4">
                                <label class="w-32 text-sm font-medium text-gray-700 flex-shrink-0">Fort Name:</label>
                                <input type="text" id="fort-name" value="${escapeHtml(data.FortName || '')}" 
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <label class="w-32 text-sm font-medium text-gray-700 flex-shrink-0">Fort Type:</label>
                                <select id="fort-type" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    <option value="">Select Type</option>
                                    <option value="Hill forts" ${data.FortType === 'Hill forts' ? 'selected' : ''}>Hill Fort</option>
                                    <option value="Sea forts" ${data.FortType === 'Sea forts' ? 'selected' : ''}>Sea Fort</option>
                                    <option value="Land Forts" ${data.FortType === 'Land Forts' ? 'selected' : ''}>Land Fort</option>
                                    <option value="Coastal Forts" ${data.FortType === 'Coastal Forts' ? 'selected' : ''}>Coastal Fort</option>
                                    <option value="Forest forts" ${data.FortType === 'Forest forts' ? 'selected' : ''}>Forest Fort</option>
                                    </select>
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <label class="w-32 text-sm font-medium text-gray-700 flex-shrink-0">District:</label>
                                <input type="text" id="fort-district" value="${escapeHtml(data.FortDistrict || '')}" 
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <label class="w-32 text-sm font-medium text-gray-700 flex-shrink-0">Grade:</label>
                                <select id="fort-grade" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                    <option value="">Select Grade</option>
                                    <option value="Easy" ${data.Grade === 'Easy' ? 'selected' : ''}>Easy</option>
                                    <option value="Medium" ${data.Grade === 'Medium' ? 'selected' : ''}>Medium</option>
                                    <option value="Hard" ${data.Grade === 'Hard' ? 'selected' : ''}>Hard</option>
                                    <option value="Easier" ${data.Grade === 'Easier' ? 'selected' : ''}>Easier</option>
                                    <option value="Easiest" ${data.Grade === 'Easiest' ? 'selected' : ''}>Easiest</option>
                                    <option value="Very difficult" ${data.Grade === 'Very difficult' ? 'selected' : ''}>Very difficult</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-file-alt text-primary mr-2"></i>
                            Detailed Information
                        </h3>
                        
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Introduction:</label>
                                <textarea id="fort-intro" rows="4" class="rich-editor w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none">${escapeHtml(data.Introduction || '')}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">History:</label>
                                <textarea id="fort-history" rows="6" class="rich-editor w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none">${escapeHtml(data.History || '')}</textarea>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                // VIEW MODE
                html += `
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-primary mr-2"></i>
                            Basic Information
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-4 py-2 hover:bg-gray-50 px-3 rounded-lg transition-colors">
                                <span class="w-32 text-sm font-medium text-gray-600 flex-shrink-0">Fort Name:</span>
                                <span class="flex-1 text-sm text-gray-900 font-medium">${escapeHtml(data.FortName || 'N/A')}</span>
                            </div>
                            
                            <div class="flex items-start gap-4 py-2 hover:bg-gray-50 px-3 rounded-lg transition-colors">
                                <span class="w-32 text-sm font-medium text-gray-600 flex-shrink-0">Fort Type:</span>
                                <span class="flex-1 text-sm text-gray-900">${escapeHtml(data.FortType || 'N/A')}</span>
                            </div>
                            
                            <div class="flex items-start gap-4 py-2 hover:bg-gray-50 px-3 rounded-lg transition-colors">
                                <span class="w-32 text-sm font-medium text-gray-600 flex-shrink-0">District:</span>
                                <span class="flex-1 text-sm text-gray-900">${escapeHtml(data.FortDistrict || 'N/A')}</span>
                            </div>
                            
                            <div class="flex items-start gap-4 py-2 hover:bg-gray-50 px-3 rounded-lg transition-colors">
                                <span class="w-32 text-sm font-medium text-gray-600 flex-shrink-0">Grade:</span>
                                <span class="flex-1 text-sm">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium ${
                                        data.Grade === 'Easy' ? 'bg-green-100 text-green-700' : 
                                        data.Grade === 'Medium' ? 'bg-yellow-100 text-yellow-700' : 
                                        data.Grade === 'Hard' ? 'bg-red-100 text-red-700' : 
                                        data.Grade === 'Easier' ? 'bg-blue-100 text-blue-700' : 
                                        data.Grade === 'Easiest' ? 'bg-indigo-100 text-indigo-700' : 
                                        data.Grade === 'Very difficult' ? 'bg-purple-100 text-purple-700' : 
                                        'bg-gray-100 text-gray-700'
                                    }">
                                        ${escapeHtml(data.Grade || 'N/A')}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-file-alt text-primary mr-2"></i>
                            Detailed Information
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-start gap-4 mb-2">
                                    <span class="text-sm font-medium text-gray-600 flex-shrink-0">Introduction:</span>
                                </div>
                                <div class="text-sm text-gray-800 leading-relaxed pl-0 mt-2 max-h-40 overflow-y-auto custom-scrollbar">
                                    ${data.Introduction || '<span class="text-gray-400 italic">No introduction available</span>'}
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-start gap-4 mb-2">
                                    <span class="text-sm font-medium text-gray-600 flex-shrink-0">History:</span>
                                </div>
                                <div class="text-sm text-gray-800 leading-relaxed pl-0 mt-2 max-h-60 overflow-y-auto custom-scrollbar">
                                    ${data.History || '<span class="text-gray-400 italic">No history available</span>'}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
            
            html += '</div>';
            document.getElementById('modal-content').innerHTML = html;
        }

        // Save Fort
        function saveFort() {
            if (!currentFortId) return;
            
            // Get editor content
            const intro = (typeof tinymce !== 'undefined' && tinymce.get('fort-intro')) 
                ? tinymce.get('fort-intro').getContent() 
                : document.getElementById('fort-intro')?.value || '';
            const history = (typeof tinymce !== 'undefined' && tinymce.get('fort-history')) 
                ? tinymce.get('fort-history').getContent() 
                : document.getElementById('fort-history')?.value || '';
            
            const formData = {
                id: currentFortId,
                name: document.getElementById('fort-name').value,
                type: document.getElementById('fort-type').value,
                district: document.getElementById('fort-district').value,
                grade: document.getElementById('fort-grade').value,
                introduction: intro,
                history: history
            };
            
            // Send update request
            fetch('partials/ajax/update_fort.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal();
                    
                    // Reload the current page with filters
                    const searchInput = document.getElementById('search-input');
                    const typeFilter = document.getElementById('type-filter');
                    
                    if (searchInput || typeFilter) {
                        applyFilters();
                    } else {
                        loadFortsPage(1);
                    }
                    
                    alert('Fort updated successfully!');
                } else {
                    alert('Error updating fort: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving changes');
            });
        }

        // Close Modal
        function closeModal() {
            // Remove TinyMCE instances
            if (typeof tinymce !== 'undefined') {
                tinymce.remove('.rich-editor');
            }
            
            const modal = document.getElementById('fort-modal');
            if (modal) {
                modal.classList.add('hidden');
            }
            
            currentFortId = null;
            isEditMode = false;
        }

        // Open Add Modal
        function openAddModal() {
            alert('Add fort functionality coming soon!');
        }

        // Helper function to escape HTML
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    </script>
    <script>
        /* ==============================
        FASCINATING SPOTS (GLOBAL)
        ============================== */

        window.openSpotModal = function () {
            document.getElementById('spot-modal').classList.remove('hidden');
        };

         window.openSpotModalView = function () {
            document.getElementById('spot-modal-view').classList.remove('hidden');
        };

        window.closeSpotModal = function () {
            document.getElementById('spot-modal').classList.add('hidden');
        };

        window.closeSpotModalView = function () {
            document.getElementById('spot-modal-view').classList.add('hidden');
        };

        window.loadFascinatingPage = function (page) {
            loadContent('fascinating-spots&p=' + page);
        };

        window.saveFascinatingSpot = function () {
            const data = {
                id: document.getElementById('fs-id')?.value || '',
                FortName: document.getElementById('fs-fort')?.value || '',
                NameOfSpot: document.getElementById('fs-name')?.value || '',
                Description: document.getElementById('fs-desc')?.value || ''
            };

            if (!data.FortName || !data.NameOfSpot || !data.Description) {
                alert('All fields are required');
                return;
            }

            fetch('partials/ajax/save_fascinating_spot.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(r => r.json())
            .then(res => {
                if (res.success) {
                    closeSpotModal();
                    loadContent('fascinating-spots');
                } else {
                    alert(res.message || 'Save failed');
                }
            });
        };

        window.viewSpot = function (id) {
            fetch(`partials/ajax/get_fascinating_spot.php?id=${id}`)
                .then(r => r.json())
                .then(d => {
                     openSpotModalView();
                     document.getElementById('fs-id-view').value = d.FSID;
                     document.getElementById('fs-fort-view').value = d.FortName;
                     document.getElementById('fs-name-view').value = d.NameOfSpot;
                     document.getElementById('fs-desc-view').value = d.Description;
                });
        };

        window.editSpot = function (id) {
            fetch(`partials/ajax/get_fascinating_spot.php?id=${id}`)
                .then(r => r.json())
                .then(d => {
                    openSpotModal();
                    document.getElementById('fs-id').value = d.FSID;
                    document.getElementById('fs-fort').value = d.FortName;
                    document.getElementById('fs-name').value = d.NameOfSpot;
                    document.getElementById('fs-desc').value = d.Description;
                });
        };

        window.deleteSpot = function (id) {
            if (!confirm('Delete this spot?')) return;

            fetch('partials/ajax/delete_fascinating_spot.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id })
            })
            .then(() => loadContent('fascinating-spots'));
        };
        </script>
        <script>


                window.loadWaysPage = function (page = 1) {
                    fetch(`?action=load_content&page=ways-to-reach&p=${page}`)
                        .then(res => res.text())
                        .then(html => {
                            document.getElementById('content-container').innerHTML = html;
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        });
                };

                /* ---------- MODAL ---------- */

                window.openWayModal = function () {
                    document.getElementById('wtr-id').value = '';
                    document.getElementById('wtr-fort').value = '';
                    document.getElementById('wtr-name').value = '';
                    document.getElementById('wtr-desc').value = '';
                    document.getElementById('way-modal-title').innerText = 'Add Way To Reach';
                    document.getElementById('way-modal').classList.remove('hidden');
                };

                window.closeWayModal = function () {
                    document.getElementById('way-modal').classList.add('hidden');
                };

                 window.closeWayModalView = function () {
                    document.getElementById('way-modal-view').classList.add('hidden');
                };
                /* ---------- SAVE ---------- */

                window.saveWayToReach = function () {
                    const payload = {
                        WTRID: document.getElementById('wtr-id').value,
                        FortName: document.getElementById('wtr-fort').value,
                        NameOfWay: document.getElementById('wtr-name').value,
                        Description: document.getElementById('wtr-desc').value
                    };

                    fetch('partials/ajax/ways_to_reach_save.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            closeWayModal();
                            loadWaysPage(1);
                            alert('Saved successfully');
                        } else {
                            alert(res.message || 'Error saving');
                        }
                    });
                };

                /* ---------- VIEW ---------- */

                window.viewWay = function (id) {
                    fetch(`partials/ajax/ways_to_reach_get.php?id=${id}`)
                        .then(res => res.json())
                        .then(d => {
                            document.getElementById('wtr-id-view').value = d.WTRID;
                            document.getElementById('wtr-fort-view').value = d.FortName;
                            document.getElementById('wtr-name-view').value = d.NameOfWay;
                            document.getElementById('wtr-desc-view').value = d.Description;
                            document.getElementById('way-modal-view').classList.remove('hidden');
                        });
                };

                /* ---------- EDIT ---------- */

                window.editWay = function (id) {
                    fetch(`partials/ajax/ways_to_reach_get.php?id=${id}`)
                        .then(res => res.json())
                        .then(d => {
                            document.getElementById('wtr-id').value = d.WTRID;
                            document.getElementById('wtr-fort').value = d.FortName;
                            document.getElementById('wtr-name').value = d.NameOfWay;
                            document.getElementById('wtr-desc').value = d.Description;
                            document.getElementById('way-modal-title').innerText = 'Edit Way To Reach';
                            document.getElementById('way-modal').classList.remove('hidden');
                        });
                };

                /* ---------- DELETE ---------- */

                window.deleteWay = function (id) {
                    if (!confirm('Delete this route?')) return;

                    fetch('partials/ajax/ways_to_reach_delete.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ id })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            loadWaysPage(1);
                        } else {
                            alert(res.message || 'Delete failed');
                        }
                    });
                };
        </script>
        <script>
        window.loadTreks = function(p=1,search=''){
            fetch(`?action=load_content&page=treks&p=${p}&search=${search}`)
                .then(r=>r.text()).then(html=>{
                    document.getElementById('content-container').innerHTML = html;
                });
        };

function openTrekModal(mode, trekId) {
    fetch('partials/treks_add.php')
        .then(function (res) {
            return res.text();
        })
        .then(function (html) {
            document.getElementById('trek-modal-content').innerHTML = html;
            document.getElementById('trek-modal').classList.remove('hidden');

            if (mode === 'add') {
                setTrekMode('add');
            }

            if (mode === 'edit' || mode === 'view') {
                loadTrekData(trekId, mode);
            }
        });
}



window.closeTrekModal = function () {
    var modal = document.getElementById('trek-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        document.getElementById('trek-modal-content').innerHTML = '';
    }
};

function setTrekMode(mode) {
    document.getElementById('trek-mode').value = mode;

    var isView = mode === 'view';
    var title = 'Add Trek';
    var btnText = 'Save Trek';

    if (mode === 'edit') {
        title = 'Edit Trek';
        btnText = 'Update Trek';
    }
    if (mode === 'view') {
        title = 'View Trek Details';
        btnText = 'Close';
    }

    document.getElementById('trek-title').innerText = title;
    document.getElementById('trek-save-btn').innerText = btnText;

    var inputs = document.querySelectorAll(
        '#trek-modal-content input, #trek-modal-content textarea'
    );

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].id !== 'trek-id' && inputs[i].id !== 'trek-mode') {
            inputs[i].disabled = isView;
        }
    }

    document.getElementById('trek-save-btn').style.display =
        isView ? 'none' : 'inline-block';

    updateLabels(mode);
}

function updateLabels(mode) {
    var map = {
        add: 'Please enter ',
        edit: 'Update ',
        view: 'This is '
    };

    var prefix = map[mode];

    var labels = {
        place: 'place',
        leader: 'leader',
        date: 'trek date',
        display: 'display date',
        contact: 'contact number',
        cost: 'cost',
        grade: 'grade',
        last: 'last booking date',
        max: 'max participants',
        meet: 'meeting place',
        desc: 'description',
        notes: 'notes'
    };

    for (var k in labels) {
        document.getElementById('lbl-' + k).innerText =
            prefix + labels[k];
    }
}


window.editTrek = function (id) {

    openTrekModal();

    setTimeout(function () {
        fetch('partials/ajax/treks_get.php?id=' + id)
            .then(function (r) {
                return r.json();
            })
            .then(function (d) {

                document.getElementById('trek-title').innerText = 'Edit Trek';
                document.getElementById('trek-id').value = d.TrekId;
                document.getElementById('trek-place').value = d.Place || '';
                document.getElementById('trek-leader').value = d.Leader || '';
                document.getElementById('trek-date').value = d.TrekDate ? d.TrekDate.split(' ')[0] : '';
                document.getElementById('trek-contact').value = d.ContDetails || '';
                document.getElementById('trek-cost').value = d.Cost || '';
                document.getElementById('trek-grade').value = d.Grade || '';
                document.getElementById('trek-desc').value = d.Description || '';
            });
    }, 100);
};


function loadTrekData(id, mode) {
    fetch('partials/ajax/treks_get.php?id=' + id)
        .then(function (r) {
            return r.json();
        })
        .then(function (d) {

            document.getElementById('trek-id').value = d.TrekId;

            document.getElementById('trek-place').value = d.Place;
            document.getElementById('trek-leader').value = d.Leader;
            document.getElementById('trek-contact').value = d.ContDetails;
            document.getElementById('trek-cost').value = d.Cost;
            document.getElementById('trek-grade').value = d.Grade;
            document.getElementById('trek-display').value = d.DisplayDate;
            document.getElementById('trek-max').value = d.MaxParticipants;
            document.getElementById('trek-meet').value = d.MeetingPlace;
            document.getElementById('trek-desc').value = d.Description;
            document.getElementById('trek-notes').value = d.Notes;

            if (d.TrekDate) {
                document.getElementById('trek-date').value =
                    d.TrekDate.split(' ')[0];
            }

            if (d.LDateBooking) {
                document.getElementById('trek-last').value =
                    d.LDateBooking.split(' ')[0];
            }

            setTrekMode(mode);
        });
}

function validateTrekForm() {
    var requiredFields = [
        { id: 'trek-place', name: 'Place' },
        { id: 'trek-date', name: 'Trek Date' },
        { id: 'trek-leader', name: 'Leader' },
        { id: 'trek-contact', name: 'Contact Details' },
        { id: 'trek-grade', name: 'Grade' },
        { id: 'trek-display', name: 'Display Date' }
    ];

    var firstInvalid = null;
    var messages = [];

    for (var i = 0; i < requiredFields.length; i++) {
        var field = document.getElementById(requiredFields[i].id);

        if (!field || field.value.trim() === '') {
            messages.push(requiredFields[i].name + ' is required');

            if (field) {
                field.classList.add('border-red-500');
                if (!firstInvalid) firstInvalid = field;
            }
        } else {
            field.classList.remove('border-red-500');
        }
    }

    if (messages.length > 0) {
        alert('Please fix the following:\n\n• ' + messages.join('\n• '));
        if (firstInvalid) firstInvalid.focus();
        return false;
    }

    return true;
}




            window.saveTrek = function () {
                 if (!validateTrekForm()) {
                    return; // ⛔ STOP HERE
                 }
                var data = {
                    id: document.getElementById('trek-id').value,
                    place: document.getElementById('trek-place').value,
                    date: document.getElementById('trek-date').value,
                    leader: document.getElementById('trek-leader').value,
                    contact: document.getElementById('trek-contact').value,
                    display: document.getElementById('trek-display').value,
                    cost: document.getElementById('trek-cost').value,
                    grade: document.getElementById('trek-grade').value,
                    last: document.getElementById('trek-last').value,
                    meet: document.getElementById('trek-meet').value,
                    max: document.getElementById('trek-max').value,
                    desc: document.getElementById('trek-desc').value,
                    notes: document.getElementById('trek-notes').value
                };

                fetch('partials/ajax/treks_save.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).then(function () {
                    closeTrekModal();
                    loadTreks();
                });
            };

            window.deleteTrek = function (id) {
                if (!confirm('Delete trek?')) return;

                fetch('partials/ajax/treks_delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'id=' + encodeURIComponent(id)
                }).then(function () {
                    loadTreks();
                });
            };
</script>

<script>
function loadFortPhotos(p){
    fetch('?action=load_content&page=fort-photos&p='+p)
    .then(r=>r.text())
    .then(html=>document.getElementById('content-container').innerHTML=html);
}

function openFortPhotoModal(){
    document.getElementById('fort-photo-modal').classList.remove('hidden');
}

function closeFortPhotoModal(){
    document.getElementById('fort-photo-modal').classList.add('hidden');
}

function editFortPhoto(id){
    fetch('partials/ajax/get_fort_photo.php?id='+id)
    .then(r=>r.json())
    .then(d=>{
        document.getElementById('fp-id').value=d.PIC_ID;
        document.getElementById('fp-fort').value=d.FortName;
        document.getElementById('fp-desc').value=d.PIC_DESC||'';
        document.getElementById('fp-front').checked=d.PIC_FRONT_IMAGE==='Y';
        openFortPhotoModal();
    });
}

function saveFortPhoto() {
    var fd = new FormData();

    var idEl    = document.getElementById('fp-id');
    var fortEl  = document.getElementById('fp-fort');
    var descEl  = document.getElementById('fp-desc');
    var frontEl = document.getElementById('fp-front');
    var fileEl  = document.getElementById('fp-file');

    fd.append('id', idEl.value);
    fd.append('fort', fortEl.value);
    fd.append('desc', descEl.value);
    fd.append('front', frontEl.checked ? 'Y' : '');

    if (fileEl.files.length > 0) {
        fd.append('image', fileEl.files[0]);
    }

    fetch('partials/ajax/save_fort_photo.php', {
        method: 'POST',
        body: fd
    })
    .then(function () {
        closeFortPhotoModal();
        loadFortPhotos(1);
    });
}


function deleteFortPhoto(id){
    if(!confirm('Delete photo?')) return;
    fetch('partials/ajax/delete_fort_photo.php',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body:JSON.stringify({id:id})
    }).then(()=>loadFortPhotos(1));
}
</script>

<script>
/* ===== SPA SAFE ES5 JS ===== */

function loadMapPhotos(p) {
    fetch('?action=load_content&page=map-photos&p=' + p)
        .then(function (r) {
            return r.text();
        })
        .then(function (html) {
            document.getElementById('content-container').innerHTML = html;
        });
}

function openMapModal() {
    document.getElementById('map-modal').classList.remove('hidden');
}

function closeMapModal() {
    document.getElementById('map-modal').classList.add('hidden');
}

function editMap(id) {
    fetch('partials/ajax/get_map.php?id=' + id)
        .then(function (r) {
            return r.json();
        })
        .then(function (d) {
            document.getElementById('map-id').value = d.MapID;
            document.getElementById('map-fort').value = d.FortName;
            document.getElementById('map-type').value = d.MapType;
            document.getElementById('map-name').value = d.MapName;
            document.getElementById('map-desc').value = d.Description;
            openMapModal();
        });
}

function saveMap() {
    var fd = new FormData();
    fd.append('id', document.getElementById('map-id').value);
    fd.append('fort', document.getElementById('map-fort').value);
    fd.append('type', document.getElementById('map-type').value);
    fd.append('name', document.getElementById('map-name').value);
    fd.append('desc', document.getElementById('map-desc').value);

    var fileInput = document.getElementById('map-file');
    if (fileInput.files.length > 0) {
        fd.append('image', fileInput.files[0]);
    }

    fetch('partials/ajax/save_map.php', {
        method: 'POST',
        body: fd
    })
    .then(function (r) {
        return r.json();
    })
    .then(function () {
        closeMapModal();
        loadMapPhotos(1);
    });
}

function deleteMap(id) {
    if (!confirm('Delete map?')) return;

    fetch('partials/ajax/delete_map.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id })
    })
    .then(function () {
        loadMapPhotos(1);
    });
}
</script>

<script>
function loadNaturePhotos(p) {
    fetch('?action=load_content&page=nature-photos&p=' + p)
        .then(function (r) { return r.text(); })
        .then(function (html) {
            document.getElementById('content-container').innerHTML = html;
        });
}

function openNatureModal() {
    document.getElementById('nature-modal').classList.remove('hidden');
}

function closeNatureModal() {
    document.getElementById('nature-modal').classList.add('hidden');
}

function editNature(id) {
    fetch('partials/ajax/get_nature.php?id=' + id)
        .then(function (r) { return r.json(); })
        .then(function (d) {
            document.getElementById('nat-id').value = d.CAT_ID;
            document.getElementById('nat-name').value = d.CAT_NAME;
            document.getElementById('nat-type').value = d.CAT_TYPE;
            openNatureModal();
        });
}

function saveNature() {
    var fd = new FormData();
    fd.append('id', document.getElementById('nat-id').value);
    fd.append('name', document.getElementById('nat-name').value);
    fd.append('type', document.getElementById('nat-type').value);

    var f = document.getElementById('nat-file');
    if (f.files.length > 0) fd.append('image', f.files[0]);

    fetch('partials/ajax/save_nature.php', { method: 'POST', body: fd })
        .then(function () {
            closeNatureModal();
            loadNaturePhotos(1);
        });
}

function deleteNature(id) {
    if (!confirm('Delete photo?')) return;
    fetch('partials/ajax/delete_nature.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({id:id})
    }).then(function () {
        loadNaturePhotos(1);
    });
}
</script>

<script>
function saveSettings() {
    var inputs = document.querySelectorAll('.setting-input');
    var data = {};

    for (var i = 0; i < inputs.length; i++) {
        data[inputs[i].dataset.key] = inputs[i].value;
    }

    fetch('partials/ajax/save_settings.php', {
        method: 'POST',
        body: JSON.stringify(data)
    })
    .then(function () {
        alert('Settings saved successfully');
    });
}
</script>

<script>
function openUserModal(){
    document.getElementById('user-modal').classList.remove('hidden');
}
function closeUserModal(){
    document.getElementById('user-modal').classList.add('hidden');
}

function editUser(id){
    fetch('partials/ajax/admin_user_get.php?id='+id)
    .then(function(r){return r.json();})
    .then(function(d){
        document.getElementById('user-id').value = d.admin_id;
        document.getElementById('user-username').value = d.username;
        document.getElementById('user-fullname').value = d.full_name;
        document.getElementById('user-email').value = d.email;
        document.getElementById('user-role').value = d.role;
        openUserModal();
    });
}

function saveUser() {
    var data = {
        id: document.getElementById('user-id').value,
        username: document.getElementById('user-username').value,
        fullname: document.getElementById('user-fullname').value,
        email: document.getElementById('user-email').value,
        role: document.getElementById('user-role').value,
        password: document.getElementById('user-password').value
    };

        if (!data.username || !data.email || !data.role) {
        alert('Username, Email and Role are required');
        return;
        }

        fetch('partials/ajax/admin_user_save.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
        })
        .then(function (res) {
                return res.json();
        })
        .then(function () {
                closeUserModal();
                location.reload();
        });
}


</script>

<script>
    /* ==============================
    TEMPLE MODULE – FULL JS
    (Same flow as Fort)
    ================================ */

    /* ---------- GLOBAL ---------- */
    let currentTempleId = null;
    let isTempleEditMode = false;

    /* ---------- ADD TEMPLE ---------- */
    function saveNewTemple() {
        const form = document.getElementById('add-temple-form');
        if (!form) return;

        const fd = new FormData(form);

        fetch('./api/add_temple.php', {
            method: 'POST',
            body: fd
        })
        .then(r => r.json())
        .then(res => {
            if (res.status === 'success') {
                alert('Temple added successfully!');
                loadContent('temples');
            } else {
                alert(res.message || 'Failed to add temple');
            }
        })
        .catch(() => alert('Server error'));
    }

    /* ---------- LIST / FILTER / PAGINATION ---------- */
    function loadTemplePage(p = 1) {
        loadContent('temples&p=' + p);
    }

    function applyTempleFilters() {
        const search = document.getElementById('search-input')?.value || '';
        loadContent('temples&search=' + encodeURIComponent(search));
    }

    function clearTempleFilters() {
        loadContent('temples');
    }

    /* ---------- VIEW TEMPLE ---------- */
    function viewTemple(id) {
        currentTempleId = id;
        isTempleEditMode = false;

        document.getElementById('temple-modal-title').innerText = 'View Temple Details';
        document.getElementById('temple-save-btn').classList.add('hidden');
        document.getElementById('temple-modal').classList.remove('hidden');

        fetch(`partials/ajax/get_temple_details.php?id=${id}`)
            .then(r => r.json())
            .then(data => renderTempleModal(data, false));
    }

    /* ---------- EDIT TEMPLE ---------- */
    function editTemple(id) {
        currentTempleId = id;
        isTempleEditMode = true;

        document.getElementById('temple-modal-title').innerText = 'Edit Temple';
        document.getElementById('temple-save-btn').classList.remove('hidden');
        document.getElementById('temple-modal').classList.remove('hidden');

        fetch(`partials/ajax/get_temple_details.php?id=${id}`)
            .then(r => r.json())
            .then(data => renderTempleModal(data, true));
    }

    /* ---------- RENDER MODAL ---------- */
    function renderTempleModal(data, editable) {
        if (data.error) {
            document.getElementById('temple-modal-content').innerHTML =
                `<p class="text-red-600">${data.error}</p>`;
            return;
        }

        function input(label, id, value = '') {
            return editable
                ? `<input id="${id}" value="${escapeHtml(value)}"
                        class="w-full border px-3 py-2 rounded text-sm">`
                : `<div class="text-gray-800">${escapeHtml(value || '—')}</div>`;
        }

        function textarea(label, id, value = '') {
            return editable
                ? `<textarea id="${id}" rows="3"
                    class="w-full border px-3 py-2 rounded text-sm">${escapeHtml(value)}</textarea>`
                : `<div class="text-gray-800 whitespace-pre-line">${value || '—'}</div>`;
        }

        let html = `
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium">Temple Name</label>
                ${input('Temple Name','TempleName',data.TempleName)}
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium">Village</label>
                    ${input('Village','Village',data.Village)}
                </div>
                <div>
                    <label class="text-sm font-medium">District</label>
                    ${input('District','District',data.District)}
                </div>
            </div>

            <div>
                <label class="text-sm font-medium">Taluka</label>
                ${input('Taluka','Taluka',data.Taluka)}
            </div>

            <div>
                <label class="text-sm font-medium">Nearest City</label>
                ${input('NearestCity','NearestCity',data.NearestCity)}
            </div>

            <div>
                <label class="text-sm font-medium">Main Deity</label>
                ${input('MainDeity','MainDeity',data.MainDeity)}
            </div>

            <div>
                <label class="text-sm font-medium">Temple Type</label>
                ${input('TempleType','TempleType',data.TempleType)}
            </div>

            <div>
                <label class="text-sm font-medium">Temple Category</label>
                ${input('TempleCategory','TempleCategory',data.TempleCategory)}
            </div>

            <div>
                <label class="text-sm font-medium">Introduction</label>
                ${textarea('Introduction','Introduction',data.Introduction)}
            </div>

            <div>
                <label class="text-sm font-medium">History</label>
                ${textarea('History','History',data.History)}
            </div>

            <div>
                <label class="text-sm font-medium">Notes</label>
                ${textarea('Notes','Notes',data.Notes)}
            </div>
        </div>
        `;

        document.getElementById('temple-modal-content').innerHTML = html;
    }

    /* ---------- SAVE (UPDATE) ---------- */
    function saveTemple() {
        if (!currentTempleId) return;

        const payload = {
            id: currentTempleId,
            TempleName: document.getElementById('TempleName').value,
            Village: document.getElementById('Village').value,
            District: document.getElementById('District').value,
            Taluka: document.getElementById('Taluka').value,
            NearestCity: document.getElementById('NearestCity').value,
            MainDeity: document.getElementById('MainDeity').value,
            TempleType: document.getElementById('TempleType').value,
            TempleCategory: document.getElementById('TempleCategory').value,
            Introduction: document.getElementById('Introduction').value,
            History: document.getElementById('History').value,
            Notes: document.getElementById('Notes').value
        };

        fetch('partials/ajax/update_temple.php', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify(payload)
        })
        .then(r => r.json())
        .then(res => {
            if (res.success) {
                closeTempleModal();
                loadContent('temples');
                alert('Temple updated successfully!');
            } else {
                alert(res.message || 'Update failed');
            }
        });
    }

    /* ---------- MODAL CLOSE ---------- */
    function closeTempleModal() {
        document.getElementById('temple-modal').classList.add('hidden');
        currentTempleId = null;
        isTempleEditMode = false;
    }

    /* ---------- HELPER ---------- */
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text ?? '';
        return div.innerHTML;
    }
</script>

<script>
/* ==============================
   WEAPONS MODULE – FULL JS
   (Same flow as Temple)
================================ */

/* ---------- GLOBAL ---------- */
let currentWeaponId = null;
let isWeaponEditMode = false;

/* ---------- ADD WEAPON ---------- */
function saveNewWeapon() {
    const form = document.getElementById('add-weapon-form');
    if (!form) return;

    const fd = new FormData(form);

    fetch('./api/add_weapon.php', {
        method: 'POST',
        body: fd
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            alert('Weapon added successfully!');
            loadContent('weapons');
        } else {
            alert(res.message || 'Failed to add weapon');
        }
    })
    .catch(() => alert('Server error'));
}

/* ---------- PAGINATION ---------- */
function loadWeaponPage(p = 1) {
    loadContent('weapons&p=' + p);
}

/* ---------- FILTER ---------- */
function applyWeaponFilters() {
    const search = document.getElementById('search-input')?.value || '';
    loadContent('weapons&search=' + encodeURIComponent(search));
}

function clearWeaponFilters() {
    loadContent('weapons');
}

/* ---------- VIEW WEAPON ---------- */
function viewWeapon(id) {
    currentWeaponId = id;
    isWeaponEditMode = false;

    document.getElementById('weapon-modal-title').innerText = 'View Weapon Details';
    document.getElementById('weapon-save-btn').classList.add('hidden');
    document.getElementById('weapon-modal').classList.remove('hidden');

    fetch(`partials/ajax/get_weapon_details.php?id=${id}`)
        .then(r => r.json())
        .then(data => renderWeaponModal(data, false));
}

/* ---------- EDIT WEAPON ---------- */
function editWeapon(id) {
    currentWeaponId = id;
    isWeaponEditMode = true;

    document.getElementById('weapon-modal-title').innerText = 'Edit Weapon';
    document.getElementById('weapon-save-btn').classList.remove('hidden');
    document.getElementById('weapon-modal').classList.remove('hidden');

    fetch(`partials/ajax/get_weapon_details.php?id=${id}`)
        .then(r => r.json())
        .then(data => renderWeaponModal(data, true));
}

/* ---------- RENDER MODAL ---------- */
function renderWeaponModal(data, editable) {
    if (data.error) {
        document.getElementById('weapon-modal-content').innerHTML =
            `<p class="text-red-600">${data.error}</p>`;
        return;
    }

    const input = (id, value='') =>
        editable
            ? `<input id="${id}" value="${escapeHtml(value)}"
                class="w-full border px-3 py-2 rounded text-sm">`
            : `<div class="text-gray-800">${escapeHtml(value || '—')}</div>`;

    const textarea = (id, value='') =>
        editable
            ? `<textarea id="${id}" rows="3"
                class="w-full border px-3 py-2 rounded text-sm">${escapeHtml(value)}</textarea>`
            : `<div class="text-gray-800 whitespace-pre-line">${value || '—'}</div>`;

    document.getElementById('weapon-modal-content').innerHTML = `
    <div class="space-y-4">

        <div>
            <label class="text-sm font-medium">Weapon Name</label>
            ${input('WeaponName', data.WeaponName)}
        </div>

        <div>
            <label class="text-sm font-medium">Weapon Type</label>
            ${input('WeaponType', data.WeaponType)}
        </div>

        <div>
            <label class="text-sm font-medium">Weapon Era</label>
            ${input('WeaponEra', data.WeaponEra)}
        </div>

        <div>
            <label class="text-sm font-medium">Origin Country</label>
            ${input('OriginCountry', data.OriginCountry)}
        </div>

        <div>
            <label class="text-sm font-medium">Technology</label>
            ${textarea('Technology', data.Technology)}
        </div>

        <div>
            <label class="text-sm font-medium">Materials Used</label>
            ${input('MaterialsUsed', data.MaterialsUsed)}
        </div>

        <div>
            <label class="text-sm font-medium">Weight</label>
            ${input('Weight', data.Weight)}
        </div>

        <div>
            <label class="text-sm font-medium">Range / Capacity</label>
            ${input('RangeCapacity', data.RangeCapacity)}
        </div>

        <div>
            <label class="text-sm font-medium">Firing Mechanism</label>
            ${input('FiringMechanism', data.FiringMechanism)}
        </div>

        <div>
            <label class="text-sm font-medium">Introduction</label>
            ${textarea('Introduction', data.Introduction)}
        </div>

        <div>
            <label class="text-sm font-medium">History</label>
            ${textarea('History', data.History)}
        </div>

        <div>
            <label class="text-sm font-medium">Notable Usage in India</label>
            ${textarea('NotableUsageInIndia', data.NotableUsageInIndia)}
        </div>

        <div>
            <label class="text-sm font-medium">Related Battles</label>
            ${textarea('RelatedBattles', data.RelatedBattles)}
        </div>

        <div>
            <label class="text-sm font-medium">Advantages</label>
            ${textarea('Advantages', data.Advantages)}
        </div>

        <div>
            <label class="text-sm font-medium">Limitations</label>
            ${textarea('Limitations', data.Limitations)}
        </div>

        <div>
            <label class="text-sm font-medium">Notes</label>
            ${textarea('Notes', data.Notes)}
        </div>

    </div>`;
}

/* ---------- SAVE UPDATE ---------- */
function saveWeapon() {
    if (!currentWeaponId) return;

    const payload = {
        id: currentWeaponId,
        WeaponName: document.getElementById('WeaponName').value,
        WeaponType: document.getElementById('WeaponType').value,
        WeaponEra: document.getElementById('WeaponEra').value,
        OriginCountry: document.getElementById('OriginCountry').value,
        Technology: document.getElementById('Technology').value,
        MaterialsUsed: document.getElementById('MaterialsUsed').value,
        Weight: document.getElementById('Weight').value,
        RangeCapacity: document.getElementById('RangeCapacity').value,
        FiringMechanism: document.getElementById('FiringMechanism').value,
        Introduction: document.getElementById('Introduction').value,
        History: document.getElementById('History').value,
        NotableUsageInIndia: document.getElementById('NotableUsageInIndia').value,
        RelatedBattles: document.getElementById('RelatedBattles').value,
        Advantages: document.getElementById('Advantages').value,
        Limitations: document.getElementById('Limitations').value,
        Notes: document.getElementById('Notes').value
    };

    fetch('partials/ajax/update_weapon.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify(payload)
    })
    .then(r => r.json())
    .then(res => {
        if (res.success) {
            closeWeaponModal();
            loadContent('weapons');
            alert('Weapon updated successfully!');
        } else {
            alert(res.message || 'Update failed');
        }
    });
}

/* ---------- MODAL CLOSE ---------- */
function closeWeaponModal() {
    document.getElementById('weapon-modal').classList.add('hidden');
    currentWeaponId = null;
    isWeaponEditMode = false;
}

/* ---------- HELPER ---------- */
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text ?? '';
    return div.innerHTML;
}
</script>

<script>
/* ==============================
   JUNGLES MODULE – FULL JS
   (Same flow as Weapons / Temples)
================================ */

/* ---------- GLOBAL ---------- */
let currentJungleId = null;
let isJungleEditMode = false;

/* ---------- ADD JUNGLE ---------- */
function saveNewJungle() {
    const form = document.getElementById('add-jungle-form');
    if (!form) return;

    const fd = new FormData(form);

    fetch('./api/add_jungle.php', {
        method: 'POST',
        body: fd
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            alert('Jungle added successfully!');
            loadContent('jungles');
        } else {
            alert(res.message || 'Failed to add jungle');
        }
    })
    .catch(() => alert('Server error'));
}

/* ---------- PAGINATION ---------- */
function loadJunglePage(p = 1) {
    loadContent('jungles&p=' + p);
}

/* ---------- FILTER ---------- */
function applyJungleFilters() {
    const search = document.getElementById('search-input')?.value || '';
    loadContent('jungles&search=' + encodeURIComponent(search));
}

function clearJungleFilters() {
    loadContent('jungles');
}

/* ---------- VIEW JUNGLE ---------- */
function viewJungle(id) {
    currentJungleId = id;
    isJungleEditMode = false;

    document.getElementById('jungle-modal-title').innerText = 'View Jungle Details';
    document.getElementById('jungle-save-btn').classList.add('hidden');
    document.getElementById('jungle-modal').classList.remove('hidden');

    fetch(`partials/ajax/get_jungle_details.php?id=${id}`)
        .then(r => r.json())
        .then(data => renderJungleModal(data, false));
}

/* ---------- EDIT JUNGLE ---------- */
function editJungle(id) {
    currentJungleId = id;
    isJungleEditMode = true;

    document.getElementById('jungle-modal-title').innerText = 'Edit Jungle';
    document.getElementById('jungle-save-btn').classList.remove('hidden');
    document.getElementById('jungle-modal').classList.remove('hidden');

    fetch(`partials/ajax/get_jungle_details.php?id=${id}`)
        .then(r => r.json())
        .then(data => renderJungleModal(data, true));
}

/* ---------- RENDER MODAL ---------- */
function renderJungleModal(data, editable) {
    if (data.error) {
        document.getElementById('jungle-modal-content').innerHTML =
            `<p class="text-red-600">${data.error}</p>`;
        return;
    }

    const input = (id, value='') =>
        editable
            ? `<input id="${id}" value="${escapeHtml(value)}"
                class="w-full border px-3 py-2 rounded text-sm">`
            : `<div class="text-gray-800">${escapeHtml(value || '—')}</div>`;

    const textarea = (id, value='') =>
        editable
            ? `<textarea id="${id}" rows="3"
                class="w-full border px-3 py-2 rounded text-sm">${escapeHtml(value)}</textarea>`
            : `<div class="text-gray-800 whitespace-pre-line">${value || '—'}</div>`;

    document.getElementById('jungle-modal-content').innerHTML = `
    <div class="space-y-4">

        <div><label class="text-sm font-medium">Jungle Name</label>
            ${input('JungleName', data.JungleName)}</div>

        <div><label class="text-sm font-medium">State</label>
            ${input('State', data.State)}</div>

        <div><label class="text-sm font-medium">District</label>
            ${input('District', data.District)}</div>

        <div><label class="text-sm font-medium">Nearest City</label>
            ${input('NearestCity', data.NearestCity)}</div>

        <div><label class="text-sm font-medium">Core Zone Gates</label>
            ${textarea('CoreZoneGates', data.CoreZoneGates)}</div>

        <div><label class="text-sm font-medium">Buffer Zone Gates</label>
            ${textarea('BufferZoneGates', data.BufferZoneGates)}</div>

        <div><label class="text-sm font-medium">Introduction</label>
            ${textarea('Introduction', data.Introduction)}</div>

        <div><label class="text-sm font-medium">History</label>
            ${textarea('History', data.History)}</div>

        <div><label class="text-sm font-medium">Geography</label>
            ${textarea('Geography', data.Geography)}</div>

        <div><label class="text-sm font-medium">Safari Timings</label>
            ${textarea('SafariTimings', data.SafariTimings)}</div>

        <div><label class="text-sm font-medium">Best Season to Visit</label>
            ${input('BestSeasonToVisit', data.BestSeasonToVisit)}</div>

        <div><label class="text-sm font-medium">Official Website</label>
            ${input('OfficialWebsite', data.OfficialWebsite)}</div>

        <div><label class="text-sm font-medium">Animals</label>
            ${input('Animals', data.Animals)}</div>

        <div><label class="text-sm font-medium">Birds</label>
            ${input('Birds', data.Birds)}</div>

        <div><label class="text-sm font-medium">Trees</label>
            ${input('Trees', data.Trees)}</div>

        <div><label class="text-sm font-medium">Reptiles</label>
            ${input('Reptiles', data.Reptiles)}</div>

        <div><label class="text-sm font-medium">Interesting Facts</label>
            ${textarea('InterestingFacts', data.InterestingFacts)}</div>

        <div><label class="text-sm font-medium">Conservation Info</label>
            ${textarea('ConservationInfo', data.ConservationInfo)}</div>

        <div><label class="text-sm font-medium">Notes</label>
            ${textarea('Notes', data.Notes)}</div>

    </div>`;
}

/* ---------- SAVE UPDATE ---------- */
function saveJungle() {
    if (!currentJungleId) return;

    const fields = [
        'JungleName','State','District','NearestCity',
        'CoreZoneGates','BufferZoneGates','Introduction','History',
        'Geography','SafariTimings','BestSeasonToVisit','OfficialWebsite',
        'Animals','Birds','Trees','Reptiles',
        'InterestingFacts','ConservationInfo','Notes'
    ];

    const payload = { id: currentJungleId };

    fields.forEach(f => {
        payload[f] = document.getElementById(f)?.value || '';
    });

    fetch('partials/ajax/update_jungle.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify(payload)
    })
    .then(r => r.json())
    .then(res => {
        if (res.success) {
            closeJungleModal();
            loadContent('jungles');
            alert('Jungle updated successfully!');
        } else {
            alert(res.message || 'Update failed');
        }
    });
}

/* ---------- MODAL CLOSE ---------- */
function closeJungleModal() {
    document.getElementById('jungle-modal').classList.add('hidden');
    currentJungleId = null;
    isJungleEditMode = false;
}

/* ---------- HELPER ---------- */
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text ?? '';
    return div.innerHTML;
}
</script>

<script>
/* ==============================
   TEMPLE PHOTOS – FULL JS
   ============================== */

/* ---------- LOAD LIST ---------- */
function loadTemplePhotos(p) {
    fetch('?action=load_content&page=temple-photos&p=' + p)
        .then(r => r.text())
        .then(html => {
            document.getElementById('content-container').innerHTML = html;
        });
}

/* ---------- MODAL OPEN / CLOSE ---------- */
function openTemplePhotoModal() {
    document.getElementById('tp-id').value = '';
    document.getElementById('tp-temple').value = '';
    document.getElementById('tp-desc').value = '';
    document.getElementById('tp-front').checked = false;
    document.getElementById('tp-file').value = '';
    document.getElementById('temple-photo-modal').classList.remove('hidden');
}

function closeTemplePhotoModal() {
    document.getElementById('temple-photo-modal').classList.add('hidden');
}

/* ---------- EDIT ---------- */
function editTemplePhoto(id) {
    fetch('partials/ajax/get_temple_photo.php?id=' + id)
        .then(r => r.json())
        .then(d => {
            document.getElementById('tp-id').value = d.PIC_ID;
            document.getElementById('tp-temple').value = d.TempleName;
            document.getElementById('tp-desc').value = d.PIC_DESC || '';
            document.getElementById('tp-front').checked = (d.PIC_FRONT_IMAGE === 'Y');
            document.getElementById('tp-file').value = '';
            openTemplePhotoModal();
        });
}

/* ---------- SAVE ---------- */
function saveTemplePhoto() {
    var fd = new FormData();

    fd.append('id', document.getElementById('tp-id').value);
    fd.append('temple', document.getElementById('tp-temple').value);
    fd.append('desc', document.getElementById('tp-desc').value);
    fd.append('front', document.getElementById('tp-front').checked ? 'Y' : '');

    var fileInput = document.getElementById('tp-file');
    if (fileInput.files.length > 0) {
        fd.append('image', fileInput.files[0]);
    }

    fetch('partials/ajax/save_temple_photo.php', {
        method: 'POST',
        body: fd
    })
    .then(() => {
        closeTemplePhotoModal();
        loadTemplePhotos(1);
    });
}
</script>

<script>
/* ==============================
   WEAPON PHOTOS – FULL JS
   ============================== */

/* ---------- LOAD LIST ---------- */
function loadWeaponPhotos(p) {
    fetch('?action=load_content&page=weapon-photos&p=' + p)
        .then(function (r) { return r.text(); })
        .then(function (html) {
            document.getElementById('content-container').innerHTML = html;
        });
}

/* ---------- MODAL OPEN / CLOSE ---------- */
function openWeaponPhotoModal() {
    document.getElementById('wp-id').value = '';
    document.getElementById('wp-weapon').value = '';
    document.getElementById('wp-desc').value = '';
    document.getElementById('wp-front').checked = false;
    document.getElementById('wp-file').value = '';
    document.getElementById('weapon-photo-modal').classList.remove('hidden');
}

function closeWeaponPhotoModal() {
    document.getElementById('weapon-photo-modal').classList.add('hidden');
}

/* ---------- EDIT ---------- */
function editWeaponPhoto(id) {
    fetch('partials/ajax/get_weapon_photo.php?id=' + id)
        .then(function (r) { return r.json(); })
        .then(function (d) {
            document.getElementById('wp-id').value = d.PIC_ID;
            document.getElementById('wp-weapon').value = d.WeaponName;
            document.getElementById('wp-desc').value = d.PIC_DESC || '';
            document.getElementById('wp-front').checked =
                (d.PIC_FRONT_IMAGE === 'Y');
            document.getElementById('wp-file').value = '';
            openWeaponPhotoModal();
        });
}

/* ---------- SAVE ---------- */
function saveWeaponPhoto() {
    var fd = new FormData();

    fd.append('id', document.getElementById('wp-id').value);
    fd.append('weapon', document.getElementById('wp-weapon').value);
    fd.append('desc', document.getElementById('wp-desc').value);
    fd.append('front',
        document.getElementById('wp-front').checked ? 'Y' : ''
    );

    var fileInput = document.getElementById('wp-file');
    if (fileInput.files.length > 0) {
        fd.append('image', fileInput.files[0]);
    }

    fetch('partials/ajax/save_weapon_photo.php', {
        method: 'POST',
        body: fd
    })
    .then(function () {
        closeWeaponPhotoModal();
        loadWeaponPhotos(1);
    });
}
</script>



<script>
/* ==============================
   JUNGLE PHOTOS – FULL JS
   ============================== */

/* ---------- LOAD LIST ---------- */
function loadJunglePhotos(p) {
    fetch('?action=load_content&page=jungle-photos&p=' + p)
        .then(function (r) { return r.text(); })
        .then(function (html) {
            document.getElementById('content-container').innerHTML = html;
        });
}

/* ---------- MODAL OPEN / CLOSE ---------- */
function openJunglePhotoModal() {
    document.getElementById('jp-id').value = '';
    document.getElementById('jp-jungle').value = '';
    document.getElementById('jp-desc').value = '';
    document.getElementById('jp-front').checked = false;
    document.getElementById('jp-file').value = '';
    document.getElementById('jungle-photo-modal').classList.remove('hidden');
}

function closeJunglePhotoModal() {
    document.getElementById('jungle-photo-modal').classList.add('hidden');
}

/* ---------- EDIT ---------- */
function editJunglePhoto(id) {
    fetch('partials/ajax/get_jungle_photo.php?id=' + id)
        .then(function (r) { return r.json(); })
        .then(function (d) {
            document.getElementById('jp-id').value = d.PIC_ID;
            document.getElementById('jp-jungle').value = d.JungleName;
            document.getElementById('jp-desc').value = d.PIC_DESC || '';
            document.getElementById('jp-front').checked =
                (d.PIC_FRONT_IMAGE === 'Y');
            document.getElementById('jp-file').value = '';
            openJunglePhotoModal();
        });
}

/* ---------- SAVE ---------- */
function saveJunglePhoto() {
    var fd = new FormData();

    fd.append('id', document.getElementById('jp-id').value);
    fd.append('jungle', document.getElementById('jp-jungle').value);
    fd.append('desc', document.getElementById('jp-desc').value);
    fd.append('front',
        document.getElementById('jp-front').checked ? 'Y' : ''
    );

    var fileInput = document.getElementById('jp-file');
    if (fileInput.files.length > 0) {
        fd.append('image', fileInput.files[0]);
    }

    fetch('partials/ajax/save_jungle_photo.php', {
        method: 'POST',
        body: fd
    })
    .then(function () {
        closeJunglePhotoModal();
        loadJunglePhotos(1);
    });
}
</script>

<script>
/* ==============================
   HOME PHOTOS – FULL JS
   ============================== */

/* ---------- LOAD LIST ---------- */
function loadHomePhotos(p = 1) {
    fetch('?action=load_content&page=home-photos&p=' + p)
        .then(function (r) { return r.text(); })
        .then(function (html) {
            document.getElementById('content-container').innerHTML = html;
        });
}

/* ---------- MODAL OPEN / CLOSE ---------- */
function openHomePhotoModal() {
    document.getElementById('hp-id').value = '';
    document.getElementById('hp-desc').value = '';
    document.getElementById('hp-order').value = '';
    document.getElementById('hp-active').checked = true;
    document.getElementById('hp-file').value = '';
    document.getElementById('home-photo-modal').classList.remove('hidden');
}

function openeditHomePhotoModal() {
    document.getElementById('hp-file').value = '';
    document.getElementById('home-photo-modal').classList.remove('hidden');
}

function closeHomePhotoModal() {
    document.getElementById('home-photo-modal').classList.add('hidden');
}

/* ---------- EDIT ---------- */
function editHomePhoto(id) {
    fetch('partials/ajax/get_home_photo.php?id=' + id)
        .then(function (r) { return r.json(); })
        .then(function (d) {
            document.getElementById('hp-id').value    = d.PIC_ID;
            document.getElementById('hp-desc').value  = d.PIC_DESC || '';
            document.getElementById('hp-order').value = d.SORT_ORDER || '';
            document.getElementById('hp-active').checked =
                (d.IS_ACTIVE === 'Y');

            document.getElementById('hp-file').value = '';
            openeditHomePhotoModal();
        });
}

/* ---------- SAVE ---------- */
function saveHomePhoto() {

    var fd = new FormData();

    fd.append('id', document.getElementById('hp-id').value);
    fd.append('desc', document.getElementById('hp-desc').value);
    fd.append('order', document.getElementById('hp-order').value);
    fd.append(
        'active',
        document.getElementById('hp-active').checked ? 'Y' : 'N'
    );

    var fileInput = document.getElementById('hp-file');
    if (fileInput.files.length > 0) {
        fd.append('image', fileInput.files[0]);
    }

    fetch('partials/ajax/save_home_photo.php', {
        method: 'POST',
        body: fd
    })
    .then(function () {
        closeHomePhotoModal();
        loadHomePhotos(1);
    });
}
</script>

<script>

/* LOAD LIST (pagination supported) */
function loadTrekPhotos(p = 1) {
    fetch('?action=load_content&page=trek-photos&p=' + p)
        .then(r => r.text())
        .then(html => {
            document.getElementById('content-container').innerHTML = html;
        });
}

/* OPEN MODAL */
function openTrekPhotoModal() {
    document.getElementById('trp-id').value = '';
    document.getElementById('trp-trek').value = '';
    document.getElementById('trp-desc').value = '';
    document.getElementById('trp-front').checked = false;
    document.getElementById('trp-file').value = '';
    document.getElementById('trek-photo-modal').classList.remove('hidden');
}

function openEditTrekPhotoModal() {
    document.getElementById('trp-file').value = '';
    document.getElementById('trek-photo-modal').classList.remove('hidden');
}

/* CLOSE MODAL */
function closeTrekPhotoModal() {
    document.getElementById('trek-photo-modal').classList.add('hidden');
}

/* EDIT */
function editTrekPhoto(id) {
    fetch('partials/ajax/get_trek_photo.php?id=' + id)
        .then(r => r.json())
        .then(d => {
            document.getElementById('trp-id').value = d.PIC_ID;
            document.getElementById('trp-trek').value = d.TrekId;
            document.getElementById('trp-desc').value = d.PIC_DESC || '';
            document.getElementById('trp-front').checked =
                (d.PIC_FRONT_IMAGE === 'Y');
            //openTrekPhotoModal();
            openEditTrekPhotoModal();
        });
}

/* SAVE */
function saveTrekPhoto() {

    var fd = new FormData();

    fd.append('id', document.getElementById('trp-id').value);
    fd.append('trek', document.getElementById('trp-trek').value);
    fd.append('desc', document.getElementById('trp-desc').value);
    fd.append(
        'front',
        document.getElementById('trp-front').checked ? 'Y' : ''
    );

    var fileInput = document.getElementById('trp-file');
    if (fileInput.files.length > 0) {
        fd.append('image', fileInput.files[0]);
    }

    fetch('partials/ajax/save_trek_photo.php', {
        method: 'POST',
        body: fd
    })
    .then(() => {
        closeTrekPhotoModal();
        loadTrekPhotos(1);
    });
}

</script>





</body>
</html>