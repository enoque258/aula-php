<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            color: #333333;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            display: block;
            width: 100% !important;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        input[type="text"]:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php require_once '../consulta.php'; ?>
    <form method="post" action="pessoa_save_insert.php">
        <label>Nome</label>
        <input name="nome" type="text" required>

        <label>Endereço</label>
        <input name="endereco" type="text">

        <label>Bairro</label>
        <input name="bairro" type="text">

        <label>Telefone</label>
        <input name="telefone" type="text">

        <label>Email</label>
        <input name="email" type="text">

        <label>Cidade</label>
        <select name="id_cidade" required>
            <option value="">Selecione uma cidade</option>
            <?php echo lista_combo_cidades(); ?>
        </select>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
