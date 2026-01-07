<?php
// partials/dashboard_content.php
// This file is loaded dynamically via AJAX

require_once '../config/database.php';

// Get statistics
$stats = [
    'total_forts' => 0,
    'total_treks' => 0,
    'upcoming_treks' => 0,
    'total_photos' => 0,
    'total_events' => 0
];

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Get total forts
    $result = $conn->query("SELECT COUNT(*) as count FROM EI_tblFortInfo");
    if ($result && $row = $result->fetch_assoc()) {
        $stats['total_forts'] = $row['count'];
    }
    
    // Get total treks
    $result = $conn->query("SELECT COUNT(*) as count FROM TS_tblTrekDetails");
    if ($result && $row = $result->fetch_assoc()) {
        $stats['total_treks'] = $row['count'];
    }
    
    // Get upcoming treks
    $result = $conn->query("SELECT COUNT(*) as count FROM TS_tblTrekDetails WHERE TrekDate >= CURDATE()");
    if ($result && $row = $result->fetch_assoc()) {
        $stats['upcoming_treks'] = $row['count'];
    }
    
    // Get total photos
    $result = $conn->query("SELECT COUNT(*) as count FROM PM_tblPhotos");
    if ($result && $row = $result->fetch_assoc()) {
        $stats['total_photos'] = $row['count'];
    }
    
    // Get total events
    $result = $conn->query("SELECT COUNT(*) as count FROM OO_tblEventList WHERE Deleted IS NULL OR Deleted = 0");
    if ($result && $row = $result->fetch_assoc()) {
        $stats['total_events'] = $row['count'];
    }
    
    $conn->close();
} catch (Exception $e) {
    error_log("Dashboard Error: " . $e->getMessage());
}
?>

<div class="space-y-4">
    <!-- Page Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-sm text-gray-500">Overview of your content management system</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        <!-- Total Forts -->
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-green-100 rounded flex items-center justify-center">
                    <i class="fas fa-fort-awesome text-lg text-primary"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mb-1">Total Forts</p>
            <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_forts']); ?></p>
        </div>

        <!-- Upcoming Treks -->
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-blue-100 rounded flex items-center justify-center">
                    <i class="fas fa-hiking text-lg text-blue-600"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mb-1">Upcoming Treks</p>
            <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['upcoming_treks']); ?></p>
        </div>

        <!-- Photos -->
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-purple-100 rounded flex items-center justify-center">
                    <i class="fas fa-images text-lg text-purple-600"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mb-1">Total Photos</p>
            <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_photos']); ?></p>
        </div>

        <!-- Events -->
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-orange-100 rounded flex items-center justify-center">
                    <i class="fas fa-calendar text-lg text-orange-600"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mb-1">Active Events</p>
            <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_events']); ?></p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-bold mb-3">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <a href="#" data-page="forts-add" class="nav-link flex items-center p-3 bg-green-50 rounded hover:bg-green-100 transition-colors">
                <i class="fas fa-plus-circle text-xl text-primary mr-3"></i>
                <div>
                    <p class="font-medium text-sm">Add Fort</p>
                    <p class="text-xs text-gray-500">Create new fort</p>
                </div>
            </a>
            <a href="#" data-page="treks-add" class="nav-link flex items-center p-3 bg-blue-50 rounded hover:bg-blue-100 transition-colors">
                <i class="fas fa-route text-xl text-blue-600 mr-3"></i>
                <div>
                    <p class="font-medium text-sm">Schedule Trek</p>
                    <p class="text-xs text-gray-500">Add new trek</p>
                </div>
            </a>
            <a href="#" data-page="photos" class="nav-link flex items-center p-3 bg-purple-50 rounded hover:bg-purple-100 transition-colors">
                <i class="fas fa-upload text-xl text-purple-600 mr-3"></i>
                <div>
                    <p class="font-medium text-sm">Upload Photos</p>
                    <p class="text-xs text-gray-500">Add to gallery</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Overview Table -->
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-lg font-bold mb-3">Content Overview</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Records</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <div class="flex items-center">
                                <i class="fas fa-fort-awesome text-primary mr-2"></i>
                                <span>Forts</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-gray-600"><?php echo number_format($stats['total_forts']); ?></td>
                        <td class="px-4 py-2">
                            <a href="#" data-page="forts" class="nav-link text-primary hover:text-secondary">Manage →</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <div class="flex items-center">
                                <i class="fas fa-hiking text-blue-600 mr-2"></i>
                                <span>Treks</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-gray-600"><?php echo number_format($stats['total_treks']); ?></td>
                        <td class="px-4 py-2">
                            <a href="#" data-page="treks" class="nav-link text-primary hover:text-secondary">Manage →</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <div class="flex items-center">
                                <i class="fas fa-images text-purple-600 mr-2"></i>
                                <span>Photos</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-gray-600"><?php echo number_format($stats['total_photos']); ?></td>
                        <td class="px-4 py-2">
                            <a href="#" data-page="photos" class="nav-link text-primary hover:text-secondary">Manage →</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Re-bind navigation links after content loads
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const page = this.getAttribute('data-page');
        if (page && typeof loadContent === 'function') {
            loadContent(page);
        }
    });
});
</script>