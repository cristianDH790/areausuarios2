<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    exhibitor

                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Search service" />
                    </div>
                </div>
                <div class="navbar-item">
                    <div class="buttons">
                        <x-button color="green" secondary="800" primary="500" class="px-2.5 py-2 --jb-modal"
                            data-target="sample-modal-create" title="create"><i class="mdi mdi-plus-circle"></i>
                        </x-button>
                    </div>
                </div>
            </header>

            <div class="card has-table">
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="image-cell">Image</th>
                                <th>Name</th>
                                <th>prefix</th>
                                <th>document</th>
                                <th>fone</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($exhibitors->isEmpty())
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
                                @foreach ($exhibitors as $exhibitor)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td class="image-cell">
                                            <div class="w-10 h-10">
                                                @if ($exhibitor->photo)
                                                    <img src="{{ asset('storage/' . $exhibitor->photo) }}"
                                                        class="rounded-md" alt="Imagen del servicio"
                                                        style="max-width: 100%; max-height: 100%;">
                                                @else
                                                    <img src="{{ asset('storage/no-image.png') }}" class="rounded-md"
                                                        alt="Imagen predeterminada"
                                                        style="max-width: 100%; max-height: 100%;">
                                                @endif
                                            </div>

                                        </td>
                                        <td data-label="Name">{{ $exhibitor->name }} {{ $exhibitor->last_name }}</td>

                                        <td data-label="type">{{ $exhibitor->prefix }}</td>
                                        <td data-label="hour">{{ $exhibitor->document }}</td>
                                        <td data-label="code">{{ $exhibitor->phone }}</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-view-{{ $exhibitor->id }}" color="blue"
                                                    secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    href="{{ route('service.edit', $exhibitor->id) }}" color="yellow"
                                                    secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $exhibitor->id }}"
                                                    color="red" secondary="800" primary="600" title="delete">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>


                                            </div>

                                        </td>
                                    </tr>





                                    <x-modal-table val="-delete-{{ $exhibitor->id }}">
                                        <x-slot name="title">
                                            Delete service: {{ $exhibitor->name }}
                                        </x-slot>
                                        Are you sure to delete this service?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red" wire:click="delete({{ $exhibitor->id }})"
                                                    secondary="800" primary="500" class="px-4 py-2">Delete</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>

                                    <x-modal-table val="-view-{{ $exhibitor->id }}">
                                        <x-slot name="title">
                                            <div class="space-x-2 flex items-center justify-between  w-full">
                                                <div class="flex items-center">
                                                    <div class="h-4 w-4 rounded-full mr-2 bg-green-500">
                                                    </div>

                                                </div>
                                                <div>
                                                    <span class="font-bold"> Code:</span>
                                                    {{ $exhibitor->code_service }}
                                                </div>
                                            </div>
                                        </x-slot>
                                        <div class="space-y-4">
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Name:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $exhibitor->name }}" />
                                                </div>

                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Slug:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $exhibitor->slug }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>Price:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $exhibitor->price }}" />
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Price discount:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $exhibitor->price_discount }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>Hours:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $exhibitor->hours }}" />
                                                </div>

                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Start date:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $exhibitor->start_date }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>End date:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $exhibitor->end_date }}" />
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Description little:</x-label>
                                                    <x-textarea class="border-gray-50 w-full" disabled readonly
                                                        placeholder="Description Little">{{ $exhibitor->little_description }}</x-textarea>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Description:</x-label>
                                                    <x-textarea class="border-gray-50 w-full" disabled readonly
                                                        placeholder="Description">{{ $exhibitor->description }}</x-textarea>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">

                                                    <x-label>Image:</x-label>
                                                    @if ($exhibitor->photo)
                                                        <img src="{{ asset('storage/' . $exhibitor->photo) }}"
                                                            alt="image service" class="w-75 h-auto">
                                                    @else
                                                        <span class="text-red-500">*
                                                            no image found. please edit the default image</span>
                                                        <img src="{{ asset('storage/no-image.png') }}"
                                                            class=" w-64  h-64" alt="Imagen predeterminada">
                                                    @endif


                                                </div>
                                            </div>

                                        </div>
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                            </div>
                                        </x-slot>
                                    </x-modal-table>
                                @endforeach
                            @endif
                            <x-modal-table val="-create">
                                <x-slot name="title">
                                    Create Service
                                </x-slot>
                                <div class="space-y-4">
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Name:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Name" wire:model="name" />
                                            @error('name')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Last Name:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Last Name" wire:model="last_name" />
                                            @error('last_name')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Document:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Document" wire:model="document" />
                                            @error('document')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Prefix:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full"
                                                placeholder="Prefix" wire:model="prefix" />
                                            @error('prefix')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Phone:</x-label>
                                            <x-input type="number" class="border-gray-50 w-full" placeholder="Phone"
                                                wire:model="phone" />
                                            @error('phone')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Review:</x-label>
                                            <x-textarea class="border-gray-50 w-full" placeholder="Review"
                                                wire:model="review"></x-textarea>
                                            @error('review')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Image:</x-label>
                                            <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png"
                                                max_size="25Mb" accept="image/jpeg,image/bmp,image/png">
                                                Subir
                                                imagen
                                                service
                                            </x-file.drag-and-drop-single>
                                            @error('file')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <x-slot name="buttons">
                                    <div class="space-x-2">
                                        <x-button color="gray" secondary="800" primary="600"
                                            class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                        <x-button color="blue" wire:click="save" secondary="800" primary="500"
                                            class="px-4 py-2">Save</x-button>
                                    </div>
                                </x-slot>
                            </x-modal-table>
                        </tbody>
                    </table>
                    <div class="table-pagination">
                        @if ($exhibitors->hasPages())
                            {{ $exhibitors->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
