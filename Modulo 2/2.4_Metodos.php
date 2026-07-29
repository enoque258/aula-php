//adcionar metodo no codigo da aula anterior
<?php
class Produto{
    public $descricao;
    public $estoque;
    public $preco;
}

//metodo aumentar
public function aumentarEstoque($unidades) {
    if(is_numeric($unidades) and $unidades >=0) {
        $this->estoque += $unidades;
    }
}
//metodo deminuir
public function diminuirEstoque($unidades) {
    if(is_numeric($unidades) and $unidades >=0) {
        $this->estoque -= $unidades;
    }
}
//metodo de reajuste abaixo 
public function reajustarPreco($percentual) {
    if(is_numeric($percentual) and $percentual >=0) {
        $this->preco *= (1 + $percentual / 100);
    }
}


//1-criar o metodo aumentar
$p1 = new Produto;
$p1->descricao = 'Chocolate';
$p1->estoque = 10;
$p1->preco = 5;

//montando uma string na tela outra forma sem dar var_drump abaixo
echo 'Produto: ' . $p1->descricao . ' - Estoque: ' . $p1->estoque . ' - Preço: ' . $p1->preco . '<br>';
$pl->aumentarEstoque(10);
$p1->reajustarPreco(10);
$p1->diminuirEstoque(5);


//para chamar os metodos
echo '<pre>';
var_dump($p1);
echo '</pre>'; 
$pl->aumentarEstoque(10);
$p1->reajustarPreco(10);
$p1->diminuirEstoque(5);
echo '<pre>';
var_dump($p1);
echo '</pre>';


//2-criar o metodo diminuir
$p1 = new Produto;
$p1->descricao = 'Chocolate';
$p1->estoque = 10;
$p1->preco = 5;
$pl->diminuirEstoque(10);






$p2 = new Produto;
$p2->descricao = 'Café';
$p2->estoque = 20;
$p2->preco = 10;

print $p1->descricao;

//fazer com que tenha uma visualização melhor do objeto
echo '<pre>';
var_dump($p1);
echo '</pre>';
