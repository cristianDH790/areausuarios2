<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card">
        <div class="space-y-4">
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Alias:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Alias" wire:model="alias" />
                    @error('alias')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Name One:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Name One"
                        wire:model="name_one" />
                    @error('name_one')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Name Two:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Name Two"
                        wire:model="name_two" />
                    @error('name_two')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    @if ($pathfile == null)
                        <span class="text-red-500">* Require image</span>
                        <x-label>Image:</x-label>
                        <x-file.drag-and-drop-single formats="jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model="photo_firm">
                            Subir
                            imagen
                            exhibitor
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @else
                        <x-label>Old Image</x-label>
                        <img src="{{ asset('storage/' . $pathfile) }}" alt="image" class="w-75 h-auto">
                        <x-label>Image:</x-label>
                        <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model="photo_firm">
                            Subir
                            imagen
                            service
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    @if ($pathfile2 == null)
                        <span class="text-red-500">* Require image</span>
                        <x-label>Image:</x-label>
                        <x-file.drag-and-drop-single formats="jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model=photo_seal>
                            Subir
                            imagen
                            exhibitor
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @else
                        <x-label>Old Image</x-label>
                        <img src="{{ asset('storage/' . $pathfile2) }}" alt="image" class="w-75 h-auto">
                        <x-label>Image:</x-label>
                        <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model=photo_seal>
                            Subir
                            imagen
                            service
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @endif

                </div>
            </div>
            <x-button color="blue" wire:click="edit" secondary="800" primary="500" class="px-4 py-2">Save</x-button>
        </div>
    </div>

</div>
