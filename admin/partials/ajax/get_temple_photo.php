<?php
require_once '../../../config/database.php';

$db   = new Database();
$conn = $db->getConnection();

$id = intval($_GET['id']);

$res = $conn->query(
    "SELECT PIC_ID, TempleName, PIC_NAME, PIC_DESC, PIC_FRONT_IMAGE
     FROM pm_tbltemplephotos
     WHERE PIC_ID = $id"
);

echo json_encode($res->fetch_assoc());