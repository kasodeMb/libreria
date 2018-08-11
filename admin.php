<?php 
require("adminOnly.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles/main.css" />
    <title>Administrador</title>
</head>

<body>
    <?php include('shared/header.php')?>
    <div class="container">
        <div class="d-flex align-items-center flex-column admin-group">
            <h2>Libros</h2>
            <div>
                <a class="btn btn-dark" href="/libros/agregar">Agregar</a>
                <a class="btn btn-dark" href="/libros/list">Ver Libros</a>
            </div>
        </div>
        <div class="d-flex align-items-center flex-column admin-group">
            <h2>Usuarios</h2>
            <div>
                <a class="btn btn-dark" href="/users/registration">Registrar</a>
                <a class="btn btn-dark" href="/users/list">Ver Usuarios</a>
            </div>
        </div>
        <?php include('shared/footer.php');?>
    </div>
</body>

</html>