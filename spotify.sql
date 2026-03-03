-- =========================
-- baza danych: spotify
-- =========================
CREATE DATABASE IF NOT EXISTS spotify
CHARACTER SET utf8mb4
COLLATE utf8mb4_polish_ci;

USE spotify;

-- =========================
-- tabela: utwory
-- =========================
CREATE TABLE utwory (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tytul VARCHAR(255) NOT NULL,
    artysta VARCHAR(255) NOT NULL,
    album VARCHAR(255) NOT NULL,
    gatunek VARCHAR(100) NOT NULL,
    rok_wydania INT NOT NULL,
    dlugosc_sec INT NOT NULL,          -- długość utworu w sekundach
    popularnosc TINYINT UNSIGNED NOT NULL, -- 0–100
    explicite BOOLEAN NOT NULL DEFAULT 0,
    liczba_odsluchan BIGINT UNSIGNED NOT NULL
) ENGINE=InnoDB;

-- =========================
-- rekordy testowe
-- =========================
INSERT INTO utwory
(tytul, artysta, album, gatunek, rok_wydania, dlugosc_sec, popularnosc, explicite, liczba_odsluchan)
VALUES
('Blinding Lights', 'The Weeknd', 'After Hours', 'Pop', 2020, 200, 98, 0, 3500000000),
('Shape of You', 'Ed Sheeran', 'Divide', 'Pop', 2017, 233, 97, 0, 3900000000),
('Smells Like Teen Spirit', 'Nirvana', 'Nevermind', 'Rock', 1991, 301, 95, 1, 1900000000),
('Bohemian Rhapsody', 'Queen', 'A Night at the Opera', 'Rock', 1975, 354, 96, 0, 2100000000),
('Bad Guy', 'Billie Eilish', 'When We All Fall Asleep', 'Pop', 2019, 194, 94, 1, 1800000000),
('Lose Yourself', 'Eminem', '8 Mile', 'Hip-Hop', 2002, 326, 96, 1, 2200000000),
('Rolling in the Deep', 'Adele', '21', 'Pop', 2011, 228, 92, 0, 1700000000),
('Numb', 'Linkin Park', 'Meteora', 'Rock', 2003, 185, 93, 0, 1600000000),
('Stay', 'The Kid LAROI', 'F*CK LOVE 3', 'Pop', 2021, 141, 91, 1, 2000000000),
('Someone You Loved', 'Lewis Capaldi', 'Divinely Uninspired', 'Pop', 2019, 182, 90, 0, 1600000000),
('Believer', 'Imagine Dragons', 'Evolve', 'Alternative', 2017, 204, 93, 0, 1900000000),
('Take On Me', 'a-ha', 'Hunting High and Low', 'Pop', 1985, 225, 89, 0, 1300000000),
('Havana', 'Camila Cabello', 'Camila', 'Pop', 2018, 217, 90, 0, 1700000000),
('Thunderstruck', 'AC/DC', 'The Razors Edge', 'Rock', 1990, 292, 94, 0, 1500000000),
('Uptown Funk', 'Mark Ronson', 'Uptown Special', 'Funk', 2014, 269, 95, 0, 2000000000);
