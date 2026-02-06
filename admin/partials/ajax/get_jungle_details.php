<?php
// partials/ajax/get_jungle_details.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([
        'error' => 'Invalid Jungle ID'
    ]);
    exit;
}

$jungleId = (int)$_GET['id'];

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        SELECT *
        FROM ei_tbljungleinfo
        WHERE JungleID = ?
        LIMIT 1
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $jungleId);
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
    error_log('Get Jungle Error: ' . $e->getMessage());
    echo json_encode([
        'error' => 'Server error'
    ]);
}