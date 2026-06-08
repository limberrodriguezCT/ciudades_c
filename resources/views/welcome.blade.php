<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Circuitos Creativos - Red Nacional de Ciudades Creativas</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-50 dark:bg-[#0f172a] text-gray-900 dark:text-gray-100 selection:bg-indigo-500 selection:text-white flex flex-col min-h-screen">

    <header class="fixed w-full z-50 bg-white/80 dark:bg-[#0f172a]/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-500/30">
                        NC
                    </div>
                    <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">Nica<span class="text-indigo-600 dark:text-indigo-400">Creativa</span></span>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="#inicio" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Inicio</a>
                    <a href="#acerca" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Acerca de</a>
                    <a href="#ciudades" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Ciudades</a>
                    <a href="#agenda" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Agenda Cultural</a>
                </nav>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Panel de Control</a>
                        @else
                            <a href="{{ route('login') }}" class="hidden sm:block text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Acceder</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-xl font-semibold text-sm hover:bg-gray-800 dark:hover:bg-gray-100 transition shadow-md">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <section id="inicio" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
            <div class="absolute inset-0 -z-10">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-100 via-transparent to-transparent dark:from-indigo-900/20"></div>
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-gray-200 dark:via-gray-800 to-transparent"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-sm font-semibold mb-6 border border-indigo-100 dark:border-indigo-800/50">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    10 Ciudades Creativas
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-8 leading-tight">
                    Red Nacional de <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Ciudades Creativas</span>
                </h1>
                
                <p class="mt-4 text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mb-10 leading-relaxed">
                    Un viaje por la identidad, el talento y la cultura nicaragüense. Descubre los circuitos turísticos, apoya el talento de nuestros emprendedores y sumérgete en experiencias comunitarias únicas.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#ciudades" class="inline-flex items-center justify-center px-8 py-4 bg-indigo-600 text-white rounded-xl font-bold text-sm uppercase tracking-wider hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/30 hover:-translate-y-0.5">
                        Explorar Destinos
                    </a>
                    <a href="#agenda" class="inline-flex items-center justify-center px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white border border-gray-200 dark:border-gray-700 rounded-xl font-bold text-sm uppercase tracking-wider hover:bg-gray-50 dark:hover:bg-gray-700 transition hover:-translate-y-0.5 shadow-sm">
                        Ver Agenda
                    </a>
                </div>
            </div>
        </section>

        <section id="acerca" class="py-20 bg-white dark:bg-[#0f172a]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">Desarrollo Sostenible a través del Talento y la Cultura</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                            La Red Nacional de Ciudades Creativas forma parte del modelo de desarrollo social, económico y cultural que impulsa la Comisión Nacional de Economía Creativa. Nuestro objetivo es consolidar los sectores productivos promoviendo la diversidad cultural de nuestro pueblo.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
                            A través de circuitos creativos, integramos la agroindustria, el turismo, el patrimonio y las artes, empoderando a las MiPymes y facilitando herramientas digitales para conectar de manera directa con visitantes nacionales e internacionales.
                        </p>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div class="border-l-4 border-indigo-500 pl-4">
                                <span class="block text-3xl font-bold text-gray-900 dark:text-white">10</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">Ciudades Creativas</span>
                            </div>
                            <div class="border-l-4 border-purple-500 pl-4">
                                <span class="block text-3xl font-bold text-gray-900 dark:text-white">+100</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">Circuitos e Iniciativas</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-3xl transform rotate-3 opacity-20 dark:opacity-40 blur-lg"></div>
                        <div class="relative bg-gray-100 dark:bg-gray-800 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 shadow-xl overflow-hidden aspect-[4/3] flex items-center justify-center">
                            <svg class="w-32 h-32 text-indigo-300 dark:text-indigo-700/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ciudades" class="py-20 bg-gray-50 dark:bg-gray-800/30 border-y border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Descubre Nuestras Ciudades</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Cada ciudad posee una identidad única plasmada en su historia, gastronomía, y el talento invaluable de sus artesanos.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($cities as $city)
                        <div class="group bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 flex flex-col h-full">
                            <div class="relative h-56 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                @if($city->cover_image)
                                    <img src="{{ Storage::url($city->cover_image) }}" alt="{{ $city->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-600/20 group-hover:scale-105 transition-transform duration-500"></div>
                                    <div class="absolute inset-0 flex items-center justify-center text-indigo-400">
                                        <svg class="w-16 h-16 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-900/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-indigo-600 dark:text-indigo-400">
                                    Ciudad Creativa
                                </div>
                            </div>
                            <div class="p-8 flex-grow flex flex-col">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $city->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-6 flex-grow line-clamp-3">
                                    {{ $city->description ?: 'Descubre los circuitos creativos, el patrimonio histórico y las experiencias turísticas que esta ciudad tiene para ofrecer.' }}
                                </p>
                                <a href="#" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-semibold hover:text-indigo-800 dark:hover:text-indigo-300 transition group-hover:gap-2 gap-1">
                                    Ver circuito interactivo
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center bg-white dark:bg-gray-800 border border-dashed border-gray-300 dark:border-gray-600 rounded-3xl">
                            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-1">Aún no hay ciudades registradas</h3>
                            <p class="text-gray-500">Las ciudades creativas se cargarán en breve.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="agenda" class="py-20 bg-white dark:bg-[#0f172a]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Agenda y Eventos</h2>
                        <p class="text-gray-600 dark:text-gray-400">Mantente al tanto de presentaciones, talleres, ferias y expo-ventas impulsadas por nuestros emprendedores locales.</p>
                    </div>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        Ver calendario completo
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($events as $event)
                        <div class="group flex flex-col sm:flex-row bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700 hover:border-indigo-500/50 hover:shadow-lg transition duration-300">
                            <div class="w-full sm:w-32 bg-indigo-50 dark:bg-gray-900/50 flex flex-col items-center justify-center p-6 border-b sm:border-b-0 sm:border-r border-gray-100 dark:border-gray-700 text-center">
                                <span class="text-xs font-bold text-indigo-500 uppercase tracking-widest mb-1">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}</span>
                                <span class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                            </div>
                            <div class="p-6 flex-1 flex flex-col justify-center">
                                <div class="flex items-center gap-2 text-xs font-medium text-gray-500 dark:text-gray-400 mb-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $event->city->name ?? 'Múltiples locaciones' }}
                                    @if($event->location_details)
                                        <span class="truncate"> - {{ $event->location_details }}</span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $event->title }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">{{ $event->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center bg-gray-50 dark:bg-gray-800/50 rounded-2xl border border-dashed border-gray-200 dark:border-gray-700">
                            <svg class="mx-auto w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-gray-500 font-medium">Actualmente no hay eventos programados en la agenda.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-900 text-white pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center font-bold text-xl">
                            NC
                        </div>
                        <span class="font-bold text-2xl tracking-tight">Nica<span class="text-indigo-400">Creativa</span></span>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-md">
                        Plataforma digital para la promoción de la Red Nacional de Ciudades Creativas. Impulsamos el desarrollo sostenible a través de la cultura, la innovación y el talento de nuestros emprendedores.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-6">Enlaces Rápidos</h4>
                    <ul class="space-y-3">
                        <li><a href="#inicio" class="text-gray-400 hover:text-white transition">Inicio</a></li>
                        <li><a href="#acerca" class="text-gray-400 hover:text-white transition">Acerca del Programa</a></li>
                        <li><a href="#ciudades" class="text-gray-400 hover:text-white transition">Ciudades Creativas</a></li>
                        <li><a href="#agenda" class="text-gray-400 hover:text-white transition">Agenda Cultural</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-6">Accesos</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition">Iniciar Sesión</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition">Registrar Emprendimiento</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Soporte Técnico</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Red Nacional de Ciudades Creativas. Todos los derechos reservados.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-white transition">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white transition">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>