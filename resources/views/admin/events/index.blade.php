<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Agenda de Eventos Culturales') }}
            </h2>
            <a href="{{ route('admin.events.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                + Nuevo Evento
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900/50 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Promocional</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Título del Evento</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Ciudad</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Fecha y Hora</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($events as $event)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                    <td class="px-6 py-4">
                                        @if($event->image_path)
                                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Imagen de {{ $event->title }}" class="w-16 h-16 object-cover rounded-lg shadow-sm border border-gray-200 dark:border-gray-600">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-lg flex items-center justify-center text-gray-400 text-xs text-center shadow-sm">
                                                Sin foto
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $event->title }}
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate max-w-xs">{{ $event->location_details ?? 'Ubicación no especificada' }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        {{ $event->city->name ?? 'Ciudad no asignada' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 font-medium">
                                        {{ $event->event_date->format('d/m/Y h:i A') }}
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-3">
                                        <a href="{{ route('admin.events.edit', $event->id) }}" class="inline-block text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 font-medium transition-colors">
                                            Editar
                                        </a>
                                        
                                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline-block" id="form-delete-{{ $event->id }}" onsubmit="confirmarEliminacion(event, {{ $event->id }})">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 font-medium transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                        No hay eventos culturales registrados en el sistema por el momento.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarEliminacion(event, id) {
            event.preventDefault(); 
            
            Swal.fire({
                title: '¿Eliminar este evento?',
                text: "Esta acción borrará la actividad de la agenda de forma permanente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: '#1e293b',
                color: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl border border-gray-700'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit(); 
                }
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#1e293b',
                    color: '#ffffff',
                    iconColor: '#10b981',
                    customClass: {
                        popup: 'border border-gray-700 rounded-2xl shadow-lg'
                    }
                });
            @endif
        });
    </script>
</x-app-layout>