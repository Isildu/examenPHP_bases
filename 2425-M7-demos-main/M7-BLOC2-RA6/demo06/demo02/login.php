<?php
include("includes/header.php");
?>

<form action="login.proc.php" method="POST">
    <input type="text" name="usu_nom" placeholder="Nom d'usuari" required><br/>
    <input type="password" name="usu_paraula_clau" placeholder="Paraula clau" required><br/>
    <button type="submit">Entrar</button>
</form>


<?php
include("includes/footer.php");
?>