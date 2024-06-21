$('#actualizarFondo').click(function() {
    var formData = new FormData(document.getElementById("frmUpdate"));
    var url = formData.get('url');

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: url, 
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response, status, xhr) {
            if (xhr.status === 200) {
                if (response.success) {
                    $('#frmUpdate')[0].reset();
                    $('#editarFondoModal').modal('hide');
                    $('#mensajeExito').text(response.message).show();
                    listarEdicionFondos();
                    $('#collapseThree').collapse('hide'); 
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
});
