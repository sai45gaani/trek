<?php
// Set page specific variables
$page_title = 'Fort Maps - Interactive Historic Fort Explorer | Trekshitz';
$meta_description = 'Explore historic forts of Maharashtra with interactive maps. Discover ancient fortresses, trekking routes, and cultural heritage through detailed cartographic information.';
$meta_keywords = 'forts, maharashtra, maps, trekking, heritage, historical forts, fort maps, sahyadri';

// Include header
require_once './config/database.php';
include './includes/header.php';


$db = new Database();
$conn = $db->getConnection();

/*
|---------------------------------------------------------
| Fetch alphabetical fort list dynamically
|---------------------------------------------------------
*/
$fortsQuery = "
    SELECT DISTINCT f.FortName
    FROM ei_tblfortinfo f
    INNER JOIN mm_tblmapinfo_clean m ON f.FortName = m.FortName
    ORDER BY f.FortName ASC
";
$fortsResult = $conn->query($fortsQuery);

$forts = [];
while ($row = $fortsResult->fetch_assoc()) {
    $forts[] = $row['FortName'];
}

$fortData = [];

// Initialize A–Z keys (optional but recommended for UI consistency)
foreach (range('A', 'Z') as $letter) {
    $fortData[$letter] = [];
}

// Group forts by first letter
foreach ($forts as $fortName) {

    // Trim & sanitize
    $fortName = trim($fortName);

    // Get first character (supports normal ASCII names)
    $firstLetter = strtoupper(substr($fortName, 0, 1));

    // Safety check (only A–Z)
    if (!preg_match('/^[A-Z]$/', $firstLetter)) {
        continue;
    }

    $fortData[$firstLetter][] = $fortName;
}

// OPTIONAL: remove empty alphabets if you want
// $fortData = array_filter($fortData);

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
              <h1 class="text-4xl md:text-6xl font-bold mb-4">🗺️ Fort Map Explorer</h1>
   
               <p class="text-xl opacity-90 max-w-3xl mx-auto">
        Explore Sahyadri forts with interactive route maps, navigation layouts, and geographic insights
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
                   
                    
                   <div id="map-content" class="w-full">
                        <div class="grid grid-cols-12 gap-6">

                            <!-- MAPS SECTION (col-8) -->
                            <div id="map-gallery" class="col-span-12 lg:col-span-8">
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <!-- maps injected here -->
                                </div>
                            </div>

                            <!-- INFO SECTION (col-4) -->
                            <div id="map-info" class="col-span-12 lg:col-span-4 hidden">
                                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 sticky top-24">
                                    <h3 id="info-title" class="text-xl font-bold mb-3 text-gray-800 dark:text-white"></h3>
                                    <p id="info-district" class="text-sm text-green-600 mb-3"></p>

                                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                        <p><strong>Total Maps:</strong> <span id="info-map-count"></span></p>
                                        <p><strong>Region:</strong> Sahyadri, Maharashtra</p>
                                        <p><strong>Category:</strong> Historic Fort</p>
                                    </div>

                                    <hr class="my-4">

                                    <p class="text-xs text-gray-500">
                                        Click on any map to view full resolution.
                                    </p>
                                </div>
                            </div>

                        </div>
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

    $('.fort-link').click(function(e) {
        e.preventDefault();
        const fortName = $(this).data('fort');

        loadFortMap(fortName);

        $('html, body').animate({
            scrollTop: $('#map-view').offset().top - 100
        }, 800);
    });

    function loadFortMap(fortName) {

    $('#loading').addClass('show');

    $.ajax({
        url: './api/get_fort_maps.php',
        type: 'POST',
        data: { fortName },
        dataType: 'json',
        success: function(res) {

            $('#loading').removeClass('show');

            if (res.status !== "200") {
                $('#map-gallery').find('.grid').html(`
                    <p class="text-center text-gray-500 col-span-full">
                        No maps available for this fort
                    </p>
                `);
                return;
            }

            const maps = res.data.maps;

            let mapsHTML = '';
            maps.forEach((map, index) => {
             mapsHTML += `
<div class="group bg-white border rounded-xl overflow-hidden hover:shadow-lg transition">
    <div class="relative">
        <img src="${map.path}"
             class="w-full h-56 object-contain bg-gray-100 cursor-pointer"
             onclick="openFullMap('${map.path}')">

        <span class="absolute top-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
            Map ${index + 1}
        </span>
    </div>

    <div class="p-4">
        <h4 class="font-semibold text-sm text-gray-800">
            ${map.name || 'Fort Map'}
        </h4>
        <p class="text-xs text-gray-500 mt-1">
            ${map.description || ''}
        </p>
    </div>
</div>
`;

            });

            $('#map-gallery').find('.grid').html(mapsHTML);

            $('#map-info').removeClass('hidden');
            $('#info-title').text(res.data.fortName);
            $('#info-district').text(res.data.fortDistrict);
            $('#info-map-count').text(maps.length);
        },
        error: function() {
            $('#loading').removeClass('show');
            $('#map-gallery').find('.grid').html(`
                <p class="text-center text-red-500 col-span-full">
                    Error loading map data
                </p>
            `);
        }
    });
}


    window.openFullMap = function(path) {
        window.open(path, '_blank');
    };

    window.zoomIn = function() {
        console.log('Zoom in (future enhancement)');
    };

    window.zoomOut = function() {
        console.log('Zoom out (future enhancement)');
    };

    window.resetView = function() {
        console.log('Reset view');
    };

    window.showMapSymbols = function() {
        $('#map-symbols').slideToggle();
    };

});
</script>

<script>
$(document).ready(function () {

    // Click fort
    $('.fort-btn').on('click', function () {
        const fortName = $(this).data('fort');
        loadFortMaps(fortName);
    });

    // Search
    $('#fortSearch').on('keyup', function () {
        const val = $(this).val().toLowerCase();
        $('.fort-btn').each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(val));
        });
    });

});

/*
|---------------------------------------------------------
| Load maps using EXISTING API
|---------------------------------------------------------
*/
function loadFortMaps(fortName) {

    $('#mapContainer').html(`
        <div class="text-center">
            <i class="fas fa-spinner fa-spin text-4xl mb-3"></i>
            <p>Loading maps...</p>
        </div>
    `);

    $.ajax({
        url: '../api/get_fort_maps.php',
        method: 'POST',
        data: { fortName },
        dataType: 'json',
        success: function (res) {

            if (res.status !== '200') {
                $('#mapContainer').html('<p>No maps found</p>');
                return;
            }

            const maps = res.data.maps;
            const firstMap = maps[0];

            // Info
            $('#fortTitle').text(res.data.fortName);
            $('#fortDistrict').text(res.data.fortDistrict);
            $('#fortInfo').removeClass('hidden');

            // Buttons
            $('#viewMapsBtn').attr('href', `/maps/?fort=${encodeURIComponent(res.data.fortName)}`);
            $('#viewPhotosBtn').attr('href', `/gallery/?fort=${encodeURIComponent(res.data.fortName)}`);

            // Map preview
            $('#mapContainer').html(`
                <img src="${firstMap.path}"
                     alt="${res.data.fortName}"
                     class="w-full h-full object-contain rounded-xl"
                     onerror="this.src='../assets/images/default-map.svg'">
            `);
        },
        error: function () {
            $('#mapContainer').html('<p>Error loading maps</p>');
        }
    });
}
</script>
