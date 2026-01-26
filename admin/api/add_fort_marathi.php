<?php
require_once '../../config/database.php';
header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();

    $sql = "
        INSERT INTO mi_tblfortinfo_unicode
        (
            FortName, FortNameMar,
            FortType, FortTypeMar,
            FortDistrict, FortDistrictMar,
            FortRange, FortRangeMar,
            Grade, GradeMar,
            HeightMar,
            Introduction, History, Geography, Notes,
            Date
        )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssss",
        $_POST['FortName'],
        $_POST['FortNameMar'],
        $_POST['FortType'],
        $_POST['FortTypeMar'],
        $_POST['FortDistrict'],
        $_POST['FortDistrictMar'],
        $_POST['FortRange'],
        $_POST['FortRangeMar'],
        $_POST['Grade'],
        $_POST['GradeMar'],
        $_POST['HeightMar'],
        $_POST['Introduction'],
        $_POST['History'],
        $_POST['Geography'],
        $_POST['Notes']
    );

    $stmt->execute();

    echo json_encode(['status' => 'success']);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
