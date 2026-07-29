<?
//DIA 29/07/2026
//OBJETIVO: ver deversas formas/maneiras de acesso a basse de dados

//usar pdo e conn para conexao usando new
$conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');

//leitura de erro do conn
$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");

    $conn = null;
}
catch (PDOException $e)
{
    print $e->getMessage();
//varios tipos de erro 


}
?>