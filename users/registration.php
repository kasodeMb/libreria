<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css" />
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
    if ($result == true) {
        $_SESSION['message'] = "<div class='alert alert-success login-error' role='alert'>Usurio creado correctamente. <a href='/login'>Volver al Login</a></div>";
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger login-error' role='alert'>Error al crear el usuario</div>";
    }
}
    include('../shared/header.php');
?>

        <div class="container">
            <div class="card px-4 py-3">
                <h1 align="center">Registro de Usuarios</h1>
                <form action="/users/registration" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <?php 
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>
                </form>
            </div>
            <?php include('../shared/footer.php');?>
        </div>
</body>

</html>