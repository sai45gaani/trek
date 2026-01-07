<?php
// Set page specific variables
$page_title = 'ST Bus Helpline Numbers | TreKshitiZ - Maharashtra State Transport Contact Information';
$meta_description = 'Complete list of Maharashtra State Transport (ST Bus) helpline numbers and depot contacts. Find bus stand information, regional helplines, and contact details for all major cities and towns.';
$meta_keywords = 'ST bus helpline, Maharashtra State Transport, bus depot numbers, bus stand contact, ST bus information, Maharashtra bus helpline, travel information';

// Main helpline data array (can be replaced with database query)
$main_helplines = [
    ['sr_no' => 1, 'name' => 'Parel', 'phone' => '24229905'],
    ['sr_no' => 2, 'name' => 'Mumbai Central', 'phone' => '23076622 / 3074272'],
    ['sr_no' => 3, 'name' => 'Thane', 'phone' => '25332361'],
    ['sr_no' => 4, 'name' => 'Panvel Stand1', 'phone' => '27452301'],
    ['sr_no' => 5, 'name' => 'Vashi', 'phone' => '27662833'],
    ['sr_no' => 6, 'name' => 'Vasai', 'phone' => '95250-322307'],
    ['sr_no' => 7, 'name' => 'Dahanu', 'phone' => '952528-222590'],
    ['sr_no' => 8, 'name' => 'Shahapur', 'phone' => '952527-252028'],
    ['sr_no' => 9, 'name' => 'IgatPuri', 'phone' => '952553-244005'],
    ['sr_no' => 10, 'name' => 'Nashik (C.B.S)', 'phone' => '95253-2309310'],
    ['sr_no' => '', 'name' => 'Nashik Highway Bus Stand', 'phone' => '95253-2573755'],
    ['sr_no' => '', 'name' => 'Nashik road bus stand', 'phone' => '95253-2565304'],
    ['sr_no' => 11, 'name' => 'Satana', 'phone' => '02555-223004'],
    ['sr_no' => 12, 'name' => 'Manmad', 'phone' => '02591-222239'],
    ['sr_no' => '', 'name' => '', 'phone' => '222358(Depo)'],
    ['sr_no' => 13, 'name' => 'Mahad', 'phone' => '952145-222139'],
    ['sr_no' => 14, 'name' => 'Alibag', 'phone' => '952141-222079'],
    ['sr_no' => 15, 'name' => 'Khed', 'phone' => '02635-263543'],
    ['sr_no' => 16, 'name' => 'PoladPur', 'phone' => '95-2191-240036'],
    ['sr_no' => 17, 'name' => 'Chiplun', 'phone' => '02355-252167'],
    ['sr_no' => 18, 'name' => 'Kolhapur', 'phone' => '0231-2650620'],
    ['sr_no' => '', 'name' => '', 'phone' => '2666551'],
    ['sr_no' => 19, 'name' => 'Junnar', 'phone' => '952132-222048'],
    ['sr_no' => 20, 'name' => 'Kalyan', 'phone' => '315129'],
    ['sr_no' => '', 'name' => '', 'phone' => '314459'],
    ['sr_no' => 21, 'name' => 'Dombivli', 'phone' => '2455311'],
    ['sr_no' => 22, 'name' => 'Saaswad', 'phone' => '222335'],
    ['sr_no' => 23, 'name' => 'Maharashtra Vahtuk Bhava', 'phone' => '3071524'],
    ['sr_no' => 24, 'name' => 'Borivali (Nancu Colony)', 'phone' => '8902348'],
    ['sr_no' => 25, 'name' => 'Borivali(Sakurwadi)', 'phone' => '8058226'],
    ['sr_no' => 26, 'name' => 'Dadar Asiad Mum -Pune', 'phone' => '4136835'],
    ['sr_no' => 27, 'name' => 'Kurla Neharu nagar', 'phone' => '5222072'],
    ['sr_no' => 28, 'name' => 'Mumbai shirdi (s.Bapat Marg)', 'phone' => '4302667'],
    ['sr_no' => 29, 'name' => 'Sion Stand', 'phone' => '4074157'],
    ['sr_no' => 30, 'name' => 'Panvel Stand2', 'phone' => '7451397'],
    ['sr_no' => 31, 'name' => 'Uran Stand', 'phone' => '7222333'],
    ['sr_no' => 32, 'name' => 'Vashi Stand', 'phone' => '7662833']
];

// Regional depot data array (can be replaced with database query)
$regional_depots = [
    'thane' => [
        'name' => 'Thane Vibhag',
        'name_mr' => 'ठाणे विभाग',
        'icon' => 'fas fa-building',
        'depots' => [
            ['sr_no' => 1, 'name' => 'Thane 1', 'std_code' => '9522', 'depot' => '25344163', 'stand' => '25332361'],
            ['sr_no' => 2, 'name' => 'Thane Vandana', 'std_code' => '9522', 'depot' => '', 'stand' => '25332504'],
            ['sr_no' => 3, 'name' => 'Bhyadner', 'std_code' => '9522', 'depot' => '', 'stand' => '28192357'],
            ['sr_no' => 4, 'name' => 'Bhivandi', 'std_code' => '95251', 'depot' => '252791', 'stand' => '254429'],
            ['sr_no' => 5, 'name' => 'Vitthalvadi', 'std_code' => '95251', 'depot' => '2338724', 'stand' => '2338770'],
            ['sr_no' => 6, 'name' => 'Badlapur', 'std_code' => '95251', 'depot' => '', 'stand' => '2591532'],
            ['sr_no' => 7, 'name' => 'Kalyan', 'std_code' => '95251', 'depot' => '2314459', 'stand' => '2315129'],
            ['sr_no' => 8, 'name' => 'Dombivli', 'std_code' => '95251', 'depot' => '', 'stand' => '2455311'],
            ['sr_no' => 9, 'name' => 'Shahapur', 'std_code' => '', 'depot' => '272028', 'stand' => '272070'],
            ['sr_no' => 10, 'name' => 'Murbad', 'std_code' => '', 'depot' => '222260', 'stand' => '222222'],
            ['sr_no' => 11, 'name' => 'Vada', 'std_code' => '', 'depot' => '271083', 'stand' => '271428'],
            ['sr_no' => 12, 'name' => 'Vasai', 'std_code' => '250', 'depot' => '2324003', 'stand' => '2322307'],
            ['sr_no' => 13, 'name' => 'Navghar', 'std_code' => '250', 'depot' => '', 'stand' => '2322307'],
            ['sr_no' => 14, 'name' => 'Ganeshpuri', 'std_code' => '250', 'depot' => '', 'stand' => '2322306'],
            ['sr_no' => 15, 'name' => 'Vajreshwari', 'std_code' => '250', 'depot' => '', 'stand' => '261537'],
            ['sr_no' => 16, 'name' => 'Nalasopara', 'std_code' => '250', 'depot' => '2403191', 'stand' => '2403190'],
            ['sr_no' => 17, 'name' => 'Arnala', 'std_code' => '250', 'depot' => '2587226', 'stand' => ''],
            ['sr_no' => 18, 'name' => 'Arnala / Virar', 'std_code' => '250', 'depot' => '', 'stand' => '2502433'],
            ['sr_no' => 19, 'name' => 'Saphala', 'std_code' => '2525', 'depot' => '230171', 'stand' => '230133'],
            ['sr_no' => 20, 'name' => 'Palghar', 'std_code' => '2525', 'depot' => '252027', 'stand' => '252139'],
            ['sr_no' => 21, 'name' => 'Boisar', 'std_code' => '2525', 'depot' => '271249', 'stand' => '272440'],
            ['sr_no' => 22, 'name' => 'Dahanu', 'std_code' => '2528', 'depot' => '222298', 'stand' => '222590'],
            ['sr_no' => 23, 'name' => 'Javhar', 'std_code' => '2520', 'depot' => '222528', 'stand' => '222501']
        ]
    ],
    'raigad' => [
        'name' => 'Raigad Vibhag',
        'name_mr' => 'रायगड विभाग',
        'icon' => 'fas fa-fort-awesome',
        'depots' => [
            ['sr_no' => 1, 'name' => 'Mahad', 'std_code' => '', 'depot' => '222139', 'stand' => '222102'],
            ['sr_no' => 2, 'name' => 'Poladpur', 'std_code' => '', 'depot' => '', 'stand' => '240036'],
            ['sr_no' => 3, 'name' => 'Mangaon', 'std_code' => '', 'depot' => '', 'stand' => '263033'],
            ['sr_no' => 4, 'name' => 'Goregaon', 'std_code' => '', 'depot' => '', 'stand' => '250234'],
            ['sr_no' => 5, 'name' => 'Ambet', 'std_code' => '', 'depot' => '', 'stand' => '223038'],
            ['sr_no' => 6, 'name' => 'Alibag', 'std_code' => '', 'depot' => '222074', 'stand' => '222006'],
            ['sr_no' => 7, 'name' => 'Revdanda', 'std_code' => '', 'depot' => '', 'stand' => '240027'],
            ['sr_no' => 8, 'name' => 'Pen', 'std_code' => '', 'depot' => '252043', 'stand' => '252001'],
            ['sr_no' => 9, 'name' => 'Pali', 'std_code' => '', 'depot' => '', 'stand' => '252233'],
            ['sr_no' => 10, 'name' => 'Ramvadi', 'std_code' => '', 'depot' => '', 'stand' => '252114'],
            ['sr_no' => 11, 'name' => 'Shrivardhan', 'std_code' => '', 'depot' => '222233', 'stand' => '222241'],
            ['sr_no' => 12, 'name' => 'Mhasala', 'std_code' => '', 'depot' => '', 'stand' => '232250'],
            ['sr_no' => 13, 'name' => 'Karjat', 'std_code' => '', 'depot' => '222076', 'stand' => '222085'],
            ['sr_no' => 14, 'name' => 'Khopoli', 'std_code' => '', 'depot' => '', 'stand' => '263387'],
            ['sr_no' => 15, 'name' => 'Roha', 'std_code' => '', 'depot' => '242447', 'stand' => '242217'],
            ['sr_no' => 16, 'name' => 'Tala', 'std_code' => '', 'depot' => '', 'stand' => '269041'],
            ['sr_no' => 17, 'name' => 'Indapur', 'std_code' => '', 'depot' => '', 'stand' => '266029'],
            ['sr_no' => 18, 'name' => 'Murud', 'std_code' => '', 'depot' => '274710', 'stand' => '274044'],
            ['sr_no' => 19, 'name' => 'Panvel', 'std_code' => '', 'depot' => '27452301', 'stand' => '27451397'],
            ['sr_no' => 20, 'name' => 'Panvel (Rural)', 'std_code' => '', 'depot' => '', 'stand' => '27465147'],
            ['sr_no' => 21, 'name' => 'Uran', 'std_code' => '', 'depot' => '27222466', 'stand' => '27222333']
        ]
    ],
    'pune' => [
        'name' => 'Pune Vibhag',
        'name_mr' => 'पुणे विभाग',
        'icon' => 'fas fa-university',
        'depots' => [
            ['sr_no' => 1, 'name' => 'Pune Swargate', 'std_code' => '20', 'depot' => '24442968', 'stand' => '24441591'],
            ['sr_no' => 2, 'name' => 'Pune Swargate (Mumbai)', 'std_code' => '20', 'depot' => '', 'stand' => '24449980'],
            ['sr_no' => 3, 'name' => 'Pune Station', 'std_code' => '20', 'depot' => '', 'stand' => '26126218'],
            ['sr_no' => 4, 'name' => 'Pinprai - Chinchvad', 'std_code' => '20', 'depot' => '27420007', 'stand' => '27420300'],
            ['sr_no' => 5, 'name' => 'Shivajinagar', 'std_code' => '20', 'depot' => '25536641', 'stand' => '25369170'],
            ['sr_no' => 6, 'name' => 'Shirur', 'std_code' => '2138', 'depot' => '22135', 'stand' => '22305'],
            ['sr_no' => 7, 'name' => 'Rajgurunagar', 'std_code' => '2135', 'depot' => '22044', 'stand' => '22035'],
            ['sr_no' => 8, 'name' => 'Baramati', 'std_code' => '2112', 'depot' => '22306', 'stand' => '22236'],
            ['sr_no' => 9, 'name' => 'Talegaon', 'std_code' => '2114', 'depot' => '22435', 'stand' => '22345'],
            ['sr_no' => 10, 'name' => 'Bhor', 'std_code' => '2113', 'depot' => '22607', 'stand' => '22535'],
            ['sr_no' => 11, 'name' => 'Indapur', 'std_code' => '2111', 'depot' => '23144', 'stand' => '23125'],
            ['sr_no' => 12, 'name' => 'Narayangaon', 'std_code' => '2132', 'depot' => '42084', 'stand' => '42035'],
            ['sr_no' => 13, 'name' => 'Sasvad', 'std_code' => '2115', 'depot' => '22415', 'stand' => '22325'],
            ['sr_no' => 14, 'name' => 'Daund', 'std_code' => '2117', 'depot' => '63334', 'stand' => '73314'],
            ['sr_no' => 15, 'name' => 'Valchandnagar', 'std_code' => '2118', 'depot' => '', 'stand' => '52228'],
            ['sr_no' => 16, 'name' => 'Nira', 'std_code' => '2115', 'depot' => '', 'stand' => '42404'],
            ['sr_no' => 17, 'name' => 'Alephata', 'std_code' => '2132', 'depot' => '', 'stand' => '63135'],
            ['sr_no' => 18, 'name' => 'Ghodegaon', 'std_code' => '2133', 'depot' => '', 'stand' => '44135'],
            ['sr_no' => 19, 'name' => 'Otur', 'std_code' => '2132', 'depot' => '', 'stand' => '64035'],
            ['sr_no' => 20, 'name' => 'Junnar', 'std_code' => '2132', 'depot' => '', 'stand' => '22048'],
            ['sr_no' => 21, 'name' => 'Manchar', 'std_code' => '2133', 'depot' => '', 'stand' => '23137'],
            ['sr_no' => 22, 'name' => 'Paund', 'std_code' => '2139', 'depot' => '', 'stand' => '43124'],
            ['sr_no' => 23, 'name' => 'Lonavala', 'std_code' => '2114', 'depot' => '', 'stand' => '73842'],
            ['sr_no' => 24, 'name' => 'Jejuri', 'std_code' => '2115', 'depot' => '', 'stand' => '53134'],
            ['sr_no' => 25, 'name' => 'Cheladi (Nasrapur)', 'std_code' => '2115', 'depot' => '', 'stand' => '53134'],
            ['sr_no' => 26, 'name' => 'Bhigvan', 'std_code' => '2118', 'depot' => '', 'stand' => '46013']
        ]
    ],
    'satara' => [
        'name' => 'Satara Vibhag',
        'name_mr' => 'सातारा विभाग',
        'icon' => 'fas fa-mountain',
        'depots' => [
            ['sr_no' => 1, 'name' => 'Satara', 'std_code' => '2162', 'depot' => '230064', 'stand' => '234567'],
            ['sr_no' => 2, 'name' => 'Satara (Rajvada)', 'std_code' => '2162', 'depot' => '', 'stand' => '238577'],
            ['sr_no' => 3, 'name' => 'Vai', 'std_code' => '2167', 'depot' => '220680', 'stand' => '220001'],
            ['sr_no' => 4, 'name' => 'Karad', 'std_code' => '2164', 'depot' => '222563', 'stand' => '222278'],
            ['sr_no' => 5, 'name' => 'Dahivadi', 'std_code' => '2165', 'depot' => '220248', 'stand' => '220235'],
            ['sr_no' => 6, 'name' => 'Patan', 'std_code' => '2372', 'depot' => '283036', 'stand' => '283032'],
            ['sr_no' => 7, 'name' => 'Koregaon', 'std_code' => '2163', 'depot' => '220221', 'stand' => '220232'],
            ['sr_no' => 8, 'name' => 'Mahabaleshwar', 'std_code' => '2168', 'depot' => '260485', 'stand' => '260254'],
            ['sr_no' => 9, 'name' => 'Phaltan', 'std_code' => '2166', 'depot' => '222379', 'stand' => '222227']
        ]
    ]
];

// Emergency contacts array
$emergency_contacts = [
    ['name' => 'Police Helpline', 'number' => '100', 'icon' => 'fas fa-shield-alt'],
    ['name' => 'Medical Emergency', 'number' => '108', 'icon' => 'fas fa-heartbeat'],
    ['name' => 'Tourist Helpline', 'number' => '1363', 'icon' => 'fas fa-info-circle']
];

// Calculate statistics
$total_depots = count($main_helplines);
foreach ($regional_depots as $region) {
    $total_depots += count($region['depots']);
}

$total_regions = count($regional_depots);

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
                    <div class="stat-number"><?php echo $total_depots; ?>+</div>
                    <div class="stat-label">Bus Depots</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo $total_regions; ?></div>
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
                        <?php foreach ($main_helplines as $helpline): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($helpline['sr_no']); ?></td>
                            <td class="depot-name"><?php echo htmlspecialchars($helpline['name']); ?></td>
                            <td><span class="phone-number" onclick="callNumber('<?php echo htmlspecialchars($helpline['phone']); ?>')"><?php echo htmlspecialchars($helpline['phone']); ?></span></td>
                        </tr>
                        <?php endforeach; ?>
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
                <?php foreach ($regional_depots as $region_key => $region_data): ?>
                <button class="region-filter-btn" data-region="<?php echo $region_key; ?>">
                    <?php echo ucfirst($region_key); ?>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Regional Sections -->
            <?php foreach ($regional_depots as $region_key => $region_data): ?>
            <div class="helpline-card rounded-2xl overflow-hidden shadow-xl mb-8 region-section" data-region="<?php echo $region_key; ?>">
                <div class="region-header">
                    <i class="<?php echo $region_data['icon']; ?> mr-2"></i>
                    <?php echo $region_data['name']; ?> (<?php echo $region_data['name_mr']; ?>)
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
                        <?php foreach ($region_data['depots'] as $depot): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($depot['sr_no']); ?></td>
                            <td class="depot-name"><?php echo htmlspecialchars($depot['name']); ?></td>
                            <td><?php echo htmlspecialchars($depot['std_code']); ?></td>
                            <td>
                                <?php if (!empty($depot['depot'])): ?>
                                <span class="phone-number" onclick="callNumber('<?php echo htmlspecialchars($depot['depot']); ?>')">
                                    <?php echo htmlspecialchars($depot['depot']); ?>
                                </span>
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($depot['stand'])): ?>
                                <span class="phone-number" onclick="callNumber('<?php echo htmlspecialchars($depot['stand']); ?>')">
                                    <?php echo htmlspecialchars($depot['stand']); ?>
                                </span>
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endforeach; ?>

            <!-- Emergency Contact Section -->
            <div class="helpline-card rounded-2xl overflow-hidden shadow-xl mb-8 emergency-highlight">
                <div class="p-6 text-center">
                    <div class="contact-icon mx-auto" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Emergency Travel Information</h3>
                    <p class="mb-4">For urgent travel assistance and emergency situations</p>
                    <div class="grid md:grid-cols-3 gap-4">
                        <?php foreach ($emergency_contacts as $contact): ?>
                        <div class="text-center">
                            <div class="font-bold text-lg">
                                <i class="<?php echo $contact['icon']; ?> mr-2"></i>
                                <?php echo $contact['name']; ?>
                            </div>
                            <div class="phone-number text-2xl" onclick="callNumber('<?php echo $contact['number']; ?>')">
                                <?php echo $contact['number']; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
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

<!-- Responsive CSS -->
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
    .search-box, .tab-button, .region-filter-btn, .fixed, nav, footer {
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
</style>