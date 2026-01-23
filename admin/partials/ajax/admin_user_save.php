<?php
require_once '../../../config/database.php';
$conn = (new Database())->getConnection();
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['id'])) {
    if (!empty($data['password'])) {
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("
            UPDATE admin_users
            SET username=?, full_name=?, email=?, role=?, password=?
            WHERE admin_id=?
        ");
        $stmt->bind_param("sssssi",
            $data['username'], $data['fullname'], $data['email'],
            $data['role'], $pass, $data['id']
        );
    } else {
        $stmt = $conn->prepare("
            UPDATE admin_users
            SET username=?, full_name=?, email=?, role=?
            WHERE admin_id=?
        ");
        $stmt->bind_param("ssssi",
            $data['username'], $data['fullname'],
            $data['email'], $data['role'], $data['id']
        );
    }
} else {
    $pass = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("
        INSERT INTO admin_users (username,password,email,full_name,role)
        VALUES (?,?,?,?,?)
    ");
    $stmt->bind_param("sssss",
        $data['username'], $pass,
        $data['email'], $data['fullname'], $data['role']
    );
}

$stmt->execute();
echo json_encode(['success'=>true]);
