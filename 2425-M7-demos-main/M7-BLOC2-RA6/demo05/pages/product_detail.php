<?php
include("../includes/db_connect.php");
include("../includes/header.php");

$prod_id = $_GET['prod_id'] ?? 0;
$product = $db->querySingle("SELECT p.*, c.cat_nom FROM productes p JOIN categories c ON p.cat_id = c.cat_id WHERE prod_id = $prod_id", true);
?>

<div class="container mt-4">
    <?php if ($product) : ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <?php if (!empty($product['prod_imatge'])) : ?>
                        <img src="<?= htmlspecialchars($product['prod_imatge']) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($product['prod_nom']) ?>" style="object-fit: contain; height: 300px;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h2 class="card-title mb-3">Detall del producte</h2>
                        <h4 class="mb-3"> <?= htmlspecialchars($product['prod_nom']) ?> </h4>
                        <p class="card-text"><strong>Preu:</strong> <?= htmlspecialchars($product['prod_preu']) ?> €</p>
                        <p class="card-text"><strong>Descripció:</strong> <?= nl2br(htmlspecialchars($product['prod_descripcio'])) ?></p>
                        <p class="card-text"><strong>Categoria:</strong> <?= htmlspecialchars($product['cat_nom']) ?></p>
                        <a href='list_products.php' class='btn btn-secondary mt-3'>Tornar al llistat de productes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <p class="text-center">Producte no trobat.</p>
    <?php endif; ?>
</div>

<?php
include("../includes/footer.php");
?>
