-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 17.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'sandy@gmail.com', '$2y$10$ASrnH'),
(2, 'tes@gmail.com', '$2y$10$pQGoO'),
(3, 'tes123@gmail.com', '$2y$10$MUWbW'),
(4, 'sunsetgogo179@gmail.com', '$2y$10$J6pCF'),
(5, 'testing@gmail.com', '$2y$10$YZMUBUGl5q8clEO9ef7bz.n4HMzbyNEtrjxYEjuAKVm5HDHgR9vPy'),
(6, 'sandy1@gmail.com', '$2y$10$ajC/8ImfQmmGhmmkCDZpvOTGVTAfDZJqnPQW.4apklrjiIguwtMni'),
(7, 'lumowasandy@yahoo.com', '$2y$10$i30f3IBL4I8iRYLurkugueoWC3EIk3Q4zvyYbQ5X/Eu4Skr103wEO'),
(8, 'sunsetgogo@gmail.com', '$2y$10$usHnXUnT9AHqDAcWSqB9jO1ZzjQa4kkHqjeU0WAavZrDprj2.ka7q'),
(9, 'qwe@gmail.com', 'qwe123'),
(10, 'test1@gmail.com', '123qwe'),
(11, 'sandylumowa@gmail.com', '123qwe');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
