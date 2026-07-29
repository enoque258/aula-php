<?php

class Produto
{
    // As propriedades são declaradas e inicializadas automaticamente.
    // O PHP cria estas propriedades "por trás dos panos":
    //
    // private string $descricao;
    // private int $estoque;
    // private float $preco;

    public function __construct(
        private string $descricao,
        private int $estoque,
        private float $preco
    ) {
        // Este bloco pode ficar vazio.
        // O PHP já guardou os valores nas propriedades.
    }

    // Retorna a descrição, estoque e preço do produto. metodo get
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getEstoque()
    {
        return $this->estoque;
    }
    public function getPreco()
    {
        return $this->preco;
    }

    // Executado automaticamente quando o objeto é destruído.
    public function __destruct()
    {
        echo "<br>O produto '{$this->descricao}' foi removido da memória.";
    }
}

// Cria o objeto.
// O construtor é chamado automaticamente.
$produto = new Produto("Chocolate", 10, 5);

// Utilizando os métodos GET para obter os dados.
echo "Descrição: " . $produto->getDescricao() . "<br>";
echo "Estoque: " . $produto->getEstoque() . "<br>";
echo "Preço: " . $produto->getPreco() . " MT";




/*
Sistema empresarial (ERP, estoque, banco, financeiro):

Use setters com validação:

$this->setPreco($preco);

Porque você controla regras.

Exemplo:

Preço nunca pode ser negativo
Estoque nunca pode ser menor que zero
Email deve ser válido
Data deve ser correta
*/