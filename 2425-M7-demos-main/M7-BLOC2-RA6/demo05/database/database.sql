-- Crear taula categoria
CREATE TABLE IF NOT EXISTS categoria (
    cat_id INTEGER PRIMARY KEY AUTOINCREMENT,
    cat_nom TEXT NOT NULL,
    cat_descripcio TEXT
);

-- Crear taula producte
CREATE TABLE IF NOT EXISTS producte (
    prod_id INTEGER PRIMARY KEY AUTOINCREMENT,
    prod_nom TEXT NOT NULL,
    prod_preu REAL NOT NULL,
    prod_descripcio TEXT,
    cat_id INTEGER,
    FOREIGN KEY (cat_id) REFERENCES categoria(cat_id)
);

-- Inserir categories
INSERT INTO categoria (cat_nom, cat_descripcio) VALUES ('Menjador', 'Mobiliari per a menjadors');
INSERT INTO categoria (cat_nom, cat_descripcio) VALUES ('Cuina', 'Mobiliari i accessoris de cuina');
INSERT INTO categoria (cat_nom, cat_descripcio) VALUES ('Bany', 'Mobiliari i accessoris de bany');
INSERT INTO categoria (cat_nom, cat_descripcio) VALUES ('Dormitori', 'Llits i mobles per dormitoris');
INSERT INTO categoria (cat_nom, cat_descripcio) VALUES ('Estudi', 'Mobiliari per a oficines i estudis');

-- Inserir productes
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Cadira de menjador', 49.99, 'Cadira còmoda de fusta amb respatller alt', 1);
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Taula de menjador', 199.00, 'Taula extensible per a 6 persones', 1);
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Llit doble', 299.99, 'Llit de matrimoni amb capçal entapissat', 4);
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Sofà 3 places', 399.00, 'Sofà gran amb fundes rentables', 1);
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Escriptori', 129.00, 'Escriptori ample amb calaixos', 5);
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Armari de bany', 89.99, 'Armari compacte per emmagatzematge al bany', 3);
INSERT INTO producte (prod_nom, prod_preu, prod_descripcio, cat_id) VALUES ('Bloc de cuina', 499.00, 'Bloc de cuina amb fogons i forn', 2);
