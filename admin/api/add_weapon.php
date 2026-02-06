<?php
// api/add_weapon.php

require_once '../../config/database.php';

header('Content-Type: application/json');

try {
    $db   = new Database();
    $conn = $db->getConnection();

    // Basic validation
    if (
        empty($_POST['WeaponName']) ||
        empty($_POST['WeaponType'])
    ) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Weapon Name and Weapon Type are required'
        ]);
        exit;
    }

    $sql = "
        INSERT INTO ei_tblweaponinfo
        (
            WeaponName,
            WeaponType,
            WeaponEra,
            OriginCountry,
            Introduction,
            History,
            Technology,
            MaterialsUsed,
            Weight,
            RangeCapacity,
            FiringMechanism,
            NotableUsageInIndia,
            RelatedBattles,
            Advantages,
            Limitations,
            Notes,
            Date
        )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, NOW())
    ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssssssssss",
        $_POST['WeaponName'],
        $_POST['WeaponType'],
        $_POST['WeaponEra'],
        $_POST['OriginCountry'],
        $_POST['Introduction'],
        $_POST['History'],
        $_POST['Technology'],
        $_POST['MaterialsUsed'],
        $_POST['Weight'],
        $_POST['RangeCapacity'],
        $_POST['FiringMechanism'],
        $_POST['NotableUsageInIndia'],
        $_POST['RelatedBattles'],
        $_POST['Advantages'],
        $_POST['Limitations'],
        $_POST['Notes']
    );

    $stmt->execute();

    echo json_encode([
        'status' => 'success'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Add Weapon Error: ' . $e->getMessage());
    echo json_encode([
        'status'  => 'error',
        'message' => 'Server error while adding weapon'
    ]);
}