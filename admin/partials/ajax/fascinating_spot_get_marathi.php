<?php
// partials/ajax/fascinating_spot_get_marathi.php
header('Content-Type: application/json');
require_once '../../../config/database.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(['error' => 'Invalid ID']);
    exit;
}

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("
    SELECT FSID, FortName, NameOfSpot, Description
    FROM mi_tblfascinatingspots_unicode
    WHERE FSID = ?
");
$stmt->bind_param('i', $id);
$stmt->execute();

$res = $stmt->get_result();

if ($row = $res->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Record not found']);
}

$stmt->close();
$conn->close();
