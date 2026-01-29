<?php
// Set page specific variables
$page_title = 'छायाचित्रे - शिवाजी महाराज | Shivaji Maharaj Photos Gallery | Trekshitz';
$meta_description = 'Complete photo gallery of Chhatrapati Shivaji Maharaj including historical paintings, sculptures, monuments, forts, and artistic representations from various museums and collections.';
$meta_keywords = 'Shivaji Maharaj photos, historical paintings, sculptures, monuments, छायाचित्रे, शिवाजी महाराज फोटो, मराठा कला';

// Include header
include '../includes/header.php';
?>

<style>
/* Custom styles for photo gallery with enhanced Maratha theme */
.photo-overlay {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
}

.category-gradient {
    background: linear-gradient(135deg, #dc2626, #ff9933);
}

.photo-modal-backdrop {
    backdrop-filter: blur(10px);
    background: rgba(0, 0, 0, 0.8);
}

.masonry-grid {
    column-count: 4;
    column-gap: 1rem;
}

@media (max-width: 1024px) {
    .masonry-grid {
        column-count: 3;
    }
}

@media (max-width: 768px) {
    .masonry-grid {
        column-count: 2;
    }
}

@media (max-width: 640px) {
    .masonry-grid {
        column-count: 1;
    }
}

.masonry-item {
    break-inside: avoid;
    margin-bottom: 1rem;
}

.zoom-animation {
    transition: transform 0.3s ease;
}

.zoom-animation:hover {
    transform: scale(1.05);
}
</style>

<main id="main-content" class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-r from-red-600 to-yellow-500 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"camera-pattern\" x=\"0\" y=\"0\" width=\"40\" height=\"40\" patternUnits=\"userSpaceOnUse\"><rect x=\"10\" y=\"15\" width=\"20\" height=\"15\" rx=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/><circle cx=\"20\" cy=\"22\" r=\"4\" fill=\"%23ffffff\" opacity=\"0.05\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23camera-pattern)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    <span class="font-devanagari">छायाचित्रे</span> <span class="text-yellow-400">Gallery</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 opacity-90">
                    Historical Photos & Artistic Representations of Chhatrapati Shivaji Maharaj
                </p>
                <p class="text-lg md:text-xl mb-8 opacity-80 font-devanagari">
                    शिवरायांची चित्रे, शिल्पे, स्मारके आणि कलाकृती
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm opacity-90">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Historical Paintings</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Sculptures</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Monuments</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Fort Images</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Statistics -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-red-600 dark:text-red-400 mb-2 counter" data-target="150">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Historical Images</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">ऐतिहासिक चित्रे</div>
                </div>
                <div class="text-center p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-yellow-600 dark:text-yellow-400 mb-2 counter" data-target="50">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Paintings</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">चित्रकारी</div>
                </div>
                <div class="text-center p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-orange-600 dark:text-orange-400 mb-2 counter" data-target="75">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Sculptures</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">शिल्पे</div>
                </div>
                <div class="text-center p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform duration-300">
                    <div class="text-4xl font-bold text-green-600 dark:text-green-400 mb-2 counter" data-target="100">0</div>
                    <div class="text-gray-700 dark:text-gray-300 font-semibold">Fort Photos</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 font-devanagari">किल्ल्यांची चित्रे</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Filters -->
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-6"></div>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        श्रेणी निवडा
                    </span>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Select Category to Filter Images</p>
            </div>
            
            <div class="flex flex-wrap justify-center gap-4 mb-8" id="categoryFilters">
                <button class="filter-btn active px-6 py-3 rounded-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 font-semibold" data-category="all">
                    <i class="fas fa-images mr-2"></i>All Images
                </button>
                <button class="filter-btn px-6 py-3 rounded-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 font-semibold" data-category="paintings">
                    <i class="fas fa-palette mr-2"></i>Paintings
                </button>
                <button class="filter-btn px-6 py-3 rounded-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 font-semibold font-devanagari" data-category="sculptures">
                    <i class="fas fa-monument mr-2"></i>शिल्पे
                </button>
                <button class="filter-btn px-6 py-3 rounded-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 font-semibold" data-category="forts">
                    <i class="fas fa-fort-awesome mr-2"></i>Forts
                </button>
                <button class="filter-btn px-6 py-3 rounded-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 font-semibold" data-category="monuments">
                    <i class="fas fa-university mr-2"></i>Monuments
                </button>
                <button class="filter-btn px-6 py-3 rounded-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 font-semibold" data-category="museums">
                    <i class="fas fa-museum mr-2"></i>Museums
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Gallery Sections -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <!-- Historical Paintings Section -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                            ऐतिहासिक चित्रकारी
                        </span>
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Historical Paintings and Artistic Representations</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Painting 1 -->
                    <div class="group cursor-pointer photo-item" data-category="paintings">
                        <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-gray-900 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                            <div class="aspect-w-4 aspect-h-5 bg-gradient-to-br from-amber-100 to-orange-200 dark:from-amber-900 dark:to-orange-900">
                                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     alt="Shivaji Maharaj Portrait" 
                                     class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h4 class="text-xl font-bold mb-2 font-devanagari">राजा शिवछत्रपती</h4>
                                    <p class="text-sm opacity-90">Traditional portrait depicting the great Maratha king</p>
                                    <div class="flex items-center mt-2 text-xs">
                                        <i class="fas fa-palette mr-2"></i>
                                        <span>Oil on Canvas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Painting 2 -->
                    <div class="group cursor-pointer photo-item" data-category="paintings">
                        <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-gray-900 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                            <div class="aspect-w-4 aspect-h-5 bg-gradient-to-br from-red-100 to-yellow-200 dark:from-red-900 dark:to-yellow-900">
                                <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     alt="Shivaji Coronation" 
                                     class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h4 class="text-xl font-bold mb-2 font-devanagari">राज्याभिषेक</h4>
                                    <p class="text-sm opacity-90">Coronation ceremony at Raigad Fort</p>
                                    <div class="flex items-center mt-2 text-xs">
                                        <i class="fas fa-crown mr-2"></i>
                                        <span>Historical Scene</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Painting 3 -->
                    <div class="group cursor-pointer photo-item" data-category="paintings">
                        <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-gray-900 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
                            <div class="aspect-w-4 aspect-h-5 bg-gradient-to-br from-green-100 to-blue-200 dark:from-green-900 dark:to-blue-900">
                                <img src="https://images.unsplash.com/photo-1609592891002-bfec251dbf6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     alt="Shivaji with Mother Jijabai" 
                                     class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h4 class="text-xl font-bold mb-2 font-devanagari">माता जिजाबाई आणि शिवबा</h4>
                                    <p class="text-sm opacity-90">Young Shivaji with his mother Jijabai</p>
                                    <div class="flex items-center mt-2 text-xs">
                                        <i class="fas fa-heart mr-2"></i>
                                        <span>Family Portrait</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sculptures Section -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                            Sculptures & Statues
                        </span>
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-300 font-devanagari">शिल्पकला आणि पुतळे</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Sculpture 1 -->
                    <div class="group cursor-pointer photo-item" data-category="sculptures">
                        <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="aspect-w-3 aspect-h-4 bg-gradient-to-b from-stone-100 to-stone-200 dark:from-gray-700 dark:to-gray-800">
                                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                     alt="Shivaji Statue Mumbai" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 dark:text-white font-devanagari">मुंबई स्मारक</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Gateway of India</p>
                                <div class="flex items-center mt-2 text-xs text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>Mumbai, Maharashtra</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sculpture 2 -->
                    <div class="group cursor-pointer photo-item" data-category="sculptures">
                        <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="aspect-w-3 aspect-h-4 bg-gradient-to-b from-bronze-100 to-bronze-200">
                                <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                     alt="Shivaji Statue Pune" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 dark:text-white font-devanagari">पुणे पुतळा</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Shivaji Park</p>
                                <div class="flex items-center mt-2 text-xs text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <span>Pune, Maharashtra</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sculpture 3 -->
                    <div class="group cursor-pointer photo-item" data-category="sculptures">
                        <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="aspect-w-3 aspect-h-4 bg-gradient-to-b from-gold-100 to-gold-200">
                                <img src="https://images.unsplash.com/photo-1609592891002-bfec251dbf6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                     alt="Raigad Statue" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 dark:text-white font-devanagari">राजगड स्मारक</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Capital Fort Memorial</p>
                                <div class="flex items-center mt-2 text-xs text-gray-500">
                                    <i class="fas fa-fort-awesome mr-1"></i>
                                    <span>Raigad, Maharashtra</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sculpture 4 -->
                    <div class="group cursor-pointer photo-item" data-category="sculptures">
                        <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="aspect-w-3 aspect-h-4 bg-gradient-to-b from-copper-100 to-copper-200">
                                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                     alt="Parliament Statue" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 dark:text-white">Parliament House</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300 font-devanagari">संसद भवन</p>
                                <div class="flex items-center mt-2 text-xs text-gray-500">
                                    <i class="fas fa-landmark mr-1"></i>
                                    <span>New Delhi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Museum Collections Section -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                            संग्रहालयीन संग्रह
                        </span>
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Museum Collections & Artifacts</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Museum Item 1 -->
                    <div class="group cursor-pointer photo-item bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300" data-category="museums">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="Royal Sword" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                Artifact
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">भवानी तलवार</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">The legendary sword gifted by Goddess Bhavani</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-museum mr-2"></i>
                                    <span>Satara Museum</span>
                                </div>
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Royal</span>
                            </div>
                        </div>
                    </div>

                    <!-- Museum Item 2 -->
                    <div class="group cursor-pointer photo-item bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300" data-category="museums">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="Royal Seal" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                Original
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Royal Seal</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 font-devanagari">शाही मुद्रा - राजकीय दस्तऐवजांसाठी</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-museum mr-2"></i>
                                    <span>National Museum</span>
                                </div>
                                <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Administrative</span>
                            </div>
                        </div>
                    </div>

                    <!-- Museum Item 3 -->
                    <div class="group cursor-pointer photo-item bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300" data-category="museums">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1609592891002-bfec251dbf6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="Royal Crown" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                Replica
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">छत्रपती मुकुट</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">The royal crown used during coronation</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-crown mr-2"></i>
                                    <span>Raigad Museum</span>
                                </div>
                                <span class="bg-purple-500 text-white px-2 py-1 rounded text-xs">Ceremonial</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fort Gallery Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-8"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent font-devanagari">
                        शिवरायांचे किल्ले
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300">Forts Associated with Chhatrapati Shivaji Maharaj</p>
            </div>

            <!-- Fort Images Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Raigad Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Raigad Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">राजगड</h4>
                                <p class="text-sm opacity-90">Capital of Maratha Empire</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-crown mr-2"></i>
                                    <span>Coronation Fort</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pratapgad Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Pratapgad Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">प्रतापगड</h4>
                                <p class="text-sm opacity-90">Victory over Afzal Khan</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-sword mr-2"></i>
                                    <span>Battle Fort</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shivneri Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1609592891002-bfec251dbf6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Shivneri Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">शिवनेरी</h4>
                                <p class="text-sm opacity-90">Birthplace of Shivaji</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-star mr-2"></i>
                                    <span>Birth Fort</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sinhgad Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Sinhgad Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">सिंहगड</h4>
                                <p class="text-sm opacity-90">Tanaji's Heroic Fort</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    <span>Strategic Fort</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Torna Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Torna Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">तोरणा</h4>
                                <p class="text-sm opacity-90">First Conquered Fort</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-flag mr-2"></i>
                                    <span>First Victory</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rajmachi Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1609592891002-bfec251dbf6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Rajmachi Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">राजमाची</h4>
                                <p class="text-sm opacity-90">Twin Peak Fort</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-mountain mr-2"></i>
                                    <span>Hill Fort</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lohgad Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Lohgad Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">लोहगड</h4>
                                <p class="text-sm opacity-90">Iron Fort</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-hammer mr-2"></i>
                                    <span>Strategic Position</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panhala Fort -->
                <div class="group cursor-pointer photo-item" data-category="forts">
                    <div class="relative overflow-hidden rounded-xl bg-white dark:bg-gray-900 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Panhala Fort" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <h4 class="text-lg font-bold font-devanagari">पन्हाळगड</h4>
                                <p class="text-sm opacity-90">Favorite Fort of Shivaji</p>
                                <div class="flex items-center mt-2 text-xs">
                                    <i class="fas fa-heart mr-2"></i>
                                    <span>Residence Fort</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Monuments Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-8"></div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-red-600 to-yellow-500 bg-clip-text text-transparent">
                        Monuments & Memorials
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-devanagari">स्मारके आणि स्मृतिचिन्हे</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Shivaji Memorial Rajkot -->
                <div class="group cursor-pointer photo-item bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300" data-category="monuments">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Shivaji Memorial" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            National Memorial
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">राष्ट्रीय स्मारक</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">Grand memorial dedicated to the great Maratha king</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span>Mumbai, Maharashtra</span>
                            </div>
                            <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Heritage</span>
                        </div>
                    </div>
                </div>

                <!-- Shivaji Park Memorial -->
                <div class="group cursor-pointer photo-item bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300" data-category="monuments">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1590736969955-71cc94901144?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Shivaji Park" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            Public Memorial
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Shivaji Park</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 font-devanagari">मुंबईतील प्रसिद्ध मैदान आणि स्मारक</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-users mr-2"></i>
                                <span>Public Ground</span>
                            </div>
                            <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Cultural</span>
                        </div>
                    </div>
                </div>

                <!-- Gateway of India Memorial -->
                <div class="group cursor-pointer photo-item bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-300" data-category="monuments">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1609592891002-bfec251dbf6b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Gateway Memorial" 
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-yellow-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            Historic Site
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-2 font-devanagari">गेटवे स्मारक</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">Memorial near the iconic Gateway of India</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fas fa-landmark mr-2"></i>
                                <span>Tourist Attraction</span>
                            </div>
                            <span class="bg-purple-500 text-white px-2 py-1 rounded text-xs">Iconic</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Modal -->
    <div id="photoModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 photo-modal-backdrop">
        <div class="relative max-w-4xl max-h-full bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-2xl">
            <button id="closeModal" class="absolute top-4 right-4 z-10 w-10 h-10 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-70 transition-colors">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="relative">
                <img id="modalImage" src="" alt="" class="w-full max-h-96 object-contain">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                    <h3 id="modalTitle" class="text-2xl font-bold text-white mb-2"></h3>
                    <p id="modalDescription" class="text-white opacity-90"></p>
                    <div id="modalMeta" class="flex items-center mt-3 text-sm text-white opacity-80"></div>
                </div>
            </div>
            
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <button id="prevImage" class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-chevron-left mr-2"></i>Previous
                    </button>
                    <div class="flex space-x-2">
                        <button class="p-2 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            <i class="fas fa-download text-gray-600 dark:text-gray-300"></i>
                        </button>
                        <button class="p-2 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            <i class="fas fa-share text-gray-600 dark:text-gray-300"></i>
                        </button>
                        <button class="p-2 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            <i class="fas fa-heart text-gray-600 dark:text-gray-300"></i>
                        </button>
                    </div>
                    <button id="nextImage" class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Next<i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Load More Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white font-devanagari">
                अधिक छायाचित्रे
            </h3>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
                Explore more historical images and artistic representations
            </p>
            <button id="loadMoreBtn" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-semibold rounded-full hover:from-yellow-500 hover:to-red-600 transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-images mr-2"></i>
                Load More Images
            </button>
        </div>
    </section>

    <!-- Navigation to Related Pages -->
    <section class="py-16 bg-gradient-to-r from-red-600 to-yellow-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 font-devanagari">
                अन्य संबंधित विषय
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Explore more about Chhatrapati Shivaji Maharaj
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="/shivaji/battles" class="inline-flex items-center px-8 py-4 bg-white text-red-600 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-sword mr-2"></i>
                    Military Campaigns
                </a>
                <a href="/shivaji/economic-policy" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-coins mr-2"></i>
                    आर्थिक धोरण
                </a>
                <a href="/shivaji/historical-books" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-red-600 transition-colors">
                    <i class="fas fa-book mr-2"></i>
                    Historical Literature
                </a>
            </div>
            
            <!-- Quick Links -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <a href="/shivaji/navy" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-ship mr-2"></i>
                    Maratha Navy
                </a>
                <a href="/shivaji/justice-system" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-balance-scale mr-2"></i>
                    न्याय व्यवस्था
                </a>
                <a href="/shivaji/army" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Military Organization
                </a>
                <a href="/shivaji/songs" class="bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-3 rounded-lg transition-colors">
                    <i class="fas fa-music mr-2"></i>
                    गीते व कविता
                </a>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Shivaji Maharaj Photos Gallery loaded');
    
    // Global variables
    let currentImageIndex = 0;
    let currentCategory = 'all';
    let allImages = [];
    let filteredImages = [];
    
    // Initialize gallery
    initializeGallery();
    
    function initializeGallery() {
        setupImageData();
        setupFilterButtons();
        setupPhotoModal();
        setupCounters();
        setupLoadMore();
        setupImageLazyLoading();
        setupKeyboardNavigation();
        animateGalleryItems();
    }
    
    // Setup image data for modal functionality
    function setupImageData() {
        const photoItems = document.querySelectorAll('.photo-item');
        allImages = Array.from(photoItems).map((item, index) => {
            const img = item.querySelector('img');
            const title = item.querySelector('h4')?.textContent || 'Shivaji Maharaj Image';
            const description = item.querySelector('p')?.textContent || 'Historical image';
            const category = item.getAttribute('data-category') || 'all';
            
            return {
                index,
                src: img?.src || '',
                alt: img?.alt || title,
                title,
                description,
                category,
                element: item
            };
        });
        
        filteredImages = [...allImages];
        console.log(`Loaded ${allImages.length} images`);
    }
    
    // Filter functionality
    function setupFilterButtons() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-red-600', 'text-white');
                    b.classList.add('text-red-600');
                });
                
                // Add active class to clicked button
                this.classList.add('active', 'bg-red-600', 'text-white');
                this.classList.remove('text-red-600');
                
                const category = this.getAttribute('data-category');
                filterImages(category);
            });
        });
    }
    
    function filterImages(category) {
        currentCategory = category;
        const photoItems = document.querySelectorAll('.photo-item');
        
        photoItems.forEach((item, index) => {
            const itemCategory = item.getAttribute('data-category');
            const shouldShow = category === 'all' || itemCategory === category;
            
            if (shouldShow) {
                item.style.display = 'block';
                item.style.opacity = '0';
                item.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 50);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(-30px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
        
   // Update filtered images for modal
        filteredImages = category === 'all' ? 
            [...allImages] : 
            allImages.filter(img => img.category === category);
        
        console.log(`Filtered to ${filteredImages.length} images for category: ${category}`);
    }
    
    // Photo Modal Setup
    function setupPhotoModal() {
        const modal = document.getElementById('photoModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');
        const modalMeta = document.getElementById('modalMeta');
        const closeModal = document.getElementById('closeModal');
        const prevBtn = document.getElementById('prevImage');
        const nextBtn = document.getElementById('nextImage');
        
        // Open modal when clicking on photo items
        document.addEventListener('click', function(e) {
            const photoItem = e.target.closest('.photo-item');
            if (photoItem) {
                e.preventDefault();
                const imageIndex = Array.from(document.querySelectorAll('.photo-item')).indexOf(photoItem);
                const filteredIndex = filteredImages.findIndex(img => img.index === imageIndex);
                if (filteredIndex !== -1) {
                    openModal(filteredIndex);
                }
            }
        });
        
        // Close modal
        closeModal.addEventListener('click', closeModalHandler);
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModalHandler();
            }
        });
        
        // Navigation buttons
        prevBtn.addEventListener('click', () => navigateImage(-1));
        nextBtn.addEventListener('click', () => navigateImage(1));
        
        function openModal(index) {
            currentImageIndex = index;
            updateModalContent();
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            
            // Animate modal entrance
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.8)';
            setTimeout(() => {
                modal.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                modal.style.opacity = '1';
                modal.style.transform = 'scale(1)';
            }, 10);
        }
        
        function closeModalHandler() {
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.8)';
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }, 300);
        }
        
        function navigateImage(direction) {
            currentImageIndex += direction;
            
            if (currentImageIndex < 0) {
                currentImageIndex = filteredImages.length - 1;
            } else if (currentImageIndex >= filteredImages.length) {
                currentImageIndex = 0;
            }
            
            updateModalContent();
        }
        
        function updateModalContent() {
            const image = filteredImages[currentImageIndex];
            if (!image) return;
            
            modalImage.src = image.src;
            modalImage.alt = image.alt;
            modalTitle.textContent = image.title;
            modalDescription.textContent = image.description;
            
            // Update meta information
            modalMeta.innerHTML = `
                <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                        <i class="fas fa-tag mr-1"></i>
                        ${image.category}
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-images mr-1"></i>
                        ${currentImageIndex + 1} of ${filteredImages.length}
                    </span>
                </div>
            `;
            
            // Update navigation button states
            prevBtn.style.opacity = filteredImages.length > 1 ? '1' : '0.5';
            nextBtn.style.opacity = filteredImages.length > 1 ? '1' : '0.5';
        }
    }
    
    // Keyboard Navigation
    function setupKeyboardNavigation() {
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('photoModal');
            if (!modal.classList.contains('hidden')) {
                switch(e.key) {
                    case 'Escape':
                        document.getElementById('closeModal').click();
                        break;
                    case 'ArrowLeft':
                        document.getElementById('prevImage').click();
                        break;
                    case 'ArrowRight':
                        document.getElementById('nextImage').click();
                        break;
                }
            }
        });
    }
    
    // Counter Animation
    function setupCounters() {
        const counters = document.querySelectorAll('.counter');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateCounter(counter, target);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => observer.observe(counter));
    }
    
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 25);
    }
    
    // Load More Functionality
    function setupLoadMore() {
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        let loadedCount = 0;
        
        loadMoreBtn.addEventListener('click', function() {
            // Simulate loading more images
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Loading...';
            this.disabled = true;
            
            setTimeout(() => {
                loadedCount += 12;
                this.innerHTML = '<i class="fas fa-images mr-2"></i>Load More Images';
                this.disabled = false;
                
                // Show success message
                showNotification('More images loaded successfully!', 'success');
                
                // Hide button if all images loaded
                if (loadedCount >= 100) {
                    this.style.display = 'none';
                    showNotification('All images have been loaded!', 'info');
                }
            }, 1500);
        });
    }
    
    // Lazy Loading for Images
    function setupImageLazyLoading() {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    
                    // Add loading effect
                    img.style.opacity = '0';
                    img.style.transform = 'scale(0.8)';
                    
                    img.onload = function() {
                        img.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        img.style.opacity = '1';
                        img.style.transform = 'scale(1)';
                    };
                    
                    imageObserver.unobserve(img);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        document.querySelectorAll('.photo-item img').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Animate Gallery Items on Scroll
    function animateGalleryItems() {
        const galleryItems = document.querySelectorAll('.photo-item');
        const galleryObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    galleryObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });
        
        galleryItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(30px)';
            item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            galleryObserver.observe(item);
        });
    }
    
    // Enhanced Hover Effects
    function setupHoverEffects() {
        const photoItems = document.querySelectorAll('.photo-item');
        
        photoItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.08) translateY(-10px)';
                this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.3)';
                this.style.zIndex = '10';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) translateY(0)';
                this.style.boxShadow = '';
                this.style.zIndex = '';
            });
        });
    }
    
    // Search Functionality
    function setupSearch() {
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = 'Search images...';
        searchInput.className = 'w-full max-w-md mx-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent';
        
        const searchContainer = document.createElement('div');
        searchContainer.className = 'flex justify-center mb-8';
        searchContainer.appendChild(searchInput);
        
        const filtersSection = document.getElementById('categoryFilters').parentElement;
        filtersSection.insertBefore(searchContainer, document.getElementById('categoryFilters'));
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const photoItems = document.querySelectorAll('.photo-item');
            
            photoItems.forEach(item => {
                const title = item.querySelector('h4')?.textContent.toLowerCase() || '';
                const description = item.querySelector('p')?.textContent.toLowerCase() || '';
                const matches = title.includes(searchTerm) || description.includes(searchTerm);
                
                if (searchTerm === '' || matches) {
                    item.style.display = 'block';
                    item.style.opacity = '1';
                } else {
                    item.style.opacity = '0.3';
                }
            });
        });
    }
    
    // Touch/Swipe Support for Mobile
    function setupTouchSupport() {
        let startX = 0;
        let startY = 0;
        const modal = document.getElementById('photoModal');
        
        modal.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        });
        
        modal.addEventListener('touchend', function(e) {
            const endX = e.changedTouches[0].clientX;
            const endY = e.changedTouches[0].clientY;
            const diffX = startX - endX;
            const diffY = startY - endY;
            
            // Horizontal swipe detection
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    // Swipe left - next image
                    document.getElementById('nextImage').click();
                } else {
                    // Swipe right - previous image
                    document.getElementById('prevImage').click();
                }
            }
            
            // Vertical swipe down to close
            if (diffY < -100) {
                document.getElementById('closeModal').click();
            }
        });
    }
    
    // Download Functionality
    function setupDownloadFeature() {
        document.addEventListener('click', function(e) {
            if (e.target.closest('.fas.fa-download')?.parentElement) {
                e.preventDefault();
                const modalImage = document.getElementById('modalImage');
                const link = document.createElement('a');
                link.href = modalImage.src;
                link.download = `shivaji-maharaj-${currentImageIndex + 1}.jpg`;
                link.click();
                
                showNotification('Image download started!', 'success');
            }
        });
    }
    
    // Share Functionality
    function setupShareFeature() {
        document.addEventListener('click', function(e) {
            if (e.target.closest('.fas.fa-share')?.parentElement) {
                e.preventDefault();
                const image = filteredImages[currentImageIndex];
                
                if (navigator.share) {
                    navigator.share({
                        title: image.title,
                        text: image.description,
                        url: window.location.href
                    });
                } else {
                    // Fallback - copy to clipboard
                    navigator.clipboard.writeText(window.location.href);
                    showNotification('Link copied to clipboard!', 'success');
                }
            }
        });
    }
    
    // Favorite Functionality
    function setupFavorites() {
        let favorites = JSON.parse(localStorage.getItem('shivaji-favorites') || '[]');
        
        document.addEventListener('click', function(e) {
            if (e.target.closest('.fas.fa-heart')?.parentElement) {
                e.preventDefault();
                const heartIcon = e.target.closest('.fas.fa-heart') || e.target;
                const imageId = currentImageIndex;
                
                if (favorites.includes(imageId)) {
                    favorites = favorites.filter(id => id !== imageId);
                    heartIcon.style.color = '';
                    showNotification('Removed from favorites', 'info');
                } else {
                    favorites.push(imageId);
                    heartIcon.style.color = '#ef4444';
                    showNotification('Added to favorites!', 'success');
                }
                
                localStorage.setItem('shivaji-favorites', JSON.stringify(favorites));
                updateFavoriteButtons();
            }
        });
        
        function updateFavoriteButtons() {
            const heartIcon = document.querySelector('#photoModal .fas.fa-heart');
            if (heartIcon && favorites.includes(currentImageIndex)) {
                heartIcon.style.color = '#ef4444';
            }
        }
    }
    
    // Notification System
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => notification.remove());
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = `notification fixed top-4 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300`;
        
        const colors = {
            success: 'bg-green-500 text-white',
            error: 'bg-red-500 text-white',
            warning: 'bg-yellow-500 text-white',
            info: 'bg-blue-500 text-white'
        };
        
        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };
        
        notification.className += ` ${colors[type]}`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="${icons[type]} mr-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Show notification
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Hide notification after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
    
    // Performance Optimization
    function optimizePerformance() {
        // Debounce resize events
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Handle resize-specific logic
                console.log('Window resized - optimizing layout');
            }, 250);
        });
        
        // Intersection Observer for better performance
        const performanceObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-viewport');
                } else {
                    entry.target.classList.remove('in-viewport');
                }
            });
        });
        
        document.querySelectorAll('.photo-item').forEach(item => {
            performanceObserver.observe(item);
        });
    }
    
    // Initialize all additional features
    setupHoverEffects();
    setupSearch();
    setupTouchSupport();
    setupDownloadFeature();
    setupShareFeature();
    setupFavorites();
    optimizePerformance();
    
    console.log('Shivaji Maharaj Photos Gallery: All features initialized successfully');
});

// Additional utility functions
function formatImageTitle(title) {
    return title.length > 50 ? title.substring(0, 50) + '...' : title;
}

function getImageCategory(element) {
    return element.getAttribute('data-category') || 'general';
}

function preloadImages() {
    const imageUrls = Array.from(document.querySelectorAll('.photo-item img')).map(img => img.src);
    imageUrls.forEach(url => {
        const img = new Image();
        img.src = url;
    });
}

// Initialize preloading after page load
window.addEventListener('load', preloadImages);

// Add CSS for enhanced animations and effects
const enhancedStyle = document.createElement('style');
enhancedStyle.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    
    .bg-clip-text {
        background-clip: text;
        -webkit-background-clip: text;
    }
    
    .text-transparent {
        color: transparent;
    }
    
    .photo-item {
        transition: all 0.3s ease;
    }
    
    .photo-item:hover {
        z-index: 10;
    }
    
    .photo-item img {
        transition: transform 0.5s ease;
    }
    
    .filter-btn.active {
        background: linear-gradient(135deg, #dc2626, #ff9933) !important;
        color: white !important;
        transform: scale(1.05);
    }
    
    .notification {
        backdrop-filter: blur(10px);
    }
    
    @media (max-width: 768px) {
        .photo-item {
            margin-bottom: 1rem;
        }
        
        .filter-btn {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
        }
    }
    
    .in-viewport {
        animation: fadeInUp 0.6s ease-out;
    }
    
    /* Loading skeleton effect */
    .loading-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading-shimmer 1.5s infinite;
    }
    
    @keyframes loading-shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }
`;
document.head.appendChild(enhancedStyle);