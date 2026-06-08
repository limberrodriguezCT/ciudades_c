<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Circuitos Creativos - Nicaragua</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50 dark:bg-[#0f172a] text-gray-900 dark:text-gray-100 selection:bg-indigo-500 selection:text-white">

    <nav class="absolute top-0 w-full z-50 bg-transparent py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
            NicaCreativa
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white transition px-4 py-2">Panel de Control</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white transition px-4 py-2">Acceder</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition ease-in-out shadow-lg shadow-indigo-500/30">Unirse</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-100 via-gray-50 to-gray-50 dark:from-indigo-900/20 dark:via-[#0f172a] dark:to-[#0f172a]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl sm:text-7xl font-bold tracking-tight text-gray-900 dark:text-white mb-6">
                Descubre las <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-600">Ciudades Creativas</span>
            </h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10">
                Conecta con la riqueza histórica, natural y tradicional de Nicaragua. Explora los circuitos, apoya a emprendedores locales y vive experiencias culturales auténticas.
            </p>
            <a href="#ciudades" class="inline-flex items-center justify-center px-8 py-4 bg-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 transition ease-in-out shadow-lg shadow-indigo-500/30">
                Iniciar el recorrido
            </a>
        </div>
    </div>

    <div id="ciudades" class="py-16 bg-white dark:bg-gray-800/50 border-t border-gray-100 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Red Nacional de Ciudades</h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Nuestros destinos llenos de cultura, arte y tradición.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($cities as $city)
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                        <div class="h-48 bg-indigo-50 dark:bg-indigo-900/30 w-full flex items-center justify-center text-indigo-300 dark:text-indigo-700">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $city->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($city->description, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-gray-500 dark:text-gray-400">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                        <p>Las ciudades creativas se están configurando en el sistema.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Agenda Cultural y Eventos</h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Participa en talleres, ferias y exposiciones de nuestros emprendedores.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($events as $event)
                    <div class="flex bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-28 bg-indigo-50 dark:bg-indigo-900/30 flex flex-col items-center justify-center border-r border-gray-100 dark:border-gray-700 p-4 text-indigo-600 dark:text-indigo-400">
                            <span class="text-3xl font-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                            <span class="text-sm uppercase font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}</span>
                        </div>
                        <div class="p-6 flex-1">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">{{ $event->title }}</h3>
                            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400 mb-2">{{ $event->city->name ?? 'Locación múltiple' }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($event->description, 80) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center text-gray-500 dark:text-gray-400 border border-dashed border-gray-300 dark:border-gray-700 rounded-2xl">
                        <p>La agenda de actividades se actualizará próximamente.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</body>
</html>