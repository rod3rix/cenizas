$(document).ready(function() {
    $('#fecha_nacimiento').datepicker({
        format: 'dd/mm/yyyy', // Formato de fecha
        autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
        changeMonth: true, // Permitir cambiar el mes
        changeYear: true, // Permitir cambiar el año
        yearRange: '1900:2024', // Rango de años que se pueden seleccionar
        language: 'es', // Establecer el idioma a español
        dateFormat: 'dd/mm/yyyy' // Establecer el formato de fecha
    });

    $('#fecha_inicio').datepicker({
        format: 'dd/mm/yyyy', // Formato de fecha
        autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
        changeMonth: true, // Permitir cambiar el mes
        changeYear: true, // Permitir cambiar el año
        yearRange: '1900:2024', // Rango de años que se pueden seleccionar
        language: 'es', // Establecer el idioma a español
        dateFormat: 'dd/mm/yyyy' // Establecer el formato de fecha
    });

    $('#fecha_termino').datepicker({
        format: 'dd/mm/yyyy', // Formato de fecha
        autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
        changeMonth: true, // Permitir cambiar el mes
        changeYear: true, // Permitir cambiar el año
        yearRange: '1900:2024', // Rango de años que se pueden seleccionar
        language: 'es', // Establecer el idioma a español
        dateFormat: 'dd/mm/yyyy' // Establecer el formato de fecha
    });
});
