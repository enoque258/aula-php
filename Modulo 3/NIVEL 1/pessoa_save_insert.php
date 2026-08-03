<?php
$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
if (!$conn) {
    die('Erro de conexão com o banco de dados.');
}

$nome = trim($_POST['nome'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');
$bairro = trim($_POST['bairro'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$email = trim($_POST['email'] ?? '');
$id_cidade = intval($_POST['id_cidade'] ?? 0);

if ($nome === '' || $id_cidade <= 0) {
    die('Nome e cidade são obrigatórios.');
}

$nome = pg_escape_string($conn, $nome);
$endereco = pg_escape_string($conn, $endereco);
$bairro = pg_escape_string($conn, $bairro);
$telefone = pg_escape_string($conn, $telefone);
$email = pg_escape_string($conn, $email);

$sql = "INSERT INTO pessoa (nome, endereco, bairro, telefone, email, id_cidade) VALUES ('{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', {$id_cidade})";
$result = pg_query($conn, $sql);

if (!$result) {
    echo 'Erro ao inserir: ' . pg_last_error($conn);
    pg_close($conn);
    exit;
}

pg_close($conn);
header('Location: listagem.php');
exit;
