<h3 id="trek-title" class="text-lg font-bold mb-4">Add Trek</h3>

<input type="hidden" id="trek-id">
<input type="hidden" id="trek-mode" value="add">

<div class="grid grid-cols-2 gap-4">

    <div>
        <label id="lbl-place" class="text-sm font-medium">Please enter place</label>
        <input id="trek-place" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-leader" class="text-sm font-medium">Please enter leader name</label>
        <input id="trek-leader" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-date" class="text-sm font-medium">Please select trek date</label>
        <input id="trek-date" type="date" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-display" class="text-sm font-medium">Please enter display date</label>
        <input id="trek-display" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-contact" class="text-sm font-medium">Please enter contact number</label>
        <input id="trek-contact" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-cost" class="text-sm font-medium">Please enter cost</label>
        <input id="trek-cost" type="number" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-grade" class="text-sm font-medium">Please enter grade</label>
        <input id="trek-grade" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-last" class="text-sm font-medium">Please select last booking date</label>
        <input id="trek-last" type="date" class="border px-3 py-2 rounded w-full">
    </div>

    <div>
        <label id="lbl-max" class="text-sm font-medium">Please enter max participants</label>
        <input id="trek-max" type="number" class="border px-3 py-2 rounded w-full">
    </div>

</div>

<div class="mt-3">
    <label id="lbl-meet" class="text-sm font-medium">Please enter meeting place</label>
    <textarea id="trek-meet" class="border px-3 py-2 rounded w-full"></textarea>
</div>

<div class="mt-3">
    <label id="lbl-desc" class="text-sm font-medium">Please enter description</label>
    <textarea id="trek-desc" class="border px-3 py-2 rounded w-full"></textarea>
</div>

<div class="mt-3">
    <label id="lbl-notes" class="text-sm font-medium">Please enter notes</label>
    <textarea id="trek-notes" class="border px-3 py-2 rounded w-full"></textarea>
</div>

<div class="flex justify-end gap-2 mt-4">
    <button id="trek-save-btn"
            onclick="saveTrek()"
            class="bg-primary text-white px-4 py-2 rounded">
        Save Trek
    </button>
</div>
