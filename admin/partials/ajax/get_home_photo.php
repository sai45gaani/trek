<?php
require_once '../../../config/database.php';

$db   = new Database();
$conn = $db->getConnection();

$id = intval($_GET['id']);

$res = $conn->query(
    "SELECT PIC_ID, PIC_NAME, PIC_DESC, SORT_ORDER, IS_ACTIVE
     FROM pm_tblhomephotos
     WHERE PIC_ID = $id"
);

echo json_encode($res->fetch_assoc());