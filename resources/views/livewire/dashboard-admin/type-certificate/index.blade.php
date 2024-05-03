<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    type certificate

                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Search type certificate" />
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
                                <th>Name</th>
                                <th>code</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($type_certificates->isEmpty())
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
                                @foreach ($type_certificates as $type_certificate)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>

                                        <td data-label="Name">{{ $type_certificate->name }}</td>
                                        <td data-label="Code">{{ $type_certificate->code }}</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $type_certificate->id }}"
                                                    color="red" secondary="800" primary="600" title="delete">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>

                                            </div>

                                        </td>
                                    </tr>

                                    <x-modal-table val="-delete-{{ $type_certificate->id }}">
                                        <x-slot name="title">
                                            Delete type Certificate: {{ $type_certificate->name }}
                                        </x-slot>
                                        Are you sure to delete this type Certificate?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red"
                                                    wire:click="delete({{ $type_certificate->id }})" secondary="800"
                                                    primary="500" class="px-4 py-2">Delete</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>
                                @endforeach
                            @endif
                            <x-modal-table val="-create">
                                <x-slot name="title">
                                    Create type certificate
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
                        @if ($type_certificates->hasPages())
                            {{ $type_certificates->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
