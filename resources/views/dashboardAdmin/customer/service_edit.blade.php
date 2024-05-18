<x-app>
    <x-slot name="header">
        <div class="w-full flex items-center justify-between">

            {{ __('Customers ') }}
            <div>
                <ul class='flex flex-wrap font-bold text-stone-500 max-w-6xl w-full mx-auto text-sm  space-x-2'>
                    <li class="breadcrumb-item max-w-64 truncate">
                        <a href="{{ route('customer.edit', ['code' => $user->code]) }}"
                            class="text-blue-600 font-normal hover:underline">Customers
                            edit</a>
                    </li>
                    <li class="breadcrumb-item max-w-64 truncate">
                        {{ $certificate->service->name }}
                    </li>
                </ul>
            </div>
        </div>

    </x-slot>

    <livewire:components.customer.services-customer-edit :user="$user" :certificate="$certificate" />
</x-app>
