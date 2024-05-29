$(document).ready(function() {
    $('#etapa_1').show();
    obtenerOrganizaciones();
    obtenerPersonasJuridicas();
    agregarMontos();
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

    // Access the clipboard data
    clipboardData = e.clipboardData || window.clipboardData;
    pastedData = clipboardData.getData('Text');

    // If the pasted data is not a number, prevent the paste action
    if (isNaN(pastedData)) {
        e.preventDefault();
    }
}

function obtenerOrganizaciones() {
        $.ajax({
            url: 'obtenerOrganizaciones',
            type: 'GET',
            success: function(response) {
                // Limpiar opciones actuales del select
                $('#id_dato_organizacion').empty();

                // Agregar opciones estáticas
                $('#id_dato_organizacion').append($('<option>', {
                    value: '',
                    text: 'Selecciona un título'
                }));

                // Agregar nuevas opciones basadas en los datos recibidos
                $.each(response, function(index, res) {
                    $('#id_dato_organizacion').append($('<option>', {
                        value: res.id,
                        text: res.nombre_organizacion
                    }));
                });
            },
            error: function() {
                console.log('Error al obtener las organizaciones.');
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

                if(id==3){
                    $('#etapa_1').hide();
                    $('#etapa_2').hide();
                    $('#etapa_3').hide();
                    $("#bt_et1").removeClass("btn-info");
                    $("#bt_et2").removeClass("btn-info");
                    $("#bt_et3").removeClass("btn-info");    
                    $("#bt_et4").addClass("btn-info");
                    $('#etapa_4').show();
                }

                if(id==5){
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
                    $('#frm_fondos')[0].reset();
                    $('#etapa_1').show();
                    window.location.href = 'confirmacionFondos';
                }

            } else {
                $.each(response.errors, function(key, value) {
                     if (key.includes('.')) {
                        var parts = key.split('.');
                        var fieldName = parts[0];
                        var index = parts[1];
                        
                        var field = $('input[name="' + fieldName + '[]"]').eq(index);
                        field.addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                    } else {
                        // Para campos normales
                        $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                    }

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

function agregarMontos() {
        var maxFields = 11;
        var container = $("#presupuesto-container");
        var addButton = $("#addPresupuesto");
        var fieldCount = 1;

        $(addButton).click(function(e) {
            e.preventDefault();
            if (fieldCount < maxFields) {
                fieldCount++;
                var newFieldHTML = `
                    <div class="form-group row">
                        <div class="col-md-2"><button type="button" class="btn btn-danger delete-entry">Eliminar</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="detalle" name="detalle[]" required>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <input type="text" class="miles form-control monto" id="monto" name="monto[]" required placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                        </div>
                    </div>`;
                $(container).append(newFieldHTML);
            } else {
                alert('Has alcanzado el límite de 10 campos.');
            }
        });

         // Eliminar entrada de presupuesto
        $(document).on('click', '.delete-entry', function() {
        $(this).closest('.form-group.row').remove();
            fieldCount--; // Restar 1 al contador cuando se elimine una entrada
        });
}

function actualizarTotal() {
    var aporteSolicitado = parseFloat($("#aporte_solicitado").val().replace(/\D/g, '')) || 0;
    var aporteTerceros = parseFloat($("#aporte_terceros").val().replace(/\D/g, '')) || 0;
    var aportePropio = parseFloat($("#aporte_propio").val().replace(/\D/g, '')) || 0;
    
    // Verificar si los valores son números válidos, si no lo son, establecerlos como cero
    if (isNaN(aporteSolicitado)) aporteSolicitado = 0;
    if (isNaN(aporteTerceros)) aporteTerceros = 0;
    if (isNaN(aportePropio)) aportePropio = 0;

    var total = aporteSolicitado + aporteTerceros + aportePropio;

    // Redondear el total al número entero más cercano
    total = Math.round(total);

    // Formatear el total con miles
    var totalFormateado = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    $("#total").val(totalFormateado);
}

// Detectar cambios en los campos de aporte solicitado, aporte de terceros y aporte propio
$("#aporte_solicitado, #aporte_terceros, #aporte_propio").on("input", function() {
    actualizarTotal();
});

// Inicialmente actualizar el total
//actualizarTotal();

function actualizarTotalPresupuesto() {
    var totalPresupuesto = 0;
    $(".monto").each(function() {
        var monto = parseFloat($(this).val().replace(/\D/g, '')) || 0;
        // Verificar si el valor es un número válido, si no lo es, establecerlo como cero
        if (isNaN(monto)) monto = 0;
        totalPresupuesto += monto;
    });

    // Redondear el total al número entero más cercano
    totalPresupuesto = Math.round(totalPresupuesto);

    // Formatear el total con miles
    var totalPresupuestoFormateado = totalPresupuesto.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    
    $("#total_presupuesto").val(totalPresupuestoFormateado);
}

// Detectar cambios en los campos de monto del presupuesto
$("#presupuesto-container").on("input", ".monto", function() {
    actualizarTotalPresupuesto();
});

// Inicialmente actualizar el total del presupuesto
// actualizarTotalPresupuesto();

