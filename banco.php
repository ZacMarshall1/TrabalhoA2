<?php
    $banco = new mysqli("localhost", "root", "", "system_db");

    $busca = $banco->query("SELECT * FROM usuario");
    echo var_dump($busca);
    echo print_r($busca);

    echo "<br>----------------------------<br>";
    $obj = $busca->fetch_object();
    echo print_r($obj);


?>