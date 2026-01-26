<?php
// partials/ajax/ways_to_reach_delete_marathi.php
header('Content-Type: application/json');

require_once '../../../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(['success' => false]);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("
        DELETE FROM mi_tblwaystoreach_unicode
        WHERE WTRID = ?
    ");
    $stmt->bind_param("i", $id);

    echo json_encode(['success' => $stmt->execute()]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('WTR Marathi Delete Error: ' . $e->getMessage());
    echo json_encode(['success' => false]);
}
