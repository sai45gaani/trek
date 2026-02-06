<?php
// partials/temples_list_marathi.php

require_once '../config/database.php';

$temples = [];
$total_count = 0;

$page   = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit  = 20;
$offset = ($page - 1) * $limit;

/* Filters (English only – SAME AS FORTS) */
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $db   = new Database();
    $conn = $db->getConnection();

    /* ---------- WHERE ---------- */
    $where  = [];
    $params = [];
    $types  = '';

    if ($search !== '') {
        $where[] = "(TempleName LIKE ? OR District LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $types .= 'ss';
    }

    $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    /* ---------- COUNT ---------- */
    $countSql = "SELECT COUNT(*) cnt FROM mi_tbltempleinfo_unicode $whereSql";
    $stmt = $conn->prepare($countSql);
    if ($params) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $total_count = $stmt->get_result()->fetch_assoc()['cnt'];
    $stmt->close();

    $total_pages = ceil($total_count / $limit);

    /* ---------- DATA ---------- */
    $sql = "
        SELECT
            TempleID,
            TempleName, TempleNameMar,
            Village, VillageMar,
            District, DistrictMar,
            MainDeity, MainDeityMar
        FROM mi_tbltempleinfo_unicode
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
    error_log('Marathi Temple List Error: ' . $e->getMessage());
}
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Marathi Temples</h1>
            <p class="text-sm text-gray-500">
                Showing <?= count($temples) ?> of <?= $total_count ?> records
            </p>
        </div>

        <button onclick="loadContent('temples-add-mar')"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Marathi Temple
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white p-3 rounded shadow flex gap-2">
        <input
            id="search-input-mar"
            value="<?= htmlspecialchars($search) ?>"
            placeholder="Search by Temple Name or District (English)"
            class="border px-3 py-2 rounded text-sm w-full">

        <button onclick="applyTempleFiltersMarathi()"
                class="bg-primary text-white px-4 py-2 rounded text-sm">
            Filter
        </button>

        <?php if ($search): ?>
            <button onclick="clearTempleFiltersMarathi()"
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
                <th>Temple Name (EN)</th>
                <th>Temple Name (MR)</th>
                <th>Village (EN)</th>
                <th>Village (MR)</th>
                <th>Deity (EN)</th>
                <th>Deity (MR)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php foreach ($temples as $t): ?>
                <tr class="hover:bg-gray-50">
                    <td><?= $t['TempleID'] ?></td>
                    <td><?= htmlspecialchars($t['TempleName']) ?></td>
                    <td><?= htmlspecialchars($t['TempleNameMar']) ?></td>
                    <td><?= htmlspecialchars($t['Village']) ?></td>
                    <td><?= htmlspecialchars($t['VillageMar']) ?></td>
                    <td><?= htmlspecialchars($t['MainDeity']) ?></td>
                    <td><?= htmlspecialchars($t['MainDeityMar']) ?></td>
                    <td class="flex gap-2">
                        <button onclick="viewTempleMarathi(<?= $t['TempleID'] ?>)" title="View">
                            <i class="fas fa-eye text-blue-600"></i>
                        </button>
                        <button onclick="editTempleMarathi(<?= $t['TempleID'] ?>)" title="Edit">
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
            <button onclick="loadTemplesPageMarathi(<?= $page - 1 ?>)"
                    class="px-3 py-1.5 border rounded text-sm">
                <i class="fas fa-chevron-left"></i>
            </button>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <button onclick="loadTemplesPageMarathi(<?= $i ?>)"
                    class="px-3 py-1.5 rounded text-sm
                    <?= $i == $page ? 'bg-primary text-white' : 'border' ?>">
                <?= $i ?>
            </button>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <button onclick="loadTemplesPageMarathi(<?= $page + 1 ?>)"
                    class="px-3 py-1.5 border rounded text-sm">
                <i class="fas fa-chevron-right"></i>
            </button>
        <?php endif; ?>

    </div>
    <?php endif; ?>

</div>