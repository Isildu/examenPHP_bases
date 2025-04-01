<?php

session_start();
if ($_POST['usuari'] == 'Joan' && $_POST['contrasenya'] == '1234') {
    $_SESSION['usu_nom'] = 'Joan';
    header('Location: usuariLogat.php');
} else {
    header("location: demo01.php");
}

?>
