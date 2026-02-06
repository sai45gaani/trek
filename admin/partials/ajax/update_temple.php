<?php
// partials/ajax/update_temple.php

header('Content-Type: application/json');

require_once '../../../config/database.php';

// Read JSON input
$input = file_get_contents('php://input');
$data  = json_decode($input, true);

// Validate ID
if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid Temple ID'
    ]);
    exit;
}

$templeId = (int)$data['id'];

// Required
$TempleName = $data['TempleName'] ?? '';
$Village    = $data['Village'] ?? '';
$District   = $data['District'] ?? '';

// Optional
$Taluka      = $data['Taluka'] ?? '';
$NearestCity = $data['NearestCity'] ?? '';
$MainDeity   = $data['MainDeity'] ?? '';
$TempleType  = $data['TempleType'] ?? '';
$TempleCategory = $data['TempleCategory'] ?? '';
$NoOfTemplesInComplex = $data['NoOfTemplesInComplex'] ?? '';

$Introduction = $data['Introduction'] ?? '';
$Importance   = $data['Importance'] ?? '';
$History      = $data['History'] ?? '';
$Architecture = $data['Architecture'] ?? '';
$Orientation  = $data['Orientation'] ?? '';
$NearbyPlaces = $data['NearbyPlaces'] ?? '';
$SanctuaryInfo = $data['SanctuaryInfo'] ?? '';
$HowToReach    = $data['HowToReach'] ?? '';
$TrekkingRoutes = $data['TrekkingRoutes'] ?? '';
$BestSeasonToVisit = $data['BestSeasonToVisit'] ?? '';
$Notes = $data['Notes'] ?? '';

// Validate required fields
if ($TempleName === '' || $Village === '' || $District === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Temple Name, Village and District are required'
    ]);
    exit;
}

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE ei_tbltempleinfo SET
            TempleName = ?,
            Village = ?,
            Taluka = ?,
            District = ?,
            NearestCity = ?,
            MainDeity = ?,
            TempleType = ?,
            TempleCategory = ?,
            NoOfTemplesInComplex = ?,
            Introduction = ?,
            Importance = ?,
            History = ?,
            Architecture = ?,
            Orientation = ?,
            NearbyPlaces = ?,
            SanctuaryInfo = ?,
            HowToReach = ?,
            TrekkingRoutes = ?,
            BestSeasonToVisit = ?,
            Notes = ?
        WHERE TempleID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssssssi",
        $TempleName,
        $Village,
        $Taluka,
        $District,
        $NearestCity,
        $MainDeity,
        $TempleType,
        $TempleCategory,
        $NoOfTemplesInComplex,
        $Introduction,
        $Importance,
        $History,
        $Architecture,
        $Orientation,
        $NearbyPlaces,
        $SanctuaryInfo,
        $HowToReach,
        $TrekkingRoutes,
        $BestSeasonToVisit,
        $Notes,
        $templeId
    );

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Temple updated successfully'
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
    error_log('Update Temple Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Server error'
    ]);
}