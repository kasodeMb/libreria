<?php 
require("../adminOnly.php");
require('../mysql.php');
$db = new MySQL();
if ((isset($_GET['action']) && isset($_GET['id'])) && $_GET['action'] == 'delete') {
    $query = "DELETE FROM users WHERE id='".$_GET['id']."'";
    $res = $db->query($query);
    if ($res == true) {
        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Usuario borrado con exito</div>";
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Error al borrar el usuario</div>";
    }
    header("Location: /users/list");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css" />
</head>

<body>
    <?php include('../shared/header.php')?>
    <div class="container">
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
                    <th scope="col">Nombre de Usuario</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Fecha de creacion</th>
                    <th scope="col">Administrador</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM `users`";
                $db->query($query);
                $rows = $db->fetchAll();
                foreach ($rows as $key => $value) {
                    echo "<tr>";
                    echo "<td>".$value["id"]."</td>";
                    echo "<td>".$value["username"]."</td>";
                    echo "<td>".$value["email"]."</td>";
                    echo "<td>".$value["trn_date"]."</td>";
                    echo "<td>".((bool)$value["admin"] ? "Si" : "No")."</td>";
                    echo "<td>";
                    echo "<a href='/users/list?action=delete&id=".$value["id"]."'>Eliminar</a>";
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