<?php
require_once '../../../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$page = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// total count
$countRes = $conn->query("SELECT COUNT(*) as total FROM ei_tblfascinatingspots");
$total = $countRes->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

// data
$sql = "
    SELECT FSID, FortName, NameOfSpot,
           LEFT(Description, 80) AS short_desc
    FROM ei_tblfascinatingspots
    ORDER BY FSID DESC
    LIMIT ? OFFSET ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $limit, $offset);
$stmt->execute();
$res = $stmt->get_result();

$data = [];
while ($row = $res->fetch_assoc()) {
    $row['short_desc'] .= '...';
    $data[] = $row;
}

echo json_encode([
    'data' => $data,
    'total_pages' => $total_pages,
    'current_page' => $page
]);
