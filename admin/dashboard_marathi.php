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
            include 'partials/dashboard_content_marathi.php';
            break;
        case 'forts-mar':
            include 'partials/forts_list_marathi.php';
            break;
        case 'forts-add-mar':
            include 'partials/forts_add_marathi.php';
            break;
        case 'fascinating-spots-mar':
            include 'partials/fascinating_spots_marathi.php';
            break;
        case 'ways-to-reach-mar':
            include 'partials/ways_to_reach_marathi.php';
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
        case 'map-photos-mar':
            include 'partials/map_photos_marathi.php';
            break;
        case 'nature-photos':
            include 'partials/nature_photos.php';
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
                    <span>Dashboard (मराठी)</span>
                </a>
                    <!-- Dashboard Marathi (FULL PAGE LOAD) -->
                <a href="dashboard.php"
                   class="nav-link-full flex items-center px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <i class="fas fa-language w-4 mr-2 text-accent text-xs"></i>
                    <span>Dashboard (English)</span>
                </a>
            </div>

            <!-- Forts & Historical -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Forts & Historical</p>
                <button onclick="toggleDropdown('forts-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-fort-awesome w-4 mr-2 text-accent text-xs"></i>
                        <span>Forts Management  <span class="text-gray-400 ml-1">(किल्ले व्यवस्थापन)</span> </span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="forts-menu-icon"></i>
                </button>
                <div id="forts-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="forts-mar" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">All Forts (सर्व किल्ले)</a>
                    <a href="#" data-page="forts-add-mar" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Add New Fort (नवीन किल्ला जोडा)</a>
                    <a href="#" data-page="fascinating-spots-mar" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Fascinating Spots (प्रेक्षणीय स्थळे)</a>
                    <a href="#" data-page="ways-to-reach-mar" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Ways to Reach (पोहोचण्याचे मार्ग)</a>
                </div>
            </div>

            <!-- Trekking -->
        <!--    <div class="mb-2">
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
            </div>-->

            <!-- Gallery -->
            <div class="mb-2">
                <p class="text-xs text-gray-400 px-2 mb-1 uppercase font-semibold">Media <span class="normal-case">(मीडिया)</span></p>
                <button onclick="toggleDropdown('gallery-menu')" class="dropdown-toggle w-full flex items-center justify-between px-2 py-1.5 rounded hover:bg-gray-700 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-images w-4 mr-2 text-accent text-xs"></i>
                        <span>Gallery <span class="text-gray-400 ml-1">(गॅलरी)</span></span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="gallery-menu-icon"></i>
                </button>
                <div id="gallery-menu" class="dropdown-content pl-6">
                    <a href="#" data-page="map-photos-mar" class="nav-link block px-2 py-1.5 rounded hover:bg-gray-700 text-xs">Map Photos <span class="text-gray-400 ml-1">(नकाशांचे फोटो)</span></a>
                </div>
            </div>

            
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
             <?php include 'partials/dashboard_content_marathi.php'; ?>
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

        document.addEventListener('click', function (e) {
                    const link = e.target.closest('.nav-link');
                    if (!link) return;

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
            loadContent('forts-mar');
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
                    loadContent('fascinating-spots-mar');
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
            .then(() => loadContent('fascinating-spots-mar'));
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

                
                window.closeWayModalMarathi = function () {
                    document.getElementById('way-modal-mar').classList.add('hidden');
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
/* =====================================================
   MARATHI FORTS – SPA SAFE FUNCTIONS
   (Exact copy of English logic, separate namespace)
===================================================== */

/* Load forts page without filters */
function loadFortsPageMarathi(page) {
    fetch(`?action=load_content&page=forts-mar&p=${page}`)
        .then(response => response.text())
        .then(html => {
            const container = document.getElementById('content-container');
            container.classList.add('fade-out');

            setTimeout(() => {
                container.innerHTML = html;
                container.classList.remove('fade-out');
                container.classList.add('fade-in');

                setTimeout(() => {
                    container.classList.remove('fade-in');
                }, 300);

                window.scrollTo({ top: 0, behavior: 'smooth' });
            }, 200);
        });
}

/* Load forts page WITH filters */
function loadFortsPageMarathiWithFilters(page) {

    const searchInput = document.getElementById('search-input-mar');
    const typeFilter  = document.getElementById('type-filter-mar');

    const search = searchInput ? searchInput.value.trim() : '';
    const type   = typeFilter ? typeFilter.value : '';

    let params = new URLSearchParams();
    params.append('action', 'load_content');
    params.append('page', 'forts-mar');
    params.append('p', page);

    if (search) params.append('search', search);
    if (type)   params.append('type', type);

    fetch(`?${params.toString()}`)
        .then(response => response.text())
        .then(html => {
            const container = document.getElementById('content-container');
            container.classList.add('fade-out');

            setTimeout(() => {
                container.innerHTML = html;
                container.classList.remove('fade-out');
                container.classList.add('fade-in');

                setTimeout(() => {
                    container.classList.remove('fade-in');
                }, 300);

                window.scrollTo({ top: 0, behavior: 'smooth' });
            }, 200);
        });
}

/* Apply filters */
function applyFiltersMarathi() {
    loadFortsPageMarathiWithFilters(1);
}

/* Clear all filters */
function clearFiltersMarathi() {
    loadFortsPageMarathi(1);
}

/* Clear search only */
function clearSearchMarathi() {
    const input = document.getElementById('search-input-mar');
    if (input) {
        input.value = '';
        applyFiltersMarathi();
    }
}

/* Clear type filter only */
function clearTypeFilterMarathi() {
    const select = document.getElementById('type-filter-mar');
    if (select) {
        select.value = '';
        applyFiltersMarathi();
    }
}

function viewFortMarathi(id) {
    fetch(`partials/ajax/get_fort_details_marathi.php?id=${id}`)
        .then(r => r.json())
        .then(d => {
            openFortModalMarathi('view', d);
        });
}

function editFortMarathi(id) {
    fetch(`partials/ajax/get_fort_details_marathi.php?id=${id}`)
        .then(r => r.json())
        .then(d => {
            openFortModalMarathi('edit', d);
        });
}

function openFortModalMarathi(mode, data) {

    currentFortId = data.FortID;
    isEditMode = mode === 'edit';

    const modalTitle = document.getElementById('modal-title');
    const saveBtn = document.getElementById('save-btn');

    modalTitle.innerText = mode === 'edit'
        ? 'Edit Fort (Marathi)'
        : 'View Fort (Marathi)';

    saveBtn.classList.toggle('hidden', mode === 'view');

    const disabled = mode === 'view' ? 'disabled' : '';

    document.getElementById('modal-content').innerHTML = `
        <div class="space-y-6">

            <!-- ================= ENGLISH FIELDS ================= -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-3">
                    English Fields
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    ${inputBlock('Fort Name (English)', 'FortName', data.FortName, disabled)}
                    ${inputBlock('Fort Type (English)', 'FortType', data.FortType, disabled)}
                    ${inputBlock('District (English)', 'FortDistrict', data.FortDistrict, disabled)}
                    ${inputBlock('Range (English)', 'FortRange', data.FortRange, disabled)}
                    ${inputBlock('Grade (English)', 'Grade', data.Grade, disabled)}
                </div>
            </div>

            <hr>

            <!-- ================= MARATHI FIELDS ================= -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-3">
                    Marathi Fields
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    ${inputBlock('Fort Name (Marathi)', 'FortNameMar', data.FortNameMar, disabled)}
                    ${inputBlock('Fort Type (Marathi)', 'FortTypeMar', data.FortTypeMar, disabled)}
                    ${inputBlock('District (Marathi)', 'FortDistrictMar', data.FortDistrictMar, disabled)}
                    ${inputBlock('Range (Marathi)', 'FortRangeMar', data.FortRangeMar, disabled)}
                    ${inputBlock('Grade (Marathi)', 'GradeMar', data.GradeMar, disabled)}
                    ${inputBlock('Height (Marathi)', 'HeightMar', data.HeightMar, disabled)}
                </div>

                <div class="mt-4 space-y-4">
                    ${textareaBlock('Introduction (Marathi)', 'Introduction', data.Introduction, disabled)}
                    ${textareaBlock('History (Marathi)', 'History', data.History, disabled)}
                    ${textareaBlock('Geography (Marathi)', 'Geography', data.Geography, disabled)}
                    ${textareaBlock('Notes (Marathi)', 'Notes', data.Notes, disabled)}
                </div>
            </div>
        </div>
    `;

    document.getElementById('fort-modal').classList.remove('hidden');
}

function inputBlock(label, id, value = '', disabled = '') {
    return `
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                ${label}
            </label>
            <input
                id="${id}"
                value="${value || ''}"
                ${disabled}
                class="w-full px-3 py-2 border rounded text-sm
                       focus:outline-none focus:ring-2 focus:ring-primary
                       ${disabled ? 'bg-gray-100 cursor-not-allowed' : ''}">
        </div>
    `;
}

function textareaBlock(label, id, value = '', disabled = '') {
    return `
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                ${label}
            </label>
            <textarea
                id="${id}"
                rows="4"
                ${disabled}
                class="w-full px-3 py-2 border rounded text-sm
                       focus:outline-none focus:ring-2 focus:ring-primary
                       resize-none
                       ${disabled ? 'bg-gray-100 cursor-not-allowed' : ''}">
${value || ''}
            </textarea>
        </div>
    `;
}




function saveFortMarathi() {

    fetch('partials/ajax/update_fort_marathi.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({
            id: currentFortId,

            FortName: FortName.value,
            FortNameMar: FortNameMar.value,
            FortType: FortType.value,
            FortTypeMar: FortTypeMar.value,
            FortDistrict: FortDistrict.value,
            FortDistrictMar: FortDistrictMar.value,
            FortRange: FortRange.value,
            FortRangeMar: FortRangeMar.value,
            Grade: Grade.value,
            GradeMar: GradeMar.value,
            HeightMar: HeightMar.value,

            Introduction: Introduction.value,
            History: History.value,
            Geography: Geography.value,
            Notes: Notes.value
        })
    })
    .then(r=>r.json())
    .then(res=>{
        if(res.success){
            closeModal();
            loadFortsPageMarathiWithFilters(1);
            alert('Fort updated successfully');
        } else {
            alert(res.message || 'Update failed');
        }
    });
}


function saveNewFortMarathi() {
    

const form = document.getElementById('add-fort-marathi-form');
    if (!form) return;

    // List of REQUIRED fields (English + Marathi)
    const requiredFields = [
        { name: 'FortName', label: 'Fort Name (English)' },
        { name: 'FortNameMar', label: 'Fort Name (Marathi)' },
        { name: 'FortType', label: 'Fort Type (English)' },
        { name: 'FortTypeMar', label: 'Fort Type (Marathi)' },
        { name: 'FortDistrict', label: 'District (English)' },
        { name: 'FortDistrictMar', label: 'District (Marathi)' },
        { name: 'FortRange', label: 'Range (English)' },
        { name: 'FortRangeMar', label: 'Range (Marathi)' },
        { name: 'Grade', label: 'Grade (English)' },
        { name: 'GradeMar', label: 'Grade (Marathi)' },
        { name: 'Introduction', label: 'Introduction (Marathi)' },
        { name: 'History', label: 'History (Marathi)' }
    ];

    let errors = [];
    let firstInvalid = null;

    // Reset previous error styles
    form.querySelectorAll('input, textarea').forEach(el => {
        el.classList.remove('border-red-500');
    });

    // Validation check
    requiredFields.forEach(field => {
        const input = form.querySelector(`[name="${field.name}"]`);
        if (!input || !input.value.trim()) {
            errors.push(field.label);
            if (input) {
                input.classList.add('border-red-500');
                if (!firstInvalid) firstInvalid = input;
            }
        }
    });

    // ❌ STOP if validation fails
    if (errors.length > 0) {
        alert(
            'Please fill the following required fields:\n\n• ' +
            errors.join('\n• ')
        );
        firstInvalid?.focus();
        return; // ⛔ prevent API call
    }

    
    const formData = new FormData(form);

    fetch('./api/add_fort_marathi.php', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            alert('Marathi fort added successfully');
            loadContent('forts-mar');
        } else {
            alert(res.message || 'Failed to add fort');
        }
    })
    .catch(() => alert('Server error'));
}

function loadWaysPageMarathi(page = 1) {
    loadContent('ways-to-reach-mar&p=' + page);
}

function openWayModalMarathi() {
    document.getElementById('wtr-id-mar').value = '';
    document.getElementById('wtr-name-mar').value = '';
    document.getElementById('wtr-desc-mar').value = '';
    document.getElementById('way-modal-mar').classList.remove('hidden');
}

function saveWayToReachMarathi() {
    const payload = {
        WTRID: document.getElementById('wtr-id-mar').value,
        FortName: document.getElementById('wtr-fort-mar').value,
        NameOfWay: document.getElementById('wtr-name-mar').value,
        Description: document.getElementById('wtr-desc-mar').value
    };

    if (!payload.FortName || !payload.NameOfWay) {
        alert('Required fields are missing');
        return;
    }

    fetch('partials/ajax/ways_to_reach_save_marathi.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload)
    })
    .then(r => r.json())
    .then(res => {
        if (res.success) {
            closeWayModalMarathi();
            loadWaysPageMarathi(1);
        } else {
            alert(res.message || 'Save failed');
        }
    });
}

function closeWayModalViewMarathi() {
    const modal = document.getElementById('way-modal-view-mar');
    if (modal) {
        modal.classList.add('hidden');
    }
}


                /* ---------- VIEW (MARATHI) ---------- */
window.viewWayMarathi = function (id) {
    fetch(`partials/ajax/ways_to_reach_get_marathi.php?id=${id}`)
        .then(res => res.json())
        .then(d => {

            if (!d || !d.WTRID) {
                alert('Record not found');
                return;
            }

            document.getElementById('wtr-id-view-mar').value   = d.WTRID;
            document.getElementById('wtr-fort-view-mar').value = d.FortName;
            document.getElementById('wtr-name-view-mar').value = d.NameOfWay;
            document.getElementById('wtr-desc-view-mar').value = d.Description;

            document.getElementById('way-modal-view-mar').classList.remove('hidden');
        })
        .catch(err => {
            console.error(err);
            alert('Error loading data');
        });
};



/* ---------- EDIT (MARATHI) ---------- */
window.editWayMarathi = function (id) {
    console.log('Editing way to reach ID:', id);
    fetch(`partials/ajax/ways_to_reach_get_marathi.php?id=${id}`)
        .then(res => res.json())
        .then(d => {
            if (!d || !d.WTRID) {
                alert('Record not found');
                return;
            }

            document.getElementById('wtr-id-mar').value   = d.WTRID;
            document.getElementById('wtr-fort-mar').value = d.FortName;
            document.getElementById('wtr-name-mar').value = d.NameOfWay;
            document.getElementById('wtr-desc-mar').value = d.Description;

            document.getElementById('way-modal-title-mar').innerText = 'Edit Way To Reach';
            document.getElementById('way-modal-mar').classList.remove('hidden');
        })
        .catch(() => alert('Error loading data'));
};




/* Real-time search (same debounce logic as English) */
(function () {
    const input = document.getElementById('search-input-mar');
    if (!input) return;

    let timeout;
    input.addEventListener('input', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            applyFiltersMarathi();
        }, 500);
    });
})();
</script>


</html>