<pre>
<?php

$banco = new mysqli("localhost:3307", "root", "", "system_db");

function cadastrarFilme($titulo, $autor, $sinopse, $nota): void
{
    global $banco;

    $add = "INSERT INTO filmes (titulo, autor, sinopse, nota) VALUES ('$titulo', '$autor', '$sinopse', '$nota')";

    $banco->query($add);
}

if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $sinopse = $_POST['sinopse'];
    $nota = $_POST['nota'];

    if (empty($titulo) || empty($autor) || empty($sinopse) || empty($nota)) {
        echo "<p>Algum campo está vazio!</p>";
    } else {

        cadastrarFilme($titulo, $autor, $sinopse, $nota);
    }
}

if (isset($_POST['removeAll'])) {
    $removerAll = $banco->query("DELETE FROM filmes WHERE ID != 0");
}

if (isset($_POST['remove'])) {
    $id = $_POST['id'];
    if ($id > 0) {
        $remover = $banco->query("DELETE FROM filmes WHERE ID = $id");
    }
}

$buscaAll = $banco->query("SELECT * FROM filmes");


echo "<ul>";
while ($obj = $buscaAll->fetch_object()) {

    echo "<form class='formFilme' method='post'>";
    echo "<br><li>Titulo: " . $obj->titulo . " <br> Autor: " . $obj->autor . " <br> Sinopse: " . $obj->sinopse . " <br> Nota: " . $obj->nota . "</li>";
    echo  "<input type='hidden' name='id' value='$obj->ID'>
        <input type='submit' value='Remover' name='remove'>
    </form>";
}
echo "</ul>";

function cadastrarUsuario($usuario, $senha, $nome, $email): void
{
    global $banco;

    $add = "INSERT INTO usuario (ID, usuario, senha, nome, email) VALUES ('$usuario', '$senha', '$nome', '$email')";

    $banco->query($add);
}

if (isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (empty($usuario) || empty($senha) || empty($nome) || empty($email)) {
        echo "<p>Algum campo está vazio!</p>";
    } else {

        cadastrarUsuario($usuario, $senha, $nome, $email);
    }
}




?>
</pre>