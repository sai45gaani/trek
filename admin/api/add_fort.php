<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("
        INSERT INTO ei_tblfortinfo
        (FortName, FortType, FortDistrict, FortRange, Grade, Height,
         Introduction, History, Geography, BestSeasonToVisit, Notes, Date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");

    $stmt->bind_param(
        "sssssssssss",
        $_POST['FortName'],
        $_POST['FortType'],
        $_POST['FortDistrict'],
        $_POST['FortRange'],
        $_POST['Grade'],
        $_POST['Height'],
        $_POST['Introduction'],
        $_POST['History'],
        $_POST['Geography'],
        $_POST['BestSeasonToVisit'],
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
