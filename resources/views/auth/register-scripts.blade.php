<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('registroValidacion', (config) => ({
            step: config.step,
            role: config.role,
            name: config.name,
            email: config.email,
            phone: config.phone,
            password: '',
            password_confirmation: '',
            identification: config.identification,

            validarPaso() {
                // ... (mantiene su lógica actual de paso 1 y 2) ...
                if (!this.name || !this.email || !this.password || !this.password_confirmation) {
                    this.mostrarAlerta('warning', 'Campos incompletos', 'Complete los datos de la cuenta.');
                    return;
                }
                if (this.password.length < 8) {
                    this.mostrarAlerta('warning', 'Contraseña insegura', 'Mínimo 8 caracteres.');
                    return;
                }
                if (this.password !== this.password_confirmation) {
                    this.mostrarAlerta('error', 'Error', 'Las contraseñas no coinciden.');
                    return;
                }
                this.step = 3;
            },

            formatearCedula(e) { /* ... */ },
            formatearTelefono(e) { /* ... */ },

            validarEnvio(e) {
                // Validación estricta de teléfono
                if (!this.phone || !/^\+\d{1,4}\s\d{3,4}\s\d{4}$/.test(this.phone)) {
                    e.preventDefault();
                    this.mostrarAlerta('warning', 'Teléfono inválido', 'El campo teléfono es obligatorio y debe tener el formato: +505 XXXX XXXX.');
                    return;
                }

                if (this.role === 'emprendedor') {
                    if (!this.identification || !/^\d{3}-\d{6}-\d{4}[A-Z]$/.test(this.identification)) {
                        e.preventDefault();
                        this.mostrarAlerta('warning', 'Cédula inválida', 'La cédula es obligatoria y debe seguir el formato: 000-000000-0000A.');
                    }
                }
            },

            mostrarAlerta(icono, titulo, texto) {
                Swal.fire({
                    icon: icono, title: titulo, text: texto,
                    confirmButtonColor: '#4f46e5', background: '#1e293b', color: '#ffffff',
                    customClass: { popup: 'rounded-2xl shadow-lg border border-gray-700' }
                });
            }
        }));
    });
</script>