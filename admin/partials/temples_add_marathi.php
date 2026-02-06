<?php
// partials/temples_add_marathi.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Temple (Marathi)</h1>
            <p class="text-sm text-gray-500">English + Marathi data required</p>
        </div>
        <button onclick="loadContent('temples-mar')"
                class="text-sm text-primary hover:text-secondary">
            ← Back to Marathi Temples
        </button>
    </div>

    <!-- Form -->
    <form id="add-temple-marathi-form"
          class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- BASIC INFO -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Temple Name -->
            <div>
                <label class="block text-sm font-medium">Temple Name (English) *</label>
                <input name="TempleName" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Temple Name (Marathi) *</label>
                <input name="TempleNameMar" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Village -->
            <div>
                <label class="block text-sm font-medium">Village (English) *</label>
                <input name="Village" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Village (Marathi) *</label>
                <input name="VillageMar" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- District -->
            <div>
                <label class="block text-sm font-medium">District (English) *</label>
                <input name="District" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">District (Marathi) *</label>
                <input name="DistrictMar" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Main Deity -->
            <div>
                <label class="block text-sm font-medium">Main Deity (English) *</label>
                <input name="MainDeity" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Main Deity (Marathi) *</label>
                <input name="MainDeityMar" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Built By -->
            <div>
                <label class="block text-sm font-medium">Built By (English)</label>
                <input name="BuiltBy"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Built By (Marathi)</label>
                <input name="BuiltByMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <!-- Period -->
            <div>
                <label class="block text-sm font-medium">Period (English)</label>
                <input name="Period"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Period (Marathi)</label>
                <input name="PeriodMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

        </div>

        <!-- CONTENT (Marathi-focused like forts) -->
        <div>
            <label class="block text-sm font-medium">Architecture (Marathi)</label>
            <textarea name="ArchitectureMar" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">History (Marathi) *</label>
            <textarea name="History" required rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Notes (Marathi)</label>
            <textarea name="Notes" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-2">
            <button type="button"
                    onclick="loadContent('temples-mar')"
                    class="px-4 py-2 border rounded text-sm">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewTempleMarathi()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm">
                <i class="fas fa-save mr-2"></i>Save Temple
            </button>
        </div>

    </form>
</div>