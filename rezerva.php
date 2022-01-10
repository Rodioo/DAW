<?php
    session_start();
    if(!$_SESSION['loggedin']){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Trebuie sa va logati pentru a continua');
        window.location.href='mainCont.php';
        </script>");
        exit();
    }
        
    $token = 'abc123abc123';
    $_SESSION['token'] = $token;
    require_once('connection.php');
    if(isset($_POST['btn-save']))
    {
        if(!empty($_POST['spam'])) die("Spam alert");   //fac un field in form invizibil iar daca este completat inseamna ca e un bot care face formularul asa ca il inchid
        $compToken = $_POST['token'];
        if($compToken === $token) {
            $isbn = htmlspecialchars(mysqli_real_escape_string($con, $_POST['isbn']));
            $data_rez = htmlspecialchars(mysqli_real_escape_string($con, $_POST['data_rez']));
            if($data_rez < date("Y-m-d")){
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Data invalida');
                    window.location.href='rezerva.php';
                    </script>");
                    exit();
            }

            $sql = "select * from books where isbn = '$isbn'";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) == 0)
                echo '<script>alert("ISBN invalid.")</script>';
            else{
                $row = $result->fetch_assoc();
                $nr_ex = $row['nr_exemplare'];
                if($nr_ex > 0){
                    $email = $_SESSION['email'];
                    $sql = "select id_user from users where email = '$email'";
                    $result = mysqli_query($con, $sql);
                    $row = $result->fetch_assoc();
                    $id_user = $row['id_user'];
                    
                    $sql = "select * from rezervari where id_user = '$id_user' and isbn = '$isbn' and status = 'buna'";
                    $result = mysqli_query($con, $sql);

                    if(mysqli_num_rows($result) == 0){
                        

                        $sql = "insert into rezervari (data_rezervare, id_user, isbn) values ('$data_rez', '$id_user', '$isbn')";
                        $result = mysqli_query($con, $sql);

                        $next_mth = new DateTime($data_rez);
                        $next_mth = $next_mth->add(new DateInterval('P1M'));
                        $next_mth = $next_mth->format('Y-m-d');
                        
                        $sql2 = "insert into inchirieri (data_inchiriere, id_user, isbn, data_limita) values ('$data_rez', '$id_user', '$isbn', '$next_mth')";
                        $result2 = mysqli_query($con, $sql2);
                    
                        if($result && $result2){
                            $nr_ex -= 1;
                            $sql = "update books set nr_exemplare = '$nr_ex' where isbn = '$isbn'";    
                            mysqli_query($con, $sql);

                            echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Rezervare facuta cu succes');
                            window.location.href='mainCont.php';
                            </script>");
                        } 
                        else
                            echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Eroare la crearea rezervarii.');
                            window.location.href='mainCont.php';
                            </script>");  
                    }
                    else
                        echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Exista deja o rezervare facuta de dvs pentru aceasta carte.');
                        window.location.href='mainCont.php';
                        </script>");

                            
                }
                else
                    echo '<script>alert("Momentan stocul este epuizat pentru aceasta carte.")</script>';
                
                
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
                <input type = "text" placeholder="ISBN carte" class="txt" name="isbn" required>
                <label for="birthday">Data rezervarii:</label>
                <input type = "date" class="txt" name = "data_rez" required>
                <input type = "submit" value="Rezerva" class="registerBtn" name="btn-save">
            </form>
        </div>
        
    </body>
</html>