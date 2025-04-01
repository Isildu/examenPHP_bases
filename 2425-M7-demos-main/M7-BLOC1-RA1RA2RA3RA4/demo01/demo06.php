<?php
// Inicialitzar comptadors
$cara1 = 0;
$cara2 = 0;
$cara3 = 0;
$cara4 = 0;
$cara5 = 0;
$cara6 = 0;
$totalLlançaments = 1000;

// Llançar el dau 1000 vegades
for ($i = 0; $i < $totalLlançaments; $i++) {
    $resultat = rand(1, 6);
    switch ($resultat) {
        case 1: $cara1++; break;
        case 2: $cara2++; break;
        case 3: $cara3++; break;
        case 4: $cara4++; break;
        case 5: $cara5++; break;
        default: $cara6++;
    }
}

// Calcular percentatges
$percentatgeCara1 = ($cara1 / $totalLlançaments) * 100;
$percentatgeCara2 = ($cara2 / $totalLlançaments) * 100;
$percentatgeCara3 = ($cara3 / $totalLlançaments) * 100;
$percentatgeCara4 = ($cara4 / $totalLlançaments) * 100;
$percentatgeCara5 = ($cara5 / $totalLlançaments) * 100;
$percentatgeCara6 = ($cara6 / $totalLlançaments) * 100;

// Preparació de les icones
$icona1 = "<i class='fa-solid fa-dice-one text-yellow-500 text-2xl'></i>";
$icona2 = "<i class='fa-solid fa-dice-two text-orange-500 text-2xl'></i>";
$icona3 = "<i class='fa-solid fa-dice-three text-blue-500 text-2xl'></i>";
$icona4 = "<i class='fa-solid fa-dice-four text-pink-500 text-2xl'></i>";
$icona5 = "<i class='fa-solid fa-dice-five text-red-500 text-2xl'></i>";
$icona6 = "<i class='fa-solid fa-dice-six text-grey-500 text-2xl'></i>";

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llançament del Dau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-128">
        <h2 class="text-xl font-bold text-gray-800 text-center mb-4 flex items-center justify-center">
            <i class="fa-solid fa-dice text-green-500 mr-2"></i> Resultats del Llançament del Dau
        </h2>

        <?php
        // Bucle per mostrar resultats amb les icones correctes
        for ($i = 1; $i <= 6; $i++) {
            $cara = ${"cara$i"};
            $percentatge = ($cara / $totalLlançaments) * 100;
            $icona = ${"icona$i"}; // Obté la icona correcta
        
            echo "
                <p class='text-gray-700 font-semibold flex items-center'>
                    " . $icona . "&nbsp;" . $cara . " cops
                </p>
                <div class='w-full bg-gray-300 rounded-lg h-6 overflow-hidden mb-4'>
                    <div class='bg-green-500 h-full text-white text-right pr-2 flex items-center justify-end' style='width: " . number_format($percentatge, 1) . "%;'>
                        " . number_format($percentatge, 1) . "%
                    </div>
                </div>
            ";
        }
        ?>
    </div>
</body>
</html>