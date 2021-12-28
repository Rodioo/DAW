<?php

    session_start();
    $token = 'abc123abc123';
    $_SESSION['token'] = $token;

    require_once('connection.php');

    if(isset($_POST['email'])){
        if(!empty($_POST['spam'])) die("Spam alert");//fac un field in form invizibil iar daca este completat inseamna ca e un bot care face formularul asa ca il inchid
        $compToken = $_POST['token'];
        if($compToken === $token) {
            $email = htmlspecialchars(mysqli_real_escape_string($con, $_POST['email']));
            $pass = htmlspecialchars(mysqli_real_escape_string($con, $_POST['pass']));
            $pass = md5($pass);

            $sql = "select * from users where email='".$email."' and parola='".$pass."' limit 1";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) == 1){
                
                $row = $result->fetch_assoc();
                $_SESSION['loggedin'] = true;
                $_SESSION['agent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['email'] = $email;
                $_SESSION['nume'] = $row['nume'];
                $_SESSION['prenume'] = $row["prenume"];
                $_SESSION['nr_penalizari'] = $row["nr_penalizari"];
                $_SESSION['rol'] = $row["rol"];
                if($_SESSION['agent'] != $_SERVER['HTTP_USER_AGENT']) {
                    die('Sesiunea ar putea fi compromisa (HTTP Spoofing).');
                }
                header("Location:mainCont.php");
                exit();
            }
            else{
                echo '<script>alert("Email/parola gresita")</script>';
            }
        } 
        else
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Form spoofing/CSRF error.');
                window.location.href='home.php';
                </script>");

    }
?>




<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Lumea cartii</title>
        <link rel = "stylesheet" href = "cont.css">
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Book_Hexagonal_Icon.svg/1189px-Book_Hexagonal_Icon.svg.png">
    </head>
    <body>
        <header id = "head">
            <a href = "home.php" class = "acasa">
                <img id = "homeImg" src= https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Book_Hexagonal_Icon.svg/1189px-Book_Hexagonal_Icon.svg.png alt="Acasa">
            </a>

            <div class = "titlucitat">
                <h1 id="titlu">LUMEA CARTII</h1>
                <h4 class="citat">
                    <div>o</div>
                    <div>biblioteca</div>
                    <div>e infinitul sub un singur acoperis</div>
                </h4>
                <hr>  
            </div>

            <div class = "cont">
                <a href = "mainCont.php" class = "contTxt">CONTUL TAU</a>
            </div>   
        </header>
        <div class = "meniu">
            <a href = "home.php">Acasa</a>
            <a href = "carti.php">Cauta carti</a>
            <a href = "index.php">Despre</a>
        </div>
        <div class="signup-form">
            <form action ="#" method="post">
                <input style ="display:none" type="text" id="spam" name="spam">
                <input type="hidden"  value="abc123abc123" name="token">
                <input type = "email" placeholder="Email" class="txt" name = "email" required>
                <input type = "password" placeholder="Parola" class="txt" name = "pass" required>
                <input type = "submit" value="Login" class="registerBtn" name="btn-save">
            </form>
            <a id = "goLog" href="cont.php">Nu ai cont? Inregistreaza-te aici</a></a>
        </div>
        
    </body>
</html>