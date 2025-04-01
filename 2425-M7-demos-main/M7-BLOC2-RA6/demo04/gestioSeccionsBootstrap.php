<?php
// Connectar-se a la base de dades
$db = new SQLite3('arxius/diariLocal.db');

// Comprovar connexió
if (!$db) {
    die("Error en connectar a la base de dades.");
}

// Obtenir totes les notícies
$result = $db->query("SELECT * FROM seccions ORDER BY sec_nom");

// Mostrar-les amb Bootstrap
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diari Local de la Costa Brava</title>
    <link rel="icon" type="image/x-icon" href="arxius/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validarEliminacio() {
            return confirm('Estàs segur que vols eliminar aquesta secció?');
        }
    </script>
</head>
<body class="container mt-4">
<h1 class="mb-4">Llistat de Seccions</h1>
<?php
$count = 0;
while ($seccio = $result->fetchArray(SQLITE3_ASSOC)) {
    $count++;
    echo "<div class='d-flex justify-content-between align-items-center border p-2 mb-2'>";
    echo "<span><strong>Secció:</strong> " . htmlspecialchars($seccio['sec_nom']) . "</span>";
    echo "<span>";
    echo "<a href='canviSeccio.php?sec_id={$seccio['sec_id']}' class='btn btn-sm btn-warning me-2'><i class='bi bi-pencil'></i> Modificar</a>";
    echo "<a href='baixaSeccio.proc.php?sec_id={$seccio['sec_id']}' class='btn btn-sm btn-danger' onClick='return validarEliminacio();'><i class='bi bi-trash'></i> Eliminar</a>";
    echo "</span>";
    echo "</div>";
}

if ($count === 0) {
    echo "<p>No s'han trobat seccions.</p>";
}

// Enllaç per a inserir una nova secció
echo "<a href='altaSeccio.php' class='btn btn-primary mt-3 me-2'><i class='bi bi-plus-circle'></i> Nova secció</a><br/>";

// Enllaç per tornar a la pàgina principal amb estil de botó
echo "<a href='index.html' class='btn btn-secondary mt-3'><i class='bi bi-house-door'></i> Tornar a Inici</a>";

// Tancar la connexió
$db->close();
?>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
