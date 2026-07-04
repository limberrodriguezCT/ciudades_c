<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.events.index') }}" class="text-gray-500 hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Registrar Nuevo Evento Cultural
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-8">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="city_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ciudad Sede</label>
                                <select id="city_id" name="city_id" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Seleccione la ciudad donde se realizará --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título del Evento</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. Feria Gastronómica y Artesanal">
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="event_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha y Hora</label>
                                    <input type="datetime-local" name="event_date" id="event_date" value="{{ old('event_date') }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('event_date')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="location_details" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Detalles de Ubicación (Opcional)</label>
                                    <input type="text" name="location_details" id="location_details" value="{{ old('location_details') }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. Parque Central, Frente a la Alcaldía">
                                    @error('location_details')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción de la Actividad</label>
                                <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Detalle qué presentaciones o atractivos tendrá el evento...">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="image_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fotografía Promocional (Opcional)</label>
                                <input type="file" id="image_path" name="image_path" accept="image/jpeg, image/png, image/jpg" class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300 dark:hover:file:bg-gray-600 transition-colors">
                                @error('image_path')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancelar
                            </a>
                            <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                                Guardar Evento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->any())
                let errorMessages = '';
                @foreach ($errors->all() as $error)
                    errorMessages += '<p style="margin-bottom: 0.25rem;">• {{ $error }}</p>';
                @endforeach

                Swal.fire({
                    icon: 'warning',
                    title: 'Revise la información',
                    html: `<div style="text-align: left; font-size: 0.95em;">${errorMessages}</div>`,
                    confirmButtonColor: '#4f46e5',
                    confirmButtonText: 'Entendido',
                    background: '#1e293b',
                    color: '#ffffff',
                    customClass: {
                        popup: 'border border-gray-700 rounded-2xl shadow-lg'
                    }
                });
            @endif
        });
    </script>
</x-app-layout