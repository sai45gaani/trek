<?php
// Set page specific variables
$page_title = 'Fort Maps - Interactive Historic Fort Explorer | Trekshitz';
$meta_description = 'Explore historic forts of Maharashtra with interactive maps. Discover ancient fortresses, trekking routes, and cultural heritage through detailed cartographic information.';
$meta_keywords = 'forts, maharashtra, maps, trekking, heritage, historical forts, fort maps, sahyadri';

// Include header
include './includes/header.php';
?>

<style>
/* Fort Map specific styles */
.fort-link {
    transition: all 0.3s ease;
    cursor: pointer;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    display: block;
    text-decoration: none;
    color: inherit;
}

.fort-link:hover {
    background-color: #7fb069;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(127, 176, 105, 0.3);
}

.alphabet-header {
    background: linear-gradient(135deg, #ec8d81 0%, #f4a261 100%);
    color: #1f2937;
    font-weight: bold;
    padding: 1rem;
    text-align: center;
    border-radius: 0.5rem 0.5rem 0 0;
}

.fort-grid {
    background: linear-gradient(135deg, #6fc3df 0%, #a8e6cf 100%);
    padding: 1.5rem;
    border-radius: 0 0 0.5rem 0.5rem;
    min-height: 200px;
}

.map-container {
    min-height: 600px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1rem;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.loading {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
}

.loading.show {
    display: block;
}

.map-controls {
    position: absolute;
    top: 1rem;
    right: 1rem;
    z-index: 20;
    display: flex;
    gap: 0.5rem;
}

.map-controls button {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    padding: 0.5rem;
    border-radius: 0.375rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.map-controls button:hover {
    background: white;
    transform: scale(1.05);
}

.fort-section {
    margin-bottom: 2rem;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.fort-name-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 0.5rem;
}

.map-placeholder {
    color: white;
    text-align: center;
    padding: 2rem;
}

.map-placeholder i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.selected-fort-info {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 0.5rem;
    padding: 1rem;
    margin-bottom: 1rem;
    color: white;
}

.nav-controls {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.nav-controls a {
    background: var(--accent-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.nav-controls a:hover {
    background: var(--primary-color);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .fort-name-grid {
        grid-template-columns: 1fr 1fr;
    }
    
    .map-container {
        min-height: 400px;
    }
}
</style>

<main id="main-content">
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary via-secondary to-accent text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"fort\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><rect x=\"8\" y=\"4\" width=\"4\" height=\"8\" fill=\"%23ffffff\" opacity=\"0.1\"/><rect x=\"6\" y=\"6\" width=\"8\" height=\"2\" fill=\"%23ffffff\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23fort)\"/></svg>');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 font-bilingual">
                    🏰 किल्ले आणि नकाशे
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold mb-8">
                    Fort Maps - Interactive Explorer
                </h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Discover Maharashtra's historic forts with detailed interactive maps and trekking routes
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#fort-list" class="inline-flex items-center px-8 py-4 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-list mr-2"></i>
                        Browse Fort List
                    </a>
                    <a href="#map-view" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-primary transition-colors">
                        <i class="fas fa-map mr-2"></i>
                        View Map
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Controls -->
    <section class="py-8 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="nav-controls">
                <a href="#fort-list">
                    <i class="fas fa-list mr-2"></i>Map Names Alphabetically
                </a>
                <a href="#map-view">
                    <i class="fas fa-map mr-2"></i>Interactive Map
                </a>
                <a href="#" onclick="showMapSymbols()">
                    <i class="fas fa-symbols mr-2"></i>Map Symbols
                </a>
            </div>
        </div>
    </section>

    <!-- Map Display Section -->
    <section id="map-view" class="py-12 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="map-container relative">
                    <div class="loading" id="loading">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-white"></div>
                        <p class="text-white mt-4">Loading map...</p>
                    </div>
                    
                    <div class="map-controls">
                        <button onclick="zoomIn()" title="Zoom In">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button onclick="zoomOut()" title="Zoom Out">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button onclick="resetView()" title="Reset View">
                            <i class="fas fa-refresh"></i>
                        </button>
                    </div>
                    
                    <div id="map-content" class="map-placeholder">
                        <i class="fas fa-mountain"></i>
                        <h3 class="text-2xl font-bold mb-4">Select a Fort to View Map</h3>
                        <p class="text-lg opacity-80">Click on any fort name below to load its interactive map</p>
                    </div>
                    
                    <div id="selected-fort-info" class="selected-fort-info" style="display: none;">
                        <h4 class="font-bold text-lg mb-2">Fort Information</h4>
                        <p id="fort-description">Select a fort to view detailed information</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fort List Section -->
    <section id="fort-list" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                        <i class="fas fa-fort-awesome mr-3 text-accent"></i>
                        Fort Names Alphabetically
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Browse through Maharashtra's historic forts organized alphabetically
                    </p>
                </div>

                <?php
                // Fort data organized by alphabet
                $fortData = [
                    'A' => [
                        'Aad', 'Aamner', 'Achala', 'Aguada', 'Ahivant', 'Ajinkyatara', 'Ajmera', 'Alang', 
                        'Ambagad', 'Anantapura Fort', 'Anghai', 'Ankai', 'Antoor', 'Arnala', 'Asawa', 
                        'Asherigad', 'Asirgarh Fort', 'Aundha', 'Ausa', 'Avchitgad'
                    ],
                    'B' => [
                        'Bahula', 'Balwantgad', 'Bankot', 'Bhairavgad (Satara)', 'Bhairavgad(kothale)', 
                        'Bhairavgad(Moroshi)', 'Bhairavgad(Shirpunje)', 'Bhamer', 'Bhangsigad(Bhangsi mata gad)', 
                        'Bharatgad', 'Bhaskargad', 'Bhavanigad', 'Bhilai', 'Bhilai Fort', 'Bhivgad(Bhimgad)', 
                        'Bhorgiri', 'Bhorwadi Fort', 'Bhor-Wai-Satara', 'Bhudargad', 'Bhupatgad', 'Bhushangad', 'Bitangad'
                    ],
                    'C' => [
                        'Chandan-vandan', 'Chapora Fort', 'Chaugaon Fort', 'Chavand', 'Colaba'
                    ],
                    'D' => [
                        'Dahanu Fort', 'Dategad', 'Dehergad (Bhorgad)', 'Dermal', 'Dermal To Pisol Route Map', 
                        'Devgad Fort', 'Devgiri (Daulatabad)', 'Dhak-Bahiri', 'Dharmapuri', 'Dharur', 'Dhodap', 
                        'Dronagiri', 'Dundha'
                    ],
                    'F' => [
                        'fort'
                    ],
                    'G' => [
                        'Gadgada (Ghargad)', 'Galna', 'Gavilgad', 'Ghosalgad', 'Gopalgad', 'Gorakhgad', 
                        'Gowalkot', 'Gunawantgad'
                    ],
                    'H' => [
                        'Hadsar', 'Hanumantgad(Nimgiri)', 'Hanumantgad(Sindhudurg)', 'Hargad', 'Hargapurgad', 
                        'Harihar', 'Harishchandragad', 'Hatgad', 'Honnur Fort'
                    ],
                    'I' => [
                        'Indrai'
                    ],
                    'J' => [
                        'Janjala (Vaishagad)', 'Janjira', 'Jivdhan', 'Juna Panhala'
                    ],
                    'K' => [
                        'Kaladgad', 'kalanidhigad (kalanandigad)', 'Kalyangad(Nandgiri)', 'Kamalgad', 'Kanchan', 
                        'Kandhar', 'Kanhergad(Chalisgaon)', 'Kanhergad(Nashik)', 'Kankrala', 'Karha', 'Karnala', 
                        'Katra', 'Kavnai', 'Kenjalgad', 'Khairai', 'Khairai 1', 'Khanderi', 'Kharda', 'Kohoj', 
                        'Kolkewadi', 'Korigad', 'Korlai', 'Kulang', 'Kulang 1', 'Kurdugad'
                    ],
                    'L' => [
                        'Lahugad', 'Laling', 'Lohgad', 'Lonza'
                    ],
                    'M' => [
                        'Machindragad', 'Madangad', 'Madgad', 'Mahimangad', 'Mahimatgad', 'Mahimatgad 1', 
                        'Mahipatgad', 'Mahuli', 'Mahurgad', 'Malhargad', 'Mandvi Kot', 'Mangad', 'Mangalgad', 
                        'Manikdurg', 'Manikgad', 'Manikpunj', 'Manohar-Mansantoshgad', 'Mohandar(Shidaka)', 
                        'Moragad', 'Mulher'
                    ],
                    'N' => [
                        'Nagardhan', 'Naldurg', 'Narayangad', 'Narnala', 'Nhavigad', 'Nimgiri'
                    ],
                    'P' => [
                        'Padmadurg ( Kasa Killa)', 'Palgad', 'Pandavgad', 'Panhalgad', 'Paranda', 'Pargad', 
                        'Parola', 'Parvatgad', 'Patta', 'Pawangad', 'Peb', 'Pedka', 'Pemgiri(Shahagad)', 
                        'Peth (Kothaligad)', 'Pimpla', 'Pisol', 'Prachitgad', 'Pratapgad', 'Premgiri', 'Purandar'
                    ],
                    'R' => [
                        'Raigad', 'Raikot', 'Rajdeher', 'Rajdher', 'Rajgad', 'Rajhansgad (Yellur Fort)', 
                        'Rajmachi', 'Ramdurg', 'Ramgad', 'Ramshej', 'Ranjangiri', 'Rasalgad', 'Ratangad', 'Rohida'
                    ],
                    'S' => [
                        'Sada Fort', 'Sadanandgad', 'Sadashivgad', 'Sajjangad', 'Salher', 'Sankshi', 'Santoshgad', 
                        'Sarasgad', 'Sarjekot(Malvan)', 'Segawa', 'Shirgaon', 'Shivgad', 'Shivneri', 
                        'Siddhagad (Malvan)', 'Sindhudurg', 'Sindola', 'Sinhagad', 'Sondai', 'Songad', 
                        'Songir (Dhule)', 'Sudhagad', 'Sumargad', 'Surgad', 'Sutonda(Naigaon Fort)', 'Suvarnadurg'
                    ],
                    'T' => [
                        'Takmak', 'Talgad', 'Tankai', 'Tarapur Fort', 'Tikona', 'Torna', 'Trimbakgad', 
                        'Tringalwadi', 'Tung', 'Tungi (Karjat)'
                    ],
                    'U' => [
                        'Udgir', 'Underi'
                    ],
                    'V' => [
                        'Vairatgad', 'Vallabhgad(Hargapur)', 'Vardhangad', 'Varugad', 'Vasai', 'Vasantgad', 
                        'Vasota', 'Vetalgad', 'Vetalwadi gad', 'Vijaydurg', 'Vijaygad', 'Vilasgad (Mallikarjun)', 
                        'Visapur', 'Vishalgad'
                    ],
                    'W' => [
                        'Waghera'
                    ],
                    'Y' => [
                        'Yashawantgad (Redi Fort)'
                    ]
                ];

                // Generate fort sections dynamically
                foreach ($fortData as $alphabet => $forts) {
                    echo '<div class="fort-section">';
                    echo '<div class="alphabet-header">';
                    echo '<h3 class="text-2xl font-bold">' . $alphabet . '</h3>';
                    echo '</div>';
                    echo '<div class="fort-grid">';
                    echo '<div class="fort-name-grid">';
                    
                    foreach ($forts as $fort) {
                        echo '<a href="#" class="fort-link" data-fort="' . htmlspecialchars($fort) . '">' . htmlspecialchars($fort) . '</a>';
                    }
                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                
                <!-- Summary Statistics -->
                <div class="text-center mt-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-accent mb-2">
                                    <?php echo count($fortData); ?>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300">Alphabets</p>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary mb-2">
                                    <?php echo array_sum(array_map('count', $fortData)); ?>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300">Total Forts</p>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-secondary mb-2">
                                    <?php echo count(array_filter($fortData, function($forts) { return count($forts) > 0; })); ?>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300">Active Sections</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Symbols Section -->
    <section id="map-symbols" class="py-12 bg-white dark:bg-gray-900" style="display: none;">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                        <i class="fas fa-symbols mr-3 text-accent"></i>
                        Map Symbols
                    </h2>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl">
                        <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Route Markers</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3"></div>
                                <span>Starting Point</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-red-500 rounded-full mr-3"></div>
                                <span>Fort Location</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-blue-500 rounded-full mr-3"></div>
                                <span>Water Source</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl">
                        <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Trail Difficulty</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-6 h-2 bg-green-500 mr-3"></div>
                                <span>Easy Trail</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-2 bg-yellow-500 mr-3"></div>
                                <span>Moderate Trail</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-2 bg-red-500 mr-3"></div>
                                <span>Difficult Trail</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    console.log('Fort Maps page loaded');
    
    // Fort link click handler
    $('.fort-link').click(function(e) {
        e.preventDefault();
        const fortName = $(this).data('fort');
        loadFortMap(fortName);
        
        // Scroll to map view
        $('html, body').animate({
            scrollTop: $('#map-view').offset().top - 100
        }, 800);
    });
    
    // Load more forts functionality
    $('#load-more').click(function() {
        // Simulate loading more forts
        $(this).html('<i class="fas fa-spinner fa-spin mr-2"></i>Loading...');
        
        setTimeout(() => {
            // Add more alphabet sections here
            $(this).html('<i class="fas fa-check mr-2"></i>All Forts Loaded');
            $(this).prop('disabled', true);
        }, 1500);
    });
    
    // Function to load fort map
    function loadFortMap(fortName) {
        console.log('Loading map for:', fortName);
        
        // Show loading indicator
        $('#loading').addClass('show');
        $('#map-content').html('');
        
        // Simulate AJAX call to load map
        setTimeout(() => {
            // Hide loading
            $('#loading').removeClass('show');
            
            // Create map placeholder with fort information
            const mapHTML = `
                <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white">
                    <div class="text-center">
                        <i class="fas fa-fort-awesome text-6xl mb-4"></i>
                        <h3 class="text-3xl font-bold mb-2">${fortName}</h3>
                        <p class="text-xl opacity-80">Interactive Map</p>
                        <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                            <div class="bg-white/20 p-3 rounded">
                                <i class="fas fa-mountain text-yellow-300"></i>
                                <p class="mt-1">Elevation: 1200m</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded">
                                <i class="fas fa-clock text-green-300"></i>
                                <p class="mt-1">Trek Time: 3-4 hrs</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded">
                                <i class="fas fa-star text-orange-300"></i>
                                <p class="mt-1">Difficulty: Moderate</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded">
                                <i class="fas fa-map-marker-alt text-red-300"></i>
                                <p class="mt-1">Location: Maharashtra</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            $('#map-content').html(mapHTML);
            
            // Update fort info
            $('#selected-fort-info').show();
            $('#fort-description').text(`${fortName} is a historic fort in Maharashtra with rich cultural heritage and excellent trekking opportunities.`);
            
            // In a real application, you would make an AJAX call here:
            // $.ajax({
            //     url: `MM_DefaultUserMap.asp?FortName=${fortName}`,
            //     method: 'GET',
            //     success: function(data) {
            //         $('#map-content').html(data);
            //     },
            //     error: function() {
            //         $('#map-content').html('<p class="text-red-500">Error loading map</p>');
            //     }
            // });
            
        }, 1000);
    }
    
    // Map control functions
    window.zoomIn = function() {
        console.log('Zoom in');
        // Implement zoom in functionality
    };
    
    window.zoomOut = function() {
        console.log('Zoom out');
        // Implement zoom out functionality
    };
    
    window.resetView = function() {
        console.log('Reset view');
        // Implement reset view functionality
    };
    
    window.showMapSymbols = function() {
        $('#map-symbols').slideToggle();
    };
    
    // Search functionality
    $('#fort-search').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('.fort-link').each(function() {
            const fortName = $(this).data('fort').toLowerCase();
            if (fortName.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>