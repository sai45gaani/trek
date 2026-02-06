<?php
// partials/ajax/get_jungle_details_marathi.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

$jungleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($jungleId <= 0) {
    echo json_encode([
        'error' => 'Invalid Jungle ID'
    ]);
    exit;
}

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        SELECT *
        FROM mi_tbljungleinfo_unicode
        WHERE JungleID = ?
        LIMIT 1
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $jungleId);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode([
            'error' => 'Jungle not found'
        ]);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Get Jungle Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'error' => 'Server error'
    ]);
}