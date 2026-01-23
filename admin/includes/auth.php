<?php
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

function requireRole($roles = []) {
    if (!in_array($_SESSION['admin_role'], $roles)) {
        http_response_code(403);
        echo "<div class='p-4 text-red-600'>Access Denied</div>";
        exit;
    }
}
