<?php
//Get Heroku ClearDB connection information
    $host = "eu-cdbr-west-01.cleardb.com";
    $user = "b3d50e11cd16c4";
    $pass = "a7b0f45d";
    $db = "heroku_ab134baabfb7904";

    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $db);
?>