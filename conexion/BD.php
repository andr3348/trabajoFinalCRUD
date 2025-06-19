<?php
class DB
{
    private string $host;
    private int $port;
    private string $user;
    private string $password;
    private string $database;
    private ?PDO $pdo;

    public function __construct()
    {
        $this->host = "localhost";
        $this->port = "5432";
        $this->user = "postges";
        $this->password = "123";
        $this->database = "MascaFierroAQP";
    }

    public function conectar(): ?PDO
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
