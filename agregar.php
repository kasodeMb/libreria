<?php

ini_set('error_reporting', 0);
// Incluimos la configuracion y conexion a la MySQL.
$conexion = mysqli_connect("localhost", "root", "", "prueba");

// Definimos la variable $msg por seguridad.
$msg = "";
// Si se apreta el boton Agendar, da la condicion como true.
if ($_POST['agendar']) {
    // Verificamos que no alla ningun dato sin rellenar.
    if (!empty($_POST['nombre']) || !empty($_POST['correo'])) {
        // Pasamos los datos de los POST a Variables, y le ponemos seguridad.
        $nombre = htmlentities($_POST['nombre']);
        $correo = htmlentities($_POST['correo']);
        // Insertamos los datos en la base de datos, si da algun error lo muestra.
        mysqli_query(
            $conexion,
            "INSERT INTO libros(nombre, correo) VALUES ('$nombre','$correo')"
        );
        mysqli_close($conexion);
        // Mostramos un mensaje diciendo que todo salio como lo esperado
        $msg = "Libro agregado correctamente";
    } else {
        // Si hay un dato sin rellenar mostramos el siguiente texto.
        $msg = "Falta rellenar algun dato";
    }
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda - Agregar personas</title>
</head>

<style type="text/css"> 
.agenda {
	margin:100px auto 0 auto; 
	width:701px;
	height:468px;
	background-image:url(imagenes/agenda.jpg);
}
.agenda #contenidor {
	padding:25px;
	width:276px;
	height:428px;
}
</style>
<body>
<div class="agenda">
	<div id="contenidor">
      <div align="center">
        <table width="106%" height="378" border="0">
          <tr>
            <td height="38" colspan="3" align="center" valign="middle"><h1>Agregar Libros</h1></td>
          </tr>
          <tr>
            <td height="334" colspan="3" valign="top"><div align="center"><em><span style="color:red;">
              <?= $msg; ?>
              </span></em>	        </div>
              <form action="agregar.php" method="post">
                <div align="center">
                  <p><strong>Nombre</strong>
                    <input type="text" name="nombre" id="nombre" />
                    <strong>Correo</strong>
                    <input type="text" name="correo" id="correo" />
                  </p>
                  <p>
                    <input type="submit" name="agendar" value="Agregar" />
                  </p>
                  <p>PARA SUBIR TU IMAGEN:</p>
                  <p><a href="form.php"><img src="IMAG/subir img.jpg" width="134" height="47"></a></p>
                </div>
              </form>
              <div id="apDiv4"><a href="/logout"><img src="IMAG/exit.png" width="100" height="70" /></a>  <a href="/menu.html"> <img src="IMAG/menu.png" width="91" height="69" /></a></div>
            </td>
          </tr>
        </table>
      </div>
  </div>
</div>
</body>
</html>
