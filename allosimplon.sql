-- Base de données AlloSimplon
CREATE DATABASE IF NOT EXISTS allosimplon CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE allosimplon;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    prenom_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(255) NOT NULL UNIQUE,
    mdp_user VARCHAR(255) NOT NULL,
    role_user TINYINT DEFAULT 1 COMMENT '1=user, 2=admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des films
CREATE TABLE IF NOT EXISTS films (
    id_film INT AUTO_INCREMENT PRIMARY KEY,
    nom_film VARCHAR(255) NOT NULL,
    img_film VARCHAR(500),
    date_film YEAR,
    synopsis_film TEXT,
    ba_film VARCHAR(500) COMMENT 'URL bande annonce',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des genres
CREATE TABLE IF NOT EXISTS genres (
    id_genre INT AUTO_INCREMENT PRIMARY KEY,
    nom_genre VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des réalisateurs
CREATE TABLE IF NOT EXISTS realisateurs (
    id_realisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom_realisateur VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des acteurs
CREATE TABLE IF NOT EXISTS acteurs (
    id_acteur INT AUTO_INCREMENT PRIMARY KEY,
    nom_acteur VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table de liaison film-genre (possede)
CREATE TABLE IF NOT EXISTS possede (
    id_film INT NOT NULL,
    id_genre INT NOT NULL,
    PRIMARY KEY (id_film, id_genre),
    FOREIGN KEY (id_film) REFERENCES films(id_film) ON DELETE CASCADE,
    FOREIGN KEY (id_genre) REFERENCES genres(id_genre) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table de liaison film-réalisateur (tourner)
CREATE TABLE IF NOT EXISTS tourner (
    id_film INT NOT NULL,
    id_realisateur INT NOT NULL,
    PRIMARY KEY (id_film, id_realisateur),
    FOREIGN KEY (id_film) REFERENCES films(id_film) ON DELETE CASCADE,
    FOREIGN KEY (id_realisateur) REFERENCES realisateurs(id_realisateur) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table de liaison film-acteur (possede2)
CREATE TABLE IF NOT EXISTS possede2 (
    id_film INT NOT NULL,
    id_acteur INT NOT NULL,
    PRIMARY KEY (id_film, id_acteur),
    FOREIGN KEY (id_film) REFERENCES films(id_film) ON DELETE CASCADE,
    FOREIGN KEY (id_acteur) REFERENCES acteurs(id_acteur) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertion de données de test

-- Admin par défaut (mot de passe: admin123)
INSERT INTO users (nom_user, prenom_user, email_user, mdp_user, role_user) VALUES
('Admin', 'Simplon', 'admin@allosimplon.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2),
('Dupont', 'Jean', 'jean.dupont@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1);

-- Genres
INSERT INTO genres (nom_genre) VALUES
('Action'),
('Comédie'),
('Drame'),
('Science-Fiction'),
('Thriller'),
('Horreur'),
('Romance'),
('Animation'),
('Documentaire'),
('Aventure');

-- Réalisateurs
INSERT INTO realisateurs (nom_realisateur) VALUES
('Christopher Nolan'),
('Steven Spielberg'),
('Quentin Tarantino'),
('Martin Scorsese'),
('Denis Villeneuve'),
('Greta Gerwig'),
('Jordan Peele'),
('Bong Joon-ho');

-- Acteurs
INSERT INTO acteurs (nom_acteur) VALUES
('Leonardo DiCaprio'),
('Margot Robbie'),
('Tom Hanks'),
('Meryl Streep'),
('Denzel Washington'),
('Scarlett Johansson'),
('Ryan Gosling'),
('Timothée Chalamet');

-- Films d'exemple
INSERT INTO films (nom_film, img_film, date_film, synopsis_film, ba_film) VALUES
('Inception', 'https://image.tmdb.org/t/p/w500/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg', 2010, 
'Dom Cobb est un voleur expérimenté dans l''art périlleux de l''extraction : sa spécialité consiste à s''approprier les secrets les plus précieux d''un individu, enfouis au plus profond de son subconscient.', 
'https://www.youtube.com/watch?v=YoHD9XEInc0'),

('The Matrix', 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg', 1999,
'Thomas A. Anderson, programmeur pour une respectable compagnie de logiciels, mène une double vie de hacker sous le pseudonyme de Neo.', 
'https://www.youtube.com/watch?v=vKQi3bBA1y8'),

('Interstellar', 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg', 2014,
'Dans un futur proche, face à une Terre exsangue, un groupe d''explorateurs utilise un vaisseau interstellaire pour franchir un trou de ver permettant de parcourir des distances jusque-là infranchissables.', 
'https://www.youtube.com/watch?v=zSWdZVtXT7E'),

('Pulp Fiction', 'https://image.tmdb.org/t/p/w500/d5iIlFn5s0ImszYzBPb8JPIfbXD.jpg', 1994,
'L''odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood.', 
'https://www.youtube.com/watch?v=s7EdQ4FqbhY'),

('Parasite', 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg', 2019,
'Toute la famille de Ki-taek est au chômage. Un jour, leur fils réussit à se faire recommander pour donner des cours particuliers d''anglais chez les Park, une famille richissime.', 
'https://www.youtube.com/watch?v=5xH0HfJHsaY'),

('Dune', 'https://image.tmdb.org/t/p/w500/d5NXSklXo0qyIYkgV94XAgMIckC.jpg', 2021,
'L''histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement.', 
'https://www.youtube.com/watch?v=8g18jFHCLXk');

-- Associations film-genre
INSERT INTO possede (id_film, id_genre) VALUES
(1, 1), (1, 4), -- Inception: Action, SF
(2, 1), (2, 4), -- Matrix: Action, SF
(3, 3), (3, 4), (3, 10), -- Interstellar: Drame, SF, Aventure
(4, 1), (4, 5), -- Pulp Fiction: Action, Thriller
(5, 3), (5, 5), -- Parasite: Drame, Thriller
(6, 1), (6, 4), (6, 10); -- Dune: Action, SF, Aventure

-- Associations film-réalisateur
INSERT INTO tourner (id_film, id_realisateur) VALUES
(1, 1), -- Inception - Nolan
(2, 1), -- Matrix - Nolan (exemple)
(3, 1), -- Interstellar - Nolan
(4, 3), -- Pulp Fiction - Tarantino
(5, 8), -- Parasite - Bong Joon-ho
(6, 5); -- Dune - Villeneuve

-- Associations film-acteur
INSERT INTO possede2 (id_film, id_acteur) VALUES
(1, 1), (1, 7), -- Inception: DiCaprio, Gosling
(2, 6), -- Matrix: Johansson
(3, 1), (3, 3), -- Interstellar: DiCaprio, Hanks
(4, 1), (4, 5), -- Pulp Fiction: DiCaprio, Washington
(5, 2), -- Parasite: Robbie
(6, 8); -- Dune: Chalamet
