<?php
if ($index == false) {
  include_once "../includes/php_conexion.php";
} else {
  include_once "includes/php_conexion.php";
}
class Departamento extends Conexion
{
//  crear la clase
    var $departamento;
    var $id;
    // creamos las variable globales

    public function __construct()
    {
    }
    // creamos el metodo contructor

    public function getDpto($departamento){
        // creamos el metodo getDpto que permite consultar el id de un departamento
        $conexion= Conexion::conectar()->prepare("Select * from departamentos where departamento=:dpto");
        // creando la sentencia
        $conexion->bindParam(":dpto", $departamento, PDO::PARAM_STR);    
        // preparando los campos protegidos por pdo
        $conexion->execute();
        // ejecutar la sentencia
        if($respuesta = $conexion->fetch()){
          // validamos si la consulta devolvio algun resultado
            return [
              'id'               => $respuesta['codepartamento'],
              'dpto'             => $respuesta['departamento'],
              'pais'             => $respuesta['cod_pa'],
            ];
            // creamos el array que se va a devolver
        }
    }


  public function listaDepartamentos(){
      // creamos el metodo listaPacientes que permite consultar todos los pacientes
      $conexion= Conexion::conectar()->prepare("Select * from departamentos");
      // creando la sentencia
      $conexion->execute();
      // ejecutar la sentencia
      $departamentos = [];
      while($row = $conexion->fetch()){
        // validamos si la consulta devolvio algun resultado
          $dpto = [
            'id'              => $row['codepartamento'],
            'departamento'    => $row['departamento'],
            'pais'            => $row['cod_pa'],
          ];
          array_push($departamentos, $dpto);
      }
      return $departamentos;
  }

  public function listaCiudades($departamento){
      // creamos el metodo listaPacientes que permite consultar todos los pacientes
      $conexion= Conexion::conectar()->prepare("Select * from municipios WHERE cod_depa=:dpto");
      // creando la sentencia
      $conexion->bindParam(":dpto", $departamento, PDO::PARAM_INT); 
      $conexion->execute();
      // ejecutar la sentencia
      $ciudades = [];
      while($row = $conexion->fetch()){
        // validamos si la consulta devolvio algun resultado
          $municipio = [
            'id'              => $row['codmunicipio'],
            'ciudad'          => $row['municipio'],
            'dpto'            => $row['cod_depa'],
          ];
          array_push($ciudades, $municipio);
      }
      return $ciudades;
  }

}
