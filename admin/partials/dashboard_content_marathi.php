<?php
// partials/dashboard_content_marathi.php
// Marathi Dashboard (Bilingual)

require_once '../config/database.php';

$stats = [
    'total_forts'     => 0,
    'total_treks'     => 0,
    'upcoming_treks'  => 0,
    'total_photos'    => 0,
    'total_events'    => 0
];

try {
    $db = new Database();
    $conn = $db->getConnection();

    // ✅ Marathi Forts
    $res = $conn->query("SELECT COUNT(*) AS cnt FROM mi_tblfortinfo_unicode");
    if ($res && $r = $res->fetch_assoc()) {
        $stats['total_forts'] = $r['cnt'];
    }

    // Treks (same table)
    $res = $conn->query("SELECT COUNT(*) AS cnt FROM TS_tblTrekDetails");
    if ($res && $r = $res->fetch_assoc()) {
        $stats['total_treks'] = $r['cnt'];
    }

    $res = $conn->query("SELECT COUNT(*) AS cnt FROM TS_tblTrekDetails WHERE TrekDate >= CURDATE()");
    if ($res && $r = $res->fetch_assoc()) {
        $stats['upcoming_treks'] = $r['cnt'];
    }

    // Photos
    $res = $conn->query("SELECT COUNT(*) AS cnt FROM PM_tblPhotos");
    if ($res && $r = $res->fetch_assoc()) {
        $stats['total_photos'] = $r['cnt'];
    }

    // Events
    $res = $conn->query("SELECT COUNT(*) AS cnt FROM OO_tblEventList WHERE Deleted IS NULL OR Deleted=0");
    if ($res && $r = $res->fetch_assoc()) {
        $stats['total_events'] = $r['cnt'];
    }

    $conn->close();
} catch (Exception $e) {
    error_log('Marathi Dashboard Error: '.$e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            डॅशबोर्ड <span class="text-sm text-gray-500">(Dashboard)</span>
        </h1>
        <p class="text-sm text-gray-500">
            व्यवस्थापन प्रणालीचा संक्षिप्त आढावा (Overview of CMS)
        </p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">

        <!-- Forts -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="w-10 h-10 bg-green-100 rounded flex items-center justify-center mb-2">
                <i class="fas fa-fort-awesome text-primary"></i>
            </div>
            <p class="text-xs text-gray-500">एकूण किल्ले (Total Forts)</p>
            <p class="text-2xl font-bold"><?= number_format($stats['total_forts']) ?></p>
        </div>

        <!-- Upcoming Treks -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="w-10 h-10 bg-blue-100 rounded flex items-center justify-center mb-2">
                <i class="fas fa-hiking text-blue-600"></i>
            </div>
            <p class="text-xs text-gray-500">
                आगामी ट्रेक्स (Upcoming Treks)
            </p>
            <p class="text-2xl font-bold"><?= number_format($stats['upcoming_treks']) ?></p>
        </div>

        <!-- Photos -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="w-10 h-10 bg-purple-100 rounded flex items-center justify-center mb-2">
                <i class="fas fa-images text-purple-600"></i>
            </div>
            <p class="text-xs text-gray-500">
                एकूण फोटो (Total Photos)
            </p>
            <p class="text-2xl font-bold"><?= number_format($stats['total_photos']) ?></p>
        </div>

        <!-- Events -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="w-10 h-10 bg-orange-100 rounded flex items-center justify-center mb-2">
                <i class="fas fa-calendar text-orange-600"></i>
            </div>
            <p class="text-xs text-gray-500">
                सक्रिय कार्यक्रम (Active Events)
            </p>
            <p class="text-2xl font-bold"><?= number_format($stats['total_events']) ?></p>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-bold mb-3">
            जलद क्रिया (Quick Actions)
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

            <a href="#" data-page="forts-add"
               class="nav-link flex items-center p-3 bg-green-50 rounded hover:bg-green-100">
                <i class="fas fa-plus-circle text-primary text-xl mr-3"></i>
                <div>
                    <p class="font-medium text-sm">
                        नवीन किल्ला जोडा
                    </p>
                    <p class="text-xs text-gray-500">
                        Add New Fort
                    </p>
                </div>
            </a>

            <a href="#" data-page="treks-add"
               class="nav-link flex items-center p-3 bg-blue-50 rounded hover:bg-blue-100">
                <i class="fas fa-route text-blue-600 text-xl mr-3"></i>
                <div>
                    <p class="font-medium text-sm">
                        ट्रेक नियोजन
                    </p>
                    <p class="text-xs text-gray-500">
                        Schedule Trek
                    </p>
                </div>
            </a>

            <a href="#" data-page="fort-photos"
               class="nav-link flex items-center p-3 bg-purple-50 rounded hover:bg-purple-100">
                <i class="fas fa-upload text-purple-600 text-xl mr-3"></i>
                <div>
                    <p class="font-medium text-sm">
                        फोटो अपलोड
                    </p>
                    <p class="text-xs text-gray-500">
                        Upload Photos
                    </p>
                </div>
            </a>

        </div>
    </div>

    <!-- Overview Table -->
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-bold mb-3">
            सामग्री आढावा (Content Overview)
        </h2>

        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left">प्रकार (Category)</th>
                <th class="px-4 py-2">नोंदी (Records)</th>
                <th class="px-4 py-2">कृती (Action)</th>
            </tr>
            </thead>
            <tbody class="divide-y">

            <tr>
                <td class="px-4 py-2">
                    <i class="fas fa-fort-awesome text-primary mr-2"></i>
                    किल्ले (Forts)
                </td>
                <td class="px-4 py-2"><?= number_format($stats['total_forts']) ?></td>
                <td class="px-4 py-2">
                    <a href="#" data-page="forts" class="nav-link text-primary">
                        व्यवस्थापन →
                    </a>
                </td>
            </tr>

            <tr>
                <td class="px-4 py-2">
                    <i class="fas fa-hiking text-blue-600 mr-2"></i>
                    ट्रेक्स (Treks)
                </td>
                <td class="px-4 py-2"><?= number_format($stats['total_treks']) ?></td>
                <td class="px-4 py-2">
                    <a href="#" data-page="treks" class="nav-link text-primary">
                        व्यवस्थापन →
                    </a>
                </td>
            </tr>

            <tr>
                <td class="px-4 py-2">
                    <i class="fas fa-images text-purple-600 mr-2"></i>
                    फोटो (Photos)
                </td>
                <td class="px-4 py-2"><?= number_format($stats['total_photos']) ?></td>
                <td class="px-4 py-2">
                    <a href="#" data-page="fort-photos" class="nav-link text-primary">
                        व्यवस्थापन →
                    </a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

</div>

<script>
document.querySelectorAll('.nav-link').forEach(function(link){
    link.addEventListener('click', function(e){
        e.preventDefault();
        var page = this.getAttribute('data-page');
        if(page && typeof loadContent === 'function'){
            loadContent(page);
        }
    });
});
</script>
