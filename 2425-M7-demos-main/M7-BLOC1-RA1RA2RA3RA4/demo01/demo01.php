<?php
// Inicialitzar comptadors
$cares = 0;
$creus = 0;
$totalLlançaments = 1000;

// Llançar la moneda 1000 vegades
for ($i = 0; $i < $totalLlançaments; $i++) {
    $resultat = rand(0, 1); // 0 = creu, 1 = cara
    if ($resultat === 0) $creus++;
    else $cares++;
}

// Calcular percentatges
$percentatgeCares = ($cares / $totalLlançaments) * 100;
$percentatgeCreus = ($creus / $totalLlançaments) * 100;

// Mostrar resultats
echo "<h2>Resultats del llançament de la moneda</h2>";
echo "<p>Cares: $cares (" . number_format($percentatgeCares, 2) . "%)</p>";
echo "<p>Creus: $creus (" . number_format($percentatgeCreus, 2) . "%)</p>";
?>
