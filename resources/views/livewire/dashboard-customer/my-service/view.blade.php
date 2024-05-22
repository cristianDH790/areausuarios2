<div class="max-w-7xl mx-auto py-5 px-2 sm:px-6 lg:px-8 space-y-3">
    <div class="bg-white shadow-lg rounded-lg py-3 px-2 flex justify-between items-center">
        <h1 class="font-bold uppercase">Psicologia clinica</h1>
        <h1 class="font-bold uppercase text-end md:text-start">48 Horas Academicas</h1>
    </div>
    {{-- <div class="bg-white border-2 border-dashed border-gray-300 rounded-lg py-2 px-2 flex justify-between items-center">
        <h1 class="font-semibold uppercase">Psicologia</h1>
        <h1 class="font-semibold ">Numero Cursos: <span class="text-blue-500">1</span></h1>
    </div> --}}
    <!-- Alpine.js CDN -->

    <div class="block md:flex md:space-x-5 ">
        <div class="w-full md:w-1/2 md:flex items-center  bg-white p-2 md:p-5">
            <img src="{{ asset('storage/no-image.png') }}" class="w-full object-contain" alt="">

        </div>
        <div class="w-full md:w-1/2  flex flex-col bg-white p-2 md:p-5 space-y-5">
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Informacion del curso:</h1>
                <p class="font-bold text-base ">Certificacion: <span class="text-sm font-normal">si</span></p>
                <p class="font-bold text-base ">Horas: <span class="text-sm font-normal">120 Horas Academicas</span></p>
                <p class="font-bold text-base ">Precio: <span class="text-sm font-normal">198.00</span></p>
                <p class="font-bold text-base ">Precio con descuento: <span class="text-sm font-normal">100.00</span>
                </p>
                <p class="font-bold text-base ">Titulo: <span class="text-sm font-normal">Psicologia Clinica</span></p>
                <p class="font-bold text-base ">Fecha Inicio: <span class="text-sm font-normal">100.00</span></p>
                <p class="font-bold text-base ">Fecha Fin: <span class="text-sm font-normal">100.00</span></p>


            </div>
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Expositores del curso:</h1>
                <ul>
                    <p class="font-bold text-base ">Expositor 1: <span class="text-sm font-normal">Mariano Melgar
                            Paniagua</span>
                    </p>
                </ul>
            </div>
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Descripcion del curso:</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nobis voluptatum illo error voluptate
                    ea impedit repellendus asperiores dicta, sint, aut facilis quos repellat ratione nemo, culpa iusto
                    voluptates officia!</p>
            </div>
            <div class="border-2 border-dashed p-5">
                <h1 class="text-center font-bold text-lg">Link del curso:</h1>
                <p class="font-bold text-base ">Link Brochure: <a class="text-sm font-normal">Brochure Psicologia
                        Clinica</a></p>
                <p class="font-bold text-base ">Link Video: <a class="text-sm font-normal">Video Introduccion</a></p>
            </div>
        </div>
    </div>

    <div class="bg-white p-2 md:p-5">
        <h1 class="md:text-start text-center font-bold text-lg">Descripcion del curso:</h1>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nobis voluptatum illo error voluptate
            ea impedit repellendus asperiores dicta, sint, aut facilis quos repellat ratione nemo, culpa iusto
            voluptates officia Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quia corporis, eligendi
            error voluptates iusto inventore officiis, aliquid laudantium numquam distinctio? Itaque optio vero
            doloremque, earum iusto eius? Voluptates, reprehenderit. Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Ipsa fugiat quod numquam officia aperiam fugit sed quaerat error iure, explicabo, magnam atque magni.
            Voluptates quis esse suscipit saepe recusandae voluptatum. </p>
    </div>
    <div class="md:p-5 space-y-2">
        <h1 class="md:text-start text-center font-bold text-lg">Estudiar:</h1>
        <div class="w-full mx-auto p-3 rounded-xl bg-gray-200">
            <div x-data="{ open: false }" class="rounded bg-gray-200">
                <div @click="open = !open"
                    class="cursor-pointer bg-gray-200 py-3 px-4 flex justify-between items-center space-x-9">
                    <div class="flex justify-between w-full">
                        <h3 class="text-lg font-semibold">¿Que es la psicologia clinica?</h3>
                        <x-button class="bg-blue-500 px-2 py-2 hover:bg-blue-700"
                            href="{{ route('my.service.customer.video') }}">
                            <i class="fas fa-play text-white"> Estudiar</i>
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
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">2.</td>
                                <td class="py-3 px-4 text-left">Update software</td>
                                <td class="py-3 px-4 text-left"><span
                                        class="inline-block px-2 py-1 font-semibold text-white bg-red-500 rounded">55%</span>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">1.</td>
                                <td class="py-3 px-4 text-left">Update software</td>
                                <td class="py-3 px-4 text-left"><span
                                        class="inline-block px-2 py-1 font-semibold text-white bg-red-500 rounded">55%</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>






</div>
