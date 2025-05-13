<?php
require_once 'conexao.php';

class Usuario {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    // Função para validar o login
    public function validarLogin($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return true;
        }

        return false;
    }

    // Função para cadastrar um novo usuário
    public function cadastrarUsuario($email, $senha) {
        // Verificar se o email já existe
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // E-mail já existe
        }

        // Inserir o novo usuário no banco
        $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }
}
?>
