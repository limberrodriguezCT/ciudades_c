<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $city->name }} - Circuito Creativo</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-[#0f172a] text-gray-900 dark:text-gray-100">
        
        <nav class="w-full z-50 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-sm relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex-shrink-0 flex items-center gap-2">
                        <a href="{{ url('/') }}" class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-600/30">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            </div>
                            <span class="text-xl font-extrabold tracking-tight text-gray-900 dark:text-white ml-2">Volver a <span class="text-indigo-600 dark:text-indigo-400">Destinos</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="relative bg-indigo-900 py-24 overflow-hidden">
            @if($city->cover_image)
                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('{{ asset('storage/' . $city->cover_image) }}');"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] to-transparent"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-4 drop-shadow-xl">
                    Circuito Creativo de {{ $city->name }}
                </h1>
                <p class="mt-4 text-xl text-gray-300 max-w-3xl mx-auto font-medium leading-relaxed drop-shadow-md">
                    {{ $city->description }}
                </p>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl shadow-gray-200/50 dark:shadow-none overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="p-8 border-b border-gray-100 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Mapa Interactivo del Circuito</h2>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Navegue por el mapa para descubrir los atractivos turísticos, talleres y espacios creativos habilitados en esta zona.</p>
                </div>
                
                <div id="map" class="w-full h-[500px] z-10"></div>
            </div>
        </main>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var map = L.map('map').setView([12.8654, -85.2072], 7);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Aquí iteraremos sobre los lugares turísticos enviados desde el controlador
                // Ejemplo de marcador dinámico:
                // @foreach($city->places as $place)
                //     @if($place->latitude && $place->longitude)
                //         L.marker([{{ $place->latitude }}, {{ $place->longitude }}])
                //          .addTo(map)
                //          .bindPopup("<b>{{ $place->name }}</b><br>Atractivo del Circuito Creativo.");
                //     @endif
                // @endforeach
            });
        </script>
    </body>
</html>