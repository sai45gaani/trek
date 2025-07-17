<?php
// Set page specific variables
$page_title = 'Photo Gallery of Forts in Sahyadri | Trekshitz';
$meta_description = 'Photographs of trekking, camping, outings etc. in wild forests, hills, forts, palaces, valleys, ravines etc. in Maharashtra.';
$meta_keywords = 'Photos, pictures, Images, Sahyadri, Western ghats, trekking, hiking, wildlife, mumbai trek, pune trek, tourists, trek, adventure sports, forts, palaces';

// Include header
include './includes/header.php';
?>

<style>
/* Photo Gallery specific styles */
.gallery-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #000;
    position: relative;
}

.gallery-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.gallery-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.gallery-card:hover .gallery-image {
    transform: scale(1.1);
    filter: brightness(1.1);
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 1.5rem 1rem 1rem;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    transform: translateY(0);
}

.alphabet-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin: 2rem 0;
}

.alphabet-filter a {
    padding: 0.5rem 1rem;
    background: var(--accent-color);
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: bold;
}

.alphabet-filter a:hover,
.alphabet-filter a.active {
    background: var(--primary-color);
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
    background: var(--accent-color);
    color: white;
}

.pagination a:hover {
    background: var(--primary-color);
}

.pagination .current {
    background: var(--primary-color);
    color: white;
    font-weight: bold;
}

.gallery-stats {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.photo-count {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

@media (max-width: 768px) {
    .gallery-image {
        height: 150px;
    }
    
    .alphabet-filter {
        gap: 0.25rem;
    }
    
    .alphabet-filter a {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }
}
</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary via-secondary to-accent text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"camera\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><rect x=\"6\" y=\"8\" width=\"8\" height=\"6\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"10\" cy=\"11\" r=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23camera)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 font-bilingual">
                    📸 फोटो गॅलरी
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Photo Gallery of Forts In Sahyadri
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Photographs of trekking, camping, and adventures in Maharashtra's magnificent forts
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-images mr-2"></i>
                        Browse Gallery
                    </a>
                    <a href="#alphabetical" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                        <i class="fas fa-sort-alpha-down mr-2"></i>
                        Alphabetical View
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Stats -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="gallery-stats max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">150+</div>
                        <p class="opacity-90">Forts Covered</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">2000+</div>
                        <p class="opacity-90">Photographs</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">50+</div>
                        <p class="opacity-90">Trek Routes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alphabetical Filter -->
    <section id="alphabetical" class="py-8 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    Browse by Alphabet
                </h3>
                <p class="text-gray-600 dark:text-gray-300">* Click on the photo to see more photos of the fort</p>
            </div>
            
            <div class="alphabet-filter">
                <a href="#" onclick="filterByAlphabet('ALL')" class="active">ALL</a>
                <?php
                $alphabets = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                foreach ($alphabets as $letter) {
                    echo '<a href="#" onclick="filterByAlphabet(\'' . $letter . '\')">' . $letter . '</a>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Photo Gallery -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div id="gallery-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                    // Fort gallery data (in real app, this would come from database)
                    $fortGallery = [
                        [
                            'name' => 'Barvai',
                            'image' => 'Picture/Barvai1.jpg',
                            'photos_count' => 8,
                            'slug' => 'Barvai-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Belapur Fort',
                            'image' => 'Picture/Belapur_Fort1.jpg',
                            'photos_count' => 7,
                            'slug' => 'Belapur_Fort-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Belgaum Fort',
                            'image' => 'Picture/Belgaum_Fort1.jpg',
                            'photos_count' => 15,
                            'slug' => 'Belgaum_Fort-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhagwantgad',
                            'image' => 'Picture/Bhavantgad-5.jpg',
                            'photos_count' => 11,
                            'slug' => 'Bhagwantgad-photos-147-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhairavgad (Satara)',
                            'image' => 'Picture/Bhairavgad2.jpg',
                            'photos_count' => 7,
                            'slug' => 'Bhairavgad_(Satara)-photos-100-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhairavgad(kothale)',
                            'image' => 'Picture/Bhairavgad(kothale)1.jpg',
                            'photos_count' => 10,
                            'slug' => 'Bhairavgad(kothale)-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhairavgad(Moroshi)',
                            'image' => 'Picture/Bhairavgad_Moroshi1.jpg',
                            'photos_count' => 19,
                            'slug' => 'Bhairavgad(Moroshi)-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhairavgad(Shirpunje)',
                            'image' => 'Picture/Bhairavgad(Shirpunje)1.jpg',
                            'photos_count' => 22,
                            'slug' => 'Bhairavgad(Shirpunje)-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhamer',
                            'image' => 'Picture/Bhamer1.jpg',
                            'photos_count' => 33,
                            'slug' => 'Bhamer-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhangsigad(Bhangsi mata gad)',
                            'image' => 'Picture/Bhanshigad_Bhansaigad_Fort1.jpg',
                            'photos_count' => 26,
                            'slug' => 'Bhangsigad(Bhangsi_mata_gad)-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bharatgad',
                            'image' => 'Picture/Bharatgad-14.jpg',
                            'photos_count' => 33,
                            'slug' => 'Bharatgad-photos-146-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Bhaskargad',
                            'image' => 'Picture/Bhaskargad_Busgad1.jpg',
                            'photos_count' => 15,
                            'slug' => 'Bhaskargad-photos-0-2',
                            'alphabet' => 'B'
                        ],
                        [
                            'name' => 'Chakan Fort',
                            'image' => 'Picture/Chakan Fort1.jpg',
                            'photos_count' => 17,
                            'slug' => 'Chakan_Fort-photos-0-2',
                            'alphabet' => 'C'
                        ],
                        [
                            'name' => 'Chambhargad',
                            'image' => 'Picture/Chambhargad1.jpg',
                            'photos_count' => 8,
                            'slug' => 'Chambhargad-photos-89-2',
                            'alphabet' => 'C'
                        ],
                        [
                            'name' => 'Chandan-Vandan',
                            'image' => 'Picture/ChandanVandan1.jpg',
                            'photos_count' => 7,
                            'slug' => 'Chandan-Vandan-photos-7-2',
                            'alphabet' => 'C'
                        ],
                        [
                            'name' => 'Chanderi',
                            'image' => 'Picture/Chanderi-5.jpg',
                            'photos_count' => 6,
                            'slug' => 'Chanderi-photos-8-2',
                            'alphabet' => 'C'
                        ]
                    ];
                    
                    // Display fort gallery items
                    foreach ($fortGallery as $fort) {
                        echo '<div class="gallery-card" data-alphabet="' . $fort['alphabet'] . '" onclick="openFortGallery(\'' . $fort['slug'] . '\')">';
                        echo '<img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="' . htmlspecialchars($fort['name']) . '" class="gallery-image">';
                        echo '<div class="gallery-overlay">';
                        echo '<h3 class="font-bold text-lg mb-2">' . htmlspecialchars($fort['name']) . '</h3>';
                        echo '<div class="photo-count">';
                        echo '<i class="fas fa-images mr-2"></i>';
                        echo $fort['photos_count'] . ' Photos Inside';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    <a href="#" onclick="changePage(1)">&lt;&lt; Prev</a>
                    <span class="current">2</span>
                    <a href="#" onclick="changePage(3)">3</a>
                    <a href="#" onclick="changePage(4)">4</a>
                    <a href="#" onclick="changePage(5)">5</a>
                    <a href="#" onclick="changePage(6)">6</a>
                    <a href="#" onclick="changePage(7)">7</a>
                    <a href="#" onclick="changePage(8)">8</a>
                    <a href="#" onclick="changePage(9)">9</a>
                    <a href="#" onclick="changePage(10)">10</a>
                    <a href="#" onclick="changePage(3)">Next &gt;&gt;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Galleries -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-star mr-3 text-accent"></i>
                    Featured Galleries
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Explore our most popular fort photo collections
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-primary rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Hill Forts</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Spectacular views from Sahyadri peaks</p>
                    <a href="#" class="text-primary hover:text-secondary font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-secondary rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-water text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Sea Forts</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Coastal fortifications and marine views</p>
                    <a href="#" class="text-primary hover:text-secondary font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-accent rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-crown text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Shivaji's Forts</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Historic Maratha Empire fortresses</p>
                    <a href="#" class="text-primary hover:text-secondary font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    <!-- Fort Detail Modal -->
    <div id="fort-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
        <div class="bg-gray-900 rounded-xl max-w-6xl max-h-[90vh] overflow-y-auto w-full relative">
            <div class="sticky top-0 bg-gray-900 p-6 border-b border-gray-700">
                <button onclick="closeFortModal()" class="absolute top-4 right-4 text-white hover:text-gray-300">
                    <i class="fas fa-times text-2xl"></i>
                </button>
                <div class="modal-header"></div>
            </div>
            <div class="modal-body p-6"></div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-60 hidden items-center justify-center p-4">
        <div class="lightbox-content max-w-5xl w-full">
            <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="lightbox-body text-center"></div>
        </div>
    </div>

    <style>
    .fort-photo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .fort-photo-item {
        cursor: pointer;
        transition: transform 0.3s ease;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .fort-photo-item:hover {
        transform: scale(1.05);
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
    }

    .lightbox-thumbnails::-webkit-scrollbar {
        height: 4px;
    }

    .lightbox-thumbnails::-webkit-scrollbar-thumb {
        background: var(--accent-color);
        border-radius: 2px;
    }

    @media (max-width: 768px) {
        .fort-photo-grid {
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

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    console.log('Fort Photo Gallery loaded');
});

// Filter by alphabet
function filterByAlphabet(letter) {
    $('.alphabet-filter a').removeClass('active');
    $('a[onclick="filterByAlphabet(\'' + letter + '\')"]').addClass('active');
    
    if (letter === 'ALL') {
        $('.gallery-card').show();
    } else {
        $('.gallery-card').hide();
        $('.gallery-card[data-alphabet="' + letter + '"]').show();
    }
    
    // Animate the filtered items
    $('.gallery-card:visible').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({opacity: 1}, 300);
    });
}

// Open fort gallery in modal
function openFortGallery(slug) {
    const fortName = slug.split('-photos')[0].replace(/_/g, ' ').replace(/\(/g, '(').replace(/\)/g, ')');
    
    // Get fort photos (in real app, this would be an AJAX call)
    const fortPhotos = getFortPhotos(slug);
    
    // Create modal content
    let modalContent = `
        <div class="fort-modal-header">
            <h2 class="text-2xl font-bold text-white mb-4">
                <i class="fas fa-fort-awesome mr-2"></i>
                ${fortName} Photo Gallery
            </h2>
            <p class="text-gray-300 mb-6">${fortPhotos.length} Photos</p>
        </div>
        <div class="fort-photo-grid">
    `;
    
    fortPhotos.forEach((photo, index) => {
        modalContent += `
            <div class="fort-photo-item" onclick="openLightbox(${index}, '${slug}')">
                <img src="${photo.thumb}" alt="${photo.title}" class="w-full h-48 object-cover rounded-lg">
                <div class="photo-info mt-2">
                    <p class="text-white text-sm">${photo.title}</p>
                </div>
            </div>
        `;
    });
    
    modalContent += '</div>';
    
    // Show modal
    $('#fort-modal .modal-body').html(modalContent);
    $('#fort-modal').removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}

// Get fort photos (mock data - in real app, fetch from API)
function getFortPhotos(slug) {
    const mockPhotos = [];
    const photoCount = Math.floor(Math.random() * 20) + 5; // 5-25 photos
    
    for (let i = 1; i <= photoCount; i++) {
        mockPhotos.push({
            thumb: `https://images.unsplash.com/photo-${1590736969955 + i}?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80`,
            full: `https://images.unsplash.com/photo-${1590736969955 + i}?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80`,
            title: `${slug.split('-')[0]} - View ${i}`
        });
    }
    
    return mockPhotos;
}

// Close modal
function closeFortModal() {
    $('#fort-modal').addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}

// Open lightbox for individual photo
function openLightbox(index, slug) {
    const fortPhotos = getFortPhotos(slug);
    
    let lightboxContent = `
        <div class="lightbox-header mb-4">
            <h3 class="text-white text-lg">${fortPhotos[index].title}</h3>
            <p class="text-gray-300 text-sm">Photo ${index + 1} of ${fortPhotos.length}</p>
        </div>
        <div class="lightbox-image-container relative">
            <img src="${fortPhotos[index].full}" alt="${fortPhotos[index].title}" class="max-w-full max-h-[70vh] object-contain">
            ${index > 0 ? '<button class="lightbox-prev" onclick="navigateLightbox(' + (index - 1) + ', \'' + slug + '\')"><i class="fas fa-chevron-left"></i></button>' : ''}
            ${index < fortPhotos.length - 1 ? '<button class="lightbox-next" onclick="navigateLightbox(' + (index + 1) + ', \'' + slug + '\')"><i class="fas fa-chevron-right"></i></button>' : ''}
        </div>
        <div class="lightbox-thumbnails mt-4 flex gap-2 overflow-x-auto">
    `;
    
    fortPhotos.forEach((photo, i) => {
        lightboxContent += `
            <img src="${photo.thumb}" 
                 alt="${photo.title}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-accent' : 'opacity-60'}"
                 onclick="navigateLightbox(${i}, '${slug}')">
        `;
    });
    
    lightboxContent += '</div>';
    
    $('#lightbox .lightbox-body').html(lightboxContent);
    $('#lightbox').removeClass('hidden').addClass('flex');
}

// Navigate lightbox
function navigateLightbox(index, slug) {
    openLightbox(index, slug);
}

// Close lightbox
function closeLightbox() {
    $('#lightbox').addClass('hidden').removeClass('flex');
}

// Change page
function changePage(page) {
    console.log('Changing to page:', page);
    // In real implementation, load new page content via AJAX
    // For now, just update pagination display
    $('.pagination .current').removeClass('current').wrap('<a href="#" onclick="changePage(' + $('.pagination .current').text() + ')"></a>');
    $('.pagination a').each(function() {
        if ($(this).text() == page) {
            $(this).addClass('current').contents().unwrap();
        }
    });
}

// Search functionality
function searchGallery() {
    const searchTerm = $('#gallery-search').val().toLowerCase();
    $('.gallery-card').each(function() {
        const fortName = $(this).find('h3').text().toLowerCase();
        if (fortName.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// Lazy loading for images
$(window).scroll(function() {
    $('.gallery-image').each(function() {
        if ($(this).offset().top < $(window).scrollTop() + $(window).height() + 100) {
            // Load high-quality image when in view
            const src = $(this).attr('src');
            if (src.includes('placeholder')) {
                // Replace with actual image source
                $(this).attr('src', src.replace('placeholder', 'actual'));
            }
        }
    });
});
</script>