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
                <a href = "cont.php" class = "contTxt">CONTUL TAU</a>
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
            <form action ="process.php" method="post">
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