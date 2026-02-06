<?php
// partials/ajax/get_weapon_details.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([
        'error' => 'Invalid Weapon ID'
    ]);
    exit;
}

$weaponId = (int)$_GET['id'];

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        SELECT *
        FROM ei_tblweaponinfo
        WHERE WeaponID = ?
        LIMIT 1
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $weaponId);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode([
            'error' => 'Weapon not found'
        ]);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Get Weapon Error: ' . $e->getMessage());
    echo json_encode([
        'error' => 'Server error'
    ]);
}