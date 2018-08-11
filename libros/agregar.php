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
          $destino= "../uploads/".$fileName;
          move_uploaded_file($archivo, $destino);
          $query =
        "INSERT INTO `books`(isbn, title, image, author, description) VALUES ('".$db->realEscapeString($_POST['isbn'])."','".$db->realEscapeString($_POST['title'])."','/uploads/".$db->realEscapeString($fileName)."','".$db->realEscapeString($_POST['author'])."','".$db->realEscapeString($_POST['description'])."') ";
          $res = $db->query($query);
          if ($res == true) {
            $msg = "Libro agregado con exito";
          } else {
            $msg = "Error al agregar libro";
          }
      } else {
          $msg = "Todos los campos son requeridos";
      }
  }
        
?>
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
    <form action="/libros/agregar" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" required maxlength="13">
      </div>
      <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" id="author" name="author" required>
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control" id="description" name="description" required>
      </div>
      <div class="form-group">
        <div class="custom-file">
          <input data-toggle="custom-file" data-target="#image" type="file" name="image" accept=" image/png, image/jpeg" class="custom-file-input">
          <span id="image" class="custom-file-control custom-file-name custom-file-label" data-content="Selecione una imagen..."></span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Agregar</button>
      <p><?php echo $msg?> </p>
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
  </body>

  </html>