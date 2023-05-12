<?php
include_once "modelo/Departamentos.php";
$oDpto = new Departamento();
$dptos = $oDpto->listaDepartamentos();
foreach ($dptos as $row){
    echo '<option value="'.$row['departamento'].'">'.$row['departamento'].'</option>';
}
?>