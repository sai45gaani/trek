<?php
require_once '../../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $conn->prepare(
    "UPDATE app_settings SET setting_value=? WHERE setting_key=?"
);

foreach ($data as $key => $value) {
    $stmt->bind_param("ss", $value, $key);
    $stmt->execute();
}

echo json_encode(['status' => 'success']);
