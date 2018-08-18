<?php 
require("../adminOnly.php");
require('../mysql.php');
$db = new MySQL();
if ((isset($_GET['action']) && isset($_GET['id']))) {
    if ($_GET['action'] == 'delete') {
        $query = "SELECT * FROM `books` WHERE id='".$_GET['id']."'";
        $db->query($query);
        $resBook = $db->fetchArray();
        $query = "DELETE FROM books WHERE id='".$_GET['id']."'";
        $res = $db->query($query);
        if ($db->affectedRows() > 0) {
            unlink("..".$resBook['image']);
            $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Libro borrado con exito</div>";
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Error al borrar el libro</div>";
        }
    } else if ($_GET['action'] == 'sell') {
        $query = "UPDATE `books` SET available=0 WHERE id=".$_GET['id'];
        $res = $db->query($query);
        if ($db->affectedRows() > 0) {
            $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Libro modificado con exito</div>";
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Error al modificar el libro</div>";
        }
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
        <link rel="stylesheet" href="../styles/main.css" />
</head>

<body>
<?php include('../shared/header.php')?>
    <div class="container">
    <nav class="navbar justify-content-between nav-search">
        <a class="navbar-brand">Libros Disponibles</a>
        <form class="form-inline" action="/libros/list">
            <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
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
                if (isset($_GET['buscar'])) {
                  $search = $db->realEscapeString($_GET['buscar']);
                  $query = "SELECT * FROM `books` WHERE (isbn='$search' OR title LIKE '%$search%' OR author LIKE '%$search%' OR description LIKE '%$search%')";
                }
                $db->query($query);
                $rows = $db->fetchAll();
                if (count($rows) == 0 ) {
                    echo "<tr><td colspan='8' class='text-center'>No se encontraron libros</td></tr>";
                  }
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
                    echo "<a class='btn btn-danger' href='/libros/list?action=delete&id=".$value["id"]."'>Eliminar</a>";
                    if ((bool)$value["available"] == true) {
                        echo "<br /> <br />";
                        echo "<a class='btn btn-primary' href='/libros/list?action=sell&id=".$value["id"]."'>Marcar como vendido</a>";
    
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php include('../shared/footer.php');?>
    </div>
</body>

</html>