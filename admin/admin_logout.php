<?php
session_start();

// Store username for goodbye message
$username = $_SESSION['admin_username'] ?? 'Admin';

// Destroy all session data
$_SESSION = array();

// Delete session cookie if it exists
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Optional: Log the logout activity
try {
    require_once '../config/database.php';
    $db = new Database();
    $conn = $db->getConnection();
    
    // You can log logout activity to a logs table if you have one
    // Example: INSERT INTO admin_logs (username, action, timestamp) VALUES (?, 'logout', NOW())
    
    $conn->close();
} catch (Exception $e) {
    // Silent fail - logging is optional
    error_log("Logout logging error: " . $e->getMessage());
}

$page_title = 'Logged Out - Trekshitz Admin';
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
        
        .logout-pattern {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="logout-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23logout-pattern)"/></svg>');
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success-check {
            animation: checkmark 0.6s ease-in-out;
        }
        
        @keyframes checkmark {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .countdown {
            animation: pulse 1s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
    </style>
</head>
<body class="font-poppins logout-pattern flex items-center justify-center p-4">
    
    <div class="w-full max-w-md fade-in">
        <!-- Success Icon -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-2xl mb-4 success-check">
                <i class="fas fa-check-circle text-5xl text-green-500"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Logged Out Successfully</h1>
            <p class="text-white text-opacity-90">Thank you for using Trekshitz Admin Panel</p>
        </div>

        <!-- Logout Card -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            <!-- Welcome Message -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Goodbye, <?php echo htmlspecialchars($username); ?>!
                </h2>
                <p class="text-gray-600">You have been safely logged out of the admin panel.</p>
            </div>

            <!-- Success Message -->
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                    <div>
                        <p class="text-green-700 font-semibold">Session Ended</p>
                        <p class="text-green-600 text-sm">Your session has been terminated securely.</p>
                    </div>
                </div>
            </div>

            <!-- Security Tips -->
            <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                <p class="text-blue-700 font-semibold mb-2">
                    <i class="fas fa-shield-alt mr-2"></i>Security Tips
                </p>
                <ul class="text-blue-600 text-sm space-y-1">
                    <li><i class="fas fa-check mr-2"></i>Always logout when using shared computers</li>
                    <li><i class="fas fa-check mr-2"></i>Clear your browser cache if on public computer</li>
                    <li><i class="fas fa-check mr-2"></i>Close all browser windows after logout</li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <a href="admin_login.php" class="block w-full bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In Again
                </a>
                
                <a href="/" class="block w-full bg-white hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-all duration-300 border-2 border-gray-300 hover:border-primary text-center">
                    <i class="fas fa-home mr-2"></i>Go to Website
                </a>
            </div>

            <!-- Auto Redirect Notice -->
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <p class="text-sm text-gray-600">
                    <i class="fas fa-info-circle mr-1"></i>
                    Redirecting to login page in <span id="countdown" class="font-bold text-primary countdown">10</span> seconds
                </p>
                <button onclick="cancelRedirect()" class="mt-2 text-sm text-gray-500 hover:text-primary transition-colors underline">
                    Cancel auto-redirect
                </button>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-6 text-center text-white text-opacity-90 text-sm">
            <p>
                <i class="fas fa-clock mr-2"></i>
                Session ended at <?php echo date('h:i A'); ?> on <?php echo date('d M Y'); ?>
            </p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        let countdown = 10;
        let redirectTimer;
        let isRedirectActive = true;

        // Countdown and auto-redirect
        function startCountdown() {
            const countdownElement = document.getElementById('countdown');
            
            redirectTimer = setInterval(function() {
                if (!isRedirectActive) {
                    return;
                }
                
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(redirectTimer);
                    window.location.href = 'admin_login.php';
                }
            }, 1000);
        }

        // Cancel auto-redirect
        function cancelRedirect() {
            isRedirectActive = false;
            clearInterval(redirectTimer);
            
            const countdownElement = document.getElementById('countdown');
            countdownElement.parentElement.innerHTML = '<i class="fas fa-check-circle mr-1 text-green-500"></i>Auto-redirect cancelled';
        }

        // Start countdown on page load
        window.addEventListener('DOMContentLoaded', function() {
            startCountdown();
        });

        // Clear any remaining session storage
        try {
            sessionStorage.clear();
            localStorage.removeItem('admin_token');
        } catch (e) {
            // Silent fail
        }

        console.log('Logout successful - Session cleared');
    </script>
</body>
</html>