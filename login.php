<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 503px;
	height: 345px;
	z-index: 5;
	left: 802px;
	top: 313px;
}
#apDiv {
	position: absolute;
	width: 221px;
	height: 44px;
	z-index: 5;
	left: 484px;
	top: 457px;
}
#apDiv2 {
	position: absolute;
	width: 503px;
	height: 345px;
	z-index: 5;
	left: 800px;
	top: 235px;
}
#apDiv3 {
	position: absolute;
	width: 503px;
	height: 345px;
	z-index: 5;
	left: 813px;
	top: 167px;
}
#apDiv4 {
	position: absolute;
	width: 503px;
	height: 345px;
	z-index: 5;
	left: 336px;
	top: 280px;
}
#apDiv6 {
	position: absolute;
	width: 503px;
	height: 345px;
	z-index: 5;
	left: 301px;
	top: 132px;
}
#apDiv7 {
	position: absolute;
	width: 503px;
	height: 345px;
	z-index: 5;
	left: 809px;
	top: 278px;
}
#apDiv8 {
	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 424px;
	top: 514px;
}
#apDiv9 {
	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 63px;
	top: 426px;
}
#apDiv10 {
	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 434px;
	top: 56px;
}
#apDiv11 {
	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 149px;
	top: 274px;
}
#apDiv12 {	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 155px;
	top: 543px;
}
#apDiv13 {	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 155px;
	top: 543px;
}
#apDiv14 {
	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 181px;
	top: 228px;
}
#apDiv15 {
	position: absolute;
	width: 450px;
	height: 364px;
	z-index: 5;
	left: 796px;
	top: 268px;
}
.form h1 {
	color: #F30;
}
#apDiv1 {
	position: absolute;
	width: 1127px;
	height: 110px;
	z-index: 6;
	left: 41px;
	top: 54px;
}
#apDiv16 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 7;
	left: 486px;
	top: 193px;
}
</style>
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
  <h1 align="center">&nbsp;</h1>
<p align="center">&nbsp;</p>
<div id="apDiv1">
  <div align="center"><img src="IMAG/Distribuidora FAMA - Logo.jpg" width="177" height="125"><img src="IMAG/Distribuidora Cervantes- Logo.png" width="185" height="128"><img src="IMAG/Apartamentos Buenavista - Logo.png" width="192" height="133"><img src="IMAG/Moreira Compra y Venta de Autos Chocados - Logo.jpg" width="186" height="123"></div>
</div>
<h1 align="center">&nbsp;</h1>
<p align="center">&nbsp;</p>
<h1 align="center"> COMPRA Y VENTA DE LIBROS USADOS</h1>
<h1 align="center">Inciar Sessión</h1>
<form action="" method="post" name="login">
  <div align="center">
  <input type="text" name="username" placeholder="Username" required />
  <input type="password" name="password" placeholder="Password" required />
  <input name="submit" type="submit" value="Login" />
  </div>
</form>
<p align="center"><br>
  Todavía no estas registrado?  <a href='registration.php'>Registrarse aqui</a><br />
</p>
</div>
<?php } ?>
<div id="apDiv"><img src="IMAG/cpy.png" alt="" width="222" height="45"></div>
</body>
</html>
