<?php
include_once "modelo/User.php";
include_once "includes/aleatorio.php";
$oDoctor = new User();

if(isset($_POST['fullname'])&&isset($_POST['email'])){
    $nom=Conexion::limpiar($_POST['fullname']);
    $email=Conexion::limpiar($_POST['email']);
    $dir=Conexion::limpiar($_POST['dir']);
    $dpto=Conexion::limpiar($_POST['departamento']);
    $ciudad=Conexion::limpiar($_POST['ciudad']);
    $especialidad=Conexion::limpiar($_POST['especialidad']);
    $clave = crearclavealeatoria();
    $tipo= "Doctor";
    $ruta = "image/fotos/";
    $targetPatch = $ruta. basename( $_FILES['foto']['name']);
    // capturamos los valores del formulario en variables
    $claveencriptada = password_hash($clave, PASSWORD_DEFAULT);
    // encriptamos la clave

    $usuario = $oDoctor->getUsuario($email);
    // se realiza la consulta del correo a la base de datos
    if(isset($usuario)){
        // validamos si el usuario existe
        echo "<script language='javascript'> swal('Usuario Invalido','El usuario ingresado ya se encuentra registrado','error')</script>";
        // si el correo se encuentra registrado mostramos un mensaje de error     
    }else{
        $doctor = $oDoctor->getDoctor($email);
        // se llama un metodo colocando la variable que va contener el resultado es igual al nombre del objeto flecha el nombre del metodo parentesis y entre los parentesis coloco los argumentos que queremos enviar
        if(isset($doctor)){
            // validamos si el usuario existe
            echo "<script language='javascript'> swal('Usuario Invalido','El doctor ingresado ya se encuentra registrado','error')</script>";
            // si el correo se encuentra registrado mostramos un mensaje de error  
        }else{
            if(move_uploaded_file($_FILES['foto']['tmp_name'],$targetPatch )){
                $oDoctor->nuevoUsuario($email, $claveencriptada, $tipo, $nom);
                $oDoctor->nuevoDoctor($nom, $dir, $ciudad, $dpto, $email, $especialidad, $targetPatch);
                echo "<script language='javascript'> swal('Felicidades','El usuario registrado con exito','success')</script>";
                // mostramos el mensaje de confirmacion
            }else{
                 // validamos si el usuario existe
                echo "<script language='javascript'> swal('Error','Algo sucedio con el archivo Intente nuevamente','error')</script>";
                // si el correo se encuentra registrado mostramos un mensaje de error
            }
        }
    }
    echo $clave;
    // echo "<meta http-equiv='refresh' content='2;url=inicio'>";
    // redireccionamos al login despues de 2 segundos
}

?>