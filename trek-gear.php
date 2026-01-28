<?php
// Set page specific variables
$page_title = 'Trek Gear Guide | TreKshitiZ - Essential Equipment for Safe Trekking';
$meta_description = 'Complete guide to trek gear and equipment. Learn what to pack for one-day treks, multi-day adventures, and monsoon trekking. Essential safety tips and do\'s and don\'ts for fort visits.';
$meta_keywords = 'trek gear, trekking equipment, hiking gear guide, one day trek essentials, monsoon trekking, safety tips, fort visiting guidelines, Maharashtra trekking gear';

// Include header
include './includes/header.php';
?>

<style>
/* Trek Gear page specific styles – TreKshitiZ Brown & Cream Theme */

.gear-card {
    background: #FFFEF7; /* cream-light */
    border: 1px solid #DEB887; /* mountain */
    border-radius: 0.75rem;
    padding: 1.5rem;
    transition: box-shadow 0.25s ease;
}

.dark .gear-card {
    background: #1f2937;
    border-color: #8B4513; /* primary */
}

.gear-card:hover {
    box-shadow: 0 10px 28px rgba(139, 69, 19, 0.18);
}

/* Gear icon */
.gear-icon {
    width: 56px;
    height: 56px;
    background: #8B4513; /* primary */
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFF8DC; /* cream-medium */
    font-size: 22px;
    margin: 0 auto 16px;
}

/* Season badge (subtle, no gradients) */
.season-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    background: #F5F5DC; /* cream-dark */
    color: #8B4513; /* primary */
    margin-left: 6px;
}

/* Gear item blocks (Do / Don't / Forest items) */
.gear-item {
    background: #FAF0E6; /* cream-warm */
    border-left: 4px solid #8B4513; /* primary */
    padding: 12px 16px;
    margin: 8px 0;
    border-radius: 0.375rem;
}

.dark .gear-item {
    background: #111827;
    border-left-color: #D2691E; /* secondary */
}

/* Do & Don't color distinction (still subtle) */
.dos-item {
    border-left-color: #8B4513; /* primary */
}

.donts-item {
    border-left-color: #A0522D; /* earth */
}

/* Checklist items */
.checklist-item {
    display: flex;
    align-items: center;
    padding: 6px 0;
    border-bottom: 1px solid #F5F5DC; /* cream-dark */
}

.dark .checklist-item {
    border-color: #374151;
}

/* Checklist icon */
.checklist-icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #D2691E; /* secondary */
    color: #FFFEF7;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-size: 12px;
}

/* Remove hover gimmicks – heritage friendly */
.gear-card:hover,
.gear-item:hover,
.checklist-item:hover {
    transform: none;
}

/* Print friendly */
@media print {
    .gear-card {
        box-shadow: none !important;
        border: 1px solid #A0522D !important;
        background: #ffffff !important;
    }

    h1, h2, h3 {
        color: #000 !important;
    }
}
</style>


<main id="main-content">   
    <!-- Hero Section -->
   <section class="py-20 bg-gradient-to-r from-primary to-secondary text-white text-center">
     <div class="container mx-auto max-w-6xl text-center">
            <div class="mb-8">
                 <h1 class="text-4xl font-bold dark:text-white mb-4">
      Trek Gear & Planning Guide
    </h1>
    <p class="max-w-3xl mx-auto">
      Practical trekking gear checklist, seasonal guidance, and fort etiquette
      followed by TreKshitiZ trekkers across Maharashtra.
    </p>
               
            </div>
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mb-12">
                <div class="text-center opacity-90">
                    <div class="text-4xl font-bold ">30+</div>
                    <div class="">Essential Items</div>
                </div>
                <div class="text-center opacity-90">
                    <div class="text-4xl font-bold ">3</div>
                    <div class="">Trek Categories</div>
                </div>
                <div class="text-center opacity-90">
                    <div class="text-4xl font-bold ">10+</div>
                    <div class="">Safety Guidelines</div>
                </div>
            </div>
        </div>
    </section>

    <!-- When to Go Section -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary dark:text-white mb-4">
                    <i class="fas fa-calendar-alt text-primary-600 mr-3"></i>
                    When to Go Trekking
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Summer Season -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="gear-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">
                        Summer Season
                        <span class="season-badge season-summer">March - May</span>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Best season for vacation outings, ideal for places without water shortage problems. 
                        Perfect for getting panoramic views of surrounding regions due to clear weather conditions.
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Clear visibility
                        </div>
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Vacation friendly
                        </div>
                        <div class="flex items-center text-sm text-orange-600">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Check water availability
                        </div>
                    </div>
                </div>

                <!-- Monsoon Season -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="gear-icon">
                        <i class="fas fa-cloud-rain"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">
                        Monsoon Season
                        <span class="season-badge season-monsoon">June - September</span>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Experience enchanting Mother Nature with lush green forests and mountain beauty. 
                        Pleasant atmosphere with no scorching heat, perfect for nature enthusiasts.
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Lush greenery
                        </div>
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Pleasant weather
                        </div>
                        <div class="flex items-center text-sm text-blue-600">
                            <i class="fas fa-info-circle mr-2"></i>
                            Extra gear needed
                        </div>
                    </div>
                </div>

                <!-- Winter Season -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="gear-icon">
                        <i class="fas fa-snowflake"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 text-center">
                        Winter Season
                        <span class="season-badge season-winter">October - February</span>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                        Best of all seasons with no scorching heat and clear visibility. 
                        No water problems and ideal for cross-country treks. October to January is perfect.
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Perfect weather
                        </div>
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Clear visibility
                        </div>
                        <div class="flex items-center text-sm text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            No water issues
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gear Lists Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-backpack text-green-600 mr-3"></i>
                    Essential Gear Lists
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- One Day Trek -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="gear-icon">
                        <i class="fas fa-hiking"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                        One Day Trek Essentials
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="checklist-item">
                            <div class="checklist-icon">1</div>
                            <span class="text-gray-700 dark:text-gray-300">Water bottle (minimum 2 liters)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">2</div>
                            <span class="text-gray-700 dark:text-gray-300">Cap or hat for sun protection</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">3</div>
                            <span class="text-gray-700 dark:text-gray-300">Hunter shoes (Sports shoes for monsoon)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">4</div>
                            <span class="text-gray-700 dark:text-gray-300">Dry food (biscuits, avoid oily items)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">5</div>
                            <span class="text-gray-700 dark:text-gray-300">Extra clothes (1-2 pairs)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">6</div>
                            <span class="text-gray-700 dark:text-gray-300">Cutting knife</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">7</div>
                            <span class="text-gray-700 dark:text-gray-300">Torch (preferably Commander torch)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">8</div>
                            <span class="text-gray-700 dark:text-gray-300">Pen and notebook</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">9</div>
                            <span class="text-gray-700 dark:text-gray-300">Safety matches</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">10</div>
                            <span class="text-gray-700 dark:text-gray-300">First aid kit</span>
                        </div>
                    </div>
                </div>

                <!-- Multi Day Trek -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="gear-icon">
                        <i class="fas fa-campground"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                        Multi-Day Trek Gear
                    </h3>
                    
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">
                        Additional items besides one-day trek essentials:
                    </p>
                    
                    <div class="space-y-3">
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Toothbrush and paste</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Candles and matchsticks</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Stove or Clix</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Kerosene fuel</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Bedding (sleeping mat, sleeping bag)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Plate, spoon, glass</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Raw foodstuffs (rice, maggi, etc.)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Small bucket</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Trekking rope (about 50m)</span>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-icon">+</div>
                            <span class="text-gray-700 dark:text-gray-300">Newspapers</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monsoon Special Gear -->
            <div class="mt-8">
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-6">
                        <div class="gear-icon mx-auto">
                            <i class="fas fa-umbrella"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Special Monsoon Gear
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            Additional items for monsoon trekking season
                        </p>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <div class="checklist-item">
                                <div class="checklist-icon" style="background: #4834d4;">☂</div>
                                <span class="text-gray-700 dark:text-gray-300">Raincoat or windcheater</span>
                            </div>
                            <div class="checklist-item">
                                <div class="checklist-icon" style="background: #4834d4;">📱</div>
                                <span class="text-gray-700 dark:text-gray-300">Umbrella for camera protection</span>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="checklist-item">
                                <div class="checklist-icon" style="background: #4834d4;">🗄</div>
                                <span class="text-gray-700 dark:text-gray-300">Plastic bags in larger numbers</span>
                            </div>
                            <div class="checklist-item">
                                <div class="checklist-icon" style="background: #4834d4;">🧭</div>
                                <span class="text-gray-700 dark:text-gray-300">Magnetic compass</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border-l-4 border-blue-500">
                        <p class="text-blue-800 dark:text-blue-200 text-sm">
                            <i class="fas fa-info-circle mr-2"></i>
                            <strong>Important:</strong> Pack all belongings in plastic bags to protect from getting wet during monsoon.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Do's and Don'ts Section -->
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-fort-awesome text-green-600 mr-3"></i>
                    Fort Visiting Guidelines
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
                <p class="text-lg text-gray-600 dark:text-gray-300 mt-4 max-w-3xl mx-auto">
                    Forts are not just old constructions, but they retain the memories of our ancestors and 
                    the glorious history of Chhatrapati Shivaji Maharaj. Let's preserve them for future generations.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Do's -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-6">
                        <div class="gear-icon mx-auto" style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-green-600 dark:text-green-400">
                            DO's - Best Practices
                        </h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-camera text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Photograph important monuments like entrances, bastions, carvings and sculptures
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-leaf text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Focus on nature photography along with group photos
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-scroll text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Copy or note down historical inscriptions on carvings
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-broom text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Keep the surroundings clean and dispose waste properly
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-shield-alt text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Take precautions against snakes, rodents and wild animals
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item dos-item">
                            <div class="flex items-start">
                                <i class="fas fa-map-marked text-green-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Leave permanent marks where you might get lost
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Don'ts -->
                <div class="gear-card rounded-2xl p-6 shadow-xl">
                    <div class="text-center mb-6">
                        <div class="gear-icon mx-auto" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                            <i class="fas fa-thumbs-down"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-red-600 dark:text-red-400">
                            DON'Ts - Avoid These
                        </h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="gear-item donts-item">
                            <div class="flex items-start">
                                <i class="fas fa-volume-up text-red-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Do not disturb quiet surroundings with music systems or noise pollution
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item donts-item">
                            <div class="flex items-start">
                                <i class="fas fa-trash text-red-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Do not spread plastic garbage. Pick up and dispose in the city
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item donts-item">
                            <div class="flex items-start">
                                <i class="fas fa-smoking-ban text-red-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    No smoking and drinking. Do not smash bottles as someone might get injured
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Forest Precautions Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-tree text-green-600 mr-3"></i>
                    Forest Safety Precautions
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="gear-card rounded-2xl p-8 shadow-xl">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-cut text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Carry hunting knife or axe for emergency situations
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-tshirt text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Wear camouflaged clothing. Avoid gaudy colors that may distract animals
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-oil-can text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Carry engine oil to keep away reptiles and help light fire
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-fire text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Do not light fire unnecessarily to avoid forest fires
                                </span>
                            </div>
                        </div>
                        
                        <div class="gear-item">
                            <div class="flex items-start">
                                <i class="fas fa-bug text-orange-600 mr-3 mt-1"></i>
                                <span class="text-gray-700 dark:text-gray-300">
                                    Wear full pants and shirts to prevent insect bites
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Engine Oil Uses -->
                <div class="mt-6 p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg border-l-4 border-orange-500">
                    <h4 class="font-semibold text-orange-800 dark:text-orange-200 mb-2">
                        <i class="fas fa-info-circle mr-2"></i>Engine Oil Uses:
                    </h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex items-center text-orange-700 dark:text-orange-300">
                            <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                            To keep away reptiles and dangerous insects
                        </div>
                        <div class="flex items-center text-orange-700 dark:text-orange-300">
                            <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                            To help light fire in emergency situations
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel Information Section -->
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto max-w-4xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-bus text-green-600 mr-3"></i>
                    Travel Information
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="gear-card rounded-2xl p-8 shadow-xl text-center">
                <div class="gear-icon mx-auto mb-6">
                    <i class="fas fa-route"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                    Best Transportation Options
                </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    While traveling by private vehicle is convenient, it can be costly to hire. 
                    For minimum cost travel, <strong>S.T. Buses</strong> are the best option with their 
                    extensive network in Maharashtra, reaching almost every nook and corner of the state.
                </p>
                
                <div class="grid md:grid-cols-2 gap-6 mt-8">
                    <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <i class="fas fa-bus text-green-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-green-800 dark:text-green-200">S.T. Buses</h4>
                        <p class="text-sm text-green-700 dark:text-green-300">Cost-effective, extensive network</p>
                    </div>
                    <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                        <i class="fas fa-car text-blue-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-blue-800 dark:text-blue-200">Private Vehicle</h4>
                        <p class="text-sm text-blue-700 dark:text-blue-300">Convenient but costly option</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Tips Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-lightbulb text-green-600 mr-3"></i>
                    Quick Tips for New Trekkers
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                    <div class="gear-icon mx-auto mb-4">
                        <i class="fas fa-backpack"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2">Right Backpack</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Choose an appropriate trekking sack that can carry maximum luggage without straining your back
                    </p>
                </div>

                <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                    <div class="gear-icon mx-auto mb-4">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2">Stay Hydrated</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Always carry sufficient water and drink regularly, even if you don't feel thirsty
                    </p>
                </div>

                <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                    <div class="gear-icon mx-auto mb-4">
                        <i class="fas fa-shoe-prints"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2">Proper Footwear</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Wear appropriate shoes - hunter shoes for dry weather, sports shoes for monsoon
                    </p>
                </div>

                <div class="gear-card rounded-2xl p-6 shadow-xl text-center">
                    <div class="gear-icon mx-auto mb-4">
                        <i class="fas fa-first-aid"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2">Safety First</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        Always carry a first aid kit and inform someone about your trekking plans
                    </p>
                </div>
            </div>
        </div>
    </section>

  <!-- Call to Action Section -->
<section class="py-16 px-4 bg-primary text-cream-light">
    <div class="container mx-auto max-w-4xl text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Ready for Your Next Adventure?
        </h2>

        <p class="text-lg md:text-xl mb-6 text-cream-medium">
            Now that you know what to pack, join us on our upcoming treks and experience the beauty of the Sahyadri mountains.
        </p>

      

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#treks"
               class="bg-cream-light text-primary px-8 py-3 rounded-full font-semibold
                      hover:bg-cream-medium transition-colors duration-200 shadow-md">
                <i class="fas fa-calendar-check mr-2"></i>
                View Trek Schedule
            </a>

            <a href="#contact"
               class="border border-cream-light text-cream-light px-8 py-3 rounded-full font-semibold
                      hover:bg-cream-light hover:text-primary transition-colors duration-200">
                <i class="fas fa-phone mr-2"></i>
                Contact Us
            </a>
        </div>
    </div>
</section>

</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Trek Gear page loaded');
    
    // Gear card hover effects
    const gearCards = document.querySelectorAll('.gear-card');
    
    gearCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Checklist item interactive effects
    const checklistItems = document.querySelectorAll('.checklist-item');
    
    checklistItems.forEach(item => {
        item.addEventListener('click', function() {
            const icon = this.querySelector('.checklist-icon');
            if (icon) {
                icon.style.background = '#10b981';
                icon.innerHTML = '✓';
                setTimeout(() => {
                    icon.style.background = '#7fb069';
                    const originalText = icon.getAttribute('data-original') || icon.textContent;
                    if (!icon.getAttribute('data-original')) {
                        icon.setAttribute('data-original', icon.textContent);
                    }
                    icon.innerHTML = originalText;
                }, 2000);
            }
        });
    });
    
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
                }
            } catch (error) {
                console.warn('Invalid selector:', targetId);
                e.preventDefault();
            }
        });
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all gear cards
    gearCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.animationDelay = `${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Add CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes checkComplete {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
        
        .gear-item:hover {
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            0% { transform: translateX(0); }
            50% { transform: translateX(8px); }
            100% { transform: translateX(8px); }
        }
    `;
    document.head.appendChild(style);
    

    
    // Gear list completion tracker
    let completedItems = 0;
    const totalItems = checklistItems.length;
    

    
    // Update progress when items are clicked
    checklistItems.forEach(item => {
        item.addEventListener('click', function() {
            if (!this.classList.contains('completed')) {
                this.classList.add('completed');
                completedItems++;
                updateProgress();
            }
        });
    });
    
    function updateProgress() {
        const percentage = (completedItems / totalItems) * 100;
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        
        if (progressBar) progressBar.style.width = `${percentage}%`;
        if (progressText) progressText.textContent = `${completedItems}/${totalItems} items`;
        
        if (completedItems === totalItems) {
            progressDiv.classList.add('animate-pulse');
            setTimeout(() => {
                progressDiv.classList.remove('animate-pulse');
            }, 3000);
        }
    }
    
    console.log('Trek Gear page: All functionality initialized');
});

// Export functions for debugging
window.trekGearDebug = {
    completeAllItems: function() {
        document.querySelectorAll('.checklist-item').forEach(item => {
            item.click();
        });
    },
    resetProgress: function() {
        document.querySelectorAll('.checklist-item').forEach(item => {
            item.classList.remove('completed');
        });
        completedItems = 0;
        updateProgress();
    },
    printGearList: function() {
        window.print();
    }
};
</script>

<!-- Additional CSS for enhanced animations and print styles -->
<style>
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

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

/* Print styles */
@media print {
    .fixed, nav, footer, button {
        display: none !important;
    }
    
    .gear-card {
        break-inside: avoid;
        box-shadow: none !important;
        border: 1px solid #ccc !important;
    }
    
    .checklist-item {
        font-size: 12px;
        margin: 2px 0;
    }
    
    h1, h2, h3 {
        color: #000 !important;
    }
    
    .gear-icon {
        background: #7fb069 !important;
        -webkit-print-color-adjust: exact;
    }
}

/* Enhanced hover effects */
.gear-card:hover .gear-icon {
    animation: iconFloat 2s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% {
        transform: translateY(0) rotateY(0deg);
    }
    50% {
        transform: translateY(-5px) rotateY(180deg);
    }
}

/* Responsive improvements */
@media (max-width: 640px) {
    .gear-card {
        padding: 1rem;
    }
    
    .gear-icon {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }
    
    .checklist-item {
        padding: 6px 0;
    }
    
    .fixed.bottom-6.right-6 {
        bottom: 2rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
    
    .fixed.top-24.right-6 {
        top: 6rem;
        right: 1rem;
        padding: 0.75rem;
    }
}

/* Dark mode improvements */
.dark .season-badge {
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.dark .gear-item {
    border-left-color: #7fb069;
}

.dark .checklist-icon {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

/* Accessibility improvements */
.gear-card:focus-within {
    outline: 2px solid #7fb069;
    outline-offset: 2px;
}

.checklist-item:focus {
    outline: 1px solid #7fb069;
    outline-offset: 2px;
}

/* Loading animation for gear cards */
.gear-card.loading {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}
</style>