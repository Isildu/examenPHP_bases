<?php
include("includes/errorHandler.proc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Sign In - Log Out</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png"> <!-- FreePik -->
</head>
<body>

<?php
//control de la sessió
session_start();

if(isset($_SESSION['usu_nom'])){
    echo "<h3>Usuari: " . $_SESSION['usu_nom'] . " - ";
    echo "<a href='logout.proc.php'>Logout</a></h3><br/><br/>";
} else {
    echo "<h3>Usuari no logat</h3><br/><br/>";
}
?>