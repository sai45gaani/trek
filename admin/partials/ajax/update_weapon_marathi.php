<?php
// partials/ajax/update_weapon_marathi.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid Weapon ID'
    ]);
    exit;
}

$weaponId = (int)$data['id'];

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE mi_tblweaponinfo_unicode SET
            WeaponName            = ?,
            WeaponNameMar         = ?,
            WeaponType            = ?,
            WeaponTypeMar         = ?,
            WeaponEra             = ?,
            WeaponEraMar          = ?,
            OriginCountry         = ?,
            OriginCountryMar      = ?,
            Introduction          = ?,
            History               = ?,
            TechnologyMar         = ?,
            MaterialsUsedMar      = ?,
            FiringMechanismMar    = ?,
            Notes                 = ?
        WHERE WeaponID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssi",
        $data['WeaponName'],
        $data['WeaponNameMar'],
        $data['WeaponType'],
        $data['WeaponTypeMar'],
        $data['WeaponEra'],
        $data['WeaponEraMar'],
        $data['OriginCountry'],
        $data['OriginCountryMar'],
        $data['Introduction'],
        $data['History'],
        $data['TechnologyMar'],
        $data['MaterialsUsedMar'],
        $data['FiringMechanismMar'],
        $data['Notes'],
        $weaponId
    );

    $stmt->execute();

    echo json_encode([
        'success' => true,
        'message' => 'Weapon updated successfully'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Update Weapon Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Update failed'
    ]);
}