<?php
require '../../../config/database.php';
$db=new Database();$c=$db->getConnection();

$id=$_POST['id']??0;
$fort=$_POST['fort'];
$type=$_POST['type'];
$name=$_POST['name'];
$desc=$_POST['desc'];

$image=null;
if(!empty($_FILES['image']['name'])){
    $image=time().'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],
        '../../../assets/images/Photos/Maps/MapImages/'.$image);
}

if($id){
    $sql="UPDATE mm_tblmapinfo_clean SET FortName=?,MapType=?,MapName=?,Description=?";
    if($image) $sql.=",MapPath=?";
    $sql.=" WHERE MapID=?";
    $stmt=$c->prepare($sql);

    $image
    ?$stmt->bind_param("sssssi",$fort,$type,$name,$desc,$image,$id)
    :$stmt->bind_param("ssssi",$fort,$type,$name,$desc,$id);
}
else{
    $stmt=$c->prepare(
        "INSERT INTO mm_tblmapinfo_clean (FortName,MapType,MapName,MapPath,Description)
         VALUES (?,?,?,?,?)"
    );
    $stmt->bind_param("sssss",$fort,$type,$name,$image,$desc);
}

$stmt->execute();
echo json_encode(['success'=>true]);
