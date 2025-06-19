<?php 

if (isset($_GET['action']) && $_GET['action'] === "addUsuario") {
    require_once '../controller/UsuarioController.php';
    $controller = new UsuarioController();
    $controller->addUsuario();
    return;
}

require "../views/addUsuario.php";

?>