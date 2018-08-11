<!DOCTYPE html>
<html>

<head>
  <title> Mostrando Datos del Libro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
  <style type="text/css">
    .LosLibrosGuardadosson {
      color: #F30;
    }
  </style>
</head>

<body>
  <div>
    <fieldset>
      <h1>
        <legend> Los Libros Guardados son:</legend>
      </h1>
      <div>
        <?php
    include "conexion.php";
    $Con = new conexion();
    $Con->recuperarDatos();
    ?>
      </div>
    </fieldset>
  </div>
  <a href="inicio.html">Volver al Inicio</a>
</body>


</html>