<?php
// partials/jungles_list_marathi.php

require_once '../config/database.php';

$jungles = [];
$total_count = 0;

$page   = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit  = 20;
$offset = ($page - 1) * $limit;

/* Filter (English only – SAME pattern) */
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $db   = new Database();
    $conn = $db->getConnection();

    /* WHERE */
    $where = [];
    $params = [];
    $types = '';

    if ($search !== '') {
        $where[] = "(JungleName LIKE ? OR District LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $types .= 'ss';
    }

    $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    /* COUNT */
    $countSql = "SELECT COUNT(*) cnt FROM mi_tbljungleinfo_unicode $whereSql";
    $stmt = $conn->prepare($countSql);
    if ($params) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $total_count = $stmt->get_result()->fetch_assoc()['cnt'];
    $stmt->close();

    $total_pages = ceil($total_count / $limit);

    /* DATA */
    $sql = "
        SELECT
            JungleID,
            JungleName, JungleNameMar,
            State, StateMar,
            District, DistrictMar
        FROM mi_tbljungleinfo_unicode
        $whereSql
        ORDER BY JungleName ASC
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
        $jungles[] = $row;
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Marathi Jungle List Error: ' . $e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Marathi Jungles</h1>
            <p class="text-sm text-gray-500">
                Showing <?= count($jungles) ?> of <?= $total_count ?> records
            </p>
        </div>

        <button onclick="loadContent('jungles-add-mar')"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Marathi Jungle
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white p-3 rounded shadow flex gap-2">
        <input id="search-input-mar"
               value="<?= htmlspecialchars($search) ?>"
               placeholder="Search by Jungle Name or District (English)"
               class="border px-3 py-2 rounded text-sm w-full">

        <button onclick="applyJungleFiltersMarathi()"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            Filter
        </button>

        <?php if ($search): ?>
            <button onclick="clearJungleFiltersMarathi()"
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
                <th>Jungle Name (EN)</th>
                <th>Jungle Name (MR)</th>
                <th>State (EN)</th>
                <th>State (MR)</th>
                <th>District (EN)</th>
                <th>District (MR)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php foreach ($jungles as $j): ?>
                <tr class="hover:bg-gray-50">
                    <td><?= $j['JungleID'] ?></td>
                    <td><?= htmlspecialchars($j['JungleName']) ?></td>
                    <td><?= htmlspecialchars($j['JungleNameMar']) ?></td>
                    <td><?= htmlspecialchars($j['State']) ?></td>
                    <td><?= htmlspecialchars($j['StateMar']) ?></td>
                    <td><?= htmlspecialchars($j['District']) ?></td>
                    <td><?= htmlspecialchars($j['DistrictMar']) ?></td>
                    <td class="flex gap-2">
                        <button onclick="viewJungleMarathi(<?= $j['JungleID'] ?>)">
                            <i class="fas fa-eye text-blue-600"></i>
                        </button>
                        <button onclick="editJungleMarathi(<?= $j['JungleID'] ?>)">
                            <i class="fas fa-edit text-primary"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>