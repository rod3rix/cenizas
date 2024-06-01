$(document).ready(function() {
    $('#cerrarFondoBtn').click(function(e) {
    e.preventDefault();
    $('#confirmModal').modal('show');
});

    $('#confirmCierreBtn').click(function() {
        var formData = new FormData(document.getElementById("frmCerrarFondo"));
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        $.ajax({
            url: 'cerrarFondo',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response, textStatus, xhr) {
                if (xhr.status === 200) {
                    if (response.success) {
                        $('#frmCerrarFondo')[0].reset();
                        window.location.href = '../confirmacionFondoAdmin';
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                        });
                    }
                } else {
                    console.error('Error en la solicitud:', xhr.status);

                }
            },
            error: function(xhr, status, error) {
            console.error('Hubo un problema al enviar el formulario:', error);
            }
        });
        $('#confirmModal').modal('hide');
    });
});