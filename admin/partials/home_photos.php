<?php
require_once '../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$page  = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

/* Count */
$total = $conn->query("SELECT COUNT(*) cnt FROM pm_tblhomephotos")
              ->fetch_assoc()['cnt'];
$totalPages = ceil($total / $limit);

/* Data */
$data = $conn->query(
    "SELECT * FROM pm_tblhomephotos
     ORDER BY SORT_ORDER ASC, PIC_ID DESC
     LIMIT $limit OFFSET $offset"
);
?>

<div class="space-y-4">

<div class="flex justify-between items-center">
    <h2 class="text-xl font-bold">Home Page Photos</h2>
    <button onclick="openHomePhotoModal()"
            class="bg-primary text-white px-4 py-2 rounded text-sm">
        <i class="fas fa-plus"></i> Add Photo
    </button>
</div>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-100">
        <tr>
            <th class="px-3 py-2">Order</th>
            <th class="px-3 py-2">Image</th>
            <th class="px-3 py-2">Description</th>
            <th class="px-3 py-2">Active</th>
            <th class="px-3 py-2 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y">
        <?php while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td class="px-3 py-2"><?= $row['SORT_ORDER'] ?></td>

            <td class="px-3 py-2">
                <img src="../assets/images/Photos/Home/<?= htmlspecialchars($row['PIC_NAME']) ?>"
                    class="w-32 h-20 object-cover rounded border">
            </td>

            <td class="px-3 py-2"><?= htmlspecialchars($row['PIC_DESC']) ?></td>

            <td class="px-3 py-2">
                <?= $row['IS_ACTIVE'] === 'Y' ? 'Yes' : 'No' ?>
            </td>

            <td class="px-3 py-2 text-center">
                <button onclick="editHomePhoto(<?= $row['PIC_ID'] ?>)"
                        class="text-green-600">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php if($totalPages>1): ?>
<div class="flex justify-center gap-2 mt-4">
<?php
$start = max(1, $page-2);
$end = min($totalPages, $page+2);

if($page>1): ?>
<button onclick="loadHomePhotos(<?= $page-1 ?>)" class="border px-3 py-1">Prev</button>
<?php endif;

for($i=$start;$i<=$end;$i++): ?>
<button onclick="loadHomePhotos(<?= $i ?>)"
class="px-3 py-1 <?= $i==$page?'bg-primary text-white':'border' ?>">
<?= $i ?>
</button>
<?php endfor;

if($page<$totalPages): ?>
<button onclick="loadHomePhotos(<?= $page+1 ?>)" class="border px-3 py-1">Next</button>
<?php endif; ?>
</div>
<?php endif; ?>
</div>


</div>

<!-- MODAL -->
<div id="home-photo-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">

        <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 class="font-bold mb-3">Home Page Photo</h3>

        <input type="hidden" id="hp-id">

        <input type="file" id="hp-file"
            class="w-full border p-2 rounded mb-2">

        <input type="number" id="hp-order"
            class="w-full border p-2 rounded mb-2"
            placeholder="Sort Order (1–14)">

        <textarea id="hp-desc"
                class="w-full border p-2 rounded mb-2"
                placeholder="Description (optional)"></textarea>

        <label class="flex items-center gap-2 mb-3">
        <input type="checkbox" id="hp-active" checked> Active
        </label>

        <div class="flex justify-end gap-2">
        <button onclick="closeHomePhotoModal()" class="border px-4 py-2 rounded">
            Cancel
        </button>
        <button onclick="saveHomePhoto()" class="bg-primary text-white px-4 py-2 rounded">
            Save
        </button>
        </div>
        </div>
</div>