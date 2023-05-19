<?php
include_once "modelo/User.php";
$oDoctor = new User();

$doctores = $oDoctor->listaDoctores();

foreach($doctores as $doctor){
    ?>
        <div class="card">
            <img src="<?php echo $doctor['foto']; ?>" alt="">
            <h1><?php echo $doctor['nombre']; ?></h1>
            <h2><?php echo $doctor['especialidad']; ?></h2>
        </div>
    <?php
}
?>