<!-- jQuery y dependencias -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#formulario').validate({
        rules: {
            nombre: { required: true, minlength: 3 },
            email: { required: true, email: true },
            mensaje: { required: true, minlength: 10 }
        },
        messages: {
            nombre: {
                required: "Por favor, ingresa tu nombre",
                minlength: "El nombre debe tener al menos 3 caracteres"
            },
            email: {
                required: "Por favor, ingresa tu correo",
                email: "Ingresa un correo válido"
            },
            mensaje: {
                required: "Por favor, escribe un mensaje",
                minlength: "El mensaje debe tener al menos 10 caracteres"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function (form) {
            $.ajax({
                url: '{{ url("/guardar") }}',
                method: 'POST',
                data: $(form).serialize(),
                success: function (res) {
                    if (res.success) {
                        $('#respuesta').html('<div class="alert alert-success">Mensaje guardado exitosamente.</div>');
                        form.reset();
                        $('.form-control').removeClass('is-invalid');

                        $.get('{{ url("/actualizar-mensajes-json") }}')
                            .done(() => console.log('mensajes.json actualizado correctamente.'))
                            .fail(() => console.error('No se pudo actualizar mensajes.json'));
                    } else {
                        $('#respuesta').html('<div class="alert alert-danger">Error al guardar el mensaje.</div>');
                    }
                },
                error: function (xhr) {
                    let mensaje = '<div class="alert alert-danger"><ul>';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            mensaje += '<li>' + value[0] + '</li>';
                        });
                    } else {
                        mensaje += '<li>Error del servidor.</li>';
                    }
                    mensaje += '</ul></div>';
                    $('#respuesta').html(mensaje);
                }
            });
        }
    });
});
</script>
