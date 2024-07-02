$(document).ready(function () {
    $('[data-bs-toggle="tooltip"]').tooltip();

    $('#organizationType').change(function () {
        var selectedValue = $(this).val();
        if (selectedValue === 'organizacion') {
            $('#organizacionDiv').removeClass('d-none');
            $('#mipymeDiv').addClass('d-none');
            $('.organizacionDiv').removeClass('d-none');
            $('.mipymeDiv').addClass('d-none');
        } else if (selectedValue === 'mipyme') {
            $('#mipymeDiv').removeClass('d-none');
            $('#organizacionDiv').addClass('d-none');
            $('.mipymeDiv').removeClass('d-none');
            $('.organizacionDiv').addClass('d-none');
        } else {
            $('#organizacionDiv, #mipymeDiv').addClass('d-none');
        }
    });
});