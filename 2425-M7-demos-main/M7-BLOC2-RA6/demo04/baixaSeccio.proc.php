<?php
// Connectar-se a la base de dades
$db = new SQLite3('arxius/diariLocal.db');

$sec_id = $_GET['sec_id'];

echo "hola - " . $sec_id;

/*
// Comprobem si ja existeix una secció amb el mateix id
$stmt = $db->prepare('SELECT sec_id FROM seccions WHERE sec_id = :id');
$stmt->bindValue(':id', $sec_id, SQLITE3_INTEGER);
$resultat = $stmt->execute();

$fila = $resultat->fetchArray(SQLITE3_ASSOC);

// TODO: redirigir a pàgina d'error, o enviar missatge d'error a la pàgina principal si no existeix una secció amb aquest id
if($fila['sec_id']) {
    // Existeix. Procedim a fer el DELETE
    $db->exec("DELETE FROM seccions WHERE sec_id=$sec_id");
} else
    //echo "ERROR";

// Tancar la connexió
$db->close();

header("location: gestioSeccions.php");
*/
?>