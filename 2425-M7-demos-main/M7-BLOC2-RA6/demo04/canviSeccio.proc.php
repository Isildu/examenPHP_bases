<?php
// Connectar-se a la base de dades
$db = new SQLite3('arxius/diariLocal.db');

$sec_id = $_POST['sec_id'];
$sec_nom = $_POST['sec_nom'];

echo $sec_id . "-" . $sec_nom;
/*
// xivato per veure que tot ha arribat bé
//echo "id: $sec_id - nom: $sec_nom";

// Comprobem si ja existeix una secció amb el mateix id
$stmt = $db->prepare('SELECT sec_id FROM seccions WHERE sec_id = :id');
$stmt->bindValue(':id', $sec_id, SQLITE3_INTEGER);
$resultat = $stmt->execute();

$fila = $resultat->fetchArray(SQLITE3_ASSOC);

// TODO: redirigir a pàgina d'error, o enviar missatge d'error a la pàgina principal si no existeix una secció amb aquest id
if($fila['sec_id']) {
    // Comprobem si ja existeix una secció amb el mateix nom
    $stmt = $db->prepare('SELECT sec_id FROM seccions WHERE sec_nom = :nom');
    $stmt->bindValue(':nom', $sec_nom, SQLITE3_TEXT);
    $resultat = $stmt->execute();

    $fila = $resultat->fetchArray(SQLITE3_ASSOC);

    // TODO: redirigir a pàgina d'error, o enviar missatge d'error a la pàgina principal si ja existeix una secció amb aquest nom
    if($fila['sec_id'])
        echo "ERROR";
    else     
        $db->exec("UPDATE seccions SET sec_nom='$sec_nom' WHERE sec_id=$sec_id");
} else
    echo "ERROR";

// Tancar la connexió
$db->close();

header("location: gestioSeccions.php");
*/
?>