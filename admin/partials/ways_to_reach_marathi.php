<?php
require_once '../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$page   = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit  = 10;
$offset = ($page - 1) * $limit;

/* =======================
   FORT DROPDOWN (ENGLISH)
======================= */

$forts = [];
$fq = $conn->query("
    SELECT FortName, FortNameMar
    FROM mi_tblfortinfo_unicode
    ORDER BY FortName ASC
");

while ($r = $fq->fetch_assoc()) {
    $forts[] = $r;
}

/* =======================
   TOTAL COUNT
======================= */
$totalRes  = $conn->query("SELECT COUNT(*) AS cnt FROM mi_tblwaystoreach_unicode");
$totalRows = $totalRes->fetch_assoc()['cnt'];
$totalPages = ceil($totalRows / $limit);

/* =======================
   DATA
======================= */
$sql = "
    SELECT WTRID, FortName, NameOfWay, Description
    FROM mi_tblwaystoreach_unicode
    ORDER BY WTRID DESC
    LIMIT $limit OFFSET $offset
";
$data = $conn->query($sql);
?>

<div class="space-y-4">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Ways To Reach (Marathi)</h2>
        <button onclick="openWayModalMarathi()"
            class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Route
        </button>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2 text-left">ID</th>
                    <th class="px-3 py-2 text-left">Fort (EN)</th>
                    <th class="px-3 py-2 text-left">Route Name (MR)</th>
                    <th class="px-3 py-2 text-left">Description (MR)</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if ($data && $data->num_rows > 0): ?>
                    <?php while ($row = $data->fetch_assoc()): ?>
                        <tr>
                            <td class="px-3 py-2"><?= $row['WTRID'] ?></td>
                            <td class="px-3 py-2"><?= htmlspecialchars($row['FortName']) ?></td>
                            <td class="px-3 py-2 font-medium">
                                <?= htmlspecialchars($row['NameOfWay']) ?>
                            </td>
                            <td class="px-3 py-2 text-gray-600">
                                <?= htmlspecialchars(
                                    mb_strimwidth(strip_tags($row['Description']), 0, 60, '...')
                                ) ?>
                            </td>
                            <td class="px-3 py-2 text-center space-x-2">
                                <button onclick="viewWayMarathi(<?= $row['WTRID'] ?>)"
                                    class="text-blue-600">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="editWayMarathi(<?= $row['WTRID'] ?>)"
                                    class="text-green-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            No routes found
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION (IDENTICAL LOGIC) -->
    <?php if ($totalPages > 1): ?>
        <div class="flex justify-center items-center gap-1 mt-4 text-sm">

            <button
                onclick="loadWaysPageMarathi(<?= max(1, $page - 1) ?>)"
                class="px-3 py-1 rounded border <?= $page == 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
                <?= $page == 1 ? 'disabled' : '' ?>>
                Prev
            </button>

            <?php
            $start = max(1, $page - 2);
            $end   = min($totalPages, $page + 2);

            if ($start > 1):
            ?>
                <button onclick="loadWaysPageMarathi(1)" class="px-3 py-1 rounded border">1</button>
                <?php if ($start > 2): ?><span class="px-2">...</span><?php endif; ?>
            <?php endif; ?>

            <?php for ($i = $start; $i <= $end; $i++): ?>
                <button
                    onclick="loadWaysPageMarathi(<?= $i ?>)"
                    class="px-3 py-1 rounded <?= $i == $page ? 'bg-primary text-white' : 'border' ?>">
                    <?= $i ?>
                </button>
            <?php endfor; ?>

            <?php if ($end < $totalPages): ?>
                <?php if ($end < $totalPages - 1): ?><span class="px-2">...</span><?php endif; ?>
                <button onclick="loadWaysPageMarathi(<?= $totalPages ?>)"
                    class="px-3 py-1 rounded border">
                    <?= $totalPages ?>
                </button>
            <?php endif; ?>

            <button
                onclick="loadWaysPageMarathi(<?= min($totalPages, $page + 1) ?>)"
                class="px-3 py-1 rounded border <?= $page == $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>"
                <?= $page == $totalPages ? 'disabled' : '' ?>>
                Next
            </button>

        </div>
    <?php endif; ?>

</div>


<!-- MODAL -->
<div id="way-modal-mar" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3" id="way-modal-title-mar">Add Way To Reach</h3>

        <input type="hidden" id="wtr-id-mar">

        <div class="space-y-3">
            <select id="wtr-fort-mar" class="w-full border px-3 py-2 rounded">
                <option value="">Select Fort</option>
                <?php foreach ($forts as $f): ?>
                    <option value="<?= htmlspecialchars($f['FortName']) ?>">
                        <?= htmlspecialchars($f['FortName']) ?> (<?= htmlspecialchars($f['FortNameMar']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>


            <input type="text" id="wtr-name-mar"
                class="w-full border px-3 py-2 rounded"
                placeholder="Route Name">

            <textarea id="wtr-desc-mar"
                class="w-full border px-3 py-2 rounded"
                rows="4"
                placeholder="Description"></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeWayModalMarathi()" class="px-4 py-2 border rounded">Cancel</button>
            <button onclick="saveWayToReachMarathi()" class="px-4 py-2 bg-primary text-white rounded">
                Save
            </button>
        </div>
    </div>
</div>

<div id="way-modal-view-mar" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3" id="way-modal-title">View Way To Reach</h3>

        <input type="hidden" id="wtr-id-view-mar">

        <div class="space-y-3">
            <select id="wtr-fort-view-mar" class="w-full border px-3 py-2 rounded">
                <option value="">Select Fort</option>
                <?php foreach ($forts as $f): ?>
                    <option value="<?= htmlspecialchars($f['FortName']) ?>">
                        <?= htmlspecialchars($f['FortName']) ?>
                        <?php if (!empty($f['FortNameMar'])): ?>
                            (<?= htmlspecialchars($f['FortNameMar']) ?>)
                        <?php endif; ?>
                    </option>
                <?php endforeach; ?>
            </select>


            <input type="text" id="wtr-name-view-mar"
                class="w-full border px-3 py-2 rounded"
                placeholder="Route Name">

            <textarea id="wtr-desc-view-mar"
                class="w-full border px-3 py-2 rounded"
                rows="4"
                placeholder="Description"></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeWayModalViewMarathi()" class="px-4 py-2 border rounded">Cancel</button>
            
        </div>
    </div>
</div>