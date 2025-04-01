<?php

echo "<h1>" . $_POST['valorOcult'] . "</h1>";

if(isset($_POST['text']))
    $text = $_POST['text'];
else
    $text = "";

    if(isset($_POST['paraula']))
    $paraula = $_POST['paraula'];
else
    $paraula = "";
$errors = [];

if (empty($text)) {
    $errors[] = "El text no pot estar buit.";
}
if (empty($paraula)) {
    $errors[] = "La paraula a buscar no pot estar buida.";
}

$longitud = strlen($text);
if(!empty($paraula))
    $comptador = substr_count(strtolower($text), strtolower($paraula));
else
    $comptador = 0;

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats de la cerca</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 w-96">
        <h2 class="text-xl font-bold text-gray-800 text-center mb-4">Resultats de la cerca</h2>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-200 text-red-700 p-3 rounded-lg mb-4">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="demo02.html" class="block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Tornar</a>
        <?php else: ?>
            <p class="text-gray-700 font-semibold">Longitud del text: <strong><?= $longitud ?> caràcters</strong></p>
            <p class="text-gray-700 font-semibold">Ocurrències de "<strong><?= htmlspecialchars($paraula) ?></strong>": <strong><?= $comptador ?></strong></p>
            <a href="demo02.html" class="block text-center bg-blue-600 text-white py-2 mt-4 rounded-lg hover:bg-blue-700">Tornar</a>
        <?php endif; ?>
    </div>
</body>
</html>
