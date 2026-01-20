<?php
require_once '../../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);

$db = new Database();
$conn = $db->getConnection();

$id = intval($data['id'] ?? 0);

$stmt = $conn->prepare("DELETE FROM ei_tblwaystoreach WHERE WTRID = ?");
$stmt->bind_param("i", $id);

echo json_encode(['success' => $stmt->execute()]);
