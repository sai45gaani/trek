<?php
// partials/ajax/fascinating_spot_save_marathi.php
header('Content-Type: application/json');
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);

$id   = intval($data['id'] ?? 0);
$fort = trim($data['FortName'] ?? '');
$name = trim($data['NameOfSpot'] ?? '');
$desc = trim($data['Description'] ?? '');

if (!$fort || !$name || !$desc) {
    echo json_encode([
        'success' => false,
        'message' => 'All fields are required'
    ]);
    exit;
}

$db = new Database();
$conn = $db->getConnection();

if ($id > 0) {
    // UPDATE
    $stmt = $conn->prepare("
        UPDATE mi_tblfascinatingspots_unicode
        SET FortName = ?, NameOfSpot = ?, Description = ?
        WHERE FSID = ?
    ");
    $stmt->bind_param('sssi', $fort, $name, $desc, $id);
} else {
    // INSERT
    $stmt = $conn->prepare("
        INSERT INTO mi_tblfascinatingspots_unicode
        (FortName, NameOfSpot, Description)
        VALUES (?, ?, ?)
    ");
    $stmt->bind_param('sss', $fort, $name, $desc);
}

$ok = $stmt->execute();

echo json_encode([
    'success' => $ok
]);

$stmt->close();
$conn->close();
