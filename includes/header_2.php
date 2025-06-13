<?php
// Enhanced header with all missing features
// Get current page for active nav highlighting
$current_page = basename($_SERVER['PHP_SELF'], '.php');

// Default values (can be overridden by individual pages)
$page_title = isset($page_title) ? $page_title : 'Trekshitz - Explore Sahyadri Mountains | Trekking Adventures';
$meta_description = isset($meta_description) ? $meta_description : 'Explore the beautiful Sahyadri mountains with Trekshitz. Join our trekking adventures, discover ancient forts, and connect with nature.';
$meta_keywords = isset($meta_keywords) ? $meta_keywords : 'trekking, sahyadri, forts, hiking, adventure, nature, maharashtra, mountains';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <meta name="author" content="Trekshitz">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://trekshitz.com">
    <meta property="og:image" content="https://trekshitz.com/assets/images/og-image.jpg">
    
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#2d5016',
                        secondary: '#4a7c23',
                        accent: '#7fb069',
                        forest: '#355e3b',
                        earth: '#8b4513',
                        mountain: '#708090'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <!-- Header-specific CSS -->
<style>
    /* Hamburger Animation */
    .hamburger-icon {
        width: 24px;
        height: 18px;
        position: relative;
        cursor: pointer;
    }

    .hamburger-line {
        display: block;
        height: 2px;
        width: 100%;
        background: currentColor;
        border-radius: 1px;
        transition: all 0.3s;
        position: absolute;
    }

    .hamburger-line-1 {
        top: 0;
    }

    .hamburger-line-2 {
        top: 50%;
        transform: translateY(-50%);
    }

    .hamburger-line-3 {
        bottom: 0;
    }

    /* Active state for hamburger */
    .hamburger-active .hamburger-line-1 {
        transform: rotate(45deg);
        top: 50%;
        margin-top: -1px;
    }

    .hamburger-active .hamburger-line-2 {
        opacity: 0;
    }

    .hamburger-active .hamburger-line-3 {
        transform: rotate(-45deg);
        bottom: 50%;
        margin-bottom: -1px;
    }

    /* Glass effect for navbar */
    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .dark .glass-effect {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Mobile menu animations */
    .mobile-menu-open {
        transform: translateX(0) !important;
    }

    .mobile-menu-overlay-visible {
        display: block !important;
    }

    /* Dropdown animations */
    .mobile-dropdown-active .fa-chevron-down {
        transform: rotate(180deg);
    }

    /* Mobile menu background - WHITE as requested - FIXED POSITIONING */
    #mobile-menu {
        position: fixed !important;
        top: 0 !important;
        right: 0 !important;
        height: 100vh !important;
        width: 320px !important;
        background-color: white !important;
        z-index: 9999 !important;
        transform: translateX(100%) !important;
        transition: transform 0.3s ease-in-out !important;
        overflow-y: auto !important;
        box-shadow: -4px 0 6px -1px rgba(0, 0, 0, 0.1) !important;
    }

    .dark #mobile-menu {
        background-color: #111827 !important;
    }

    /* Force visibility when open - OVERRIDE TAILWIND */
    #mobile-menu.mobile-menu-open {
        transform: translateX(0) !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    /* Overlay - FIXED */
    #mobile-menu-overlay {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background-color: rgba(0, 0, 0, 0.5) !important;
        z-index: 9998 !important;
        display: none !important;
    }

    #mobile-menu-overlay.mobile-menu-overlay-visible {
        display: block !important;
    }

    /* Ensure the hamburger menu shows on mobile */
    @media (max-width: 1023px) {
        #mobile-menu-button {
            display: inline-flex !important;
        }
    }

    /* Make sure mobile menu is above everything */
    #mobile-menu {
        z-index: 999999 !important;
    }

    #mobile-menu-overlay {
        z-index: 999998 !important;
    }

    /* Mobile menu border */
    #mobile-menu .border-b {
        border-color: #e5e7eb;
    }

    .dark #mobile-menu .border-b {
        border-color: #374151;
    }

    /* Smooth transitions for mobile dropdown content */
    .mobile-dropdown-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, opacity 0.3s ease;
        opacity: 0;
    }

    .mobile-dropdown-content:not(.hidden) {
        max-height: 200px;
        opacity: 1;
    }

    /* Ensure proper z-index stacking */
    .z-40 {
        z-index: 40;
    }

    .z-50 {
        z-index: 50;
    }
</style>
</head>
<body class="font-poppins bg-white dark:bg-gray-900 transition-colors duration-300">

    <!-- Header Component -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
        <nav class="glass-effect px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                
                <!-- Logo Section with Bilingual Support -->
                <a href="/" class="flex items-center group">
                    <i class="fas fa-mountain text-3xl text-primary dark:text-accent mr-2 group-hover:scale-110 transition-transform"></i>
                    <div>
                        <span class="self-center text-xl font-bold whitespace-nowrap text-primary dark:text-white">
                            Trekshitz
                        </span>
                        <span class="text-sm font-normal text-gray-600 dark:text-gray-300 block">
                            ट्रेकशित्ज़
                        </span>
                    </div>
                </a>
                
                <!-- Desktop Navigation Menu -->
                <div class="hidden lg:flex lg:w-auto lg:order-1" id="desktop-menu">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#home" class="nav-link block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors duration-300 relative group">
                                Home
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary dark:bg-accent transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </li>
                        <li class="relative group">
                            <a href="#treks" class="nav-link block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors duration-300">
                                Treks
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary dark:bg-accent transition-all duration-300 group-hover:w-full"></span>
                            </a>
                            <!-- Dropdown Menu for Treks -->
                            <div class="absolute top-full left-0 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2">
                                <div class="py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Upcoming Treks</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Trek Schedule</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Trek Gear Guide</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Difficulty Levels</a>
                                </div>
                            </div>
                        </li>
                        <li class="relative group">
                            <a href="#forts" class="nav-link block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors duration-300">
                                Forts
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary dark:bg-accent transition-all duration-300 group-hover:w-full"></span>
                            </a>
                            <!-- Dropdown Menu for Forts -->
                            <div class="absolute top-full left-0 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2">
                                <div class="py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">किल्ल्यांची माहिती</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Fort Information</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Maps (नकाशे)</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Historical Information</a>
                                </div>
                            </div>
                        </li>
                        <li class="relative group">
                            <a href="#gallery" class="nav-link block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors duration-300">
                                Gallery
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary dark:bg-accent transition-all duration-300 group-hover:w-full"></span>
                            </a>
                            <!-- Dropdown Menu for Gallery -->
                            <div class="absolute top-full left-0 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2">
                                <div class="py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Photo Gallery</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Butterflies</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Caves</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Flowers</a>
                                </div>
                            </div>
                        </li>
                        <li class="relative group">
                            <a href="#about" class="nav-link block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors duration-300">
                                About
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary dark:bg-accent transition-all duration-300 group-hover:w-full"></span>
                            </a>
                            <!-- Dropdown Menu for About -->
                            <div class="absolute top-full left-0 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2">
                                <div class="py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">About Trekshitz</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">संस्थेविषयी</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Our Team</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">राजा शिवछत्रपती</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#contact" class="nav-link block py-2 pr-4 pl-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors duration-300 relative group">
                                Contact
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary dark:bg-accent transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Action Buttons & Controls -->
                <div class="flex items-center lg:order-2 space-x-3">
                    
                    <!-- Language Switcher -->
                    <div class="relative group hidden md:block">
                        <button class="flex items-center text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5">
                            <i class="fas fa-globe mr-1"></i>
                            <span class="text-xs">EN</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute right-0 top-full w-32 bg-white dark:bg-gray-800 shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 mt-2">
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" data-language="en">
                                    <i class="fas fa-flag mr-2"></i>English
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" data-language="mr">
                                    <i class="fas fa-flag mr-2"></i>मराठी
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Search Button -->
                    <button class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5 hidden md:block">
                        <i class="fas fa-search w-5 h-5"></i>
                    </button>
                    
                    <!-- Dark Mode Toggle with Enhanced Icons -->
                    <button id="theme-toggle" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5 transition-all duration-300">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 716.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <!-- CTA Button -->
                    <a href="#treks" class="hidden md:block bg-primary hover:bg-secondary text-white px-6 py-2.5 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Join Trek
                    </a>
                    
                    <!-- Hamburger Menu Button for Mobile -->
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-all duration-300">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger Icon -->
                        <div class="hamburger-icon">
                            <span class="hamburger-line hamburger-line-1"></span>
                            <span class="hamburger-line hamburger-line-2"></span>
                            <span class="hamburger-line hamburger-line-3"></span>
                        </div>
                    </button>
                </div>
                
                <!-- Mobile Menu Overlay -->
                <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="mobile-menu-overlay"></div>
                
                <!-- Mobile Menu Sidebar -->
                <div class="fixed top-0 right-0 h-full w-80 bg-white dark:bg-gray-900 z-50 transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden" id="mobile-menu">
                    <!-- Mobile Menu Header -->
                    <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <i class="fas fa-mountain text-2xl text-primary dark:text-accent mr-2"></i>
                            <span class="text-lg font-bold text-primary dark:text-white">Trekshitz</span>
                        </div>
                        <button id="mobile-menu-close" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    
                    <!-- Mobile Menu Content -->
                    <div class="overflow-y-auto h-full pb-20">
                        <nav class="p-6">
                            <ul class="space-y-4">
                                <li>
                                    <a href="#home" class="flex items-center py-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors mobile-menu-link">
                                        <i class="fas fa-home mr-3"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class="mobile-dropdown">
                                        <button class="flex items-center justify-between w-full py-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors mobile-dropdown-btn">
                                            <div class="flex items-center">
                                                <i class="fas fa-hiking mr-3"></i>
                                                Treks
                                            </div>
                                            <i class="fas fa-chevron-down transition-transform duration-300"></i>
                                        </button>
                                        <div class="mobile-dropdown-content ml-6 mt-2 space-y-2 hidden">
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Upcoming Treks</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Trek Schedule</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Trek Gear Guide</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Difficulty Levels</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="mobile-dropdown">
                                        <button class="flex items-center justify-between w-full py-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors mobile-dropdown-btn">
                                            <div class="flex items-center">
                                                <i class="fas fa-fort-awesome mr-3"></i>
                                                Forts
                                            </div>
                                            <i class="fas fa-chevron-down transition-transform duration-300"></i>
                                        </button>
                                        <div class="mobile-dropdown-content ml-6 mt-2 space-y-2 hidden">
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">किल्ल्यांची माहिती</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Fort Information</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Maps (नकाशे)</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Historical Information</a>
                                        </div>
                                    </div>
                              </li>
                                <li>
                                    <div class="mobile-dropdown">
                                        <button class="flex items-center justify-between w-full py-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors mobile-dropdown-btn">
                                            <div class="flex items-center">
                                                <i class="fas fa-images mr-3"></i>
                                                Gallery
                                            </div>
                                            <i class="fas fa-chevron-down transition-transform duration-300"></i>
                                        </button>
                                        <div class="mobile-dropdown-content ml-6 mt-2 space-y-2 hidden">
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Photo Gallery</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Butterflies</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Caves</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Flowers</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="mobile-dropdown">
                                        <button class="flex items-center justify-between w-full py-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors mobile-dropdown-btn">
                                            <div class="flex items-center">
                                                <i class="fas fa-info-circle mr-3"></i>
                                                About
                                            </div>
                                            <i class="fas fa-chevron-down transition-transform duration-300"></i>
                                        </button>
                                        <div class="mobile-dropdown-content ml-6 mt-2 space-y-2 hidden">
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">About Trekshitz</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">संस्थेविषयी</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">Our Team</a>
                                            <a href="#" class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-accent">राजा शिवछत्रपती</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#contact" class="flex items-center py-3 text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-accent transition-colors mobile-menu-link">
                                        <i class="fas fa-envelope mr-3"></i>
                                        Contact
                                    </a>
                                </li>
                            </ul>
                            
                            <!-- Mobile Menu Actions -->
                            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                                <!-- Language Switcher Mobile -->
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-gray-700 dark:text-gray-300">Language:</span>
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 text-sm bg-primary text-white rounded" data-language="en">EN</button>
                                        <button class="px-3 py-1 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded" data-language="mr">मराठी</button>
                                    </div>
                                </div>
                                
                                <!-- CTA Button Mobile -->
                                <a href="#treks" class="block w-full bg-primary hover:bg-secondary text-white text-center py-3 rounded-lg font-semibold transition-all duration-300 mb-4">
                                    Join Trek
                                </a>
                                
                                <!-- Social Links Mobile -->
                                <div class="flex justify-center space-x-4">
                                    <a href="https://www.facebook.com/groups/trekshitiz/" target="_blank" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                        <i class="fab fa-facebook-f text-white"></i>
                                    </a>
                                    <a href="https://www.instagram.com/trekshitiz_ts/" target="_blank" class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700 transition-colors">
                                        <i class="fab fa-instagram text-white"></i>
                                    </a>
                                    <a href="https://www.youtube.com/channel/UCfcgOwwtNbKxZZEGZG8ndgg" target="_blank" class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition-colors">
                                        <i class="fab fa-youtube text-white"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center hover:bg-green-700 transition-colors">
                                        <i class="fab fa-whatsapp text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Header-specific JavaScript -->
    <script>
    // This script ensures header functionality works immediately - COMPLETE VERSION
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Enhanced Header script loaded');
        
        // Mobile menu elements
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const hamburgerIcon = document.querySelector('.hamburger-icon');
        
        console.log('Header elements found:', {
            button: !!mobileMenuButton,
            menu: !!mobileMenu,
            overlay: !!mobileMenuOverlay,
            close: !!mobileMenuClose,
            hamburger: !!hamburgerIcon
        });
        
        // Mobile menu toggle function
        function toggleMobileMenu() {
            console.log('Header: Toggling mobile menu');
            
            if (mobileMenu) {
                const isOpen = mobileMenu.classList.contains('mobile-menu-open');
                console.log('Menu is currently open:', isOpen);
                
                if (isOpen) {
                    // Close menu
                    mobileMenu.classList.remove('mobile-menu-open');
                    mobileMenu.style.transform = 'translateX(100%)';
                    console.log('Closing menu');
                } else {
                    // Open menu - FORCE POSITIONING
                    mobileMenu.classList.add('mobile-menu-open');
                    
                    // Force all the positioning styles
                    mobileMenu.style.position = 'fixed';
                    mobileMenu.style.top = '0';
                    mobileMenu.style.right = '0';
                    mobileMenu.style.height = '100vh';
                    mobileMenu.style.width = '320px';
                    mobileMenu.style.backgroundColor = 'white';
                    mobileMenu.style.zIndex = '999999';
                    mobileMenu.style.transform = 'translateX(0)';
                    mobileMenu.style.visibility = 'visible';
                    mobileMenu.style.opacity = '1';
                    mobileMenu.style.overflow = 'auto';
                    mobileMenu.style.boxShadow = '-4px 0 6px -1px rgba(0, 0, 0, 0.1)';
                    
                    console.log('Opening menu with forced styles');
                }
            }
            
            if (mobileMenuOverlay) {
                const isVisible = mobileMenuOverlay.classList.contains('mobile-menu-overlay-visible');
                if (isVisible) {
                    mobileMenuOverlay.classList.remove('mobile-menu-overlay-visible');
                    mobileMenuOverlay.style.display = 'none';
                } else {
                    mobileMenuOverlay.classList.add('mobile-menu-overlay-visible');
                    
                    // Force overlay positioning
                    mobileMenuOverlay.style.position = 'fixed';
                    mobileMenuOverlay.style.top = '0';
                    mobileMenuOverlay.style.left = '0';
                    mobileMenuOverlay.style.right = '0';
                    mobileMenuOverlay.style.bottom = '0';
                    mobileMenuOverlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                    mobileMenuOverlay.style.zIndex = '999998';
                    mobileMenuOverlay.style.display = 'block';
                }
            }
            
            if (hamburgerIcon) {
                hamburgerIcon.classList.toggle('hamburger-active');
            }
            
            document.body.classList.toggle('overflow-hidden');
        }
        
        // Event listeners
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Header: Mobile menu button clicked');
                toggleMobileMenu();
            });
        }
        
        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Header: Mobile menu close clicked');
                toggleMobileMenu();
            });
        }
        
        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Header: Mobile menu overlay clicked');
                toggleMobileMenu();
            });
        }
        
        // Mobile dropdown functionality
        const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');
        console.log('Header: Found dropdown buttons:', mobileDropdownBtns.length);
        
        mobileDropdownBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Header: Dropdown clicked');
                
                const dropdown = this.closest('.mobile-dropdown');
                const content = dropdown?.querySelector('.mobile-dropdown-content');
                const icon = this.querySelector('.fa-chevron-down');
                
                if (!content) return;
                
                const isOpen = !content.classList.contains('hidden');
                
                // Close all other dropdowns
                mobileDropdownBtns.forEach(otherBtn => {
                    if (otherBtn !== this) {
                        const otherDropdown = otherBtn.closest('.mobile-dropdown');
                        const otherContent = otherDropdown?.querySelector('.mobile-dropdown-content');
                        const otherIcon = otherBtn.querySelector('.fa-chevron-down');
                        
                        if (otherContent) {
                            otherContent.classList.add('hidden');
                            otherContent.style.maxHeight = '0';
                            otherContent.style.opacity = '0';
                        }
                        if (otherIcon) {
                            otherIcon.style.transform = 'rotate(0deg)';
                        }
                    }
                });
                
                // Toggle current dropdown
                if (isOpen) {
                    content.classList.add('hidden');
                    content.style.maxHeight = '0';
                    content.style.opacity = '0';
                    if (icon) icon.style.transform = 'rotate(0deg)';
                } else {
                    content.classList.remove('hidden');
                    content.style.maxHeight = '200px';
                    content.style.opacity = '1';
                    if (icon) icon.style.transform = 'rotate(180deg)';
                }
            });
        });
        
        // Dark mode toggle - ENHANCED
        const themeToggle = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');
        
        console.log('Header: Dark mode elements:', {
            toggle: !!themeToggle,
            darkIcon: !!darkIcon,
            lightIcon: !!lightIcon
        });
        
        if (themeToggle && darkIcon && lightIcon) {
            // Get current theme
            const currentTheme = localStorage.getItem('theme') || 'light';
            console.log('Header: Current theme:', currentTheme);
            
            // Apply initial theme
            function applyTheme(theme) {
                console.log('Header: Applying theme:', theme);
                
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                    document.body.classList.add('dark');
                    darkIcon.style.display = 'none';
                    lightIcon.style.display = 'block';
                } else {
                    document.documentElement.classList.remove('dark');
                    document.body.classList.remove('dark');
                    darkIcon.style.display = 'block';
                    lightIcon.style.display = 'none';
                }
            }
            
            // Set initial theme
            applyTheme(currentTheme);
            
            // Theme toggle click
            themeToggle.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Header: Theme toggle clicked');
                
                const isDark = document.documentElement.classList.contains('dark');
                const newTheme = isDark ? 'light' : 'dark';
                
                console.log('Header: Switching to', newTheme);
                
                applyTheme(newTheme);
                localStorage.setItem('theme', newTheme);
                
                // Dispatch custom event for theme change
                window.dispatchEvent(new CustomEvent('themeChanged', { 
                    detail: { theme: newTheme } 
                }));
            });
        }
        
        // Navbar scroll effect - ENHANCED
        const navbar = document.getElementById('navbar');
        if (navbar) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.backdropFilter = 'blur(10px)';
                    navbar.style.boxShadow = '0 10px 15px -3px rgb(0 0 0 / 0.1)';
                } else {
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
                    navbar.style.backdropFilter = 'blur(10px)';
                    navbar.style.boxShadow = 'none';
                }
            });
        }
        
        // Language switcher - ENHANCED
        const languageButtons = document.querySelectorAll('[data-language]');
        languageButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const language = this.getAttribute('data-language');
                console.log('Header: Language switched to:', language);
                
                // Update active button styling
                languageButtons.forEach(btn => {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('text-gray-400');
                });
                
                // Set active language button
                const activeButtons = document.querySelectorAll(`[data-language="${language}"]`);
                activeButtons.forEach(activeButton => {
                    activeButton.classList.add('bg-primary', 'text-white');
                    activeButton.classList.remove('text-gray-400');
                });
                
                localStorage.setItem('language', language);
                
                // Dispatch custom event for language change
                window.dispatchEvent(new CustomEvent('languageChanged', { 
                    detail: { language } 
                }));
            });
        });
        
        // Set initial language
        const savedLanguage = localStorage.getItem('language') || 'en';
        const initialActiveButtons = document.querySelectorAll(`[data-language="${savedLanguage}"]`);
        initialActiveButtons.forEach(button => {
            button.classList.add('bg-primary', 'text-white');
            button.classList.remove('text-gray-400');
        });
        
        // Search button functionality (placeholder)
        const searchButton = document.querySelector('.fa-search')?.parentElement;
        if (searchButton) {
            searchButton.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Search clicked');
                // Add search functionality here
                alert('Search functionality coming soon!');
            });
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                
                if (!targetId || targetId === '#' || targetId.length <= 1) {
                    e.preventDefault();
                    return;
                }
                
                try {
                    const target = document.querySelector(targetId);
                    if (target) {
                        e.preventDefault();
                        const headerHeight = 80;
                        const targetPosition = target.offsetTop - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                        
                        // Close mobile menu if open
                        if (mobileMenu && mobileMenu.classList.contains('mobile-menu-open')) {
                            toggleMobileMenu();
                        }
                    }
                } catch (error) {
                    console.warn('Invalid selector:', targetId);
                    e.preventDefault();
                }
            });
        });
        
        console.log('Enhanced Header: All functionality initialized');
    });

    // Expose enhanced debugging functions
    window.headerDebug = {
        toggleMenu: function() {
            const btn = document.getElementById('mobile-menu-button');
            if (btn) btn.click();
        },
        toggleTheme: function() {
            const btn = document.getElementById('theme-toggle');
            if (btn) btn.click();
        },
        forceShowMenu: function() {
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            
            if (menu) {
                menu.style.position = 'fixed';
                menu.style.top = '0';
                menu.style.right = '0';
                menu.style.height = '100vh';
                menu.style.width = '320px';
                menu.style.backgroundColor = 'white';
                menu.style.zIndex = '9999';
                menu.style.transform = 'translateX(0)';
                menu.style.visibility = 'visible';
                menu.style.opacity = '1';
                menu.style.border = '3px solid red';
                console.log('Menu forced to show');
            }
            
            if (overlay) {
                overlay.style.position = 'fixed';
                overlay.style.inset = '0';
                overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                overlay.style.zIndex = '9998';
                overlay.style.display = 'block';
                console.log('Overlay forced to show');
            }
        },
        switchLanguage: function(lang) {
            const btn = document.querySelector(`[data-language="${lang}"]`);
            if (btn) btn.click();
        }
    };

    console.log('Enhanced Header debug functions available:');
    console.log('- headerDebug.toggleMenu()');
    console.log('- headerDebug.forceShowMenu()'); 
    console.log('- headerDebug.toggleTheme()');
    console.log('- headerDebug.switchLanguage("en" or "mr")');
    </script>