<?php
// api/add_jungle_marathi.php

require_once '../../config/database.php';
header('Content-Type: application/json');

try {
    $db   = new Database();
    $conn = $db->getConnection();

    /* Basic validation (same style everywhere) */
    if (
        empty($_POST['JungleName']) ||
        empty($_POST['State']) ||
        empty($_POST['District'])
    ) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Required fields are missing'
        ]);
        exit;
    }

    $sql = "
        INSERT INTO mi_tbljungleinfo_unicode
        (
            JungleName, JungleNameMar,
            State, StateMar,
            District, DistrictMar,
            CoreZoneGatesMar,
            BufferZoneGatesMar,
            IntroductionMar,
            HistoryMar,
            GeographyMar,
            SafariTimingsMar,
            BestSeasonToVisitMar,
            AnimalsMar,
            BirdsMar,
            TreesMar,
            NotesMar,
            Date
        )
        VALUES (
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW()
        )
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssss",
        $_POST['JungleName'],
        $_POST['JungleNameMar'] ?? '',
        $_POST['State'],
        $_POST['StateMar'] ?? '',
        $_POST['District'],
        $_POST['DistrictMar'] ?? '',
        $_POST['CoreZoneGatesMar'] ?? '',
        $_POST['BufferZoneGatesMar'] ?? '',
        $_POST['IntroductionMar'] ?? '',
        $_POST['HistoryMar'] ?? '',
        $_POST['GeographyMar'] ?? '',
        $_POST['SafariTimingsMar'] ?? '',
        $_POST['BestSeasonToVisitMar'] ?? '',
        $_POST['AnimalsMar'] ?? '',
        $_POST['BirdsMar'] ?? '',
        $_POST['TreesMar'] ?? '',
        $_POST['NotesMar'] ?? ''
    );

    $stmt->execute();

    echo json_encode([
        'status' => 'success'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Add Jungle Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'status'  => 'error',
        'message' => 'Server error'
    ]);
}