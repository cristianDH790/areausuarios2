<div class="max-w-7xl mx-auto py-5 px-2 sm:px-6 lg:px-8 space-y-3">
    <div class="bg-white shadow-lg rounded-lg py-3 px-2 sm:flex  sm:justify-between items-center w-full">
        <h1 class="font-bold uppercase">{{ $service->name }}</h1>
        <h1 class="font-bold uppercase sm:text-end text-start">{{ $service->hours }}</h1>
    </div>
    {{-- <div class="bg-white border-2 border-dashed border-gray-300 rounded-lg py-2 px-2 flex justify-between items-center">
        <h1 class="font-semibold uppercase">Psicologia</h1>
        <h1 class="font-semibold ">Numero Cursos: <span class="text-blue-500">1</span></h1>
    </div> --}}

    <div class="block md:flex md:space-x-5 ">
        <div class="w-full md:w-1/2 md:flex items-center  bg-white p-2 md:p-5">
            <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-center" alt="">
            @if (!$service->image == null)
                <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-center" alt="">
            @else
                <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-center" alt="">
            @endif
        </div>
        <div class="w-full md:w-1/2  flex flex-col bg-white p-2 md:p-5 space-y-5">
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Informacion del curso:</h1>
                <p class="font-bold text-base ">Certificacion: <span class="text-sm font-normal">si</span></p>
                <p class="font-bold text-base ">Horas: <span class="text-sm font-normal">{{ $service->hours }}</span>
                </p>
                <p class="font-bold text-base ">Precio: <span class="text-sm font-normal">{{ $service->price }}</span>
                </p>
                <p class="font-bold text-base ">Precio con descuento: <span
                        class="text-sm font-normal">{{ $service->price_discount }}</span>
                </p>
                <p class="font-bold text-base ">Titulo: <span class="text-sm font-normal">{{ $service->name }}</span>
                </p>
                <p class="font-bold text-base ">Fecha Inicio: <span
                        class="text-sm font-normal">{{ $service->start_date }}</span></p>
                <p class="font-bold text-base ">Fecha Fin: <span
                        class="text-sm font-normal">{{ $service->end_date }}</span></p>


            </div>
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Expositores del curso:</h1>
                <ul>

                    @if ($exhibitors->isEmpty())
                        <p class="font-bold text-base ">No hay expositores</p>
                    @else
                        @foreach ($exhibitors as $exhibitor)
                            <div class="flex justify-between space-y-1">
                                <p class="font-bold text-base ">Expositor {{ $loop->index + 1 }}: <span
                                        class="text-sm font-normal">{{ $exhibitor->name }}
                                        {{ $exhibitor->last_name }}</span>
                                </p>
                                {{-- hoja de vida --}}
                                <a href="" target="_blank"
                                    class="text-white px-1.5 py-0.5 bg-yellow-500 rounded-md">Ver</a>
                            </div>
                        @endforeach
                    @endif

                </ul>
            </div>
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Descripcion del curso:</h1>
                <p>{{ $service->little_description }}</p>
            </div>
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Link del curso:</h1>
                <p class="font-bold text-base ">Link Brochure: <a target="_blank" href="{{ $service->link_brochure }}"
                        class="text-sm font-normal text-blue-500">Brochure
                        {{ $service->name }}
                    </a></p>
                <p class="font-bold text-base ">Link Video: <a target="_blank" href="{{ $service->link_video }}"
                        class="text-sm font-normal text-blue-500">Video Introduccion</a></p>
            </div>
            <div class="flex justify-end">
                <x-button class="py-2 px-2.5" color="green" primary="600">
                    <i class="mdi mdi-cart-outline"> </i> Comprar
                </x-button>
            </div>

        </div>
    </div>

    <div class="bg-white p-2 md:p-5">
        <h1 class="text-center font-bold text-lg">Descripcion del curso:</h1>
        <p>{{ $service->description }} </p>
    </div>
    <div class="bg-white p-2 md:p-5 ">
        <h1 class="text-center font-bold text-lg">Otros cursos:</h1>

        @if ($services->isEmpty())
            <div class="bg-white  rounded-lg py-20 flex justify-center text-center items-center w-full">
                <h1 class="font-bold uppercase ">No hay cursos disponibles</h1>
            </div>
        @else
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 relative">
                @foreach ($services as $service)
                    <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="relative w-full h-56">
                            <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-fill"
                                alt="">
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
                                <x-button class="py-2 px-2.5 hidden sm:block " color="green" primary="600">
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



</div>
