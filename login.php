<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>

    
<?php

session_start();

$usu = $_SESSION["usuario"] ?? null;

if(!is_null($usu)){
    // estou logado
}else{
    
        require_once "banco.php";
    
        $usu = $_POST['usuario'] ?? null;
        $sen = $_POST['senha'] ?? null;

        if(is_null($usu) || is_null($sen)){
            
        }else{

            echo "~ [Usuario: $usu - Senha: $sen] ~ <br>";

            $busca = $banco->query("SELECT * FROM usuarios WHERE usuario='$usu'");

            if($busca->num_rows == 0){
                echo "<br> Usuário não existe";
            }else{
                echo "<br> Login efetuado!";
                
                $obj = $busca->fetch_object();
                echo "<br>" . $obj->cod;
                echo "<br>" . $obj->usuario;
                echo "<br>" . $obj->nome;
                echo "<br>" . $obj->senha;

                if($sen === $obj->senha){
                //if(password_verify($sen, $obj->senha)){
                    echo "<br>";
                    $_SESSION["usuario"] = $usu;
                    $_SESSION["cod_usuario"] = $obj->cod;
                }else{
                    echo "<br> Senha incorreta!";
                }

            }

            
        }
    }
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
    <p>Não tem uma conta? <a href="Cadastro.html">Faça seu cadastro</a></p>
</div>

</body>
</html>
