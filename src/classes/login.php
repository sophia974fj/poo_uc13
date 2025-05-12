<?php
 
class login {
    public $nome;
    private $senha;
    
 
    // Construtor com validação
    public function __construct($nome, $senha) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }

        if (empty($senha)) {
            throw new Exception("O campo Senha é obrigatório.");
        }


        $this->nome = $nome;
        $this->senha = $senha;

    }
 
    // Getter do CPF (encapsulamento)
    public function getSenha() {
        return $this->senha;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Senha: <strong>" . $this->getSenha() . "</strong></p>";
    }
}