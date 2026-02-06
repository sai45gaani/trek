<?php
// partials/temples_add.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Temple</h1>
            <p class="text-sm text-gray-500">Create a new temple entry</p>
        </div>
        <button onclick="loadContent('temples')" class="text-sm text-primary hover:text-secondary">
            ← Back to Temples
        </button>
    </div>

    <!-- Add Temple Form -->
    <form id="add-temple-form" class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- Basic Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-sm font-medium mb-1">Temple Name *</label>
                <input type="text" name="TempleName" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Village *</label>
                <input type="text" name="Village" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Taluka</label>
                <input type="text" name="Taluka"
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

            <div>
                <label class="block text-sm font-medium mb-1">Main Deity</label>
                <input type="text" name="MainDeity"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Temple Type</label>
                <input type="text" name="TempleType"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Temple Category</label>
                <input type="text" name="TempleCategory"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">No. of Temples in Complex</label>
                <input type="text" name="NoOfTemplesInComplex"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Best Season to Visit</label>
                <input type="text" name="BestSeasonToVisit"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>
        </div>

        <!-- Rich Text Sections -->
        <div>
            <label class="block text-sm font-medium mb-1">Introduction</label>
            <textarea name="Introduction" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Importance</label>
            <textarea name="Importance" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">History</label>
            <textarea name="History" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Architecture</label>
            <textarea name="Architecture" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Orientation</label>
            <textarea name="Orientation" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Nearby Places</label>
            <textarea name="NearbyPlaces" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Sanctuary Info</label>
            <textarea name="SanctuaryInfo" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">How to Reach</label>
            <textarea name="HowToReach" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Trekking Routes</label>
            <textarea name="TrekkingRoutes" rows="3"
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
                    onclick="loadContent('temples')"
                    class="px-4 py-2 border rounded text-sm hover:bg-gray-50">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewTemple()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm hover:bg-secondary">
                <i class="fas fa-save mr-2"></i>Save Temple
            </button>
        </div>

    </form>
</div>