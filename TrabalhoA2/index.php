<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes PHP</title>
    <style>
        body {
            background-color: #454545;
            margin: 0;
        }

        .formMain {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
            margin: 40px 0 0 30px;
        }

        .formMain>input {
            padding: 8px;
            border-radius: 10px;
        }

        ul {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 0;
            list-style: none;
            margin: 5px 10px 5px;
        }

        li {
            color: white;
            background-color: #581845;
            width: 200px;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            overflow: hidden;
        }

        .titulo {
            font-size: 10px;
        }
    </style>
</head>

<body>

    <form class="formMain" method="post">
        <input placeholder="Titulo" type="text" name="titulo">
        <input placeholder="Autor" type="text" name="autor">
        <input id="sinopse" placeholder="Sinopse" type="text" name="sinopse">
        <input placeholder="Nota" type="text" name="nota">
        <input type="submit" value="Enviar" name="submit">
        <input type="submit" value="Apagar Tudo" name="removeAll">
    </form>

    <?php
    require_once "banco.php";

    ?>

</body>

</html>