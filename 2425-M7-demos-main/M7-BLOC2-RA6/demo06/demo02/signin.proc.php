<?php
include("includes/errorHandler.proc.php");
include("includes/db_connect.php");

session_start();
if(isset($_SESSION['usu_nom'])){
    $_SESSION['error'] = "Usuari ja logat";
    header("location: index.php");
} else {
    if (isset($_REQUEST['usu_nom']) && isset($_REQUEST['usu_paraula_clau'])) {  //no caldria, ja que el formulari no arribarà sense dades
        $usu_nom = $_REQUEST['usu_nom'];
        $usu_paraula_clau = md5($_REQUEST['usu_paraula_clau']);
    
        // Preparar el statement
        $stmt = $db->prepare("INSERT INTO usuaris (usu_nom, usu_paraula_clau) VALUES (:usu_nom, :usu_paraula_clau)");
        $stmt->bindValue(':usu_nom', $usu_nom, SQLITE3_TEXT);
        $stmt->bindValue(':usu_paraula_clau', $usu_paraula_clau, SQLITE3_TEXT);

        // Executar la consulta
        $result = $stmt->execute();

        header("location: index.php");  //podria fer directament un login, però de moment envio a la pàgina per a que el faci l'usuari
    }
}

?>