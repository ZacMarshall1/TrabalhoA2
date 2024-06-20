<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes PHP</title>

    <!-- FONT MONSTSERRAT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            /* background: radial-gradient(circle at 24.1% 68.8%, rgb(50, 50, 50) 0%, rgb(0, 0, 0) 99.4%); */
            background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);
            font-family: "Montserrat", sans-serif;
            margin: 0;
        }

        h2 {
            /* color: white; */
            color: black;
            margin: 20px 0 0 65px;
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
            background: linear-gradient(112.1deg, rgb(32, 38, 57) 11.4%, rgb(63, 76, 119) 70.2%);
            width: 200px;
            height: 250px;
            margin: 8px 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 3px 3px 16px black;
            overflow: hidden;
        }

        .btn{
            color: white;
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
            /* color: white; */
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif
        }

        p {
            color: white;
            font-size: 20px;
            margin-top: 45px;
        }

        .formPhp {
            margin: 30px 0 0 0;
        }
    </style>
</head>

<body>
    <h2>FILME PHP</h2>
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
        <div class="formPhp">
            <?php
            require_once "banco.php";

            ?>
        </div>
    </div>


</body>

</html>