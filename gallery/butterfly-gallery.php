<?php
// Set page specific variables
$page_title = 'Photo Gallery of Butterflies | Trekshitz';
$meta_description = 'Beautiful butterfly photographs captured during trekking adventures in Sahyadri, Western Ghats, Maharashtra. Explore diverse butterfly species found in forests and hills.';
$meta_keywords = 'butterfly photos, Sahyadri butterflies, Western ghats, trekking, wildlife, Maharashtra butterflies, nature photography';

// Include header
include '../includes/header.php';
?>

<style>
/* Butterfly Gallery specific styles */
.butterfly-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: #000;
    position: relative;
}

.butterfly-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.butterfly-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
}

.butterfly-card:hover .butterfly-image {
    transform: scale(1.1);
    filter: brightness(1.1);
}

.butterfly-overlay {
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

.butterfly-card:hover .butterfly-overlay {
    transform: translateY(0);
}

.butterfly-stats {
    background: linear-gradient(135deg, #ff6b6b, #ffa500);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.species-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.butterfly-modal-header {
    background: linear-gradient(135deg, #ff6b6b, #ffa500);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

.butterfly-photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.butterfly-photo-item {
    cursor: pointer;
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
}

.butterfly-photo-item:hover {
    transform: scale(1.05);
}

.scientific-name {
    font-style: italic;
    color: #ffa500;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .butterfly-image {
        height: 150px;
    }
    
    .butterfly-photo-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"butterfly\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><path d=\"M10,8 C8,6 6,8 8,12 C6,14 8,16 10,14 C12,16 14,14 12,12 C14,8 12,6 10,8 Z\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23butterfly)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 font-bilingual">
                    🦋 फुलपाखरांची गॅलरी
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Photo Gallery of Butterflies
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Beautiful butterfly species captured during trekking adventures in Sahyadri mountains
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-orange-500 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-camera mr-2"></i>
                        Browse Gallery
                    </a>
                    <a href="#alphabetical" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-orange-500 transition-colors">
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
            <div class="butterfly-stats max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">50+</div>
                        <p class="opacity-90">Butterfly Species</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">150+</div>
                        <p class="opacity-90">Photographs</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">25+</div>
                        <p class="opacity-90">Locations Covered</p>
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
                    Browse Butterflies by Name
                </h3>
                <p class="text-gray-600 dark:text-gray-300">* Click on the photo to see more photos of the butterfly species</p>
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

    <!-- Butterfly Gallery -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div id="gallery-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                    // Butterfly gallery data (from the provided HTML)
                    $butterflyGallery = [
                        [
                            'name' => 'Angled Pierrot',
                            'scientific_name' => 'Caleta decidia',
                            'image' => 'Category/Butterfly/Angled Pierrot-3.jpg',
                            'photos_count' => 3,
                            'slug' => 'Angled_Pierrot',
                            'alphabet' => 'A',
                            'category_id' => 2
                        ],
                        [
                            'name' => 'Baronet',
                            'scientific_name' => 'Euthalia nais',
                            'image' => 'Category/Butterfly/Baronet-1.jpg',
                            'photos_count' => 8,
                            'slug' => 'Baronet',
                            'alphabet' => 'B',
                            'category_id' => 3
                        ],
                        [
                            'name' => 'Blue Mormon',
                            'scientific_name' => 'Papilio polymnestor',
                            'image' => 'Category/Butterfly/BlueMormon-1.jpg',
                            'photos_count' => 2,
                            'slug' => 'Blue_Mormon',
                            'alphabet' => 'B',
                            'category_id' => 4
                        ],
                        [
                            'name' => 'Blue OakLeaf',
                            'scientific_name' => 'Kallima horsfieldii',
                            'image' => 'Category/Butterfly/BlueOakLeaf-2.jpg',
                            'photos_count' => 2,
                            'slug' => 'Blue_OakLeaf',
                            'alphabet' => 'B',
                            'category_id' => 5
                        ],
                        [
                            'name' => 'Blue Pansy',
                            'scientific_name' => 'Junonia orithya',
                            'image' => 'Category/Butterfly/BluePansy-1.jpg',
                            'photos_count' => 2,
                            'slug' => 'Blue_Pansy',
                            'alphabet' => 'B',
                            'category_id' => 6
                        ],
                        [
                            'name' => 'Blue Tiger',
                            'scientific_name' => 'Tirumala limniace',
                            'image' => 'Category/Butterfly/BlueTiger-1.jpg',
                            'photos_count' => 5,
                            'slug' => 'Blue_Tiger',
                            'alphabet' => 'B',
                            'category_id' => 7
                        ],
                        [
                            'name' => 'Chocolate Pansy',
                            'scientific_name' => 'Junonia iphita',
                            'image' => 'Category/Butterfly/ChocolatePansy-1.jpg',
                            'photos_count' => 4,
                            'slug' => 'Chocolate_Pansy',
                            'alphabet' => 'C',
                            'category_id' => 9
                        ],
                        [
                            'name' => 'Common Bushbrown',
                            'scientific_name' => 'Mycalesis perseus',
                            'image' => 'Category/Butterfly/CommonBushbrown-3.jpg',
                            'photos_count' => 4,
                            'slug' => 'Common_Bushbrown',
                            'alphabet' => 'C',
                            'category_id' => 13
                        ],
                        [
                            'name' => 'Common Crow',
                            'scientific_name' => 'Euploea core',
                            'image' => 'Category/Butterfly/CommonCrow-2.jpg',
                            'photos_count' => 4,
                            'slug' => 'Common_Crow',
                            'alphabet' => 'C',
                            'category_id' => 14
                        ],
                        [
                            'name' => 'Common Four Ring',
                            'scientific_name' => 'Ypthima huebneri',
                            'image' => 'Category/Butterfly/CommonFourRing-1.jpg',
                            'photos_count' => 1,
                            'slug' => 'Common_Four_Ring',
                            'alphabet' => 'C',
                            'category_id' => 15
                        ],
                        [
                            'name' => 'Common Grass Yellow',
                            'scientific_name' => 'Eurema hecabe',
                            'image' => 'Category/Butterfly/CommonGrassYellow-1.jpg',
                            'photos_count' => 4,
                            'slug' => 'Common_Grass_Yellow',
                            'alphabet' => 'C',
                            'category_id' => 16
                        ],
                        [
                            'name' => 'Common Gull',
                            'scientific_name' => 'Cepora nerissa',
                            'image' => 'Category/Butterfly/Common Gull-1.jpg',
                            'photos_count' => 4,
                            'slug' => 'Common_Gull',
                            'alphabet' => 'C',
                            'category_id' => 10
                        ],
                        [
                            'name' => 'Common Jay',
                            'scientific_name' => 'Graphium doson',
                            'image' => 'Category/Butterfly/CommonJay-1.jpg',
                            'photos_count' => 1,
                            'slug' => 'Common_Jay',
                            'alphabet' => 'C',
                            'category_id' => 17
                        ],
                        [
                            'name' => 'Common Jezebel',
                            'scientific_name' => 'Delias eucharis',
                            'image' => 'Category/Butterfly/CommonJezebel-1.jpg',
                            'photos_count' => 1,
                            'slug' => 'Common_Jezebel',
                            'alphabet' => 'C',
                            'category_id' => 18
                        ],
                        [
                            'name' => 'Common Leopard',
                            'scientific_name' => 'Phalanta phalantha',
                            'image' => 'Category/Butterfly/Common Leopard-1.jpg',
                            'photos_count' => 2,
                            'slug' => 'Common_Leopard',
                            'alphabet' => 'C',
                            'category_id' => 11
                        ],
                        [
                            'name' => 'Common Pierrot',
                            'scientific_name' => 'Castalius rosimon',
                            'image' => 'Category/Butterfly/Common Pierrot-1.jpg',
                            'photos_count' => 2,
                            'slug' => 'Common_Pierrot',
                            'alphabet' => 'C',
                            'category_id' => 12
                        ],
                        [
                            'name' => 'Common Sailor',
                            'scientific_name' => 'Neptis hylas',
                            'image' => 'Category/Butterfly/CommonSailor-1.jpg',
                            'photos_count' => 4,
                            'slug' => 'Common_Sailor',
                            'alphabet' => 'C',
                            'category_id' => 8
                        ],
                        [
                            'name' => 'Common TreeBrown',
                            'scientific_name' => 'Lethe rohria',
                            'image' => 'Category/Butterfly/CommonTreeBrown-1.jpg',
                            'photos_count' => 1,
                            'slug' => 'Common_TreeBrown',
                            'alphabet' => 'C',
                            'category_id' => 19
                        ],
                        [
                            'name' => 'Common Wanderer',
                            'scientific_name' => 'Pareronia valeria',
                            'image' => 'Category/Butterfly/CommonWanderer-1.jpg',
                            'photos_count' => 3,
                            'slug' => 'Common_Wanderer',
                            'alphabet' => 'C',
                            'category_id' => 20
                        ],
                        [
                            'name' => 'Daniad Eggfly Female',
                            'scientific_name' => 'Hypolimnas misippus',
                            'image' => 'Category/Butterfly/DaniadEggflyFemale-2.jpg',
                            'photos_count' => 2,
                            'slug' => 'Daniad_Eggfly_Female',
                            'alphabet' => 'D',
                            'category_id' => 21
                        ],
                        [
                            'name' => 'Daniad Eggfly Male',
                            'scientific_name' => 'Hypolimnas misippus',
                            'image' => 'Category/Butterfly/DaniadEggflyMale-2.jpg',
                            'photos_count' => 2,
                            'slug' => 'Daniad_Eggfly_Male',
                            'alphabet' => 'D',
                            'category_id' => 22
                        ],
                        [
                            'name' => 'Glassy Tiger',
                            'scientific_name' => 'Parantica aglea',
                            'image' => 'Category/Butterfly/GlassyTiger-1.jpg',
                            'photos_count' => 3,
                            'slug' => 'Glassy_Tiger',
                            'alphabet' => 'G',
                            'category_id' => 23
                        ],
                        [
                            'name' => 'Golden Angle',
                            'scientific_name' => 'Caprona ransonnettii',
                            'image' => 'Category/Butterfly/GoldenAngle-1.jpg',
                            'photos_count' => 3,
                            'slug' => 'Golden_Angle',
                            'alphabet' => 'G',
                            'category_id' => 24
                        ],
                        [
                            'name' => 'Grass Demon',
                            'scientific_name' => 'Udaspes folus',
                            'image' => 'Category/Butterfly/Grass Demon-1.jpg',
                            'photos_count' => 2,
                            'slug' => 'Grass_Demon',
                            'alphabet' => 'G',
                            'category_id' => 25
                        ]
                    ];
                    
                    // Display butterfly gallery items
                    foreach ($butterflyGallery as $butterfly) {
                        echo '<div class="butterfly-card" data-alphabet="' . $butterfly['alphabet'] . '" onclick="openButterflyGallery(\'' . $butterfly['slug'] . '\')">';
                        echo '<img src="https://images.unsplash.com/photo-1518854050639-7d4c9ad5f9e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="' . htmlspecialchars($butterfly['name']) . '" class="butterfly-image">';
                        echo '<div class="butterfly-overlay">';
                        echo '<h3 class="font-bold text-lg mb-1">' . htmlspecialchars($butterfly['name']) . '</h3>';
                        echo '<p class="scientific-name mb-2">' . htmlspecialchars($butterfly['scientific_name']) . '</p>';
                        echo '<div class="species-badge">';
                        echo '<i class="fas fa-camera mr-2"></i>';
                        echo $butterfly['photos_count'] . ' Photo' . ($butterfly['photos_count'] > 1 ? 's' : '') . ' Inside';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    <span class="current">1</span>
                    <a href="#" onclick="changePage(2)">2</a>
                    <a href="#" onclick="changePage(2)">Next &gt;&gt;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Butterfly Types -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-star mr-3 text-orange-500"></i>
                    Featured Butterfly Families
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Explore different butterfly families found in Maharashtra
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-orange-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-crown text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Swallowtails</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Large, colorful butterflies with distinctive tail-like extensions</p>
                    <a href="#" class="text-orange-500 hover:text-red-500 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-red-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-palette text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Nymphalids</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Brush-footed butterflies with vibrant patterns and colors</p>
                    <a href="#" class="text-orange-500 hover:text-red-500 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <div class="w-16 h-16 bg-pink-500 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-gem text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Blues & Coppers</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Small, delicate butterflies with metallic sheens</p>
                    <a href="#" class="text-orange-500 hover:text-red-500 font-semibold">
                        View Gallery <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Butterfly Detail Modal -->
    <div id="butterfly-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center p-4">
        <div class="bg-gray-900 rounded-xl max-w-6xl max-h-[90vh] overflow-y-auto w-full relative">
            <div class="butterfly-modal-header">
                <button onclick="closeButterflyModal()" class="absolute top-4 right-4 text-white hover:text-gray-300">
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
    .alphabet-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
        margin: 2rem 0;
    }

    .alphabet-filter a {
        padding: 0.5rem 1rem;
        background: #ff6b6b;
        color: white;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .alphabet-filter a:hover,
    .alphabet-filter a.active {
        background: #ffa500;
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
        background: #ff6b6b;
        color: white;
    }

    .pagination a:hover {
        background: #ffa500;
    }

    .pagination .current {
        background: #ffa500;
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
        background: #ff6b6b;
        border-radius: 2px;
    }

    @media (max-width: 768px) {
        .butterfly-photo-grid {
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
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    console.log('Butterfly Photo Gallery loaded');
});

// Filter by alphabet
function filterByAlphabet(letter) {
    $('.alphabet-filter a').removeClass('active');
    $('a[onclick="filterByAlphabet(\'' + letter + '\')"]').addClass('active');
    
    if (letter === 'ALL') {
        $('.butterfly-card').show();
    } else {
        $('.butterfly-card').hide();
        $('.butterfly-card[data-alphabet="' + letter + '"]').show();
    }
    
    // Animate the filtered items
    $('.butterfly-card:visible').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({opacity: 1}, 300);
    });
}

// Open butterfly gallery in modal
function openButterflyGallery(slug) {
    const butterflyName = slug.replace(/_/g, ' ');
    
    // Get butterfly photos (in real app, this would be an AJAX call)
    const butterflyPhotos = getButterflyPhotos(slug);
    
    // Create modal content
    let modalContent = `
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold mb-2">
                <i class="fas fa-butterfly mr-2"></i>
                ${butterflyName}
            </h2>
            <p class="text-orange-300 italic text-lg mb-2">Scientific Classification</p>
            <p class="text-gray-300">${butterflyPhotos.length} Photographs Available</p>
        </div>
        <div class="butterfly-photo-grid">
    `;
    
    butterflyPhotos.forEach((photo, index) => {
        modalContent += `
            <div class="butterfly-photo-item" onclick="openLightbox(${index}, '${slug}')">
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
    $('#butterfly-modal .modal-body').html(modalContent);
    $('#butterfly-modal').removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}

// Get butterfly photos (mock data - in real app, fetch from API)
function getButterflyPhotos(slug) {
    const mockPhotos = [];
    const photoCount = Math.floor(Math.random() * 8) + 2; // 2-10 photos
    const locations = ['Lonavala', 'Matheran', 'Mahabaleshwar', 'Bhimashankar', 'Rajgad', 'Sinhagad'];
    
    for (let i = 1; i <= photoCount; i++) {
        mockPhotos.push({
            thumb: `https://images.unsplash.com/photo-${1518854050639 + i}?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80`,
            full: `https://images.unsplash.com/photo-${1518854050639 + i}?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80`,
            title: `${slug.replace(/_/g, ' ')} - Photo ${i}`,
            location: locations[Math.floor(Math.random() * locations.length)]
        });
    }
    
    return mockPhotos;
}

// Close butterfly modal
function closeButterflyModal() {
    $('#butterfly-modal').addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}

// Open lightbox for individual photo
function openLightbox(index, slug) {
    const butterflyPhotos = getButterflyPhotos(slug);
    
    let lightboxContent = `
        <div class="lightbox-header mb-4">
            <h3 class="text-white text-xl mb-1">${butterflyPhotos[index].title}</h3>
            <p class="text-orange-300 text-sm mb-1">📍 ${butterflyPhotos[index].location}</p>
            <p class="text-gray-300 text-sm">Photo ${index + 1} of ${butterflyPhotos.length}</p>
        </div>
        <div class="lightbox-image-container relative">
            <img src="${butterflyPhotos[index].full}" alt="${butterflyPhotos[index].title}" class="max-w-full max-h-[70vh] object-contain rounded-lg">
            ${index > 0 ? '<button class="lightbox-prev" onclick="navigateLightbox(' + (index - 1) + ', \'' + slug + '\')"><i class="fas fa-chevron-left"></i></button>' : ''}
            ${index < butterflyPhotos.length - 1 ? '<button class="lightbox-next" onclick="navigateLightbox(' + (index + 1) + ', \'' + slug + '\')"><i class="fas fa-chevron-right"></i></button>' : ''}
        </div>
        <div class="lightbox-thumbnails mt-4 flex gap-2 overflow-x-auto">
    `;
    
    butterflyPhotos.forEach((photo, i) => {
        lightboxContent += `
            <img src="${photo.thumb}" 
                 alt="${photo.title}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-orange-500' : 'opacity-60'}"
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
    $('.pagination .current').removeClass('current').wrap('<a href="#" onclick="changePage(' + $('.pagination .current').text() + ')"></a>');
    $('.pagination a').each(function() {
        if ($(this).text() == page) {
            $(this).addClass('current').contents().unwrap();
        }
    });
}

// Search functionality for butterflies
function searchButterflies() {
    const searchTerm = $('#butterfly-search').val().toLowerCase();
    $('.butterfly-card').each(function() {
        const butterflyName = $(this).find('h3').text().toLowerCase();
        const scientificName = $(this).find('.scientific-name').text().toLowerCase();
        if (butterflyName.includes(searchTerm) || scientificName.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// Keyboard navigation for lightbox
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
    
    if ($('#butterfly-modal').hasClass('flex') && e.keyCode == 27) {
        closeButterflyModal();
    }
});

// Lazy loading for butterfly images
$(window).scroll(function() {
    $('.butterfly-image').each(function() {
        if ($(this).offset().top < $(window).scrollTop() + $(window).height() + 100) {
            const src = $(this).attr('src');
            if (src.includes('placeholder')) {
                // Replace with actual butterfly image
                $(this).attr('src', src.replace('placeholder', 'butterfly'));
            }
        }
    });
});

// Add search functionality to the page
$(document).ready(function() {
    // Add search box after the hero section
    const searchBox = `
        <div class="container mx-auto px-4 py-4">
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="butterfly-search" placeholder="Search butterflies by name or scientific name..." 
                           class="w-full px-4 py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-orange-500"
                           onkeyup="searchButterflies()">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $('#alphabetical').before(searchBox);
});
</script>