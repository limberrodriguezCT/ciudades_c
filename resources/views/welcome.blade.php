<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ciudades Creativas - Nicaragua</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-[#0f172a] text-gray-900 dark:text-gray-100">
        
        <nav class="w-full z-50 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex-shrink-0 flex items-center gap-2">
                        <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-600/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Ciudades<span class="text-indigo-600 dark:text-indigo-400">Creativas</span></span>
                    </div>
                    
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="#inicio" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Inicio</a>
                        <a href="#descubre" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Descubrir</a>
                        <a href="#destinos" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Destinos</a>
                        
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 transition">
                                    {{ Auth::user()->role === 'admin' ? 'Panel de Administración' : 'Mi Panel' }}
                                </a>
                            @else
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-sm font-bold rounded-xl shadow-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition">Iniciar Sesión</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 transition">Registrarse</a>
                                    @endif
                                </div>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <header id="inicio" class="relative bg-gradient-to-br from-indigo-900 via-gray-900 to-[#0f172a] py-32 overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-8 drop-shadow-xl">
                    Nicaragua, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Tierra de Creadores</span>
                </h1>
                <p class="mt-4 text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto font-medium leading-relaxed">
                    Un viaje a través de la identidad, el arte y la innovación de nuestros pueblos. Descubra los circuitos que mantienen viva nuestra cultura.
                </p>
                <div class="mt-12 flex flex-col sm:flex-row justify-center gap-6">
                    <a href="#destinos" class="px-8 py-4 bg-indigo-600 text-white text-lg font-bold rounded-2xl shadow-xl shadow-indigo-600/40 hover:-translate-y-1 hover:bg-indigo-700 transition-all duration-300">
                        Explorar Destinos
                    </a>
                    <a href="#descubre" class="px-8 py-4 bg-white/10 text-white text-lg font-bold rounded-2xl border border-white/20 backdrop-blur-sm hover:bg-white/20 transition-all duration-300">
                        Conocer Más
                    </a>
                </div>
            </div>
        </header>

        <section id="descubre" class="py-24 bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">¿Qué es una Ciudad Creativa?</h2>
                    <div class="mt-4 w-24 h-1.5 bg-indigo-600 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-50 dark:bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner border border-indigo-100 dark:border-gray-700">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Patrimonio Histórico</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Espacios que preservan la memoria arquitectónica y las tradiciones ancestrales, transmitiéndolas de generación en generación.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-50 dark:bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner border border-indigo-100 dark:border-gray-700">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Talento Local</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Comunidades que impulsan la economía local a través de la destreza en la artesanía, la gastronomía y el emprendimiento innovador.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-50 dark:bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner border border-indigo-100 dark:border-gray-700">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Circuitos Conectados</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Rutas estratégicas diseñadas para brindar al turista una inmersión total en la dinámica artística y productiva de cada región.</p>
                    </div>
                </div>
            </div>
        </section>

        <main id="destinos" class="max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8 scroll-mt-20">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">Circuitos Habilitados</h2>
                <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">Seleccione un destino para conocer sus atractivos principales.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($cities as $city)
                    <article class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl shadow-gray-200/50 dark:shadow-none overflow-hidden hover:-translate-y-2 transition-transform duration-300 border border-gray-100 dark:border-gray-700 flex flex-col h-full group">
                        
                        <div class="relative h-64 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                            @if($city->cover_image)
                                <img src="{{ asset('storage/' . $city->cover_image) }}" alt="Fotografía de {{ $city->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-gray-800">
                                    <svg class="w-16 h-16 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="text-sm font-medium">Imagen no disponible</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/20 to-transparent"></div>
                            <h3 class="absolute bottom-6 left-6 right-6 text-2xl font-bold text-white drop-shadow-md">{{ $city->name }}</h3>
                        </div>
                        
                        <div class="p-8 flex-grow flex flex-col bg-white dark:bg-gray-800">
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-8 line-clamp-4">
                                {{ $city->description ?? 'Una joya cultural esperando ser explorada por visitantes de todo el mundo.' }}
                            </p>
                            
                            <div class="mt-auto">
                                <a href="{{ route('public.city.show', $city->id) }}" class="inline-flex items-center justify-center w-full px-6 py-3 bg-gray-50 dark:bg-gray-900 text-indigo-600 dark:text-indigo-400 font-bold rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-indigo-50 dark:hover:bg-gray-700 transition-colors">
                                    Explorar Circuito 
                                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-24 bg-gray-50 dark:bg-gray-800/50 rounded-3xl border border-dashed border-gray-300 dark:border-gray-700 text-center">
                        <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="h-10 w-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Plataforma en Preparación</h3>
                        <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">Estamos configurando los circuitos creativos. Muy pronto podrá visualizar los destinos turísticos habilitados en esta sección.</p>
                    </div>
                @endforelse
            </div>
        </main>

        <footer class="bg-gray-900 border-t border-gray-800 pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12 text-center md:text-left">
                    <div>
                        <div class="flex items-center justify-center md:justify-start gap-2 mb-6">
                            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <span class="text-xl font-extrabold tracking-tight text-white">Ciudades<span class="text-indigo-400">Creativas</span></span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Promoviendo la cultura, el arte y la innovación a través de circuitos turísticos que fortalecen el desarrollo de cada zona.
                        </p>
                    </div>
                    
                    <div>
                        <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">Enlaces Rápidos</h4>
                        <ul class="space-y-4 text-gray-400 text-sm font-medium">
                            <li><a href="#inicio" class="hover:text-indigo-400 transition">Inicio</a></li>
                            <li><a href="#descubre" class="hover:text-indigo-400 transition">Acerca del Proyecto</a></li>
                            <li><a href="#destinos" class="hover:text-indigo-400 transition">Circuitos Disponibles</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">Plataforma</h4>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6">
                            Acceso para la gestión de contenidos y registro de nuevos usuarios en la plataforma.
                        </p>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-6 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-lg shadow hover:bg-indigo-700 transition">
                                {{ Auth::user()->role === 'admin' ? 'Ir al Panel Administrativo' : 'Ir a Mi Panel' }}
                            </a>
                        @else
                            <div class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start">
                                <a href="{{ route('login') }}" class="inline-block px-6 py-2.5 bg-gray-800 text-white text-sm font-bold rounded-lg border border-gray-700 hover:bg-gray-700 transition text-center">Ingresar al Sistema</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-block px-6 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-lg shadow hover:bg-indigo-700 transition text-center">Registrarse</a>
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>
                
                <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
                    <p class="text-gray-500 text-sm">
                        &copy; {{ date('Y') }} Ciudades Creativas. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </footer>

    </body>
</html>