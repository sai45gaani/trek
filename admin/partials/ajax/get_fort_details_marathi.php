<?php
header('Content-Type: application/json');
require_once '../../../config/database.php';

$fortId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($fortId <= 0) {
    echo json_encode(['error' => 'Invalid fort ID']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM mi_tblfortinfo_unicode WHERE FortID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $fortId);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Fort not found']);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Get Marathi Fort Error: '.$e->getMessage());
    echo json_encode(['error' => 'Database error']);
}
