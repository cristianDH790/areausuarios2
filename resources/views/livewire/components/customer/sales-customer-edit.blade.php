<div>
    <div class="max-w-6xl mx-auto space-y-8">
        <div class="bg-white px-4 py-4 card">
            <div class="font-semibold text-base">
                venta del cliente {{ $user->name }} {{ $user->last_name }}
            </div>
            <div class="font-semibold text-base flex">
                <p> Status: </p>
                <p>
                    {!! $sale->status == 'paid' ? '<span class="text-green-500"> Pagado </span>' : $sale->status !!}
                </p>

            </div>
        </div>
        <div class="bg-white px-4 py-4 card ">
            <div class="flex flex-wrap  md:flex-nowrap gap-2">
                <div class="w-full">
                    <x-label>Fecha registro:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->date_sale }}" />
                </div>
                <div class="w-full">
                    <x-label>Fecha de pago:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->date_sale_pay }}" />
                </div>
                <div class="w-full">
                    <x-label>Total:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->total }}" />
                </div>
            </div>

            <div class="flex flex-wrap md:flex-nowrap gap-2">
                <div class="w-full">
                    <x-label>Banco:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->bank->name }}" />
                </div>
                <div class="w-full">
                    <x-label>Tipo detalle:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->type_detail }}" />
                </div>
                <div class="w-full">
                    <x-label>Numero transaccion:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->num_transaction }}" />
                </div>
            </div>
            <div class="space-y-2">
                <div class="w-full">
                    <x-label>Vendido por:</x-label>
                    <x-input type="text" class="border-gray-100 w-full" disabled readonly
                        value="{{ $sale->sale_by }}" />
                </div>
                <div class="w-full">
                    <x-label>Ver comprobante:</x-label>
                    <x-button class="px-1 py-1" color="indigo" secondary="800" primary="600"
                        class=" --jb-modal px-1 py-1" data-target="sample-modal-view-comprobante" title="view">
                        <span class="icon"><i class="mdi mdi-camera"></i></span>
                    </x-button>

                    <x-modal-table val="-view-comprobante">
                        <x-slot name="title">
                            Comprobante de pago
                        </x-slot>
                        <div>
                            <img src="{{ asset('storage/' . $sale->voucher) }}" alt="">
                        </div>
                        <x-slot name="buttons">
                            <div class="space-x-2">
                                <x-button color="gray" secondary="800" primary="600"
                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                            </div>
                        </x-slot>
                    </x-modal-table>
                </div>
            </div>
        </div>

        <div class="bg-white px-4 py-4 card">
            <div class="table-responsive">
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
                                <td scope="row">{{ $saleDetail->service->name }}</td>
                                <td>{{ $saleDetail->price_service }}</td>
                                <td>{{ $saleDetail->price_sale }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="bg-white px-4 py-4 card flex gap-x-2">
            <i class="mdi mdi-eye"></i>
            <p class="text-green-500">para poder ver tu servicio adquirido tienes que crear el certificado y vincular!
                ->
            </p>
            <a href="{{ route('certificate.index') }}" class="text-red-500">crear certificado</a>
        </div>
    </div>
</div>
