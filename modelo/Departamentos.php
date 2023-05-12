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

    // public function getUsuario($email){
    //     // creamos el metodo getUsuario que permite consultar un usuario
    //     $conexion= Conexion::conectar()->prepare("Select * from usuarios where usuario=:email");
    //     // creando la sentencia
    //     $conexion->bindParam(":email", $email, PDO::PARAM_STR);    
    //     // preparando los campos protegidos por pdo
    //     $conexion->execute();
    //     // ejecutar la sentencia
    //     if($respuesta = $conexion->fetch()){
    //       // validamos si la consulta devolvio algun resultado
    //         return [
    //           'id'                => $respuesta['id'],
    //           'email'             => $respuesta['usuario'],
    //           'clave'             => $respuesta['clave'],
    //           'nombre'            => $respuesta['nombre'],
    //           'tipoUser'          => $respuesta['tipo'],
    //           'fecCreacion'       => $respuesta['creado'],
    //           'fecActualizacion'  => $respuesta['actualizado'],
    //         ];
    //         // creamos el array que se va a devolver
    //     }
    // }


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

}
