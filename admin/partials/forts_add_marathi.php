<?php
// partials/forts_add_marathi.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Fort (Marathi)</h1>
            <p class="text-sm text-gray-500">English + Marathi data required</p>
        </div>
        <button onclick="loadContent('forts-mar')" class="text-sm text-primary hover:text-secondary">
            ← Back to Marathi Forts
        </button>
    </div>

    <form id="add-fort-marathi-form" class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- BASIC INFO -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Fort Name -->
            <div>
                <label class="block text-sm font-medium">Fort Name (English) *</label>
                <input name="FortName" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Fort Name (Marathi) *</label>
                <input name="FortNameMar" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Fort Type -->
            <div>
                <label class="block text-sm font-medium">Fort Type (English) *</label>
                <input name="FortType" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Fort Type (Marathi) *</label>
                <input name="FortTypeMar" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- District -->
            <div>
                <label class="block text-sm font-medium">District (English) *</label>
                <input name="FortDistrict" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">District (Marathi) *</label>
                <input name="FortDistrictMar" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Range -->
            <div>
                <label class="block text-sm font-medium">Range (English) *</label>
                <input name="FortRange" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Range (Marathi) *</label>
                <input name="FortRangeMar" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Grade -->
            <div>
                <label class="block text-sm font-medium">Grade (English) *</label>
                <input name="Grade" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Grade (Marathi) *</label>
                <input name="GradeMar" required class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Height -->
            <div>
                <label class="block text-sm font-medium">Height (Marathi)</label>
                <input name="HeightMar" class="w-full border px-3 py-2 rounded text-sm">
            </div>

        </div>

        <!-- CONTENT -->
        <div>
            <label class="block text-sm font-medium">Introduction (Marathi) *</label>
            <textarea name="Introduction" required rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">History (Marathi) *</label>
            <textarea name="History" required rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Geography (Marathi)</label>
            <textarea name="Geography" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Notes (Marathi)</label>
            <textarea name="Notes" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-2">
            <button type="button" onclick="loadContent('forts-mar')"
                    class="px-4 py-2 border rounded text-sm">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewFortMarathi()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm">
                <i class="fas fa-save mr-2"></i>Save Fort
            </button>
        </div>

    </form>
</div>
