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

    .usuarioN {
        font-size: 15px;
        background-color: red;
        color: white;
    }
</style>

<body>

    <div>
        <h1>Login</h1>
        <form class="login-form" method="post" action="">
            <input type="text" placeholder="usuario" name="usuario">
            <input type="text" placeholder="senha" name="senha">
            <input type="submit" value="Entrar">
        </form>
        <a href="cadastro.php">Faça seu cadastro</a>

        <?php
        session_start();

        $usuario = $_SESSION["usuario"] ?? null;

        if (!is_null($usuario)) {
            header("Location: home.php");
        } else {
            require_once "banco.php";

            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if (!is_null($usuario) && !is_null($senha)) {
                $busca = $banco->query("SELECT * FROM usuarios WHERE usuario='$usuario'");

                if ($busca->num_rows == 0) {
                    echo "<p class='usuarioN'>Usuário não encontrado!</p>";
                    return;
                } else {
                    $obj = $busca->fetch_object();
                    if ($senha == $obj->senha) {
                        $_SESSION['usuario'] = $obj->usuario;
                        $_SESSION['id_usuario'] = $obj->ID;
                        header("Location: home.php");
                    } else {
                        echo "<p class='usuarioN'>Senha incorreta!</p>";
                        return;
                    }
                }
                echo "<p>Algum campo está vazio!</p>";
            }
        }



        ?>

    </div>



</body>

</html>