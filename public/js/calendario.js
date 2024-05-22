$(document).ready(function() {
        // Inicializar DatePicker
    $('#fecha_nacimiento').datepicker({
        format: 'dd/mm/yyyy', // Formato de fecha
        autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
        changeMonth: true, // Permitir cambiar el mes
        changeYear: true, // Permitir cambiar el año
        yearRange: '1900:2024' // Rango de años que se pueden seleccionar
    });

    $('#fecha_inicio').datepicker({
        format: 'dd/mm/yyyy', // Formato de fecha
        autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
        changeMonth: true, // Permitir cambiar el mes
        changeYear: true, // Permitir cambiar el año
        yearRange: '1900:2024' // Rango de años que se pueden seleccionar
    });

    $('#fecha_termino').datepicker({
        format: 'dd/mm/yyyy', // Formato de fecha
        autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
        changeMonth: true, // Permitir cambiar el mes
        changeYear: true, // Permitir cambiar el año
        yearRange: '1900:2024' // Rango de años que se pueden seleccionar
    });

    // Abrir ventana emergente al hacer clic en el botón
    // $('#seleccionarFecha').click(function() {
    //     $('#fecha_nacimiento').datepicker('show');
    // });



});

// Abrir ventana emergente al hacer clic en el botón
// $('#seleccionarFecha').click(function() {
//     $('#fecha_nacimiento').datepicker('show');
// });