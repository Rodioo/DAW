<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Lumea cartii</title>
        <link rel = "stylesheet" href = "home.css">
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
        <?php
            require_once('connection.php');
            $sql = "select * from books";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) == 0)
                echo '<script>alert("Nu exista nicio carte in stoc.")</script>';

            while ($row = $result->fetch_assoc())
            {
                echo "ISBN: " . $row['isbn'];
                echo "<br>";
                echo "Titlu: " . $row['titlu'];
                echo "<br>";
                echo "Autor: " . $row['autor'];
                echo "<br>";
                echo "Categorie: " . $row['categorie'];
                echo "<br>";
                echo "Descriere: " . $row['descriere'];
                echo "<br>";
                echo '<img src="'.$row['url_img'].'"/>';
                echo "<br>";
                echo "<hr>";
                echo "<br>";
            }
        ?>
    </body>
</html>