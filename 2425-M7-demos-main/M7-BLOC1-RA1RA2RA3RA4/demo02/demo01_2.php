<?php
// Recollir les dades del formulari en una única variable
$dades = "";
$dades.= "<p><strong>Nom:</strong> " . htmlspecialchars($_POST['nom']) . "</p>";
$dades.= "<p><strong>Cognoms:</strong> " . htmlspecialchars($_POST['cognoms']) . "</p>";
$dades.= "<p><strong>Gènere:</strong> " . htmlspecialchars($_POST['genere']) . "</p>";
$dades.= "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
$dades.= "<p><strong>Edat:</strong> " . htmlspecialchars($_POST['edat']) . "</p>";
$dades.= "<p><strong>Ciutat:</strong> " . htmlspecialchars($_POST['ciutat']) . "</p>";
$dades.= "<p><strong>Aficions:</strong> ";
if(isset($_POST['aficions'])){
    $dades.= implode(", ", array_map('htmlspecialchars', $_POST['aficions']));
} else {
    $dades.= "Cap seleccionada";
}
$dades.= "</p>";
$dades.= "<p><strong>Motivacions:</strong><br/>" . nl2br(htmlspecialchars($_POST['motivacions'])) . "</p>";
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
        <div class="text-gray-700 space-y-2">
            <?= $dades ?>
        </div>
        <div class="text-center mt-4">
            <a href="demo01.html" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                <i class="fa-solid fa-arrow-left mr-2"></i> Tornar
            </a>
        </div>
    </div>
</body>
</html>
