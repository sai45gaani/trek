<?php
require_once '../../config/database.php';

$id = intval($_GET['id'] ?? 0);

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("
    SELECT WTRID, FortName, NameOfWay, Description
    FROM ei_tblwaystoreach
    WHERE WTRID = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();

$res = $stmt->get_result()->fetch_assoc();
echo json_encode($res ?: []);
