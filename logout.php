<?php

session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["email"]);
unset($_SESSION["nume"]);
unset($_SESSION["prenume"]);
unset($_SESSION["nr_penalizari"]);
session_destroy();
header("Location:home.php");
?>