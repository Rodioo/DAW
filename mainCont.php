<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Lumea cartii</title>
        <link rel = "stylesheet" href = "maincont.css">
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Book_Hexagonal_Icon.svg/1189px-Book_Hexagonal_Icon.svg.png">
        <style>
            .optiuniAdm{
                padding: 2%;
            }
            .optiuniAdm form{
                font-size: 24px;
            }
            .log{
                text-decoration: none; 
                font-size: 24px;
            }
        </style>
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
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "Bun venit, " . $_SESSION['nume'] . "! Rolul tau este: admin.";
                ?>
                <div class = "optiuniAdm">
                    Optiuni admin:
                    <form method="POST" action="addBook.php">  
                        <input type="submit" value = "Adauga o carte">  
                    </form>
                    <form method="POST" action="modBook.php">  
                        <input type="submit" value = "Modifica descrierea unei carti.">  
                    </form> 
                    <form method="POST" action="rmvBook.php">  
                        <input type="submit" value = "Sterge o carte">  
                    </form> 
                    <form method="POST" action="logout.php">  
                        <input type="submit" value = "Log Out">  
                    </form>  
                </div>
                <?php
            } else {
                ?>
                <div style="text-align:center; margin-top:10%">
                    <a class = "log" href = "login.php">Trebuie sa va logati ca sa aveti acces.</a>
                </div>
                
                <?php
            }
        ?>

    </body>
</html>