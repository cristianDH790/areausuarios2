<div class="max-w-7xl mx-auto py-5 px-5 sm:px-6 lg:px-8 space-y-3">

    <div class="bg-white shadow-lg rounded-lg py-3 px-2 sm:flex  sm:justify-between items-center w-full">
        <h1 class="font-bold uppercase w-full">Cursos adquiridos:</h1>
        <x-select wire:model.debounce.live="type_service_id" class="py-2 px-3 w-full    ">
            <option value="">Selecciona una Rama</option>
            @foreach ($type_services as $type_service)
                <option value="{{ $type_service->id }}">{{ $type_service->name }}</option>
            @endforeach
        </x-select>
    </div>
    @if ($services->isEmpty())
        <div class="bg-white shadow-lg rounded-lg py-20 flex justify-center text-center items-center w-full">
            <h1 class="font-bold uppercase ">No hay cursos disponibles</h1>
        </div>
    @else
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 relative">
            @foreach ($services as $service)
                <div class=" relative  bg-white shadow-lg rounded-lg overflow-hidden ">
                    <div class="relative w-full h-56">
                        @if (!$service->image == null)
                            <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-fill"
                                alt="">
                        @else
                            <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-fill"
                                alt="">
                        @endif
                        <a href="{{ route('my.service.customer.view', $service->slug) }}">
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-cyan-600 bg-opacity-0 hover:bg-opacity-50 transition duration-500 ease-in-out">
                                <div
                                    class="text-white text-center flex flex-col px-2  items-center justify-items-center justify-center  h-full w-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                                    <p class="text-base font-semibold">{{ $service->name }}</p>
                                    <p class="text-md   w-full flex items-center justify-center">
                                        {{ $service->little_description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="w-full py-4 ">
                        <div class="flex justify-evenly">
                            <div class="flex items-center">
                                <p class="text-sm font-bold text-gray-700">Horas: <span class="font-light">
                                        {{ $service->hours }}</span></p>
                            </div>
                            {{-- @dd($service) --}}

                            @php
                                // Asegúrate de que $service->certificate no sea null
                                $status = null;
                                if ($service->certificate) {
                                    $status = Auth::user()
                                        ->certificates()
                                        ->where('certificate_id', $service->certificate->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();
                                }
                            @endphp











                            <x-button class="py-2 px-3" color="green"
                                href="{{ route('my.service.customer.view', $service->slug) }}" primary="600">
                                Estudiar
                            </x-button>
                            @if ($service->certificate && $service->certificate->status == 'active')
                                @if ($status && $status->pivot && $status->pivot->status == 'active')
                                    <x-button class="py-2 px-3" color="yellow" primary="500" target="_blank"
                                        href="{{ route('generate.certificate.masivo', [$service, Auth::user()->code]) }}">
                                        Certificado
                                    </x-button>
                                @else
                                    <div x-data="{ open: false }">
                                        <!-- Botón para abrir el modal -->
                                        <button @click="open = true"
                                            class="py-2.5 px-3.5 text-xs border border-transparent inline-flex font-semibold tracking-widest text-white uppercase bg-yellow-500 rounded-md">
                                            Certificado
                                        </button>
                                        @php
                                            $contact = $settings ? $settings->phone_contact : '000000000';
                                        @endphp
                                        <!-- Modal -->
                                        <div x-show="open" @click.away="open = false" style="display: none;"
                                            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-20">
                                            <div class="bg-white p-4 rounded shadow-lg w-3/4 max-w-lg" @click.stop>
                                                <div class="flex justify-between items-center">
                                                    <h2 class="text-xl font-semibold">Certificado</h2>
                                                    <button @click="open = false"
                                                        class="text-gray-600 hover:text-gray-900">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="mt-4">
                                                    <!-- Contenido del modal -->
                                                    <p>El certificado aun no se encuentra activo comuniquese con el
                                                        soporte para mas informacion.</p>
                                                    <br>
                                                    <a href="https://api.whatsapp.com/send?phone=51{{ $contact }}&text=Hola%2CQuiero%20comunicarme%20con%20soporte%20,mi%20certificado%20no%20esta%20activado"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Comunicarse con soporte
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div x-data="{ open: false }">
                                    <!-- Botón para abrir el modal -->
                                    <button @click="open = true"
                                        class="py-2.5 px-3.5 text-xs border border-transparent inline-flex font-semibold tracking-widest text-white uppercase bg-yellow-500 rounded-md">
                                        Certificado
                                    </button>
                                    @php
                                        $contact = $settings ? $settings->phone_contact : '000000000';
                                    @endphp
                                    <!-- Modal -->
                                    <div x-show="open" @click.away="open = false" style="display: none; z-index: 9999"
                                        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-20">
                                        <div class="bg-white p-4 rounded shadow-lg w-3/4 max-w-lg" @click.stop>
                                            <div class="flex justify-between items-center">
                                                <h2 class="text-xl font-semibold">Certificado</h2>
                                                <button @click="open = false" class="text-gray-600 hover:text-gray-900">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="mt-4">
                                                <!-- Contenido del modal -->
                                                <p>El certificado aun no se encuentra activo comuniquese con el soporte
                                                    para mas informacion.</p>
                                                <br>
                                                <a href="https://api.whatsapp.com/send?phone=51{{ $contact }}&text=Hola%2CQuiero%20comunicarme%20con%20soporte%20,mi%20certificado%20no%20esta%20activado"
                                                    target="_blank" class="text-blue-500 hover:underline">
                                                    Comunicarse con soporte
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    @endif


</div>
