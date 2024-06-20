<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div>
        <h1>Cadastro</h1>
        <form id="cadastro" method="post" action="">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario">
            <br><br>
            <label for="senha">Senha</label>
            <input type="text" id="senha" name="senha">
            <br><br>
            <label for="nome">nome</label>
            <input type="text" name="nome" id="nome">
            <br><br>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
            <br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>

    <style>
        body {
            font-family: "Roboto", sans-serif;
        }

        div {
            max-width: 700px;
            margin: auto;
        }

        form > * {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 5px;
        }

        label {
            margin-top: 10px;
        }

        button {
            margin-top: 20px;
            margin-bottom: 50px;
        }

        h1 {
            text-align: center;
        }
    </style>
</body>
</html>

<?php
session_start();

$usuarios = [
    'usuario@example.com' => 'senha123'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (isset($usuarios[$email]) && $usuarios[$email] == $senha) {
        $_SESSION['usuario'] = $email;
        header('Location: index.php');
        exit();
    } else {
        $erro = "Email ou senha inválidos!";
    }
}

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

?>
