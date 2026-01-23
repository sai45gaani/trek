<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin']);

require_once '../config/database.php';
$db = new Database();
$conn = $db->getConnection();

$users = $conn->query("
    SELECT admin_id, username, email, full_name, role, is_active, last_login
    FROM admin_users
    ORDER BY admin_id DESC
");
?>

<div class="space-y-4">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-bold">Admin Users</h2>
        <button onclick="openUserModal()" class="bg-primary text-white px-4 py-2 rounded">
            <i class="fas fa-plus mr-1"></i> Add User
        </button>
    </div>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-2">Username</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Role</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Last Login</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
            <?php while($u = $users->fetch_assoc()): ?>
                <tr>
                    <td class="px-3 py-2"><?= htmlspecialchars($u['username']) ?></td>
                    <td class="px-3 py-2"><?= htmlspecialchars($u['full_name']) ?></td>
                    <td class="px-3 py-2"><?= htmlspecialchars($u['email']) ?></td>
                    <td class="px-3 py-2 font-medium"><?= $u['role'] ?></td>
                    <td class="px-3 py-2">
                        <?= $u['is_active'] ? 'Active' : 'Disabled' ?>
                    </td>
                    <td class="px-3 py-2 text-xs text-gray-500">
                        <?= $u['last_login'] ?: '-' ?>
                    </td>
                    <td class="px-3 py-2 text-center space-x-2">
                        <button onclick="editUser(<?= $u['admin_id'] ?>)" class="text-green-600">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'admin_user_modal.php'; ?>
