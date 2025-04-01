<?php
include("../includes/db_connect.php");
include("../includes/header.php");

// Comprovem si s'ha passat un ID de producte
if (isset($_GET['prod_id'])) {
    $prod_id = $_GET['prod_id'];

    // Obtenir el producte per editar-lo
    $query = "SELECT * FROM productes WHERE prod_id = :prod_id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':prod_id', $prod_id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $product = $result->fetchArray(SQLITE3_ASSOC);
}
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Modificar producte</h2>
    <form action="canviProducte.proc.php" method="POST">
        <input type="hidden" name="prod_id" value="<?= $product['prod_id'] ?>">

        <div class="mb-3">
            <label for="prod_nom" class="form-label">Nom del producte</label>
            <input type="text" class="form-control" id="prod_nom" name="prod_nom" value="<?= $product['prod_nom'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="prod_descripcio" class="form-label">Descripció</label>
            <textarea class="form-control" id="prod_descripcio" name="prod_descripcio" rows="3"><?= $product['prod_descripcio'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="prod_preu" class="form-label">Preu</label>
            <input type="number" class="form-control" id="prod_preu" name="prod_preu" value="<?= $product['prod_preu'] ?>" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="prod_imatge" class="form-label">URL de la imatge</label>
            <input type="text" class="form-control" id="prod_imatge" name="prod_imatge" value="<?= $product['prod_imatge'] ?>">
        </div>

        <div class="mb-3">
            <label for="cat_id" class="form-label">Categoria</label>
            <select class="form-control" id="cat_id" name="cat_id" required>
                <?php
                $result = $db->query("SELECT * FROM categories");
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    $selected = ($row['cat_id'] == $product['cat_id']) ? "selected" : "";
                    echo "<option value='{$row['cat_id']}' $selected>{$row['cat_nom']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-warning btn-lg">Guardar canvis</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>
