<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Firms

                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Search firms" />
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
                                <th>Alias</th>
                                <th>Name one</th>
                                <th>Name two</th>
                                <th class="image-cell">Photo Firm</th>
                                <th class="image-cell">Photo Seal</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($firms->isEmpty())
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
                                @foreach ($firms as $firm)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td data-label="Alias">{{ $firm->alias }}</td>
                                        <td data-label="type">{{ $firm->name_one }}</td>
                                        <td data-label="hour">{{ $firm->name_two }}</td>
                                        <td class="image-cell">
                                            <div class="w-10 h-10">
                                                @if ($firm->photo_firm)
                                                    <img src="{{ asset('storage/' . $firm->photo_firm) }}"
                                                        class="rounded-md" alt="Imagen del servicio"
                                                        style="max-width: 100%; max-height: 100%;">
                                                @else
                                                    <img src="{{ asset('storage/no-image.png') }}" class="rounded-md"
                                                        alt="Imagen predeterminada"
                                                        style="max-width: 100%; max-height: 100%;">
                                                @endif
                                            </div>

                                        </td>
                                        <td class="image-cell">
                                            <div class="w-10 h-10">
                                                @if ($firm->photo_seal)
                                                    <img src="{{ asset('storage/' . $firm->photo_seal) }}"
                                                        class="rounded-md" alt="Imagen del servicio"
                                                        style="max-width: 100%; max-height: 100%;">
                                                @else
                                                    <img src="{{ asset('storage/no-image.png') }}" class="rounded-md"
                                                        alt="Imagen predeterminada"
                                                        style="max-width: 100%; max-height: 100%;">
                                                @endif
                                            </div>

                                        </td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-view-{{ $firm->id }}" color="blue"
                                                    secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                                </x-button>

                                                <x-button class=" px-1 py-1" href="{{ route('firm.edit', $firm->id) }}"
                                                    color="yellow" secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $firm->id }}"
                                                    color="red" secondary="800" primary="600" title="delete">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>


                                            </div>

                                        </td>
                                    </tr>
                                    <x-modal-table val="-delete-{{ $firm->id }}">
                                        <x-slot name="title">
                                            Delete firm: {{ $firm->alias }}
                                        </x-slot>
                                        Are you sure to delete this firm?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red" wire:click="delete({{ $firm->id }})"
                                                    secondary="800" primary="500" class="px-4 py-2">Delete</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>

                                    <x-modal-table val="-view-{{ $firm->id }}">
                                        <x-slot name="title">
                                            <div class="space-x-2 flex items-center justify-between  w-full">
                                                <div class="flex items-center">
                                                    <div class="h-4 w-4 rounded-full mr-2 bg-green-500">
                                                    </div>

                                                </div>
                                                <div>
                                                    <span class="font-bold"> Code:</span>
                                                    {{ $firm->id }}
                                                </div>
                                            </div>
                                        </x-slot>
                                        <div class="space-y-4">
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">
                                                    <x-label>Alias:</x-label>
                                                    <x-input type="text" class="border-gray-50 text-gray-500 w-full"
                                                        disabled readonly value="{{ $firm->alias }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>Name One:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $firm->name_one }}" />
                                                </div>
                                                <div class="w-full">
                                                    <x-label>Name Two:</x-label>
                                                    <x-input type="text"
                                                        class="border-gray-50 text-gray-500 w-full" disabled readonly
                                                        value="{{ $firm->name_two }}" />
                                                </div>


                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                <div class="w-full">

                                                    <x-label>Image Firm:</x-label>
                                                    @if ($firm->photo_firm)
                                                        <img src="{{ asset('storage/' . $firm->photo_firm) }}"
                                                            alt="image firm" class="w-75 h-auto">
                                                    @else
                                                        <span class="text-red-500">*
                                                            no image found. please edit the default image</span>
                                                        <img src="{{ asset('storage/no-image.png') }}"
                                                            class=" w-64  h-64" alt="Imagen predeterminada">
                                                    @endif


                                                </div>
                                                <div class="w-full">

                                                    <x-label>Image Seal:</x-label>
                                                    @if ($firm->photo_seal)
                                                        <img src="{{ asset('storage/' . $firm->photo_seal) }}"
                                                            alt="image seal" class="w-75 h-auto">
                                                    @else
                                                        <span class="text-red-500">*
                                                            no image found. please edit the default image</span>
                                                        <img src="{{ asset('storage/no-image.png') }}"
                                                            class=" w-64  h-64" alt="Imagen predeterminada">
                                                    @endif


                                                </div>
                                            </div>
                                            <div class="flex flex-wrap md:flex-nowrap space-x-2">

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
                                    Create firms
                                </x-slot>
                                <div class="space-y-4">
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Alias:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Alias" wire:model="alias" />
                                            @error('alias')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Name One:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Last Name" wire:model="name_one" />
                                            @error('name_one')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Name Two:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Name Two" wire:model="name_two" />
                                            @error('name_two')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Photo Firm :</x-label>
                                            <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png"
                                                max_size="25Mb" accept="image/jpeg,image/bmp,image/png"
                                                model="photo_firm">
                                                Subir
                                                imagen
                                                service
                                            </x-file.drag-and-drop-single>
                                            @error('photo_firm')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Photo Seal:</x-label>
                                            <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png"
                                                max_size="25Mb" accept="image/jpeg,image/bmp,image/png"
                                                model="photo_seal">
                                                Subir
                                                imagen
                                                service
                                            </x-file.drag-and-drop-single>
                                            @error('photo_seal')
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
                        @if ($firms->hasPages())
                            {{ $firms->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
