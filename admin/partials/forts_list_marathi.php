<?php
// partials/forts_list_marathi.php

require_once '../config/database.php';

$forts = [];
$fort_types = [];
$total_count = 0;

$page  = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

// Filters (ENGLISH ONLY)
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$type_filter = isset($_GET['type']) ? trim($_GET['type']) : '';

try {
    $db = new Database();
    $conn = $db->getConnection();

    /* ---------- Fort Types (English) ---------- */
    $typeRes = $conn->query("
        SELECT DISTINCT FortType 
        FROM mi_tblfortinfo_unicode 
        WHERE FortType IS NOT NULL AND FortType != ''
        ORDER BY FortType ASC
    ");
    while ($row = $typeRes->fetch_assoc()) {
        $fort_types[] = $row['FortType'];
    }

    /* ---------- WHERE clause (English columns only) ---------- */
    $where = [];
    $params = [];
    $types  = '';

    if ($search !== '') {
        $where[] = "(FortName LIKE ? OR FortDistrict LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $types .= 'ss';
    }

    if ($type_filter !== '') {
        $where[] = "FortType = ?";
        $params[] = $type_filter;
        $types .= 's';
    }

    $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    /* ---------- Count ---------- */
    $countSql = "SELECT COUNT(*) cnt FROM mi_tblfortinfo_unicode $whereSql";
    $stmt = $conn->prepare($countSql);
    if ($params) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $total_count = $stmt->get_result()->fetch_assoc()['cnt'];
    $stmt->close();

    $total_pages = ceil($total_count / $limit);

    /* ---------- Data ---------- */
    $sql = "
        SELECT 
            FortID,
            FortName, FortNameMar,
            FortType, FortTypeMar,
            FortRange, FortRangeMar,
            FortDistrict, FortDistrictMar,
            Grade, GradeMar
        FROM mi_tblfortinfo_unicode
        $whereSql
        ORDER BY FortName ASC
        LIMIT ? OFFSET ?
    ";

    $params[] = $limit;
    $params[] = $offset;
    $types .= 'ii';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();

    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $forts[] = $row;
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Marathi Fort List Error: ' . $e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Marathi Forts</h1>
            <p class="text-sm text-gray-500">
                Showing <?= count($forts) ?> of <?= $total_count ?> records
            </p>
        </div>

        <button onclick="loadContent('forts-add-mar')"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Marathi Fort
        </button>
    </div>

    <!-- Filters -->
    <div class="bg-white p-3 rounded shadow flex gap-2">
        <input id="search-input-mar"
               value="<?= htmlspecialchars($search) ?>"
               placeholder="Search by Fort Name or District (English)"
               class="border px-3 py-2 rounded text-sm w-full">

        <select id="type-filter-mar"
                class="border px-3 py-2 rounded text-sm min-w-[150px]">
            <option value="">All Types</option>
            <?php foreach ($fort_types as $t): ?>
                <option value="<?= htmlspecialchars($t) ?>" <?= $t === $type_filter ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button onclick="applyFiltersMarathi()"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            Filter
        </button>

        <?php if ($search || $type_filter): ?>
            <button onclick="clearFiltersMarathi()"
                    class="bg-gray-500 text-white px-4 py-2 rounded text-sm">
                Clear
            </button>
        <?php endif; ?>
    </div>

    <!-- Table -->
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50">
            <tr>
                <th>ID</th>
                <th>Fort Name (EN)</th>
                <th>Fort Name (MR)</th>
                <th>Type (EN)</th>
                <th>Type (MR)</th>
                <th>Range (EN)</th>
                <th>Range (MR)</th>
                <th>Grade (EN)</th>
                <th>Grade (MR)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php foreach ($forts as $f): ?>
                <tr class="hover:bg-gray-50">
                    <td><?= $f['FortID'] ?></td>
                    <td><?= htmlspecialchars($f['FortName']) ?></td>
                    <td><?= htmlspecialchars($f['FortNameMar']) ?></td>
                    <td><?= htmlspecialchars($f['FortType']) ?></td>
                    <td><?= htmlspecialchars($f['FortTypeMar']) ?></td>
                    <td><?= htmlspecialchars($f['FortRange']) ?></td>
                    <td><?= htmlspecialchars($f['FortRangeMar']) ?></td>
                    <td><?= htmlspecialchars($f['Grade']) ?></td>
                    <td><?= htmlspecialchars($f['GradeMar']) ?></td>
                    <td class="flex gap-2">
                        <button onclick="viewFortMarathi(<?= $f['FortID'] ?>)" title="View">
                            <i class="fas fa-eye text-blue-600"></i>
                        </button>
                        <button onclick="editFortMarathi(<?= $f['FortID'] ?>)" title="Edit">
                            <i class="fas fa-edit text-primary"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
   <?php if ($total_pages > 1): ?>
<div class="flex justify-center items-center gap-2">

    <?php if ($page > 1): ?>
        <button onclick="loadFortsPageMarathiWithFilters(<?= $page - 1 ?>)"
                class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50">
            <i class="fas fa-chevron-left"></i>
        </button>
    <?php endif; ?>

    <?php
    $start_page = max(1, $page - 2);
    $end_page   = min($total_pages, $page + 2);

    if ($start_page > 1): ?>
        <button onclick="loadFortsPageMarathiWithFilters(1)"
                class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50">
            1
        </button>
        <?php if ($start_page > 2): ?>
            <span class="px-2">…</span>
        <?php endif; ?>
    <?php endif; ?>

    <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
        <button onclick="loadFortsPageMarathiWithFilters(<?= $i ?>)"
                class="px-3 py-1.5 rounded text-sm
                <?= $i == $page ? 'bg-primary text-white' : 'border hover:bg-gray-50' ?>">
            <?= $i ?>
        </button>
    <?php endfor; ?>

    <?php if ($end_page < $total_pages): ?>
        <?php if ($end_page < $total_pages - 1): ?>
            <span class="px-2">…</span>
        <?php endif; ?>
        <button onclick="loadFortsPageMarathiWithFilters(<?= $total_pages ?>)"
                class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50">
            <?= $total_pages ?>
        </button>
    <?php endif; ?>

    <?php if ($page < $total_pages): ?>
        <button onclick="loadFortsPageMarathiWithFilters(<?= $page + 1 ?>)"
                class="px-3 py-1.5 border rounded text-sm hover:bg-gray-50">
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
        <div class="p-4 overflow-y-auto flex-1 custom-scrollbar">
            <div id="modal-content">
                <!-- Content will be loaded here -->
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div id="modal-footer" class="flex justify-end gap-2 p-4 border-t">
            <button onclick="closeModal()" class="px-4 py-2 border rounded hover:bg-gray-50 text-sm">Cancel</button>
            <button id="save-btn" onclick="saveFortMarathi()" class="hidden px-4 py-2 bg-primary text-white rounded hover:bg-secondary text-sm">
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
