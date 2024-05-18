<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Permisos
                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Buscar permisos" />
                    </div>
                </div>
                <div class="navbar-item">
                    <div class="buttons">
                        {{-- <x-button color="green" secondary="800" primary="500" class="px-2.5 py-2 --jb-modal"
                            data-target="sample-modal-create" title="create"><i class="mdi mdi-plus-circle"></i>
                        </x-button> --}}
                    </div>
                </div>
            </header>
            
            <div class="card has-table">
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($permissions->isEmpty())
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
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td data-label="Alias">{{ $permission->name }}</td>


                                        {{-- <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">


                                                <x-button class=" px-1 py-1"
                                                    href="{{ route('role.edit', $permission->id) }}" color="yellow"
                                                    secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $permission->id }}"
                                                    color="red" secondary="800" primary="600" title="delete">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>


                                            </div>

                                        </td> --}}
                                    </tr>
                                    {{-- <x-modal-table val="-delete-{{ $permission->id }}">
                                        <x-slot name="title">
                                            Borrar rol: {{ $permission->name }}
                                        </x-slot>
                                        ¿Estas seguro de eliminar el rol?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red" wire:click="delete({{ $rol->id }})"
                                                    secondary="800" primary="500" class="px-4 py-2">Borrar</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table> --}}
                                @endforeach
                            @endif
                            {{-- <x-modal-table val="-create">
                                <x-slot name="title">
                                    Crear nuevo rol
                                </x-slot>
                                <div class="space-y-4">
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Nombre:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Nombre" wire:model="name" />
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
                            </x-modal-table> --}}
                        </tbody>
                    </table>
                    <div class="table-pagination">
                        @if ($permissions->hasPages())
                            {{ $permissions->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
