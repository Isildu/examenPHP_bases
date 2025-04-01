<?php
include("../includes/db_connect.php");
include("../includes/header.php");
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Productes</h2>
    <div class="row">
        <?php
            if(isset($_GET['cat_id']))
                $qWhere = " WHERE c.cat_id=".$_GET['cat_id'];
            else
                $qWhere = "";
            $result = $db->query("SELECT p.*, c.cat_nom FROM productes p JOIN categories c ON p.cat_id = c.cat_id".$qWhere);
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<div class='col-md-4 mb-4 d-flex align-items-stretch'>";
            echo "  <div class='card w-100 text-center'>";
            echo "      <img src='{$row['prod_imatge']}' class='card-img-top mx-auto d-block' alt='{$row['prod_nom']}' style='width: 200px; height: 200px; object-fit: cover; margin-top: 10px;'>";
            echo "      <div class='card-body d-flex flex-column justify-content-center'>";
            echo "          <h5 class='card-title'>{$row['prod_nom']}</h5>";
            echo "          <a href='product_detail.php?prod_id={$row['prod_id']}' class='btn btn-primary mt-3'>Veure producte</a>";
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
