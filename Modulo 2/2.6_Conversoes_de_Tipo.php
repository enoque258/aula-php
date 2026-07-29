 <?php

$produto = mew stdClass;
$produto ->descricao = 'Chocolate';
$produto ->estoque = 100;
$produto ->preco = 7;

//forma 1 de imprimir
echo '<pre>';
var_dump($produto);

//forma 2 de imprimir
print $produto ->descricao;
echo '</pre>';

//converta um vetor para objeto e um objeto em vetor
