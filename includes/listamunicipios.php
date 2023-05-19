<?php
$index = false;
include_once "../modelo/Departamentos.php";
// se utiliza el ../ porque index es false
$oUbicacion = new Departamento();
// creamos el objeto

$dpto = $_POST['dpto'];

$departamento = $oUbicacion->getDpto($dpto);

$ciudades = $oUbicacion->listaCiudades($departamento['id']);

foreach ($ciudades as $ciudad){
    echo '<option value= "'.$ciudad['ciudad'].'">'.$ciudad['ciudad'].'</option>';
}
$index = true;
?>