<?php 
require("adminOnly.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>

<body>
    <div>
        <h2>Libros</h2>
        <ul>
            <li>
                <a href="/libros/agregar">Agregar</a>
            </li>
            <li>
                <a href="/libros/list">Ver Libros</a>
            </li>
        </ul>
    </div>
    <div>
        <h2>Usuarios</h2>
        <ul>
            <li>
                <a href="/users/registration">Registrar</a>
            </li>
            <li>
                <a href="/users/list">Ver Usuarios</a>
            </li>
        </ul>
    </div>
</body>

</html>