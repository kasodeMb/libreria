<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css" />
</head>

<body>
    <?php
require ('mysql.php');
session_start();
$db = new MySQL();
// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = $db->realEscapeString($username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = $db->realEscapeString($password);

    //Checking is user existing in the database or not

    $query =
        "SELECT * FROM `users` WHERE username='$username' and password='" .
        md5($password) .
        "'";
    $db->query($query);
    $rows = $db->fetchArray();
    if (count($rows) != 0) {
        $_SESSION['username'] = $username;
        $_SESSION['isAdmin'] = (bool) $rows['admin'];
        header("Location: index.php"); // Redirect user to index.php
    } else {
        echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    }
} else {
     ?>
        <div class="form">
            <div id="apDiv1">
                <div align="center">
                    <img src="IMAG/Distribuidora FAMA - Logo.jpg" width="177" height="125">
                    <img src="IMAG/Distribuidora Cervantes- Logo.png" width="185" height="128">
                    <img src="IMAG/Apartamentos Buenavista - Logo.png" width="192" height="133">
                    <img src="IMAG/Moreira Compra y Venta de Autos Chocados - Logo.jpg" width="186" height="123">
                </div>
            </div>
            <h1 align="center"> COMPRA Y VENTA DE LIBROS USADOS</h1>
            <h1 align="center">Inciar Sessión</h1>
            <form action="" method="post" name="login">
                <div align="center">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input name="submit" type="submit" value="Login" />
                </div>
            </form>
            <p align="center">
                <br> Todavía no estas registrado?
                <a href='/users/registration'>Registrarse aqui</a>
                <br />
            </p>
        </div>
        <?php
}
?>
        <div id="apDiv">
            <img src="/IMAG/cpy.png" alt="" width="222" height="45">
        </div>
</body>

</html>