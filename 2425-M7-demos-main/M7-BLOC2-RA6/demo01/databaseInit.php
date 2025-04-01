<?php
// Connectar-se a la base de dades (o crear-la si no existeix)
$db = new SQLite3('database.db');

// Crear una taula si no existeix
$db->exec("CREATE TABLE IF NOT EXISTS usuaris (usu_id INTEGER PRIMARY KEY, usu_nom TEXT, usu_email TEXT)");

// Inserir registres
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Joan', 'joan@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Alícia', 'alicia@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Francesc', 'francesc@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Raquel', 'raquel@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Víctor', 'victor@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Rai', 'rai@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('David', 'david@itb.cat')");

// Tancar la connexió
$db->close();
?>
