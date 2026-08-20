<x-guest-layout>
    <div x-data="registroValidacion({ 
        step: {{ $errors->any() ? (old('phone') !== null || old('identification') !== null || old('country') !== null ? 3 : 2) : 1 }}, 
        role: '{{ old('role', '') }}',
        name: '{{ old('name', '') }}',
        email: '{{ old('email', '') }}',
        identification: '{{ old('identification', '') }}'
    })" class="w-full p-8 md:p-12">
        <form method="POST" action="{{ route('register') }}" @submit="validarEnvio" novalidate>
            @csrf

            <input type="hidden" name="role" x-model="role">

            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">Descubra Nicaragua</h2>
                    <p class="mt-3 text-gray-500 dark:text-gray-400">Seleccione cómo desea unirse a nuestra plataforma de Ciudades Creativas.</p>
                </div>
                
                <div class="space-y-4">
                    <button type="button" @click="role = 'turista'; step = 2" class="w-full flex items-start gap-4 border-2 border-gray-100 dark:border-gray-700 rounded-2xl p-5 text-left hover:border-indigo-600 dark:hover:border-indigo-500 hover:bg-indigo-50/50 dark:hover:bg-indigo-900/20 transition group">
                        <div class="flex-shrink-0 w-12 h-12 bg-gray-50 dark:bg-gray-800 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/50 rounded-xl flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-indigo-600 dark:group-hover:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-indigo-700 dark:group-hover:text-indigo-400 transition-colors">Turista</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 leading-relaxed">Deseo explorar destinos, circuitos y la agenda cultural.</p>
                        </div>
                    </button>

                    <button type="button" @click="role = 'emprendedor'; step = 2" class="w-full flex items-start gap-4 border-2 border-gray-100 dark:border-gray-700 rounded-2xl p-5 text-left hover:border-indigo-600 dark:hover:border-indigo-500 hover:bg-indigo-50/50 dark:hover:bg-indigo-900/20 transition group">
                        <div class="flex-shrink-0 w-12 h-12 bg-gray-50 dark:bg-gray-800 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/50 rounded-xl flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-indigo-600 dark:group-hover:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-indigo-700 dark:group-hover:text-indigo-400 transition-colors">Emprendedor</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 leading-relaxed">Deseo registrar mis servicios y negocios locales en los circuitos.</p>
                        </div>
                    </button>
                </div>

                <div class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                    ¿Ya tiene una cuenta? <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500 transition-colors">Inicie sesión aquí</a>
                </div>
            </div>

            <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                <button type="button" @click="step = 1" class="text-sm font-semibold text-gray-500 hover:text-indigo-600 mb-8 flex items-center gap-1 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Volver
                </button>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Datos de su cuenta</h2>
                
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre Completo *</label>
                        <input type="text" name="name" x-model="name" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. Juan Pérez">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo Electrónico *</label>
                        <input type="email" name="email" x-model="email" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="correo@ejemplo.com">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Contraseña *</label>
                            <input type="password" name="password" x-model="password" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirmar Contraseña *</label>
                            <input type="password" name="password_confirmation" x-model="password_confirmation" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <button type="button" @click="validarPaso()" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Continuar
                        </button>
                    </div>
                </div>
            </div>

            <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                <button type="button" @click="step = 2" class="text-sm font-semibold text-gray-500 hover:text-indigo-600 mb-8 flex items-center gap-1 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> Volver
                </button>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2" x-text="role === 'emprendedor' ? 'Perfil de Emprendedor' : 'Perfil de Turista'"></h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Complete estos últimos detalles para finalizar su registro.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Número de Teléfono</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="+505 8888 8888">
                    </div>
                    
                    <div x-show="role === 'emprendedor'">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cédula de Identidad *</label>
                        <input type="text" name="identification" x-model="identification" @input="formatearCedula" :required="role === 'emprendedor' && step === 3" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="000-000000-0000A">
                    </div>
                    
                    <div x-show="role === 'turista'" class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">País de Procedencia</label>
                        <select name="country" class="w-full bg-gray-50 dark:bg-gray-900 rounded-xl border-gray-200 dark:border-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="Nicaragua" {{ old('country') == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                            <option value="Costa Rica" {{ old('country') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                            <option value="Honduras" {{ old('country') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                            <option value="El Salvador" {{ old('country') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                            <option value="Guatemala" {{ old('country') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                            <option value="Panamá" {{ old('country') == 'Panamá' ? 'selected' : '' }}>Panamá</option>
                            <option value="México" {{ old('country') == 'México' ? 'selected' : '' }}>México</option>
                            <option value="Estados Unidos" {{ old('country') == 'Estados Unidos' ? 'selected' : '' }}>Estados Unidos</option>
                            <option value="España" {{ old('country') == 'España' ? 'selected' : '' }}>España</option>
                            <option value="Otro" {{ old('country') == 'Otro' ? 'selected' : '' }}>Otro País</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Finalizar Registro
                    </button>
                </div>
            </div>
        </form>
    </div>

    @include('auth.register-scripts')
</x-guest-layout>