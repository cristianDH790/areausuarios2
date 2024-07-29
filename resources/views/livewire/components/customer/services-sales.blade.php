<div>
    <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-library-books"></i></span>
            Sales
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
                            <th>Fecha Registro</th>
                            <th>Fecha Pago</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>{{ $sale->date_sale }}</td>
                                <td>{{ $sale->date_sale_pay }}</td>
                                <td>{{ $sale->total }}</td>
                                <td>
                                    <span class="{{ $sale->status === 'paid' ? 'text-green-500' : 'text-black' }}">
                                        {{ $sale->status === 'paid' ? 'Pagado' : $sale->status }}
                                    </span>
                                </td>



                                <td>
                                    <x-button class="px-1 py-1" color="amber" secondary="800" primary="600"
                                        title="Generar Boleta" target="_blank"
                                        href="{{ route('generate.boleta.masivo', ['code' => $user->code, 'sale' => $sale->id]) }}">
                                        <span class="icon"><i class="mdi mdi-file"></i></span>
                                    </x-button>
                                    <x-button class="px-1 py-1" color="yellow" secondary="800" primary="600"
                                        title="view"
                                        href="{{ route('customer.sale.edit', ['code' => $user->code, 'sale' => $sale->id]) }}">
                                        <span class="icon"><i class="mdi mdi-file"></i></span>
                                    </x-button>
                                    <x-button class="px-1 py-1" color="red" secondary="800" primary="600"
                                        title="borrar" wire:click="delete_sale({{ $sale->id }})">
                                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
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
