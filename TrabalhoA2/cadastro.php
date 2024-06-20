<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$allowed_pages = ['perfil', 'cadastroreles', 'cadastroservidores', 'cadastrotma', 'cadastrousuarios', 'cadastrogeracao', 'geracaomensal', 'configuracoes'];

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}
?>