<?php
include("../includes/db_connect.php");
include("../includes/header.php");
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Afegir nova categoria</h2>
    <form action="altaCategoria.proc.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="cat_nom" class="form-label">Nom de la categoria</label>
            <input type="text" class="form-control" id="cat_nom" name="cat_nom" required>
        </div>
        <div class="mb-3">
            <label for="cat_descripcio" class="form-label">Descripció</label>
            <textarea class="form-control" id="cat_descripcio" name="cat_descripcio" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="cat_imatge" class="form-label">Imatge de la categoria (URL)</label>
            <input type="text" class="form-control" id="cat_imatge" name="cat_imatge" required>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-plus-circle"></i> Afegir categoria</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <a href="gestioCategories.php" class="btn btn-outline-secondary btn-lg"><i class="bi bi-house-door"></i> Tornar a la llista de categories</a>
    </div>
</div>

<?php
include("../includes/footer.php");
?>
