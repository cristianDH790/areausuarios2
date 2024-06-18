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
                <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
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
                    <div class="w-full py-4">
                        <div class="flex justify-evenly">
                            <div class="flex items-center">
                                <p class="text-sm font-bold text-gray-700">Horas: <span class="font-light">
                                        {{ $service->hours }}</span></p>
                            </div>
                            <x-button class="py-2 px-3" color="yellow" primary="500">
                                <i class="mdi mdi-certificate"> </i>
                            </x-button>
                            <x-button class="py-2 px-3" color="green"
                                href="{{ route('my.service.customer.view', $service->slug) }}" primary="600">
                                <i class="mdi mdi-book-open-page-variant"></i>
                            </x-button>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endif

</div>
