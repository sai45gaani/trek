<?php
require_once '../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$page = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

/* SEARCH */
$search = $_GET['search'] ?? '';
$where = '';
if ($search !== '') {
    $s = $conn->real_escape_string($search);
    $where = "WHERE Place LIKE '%$s%' OR Leader LIKE '%$s%'";
}

/* COUNT */
$totalRes = $conn->query("SELECT COUNT(*) AS cnt FROM TS_tblTrekDetails $where");
$totalRows = $totalRes->fetch_assoc()['cnt'];
$totalPages = ceil($totalRows / $limit);

/* DATA */
$sql = "
SELECT TrekId, Place, TrekDate, Leader, Grade, MaxParticipants
FROM TS_tblTrekDetails
$where
ORDER BY TrekDate DESC
LIMIT $limit OFFSET $offset
";
$data = $conn->query($sql);
?>

<div id="trek-modal"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div id="trek-modal-content"
         class="bg-white rounded-lg w-full max-w-2xl p-4">
        <!-- trek_add.php loads here -->
    </div>
</div>

<div class="space-y-4">

    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Treks</h2>
        <button onclick="openTrekModal()" class="bg-primary text-white px-4 py-2 rounded text-sm">
            <i class="fas fa-plus mr-1"></i>Add Trek
        </button>
    </div>

    <input type="text"
           placeholder="Search trek or leader..."
           class="border px-3 py-2 rounded w-64"
           onkeyup="loadTreks(1,this.value)">

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-3 py-2">ID</th>
                <th class="px-3 py-2">Place</th>
                <th class="px-3 py-2">Date</th>
                <th class="px-3 py-2">Leader</th>
                <th class="px-3 py-2">Grade</th>
                <th class="px-3 py-2">Max</th>
                <th class="px-3 py-2 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            <?php while ($r = $data->fetch_assoc()): ?>
                <tr>
                    <td class="px-3 py-2"><?= $r['TrekId'] ?></td>
                    <td class="px-3 py-2 font-medium"><?= htmlspecialchars($r['Place']) ?></td>
                    <td class="px-3 py-2"><?= date('d M Y', strtotime($r['TrekDate'])) ?></td>
                    <td class="px-3 py-2"><?= htmlspecialchars($r['Leader']) ?></td>
                    <td class="px-3 py-2"><?= htmlspecialchars($r['Grade']) ?></td>
                    <td class="px-3 py-2"><?= $r['MaxParticipants'] ?></td>
                    <td class="px-3 py-2 text-center space-x-2">
                        <button onclick="editTrek(<?= $r['TrekId'] ?>)" class="text-green-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteTrek(<?= $r['TrekId'] ?>)" class="text-red-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php if ($totalPages > 1): ?>
    <div class="flex justify-center items-center gap-1 mt-4 text-sm">

        <!-- PREVIOUS -->
        <button
            onclick="loadTreks(<?= max(1, $page - 1) ?>)"
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
            <button onclick="loadTreks(1)" class="px-3 py-1 rounded border">1</button>
            <?php if ($start > 2): ?>
                <span class="px-2">...</span>
            <?php endif; ?>
        <?php endif; ?>

        <!-- MIDDLE PAGES -->
        <?php for ($i = $start; $i <= $end; $i++): ?>
            <button
                onclick="loadTreks(<?= $i ?>)"
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
            <button onclick="loadTreks(<?= $totalPages ?>)" class="px-3 py-1 rounded border">
                <?= $totalPages ?>
            </button>
        <?php endif; ?>

        <!-- NEXT -->
        <button
            onclick="loadTreks(<?= min($totalPages, $page + 1) ?>)"
            class="px-3 py-1 rounded border <?= $page == $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>"
            <?= $page == $totalPages ? 'disabled' : '' ?>>
            Next
        </button>

    </div>
<?php endif; ?>


</div>


