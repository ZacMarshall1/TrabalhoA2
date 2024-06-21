<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <!-- FONTE MONTSERRAT' -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);
            font-family: "Montserrat", sans-serif;
            margin: 0;
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

        .btn {
            margin-top: 10px;
        }

        .UsuarioDuplicado {
            font-size: 15px;
            background-color: red;
            color: white;
            margin-inline: 100px;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Cadastre-se</h1>
        <div class="mb-3">
            <form method="post" action="">
                <input class="form-control" type="text" name="usuario" placeholder="Usuário">

                <input class="form-control" type="password" name="senha" placeholder="Senha">

                <input class="form-control" type="text" name="nome" placeholder="Nome">

                <input class="form-control" type="text" name="email" placeholder="Email">

                <input class="btn btn-primary" type="submit" name="enviar" value="Enviar">
                <a class="btn btn-warning" href="login.php">Entrar</a>
        </div>

    </div>

    <?php
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;

    if (isset($_POST['enviar'])) {

        if (empty($usuario) || empty($senha) || empty($nome) || empty($email)) {
            echo "<p class='UsuarioDuplicado'>Algum campo está vazio!</p>";
        } else {
            require_once "banco.php";
            $busca = $banco->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
            $obj = $busca->fetch_object();
            if (is_null($obj)) {

                cadastrarUsuario($usuario, $senha, $nome, $email);
                header("Location: login.php");
            } else {
                echo "<p class='UsuarioDuplicado'>Já tem um usuario com esse nome!</p>";
            }
        }
    }

    ?>
</body>

</html>