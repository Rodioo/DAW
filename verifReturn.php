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
            session_start();

            $email = $_SESSION['email'];
            $sql = "select id_user from users where email = '$email'";
            $result = mysqli_query($con, $sql);
            $row = $result->fetch_assoc();
            $id_user = $row['id_user'];

            $sql = "select * from inchirieri where id_user = '$id_user' and data_returnare is null;";
            $result = mysqli_query($con, $sql);
    

            if($result == false or mysqli_num_rows($result) == 0){
                ?>
                <div style="text-align:center; margin-top:10%">
                    Nu aveti nicio carte de returnat.
                </div>
            <?php
            }
            else{
                while ($row = $result->fetch_assoc())
                {
                    $isbn = $row['isbn'];
                    $sql2 = "select * from books where isbn = '$isbn';";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = $result2->fetch_assoc();

                    echo "Titlu carte: " . $row2['titlu'];
                    echo "<br>";
                    echo "ISBN: " . $isbn;
                    echo "<br>"; 
                    echo "Data limita de returnare: " . $row['data_limita'];
                    echo "<hr>";
                    echo "<br>";
                }
            }
            
        ?>
    </body>
</html>
