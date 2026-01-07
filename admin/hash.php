<?php
// Your password
$password = "amit&mahi@trekshitz";

// Generate a fresh hash for this password
$fresh_hash = password_hash($password, PASSWORD_DEFAULT);

// Test with the freshly generated hash
$test1_result = password_verify($password, $fresh_hash);

// Test with wrong password
$wrong_password = "wrongpassword";
$test2_result = password_verify($wrong_password, $fresh_hash);

// Test with the old hash I gave you
$old_hash = '$2y$10$vZXqH5dZfJxJqW3pN5kQzOGJ8Hm0kGvF5xH0KqF9nJ5LqMzNpOqRu';
$test3_result = password_verify($password, $old_hash);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hash Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto">
        
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h1 class="text-2xl font-bold mb-6">Password Hash & Verify Test</h1>
            
            <!-- Fresh Hash Display -->
            <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                <h2 class="font-bold mb-3">Freshly Generated Hash</h2>
                <p class="text-sm mb-2"><strong>Password:</strong> <code class="bg-white px-2 py-1 rounded"><?php echo htmlspecialchars($password); ?></code></p>
                <p class="text-sm mb-2"><strong>Generated Hash:</strong></p>
                <textarea readonly class="w-full text-xs bg-white p-2 border rounded font-mono" rows="3"><?php echo htmlspecialchars($fresh_hash); ?></textarea>
                <p class="text-xs text-blue-600 mt-2">
                    <i class="fas fa-info-circle mr-1"></i>
                    Copy this hash to use in your database!
                </p>
            </div>
            
            <!-- Test 1: Fresh Hash -->
            <div class="mb-4 p-4 border rounded <?php echo $test1_result ? 'bg-green-50 border-green-500' : 'bg-red-50 border-red-500'; ?>">
                <h3 class="font-bold mb-2">Test 1: Verify with Fresh Hash</h3>
                <p class="text-sm mb-2">Testing: <code class="bg-white px-2 py-1"><?php echo htmlspecialchars($password); ?></code> against fresh hash</p>
                
                <?php if ($test1_result): ?>
                    <div class="flex items-center text-green-700">
                        <i class="fas fa-check-circle text-xl mr-2"></i>
                        <div>
                            <p class="font-bold">✓ SUCCESS</p>
                            <p class="text-xs">password_verify() returned TRUE</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center text-red-700">
                        <i class="fas fa-times-circle text-xl mr-2"></i>
                        <div>
                            <p class="font-bold">✗ FAILED</p>
                            <p class="text-xs">Something is wrong!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Test 2: Wrong Password -->
            <div class="mb-4 p-4 border rounded <?php echo !$test2_result ? 'bg-green-50 border-green-500' : 'bg-red-50 border-red-500'; ?>">
                <h3 class="font-bold mb-2">Test 2: Verify with Wrong Password</h3>
                <p class="text-sm mb-2">Testing: <code class="bg-white px-2 py-1"><?php echo htmlspecialchars($wrong_password); ?></code> against fresh hash</p>
                
                <?php if (!$test2_result): ?>
                    <div class="flex items-center text-green-700">
                        <i class="fas fa-check-circle text-xl mr-2"></i>
                        <div>
                            <p class="font-bold">✓ CORRECT</p>
                            <p class="text-xs">password_verify() returned FALSE (as expected)</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center text-red-700">
                        <i class="fas fa-times-circle text-xl mr-2"></i>
                        <div>
                            <p class="font-bold">✗ ERROR</p>
                            <p class="text-xs">Wrong password should not match!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Test 3: Old Hash -->
            <div class="p-4 border rounded <?php echo $test3_result ? 'bg-green-50 border-green-500' : 'bg-yellow-50 border-yellow-500'; ?>">
                <h3 class="font-bold mb-2">Test 3: Verify with Old Hash (from earlier)</h3>
                <p class="text-sm mb-2">Testing: <code class="bg-white px-2 py-1"><?php echo htmlspecialchars($password); ?></code> against old hash I gave you</p>
                
                <?php if ($test3_result): ?>
                    <div class="flex items-center text-green-700">
                        <i class="fas fa-check-circle text-xl mr-2"></i>
                        <div>
                            <p class="font-bold">✓ OLD HASH WORKS</p>
                            <p class="text-xs">The hash I gave you earlier is valid</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center text-yellow-700">
                        <i class="fas fa-exclamation-triangle text-xl mr-2"></i>
                        <div>
                            <p class="font-bold">⚠ OLD HASH DOESN'T MATCH</p>
                            <p class="text-xs">Use the fresh hash above instead</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- SQL Instructions -->
        <div class="bg-gray-800 text-white rounded-lg shadow p-6">
            <h2 class="text-lg font-bold mb-3">SQL to Update Your Password:</h2>
            <pre class="text-sm bg-gray-900 p-3 rounded overflow-x-auto"><code>UPDATE admin_users 
SET password = '<?php echo $fresh_hash; ?>' 
WHERE username = 'admin';</code></pre>
            <p class="text-xs text-gray-400 mt-2">Copy and run this SQL in phpMyAdmin</p>
        </div>

        <!-- Explanation -->
        <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
            <h3 class="font-bold text-blue-700 mb-2">Why the old hash might fail:</h3>
            <ul class="text-blue-600 text-sm space-y-1">
                <li>• Each time password_hash() runs, it creates a DIFFERENT hash</li>
                <li>• Both hashes are valid for the same password</li>
                <li>• But password_verify() can verify against any of them</li>
                <li>• Use the FRESH hash above in your database</li>
            </ul>
        </div>
    </div>
</body>
</html>