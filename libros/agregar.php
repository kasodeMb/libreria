<?php
  require('../adminOnly.php');
  require('../mysql.php');
  $db = new MySQL();
  $fields = ['isbn', 'title', 'author', 'description'];
  $isValid = true;
  $msg = '';
  foreach ($fields as $key => $value) {
      if (!isset($_POST[$value]) || (isset($_POST[$value]) && $_POST[$value] == '')) {
          $isValid = false;
      }
  }
  if (!isset($_FILES['image']) || (isset($_FILES['image']) && $_FILES['image'] == '')) {
      $isValid = false;
  }
  
  if (count($_POST) != 0) {
      if ($isValid) {
          $archivo= $_FILES['image']['tmp_name'];
          $fileName = time()."-".$_FILES['image']['name'];
          $destino= "../uploads/".str_replace("'","-",$fileName);
          move_uploaded_file($archivo, $destino);
          $query =
        "INSERT INTO `books`(isbn, title, image, author, description) VALUES ('".$db->realEscapeString($_POST['isbn'])."','".$db->realEscapeString($_POST['title'])."','/uploads/".$db->realEscapeString(str_replace("'","-",$fileName))."','".$db->realEscapeString($_POST['author'])."','".$db->realEscapeString($_POST['description'])."') ";
          $res = $db->query($query);
          if ($res == true) {
            $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Libro agregado con exito</div>";
          } else {
            $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Error al agregar el libro</div>";
          }
      } else {
          $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Todos los campos son requeridos</div>";
      }
      header("Location: /libros/agregar");
    exit();

  }
        
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agregar Libros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script crossorigin src="https://underscorejs.org/underscore-min.js"></script>
    <link rel="stylesheet" href="../styles/main.css" />
  </head>

  <body>
  <?php include('../shared/header.php')?>
    <div class="container">
        <?php if(isset($_SESSION['message'])) {
         echo $_SESSION['message'];
         unset($_SESSION['message']);
        }?>
    <form action="/libros/agregar" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" maxlength="13" required>
      </div>
      <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" id="title" name="title" required >
      </div>
      <div class="form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" id="author" name="author" required >
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control" id="description" name="description" required>
      </div>
      <div class="form-group">
        <div class="custom-file">
          <input data-toggle="custom-file" data-target="#image" type="file" name="image" required accept=" image/png, image/jpeg" class="custom-file-input">
          <span id="image" class="custom-file-control custom-file-name custom-file-label" data-content="Selecione una imagen..."></span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
    </form>
    <script>
      $(document).ready(function () {
        // handle custom file inputs
        $('body').on('change', 'input[type="file"][data-toggle="custom-file"]', function (ev) {
          console.log('change');
          var $input = $(this);
          var target = $input.data('target');
          var $target = $(target);

          if (!$target.length)
            return console.error('Invalid target for custom file', $input);

          if (!$target.attr('data-content'))
            return console.error('Invalid `data-content` for custom file target', $input);

          // set original content so we can revert if user deselects file
          if (!$target.attr('data-original-content'))
            $target.attr('data-original-content', $target.attr('data-content'));

          var input = $input.get(0);

          var name = _.isObject(input) &&
            _.isObject(input.files) &&
            _.isObject(input.files[0]) &&
            _.isString(input.files[0].name) ? input.files[0].name : $input.val();

          if (_.isNull(name) || name === '')
            name = $target.attr('data-original-content');

          $target.attr('data-content', name);

        });
      });
    </script>
    <?php include('../shared/footer.php');?>
    </div>
  </body>

  </html>