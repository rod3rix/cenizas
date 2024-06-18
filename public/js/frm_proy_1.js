  $(document).ready(function() {
        // Inicializar DatePicker
        $('#fecha_nacimiento').datepicker({
            format: 'dd/mm/yyyy', // Formato de fecha
            autoclose: true // Cerrar automáticamente después de seleccionar la fecha
        });

        // Abrir ventana emergente al hacer clic en el botón
        $('#seleccionarFecha').click(function() {
            $('#fecha_nacimiento').datepicker('show');
        });
    });


function validarFormulario() {
    var nacionalidad = document.getElementById("nacionalidad");
    var genero = document.getElementById("genero");
    var fecha_nacimiento = document.getElementById("fecha_nacimiento");
    var actividad_economica = document.getElementById("actividad_economica");
    var direccion = document.getElementById("direccion");
    var formacion_formal = document.getElementById("formacion_formal");
    var acepto_clausula = document.getElementById("acepto_clausula").checked;

    var campos = [nacionalidad, genero, fecha_nacimiento, actividad_economica, direccion, formacion_formal];

    var errores = 0;

    campos.forEach(function(campo) {
        var errorDiv = document.getElementById(campo.id + "_error");
        if (!campo.disabled && campo.value.trim() === "") {
            campo.classList.add("is-invalid");
            //errorDiv.innerHTML = "Este campo es obligatorio.";
            // errorDiv.style.display = "block";
            errores++;
        } else {
            campo.classList.remove("is-invalid");
            // errorDiv.style.display = "none";
        }
    });

    // Verificar si se aceptó la cláusula
    if (!acepto_clausula) {
        // document.getElementById("acepto_clausula_error").style.display = "block";
        // errores++;
    } else {
        // document.getElementById("acepto_clausula_error").style.display = "none";
    }

    // Otros tipos de validaciones que desees agregar...

    // Si hay errores, devolver false
    if (errores > 0) {
        return false;
    }

            $('#etapa_1').hide();
            $('#etapa_2').show();
            $('#etapa_3').hide();
            $('#etapa_4').hide();

            $("#bt_et2").removeClass("btn-info").addClass("btn-primary");
   
   
    return true;
}
