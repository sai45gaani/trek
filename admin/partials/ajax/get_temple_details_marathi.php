<?php
// partials/ajax/get_temple_details_marathi.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

$templeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($templeId <= 0) {
    echo json_encode([
        'error' => 'Invalid Temple ID'
    ]);
    exit;
}

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        SELECT *
        FROM mi_tbltempleinfo_unicode
        WHERE TempleID = ?
        LIMIT 1
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $templeId);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode([
            'error' => 'Temple not found'
        ]);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Get Temple Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'error' => 'Server error'
    ]);
}