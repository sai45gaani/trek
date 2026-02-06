<?php
// partials/ajax/update_jungle.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

// Read JSON input
$input = file_get_contents('php://input');
$data  = json_decode($input, true);

// Validate ID
if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid Jungle ID'
    ]);
    exit;
}

$jungleId = (int)$data['id'];

// Required fields
$JungleName = $data['JungleName'] ?? '';
$State      = $data['State'] ?? '';
$District   = $data['District'] ?? '';

if ($JungleName === '' || $State === '' || $District === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Jungle Name, State and District are required'
    ]);
    exit;
}

// Optional fields
$CoreZoneGates          = $data['CoreZoneGates'] ?? '';
$BufferZoneGates        = $data['BufferZoneGates'] ?? '';
$Introduction           = $data['Introduction'] ?? '';
$History                = $data['History'] ?? '';
$Geography              = $data['Geography'] ?? '';
$SafariTimings          = $data['SafariTimings'] ?? '';
$BestSeasonToVisit      = $data['BestSeasonToVisit'] ?? '';
$OfficialWebsite        = $data['OfficialWebsite'] ?? '';
$NearestCity            = $data['NearestCity'] ?? '';
$NearestRailwayStation  = $data['NearestRailwayStation'] ?? '';
$NearestAirport         = $data['NearestAirport'] ?? '';
$DistanceDetails        = $data['DistanceDetails'] ?? '';
$Animals                = $data['Animals'] ?? '';
$Birds                  = $data['Birds'] ?? '';
$Trees                  = $data['Trees'] ?? '';
$Reptiles               = $data['Reptiles'] ?? '';
$InterestingFacts       = $data['InterestingFacts'] ?? '';
$ConservationInfo       = $data['ConservationInfo'] ?? '';
$Notes                  = $data['Notes'] ?? '';

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE ei_tbljungleinfo SET
            JungleName = ?,
            State = ?,
            District = ?,
            CoreZoneGates = ?,
            BufferZoneGates = ?,
            Introduction = ?,
            History = ?,
            Geography = ?,
            SafariTimings = ?,
            BestSeasonToVisit = ?,
            OfficialWebsite = ?,
            NearestCity = ?,
            NearestRailwayStation = ?,
            NearestAirport = ?,
            DistanceDetails = ?,
            Animals = ?,
            Birds = ?,
            Trees = ?,
            Reptiles = ?,
            InterestingFacts = ?,
            ConservationInfo = ?,
            Notes = ?
        WHERE JungleID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssssssi",
        $JungleName,
        $State,
        $District,
        $CoreZoneGates,
        $BufferZoneGates,
        $Introduction,
        $History,
        $Geography,
        $SafariTimings,
        $BestSeasonToVisit,
        $OfficialWebsite,
        $NearestCity,
        $NearestRailwayStation,
        $NearestAirport,
        $DistanceDetails,
        $Animals,
        $Birds,
        $Trees,
        $Reptiles,
        $InterestingFacts,
        $ConservationInfo,
        $Notes,
        $jungleId
    );

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Jungle updated successfully'
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
    error_log('Update Jungle Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Server error'
    ]);
}