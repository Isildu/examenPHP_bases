<?php
// Capçalera comuna
include("includes/header.php");

// Connectar-se a la base de dades
$db = new SQLite3('arxius/diariLocal.db');

// Comprovar connexió
if (!$db) {
    die("Error en connectar a la base de dades.");
}

// Obtenir totes les notícies
$result = $db->query("SELECT * FROM seccions ORDER BY sec_nom");

// Mostrar-les
echo "<h1>Llistat de Seccions</h1>";

$count = 0;
while ($seccio = $result->fetchArray(SQLITE3_ASSOC)) {
    $count++;
    echo "<p><strong>Secció:</strong> " . htmlspecialchars($seccio['sec_nom']) . "</p>";
}

if ($count === 0) {
    echo "<p>No s'han trobat seccions.</p>";
}

// Tancar la connexió
$db->close();

// Peu comú
include("includes/footer.php");
?>