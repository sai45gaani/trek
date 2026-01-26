<?php
// partials/ajax/ways_to_reach_save_marathi.php
header('Content-Type: application/json');

require_once '../../../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);

$fortName   = trim($data['FortName'] ?? '');
$nameOfWay = trim($data['NameOfWay'] ?? '');
$desc       = trim($data['Description'] ?? '');
$id         = intval($data['WTRID'] ?? 0);

if ($fortName === '' || $nameOfWay === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Required fields are missing'
    ]);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    if ($id > 0) {
        // UPDATE
        $stmt = $conn->prepare("
            UPDATE mi_tblwaystoreach_unicode
            SET FortName = ?, NameOfWay = ?, Description = ?
            WHERE WTRID = ?
        ");
        $stmt->bind_param("sssi", $fortName, $nameOfWay, $desc, $id);
    } else {
        // INSERT
        $stmt = $conn->prepare("
            INSERT INTO mi_tblwaystoreach_unicode
            (FortName, NameOfWay, Description)
            VALUES (?, ?, ?)
        ");
        $stmt->bind_param("sss", $fortName, $nameOfWay, $desc);
    }

    $success = $stmt->execute();

    echo json_encode(['success' => $success]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('WTR Marathi Save Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}
