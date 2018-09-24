-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 16 mrt 2018 om 10:47
-- Serverversie: 5.6.38
-- PHP-versie: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `song_artist` varchar(60) NOT NULL,
  `song_name` varchar(60) NOT NULL,
  `song_url` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `song`
--

INSERT INTO `song` (`song_id`, `song_artist`, `song_name`, `song_url`) VALUES
(1, 'Johhny Cash', 'Ring of Fire', 'https://www.youtube.com/watch?v=QfCOJLRk2D4'),
(2, 'the Beatles', 'Here comes the sun', 'https://www.youtube.com/watch?v=U_O1QKQCsGs'),
(3, 'Israel Kamakawiwo‘ole', 'Over the rainbow', 'https://www.youtube.com/watch?v=V1bFr2SWP1I');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `student`
--

INSERT INTO `student` (`student_id`, `student_name`) VALUES
(99041392, 'Johan ter Wolde'),
(99041393, 'Johan Vlemminx'),
(99041394, 'Ben Vreemdeling');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `song`
--
ALTER TABLE `song`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99041395;
