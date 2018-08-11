<?php
require("adminOnly.php");
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Welcome Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css" />
    </head>

    <body>
        <div class="form">
            <div id="apDiv10">
                <img src="IMAG/sale.jpg" width="225" height="185">
            </div>
            <h1 align="center">Bienvenido a Compra y Venta de Libros Usados
                <?php echo $_SESSION['username']; ?>!
            </h1>
            <p align="center">
                <br>
            </p>
            <p align="center">
                <a href="inicio.html">Ingresar Books Web page</a>
            </p>
            <p align="center">
                <a href="admin">Administrar Books Web page</a>
            </p>
            <div align="center">
                <a href="logout.php">Cerrar sessión</a>
                <div id="apDiv">
                    <img src="IMAG/cpy.png" alt="" width="222" height="45">
                </div>
            </div>
        </div>
    </body>

    </html>