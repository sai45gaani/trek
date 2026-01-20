<?php
require '../../config/database.php';
$db=new Database();$c=$db->getConnection();
$id=json_decode(file_get_contents('php://input'),true)['id'];
$c->query("DELETE FROM mm_tblmapinfo_clean WHERE MapID=$id");
echo json_encode(['success'=>true]);
