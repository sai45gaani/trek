<?php
// ENABLE ERROR DISPLAY FOR DEBUGGING
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit;
}

require_once '../config/database.php';

$error_message = '';
$debug_info = [];

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    $debug_info[] = "Username entered: " . htmlspecialchars($username);
    
    if (empty($username) || empty($password)) {
        $error_message = 'Please enter both username and password.';
    } else {
        try {
            $db = new Database();
            $conn = $db->getConnection();
            $debug_info[] = "Database connection successful";
            
            // Check if admin_users table exists
            $table_check = $conn->query("SHOW TABLES LIKE 'admin_users'");
            if ($table_check->num_rows > 0) {
                $debug_info[] = "admin_users table EXISTS";
                
                // Try admin_users table
                $query = "SELECT * FROM admin_users WHERE username = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $debug_info[] = "Query executed, rows found: " . $result->num_rows;
                
                if ($result->num_rows === 1) {
                    $admin = $result->fetch_assoc();
                    $debug_info[] = "User found: " . $admin['username'];
                    $debug_info[] = "Is Active: " . ($admin['is_active'] ?? 'N/A');
                    $debug_info[] = "Password hash exists: " . (!empty($admin['password']) ? 'Yes' : 'No');
                    
                    // Check if user is active
                    if ($admin['is_active'] != 1) {
                        $error_message = 'User account is inactive.';
                        $debug_info[] = "ERROR: User is not active";
                    } else {
                        // Verify password
                        if (password_verify($password, $admin['password'])) {
                            $debug_info[] = "Password verified successfully!";
                            
                            // Set session
                            $_SESSION['admin_logged_in'] = true;
                            $_SESSION['admin_id'] = $admin['admin_id'];
                            $_SESSION['admin_username'] = $admin['username'];
                            $_SESSION['admin_email'] = $admin['email'];
                            $_SESSION['admin_role'] = $admin['role'];
                            $_SESSION['admin_full_name'] = $admin['full_name'];
                            $_SESSION['login_time'] = time();
                            
                            $debug_info[] = "Session set successfully";
                            
                            // Redirect
                            header('Location: admin_dashboard.php');
                            exit;
                        } else {
                            $error_message = 'Invalid password.';
                            $debug_info[] = "ERROR: Password verification failed";
                        }
                    }
                } else {
                    $error_message = 'User not found.';
                    $debug_info[] = "ERROR: No user found with username: $username";
                }
                $stmt->close();
                
            } else {
                // admin_users table doesn't exist, try SW_tblAdmin
                $debug_info[] = "admin_users table DOES NOT EXIST, trying SW_tblAdmin";
                
                $query = "SELECT * FROM SW_tblAdmin WHERE Username = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $debug_info[] = "SW_tblAdmin query executed, rows found: " . $result->num_rows;
                
                if ($result->num_rows === 1) {
                    $admin = $result->fetch_assoc();
                    $debug_info[] = "User found in SW_tblAdmin: " . $admin['Username'];
                    
                    // Direct password comparison
                    if ($password === $admin['Password']) {
                        $debug_info[] = "Password matched!";
                        
                        // Set session
                        $_SESSION['admin_logged_in'] = true;
                        $_SESSION['admin_username'] = $admin['Username'];
                        $_SESSION['admin_project'] = $admin['Project'] ?? 'Trekshitz';
                        $_SESSION['admin_role'] = 'admin';
                        $_SESSION['login_time'] = time();
                        
                        $debug_info[] = "Session set successfully";
                        
                        // Redirect
                        header('Location: admin_dashboard.php');
                        exit;
                    } else {
                        $error_message = 'Invalid password.';
                        $debug_info[] = "ERROR: Password does not match";
                        $debug_info[] = "Expected: " . $admin['Password'];
                    }
                } else {
                    $error_message = 'User not found in SW_tblAdmin.';
                    $debug_info[] = "ERROR: No user found in SW_tblAdmin";
                }
                $stmt->close();
            }
            
            $conn->close();
            
        } catch (Exception $e) {
            $error_message = 'Database error: ' . $e->getMessage();
            $debug_info[] = "EXCEPTION: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - DEBUG MODE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2d5016',
                        secondary: '#4a7c23',
                        accent: '#7fb069'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Debug Banner -->
        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6">
            <div class="flex items-center">
                <i class="fas fa-bug text-yellow-500 text-xl mr-3"></i>
                <div>
                    <p class="font-bold text-yellow-700">DEBUG MODE ENABLED</p>
                    <p class="text-yellow-600 text-sm">This version shows detailed debugging information</p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Login Form -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Admin Login</h2>
                
                <?php if (!empty($error_message)): ?>
                    <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 rounded">
                        <p class="text-red-700 font-medium"><?php echo htmlspecialchars($error_message); ?></p>
                    </div>
                <?php endif; ?>
                
                <form method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Username</label>
                        <input 
                            type="text" 
                            name="username"
                            value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                            placeholder="Enter username"
                            required
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-2">Password</label>
                        <input 
                            type="password" 
                            name="password"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                            placeholder="Enter password"
                            required
                        >
                    </div>
                    
                    <button 
                        type="submit" 
                        name="login"
                        class="w-full bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded-lg"
                    >
                        Sign In
                    </button>
                </form>
            </div>

            <!-- Debug Info -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Debug Information</h2>
                
                <?php if (!empty($debug_info)): ?>
                    <div class="space-y-2">
                        <?php foreach ($debug_info as $info): ?>
                            <div class="p-2 bg-gray-50 border-l-4 border-blue-500 text-sm font-mono">
                                <?php echo htmlspecialchars($info); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">Submit the form to see debug information</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Instructions -->
        <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
            <h3 class="font-bold text-blue-700 mb-2">Testing Instructions:</h3>
            <ol class="text-blue-600 text-sm space-y-1 list-decimal list-inside">
                <li>Try logging in with your credentials</li>
                <li>Check the debug information on the right</li>
                <li>The debug will tell you which table exists and what went wrong</li>
                <li>If you see "admin_users table DOES NOT EXIST", run the SQL to create it</li>
                <li>If you see "User not found", check your username spelling</li>
                <li>If you see "Password verification failed", check your password</li>
            </ol>
        </div>
    </div>
</body>
</html>