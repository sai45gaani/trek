<?php
// Hardcoded test values
$password = "amit&mahi@trekshitz";  // Plain text password
$hashed_password = "$2y$10$vZXqH5dZfJxJqW3pN5kQzOGJ8Hm0kGvF5xH0KqF9nJ5LqMzNpOqRu"; // Hashed version

// Test password_verify function
$is_match = password_verify($password, $hashed_password);

// Alternative test with wrong password
$wrong_password = "wrongpassword";
$is_wrong_match = password_verify($wrong_password, $hashed_password);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Verify Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto">
        
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h1 class="text-2xl font-bold mb-4">Password Verify Test</h1>
            
            <!-- Test 1: Correct Password -->
            <div class="mb-6 p-4 border rounded">
                <h2 class="font-bold text-lg mb-3">Test 1: Correct Password</h2>
                
                <div class="space-y-2 text-sm mb-4">
                    <p><strong>Plain Password:</strong> <code class="bg-gray-100 px-2 py-1 rounded"><?php echo htmlspecialchars($password); ?></code></p>
                    <p><strong>Hashed Password:</strong> <code class="bg-gray-100 px-2 py-1 rounded text-xs break-all"><?php echo htmlspecialchars($hashed_password); ?></code></p>
                </div>
                
                <div class="p-3 rounded <?php echo $is_match ? 'bg-green-50 border border-green-500' : 'bg-red-50 border border-red-500'; ?>">
                    <?php if ($is_match): ?>
                        <div class="flex items-center text-green-700">
                            <i class="fas fa-check-circle text-2xl mr-3"></i>
                            <div>
                                <p class="font-bold">SUCCESS!</p>
                                <p class="text-sm">password_verify() returned TRUE</p>
                                <p class="text-xs mt-1">The password "<?php echo htmlspecialchars($password); ?>" matches the hash</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center text-red-700">
                            <i class="fas fa-times-circle text-2xl mr-3"></i>
                            <div>
                                <p class="font-bold">FAILED!</p>
                                <p class="text-sm">password_verify() returned FALSE</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Test 2: Wrong Password -->
            <div class="p-4 border rounded">
                <h2 class="font-bold text-lg mb-3">Test 2: Wrong Password</h2>
                
                <div class="space-y-2 text-sm mb-4">
                    <p><strong>Plain Password:</strong> <code class="bg-gray-100 px-2 py-1 rounded"><?php echo htmlspecialchars($wrong_password); ?></code></p>
                    <p><strong>Hashed Password:</strong> <code class="bg-gray-100 px-2 py-1 rounded text-xs break-all"><?php echo htmlspecialchars($hashed_password); ?></code></p>
                </div>
                
                <div class="p-3 rounded <?php echo !$is_wrong_match ? 'bg-green-50 border border-green-500' : 'bg-red-50 border border-red-500'; ?>">
                    <?php if (!$is_wrong_match): ?>
                        <div class="flex items-center text-green-700">
                            <i class="fas fa-check-circle text-2xl mr-3"></i>
                            <div>
                                <p class="font-bold">CORRECT BEHAVIOR!</p>
                                <p class="text-sm">password_verify() returned FALSE (as expected)</p>
                                <p class="text-xs mt-1">The wrong password correctly does NOT match</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center text-red-700">
                            <i class="fas fa-times-circle text-2xl mr-3"></i>
                            <div>
                                <p class="font-bold">ERROR!</p>
                                <p class="text-sm">Wrong password should not match!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Code Display -->
        <div class="bg-gray-800 text-white rounded-lg shadow p-6">
            <h2 class="text-lg font-bold mb-3">The Code:</h2>
            <pre class="text-sm overflow-x-auto"><code><?php echo htmlspecialchars('<?php
$password = "amit&mahi@trekshitz";
$hashed_password = "$2y$10$vZXqH5dZfJxJqW3pN5kQzOGJ8Hm0kGvF5xH0KqF9nJ5LqMzNpOqRu";

// This is what happens in your login
if (password_verify($password, $hashed_password)) {
    echo "Login SUCCESS!";
} else {
    echo "Login FAILED!";
}
?>'); ?></code></pre>
        </div>

        <!-- Change Password Instructions -->
        <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
            <h3 class="font-bold text-blue-700 mb-2">Want to test your own password?</h3>
            <p class="text-blue-600 text-sm mb-2">Edit this file and change line 3:</p>
            <code class="block bg-white px-3 py-2 rounded text-sm">$password = "your_password_here";</code>
            <p class="text-blue-600 text-sm mt-2">Then refresh the page to see if it matches!</p>
        </div>
    </div>
</body>
</html>