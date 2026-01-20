<?php
require_once '../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$d = json_decode(file_get_contents('php://input'), true);
$conn->query("DELETE FROM sw_tblcategories WHERE CAT_ID=".(int)$d['id']);
echo json_encode(['status'=>'ok']);
