<html>
<head>
<title> Mostrando Datos del Libro</title>
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
   include("conexion.php");
   $Con= new conexion();
   $Con->recuperarDatos();

?>
  </div>
  </fieldset>
</div>
</body>
              <footer>
</footer>
                    </html>
                    
                    <a href="Index - Inicio.html">Volver al Inicio</a>