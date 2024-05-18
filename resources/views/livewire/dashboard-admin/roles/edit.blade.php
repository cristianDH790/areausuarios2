<div class="p-3 max-w-6xl w-full mx-auto">
    <div class="bg-white px-5 py-5">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="p-3 lg:p-6 space-y-3">
                <x-label for="name" value="Nombre" />
                <x-input type="text" class="border-gray-50 w-full" required placeholder="nombre" wire:model="name" />

            </div>
            <div class="p-3 lg:p-6 space-y-3">
                <h2 class="text-sm">Permisos de : {{ $role->name }}</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                    @foreach ($permissions as $permission)
                        <div>
                            <x-form.checkbox :label="$permission->name" id="l-{{ $permission->id }}"
                                wire:model="rolePermissions.{{ $permission->id }}"></x-form.checkbox>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div name="footer">
            <x-button color="blue" wire:click="save" secondary="800" primary="500"
                class="px-4 py-2">Guardar</x-button>

        </div>
    </div>
</div>
