<?php 
require("../adminOnly.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css" />
</head>

<body>
    <?php
require '../mysql.php';
$db = new MySQL();
$result = null;
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = $db->realEscapeString($username); //escapes special characters in a string
    $email = stripslashes($_REQUEST['email']);
    $email = $db->realEscapeString($email);
    $password = stripslashes($_REQUEST['password']);
    $password = $db->realEscapeString($password);

    $trn_date = date("Y-m-d H:i:s");

    $query =
        "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '" .
        md5($password) .
        "', '$email', '$trn_date')";

    $result = $db->query($query);
}
?>
        <div class="register">
            <div id="apDiv10">
                <img src="/IMAG/books.jpg" width="384" height="201">
            </div>
            <h1 align="center">Registro de Usuarios </h1>
            <form name="/users/registration" action="" method="post">
                <div align="center">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" name="submit" value="Register" />
                    <?php 
                    if ($result) {
                        echo "<div class='form'><h3>Su usuario ya fue registrado.</h3><br/>Click Aqui para <a href='/login'>Regresar</a></div>";
                    } ?>
                </div>
            </form>
        </div>
        </div>
        <div id="apDiv">
            <img src="/IMAG/cpy.png" width="222" height="45">
        </div>
</body>

</html>