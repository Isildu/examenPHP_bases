<?php
// Inicialitzar comptadors
$cara1 = 0;
$cara2 = 0;
$cara3 = 0;
$cara4 = 0;
$cara5 = 0;
$cara6 = 0;
$totalLlançaments = 1000;

// Llançar la moneda 1000 vegades
for ($i = 0; $i < $totalLlançaments; $i++) {
    $resultat = rand(1, 6);
    switch($resultat){
        case 1: $cara1++;
                break;
        case 2: $cara2++;
                break;
        case 3: $cara3++;
                break;
        case 4: $cara4++;
                break;
        case 5: $cara5++;
                break;
        default:$cara6++;
    }
}

// Calcular percentatges
$percentatgeCara1 = ($cara1 / $totalLlançaments) * 100;
$percentatgeCara2 = ($cara2 / $totalLlançaments) * 100;
$percentatgeCara3 = ($cara3 / $totalLlançaments) * 100;
$percentatgeCara4 = ($cara4 / $totalLlançaments) * 100;
$percentatgeCara5 = ($cara5 / $totalLlançaments) * 100;
$percentatgeCara6 = ($cara6 / $totalLlançaments) * 100;

// Mostrar resultats
echo "<h2>Resultats del llançament de la moneda</h2>";
echo "<p>1: $cara1 (" . number_format($percentatgeCara1, 2) . "%)</p>";
echo "<p>2: $cara2 (" . number_format($percentatgeCara2, 2) . "%)</p>";
echo "<p>3: $cara3 (" . number_format($percentatgeCara3, 2) . "%)</p>";
echo "<p>4: $cara4 (" . number_format($percentatgeCara4, 2) . "%)</p>";
echo "<p>5: $cara5 (" . number_format($percentatgeCara5, 2) . "%)</p>";
echo "<p>6: $cara6 (" . number_format($percentatgeCara6, 2) . "%)</p>";
?>
