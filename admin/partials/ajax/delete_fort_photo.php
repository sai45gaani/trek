<?php
require_once '../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data['id']);

$conn->query("DELETE FROM pm_tblphotos_clean WHERE PIC_ID=$id");
echo json_encode(['success'=>true]);
