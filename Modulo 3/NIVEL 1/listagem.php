<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Pessoas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <table>
        <thead>
            
            <tr>
                <th class="col-acao"></th>
                <th class="col-acao"></th>
                <th>Id</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'livro');

                // Verifica se a conexão falhou
                if (!$conn) {
                    die("Erro na conexão: " . mysqli_connect_error());
                }

                // Executa a consulta no MySQL
                $result = mysqli_query($conn, 'SELECT * FROM pessoa ORDER BY id');

                // Percorre os resultados com mysqli_fetch_assoc
                while ($row = mysqli_fetch_assoc($result))
                {
                    $id        = $row['id'];
                    $nome      = $row['nome'];
                    $endereco  = $row['endereco'];
                    $bairro    = $row['bairro'];
                    $telefone  = $row['telefone'];
                    $id_cidade = $row['id_cidade'];

                    print "<tr>";
                    print "<td>";
                    print "<a href='pessoa_form_edit.php?id={$id}' class='btn-acao btn-editar' title='Editar'><i class='bi bi-pencil-square'></i></a>";
                    print "<a href='pessoa_delete.php?id={$id}' class='btn-acao btn-excluir' title='Excluir' onclick='return confirm(\"Tem certeza que deseja excluir esta pessoa?\")'><i class='bi bi-trash-fill'></i></a>";
                    print "</td>";
                    print "<td>{$id}</td>";
                    print "<td>{$nome}</td>";
                    print "<td>{$endereco}</td>";
                    print "<td>{$bairro}</td>";
                    print "<td>{$telefone}</td>";
                    print "</tr>";
                }

                // Fecha a conexão no MySQL
                mysqli_close($conn);
                ?>

        </tbody>
    </table>
    <button onclick="window.location='formularioinsercao.php'">
        <img src="images/insert.svg" style="width:17px"> Inserir
    </button>
    

    

</body>
</html>