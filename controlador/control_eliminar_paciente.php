<?php 
$index = false;
include_once "../modelo/User.php";
$oPaciente = new User();

$id_paciente = $_POST['idpaciente'];

$paciente = $oPaciente->getPaciente($id_paciente);

if(isset($paciente)){
    $oPaciente->deletePaciente($id_paciente);
    echo $id_paciente;
}
$index = true;
?>
