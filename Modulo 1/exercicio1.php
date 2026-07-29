<?php

// 1. Criar o vetor bidimensional
$pessoas = [
    "Joao001" => [
        "codigo" => "001",
        "nome" => "joão",
        "endereco" => "Rua do João"
    ],
    "Ari002" => [
        "codigo" => "002",
        "nome" => "ari",
        "endereco" => "Rua do Ari"
    ]
];

// 2. Ordenar o vetor pela chave, mantendo as associações
ksort($pessoas);

// 3. Função para converter nomes para StudlyCaps
function converterParaStudlyCaps($texto)
{
    return str_replace(' ', '', ucwords(strtolower($texto)));
}

// 4. Gerar a tabela HTML
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercício sobre Vetores</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            border-collapse: collapse;
            width: 600px;
        }

        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            font-size: 24px;
        }
    </style>
</head>
<body>

    <h1>Tabela de Pessoas</h1>

    <table>
        <thead>
            <tr>
                <th>Chave</th>
                <th>Código</th>
                <th>Nome</th>
                <th>Endereço</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($pessoas as $chave => $dados): ?>
                <tr>
                    <td><?php echo $chave; ?></td>
                    <td><?php echo $dados["codigo"]; ?></td>
                    <td><?php echo converterParaStudlyCaps($dados["nome"]); ?></td>
                    <td><?php echo $dados["endereco"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>