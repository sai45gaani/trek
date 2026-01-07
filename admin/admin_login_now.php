<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit;
}

require_once '../config/database.php';

$error_message = '';
$debug_info = []; // Debug array to track what's happening

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (empty($username) || empty($password)) {
        $error_message = 'Please enter both username and password.';
        $debug_info[] = "Empty credentials submitted";
    } else {
        $debug_info[] = "Login attempt - Username: " . htmlspecialchars($username);
        
        try {
            $db = new Database();
            $conn = $db->getConnection();
            $debug_info[] = "✓ Database connected successfully";
            
            // Check if admin_users table exists
            $table_check = $conn->query("SHOW TABLES LIKE 'admin_users'");
            
            if ($table_check && $table_check->num_rows > 0) {
                $debug_info[] = "✓ Using admin_users table (new structure)";
                
                // Use new admin_users table with password hashing
                $query = "SELECT * FROM admin_users WHERE username = ? AND is_active = 1 LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $debug_info[] = "Query executed - Rows found: " . $result->num_rows;
                
                if ($result->num_rows === 1) {
                    $admin = $result->fetch_assoc();
                    $debug_info[] = "✓ User found: " . $admin['username'];
                    $debug_info[] = "Role: " . ($admin['role'] ?? 'N/A');
                    $debug_info[] = "Is Active: " . ($admin['is_active'] ? 'Yes' : 'No');
                    
                    // Check if account is active
                    if ($admin['is_active'] != 1) {
                        $error_message = 'Your account has been deactivated. Please contact administrator.';
                        $debug_info[] = "✗ Account is inactive";
                    }
                    // Verify hashed password
                    else if (password_verify($password, $admin['password'])) {
                        $debug_info[] = "✓ Password verified successfully!";
                        $debug_info[] = "→ Setting session and redirecting...";
                        // Login successful
                        $_SESSION['admin_logged_in'] = true;
                        $_SESSION['admin_id'] = $admin['admin_id'];
                        $_SESSION['admin_username'] = $admin['username'];
                        $_SESSION['admin_email'] = $admin['email'];
                        $_SESSION['admin_role'] = $admin['role'];
                        $_SESSION['admin_full_name'] = $admin['full_name'];
                        $_SESSION['login_time'] = time();
                        
                        // Update last_login
                        $update_query = "UPDATE admin_users SET last_login = NOW() WHERE admin_id = ?";
                        $update_stmt = $conn->prepare($update_query);
                        $update_stmt->bind_param("i", $admin['admin_id']);
                        $update_stmt->execute();
                        $update_stmt->close();
                        
                        // Log activity if table exists
                        $log_check = $conn->query("SHOW TABLES LIKE 'admin_activity_log'");
                        if ($log_check && $log_check->num_rows > 0) {
                            $ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
                            $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
                            $log_query = "INSERT INTO admin_activity_log (admin_id, action, description, ip_address, user_agent) VALUES (?, 'login', 'User logged in', ?, ?)";
                            $log_stmt = $conn->prepare($log_query);
                            $log_stmt->bind_param("iss", $admin['admin_id'], $ip, $user_agent);
                            $log_stmt->execute();
                            $log_stmt->close();
                        }
                        
                        $stmt->close();
                        $conn->close();
                        
                        // Redirect to dashboard
                        header('Location: admin_dashboard.php');
                        exit;
                    } else {
                        $error_message = 'Invalid password. Please try again.';
                        $debug_info[] = "✗ Password verification failed";
                    }
                } else {
                    $error_message = 'User not found. Please check your username.';
                    $debug_info[] = "✗ No user found with username: " . htmlspecialchars($username);
                    print_r($debug_info);
                }
                
                if (isset($stmt)) $stmt->close();
                
            } else {
                $debug_info[] = "✓ Using SW_tblAdmin table (old structure)";
                
                // Fallback to SW_tblAdmin (old table)
                $query = "SELECT * FROM SW_tblAdmin WHERE Username = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $debug_info[] = "Query executed - Rows found: " . $result->num_rows;
                
                if ($result->num_rows === 1) {
                    $admin = $result->fetch_assoc();
                    $debug_info[] = "✓ User found: " . $admin['Username'];
                    
                    // Direct password comparison for old table
                    if ($password === $admin['Password']) {
                        $debug_info[] = "✓ Password matched!";
                        $debug_info[] = "→ Setting session and redirecting...";
                        // Login successful
                        $_SESSION['admin_logged_in'] = true;
                        $_SESSION['admin_username'] = $admin['Username'];
                        $_SESSION['admin_project'] = $admin['Project'] ?? 'Trekshitz';
                        $_SESSION['admin_role'] = 'admin';
                        $_SESSION['login_time'] = time();
                        
                        $stmt->close();
                        $conn->close();
                        
                        // Redirect to dashboard
                        header('Location: admin_dashboard.php');
                        exit;
                    } else {
                        $error_message = 'Invalid password. Please try again.';
                        $debug_info[] = "✗ Password does not match";
                    }
                } else {
                    $error_message = 'User not found in system.';
                    $debug_info[] = "✗ No user found in SW_tblAdmin with username: " . htmlspecialchars($username);
                }
                
                if (isset($stmt)) $stmt->close();
            }
            
            $conn->close();
            
        } catch (Exception $e) {
            error_log("Login Error: " . $e->getMessage());
            $error_message = 'An error occurred. Please try again later.';
            $debug_info[] = "✗ EXCEPTION: " . $e->getMessage();
        }
    }
}

echo "<pre>";
print_r($debug_info);
echo "</pre>";  

$page_title = 'Admin Login - Trekshitz';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2d5016',
                        secondary: '#4a7c23',
                        accent: '#7fb069',
                        forest: '#355e3b'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            background: linear-gradient(135deg, #2d5016 0%, #4a7c23 50%, #7fb069 100%);
            min-height: 100vh;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .login-pattern {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="mountain-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M10,5 L15,15 L5,15 Z" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23mountain-pattern)"/></svg>');
        }
        
        .shake {
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="font-poppins login-pattern flex items-center justify-center p-4">
    
    <div class="w-full max-w-md fade-in">
        <!-- Logo and Brand -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-2xl mb-4">
                <i class="fas fa-mountain text-4xl text-primary"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Trekshitz Admin</h1>
            <p class="text-white text-opacity-90">Content Management System</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 <?php echo !empty($error_message) ? 'shake' : ''; ?>">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back!</h2>
                <p class="text-gray-600">Sign in to manage your trekking website</p>
            </div>

            <!-- Error Message -->
            <?php if (!empty($error_message)): ?>
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700 font-medium"><?php echo htmlspecialchars($error_message); ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Debug Information -->
            <?php if (!empty($debug_info)): ?>
                <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                    <p class="text-blue-700 font-semibold mb-2">
                        <i class="fas fa-bug mr-2"></i>Debug Information:
                    </p>
                    <div class="space-y-1">
                        <?php foreach ($debug_info as $info): ?>
                            <p class="text-xs text-blue-600 font-mono">• <?php echo htmlspecialchars($info); ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST" action="" class="space-y-6">
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-primary"></i>Username
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            id="username"
                            name="username" 
                            required
                            autofocus
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 text-gray-800"
                            placeholder="Enter your username"
                            value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-primary"></i>Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            required
                            class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 text-gray-800"
                            placeholder="Enter your password"
                        >
                        <button 
                            type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors"
                        >
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary focus:ring-2 transition-all"
                        >
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <!-- Login Button -->
                <button 
                    type="submit"
                    name="login"
                    class="w-full bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>

            <!-- Back to Website -->
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <a href="/" class="inline-flex items-center text-gray-600 hover:text-primary font-medium transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Website
                </a>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="mt-6 text-center text-white text-opacity-90 text-sm">
            <i class="fas fa-shield-alt mr-2"></i>
            Secure Admin Area - All activities are logged
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Handle Enter key on password field
        document.getElementById('password').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.form.submit();
            }
        });

        // Auto-hide error messages after 8 seconds (only if no new errors)
        setTimeout(function() {
            const errorMessages = document.querySelectorAll('.bg-red-50');
            if (errorMessages.length > 0) {
                errorMessages.forEach(function(message) {
                    message.style.transition = 'opacity 0.5s';
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.remove();
                    }, 500);
                });
            }
        }, 8000);

        // Form submission handling - show loading state
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            
            if (username && password) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Signing in...';
            }
        });
    </script>
</body>
</html>