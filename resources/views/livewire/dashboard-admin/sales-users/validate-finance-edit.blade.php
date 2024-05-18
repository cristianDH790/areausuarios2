<div>
    <div class="bg-white px-4 py-4 card space-y-4">
        <h1 class="font-bold text-base">Datos de la venta:</h1>
        <div class="flex flex-wrap md:flex-nowrap gap-2 ">
            <div class="w-full">
                <x-label>Fecha de registro:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="date_sale" />
            </div>
            <div class="w-full">
                <x-label>Total a pagar:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="total" />
            </div>
            <div class="w-full">
                <x-label>Estado:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="status" />
            </div>
            <div class="w-full">
                <x-label>Vendido por:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="sale_by" />
            </div>
        </div>
        <hr class="text-gray-300 border-2 border-dashed ">
        <div class="flex flex-wrap md:flex-nowrap gap-2 ">
            <div class="w-full">
                <x-label>Numero pagos:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="num_pays" />
            </div>
            <div class="w-full">
                <x-label>Fecha de pago inicial:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="date_start" />
            </div>
            <div class="w-full">
                <x-label>Fecha de pago final:</x-label>
                <x-input type="text" class="border-gray-100 w-full" disabled wire:model="date_end" />
            </div>
        </div>
        <hr class="text-gray-300 border-2 border-dashed ">

    </div>

    @if ($financedetails)
        @foreach ($financedetails as $financedetail)
            <div class="bg-white px-4 py-4 card space-y-4">
                <div class="flex justify-between">
                    <h1 class="font-bold text-base">Cuota {{ $loop->index + 1 }}:</h1>
                    <x-button class=" --jb-modal px-1 py-1" data-target="sample-modal-edit-{{ $financedetail->id }}"
                        color="yellow" secondary="800" primary="600" title="editar">
                        <span class="icon"><i class="mdi mdi-pencil"></i></span>
                    </x-button>

                    <x-modal-table val="-edit-{{ $financedetail->id }}">
                        <x-slot name="title">

                        </x-slot>
                        <div class="flex flex-wrap md:flex-nowrap gap-2">
                            <div class="w-full">
                                <x-label>Estado:</x-label>
                                <x-select class="border-gray-100 w-full py-2 px-1"
                                    wire:model="status_detail.{{ $financedetail->id }}">
                                    <option value="pending">Pendiente</option>
                                    <option value="paid">Pagado</option>
                                </x-select>
                            </div>
                        </div>
                        <div class="flex flex-wrap md:flex-nowrap gap-2">
                            <div class="w-full">
                                <x-label>Descripcion:</x-label>
                                <x-textarea class="border-gray-100 w-full"
                                    wire:model="descripcion_detail.{{ $financedetail->id }}">
                                </x-textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap md:flex-nowrap gap-2">
                            <div class="w-full">
                                <x-label>Voucher:</x-label>
                                <img src="{{ asset('storage/' . $financedetail->voucher) }}" alt="">
                                <x-file.drag-and-drop-single formats="jpeg, jpg, bmp, png" max_size="25Mb"
                                    accept="image/jpeg,image/bmp,image/png"
                                    model="photo_comprobante.{{ $financedetail->id }}">
                                    Subir imagen comprobante
                                </x-file.drag-and-drop-single>
                                @error('photo_comprobante.' . $financedetail->id)
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <x-slot name="buttons">
                            <div class="space-x-2">
                                <x-button color="gray" secondary="800" primary="600"
                                    class="px-4 py-2 --jb-modal-close">Cancel</x-button>
                                <x-button color="red" wire:click="edit_detail({{ $financedetail->id }})"
                                    secondary="800" primary="500" class="px-4 py-2">Save</x-button>
                            </div>
                        </x-slot>
                    </x-modal-table>
                </div>


                <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                    <div class="w-full">
                        <x-label>Pago:</x-label>
                        <x-input type="text" class="border-gray-100 w-full" disabled
                            value="{{ $financedetail->payment_amount }}" />
                    </div>
                    <div class="w-full">
                        <x-label>Dia de pago:</x-label>
                        <x-input type="text" class="border-gray-100 w-full"
                            value="{{ $financedetail->date_pay }}" />
                    </div>
                    <div class="w-full">
                        <x-label>Estado:</x-label>
                        <x-input type="text" class="border-gray-100 w-full" disabled
                            value="{{ $financedetail->status }}" />


                    </div>

                </div>
                <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                    <div class="w-full">
                        <div class="w-full">
                            <x-label>Descripcion:</x-label>
                            <x-textarea class="border-gray-100 w-full" disabled>
                                {{ $financedetail->descriptions }}
                            </x-textarea>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                    <div class="w-full">
                        <x-label>Voucher:</x-label>
                        <img src="{{ asset('storage/' . $financedetail->voucher) }}" alt="">
                    </div>
                </div>
                <hr class="text-gray-300 border-2 border-dashed ">

            </div>
        @endforeach
    @endif


    <div class="bg-white px-4 py-4 card">
        <h1 class="font-bold text-base">Detalles de venta:</h1>
        <div class="flex flex-wrap md:flex-nowrap gap-2 ">
            <div class="w-full">
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
        </div>
    </div>
</div>
