<?php

    //require_once('connection.php');
    $host = "eu-cdbr-west-01.cleardb.com";
    $user = "b3d50e11cd16c4";
    $pass = "a7b0f45d";
    $db = "heroku_ab134baabfb7904";

    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $db);


    if(isset($_POST['btn-save']))
    {
        $nume = mysqli_real_escape_string($con, $_POST['nume']);
        $prenume = mysqli_real_escape_string($con, $_POST['prenume']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
        $cpass = mysqli_real_escape_string($con, $_POST['cpass']);

        if($pass != $cpass)
            echo 'Parolele nu sunt la fel.';
        else{
            $pass = md5($pass);
            $sql = "insert into users (nume, prenume, email, parola, nr_penalizari) values('$nume', '$prenume', '$email', '$pass', 0)";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Cont creat cu succes.');
                window.location.href='login.php';
                </script>");
            }
            else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Eroare la crearea contului.');
                window.location.href='cont.php';
                </script>");            }
            
            
        }
    }

?>