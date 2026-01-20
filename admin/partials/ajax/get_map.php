<?php
require '../../config/database.php';
$db=new Database();$c=$db->getConnection();
$id=intval($_GET['id']);
$r=$c->query("SELECT * FROM mm_tblmapinfo_clean WHERE MapID=$id")->fetch_assoc();
echo json_encode($r);