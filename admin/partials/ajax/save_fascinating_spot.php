<?php
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);

$db = new Database();
$conn = $db->getConnection();

$id = $data['id'] ?? '';
$fort = trim($data['FortName'] ?? '');
$name = trim($data['NameOfSpot'] ?? '');
$desc = trim($data['Description'] ?? '');

if (!$fort || !$name || !$desc) {
    echo json_encode(['success' => false, 'message' => 'All fields required']);
    exit;
}

if ($id) {
    // UPDATE
    $stmt = $conn->prepare(
        "UPDATE ei_tblfascinatingspots
         SET FortName=?, NameOfSpot=?, Description=?
         WHERE FSID=?"
    );
    $stmt->bind_param('sssi', $fort, $name, $desc, $id);
} else {
    // INSERT
    $stmt = $conn->prepare(
        "INSERT INTO ei_tblfascinatingspots (FortName, NameOfSpot, Description)
         VALUES (?, ?, ?)"
    );
    $stmt->bind_param('sss', $fort, $name, $desc);
}

$ok = $stmt->execute();
echo json_encode(['success' => $ok]);
