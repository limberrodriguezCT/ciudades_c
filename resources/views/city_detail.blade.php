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
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2 hover:opacity-80 transition">
                        <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-600/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Volver al <span class="text-indigo-600 dark:text-indigo-400">Inicio</span></span>
                    </a>
                </div>
            </div>
        </nav>

        <header class="relative h-[50vh] bg-gray-900 flex items-end pb-12 overflow-hidden">
            @if($city->cover_image)
                <img src="{{ asset('storage/' . $city->cover_image) }}" alt="Portada de {{ $city->name }}" class="absolute inset-0 w-full h-full object-cover opacity-50">
            @else
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-gray-900 opacity-80"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-[#0f172a]/60 to-transparent"></div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <span class="inline-block py-1 px-3 rounded-full bg-indigo-600/80 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-indigo-400/30 backdrop-blur-sm">Circuito Oficial</span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight drop-shadow-xl">
                    {{ $city->name }}
                </h1>
            </div>
        </header>

        <section class="py-16 bg-white dark:bg-[#0f172a] border-b border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Acerca de este recorrido</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        {{ $city->description ?? 'Este circuito creativo resalta la identidad local, permitiendo a los visitantes explorar las raíces culturales y artísticas de la región.' }}
                    </p>
                </div>
            </div>
        </section>

        <main class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Puntos de Interés</h2>
                <div class="mt-2 w-16 h-1.5 bg-indigo-600 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($city->places as $place)
                    <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                        <div class="h-48 bg-gray-200 dark:bg-gray-700 relative">
                            @if($place->image_path)
                                <img src="{{ asset('storage/' . $place->image_path) }}" alt="{{ $place->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur text-indigo-600 dark:text-indigo-400 w-8 h-8 rounded-full flex items-center justify-center font-bold shadow">
                                {{ $loop->iteration }}
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ $place->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                {{ $place->description ?? 'Un espacio fundamental para el desarrollo del arte y la cultura en la comunidad.' }}
                            </p>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center bg-gray-50 dark:bg-gray-800/50 rounded-2xl border border-dashed border-gray-300 dark:border-gray-700">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Lugares en proceso de registro</h3>
                        <p class="mt-1 text-gray-500 dark:text-gray-400">Pronto estarán disponibles los puntos turísticos de este recorrido.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-20">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Ubicación del Circuito</h2>
                <div id="map" class="w-full h-96 bg-gray-200 dark:bg-gray-800 rounded-3xl overflow-hidden shadow-inner border border-gray-200 dark:border-gray-700 z-10"></div>
            </div>
        </main>

        <footer class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 mt-12 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} Ciudades Creativas. Todos los derechos reservados.
        </footer>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if($city->map_coordinates)
                    var coords = '{{ $city->map_coordinates }}'.split(',');
                    var map = L.map('map').setView([parseFloat(coords[0]), parseFloat(coords[1])], 14);
                @else
                    var map = L.map('map').setView([12.8654, -85.2072], 7);
                @endif

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                @foreach($city->places as $place)
                    @if($place->latitude && $place->longitude)
                        L.marker([{{ $place->latitude }}, {{ $place->longitude }}])
                        .addTo(map)
                        .bindPopup("<strong style='color:#4f46e5;'>{{ $place->name }}</strong><br>Atractivo del Circuito Creativo.");
                    @endif
                @endforeach
            });
        </script>
    </body>
</html>