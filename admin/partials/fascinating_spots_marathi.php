<?php
require_once '../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$page   = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit  = 10;
$offset = ($page - 1) * $limit;

/* =======================
   FORT DROPDOWN (EN + MR)
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
$totalRes  = $conn->query("SELECT COUNT(*) AS cnt FROM mi_tblfascinatingspots_unicode");
$totalRows = $totalRes->fetch_assoc()['cnt'];
$totalPages = ceil($totalRows / $limit);

/* =======================
   DATA
======================= */
$sql = "
    SELECT FSID, FortName, NameOfSpot, Description
    FROM mi_tblfascinatingspots_unicode
    ORDER BY FSID DESC
    LIMIT $limit OFFSET $offset
";
$data = $conn->query($sql);
?>

<div class="space-y-4">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Fascinating Spots (Marathi)</h2>
        <button onclick="openSpotModalMarathi()"
            class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Spot
        </button>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2 text-left">ID</th>
                    <th class="px-3 py-2 text-left">Fort (EN)</th>
                    <th class="px-3 py-2 text-left">Spot Name (MR)</th>
                    <th class="px-3 py-2 text-left">Description (MR)</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if ($data && $data->num_rows > 0): ?>
                    <?php while ($row = $data->fetch_assoc()): ?>
                        <tr>
                            <td class="px-3 py-2"><?= $row['FSID'] ?></td>
                            <td class="px-3 py-2"><?= htmlspecialchars($row['FortName']) ?></td>
                            <td class="px-3 py-2 font-medium">
                                <?= htmlspecialchars($row['NameOfSpot']) ?>
                            </td>
                            <td class="px-3 py-2 text-gray-600">
                                <?= htmlspecialchars(
                                    mb_strimwidth(strip_tags($row['Description']), 0, 60, '...')
                                ) ?>
                            </td>
                            <td class="px-3 py-2 text-center space-x-2">
                                <button onclick="viewSpotMarathi(<?= $row['FSID'] ?>)"
                                    class="text-blue-600">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="editSpotMarathi(<?= $row['FSID'] ?>)"
                                    class="text-green-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            No fascinating spots found
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION (IDENTICAL TO ENGLISH) -->
    <?php if ($totalPages > 1): ?>
        <div class="flex justify-center items-center gap-1 mt-4 text-sm">

            <button
                onclick="loadFascinatingPageMarathi(<?= max(1, $page - 1) ?>)"
                class="px-3 py-1 rounded border <?= $page == 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
                <?= $page == 1 ? 'disabled' : '' ?>>
                Prev
            </button>

            <?php
            $start = max(1, $page - 2);
            $end   = min($totalPages, $page + 2);

            if ($start > 1):
            ?>
                <button onclick="loadFascinatingPageMarathi(1)" class="px-3 py-1 rounded border">1</button>
                <?php if ($start > 2): ?><span class="px-2">...</span><?php endif; ?>
            <?php endif; ?>

            <?php for ($i = $start; $i <= $end; $i++): ?>
                <button
                    onclick="loadFascinatingPageMarathi(<?= $i ?>)"
                    class="px-3 py-1 rounded <?= $i == $page ? 'bg-primary text-white' : 'border' ?>">
                    <?= $i ?>
                </button>
            <?php endfor; ?>

            <?php if ($end < $totalPages): ?>
                <?php if ($end < $totalPages - 1): ?><span class="px-2">...</span><?php endif; ?>
                <button onclick="loadFascinatingPageMarathi(<?= $totalPages ?>)"
                    class="px-3 py-1 rounded border">
                    <?= $totalPages ?>
                </button>
            <?php endif; ?>

            <button
                onclick="loadFascinatingPageMarathi(<?= min($totalPages, $page + 1) ?>)"
                class="px-3 py-1 rounded border <?= $page == $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>"
                <?= $page == $totalPages ? 'disabled' : '' ?>>
                Next
            </button>

        </div>
    <?php endif; ?>

</div>


<!-- MODAL -->
<!-- ADD / EDIT MODAL (MARATHI) -->
<div id="spot-modal-mar" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3" id="spot-modal-title-mar">
            Add Fascinating Spot (Marathi)
        </h3>

        <input type="hidden" id="fs-id-mar">

        <div class="space-y-3">

            <!-- Fort (English reference) -->
            <select id="fs-fort-mar" class="w-full border px-3 py-2 rounded">
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

            <!-- Spot Name (Marathi) -->
            <input type="text"
                   id="fs-name-mar"
                   class="w-full border px-3 py-2 rounded"
                   placeholder="Spot Name (Marathi)">

            <!-- Description (Marathi) -->
            <textarea id="fs-desc-mar"
                      class="w-full border px-3 py-2 rounded"
                      rows="4"
                      placeholder="Description (Marathi)"></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeSpotModalMarathi()"
                    class="px-4 py-2 border rounded">
                Cancel
            </button>
            <button onclick="saveFascinatingSpotMarathi()"
                    class="px-4 py-2 bg-primary text-white rounded">
                Save
            </button>
        </div>
    </div>
</div>

<!-- VIEW MODAL (MARATHI) -->
<div id="spot-modal-view-mar" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3">
            View Fascinating Spot (Marathi)
        </h3>

        <input type="hidden" id="fs-id-view-mar">

        <div class="space-y-3">

            <!-- Fort -->
            <select id="fs-fort-view-mar"
                    class="w-full border px-3 py-2 rounded"
                    disabled>
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

            <!-- Spot Name -->
            <input type="text"
                   id="fs-name-view-mar"
                   class="w-full border px-3 py-2 rounded"
                   placeholder="Spot Name (Marathi)"
                   readonly>

            <!-- Description -->
            <textarea id="fs-desc-view-mar"
                      class="w-full border px-3 py-2 rounded"
                      rows="4"
                      placeholder="Description (Marathi)"
                      readonly></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeSpotModalViewMarathi()"
                    class="px-4 py-2 border rounded">
                Close
            </button>
        </div>
    </div>
</div>

