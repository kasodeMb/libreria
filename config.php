<?php
// Configuracion de la base de datos.
$dbhost = "localhost"; // Servidor
$dbuser = "root"; // Usuario
$dbpass = ""; // Contraseña
$db = "prueba"; // Base de Datos

// Creando conexion.
$conectar = mysqli_connect($dbhost,$dbuser,$dbpass,$db); // Conectamos a la base de datos

error_reporting(E_ALL ^ E_NOTICE);/* solamente mensajes de errores */
?>