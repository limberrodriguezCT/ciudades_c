<x-guest-layout>
    <div x-data="{ step: 1, role: '' }" class="w-full max-w-2xl mx-auto p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Campo oculto para enviar el rol al controlador -->
            <input type="hidden" name="role" x-model="role">

            <!-- PASO 1: Selección de Rol -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">Descubra Nicaragua</h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Seleccione cómo desea unirse a nuestra plataforma de Ciudades Creativas.</p>
                </div>
                
                <div class="space-y-4">
                    <button type="button" @click="role = 'turista'; step = 2" class="w-full border-2 border-gray-200 dark:border-gray-700 rounded-xl p-5 text-left hover:border-indigo-600 dark:hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition group">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-indigo-700 dark:group-hover:text-indigo-400">Turista</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Deseo explorar destinos, circuitos y la agenda cultural.</p>
                    </button>

                    <button type="button" @click="role = 'emprendedor'; step = 2" class="w-full border-2 border-gray-200 dark:border-gray-700 rounded-xl p-5 text-left hover:border-indigo-600 dark:hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition group">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-indigo-700 dark:group-hover:text-indigo-400">Emprendedor</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Deseo registrar mis servicios y negocios locales en los circuitos.</p>
                    </button>
                </div>

                <div class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                    ¿Ya tiene una cuenta? <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500">Inicie sesión aquí</a>
                </div>
            </div>

            <!-- PASO 2: Credenciales de Acceso -->
            <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                <button type="button" @click="step = 1" class="text-sm font-semibold text-gray-500 hover:text-indigo-600 mb-6 flex items-center gap-1 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Volver
                </button>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Datos de su cuenta</h2>
                
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre Completo *</label>
                        <input type="text" name="name" :required="step === 2" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. Juan Pérez">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo Electrónico *</label>
                        <input type="email" name="email" :required="step === 2" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="correo@ejemplo.com">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Contraseña *</label>
                            <input type="password" name="password" :required="step === 2" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirmar Contraseña *</label>
                            <input type="password" name="password_confirmation" :required="step === 2" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>
                    
                    <button type="button" @click="step = 3" class="w-full bg-indigo-600 text-white rounded-xl p-3 mt-4 font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                        Continuar
                    </button>
                </div>
            </div>

            <!-- PASO 3: Información Adicional -->
            <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                <button type="button" @click="step = 2" class="text-sm font-semibold text-gray-500 hover:text-indigo-600 mb-6 flex items-center gap-1 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Volver
                </button>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2" x-text="role === 'emprendedor' ? 'Perfil de Emprendedor' : 'Perfil de Turista'"></h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Complete estos últimos detalles para finalizar su registro.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Número de Teléfono</label>
                        <input type="text" name="phone" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. +505 8888 8888">
                    </div>
                    
                    <div x-show="role === 'emprendedor'">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cédula de Identidad *</label>
                        <input type="text" name="identification" :required="role === 'emprendedor' && step === 3" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Cédula del responsable">
                    </div>
                    
                    <div x-show="role === 'turista'" class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">País de Procedencia</label>
                        <input type="text" name="country" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. Nicaragua">
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-indigo-600 text-white rounded-xl p-3 font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                        Finalizar Registro
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>