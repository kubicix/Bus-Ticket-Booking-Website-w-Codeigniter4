-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3307
-- Üretim Zamanı: 25 Şub 2024, 14:03:11
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `AdiSoyadi` varchar(255) NOT NULL,
  `TcKimlik` varchar(15) NOT NULL,
  `CepTelefon` int(15) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Gun` smallint(5) NOT NULL,
  `Ay` smallint(5) NOT NULL,
  `Yil` int(10) NOT NULL,
  `Il` varchar(60) NOT NULL,
  `Sifre` varchar(255) NOT NULL,
  `Cinsiyeti` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`AdiSoyadi`, `TcKimlik`, `CepTelefon`, `EMail`, `Gun`, `Ay`, `Yil`, `Il`, `Sifre`, `Cinsiyeti`) VALUES
('wqeqeq', '51615151561', 0, 'qweqweq@hotmail.com', 1, 1, 1948, '7', 'qwerasd', 'E'),
('xzcxz', '29599595595', 1148751158, 'xzcxz@hotmail.com', 1, 12, 1965, '63', 'zxcv', 'B');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
