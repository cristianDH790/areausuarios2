<div>
    <div class="max-w-6xl mx-auto space-y-8">
        <div class="bg-white px-4 py-4 card">
            <div class="font-semibold text-base">
                Editar servicio del cliente {{ $user->name }} {{ $user->last_name }}
            </div>

        </div>
        <div class="bg-white px-4 py-4 card">
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Status:</x-label>
                    <select class="border-gray-100 py-2 px-3 w-full rounded-md" required wire:model="status">
                        <option value="" class="text-gray-200">Select status
                        </option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
      
        <div class="bg-white px-4 py-4 card">
            <x-button primary="500" color="yellow" secondary="800" href="{{ route('generate.certificate.masivo', [$certificate->service->id, $user->code]) }}"
                download class="px-4 py-2">
                Descargar archivo
            </x-button>
            <x-button primary="500" color="green" secondary="800"  href="{{ route('generate.certificate.masivo.blanco', [$certificate->service->id, $user->code]) }}"
               download  class="px-4 py-2">
                Descargar archivo en blanco 
            </x-button>
        </div>
        {{-- @if ($archivoPathanterior)
            <div class="bg-white px-4 py-4 card">
                <x-button primary="500" color="yellow" secondary="800"
                    href="{{ url('storage/' . $archivoPathanterior) }}" download class="px-4 py-2">
                    Descargar archivo anterior
                </x-button>
                <x-button primary="500" color="green" secondary="800"
                    href="{{ url('storage/' . $archivoPathanterior) }}" target="_blank" class="px-4 py-2">
                    Ver archivo anterior
                </x-button>
            </div>
        @endif --}}

        {{-- <div class="bg-white px-4 py-4 card">
            <x-label>Archivo: {!! $archivoPath
                ? '<a class="text-red-500" target="_blank" href="' . url('storage/' . $archivoPath) . '">ver archivo</a>'
                : '' !!}</x-label>

            <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png" title="archivo" max_size="25Mb"
                accept="image/jpeg,image/bmp,image/png,application/pdf" model="file_certificate">
                Subir Archivo Certificado
            </x-file.drag-and-drop-single>

            @error('file_certificate')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div> --}}
        <div>
            <x-button wire:click="save" primary="500" color="blue" secondary="800" class="px-4 py-2">
                Guardar
            </x-button>
        </div>
    </div>
</div>
