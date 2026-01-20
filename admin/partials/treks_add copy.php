<div id="trek-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-2xl p-4">
        <h3 class="text-lg font-bold mb-3" id="trek-title">Add Trek</h3>

        <input type="hidden" id="trek-id">

        <div class="grid grid-cols-2 gap-3">
            <input id="trek-place" class="border p-2 rounded" placeholder="Place">
            <input id="trek-date" type="datetime-local" class="border p-2 rounded">
            <input id="trek-leader" class="border p-2 rounded" placeholder="Leader">
            <input id="trek-contact" class="border p-2 rounded" placeholder="Contact">
            <input id="trek-cost" type="number" class="border p-2 rounded" placeholder="Cost">
            <input id="trek-grade" class="border p-2 rounded" placeholder="Grade">
            <input id="trek-last" type="datetime-local" class="border p-2 rounded">
            <input id="trek-max" type="number" class="border p-2 rounded" placeholder="Max Participants">
        </div>

        <textarea id="trek-meet" class="border p-2 rounded w-full mt-3" placeholder="Meeting Place"></textarea>
        <textarea id="trek-desc" class="border p-2 rounded w-full mt-2" rows="3" placeholder="Description"></textarea>
        <textarea id="trek-notes" class="border p-2 rounded w-full mt-2" rows="2" placeholder="Notes"></textarea>

        <div class="flex justify-end gap-2 mt-4">
            <button onclick="closeTrekModal()" class="border px-4 py-2 rounded">Cancel</button>
            <button onclick="saveTrek()" class="bg-primary text-white px-4 py-2 rounded">Save</button>
        </div>
    </div>
</div>
