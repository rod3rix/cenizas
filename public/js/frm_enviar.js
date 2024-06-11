$(document).ready(function() {
    $('#cerrarCasoBtn').click(function(e) {
        e.preventDefault();
        $('#confirmModal').modal('show');
    });

    $('#confirmCierreBtn').click(function() {
        var formData = new FormData(document.getElementById("frmInsert"));
        var url = formData.get('url');
        var href = formData.get('href');

        $('form :input').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        $.ajax({
            url: url, 
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response, textStatus, xhr) {
                if (xhr.status === 200) {
                    if (response.success) {
                        $('#frmInsert')[0].reset();
                        alert(href);
                        window.location.href = href;
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
