<pre>
<?php

$banco = new mysqli("localhost", "root", "", "system_db");



function cadastrarUsuario($usuario, $senha, $nome, $email): void
{
    global $banco;

    $add = "INSERT INTO usuarios (usuario, senha, nome, email) VALUES ('$usuario', '$senha', '$nome', '$email')";

    $banco->query($add);
}



?>
</pre>