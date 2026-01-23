
<?php

if (!isset($conn)) {
    require_once __DIR__ . '/../../config/database.php';
    $db = new Database();
    $conn = $db->getConnection();
}

$APP_SETTINGS = [];

$res = $conn->query("SELECT setting_key, setting_value FROM app_settings");
while ($row = $res->fetch_assoc()) {
    $APP_SETTINGS[$row['setting_key']] = $row['setting_value'];
}

/* Helper function */
function setting($key, $default = null) {
    global $APP_SETTINGS;
    return $APP_SETTINGS[$key] ?? $default;
}
