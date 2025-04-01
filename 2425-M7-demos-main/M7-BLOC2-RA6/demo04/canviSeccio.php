<?php
// Capçalera comuna
include("includes/header.php");

// Connectar-se a la base de dades
$db = new SQLite3('arxius/diariLocal.db');

$sec_id = $_GET['sec_id'];

// Comprobem si ja existeix una secció amb el mateix id
$stmt = $db->prepare('SELECT * FROM seccions WHERE sec_id = :id');
$stmt->bindValue(':id', $sec_id, SQLITE3_INTEGER);
$resultat = $stmt->execute();

$fila = $resultat->fetchArray(SQLITE3_ASSOC);

// TODO: redirigir a pàgina d'error, o enviar missatge d'error a la pàgina principal si no existeix una secció amb aquest id
if($fila['sec_id']) {
    ?>
    <form action="canviSeccio.proc.php" method="POST">
        <input type="hidden" name="sec_id" value="<?= $sec_id; ?>">
        <p><input type="text" name="sec_nom" size="20" value="<?= $fila['sec_nom']; ?>" maxlength="25"/></p>
        <p><input type="submit" value="Enviar"/>
    </form>
    <?php
} else
    echo "ERROR";

// Peu comú
include("includes/footer.php");
?>