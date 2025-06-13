<?php
// Simple header without database dependency
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
</head>
<body class="font-poppins bg-white dark:bg-gray-900 transition-colors duration-300">
    
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
        <nav class="glass-effect px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <!-- Logo -->
                <a href="index.php" class="flex items-center">
                    <i class="fas fa-mountain text-3xl text-primary dark:text-accent mr-2"></i>
                    <span class="self-center text-xl font-bold whitespace-nowrap text-primary dark:text-white">
                        Trekshitz
                        <span class="text-sm font-normal text-gray-600 dark:text-gray-300 block">
                            ट्रेकशित्ज़
                        </span>
                    </span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex lg:w-auto lg:order-1" id="desktop-menu">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li><a href="index.php" class="nav-link <?php echo ($current_page == 'index') ? 'text-primary dark:text-accent' : 'text-gray-700 dark:text-gray-300'; ?> hover:text-primary dark:hover:text-accent transition-colors">Home</a></li>
                        <li><a href="treks.php" class="nav-link <?php echo ($current_page == 'treks') ? 'text-primary dark:text-accent' : 'text-gray-700 dark:text-gray-300'; ?> hover:text-primary dark:hover:text-accent transition-colors">Treks</a></li>
                        <li><a href="forts.php" class="nav-link <?php echo ($current_page == 'forts') ? 'text-primary dark:text-accent' : 'text-gray-700 dark:text-gray-300'; ?> hover:text-primary dark:hover:text-accent transition-colors">Forts</a></li>
                        <li><a href="gallery.php" class="nav-link <?php echo ($current_page == 'gallery') ? 'text-primary dark:text-accent' : 'text-gray-700 dark:text-gray-300'; ?> hover:text-primary dark:hover:text-accent transition-colors">Gallery</a></li>
                        <li><a href="about.php" class="nav-link <?php echo ($current_page == 'about') ? 'text-primary dark:text-accent' : 'text-gray-700 dark:text-gray-300'; ?> hover:text-primary dark:hover:text-accent transition-colors">About</a></li>
                        <li><a href="contact.php" class="nav-link <?php echo ($current_page == 'contact') ? 'text-primary dark:text-accent' : 'text-gray-700 dark:text-gray-300'; ?> hover:text-primary dark:hover:text-accent transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Dark Mode Toggle & Mobile Menu Button -->
                <div class="flex items-center lg:order-2 space-x-3">
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L13.09 8.26L20 9L14 14.74L15.18 21.02L10 17.77L4.82 21.02L6 14.74L0 9L6.91 8.26L10 2Z"></path>
                        </svg>
                    </button>
                    
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Mobile Menu -->
                <div class="hidden justify-between items-center w-full lg:hidden" id="mobile-menu">
                    <ul class="flex flex-col mt-4 font-medium">
                        <li><a href="index.php" class="block py-2 px-4 <?php echo ($current_page == 'index') ? 'text-primary dark:text-accent bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300'; ?> hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Home</a></li>
                        <li><a href="treks.php" class="block py-2 px-4 <?php echo ($current_page == 'treks') ? 'text-primary dark:text-accent bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300'; ?> hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Treks</a></li>
                        <li><a href="forts.php" class="block py-2 px-4 <?php echo ($current_page == 'forts') ? 'text-primary dark:text-accent bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300'; ?> hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Forts</a></li>
                        <li><a href="gallery.php" class="block py-2 px-4 <?php echo ($current_page == 'gallery') ? 'text-primary dark:text-accent bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300'; ?> hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Gallery</a></li>
                        <li><a href="about.php" class="block py-2 px-4 <?php echo ($current_page == 'about') ? 'text-primary dark:text-accent bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300'; ?> hover:bg-gray-100 dark:hover:bg-gray-700 rounded">About</a></li>
                        <li><a href="contact.php" class="block py-2 px-4 <?php echo ($current_page == 'contact') ? 'text-primary dark:text-accent bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300'; ?> hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>