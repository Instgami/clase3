<?php
include_once "modelo/User.php";
// incluimos el modelo
$oUsuario= new User();
// creamos el objeto Usuario primero el nombre del objeto despues el igual seguido de la palabra new y despues el nombre que tiene la clase en el modelo

if(isset($_POST['password'])&&isset($_POST['email'])){
    // validamos que el formulario haya sido enviado
    $email=Conexion::limpiar($_POST['email']);
    $clave=Conexion::limpiar($_POST['password']);
    // capturamos los datos que envio el usuario

    $usuario= $oUsuario->getUsuario($email);
    // consultamos si el correo se encuentra en la base de datos

    if(isset($usuario)){
        // validamos si el usuario existe
        if(password_verify($clave,$usuario['clave'])){
            // validamos que la clave ingresada sea correcta
            $_SESSION['nombreUsuario']= $usuario['nombre'];
            $_SESSION['tipoUsuario']= $usuario['tipoUser'];
            $_SESSION['horainiciosesion']=date('Y-m-d H:m:s');
            // inicializamos las variables de sesion
            echo "<script language='javascript'> swal('Bienvenido','sea usted bienvenido a nuestra Clinica Remedios','success')</script>";
            // mostramos el mensaje de confirmacion
            echo "<meta http-equiv='refresh' content='2;url=inicio'>";
            // redireccionamos al inicio despues de 2 segundos
        }else{
            echo "<script language='javascript'> swal('Usuario Invalido','El usuario ingresado o la contraseña es invalida','error')</script>";
            // si la clave es incorrecta  mostramos un mensaje de error
        }
    }else{
        echo "<script language='javascript'> swal('Usuario Invalido','El usuario ingresado o la contraseña es invalida','error')</script>";
        // si el correo no se encuentra registrado mostramos un mensaje de error            
    }

}