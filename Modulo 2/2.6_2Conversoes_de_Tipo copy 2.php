 <?php

$produto = [];
$produto ['descricao'] = 'Chocolate';
$produto = ['estoque'] = 100;
$produto = ['preco'] = 7;

//criacao de objetos
$objeto= new stdClass;
//$objeto = (object) $produto;
//objeto vazio
foreach ($produto as $chave => $valor){
    $objeto ->$chave = $valor;
}

print_r($objeto);