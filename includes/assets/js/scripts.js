$(document).ready(function () {
    $('#clear').click(function () {
        $('#calcular').trigger("reset");
        $('#result').empty();
    });
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}