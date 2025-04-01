<?php
// Inicialitzar variables
$missatge = "";
$intents = isset($_GET['intents']) ? explode(',', $_GET['intents']) : [];
$numeros_magics = isset($_GET['numeros_magics']) ? explode(',', $_GET['numeros_magics']) : [];

// Escollir un nou número màgic si no n'hi ha
if (empty($numeros_magics) || isset($_GET['nova_partida'])) {
    do {
        $numero_magic = rand(0, 10);
    } while (in_array($numero_magic, $numeros_magics));
    $numeros_magics[] = $numero_magic;
    $intents = [];
} else {
    $numero_magic = end($numeros_magics);
}

// Comprovar l'intent de l'usuari
if (isset($_GET['intent']) && $_GET['intent'] !== "") {
    $intent = (int)$_GET['intent'];
    if (!in_array($intent, $intents)) {
        $intents[] = $intent;
        if ($intent == $numero_magic) {
            $missatge = "Has encertat! El número màgic era $numero_magic.";
        } elseif (count($intents) > 3) {
            $missatge = "Has esgotat els intents! El número màgic era $numero_magic.";
        } else {
            $missatge = $intent < $numero_magic ? "Intenta un número més alt." : "Intenta un número més baix.";
        }
    } else {
        $missatge = "Ja has provat aquest número!";
    }
}

// Convertir arrays a strings per passar-los en inputs ocults
$str_intents = implode(',', $intents);
$str_numeros_magics = implode(',', $numeros_magics);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc del Número Màgic</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex flex-col items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center w-96">
        <h1 class="text-2xl font-bold mb-4">Joc del Número Màgic</h1>
        <p class="mb-4">Endevina un número entre 0 i 10. Tens 3 intents!</p>
        
        <?php if (!empty($missatge)): ?>
            <p class="mb-4 font-semibold text-green-400">
                <?= $missatge ?>
            </p>
        <?php endif; ?>

        <form method="GET" class="space-y-4">
            <input type="hidden" name="intents" value="<?= htmlspecialchars($str_intents) ?>">
            <input type="hidden" name="numeros_magics" value="<?= htmlspecialchars($str_numeros_magics) ?>">
            
            <?php if (count($intents) < 3 && (!isset($_GET['intent']) || $_GET['intent'] != $numero_magic)): ?>
                <input type="number" name="intent" min="0" max="10" required class="w-full p-2 rounded-lg text-black">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full">Provar</button>
            <?php else: ?>
                <button type="submit" name="nova_partida" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg w-full">Nova partida</button>
            <?php endif; ?>
        </form>
        
        <h2 class="mt-4 font-semibold">Intents anteriors:</h2>
        <p class="text-yellow-400"> <?= empty($intents) ? 'Cap' : implode(' ', $intents) ?> </p>
    </div>
</body>
</html>