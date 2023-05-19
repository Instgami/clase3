<?php
session_start();
// iniciamos las variables de sesion
session_destroy();
// destruimos la sesion activa
header('location: '.$dominio.'login');
// redireccionamos al login
?>