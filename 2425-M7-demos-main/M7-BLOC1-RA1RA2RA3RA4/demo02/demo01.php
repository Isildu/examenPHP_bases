<?php
// Recollir les dades del formulari en una única variable
$dades = $_POST;
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats del Formulari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-900 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-96">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">
            <i class="fa-solid fa-user-check text-green-500 mr-2"></i> Dades Rebudes
        </h2>
        
        <ul class="space-y-2">
            <li class="text-gray-700"><i class="fa-solid fa-user text-blue-500 mr-2"></i> <strong>Nom:</strong> <?= htmlspecialchars($dades['nom']) ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-user text-blue-500 mr-2"></i> <strong>Cognoms:</strong> <?= htmlspecialchars($dades['cognoms']) ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-venus-mars text-blue-500 mr-2"></i> <strong>Gènere:</strong> <?= htmlspecialchars($dades['genere']) ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-envelope text-blue-500 mr-2"></i> <strong>Correu:</strong> <?= htmlspecialchars($dades['email']) ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-calendar text-blue-500 mr-2"></i> <strong>Edat:</strong> <?= htmlspecialchars($dades['edat']) ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-city text-blue-500 mr-2"></i> <strong>Ciutat:</strong> <?= htmlspecialchars($dades['ciutat']) ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-heart text-blue-500 mr-2"></i> <strong>Aficions:</strong> <?= isset($dades['aficions']) ? implode(", ", array_map('htmlspecialchars', $dades['aficions'])) : 'Cap seleccionada' ?></li>
            <li class="text-gray-700"><i class="fa-solid fa-comment text-blue-500 mr-2"></i> <strong>Motivacions:</strong> <?= nl2br(htmlspecialchars($dades['motivacions'])) ?></li>
        </ul>

        <div class="text-center mt-4">
            <a href="demo01.html" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"><i class="fa-solid fa-arrow-left mr-2"></i> Tornar</a>
        </div>
    </div>
</body>
</html>
