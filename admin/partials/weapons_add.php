<?php
// partials/weapons_add.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Weapon</h1>
            <p class="text-sm text-gray-500">Create a new weapon entry</p>
        </div>
        <button onclick="loadContent('weapons')"
                class="text-sm text-primary hover:text-secondary">
            ← Back to Weapons
        </button>
    </div>

    <!-- Add Weapon Form -->
    <form id="add-weapon-form"
          class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- Basic Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-sm font-medium mb-1">
                    Weapon Name *
                </label>
                <input type="text" name="WeaponName" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Weapon Type *
                </label>
                <input type="text" name="WeaponType" required
                       placeholder="Firearm, Cold Weapon, Siege Weapon"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Weapon Era
                </label>
                <input type="text" name="WeaponEra"
                       placeholder="Ancient, Medieval, Modern"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Origin Country
                </label>
                <input type="text" name="OriginCountry"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Materials Used
                </label>
                <input type="text" name="MaterialsUsed"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Weight
                </label>
                <input type="text" name="Weight"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Range / Capacity
                </label>
                <input type="text" name="RangeCapacity"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Firing Mechanism
                </label>
                <input type="text" name="FiringMechanism"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>
        </div>

        <!-- Text Sections -->
        <div>
            <label class="block text-sm font-medium mb-1">Introduction</label>
            <textarea name="Introduction" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">History</label>
            <textarea name="History" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Technology</label>
            <textarea name="Technology" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">
                Notable Usage in India
            </label>
            <textarea name="NotableUsageInIndia" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">
                Related Battles
            </label>
            <textarea name="RelatedBattles" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Advantages</label>
            <textarea name="Advantages" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Limitations</label>
            <textarea name="Limitations" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Notes</label>
            <textarea name="Notes" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-2">
            <button type="button"
                    onclick="loadContent('weapons')"
                    class="px-4 py-2 border rounded text-sm hover:bg-gray-50">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewWeapon()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm hover:bg-secondary">
                <i class="fas fa-save mr-2"></i>Save Weapon
            </button>
        </div>

    </form>
</div>