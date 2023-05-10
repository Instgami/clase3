<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Libreria para dar estilo a los alert de javascript-->
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <!-- incluimos las librerias para los datatables -->
    <title>Pacientes</title>
</head>
<body>
    <?php
        if($_SESSION['tipoUsuario']=="Doctor"){
            include_once "includes/menudoctor.php";
        }else{
            echo "<meta http-equiv='refresh' content='0,url=home'>";
        }
    ?>
    <div class="col-12 col-s-12">
        <table  id="example" class="stripe" style="width:100%">
        <thead>
            <tr>
                <td>Documento</td>
                <td>Nombre</td>
                <td>Tel&eacute;fono</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                include_once "controlador/control_lista_pacientes.php";
            ?>
             </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <!-- este scrip es obligatorio para que nos funcione el ajax -->
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <!-- incluimos el script pata los datatables -->
    <script src="<?php echo $dominio; ?>js/borrarPaciente.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    "url": 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                }, 
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
            });
        });
    </script>
</body>
</html>