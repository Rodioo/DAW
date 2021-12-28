<?php
        session_start();
        $token = 'abc123abc123';
        $_SESSION['token'] = $token;
        
        require_once('connection.php');

        if(isset($_POST['btn-save']))
        {
            if(!empty($_POST['spam'])) die("Spam alert");//fac un field in form invizibil iar daca este completat inseamna ca e un bot care face formularul asa ca il inchid
            $compToken = $_POST['token'];
            if($compToken === $token) {
                $email = htmlspecialchars(mysqli_real_escape_string($con, $_POST['email']));
                $nr_pen = htmlspecialchars(mysqli_real_escape_string($con, $_POST['nr_pen']));
                $sql = "update users set nr_penalizari = '$nr_pen' where email = '$email' and rol = 'client';";
                mysqli_query($con, $sql);
                if(mysqli_affected_rows($con) == 0)
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Nu exista niciun client cu acest email.');
                    window.location.href='home.php';
                    </script>");
                else
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Penalizari modificate cu succes.');
                    window.location.href='home.php';
                    </script>");
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
                <input type = "text" placeholder="E-mail client" class="txt" name="email" required>
                <input type = "text" placeholder="Numar nou de penalizari" class="txt" name = "nr_pen" required>
                <input type = "submit" value="Modifica" class="registerBtn" name="btn-save">
            </form>
        </div>
        
    </body>
</html>