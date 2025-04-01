<?php
include("../includes/db_connect.php");
include("../includes/header.php");
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Afegir nou producte</h2>
    <form action="altaProducte.proc.php" method="POST">
        <div class="mb-3">
            <label for="prod_nom" class="form-label">Nom del producte</label>
            <input type="text" class="form-control" id="prod_nom" name="prod_nom" required>
        </div>

        <div class="mb-3">
            <label for="prod_descripcio" class="form-label">Descripció</label>
            <textarea class="form-control" id="prod_descripcio" name="prod_descripcio" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="prod_preu" class="form-label">Preu</label>
            <input type="number" class="form-control" id="prod_preu" name="prod_preu" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="prod_imatge" class="form-label">URL de la imatge</label>
            <input type="text" class="form-control" id="prod_imatge" name="prod_imatge">
        </div>

        <div class="mb-3">
            <label for="cat_id" class="form-label">Categoria</label>
            <select class="form-control" id="cat_id" name="cat_id" required>
                <?php
                $result = $db->query("SELECT * FROM categories");
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    echo "<option value='{$row['cat_id']}'>{$row['cat_nom']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success btn-lg">Afegir producte</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>
