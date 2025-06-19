<?php
class DB
{
    private $host = "localhost";
    private $port = "5432";
    private $user = "postges";
    private $password = "123";
    private $database = "MascaFierroAQP";
    private PDO $pdo;
    public function conectar()
    {
        try {

            $this->pdo = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->database}",
                $this->user,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $this->pdo;
        } catch (PDOException $e) {

            throw new Exception("Error al conectarse a la base de datos: " . $e->getMessage());
        }
    }
}
