<?php 
require("../adminOnly.php");
require('../mysql.php');
$db = new MySQL();
if ((isset($_GET['action']) && isset($_GET['id'])) && $_GET['action'] == 'delete') {
    $query = "SELECT * FROM `books` WHERE id='".$_GET['id']."'";
    $db->query($query);
    $resBook = $db->fetchArray();
    $query = "DELETE FROM books WHERE id='".$_GET['id']."'";
    $res = $db->query($query);
    if ($res == true) {
        unlink("..".$resBook['image']);
        $_SESSION['message'] = "<h3>Libro borrado con exito</h3>";
    } else {
        $_SESSION['message'] = "<h3>Error al borrar el libro</h3>";
    }
    header("Location: /libros/list");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Ver Libros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>
    <?php 
    if(isset($_SESSION['message'])) {
         echo $_SESSION['message'];
         unset($_SESSION['message']);
        }
       ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Imagen</th>
                <th scope="col">ISBN</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Disponible</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM `books`";
                $db->query($query);
                $rows = $db->fetchAll();
                foreach ($rows as $key => $value) {
                    echo "<tr>";
                    echo "<td>".$value["id"]."</td>";
                    echo "<td><img width='100' src='".$value["image"]."' alt='".$value["title"]."'></td>";
                    echo "<td>".$value["isbn"]."</td>";
                    echo "<td>".$value["title"]."</td>";
                    echo "<td>".$value["author"]."</td>";
                    echo "<td>".$value["description"]."</td>";
                    echo "<td>".((bool)$value["available"] ? "Si" : "No")."</td>";
                    echo "<td>";
                    echo "<a href='/libros/list?action=delete&id=".$value["id"]."'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>

</html>