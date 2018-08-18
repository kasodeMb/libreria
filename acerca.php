<?php
  require('auth.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css" />
  <title>Sobre Nosotros</title>
</head>

<body>
  <?php include('shared/header.php')?>
  <div class="container about-us">
    <h1>Sobre nosotros</h1>
    <div class="row">
    <div class="col-sm">
    <img src="/IMAG/bookshelf.jpg" alt="shelf" class="bookshelf" />
    </div>
    <div class="col-sm">
    <p align="justify">Somos una organizacion que tomo la iniciativa de
        crear y promover una oportunidad de tener un destino final para nuestros libros usados, creando un beneficio para el comprador
        al poder adquirir libros en buen estado y a bajo precio.
      </p>
    </div>
  </div>
    <?php include('shared/footer.php');?>
  </div>
</body>

</html>