<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('registroValidacion', (config) => ({
            step: config.step,
            role: config.role,
            name: config.name,
            email: config.email,
            password: '',
            password_confirmation: '',
            identification: config.identification,

            validarPaso() {
                if (!this.name || !this.email || !this.password || !this.password_confirmation) {
                    this.mostrarAlerta('warning', 'Campos incompletos', 'Por favor, complete todos los datos obligatorios de la cuenta.');
                    return;
                }
                if (this.password.length < 8) {
                    this.mostrarAlerta('warning', 'Contraseña insegura', 'La contraseña debe contener un mínimo de 8 caracteres.');
                    return;
                }
                if (this.password !== this.password_confirmation) {
                    this.mostrarAlerta('error', 'Verifique su contraseña', 'Las contraseñas ingresadas no coinciden.');
                    return;
                }
                this.step = 3;
            },

            formatearCedula(e) {
                let val = e.target.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                if (val.length > 3) val = val.slice(0, 3) + '-' + val.slice(3);
                if (val.length > 10) val = val.slice(0, 10) + '-' + val.slice(10);
                if (val.length > 16) val = val.substring(0, 16);
                this.identification = val;
            },

            validarEnvio(e) {
                if (this.role === 'emprendedor') {
                    if (!this.identification) {
                        e.preventDefault();
                        this.mostrarAlerta('warning', 'Cédula requerida', 'La cédula de identidad es un dato obligatorio para crear un perfil de emprendedor.');
                        return;
                    }

                    const regex = /^\d{3}-\d{6}-\d{4}[A-Z]$/;
                    if (!regex.test(this.identification)) {
                        e.preventDefault();
                        this.mostrarAlerta('warning', 'Formato inválido', 'La cédula debe tener el formato exacto de 14 caracteres alfanuméricos separados por guiones (Ej. 000-000000-0000A).');
                    }
                }
            },

            mostrarAlerta(icono, titulo, texto) {
                Swal.fire({
                    icon: icono,
                    title: titulo,
                    text: texto,
                    confirmButtonColor: '#4f46e5',
                    background: '#1e293b',
                    color: '#ffffff',
                    customClass: { popup: 'rounded-2xl shadow-lg border border-gray-700' }
                });
            }
        }));
    });

    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->any())
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '<p style="margin-bottom: 0.35rem;">{{ $error }}</p>';
            @endforeach

            Swal.fire({
                icon: 'warning',
                title: 'Verifique los datos',
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