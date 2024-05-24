$(document).ready(function() {
    obtenerPersonasJuridicas(); 
});

 function obtenerPersonasJuridicas() {
        $.ajax({
            url: 'obtenerPersonasJuridicas',
            type: 'GET',
            success: function(response) {
                // Limpiar opciones actuales del select
                $('#persona_juridica_id').empty();

                // Agregar opciones estáticas
                $('#persona_juridica_id').append($('<option>', {
                    value: '',
                    text: 'Selecciona un título'
                }));

                // Agregar nuevas opciones basadas en los datos recibidos
                $.each(response, function(index, res) {
                    $('#persona_juridica_id').append($('<option>', {
                        value: res.id,
                        text: res.razon_social
                    }));
                });
            },
            error: function() {
                console.log('Error al obtener las personas jurídicas.');
            }
        });
    }

