<?php
include("../includes/db_connect.php");

// TODO: controlar nom de categoria ja existent

try {
    // Comprovem si s'han rebut les dades del formulari
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recollir les dades del formulari
        $cat_nom = $_POST['cat_nom'];
        $cat_descripcio = $_POST['cat_descripcio'];
        $cat_imatge = $_POST['cat_imatge'];

        // Preparar la consulta SQL
        $query = "INSERT INTO categories (cat_nom, cat_descripcio, cat_imatge) VALUES (:cat_nom, :cat_descripcio, :cat_imatge)";

        // Preparar el statement
        $stmt = $db->prepare($query);

        // Enllaçar les dades amb els paràmetres del statement
        $stmt->bindValue(':cat_nom', $cat_nom, SQLITE3_TEXT);
        $stmt->bindValue(':cat_descripcio', $cat_descripcio, SQLITE3_TEXT);
        $stmt->bindValue(':cat_imatge', $cat_imatge, SQLITE3_TEXT);

        // Executar la consulta
        $stmt->execute();

        // Redirigir a la pàgina de gestió de categories després d'inserir
        header("Location: gestioCategories.php");
        exit();
    } else {
        // Redirigir a error.php amb l'error corresponent
        header("location: error.php?error=Error: El formulari no s'ha enviat correctament.");
    }
} catch (Exception $e) {
    // Redirigir a error.php amb l'error corresponent
    header("location: error.php?error=$e->getMessage()");
}
?>
