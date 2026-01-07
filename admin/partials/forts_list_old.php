<?php
// partials/forts_list.php
require_once '../config/database.php';

$forts = [];
$total_count = 0;
$page = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Get total count
    $result = $conn->query("SELECT COUNT(*) as count FROM EI_tblFortInfo");
    if ($result && $row = $result->fetch_assoc()) {
        $total_count = $row['count'];
    }
    
    $total_pages = ceil($total_count / $limit);
    
    // Get forts list with pagination
    $query = "SELECT FortID, FortName, FortType, FortDistrict, Grade 
              FROM EI_tblFortInfo 
              ORDER BY FortName ASC 
              LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $forts[] = $row;
        }
    }
    
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    error_log("Forts List Error: " . $e->getMessage());
}
?>

<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="space-y-4">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">All Forts</h1>
            <p class="text-sm text-gray-500">Showing <?php echo count($forts); ?> of <?php echo $total_count; ?> forts (Page <?php echo $page; ?> of <?php echo $total_pages; ?>)</p>
        </div>
        <button onclick="openAddModal()" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded text-sm transition-colors">
            <i class="fas fa-plus mr-2"></i>Add New Fort
        </button>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow p-3">
        <div class="flex gap-2">
            <input 
                type="text" 
                id="search-input"
                placeholder="Search forts..." 
                class="flex-1 px-3 py-2 border rounded text-sm focus:outline-none focus:ring-2 focus:ring-primary"
            >
            <select class="px-3 py-2 border rounded text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                <option>All Types</option>
                <option>Hill Fort</option>
                <option>Sea Fort</option>
                <option>Land Fort</option>
            </select>
            <button class="bg-primary text-white px-4 py-2 rounded text-sm hover:bg-secondary transition-colors">
                <i class="fas fa-filter"></i>
            </button>
        </div>
    </div>

    <!-- Forts Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fort Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">District</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Grade</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($forts)): ?>
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                <i class="fas fa-inbox text-3xl mb-2 block"></i>
                                <p>No forts found</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($forts as $fort): ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 text-gray-600"><?php echo $fort['FortID']; ?></td>
                                <td class="px-4 py-3 font-medium text-gray-900"><?php echo htmlspecialchars($fort['FortName']); ?></td>
                                <td class="px-4 py-3 text-gray-600"><?php echo htmlspecialchars($fort['FortType'] ?? 'N/A'); ?></td>
                                <td class="px-4 py-3 text-gray-600"><?php echo htmlspecialchars($fort['FortDistrict'] ?? 'N/A'); ?></td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                        <?php echo htmlspecialchars($fort['Grade'] ?? 'N/A'); ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <button onclick="viewFort(<?php echo $fort['FortID']; ?>)" class="text-blue-600 hover:text-blue-800 transition-colors" title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="editFort(<?php echo $fort['FortID']; ?>)" class="text-primary hover:text-secondary transition-colors" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1): ?>
        <div class="flex justify-center items-center gap-2">
            <?php if ($page > 1): ?>
                <button onclick="loadFortsPage(<?php echo $page - 1; ?>)" class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50 transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>
            <?php endif; ?>
            
            <?php
            $start_page = max(1, $page - 2);
            $end_page = min($total_pages, $page + 2);
            
            if ($start_page > 1): ?>
                <button onclick="loadFortsPage(1)" class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50 transition-colors">1</button>
                <?php if ($start_page > 2): ?>
                    <span class="px-2">...</span>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                <button 
                    onclick="loadFortsPage(<?php echo $i; ?>)" 
                    class="px-3 py-1.5 rounded text-sm transition-colors <?php echo $i == $page ? 'bg-primary text-white' : 'border hover:bg-gray-50'; ?>"
                >
                    <?php echo $i; ?>
                </button>
            <?php endfor; ?>
            
            <?php if ($end_page < $total_pages): ?>
                <?php if ($end_page < $total_pages - 1): ?>
                    <span class="px-2">...</span>
                <?php endif; ?>
                <button onclick="loadFortsPage(<?php echo $total_pages; ?>)" class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50 transition-colors"><?php echo $total_pages; ?></button>
            <?php endif; ?>
            
            <?php if ($page < $total_pages): ?>
                <button onclick="loadFortsPage(<?php echo $page + 1; ?>)" class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50 transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<!-- View/Edit Modal -->
<div id="fort-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden flex flex-col modal-content">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h2 id="modal-title" class="text-xl font-bold">Fort Details</h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="p-4 overflow-y-auto flex-1">
            <div id="modal-content">
                <!-- Content will be loaded here -->
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div id="modal-footer" class="flex justify-end gap-2 p-4 border-t">
            <button onclick="closeModal()" class="px-4 py-2 border rounded hover:bg-gray-50 text-sm">Cancel</button>
            <button id="save-btn" onclick="saveFort()" class="hidden px-4 py-2 bg-primary text-white rounded hover:bg-secondary text-sm">
                <i class="fas fa-save mr-2"></i>Save Changes
            </button>
        </div>
    </div>
</div>

<style>
.modal-content {
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>
