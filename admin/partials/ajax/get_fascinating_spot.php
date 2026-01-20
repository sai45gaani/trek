<?php
require_once '../../../config/database.php';

$id = intval($_GET['id'] ?? 0);

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare(
    "SELECT FSID, FortName, NameOfSpot, Description
     FROM ei_tblfascinatingspots
     WHERE FSID = ?"
);
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();

if ($row = $res->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Record not found']);
}
