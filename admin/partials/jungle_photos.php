<?php
require_once '../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$page  = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

/* Jungle dropdown */
$jungles = [];
$q = $conn->query("SELECT JungleName FROM ei_tbljungleinfo ORDER BY JungleName");
while ($r = $q->fetch_assoc()) {
    $jungles[] = $r['JungleName'];
}

/* Count */
$total = $conn->query("SELECT COUNT(*) cnt FROM pm_tbljunglephotos")
              ->fetch_assoc()['cnt'];
$totalPages = ceil($total / $limit);

/* Data */
$sql = "SELECT PIC_ID, JungleName, PIC_NAME, PIC_DESC, PIC_FRONT_IMAGE
        FROM pm_tbljunglephotos
        ORDER BY PIC_ID DESC
        LIMIT $limit OFFSET $offset";
$data = $conn->query($sql);
?>

<div class="space-y-4">

<div class="flex justify-between items-center">
    <h2 class="text-xl font-bold">Jungle Photos</h2>
    <button onclick="openJunglePhotoModal()"
            class="bg-primary text-white px-4 py-2 rounded text-sm">
        <i class="fas fa-plus"></i> Add Photo
    </button>
</div>

<div class="bg-white shadow rounded overflow-x-auto">
<table class="min-w-full text-sm">
<thead class="bg-gray-100">
<tr>
    <th class="px-3 py-2">ID</th>
    <th class="px-3 py-2">Jungle</th>
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
    <td class="px-3 py-2"><?= htmlspecialchars($row['JungleName']) ?></td>

    <td class="px-3 py-2">
        <?php if (!empty($row['PIC_NAME'])): ?>
        <div class="flex items-center gap-2">
            <img src="../assets/images/Photos/Jungle/<?= htmlspecialchars($row['PIC_NAME']) ?>"
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
        <button onclick="editJunglePhoto(<?= $row['PIC_ID'] ?>)"
                class="text-green-600">
            <i class="fas fa-edit"></i>
        </button>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

<?php if ($totalPages > 1): ?>
<div class="flex justify-center gap-2 mt-4">
<?php
$start = max(1, $page - 2);
$end   = min($totalPages, $page + 2);

if ($page > 1): ?>
<button onclick="loadJunglePhotos(<?= $page - 1 ?>)" class="px-3 py-1 border">Prev</button>
<?php endif;

for ($i = $start; $i <= $end; $i++): ?>
<button onclick="loadJunglePhotos(<?= $i ?>)"
        class="px-3 py-1 <?= $i == $page ? 'bg-primary text-white' : 'border' ?>">
<?= $i ?>
</button>
<?php endfor;

if ($page < $totalPages): ?>
<button onclick="loadJunglePhotos(<?= $page + 1 ?>)" class="px-3 py-1 border">Next</button>
<?php endif; ?>
</div>
<?php endif; ?>

</div>

<!-- MODAL -->
<div id="jungle-photo-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">

<div class="bg-white rounded-lg w-full max-w-lg p-4">
<h3 class="font-bold mb-3">Jungle Photo</h3>

<input type="hidden" id="jp-id">

<select id="jp-jungle" class="w-full border p-2 rounded mb-2">
<option value="">Select Jungle</option>
<?php foreach ($jungles as $j): ?>
<option value="<?= htmlspecialchars($j) ?>"><?= htmlspecialchars($j) ?></option>
<?php endforeach; ?>
</select>

<input type="file" id="jp-file" class="w-full border p-2 rounded mb-2">
<textarea id="jp-desc" class="w-full border p-2 rounded mb-2"
          placeholder="Description"></textarea>

<label class="flex items-center gap-2 mb-3">
<input type="checkbox" id="jp-front"> Front Image
</label>

<div class="flex justify-end gap-2">
<button onclick="closeJunglePhotoModal()" class="border px-4 py-2 rounded">Cancel</button>
<button onclick="saveJunglePhoto()" class="bg-primary text-white px-4 py-2 rounded">Save</button>
</div>
</div>
</div>