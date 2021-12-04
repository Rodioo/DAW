<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b3d50e11cd16c4:a7b0f45d@eu-cdbr-west-01.cleardb.com/heroku_ab134baabfb7904?reconnect=true"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
if(!$conn)
    echo "Eroare la conectarea la baza de date.";
?>