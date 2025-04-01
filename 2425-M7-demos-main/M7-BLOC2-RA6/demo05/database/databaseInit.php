<?php
$db = new SQLite3(__DIR__.'/ikea.db');

$db->exec("CREATE TABLE IF NOT EXISTS categories (
    cat_id INTEGER PRIMARY KEY AUTOINCREMENT,
    cat_nom TEXT NOT NULL,
    cat_descripcio TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS productes (
    prod_id INTEGER PRIMARY KEY AUTOINCREMENT,
    prod_nom TEXT NOT NULL,
    prod_preu REAL NOT NULL,
    prod_descripcio TEXT,
    cat_id INTEGER,
    FOREIGN KEY (cat_id) REFERENCES categories(cat_id)
)");

$db->exec("INSERT INTO categories (cat_nom, cat_descripcio) VALUES
 ('Menjador', 'Mobles i accessoris per al menjador'),
 ('Cuina', 'Mobiliari i utensilis per a la cuina'),
 ('Bany', 'Accessoris i mobles per al bany'),
 ('Dormitori', 'Llits, armaris i tauletes'),
 ('Estudi', 'Escriptoris i cadires d´oficina')");

$db->exec("INSERT INTO productes (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES
('Cadira menjador', 49.99, 'Cadira còmoda de fusta', 1),
('Taula extensible', 199.00, 'Taula per 6 persones', 1),
('Bloc de cuina', 499.00, 'Bloc amb forn i fogons', 2),
('Armari de bany', 89.99, 'Armari per emmagatzemar', 3),
('Llit doble', 299.99, 'Llit amb capçal entapissat', 4),
('Escriptori gran', 129.00, 'Escriptori amb calaixos', 5),
('Sofà 3 places', 399.00, 'Sofà amb fundes rentables', 1)");

$db->close();
?>