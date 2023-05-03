<?php
session_start();
// inicializamos las variables de sesion
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Libreria para dar estilo a los alert de javascript-->
</head>
<body>
    <div class="row">
        <div class="col-12 col-s-12">
            <?php
            include_once "includes/menuext.php";
            ?>
        </div>
        <div class="col-12 col-s-12 main">
            <div class="col-10 col-s-10 contenedor">
                <h1 class="col-12 col-s-12">Inicio de Sesi&oacute;n </h1>
                <form action="" method="POST" id="formulario" class="col-12 col-s-12">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" maxlength="30" size="30" placeholder="Email" />                  
                    </div>
                    <div>
                        <label for="password">Contrase&ntilde;a</label>
                        <input type="password" id="password" name="password" size="30" placeholder="Contrase&ntilde;a" required="required" />                    
                    </div>
                    <div>
                        <button type="submit">Ingresar</button>
                        <button type="reset">Cancelar</button>
                    </div>
                </form>
                <?php
                    include_once "controlador/loginController.php";
                ?>
            </div>
        </div>
    </div>
</body>

</html>