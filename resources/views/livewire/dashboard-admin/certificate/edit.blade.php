<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card">
        <div class="flex justify-end">
            <x-button color="green" href="{{ route('certificate.module.index', $certificate->id) }}" secondary="800"
                primary="500" class="px-4 py-2">Modulos</x-button>
        </div>
        <div class="space-y-4">
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Service:</x-label>
                    <select class="border-gray-100 py-2 px-3 w-full rounded-md" required wire:model="service_id">
                        <option value="" class="text-gray-200">Select type service
                        </option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Type Certificate:</x-label>
                    <select class="border-gray-100 py-2 px-3 w-full rounded-md" required
                        wire:model="type_certificate_id">
                        <option value="" class="text-gray-200">Select type certificate
                        </option>
                        @foreach ($type_certificates as $type_certificate)
                            <option value="{{ $type_certificate->id }}">{{ $type_certificate->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_certificate_id')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Broadcast date:</x-label>
                    <x-input type="date" class="border-gray-50 w-full" required placeholder="Broadcast Date"
                        wire:model="broadcast_date" />
                    @error('broadcast_date')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
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
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Description:</x-label>
                    <x-textarea class="border-gray-50 w-full" placeholder="Description"
                        wire:model="description"></x-textarea>
                    @error('description')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    @if ($pathfile == null)
                        <span class="text-red-500">* Require image</span>
                        <x-label>Image Certificate Front:</x-label>
                        <x-file.drag-and-drop-single formats="jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model="photo_front">
                            Subir
                            imagen
                            certificate
                            Front
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @else
                        <x-label>Old Image</x-label>

                        <img src="{{ asset('storage/' . $pathfile) }}" alt="image" class="w-75 h-auto">
                        <x-label>Image Certificate Front:</x-label>
                        <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model="photo_front">
                            Subir
                            imagen
                            certificate
                            Front
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
                        <x-label>Image Certificate Back:</x-label>
                        <x-file.drag-and-drop-single formats="jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model=photo_back>
                            Subir
                            imagen
                            certificate
                            back
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @else
                        <x-label>Old Image</x-label>
                        <img src="{{ asset('storage/' . $pathfile) }}" alt="image" class="w-75 h-auto">
                        <x-label>Image Certificate Back:</x-label>
                        <x-file.drag-and-drop-single formats="pdf, jpeg, jpg, bmp, png" max_size="25Mb"
                            accept="image/jpeg,image/bmp,image/png" model=photo_back>
                            Subir
                            imagen
                            certificate
                            back
                        </x-file.drag-and-drop-single>
                        @error('file')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @endif
                </div>
            </div>
            <x-button color="blue" wire:click="save" secondary="800" primary="500" class="px-4 py-2">Save</x-button>
        </div>
    </div>

</div>
