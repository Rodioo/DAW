<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Lumea cartii</title>
        <link rel = "stylesheet" href = "index.css">
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
        <div class = "despre1">DESPRE PROIECT</div>
        <div class = "info1">
            Acest site are ca scop facilitarea obtinerii de informatii pentru un vizitator oarecare si inchirierea cartilor pentru clienti.
            <br>
            Persoanele care intra pe acest site pot avea rolul de: vizitator, client, bibliotecar, admin.
            <br>
            <br>
            <div class = "rol">Informatii despre fiecare rol</div>
            <div class = "info2">
                - vizitator oarecare:
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa vada ce carti sunt disponibile pentru inchiriat.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa caute orice carte si autor doreste.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa isi creeze un cont nou pentru a deveni client.
                <br>
                <br>
                - client
                <br>
                &nbsp; &nbsp; &nbsp; - tot ce poate sa faca un vizitator oarecare.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa inchirieze o carte online.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa faca o rezervare pentru o carte.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa vada data de returnare a cartilor rezervate.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa se aboneze la newsletter pentru a vedea ce promotii si carti noi apar.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa primeasca oferte in functie de cat de vechi este contul.
                <br>
                &nbsp; &nbsp; &nbsp; - sa scrie recenzii cartilor imprumutate.
                <br>
                <br>
                - bibliotecar
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa marcheze o carte ca fiind imprumutata, acest lucru avand efect atat asupra bazei de date, cat si a numarului de exemplare disponibile afisat pe site.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa penalizeze un cont de client daca acesta nu respecta termenul de predare al cartii imprumutate.
                <br>
                <br>
                - admin
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa adauge o carte noua pe site.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa stearga o carte de pe site.
                <br>
                &nbsp; &nbsp; &nbsp; - poate sa stearga un cont de client daca acesta are prea multe penalizari din partea bibliotecarului.
                <br>
                <br>     
            </div>
            <div class = "bd">Informatii despre baza de date</div>
                <img id = "bdImg" src="https://i.imgur.com/wTWgp2T.png" alt="Diagrama Conceptuala">
        </div>
        
 
    </body>
</html>