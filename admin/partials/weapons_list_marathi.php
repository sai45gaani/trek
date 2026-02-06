<?php
// partials/weapons_list_marathi.php

require_once '../config/database.php';

$weapons = [];
$total_count = 0;

$page   = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit  = 20;
$offset = ($page - 1) * $limit;

/* Filter (English only) */
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $db   = new Database();
    $conn = $db->getConnection();

    /* WHERE */
    $where = [];
    $params = [];
    $types = '';

    if ($search !== '') {
        $where[] = "(WeaponName LIKE ? OR WeaponType LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $types .= 'ss';
    }

    $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    /* COUNT */
    $countSql = "SELECT COUNT(*) cnt FROM mi_tblweaponinfo_unicode $whereSql";
    $stmt = $conn->prepare($countSql);
    if ($params) $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $total_count = $stmt->get_result()->fetch_assoc()['cnt'];
    $stmt->close();

    $total_pages = ceil($total_count / $limit);

    /* DATA */
    $sql = "
        SELECT
            WeaponID,
            WeaponName, WeaponNameMar,
            WeaponType, WeaponTypeMar,
            WeaponEra, WeaponEraMar
        FROM mi_tblweaponinfo_unicode
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
    error_log('Marathi Weapons List Error: ' . $e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Marathi Weapons</h1>
            <p class="text-sm text-gray-500">
                Showing <?= count($weapons) ?> of <?= $total_count ?> records
            </p>
        </div>

        <button onclick="loadContent('weapons-add-mar')"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Marathi Weapon
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white p-3 rounded shadow flex gap-2">
        <input id="search-input-mar"
               value="<?= htmlspecialchars($search) ?>"
               placeholder="Search by Weapon Name or Type (English)"
               class="border px-3 py-2 rounded text-sm w-full">

        <button onclick="applyWeaponFiltersMarathi()"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            Filter
        </button>

        <?php if ($search): ?>
            <button onclick="clearWeaponFiltersMarathi()"
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
                <th>Weapon Name (EN)</th>
                <th>Weapon Name (MR)</th>
                <th>Type (EN)</th>
                <th>Type (MR)</th>
                <th>Era (EN)</th>
                <th>Era (MR)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php foreach ($weapons as $w): ?>
                <tr class="hover:bg-gray-50">
                    <td><?= $w['WeaponID'] ?></td>
                    <td><?= htmlspecialchars($w['WeaponName']) ?></td>
                    <td><?= htmlspecialchars($w['WeaponNameMar']) ?></td>
                    <td><?= htmlspecialchars($w['WeaponType']) ?></td>
                    <td><?= htmlspecialchars($w['WeaponTypeMar']) ?></td>
                    <td><?= htmlspecialchars($w['WeaponEra']) ?></td>
                    <td><?= htmlspecialchars($w['WeaponEraMar']) ?></td>
                    <td class="flex gap-2">
                        <button onclick="viewWeaponMarathi(<?= $w['WeaponID'] ?>)">
                            <i class="fas fa-eye text-blue-600"></i>
                        </button>
                        <button onclick="editWeaponMarathi(<?= $w['WeaponID'] ?>)">
                            <i class="fas fa-edit text-primary"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>