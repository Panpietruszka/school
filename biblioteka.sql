-- =========================
-- baza danych: biblioteka
-- =========================
CREATE DATABASE IF NOT EXISTS biblioteka
CHARACTER SET utf8mb4
COLLATE utf8mb4_polish_ci;

USE biblioteka;

-- =========================
-- tabela: ksiazki
-- =========================
CREATE TABLE ksiazki (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tytul VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    rok_wydania INT NOT NULL
) ENGINE=InnoDB;

-- =========================
-- 50 rekordów testowych
-- =========================
INSERT INTO ksiazki (tytul, autor, rok_wydania) VALUES
('Lalka', 'Bolesław Prus', 1890),
('Quo Vadis', 'Henryk Sienkiewicz', 1896),
('Ferdydurke', 'Witold Gombrowicz', 1937),
('Pan Tadeusz', 'Adam Mickiewicz', 1834),
('Zbrodnia i kara', 'Fiodor Dostojewski', 1866),
('Rok 1984', 'George Orwell', 1949),
('Folwark zwierzęcy', 'George Orwell', 1945),
('Dziady', 'Adam Mickiewicz', 1823),
('Chłopi', 'Władysław Reymont', 1904),
('Krzyżacy', 'Henryk Sienkiewicz', 1900),
('Potop', 'Henryk Sienkiewicz', 1886),
('Ogniem i mieczem', 'Henryk Sienkiewicz', 1884),
('Mistrz i Małgorzata', 'Michaił Bułhakow', 1966),
('Przeminęło z wiatrem', 'Margaret Mitchell', 1936),
('Mały Książę', 'Antoine de Saint-Exupéry', 1943),
('Hobbit', 'J.R.R. Tolkien', 1937),
('Władca Pierścieni', 'J.R.R. Tolkien', 1954),
('Harry Potter i Kamień Filozoficzny', 'J.K. Rowling', 1997),
('Harry Potter i Komnata Tajemnic', 'J.K. Rowling', 1998),
('Harry Potter i Więzień Azkabanu', 'J.K. Rowling', 1999),
('Harry Potter i Czara Ognia', 'J.K. Rowling', 2000),
('Harry Potter i Zakon Feniksa', 'J.K. Rowling', 2003),
('Harry Potter i Książę Półkrwi', 'J.K. Rowling', 2005),
('Harry Potter i Insygnia Śmierci', 'J.K. Rowling', 2007),
('Gra o tron', 'George R.R. Martin', 1996),
('Starcie królów', 'George R.R. Martin', 1998),
('Nawałnica mieczy', 'George R.R. Martin', 2000),
('Uczta dla wron', 'George R.R. Martin', 2005),
('Taniec ze smokami', 'George R.R. Martin', 2011),
('W pustyni i w puszczy', 'Henryk Sienkiewicz', 1911),
('Opowieści z Narnii', 'C.S. Lewis', 1950),
('Solaris', 'Stanisław Lem', 1961),
('Cyberiada', 'Stanisław Lem', 1965),
('Bajki robotów', 'Stanisław Lem', 1964),
('Dzienniki gwiazdowe', 'Stanisław Lem', 1957),
('Narrenturm', 'Andrzej Sapkowski', 2002),
('Boży bojownicy', 'Andrzej Sapkowski', 2004),
('Lux perpetua', 'Andrzej Sapkowski', 2006),
('Ostatnie życzenie', 'Andrzej Sapkowski', 1993),
('Miecz przeznaczenia', 'Andrzej Sapkowski', 1992),
('Krew elfów', 'Andrzej Sapkowski', 1994),
('Czas pogardy', 'Andrzej Sapkowski', 1995),
('Chrzest ognia', 'Andrzej Sapkowski', 1996),
('Wieża Jaskółki', 'Andrzej Sapkowski', 1997),
('Pani Jeziora', 'Andrzej Sapkowski', 1999),
('Inferno', 'Dan Brown', 2013),
('Kod Leonarda da Vinci', 'Dan Brown', 2003),
('Anioły i demony', 'Dan Brown', 2000);
