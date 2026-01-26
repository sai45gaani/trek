<?php
header('Content-Type: application/json');
require_once '../../../config/database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['success'=>false,'message'=>'Invalid Fort ID']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    $sql = "
        UPDATE mi_tblfortinfo_unicode SET
            FortName            = ?,
            FortNameMar         = ?,
            FortType            = ?,
            FortTypeMar         = ?,
            FortDistrict        = ?,
            FortDistrictMar     = ?,
            FortRange           = ?,
            FortRangeMar        = ?,
            Grade               = ?,
            GradeMar            = ?,
            HeightMar           = ?,
            Introduction        = ?,
            History             = ?,
            Geography           = ?,
            Notes               = ?
        WHERE FortID = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssi",
        $data['FortName'],
        $data['FortNameMar'],
        $data['FortType'],
        $data['FortTypeMar'],
        $data['FortDistrict'],
        $data['FortDistrictMar'],
        $data['FortRange'],
        $data['FortRangeMar'],
        $data['Grade'],
        $data['GradeMar'],
        $data['HeightMar'],
        $data['Introduction'],
        $data['History'],
        $data['Geography'],
        $data['Notes'],
        $data['id']
    );

    $stmt->execute();

    echo json_encode(['success'=>true]);

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    error_log('Marathi Update Error: '.$e->getMessage());
    echo json_encode(['success'=>false,'message'=>'Update failed']);
}
