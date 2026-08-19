<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-indigo-600 overflow-hidden shadow-lg sm:rounded-3xl mb-8 relative border border-indigo-500">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="p-8 md:p-12 relative z-10 flex flex-col md:flex-row items-center justify-between">
                    <div class="text-white mb-6 md:mb-0">
                        <h3 class="text-3xl font-extrabold mb-3 tracking-tight">Bienvenido al Sistema</h3>
                        <p class="text-indigo-100 text-lg max-w-2xl leading-relaxed">Desde aquí podrá gestionar toda la información de los circuitos, registrar nuevos atractivos y mantener actualizada la agenda cultural de la Red Nacional de Ciudades Creativas.</p>
                    </div>
                    <div class="hidden md:block">
                        <svg class="w-28 h-28 text-indigo-300 opacity-50 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="mb-6 mt-10">
                <h3 class="text-xl font-bold text-gray-800">Accesos Rápidos</h3>
                <p class="text-gray-500 text-sm mt-1">Seleccione el módulo que desea administrar.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 border border-blue-100 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Ciudades Creativas</h4>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-grow">Administre los destinos principales, actualice las fotografías de portada y gestione la información general de cada circuito habilitado.</p>
                    <a href="{{ route('admin.cities.index') }}" class="inline-flex items-center text-blue-600 font-bold text-sm hover:text-blue-800 transition-colors mt-auto">
                        Gestionar Ciudades <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 border border-emerald-100 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Lugares Turísticos</h4>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-grow">Registre parques, museos, monumentos y atractivos específicos asociándolos directamente a sus respectivas ciudades.</p>
                    <a href="{{ route('admin.places.index') }}" class="inline-flex items-center text-emerald-600 font-bold text-sm hover:text-emerald-800 transition-colors mt-auto">
                        Gestionar Lugares <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 border border-purple-100 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Agenda Cultural</h4>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-grow">Programe ferias, talleres, exposiciones y actividades, asignando fechas precisas y ubicaciones para informar a los visitantes.</p>
                    <a href="{{ route('admin.events.index') }}" class="inline-flex items-center text-purple-600 font-bold text-sm hover:text-purple-800 transition-colors mt-auto">
                        Gestionar Eventos <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>