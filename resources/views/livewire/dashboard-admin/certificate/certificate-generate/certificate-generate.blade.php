<div>
    <div class="space-y-4">
        <div class="w-full">
            <img src="{{ asset($certificate_front) }}" alt="" class="w-full">
            <x-button class="p-2.5" color="blue" primary="600" secondary="600" wire:click="GenerarCertificado">Generar
                Certificado intervention</x-button>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600" wire:click="GenerarCertificado2">Generar
                Certificado doomPDF</x-button>

        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4 ">
                    <h2 class="font-semibold">TEXTO ENCABEZADO (A-1):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-textarea class="border-gray-50 w-full" required placeholder="texto"
                                wire:model="value_A_1">

                            </x-textarea>
                            @error('value_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

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
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Ancho"
                                wire:model="y_A_1" />
                            @error('y_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">

                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required wire:model="align_A_1">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">center</option>
                                <option value="left">left</option>
                                <option value="right">right</option>
                            </select>
                            @error('align_A_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_1">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="ARIAL">Normal</option>
                                <option value="ARIALNI">Narrow</option>
                                <option value="ARIALLGT">Ligth</option>
                                <option value="ARIALLGTITL">Ligth Italic</option>
                                <option value="ARIALBD">Bold</option>
                                <option value="ARIALBDI">Bold Italic</option>
                                <option value="ARIBLK">Super Bold</option>
                                <option value="ARIALBLACKITALIC">Super Bold Italic</option>
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
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA1">Guardar</x-button>
            </div>


        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">TEXTO ENCABEZADO 2 (A-2):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Text"
                                wire:model="value_A_2" />
                            @error('value_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_2" />
                            @error('x_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_2" />
                            @error('y_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required wire:model="align_A_2">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">center</option>
                                <option value="left">left</option>
                                <option value="right">right</option>
                            </select>
                            @error('align_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_2">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="ARIAL">Normal</option>
                                <option value="ARIALNI">Narrow</option>
                                <option value="ARIALLGT">Ligth</option>
                                <option value="ARIALLGTITL">Ligth Italic</option>
                                <option value="ARIALBD">Bold</option>
                                <option value="ARIALBDI">Bold Italic</option>
                                <option value="ARIBLK">Super Bold</option>
                                <option value="ARIALBLACKITALIC">Super Bold Italic</option>
                            </select>
                            @error('type_typography_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_2" />
                            @error('font_size_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-green-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_2" />
                            @error('painting_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA2">Guardar</x-button>
            </div>

        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">TEXTO ENCABEZADO 3 (A-3):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Text"
                                wire:model="value_A_3" />
                            @error('value_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_3" />
                            @error('x_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_3" />
                            @error('y_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_3">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">center</option>
                                <option value="left">left</option>
                                <option value="right">right</option>
                            </select>
                            @error('align_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_3">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="ARIAL">Normal</option>
                                <option value="ARIALNI">Narrow</option>
                                <option value="ARIALLGT">Ligth</option>
                                <option value="ARIALLGTITL">Ligth Italic</option>
                                <option value="ARIALBD">Bold</option>
                                <option value="ARIALBDI">Bold Italic</option>
                                <option value="ARIBLK">Super Bold</option>
                                <option value="ARIALBLACKITALIC">Super Bold Italic</option>
                            </select>
                            @error('type_typography_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_3" />
                            @error('font_size_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_3" />
                            @error('painting_A_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA3">Guardar</x-button>
            </div>

        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">NOMBRE CLIENTE(A-7):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Text"
                                wire:model="value_A_7" />
                            @error('value_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_7" />
                            @error('x_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_7" />
                            @error('y_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_7">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">center</option>
                                <option value="left">left</option>
                                <option value="right">right</option>
                            </select>
                            @error('align_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_7">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="ARIAL">Normal</option>
                                <option value="ARIALNI">Narrow</option>
                                <option value="ARIALLGT">Ligth</option>
                                <option value="ARIALLGTITL">Ligth Italic</option>
                                <option value="ARIALBD">Bold</option>
                                <option value="ARIALBDI">Bold Italic</option>
                                <option value="ARIBLK">Super Bold</option>
                                <option value="ARIALBLACKITALIC">Super Bold Italic</option>
                            </select>
                            @error('type_typography_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_7" />
                            @error('font_size_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_7" />
                            @error('painting_A_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA7">Guardar</x-button>
            </div>

        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">TEXTO ENCABEZADO 4 (A-4):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-textarea class="border-gray-50 w-full" required placeholder="texto"
                                wire:model="value_A_4">

                            </x-textarea>
                            @error('value_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_4" />
                            @error('x_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_4" />
                            @error('y_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_4">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">center</option>
                                <option value="left">left</option>
                                <option value="right">right</option>
                            </select>
                            @error('align_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Tipo Tipografia1:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_4">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="ARIAL">Normal</option>
                                <option value="ARIALNI">Narrow</option>
                                <option value="ARIALLGT">Ligth</option>
                                <option value="ARIALLGTITL">Ligth Italic</option>
                                <option value="ARIALBD">Bold</option>
                                <option value="ARIALBDI">Bold Italic</option>
                                <option value="ARIBLK">Super Bold</option>
                                <option value="ARIALBLACKITALIC">Super Bold Italic</option>
                            </select>
                            @error('type_typography_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia2:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography2_A_4">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="ARIAL">Normal</option>
                                <option value="ARIALNI">Narrow</option>
                                <option value="ARIALLGT">Ligth</option>
                                <option value="ARIALLGTITL">Ligth Italic</option>
                                <option value="ARIALBD">Bold</option>
                                <option value="ARIALBDI">Bold Italic</option>
                                <option value="ARIBLK">Super Bold</option>
                                <option value="ARIALBLACKITALIC">Super Bold Italic</option>
                            </select>
                            @error('type_typography2_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra" wire:model="font_size_A_4" />
                            @error('font_size_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_4" />
                            @error('painting_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA4">Guardar</x-button>
            </div>

        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FECHA ENCABESADO 1 (A-5):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="fecha"
                                wire:model="value_A_5" />
                            @error('value_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_5" />
                            @error('x_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_5" />
                            @error('y_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_A_5" />
                            @error('align_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_5">
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
                            @error('type_typography_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_5" />
                            @error('font_size_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_5" />
                            @error('painting_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA5">Guardar</x-button>
            </div>

        </div>
        {{-- firmas --}}
        <div>
            <div class="bg-white px-4 py-4 card">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FIRMAS (A-6):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="fecha"
                                wire:model="value_A_6" />
                            @error('value_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_6" />
                            @error('x_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_6" />
                            @error('y_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_A_6" />
                            @error('align_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_6" />
                            @error('font_size_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_6" />
                            @error('painting_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- firmas --}}

        {{-- back --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">ENCABESADO POSTERIOR 1 (B-1):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="fecha"
                                wire:model="value_B_1" />
                            @error('value_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_B_1" />
                            @error('x_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_B_1" />
                            @error('y_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_B_1" />
                            @error('align_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_1">
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
                            @error('type_typography_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_1" />
                            @error('font_size_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_1" />
                            @error('painting_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB1">Guardar</x-button>
            </div>
        </div>

        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">ENCABESADO POSTERIOR 2 (B-2):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="fecha"
                                wire:model="value_B_2" />
                            @error('value_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_B_2" />
                            @error('x_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_B_2" />
                            @error('y_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_B_2" />
                            @error('align_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_2">
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
                            @error('type_typography_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra" wire:model="font_size_B_2" />
                            @error('font_size_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_2" />
                            @error('painting_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB2">Guardar</x-button>
            </div>
        </div>

        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">CODIGO (B-3):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_B_3" />
                            @error('x_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_B_3" />
                            @error('y_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_B_3" />
                            @error('align_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_3">
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
                            @error('type_typography_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_1" />
                            @error('font_size_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_3" />
                            @error('painting_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB3">Guardar</x-button>
            </div>
        </div>

        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">CODIGO QR (B-4):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_B_4" />
                            @error('x_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_B_4" />
                            @error('y_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_B_4" />
                            @error('align_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_1">
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
                            @error('type_typography_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        {{-- <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_4" />
                            @error('font_size_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_4" />
                            @error('painting_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB4">Guardar</x-button>
            </div>
        </div>

        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FECHA POSTERIOR (B-5):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="fecha"
                                wire:model="value_B_5" />
                            @error('value_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_B_5" />
                            @error('x_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_B_5" />
                            @error('y_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_B_5" />
                            @error('align_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_5">
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
                            @error('type_typography_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_5" />
                            @error('font_size_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_5" />
                            @error('painting_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB5">Guardar</x-button>
            </div>
        </div>
        {{-- expositores --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">ENCABESADO POSTERIOR 1 (B-1):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="fecha"
                                wire:model="value_B_1" />
                            @error('value_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_B_1" />
                            @error('x_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_B_1" />
                            @error('y_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Alineado"
                                wire:model="align_B_1" />
                            @error('align_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tipo Tipografia:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_1">
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
                            @error('type_typography_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_1" />
                            @error('font_size_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_1" />
                            @error('painting_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB1">Guardar</x-button>
            </div>
        </div>

    </div>
