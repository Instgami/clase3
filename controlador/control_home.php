<?php
session_start();
$tipoUsuario = $_SESSION['tipoUsuario'];

if($tipoUsuario=="Paciente"){
    echo "usted ha iniciado sesion como paciente";
}else{
    echo "usted ha iniciado sesion como doctor"; 
}
?>