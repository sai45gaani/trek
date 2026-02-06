<?php
// api/add_temple.php

require_once '../../config/database.php';

header('Content-Type: application/json');

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        INSERT INTO ei_tbltempleinfo
        (
            TempleName,
            Village,
            Taluka,
            District,
            NearestCity,
            MainDeity,
            TempleType,
            TempleCategory,
            NoOfTemplesInComplex,
            Introduction,
            Importance,
            History,
            Architecture,
            Orientation,
            NearbyPlaces,
            SanctuaryInfo,
            HowToReach,
            TrekkingRoutes,
            BestSeasonToVisit,
            Notes,
            Date
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssssssssssssss",
        $_POST['TempleName'],
        $_POST['Village'],
        $_POST['Taluka'],
        $_POST['District'],
        $_POST['NearestCity'],
        $_POST['MainDeity'],
        $_POST['TempleType'],
        $_POST['TempleCategory'],
        $_POST['NoOfTemplesInComplex'],
        $_POST['Introduction'],
        $_POST['Importance'],
        $_POST['History'],
        $_POST['Architecture'],
        $_POST['Orientation'],
        $_POST['NearbyPlaces'],
        $_POST['SanctuaryInfo'],
        $_POST['HowToReach'],
        $_POST['TrekkingRoutes'],
        $_POST['BestSeasonToVisit'],
        $_POST['Notes']
    );

    $stmt->execute();

    echo json_encode([
        'status' => 'success'
    ]);

} catch (Exception $e) {

    echo json_encode([
        'status'  => 'error',
        'message' => $e->getMessage()
    ]);
}