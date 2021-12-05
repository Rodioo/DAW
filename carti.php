<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Lumea cartii</title>
        <link rel = "stylesheet" href = "carti.css">
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
        <div class ="container">
            <form action="#" method ="post" id = "search">
                <input type = "text" id = "txtSearch" placeholder="Cauta dupa numele cartii" name = "srch" id = "searchBar">
                <button type = "submit" id = "btnSearch" name="btn-save"> 
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/1200px-Magnifying_glass_icon.svg.png">
                </button>
            </form> 
        </div>
        <div class = "meniu">
            <a href = "home.php">Acasa</a>
            <a href = "carti.php">Cauta carti</a>
            <a href = "index.php">Despre</a>
        </div>
        <?php
            require_once('searchBook.php');
        ?>
    </body>
</html>