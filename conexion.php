<?php
class conexion{
	function recuperarDatos(){
		$con = mysqli_connect("localhost", "root", "", "proyectos") or die("No se pudo conectar a la base de datos");
		$querry="SELECT * FROM  libros";
		$resultado= mysqli_query($con,$querry);
		
		while($fila= mysqli_fetch_Array($resultado)) {
			echo "<tr>";
			echo "Nombre del Libro:", "<td> $fila[nombre] </td>//";
			echo "Correo del Vendedor:"," <td> $fila[correo] </td> <br> ";
			
			
		}
	}
}

?>
