<?php
// Connectar-se a la base de dades (o crear-la si no existeix)
$db = new SQLite3('database.db');

// Llegir dades
$resultats = $db->query("SELECT * FROM usuaris");

while ($fila = $resultats->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: " . $fila['usu_id'] . " - Nom: " . $fila['usu_nom'] . " - Email: " . $fila['usu_email'] . "<br>";
}

// Tancar la connexió
$db->close();
?>
