<?php
// api/add_jungle.php

require_once '../../config/database.php';
header('Content-Type: application/json');

try {
    $db   = new Database();
    $conn = $db->getConnection();

    // Required fields
    if (
        empty($_POST['JungleName']) ||
        empty($_POST['State']) ||
        empty($_POST['District'])
    ) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Jungle Name, State and District are required'
        ]);
        exit;
    }

    $sql = "
        INSERT INTO ei_tbljungleinfo
        (
            JungleName,
            State,
            District,
            CoreZoneGates,
            BufferZoneGates,
            Introduction,
            History,
            Geography,
            SafariTimings,
            BestSeasonToVisit,
            OfficialWebsite,
            NearestCity,
            NearestRailwayStation,
            NearestAirport,
            DistanceDetails,
            Animals,
            Birds,
            Trees,
            Reptiles,
            InterestingFacts,
            ConservationInfo,
            Notes,
            IntroductionWTR,
            IntroductionFS,
            Date
        )
        VALUES (
            ?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,
            ?,?, NOW()
        )
    ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssssssssssssssss",
        $_POST['JungleName'],
        $_POST['State'],
        $_POST['District'],
        $_POST['CoreZoneGates'] ?? '',
        $_POST['BufferZoneGates'] ?? '',
        $_POST['Introduction'] ?? '',
        $_POST['History'] ?? '',
        $_POST['Geography'] ?? '',
        $_POST['SafariTimings'] ?? '',
        $_POST['BestSeasonToVisit'] ?? '',
        $_POST['OfficialWebsite'] ?? '',
        $_POST['NearestCity'] ?? '',
        $_POST['NearestRailwayStation'] ?? '',
        $_POST['NearestAirport'] ?? '',
        $_POST['DistanceDetails'] ?? '',
        $_POST['Animals'] ?? '',
        $_POST['Birds'] ?? '',
        $_POST['Trees'] ?? '',
        $_POST['Reptiles'] ?? '',
        $_POST['InterestingFacts'] ?? '',
        $_POST['ConservationInfo'] ?? '',
        $_POST['Notes'] ?? '',
        $_POST['IntroductionWTR'] ?? '',
        $_POST['IntroductionFS'] ?? ''
    );

    $stmt->execute();

    echo json_encode([
        'status' => 'success'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Add Jungle Error: ' . $e->getMessage());
    echo json_encode([
        'status'  => 'error',
        'message' => 'Server error while adding jungle'
    ]);
}