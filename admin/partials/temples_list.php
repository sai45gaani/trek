<?php
// partials/temples_list.php
require_once '../config/database.php';

$temples = [];
$total_count = 0;

$page  = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$search   = isset($_GET['search']) ? trim($_GET['search']) : '';
$district = isset($_GET['district']) ? trim($_GET['district']) : '';

try {
    $db = new Database();
    $conn = $db->getConnection();

    $where = [];
    $params = [];
    $types  = '';

    if ($search !== '') {
        $where[] = "(TempleName LIKE ? OR Village LIKE ?)";
        $s = "%$search%";
        $params[] = $s;
        $params[] = $s;
        $types .= 'ss';
    }

    if ($district !== '') {
        $where[] = "District = ?";
        $params[] = $district;
        $types .= 's';
    }

    $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    // total count
    $countSql = "SELECT COUNT(*) cnt FROM ei_tbltempleinfo $whereSql";
    if ($params) {
        $stmt = $conn->prepare($countSql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $total_count = $stmt->get_result()->fetch_assoc()['cnt'];
        $stmt->close();
    } else {
        $total_count = $conn->query($countSql)->fetch_assoc()['cnt'];
    }

    $total_pages = ceil($total_count / $limit);

    // data
    $sql = "
        SELECT TempleID, TempleName, Village, District, MainDeity, TempleType
        FROM ei_tbltempleinfo
        $whereSql
        ORDER BY TempleName ASC
        LIMIT ? OFFSET ?
    ";

    $params[] = $limit;
    $params[] = $offset;
    $types   .= 'ii';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();

    while ($row = $res->fetch_assoc()) {
        $temples[] = $row;
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Temple list error: ' . $e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">All Temples</h1>
            <p class="text-sm text-gray-500">
                Showing <?= count($temples) ?> of <?= $total_count ?> temples
                (Page <?= $page ?> of <?= max(1,$total_pages) ?>)
            </p>
        </div>

        <button
            onclick="loadContent('temples-add')"
            class="bg-primary text-white px-4 py-2 rounded text-sm hover:bg-secondary">
            <i class="fas fa-plus mr-2"></i>Add New Temple
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white p-3 rounded shadow flex gap-2">
        <input
            id="search-input"
            value="<?= htmlspecialchars($search) ?>"
            placeholder="Search temple or village..."
            class="flex-1 border px-3 py-2 rounded text-sm">

        <button onclick="applyTempleFilters()"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            Filter
        </button>

        <?php if ($search || $district): ?>
            <button onclick="clearTempleFilters()"
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
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Temple Name</th>
                <th class="px-4 py-2 text-left">Village</th>
                <th class="px-4 py-2 text-left">District</th>
                <th class="px-4 py-2 text-left">Deity</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php if (!$temples): ?>
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No temples found
                    </td>
                </tr>
            <?php else: foreach ($temples as $t): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2"><?= $t['TempleID'] ?></td>
                    <td class="px-4 py-2 font-medium"><?= htmlspecialchars($t['TempleName']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($t['Village']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($t['District']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($t['MainDeity'] ?? '—') ?></td>
                    <td class="px-4 py-2">
                        <div class="flex gap-2">
                            <button onclick="viewTemple(<?= $t['TempleID'] ?>)"
                                    class="text-blue-600">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="editTemple(<?= $t['TempleID'] ?>)"
                                    class="text-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1): ?>
        <div class="flex justify-center gap-2">
            <?php for ($i=1;$i<=$total_pages;$i++): ?>
                <button
                    onclick="loadTemplePage(<?= $i ?>)"
                    class="px-3 py-1 rounded text-sm
                    <?= $i==$page ? 'bg-primary text-white' : 'border' ?>">
                    <?= $i ?>
                </button>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Modal -->
<div id="temple-modal"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-4xl rounded shadow flex flex-col max-h-[90vh]">
        <div class="p-4 border-b flex justify-between">
            <h2 id="temple-modal-title" class="text-xl font-bold"></h2>
            <button onclick="closeTempleModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div id="temple-modal-content"
             class="p-4 overflow-y-auto flex-1 custom-scrollbar"></div>

        <div class="p-4 border-t flex justify-end gap-2">
            <button onclick="closeTempleModal()" class="border px-4 py-2 rounded">
                Cancel
            </button>
            <button id="temple-save-btn"
                    onclick="saveTemple()"
                    class="hidden bg-primary text-white px-4 py-2 rounded">
                Save Changes
            </button>
        </div>
    </div>
</div>

<script>
function loadTemplePage(p){
    loadContent('temples&p=' + p);
}

function applyTempleFilters(){
    const s = document.getElementById('search-input').value;
    loadContent('temples&search=' + encodeURIComponent(s));
}

function clearTempleFilters(){
    loadContent('temples');
}
</script>