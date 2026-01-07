<?php
// Set page specific variables
$page_title = 'Photo Gallery of Ancient Caves in Sahyadri | Trekshitz';
$meta_description = 'Beautiful photographs of ancient Buddhist caves, natural rock formations, and monastic complexes in Maharashtra. Explore 2000-year-old heritage sites.';
$meta_keywords = 'cave photos, Buddhist caves, Sahyadri caves, Western ghats, ancient caves, Maharashtra caves, heritage photography, rock formations';

// Include header
include '../includes/header.php';
?>

<style>
/* Cave Gallery specific styles - EXACT SAME AS BUTTERFLY GALLERY */
.cave-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #000;
    position: relative;
}

.cave-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.cave-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.cave-card:hover .cave-image {
    transform: scale(1.1);
    filter: brightness(1.1);
}

.cave-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
    color: white;
    padding: 1.5rem 1rem 1rem;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.cave-card:hover .cave-overlay {
    transform: translateY(0);
}

.cave-stats {
    background: linear-gradient(135deg, #8b5a2b, #cd853f);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.photo-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.cave-modal-header {
    background: linear-gradient(135deg, #8b5a2b, #cd853f);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

.cave-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.cave-photo-item {
    cursor: pointer;
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
}

.cave-photo-item:hover {
    transform: scale(1.05);
}

.heritage-name {
    font-style: italic;
    color: #daa520;
    font-size: 0.9rem;
}

/* ALPHABET FILTER - EXACT SAME AS BUTTERFLY GALLERY */
.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin: 2rem 0;
}

.alphabet-filter a {
    padding: 0.5rem 1rem;
    background: #8b5a2b;
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: bold;
}

.alphabet-filter a:hover,
.alphabet-filter a.active {
    background: #daa520;
    transform: translateY(-2px);
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin: 2rem 0;
}

.pagination a,
.pagination span {
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination a {
    background: #8b5a2b;
    color: white;
}

.pagination a:hover {
    background: #daa520;
}

.pagination .current {
    background: #daa520;
    color: white;
    font-weight: bold;
}

.lightbox-image-container {
    position: relative;
    text-align: center;
}

.lightbox-prev, .lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.5rem;
    transition: background 0.3s ease;
}

.lightbox-prev {
    left: -60px;
}

.lightbox-next {
    right: -60px;
}

.lightbox-prev:hover, .lightbox-next:hover {
    background: rgba(0, 0, 0, 0.9);
}

.lightbox-thumbnails {
    max-height: 100px;
    overflow-x: auto;
}

.lightbox-thumbnails::-webkit-scrollbar {
    height: 4px;
}

.lightbox-thumbnails::-webkit-scrollbar-thumb {
    background: #8b5a2b;
    border-radius: 2px;
}

@media (max-width: 768px) {
    .cave-image {
        height: 150px;
    }
    
    .cave-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .lightbox-prev {
        left: 10px;
    }
    
    .lightbox-next {
        right: 10px;
    }
}
</style>

<main id="main-content">
    <!-- Hero Section - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section class="relative py-20 bg-gradient-to-br from-yellow-800 via-yellow-700 to-yellow-600 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"cave\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><path d=\"M10,2 C6,6 4,12 6,16 C8,18 12,18 14,16 C16,12 14,6 10,2 Z\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23cave)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 font-bilingual">
                    🏔️ गुहांची गॅलरी
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Photo Gallery of Ancient Caves
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Ancient Buddhist caves and natural rock formations captured in Sahyadri mountains
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-yellow-800 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-camera mr-2"></i>
                        Browse Gallery
                    </a>
                    <a href="#alphabetical" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-yellow-800 transition-colors">
                        <i class="fas fa-sort-alpha-down mr-2"></i>
                        Alphabetical View
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Box - EXACT SAME AS BUTTERFLY GALLERY -->
    <div class="container mx-auto px-4 py-4">
        <div class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" id="cave-search" placeholder="Search caves by name or heritage type..." 
                       class="w-full px-4 py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-yellow-600"
                       onkeyup="searchCaves()">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Stats - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="cave-stats max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">5+</div>
                        <p class="opacity-90">Cave Complexes</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">31+</div>
                        <p class="opacity-90">Photographs</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">2000+</div>
                        <p class="opacity-90">Years Old</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alphabetical Filter - HARDCODED ALPHABETS -->
    <section id="alphabetical" class="py-8 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Browse Caves by Name
                </h3>
                <p class="text-gray-600 dark:text-gray-300">* Click on the photo to see more photos of the cave complex</p>
            </div>
            
            <div class="alphabet-filter">
                <a href="#" onclick="filterByAlphabet('ALL')" class="active">ALL</a>
                <a href="#" onclick="filterByAlphabet('A')">A</a>
                <a href="#" onclick="filterByAlphabet('B')">B</a>
                <a href="#" onclick="filterByAlphabet('C')">C</a>
                <a href="#" onclick="filterByAlphabet('D')">D</a>
                <a href="#" onclick="filterByAlphabet('E')">E</a>
                <a href="#" onclick="filterByAlphabet('F')">F</a>
                <a href="#" onclick="filterByAlphabet('G')">G</a>
                <a href="#" onclick="filterByAlphabet('H')">H</a>
                <a href="#" onclick="filterByAlphabet('I')">I</a>
                <a href="#" onclick="filterByAlphabet('J')">J</a>
                <a href="#" onclick="filterByAlphabet('K')">K</a>
                <a href="#" onclick="filterByAlphabet('L')">L</a>
                <a href="#" onclick="filterByAlphabet('M')">M</a>
                <a href="#" onclick="filterByAlphabet('N')">N</a>
                <a href="#" onclick="filterByAlphabet('O')">O</a>
                <a href="#" onclick="filterByAlphabet('P')">P</a>
                <a href="#" onclick="filterByAlphabet('Q')">Q</a>
                <a href="#" onclick="filterByAlphabet('R')">R</a>
                <a href="#" onclick="filterByAlphabet('S')">S</a>
                <a href="#" onclick="filterByAlphabet('T')">T</a>
                <a href="#" onclick="filterByAlphabet('U')">U</a>
                <a href="#" onclick="filterByAlphabet('V')">V</a>
                <a href="#" onclick="filterByAlphabet('W')">W</a>
                <a href="#" onclick="filterByAlphabet('X')">X</a>
                <a href="#" onclick="filterByAlphabet('Y')">Y</a>
                <a href="#" onclick="filterByAlphabet('Z')">Z</a>
            </div>
        </div>
    </section>

    <!-- Cave Gallery - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div id="gallery-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Cave Cards - EXACT SAME STRUCTURE AS BUTTERFLY CARDS -->
                    <div class="cave-card" data-alphabet="A" onclick="openCaveGallery('Ajanta_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ajanta Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Ajanta Caves</h3>
                            <p class="heritage-name mb-2">Buddhist Monastic Complex</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                15 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="B" onclick="openCaveGallery('Bhaja_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Bhaja Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Bhaja Caves</h3>
                            <p class="heritage-name mb-2">Ancient Buddhist Caves</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                12 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="B" onclick="openCaveGallery('Bedse_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Bedse Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Bedse Caves</h3>
                            <p class="heritage-name mb-2">Rock-cut Architecture</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                8 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="E" onclick="openCaveGallery('Ellora_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Ellora Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Ellora Caves</h3>
                            <p class="heritage-name mb-2">Multi-religious Complex</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                20 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="E" onclick="openCaveGallery('Elephanta_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Elephanta Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Elephanta Caves</h3>
                            <p class="heritage-name mb-2">Shiva Temple Caves</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                14 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="K" onclick="openCaveGallery('Karla_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Karla Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Karla Caves</h3>
                            <p class="heritage-name mb-2">Buddhist Chaitya Hall</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                10 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="K" onclick="openCaveGallery('Kanheri_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Kanheri Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Kanheri Caves</h3>
                            <p class="heritage-name mb-2">Buddhist Monastery</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                18 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="L" onclick="openCaveGallery('Lenyadri_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Lenyadri Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Lenyadri Caves</h3>
                            <p class="heritage-name mb-2">Ganesha Temple Caves</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                9 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="N" onclick="openCaveGallery('Nashik_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Nashik Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Nashik Caves</h3>
                            <p class="heritage-name mb-2">Pandav Leni Caves</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                11 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="P" onclick="openCaveGallery('Pitalkhora_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Pitalkhora Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Pitalkhora Caves</h3>
                            <p class="heritage-name mb-2">Buddhist Rock Caves</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                7 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="S" onclick="openCaveGallery('Shivneri_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Shivneri Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Shivneri Caves</h3>
                            <p class="heritage-name mb-2">Natural Rock Caves</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                6 Photos Inside
                            </div>
                        </div>
                    </div>

                    <div class="cave-card" data-alphabet="T" onclick="openCaveGallery('Tulja_Caves')">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Tulja Caves" class="cave-image">
                        <div class="cave-overlay">
                            <h3 class="font-bold text-lg mb-1">Tulja Caves</h3>
                            <p class="heritage-name mb-2">Ancient Cave Complex</p>
                            <div class="photo-badge">
                                <i class="fas fa-camera mr-2"></i>
                                5 Photos Inside
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination - EXACT SAME AS BUTTERFLY GALLERY -->
                <div class="pagination">
                    <span class="current">1</span>
                    <a href="#" onclick="changePage(2)">2</a>
                    <a href="#" onclick="changePage(2)">Next &gt;&gt;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cave Types - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-star mr-3 text-yellow-600"></i>
                    Featured Cave Categories
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Explore different types of ancient caves found in Maharashtra
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-yellow-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-pray text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Buddhist Caves</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Ancient monastic complexes and chaitya halls</p>
                    <a href="#" class="text-yellow-600 hover:text-yellow-800 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-orange-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-om text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Hindu Caves</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Temple caves dedicated to Hindu deities</p>
                    <a href="#" class="text-yellow-600 hover:text-yellow-800 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-brown-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Natural Caves</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Rock formations and natural cave systems</p>
                    <a href="#" class="text-yellow-600 hover:text-yellow-800 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Cave Detail Modal - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
<div id="cave-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
    <div class="bg-gray-900 rounded-xl max-w-6xl max-h-[90vh] overflow-y-auto w-full relative">
        <div class="cave-modal-header">
            <button onclick="closeCaveModal()" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="modal-header"></div>
        </div>
        <div class="modal-body p-6"></div>
    </div>
</div>

<!-- Lightbox Modal - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-60 hidden items-center justify-center p-4">
    <div class="lightbox-content max-w-5xl w-full">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <div class="lightbox-body text-center"></div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript - EXACT SAME STRUCTURE AND FUNCTIONALITY AS BUTTERFLY GALLERY -->
<script>
$(document).ready(function() {
    console.log('Cave Photo Gallery loaded');
});

// Filter by alphabet - EXACT SAME AS BUTTERFLY GALLERY
function filterByAlphabet(letter) {
    $('.alphabet-filter a').removeClass('active');
    $('a[onclick="filterByAlphabet(\'' + letter + '\')"]').addClass('active');
    
    if (letter === 'ALL') {
        $('.cave-card').show();
    } else {
        $('.cave-card').hide();
        $('.cave-card[data-alphabet="' + letter + '"]').show();
    }
    
    // Animate the filtered items
    $('.cave-card:visible').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({opacity: 1}, 300);
    });
}

// Open cave gallery in modal - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY
function openCaveGallery(slug) {
    const caveName = slug.replace(/_/g, ' ');
    
    // Get cave photos (in real app, this would be an AJAX call)
    const cavePhotos = getCavePhotos(slug);
    
    // Create modal content - EXACT SAME STRUCTURE AS BUTTERFLY GALLERY
    let modalContent = `
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold mb-2">
                <i class="fas fa-mountain mr-2"></i>
                ${caveName}
            </h2>
            <p class="text-yellow-300 italic text-lg mb-2">Heritage Classification</p>
            <p class="text-gray-300">${cavePhotos.length} Photographs Available</p>
        </div>
        <div class="cave-photo-grid">
    `;
    
    cavePhotos.forEach((photo, index) => {
        modalContent += `
            <div class="cave-photo-item" onclick="openLightbox(${index}, '${slug}')">
                <img src="${photo.thumb}" alt="${photo.title}" class="w-full h-48 object-cover rounded-lg">
                <div class="photo-info mt-2">
                    <p class="text-white text-sm">${photo.title}</p>
                    <p class="text-gray-300 text-xs">${photo.location}</p>
                </div>
            </div>
        `;
    });
    
    modalContent += '</div>';
    
    // Show modal
    $('#cave-modal .modal-body').html(modalContent);
    $('#cave-modal').removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}

// Get cave photos (mock data - in real app, fetch from API) - EXACT SAME AS BUTTERFLY GALLERY
function getCavePhotos(slug) {
    const mockPhotos = [];
    const photoCount = Math.floor(Math.random() * 12) + 5; // 5-17 photos
    const locations = ['Main Hall', 'Chaitya Hall', 'Monastery', 'Sculpture Gallery', 'Prayer Hall', 'Entrance', 'Courtyard', 'Stone Carvings'];
    
    for (let i = 1; i <= photoCount; i++) {
        mockPhotos.push({
            thumb: `https://images.unsplash.com/photo-${1544735716392 + i}?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80`,
            full: `https://images.unsplash.com/photo-${1544735716392 + i}?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80`,
            title: `${slug.replace(/_/g, ' ')} - Photo ${i}`,
            location: locations[Math.floor(Math.random() * locations.length)]
        });
    }
    
    return mockPhotos;
}

// Close cave modal - EXACT SAME AS BUTTERFLY GALLERY
function closeCaveModal() {
    $('#cave-modal').addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}

// Open lightbox for individual photo - EXACT SAME AS BUTTERFLY GALLERY
function openLightbox(index, slug) {
    const cavePhotos = getCavePhotos(slug);
    
    let lightboxContent = `
        <div class="lightbox-header mb-4">
            <h3 class="text-white text-xl mb-1">${cavePhotos[index].title}</h3>
            <p class="text-yellow-300 text-sm mb-1">📍 ${cavePhotos[index].location}</p>
            <p class="text-gray-300 text-sm">Photo ${index + 1} of ${cavePhotos.length}</p>
        </div>
        <div class="lightbox-image-container relative">
            <img src="${cavePhotos[index].full}" alt="${cavePhotos[index].title}" class="max-w-full max-h-[70vh] object-contain rounded-lg">
            ${index > 0 ? '<button class="lightbox-prev" onclick="navigateLightbox(' + (index - 1) + ', \'' + slug + '\')"><i class="fas fa-chevron-left"></i></button>' : ''}
            ${index < cavePhotos.length - 1 ? '<button class="lightbox-next" onclick="navigateLightbox(' + (index + 1) + ', \'' + slug + '\')"><i class="fas fa-chevron-right"></i></button>' : ''}
        </div>
        <div class="lightbox-thumbnails mt-4 flex gap-2 overflow-x-auto">
    `;
    
    cavePhotos.forEach((photo, i) => {
        lightboxContent += `
            <img src="${photo.thumb}" 
                 alt="${photo.title}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-yellow-500' : 'opacity-60'}"
                 onclick="navigateLightbox(${i}, '${slug}')">
        `;
    });
    
    lightboxContent += '</div>';
    
    $('#lightbox .lightbox-body').html(lightboxContent);
    $('#lightbox').removeClass('hidden').addClass('flex');
}

// Navigate lightbox - EXACT SAME AS BUTTERFLY GALLERY
function navigateLightbox(index, slug) {
    openLightbox(index, slug);
}

// Close lightbox - EXACT SAME AS BUTTERFLY GALLERY
function closeLightbox() {
    $('#lightbox').addClass('hidden').removeClass('flex');
}

// Change page - EXACT SAME AS BUTTERFLY GALLERY
function changePage(page) {
    console.log('Changing to page:', page);
    // In real implementation, load new page content via AJAX
    $('.pagination .current').removeClass('current').wrap('<a href="#" onclick="changePage(' + $('.pagination .current').text() + ')"></a>');
    $('.pagination a').each(function() {
        if ($(this).text() == page) {
            $(this).addClass('current').contents().unwrap();
        }
    });
}

// Search functionality for caves - EXACT SAME AS BUTTERFLY GALLERY
function searchCaves() {
    const searchTerm = $('#cave-search').val().toLowerCase();
    $('.cave-card').each(function() {
        const caveName = $(this).find('h3').text().toLowerCase();
        const heritageName = $(this).find('.heritage-name').text().toLowerCase();
        if (caveName.includes(searchTerm) || heritageName.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// Keyboard navigation for lightbox - EXACT SAME AS BUTTERFLY GALLERY
$(document).keydown(function(e) {
    if ($('#lightbox').hasClass('flex')) {
        if (e.keyCode == 37) { // Left arrow
            $('.lightbox-prev').click();
        } else if (e.keyCode == 39) { // Right arrow
            $('.lightbox-next').click();
        } else if (e.keyCode == 27) { // Escape
            closeLightbox();
        }
    }
    
    if ($('#cave-modal').hasClass('flex') && e.keyCode == 27) {
        closeCaveModal();
    }
});

// Lazy loading for cave images - EXACT SAME AS BUTTERFLY GALLERY
$(window).scroll(function() {
    $('.cave-image').each(function() {
        if ($(this).offset().top < $(window).scrollTop() + $(window).height() + 100) {
            const src = $(this).attr('src');
            if (src.includes('placeholder')) {
                // Replace with actual cave image
                $(this).attr('src', src.replace('placeholder', 'cave'));
            }
        }
    });
});

console.log('Cave Photo Gallery: All functionality loaded successfully');
console.log('Structure matches butterfly-gallery.php exactly');
console.log('Alphabets: ALL, A-Z are now visible and functional');
</script>