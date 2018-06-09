<?php
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<style type="text/css">
#apDiv10 {
	position: absolute;
	width: 376px;
	height: 205px;
	z-index: 5;
	left: 439px;
	top: 46px;
}
#apDiv {
	position: absolute;
	width: 221px;
	height: 50px;
	z-index: 5;
	left: 567px;
	top: 373px;
}
#apDiv2 {	position: absolute;
	width: 134px;
	height: 124px;
	z-index: 5;
	left: 565px;
	top: 53px;
}
</style>
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>Su usuario ya fue registrado.</h3><br/>Click Aqui para <a href='login.php'>Regresar</a></div>";
        }
    }else{
?>
<div class="form">
<h1 align="center">&nbsp;</h1>
<div id="apDiv10"><img src="IMAG/books.jpg" width="384" height="201"></div>
<h1 align="center">&nbsp;</h1>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<h1 align="center">Registro de Usuarios </h1>
<form name="registration" action="" method="post">
  <div align="center">
  <input type="text" name="username" placeholder="Username" required />
  <input type="email" name="email" placeholder="Email" required />
  <input type="password" name="password" placeholder="Password" required />
  <input type="submit" name="submit" value="Register" />
  </div>
</form>
<div align="center"><br />
</div>
</div>
<p>
  <?php } ?>
</p>
<p>&nbsp;</p>
<div id="apDiv"><img src="IMAG/cpy.png" width="222" height="45"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
