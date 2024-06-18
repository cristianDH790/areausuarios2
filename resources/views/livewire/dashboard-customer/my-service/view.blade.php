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
                @if ($service->link_brochure == null)
                    <p class="font-bold text-base ">Link Brochure:
                        <span target="_blank" class="text-sm font-normal text-gray-500">
                            Brochure
                            {{ $service->name }}
                        </span>
                    </p>
                @else
                    <p class="font-bold text-base ">Link Brochure: <a target="_blank"
                            href="{{ $service->link_brochure }}" class="text-sm font-normal text-blue-500">Brochure
                            {{ $service->name }}
                        </a></p>
                @endif
                @if ($service->link_video == null)
                    <p class="font-bold text-base ">Link Brochure:
                        <span target="_blank" class="text-sm font-normal text-gray-500">
                            Video
                            Introduccion
                        </span>
                    </p>
                @else
                    <p class="font-bold text-base ">Link Video: <a target="_blank" href="{{ $service->link_video }}"
                            class="text-sm font-normal text-blue-500">Video
                            Introduccion</a></p>
                @endif

            </div>
            {{-- <div class="flex justify-end">
                <x-button class="py-2 px-2.5" color="green" primary="600">
                    <i class="mdi mdi-cart-outline"> </i> Comprar
                </x-button>
            </div> --}}

        </div>
    </div>

    <div class="bg-white p-2 md:p-5">
        <h1 class="text-center font-bold text-lg">Descripcion del curso:</h1>
        <p>{{ $service->description }} </p>
    </div>
    <div class="md:p-5 space-y-2">
        <h1 class="md:text-start text-center font-bold text-lg">Estudiar:</h1>
        <div class="w-full mx-auto p-3 rounded-xl border-2 border-gray-300 border-dashed space-y-2">
            @if ($modules == null)
                <p class="text-center font-bold text-lg">No se encuentran los modulos aun , comuniquese con su asesor
                </p>
            @else
                @foreach ($modules as $module)
                    <div x-data="{ open: false }" class=" bg-gray-200 rounded-xl p-3">
                        <div @click="open = !open"
                            class="cursor-pointer bg-gray-200 py-3 px-4 flex justify-between items-center space-x-9">
                            <div class="flex justify-between w-full">
                                <h3 class="text-lg font-semibold">{{ $module->title }}</h3>

                                <x-button class="bg-red-500 px-2 py-2 hover:bg-red-700"
                                    href="{{ route('my.service.customer.video', ['slug' => $service->slug, 'module' => $module]) }}">
                                    <i class="fas fa-play text-white"></i> Estudiar
                                </x-button>

                            </div>

                            <i x-show="!open" class="fas fa-chevron-down text-white"></i>
                            <i x-show="open" class="fas fa-chevron-up text-white"></i>

                        </div>

                        <div x-show="open" x-transition class="p-3 bg-gray-200 flex justify-between space-x-8">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-4 text-left" style="width: 10px"></th>
                                        <th class="py-3 px-4 text-left"></th>
                                        <th class="py-3 px-4 text-left" style="width: 40px"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @php
                                        $topics = $module->topics;
                                    @endphp
                                    @foreach ($topics as $topic)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                                            <td class="py-3 px-4 text-left">{{ $loop->index + 1 }}</td>
                                            <td class="py-3 px-4 text-left">{{ $topic->title }}</td>
                                            <td class="py-3 px-4 text-left"><span
                                                    class="inline-block px-2 py-1 font-semibold text-white bg-green-500 rounded w-full text-center">Tema</span>
                                            </td>
                                        </tr>
                                        @php
                                            $subtopics = $topic->sub_topics;
                                            $subIndex = 1;
                                        @endphp
                                        @foreach ($subtopics as $subtopic)
                                            <tr class="border-b border-gray-200 hover:bg-gray-100   ">
                                                <td class="py-3 px-4 text-left">
                                                    {{ $loop->parent->index + 1 }}.{{ $subIndex }}
                                                    @php
                                                        $subIndex++;
                                                    @endphp
                                                </td>
                                                <td class="py-3 px-4 text-left">{{ $subtopic->title }}</td>
                                                <td class="py-3 px-4 text-left"><span
                                                        class="inline-block px-2 py-1 font-semibold text-white bg-yellow-500 rounded w-full text-center">Subtema</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

            @endif

        </div>
    </div>






</div>
