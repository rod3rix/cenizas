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
});

function handlePaste(e) {
    var clipboardData, pastedData;
    clipboardData = e.clipboardData || window.clipboardData;
    pastedData = clipboardData.getData('Text');

    if (isNaN(pastedData)) {
        e.preventDefault();
    }
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
                $.each(response.errors, function(key, value) {
                    if(key === 'pueblo_originario') {
                    $('#pueblo_originario_si').addClass('is-invalid');
                    $('#pueblo_originario_no').addClass('is-invalid');
                    $('#v_pueblo_originario').after('<div class="invalid-feedback d-block">' + value + '</div>');
                    } else if (key === 'discapacidad') {
                        $('#discapacidad_si').addClass('is-invalid');
                        $('#discapacidad_no').addClass('is-invalid');
                        $('#v_discapacidad').after('<div class="invalid-feedback d-block">' + value + '</div>');
                    } else if (key === 'formacion_formal') {
                        $('#formacion_formal_si').addClass('is-invalid');
                        $('#formacion_formal_no').addClass('is-invalid');
                        $('#v_formacion_formal').after('<div class="invalid-feedback d-block">' + value + '</div>');
                    } else if (key === 'acepto_clausula') {
                        $('#v_clausula').after('<div class="invalid-feedback d-block">' + value + '</div>');
                    } else {
                        $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                    }
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
}