<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <!-- FONTE MONTSERRAT' -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);
        font-family: "Montserrat", sans-serif;
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
            
                <input class="form-control" type="text" placeholder="usuario" name="usuario"> 
            
                <input class="form-control" type="password" placeholder="senha" name="senha">
                
            <input class="btn btn-primary" type="submit" value="Entrar">
        </form>
        <a class="link-offset-2" href="cadastro.php">Faça seu cadastro</a>

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