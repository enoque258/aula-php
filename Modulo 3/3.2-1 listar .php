<?
//DIA 29/07/2026
//OBJETIVO: ver deversas formas/maneiras de acesso a basse de dados
$conn = pg_connect("host=localhost dbname=meu_banco user=meu_usuario password=minha_senha");

$query = 'SELECT odigo, nome FROM famosos';
$result = pg_query($conn, $query);

if($result){
    while $row = pg_fetch_assoc($result){
        print $row['codigo'] . ' - ' . $row['nome'] . '<br>';
    }
}

print_r($row);
pg_close($conn);
