<?php
include("../includes/db_connect.php");

// Obtenir el ID de la categoria que volem modificar
$cat_id = $_GET['cat_id'] ?? 0;

// Comprovem si s'ha rebut un ID vàlid
if ($cat_id) {
    // Preparar la consulta per obtenir la categoria actual
    $query = "SELECT * FROM categories WHERE cat_id = :cat_id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':cat_id', $cat_id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $category = $result->fetchArray(SQLITE3_ASSOC);

    if (!$category) {
        echo "<p>No s'ha trobat la categoria amb ID $cat_id.</p>";
        exit();
    }
} else {
    echo "<p>Error: No s'ha proporcionat un ID de categoria.</p>";
    exit();
}
?>

<?php include("../includes/header.php"); ?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Modificar Categoria</h2>
    <form action="canviCategoria.proc.php" method="POST">
        <input type="hidden" name="cat_id" value="<?php echo $category['cat_id']; ?>">

        <div class="mb-3">
            <label for="cat_nom" class="form-label">Nom de la categoria</label>
            <input type="text" class="form-control" id="cat_nom" name="cat_nom" value="<?php echo htmlspecialchars($category['cat_nom']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="cat_descripcio" class="form-label">Descripció de la categoria</label>
            <textarea class="form-control" id="cat_descripcio" name="cat_descripcio" rows="3"><?php echo htmlspecialchars($category['cat_descripcio']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="cat_imatge" class="form-label">URL de la imatge</label>
            <input type="text" class="form-control" id="cat_imatge" name="cat_imatge" value="<?php echo htmlspecialchars($category['cat_imatge']); ?>" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-warning btn-lg"><i class="bi bi-pencil"></i> Modificar Categoria</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <a href="gestioCategories.php" class="btn btn-outline-secondary btn-lg"><i class="bi bi-house-door"></i> Tornar a la gestió de categories</a>
    </div>
</div>

<?php include("../includes/footer.php"); ?>
