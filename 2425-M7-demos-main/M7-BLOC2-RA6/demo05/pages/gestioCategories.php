<?php
include("../includes/db_connect.php");
include("../includes/header.php");
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Categories</h2>
    <div class="row">
        <?php
        $result = $db->query("SELECT * FROM categories");
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<div class='col-md-4 mb-4 d-flex align-items-stretch'>";
            echo "  <div class='card w-100 text-center'>";
            echo "      <img src='{$row['cat_imatge']}' class='card-img-top mx-auto d-block' alt='{$row['cat_nom']}' style='width: 200px; height: 200px; object-fit: cover; margin-top: 10px;'>";
            echo "      <div class='card-body d-flex flex-column justify-content-center'>";
            echo "          <h5 class='card-title'>{$row['cat_nom']}</h5>";
            echo "          <a href='gestioProductes.php?cat_id={$row['cat_id']}' class='btn btn-primary mt-2'><i class='bi bi-eye'></i> Veure productes</a>";
            echo "          <a href='canviCategoria.php?cat_id={$row['cat_id']}' class='btn btn-warning mt-2'><i class='bi bi-pencil'></i> Modificar</a>";
            echo "          <a href='baixaCategoria.proc.php?cat_id={$row['cat_id']}' class='btn btn-danger mt-2' onclick='return confirm(\"Estàs segur que vols eliminar aquesta categoria?\")'><i class='bi bi-trash'></i> Eliminar</a>";
            echo "      </div>";
            echo "  </div>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="text-center mt-4">
        <a href="altaCategoria.php" class="btn btn-success btn-lg"><i class='bi bi-plus-circle'></i> Afegir nova categoria</a>
    </div>
</div>
<?php
include("../includes/footer.php");
?>
