<x-app>
    <x-slot name="header">
        <div class="w-full flex items-center justify-between">
            {{ __('Edit Exhibitors') }}
            <div>
                <ul class='flex flex-wrap font-bold text-stone-500 max-w-6xl w-full mx-auto text-sm  space-x-2'>
                    <li class="breadcrumb-item max-w-64 truncate">
                        <a href="{{ route('exhibitor.index') }}"
                            class="text-blue-600 font-normal hover:underline">Exhibitors</a>
                    </li>
                    <li class="breadcrumb-item max-w-64 truncate">
                        {{ $exhibitor->name }}
                    </li>
                </ul>
            </div>
        </div>
    </x-slot>
    <livewire:dashboard-admin.exhibitor.edit :exhibitor="$exhibitor" />
</x-app>
