$(document).ready(function() {
    $('#etapa_1').show();
    formatMiles();
});

function formatMiles() {
    function formatNumberWithDots(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    function formatInputField() {
        $(this).val(function(index, value) {
        return formatNumberWithDots(value.replace(/\./g, ''));
        });
    }
    $('.miles').on('input', formatInputField);

    $("#presupuesto-container").on("input", ".monto",formatInputField);
}

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
        $("#bt_et2").removeClass("btn-info");
        $("#bt_et3").removeClass("btn-info");
        $("#bt_et1").addClass("btn-info");
        $('#etapa_1').show();
    }
    if(id==2){
        $('#etapa_1').hide();
        $('#etapa_3').hide();
        $("#bt_et1").removeClass("btn-info");
        $("#bt_et3").removeClass("btn-info");
        $("#bt_et2").addClass("btn-info");
        $('#etapa_2').show();
    }
    if(id==3){
        $('#etapa_1').hide();
        $('#etapa_2').hide();
        $("#bt_et1").removeClass("btn-info");
        $("#bt_et2").removeClass("btn-info");
        $("#bt_et4").removeClass("btn-info");    
        $("#bt_et3").addClass("btn-info");
        $('#etapa_3').show();
    }
}
    
function validarFrmFondos(id) {

    var formData = new FormData(document.getElementById("frm_fondos"));
    formData.append("id", id);
    var id=id;

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: 'validarFrmFondos',
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
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et3").removeClass("btn-info");
                    $("#bt_et2").addClass("btn-info");
                    $('#etapa_2').show();
                }
                if(id==2){
                    $('#etapa_1').hide();
                    $('#etapa_2').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et3").addClass("btn-info");
                    $('#etapa_3').show();
                }

                if(id==4){
                    $('#etapa_1').hide();
                    $('#etapa_2').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et3").addClass("btn-info");
                    $('#etapa_3').show();
                }

                if (response.status) {
                    $('#frm_fondos')[0].reset();
                    $('#etapa_1').show();
                    window.location.href = 'confirmacionFondos';
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


function actualizarTotal() {
    var aporteSolicitado = parseFloat($("#aporte_solicitado").val().replace(/\D/g, '')) || 0;
    var aporteTerceros = parseFloat($("#aporte_terceros").val().replace(/\D/g, '')) || 0;
    var aportePropio = parseFloat($("#aporte_propio").val().replace(/\D/g, '')) || 0;
    
    if (isNaN(aporteSolicitado)) aporteSolicitado = 0;
    if (isNaN(aporteTerceros)) aporteTerceros = 0;
    if (isNaN(aportePropio)) aportePropio = 0;

    var total = aporteSolicitado + aporteTerceros + aportePropio;

    total = Math.round(total);

    var totalFormateado = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    $("#total").val(totalFormateado);
}

$("#aporte_solicitado, #aporte_terceros, #aporte_propio").on("input", function() {
    actualizarTotal();
});

function actualizarTotalPres() {
                var recHumanos = parseFloat($("#rec_humanos").val().replace(/\D/g, '')) || 0;
                var matInsumos = parseFloat($("#mat_insumos").val().replace(/\D/g, '')) || 0;
                var otros = parseFloat($("#otros").val().replace(/\D/g, '')) || 0;
                
                if (isNaN(recHumanos)) recHumanos = 0;
                if (isNaN(matInsumos)) matInsumos = 0;
                if (isNaN(otros)) otros = 0;

                var total = recHumanos + matInsumos + otros;
                total = Math.round(total);
                var totalFormateado = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $("#tot_presupuesto").val(totalFormateado);
            }

$("#rec_humanos, #mat_insumos, #otros").on("input", function() {
    actualizarTotalPres();
});

function calculateDays() {
    var fechaInicio = $("#fecha_inicio").val();
    var fechaTermino = $("#fecha_termino").val();

    if (!fechaInicio || !fechaTermino) return;

    var startDate = fechaInicio.split("-");
    var endDate = fechaTermino.split("-");

    var start = new Date(startDate[2], startDate[1] - 1, startDate[0]);
    var end = new Date(endDate[2], endDate[1] - 1, endDate[0]);

    var timeDiff = Math.abs(end.getTime() - start.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

    $("#cantidad_dias").val(diffDays);
}

$("#fecha_inicio, #fecha_termino").on("change", function() {
    calculateDays();
});
