<div class="max-w-6xl mx-auto ">
    <div class="bg-white px-4 py-4 card">
        <div class="space-y-4">
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Name:</x-label>
                    <x-input type="text" class="border-gray-50 w-full" required placeholder="Name" wire:model="name" />
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap space-x-2">
                <div class="w-full">
                    <x-label>Description:</x-label>
                    <x-textarea class="border-gray-50 w-full" placeholder="Description"
                        wire:model="description"></x-textarea>
                    @error('description')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <x-button color="blue" wire:click="edit" secondary="800" primary="500" class="px-4 py-2">Save</x-button>
        </div>
    </div>

</div>
