<pre>
<?php

$banco = new mysqli("localhost:3307", "root", "", "system_db");

function cadastarFilme($titulo, $autor, $sinopse, $nota): void
{
    global $banco;

    $add = "INSERT INTO usuarios (titulo, autor, sinopse, nota) VALUES ('$titulo', '$autor', '$sinopse', '$nota')";

    $banco->query($add);
}

if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $sinopse = $_POST['sinopse'];
    $nota = $_POST['nota'];
    cadastarFilme($titulo, $autor, $sinopse, $nota);
}

$buscaAll = $banco->query("SELECT * FROM usuarios");


echo "<ul>";
while ($obj = $buscaAll->fetch_object()) {

    echo "<br><li>Titulo: " . $obj->titulo . " <br> Autor: " . $obj->autor . " <br> Sinopse: " . $obj->sinopse . " <br> Nota: " . $obj->nota . "</li>";
}
echo "</ul>";


?>
</pre>