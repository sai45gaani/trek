<?php
// test.php

require_once 'config/database.php';

// Create an object of Database class
$db = new Database();

// Try getting the connection
$conn = $db->getConnection();

if ($conn) {
    echo "✅ Database connected successfully!";
} else {
    echo "❌ Failed to connect to database.";
}
?>
