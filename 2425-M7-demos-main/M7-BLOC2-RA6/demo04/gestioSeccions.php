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
echo "<h1>Llistat de Seccions</h1>";    echo "<a href='canviSeccio.php?sec_id=$seccio[sec_id]'>Modificar secció</a> - <a href='baixaSeccio.proc.php?sec_id=$seccio[sec_id]' onClick='return validarEliminacio();'>Eliminar secció</a>";    


$count = 0;
while ($seccio = $result->fetchArray(SQLITE3_ASSOC)) {
    $count++;
    echo "<p><strong>Secció:</strong> " . htmlspecialchars($seccio['sec_nom']) . " - ";
    // Enllaços per modificar i per eliminar (sense confirmació)
    echo "</p>";
}

if ($count === 0) {
    echo "<p>No s'han trobat seccions.</p>";
}

// Enllaç per a insertar una nova secció
echo "<p><a href='altaSeccio.php'>Nova secció</a></p>";

// Tancar la connexió
$db->close();

// Peu comú
include("includes/footer.php");
?>
<script>
    function validarEliminacio(){
        return confirm('Estàs segur que vols eliminar aquesta secció?');
    }
</script>