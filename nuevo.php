<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Sistema Control de Reportes Campus Virtual</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h3 style="text-align:center">Nuevo registro</h3>
      </div>
      <form class="form-horizontal" method="POST" action="guardar.php" enctype="multipart/form-data" autocomplete="off">

        <!-- Fecha -->
        <div class="form-group">
          <label for="fecha" class="col-sm-2 control-label">Fecha</label>
          <div class="col-sm-6">
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" value="<?php echo date("Y-m-d");?>" readonly>
          </div>
        </div>
    <!-- Aula -->   
        <div class="form-group">
          <label for="libro" class="col-sm-2 control-label">Libro</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="libro" name="libro" placeholder="Nombre del Libro" required>
          </div>
        </div>
    <!-- Equipo -->   
        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Nombre del Vendedor</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Vendedor" required>
          </div>
        </div>
    <!-- Modelo -->   
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
          </div>
        </div>
    <!-- Proyector -->    
        <div class="form-group">
          <label for="precio" class="col-sm-2 control-label">Precio</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" required>
          </div>
        </div>
    <!-- Aire -->   
        <div class="form-group">
          <label for="aire" class="col-sm-2 control-label">Telefono</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
          </div>
        </div>

    <!-- Teclado -->    
        <div class="form-group">
          <label for="teclado" class="col-sm-2 control-label">Celular</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="celular" name="celular" placeholder="celular" required>
          </div>
        </div>

    <!-- Mouse -->    
        <div class="form-group"></div>

    <!-- Sonido -->   
        <div class="form-group"></div>

    <!-- Red -->    
        <div class="form-group"></div>

    <!-- Video -->    
        <div class="form-group"></div>
        
    <!-- Foto1 -->
        <div class="form-group">
          <label for="foto1" class="col-sm-2 control-label">Foto 1</label>
          <div class="col-sm-6">
            <input type="file" class="form-control-file" id="foto1" name="foto1">
          </div>
        </div>

    <!-- Foto2 -->
        <div class="form-group">
          <label for="foto2" class="col-sm-2 control-label">Foto 2</label>
          <div class="col-sm-6">
            <input type="file" class="form-control-file" id="foto2" name="foto2">
          </div>
        </div>

    <!-- Foto3 -->
        <div class="form-group">
          <label for="foto3" class="col-sm-2 control-label">Foto 3</label>
          <div class="col-sm-6">
            <input type="file" class="form-control-file" id="foto3" name="foto3">
          </div>
        </div>


    <!-- Comentarios -->    
        <div class="form-group">
          <label for="comenta" class="col-sm-2 control-label">Comentarios</label>
          <div class="col-sm-6">
            <textarea class="form-control" name="comenta" id="comenta" cols="10" rows="5"></textarea>  
          </div>
        </div>

    <!-- tecnico -->    
        <div class="form-group"></div>
        
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <!--<a href="index.php" class="btn btn-default">Regresar</a>-->
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>

      </form>
    </div>
  </body>
</html>
