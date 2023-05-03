<?php
class Conexion{
  public static function conectar(){   
    $conexion = new PDO(
                "mysql:host=localhost;dbname=clases",
                "root",
                "",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8') 
              );
    date_default_timezone_set("America/Bogota"); 
    return $conexion;
  }

  public static function limpiar($tags){
    return $tags;
  }
}
