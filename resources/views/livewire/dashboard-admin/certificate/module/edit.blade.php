<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card">
        <div class="space-y-4">
            <h2 class="font-bold text-base">Modulo:</h2>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Title:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Title" wire:model="title" />
                    @error('title')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>order:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Order"
                        wire:model="order" />
                    @error('order')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <x-button color="blue" wire:click="edit_module" secondary="800" primary="500"
                class="px-4 py-2">Save</x-button>
            <br>
            <br>
        </div>
    </div>
    <div class="bg-white px-4 py-4 card">
        <div class="space-y-4">
            <h2 class="font-bold text-base">Video:</h2>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Title video:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Title video"
                        wire:model="title_video" />
                    @error('title_video')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>codigo video:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="url video"
                        wire:model="url_video" />
                    @error('url_video')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Description video:</x-label>
                    <x-textarea class="border-gray-50 w-full" required placeholder="Description video"
                        wire:model="description_video" rows="3">

                    </x-textarea>
                    <br>
                    <x-button color="blue" wire:click="edit_module_video" secondary="800" primary="500"
                        class="px-4 py-2">Save</x-button>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white px-4 py-4 card">
        <div class="space-y-4">
            <h2 class="font-bold text-base">Materiales:</h2>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Title material:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Title materials"
                        wire:model="title_material" />
                    @error('title_material')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Url material:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="url video"
                        wire:model="url_material" />
                    @error('url_material')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Description material:</x-label>
                    <x-textarea class="border-gray-50 w-full" required placeholder="Description video"
                        wire:model="description_material" rows="3">

                    </x-textarea>
                    @error('description_material')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <x-button color="blue" wire:click="save_materials" secondary="800" primary="500"
                class="px-4 py-2">Save</x-button>
            <br>
            <br>
        </div>
        <div class="space-y-4">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                        Materiales
                    </p>
                </header>

                <div class="card has-table">
                    <div class="card-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>url</th>
                                    <th>description</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($materials->isEmpty())
                                    <div class="card empty">
                                        <div class="card-content">
                                            <div>
                                                <span class="icon large"><i
                                                        class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                                            </div>
                                            <p>Nothing's here…</p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($materials as $material)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td data-label="title">{{ $material->title }}</td>
                                            <td data-label="url">{{ $material->url }}</td>
                                            <td data-label="descriptions">{{ $material->description }}</td>
                                            <td class="actions-cell">
                                                <div class="buttons right nowrap space-x-1">
                                                    <x-button class=" --jb-modal px-1 py-1"
                                                        data-target="sample-modal-delete-{{ $material->id }}"
                                                        color="red" secondary="800" primary="600" title="delete">
                                                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                    </x-button>
                                                </div>

                                            </td>
                                        </tr>
                                        <x-modal-table val="-delete-{{ $material->id }}">
                                            <x-slot name="title">
                                                Delete materials: {{ $material->title }}
                                            </x-slot>
                                            Are you sure to delete this materials?
                                            <x-slot name="buttons">
                                                <div class="space-x-2">
                                                    <x-button color="gray" secondary="800" primary="600"
                                                        class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                    <x-button color="red"
                                                        wire:click="delete_material({{ $material->id }})"
                                                        secondary="800" primary="500"
                                                        class="px-4 py-2">Delete</x-button>

                                                </div>
                                            </x-slot>
                                        </x-modal-table>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
