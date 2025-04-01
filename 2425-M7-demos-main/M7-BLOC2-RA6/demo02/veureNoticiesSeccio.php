<?php
// Connectar-se a la base de dades
$db = new SQLite3('diariLocal.db');

// Comprovar connexió
if (!$db) {
    die("Error en connectar a la base de dades.");
}

// Obtenir totes les notícies
$result = $db->query("SELECT * FROM noticies WHERE not_seccio='$_GET[not_seccio]' ORDER BY not_data DESC");

// Mostrar-les
echo "<h1>Llistat de Notícies de la secció $_GET[not_seccio]</h1>";

$count = 0;
while ($noticia = $result->fetchArray(SQLITE3_ASSOC)) {
    $count++;
    echo "<h2>" . htmlspecialchars($noticia['not_titular']) . "</h2>";
    echo "<p><strong>Data:</strong> " . htmlspecialchars($noticia['not_data']) . "</p>";
    echo "<p><strong>Secció:</strong> " . htmlspecialchars($noticia['not_seccio']) . "</p>";
    echo "<hr>";
}

if ($count === 0) {
    echo "<p>No s'han trobat notícies.</p>";
}

// Tancar la connexió
$db->close();
?>
