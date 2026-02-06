<?php
require_once '../../../config/database.php';

$db   = new Database();
$conn = $db->getConnection();

$id     = $_POST['id'] ?? '';
$temple = $_POST['temple'] ?? '';
$desc   = $_POST['desc'] ?? '';
$front  = $_POST['front'] ?? '';

$imageName = null;

/* Handle image upload */
if (!empty($_FILES['image']['name'])) {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        '../../../assets/images/Photos/Temple/' . $imageName
    );
}

if ($id) {
    /* UPDATE */
    $sql = "UPDATE pm_tbltemplephotos
            SET TempleName = ?, PIC_DESC = ?, PIC_FRONT_IMAGE = ?";

    if ($imageName) {
        $sql .= ", PIC_NAME = ?";
    }

    $sql .= " WHERE PIC_ID = ?";

    $stmt = $conn->prepare($sql);

    if ($imageName) {
        $stmt->bind_param("ssssi", $temple, $desc, $front, $imageName, $id);
    } else {
        $stmt->bind_param("sssi", $temple, $desc, $front, $id);
    }

} else {
    /* INSERT */
    $stmt = $conn->prepare(
        "INSERT INTO pm_tbltemplephotos
         (TempleName, PIC_NAME, PIC_DESC, PIC_FRONT_IMAGE)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssss", $temple, $imageName, $desc, $front);
}

$stmt->execute();

echo json_encode(['success' => true]);