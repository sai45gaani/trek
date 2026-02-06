<?php
// api/add_temple_marathi.php

require_once '../../config/database.php';
header('Content-Type: application/json');

try {
    $db   = new Database();
    $conn = $db->getConnection();

    /* Basic validation (same style as forts) */
    if (
        empty($_POST['TempleName']) ||
        empty($_POST['TempleNameMar']) ||
        empty($_POST['Village']) ||
        empty($_POST['VillageMar']) ||
        empty($_POST['District']) ||
        empty($_POST['DistrictMar']) ||
        empty($_POST['MainDeity']) ||
        empty($_POST['MainDeityMar']) ||
        empty($_POST['History'])
    ) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Required fields are missing'
        ]);
        exit;
    }

    $sql = "
        INSERT INTO mi_tbltempleinfo_unicode
        (
            TempleName, TempleNameMar,
            Village, VillageMar,
            District, DistrictMar,
            MainDeity, MainDeityMar,
            BuiltBy, BuiltByMar,
            Period, PeriodMar,
            ArchitectureMar,
            History,
            Notes,
            Date
        )
        VALUES (
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()
        )
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssss",
        $_POST['TempleName'],
        $_POST['TempleNameMar'],
        $_POST['Village'],
        $_POST['VillageMar'],
        $_POST['District'],
        $_POST['DistrictMar'],
        $_POST['MainDeity'],
        $_POST['MainDeityMar'],
        $_POST['BuiltBy'] ?? '',
        $_POST['BuiltByMar'] ?? '',
        $_POST['Period'] ?? '',
        $_POST['PeriodMar'] ?? '',
        $_POST['ArchitectureMar'] ?? '',
        $_POST['History'],
        $_POST['Notes'] ?? ''
    );

    $stmt->execute();

    echo json_encode([
        'status' => 'success'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Add Temple Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'status'  => 'error',
        'message' => 'Server error'
    ]);
}