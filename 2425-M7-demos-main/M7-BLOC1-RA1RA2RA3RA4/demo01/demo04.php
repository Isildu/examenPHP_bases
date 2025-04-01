<?php
// Inicialitzar comptadors
$cares = 0;
$creus = 0;
$totalLlançaments = 1000;

// Llançar la moneda 1000 vegades
for ($i = 0; $i < $totalLlançaments; $i++) {
    $resultat = rand(0, 1); // 0 = creu, 1 = cara
    if ($resultat === 0) {
        $creus++;
    } else {
        $cares++;
    }
}

// Calcular percentatges
$percentatgeCares = ($cares / $totalLlançaments) * 100;
$percentatgeCreus = ($creus / $totalLlançaments) * 100;
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llançament de moneda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-96">
    <h2 class="text-xl font-bold text-gray-800 text-center mb-4 flex items-center justify-center">Resultats del llançament</h2>        
        <p class="text-gray-700 font-semibold">Cares: <?php echo $cares; ?> (<?php echo number_format($percentatgeCares, 2); ?>%)</p>
        <div class="w-full bg-gray-300 rounded-lg h-6 overflow-hidden mb-4">
            <div class="bg-blue-500 h-full text-white text-right pr-2 flex items-center justify-end" style="width: <?php echo $percentatgeCares; ?>%;">
                <?php echo number_format($percentatgeCares, 1); ?>%
            </div>
        </div>

        <p class="text-gray-700 font-semibold">Creus: <?php echo $creus; ?> (<?php echo number_format($percentatgeCreus, 2); ?>%)</p>
        <div class="w-full bg-gray-300 rounded-lg h-6 overflow-hidden">
            <div class="bg-red-500 h-full text-white text-right pr-2 flex items-center justify-end" style="width: <?php echo $percentatgeCreus; ?>%;">
                <?php echo number_format($percentatgeCreus, 1); ?>%
            </div>
        </div>
    </div>
</body>
</html>
