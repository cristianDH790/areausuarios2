<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card">
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
    <div class="bg-white px-4 py-4 card">
        <x-button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            save
        </x-button>
    </div>
</div>
