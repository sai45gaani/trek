<?php
require_once '../../../config/database.php';

$db   = new Database();
$conn = $db->getConnection();

$id     = $_POST['id'] ?? '';
$trekId = $_POST['trek'] ?? '';
$desc   = $_POST['desc'] ?? '';
$front  = $_POST['front'] ?? '';

$imageName = null;

if (!empty($_FILES['image']['name'])) {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        '../../../assets/images/Photos/Trek/' . $imageName
    );
}

if ($id) {

    $sql = "UPDATE pm_tbltrekphotos
            SET TrekId = ?, PIC_DESC = ?, PIC_FRONT_IMAGE = ?";

    if ($imageName) {
        $sql .= ", PIC_NAME = ?";
    }

    $sql .= " WHERE PIC_ID = ?";

    $stmt = $conn->prepare($sql);

    if ($imageName) {
        $stmt->bind_param("isssi", $trekId, $desc, $front, $imageName, $id);
    } else {
        $stmt->bind_param("issi", $trekId, $desc, $front, $id);
    }

} else {

    $stmt = $conn->prepare(
        "INSERT INTO pm_tbltrekphotos
         (TrekId, PIC_NAME, PIC_DESC, PIC_FRONT_IMAGE)
         VALUES (?,?,?,?)"
    );

    $stmt->bind_param("isss", $trekId, $imageName, $desc, $front);
}

$stmt->execute();

echo json_encode(['success' => true]);