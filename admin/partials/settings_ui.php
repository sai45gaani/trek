<?php
require_once __DIR__ . '/settings.php'; // ✅ SAFE
?>


<?php
$groups = [];
$res = $conn->query("SELECT * FROM app_settings ORDER BY setting_group, id");
while ($row = $res->fetch_assoc()) {
    $groups[$row['setting_group']][] = $row;
}
?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Application Settings</h2>

    <?php foreach ($groups as $group => $settings): ?>
        <div class="mb-6 border rounded-lg p-4">
            <h3 class="font-semibold mb-3 capitalize"><?= htmlspecialchars($group) ?> Settings</h3>

            <?php foreach ($settings as $s): ?>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">
                        <?= htmlspecialchars($s['setting_label']) ?>
                    </label>

                    <?php if ($s['setting_type'] === 'text' || $s['setting_type'] === 'number'): ?>
                        <input
                            type="<?= $s['setting_type'] ?>"
                            data-key="<?= $s['setting_key'] ?>"
                            class="setting-input w-full border p-2 rounded"
                            value="<?= htmlspecialchars($s['setting_value']) ?>"
                        >

                    <?php elseif ($s['setting_type'] === 'textarea'): ?>
                        <textarea
                            data-key="<?= $s['setting_key'] ?>"
                            class="setting-input w-full border p-2 rounded"
                        ><?= htmlspecialchars($s['setting_value']) ?></textarea>

                    <?php elseif ($s['setting_type'] === 'boolean'): ?>
                        <select
                            data-key="<?= $s['setting_key'] ?>"
                            class="setting-input w-full border p-2 rounded">
                            <option value="1" <?= $s['setting_value']=='1'?'selected':'' ?>>Enabled</option>
                            <option value="0" <?= $s['setting_value']=='0'?'selected':'' ?>>Disabled</option>
                        </select>

                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <button onclick="saveSettings()" class="bg-primary text-white px-6 py-2 rounded">
        Save Settings
    </button>
</div>
