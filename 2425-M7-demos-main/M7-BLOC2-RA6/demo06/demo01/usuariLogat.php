<?php
session_start();

if(isset($_SESSION['usu_nom']))
    echo "Hola: " . $_SESSION['usu_nom'];
else
    //echo "Que fas aquí?";
    session_destroy();
    header("location: demo01.php");
?>