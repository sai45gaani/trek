<?php
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = intval($data['id'] ?? 0);

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("DELETE FROM ei_tblfascinatingspots WHERE FSID=?");
$stmt->bind_param('i', $id);

echo json_encode(['success' => $stmt->execute()]);
