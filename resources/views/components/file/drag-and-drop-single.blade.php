@props([
    'formats' => '',
    'max_size' => '',
    'showList' => 1,
    'accept' => '',
    'label' => null,
    'model' => 'file',
    'title' => 'imagen',
])

<div x-data="{ isUploading: false, isUploaded: false, progress: 0, files: null, selectedImage: null }" x-on:livewire-upload-start="isUploading = true; isUploaded = false"
    x-on:livewire-upload-finish="isUploading = false; isUploaded = true" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress" class="w-full space-y-3">

    @php
        $errorsClass = $errors->has($attributes['wire:model']) ? 'border-red-600' : '';
    @endphp

    @if ($label)
        <div class="text-sm font-semibold">{{ $label }}</div>
    @endif

    <div x-show="isUploaded" class="animate__animated animate__bounceInRight">
        Archivos cargados exitosamente
    </div>

    <div x-show="isUploading">
        <div class="flex justify-between mb-1 text-black">
            <span class="text-base font-medium">Subiendo archivos</span>
            <span class="text-sm font-medium" x-html="progress+'%'">0%</span>
        </div>
        <div class="w-full bg-gray-700 rounded-full h-2.5">
            <div class="bg-green-600 h-2.5 rounded-full" :style="`width: ${progress}%`"></div>
        </div>
    </div>

    <div class="flex flex-col flex-grow mb-3  bg-white cursor-pointer">
        <div id="FileUpload" class="block w-full relative appearance-none cursor-pointer">
            <input type="file" accept="{{ $accept }}"
                class="cursor-pointer absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                x-on:change="files = $event.target.files; selectedImage = URL.createObjectURL($event.target.files[0]);"
                x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')"
                x-on:drop="$el.classList.remove('active')" wire:model="{{ $model }}">

            <template x-if="files === null">
                <div
                    class="cursor-pointer flex flex-col space-y-2 items-center justify-center py-2 px-3 border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray {{ $errorsClass }}">
                    <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                    <p class="text-gray-700">{{ $slot }}</p>
                    <div class="flex flex-col items-center justify-center">
                        @if ($max_size)
                            <p class="text-sm">Tamaño máximo: {{ $max_size }}</p>
                        @endif
                        @if ($formats)
                            <p class="text-sm">Formatos válidos: {{ $formats }}</p>
                        @endif
                    </div>
                    <x-button href="javascript:void(0)" secondary="800" primary="500" class="px-4 py-2">
                        Seleccionar {{ $title }}
                    </x-button>
                </div>
            </template>

            <template x-if="selectedImage !== null">
                <img :src="selectedImage" alt="{{ $title }} seleccionada" class="w-full h-auto">
            </template>


        </div>

        <x-input-error for="{{ $model }}" class="mt-2"></x-input-error>

        @if ($showList)
            <template x-if="files !== null && files.length > 0">
                <div class="flex flex-col space-y-1 p-3 w-full">
                    <template x-for="(_,index) in Array.from({ length: files.length })">
                        <div class="flex flex-row items-center space-x-2">
                            <template x-if="files[index].type.includes('audio/')">
                                <i class="far fa-file-audio fa-fw"></i>
                            </template>
                            <template x-if="files[index].type.includes('application/')">
                                <i class="far fa-file-alt fa-fw"></i>
                            </template>
                            <template x-if="files[index].type.includes('image/')">
                                <i class="far fa-file-image fa-fw"></i>
                            </template>
                            <template x-if="files[index].type.includes('video/')">
                                <i class="far fa-file-video fa-fw"></i>
                            </template>
                            <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                        </div>
                    </template>
                </div>
            </template>
        @endif

    </div>
</div>
