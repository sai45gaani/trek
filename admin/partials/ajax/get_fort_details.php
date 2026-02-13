<?php
// partials/get_fort_details.php
header('Content-Type: application/json');

require_once '../../../config/database.php';

// Get fort ID from query parameter
$fortId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($fortId <= 0) {
    echo json_encode(['error' => 'Invalid fort ID']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Fetch fort details
    $query = "SELECT * FROM ei_tblfortinfo WHERE FortID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $fortId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Fort not found']);
    }
    
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    error_log("Get Fort Details Error: " . $e->getMessage());
    echo json_encode(['error' => 'Database error occurred']);
}
?>