<?php
header('Content-Type: application/json');
require_once '../config/database.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

$fortname = $_REQUEST['fortName'];

$query="SELECT p.FortName,
    p.PIC_NAME,
    p.PIC_DESC,
    (
        SELECT f.FortDistrict
        FROM EI_tblFortInfo f
        WHERE f.FortName = p.FortName
        LIMIT 1
    ) AS FortDistrict
FROM pm_tblphotos_clean p where p.FortName = '$fortname';";


$result = $conn->query($query);


$response = [
    'status'  => false,
    'message' => 'No data found',
    'data'    => []
];


if ($result && $result->num_rows > 0) {
    
    $photos = [];
    $fortName = '';
    $fortDistrict = '';


    while ($row = $result->fetch_assoc()) {

        // Set once (all rows have same fort)
        if ($fortName === '') {
            $fortName     = $row['FortName'];
            $fortDistrict = $row['FortDistrict'];
        }

        $photos[] = [
            'path'        => "/assets/images/Photos/Fort/".$row['PIC_NAME'],   // add full path in frontend or here
            'description' => $row['PIC_DESC']
        ];
    }

    $response['status']  = '200';
    $response['message'] = 'Photos fetched successfully';
    $response['data']    = [
        'fortName'     => $fortName,
        'fortDistrict' => $fortDistrict,
        'photos'       => $photos
    ];

}


echo json_encode($response);    
exit;








?>