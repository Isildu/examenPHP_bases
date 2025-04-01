<?php
// TODO: fer consultes segures
include("../includes/db_connect.php");

include("../includes/header.php");

$cat_id = $_GET['cat_id'] ?? 0;
$category = $db->querySingle("SELECT cat_nom FROM categories WHERE cat_id = $cat_id");
echo "<h2>Productes de la categoria: $category</h2>";
$result = $db->query("SELECT * FROM productes WHERE cat_id = $cat_id");
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<p><strong>{$row['prod_nom']}</strong> - {$row['prod_preu']} €<br>{$row['prod_descripcio']}</p>";
}

include("../includes/footer.php");

?>