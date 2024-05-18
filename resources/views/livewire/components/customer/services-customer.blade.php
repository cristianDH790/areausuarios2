<div>
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-library-books"></i></span>
            Services
        </p>
        <div class="navbar-item ">
            <div class="control flex items-center">
                <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                    placeholder="Search customers" />
            </div>
        </div>
    </header>
    <div class="card-content">
        <div class="card has-table">
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($certificates->isEmpty())
                            <tr>
                                <td colspan="5">
                                    <div class="flex justify-center items-center space-x-2">
                                        <span class="icon"><i class="mdi mdi-emoticon-sad"></i></span>
                                        <span>No hay servicios, probablemente no creaste o vinculaste los
                                            certificados</span>
                                        <a href="{{ route('certificate.index') }}" class="text-red-500">crear
                                            certificado</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>{{ $certificate->service->type_service->name }}</td>
                                <td>{{ $certificate->service->name }}</td>
                                <td>{{ $certificate->service->code_service }}</td>
                                <td>
                                    <x-button class="px-1 py-1" color="yellow" secondary="800" primary="600"
                                        title="view"
                                        href="{{ route('customer.service.edit', ['code' => $user->code, 'certificate' => $certificate->id]) }}">
                                        <span class="icon"><i class="mdi mdi-file"></i></span>
                                    </x-button>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="table-pagination">
                            @if ($customers->hasPages())
                                {{ $customers->links() }}
                            @endif
                        </div> --}}
            </div>
        </div>

    </div>
</div>
