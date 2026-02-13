<?php
require_once '../../../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

$id = !empty($data['id']) ? (int)$data['id'] : null;

/* Normalize dates to DATETIME */
$trekDate = $data['date'] . ' 00:00:00';
$lastDate = $data['last'] . ' 00:00:00';

$params = [
    $trekDate,
    $data['place'],
    $data['leader'],
    $data['contact'],
    $data['display'],
    (float)$data['cost'],
    $data['grade'],
    $lastDate,
    $data['meet'],
    (int)$data['max'],
    $data['desc'],
    $data['notes']
];

if ($id) {

    $params[] = $id;

    $stmt = $conn->prepare("
        UPDATE ts_tbltrekdetails SET
            TrekDate=?,
            Place=?,
            Leader=?,
            ContDetails=?,
            DisplayDate=?,
            Cost=?,
            Grade=?,
            LDateBooking=?,
            MeetingPlace=?,
            MaxParticipants=?,
            Description=?,
            Notes=?
        WHERE TrekId=?
    ");

    // 12 fields + 1 ID
    $stmt->bind_param("sssssdsssissi", ...$params);

} else {

    $stmt = $conn->prepare("
        INSERT INTO ts_tbltrekdetails
        (
            TrekDate, Place, Leader, ContDetails, DisplayDate,
            Cost, Grade, LDateBooking, MeetingPlace,
            MaxParticipants, Description, Notes
        )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
    ");

    $stmt->bind_param("sssssdsssiss", ...$params);
}

$stmt->execute();

echo json_encode([
    'success' => true,
    'id' => $id ?? $conn->insert_id
]);
