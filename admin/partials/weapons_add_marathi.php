<?php
// partials/weapons_add_marathi.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Weapon (Marathi)</h1>
            <p class="text-sm text-gray-500">English + Marathi data required</p>
        </div>
        <button onclick="loadContent('weapons-mar')"
                class="text-sm text-primary hover:text-secondary">
            ← Back to Marathi Weapons
        </button>
    </div>

    <!-- Form -->
    <form id="add-weapon-marathi-form"
          class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- BASIC INFO -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Weapon Name -->
            <div>
                <label class="block text-sm font-medium">Weapon Name (English) *</label>
                <input name="WeaponName" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Weapon Name (Marathi)</label>
                <input name="WeaponNameMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Weapon Type -->
            <div>
                <label class="block text-sm font-medium">Weapon Type (English)</label>
                <input name="WeaponType"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Weapon Type (Marathi)</label>
                <input name="WeaponTypeMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Era -->
            <div>
                <label class="block text-sm font-medium">Weapon Era (English)</label>
                <input name="WeaponEra"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Weapon Era (Marathi)</label>
                <input name="WeaponEraMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Origin -->
            <div>
                <label class="block text-sm font-medium">Origin Country (English)</label>
                <input name="OriginCountry"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Origin Country (Marathi)</label>
                <input name="OriginCountryMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

        </div>

        <!-- CONTENT -->
        <div>
            <label class="block text-sm font-medium">Introduction (English)</label>
            <textarea name="Introduction" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">History (English)</label>
            <textarea name="History" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Technology (Marathi)</label>
            <textarea name="TechnologyMar" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Materials Used (Marathi)</label>
            <input name="MaterialsUsedMar"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Firing Mechanism (Marathi)</label>
            <input name="FiringMechanismMar"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Notes (Marathi)</label>
            <textarea name="Notes" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-2">
            <button type="button"
                    onclick="loadContent('weapons-mar')"
                    class="px-4 py-2 border rounded text-sm">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewWeaponMarathi()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm">
                <i class="fas fa-save mr-2"></i>Save Weapon
            </button>
        </div>

    </form>
</div>