<?php

    session_start();

    require_once('connection.php');

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass = md5($pass);

        $sql = "select * from users where email='".$email."' and parola='".$pass."' limit 1";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1){
            
            $row = $result->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['nume'] = $row['nume'];
            $_SESSION['prenume'] = $row["prenume"];
            $_SESSION['nr_penalizari'] = $row["nr_penalizari"];
            header("Location:mainCont.php");
            exit();
        }
        else{
            echo '<script>alert("Email/parola gresita")</script>';
        }

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
            <a href = "home.html" class = "acasa">
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
        <div class ="container">
            <form id = "search">
                <input type = "text" id = "txtSearch" placeholder="Cauta dupa numele cartii" id = "searchBar">
                <button type = "submit" id = "btnSearch"> 
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/1200px-Magnifying_glass_icon.svg.png">
                </button>
            </form> 
        </div>
        <div class = "meniu">
            <a href = "home.html">Acasa</a>
            <a href = "carti.html">Carti</a>
            <a href = "index.html">Despre</a>
        </div>
        <div class="signup-form">
            <form action ="#" method="post">
                <input type = "email" placeholder="Email" class="txt" name = "email" required>
                <input type = "password" placeholder="Parola" class="txt" name = "pass" required>
                <input type = "submit" value="Login" class="registerBtn" name="btn-save">
            </form>
            <a id = "goLog" href="cont.php">Nu ai cont? Inregistreaza-te aici</a></a>
        </div>
        
    </body>
</html>