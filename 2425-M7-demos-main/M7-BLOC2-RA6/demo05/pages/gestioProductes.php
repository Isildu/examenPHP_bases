<?php
include("../includes/db_connect.php");
include("../includes/header.php");
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Productes</h2>
    <div class="row">
        <?php
            // Comprovem si hem rebut una categoria per filtrar els productes
            if (isset($_GET['cat_id'])) {
                $qWhere = " WHERE c.cat_id = :cat_id";
            } else {
                $qWhere = "";
            }

            // Preparar la consulta SQL
            $sql = "SELECT p.*, c.cat_nom FROM productes p JOIN categories c ON p.cat_id = c.cat_id" . $qWhere;

            // Preparar el statement
            $stmt = $db->prepare($sql);

            // Si tenim un cat_id, l'enllaçem al statement
            if (isset($_GET['cat_id'])) {
                $stmt->bindValue(':cat_id', $_GET['cat_id'], SQLITE3_INTEGER);
            }

            // Executar la consulta
            $result = $stmt->execute();

            // Mostrar els resultats
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<div class='col-md-4 mb-4 d-flex align-items-stretch'>";
                echo "  <div class='card w-100 text-center'>";
                echo "      <img src='{$row['prod_imatge']}' class='card-img-top mx-auto d-block' alt='{$row['prod_nom']}' style='width: 200px; height: 200px; object-fit: cover; margin-top: 10px;'>";
                echo "      <div class='card-body d-flex flex-column justify-content-center'>";
                echo "          <h5 class='card-title'>{$row['prod_nom']}</h5>";
                echo "          <a href='veureProducte.php?prod_id={$row['prod_id']}' class='btn btn-primary mt-3'><i class='bi bi-eye'></i> Veure producte</a>";
                echo "          <a href='canviProducte.php?prod_id={$row['prod_id']}' class='btn btn-warning mt-2'><i class='bi bi-pencil'></i> Modificar</a>";
                echo "          <a href='baixaProducte.proc.php?cat_id={$row['cat_id']}&prod_id={$row['prod_id']}' class='btn btn-danger mt-2' onclick='return confirm(\"Estàs segur que vols eliminar aquest producte?\")'><i class='bi bi-trash'></i> Eliminar</a>";
                echo "      </div>";
                echo "  </div>";
                echo "</div>";
            }
        ?>
    </div>

    <!-- Enllaç per afegir un nou producte -->
    <div class="text-center mt-4">
        <a href="altaProducte.php" class="btn btn-success btn-lg"><i class='bi bi-plus-circle'></i> Afegir nou producte</a>
    </div>
</div>

<?php
include("../includes/footer.php");
?>
