<?php
require_once '../../../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$id    = $_POST['id'] ?? '';
$fort  = $_POST['fort'];
$desc  = $_POST['desc'] ?? '';
$front = $_POST['front'] ?? '';

$imageName = null;
if(!empty($_FILES['image']['name'])){
    $imageName = time().'_'.basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],
        '../../../assets/images/Photos/Fort/'.$imageName);
}

if($id){
    $sql = "UPDATE PM_tblPhotos_clean SET FortName=?, PIC_DESC=?, PIC_FRONT_IMAGE=?";
    if($imageName) $sql .= ", PIC_NAME=?";
    $sql .= " WHERE PIC_ID=?";
    $stmt = $conn->prepare($sql);
    if($imageName)
        $stmt->bind_param("ssssi",$fort,$desc,$front,$imageName,$id);
    else
        $stmt->bind_param("sssi",$fort,$desc,$front,$id);
}else{
    $stmt = $conn->prepare(
        "INSERT INTO PM_tblPhotos_clean (FortName,PIC_NAME,PIC_DESC,PIC_FRONT_IMAGE)
         VALUES (?,?,?,?)"
    );
    $stmt->bind_param("ssss",$fort,$imageName,$desc,$front);
}

$stmt->execute();
echo json_encode(['success'=>true]);
