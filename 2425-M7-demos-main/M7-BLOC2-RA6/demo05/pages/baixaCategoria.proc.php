<?php
include("../includes/db_connect.php");

try {
    // Comprovem si s'ha passat l'ID de la categoria per eliminar
    if (isset($_GET['cat_id'])) {
        // Recollir l'ID de la categoria
        $cat_id = $_GET['cat_id'];

        // Comprovem si la categoria existeix abans d'intentar eliminar-la
        $checkQuery = "SELECT * FROM categories WHERE cat_id = :cat_id";
        $stmt = $db->prepare($checkQuery);
        $stmt->bindValue(':cat_id', $cat_id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        
        if ($result->fetchArray(SQLITE3_ASSOC)) {
            // Preparar la consulta SQL per eliminar la categoria
            $query = "DELETE FROM categories WHERE cat_id = :cat_id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':cat_id', $cat_id, SQLITE3_INTEGER);
            $stmt->execute();
            
            // Redirigir a la pàgina de gestió de categories després de l'eliminació
            header("Location: gestioCategories.php");
            exit();
        } else {
            // Si la categoria no existeix, redirigir a una pàgina d'error
            header("Location: error.php?error=Categoria no trobada.");
            exit();
        }
    } else {
        // Si no es passa un ID de categoria, redirigir a error
        header("Location: error.php?error=Error: No s'ha proporcionat un ID de categoria.");
        exit();
    }
} catch (Exception $e) {
    // En cas d'error, redirigir a la pàgina d'error amb el missatge
    header("Location: error.php?error=" . $e->getMessage());
    exit();
}
?>
