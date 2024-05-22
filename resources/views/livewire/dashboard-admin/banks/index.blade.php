<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Banks

                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Search banks" />
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
                                <th>Nombre </th>
                                <th>Numero Cuenta</th>
                                <th>Numero Cuenta Interbancario</th>
                                <th>Tipo de Cuenta</th>
                                <th>Propietario</th>
                                <th>Documento</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($banks->isEmpty())
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
                                @foreach ($banks as $bank)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td data-label="Alias">{{ $bank->name }}</td>
                                        <td data-label="type">{{ $bank->account_number }}</td>
                                        <td data-label="hour">{{ $bank->account_number_interbank }}</td>
                                        <td data-label="type">{{ $bank->type_account }}</td>
                                        <td data-label="hour">{{ $bank->headline }}</td>
                                        <td data-label="hour">{{ $bank->document }}</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">

                                                <x-button class=" px-1 py-1" href="{{ route('firm.edit', $bank->id) }}"
                                                    color="yellow" secondary="800" primary="600" title="view">
                                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                                </x-button>

                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $bank->id }}" color="red"
                                                    secondary="800" primary="600" title="delete">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>


                                            </div>

                                        </td>
                                    </tr>
                                    <x-modal-table val="-delete-{{ $bank->id }}">
                                        <x-slot name="title">
                                            Delete firm: {{ $bank->alias }}
                                        </x-slot>
                                        Are you sure to delete this firm?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red" wire:click="delete({{ $bank->id }})"
                                                    secondary="800" primary="500" class="px-4 py-2">Delete</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>
                                @endforeach
                            @endif
                            <x-modal-table val="-create">
                                <x-slot name="title">
                                    Create bank
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
                                        <div class="w-full">
                                            <x-label>Numero de Cuenta:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Last Name" wire:model="account_number" />
                                            @error('account_number')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Tipo de Cuenta:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Tipo de cuenta" wire:model="type_account" />
                                            @error('type_account')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Numero de Cuenta Interbancario:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Numero cuenta  interbancario"
                                                wire:model="account_number_interbank" />
                                            @error('account_number_interbank')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                        <div class="w-full">
                                            <x-label>Documento:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Documento" wire:model="document" />
                                            @error('document')
                                                <span class="text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <x-label>Propietario:</x-label>
                                            <x-input type="text" class="border-gray-50 w-full" required
                                                placeholder="Propietario" wire:model="headline" />
                                            @error('headline')
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
                        @if ($banks->hasPages())
                            {{ $banks->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
