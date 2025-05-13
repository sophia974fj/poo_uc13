<?php
class Conexao {
    private $host = "localhost";
    private $db = "seu_banco";
    private $usuario = "root";
    private $senha = "";
    public $conn;

    public function conectar() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
?>
