<?php
require_once '../../../config/database.php';

$db   = new Database();
$conn = $db->getConnection();

$id     = $_POST['id'] ?? '';
$desc   = $_POST['desc'] ?? '';
$order  = $_POST['order'] ?? 0;
$active = $_POST['active'] ?? 'Y';

$imageName = null;

/* ---------- IMAGE UPLOAD ---------- */
if (!empty($_FILES['image']['name'])) {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        '../../../assets/images/Photos/Home/' . $imageName
    );
}

/* ---------- UPDATE ---------- */
if ($id) {

    $sql = "UPDATE pm_tblhomephotos
            SET PIC_DESC = ?, SORT_ORDER = ?, IS_ACTIVE = ?";

    if ($imageName) {
        $sql .= ", PIC_NAME = ?";
    }

    $sql .= " WHERE PIC_ID = ?";

    $stmt = $conn->prepare($sql);

    if ($imageName) {
        $stmt->bind_param(
            "sissi",
            $desc,
            $order,
            $active,
            $imageName,
            $id
        );
    } else {
        $stmt->bind_param(
            "sisi",
            $desc,
            $order,
            $active,
            $id
        );
    }

/* ---------- INSERT ---------- */
} else {

    $stmt = $conn->prepare(
        "INSERT INTO pm_tblhomephotos
         (PIC_NAME, PIC_DESC, SORT_ORDER, IS_ACTIVE)
         VALUES (?,?,?,?)"
    );

    $stmt->bind_param(
        "ssis",
        $imageName,
        $desc,
        $order,
        $active
    );
}

$stmt->execute();

echo json_encode(['success' => true]);