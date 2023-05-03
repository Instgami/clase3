<?php
include_once "modelo/User.php";
$oPaciente = new User();
if(isset($_POST['id'])&&isset($_POST['cc'])){
    $id= $_POST['id'];
    $doc = $_POST['cc'];
    $nombre = $_POST['nombre'];
        
}
?>