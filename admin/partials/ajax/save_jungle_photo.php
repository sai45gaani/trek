<?php
require_once '../../../config/database.php';

$db   = new Database();
$conn = $db->getConnection();

$id     = $_POST['id'] ?? '';
$jungle = $_POST['jungle'] ?? '';
$desc   = $_POST['desc'] ?? '';
$front  = $_POST['front'] ?? '';

$imageName = null;

/* ---------- IMAGE UPLOAD ---------- */
if (!empty($_FILES['image']['name'])) {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        '../../../assets/images/Photos/Jungle/' . $imageName
    );
}

/* ---------- UPDATE ---------- */
if ($id) {

    $sql = "UPDATE pm_tbljunglephotos
            SET JungleName = ?, PIC_DESC = ?, PIC_FRONT_IMAGE = ?";

    if ($imageName) {
        $sql .= ", PIC_NAME = ?";
    }

    $sql .= " WHERE PIC_ID = ?";

    $stmt = $conn->prepare($sql);

    if ($imageName) {
        $stmt->bind_param("ssssi", $jungle, $desc, $front, $imageName, $id);
    } else {
        $stmt->bind_param("sssi", $jungle, $desc, $front, $id);
    }

/* ---------- INSERT ---------- */
} else {

    $stmt = $conn->prepare(
        "INSERT INTO pm_tbljunglephotos
         (JungleName, PIC_NAME, PIC_DESC, PIC_FRONT_IMAGE)
         VALUES (?,?,?,?)"
    );

    $stmt->bind_param("ssss", $jungle, $imageName, $desc, $front);
}

$stmt->execute();

echo json_encode(['success' => true]);