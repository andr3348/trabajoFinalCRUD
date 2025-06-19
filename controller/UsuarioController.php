<?php
require_once '../logica/LUsuario.php';
require_once '../model/Usuario.php';

class UsuarioController {
    public function addUsuario() {
        if ($_POST) {
            $nombre = $_POST['nombre'] ?? '';
            $dni = $_POST['dni'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $passw = $_POST['pass'] ?? '';
            $tipousuario = $_POST['tipo'];

            $campos = array($nombre,$dni,$correo,$passw,$tipousuario);
            foreach ($campos as $campo) {
                if (empty($campo)) {
                    echo "Completa todos los campos";
                    return;
                }
            }

            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setDni($dni);
            $usuario->setCorreo($correo);
            $usuario->setPassword($passw);
            $usuario->setTipousuario($tipousuario);

            $lusuario = new LUsuario();
            $lusuario->crearUsuario($usuario);
        }
    }
}

?>