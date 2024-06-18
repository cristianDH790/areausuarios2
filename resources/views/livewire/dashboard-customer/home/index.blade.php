<div>
    <div class="max-w-7xl mx-auto py-5 px-5 sm:px-6 lg:px-8 space-y-2">
        <div class="bg-white shadow-lg rounded-lg py-3 px-2 flex justify-between items-center">
            <h1 class="font-bold uppercase">Cursos Adquiridos Recientemente:</h1>
            <x-button href="{{ route('service.customer.index') }}" class="py-2 px-3" color="blue" primary="600">
                <i class="mdi mdi-arrow-right"> Ver más</i>
            </x-button>
        </div>
        @if ($servicios)
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                @foreach ($servicios as $servicio)
                    <div class="relative bg-white shadow-lg rounded-lg overflow-hidden">
                        <a href="{{ route('service.customer.view', $servicio->slug) }}">
                            <div class="relative max-w-screen w-full h-60">

                                @if (!$servicio->image == null)
                                    <img src="{{ asset('storage/' . $servicio->image) }}"
                                        class="w-full h-full object-fill" alt="">
                                @else
                                    <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-fill"
                                        alt="">
                                @endif
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-cyan-600 bg-opacity-0 hover:bg-opacity-50 transition duration-500 ease-in-out">
                                    <div
                                        class="text-white text-center flex flex-col px-2 items-center justify-center h-full w-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-base font-semibold">{{ $servicio->name }}</p>
                                        <p class="text-md w-full flex items-center justify-center">
                                            {{ $servicio->little_description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="w-full py-4">
                            <div class="flex justify-evenly">
                                <div class="flex items-center">
                                    <p class="text-sm font-bold text-gray-700">Horas: <span class="font-light">
                                            {{ $servicio->hours }}</span></p>
                                </div>
                                {{-- <x-button class="py-2 px-3" color="yellow" wire:click="certificate" primary="500">
                                    <i class="mdi mdi-certificate"> </i>
                                </x-button>

                                <x-button class="py-2 px-3" color="green" primary="600">
                                    <i class="mdi mdi-book-open-page-variant"></i>
                                </x-button> --}}
                                <x-button class="py-2 px-3" color="blue"
                                    href="{{ route('service.customer.view', $servicio->slug) }}" primary="600">
                                    <i class="mdi mdi-arrow-right"> Ver curso</i>
                                </x-button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white shadow-lg rounded-lg py-3 px-2 flex justify-between items-center">
                <h1 class="font-bold uppercase">No tienes cursos adquiridos recientemente</h1>
            </div>
        @endif

    </div>

</div>
