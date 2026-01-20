<?php
require_once '../../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);

$db = new Database();
$conn = $db->getConnection();

if (empty($data['FortName']) || empty($data['NameOfWay'])) {
    echo json_encode(['success' => false, 'message' => 'Required fields missing']);
    exit;
}

if (!empty($data['WTRID'])) {
    $stmt = $conn->prepare("
        UPDATE ei_tblwaystoreach
        SET FortName=?, NameOfWay=?, Description=?
        WHERE WTRID=?
    ");
    $stmt->bind_param(
        "sssi",
        $data['FortName'],
        $data['NameOfWay'],
        $data['Description'],
        $data['WTRID']
    );
} else {
    $stmt = $conn->prepare("
        INSERT INTO ei_tblwaystoreach (FortName, NameOfWay, Description)
        VALUES (?, ?, ?)
    ");
    $stmt->bind_param(
        "sss",
        $data['FortName'],
        $data['NameOfWay'],
        $data['Description']
    );
}

$success = $stmt->execute();
echo json_encode(['success' => $success]);
