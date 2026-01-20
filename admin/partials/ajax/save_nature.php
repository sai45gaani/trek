<?php
require_once '../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$id   = intval($_POST['id']);
$name = $_POST['name'];
$type = $_POST['type'];

$img = '';
if (!empty($_FILES['image']['name'])) {
    $img = basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], '../../uploads/'.$img);
}

if ($id > 0) {
    if ($img) {
        $conn->query("UPDATE sw_tblcategories SET CAT_NAME='$name', CAT_TYPE='$type', CAT_IMAGE='$img' WHERE CAT_ID=$id");
    } else {
        $conn->query("UPDATE sw_tblcategories SET CAT_NAME='$name', CAT_TYPE='$type' WHERE CAT_ID=$id");
    }
} else {
    $conn->query("INSERT INTO sw_tblcategories (CAT_NAME, CAT_TYPE, CAT_IMAGE)
                  VALUES ('$name','$type','$img')");
}
echo json_encode(['status'=>'ok']);
