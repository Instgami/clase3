<?php
include_once "modelo/User.php";
$oPaciente = new User();
if(isset($_POST['id'])&&isset($_POST['cc'])){
    $id=Conexion::limpiar($_POST['id']);
    $doc=Conexion::limpiar($_POST['cc']);
    $nom=Conexion::limpiar($_POST['fullname']);
    $tel=Conexion::limpiar($_POST['phonenumber']);
    $fec_nac=Conexion::limpiar($_POST['birthdate']);
    $sexo=Conexion::limpiar($_POST['genre']); 

    $oPaciente->actualizarPaciente($id,$doc,$nom,$tel,$fec_nac,$sexo);
    echo "<script language='javascript'> swal('Felicidades','El Paciente ha sido actualizado con exito','success')</script>";
    // mostramos el mensaje de confirmacion
    echo "<meta http-equiv='refresh' content='0;url='.$dominio.'consultar-pacientes'>";
    // redireccionamos al login despues de 2 segundos
        
}
?>