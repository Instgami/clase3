<?php
session_start();
include_once "controlador/control_consultar_paciente.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Libreria para dar estilo a los alert de javascript-->
    <title>Editar Paciente</title>
</head>
<body>
    <?php
        if($_SESSION['tipoUsuario']=="Doctor"){
            include_once "includes/menudoctor.php";
        }else{
            echo "<meta http-equiv='refresh' content='0,url=home'>";
        }

    ?>
    <form action="" method="post">
        <div>
            <label for="cc" class="propiedad">Documento</label>
            <input type="hidden" name="id" value="<?php echo $paciente_id;?>">
            <input type="text" id="cc" name="cc" maxlength="10" size="30" value="<?php echo $paciente_doc;?>" required="required" autofocus="autofocus" />                        
        </div>
        <div>
            <label for="nombre" class="propiedad">Nombre</label>
            <input type="text" id="nombre" name="fullname" maxlength="30" size="30" value="<?php echo $paciente_nombre;?>" required="required" autofocus="autofocus" />
        </div>                       
        <div>
            <label for="telefono" class="propiedad">Tel&eacute;fono</label>
            <input type="tel" id="telefono" name="phonenumber" maxlength="10" size="11" value="<?php echo $paciente_tel;?>" pattern="[0-9]{10}" />
        </div>
        <div>
            <label for="fecha" class="propiedad">Fecha de nacimiento</label>
            <input type="date" id="fecha" name="birthdate" value="<?php echo $paciente_nac;?>"/>
        </div>
        <div>
            <label for="genero" class="propiedad">Género</label>
            <input type="radio" id="hombre" name="genre" value="hombre" <?php if($paciente_gen=="hombre"){ echo "checked";}?>/>
            <label for="hombre" class="de-radio">Hombre</label>
            <input type="radio" id="mujer" name="genre" value="mujer" <?php if($paciente_gen=="mujer"){ echo "checked";}?> />
            <label for="mujer" class="de-radio">Mujer</label>
        </div>           
        <div>
            <button type="submit">Registrar</button>
            <button type="reset">Cancelar</button>
        </div>
    </form>
    <?php
    include_once "controlador/control_editar_paciente.php";
    ?>
</body>
</html>