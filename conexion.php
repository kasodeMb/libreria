<?php
class conexion
{
    function recuperarDatos()
    {
        $db = new MySQL();
        $con = mysqli_connect("localhost", "pmauser", "root", "libreria") or
            die("No se pudo conectar a la base de datos");
        $querry = "SELECT * FROM  libros";
        $resultado = $db->query($query);

        while ($fila = mysqli_fetch_Array($resultado)) {
            echo "<tr>";
            echo "Nombre del Libro:", "<td> {$fila[nombre]} </td>//";
            echo "Correo del Vendedor:", " <td> {$fila[correo]} </td> <br> ";
        }
    }
}
?>
