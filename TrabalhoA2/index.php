<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes PHP</title>
</head>

<body>

    <form method="post">
        <input placeholder="Titulo" type="text" name="titulo">
        <input placeholder="Autor" type="text" name="autor">
        <input placeholder="Sinopse" type="text" name="sinopse">
        <input placeholder="Nota" type="text" name="nota">
        <input type="submit" value="Enviar" name="submit">
    </form>

    <?php
    require_once "banco.php";

    ?>

</body>

</html>