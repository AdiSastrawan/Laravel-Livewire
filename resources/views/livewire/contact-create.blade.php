<div>
    <form wire:submit.prevent="store"class="p-10 bg-white rounded shadow-xl" action="" method="post"
        enctype="multipart/form-data">
        <h1 class="text-2xl">Add data</h1>
        <div class="">
            <label class="block text-sm text-gray-600" for="name">Name</label>
            <input wire:model="name"class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">Phone</label>
            <input wire:model="phone"class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="phone"
                name="phone" type="text" required="" placeholder="Phone" aria-label="Phone">
        </div>

        <div class="mt-6">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                type="submit">Submit</button>
        </div>

    </form>
</div>
