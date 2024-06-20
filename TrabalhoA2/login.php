<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

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
<body>

<?php
session_start();

$usu = $_SESSION["usuario"] ?? null;

if (!is_null($usu)) {
    // Usuário já está logado
    header("Location: filmes.php"); // Redirecionar para a página de filmes
    exit();
} else {
    require_once "banco.php";

    $email = $_POST['email'] ?? null;
    $senha = $_POST['password'] ?? null;

    if (!is_null($email) && !is_null($senha)) {
        $stmt = $banco->prepare("SELECT * FROM usuarios WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 0) {
            echo "<p>Usuário não existe</p>";
        } else {
            $obj = $resultado->fetch_object();
            if (password_verify($senha, $obj->senha)) {
                $_SESSION["usuario"] = $obj->email;
                $_SESSION["cod_usuario"] = $obj->cod;
                header("Location: filmes.php"); // Redirecionar para a página de filmes
                exit();
            } else {
                echo "<p>Senha incorreta!</p>";
            }
        }
        $stmt->close();
    }
}

$banco->close();
?>


<div>
    <h1>Login</h1>
    <form id="login-form" method="post" action="">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Senha</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="cadastro.php">Faça seu cadastro</a></p>
</div>

</body>
</html>