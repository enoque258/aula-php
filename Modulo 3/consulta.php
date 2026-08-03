<?php
function lista_combo_cidades()
{
    $conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');

    $output = '';
    $result = pg_query($conn, 'SELECT id, nome FROM cidade');
    if ($result)
    {
        while ($row = pg_fetch_assoc($result))
        {
            $id = $row ['id'];
            $nome = $row ['nome'];

            $output .= "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
    }
    pg_close($conn);
    return $output;
}