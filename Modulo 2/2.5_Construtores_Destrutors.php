<?
// Declaração da classe Produto
class Produto
{
    // Propriedades (atributos) privadas da classe
    private $descricao;
    private $estoque;
    private $preco;

    //CONSTRUTOR É executado automaticamente quando um objeto é criado.
    public function __construct($descricao, $estoque, $preco)
    {
        // Chama o métodos para guardar os valores nas propriedades privadas
        $this->setDescricao($descricao);
        $this->setEstoque($estoque);
        $this->setPreco($preco);
    }

    //DESTRUTOR É executado automaticamente quando o objeto é destruído.Normalmente acontece no fim do script.
    public function __destruct()
    {
        // Mostra uma mensagem utilizando o getter da descrição
        echo "O produto {$this->getDescricao()} foi removido do sistema.";
    }

    //  set São utilizados para alterar o valor das propriedades.Define a descrição do produto 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    // GETTERS São utilizados para devolver (retornar) os valores das propriedades privadas
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
}

// CRIAÇÃO DO OBJETOO PHP chama automaticamente o construtor (__construct).
// =====================================================

$produto = new Produto("Chocolate", 10, 5);
// UTILIZAÇÃO DOS GETTERSServem para obter os valores armazenados no objeto.
echo "Descrição: " . $produto->getDescricao() . "<br>";
echo "Estoque: " . $produto->getEstoque() . "<br>";
echo "Preço: " . $produto->getPreco() . "<br>";

// Não é necessário chamar o destrutor.
// O PHP fará isso automaticamente quando o script terminar.