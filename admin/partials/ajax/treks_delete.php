<?php
require_once '../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$id = intval($_POST['id']);
$conn->query("DELETE FROM ts_tbltrekdetails WHERE TrekId=$id");
echo json_encode(['success'=>true]);
