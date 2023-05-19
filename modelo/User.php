<?php
if ($index == false) {
  include_once "../includes/php_conexion.php";
} else {
  include_once "includes/php_conexion.php";
}
class User extends Conexion
{
//  crear la clase
    var $contrasena;
    var $email;
    var $nombre;
    var $doc;
    var $tipo;
    var $tel;
    var $fec_nac;
    var $sexo;
    // creamos las variable globales

    public function __construct()
    {
    }
    // creamos el metodo contructor

    public function nuevoUsuario($email,$contrasena,$tipo,$nombre){
      // creamos el metodo nuevoUsuario que permite registrar un usuario
        $conexion= Conexion::conectar()->prepare("Insert into usuarios(usuario, clave, nombre, tipo) values (:user, :clave,:name, :type)");
        // creando la sentencia
        $conexion->bindParam(":user", $email, PDO::PARAM_STR);
        $conexion->bindParam(":clave", $contrasena, PDO::PARAM_STR);
        $conexion->bindParam(":type", $tipo, PDO::PARAM_STR);
        $conexion->bindParam(":name", $nombre, PDO::PARAM_STR);
        // preparando los campos protegidos por pdo
        $conexion->execute();
        // ejecutar la sentencia
    }

    Public function nuevoPaciente ($doc, $nombre,$tel, $fec_nac, $sexo) {
    // creamos el metodo nuevoUsuario que permite registrar un usuario
    $conexion= Conexion::conectar()->prepare("Insert into pacientes(documento, nombre, telefono, fecnac, genero) values (:documento, :name,:telefono, :nacimiento, :genero)");
    // creando la sentencia
    $conexion->bindParam(":documento", $doc, PDO::PARAM_STR);
    $conexion->bindParam(":name", $nombre, PDO::PARAM_STR);
    $conexion->bindParam(":telefono", $tel, PDO::PARAM_STR);
    $conexion->bindParam(":nacimiento", $fec_nac);
    $conexion->bindParam(":genero", $sexo, PDO::PARAM_STR);

    // preparando los campos protegidos por pdo
    $conexion->execute();
    // ejecutar la sentencia
    }

    Public function nuevoDoctor ($nombre,$direccion, $ciudad, $departamento, $correo, $especialidad, $foto) {
      // creamos el metodo nuevoUsuario que permite registrar un usuario
      $conexion= Conexion::conectar()->prepare("Insert into doctores(nombre, direccion, ciudad, departamento, correo,especialidad, foto) values (:name, :direccion,:ciudad, :departamento, :correo, :especialidad, :foto)");
      // creando la sentencia

      $conexion->bindParam(":name", $nombre, PDO::PARAM_STR);
      $conexion->bindParam(":direccion", $direccion, PDO::PARAM_STR);
      $conexion->bindParam(":ciudad", $ciudad, PDO::PARAM_STR);
      $conexion->bindParam(":departamento", $departamento, PDO::PARAM_STR);
      $conexion->bindParam(":correo", $correo, PDO::PARAM_STR);
      $conexion->bindParam(":especialidad", $especialidad, PDO::PARAM_STR);
      $conexion->bindParam(":foto", $foto, PDO::PARAM_STR);
  
      // preparando los campos protegidos por pdo
      $conexion->execute();
      // ejecutar la sentencia
      }
    
    public function getUsuario($email){
        // creamos el metodo getUsuario que permite consultar un usuario
        $conexion= Conexion::conectar()->prepare("Select * from usuarios where usuario=:email");
        // creando la sentencia
        $conexion->bindParam(":email", $email, PDO::PARAM_STR);    
        // preparando los campos protegidos por pdo
        $conexion->execute();
        // ejecutar la sentencia
        if($respuesta = $conexion->fetch()){
          // validamos si la consulta devolvio algun resultado
            return [
              'id'                => $respuesta['id'],
              'email'             => $respuesta['usuario'],
              'clave'             => $respuesta['clave'],
              'nombre'            => $respuesta['nombre'],
              'tipoUser'          => $respuesta['tipo'],
              'fecCreacion'       => $respuesta['creado'],
              'fecActualizacion'  => $respuesta['actualizado'],
            ];
            // creamos el array que se va a devolver
        }
    }


    public function getPaciente($doc){
      // creamos el metodo getPaciente que permite consultar un paciente
      $conexion= Conexion::conectar()->prepare("Select * from pacientes where documento=:documento OR id=:documento");
      // creando la sentencia
      $conexion->bindParam(":documento", $doc, PDO::PARAM_STR);    
      // preparando los campos protegidos por pdo
      $conexion->execute();
      // ejecutar la sentencia
      if($respuesta = $conexion->fetch()){
        // validamos si la consulta devolvio algun resultado
          return [
            'id'                => $respuesta['id'],
            'documento'         => $respuesta['documento'],
            'nombre'            => $respuesta['nombre'],
            'telefono'          => $respuesta['telefono'],
            'fecnac'            => $respuesta['fecnac'],
            'genero'            => $respuesta['genero'],
          ];
          // creamos el array que se va a devolver
      }

      
  }

  public function getDoctor($email){
    // creamos el metodo getUsuario que permite consultar un usuario
    $conexion= Conexion::conectar()->prepare("Select * from doctores where correo=:email");
    // creando la sentencia
    $conexion->bindParam(":email", $email, PDO::PARAM_STR);    
    // preparando los campos protegidos por pdo
    $conexion->execute();
    // ejecutar la sentencia
    if($respuesta = $conexion->fetch()){
      // validamos si la consulta devolvio algun resultado
        return [
          'id'                => $respuesta['id'],
          'email'             => $respuesta['correo'],
          'nombre'            => $respuesta['nombre'],
          'direccion'         => $respuesta['direccion'],
          'ciudad'            => $respuesta['ciudad'],
          'departamento'      => $respuesta['departamento'],
          'especialidad'      => $respuesta['especialidad'],
          'foto'              => $respuesta['foto'],
        ];
        // creamos el array que se va a devolver
    }
}


  public function listaPacientes(){
      // creamos el metodo listaPacientes que permite consultar todos los pacientes
      $conexion= Conexion::conectar()->prepare("Select * from pacientes");
      // creando la sentencia
      $conexion->execute();
      // ejecutar la sentencia
      $pacientes = [];
      while($row = $conexion->fetch()){
        // validamos si la consulta devolvio algun resultado
          $paciente = [
            'id'                => $row['id'],
            'documento'         => $row['documento'],
            'nombre'            => $row['nombre'],
            'telefono'          => $row['telefono'],
            'fecnac'            => $row['fecnac'],
            'genero'            => $row['genero'],
          ];
          array_push($pacientes, $paciente);
      }
      return $pacientes;
  }

  public function listaDoctores(){
    // creamos el metodo listaPacientes que permite consultar todos los pacientes
    $conexion= Conexion::conectar()->prepare("Select * from doctores");
    // creando la sentencia
    $conexion->execute();
    // ejecutar la sentencia
    $doctores = [];
    while($row = $conexion->fetch()){
      // validamos si la consulta devolvio algun resultado
        $doctor = [
          'id'                => $row['id'],
          'nombre'            => $row['nombre'],
          'direccion'         => $row['direccion'],
          'ciudad'            => $row['ciudad'],
          'departamento'      => $row['departamento'],
          'correo'            => $row['correo'],
          'especialidad'      => $row['especialidad'],
          'foto'              => $row['foto'],
        ];
        array_push($doctores, $doctor);
    }
    return $doctores;
}

  Public function actualizarPaciente ($id,$doc, $nombre,$tel, $fec_nac, $sexo) {
    // creamos el metodo nuevoUsuario que permite registrar un usuario
    $conexion= Conexion::conectar()->prepare("UPDATE pacientes SET documento=:documento, nombre=:nom, telefono=:telefono, fecnac=:nacimiento, genero=:genero WHERE id=:id");
    // creando la sentencia
    $conexion->bindParam(":id", $id, PDO::PARAM_INT);
    $conexion->bindParam(":documento", $doc, PDO::PARAM_STR);
    $conexion->bindParam(":nom", $nombre, PDO::PARAM_STR);
    $conexion->bindParam(":telefono", $tel, PDO::PARAM_STR);
    $conexion->bindParam(":nacimiento", $fec_nac);
    $conexion->bindParam(":genero", $sexo, PDO::PARAM_STR);

    // preparando los campos protegidos por pdo
    $conexion->execute();
    // ejecutar la sentencia
  }

  Public function deletePaciente ($id) {
    // creamos el metodo nuevoUsuario que permite registrar un usuario
    $conexion= Conexion::conectar()->prepare("DELETE FROM pacientes WHERE id=:id");
    // creando la sentencia
    $conexion->bindParam(":id", $id, PDO::PARAM_INT);
    // preparando los campos protegidos por pdo
    $conexion->execute();
    // ejecutar la sentencia
  }
}
