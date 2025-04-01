<?php
include("includes/errorHandler.proc.php");
include("includes/db_connect.php");

session_start();

if(isset($_SESSION['usu_nom'])){
    $_SESSION['error'] = "Usuari ja logat";
    header("location: index.php");
    exit(); // es pot afegir o no, per norma general header("location:") tanca la pàgina, però exit() ho garanteix
} else {
    if (!empty($_REQUEST['usu_nom']) && !empty($_REQUEST['usu_paraula_clau'])) { 
        $usu_nom = $_REQUEST['usu_nom'];
        $usu_paraula_clau = md5($_REQUEST['usu_paraula_clau']); // les darreres recomanacions prefereixen fer servir password_hash()

        // Preparar el statement
        $stmt = $db->prepare("SELECT usu_id FROM usuaris WHERE usu_nom = :usu_nom AND usu_paraula_clau = :usu_paraula_clau");
        $stmt->bindValue(':usu_nom', $usu_nom, SQLITE3_TEXT);
        $stmt->bindValue(':usu_paraula_clau', $usu_paraula_clau, SQLITE3_TEXT);

        // Executar la consulta
        $result = $stmt->execute();

        $usuari = $result->fetchArray(SQLITE3_ASSOC);

        if (!$usuari) {
            $_SESSION['error'] = "Usuari i/o paraula clau incorrecte";
            header("location: index.php");
        } else {
            session_regenerate_id(true);

            $_SESSION['usu_nom'] = $usu_nom;
            header("location: index.php");
        }
    }
}

?>