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
            echo "          <a href='list_products.php?cat_id={$row['cat_id']}' class='btn btn-primary mt-3'>Veure productes</a>";
            echo "      </div>";
            echo "  </div>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php
include("../includes/footer.php");
?>
