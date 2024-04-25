<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    service

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
                                <th>type</th>
                                <th>hour</th>
                                <th>code</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($services->isEmpty())
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
                                @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td class="image-cell">
                                            <div class="image">
                                                @if ($service->image)
                                                    <img src="{{ asset('storage/' . $service->image) }}"
                                                        class="rounded-md" alt="Imagen del servicio">
                                                @else
                                                    <img src="{{ asset('storage/no-image.png') }}" class="rounded-md"
                                                        alt="Imagen predeterminada">
                                                @endif

                                            </div>
                                        </td>
                                        <td data-label="Name">{{ $service->name }}</td>
                                        <td data-label="type">{{ $service->type_service->name }}</td>
                                        <td data-label="hour">{{ $service->hours }}</td>
                                        <td data-label="code">{{ $service->code_service }}</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-view-{{ $service->id }}" color="blue"
                                                    secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    href="{{ route('service.edit', $service->id) }}" color="yellow"
                                                    secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $service->id }}" color="red"
                                                    secondary="800" primary="600" title="delete">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>
                                            </div>

                                        </td>
                                    </tr>

                                    <x-modal-table val="-delete-{{ $service->id }}">
                                        <x-slot name="title">
                                            Delete service: {{ $service->name }}
                                        </x-slot>
                                        Are you sure to delete this service?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red" wire:click="delete({{ $service->id }})"
                                                    secondary="800" primary="500" class="px-4 py-2">Delete</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>

                                    <x-modal-table val="-view-{{ $service->id }}">
                                        <x-slot name="title">
                                            <div class="space-x-2 flex items-center justify-between  w-full">
                                                <div class="flex items-center">
                                                    <div class="h-4 w-4 rounded-full mr-2 bg-green-500">
                                                    </div>

                                                </div>
                                                <div>
                                                    <span class="font-bold"> Code:</span>
                                                    {{ $service->code_service }}
                                                </div>
                                            </div>
                                        </x-slot>
                                        <div class="space-y-4">
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Name:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $service->name }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>type service:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $service->type_service->name }}" />
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Slug:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $service->slug }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>Price:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $service->price }}" />
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Price discount:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $service->price_discount }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>Hours:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $service->hours }}" />
                                                </div>

                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Start date:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $service->start_date }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>End date:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $service->end_date }}" />
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Description little:</x-label>
                                                    <x-textarea class="border-gray-50 w-full" disabled readonly
                                                        placeholder="Description Little">{{ $service->little_description }}</x-textarea>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Description:</x-label>
                                                    <x-textarea class="border-gray-50 w-full" disabled readonly
                                                        placeholder="Description">{{ $service->description }}</x-textarea>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">

                                                    <x-label>Image:</x-label>
                                                    @if ($service->image)
                                                        <img src="{{ asset('storage/' . $service->image) }}"
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
                                            <x-label>type service:</x-label>
                                            <select class="border-gray-50 py-2 px-3 w-full" required
                                                wire:model="type_service_id">
                                                <option value="" class="text-gray-200">Select type service
                                                </option>
                                                @foreach ($type_services as $type_service)
                                                    <option value="{{ $type_service->id }}">{{ $type_service->name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('type_service_id')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Slug:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Slug" wire:model="slug" />
                                            @error('slug')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Price:</x-label>
                                            <x-input type="number" class="border-gray-50 w-full" placeholder="Price"
                                                wire:model="price" />
                                            @error('price')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Price discount:</x-label>
                                            <x-input type="number" class="border-gray-50 w-full" required
                                                placeholder="Price Discount" wire:model="price_discount" />
                                            @error('price_discount')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Hours:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="hours" wire:model="hours" />
                                            @error('hours')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Start date:</x-label>
                                            <x-input type="date" class="border-gray-50 w-full" required
                                                placeholder="Start Date" wire:model="start_date" />
                                            @error('start_date')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>End date:</x-label>
                                            <x-input type="date" class="border-gray-50 w-full" required
                                                placeholder="End Date" wire:model="end_date" />
                                            @error('end_date')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Description little:</x-label>
                                            <x-textarea class="border-gray-50 w-full" placeholder="Description Little"
                                                wire:model="little_description"></x-textarea>
                                            @error('little_description')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Description:</x-label>
                                            <x-textarea class="border-gray-50 w-full" placeholder="Description"
                                                wire:model="description"></x-textarea>
                                            @error('description')
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
                        @if ($services->hasPages())
                            {{ $services->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
