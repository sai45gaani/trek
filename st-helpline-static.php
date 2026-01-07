<?php
// Set page specific variables
$page_title = 'ST Bus Helpline Numbers | TreKshitiZ - Maharashtra State Transport Contact Information';
$meta_description = 'Complete list of Maharashtra State Transport (ST Bus) helpline numbers and depot contacts. Find bus stand information, regional helplines, and contact details for all major cities and towns.';
$meta_keywords = 'ST bus helpline, Maharashtra State Transport, bus depot numbers, bus stand contact, ST bus information, Maharashtra bus helpline, travel information';

// Include header
include './includes/header.php';
?>

<style>
/* ST Helpline page specific styles */
.helpline-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8));
    backdrop-filter: blur(10px);
    border: 1px solid rgba(127, 176, 105, 0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.dark .helpline-card {
    background: linear-gradient(135deg, rgba(31, 41, 55, 0.9), rgba(31, 41, 55, 0.8));
    border-color: rgba(127, 176, 105, 0.3);
}

.helpline-card:hover {
    transform: translateY(-5px) scale(1.01);
    box-shadow: 0 15px 30px rgba(45, 80, 22, 0.15);
    border-color: var(--accent-color);
}

.helpline-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(127, 176, 105, 0.1), transparent);
    transition: left 0.6s;
}

.helpline-card:hover::before {
    left: 100%;
}

.region-header {
    background: linear-gradient(135deg, #7fb069, #4a7c23);
    color: white;
    padding: 12px 16px;
    border-radius: 8px 8px 0 0;
    font-weight: bold;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.region-header::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

.helpline-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 0 0 8px 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.dark .helpline-table {
    background: var(--surface-dark);
}

.helpline-table th {
    background: linear-gradient(135deg, #e8f5e8, #d4f1d4);
    color: #2d5016;
    padding: 12px 8px;
    font-weight: bold;
    border-bottom: 2px solid #7fb069;
    text-align: center;
    font-size: 14px;
}

.dark .helpline-table th {
    background: linear-gradient(135deg, #374151, #4b5563);
    color: #7fb069;
}

.helpline-table td {
    padding: 10px 8px;
    border-bottom: 1px solid #e5e7eb;
    text-align: center;
    transition: all 0.3s ease;
}

.dark .helpline-table td {
    border-bottom-color: var(--dark-border);
    color: var(--text-dark);
}

.helpline-table tr:hover td {
    background: rgba(127, 176, 105, 0.1);
    transform: scale(1.02);
}

.dark .helpline-table tr:hover td {
    background: rgba(127, 176, 105, 0.2);
}

.helpline-table .depot-name {
    text-align: left;
    font-weight: 500;
    color: #2d5016;
}

.dark .helpline-table .depot-name {
    color: #7fb069;
}

.phone-number {
    font-family: 'Courier New', monospace;
    font-weight: bold;
    color: #1f2937;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dark .phone-number {
    color: #e5e7eb;
}

.phone-number:hover {
    color: #7fb069;
    text-decoration: underline;
}

.search-box {
    background: white;
    border: 2px solid #e5e7eb;
    border-radius: 25px;
    padding: 12px 20px;
    font-size: 16px;
    transition: all 0.3s ease;
    width: 100%;
    max-width: 400px;
}

.dark .search-box {
    background: var(--surface-dark);
    border-color: var(--dark-border);
    color: var(--text-dark);
}

.search-box:focus {
    outline: none;
    border-color: #7fb069;
    box-shadow: 0 0 0 3px rgba(127, 176, 105, 0.1);
}

.tab-button {
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
    margin: 0 4px;
}

.tab-button.active {
    background: linear-gradient(135deg, #7fb069, #4a7c23);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(127, 176, 105, 0.3);
}

.dark .tab-button {
    background: linear-gradient(135deg, #374151, #4b5563);
    color: var(--text-dark);
}

.dark .tab-button.active {
    background: linear-gradient(135deg, #7fb069, #4a7c23);
    color: white;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #7fb069, #4a7c23);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    margin: 0 auto 16px;
    transition: all 0.3s ease;
}

.helpline-card:hover .contact-icon {
    transform: rotateY(180deg) scale(1.1);
    background: linear-gradient(135deg, #4a7c23, #7fb069);
}

.emergency-highlight {
    background: linear-gradient(135deg, #fef3c7, #fbbf24);
    border: 2px solid #f59e0b;
    color: #92400e;
}

.dark .emergency-highlight {
    background: linear-gradient(135deg, #451a03, #92400e);
    border-color: #f59e0b;
    color: #fbbf24;
}

.region-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.stat-item {
    text-align: center;
    background: linear-gradient(135deg, rgba(127, 176, 105, 0.1), rgba(74, 124, 35, 0.1));
    padding: 16px;
    border-radius: 12px;
    border: 1px solid rgba(127, 176, 105, 0.3);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(127, 176, 105, 0.2);
}

.stat-number {
    font-size: 24px;
    font-weight: bold;
    color: #2d5016;
}

.dark .stat-number {
    color: #7fb069;
}

.stat-label {
    font-size: 12px;
    color: #6b7280;
    margin-top: 4px;
}

.dark .stat-label {
    color: #9ca3af;
}
</style>

<main class="min-h-screen pt-20 bg-gradient-to-br from-green-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    
    <!-- Hero Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl text-center">
            <div class="mb-8">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 dark:text-white mb-6">
                    ST Bus <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Helpline</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Complete contact information for Maharashtra State Transport services. Find bus depot numbers, 
                    regional helplines, and contact details for all major cities and towns across Maharashtra.
                </p>
                <p class="text-lg text-gray-500 dark:text-gray-400 mt-4 font-devanagari">
                    महाराष्ट्र राज्य परिवहन संपर्क माहिती
                </p>
            </div>
            
            <!-- Search Box -->
            <div class="mb-8">
                <input type="text" id="searchBox" class="search-box" placeholder="Search by city, depot, or phone number...">
            </div>
            
            <!-- Quick Stats -->
            <div class="region-stats max-w-4xl mx-auto">
                <div class="stat-item">
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Bus Depots</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Regions</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Service</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Helplines</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tab Navigation -->
    <section class="py-8 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="flex justify-center flex-wrap gap-2 mb-8">
                <button class="tab-button active" data-tab="main-helpline">
                    <i class="fas fa-phone mr-2"></i>Main Helplines
                </button>
                <button class="tab-button" data-tab="regional-depots">
                    <i class="fas fa-map-marked-alt mr-2"></i>Regional Depots
                </button>
            </div>
        </div>
    </section>

    <!-- Main Helpline Numbers Section -->
    <section id="main-helpline" class="tab-content py-8 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-phone-volume text-green-600 mr-3"></i>
                    Main ST Bus Helplines
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="helpline-card rounded-2xl overflow-hidden shadow-xl mb-8">
                <div class="region-header">
                    <i class="fas fa-headset mr-2"></i>
                    Maharashtra State Transport - Bus Stand Helpline Numbers
                </div>
                <table class="helpline-table">
                    <thead>
                        <tr>
                            <th style="width: 10%">Sr.No</th>
                            <th style="width: 50%">Name Of Bus Stand</th>
                            <th style="width: 40%">Phone No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="depot-name">Parel</td>
                            <td><span class="phone-number" onclick="callNumber('24229905')">24229905</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="depot-name">Mumbai Central</td>
                            <td><span class="phone-number" onclick="callNumber('23076622')">23076622 / 3074272</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="depot-name">Thane</td>
                            <td><span class="phone-number" onclick="callNumber('25332361')">25332361</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="depot-name">Panvel Stand1</td>
                            <td><span class="phone-number" onclick="callNumber('27452301')">27452301</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td class="depot-name">Vashi</td>
                            <td><span class="phone-number" onclick="callNumber('27662833')">27662833</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td class="depot-name">Vasai</td>
                            <td><span class="phone-number" onclick="callNumber('95250322307')">95250-322307</span></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td class="depot-name">Dahanu</td>
                            <td><span class="phone-number" onclick="callNumber('952528222590')">952528-222590</span></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td class="depot-name">Shahapur</td>
                            <td><span class="phone-number" onclick="callNumber('952527252028')">952527-252028</span></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td class="depot-name">IgatPuri</td>
                            <td><span class="phone-number" onclick="callNumber('952553244005')">952553-244005</span></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td class="depot-name">Nashik (C.B.S)</td>
                            <td><span class="phone-number" onclick="callNumber('952532309310')">95253-2309310</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="depot-name">Nashik Highway Bus Stand</td>
                            <td><span class="phone-number" onclick="callNumber('952532573755')">95253-2573755</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="depot-name">Nashik road bus stand</td>
                            <td><span class="phone-number" onclick="callNumber('952532565304')">95253-2565304</span></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td class="depot-name">Satana</td>
                            <td><span class="phone-number" onclick="callNumber('02555223004')">02555-223004</span></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td class="depot-name">Manmad</td>
                            <td><span class="phone-number" onclick="callNumber('02591222239')">02591-222239</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="depot-name"></td>
                            <td><span class="phone-number" onclick="callNumber('222358')">222358(Depo)</span></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td class="depot-name">Mahad</td>
                            <td><span class="phone-number" onclick="callNumber('952145222139')">952145-222139</span></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td class="depot-name">Alibag</td>
                            <td><span class="phone-number" onclick="callNumber('952141222079')">952141-222079</span></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td class="depot-name">Khed</td>
                            <td><span class="phone-number" onclick="callNumber('02635263543')">02635-263543</span></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td class="depot-name">PoladPur</td>
                            <td><span class="phone-number" onclick="callNumber('952191240036')">95-2191-240036</span></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td class="depot-name">Chiplun</td>
                            <td><span class="phone-number" onclick="callNumber('02355252167')">02355-252167</span></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td class="depot-name">Kolhapur</td>
                            <td><span class="phone-number" onclick="callNumber('02312650620')">0231-2650620</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="depot-name"></td>
                            <td><span class="phone-number" onclick="callNumber('2666551')">2666551</span></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td class="depot-name">Junnar</td>
                            <td><span class="phone-number" onclick="callNumber('952132222048')">952132-222048</span></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td class="depot-name">Kalyan</td>
                            <td><span class="phone-number" onclick="callNumber('315129')">315129</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="depot-name"></td>
                            <td><span class="phone-number" onclick="callNumber('314459')">314459</span></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td class="depot-name">Dombivli</td>
                            <td><span class="phone-number" onclick="callNumber('2455311')">2455311</span></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td class="depot-name">Saaswad</td>
                            <td><span class="phone-number" onclick="callNumber('222335')">222335</span></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td class="depot-name">Maharashtra Vahtuk Bhava</td>
                            <td><span class="phone-number" onclick="callNumber('3071524')">3071524</span></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td class="depot-name">Borivali (Nancu Colony)</td>
                            <td><span class="phone-number" onclick="callNumber('8902348')">8902348</span></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td class="depot-name">Borivali(Sakurwadi)</td>
                            <td><span class="phone-number" onclick="callNumber('8058226')">8058226</span></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td class="depot-name">Dadar Asiad Mum -Pune</td>
                            <td><span class="phone-number" onclick="callNumber('4136835')">4136835</span></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td class="depot-name">Kurla Neharu nagar</td>
                            <td><span class="phone-number" onclick="callNumber('5222072')">5222072</span></td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td class="depot-name">Mumbai shirdi (s.Bapat Marg)</td>
                            <td><span class="phone-number" onclick="callNumber('4302667')">4302667</span></td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td class="depot-name">Sion Stand</td>
                            <td><span class="phone-number" onclick="callNumber('4074157')">4074157</span></td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td class="depot-name">Panvel Stand2</td>
                            <td><span class="phone-number" onclick="callNumber('7451397')">7451397</span></td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td class="depot-name">Uran Stand</td>
                            <td><span class="phone-number" onclick="callNumber('7222333')">7222333</span></td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td class="depot-name">Vashi Stand</td>
                            <td><span class="phone-number" onclick="callNumber('7662833')">7662833</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Link to Regional Helpline -->
            <div class="text-center">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
                    For more detailed region-wise depot information:
                </p>
                <button class="tab-button" data-tab="regional-depots" onclick="switchTab('regional-depots')">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    View Regional Depot Numbers
                </button>
            </div>
        </div>
    </section>

    <!-- Regional Depot Numbers Section -->
    <section id="regional-depots" class="tab-content py-8 px-4 hidden">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    <i class="fas fa-map-marked-alt text-green-600 mr-3"></i>
                    Regional Depot Helplines
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <!-- Region Filter Buttons -->
            <div class="flex justify-center flex-wrap gap-2 mb-8">
                <button class="region-filter-btn active" data-region="all">All Regions</button>
                <button class="region-filter-btn" data-region="thane">Thane</button>
                <button class="region-filter-btn" data-region="raigad">Raigad</button>
                <button class="region-filter-btn" data-region="ratnagiri">Ratnagiri</button>
                <button class="region-filter-btn" data-region="sindhudurg">Sindhudurg</button>
                <button class="region-filter-btn" data-region="pune">Pune</button>
                <button class="region-filter-btn" data-region="satara">Satara</button>
                <button class="region-filter-btn" data-region="sangli">Sangli</button>
                <button class="region-filter-btn" data-region="kolhapur">Kolhapur</button>
                <button class="region-filter-btn" data-region="solapur">Solapur</button>
            </div>

            <!-- Thane Vibhag -->
            <div class="helpline-card rounded-2xl overflow-hidden shadow-xl mb-8 region-section" data-region="thane">
                <div class="region-header">
                    <i class="fas fa-building mr-2"></i>
                    Thane Vibhag (ठाणे विभाग)
                </div>
                <table class="helpline-table">
                    <thead>
                        <tr>
                            <th style="width: 8%">Sr.No</th>
                            <th style="width: 35%">Name Of Depot/Stand</th>
                            <th style="width: 15%">STD Code</th>
                            <th style="width: 21%">Depot</th>
                            <th style="width: 21%">Stand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="depot-name">Thane 1</td>
                            <td>9522</td>
                            <td><span class="phone-number" onclick="callNumber('25344163')">25344163</span></td>
                            <td><span class="phone-number" onclick="callNumber('25332361')">25332361</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="depot-name">Thane Vandana</td>
                            <td>9522</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('25332504')">25332504</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="depot-name">Bhyadner</td>
                            <td>9522</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('28192357')">28192357</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="depot-name">Bhivandi</td>
                            <td>95251</td>
                            <td><span class="phone-number" onclick="callNumber('252791')">252791</span></td>
                            <td><span class="phone-number" onclick="callNumber('254429')">254429</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td class="depot-name">Vitthalvadi</td>
                            <td>95251</td>
                            <td><span class="phone-number" onclick="callNumber('2338724')">2338724</span></td>
                            <td><span class="phone-number" onclick="callNumber('2338770')">2338770</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td class="depot-name">Badlapur</td>
                            <td>95251</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('2591532')">2591532</span></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td class="depot-name">Kalyan</td>
                            <td>95251</td>
                            <td><span class="phone-number" onclick="callNumber('2314459')">2314459</span></td>
                            <td><span class="phone-number" onclick="callNumber('2315129')">2315129</span></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td class="depot-name">Dombivli</td>
                            <td>95251</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('2455311')">2455311</span></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td class="depot-name">Shahapur</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('272028')">272028</span></td>
                            <td><span class="phone-number" onclick="callNumber('272070')">272070</span></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td class="depot-name">Murbad</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('222260')">222260</span></td>
                            <td><span class="phone-number" onclick="callNumber('222222')">222222</span></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td class="depot-name">Vada</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('271083')">271083</span></td>
                            <td><span class="phone-number" onclick="callNumber('271428')">271428</span></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td class="depot-name">Vasai</td>
                            <td>250</td>
                            <td><span class="phone-number" onclick="callNumber('2324003')">2324003</span></td>
                            <td><span class="phone-number" onclick="callNumber('2322307')">2322307</span></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td class="depot-name">Navghar</td>
                            <td>250</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('2322307')">2322307</span></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td class="depot-name">Ganeshpuri</td>
                            <td>250</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('2322306')">2322306</span></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td class="depot-name">Vajreshwari</td>
                            <td>250</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('261537')">261537</span></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td class="depot-name">Nalasopara</td>
                            <td>250</td>
                            <td><span class="phone-number" onclick="callNumber('2403191')">2403191</span></td>
                            <td><span class="phone-number" onclick="callNumber('2403190')">2403190</span></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td class="depot-name">Arnala</td>
                            <td>250</td>
                            <td><span class="phone-number" onclick="callNumber('2587226')">2587226</span></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td class="depot-name">Arnala / Virar</td>
                            <td>250</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('2502433')">2502433</span></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td class="depot-name">Saphala</td>
                            <td>2525</td>
                            <td><span class="phone-number" onclick="callNumber('230171')">230171</span></td>
                            <td><span class="phone-number" onclick="callNumber('230133')">230133</span></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td class="depot-name">Palghar</td>
                            <td>2525</td>
                            <td><span class="phone-number" onclick="callNumber('252027')">252027</span></td>
                            <td><span class="phone-number" onclick="callNumber('252139')">252139</span></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td class="depot-name">Boisar</td>
                            <td>2525</td>
                            <td><span class="phone-number" onclick="callNumber('271249')">271249</span></td>
                            <td><span class="phone-number" onclick="callNumber('272440')">272440</span></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td class="depot-name">Dahanu</td>
                            <td>2528</td>
                            <td><span class="phone-number" onclick="callNumber('222298')">222298</span></td>
                            <td><span class="phone-number" onclick="callNumber('222590')">222590</span></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td class="depot-name">Javhar</td>
                            <td>2520</td>
                            <td><span class="phone-number" onclick="callNumber('222528')">222528</span></td>
                            <td><span class="phone-number" onclick="callNumber('222501')">222501</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pune Vibhag -->
            <div class="helpline-card rounded-2xl overflow-hidden shadow-xl mb-8 region-section" data-region="pune">
                <div class="region-header">
                    <i class="fas fa-university mr-2"></i>
                    Pune Vibhag (पुणे विभाग)
                </div>
                <table class="helpline-table">
                    <thead>
                        <tr>
                            <th style="width: 8%">Sr.No</th>
                            <th style="width: 35%">Name Of Depot/Stand</th>
                            <th style="width: 15%">STD Code</th>
                            <th style="width: 21%">Depot</th>
                            <th style="width: 21%">Stand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="depot-name">Pune Swargate</td>
                            <td>20</td>
                            <td><span class="phone-number" onclick="callNumber('24442968')">24442968</span></td>
                            <td><span class="phone-number" onclick="callNumber('24441591')">24441591</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="depot-name">Pune Swargate (Mumbai)</td>
                            <td>20</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('24449980')">24449980</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="depot-name">Pune Station</td>
                            <td>20</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('26126218')">26126218</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="depot-name">Pinprai - Chinchvad</td>
                            <td>20</td>
                            <td><span class="phone-number" onclick="callNumber('27420007')">27420007</span></td>
                            <td><span class="phone-number" onclick="callNumber('27420300')">27420300</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td class="depot-name">Shivajinagar</td>
                            <td>20</td>
                            <td><span class="phone-number" onclick="callNumber('25536641')">25536641</span></td>
                            <td><span class="phone-number" onclick="callNumber('25369170')">25369170</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td class="depot-name">Shirur</td>
                            <td>2138</td>
                            <td><span class="phone-number" onclick="callNumber('22135')">22135</span></td>
                            <td><span class="phone-number" onclick="callNumber('22305')">22305</span></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td class="depot-name">Rajgurunagar</td>
                            <td>2135</td>
                            <td><span class="phone-number" onclick="callNumber('22044')">22044</span></td>
                            <td><span class="phone-number" onclick="callNumber('22035')">22035</span></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td class="depot-name">Baramati</td>
                            <td>2112</td>
                            <td><span class="phone-number" onclick="callNumber('22306')">22306</span></td>
                            <td><span class="phone-number" onclick="callNumber('22236')">22236</span></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td class="depot-name">Talegaon</td>
                            <td>2114</td>
                            <td><span class="phone-number" onclick="callNumber('22435')">22435</span></td>
                            <td><span class="phone-number" onclick="callNumber('22345')">22345</span></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td class="depot-name">Bhor</td>
                            <td>2113</td>
                            <td><span class="phone-number" onclick="callNumber('22607')">22607</span></td>
                            <td><span class="phone-number" onclick="callNumber('22535')">22535</span></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td class="depot-name">Indapur</td>
                            <td>2111</td>
                            <td><span class="phone-number" onclick="callNumber('23144')">23144</span></td>
                            <td><span class="phone-number" onclick="callNumber('23125')">23125</span></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td class="depot-name">Narayangaon</td>
                            <td>2132</td>
                            <td><span class="phone-number" onclick="callNumber('42084')">42084</span></td>
                            <td><span class="phone-number" onclick="callNumber('42035')">42035</span></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td class="depot-name">Sasvad</td>
                            <td>2115</td>
                            <td><span class="phone-number" onclick="callNumber('22415')">22415</span></td>
                            <td><span class="phone-number" onclick="callNumber('22325')">22325</span></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td class="depot-name">Daund</td>
                            <td>2117</td>
                            <td><span class="phone-number" onclick="callNumber('63334')">63334</span></td>
                            <td><span class="phone-number" onclick="callNumber('73314')">73314</span></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td class="depot-name">Valchandnagar</td>
                            <td>2118</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('52228')">52228</span></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td class="depot-name">Nira</td>
                            <td>2115</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('42404')">42404</span></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td class="depot-name">Alephata</td>
                            <td>2132</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('63135')">63135</span></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td class="depot-name">Ghodegaon</td>
                            <td>2133</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('44135')">44135</span></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td class="depot-name">Otur</td>
                            <td>2132</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('64035')">64035</span></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td class="depot-name">Junnar</td>
                            <td>2132</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('22048')">22048</span></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td class="depot-name">Manchar</td>
                            <td>2133</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('23137')">23137</span></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td class="depot-name">Paund</td>
                            <td>2139</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('43124')">43124</span></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td class="depot-name">Lonavala</td>
                            <td>2114</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('73842')">73842</span></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td class="depot-name">Jejuri</td>
                            <td>2115</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('53134')">53134</span></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td class="depot-name">Cheladi (Nasrapur)</td>
                            <td>2115</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('53134')">53134</span></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td class="depot-name">Bhigvan</td>
                            <td>2118</td>
                            <td>-</td>
                            <td><span class="phone-number" onclick="callNumber('46013')">46013</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Add other regions here with simplified tables for brevity... -->
            <!-- Emergency Contact Section -->
            <div class="helpline-card rounded-2xl overflow-hidden shadow-xl mb-8 emergency-highlight">
                <div class="p-6 text-center">
                    <div class="contact-icon mx-auto" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Emergency Travel Information</h3>
                    <p class="mb-4">For urgent travel assistance and emergency situations</p>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="font-bold text-lg">Police Helpline</div>
                            <div class="phone-number text-2xl" onclick="callNumber('100')">100</div>
                        </div>
                        <div class="text-center">
                            <div class="font-bold text-lg">Medical Emergency</div>
                            <div class="phone-number text-2xl" onclick="callNumber('108')">108</div>
                        </div>
                        <div class="text-center">
                            <div class="font-bold text-lg">Tourist Helpline</div>
                            <div class="phone-number text-2xl" onclick="callNumber('1363')">1363</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 px-4 bg-gradient-to-r from-green-600 to-blue-600 text-white">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Plan Your Trek Journey
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Use these helpline numbers to plan your bus travel for upcoming treks and adventures!
            </p>
            <p class="text-lg mb-8 opacity-80 font-devanagari">
                आपल्या ट्रेकिंग प्रवासासाठी बस सेवेची माहिती घ्या
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#treks" class="bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i>
                    View Trek Schedule
                </a>
                <a href="trekgear.php" class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-green-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-backpack mr-2"></i>
                    Trek Gear Guide
                </a>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('ST Helpline page loaded');
    
    // Search functionality
    const searchBox = document.getElementById('searchBox');
    const allRows = document.querySelectorAll('.helpline-table tbody tr');
    
    searchBox.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        allRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
                row.style.background = searchTerm ? 'rgba(127, 176, 105, 0.1)' : '';
            } else {
                row.style.display = 'none';
            }
        });
        
        // Show/hide region sections based on search
        const regionSections = document.querySelectorAll('.region-section');
        regionSections.forEach(section => {
            const visibleRows = section.querySelectorAll('tbody tr:not([style*="display: none"])');
            section.style.display = visibleRows.length > 0 ? 'block' : 'none';
        });
    });
    
    // Tab switching functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    function switchTab(tabId) {
        // Hide all tab contents
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all buttons
        tabButtons.forEach(button => {
            button.classList.remove('active');
        });
        
        // Show selected tab content
        const selectedTab = document.getElementById(tabId);
        if (selectedTab) {
            selectedTab.classList.remove('hidden');
        }
        
        // Add active class to clicked button
        const selectedButton = document.querySelector(`[data-tab="${tabId}"]`);
        if (selectedButton) {
            selectedButton.classList.add('active');
        }
    }
    
    // Add click events to tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            switchTab(tabId);
        });
    });
    
    // Region filter functionality
    const regionFilterBtns = document.querySelectorAll('.region-filter-btn');
    const regionSections = document.querySelectorAll('.region-section');
    
    // Style for region filter buttons
    const style = document.createElement('style');
    style.textContent = `
        .region-filter-btn {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            margin: 2px;
            font-size: 14px;
        }
        
        .region-filter-btn.active {
            background: linear-gradient(135deg, #7fb069, #4a7c23);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(127, 176, 105, 0.3);
        }
        
        .dark .region-filter-btn {
            background: linear-gradient(135deg, #374151, #4b5563);
            color: var(--text-dark);
        }
        
        .dark .region-filter-btn.active {
            background: linear-gradient(135deg, #7fb069, #4a7c23);
            color: white;
        }
    `;
    document.head.appendChild(style);
    
    regionFilterBtns.forEach(button => {
        button.addEventListener('click', function() {
            const region = this.getAttribute('data-region');
            
            // Remove active class from all buttons
            regionFilterBtns.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Show/hide region sections
            regionSections.forEach(section => {
                if (region === 'all' || section.getAttribute('data-region') === region) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });
    
    // Phone number click to call functionality
    window.callNumber = function(number) {
        // Clean the number for calling
        const cleanNumber = number.replace(/[^0-9]/g, '');
        
        // Try to initiate call on mobile devices
        if (window.navigator.userAgent.match(/(iPhone|iPod|Android|BlackBerry|Windows Phone)/)) {
            window.location.href = `tel:${cleanNumber}`;
        } else {
            // For desktop, copy to clipboard and show notification
            navigator.clipboard.writeText(cleanNumber).then(() => {
                showNotification(`Phone number ${cleanNumber} copied to clipboard!`);
            }).catch(() => {
                showNotification(`Phone number: ${cleanNumber}`);
            });
        }
    };
    
    // Notification function
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-6 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(full)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
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
    
    // Observe all helpline cards
    const helplineCards = document.querySelectorAll('.helpline-card');
    helplineCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.animationDelay = `${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Add CSS animation
    const animationStyle = document.createElement('style');
    animationStyle.textContent = `
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(animationStyle);
    
    // Expose switch tab function globally
    window.switchTab = switchTab;
    
    console.log('ST Helpline page: All functionality initialized');
});

// Export functions for debugging
window.stHelplineDebug = {
    switchToMainHelpline: function() {
        switchTab('main-helpline');
    },
    switchToRegionalDepots: function() {
        switchTab('regional-depots');
    },
    searchDepots: function(term) {
        document.getElementById('searchBox').value = term;
        document.getElementById('searchBox').dispatchEvent(new Event('input'));
    },
    callNumber: function(number) {
        window.callNumber(number);
    }
};
</script>

<!-- Additional CSS for enhanced responsiveness -->
<style>
@media (max-width: 768px) {
    .helpline-table {
        font-size: 12px;
    }
    
    .helpline-table th,
    .helpline-table td {
        padding: 6px 4px;
    }
    
    .tab-button {
        padding: 8px 16px;
        font-size: 14px;
        margin: 2px;
    }
    
    .search-box {
        font-size: 14px;
        padding: 10px 16px;
    }
    
    .region-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
    
    .stat-item {
        padding: 12px;
    }
    
    .stat-number {
        font-size: 20px;
    }
}

@media (max-width: 480px) {
    .helpline-table th,
    .helpline-table td {
        padding: 4px 2px;
        font-size: 10px;
    }
    
    .phone-number {
        font-size: 10px;
    }
    
    .depot-name {
        font-size: 10px;
    }
    
    .region-header {
        padding: 8px 12px;
        font-size: 14px;
    }
    
    .helpline-card {
        margin-bottom: 16px;
    }
}

/* Print styles */
@media print {
    .search-box,
    .tab-button,
    .region-filter-btn,
    .fixed,
    nav,
    footer {
        display: none !important;
    }
    
    .helpline-card {
        break-inside: avoid;
        box-shadow: none !important;
        border: 1px solid #ccc !important;
        margin-bottom: 20px;
    }
    
    .helpline-table {
        font-size: 10px;
    }
    
    .region-header {
        background: #f0f0f0 !important;
        color: #000 !important;
        -webkit-print-color-adjust: exact;
    }
    
    .phone-number {
        color: #000 !important;
        text-decoration: none !important;
    }
    
    .tab-content {
        display: block !important;
    }
    
    .hidden {
        display: block !important;
    }
}

/* Dark mode improvements */
.dark .helpline-table tbody tr:nth-child(even) {
    background: rgba(127, 176, 105, 0.05);
}

.dark .search-box::placeholder {
    color: #9ca3af;
}

/* Accessibility improvements */
.helpline-card:focus-within {
    outline: 2px solid #7fb069;
    outline-offset: 2px;
}

.phone-number:focus {
    outline: 2px solid #7fb069;
    outline-offset: 2px;
    border-radius: 4px;
}

.tab-button:focus,
.region-filter-btn:focus {
    outline: 2px solid #7fb069;
    outline-offset: 2px;
}

/* Loading animation for tables */
.helpline-table.loading {
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

/* Enhanced hover effects for better UX */
.helpline-table tr:hover {
    background: linear-gradient(135deg, rgba(127, 176, 105, 0.1), rgba(74, 124, 35, 0.1)) !important;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(127, 176, 105, 0.2);
}

/* Smooth transitions for all interactive elements */
* {
    transition: all 0.3s ease;
}

/* Custom scrollbar for better aesthetics */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #7fb069, #4a7c23);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #4a7c23, #7fb069);
}

.dark ::-webkit-scrollbar-track {
    background: #374151;
}
</style>