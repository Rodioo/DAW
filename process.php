<?php
    session_start();
    $token = 'abc123abc123';
    $_SESSION['token'] = $token;
    require_once('connection.php');

    if(isset($_POST['btn-save']))
    {
        if(!empty($_POST['spam'])) die("Spam alert");   //fac un field in form invizibil iar daca este completat inseamna ca e un bot care face formularul asa ca il inchid
        $compToken = $_POST['token'];
        if($compToken === $token) {
            $nume = htmlspecialchars(mysqli_real_escape_string($con, $_POST['nume']));
            $prenume = htmlspecialchars(mysqli_real_escape_string($con, $_POST['prenume']));
            $email = htmlspecialchars(mysqli_real_escape_string($con, $_POST['email']));
            $pass = htmlspecialchars(mysqli_real_escape_string($con, $_POST['pass']));
            $cpass = htmlspecialchars(mysqli_real_escape_string($con, $_POST['cpass']));

            if($pass != $cpass)
                echo 'Parolele nu sunt la fel.';
            else{
                $pass = md5($pass);
                $sql = "insert into users (nume, prenume, email, parola, nr_penalizari, rol) values('$nume', '$prenume', '$email', '$pass', 0, 'client')";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Cont creat cu succes.');
                    window.location.href='login.php';
                    </script>");
                }
                else{
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('E-mail deja folosit.');
                    window.location.href='cont.php';
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