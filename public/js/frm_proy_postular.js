$(document).ready(function() {
    $('#etapa_1').show();
    function formatNumberWithDots(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function formatInputField() {
        $(this).val(function(index, value) {
        return formatNumberWithDots(value.replace(/\./g, ''));
        });
    }
    
    $('.miles').on('input', formatInputField);
    obtenerPersonasJuridicas(); 
});

function handlePaste(e) {
    var clipboardData, pastedData;

    // Access the clipboard data
    clipboardData = e.clipboardData || window.clipboardData;
    pastedData = clipboardData.getData('Text');

    // If the pasted data is not a number, prevent the paste action
    if (isNaN(pastedData)) {
        e.preventDefault();
    }
}

function formatRut(cliente) {
  cliente.value = cliente.value
    .replace(/[^0-9kK]/g, '') // Elimina todo excepto números y la letra 'k' o 'K'
    .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4'); // Agrega puntos y guión en el formato estándar
}

function btn_volver(id) {

               if(id==1){
                    $('#etapa_2').hide();
                    $('#etapa_3').hide();
                    $('#etapa_4').hide();
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et3").removeClass("btn-info");
                    $("#bt_et4").removeClass("btn-info");    
                    $("#bt_et1").addClass("btn-info");
                    $('#etapa_1').show();
                }
                if(id==2){
                    $('#etapa_1').hide();
                    $('#etapa_3').hide();
                    $('#etapa_4').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et3").removeClass("btn-info");
                    $("#bt_et4").removeClass("btn-info");    
                    $("#bt_et2").addClass("btn-info");
                    $('#etapa_2').show();
                }

                if(id==3){
                    $('#etapa_1').hide();
                    $('#etapa_2').hide();
                    $('#etapa_4').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et4").removeClass("btn-info");    
                    $("#bt_et3").addClass("btn-info");
                    $('#etapa_3').show();
                }
   
}
    
function validarFrmProy(id) {

    var formData = new FormData(document.getElementById("frm_proy"));
    formData.append("id", id);
    var id=id;

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: 'validarFrmProy',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
   success: function(response, textStatus, xhr) {
        if (xhr.status === 200) {
            // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
            if (response.success) {

                if(id==1){
                    $('#etapa_1').hide();
                    $('#etapa_3').hide();
                    $('#etapa_4').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et3").removeClass("btn-info");
                    $("#bt_et4").removeClass("btn-info");    
                    $("#bt_et2").addClass("btn-info");
                    $('#etapa_2').show();
                }
                if(id==2){
                    $('#etapa_1').hide();
                    $('#etapa_2').hide();
                    $('#etapa_4').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et4").removeClass("btn-info");    
                    $("#bt_et3").addClass("btn-info");
                    $('#etapa_3').show();
                }

                 if(id==4){
                    $('#etapa_1').hide();
                    $('#etapa_2').hide();
                    $('#etapa_4').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et4").removeClass("btn-info");    
                    $("#bt_et3").addClass("btn-info");
                    $('#etapa_3').show();
                }

                if (response.status) {
                    $('#frm_proy')[0].reset();
                    $('#etapa_1').show();
                    window.location.href = 'confirmacionProyecto';
                }

            } else {

                //alert(id);
                // Si la respuesta indica que hubo errores de validación, muestras los mensajes de error debajo de los campos correspondientes
                $.each(response.errors, function(key, value) {
                    // Encuentra el campo correspondiente al error y muestra el mensaje de error
                    $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                });
            }
        } else {
            console.error('Error en la solicitud:', xhr.status);
            // Aquí puedes manejar otros tipos de errores de solicitud si es necesario
        }
    },
    error: function(xhr, status, error) {
        console.error('Hubo un problema al enviar el formulario:', error);
    }
    });
}


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

