<?php
// partials/ajax/update_jungle_marathi.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid Jungle ID'
    ]);
    exit;
}

$jungleId = (int)$data['id'];

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE mi_tbljungleinfo_unicode SET
            JungleName              = ?,
            JungleNameMar           = ?,
            State                   = ?,
            StateMar                = ?,
            District                = ?,
            DistrictMar             = ?,
            CoreZoneGatesMar        = ?,
            BufferZoneGatesMar      = ?,
            IntroductionMar         = ?,
            HistoryMar              = ?,
            GeographyMar            = ?,
            SafariTimingsMar        = ?,
            BestSeasonToVisitMar    = ?,
            AnimalsMar              = ?,
            BirdsMar                = ?,
            TreesMar                = ?,
            NotesMar                = ?
        WHERE JungleID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssi",
        $data['JungleName'],
        $data['JungleNameMar'],
        $data['State'],
        $data['StateMar'],
        $data['District'],
        $data['DistrictMar'],
        $data['CoreZoneGatesMar'],
        $data['BufferZoneGatesMar'],
        $data['IntroductionMar'],
        $data['HistoryMar'],
        $data['GeographyMar'],
        $data['SafariTimingsMar'],
        $data['BestSeasonToVisitMar'],
        $data['AnimalsMar'],
        $data['BirdsMar'],
        $data['TreesMar'],
        $data['NotesMar'],
        $jungleId
    );

    $stmt->execute();

    echo json_encode([
        'success' => true,
        'message' => 'Jungle updated successfully'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Update Jungle Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Update failed'
    ]);
}