<?php
// partials/weapons_list.php
require_once '../config/database.php';

$weapons = [];
$total_count = 0;

$page  = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $db = new Database();
    $conn = $db->getConnection();

    $where = [];
    $params = [];
    $types  = '';

    if ($search !== '') {
        $where[] = "(WeaponName LIKE ? OR WeaponType LIKE ? OR WeaponEra LIKE ?)";
        $s = "%$search%";
        $params[] = $s;
        $params[] = $s;
        $params[] = $s;
        $types .= 'sss';
    }

    $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    // Total count
    $countSql = "SELECT COUNT(*) cnt FROM ei_tblweaponinfo $whereSql";
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

    // Data
    $sql = "
        SELECT WeaponID, WeaponName, WeaponType, WeaponEra, OriginCountry
        FROM ei_tblweaponinfo
        $whereSql
        ORDER BY WeaponName ASC
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
        $weapons[] = $row;
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Weapons list error: ' . $e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">All Weapons</h1>
            <p class="text-sm text-gray-500">
                Showing <?= count($weapons) ?> of <?= $total_count ?> weapons
                (Page <?= $page ?> of <?= max(1,$total_pages) ?>)
            </p>
        </div>

        <button
            onclick="loadContent('weapons-add')"
            class="bg-primary text-white px-4 py-2 rounded text-sm hover:bg-secondary">
            <i class="fas fa-plus mr-2"></i>Add New Weapon
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white p-3 rounded shadow flex gap-2">
        <input
            id="search-input"
            value="<?= htmlspecialchars($search) ?>"
            placeholder="Search weapon, type or era..."
            class="flex-1 border px-3 py-2 rounded text-sm">

        <button onclick="applyWeaponFilters()"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            Filter
        </button>

        <?php if ($search): ?>
            <button onclick="clearWeaponFilters()"
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
                <th class="px-4 py-2 text-left">Weapon Name</th>
                <th class="px-4 py-2 text-left">Type</th>
                <th class="px-4 py-2 text-left">Era</th>
                <th class="px-4 py-2 text-left">Origin</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php if (!$weapons): ?>
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No weapons found
                    </td>
                </tr>
            <?php else: foreach ($weapons as $w): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2"><?= $w['WeaponID'] ?></td>
                    <td class="px-4 py-2 font-medium"><?= htmlspecialchars($w['WeaponName']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($w['WeaponType']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($w['WeaponEra'] ?? '—') ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($w['OriginCountry'] ?? '—') ?></td>
                    <td class="px-4 py-2">
                        <div class="flex gap-2">
                            <button onclick="viewWeapon(<?= $w['WeaponID'] ?>)"
                                    class="text-blue-600">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="editWeapon(<?= $w['WeaponID'] ?>)"
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
                    onclick="loadWeaponPage(<?= $i ?>)"
                    class="px-3 py-1 rounded text-sm
                    <?= $i==$page ? 'bg-primary text-white' : 'border' ?>">
                    <?= $i ?>
                </button>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<script>
function loadWeaponPage(p){
    loadContent('weapons&p=' + p);
}

function applyWeaponFilters(){
    const s = document.getElementById('search-input').value;
    loadContent('weapons&search=' + encodeURIComponent(s));
}

function clearWeaponFilters(){
    loadContent('weapons');
}
</script>