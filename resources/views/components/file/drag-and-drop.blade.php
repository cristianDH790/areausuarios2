<div x-data="{ isUploading: false, isUploaded: false, progress: 0, files: null }" x-on:livewire-upload-start="isUploading = true;isUploaded = false"
    x-on:livewire-upload-finish="isUploading = false;isUploaded = true" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress" class="w-full space-y-3">

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
    <div class="flex flex-col flex-grow mb-3  bg-white ">
        <div id="FileUpload" class="block w-full relative appearance-none ">
            <input type="file" multiple class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                x-on:change="files = $event.target.files;" x-on:dragover="$el.classList.add('active')"
                x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                wire:model="files">

            <template x-if="files === null">
                <div
                    class="cursor-pointer flex flex-col space-y-2 items-center justify-center py-2 px-3 border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                    <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                    <p class="text-gray-700">{{ $slot }}</p>
                    <a href="javascript:void(0)"
                        class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Seleccionar
                        archivos</a>
                </div>
            </template>
        </div>
        <template x-if="files !== null">
            <div class="flex flex-col space-y-1 p-3 w-full">
                <template x-for="(_,index) in Array.from({ length: files.length })">
                    <div class="flex flex-row items-center space-x-2">
                        <template x-if="files[index].type.includes('audio/')"><i
                                class="far fa-file-audio fa-fw"></i></template>
                        <template x-if="files[index].type.includes('application/')"><i
                                class="far fa-file-alt fa-fw"></i></template>
                        <template x-if="files[index].type.includes('image/')"><i
                                class="far fa-file-image fa-fw"></i></template>
                        <template x-if="files[index].type.includes('video/')"><i
                                class="far fa-file-video fa-fw"></i></template>
                        <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                    </div>
                </template>
            </div>
        </template>
    </div>
</div>
