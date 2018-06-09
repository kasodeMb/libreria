<?php

$con=mysqli_connect("localhost","root","","prueba");
if(($_POST['Upload'])){
	$archivo= $_FILES['foto']['tmp_name'];
	$destino= "documentos/". $_FILES['foto']['name'];
	move_uploaded_file($archivo,$destino);
	mysqli_query($con, "INSERT INTO libros(imagen) VALUES ('$destino')");
    mysqli_close($con);
	
	echo " Imagen agregado correctamente !!! ";
} else { 
		
		echo "Falta rellenar algun dato"; 
	}
?>
<a href="agregar.php">REGRESAR</a>