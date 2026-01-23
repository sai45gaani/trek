<?php
require_once '../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$page = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

/* CATEGORIES */
$cats = [];
$cq = $conn->query("SELECT DISTINCT CAT_TYPE FROM sw_tblcategories ORDER BY CAT_TYPE ASC");
while ($r = $cq->fetch_assoc()) {
    $cats[] = $r['CAT_TYPE'];
}

/* TOTAL */
$totalRes = $conn->query("SELECT COUNT(*) cnt FROM sw_tblcategories");
$totalRows = $totalRes->fetch_assoc()['cnt'];
$totalPages = ceil($totalRows / $limit);

/* DATA */
$sql = "SELECT CAT_ID, CAT_NAME, CAT_IMAGE, CAT_TYPE
        FROM sw_tblcategories
        ORDER BY CAT_ID DESC
        LIMIT $limit OFFSET $offset";
$data = $conn->query($sql);
?>

<div class="space-y-4">

    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Nature Photos</h2>
        <button onclick="openNatureModal()" class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Photo
        </button>
    </div>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Category</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Image</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php while ($row = $data->fetch_assoc()): ?>
                <tr>
                    <td class="px-3 py-2"><?= $row['CAT_ID'] ?></td>
                    <td class="px-3 py-2"><?= htmlspecialchars($row['CAT_TYPE']) ?></td>
                    <td class="px-3 py-2 font-medium"><?= htmlspecialchars($row['CAT_NAME']) ?></td>
                    <td class="px-3 py-2">
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <!-- IMAGE PREVIEW -->
                            <?php if (!empty($row['CAT_IMAGE'])): ?>
                                <img 
                                    src="../assets/images/Photos/CATEGORY/<?= htmlspecialchars($row['CAT_TYPE']) ?>/<?= htmlspecialchars($row['CAT_IMAGE']) ?>"
                                    alt="<?= htmlspecialchars($row['CAT_NAME']) ?>"
                                    class="w-40 h-28 object-cover rounded border"
                                    onerror="this.style.display='none'"
                                >
                            <?php endif; ?>

                            <!-- IMAGE NAME -->
                            <span>
                                <?= htmlspecialchars($row['CAT_IMAGE']) ?>
                            </span>
                        </div>
                    </td>
                    <td class="px-3 py-2 text-center space-x-2">
                        <button onclick="editNature(<?= $row['CAT_ID'] ?>)" class="text-green-600">
                            <i class="fas fa-edit"></i>
                        </button>
                      <!--  <button onclick="deleteNature(<?= $row['CAT_ID'] ?>)" class="text-red-600">
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
    <div class="flex justify-center gap-2 mt-4">
        <?php
        $start = max(1, $page - 2);
        $end = min($totalPages, $page + 2);

        if ($page > 1): ?>
            <button onclick="loadNaturePhotos(<?= $page-1 ?>)" class="px-3 py-1 border rounded">Prev</button>
        <?php endif; ?>

        <?php for ($i=$start; $i<=$end; $i++): ?>
            <button onclick="loadNaturePhotos(<?= $i ?>)"
                class="px-3 py-1 rounded <?= $i==$page ? 'bg-primary text-white' : 'border' ?>">
                <?= $i ?>
            </button>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <button onclick="loadNaturePhotos(<?= $page+1 ?>)" class="px-3 py-1 border rounded">Next</button>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<!-- MODAL -->
<div id="nature-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="text-lg font-bold mb-3">Nature Photo</h3>

        <input type="hidden" id="nat-id">

        <select id="nat-type" class="w-full border px-3 py-2 rounded mb-2">
            <option value="">Select Category</option>
            <?php foreach ($cats as $c): ?>
                <option value="<?= $c ?>"><?= $c ?></option>
            <?php endforeach; ?>
        </select>

        <input id="nat-name" class="w-full border p-2 rounded mb-2" placeholder="Name">
        <input id="nat-file" type="file" class="w-full border p-2 rounded mb-2">

        <div class="flex justify-end gap-2">
            <button onclick="closeNatureModal()" class="border px-4 py-2 rounded">Cancel</button>
            <button onclick="saveNature()" class="bg-primary text-white px-4 py-2 rounded">Save</button>
        </div>
    </div>
</div>
