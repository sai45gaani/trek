<?php
require_once '../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$page  = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

/* Trek dropdown */
$treks = [];
//$q = $conn->query("SELECT TrekId, Place FROM ts_tbltrekdetails ORDER BY TrekDate DESC");
$q = $conn->query("
    SELECT TrekId, Place, DisplayDate
    FROM ts_tbltrekdetails
    ORDER BY TrekDate DESC
");
while ($r = $q->fetch_assoc()) {
    $treks[] = $r;
}

/* Count */
$total = $conn->query("SELECT COUNT(*) cnt FROM pm_tbltrekphotos")
              ->fetch_assoc()['cnt'];
$totalPages = ceil($total / $limit);

/* Data */
$sql = "SELECT p.PIC_ID, p.TrekId, t.Place,
               p.PIC_NAME, p.PIC_DESC, p.PIC_FRONT_IMAGE
        FROM pm_tbltrekphotos p
        JOIN ts_tbltrekdetails t ON p.TrekId = t.TrekId
        ORDER BY p.PIC_ID DESC
        LIMIT $limit OFFSET $offset";

$data = $conn->query($sql);
?>

<div class="space-y-4">

<div class="flex justify-between items-center">
    <h2 class="text-xl font-bold">Trek Photos</h2>
    <button onclick="openTrekPhotoModal()"
        class="bg-primary text-white px-4 py-2 rounded text-sm">
        <i class="fas fa-plus"></i> Add Photo
    </button>
</div>

<div class="bg-white shadow rounded overflow-x-auto">
<table class="min-w-full text-sm">
<thead class="bg-gray-100">
<tr>
    <th class="px-3 py-2">ID</th>
    <th class="px-3 py-2">Trek</th>
    <th class="px-3 py-2">Image</th>
    <th class="px-3 py-2">Description</th>
    <th class="px-3 py-2">Front</th>
    <th class="px-3 py-2 text-center">Actions</th>
</tr>
</thead>
<tbody class="divide-y">
<?php while ($row = $data->fetch_assoc()): ?>
<tr>
    <td class="px-3 py-2"><?= $row['PIC_ID'] ?></td>
    <td class="px-3 py-2"><?= htmlspecialchars($row['Place']) ?></td>

    <td class="px-3 py-2">
        <?php if (!empty($row['PIC_NAME'])): ?>
        <div class="flex items-center gap-2">
            <img src="../assets/images/Photos/Trek/<?= htmlspecialchars($row['PIC_NAME']) ?>"
                 class="w-40 h-28 object-cover rounded border">
            <span class="text-sm"><?= htmlspecialchars($row['PIC_NAME']) ?></span>
        </div>
        <?php else: ?>
            <span class="text-gray-400">-</span>
        <?php endif; ?>
    </td>

    <td class="px-3 py-2 text-gray-600">
        <?= htmlspecialchars(mb_strimwidth($row['PIC_DESC'], 0, 40, '...')) ?>
    </td>

    <td class="px-3 py-2">
        <?= $row['PIC_FRONT_IMAGE'] === 'Y' ? 'Yes' : '-' ?>
    </td>

    <td class="px-3 py-2 text-center">
        <button onclick="editTrekPhoto(<?= $row['PIC_ID'] ?>)"
                class="text-green-600">
            <i class="fas fa-edit"></i>
        </button>
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
$end   = min($totalPages, $page + 2);

if ($page > 1): ?>
<button onclick="loadTrekPhotos(<?= $page - 1 ?>)"
        class="px-3 py-1 border">Prev</button>
<?php endif;

for ($i = $start; $i <= $end; $i++): ?>
<button onclick="loadTrekPhotos(<?= $i ?>)"
        class="px-3 py-1 <?= $i == $page ? 'bg-primary text-white' : 'border' ?>">
    <?= $i ?>
</button>
<?php endfor;

if ($page < $totalPages): ?>
<button onclick="loadTrekPhotos(<?= $page + 1 ?>)"
        class="px-3 py-1 border">Next</button>
<?php endif; ?>

</div>
<?php endif; ?>

</div>




<!-- MODAL -->
<div id="trek-photo-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">

<div class="bg-white rounded-lg w-full max-w-lg p-4">
<h3 class="font-bold mb-3">Trek Photo</h3>

<input type="hidden" id="trp-id">

<select id="trp-trek" class="w-full border p-2 rounded mb-2">
<option value="">Select Trek</option>
<?php foreach ($treks as $t): ?>
<option value="<?= $t['TrekId'] ?>">
    #<?= $t['TrekId'] ?> - 
    <?= htmlspecialchars($t['Place']) ?> - 
    <?= htmlspecialchars($t['DisplayDate']) ?>
</option>
<?php endforeach; ?>
</select>

<input type="file" id="trp-file" class="w-full border p-2 rounded mb-2">

<textarea id="trp-desc"
          class="w-full border p-2 rounded mb-2"
          placeholder="Description"></textarea>

<label class="flex items-center gap-2 mb-3">
<input type="checkbox" id="trp-front"> Front Image
</label>

<div class="flex justify-end gap-2">
<button onclick="closeTrekPhotoModal()" class="border px-4 py-2 rounded">Cancel</button>
<button onclick="saveTrekPhoto()" class="bg-primary text-white px-4 py-2 rounded">Save</button>
</div>

</div>
</div>