<?php


//include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 409px;
	height: 346px;
	z-index: 5;
	left: 923px;
	top: 197px;
}
#apDiv10 {
	position: absolute;
	width: 226px;
	height: 185px;
	z-index: 5;
	left: 563px;
	top: 27px;
}
#apDiv {
	position: absolute;
	width: 221px;
	height: 50px;
	z-index: 5;
	left: 491px;
	top: 436px;
}
.form h1 {
	color: #F60;
}
</style>
</head>
<body>
<div class="form">
<h1 align="center">&nbsp;</h1>
<h1 align="center">&nbsp;</h1>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<div id="apDiv10"><img src="IMAG/sale.jpg" width="225" height="185"></div>
<p align="center">&nbsp;</p>
<h1 align="center">Bienvenido a  Compra y Venta de Libros Usados<?php echo $_SESSION['username']; ?>!</h1>
<p align="center"><br>

<p align="center"><a href="index - inicio.html">Ingresar Books Web page</a></p>
<div align="center"><a href="logout.php">Cerrar sessión</a>
  
  
  <br /><br /><br />
  <div id="apDiv"><img src="IMAG/cpy.png" alt="" width="222" height="45"></div>
</div>
</div>
</body>
</html>
