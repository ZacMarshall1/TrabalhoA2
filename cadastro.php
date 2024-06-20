<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: "Roboto", sans-serif;
        }

        div {
            max-width: 700px;
            margin: auto;
        }

        form>* {
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
</head>

<body>

    <form method="post" action="">
        <input type="text" placeholder="usuario" name="usuario">
        <input type="text" placeholder="senha" name="senha">
        <input type="text" placeholder="nome" name="nome">
        <input type="text" placeholder="email" name="email">
        <input type="submit" id="enviar" name="enviar" value="Enviar">
    </form>
    <a href="login.php">Entrar</a>
    <?php
        $usuario = $_POST['usuario'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;

        if (isset($_POST['enviar'])) {
            require_once "banco.php";

            cadastrarUsuario($usuario, $senha, $nome, $email);
            header("Location: login.php");
        }

    ?>
</body>

</html>