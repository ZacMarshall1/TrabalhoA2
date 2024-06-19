<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes PHP</title>
    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .container {
            margin: auto 0;
            display: flex;
            gap: 20px;
        }

        #nota {
            width: 208px;
        }

        .notaLabel {
            color: white;
            font-family:Verdana, Geneva, Tahoma, sans-serif
        }

        p {
            color: white;
            font-size: 20px;
            margin-top: 45px;
        }

    </style>
</head>

<body>
    <div class="container">
        <form class="formMain" method="post">
            <div class="form-group">
                <input class="form-control" placeholder="Titulo" type="text" name="titulo">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Autor" type="text" name="autor">
            </div>
            <div class="form-group">
                <input class="form-control" id="sinopse" placeholder="Sinopse" type="text" name="sinopse">
            </div>
            <div class="form-group">
                <label class="notaLabel" for="nota">NOTA</label>
                <select class="form-control" name="nota" id="nota">
                    <option value="0">Selecione ></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <!-- <input type="submit" value="Enviar" name="submit"> -->
            <button class="btn bg-primary" name="submit" value="Enviar">Enviar</button>

            <!-- <input type="submit" value="Apagar Tudo" name="removeAll"> -->
            <button class="btn bg-danger" type="submit" value="Apagar Tudo" name="removeAll">Apagar Tudo</button>
        </form>
        <?php
        require_once "banco.php";

        ?>
    </div>


</body>

</html>