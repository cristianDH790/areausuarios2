<div class="space-y-5">
    <div class="bg-white px-4 py-4 card space-y-4">
        <div class="flex items-center justify-between">
            <p>
                <span class="icon"><i class="mdi mdi-library-books"></i></span>
                Validar Financias
            </p>

            <div class="control flex items-center">
                <x-input wire:model.live.debounce.500ms="search" type="text" class="border-gray-50"
                    placeholder="Search customers" />
            </div>

        </div>
    </div>
    <div class="bg-white card space-y-4">
        <div class="card-content">
            <div class="card has-table">
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
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
                                    <td>{{ $sale->user->name }} {{ $sale->user->last_name }}</td>
                                    <td>{{ $sale->date_sale }}</td>
                                    <td>{{ $sale->date_sale_pay }}</td>
                                    <td>{{ $sale->total }}</td>
                                    <td>
                                        <div class="flex items-center">
                                            @if ($sale->status === 'paid')
                                                <div class="h-4 w-4 rounded-full mr-2 bg-green-500">

                                                </div>
                                                <p>{{ $sale->status }}</p>
                                            @endif
                                            @if ($sale->status === 'pending')
                                                <div class="h-4 w-4 rounded-full mr-2 bg-orange-500">

                                                </div>
                                                <p>{{ $sale->status }}</p>
                                            @endif
                                            @if ($sale->status === 'validate')
                                                <div class="h-4 w-4 rounded-full mr-2 bg-blue-500">

                                                </div>
                                                <p>{{ $sale->status }}</p>
                                            @endif
                                            @if ($sale->status === 'refused')
                                                <div class="h-4 w-4 rounded-full mr-2 bg-red-500">

                                                </div>
                                                <p>{{ $sale->status }}</p>
                                            @endif
                                        </div>


                                    </td>



                                    <td>
                                        <x-button class=" --jb-modal px-1 py-1"
                                            data-target="sample-modal-view-{{ $sale->id }}" color="blue"
                                            secondary="800" primary="600" title="view">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </x-button>
                                        <x-button class=" px-1 py-1" color="yellow" secondary="800" primary="600"
                                            title="editar"
                                            href="{{ route('sale_user.validate.finance.edit', $sale->id) }}">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </x-button>
                                        @if ($sale->status === 'refused')
                                            <x-button class=" px-1 py-1" color="red" secondary="800" primary="600"
                                                title="Borrar" wire:click="delete({{ $sale->id }})">
                                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                            </x-button>
                                        @endif

                                        <x-modal-table val="-view-{{ $sale->id }}">
                                            <x-slot name="title">
                                                <div class="space-x-2 flex items-center justify-between  w-full">
                                                    <div class="flex items-center">
                                                        @if ($sale->status === 'paid')
                                                            <div class="h-4 w-4 rounded-full mr-2 bg-green-500">

                                                            </div>
                                                            <p>{{ $sale->status }}</p>
                                                        @endif
                                                        @if ($sale->status === 'pending')
                                                            <div class="h-4 w-4 rounded-full mr-2 bg-orange-500">

                                                            </div>
                                                            <p>{{ $sale->status }}</p>
                                                        @endif
                                                        @if ($sale->status === 'validate')
                                                            <div class="h-4 w-4 rounded-full mr-2 bg-blue-500">

                                                            </div>
                                                            <p>{{ $sale->status }}</p>
                                                        @endif
                                                        @if ($sale->status === 'refused')
                                                            <div class="h-4 w-4 rounded-full mr-2 bg-red-500">

                                                            </div>
                                                            <p>{{ $sale->status }}</p>
                                                        @endif
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                            </x-slot>
                                            <div class="space-y-4">
                                                <div class="flex flex-wrap  md:flex-nowrap gap-2">
                                                    <div class="w-full">
                                                        <x-label>Fecha registro:</x-label>
                                                        <x-input type="text" class="border-gray-100 w-full" disabled
                                                            readonly value="{{ $sale->date_sale }}" />
                                                    </div>
                                                    <div class="w-full">
                                                        <x-label>Fecha de pago:</x-label>
                                                        <x-input type="text" class="border-gray-100 w-full" disabled
                                                            readonly value="{{ $sale->date_sale_pay }}" />
                                                    </div>
                                                    <div class="w-full">
                                                        <x-label>Total:</x-label>
                                                        <x-input type="text" class="border-gray-100 w-full" disabled
                                                            readonly value="{{ $sale->total }}" />
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap md:flex-nowrap gap-2">
                                                    @if ($sale->bank == null)
                                                        <div class="w-full">
                                                            <x-label>Banco:</x-label>
                                                            <x-input type="text" class="border-gray-100 w-full"
                                                                disabled readonly value="Ninguno" />
                                                        </div>
                                                    @else
                                                        <div class="w-full">
                                                            <x-label>Banco:</x-label>
                                                            <x-input type="text" class="border-gray-100 w-full"
                                                                disabled readonly value="{{ $sale->bank->name }}" />
                                                        </div>
                                                    @endif

                                                    <div class="w-full">
                                                        <x-label>Tipo detalle:</x-label>
                                                        <x-input type="text" class="border-gray-100 w-full" disabled
                                                            readonly value="{{ $sale->type_detail }}" />
                                                    </div>
                                                    @if ($sale->num_transaction == null)
                                                        <div class="w-full">
                                                            <x-label>Numero transaccion:</x-label>
                                                            <x-input type="text" class="border-gray-100 w-full"
                                                                disabled readonly value="Ninguno" />
                                                        </div>
                                                    @else
                                                        <div class="w-full">
                                                            <x-label>Numero transaccion:</x-label>
                                                            <x-input type="text" class="border-gray-100 w-full"
                                                                disabled readonly
                                                                value="{{ $sale->num_transaction }}" />
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="space-y-2">
                                                    <div class="w-full">
                                                        <x-label>Vendido por:</x-label>
                                                        <x-input type="text" class="border-gray-100 w-full" disabled
                                                            readonly value="{{ $sale->sale_by }}" />
                                                    </div>
                                                    <div class="w-full">
                                                        <x-label>Deve:</x-label>
                                                        <x-input type="text" class="border-gray-100 w-full" disabled
                                                            readonly value="{{ $sale->debt }}" />
                                                    </div>
                                                    @if ($sale->voucher == null)
                                                        <div class="w-full">
                                                            <x-label>Ver comprobante:</x-label>
                                                            <img src="{{ asset('storage/no-image.png') }}"
                                                                alt="">
                                                        </div>
                                                    @else
                                                        <div class="w-full">
                                                            <x-label>Ver comprobante:</x-label>
                                                            <img src="{{ asset('storage/' . $sale->voucher) }}"
                                                                alt="">
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="flex flex-wrap md:flex-nowrap space-x-2">
                                                    <div class="table-responsive w-full">
                                                        <table class="table table-primary">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th scope="col">Servicio</th>
                                                                    <th scope="col">Precio servicio</th>
                                                                    <th scope="col">Precio venta</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sale->saleDetails as $saleDetail)
                                                                    <tr class="">
                                                                        <td>
                                                                            {{ $loop->index + 1 }}
                                                                        </td>
                                                                        <td scope="row">
                                                                            {{ $saleDetail->service->name }}
                                                                        </td>
                                                                        <td>{{ $saleDetail->price_service }}</td>
                                                                        <td>{{ $saleDetail->price_sale }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap  md:flex-nowrap gap-2">
                                                    <div class="w-full">
                                                        <x-label>Comentario anterior:</x-label>
                                                        <x-textarea disabled
                                                            class="border-gray-100 w-full">{{ $sale->description_validate }}</x-textarea>

                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap md:flex-nowrap gap-2">
                                                    <div class="w-full">
                                                        <x-label>Comentario:</x-label>
                                                        <x-textarea class="border-gray-100 w-full"
                                                            wire:model="description_validate"></x-textarea>
                                                        @error('description_validate')
                                                            <p class="text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap  md:flex-nowrap gap-2">
                                                    <div class="w-full">
                                                        <x-label>status:</x-label>
                                                        <x-select wire:model="status_validate"
                                                            class="border-gray-100 w-full py-2">
                                                            <option value="">Elige una opcion</option>
                                                            <option value="paid">Pagado</option>
                                                            <option value="pending">Pendiente</option>
                                                            <option value="refused">Rechazar</option>
                                                            <option value="validate">Validar</option>
                                                        </x-select>
                                                        @error('status_validate')
                                                            <p class="text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <x-slot name="buttons">
                                                <div class="space-x-2">
                                                    <x-button color="gray" secondary="800" primary="600"
                                                        class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                                    <x-button color="green" secondary="800" primary="500"
                                                        class="px-4 py-2"
                                                        wire:click="validar_venta({{ $sale->id }})">Validar
                                                        Venta</x-button>

                                                    {{-- <x-button color="red" secondary="800" primary="500"
                                                    class="px-4 py-2"
                                                    wire:click="rechazar_venta({{ $sale->id }})">Rechazar
                                                    Venta</x-button> --}}
                                                </div>
                                            </x-slot>
                                        </x-modal-table>
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

</div>
