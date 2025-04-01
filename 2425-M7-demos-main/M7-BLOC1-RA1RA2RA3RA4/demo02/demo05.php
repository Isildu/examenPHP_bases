<?php
session_start();

// Inicialitzar sessió si és la primera vegada
if (!isset($_SESSION['numerosMagics'])) {
    $_SESSION['numerosMagics'] = [];
}

// Generar un nou número màgic que no s'hagi usat
if (!isset($_SESSION['numeroMagic'])) {
    do {
        $_SESSION['numeroMagic'] = rand(0, 10);
    } while (in_array($_SESSION['numeroMagic'], $_SESSION['numerosMagics']));
    $_SESSION['numerosMagics'][] = $_SESSION['numeroMagic'];
    $_SESSION['intents'] = [];
    $_SESSION['final'] = false;
}

$message = "";

// Processar formulari
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numeroUsuari']) && !$_SESSION['final']) {
    $numeroUsuari = (int) $_POST['numeroUsuari'];
    
    if (!in_array($numeroUsuari, $_SESSION['intents'])) {
        $_SESSION['intents'][] = $numeroUsuari;
        if ($numeroUsuari === $_SESSION['numeroMagic']) {
            $message = "<span class='text-green-500'>Felicitats! Has encertat el número màgic.</span>";
            $_SESSION['final'] = true;
        } elseif (count($_SESSION['intents']) >= 3) {
            $message = "<span class='text-red-500'>Has perdut! El número era {$_SESSION['numeroMagic']}.</span>";
            $_SESSION['final'] = true;
        } else {
            $message = $numeroUsuari < $_SESSION['numeroMagic'] ? "Massa baix!" : "Massa alt!";
        }
    } else {
        $message = "Ja has intentat aquest número!";
    }
}

// Reiniciar partida
if (isset($_POST['reset'])) {
    unset($_SESSION['numeroMagic']);
    unset($_SESSION['intents']);
    $_SESSION['final'] = false;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc del Número Màgic</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
        <h1 class="text-2xl font-bold text-blue-600 mb-4">Joc del Número Màgic</h1>
        <p class="text-gray-700 mb-4">Endevina el número entre 0 i 10!</p>
        
        <?php if ($message): ?>
            <p class="font-bold text-lg mb-4"> <?= $message ?> </p>
        <?php endif; ?>

        <?php if (!$_SESSION['final']): ?>
            <form method="POST" class="mb-4">
                <input type="number" name="numeroUsuari" min="0" max="10" required class="border p-2 w-full rounded-lg">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2 hover:bg-blue-700 w-full">Jugar!</button>
            </form>
        <?php endif; ?>
        
        <p class="text-gray-700">Intents: <?= implode(", ", $_SESSION['intents']) ?: 'Cap' ?></p>
        
        <form method="POST" class="mt-4">
            <button type="submit" name="reset" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Reiniciar Joc</button>
        </form>
    </div>
</body>
</html>
