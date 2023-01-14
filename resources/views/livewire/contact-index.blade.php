<div>
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
        @if (session()->has('message'))
            <div class="bg-green-100 rounded-lg py-5 px-6 text-base text-green-700 " role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if ($statusUpdate)
            <livewire:contact-update />
        @else
            <livewire:contact-create />
        @endif
        <div class="bg-white">

            <h1>Filter Index </h1>
            <select wire:model="paginate"name="" class="m-2" id="">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
            <h1>Search</h1>
            <input wire:model="search"type="text">
        </div>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>

                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>


                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($data as $d)
                    @if ($loop->iteration % 2 != 0)
                        <tr>

                            <td class="w-1/3 text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $d->name }}</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                    href="tel:622322662">{{ $d->phone }}</a>
                            <td class="flex">
                                <button wire:click='getContact({{ $d->id }})'
                                    class="px-3 py-1 rounded-md text-white bg-blue-600">Edit</button>
                                <button
                                    wire:click='deleteContact({{ $d->id }})'class="ml-2 px-3 rounded-md py-1 text-white bg-red-600">
                                    Delete</button>
                            </td>

                        </tr>
                    @else
                        <tr class="bg-gray-100">

                            <td class="w-1/3 text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $d->name }}</td>
                            <td class="text-left py-3 px-4 "><a class="hover:text-blue-500"
                                    href="tel:622322662">{{ $d->phone }}</a>
                            </td>
                            <td class="flex ">
                                <button wire:click='getContact({{ $d->id }})'
                                    class="px-3 py-1 text-white bg-blue-600 rounded-md">Edit</button>
                                <button wire:click='deleteContact({{ $d->id }})'
                                    class="ml-2 px-3 py-1 text-white bg-red-600 rounded-md">Delete</button>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>
