$('#dpto').change(function() {
    $('#listCiudad').empty();
    llenar_ciudad();
});

function llenar_ciudad() {
    var dpto = $('#dpto').val();
    console.log(dpto)
    $.ajax({
        type: 'post',
        url: 'http://localhost/clases/clase3/includes/listamunicipios.php',
        // siempre debe ir la ruta absoluta desde el localhost
        data: 'dpto=' + dpto,

        success: function(resp) {

            $('#listCiudad').append(resp);
        }
    });
    return false;
}