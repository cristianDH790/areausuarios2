<div>
    <div>
        <div class="w-full">
            <img src="{{ asset($certificate_front) }}" alt="" class="w-full">
        </div>
        <div>
            <div class="bg-white px-4 py-4 card">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">TEXTO ENCABEZADO (A-1):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Texto prueba:</x-label>
                            <input type="text" wire:model.live="texto">
                        </div>
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Text"
                                wire:model="value_A_1" />
                            @error('value_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_1" />
                            @error('x_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_1" />
                            @error('y_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_A_1" />
                            @error('align_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A-1">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="font-thin">font-thin</option>
                                <option value="font-extralight">font-extralight</option>
                                <option value="font-light">font-light</option>
                                <option value="font-normal">font-normal</option>
                                <option value="font-medium">font-medium</option>
                                <option value="font-semibold">font-semibold</option>
                                <option value="font-bold">font-bold</option>
                                <option value="font-extrabold">font-extrabold</option>
                                <option value="font-black">font-black</option>
                            </select>
                            @error('type_typography_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_1" />
                            @error('font_size_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_1" />
                            @error('painting_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <x-button color="blue" wire:click="save_Encabezado_F" secondary="800" primary="500"
                        class="px-4 py-2">Save</x-button>
                </div>
            </div>

        </div>
    </div>
