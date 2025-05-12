<?php
 
class Escola {
    public $nome;
    public $endereco;
    public $cidade;
    private $cnpj;
    
 
    // Construtor com validação
    public function __construct($nome, $endereco, $cidade, $cnpj) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (empty($endereço)) {
            throw new Exception("O campo endereço é obrigatório.");
        }
        if (empty($cidade)) {
            throw new Exception("O campo cidade é obrigatório.");
        }

        if (empty($cnpj)) {
            throw new Exception("O campo CNPJ é obrigatório.");
        }


        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->cnpj = $cnpj;
    }
 
    // Getter do CPF (encapsulamento)
    public function getCnpj() {
        return $this->cnpj;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Endereço: <strong>$this->endereco</strong> anos<br>";
        echo "CNPJ: <strong>" . $this->getCnpj() . "</strong></p>";
        echo "<p>Cidade: <strong>$this->cidade</strong></p>";
    }
}