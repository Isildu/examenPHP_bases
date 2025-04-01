<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../includes/db_connect.php");

// Comprovem si s'ha passat un ID de producte
if (isset($_GET['prod_id'])) {
    $prod_id = $_GET['prod_id'];
    $cat_id = $_GET['cat_id'];

    try {
        // Preparar la consulta SQL per eliminar el producte
        $query = "DELETE FROM productes WHERE prod_id = :prod_id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':prod_id', $prod_id, SQLITE3_INTEGER);

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
