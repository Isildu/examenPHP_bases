<?php
// Capçalera comuna
include("includes/header.php");
?>

<form action="altaSeccio.proc.php" method="POST">
    <p><input type="text" name="sec_nom" size="20" maxlength="25"/></p>
    <p><input type="submit" value="Enviar"/>
</form>

<?php
// Peu comú
include("includes/footer.php");
?>