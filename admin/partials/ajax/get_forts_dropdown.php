<?php
require_once '../../../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$res = $conn->query(
    "SELECT FortName FROM EI_tblFortInfo ORDER BY FortName ASC"
);

$forts = [];
while ($row = $res->fetch_assoc()) {
    $forts[] = $row['FortName'];
}

echo json_encode($forts);
