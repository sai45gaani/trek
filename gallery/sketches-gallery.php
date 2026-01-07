<?php
// Set page specific variables
$page_title = 'Sketches Gallery - Art by KshitiZ Group Members | Trekshitz';
$meta_description = 'Beautiful sketches and artwork created by KshitiZ group members during trekking expeditions. Hand-drawn illustrations of forts, landscapes, and nature from Maharashtra.';
$meta_keywords = 'sketches, artwork, drawings, KshitiZ group, trekking art, fort sketches, landscape drawings, nature art, Maharashtra sketches';

// Include header
include './includes/header.php';
?>

<style>
/* Sketches Gallery specific styles */
.sketch-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 1rem;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    position: relative;
    border: 2px solid transparent;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.sketch-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(139, 69, 19, 0.3);
    border-color: #8b4513;
}

.sketch-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 0.5rem;
    filter: sepia(10%);
}

.sketch-card:hover .sketch-image {
    transform: scale(1.1);
    filter: sepia(0%) brightness(1.1);
}

.sketch-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(139, 69, 19, 0.9));
    color: white;
    padding: 1.5rem 1rem 1rem;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.sketch-card:hover .sketch-overlay {
    transform: translateY(0);
}

.sketch-stats {
    background: linear-gradient(135deg, #8b4513, #d2691e);
    color: white;
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    margin: 2rem 0;
}

.artist-info {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.sketch-modal-header {
    background: linear-gradient(135deg, #8b4513, #d2691e);
    color: white;
    padding: 1.5rem;
    border-radius: 1rem 1rem 0 0;
}

.sketch-info {
    color: #d2691e;
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

.medium-tag {
    background: rgba(139, 69, 19, 0.2);
    color: #8b4513;
    padding: 0.25rem 0.5rem;
    border-radius: 0.375rem;
    font-size: 0.75rem;
    margin-top: 0.5rem;
    display: inline-block;
}

.artist-signature {
    font-style: italic;
    color: #d2691e;
    font-size: 0.8rem;
    margin-top: 0.25rem;
}

@media (max-width: 768px) {
    .sketch-image {
        height: 200px;
    }
}
</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-yellow-700 via-amber-600 to-orange-600 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"sketch\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><path d=\"M2,2 L18,18 M18,2 L2,18\" stroke=\"%23ffffff\" stroke-width=\"0.5\" opacity=\"0.1\"/><circle cx=\"10\" cy=\"10\" r=\"2\" stroke=\"%23ffffff\" stroke-width=\"0.5\" fill=\"none\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23sketch)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 font-bilingual">
                    🎨 रेखाचित्र संग्रह
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Sketches by KshitiZ Group Members
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Hand-drawn artwork and illustrations created during trekking expeditions across Maharashtra
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#gallery" class="inline-flex items-center px-8 py-4 bg-white text-amber-700 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-palette mr-2"></i>
                        Browse Sketches
                    </a>
                    <a href="#artists" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-amber-700 transition-colors">
                        <i class="fas fa-users mr-2"></i>
                        Meet Artists
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Stats -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="sketch-stats max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">12+</div>
                        <p class="opacity-90">Artworks</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">8+</div>
                        <p class="opacity-90">Artists</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-2">15+</div>
                        <p class="opacity-90">Years Collection</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About the Collection -->
    <section class="py-8 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    KshitiZ Group Artistic Heritage
                </h3>
                <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    These beautiful sketches are created by talented members of the KshitiZ trekking group during their expeditions. 
                    Each artwork captures the essence of Maharashtra's landscapes, forts, and natural beauty through the eyes of passionate trekkers and artists.
                </p>
            </div>
        </div>
    </section>

    <!-- Sketches Gallery -->
    <section id="gallery" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                        <i class="fas fa-palette mr-3 text-amber-600"></i>
                        Sketch Collection
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">Click on any sketch to view in detail</p>
                </div>

                <div id="gallery-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                    // Sketches gallery data (from the provided HTML)
                    $sketchGallery = [
                        [
                            'id' => 33,
                            'filename' => '33.jpg',
                            'title' => 'Mountain Landscape',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Pencil on Paper',
                            'subject' => 'Sahyadri Peak',
                            'year' => '2018',
                            'description' => 'Detailed sketch of a majestic Sahyadri mountain peak with intricate shading'
                        ],
                        [
                            'id' => 34,
                            'filename' => '34.JPG',
                            'title' => 'Fort Architecture',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Charcoal',
                            'subject' => 'Historic Fort Gateway',
                            'year' => '2018',
                            'description' => 'Architectural study of ancient fort entrance with detailed stonework'
                        ],
                        [
                            'id' => 35,
                            'filename' => '35.JPG',
                            'title' => 'Valley Vista',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Ink Sketch',
                            'subject' => 'Konkan Valley',
                            'year' => '2019',
                            'description' => 'Panoramic view of lush valley with traditional village settlements'
                        ],
                        [
                            'id' => 36,
                            'filename' => '36.jpg',
                            'title' => 'Rock Formation',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Graphite',
                            'subject' => 'Natural Rock Pillars',
                            'year' => '2019',
                            'description' => 'Study of unique geological formations found in Western Ghats'
                        ],
                        [
                            'id' => 37,
                            'filename' => '37.jpg',
                            'title' => 'Temple Ruins',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Pen & Ink',
                            'subject' => 'Ancient Temple',
                            'year' => '2020',
                            'description' => 'Detailed drawing of ancient temple ruins with intricate carvings'
                        ],
                        [
                            'id' => 38,
                            'filename' => '38.JPG',
                            'title' => 'Waterfall Study',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Watercolor Sketch',
                            'subject' => 'Monsoon Waterfall',
                            'year' => '2020',
                            'description' => 'Dynamic sketch capturing the power and beauty of monsoon waterfalls'
                        ],
                        [
                            'id' => 39,
                            'filename' => '39.jpg',
                            'title' => 'Village Scene',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Pencil',
                            'subject' => 'Rural Settlement',
                            'year' => '2021',
                            'description' => 'Peaceful village scene showcasing traditional Maharashtra architecture'
                        ],
                        [
                            'id' => 40,
                            'filename' => '40.jpg',
                            'title' => 'Cave Entrance',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Charcoal',
                            'subject' => 'Buddhist Cave',
                            'year' => '2021',
                            'description' => 'Atmospheric sketch of ancient Buddhist cave entrance with shadows'
                        ],
                        [
                            'id' => 41,
                            'filename' => '41.jpg',
                            'title' => 'Tree Study',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Graphite',
                            'subject' => 'Ancient Banyan',
                            'year' => '2022',
                            'description' => 'Detailed botanical study of a centuries-old banyan tree'
                        ],
                        [
                            'id' => 42,
                            'filename' => '42.jpg',
                            'title' => 'Fortress Wall',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Ink Drawing',
                            'subject' => 'Maratha Fortification',
                            'year' => '2022',
                            'description' => 'Technical study of Maratha military architecture and defense systems'
                        ],
                        [
                            'id' => 43,
                            'filename' => '43.jpg',
                            'title' => 'Sunset Silhouette',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Soft Pastels',
                            'subject' => 'Evening Landscape',
                            'year' => '2023',
                            'description' => 'Dramatic silhouette of mountain ranges during golden hour'
                        ],
                        [
                            'id' => 44,
                            'filename' => '44.jpg',
                            'title' => 'Flora Detail',
                            'artist' => 'KshitiZ Member',
                            'medium' => 'Fine Pen',
                            'subject' => 'Wildflower Study',
                            'year' => '2023',
                            'description' => 'Scientific illustration of endemic wildflowers found during treks'
                        ]
                    ];
                    
                    // Display sketch gallery items
                    foreach ($sketchGallery as $index => $sketch) {
                        echo '<div class="sketch-card" onclick="openSketchLightbox(' . $index . ')">';
                        echo '<img src="https://images.unsplash.com/photo-1578321272176-b7bbc0679853?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="' . htmlspecialchars($sketch['title']) . '" class="sketch-image">';
                        echo '<div class="sketch-overlay">';
                        echo '<h3 class="font-bold text-lg mb-1">' . htmlspecialchars($sketch['title']) . '</h3>';
                        echo '<p class="sketch-info">' . htmlspecialchars($sketch['subject']) . '</p>';
                        echo '<div class="medium-tag">' . htmlspecialchars($sketch['medium']) . '</div>';
                        echo '<div class="artist-info">';
                        echo '<i class="fas fa-user mr-2"></i>';
                        echo htmlspecialchars($sketch['artist']) . ' (' . $sketch['year'] . ')';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Artists Section -->
    <section id="artists" class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-users mr-3 text-amber-600"></i>
                    About KshitiZ Artists
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Meet the talented members who capture Maharashtra's beauty through their art
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-amber-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-pencil-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Traditional Sketching</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Hand-drawn artwork using traditional mediums like pencil, charcoal, and ink</p>
                    <div class="text-sm text-gray-500">
                        <span class="inline-block bg-amber-100 text-amber-800 px-2 py-1 rounded mr-2">Pencil</span>
                        <span class="inline-block bg-amber-100 text-amber-800 px-2 py-1 rounded mr-2">Charcoal</span>
                        <span class="inline-block bg-amber-100 text-amber-800 px-2 py-1 rounded">Ink</span>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-orange-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-mountain text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Landscape Focus</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Specializing in capturing the natural beauty and architectural heritage</p>
                    <div class="text-sm text-gray-500">
                        <span class="inline-block bg-orange-100 text-orange-800 px-2 py-1 rounded mr-2">Forts</span>
                        <span class="inline-block bg-orange-100 text-orange-800 px-2 py-1 rounded mr-2">Mountains</span>
                        <span class="inline-block bg-orange-100 text-orange-800 px-2 py-1 rounded">Temples</span>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <div class="w-16 h-16 bg-yellow-600 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-hiking text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Trekking Artists</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Artists who combine their passion for trekking with artistic expression</p>
                    <div class="text-sm text-gray-500">
                        <span class="inline-block bg-yellow-100 text-yellow-800 px-2 py-1 rounded mr-2">Field Sketching</span>
                        <span class="inline-block bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Plein Air</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
        margin-top: 1rem;
    }

    .lightbox-thumbnails::-webkit-scrollbar {
        height: 4px;
    }

    .lightbox-thumbnails::-webkit-scrollbar-thumb {
        background: #d2691e;
        border-radius: 2px;
    }

    @media (max-width: 768px) {
        .lightbox-prev {
            left: 10px;
        }
        
        .lightbox-next {
            right: 10px;
        }
    }
    </style>
</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    console.log('Sketches Photo Gallery loaded');
    
    // Add search functionality
    const searchBox = `
        <div class="container mx-auto px-4 py-4">
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="sketch-search" placeholder="Search sketches by title, subject, or medium..." 
                           class="w-full px-4 py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:border-amber-600"
                           onkeyup="searchSketches()">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $('#gallery').before(searchBox);
});

// Sketches data (in real app, this would come from PHP)
const sketchesData = <?php echo json_encode($sketchGallery); ?>;

// Open sketch in lightbox
function openSketchLightbox(index) {
    const sketch = sketchesData[index];
    
    let lightboxContent = `
        <div class="lightbox-header mb-4">
            <h3 class="text-white text-2xl mb-2">${sketch.title}</h3>
            <p class="text-amber-300 text-lg mb-1">${sketch.subject}</p>
            <p class="text-gray-300 text-sm mb-1">Medium: ${sketch.medium}</p>
            <p class="text-gray-300 text-sm mb-1">Artist: ${sketch.artist} (${sketch.year})</p>
            <p class="text-gray-400 text-sm">Sketch ${index + 1} of ${sketchesData.length}</p>
        </div>
        <div class="lightbox-image-container relative">
            <img src="https://images.unsplash.com/photo-1578321272176-b7bbc0679853?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="${sketch.title}" class="max-w-full max-h-[70vh] object-contain rounded-lg">
            ${index > 0 ? '<button class="lightbox-prev" onclick="navigateSketch(' + (index - 1) + ')"><i class="fas fa-chevron-left"></i></button>' : ''}
            ${index < sketchesData.length - 1 ? '<button class="lightbox-next" onclick="navigateSketch(' + (index + 1) + ')"><i class="fas fa-chevron-right"></i></button>' : ''}
        </div>
        <div class="mt-4 p-4 bg-gray-900 rounded-lg">
            <p class="text-gray-300 text-sm leading-relaxed">${sketch.description}</p>
        </div>
        <div class="lightbox-thumbnails flex gap-2 overflow-x-auto">
    `;
    
    sketchesData.forEach((s, i) => {
        lightboxContent += `
            <img src="https://images.unsplash.com/photo-1578321272176-b7bbc0679853?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                 alt="${s.title}" 
                 class="w-16 h-16 object-cover rounded cursor-pointer ${i === index ? 'ring-2 ring-amber-500' : 'opacity-60'}"
                 onclick="navigateSketch(${i})">
        `;
    });
    
    lightboxContent += '</div>';
    
    $('#lightbox .lightbox-body').html(lightboxContent);
    $('#lightbox').removeClass('hidden').addClass('flex');
}

// Navigate between sketches
function navigateSketch(index) {
    openSketchLightbox(index);
}

// Close lightbox
function closeLightbox() {
    $('#lightbox').addClass('hidden').removeClass('flex');
}

// Search functionality
function searchSketches() {
    const searchTerm = $('#sketch-search').val().toLowerCase();
    $('.sketch-card').each(function(index) {
        const sketch = sketchesData[index];
        const searchableText = (sketch.title + ' ' + sketch.subject + ' ' + sketch.medium + ' ' + sketch.artist).toLowerCase();
        
        if (searchableText.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// Keyboard navigation
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
});

// Add filter by medium functionality
function filterByMedium(medium) {
    $('.sketch-card').each(function(index) {
        const sketch = sketchesData[index];
        if (medium === 'all' || sketch.medium.toLowerCase().includes(medium.toLowerCase())) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

// Add medium filter buttons
$(document).ready(function() {
    const mediumFilter = `
        <div class="container mx-auto px-4 py-4">
            <div class="text-center">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Filter by Art Medium</h4>
                <div class="flex flex-wrap justify-center gap-2">
                    <button onclick="filterByMedium('all')" class="px-4 py-2 bg-amber-600 text-white rounded-full hover:bg-amber-700 transition-colors">All Mediums</button>
                    <button onclick="filterByMedium('pencil')" class="px-4 py-2 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition-colors">Pencil</button>
                    <button onclick="filterByMedium('charcoal')" class="px-4 py-2 bg-gray-800 text-white rounded-full hover:bg-gray-900 transition-colors">Charcoal</button>
                    <button onclick="filterByMedium('ink')" class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">Ink</button>
                    <button onclick="filterByMedium('watercolor')" class="px-4 py-2 bg-cyan-600 text-white rounded-full hover:bg-cyan-700 transition-colors">Watercolor</button>
                </div>
            </div>
        </div>
    `;
    
    $('#gallery').before(mediumFilter);
});

// Add smooth scrolling
$('a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    const target = $(this.getAttribute('href'));
    if (target.length) {
        $('html, body').animate({
            scrollTop: target.offset().top - 100
        }, 800);
    }
});

// Add entrance animations
$('.sketch-card').each(function(index) {
    $(this).css({
        'opacity': '0',
        'transform': 'translateY(30px)'
    }).delay(index * 100).animate({
        'opacity': '1'
    }, 500, function() {
        $(this).css('transform', 'translateY(0)');
    });
});

console.log('Sketches Photo Gallery: All functionality loaded successfully');
</script>