<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card space-y-3">
        <h1 class="font-bold">Numeros de atencion</h1>
        <div class="w-full">
            <x-label>Numero venta:</x-label>
            <x-input type="number" class="border-gray-50 w-full" required placeholder="numero venta"
                wire:model="phone_sale" />
            @error('phone_sale')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <x-label>Numero soporte:</x-label>
            <x-input type="text" class="border-gray-50 w-full" required placeholder="numero soporte"
                wire:model="phone_contact" />
            @error('phone_contact')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <br>

    <div class="bg-white px-4 py-4 card space-y-3">
        <div class="w-full">
            <x-label>Nombre Boleta:</x-label>
            <x-input type="text" class="border-gray-50 w-full" required placeholder="Nombre boleta"
                wire:model="nombre_boleta" />
            @error('nombre_boleta')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <x-label>Ruc Boleta:</x-label>
            <x-input type="text" class="border-gray-50 w-full" required placeholder="Ruc boleta"
                wire:model="ruc_boleta" />
            @error('ruc_boleta')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <x-label>Direccion Boleta:</x-label>
            <x-input type="text" class="border-gray-50 w-full" required placeholder="Direccion boleta"
                wire:model="direccion_boleta" />
            @error('direccion_boleta')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            <x-label>Propietario Boleta:</x-label>
            <x-input type="text" class="border-gray-50 w-full" required placeholder="Propietario boleta"
                wire:model="propietario_boleta" />
            @error('propietario_boleta')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full">
            <x-label>Correo Electronico Boleta:</x-label>
            <x-input type="email" class="border-gray-50 w-full" required placeholder="Email boleta"
                wire:model="email_boleta" />
            @error('email_boleta')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            <x-label>logotipo Boleta:</x-label>
            <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png" max_size="25Mb"
                accept="image/jpeg,image/bmp,image/png" model="photo_logotipo">
                Subir
                imagen
                logotipo
            </x-file.drag-and-drop-single>
            @error('photo_logotipo')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

    </div>
    <br>
    <div class="bg-white px-4 py-4 card">
        <x-button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            save
        </x-button>
    </div>
</div>
