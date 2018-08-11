<?php
require("auth.php");
require('mysql.php');
$db = new MySQL();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Welcome Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css" />
    </head>

    <body>
    <?php include('shared/header.php')?>
        <div class="container">
            <nav class="navbar justify-content-between nav-search">
                <a class="navbar-brand">Libros Disponibles</a>
                <form class="form-inline" action="/IndexBus">
                    <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $query = "SELECT * FROM `books` WHERE available=1";
                if (isset($_GET['buscar'])) {
                  $search = $db->realEscapeString($_GET['buscar']);
                  $query = "SELECT * FROM `books` WHERE (isbn='$search' OR title LIKE '%$search%' OR author LIKE '%$search%' OR description LIKE '%$search%') AND available=1";
                }
                $db->query($query);
                $rows = $db->fetchAll();
                if (count($rows) == 0 ) {
                  echo "<tr><td colspan='5' class='text-center'>No se encontraron libros</td></tr>";
                }
                foreach ($rows as $key => $value) {
                    echo "<tr>";
                    echo "<td><img width='100' src='".$value["image"]."' alt='".$value["title"]."'></td>";
                    echo "<td>".$value["isbn"]."</td>";
                    echo "<td>".$value["title"]."</td>";
                    echo "<td>".$value["author"]."</td>";
                    echo "<td>".$value["description"]."</td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
            <?php include('shared/footer.php');?>
        </div>
    </body>

    </html>