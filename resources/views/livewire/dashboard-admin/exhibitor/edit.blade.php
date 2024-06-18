<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card">
        <div class="space-y-4">
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Prefix:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Prefix"
                        wire:model="prefix" />
                    @error('prefix')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Name:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Name"
                        wire:model="name" />
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Last Name:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Last Name"
                        wire:model="last_name" />
                    @error('last_name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">

                <div class="w-full">
                    <x-label>Document:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Document"
                        wire:model="document" />
                    @error('document')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Phone:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Phone"
                        wire:model="phone" />
                    @error('phone')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Review:</x-label>
                    <x-textarea class="border-gray-50 w-full" placeholder="Review" wire:model="review"></x-textarea>
                    @error('review')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Link CV:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" placeholder="link" wire:model="link" />
                    @error('link')
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
                            accept="image/jpeg,image/bmp,image/png">
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
                            accept="image/jpeg,image/bmp,image/png">
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
