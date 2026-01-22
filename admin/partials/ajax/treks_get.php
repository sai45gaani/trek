<?php
require_once '../../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM TS_tblTrekDetails WHERE TrekId=$id");
echo json_encode($res->fetch_assoc());
