<?php
include_once "modelo/User.php";
// incluimos el modelo
$oUsuario= new User();
// creamos el objeto Usuario primero el nombre del objeto despues el igual seguido de la palabra new y despues el nombre que tiene la clase en el modelo

if(isset($_POST['cc'])&&isset($_POST['fullname'])&&isset($_POST['password'])&&isset($_POST['email'])){
    // validamos que el formulario haya sido enviado

    $doc=Conexion::limpiar($_POST['cc']);
    $nom=Conexion::limpiar($_POST['fullname']);
    $email=Conexion::limpiar($_POST['email']);
    $clave=Conexion::limpiar($_POST['password']);
    $tel=Conexion::limpiar($_POST['phonenumber']);
    $fec_nac=Conexion::limpiar($_POST['birthdate']);
    $sexo=Conexion::limpiar($_POST['genre']);   
    $tipo= "Paciente";
    // capturamos los valores del formulario en variables
    $claveencriptada = password_hash($clave, PASSWORD_DEFAULT);
    // encriptamos la clave

    $usuario = $oUsuario->getUsuario($email);
    // se realiza la consulta del correo a la base de datos

    if(isset($usuario)){
        // validamos si el usuario existe
        echo "<script language='javascript'> swal('Usuario Invalido','El usuario ingresado ya se encuentra registrado','error')</script>";
        // si el correo se encuentra registrado mostramos un mensaje de error        
    }else{
        // si el correo no se encuentra registrado continuamos con las demas validaciones
        $paciente = $oUsuario->getPaciente($doc);
        // consultamos si el documento del paciente se encuentra registrado en la base de datos
        if(isset($paciente)){
            // validmoa si se encuentra registrado
            echo "<script language='javascript'> swal('Paciente existente','El Paciente ingresado ya se encuentra registrado','error')</script>"; 
            // en este caso mostramos un mensaje de error
        }else{
            // en caso de que ni el correo ni el documento se encuentre registrados procedemos a registrar los datos
            $oUsuario->nuevoUsuario($email,$claveencriptada,$tipo,$nom);
            // registramos el usuario llamando a la funcion nuevoUsuario
            $oUsuario->nuevoPaciente($doc,$nom,$tel,$fec_nac,$sexo);
            // registrarmos el paciente llamando a la funcion o metodo nuevoPaciente
            echo "<script language='javascript'> swal('Felicidades','El usuario registrado con exito','success')</script>";
            // mostramos el mensaje de confirmacion
            echo "<meta http-equiv='refresh' content='2;url=login'>";
            // redireccionamos al login despues de 2 segundos
        }
    }




}
?>