<?
//DIA 29/07/2026
//OBJETIVO: ver deversas formas/maneiras de acesso a basse de dados

try{
//usar pdo e conn para conexao usando new
$conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');
//leitura de erro do conn
$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = $conn->query("SELECT codigo, nome FROM famosos");

    if ($result)
    {
        foreach ($result as $row)
        {
            print $row['codigo'] . ' - ' . $row['nome'] . '<br>';
        }
    }

    $conn = null;
}
catch (PDOException $e)
{
    print 'Erro: ' . $e->getMessage();
}
?>

 

 


