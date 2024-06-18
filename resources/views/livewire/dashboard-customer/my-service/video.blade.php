<div class="max-w-7xl mx-auto py-5 px-2 sm:px-6 lg:px-8 space-y-3">
    <div class="bg-white shadow-lg rounded-lg py-3 px-2 sm:flex  sm:justify-between items-center w-full">
        <h1 class="font-bold uppercase">{{ $service->name }} / modulo: {{ $module->title }}</h1>
        <h1 class="font-bold uppercase sm:text-end text-start">{{ $service->hours }}</h1>
    </div>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <div class="bg-white shadow-lg p-4 flex">
        <div class="w-3/4 p-2">
            <div id="videoPlayer" class="relative" style="padding-top: 56.25%;">
                <iframe id="vimeoPlayer"
                    src="https://player.vimeo.com/video/{{ $module->video->url }}?badge=0&autopause=0&player_id=0&app_id=58479"
                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                    class="absolute top-0 left-0 w-full h-full" title="video prueba"></iframe>
            </div>
        </div>
        <div class="w-1/4 p-2 space-y-2">
            <div class="border-2 border-dashed p-2">
                <h1 class="text-start font-bold text-lg">Informacion del video:</h1>
                <p class="font-bold text-base ">Titulo: <span class="text-sm font-normal">{{ $service->name }}</span>
                </p>
                <p class="font-bold text-base ">Descripcion: <span
                        class="text-sm font-normal">{{ $service->little_description }}</span>
                </p>
            </div>
            <div class="border-2 border-dashed p-2 space-y-2">
                <h1 class="text-start font-bold text-lg">Siguientes Videos:</h1>

                @foreach ($filteredModules as $filteredModule)
                    <x-button
                        href="{{ route('my.service.customer.video', ['slug' => $service->slug, 'module' => $filteredModule->id]) }}"
                        class="bg-blue-500 px-4 py-2 hover:bg-blue-700 text-white inline-flex items-center w-full">
                        <i class="fas fa-play mr-2"></i>
                        <span class="">{{ $filteredModule->video->title }}</span>
                    </x-button>
                @endforeach
            </div>
        </div>

    </div>
    <div class="bg-white shadow-lg p-4 ">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 text-left" style="width: 10px">#</th>
                    <th class="py-3 px-4 text-left">Materiales de {{ $module->title }}</th>
                    </th>
                    <th class="py-3 px-4 text-left" style="width: 40px"></th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($module->materials as $material)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4 text-left">{{ $loop->index + 1 }}</td>
                        <td class="py-3 px-4 text-left">{{ $material->title }}</td>
                        <td class="py-3 px-4 text-left"><a target="_blank" href="{{ $material->url }}"
                                class="text white bg-yellow-500 py-2 px-2.5 rounded-md"> <i
                                    class="mdi mdi-download text-white"></i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <div class="bg-white shadow-lg p-4 ">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 text-left" style="width: 10px">#</th>
                    <th class="py-3 px-4 text-left">Audio de {{ $module->title }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-4 text-left">1</td>
                    <td class="py-3 px-4 text-left">
                        <audio controls class="w-full">
                            <source src="{{ $module->video->audio }}" type="audio/mpeg">
                            Tu navegador no soporta el elemento de audio.
                        </audio>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
    {{-- <div class="bg-white shadow-lg p-4">
        <div id="videoPlayer" class="relative" style="padding-top: 56.25%;">
            <iframe id="vimeoPlayer"
                src="https://player.vimeo.com/video/948928849?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                class="absolute top-0 left-0 w-full h-full" title="video prueba"></iframe>
        </div>
    </div> --}}
    {{-- <div class="bg-white shadow-lg">
        <div class="container mx-auto mt-8">
            <!-- Reproductor de Video -->
            <div class="bg-white shadow-lg p-4">
                <div id="videoPlayer" class="relative" style="padding-top: 56.25%;">
                    <iframe id="vimeoPlayer"
                        src="https://player.vimeo.com/video/948928849?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                        class="absolute top-0 left-0 w-full h-full" title="video prueba"></iframe>
                </div>
            </div>

            <!-- Lista de Reproducción -->
            <div class="bg-white shadow-lg p-4 mt-4">
                <h2 class="text-xl font-bold mb-4">Lista de Reproducción</h2>
                <ul id="playlist" class="space-y-4">
                    <li class="cursor-pointer hover:bg-gray-200 p-2" data-video-id="948928849">Video 1</li>
                    <li class="cursor-pointer hover:bg-gray-200 p-2" data-video-id="948959631">Video 2</li>
                    <!-- Añade más videos aquí -->
                </ul>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var vimeoPlayer = new Vimeo.Player(document.querySelector('#vimeoPlayer'));

                // Ajustar el volumen
                vimeoPlayer.setVolume(0);

                // Evento para la lista de reproducción
                var playlist = document.getElementById('playlist');
                playlist.addEventListener('click', function(event) {
                    var videoId = event.target.getAttribute('data-video-id');
                    if (videoId) {
                        vimeoPlayer.loadVideo(videoId).then(function() {
                            console.log('Reproduciendo video ' + videoId);
                        }).catch(function(error) {
                            console.error('Error al cargar el video', error);
                        });
                    }
                });
            });
        </script>
    </div> --}}

</div>
