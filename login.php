<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css" />
</head>

<body>
    <?php
        require('mysql.php');
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
                header("Location: /");
                exit();
            } else {
                $_SESSION['message'] = "<div class='alert alert-danger login-error' role='alert'>El Username/Password es incorrecto</div>";
            }
        }
        ?>
        <div class="container">
            <div class="card px-4 py-3">
                <h1 align="center">Iniciar Session</h1>
                <form action="/login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <?php 
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>
                </form>
                <div class="dropdown-divider"></div>
                <p align="center" class="not-registered">
                    Todavía no estas registrado?
                    <a href='/users/registration'>Registrarse aqui</a>
                </p>
            </div>
            <?php include('shared/footer.php');?>
        </div>
</body>

</html>