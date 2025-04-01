<?php
// Connectar-se a la base de dades
$db = new SQLite3('arxius/diariLocal.db');

$sec_nom = $_POST['sec_nom'];

// Comprobem si ja existeix una secció amb el mateix nom
$stmt = $db->prepare('SELECT sec_id FROM seccions WHERE sec_nom = :nom');
$stmt->bindValue(':nom', $sec_nom, SQLITE3_TEXT);
$resultat = $stmt->execute();

$fila = $resultat->fetchArray(SQLITE3_ASSOC);

// TODO: redirigir a pàgina d'error, o enviar missatge d'error a la pàgina principal si ja existeix una secció amb aquest nom
if($fila['sec_id'])
    //echo "sí existeix";
else {
    // No existeix. Procedim a fer un INSERT
    $db->exec("INSERT INTO seccions (sec_nom) VALUES ('$sec_nom')");
}

// Tancar la connexió
$db->close();

header("location: gestioSeccions.php");
?>