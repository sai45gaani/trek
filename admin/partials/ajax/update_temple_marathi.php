<?php
// partials/ajax/update_temple_marathi.php

header('Content-Type: application/json');
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid Temple ID'
    ]);
    exit;
}

$templeId = (int)$data['id'];

try {
    $db   = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE mi_tbltempleinfo_unicode SET
            TempleName        = ?,
            TempleNameMar     = ?,
            Village           = ?,
            VillageMar        = ?,
            District          = ?,
            DistrictMar       = ?,
            MainDeity         = ?,
            MainDeityMar      = ?,
            BuiltBy           = ?,
            BuiltByMar        = ?,
            Period            = ?,
            PeriodMar         = ?,
            ArchitectureMar   = ?,
            History           = ?,
            Notes             = ?
        WHERE TempleID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssi",
        $data['TempleName'],
        $data['TempleNameMar'],
        $data['Village'],
        $data['VillageMar'],
        $data['District'],
        $data['DistrictMar'],
        $data['MainDeity'],
        $data['MainDeityMar'],
        $data['BuiltBy'],
        $data['BuiltByMar'],
        $data['Period'],
        $data['PeriodMar'],
        $data['ArchitectureMar'],
        $data['History'],
        $data['Notes'],
        $templeId
    );

    $stmt->execute();

    echo json_encode([
        'success' => true,
        'message' => 'Temple updated successfully'
    ]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Update Temple Marathi Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Update failed'
    ]);
}