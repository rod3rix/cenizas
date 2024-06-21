 $(document).ready(function() {
            $.datepicker.setDefaults($.datepicker.regional['es']);

            $('#fecha_nacimiento').datepicker({
                dateFormat: 'dd-mm-yy', // Formato de fecha correcto
                autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
                changeMonth: true, // Permitir cambiar el mes
                changeYear: true, // Permitir cambiar el año
                yearRange: '1900:2024', // Rango de años que se pueden seleccionar
            });

            $('#fecha_inicio').datepicker({
                dateFormat: 'dd-mm-yy', // Formato de fecha correcto
                autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
                changeMonth: true, // Permitir cambiar el mes
                changeYear: true, // Permitir cambiar el año
                yearRange: '1900:2024', // Rango de años que se pueden seleccionar
            });

            $('#fecha_termino').datepicker({
                dateFormat: 'dd-mm-yy', // Formato de fecha correcto
                autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
                changeMonth: true, // Permitir cambiar el mes
                changeYear: true, // Permitir cambiar el año
                yearRange: '1900:2024', // Rango de años que se pueden seleccionar
            });

            $('#fecha_inicio_edit').datepicker({
                dateFormat: 'dd-mm-yy', // Formato de fecha correcto
                autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
                changeMonth: true, // Permitir cambiar el mes
                changeYear: true, // Permitir cambiar el año
                yearRange: '1900:2024', // Rango de años que se pueden seleccionar
            });

             $('#fecha_termino_edit').datepicker({
                dateFormat: 'dd-mm-yy', // Formato de fecha correcto
                autoclose: true, // Cerrar automáticamente después de seleccionar la fecha
                changeMonth: true, // Permitir cambiar el mes
                changeYear: true, // Permitir cambiar el año
                yearRange: '1900:2024', // Rango de años que se pueden seleccionar
            });
});