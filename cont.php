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
                <a href = "cont.php" class = "contTxt">CONTUL TAU</a>
            </div>   
        </header>
        <div class = "meniu">
            <a href = "home.php">Acasa</a>
            <a href = "carti.php">Cauta carti</a>
            <a href = "index.php">Despre</a>
        </div>
        <div class="signup-form">
            <form action ="process.php" method="post">
                <input style ="display:none" type="text" id="spam" name="spam">
                <input type="hidden"  value='abc123abc123' name="token">
                <input type = "text" placeholder="Nume" class="txt" name="nume" required>
                <input type = "text" placeholder="Prenume" class="txt" name="prenume" required>
                <input type = "email" placeholder="Email" class="txt" name = "email" required>
                <input type = "password" placeholder="Parola" class="txt" name = "pass" required>
                <input type = "password" placeholder="Confirma parola" class="txt" name = "cpass" required>
                <input type = "submit" value="Register" class="registerBtn" name="btn-save">
            </form>
            <a id = "goLog" href="login.php">Deja ai un cont?Logheaza-te aici</a></a>
        </div>
        
    </body>
</html>