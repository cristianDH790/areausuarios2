<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card space-y-3">

        <div class="w-full flex justify-between">
            <div>
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>edit service

                </p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="font-bold">Code:</span>
                <x-input type="text" class="border-gray-50 text-gray-500 w-full" disabled readonly
                    wire:model="code_service" />
            </div>
        </div>
        <div class="space-y-4">
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Name:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Name"
                        wire:model="name" />
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>type service:</x-label>
                    <select class="border-gray-50 py-2 px-3 w-full" required wire:model="type_service_id">
                        <option value="" class="text-gray-200">Select type service
                        </option>
                        @foreach ($type_services as $type_service)
                            <option value="{{ $type_service->id }}">{{ $type_service->name }}
                            </option>
                        @endforeach
                    </select>


                    @error('type_service_id')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Slug:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Slug"
                        wire:model="slug" />
                    @error('slug')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Price:</x-label>
                    <x-input type="number" class="border-gray-50 w-full" placeholder="Price" wire:model="price" />
                    @error('price')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Price discount:</x-label>
                    <x-input type="number" class="border-gray-50 w-full" required placeholder="Price Discount"
                        wire:model="price_discount" />
                    @error('price_discount')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>Hours:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="hours"
                        wire:model="hours" />
                    @error('hours')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Start date:</x-label>
                    <x-input type="date" class="border-gray-50 w-full" required placeholder="Start Date"
                        wire:model="start_date" />
                    @error('start_date')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <x-label>End date:</x-label>
                    <x-input type="date" class="border-gray-50 w-full" required placeholder="End Date"
                        wire:model="end_date" />
                    @error('end_date')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full space-y-1">
                    <x-label>Expositores:</x-label>
                    @foreach ($exhibitors as $exhibitor)
                        <div>
                            <x-form.checkbox :label="$exhibitor->name . ' ' . $exhibitor->last_name" id="e-{{ $exhibitor->id }}"
                                wire:model="serviceexhibitor.{{ $exhibitor->id }}"></x-form.checkbox>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full space-y-1">
                    <x-label>Firmas:</x-label>
                    @foreach ($firms as $firm)
                        <div>
                            <x-form.checkbox :label="$firm->alias" id="f-{{ $firm->id }}"
                                wire:model="servicefirm.{{ $firm->id }}"></x-form.checkbox>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Description little:</x-label>
                    <x-textarea class="border-gray-50 w-full" placeholder="Description Little"
                        wire:model="little_description"></x-textarea>
                    @error('little_description')
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
                    <x-label>Link brochure(opcional):</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Link Brochure"
                        wire:model="link_brochure" />
                    @error('link_brochure')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    <x-label>Link Video(opcional):</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Link Video"
                        wire:model="link_video" />
                    @error('link_video')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-4">
                <div class="w-full">
                    @if ($pathfile == null)
                        <span class="text-red-500">* Require image</span>
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

        </div>
        <div class="flex justify-end">
            <x-button color="blue" wire:click="edit" secondary="800" primary="500"
                class="px-4 py-2">Save</x-button>
        </div>

    </div>
</div>
