<?php 
$user = '';
    if(isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
    }
?>
<header class="header clearfix bg-light container-fluid">
    <div class="container">
        <nav>
            <ul class="nav float-right">
                <?php if (isset($_SESSION['username']) && $_SESSION["isAdmin"] == true) {?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Administrar</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="/acerca">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Cerrar sessión</a>
                </li>
            </ul>
        </nav>
        <div>
            <img class="logo" width="50" src="/IMAG/sale.jpg" alt="Sale" />
            <h3 class="hello">Hola
                <?php echo $user?>!</h3>
        </div>
    </div>
</header>