<x-app>
    <x-slot name="header">
        <div class="w-full flex items-center justify-between">
            {{ __('Editar finanzas') }}
            <div>
                <ul class='flex flex-wrap font-bold text-stone-500 max-w-6xl w-full mx-auto text-sm  space-x-2'>
                    <li class="breadcrumb-item max-w-64 truncate">
                        <a href="{{ route('sale_user.validate.finance.index') }}"
                            class="text-blue-600 font-normal hover:underline">validar finanzas</a>
                    </li>
                </ul>
            </div>
        </div>
    </x-slot>
    <livewire:dashboard-admin.sales-users.validate-finance-edit :sale="$sale" />
</x-app>
