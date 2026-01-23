<?php
require_once '../../../config/database.php';
$conn = (new Database())->getConnection();

$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM admin_users WHERE admin_id=$id");
echo json_encode($res->fetch_assoc());
