<?php
include("../includes/db_connect.php");

// TODO: controlar si el nom de la categoria ja existeix

try {
    // Comprovem si s'han rebut les dades del formulari
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recollir les dades del formulari
        $cat_id = $_POST['cat_id'];
        $cat_nom = $_POST['cat_nom'];
        $cat_descripcio = $_POST['cat_descripcio'];
        $cat_imatge = $_POST['cat_imatge'];

        // Preparar la consulta SQL per actualitzar la categoria
        $query = "UPDATE categories SET cat_nom = :cat_nom, cat_descripcio = :cat_descripcio, cat_imatge = :cat_imatge WHERE cat_id = :cat_id";

        // Preparar el statement
        $stmt = $db->prepare($query);

        // Enllaçar les dades amb els paràmetres del statement
        $stmt->bindValue(':cat_nom', $cat_nom, SQLITE3_TEXT);
        $stmt->bindValue(':cat_descripcio', $cat_descripcio, SQLITE3_TEXT);
        $stmt->bindValue(':cat_imatge', $cat_imatge, SQLITE3_TEXT);
        $stmt->bindValue(':cat_id', $cat_id, SQLITE3_INTEGER);

        // Executar la consulta
        $stmt->execute();

        // Redirigir a la pàgina de gestió de categories després d'actualitzar
        header("Location: gestioCategories.php");
        exit();
    } else {
        // Si el formulari no s'ha enviat correctament, redirigim a una pàgina d'error
        header("location: error.php?error=Error: El formulari no s'ha enviat correctament.");
    }
} catch (Exception $e) {
    // Si hi ha un error en l'execució de la consulta, redirigim a la pàgina d'error
    header("location: error.php?error=$e->getMessage()");
}
?>
