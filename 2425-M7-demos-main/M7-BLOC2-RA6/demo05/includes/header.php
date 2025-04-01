<?php
// mode debug: baixem el nivell de report (mostrat) d'errors per a que ens els mostri tots
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The brand new IKEA</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png"> <!-- FreePik -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header class="bg-light py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="gestioCategories.php" class="btn btn-outline-secondary mx-2"><i class="bi bi-house-door"></i> Pàgina principal</a>
        <!-- <a href="login.php" class="btn btn-outline-primary mx-2"><i class="bi bi-box-arrow-in-right"></i> Login</a> -->
    </div>
    </header>