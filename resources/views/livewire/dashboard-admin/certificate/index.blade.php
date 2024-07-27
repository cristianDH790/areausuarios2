<div>
    <div>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    certificate

                </p>
                <div class="navbar-item ">
                    <div class="control flex items-center">
                        <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                            placeholder="Search type certificate" />
                    </div>
                </div>
                <div class="navbar-item">
                    <div class="buttons">
                        <x-button color="green" secondary="800" primary="500" class="px-2.5 py-2"
                            href="{{ route('certificate.create') }}" data-target="sample-modal-create" title="create"><i
                                class="mdi mdi-plus-circle"></i>
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
                                <th>Servicio</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Broadcast Date</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($certificates->isEmpty())
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
                                @foreach ($certificates as $certificate)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>

                                        <td data-label="Name">{{ $certificate->service->name }}</td>
                                        <td data-label="Type">{{ $certificate->type_certificate->name }}</td>
                                        <td data-label="Status">{{ $certificate->status }}</td>
                                        <td data-label="Broadcast">{{ $certificate->broadcast_date }}</td>
                                        <td class="actions-cell">
                                            <div class="buttons right nowrap space-x-1">
                                                <x-button class="px-1 py-1" color="gray" secondary="800"
                                                    primary="600" title="Vincular servicios y certificados"
                                                    wire:click="vinculacion({{ $certificate->id }})">
                                                    <span class="icon"><i class="mdi mdi-link"></i></span>
                                                </x-button>
                                                <x-button class=" px-1 py-1"
                                                    href="{{ route('certificate.certificate-edit.index', $certificate->id) }}"
                                                    color="indigo" secondary="800" primary="600"
                                                    title="editar cordenadas de certificado">
                                                    <span class="icon"><i class="mdi mdi-file"></i></span>
                                                </x-button>

                                                <x-button class=" px-1 py-1"
                                                    href="{{ route('certificate.edit', $certificate->id) }}"
                                                    color="yellow" secondary="800" primary="600"
                                                    title="editar certificado">
                                                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                                </x-button>
                                                <x-button class=" --jb-modal px-1 py-1"
                                                    data-target="sample-modal-delete-{{ $certificate->id }}"
                                                    color="red" secondary="800" primary="600"
                                                    title="borrar certificad">
                                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                                </x-button>
                                            </div>

                                        </td>
                                    </tr>
                                    <x-modal-table val="-delete-{{ $certificate->id }}">
                                        <x-slot name="title">
                                            Delete Certificate.
                                        </x-slot>
                                        Are you sure to delete this Certificate?
                                        <x-slot name="buttons">
                                            <div class="space-x-2">
                                                <x-button color="gray" secondary="800" primary="600"
                                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                <x-button color="red" wire:click="delete({{ $certificate->id }})"
                                                    secondary="800" primary="500" class="px-4 py-2">Delete</x-button>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <div class="table-pagination">
                        @if ($certificates->hasPages())
                            {{ $certificates->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
