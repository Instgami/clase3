<?php 
include_once "modelo/User.php";
// incluimos el modelo

$oPacientes = new User();
// creamos el objeto pacientes

$datos = $oPacientes->listaPacientes();

foreach($datos as $fila){
?>
    <tr>
        <td><?php echo $fila['documento'];?></td>
        <td><?php echo $fila['nombre'];?></td>
        <td><?php echo $fila['telefono'];?></td>
        <td>
            <a href="<?php echo $dominio; ?>editar-paciente/<?php echo $fila['id'];?>"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0)" id="Paciente-<?php echo $fila['id'] ?>" class="borrarPac" data-id="<?php echo $fila['id']; ?>"><i class="fas fa-user-times"></i></a>
        </td>
    </tr>
<?php
}
?>

