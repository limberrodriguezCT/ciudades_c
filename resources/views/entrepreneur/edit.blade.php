<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('entrepreneur.services.index') }}" class="text-gray-500 hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Editar Servicio: {{ $service->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-8">
                    <form action="{{ route('entrepreneur.services.update', $service->id) }}" method="POST" id="form-edit-{{ $service->id }}" enctype="multipart/form-data" novalidate onsubmit="confirmarActualizacion(event, {{ $service->id }})">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="city_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ciudad del Servicio</label>
                                <select id="city_id" name="city_id" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Seleccione la ciudad --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id', $service->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título del Negocio o Servicio</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Precio Promedio (C$)</label>
                                    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $service->price) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                
                                <div>
                                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono de Contacto</label>
                                    <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $service->contact_phone) }}" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción del Servicio</label>
                                <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $service->description) }}</textarea>
                            </div>

                            <div>
                                <label for="image_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Actualizar Fotografía</label>
                                <input type="file" id="image_path" name="image_path" accept="image/jpeg, image/png, image/jpg" class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300 dark:hover:file:bg-gray-600 transition-colors">
                            </div>

                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <label for="is_active" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Servicio Activo y Público</label>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-gray-100 dark:border-gray-700">
                            <a href="{{ route('entrepreneur.services.index') }}" class="px-5 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancelar
                            </a>
                            <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                                Actualizar Servicio
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarActualizacion(event, id) {
            event.preventDefault(); 
            
            Swal.fire({
                title: '¿Guardar los cambios?',
                text: "Se actualizará la información de este servicio.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar',
                background: '#1e293b',
                color: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl border border-gray-700'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-edit-' + id).submit(); 
                }
            })
        }

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
</x-app-layout>