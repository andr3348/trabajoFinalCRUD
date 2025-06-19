<?php
require_once '../interfaces/IUsuario.php';
require_once '../model/Usuario.php';
require_once '../conexion/DB.php';

class LUsuario implements IUsuario {
    private $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->conectar();
    }

    public function obtenerUsuarios(){
        try {
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los usuarios: " . $e->getMessage());
        }
    }

    public function obtenerUsuariosPorId($id){
        try {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($row['id']);
                $usuario->setNombre($row['id']);
                $usuario->setCorreo($row['id']);
                $usuario->setPassword($row['id']);
            }
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el usuario: " . $e->getMessage());
        }

    };

    public function crearUsuario(Usuario $usuario){
        try {
            $sql = "INSERT INTO usuario (nombre, correo, password) VALUES (:nombre, :correo, :passw)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $usuario->getNombre(),
                ':correo' => $usuario->getCorreo(),
                ':passw' => $usuario->getPassword()
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error al crear el nuevo usuario: " . $e->getMessage());
        }
    };

    public function modificarUsuario(Usuario $usuario){
        try {
            $sql = "UPDATE usuario SET  nombre = :nombre, correo = :correo, password = :passw WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $usuario->getNombre(),
                ':correo' => $usuario->getCorreo(),
                ':passw' => $usuario->getPassword(),
                ':id' => $usuario->getIdUsuario()
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los usuarios: " . $e->getMessage());
        }
    };

    public function eliminarUsuario(Usuario $usuario){
        try {
            $sql = "DELETE FROM usuario WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $usuario->getIdUsuario()
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar el usuario: " . $e->getMessage());
        }
    };
}

?>