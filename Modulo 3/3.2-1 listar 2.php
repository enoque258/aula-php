<?
//DIA 29/07/2026
//OBJETIVO: ver deversas formas/maneiras de acesso a basse de dados
$conn = pg_connect("host=localhost dbname=meu_banco user=meu_usuario password=minha_senha");

$query = 'SELECT codigo, nome FROM famosos';

$result = mysqli_query($conn, $query);

if ($result){
    while ($row = mysqli_fetch_assoc($result)){
        print $row['codigo'] . ' - ' . $row['nome'] . '<br>';
    }
}

pg_close($conn);
