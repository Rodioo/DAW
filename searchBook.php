<?php
    $token = 'abc123abc123';
    $_SESSION['token'] = $token;
    require_once('connection.php');
    if(isset($_POST['btn-save']))
    {
        if(!empty($_POST['spam'])) die("Spam alert");   //fac un field in form invizibil iar daca este completat inseamna ca e un bot care face formularul asa ca il inchid
        $compToken = $_POST['token'];
        if($compToken === $token) {
            $titlu = htmlspecialchars(mysqli_real_escape_string($con, $_POST['srch']));
            $titlu = strtolower($titlu);
            $sql = "select * from books where lower(titlu) LIKE '%{$titlu}%'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) == 0)
                echo '<script>alert("Nu exista aceasta carte.")</script>';

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
                echo "Numar exemplare: " . $row['nr_exemplare'];
                echo "<br>";
                echo '<img src="'.$row['url_img'].'"/>';
                echo "<br>";
                echo "<hr>";
                echo "<br>";
            }
        }
        else
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Form spoofing/CSRF error.');
                window.location.href='home.php';
                </script>");
    }
?>