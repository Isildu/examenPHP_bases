<?php
session_start();

if(isset($_SESSION['usu_nom'])){
    echo "Hola: " . $_SESSION['usu_nom'] . "<br/>";
    echo "<a href='logout.proc.php'>Logout</a><br/><br/>";
} else {
    echo "Usuari no logat<br/><br/>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="demo01.proc.php" method="POST">
        <input type="text" name="usuari" placeholder="Nom d'usuari"><br/>
        <input type="password" name="contrasenya" placeholder="Paraula clau">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>