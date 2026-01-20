<?php
require_once '../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? null;

$params = [
    $data['date'], $data['place'], $data['leader'], $data['contact'],
    $data['display'], $data['cost'], $data['grade'], $data['last'],
    $data['meet'], $data['max'], $data['desc'], $data['notes']
];

if ($id) {
    $params[] = $id;
    $stmt = $conn->prepare("
        UPDATE TS_tblTrekDetails SET
        TrekDate=?, Place=?, Leader=?, ContDetails=?, DisplayDate=?, Cost=?,
        Grade=?, LDateBooking=?, MeetingPlace=?, MaxParticipants=?,
        Description=?, Notes=?
        WHERE TrekId=?
    ");
} else {
    $stmt = $conn->prepare("
        INSERT INTO TS_tblTrekDetails
        (TrekDate,Place,Leader,ContDetails,DisplayDate,Cost,Grade,LDateBooking,MeetingPlace,MaxParticipants,Description,Notes)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
    ");
}

$stmt->bind_param("ssssdsississ", ...$params);
$stmt->execute();

echo json_encode(['success' => true]);
