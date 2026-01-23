<div id="user-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-lg p-4">
        <h3 id="user-title" class="text-lg font-bold mb-3">Add Admin User</h3>

        <input type="hidden" id="user-id">

        <div class="space-y-2">
            <input id="user-username" class="w-full border p-2 rounded" placeholder="Username">
            <input id="user-fullname" class="w-full border p-2 rounded" placeholder="Full Name">
            <input id="user-email" class="w-full border p-2 rounded" placeholder="Email">

            <select id="user-role" class="w-full border p-2 rounded">
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
                <option value="viewer">Viewer</option>
            </select>

            <input id="user-password" type="password"
                class="w-full border p-2 rounded"
                placeholder="Password (leave empty to keep unchanged)">
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeUserModal()" class="border px-4 py-2 rounded">Cancel</button>
            <button onclick="saveUser()" class="bg-primary text-white px-4 py-2 rounded">Save</button>
        </div>
    </div>
</div>
