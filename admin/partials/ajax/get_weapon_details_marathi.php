<?php
// partials/ajax/get_weapon_details_marathi.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

$weaponId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($weaponId <= 0) {
    echo json_encode([
        'error' => 'Invalid Weapon ID'
    ]);
    exit;
}

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        SELECT *
        FROM mi_tblweaponinfo_unicode
        WHERE WeaponID = ?
        LIMIT 1
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $weaponId);
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
    error_log('Get Weapon Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'error' => 'Server error'
    ]);
}