<div class="bg-white px-4 py-4 card">
    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold pr-10">servicios:</h2>
            <x-input type="text" class="border-gray-50 w-full" required placeholder="servicios"
                wire:model..live.debounce="search_services" />
        </div>
        <div class="space-y-3">
            <h2 class="font-semibold">Servicios:</h2>
            <hr class="border-2 border-dashed border-gray-200">
        </div>

        <div class="flex flex-wrap md:flex-nowrap gap-2 ">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Precio descuento</th>
                        <th>Horas Academicas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>{{ $service->price_discount }}</td>
                            <td>{{ $service->hours }}</td>
                            <td class="flex justify-end">
                                <x-button color="green" secondary="800" id="agregar-service{{ $service->id }}"
                                    primary="500" class="px-2.5 py-2" wire:click="addservice({{ $service->id }})"
                                    title="Agregar"><i class="mdi mdi-plus-circle"></i>
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($service_adds->count() > 0)
            <div class="space-y-3">
                <h2 class="font-semibold">Servicios Añadidos:</h2>
                <hr class="border-2 border-dashed border-gray-200">
            </div>
            <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Precio descuento</th>
                            <th>Precio Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service_adds as $service_add)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>{{ $service_add->name_service }}</td>
                                <td>{{ $service_add->price_service }}</td>
                                <td>{{ $service_add->price_discount_service }}</td>
                                <td>
                                    {{ $service_add->price_end }}
                                </td>
                                <td class="flex justify-end space-x-2">
                                    <div>
                                        <x-button class="--jb-modal px-1 py-1" id="edit-{{ $service_add->service_id }}"
                                            data-target="sample-modal-edit-{{ $service_add->service_id }}"
                                            color="yellow" secondary="800" primary="600" title="Editar precio">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </x-button>
                                    </div>

                                    <x-modal-table val="-edit-{{ $service_add->service_id }}">
                                        <x-slot name="title">
                                            Editar precio
                                        </x-slot>
                                        <x-label>Precio Total (<span class="text-red-500">Precio incluyendo el
                                                descuento!</span>):</x-label>
                                        <x-input type="number" class="border-gray-50 w-full" required
                                            placeholder="Precio Total" wire:model="price_end" />
                                        <x-slot name="buttons">
                                            <div class="space-x-2 flex ">
                                                <div>
                                                    <x-button color="gray" id="cancel{{ $service_add->service_id }}"
                                                        secondary="800" primary="600"
                                                        class="px-4 py-2 --jb-modal-close">Cancelar</x-button>
                                                </div>
                                                <div>
                                                    <x-button color="green" id="edit{{ $service_add->service_id }}"
                                                        secondary="800" primary="500" class="px-4 py-2"
                                                        wire:click="editPrice({{ $service_add->service_id }})">Editar
                                                        Precio</x-button>
                                                </div>

                                            </div>
                                        </x-slot>
                                    </x-modal-table>

                                    <div>
                                        <x-button color="red" secondary="800"
                                            id="delete{{ $service_add->service_id }}" primary="500"
                                            class="px-2.5 py-2"
                                            wire:click="removeService({{ $service_add->service_id }})"
                                            title="Eliminar">
                                            <i class="mdi mdi-trash-can"></i>
                                        </x-button>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        @endif
        @if ($service_adds->count() > 0)
            <div class="text-end">
                <p>precio: {{ $precio_view }}</p>
            </div>
        @endif
    </div>
</div>
