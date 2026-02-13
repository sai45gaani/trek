<?php
require_once '../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$page = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

/* =======================
   FORT DROPDOWN
======================= */
$forts = [];
$fq = $conn->query("SELECT FortName FROM ei_tblfortinfo ORDER BY FortName ASC");
while ($r = $fq->fetch_assoc()) {
    $forts[] = $r['FortName'];
}

/* =======================
   TOTAL COUNT
======================= */
$totalRes = $conn->query("SELECT COUNT(*) AS cnt FROM ei_tblfascinatingspots");
$totalRows = $totalRes->fetch_assoc()['cnt'];
$totalPages = ceil($totalRows / $limit);

/* =======================
   DATA
======================= */
$sql = "
SELECT FSID, FortName, NameOfSpot, Description
FROM ei_tblfascinatingspots
ORDER BY FSID DESC
LIMIT $limit OFFSET $offset
";
$data = $conn->query($sql);
?>

<div class="space-y-4">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Fascinating Spots</h2>
        <button onclick="openSpotModal()"
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
                    <th class="px-3 py-2 text-left">Fort</th>
                    <th class="px-3 py-2 text-left">Spot Name</th>
                    <th class="px-3 py-2 text-left">Description</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php while ($row = $data->fetch_assoc()): ?>
                <tr>
                    <td class="px-3 py-2"><?= $row['FSID'] ?></td>
                    <td class="px-3 py-2"><?= htmlspecialchars($row['FortName']) ?></td>
                    <td class="px-3 py-2 font-medium"><?= htmlspecialchars($row['NameOfSpot']) ?></td>
                    <td class="px-3 py-2 text-gray-600">
                        <?= htmlspecialchars(mb_strimwidth(strip_tags($row['Description']), 0, 60, '...')) ?>
                    </td>
                    <td class="px-3 py-2 text-center space-x-2">
                        <button onclick="viewSpot(<?= $row['FSID'] ?>)"
                            class="text-blue-600">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="editSpot(<?= $row['FSID'] ?>)"
                            class="text-green-600">
                            <i class="fas fa-edit"></i>
                        </button>
                     <!--   <button onclick="deleteSpot(<?= $row['FSID'] ?>)"
                            class="text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>-->
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
<?php if ($totalPages > 1): ?>
    <div class="flex justify-center items-center gap-1 mt-4 text-sm">

        <!-- PREVIOUS -->
        <button
            onclick="loadFascinatingPage(<?= max(1, $page - 1) ?>)"
            class="px-3 py-1 rounded border <?= $page == 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
            <?= $page == 1 ? 'disabled' : '' ?>>
            Prev
        </button>

        <?php
        $start = max(1, $page - 2);
        $end   = min($totalPages, $page + 2);

        /* FIRST PAGE */
        if ($start > 1):
        ?>
            <button onclick="loadFascinatingPage(1)" class="px-3 py-1 rounded border">1</button>
            <?php if ($start > 2): ?>
                <span class="px-2">...</span>
            <?php endif; ?>
        <?php endif; ?>

        <!-- MIDDLE PAGES -->
        <?php for ($i = $start; $i <= $end; $i++): ?>
            <button
                onclick="loadFascinatingPage(<?= $i ?>)"
                class="px-3 py-1 rounded <?= $i == $page ? 'bg-primary text-white' : 'border' ?>">
                <?= $i ?>
            </button>
        <?php endfor; ?>

        <?php
        /* LAST PAGE */
        if ($end < $totalPages):
        ?>
            <?php if ($end < $totalPages - 1): ?>
                <span class="px-2">...</span>
            <?php endif; ?>
            <button onclick="loadFascinatingPage(<?= $totalPages ?>)" class="px-3 py-1 rounded border">
                <?= $totalPages ?>
            </button>
        <?php endif; ?>

        <!-- NEXT -->
        <button
            onclick="loadFascinatingPage(<?= min($totalPages, $page + 1) ?>)"
            class="px-3 py-1 rounded border <?= $page == $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>"
            <?= $page == $totalPages ? 'disabled' : '' ?>>
            Next
        </button>

    </div>
<?php endif; ?>

</div>

<!-- MODAL -->
<div id="spot-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3" id="spot-modal-title">Add Fascinating Spot</h3>

        <input type="hidden" id="fs-id">

        <div class="space-y-3">
            <select id="fs-fort" class="w-full border px-3 py-2 rounded">
                <option value="">Select Fort</option>
                <?php foreach ($forts as $f): ?>
                    <option value="<?= htmlspecialchars($f) ?>"><?= htmlspecialchars($f) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="text" id="fs-name"
                class="w-full border px-3 py-2 rounded"
                placeholder="Spot Name">

            <textarea id="fs-desc"
                class="w-full border px-3 py-2 rounded"
                rows="4"
                placeholder="Description"></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeSpotModal()" class="px-4 py-2 border rounded">Cancel</button>
            <button onclick="saveFascinatingSpot()" class="px-4 py-2 bg-primary text-white rounded">
                Save
            </button>
        </div>
    </div>
</div>

<div id="spot-modal-view" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3" id="spot-modal-title">Add Fascinating Spot</h3>

        <input type="hidden" id="fs-id-view">

        <div class="space-y-3">
            <select id="fs-fort-view" class="w-full border px-3 py-2 rounded">
                <option value="">Select Fort</option>
                <?php foreach ($forts as $f): ?>
                    <option value="<?= htmlspecialchars($f) ?>"><?= htmlspecialchars($f) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="text" id="fs-name-view"
                class="w-full border px-3 py-2 rounded"
                placeholder="Spot Name">

            <textarea id="fs-desc-view"
                class="w-full border px-3 py-2 rounded"
                rows="4"
                placeholder="Description"></textarea>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeSpotModalView()" class="px-4 py-2 border rounded">Cancel</button>
        </div>
    </div>
</div>


