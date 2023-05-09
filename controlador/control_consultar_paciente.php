<?php
include_once "modelo/User.php";
$oPaciente = new User();
if(isset($rutas[1])){
$id_paciente = $rutas[1];

$datosPaciente = $oPaciente->getPaciente($id_paciente);
    if(isset($datosPaciente)){
        $paciente_id        = $datosPaciente['id'];
        $paciente_doc       = $datosPaciente['documento'];
        $paciente_nombre    = $datosPaciente['nombre'];
        $paciente_tel       = $datosPaciente['telefono'];
        $paciente_nac       = $datosPaciente['fecnac'];
        $paciente_gen       = $datosPaciente['genero'];
    }else{
        echo "<meta http-equiv='refresh' content='0,url='.$dominio.'inicio'>";   
    }

}else{
    echo "<meta http-equiv='refresh' content='0,url='.$dominio.'inicio'>";  
}

?>