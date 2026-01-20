<h3 class="text-lg font-bold mb-4">Add Trek</h3>

<div class="grid grid-cols-2 gap-3">
    <input id="trek-place" class="border px-3 py-2 rounded" placeholder="Place">
    <input id="trek-leader" class="border px-3 py-2 rounded" placeholder="Leader">
    <input id="trek-date" type="date" class="border px-3 py-2 rounded">
    <input id="trek-contact" class="border px-3 py-2 rounded" placeholder="Contact">
    <input id="trek-cost" class="border px-3 py-2 rounded" placeholder="Cost">
    <input id="trek-grade" class="border px-3 py-2 rounded" placeholder="Grade">
</div>

<textarea id="trek-desc"
    class="w-full border px-3 py-2 rounded mt-3"
    placeholder="Description"></textarea>

<div class="flex justify-end gap-2 mt-4">
    <button onclick="closeTrekModal()" class="border px-4 py-2 rounded">
        Cancel
    </button>
    <button onclick="saveTrek()" class="bg-primary text-white px-4 py-2 rounded">
        Save Trek
    </button>
</div>
