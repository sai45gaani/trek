<?php
// partials/update_fort.php
header('Content-Type: application/json');

require_once '../../../config/database.php';

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate input
if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid fort ID']);
    exit;
}

$fortId = intval($data['id']);
$fortName = $data['name'] ?? '';
$fortType = $data['type'] ?? '';
$fortDistrict = $data['district'] ?? '';
$fortGrade = $data['grade'] ?? '';
$introduction = $data['introduction'] ?? '';
$history = $data['history'] ?? '';

// Validate required fields
if (empty($fortName)) {
    echo json_encode(['success' => false, 'message' => 'Fort name is required']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Update fort details
    $query = "UPDATE EI_tblFortInfo 
              SET FortName = ?, 
                  FortType = ?, 
                  FortDistrict = ?, 
                  Grade = ?, 
                  Introduction = ?, 
                  History = ? 
              WHERE FortID = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", 
        $fortName, 
        $fortType, 
        $fortDistrict, 
        $fortGrade, 
        $introduction, 
        $history, 
        $fortId
    );
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'success' => true, 
                'message' => 'Fort updated successfully'
            ]);
        } else {
            // Check if fort exists
            $checkQuery = "SELECT FortID FROM EI_tblFortInfo WHERE FortID = ?";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bind_param("i", $fortId);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();
            
            if ($checkResult->num_rows > 0) {
                echo json_encode([
                    'success' => true, 
                    'message' => 'No changes detected'
                ]);
            } else {
                echo json_encode([
                    'success' => false, 
                    'message' => 'Fort not found'
                ]);
            }
            $checkStmt->close();
        }
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'Database error: ' . $stmt->error
        ]);
    }
    
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    error_log("Update Fort Error: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'An error occurred while updating the fort'
    ]);
}
?>