<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit;
}

require_once '../config/database.php';

$error_message = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (empty($username) || empty($password)) {
        $error_message = 'Please enter both username and password.';
    } else {
        try {
            $db = new Database();
            $conn = $db->getConnection();
            
            // Check if admin_users table exists
            $table_check = $conn->query("SHOW TABLES LIKE 'admin_users'");
            if ($table_check && $table_check->num_rows > 0) {
                // Try admin_users table
                $query = "SELECT * FROM admin_users WHERE username = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows === 1) {
                    $admin = $result->fetch_assoc();
                    
                    // Check if user is active
                    if ($admin['is_active'] != 1) {
                        $error_message = 'Your account has been deactivated.';
                    } else {
                        // Verify password
                        if (password_verify($password, $admin['password'])) {
                            // Set session
                            $_SESSION['admin_logged_in'] = true;
                            $_SESSION['admin_id'] = $admin['admin_id'];
                            $_SESSION['admin_username'] = $admin['username'];
                            $_SESSION['admin_email'] = $admin['email'];
                            $_SESSION['admin_role'] = $admin['role'];
                            $_SESSION['admin_full_name'] = $admin['full_name'];
                            $_SESSION['login_time'] = time();
                            
                            // Update last login
                            $update_query = "UPDATE admin_users SET last_login = NOW() WHERE admin_id = ?";
                            $update_stmt = $conn->prepare($update_query);
                            $update_stmt->bind_param("i", $admin['admin_id']);
                            $update_stmt->execute();
                            $update_stmt->close();
                            
                            $stmt->close();
                            $conn->close();
                            
                            // Redirect
                            header('Location: dashboard.php');
                            exit;
                        } else {
                            $error_message = 'Invalid username or password. here it is ';
                        }
                    }
                } else {
                    $error_message = 'Invalid username or password. no here';
                }
                $stmt->close();
                
            } else {
                // admin_users table doesn't exist, try SW_tblAdmin
                $query = "SELECT * FROM SW_tblAdmin WHERE Username = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows === 1) {
                    $admin = $result->fetch_assoc();
                    
                    // Direct password comparison
                    if ($password === $admin['Password']) {
                        // Set session
                        $_SESSION['admin_logged_in'] = true;
                        $_SESSION['admin_username'] = $admin['Username'];
                        $_SESSION['admin_project'] = $admin['Project'] ?? 'Trekshitz';
                        $_SESSION['admin_role'] = 'admin';
                        $_SESSION['login_time'] = time();
                        
                        $stmt->close();
                        $conn->close();
                        
                        // Redirect
                        header('Location: admin_dashboard.php');
                        exit;
                    } else {
                        $error_message = 'Invalid username or password.';
                    }
                } else {
                    $error_message = 'Invalid username or password.';
                }
                $stmt->close();
            }
            
            $conn->close();
            
        } catch (Exception $e) {
            error_log("Login Error: " . $e->getMessage());
            $error_message = 'An error occurred. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Trekshitz</title>
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
    <div class="max-w-md mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="text-center">
                <i class="fas fa-mountain text-4xl text-primary mb-3"></i>
                <h1 class="text-2xl font-bold text-gray-800">Trekshitz Admin</h1>
                <p class="text-sm text-gray-600">Trekshitiz Management System</p>
            </div>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Sign In</h2>
            
            <?php if (!empty($error_message)): ?>
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded text-red-700 text-sm">
                    <i class="fas fa-exclamation-circle mr-2"></i><?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input 
                        type="text" 
                        name="username"
                        value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Enter username"
                        required
                        autofocus
                    >
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input 
                        type="password" 
                        name="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Enter password"
                        required
                    >
                </div>
                
                <div>
                    <label class="flex items-center text-sm">
                        <input type="checkbox" name="remember" class="mr-2">
                        <span class="text-gray-600">Remember me</span>
                    </label>
                </div>
                
                <button 
                    type="submit" 
                    name="login"
                    class="w-full bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded transition-colors"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6">
            <a href="/" class="text-sm text-gray-600 hover:text-primary">
                <i class="fas fa-arrow-left mr-1"></i>Back to Website
            </a>
        </div>
    </div>
</body>
</html>