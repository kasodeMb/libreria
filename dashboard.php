<?php

 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
.form p a {
	color: #F30;
}
.form a {
	color: #C30;
}
</style>
</head>
<body>
<div class="form">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">PANEL DE CONTROL</p>
<p align="center"><a href="index.php">INICIO</a></p>
<div align="center"><a href="logout.php">SALIR</a>
  
  
  <br />
  <br /><br /><br />
</div>
</div>
</body>
</html>
