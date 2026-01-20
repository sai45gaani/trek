<?php
require_once '../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$id = intval($_GET['id']);
$r = $conn->query("SELECT * FROM sw_tblcategories WHERE CAT_ID=$id");
echo json_encode($r->fetch_assoc());
