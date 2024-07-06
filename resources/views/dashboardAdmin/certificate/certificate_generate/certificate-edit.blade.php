<x-app>
    <x-slot name="header">
        <div class="w-full flex items-center justify-between">
            {{ __('Certificate Generate') }}
            <div>
                <ul>
                <li class="breadcrumb-item max-w-64 truncate">
                        <a href="{{ route('generate.certificate', $certificate->id ) }}"
                            class="text-blue-600 font-normal hover:underline">Generar Certificado </a>
                    </li> 
                </ul>
                <ul class='flex flex-wrap font-bold text-stone-500 max-w-6xl w-full mx-auto text-sm  space-x-2'>
                    <li class="breadcrumb-item max-w-64 truncate">
                        <a href="{{ route('certificate.index') }}"
                            class="text-blue-600 font-normal hover:underline">Certificates </a>
                    </li>
                    <li class="breadcrumb-item max-w-64 truncate">
                        {{ $certificate->service->name }} 
                
                    </li>
                </ul>
            </div>
        </div>

    </x-slot>

    <livewire:dashboard-admin.certificate.certificateGenerate.certificategenerate :certificate="$certificate" />
</x-app>
