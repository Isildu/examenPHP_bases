<?php
include("../includes/db_connect.php");

// Comprovem si hem rebut les dades del formulari
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prod_id = $_POST['prod_id'];
    $prod_nom = $_POST['prod_nom'];
    $prod_descripcio = $_POST['prod_descripcio'];
    $prod_preu = $_POST['prod_preu'];
    $cat_id = $_POST['cat_id'];
    $prod_imatge = $_POST['prod_imatge']; // URL d'imatge

    try {
        // Preparar la consulta SQL per actualitzar el producte
        $query = "UPDATE productes SET prod_nom = :prod_nom, prod_descripcio = :prod_descripcio, prod_preu = :prod_preu, prod_imatge = :prod_imatge, cat_id = :cat_id WHERE prod_id = :prod_id";
        $stmt = $db->prepare($query);

        // Enllaçar les dades amb els paràmetres del statement
        $stmt->bindValue(':prod_nom', $prod_nom, SQLITE3_TEXT);
        $stmt->bindValue(':prod_descripcio', $prod_descripcio, SQLITE3_TEXT);
        $stmt->bindValue(':prod_preu', $prod_preu, SQLITE3_FLOAT);
        $stmt->bindValue(':prod_imatge', $prod_imatge, SQLITE3_TEXT);
        $stmt->bindValue(':prod_id', $prod_id, SQLITE3_INTEGER);
        $stmt->bindValue(':cat_id', $cat_id, SQLITE3_INTEGER);

        // Executar la consulta
        $stmt->execute();

        // Redirigir a la pàgina de gestió de productes
        header("Location: gestioProductes.php?cat_id=$cat_id");
        exit();
    } catch (Exception $e) {
        // Si hi ha un error, redirigim a error.php
        header("Location: error.php?error=" . $e->getMessage());
        exit();
    }
}
?>
