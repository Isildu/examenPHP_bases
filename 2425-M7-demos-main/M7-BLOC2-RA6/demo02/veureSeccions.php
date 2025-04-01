<?php
// Connectar-se a la base de dades
$db = new SQLite3('diariLocal.db');

// Comprovar connexió
if (!$db) {
    die("Error en connectar a la base de dades.");
}

// Obtenir totes les notícies
$result = $db->query("SELECT DISTINCT(not_seccio) FROM noticies ORDER BY not_seccio");

// Mostrar-les
echo "<h1>Llistat de Seccions</h1>";

$count = 0;
while ($noticia = $result->fetchArray(SQLITE3_ASSOC)) {
    $count++;
    echo "<p><strong>Secció:</strong> " . htmlspecialchars($noticia['not_seccio']) . "</p>";
}

if ($count === 0) {
    echo "<p>No s'han trobat seccions.</p>";
}

// Tancar la connexió
$db->close();
?>
