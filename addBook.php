<?php
    session_start();
    $token = 'abc123abc123';
    $_SESSION['token'] = $token;
    require_once('connection.php');

    if(isset($_POST['btn-save']))
    {
        if(!empty($_POST['spam'])) die("Spam alert");//fac un field in form invizibil iar daca este completat inseamna ca e un bot care face formularul asa ca il inchid
        $compToken = $_POST['token'];
        if($compToken === $token){
            $isbn = htmlspecialchars(mysqli_real_escape_string($con, $_POST['isbn']));
            $titlu = htmlspecialchars(mysqli_real_escape_string($con, $_POST['titlu']));
            $autor = htmlspecialchars(mysqli_real_escape_string($con, $_POST['autor']));
            $categ = htmlspecialchars(mysqli_real_escape_string($con, $_POST['categorie']));
            $desc = htmlspecialchars(mysqli_real_escape_string($con, $_POST['descriere']));
            $url_img = htmlspecialchars(mysqli_real_escape_string($con, $_POST['url_img']));
            $nr_exemplare = htmlspecialchars(mysqli_real_escape_string($con, $_POST['nr_exemplare']));

            $sql = "insert into books (isbn, titlu, autor, categorie, descriere, url_img, nr_exemplare) values('$isbn', '$titlu', '$autor', '$categ', '$desc', '$url_img', '$nr_exemplare')";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Carte adaugata cu succes.');
                window.location.href='carti.php';
                </script>");
            }
            else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Eroare la adaugarea cartii.');
                window.location.href='mainCont.php';
                </script>");            
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
                <input type="hidden"  value='abc123abc123' name="token">
                <input type = "text" placeholder="ISBN" class="txt" name="isbn" required>
                <input type = "text" placeholder="Titlu" class="txt" name="titlu" required>
                <input type = "text" placeholder="Autor" class="txt" name = "autor" required>
                <input type = "text" placeholder="Categorie" class="txt" name = "categorie" required>
                <input type = "text" placeholder="Descriere" class="txt" name = "descriere" required>
                <input type = "text" placeholder="URL imagine" class="txt" name = "url_img" required>
                <input type = "text" placeholder="Numar exemplare" class="txt" name = "nr_exemplare" required>
                <input type = "submit" value="Adauga" class="registerBtn" name="btn-save">
            </form>
        </div>
        
    </body>
</html>