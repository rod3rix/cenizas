$(document).ready(function() {
    $('#etapa_1').show();
    formatMiles();
    let count = 1;
    $('#add-presupuesto').click(function() {
        if (count < 10) {
            let newElement = `
                <div class="form-group row" id="presupuesto-row-${count}">
                    <label for="detalle-${count}" class="col-md-2 col-form-label text-md-left">Detalle</label>
                    <div class="col-md-5">
                        <select id="detalle-${count}" class="form-control" name="detalle[]">
                            <option value="">Seleccione</option>
                            <option value="Recursos Humanos">Recursos Humanos</option>
                            <option value="Materiales e insumos">Materiales e insumos</option>
                        </select>
                    </div>
                    <label for="monto-${count}" class="col-md-1 col-form-label text-md-left">Monto</label>
                    <div class="col-md-4">
                        <input id="monto-${count}" type="text" class="form-control monto" name="monto[]" placeholder="$" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="12">
                    </div>
                </div>`;
            $('#presupuesto-container').append(newElement);
            count++;
            if (count > 1) {
                $('#remove-presupuesto').show();
            }
            if (count === 10) {
                $('#alert-container').html('<div class="alert alert-warning" role="alert">Has alcanzado el máximo de 10 elementos.</div>');
            } else {
                $('#alert-container').html('');
            }
        }
    });

    $('#remove-presupuesto').click(function() {
        if (count > 1) {
            count--;
            $('#presupuesto-row-' + count).remove();
            if (count === 1) {
                $('#remove-presupuesto').hide();
            }
            $('#alert-container').html('');
        }
    });

    $(document).on('input', '.monto', function() {
        let total = 0;
        $('.monto').each(function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value) {
                total += parseInt(value);
            }
        });
        $('#total').val(total.toLocaleString('es-CL'));
    });

    $(document).on('input', '.sum_mont_sol', function() {
        let total = 0;
        $('.sum_mont_sol').each(function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value) {
                total += parseInt(value);
            }
        });
        $('#sum_mont_sol').val(total.toLocaleString('es-CL'));
    });

    $(document).on('input', '.tot_presupuesto', function() {
        let total = 0;
        $('.tot_presupuesto').each(function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value) {
                total += parseInt(value);
            }
        });
        $('#tot_presupuesto').val(total.toLocaleString('es-CL'));
    });

     $('#actividad_economica').on('change', function() {
        if ($(this).val() === 'Otra') {
            $('#otra_especificar_container').show();
        } else {
            $('#otra_especificar_container').hide();
            $('#otra_especificar').val('');
        }
        
    }).trigger('change');
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
    // if(id==3){
    //     $('#etapa_1').hide();
    //     $('#etapa_2').hide();
    //     $("#bt_et1").removeClass("btn-info");
    //     $("#bt_et2").removeClass("btn-info");
    //     $("#bt_et4").removeClass("btn-info");    
    //     $("#bt_et3").addClass("btn-info");
    //     $('#etapa_3').show();
    // }
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

                if(id==3){
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
                    } else if (key.startsWith('detalle.') || key.startsWith('monto.')) {
                        var index = parseInt(key.split('.')[1]); // Obtener el índice del campo y ajustarlo
                        if (key.startsWith('detalle.')) {
                            $('#detalle-' + index).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                        } else if (key.startsWith('monto.')) {
                            $('#monto-' + index).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                        }
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

function calculateDays() {
    var fechaInicio = $("#fecha_inicio").val();
    var fechaTermino = $("#fecha_termino").val();

    if (!fechaInicio || !fechaTermino) return;

    var startDate = fechaInicio.split("-");
    var endDate = fechaTermino.split("-");

    var start = new Date(startDate[2], startDate[1] - 1, startDate[0]);
    var end = new Date(endDate[2], endDate[1] - 1, endDate[0]);

    if (start >= end) {
        var errorMessage = (start > end) ? "La fecha de inicio debe ser anterior a la fecha de término." : "La fecha de inicio no puede ser igual a la fecha de término.";
        $("#date-error").text(errorMessage).show();
        $("#fecha_inicio").val('');
        $("#fecha_termino").val('');
        $("#cantidad_dias").val('');
        return;
    } else {
        $("#date-error").hide();
    }

    var timeDiff = Math.abs(end.getTime() - start.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

    $("#cantidad_dias").val(diffDays);
}

$("#fecha_inicio, #fecha_termino").on("change", function() {
    calculateDays();
});


