<?php
    require_once('connection.php');
    if(isset($_POST['btn-save']))
    {
        $titlu = mysqli_real_escape_string($con, $_POST['srch']);
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
            echo '<img src="'.$row['url_img'].'"/>';
            echo "<br>";
            echo "<hr>";
            echo "<br>";
        }
    }
?>