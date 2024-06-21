<pre>

    <?php
    $banco = new mysqli("localhost:3307", "root", "", "system_db");

    $idUsuario = $_SESSION['id_usuario'];
    function cadastrarFilme($titulo, $autor, $sinopse, $nota): void
    {
        global $banco;
        $busca = $banco->query("SELECT * FROM usuarios WHERE usuario = '{$_SESSION['usuario']}'");
        $obj = $busca->fetch_object();

        $banco->query("INSERT INTO filmes(titulo, autor, sinopse, nota, ID_usuario) VALUES ('$titulo', '$autor', '$sinopse', '$nota', '" .  $obj->ID . "')");
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
        $removerAll = $banco->query("DELETE FROM filmes WHERE ID > 0 AND ID_usuario = $idUsuario");
    }

    if (isset($_POST['remove'])) {
        $id = $_POST['id'];
        if ($id > 0) {
            $remover = $banco->query("DELETE FROM filmes WHERE ID = $id AND ID_usuario = $idUsuario");
        }
    }

    $busca = "SELECT * FROM filmes WHERE ID_usuario = $idUsuario";
    $buscaAll = $banco->query($busca);


    echo "<ul>";
    while ($obj = $buscaAll->fetch_object()) {

        echo "<form class='formFilme' method='post'>";
        echo "<li>Titulo: " . $obj->titulo . " <br> Autor: " . $obj->autor . " <br> Sinopse: " . $obj->sinopse . " <br> Nota: " . $obj->nota . "</li>";
        echo  "<input type='hidden' name='id' value='$obj->ID'><input class='btn btn-primary' type='submit' value='Remover' name='remove'></form>";
    }
    echo "</ul>";
    ?>
</pre>