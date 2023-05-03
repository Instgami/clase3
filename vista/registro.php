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
    <title>Registro</title>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Libreria para dar estilo a los alert de javascript-->
</head>

<body>
    <div class="row">
        <?php
        include_once "includes/menuext.php";
        // insertar el menu
        ?>
        <div class="col-12 col-s-12">
            <div class="col-10 col-s-10">
                <h1 class="col-12 col-s-12">Perfil de usuario</h1>
                <form method="POST" action="" id="formulario" class="col-12 col-s-12">
                    <div>
                        <label for="cc" class="propiedad">Documento</label>
                        <input type="text" id="cc" name="cc" maxlength="10" size="30" placeholder="Documento de identidad" required="required" autofocus="autofocus" />                        
                    </div>
                    <div>
                        <label for="nombre" class="propiedad">Nombre</label>
                        <input type="text" id="nombre" name="fullname" maxlength="30" size="30" placeholder="Nombre" required="required" autofocus="autofocus" />
                    </div>
                    <div>
                        <label for="password" class="propiedad">Contrase&ntilde;a</label>
                        <input type="password" id="password" name="password" size="30" placeholder="Contraseña" required="required" />
                    </div>
                    <div>
                        <label for="email" class="propiedad">Email</label>
                        <input type="email" id="email" name="email" maxlength="30" size="30" placeholder="Email" />
                    </div>
                    <div>
                        <label for="telefono" class="propiedad">Tel&eacute;fono</label>
                        <input type="tel" id="telefono" name="phonenumber" maxlength="10" size="11" placeholder="Tel&eacute;fono" pattern="[0-9]{10}" />
                    </div>
                    <div>
                        <label for="fecha" class="propiedad">Fecha de nacimiento</label>
                        <input type="date" id="fecha" name="birthdate" />
                    </div>
                    <div>
                        <label for="genero" class="propiedad">Género</label>
                        <input type="radio" id="hombre" name="genre" value="hombre" />
                        <label for="hombre" class="de-radio">Hombre</label>
                        <input type="radio" id="mujer" name="genre" value="mujer" checked="checked" />
                        <label for="mujer" class="de-radio">Mujer</label>
                    </div>
                    <div>
                        <input type="checkbox" id="terminos" value="1" name="terminos" />
                        <label for="terminos" class="propiedad">Acepta los terminos y condiciones</label>
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