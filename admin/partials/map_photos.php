<?php
require_once '../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$page = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

/* FORT DROPDOWN */
$forts = [];
$q = $conn->query("SELECT FortName FROM EI_tblFortInfo ORDER BY FortName");
while ($r = $q->fetch_assoc()) $forts[] = $r['FortName'];

/* COUNT */
$totalRes = $conn->query("SELECT COUNT(*) cnt FROM mm_tblmapinfo_clean");
$totalRows = $totalRes->fetch_assoc()['cnt'];
$totalPages = ceil($totalRows / $limit);

/* DATA */
$data = $conn->query("
    SELECT MapID, FortName, MapType, MapName, MapPath, Description
    FROM mm_tblmapinfo_clean
    ORDER BY MapID DESC
    LIMIT $limit OFFSET $offset
");
?>

<div class="space-y-4">

<div class="flex justify-between items-center">
    <h2 class="text-xl font-bold">Map Photos</h2>
    <button onclick="openMapModal()" class="bg-primary text-white px-4 py-2 rounded">
        <i class="fas fa-plus mr-1"></i>Add Map
    </button>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
<table class="min-w-full text-sm">
<thead class="bg-gray-100">
<tr>
    <th class="px-3 py-2">ID</th>
    <th class="px-3 py-2">Fort</th>
    <th class="px-3 py-2">Type</th>
    <th class="px-3 py-2">Name</th>
    <th class="px-3 py-2">Description</th>
    <th class="px-3 py-2 text-center">Actions</th>
</tr>
</thead>
<tbody class="divide-y">
<?php while($row=$data->fetch_assoc()): ?>
<tr>
    <td class="px-3 py-2"><?= $row['MapID'] ?></td>
    <td class="px-3 py-2"><?= htmlspecialchars($row['FortName']) ?></td>
    <td class="px-3 py-2"><?= htmlspecialchars($row['MapType']) ?></td>
    <td class="px-3 py-2 font-medium"><?= htmlspecialchars($row['MapName']) ?></td>
    <td class="px-3 py-2 text-gray-600">
        <?= htmlspecialchars(mb_strimwidth(strip_tags($row['Description']),0,60,'...')) ?>
    </td>
    <td class="px-3 py-2 text-center space-x-2">
        <button onclick="editMap(<?= $row['MapID'] ?>)" class="text-green-600">
            <i class="fas fa-edit"></i>
        </button>
        <button onclick="deleteMap(<?= $row['MapID'] ?>)" class="text-red-600">
            <i class="fas fa-trash"></i>
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
<button onclick="loadMapPhotos(<?= $page-1 ?>)" class="border px-3 py-1">Prev</button>
<?php endif;

for($i=$start;$i<=$end;$i++): ?>
<button onclick="loadMapPhotos(<?= $i ?>)"
class="px-3 py-1 <?= $i==$page?'bg-primary text-white':'border' ?>">
<?= $i ?>
</button>
<?php endfor;

if($page<$totalPages): ?>
<button onclick="loadMapPhotos(<?= $page+1 ?>)" class="border px-3 py-1">Next</button>
<?php endif; ?>
</div>
<?php endif; ?>
</div>

<!-- MODAL -->
<div id="map-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
<div class="bg-white rounded-lg w-full max-w-lg p-4">
<h3 class="text-lg font-bold mb-3">Map</h3>

<input type="hidden" id="map-id">

<select id="map-fort" class="w-full border p-2 rounded mb-2">
<option value="">Select Fort</option>
<?php foreach($forts as $f): ?>
<option value="<?= htmlspecialchars($f) ?>"><?= htmlspecialchars($f) ?></option>
<?php endforeach; ?>
</select>

<input id="map-type" class="w-full border p-2 rounded mb-2" placeholder="Map Type">
<input id="map-name" class="w-full border p-2 rounded mb-2" placeholder="Map Name">
<textarea id="map-desc" class="w-full border p-2 rounded mb-2" rows="3" placeholder="Description"></textarea>
<input type="file" id="map-file" class="w-full border p-2 rounded mb-3">

<div class="flex justify-end gap-2">
<button onclick="closeMapModal()" class="border px-4 py-2 rounded">Cancel</button>
<button onclick="saveMap()" class="bg-primary text-white px-4 py-2 rounded">Save</button>
</div>
</div>
</div>
