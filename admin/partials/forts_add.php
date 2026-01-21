<?php
// partials/forts_add.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Fort</h1>
            <p class="text-sm text-gray-500">Create a new fort entry</p>
        </div>
        <button onclick="loadContent('forts')" class="text-sm text-primary hover:text-secondary">
            ← Back to Forts
        </button>
    </div>

    <!-- Add Fort Form -->
    <form id="add-fort-form" class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- Basic Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Fort Name *</label>
                <input type="text" name="FortName" required
                       class="w-full border px-3 py-2 rounded text-sm focus:ring-2 focus:ring-primary">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Fort Type *</label>
                <input type="text" name="FortType" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">District *</label>
                <input type="text" name="FortDistrict" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Range *</label>
                <input type="text" name="FortRange" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Grade *</label>
                <select name="Grade" required class="w-full border px-3 py-2 rounded text-sm">
                    <option value="">Select Grade</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Height</label>
                <input type="text" name="Height"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>
        </div>

        <!-- Rich Content -->
        <div>
            <label class="block text-sm font-medium mb-1">Introduction</label>
            <textarea name="Introduction" rows="4"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">History</label>
            <textarea name="History" rows="4"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Geography</label>
            <textarea name="Geography" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Best Season to Visit</label>
            <input type="text" name="BestSeasonToVisit"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Notes</label>
            <textarea name="Notes" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-2">
            <button type="button" onclick="loadContent('forts')"
                    class="px-4 py-2 border rounded text-sm hover:bg-gray-50">
                Cancel
            </button>
          <button type="button"
        onclick="saveNewFort()"
        class="px-6 py-2 bg-primary text-white rounded text-sm hover:bg-secondary">
    <i class="fas fa-save mr-2"></i> Save Fort
</button>



        </div>

    </form>
</div>

