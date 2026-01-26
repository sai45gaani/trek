<?php
// partials/ajax/ways_to_reach_get_marathi.php
header('Content-Type: application/json');

require_once '../../../config/database.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    echo json_encode([]);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("
        SELECT WTRID, FortName, NameOfWay, Description
        FROM mi_tblwaystoreach_unicode
        WHERE WTRID = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $res = $stmt->get_result()->fetch_assoc();
    echo json_encode($res ?: []);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('WTR Marathi Get Error: ' . $e->getMessage());
    echo json_encode([]);
}
