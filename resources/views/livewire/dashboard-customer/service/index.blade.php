<div class="max-w-7xl mx-auto py-5 px-5 sm:px-6 lg:px-8 space-y-3">
    <div class="bg-white shadow-lg rounded-lg py-3 px-2 sm:flex  sm:justify-between items-center w-full">
        <h1 class="font-bold uppercase w-full">Cursos Disponibles:</h1>
        <x-select wire:model.debounce.live="type_service_id" class="py-2 px-3 w-full">
            <option value="">Selecciona una Rama</option>
            @foreach ($type_services as $type_service)
                <option value="{{ $type_service->id }}">{{ $type_service->name }}</option>
            @endforeach
        </x-select>
    </div>
    {{-- <div class="bg-white border-2 border-dashed border-gray-300 rounded-lg py-2 px-2 flex justify-between items-center">
        <h1 class="font-semibold uppercase">{{ $type_service->name }}</h1>
        <h1 class="font-semibold ">Numero Cursos: <span class="text-blue-500">1</span></h1>
    </div> --}}
    @if ($services->isEmpty())
        <div class="bg-white shadow-lg rounded-lg py-20 flex justify-center text-center items-center w-full">
            <h1 class="font-bold uppercase ">No hay cursos disponibles</h1>
        </div>
    @else
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 relative">
            @foreach ($services as $service)
                <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative w-full h-56">
                        @if (!$service->image == null)
                            <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-fill"
                                alt="">
                        @else
                            <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-fill"
                                alt="">
                        @endif
                        <a href="{{ route('service.customer.view', $service->slug) }}">
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
                        <div class="absolute top-0 right-0 mt-2 mr-2 flex space-x-1">
                            @if ($service->created_at > now()->subDays(3))
                                <div class=" bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                    Nuevo
                                </div>
                            @endif
                            @if ($service->price_discount > 0)
                                <div class=" bg-red-500 text-white px-2 py-1 rounded-lg">
                                    Oferta
                                </div>
                            @endif
                        </div>




                    </div>
                    <div class="w-full py-4">
                        <div class="flex justify-evenly ">
                            <div class="flex items-center text-center flex-col">
                                @if ($service->price_discount > 0)
                                    <p class="text-sm font-medium text-red-500 line-through">Antes: <span
                                            class="font-light">
                                            {{ $service->price }}
                                            soles</span></p>
                                    <p class="text-sm font-medium text-gray-700">Ahora: <span class="font-light">
                                            {{ $service->price_discount }}
                                            soles</span></p>
                                @else
                                    <p class="text-sm font-medium text-gray-700">Ahora: <span class="font-light">
                                            {{ $service->price }}
                                            soles</span></p>
                                @endif

                            </div>

                            <x-button href="{{ route('service.customer.view', $service->slug) }}"
                                class="py-2 px-2.5 hidden sm:block" color="yellow" primary="600">
                                <i class="mdi mdi-information-outline ">Informacion</i>
                            </x-button>
                            <x-button
                                href="https://api.whatsapp.com/send?phone=51{{ $contact }}&text=Hola%2CQuiero%20adquirir%20este%20curso%20{{ $service->name }}"
                                class="py-2 px-2.5 hidden sm:block " color="green" primary="600">
                                <i class="mdi mdi-cart-outline">Comprar</i>
                            </x-button>
                            <x-button href="{{ route('service.customer.view', $service->slug) }}"
                                class="py-2 px-2.5 sm:hidden" color="yellow" primary="600">
                                <i class="mdi mdi-information-outline "></i>
                            </x-button>
                            <x-button class="py-2 px-2.5 sm:hidden" color="green" primary="600">
                                <i class="mdi mdi-cart-outline"></i>
                            </x-button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif






</div>
