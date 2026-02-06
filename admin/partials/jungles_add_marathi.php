<?php
// partials/jungles_add_marathi.php
require_once '../config/database.php';
?>

<div class="space-y-4">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Jungle (Marathi)</h1>
            <p class="text-sm text-gray-500">English + Marathi data required</p>
        </div>
        <button onclick="loadContent('jungles-mar')"
                class="text-sm text-primary hover:text-secondary">
            ← Back to Marathi Jungles
        </button>
    </div>

    <!-- Form -->
    <form id="add-jungle-marathi-form"
          class="bg-white rounded-lg shadow p-6 space-y-6">

        <!-- BASIC INFO -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-sm font-medium">Jungle Name (English) *</label>
                <input name="JungleName" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">Jungle Name (Marathi)</label>
                <input name="JungleNameMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">State (English) *</label>
                <input name="State" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">State (Marathi)</label>
                <input name="StateMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">District (English) *</label>
                <input name="District" required
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium">District (Marathi)</label>
                <input name="DistrictMar"
                       class="w-full border px-3 py-2 rounded text-sm">
            </div>

        </div>

        <!-- ZONES -->
        <div>
            <label class="block text-sm font-medium">Core Zone Gates (Marathi)</label>
            <textarea name="CoreZoneGatesMar" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Buffer Zone Gates (Marathi)</label>
            <textarea name="BufferZoneGatesMar" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- CONTENT -->
        <div>
            <label class="block text-sm font-medium">Introduction (Marathi)</label>
            <textarea name="IntroductionMar" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">History (Marathi)</label>
            <textarea name="HistoryMar" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Geography (Marathi)</label>
            <textarea name="GeographyMar" rows="3"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Safari Timings (Marathi)</label>
            <textarea name="SafariTimingsMar" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Best Season to Visit (Marathi)</label>
            <input name="BestSeasonToVisitMar"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Animals (Marathi)</label>
            <input name="AnimalsMar"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Birds (Marathi)</label>
            <input name="BirdsMar"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Trees (Marathi)</label>
            <input name="TreesMar"
                   class="w-full border px-3 py-2 rounded text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium">Notes (Marathi)</label>
            <textarea name="NotesMar" rows="2"
                      class="w-full border px-3 py-2 rounded text-sm"></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex justify-end gap-2">
            <button type="button"
                    onclick="loadContent('jungles-mar')"
                    class="px-4 py-2 border rounded text-sm">
                Cancel
            </button>

            <button type="button"
                    onclick="saveNewJungleMarathi()"
                    class="px-6 py-2 bg-primary text-white rounded text-sm">
                <i class="fas fa-save mr-2"></i>Save Jungle
            </button>
        </div>

    </form>
</div>