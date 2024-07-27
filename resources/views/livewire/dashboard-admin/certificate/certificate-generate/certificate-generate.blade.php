<div>



    <div class="space-y-4">
        <div class="w-full">
            <img src="{{ asset($certificate_front) }}" alt="" class="w-full">
            {{-- <x-button class="p-2.5" color="blue" primary="600" secondary="600" wire:click="GenerarCertificado">Generar
                Certificado intervention</x-button>
            <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                wire:click="GenerarCertificado2">Generar
                Certificado doomPDF</x-button> --}}
            <x-button class="p-2.5" color="blue" href="{{ route('generate.certificate', $certificate->id) }}"
                target="blank_" primary="600" secondary="600">Configurar Certificado</x-button>

        </div>
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4 ">
                    <h2 class="font-semibold">TEXTO ENCABEZADO (A-1):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>


                            <div id="editor"></div>
                            <x-textarea name="editor1" class="border-gray-50 w-full" required placeholder="texto"
                                wire:model="value_A_1">

                            </x-textarea>
                            <script>
                                CKEDITOR.replace('editor1');
                            </script>
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
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Ancho de caja"
                                wire:model="ancho_caja_A_1" />
                            @error('ancho_caja_A_1')
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
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_1">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_1" />
                            @error('line_A_1')
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
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_2" />
                            @error('ancho_caja_A_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_2">
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
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_2">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_2" />
                            @error('line_A_2')
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
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_3" />
                            @error('ancho_caja_A_3')
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
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_3">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_3" />
                            @error('line_A_3')
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
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_7" />
                            @error('ancho_caja_A_7')
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
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_7">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_7" />
                            @error('line_A_7')
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
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_4">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_A_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_4" />
                            @error('ancho_caja_A_4')
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_4" />
                            @error('line_A_4')
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
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="ancho de caja" wire:model="ancho_caja_A_5" />
                            @error('ancho_caja_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">


                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_5">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_A_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_5">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_5" />
                            @error('line_A_5')
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
        {{-- <div>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_6" />
                            @error('line_A_6')
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
        </div> --}}
        {{-- firmas --}}


        {{-- firmas prueba  --}}
        <div>
            <div class="bg-white px-4 py-4 card">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FIRMAS (A-6):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>alias:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model.change="SelectedFirmaUno">
                                <option value="" class="text-gray-200">Elige una opción</option>

                                @foreach ($firmas as $firm)
                                    <option value="{{ $firm->id }}">{{ $firm->alias }}
                                    </option>
                                @endforeach
                            </select>
                            @error('SelectedFirmaUno')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($SelectedFirmaUno)
                            <div class="w-full">
                                <x-label>Texto 1:</x-label>

                                <x-input type="text" class="border-gray-50 w-full" disabled required
                                    placeholder="texto numero 1" value="{{ $this->nameFirma1_A_6 }}" />

                            </div>
                            <div class="w-full">
                                <x-label>Texto 2:</x-label>
                                <x-input type="text" class="border-gray-50 w-full" required
                                    placeholder="texto numero 2" value="{{ $this->nameFirma2_A_6 }}" />

                            </div>
                        @else
                        @endif

                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>firma:</x-label>
                            @if ($foto_firm1_A_6)
                                <img src="{{ asset('storage/' . $foto_firm1_A_6) }}" alt="Firma" width="100"
                                    height="100">
                            @else
                                <img src="{{ asset('storage/no-image.png') }}" alt="Firma" width="100"
                                    height="100">
                            @endif



                        </div>
                        <div class="w-full">
                            <x-label>Sello:</x-label>
                            @if ($foto_firm2_A_6)
                                <img src="{{ asset('storage/' . $foto_firm2_A_6) }}" alt="Firma" width="100"
                                    height="100">
                            @else
                                <img src="{{ asset('storage/no-image.png') }}" alt="Firma" width="100"
                                    height="100">
                            @endif


                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">


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
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_6" />
                            @error('ancho_caja_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">

                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_6">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_A_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_6">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_A_6')
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_6" />
                            @error('line_A_6')
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
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA6">Guardar</x-button>
            </div>
        </div>
        {{-- firmas prueba --}}

        {{-- firmas prueba 2 --}}
        <div>
            <div class="bg-white px-4 py-4 card">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FIRMAS (A-8):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>alias:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model.change="SelectedFirmaDos">
                                <option value="" class="text-gray-200">Elige una opción</option>

                                @foreach ($firmas as $firm)
                                    <option value="{{ $firm->id }}">{{ $firm->alias }}
                                    </option>
                                @endforeach
                            </select>
                            @error('SelectedFirmaDos')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($SelectedFirmaDos)
                            <div class="w-full">
                                <x-label>Texto 1:</x-label>

                                <x-input type="text" class="border-gray-50 w-full" disabled required
                                    placeholder="texto numero 1" value="{{ $this->nameFirma1_A_8 }}" />

                            </div>
                            <div class="w-full">
                                <x-label>Texto 2:</x-label>
                                <x-input type="text" class="border-gray-50 w-full" required
                                    placeholder="texto numero 2" value="{{ $this->nameFirma2_A_8 }}" />

                            </div>
                        @else
                        @endif

                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>firma:</x-label>
                            @if ($foto_firm1_A_8)
                                <img src="{{ asset('storage/' . $foto_firm1_A_8) }}" alt="Firma" width="100"
                                    height="100">
                            @else
                                <img src="{{ asset('storage/no-image.png') }}" alt="Firma" width="100"
                                    height="100">
                            @endif



                        </div>
                        <div class="w-full">
                            <x-label>Sello:</x-label>
                            @if ($foto_firm2_A_8)
                                <img src="{{ asset('storage/' . $foto_firm2_A_8) }}" alt="Sello" width="100"
                                    height="100">
                            @else
                                <img src="{{ asset('storage/no-image.png') }}" alt="Firma" width="100"
                                    height="100">
                            @endif


                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">


                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_8" />
                            @error('x_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_8" />
                            @error('y_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_8" />
                            @error('ancho_caja_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">

                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_8">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_8">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_8" />
                            @error('font_size_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_8" />
                            @error('line_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_8" />
                            @error('painting_A_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA8">Guardar</x-button>
            </div>
        </div>
        {{-- firmas prueba 2 --}}


        {{-- firmas prueba 3 --}}
        <div>
            <div class="bg-white px-4 py-4 card">
                <h1 class="font-bold">CERTIFICADO FRONTAL</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FIRMAS (A-9):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>alias:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model.change="SelectedFirmaTres">
                                <option value="" class="text-gray-200">Elige una opción</option>

                                @foreach ($firmas as $firm)
                                    <option value="{{ $firm->id }}">{{ $firm->alias }}
                                    </option>
                                @endforeach
                            </select>
                            @error('SelectedFirmaTres')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($SelectedFirmaDos)
                            <div class="w-full">
                                <x-label>Texto 1:</x-label>

                                <x-input type="text" class="border-gray-50 w-full" disabled required
                                    placeholder="texto numero 1" value="{{ $this->nameFirma1_A_9 }}" />

                            </div>
                            <div class="w-full">
                                <x-label>Texto 2:</x-label>
                                <x-input type="text" class="border-gray-50 w-full" required
                                    placeholder="texto numero 2" value="{{ $this->nameFirma1_A_9 }}" />

                            </div>
                        @else
                        @endif

                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>firma:</x-label>
                            @if ($foto_firm1_A_9)
                                <img src="{{ asset('storage/' . $foto_firm1_A_9) }}" alt="Firma" width="100"
                                    height="100">
                            @else
                                <img src="{{ asset('storage/no-image.png') }}" alt="Firma" width="100"
                                    height="100">
                            @endif



                        </div>
                        <div class="w-full">
                            <x-label>Sello:</x-label>
                            @if ($foto_firm2_A_9)
                                <img src="{{ asset('storage/' . $foto_firm2_A_9) }}" alt="Sello" width="100"
                                    height="100">
                            @else
                                <img src="{{ asset('storage/no-image.png') }}" alt="Firma" width="100"
                                    height="100">
                            @endif


                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">


                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada x"
                                wire:model="x_A_9" />
                            @error('x_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required placeholder="Cordenada y"
                                wire:model="y_A_9" />
                            @error('y_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_A_9" />
                            @error('ancho_caja_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">

                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_A_9">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_A_9">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_A_9" />
                            @error('font_size_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_A_9" />
                            @error('line_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_A_9" />
                            @error('painting_A_9')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateFrontA9">Guardar</x-button>
            </div>
        </div>
        {{-- firmas prueba 3 --}}

        {{-- back --}}

        {{-- temarios --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">ENCABESADO POSTERIOR "TEMARIO:" (B-1):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required placeholder="Temario:"
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
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_B_1" />
                            @error('ancho_caja_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_1">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_1')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_1">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_B_1" />
                            @error('line_B_1')
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
        {{-- temarios --}}

        {{-- Modulos --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">ENCABESADO POSTERIOR MODULOS (B-2):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

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
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="ancho de caja" wire:model="ancho_caja_B_2" />
                            @error('ancho_caja_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_2">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_2">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
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
        {{-- Modulos --}}

        {{-- texto --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">TEXTO SUPERIOR (B-3):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required
                                placeholder="OTORGADO POR EL ...." wire:model="value_B_3" />
                            @error('value_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="ancho de caja" wire:model="ancho_caja_B_3" />
                            @error('ancho_caja_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_3">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_3">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_3" />
                            @error('font_size_B_3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_B_3" />
                            @error('line_B_3')
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
        {{-- texto --}}



        {{-- codigo --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">CODIGO (B-4):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada x" wire:model="x_B_4" />
                            @error('x_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada y" wire:model="y_B_4" />
                            @error('y_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="ancho de caja" wire:model="ancho_caja_B_4" />
                            @error('ancho_caja_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_4">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_4">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_4" />
                            @error('font_size_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_B_4" />
                            @error('line_B_4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
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
        {{-- codigo --}}

        {{-- Codigo qr --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">CODIGO QR (B-5):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada x" wire:model="x_B_5" />
                            @error('x_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada y" wire:model="y_B_5" />
                            @error('y_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_5">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_5" />
                            @error('font_size_B_5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="ancho de caja" wire:model="ancho_caja_B_5" />
                            @error('ancho_caja_B_5')
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
        {{-- Codigo qr --}}

        {{-- fecha --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">FECHA POSTERIOR (B-6):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">

                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada x" wire:model="x_B_6" />
                            @error('x_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada y" wire:model="y_B_6" />
                            @error('y_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="ancho de caja" wire:model="ancho_caja_B_6" />
                            @error('ancho_caja_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_6">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_6">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_6" />
                            @error('font_size_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_B_6" />
                            @error('line_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_6" />
                            @error('painting_B_6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB6">Guardar</x-button>
            </div>
        </div>
        {{-- fecha --}}
        {{-- Texto expositores --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">TEXTO INFERIOR "EXPOSITOR:" (B-8):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Text:</x-label>
                            <x-input type="text" class="border-gray-50 w-full" required
                                placeholder="EXPOSITORES:" wire:model="value_B_8" />
                            @error('value_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada x" wire:model="x_B_8" />
                            @error('x_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada y" wire:model="y_B_8" />
                            @error('y_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_B_8" />
                            @error('ancho_caja_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_8">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_8">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_8" />
                            @error('font_size_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Lineado: </x-label>
                            <x-checkbox color="blue" wire:model="line_B_8" />
                            @error('line_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_8" />
                            @error('painting_B_8')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB8">Guardar</x-button>
            </div>
        </div>
        {{-- Texto expositores --}}
        {{-- expositores --}}
        <div>
            <div class="bg-white px-4 py-4 card space-y-4">
                <h1 class="font-bold">CERTIFICADO POSTERIOR</h1>
                <div class="space-y-4">
                    <h2 class="font-semibold">EXPOSITORES (B-7):</h2>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <label for="multiselect" class="block text-sm font-medium text-gray-700">Selecciona
                                opciones:</label>
                            <div class="relative">
                                <button id="multiselectButton"
                                    class="w-full bg-white border border-gray-300 rounded p-2 mt-2 text-left">
                                    Selecciona Expositores
                                </button>
                                <ul id="multiselectOptions"
                                    class="absolute w-full bg-white border border-gray-300 rounded mt-1 max-h-60 overflow-auto hidden z-10">

                                    @foreach ($exhibitors as $exhibitor)
                                        <li class="p-2 hover:bg-gray-100 cursor-pointer">
                                            <input type="checkbox" id="option{{ $exhibitor->id }}"
                                                value="{{ $exhibitor->prefix }} {{ $exhibitor->name }} {{ $exhibitor->last_name }}"
                                                wire:model="selectedExhibitors" class="mr-2">
                                            {{ $exhibitor->prefix }} {{ $exhibitor->name }}
                                            {{ $exhibitor->last_name }}
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const multiselectButton = document.getElementById('multiselectButton');
                                    const multiselectOptions = document.getElementById('multiselectOptions');
                                    const checkboxes = multiselectOptions.querySelectorAll('input[type="checkbox"]');

                                    multiselectButton.addEventListener('click', function() {
                                        multiselectOptions.classList.toggle('hidden');
                                    });

                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.addEventListener('change', function() {
                                            const selectedOptions = [];
                                            checkboxes.forEach(function(cb) {
                                                if (cb.checked) {
                                                    selectedOptions.push(cb.value);
                                                }
                                            });
                                            multiselectButton.textContent = selectedOptions.length ? selectedOptions.join(
                                                ', ') : 'Selecciona opciones';
                                        });
                                    });

                                    // Close the dropdown when clicking outside of it
                                    document.addEventListener('click', function(event) {
                                        if (!multiselectButton.contains(event.target) && !multiselectOptions.contains(event
                                                .target)) {
                                            multiselectOptions.classList.add('hidden');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Cordenada x:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada x" wire:model="x_B_7" />
                            @error('x_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Cordenada y:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Cordenada y" wire:model="y_B_7" />
                            @error('y_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>ancho de caja:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Ancho de caja" wire:model="ancho_caja_B_7" />
                            @error('ancho_caja_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap md:flex-nowrap gap-2 ">
                        <div class="w-full">
                            <x-label>Alineado:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="align_B_7">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="center">centro</option>
                                <option value="left">izquierda</option>
                                <option value="right">derecha</option>
                                <option value="justify">justificado</option>
                            </select>
                            @error('align_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Fuente:</x-label>
                            <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                                wire:model="type_typography_B_7">
                                <option value="" class="text-gray-200">Elige una opción</option>
                                <option value="normal ">Normal</option>
                                <option value="bold ">Bold</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="700">700</option>
                                <option value="800">800</option>
                                <option value="900">900</option>
                            </select>
                            @error('type_typography_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="w-full">
                            <x-label>Tamaño de Letra:</x-label>
                            <x-input type="number" class="border-gray-50 w-full" required
                                placeholder="Tamaño de Letra  " wire:model="font_size_B_7" />
                            @error('font_size_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <x-label>Pintar: <span
                                    class="inline-block w-3 h-3 rounded-full bg-red-500"></span></x-label>
                            <x-checkbox color="blue" wire:model="painting_B_7" />
                            @error('painting_B_7')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button class="p-2.5" color="blue" primary="600" secondary="600"
                    wire:click="saveCertificateBackB7">Guardar</x-button>
            </div>
        </div>
        {{-- expositores --}}



    </div>
