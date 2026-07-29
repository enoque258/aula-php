<?php

//2) AGREGAÇÃO
//Exemplo: Empresa e Funcionários Ideia:A empresa possui funcionários. Mas o funcionário existe sem a empresa
// CLASSE FUNCIONARIO
class Funcionario{
    private string $nome;
    public function __construct(string $nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }

}

// CLASSE EMPRESA
class Empresa{
    private string $nome;

    // Um array que guarda vários funcionários
    private array $funcionarios = [];
    public function __construct(string $nome){
        $this->nome = $nome;
    }

    // Recebe um funcionário já criado
    public function adicionarFuncionario(
        Funcionario $funcionario
    )
    {

        $this->funcionarios[] = $funcionario;

    }

    public function listarFuncionarios(){
        echo "Empresa: ". $this->nome . "<br><br>";
        echo "Funcionários:<br>";

        foreach($this->funcionarios as $funcionario)
        {
            echo "- "  . $funcionario->getNome(). "<br>";
        }
    }

}


// EXECUÇÃO
// Criamos funcionários primeiro
$funcionario1 = new Funcionario("Ana");
$funcionario2 = new Funcionario("João");

// Criamos empresa
$empresa = new Empresa(  "Mechanical Tecnologia");

// Adicionamos funcionários
$empresa->adicionarFuncionario($funcionario1);
$empresa->adicionarFuncionario($funcionario2);

// Mostrar dados
$empresa->listarFuncionarios();

?>