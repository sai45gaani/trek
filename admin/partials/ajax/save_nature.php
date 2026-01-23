<?php
require_once '../../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$id   = isset($_POST['id']) ? intval($_POST['id']) : 0;
$name = trim($_POST['name']);
$type = trim($_POST['type']); // Bird, Butterfly, Flower, Cave, Sketches

// ----------------------------
// VALIDATE CATEGORY TYPE
// ----------------------------
$allowedTypes = ['Bird', 'Butterfly', 'Flower', 'Cave', 'Sketches'];

if (!in_array($type, $allowedTypes)) {
    echo json_encode(['status' => 'error', 'msg' => 'Invalid category type']);
    exit;
}

// ----------------------------
// BUILD UPLOAD PATH
// ----------------------------
$basePath = '../../../assets/images/Photos/CATEGORY/';
$uploadDir = $basePath . $type . '/';
$img = '';

if (!empty($_FILES['image']['name'])) {
    $img = basename($_FILES['image']['name']);

    // Optional: sanitize filename
    $img = preg_replace('/[^a-zA-Z0-9._-]/', '_', $img);

    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $img);
}


// ----------------------------
// DB INSERT / UPDATE
// ----------------------------
if ($id > 0) {

    if ($img !== '') {
        $stmt = $conn->prepare("
            UPDATE sw_tblcategories 
            SET CAT_NAME=?, CAT_TYPE=?, CAT_IMAGE=? 
            WHERE CAT_ID=?
        ");
        $stmt->bind_param("sssi", $name, $type, $img, $id);
    } else {
        $stmt = $conn->prepare("
            UPDATE sw_tblcategories 
            SET CAT_NAME=?, CAT_TYPE=? 
            WHERE CAT_ID=?
        ");
        $stmt->bind_param("ssi", $name, $type, $id);
    }

} else {

    $stmt = $conn->prepare("
        INSERT INTO sw_tblcategories (CAT_NAME, CAT_TYPE, CAT_IMAGE)
        VALUES (?,?,?)
    ");
    $stmt->bind_param("sss", $name, $type, $img);
}

$stmt->execute();

echo json_encode(['status' => 'ok']);

