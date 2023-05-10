$(document).on('click', '.borrarPac', function(e) {
    // capturamos el evento clic del boton nueva area
    var pacienteId = $(this).data('id');
    //capturamos el id de la empresa en una variable
    DeletePac(pacienteId);
    //enviamos el id a la funcion neware
});


function DeletePac(pacienteId) {


    swal({
            title: "Esta seguro de eliminar este paciente ?",
            text: "Una vez eliminado, Usted no podra recuperar estos datos!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'post',
                    url: 'http://localhost/clases/clase3/controlador/control_eliminar_paciente.php',
                    // siempre debe ir la ruta absoluta desde el localhost
                    data: 'idpaciente=' + pacienteId
                }).done(function(respuesta) {

                    // evaluamos si el archivo php devuelve alguna respuesta
                    if (respuesta == false) {
                        swal("Error", "Un error ha ocurrido!", {
                            icon: "error",
                        });
                        location.reload();
                        // si no devuelve ninguna respuesta mostramos el mensaje de error y redireccionamos al inicio
                    } else {
                        var datos = respuesta;
                        swal("Confirmaci\u00f3n", "El paciente ha sido eliminado!", {
                            icon: "success",
                        });
                        setTimeout('location.reload()', 1000);
                        // si devuelve respuesta mostramos el mensaje de confirmacion y redireccionamos a la pagina de la empresa despues de un segundo
                    }
                });
            }


        });
}