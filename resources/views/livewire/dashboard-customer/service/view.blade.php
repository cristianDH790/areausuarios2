<div class="max-w-7xl mx-auto py-5 px-2 sm:px-6 lg:px-8 space-y-3">
    <div class="bg-white shadow-lg rounded-lg py-3 px-2 flex justify-between items-center">
        <h1 class="font-bold uppercase">Psicologia clinica</h1>
        <h1 class="font-bold uppercase text-end md:text-start">48 Horas Academicas</h1>
    </div>
    {{-- <div class="bg-white border-2 border-dashed border-gray-300 rounded-lg py-2 px-2 flex justify-between items-center">
        <h1 class="font-semibold uppercase">Psicologia</h1>
        <h1 class="font-semibold ">Numero Cursos: <span class="text-blue-500">1</span></h1>
    </div> --}}

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
            <div class="flex justify-end">
                <x-button class="py-2 px-2.5" color="green" primary="600">
                    <i class="mdi mdi-cart-outline"> </i> Comprar
                </x-button>
            </div>

        </div>
    </div>

    <div class="bg-white p-2 md:p-5">
        <h1 class="text-center font-bold text-lg">Descripcion del curso:</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam nobis voluptatum illo error voluptate
            ea impedit repellendus asperiores dicta, sint, aut facilis quos repellat ratione nemo, culpa iusto
            voluptates officia Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil quia corporis, eligendi
            error voluptates iusto inventore officiis, aliquid laudantium numquam distinctio? Itaque optio vero
            doloremque, earum iusto eius? Voluptates, reprehenderit. Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Ipsa fugiat quod numquam officia aperiam fugit sed quaerat error iure, explicabo, magnam atque magni.
            Voluptates quis esse suscipit saepe recusandae voluptatum. </p>
    </div>
    <div class="bg-white p-2 md:p-5 ">
        <h1 class="text-center font-bold text-lg">Otros cursos:</h1>
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-2 relative">
            <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="relative w-full h-56">
                    <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-contain" alt="">
                    <a href="{{ route('service.customer.view') }}">
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-cyan-600 bg-opacity-0 hover:bg-opacity-50 transition duration-500 ease-in-out">
                            <div
                                class="text-white text-center flex flex-col px-2  items-center justify-items-center justify-center  h-full w-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <p class="text-base font-semibold">Titulo</p>
                                <p class="text-md   w-full flex items-center justify-center">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ut optio aut
                                    dolorum
                                    possimus itaque placeat atque! Facere, blanditiis minima ea harum pariatur et
                                    distinctio
                                    quae repudiandae, maxime sit alias.
                                </p>
                            </div>
                        </div>
                    </a>

                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-red-500 text-white px-2 py-1 rounded-lg">Oferta
                    </div>
                </div>
                <div class="w-full py-4">
                    <div class="flex justify-evenly">
                        <div class="flex items-center space-x-2">
                            <p class="text-sm font-medium text-red-500 line-through">Antes: <span class="font-light">
                                    s/.
                                    180
                                    soles</span></p>
                            <p class="text-sm font-medium text-gray-700">Ahora: <span class="font-light"> s/. 150
                                    soles</span></p>
                        </div>
                        <x-button href="{{ route('service.customer.view') }}" class="py-2 px-2.5" color="yellow"
                            primary="600">
                            <i class="mdi mdi-information-outline "> </i>
                        </x-button>
                        <x-button class="py-2 px-2.5" color="green" primary="600">
                            <i class="mdi mdi-cart-outline"> </i>
                        </x-button>


                    </div>
                </div>
            </div>
            <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="relative w-full h-56">
                    <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-contain" alt="">
                    <a href="{{ route('service.customer.view') }}">
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-cyan-600 bg-opacity-0 hover:bg-opacity-50 transition duration-500 ease-in-out">
                            <div
                                class="text-white text-center flex flex-col px-2  items-center justify-items-center justify-center  h-full w-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <p class="text-base font-semibold">Titulo</p>
                                <p class="text-md   w-full flex items-center justify-center">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ut optio aut
                                    dolorum
                                    possimus itaque placeat atque! Facere, blanditiis minima ea harum pariatur et
                                    distinctio
                                    quae repudiandae, maxime sit alias.
                                </p>
                            </div>
                        </div>
                    </a>

                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-red-500 text-white px-2 py-1 rounded-lg">Oferta
                    </div>
                </div>
                <div class="w-full py-4">
                    <div class="flex justify-evenly">
                        <div class="flex items-center space-x-2">
                            <p class="text-sm font-medium text-red-500 line-through">Antes: <span class="font-light">
                                    s/.
                                    180
                                    soles</span></p>
                            <p class="text-sm font-medium text-gray-700">Ahora: <span class="font-light"> s/. 150
                                    soles</span></p>
                        </div>
                        <x-button href="{{ route('service.customer.view') }}" class="py-2 px-2.5" color="yellow"
                            primary="600">
                            <i class="mdi mdi-information-outline "> </i>
                        </x-button>
                        <x-button class="py-2 px-2.5" color="green" primary="600">
                            <i class="mdi mdi-cart-outline"> </i>
                        </x-button>


                    </div>
                </div>
            </div>
            <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="relative w-full h-56">
                    <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-contain"
                        alt="">
                    <a href="{{ route('service.customer.view') }}">
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-cyan-600 bg-opacity-0 hover:bg-opacity-50 transition duration-500 ease-in-out">
                            <div
                                class="text-white text-center flex flex-col px-2  items-center justify-items-center justify-center  h-full w-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <p class="text-base font-semibold">Titulo</p>
                                <p class="text-md   w-full flex items-center justify-center">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ut optio aut
                                    dolorum
                                    possimus itaque placeat atque! Facere, blanditiis minima ea harum pariatur et
                                    distinctio
                                    quae repudiandae, maxime sit alias.
                                </p>
                            </div>
                        </div>
                    </a>

                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-red-500 text-white px-2 py-1 rounded-lg">Oferta
                    </div>
                </div>
                <div class="w-full py-4">
                    <div class="flex justify-evenly">
                        <div class="flex items-center space-x-2">
                            <p class="text-sm font-medium text-red-500 line-through">Antes: <span class="font-light">
                                    s/.
                                    180
                                    soles</span></p>
                            <p class="text-sm font-medium text-gray-700">Ahora: <span class="font-light"> s/. 150
                                    soles</span></p>
                        </div>
                        <x-button href="{{ route('service.customer.view') }}" class="py-2 px-2.5" color="yellow"
                            primary="600">
                            <i class="mdi mdi-information-outline "> </i>
                        </x-button>
                        <x-button class="py-2 px-2.5" color="green" primary="600">
                            <i class="mdi mdi-cart-outline"> </i>
                        </x-button>


                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
