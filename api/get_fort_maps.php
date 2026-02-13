<?php
header('Content-Type: application/json');
require_once '../config/database.php';

// Connect to database
$db = new Database();
$conn = $db->getConnection();

// Get fort name safely
$fortNameParam = $_REQUEST['fortName'] ?? '';

$response = [
    'status'  => false,
    'message' => 'No data found',
    'data'    => []
];

if ($fortNameParam === '') {
    echo json_encode($response);
    exit;
}

/*
|--------------------------------------------------------------------------
| MAP QUERY
|--------------------------------------------------------------------------
| - Uses mm_tblmapinfo_clean
| - MapPath = image path
| - Linked by FortName
*/
$query = "
    SELECT 
        m.FortName,
        m.MapPath,
        m.MapName,
        m.MapType,
        m.Description,
        (
            SELECT f.FortDistrict
            FROM ei_tblfortinfo f
            WHERE f.FortName = m.FortName
            LIMIT 1
        ) AS FortDistrict
    FROM mm_tblmapinfo_clean m
    WHERE m.FortName = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $fortNameParam);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {

    $maps = [];
    $fortName = '';
    $fortDistrict = '';

    while ($row = $result->fetch_assoc()) {

        // Set once
        if ($fortName === '') {
            $fortName     = $row['FortName'];
            $fortDistrict = $row['FortDistrict'];
        }

        $maps[] = [
            'path'        => "/assets/images/Photos/Maps/MapImages/" . $row['MapPath'],
            'name'        => $row['MapName'],
            'type'        => $row['MapType'],
            'description' => $row['Description']
        ];
    }

    $response['status']  = '200';
    $response['message'] = 'Maps fetched successfully';
    $response['data']    = [
        'fortName'     => $fortName,
        'fortDistrict' => $fortDistrict,
        'maps'         => $maps
    ];
}

echo json_encode($response);
exit;
