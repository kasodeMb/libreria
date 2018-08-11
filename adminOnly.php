<?php
require("auth.php");
if (!isset($_SESSION["isAdmin"]) || (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == false)) {
    header("Location: login.php");
    exit();
}