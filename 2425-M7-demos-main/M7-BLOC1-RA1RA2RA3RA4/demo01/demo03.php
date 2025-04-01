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
    $resultat = rand(0, 5)+1;
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
calcularIMostrar(1, $cara1, $totalLlançaments);
calcularIMostrar(2, $cara2);
calcularIMostrar(3, $cara3);
calcularIMostrar(4, $cara4);
calcularIMostrar(5, $cara5);
calcularIMostrar(6, $cara6);

function calcularIMostrar($cara, $numCara, $totalLlançaments=1000) {
        $percentatgeCara = ($numCara / $totalLlançaments) * 100;
        echo "<p>$cara: $numCara (" . number_format($percentatgeCara, 2) . "%)</p>";
}

?>
