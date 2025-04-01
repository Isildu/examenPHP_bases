CREATE TABLE IF NOT EXISTS noticies (
    not_id INTEGER PRIMARY KEY AUTOINCREMENT,
    not_titular TEXT NOT NULL,
    not_cos TEXT NOT NULL,
    not_data TEXT NOT NULL,
    not_seccio TEXT NOT NULL
);

INSERT INTO noticies (not_titular, not_cos, not_data, not_seccio) VALUES
('Nova exposició d''art', 'Aquest és el contingut de la notícia sobre nova exposició d''art.', '2025-03-20', 'Cultura'),
('Conferència sobre tecnologia', 'Aquest és el contingut de la notícia sobre conferència sobre tecnologia.', '2025-03-19', 'Esports'),
('Tallers de cuina', 'Aquest és el contingut de la notícia sobre tallers de cuina.', '2025-03-18', 'Educació'),
('Festival de música', 'Aquest és el contingut de la notícia sobre festival de música.', '2025-03-17', 'Ciència'),
('Nova biblioteca oberta', 'Aquest és el contingut de la notícia sobre nova biblioteca oberta.', '2025-03-16', 'Oci'),
('Setmana de la ciència', 'Aquest és el contingut de la notícia sobre setmana de la ciència.', '2025-03-15', 'Cultura'),
('Cursa popular', 'Aquest és el contingut de la notícia sobre cursa popular.', '2025-03-14', 'Esports'),
('Presentació de llibres', 'Aquest és el contingut de la notícia sobre presentació de llibres.', '2025-03-13', 'Educació'),
('Jornada de portes obertes', 'Aquest és el contingut de la notícia sobre jornada de portes obertes.', '2025-03-12', 'Ciència'),
('Formació en ciberseguretat', 'Aquest és el contingut de la notícia sobre formació en ciberseguretat.', '2025-03-11', 'Oci'),
('Activitats solidàries', 'Aquest és el contingut de la notícia sobre activitats solidàries.', '2025-03-10', 'Cultura'),
('Cinema a la fresca', 'Aquest és el contingut de la notícia sobre cinema a la fresca.', '2025-03-09', 'Esports'),
('Mercat d''artesania', 'Aquest és el contingut de la notícia sobre mercat d''artesania.', '2025-03-08', 'Educació'),
('Cursos d''anglès intensius', 'Aquest és el contingut de la notícia sobre cursos d''anglès intensius.', '2025-03-07', 'Ciència'),
('Sessions de mindfulness', 'Aquest és el contingut de la notícia sobre sessions de mindfulness.', '2025-03-06', 'Oci'),
('Torneig de pàdel', 'Aquest és el contingut de la notícia sobre torneig de pàdel.', '2025-03-05', 'Cultura'),
('Campanya de donació de sang', 'Aquest és el contingut de la notícia sobre campanya de donació de sang.', '2025-03-04', 'Esports'),
('Visita teatralitzada', 'Aquest és el contingut de la notícia sobre visita teatralitzada.', '2025-03-03', 'Educació'),
('Fotomarató', 'Aquest és el contingut de la notícia sobre fotomarató.', '2025-03-02', 'Ciència'),
('Exhibició esportiva', 'Aquest és el contingut de la notícia sobre exhibició esportiva.', '2025-03-01', 'Oci'),
('Conferència d''història local', 'Aquest és el contingut de la notícia sobre conferència d''història local.', '2025-02-29', 'Cultura'),
('Concert acústic', 'Aquest és el contingut de la notícia sobre concert acústic.', '2025-02-28', 'Esports'),
('Festival de dansa', 'Aquest és el contingut de la notícia sobre festival de dansa.', '2025-02-27', 'Educació'),
('Marató de lectura', 'Aquest és el contingut de la notícia sobre marató de lectura.', '2025-02-26', 'Ciència'),
('Cloenda de curs', 'Aquest és el contingut de la notícia sobre cloenda de curs.', '2025-02-25', 'Oci');
