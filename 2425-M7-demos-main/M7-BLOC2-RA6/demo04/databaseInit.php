<?php
// Connectar-se a la base de dades (o crear-la si no existeix)
$db = new SQLite3('arxius/diariLocal.db');

// Crear la taula seccions si no existeix
$db->exec("CREATE TABLE IF NOT EXISTS 'seccions' (
	'sec_id'	INTEGER,
	'sec_nom'	TEXT,
	PRIMARY KEY('sec_id' AUTOINCREMENT)
);");

$db->exec("INSERT INTO 'seccions' ('sec_id','sec_nom') VALUES (1,'Ciència'),
 (2,'Cultura'),
 (3,'Educació'),
 (4,'Esports'),
 (5,'Oci');
");

// Crear la taula noticies si no existeix
$db->exec("CREATE TABLE IF NOT EXISTS noticies (
    not_id INTEGER PRIMARY KEY AUTOINCREMENT,
    not_titular TEXT NOT NULL,
    not_cos TEXT NOT NULL,
    not_data TEXT NOT NULL,
    sec_id INTEGER NOT NULL
);");

// Inserir registres
$db->exec("INSERT INTO 'noticies' ('not_id','not_titular','not_cos','not_data','sec_id') VALUES (1,'Nova exposició d''art','Aquest és el contingut de la notícia sobre nova exposició d''art.','2025-03-20',2),
 (2,'Conferència sobre tecnologia','Aquest és el contingut de la notícia sobre conferència sobre tecnologia.','2025-03-19',5),
 (3,'Tallers de cuina','Aquest és el contingut de la notícia sobre tallers de cuina.','2025-03-18',3),
 (4,'Festival de música','Aquest és el contingut de la notícia sobre festival de música.','2025-03-17',1),
 (5,'Nova biblioteca oberta','Aquest és el contingut de la notícia sobre nova biblioteca oberta.','2025-03-16',5),
 (6,'Setmana de la ciència','Aquest és el contingut de la notícia sobre setmana de la ciència.','2025-03-15',2),
 (7,'Cursa popular','Aquest és el contingut de la notícia sobre cursa popular.','2025-03-14',4),
 (8,'Presentació de llibres','Aquest és el contingut de la notícia sobre presentació de llibres.','2025-03-13',3),
 (9,'Jornada de portes obertes','Aquest és el contingut de la notícia sobre jornada de portes obertes.','2025-03-12',1),
 (10,'Formació en ciberseguretat','Aquest és el contingut de la notícia sobre formació en ciberseguretat.','2025-03-11',5),
 (11,'Activitats solidàries','Aquest és el contingut de la notícia sobre activitats solidàries.','2025-03-10',2),
 (12,'Cinema a la fresca','Aquest és el contingut de la notícia sobre cinema a la fresca.','2025-03-09',4),
 (13,'Mercat d''artesania','Aquest és el contingut de la notícia sobre mercat d''artesania.','2025-03-08',3),
 (14,'Cursos d''anglès intensius','Aquest és el contingut de la notícia sobre cursos d''anglès intensius.','2025-03-07',1),
 (15,'Sessions de mindfulness','Aquest és el contingut de la notícia sobre sessions de mindfulness.','2025-03-06',5),
 (16,'Torneig de pàdel','Aquest és el contingut de la notícia sobre torneig de pàdel.','2025-03-05',2),
 (17,'Campanya de donació de sang','Aquest és el contingut de la notícia sobre campanya de donació de sang.','2025-03-04',4),
 (18,'Visita teatralitzada','Aquest és el contingut de la notícia sobre visita teatralitzada.','2025-03-03',3),
 (19,'Fotomarató','Aquest és el contingut de la notícia sobre fotomarató.','2025-03-02',1),
 (20,'Exhibició esportiva','Aquest és el contingut de la notícia sobre exhibició esportiva.','2025-03-01',5),
 (21,'Conferència d''història local','Aquest és el contingut de la notícia sobre conferència d''història local.','2025-02-29',2),
 (22,'Concert acústic','Aquest és el contingut de la notícia sobre concert acústic.','2025-02-28',4),
 (23,'Festival de dansa','Aquest és el contingut de la notícia sobre festival de dansa.','2025-02-27',3),
 (24,'Marató de lectura','Aquest és el contingut de la notícia sobre marató de lectura.','2025-02-26',1),
 (25,'Cloenda de curs','Aquest és el contingut de la notícia sobre cloenda de curs.','2025-02-25',5);");

// Tancar la connexió
$db->close();
?>
