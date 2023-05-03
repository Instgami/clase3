<?php
 global $index;
 global $dominio;
 $index=true;
 $dominio="http://localhost/clases/clase1/";
 $rutas=array();
 if(isset($_GET['pagina'])){
    $rutas= explode("/", $_GET["pagina"]);
    if(  
        $rutas[0]=="cerrarSesion"||
        $rutas[0]=="index"||
        $rutas[0]=="inicio"||
        $rutas[0]=="login"||
        $rutas[0]=="registro"
      
    ){
        if($rutas[0]=="cerrarSesion"){
            include_once "includes/cerrarSesion.php";
        }
        if($rutas[0]=="index"){
            include_once "vista/index_view.php";
        }
        if($rutas[0]=="inicio"){
            include_once "controlador/control_home.php";
        }
        if($rutas[0]=="login"){
            include_once "vista/login.php";
        }
        if($rutas[0]=="registro"){
            include_once "vista/registro.php";
        }
    }else{
        include_once "vista/page404.php";
    } 
 }else{
    include_once "vista/index_view.php";
 }

?>
