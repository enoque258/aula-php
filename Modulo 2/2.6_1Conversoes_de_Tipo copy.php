 <?php

$produto = mew stdClass;
$produto ->descricao = 'Chocolate';
$produto ->estoque = 100;
$produto ->preco = 7;

//manipulacao dos vetores 
$vetor1 = (array) $produto;
$vetor2 = ['descricao' => 'cafe', 
           'estoque' => 50,
           'preco' => 10
          ];
//objeto 
$produto2 = (object) $vetor2;

//converta um vetor para objeto e um objeto em vetor
//forma 1 de imprimir
echo '<pre>';
var_dump($vetor1);
var_dump($produto2);
//forma 2 de imprimir
print $vetor1['descricao'];
print $produto2->descricao;
echo '</pre>';


