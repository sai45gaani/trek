<?php
// partials/jungles_add.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Jungle</h1>
            <p class="text-sm text-gray-500">Create a new jungle entry</p>
        </div>
        <button onclick="loadContent('jungles')"
                class="text-sm text-primary hover:text-secondary">
            ← Back to Jungles
        </button>
    </div>

    <!-- Add Jungle Form -->
    <form id="add-jungle-form"
          class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- Basic Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-sm font-medium mb-1">Jungle Name *</label>
                <input type="text" name="JungleName" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">State *</label>
                <input type="text" name="State" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">District *</label>
                <input type="text" name="District" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nearest City</label>
                <input type="text" name="NearestCity"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>
        </div>

        <!-- Gates -->
        <div>
            <label class="block text-sm font-medium mb-1">Core Zone Gates</label>
            <textarea name="CoreZoneGates" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Buffer Zone Gates</label>
            <textarea name="BufferZoneGates" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- Content -->
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
            <label class="block text-sm font-medium mb-1">Geography</label>
            <textarea name="Geography" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Safari Timings</label>
            <textarea name="SafariTimings" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Best Season to Visit</label>
                <input type="text" name="BestSeasonToVisit"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Official Website</label>
                <input type="text" name="OfficialWebsite"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>
        </div>

        <!-- Flora & Fauna -->
        <div>
            <label class="block text-sm font-medium mb-1">Animals</label>
            <input type="text" name="Animals"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Birds</label>
            <input type="text" name="Birds"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Trees</label>
            <input type="text" name="Trees"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Reptiles</label>
            <input type="text" name="Reptiles"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Interesting Facts</label>
            <textarea name="InterestingFacts" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Conservation Info</label>
            <textarea name="ConservationInfo" rows="3"
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
                    onclick="loadContent('jungles')"
                    class="px-4 py-2 border rounded text-sm hover:bg-gray-50">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewJungle()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm hover:bg-secondary">
                <i class="fas fa-save mr-2"></i>Save Jungle
            </button>
        </div>

    </form>
</div>