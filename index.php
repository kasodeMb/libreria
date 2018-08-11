<?php
include "auth.php"; //include auth.php file on all secure pages
//include auth.php file on all secure pages
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Welcome Home</title>

<link rel="stylesheet" href="styles/main.css" />

</head>

<body>

<div class="form">

<div id="apDiv10"><img src="IMAG/sale.jpg" width="225" height="185"></div>

<h1 align="center">Bienvenido a  Compra y Venta de Libros Usados<?php echo $_SESSION[
            'username'
        ]; ?>!</h1>

<p align="center"><br></p>

<p align="center"><a href="inicio.html">Ingresar Books Web page</a></p>

<div align="center"><a href="logout.php">Cerrar sessión</a>

<div id="apDiv"><img src="IMAG/cpy.png" alt="" width="222" height="45"></div>

</div>

</div>

</body>

</html>

