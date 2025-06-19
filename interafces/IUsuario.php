<?php
require_once '../model/Usuario.php';

interface IUsuario {
    public function obtenerUsuarios();
    public function obtenerUsuariosPorId($id);
    public function crearUsuario(Usuario $usuario);
    public function modificarUsuario(Usuario $usuario);
    public function eliminarUsuario(Usuario $usuario);
}

?>