<div class="max-w-7xl mx-auto py-5 px-5 sm:px-6 lg:px-8 space-y-3">
    <div class="bg-white shadow-lg rounded-lg py-3 px-2 flex justify-between items-center">
        <h1 class="font-bold uppercase">Cursos adquiridos:</h1>
        <x-select wire:model="type_service" class="py-2 px-3 pr-8">
            <option value="">Selecciona una Rama</option>
            <option value="10">Psicologia</option>
            <option value="10">Farmacia</option>
        </x-select>
    </div>
    <div class="bg-white border-2 border-dashed border-gray-300 rounded-lg py-2 px-2 flex justify-between items-center">
        <h1 class="font-semibold uppercase">Psicologia</h1>
        <h1 class="font-semibold ">Numero Cursos: <span class="text-blue-500">1</span></h1>
    </div>
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 relative">

        <div class="relative  bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="relative w-full h-56">
                <img src="{{ asset('storage/no-image.png') }}" class="w-full h-full object-contain" alt="">
                <a href="{{ route('my.service.customer.view') }}">
                    <div
                        class="absolute inset-0 flex items-center justify-center bg-cyan-600 bg-opacity-0 hover:bg-opacity-50 transition duration-500 ease-in-out">
                        <div
                            class="text-white text-center flex flex-col px-2  items-center justify-items-center justify-center  h-full w-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <p class="text-base font-semibold">Titulo</p>
                            <p class="text-md   w-full flex items-center justify-center">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ut optio aut
                                dolorum
                                possimus itaque placeat atque! Facere, blanditiis minima ea harum pariatur et distinctio
                                quae repudiandae, maxime sit alias.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full py-4">
                <div class="flex justify-evenly">
                    <div class="flex items-center">
                        <p class="text-sm font-bold text-gray-700">Horas: <span class="font-light">
                                48 horas academicas</span></p>
                    </div>
                    <x-button class="py-2 px-3" color="yellow" primary="500">
                        <i class="mdi mdi-certificate"> </i>
                    </x-button>
                    <x-button class="py-2 px-3" color="green" href="{{ route('my.service.customer.view') }}"
                        primary="600">
                        <i class="mdi mdi-book-open-page-variant"></i>
                    </x-button>

                </div>
            </div>
        </div>


    </div>

</div>
