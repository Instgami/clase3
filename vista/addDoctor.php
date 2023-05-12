<?php
session_start();
// iniciar las variables de sesion
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de doctores</title>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Libreria para dar estilo a los alert de javascript-->
</head>

<body>
    <div class="row">
        <?php
            if($_SESSION['tipoUsuario']=="Doctor"){
                include_once "includes/menudoctor.php";
            }else{
                echo "<meta http-equiv='refresh' content='0,url=home'>";
            }
        // insertar el menu
        ?>
        <div class="col-12 col-s-12">
            <div class="col-10 col-s-10">
                <h1 class="col-12 col-s-12">Perfil de Doctor</h1>
                <form method="POST" action="" id="formulario" class="col-12 col-s-12">

                    <div>
                        <label for="nombre" class="propiedad">Nombre</label>
                        <input type="text" id="nombre" name="fullname" maxlength="30" size="30" placeholder="Nombre" required="required" autofocus="autofocus" />
                    </div>
                    <div>
                        <label for="nombre" class="propiedad">Direcci&oacute;n</label>
                        <input type="text" id="dir" name="dir"  maxlength="30" size="30" placeholder="Direcci&oacute;n" required="required" autofocus="autofocus" />                   
                    </div>
                    <div>
                        <label for="nombre" class="propiedad">Departamento</label>
                        <input type="text" id="dpto" name="departamento" list="listdpto" maxlength="30" size="30" placeholder="Departamento" required="required" autofocus="autofocus" />
                        <datalist id="listdpto">
                            <?php include_once "includes/listadepartamentos.php"; ?>
                        </datalist>
                    </div>
                    <div>
                        <label for="email" class="propiedad">Email</label>
                        <input type="email" id="email" name="email" maxlength="30" size="30" placeholder="Email" />
                    </div>

   
 
                    <div>
                        <button type="submit">Registrar</button>
                        <button type="reset">Cancelar</button>
                    </div>
                </form>
                <?php
                include_once "controlador/userController.php";
                // incluimos el controlador
                ?>
            </div>
        </div>
    </div>
</body>

</html>