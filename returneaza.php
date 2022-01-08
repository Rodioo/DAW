<?php
    date_default_timezone_set('Europe/Bucharest');
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
            $data_ret = date("Y-m-d");

            $sql = "select * from books where isbn = '$isbn'";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) == 0)
                echo '<script>alert("ISBN invalid.")</script>';
            else{
                $row = $result->fetch_assoc();
                $nr_ex = $row['nr_exemplare'];
                $nr_ex += 1;

                $email = $_SESSION['email'];
                $sql = "select * from users where email = '$email'";
                $result = mysqli_query($con, $sql);
                $row = $result->fetch_assoc();
                $id_user = $row['id_user'];
                $nr_pen = $row['nr_penalizari'];
                    
                $sql = "select * from inchirieri where id_user = '$id_user' and isbn = '$isbn' and (data_returnare is null or data_returnare = 2000-1-1);";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) == 0)
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Aceasta carte a fost returnata deja.');
                    window.location.href='mainCont.php';
                    </script>");
                else{
                    $row = $result->fetch_assoc();
                    $data_lim = $row['data_limita'];
                    
                    $merge = 1;
        
                    $sql = "update inchirieri set data_returnare = '$data_ret' where isbn = '$isbn' and id_user = '$id_user';";
                    mysqli_query($con, $sql);
        
                    if(mysqli_affected_rows($con) == 0)
                        $merge = 0;

                    $sql = "select * from rezervari where status = 'buna' and isbn = '$isbn' and id_user = '$id_user';";
                    $result = mysqli_query($con, $sql);
                    
                    if(mysqli_num_rows($result) == 1){
                        $sql = "update rezervari set status = 'returnata' where isbn = '$isbn' and id_user = '$id_user' and status = 'buna';";
                        mysqli_query($con, $sql);
                
                        if(mysqli_affected_rows($con) == 0)
                            $merge = 0;
                    }
        
                    $sql = "update books set nr_exemplare = '$nr_ex' where isbn = '$isbn'";    
                    mysqli_query($con, $sql);
                    
                    if(mysqli_affected_rows($con) == 0)
                        $merge = 0;
                    
                    if($data_ret > $data_lim){
                        echo '<script>alert("Ati depasit termenul de returnare, prin urmare veti primi un punct de penalizare.")</script>';
                        $nr_pen += 1;
                        $sql = "update users set nr_penalizari = '$nr_pen' where id_user = '$id_user';";
                        mysqli_query($con, $sql);
        
                        if(mysqli_affected_rows($con) == 0)
                            $merge = 0;
                    }
        
                    if($merge == 0)
                        echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Eroare la returnare');
                        window.location.href='mainCont.php';
                        </script>");
                    else
                        echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Carte returnata cu succes.');
                        window.location.href='mainCont.php';
                        </script>");
                }
                
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
                <input type = "submit" value="Returneaza" class="registerBtn" name="btn-save">
            </form>
        </div>
        
    </body>
</html>