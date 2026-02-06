<?php
// api/add_weapon_marathi.php

require_once '../../config/database.php';
header('Content-Type: application/json');

try {
    $db   = new Database();
    $conn = $db->getConnection();

    /* Basic validation (same pattern as forts/temples) */
    if (empty($_POST['WeaponName'])) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Weapon Name (English) is required'
        ]);
        exit;
    }

    $sql = "
        INSERT INTO mi_tblweaponinfo_unicode
        (
            WeaponName,
            WeaponNameMar,
            WeaponType,
            WeaponTypeMar,
            WeaponEra,
            WeaponEraMar,
            OriginCountry,
            OriginCountryMar,
            Introduction,
            History,
            TechnologyMar,
            MaterialsUsedMar,
            FiringMechanismMar,
            Notes,
            Date
        )
        VALUES (
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()
        )
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssss",
        $_POST['WeaponName'],
        $_POST['WeaponNameMar'] ?? '',
        $_POST['WeaponType'] ?? '',
        $_POST['WeaponTypeMar'] ?? '',
        $_POST['WeaponEra'] ?? '',
        $_POST['WeaponEraMar'] ?? '',
        $_POST['OriginCountry'] ?? '',
        $_POST['OriginCountryMar'] ?? '',
        $_POST['Introduction'] ?? '',
        $_POST['History'] ?? '',
        $_POST['TechnologyMar'] ?? '',
        $_POST['MaterialsUsedMar'] ?? '',
        $_POST['FiringMechanismMar'] ?? '',
        $_POST['Notes'] ?? ''
    );

    $stmt->execute();

    echo json_encode([
        'status' => 'success'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Add Weapon Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'status'  => 'error',
        'message' => 'Server error'
    ]);
}