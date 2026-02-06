<?php
// partials/ajax/update_weapon.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

// Read JSON input
$input = file_get_contents('php://input');
$data  = json_decode($input, true);

// Validate ID
if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid Weapon ID'
    ]);
    exit;
}

$weaponId = (int)$data['id'];

// Required fields
$WeaponName = $data['WeaponName'] ?? '';
$WeaponType = $data['WeaponType'] ?? '';

// Optional fields
$WeaponEra = $data['WeaponEra'] ?? '';
$OriginCountry = $data['OriginCountry'] ?? '';
$Introduction = $data['Introduction'] ?? '';
$History = $data['History'] ?? '';
$Technology = $data['Technology'] ?? '';
$MaterialsUsed = $data['MaterialsUsed'] ?? '';
$Weight = $data['Weight'] ?? '';
$RangeCapacity = $data['RangeCapacity'] ?? '';
$FiringMechanism = $data['FiringMechanism'] ?? '';
$NotableUsageInIndia = $data['NotableUsageInIndia'] ?? '';
$RelatedBattles = $data['RelatedBattles'] ?? '';
$Advantages = $data['Advantages'] ?? '';
$Limitations = $data['Limitations'] ?? '';
$Notes = $data['Notes'] ?? '';

// Validate required
if ($WeaponName === '' || $WeaponType === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Weapon Name and Weapon Type are required'
    ]);
    exit;
}

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE ei_tblweaponinfo SET
            WeaponName = ?,
            WeaponType = ?,
            WeaponEra = ?,
            OriginCountry = ?,
            Introduction = ?,
            History = ?,
            Technology = ?,
            MaterialsUsed = ?,
            Weight = ?,
            RangeCapacity = ?,
            FiringMechanism = ?,
            NotableUsageInIndia = ?,
            RelatedBattles = ?,
            Advantages = ?,
            Limitations = ?,
            Notes = ?
        WHERE WeaponID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssi",
        $WeaponName,
        $WeaponType,
        $WeaponEra,
        $OriginCountry,
        $Introduction,
        $History,
        $Technology,
        $MaterialsUsed,
        $Weight,
        $RangeCapacity,
        $FiringMechanism,
        $NotableUsageInIndia,
        $RelatedBattles,
        $Advantages,
        $Limitations,
        $Notes,
        $weaponId
    );

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Weapon updated successfully'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Update failed'
        ]);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Update Weapon Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Server error'
    ]);
}