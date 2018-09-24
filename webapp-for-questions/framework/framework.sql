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
CREATE TABLE `webapp` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `student_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Gegevens worden geëxporteerd voor tabel `song`
--
INSERT INTO `webapp` (`student_id`, `student_name`, `student_password`) VALUES
(1, `Rens`, `Acnologia`),
(2, `Floris`,`Lanselot1940`),
(3, `Bart`,`Bartkuip123`);
--
-- AUTO_INCREMENT voor een tabel `student`
--
ALTER TABLE `webapp`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99041395;
