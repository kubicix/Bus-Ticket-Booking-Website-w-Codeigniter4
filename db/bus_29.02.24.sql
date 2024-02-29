-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Şub 2024, 18:56:09
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 7.4.30

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
-- Tablo için tablo yapısı `buses`
--

CREATE TABLE `buses` (
  `otobus_id` int(11) NOT NULL,
  `otobus_plaka` varchar(9) NOT NULL,
  `otobus_marka` varchar(30) NOT NULL,
  `otobus_model` int(4) NOT NULL,
  `yolcu_kapasite` int(2) NOT NULL,
  `koltuk_sayisi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `buses`
--

INSERT INTO `buses` (`otobus_id`, `otobus_plaka`, `otobus_marka`, `otobus_model`, `yolcu_kapasite`, `koltuk_sayisi`) VALUES
(1, '41ABC21', 'Mercedes', 2012, 40, 40),
(3, '41KPK17', 'Otokar', 2020, 40, 40);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seferler`
--

CREATE TABLE `seferler` (
  `sefer_id` int(11) NOT NULL,
  `kalkis_yeri` varchar(50) NOT NULL,
  `varis_yeri` varchar(50) NOT NULL,
  `otobus_plaka` varchar(9) NOT NULL,
  `sefer_tarih` datetime DEFAULT NULL,
  `sefer_fiyat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `seferler`
--

INSERT INTO `seferler` (`sefer_id`, `kalkis_yeri`, `varis_yeri`, `otobus_plaka`, `sefer_tarih`, `sefer_fiyat`) VALUES
(2, 'istanbul', 'antalya', '41ABC21', '2024-02-29 15:00:00', 310),
(3, 'istanbul', 'edirne', '41KPK17', '2024-02-29 10:00:00', 310),
(4, 'istanbul', 'edirne', '41ABC21', '2024-02-29 02:48:54', 320),
(5, 'istanbul', 'antalya', '41ABC21', '2024-02-29 02:49:10', 330),
(6, 'istanbul', 'istanbul', '41ABC21', '2024-03-01 13:00:00', 333);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `kalkis_tarih` datetime NOT NULL,
  `tcno` varchar(15) NOT NULL,
  `cinsiyet` varchar(10) NOT NULL,
  `otobus_plaka` varchar(9) NOT NULL,
  `koltuk_no` varchar(3) NOT NULL,
  `is_bought` tinyint(1) NOT NULL,
  `ticket_date` datetime NOT NULL,
  `reservation_expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `kalkis_tarih`, `tcno`, `cinsiyet`, `otobus_plaka`, `koltuk_no`, `is_bought`, `ticket_date`, `reservation_expiry_date`) VALUES
(4, '2024-03-01 13:00:00', '0', 'E', '41ABC21', '1A', 1, '2024-02-29 11:06:04', '2024-02-29 11:06:04'),
(5, '2024-03-01 13:00:00', '1', 'K', '41ABC21', '3A', 0, '2024-02-29 11:06:34', '2024-03-02 11:06:34');

--
-- Tetikleyiciler `tickets`
--
DELIMITER $$
CREATE TRIGGER `delete_doesnt_bought_tickets` BEFORE INSERT ON `tickets` FOR EACH ROW BEGIN
    IF NEW.is_bought = 0 AND NEW.reservation_expiry_date <= NOW() THEN
        DELETE FROM tickets WHERE ticket_id = NEW.ticket_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_expired_tickets` BEFORE INSERT ON `tickets` FOR EACH ROW BEGIN
    IF NEW.kalkis_tarih <= NOW() THEN
        DELETE FROM tickets WHERE ticket_id = NEW.ticket_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_expiry_and_delete` BEFORE INSERT ON `tickets` FOR EACH ROW BEGIN
    IF NEW.is_bought = 0 THEN
        SET NEW.reservation_expiry_date = DATE_ADD(NEW.ticket_date, INTERVAL 2 DAY);
    END IF;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`AdiSoyadi`, `TcKimlik`, `CepTelefon`, `EMail`, `Gun`, `Ay`, `Yil`, `Il`, `Sifre`, `Cinsiyeti`) VALUES
('wqeqeq', '51615151561', 0, 'qweqweq@hotmail.com', 1, 1, 1948, '7', 'qwerasd', 'E'),
('xzcxz', '29599595595', 1148751158, 'xzcxz@hotmail.com', 1, 12, 1965, '63', 'zxcv', 'B');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`otobus_id`),
  ADD UNIQUE KEY `plaka` (`otobus_plaka`);

--
-- Tablo için indeksler `seferler`
--
ALTER TABLE `seferler`
  ADD PRIMARY KEY (`sefer_id`),
  ADD KEY `otobus_plaka` (`otobus_plaka`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `tickets_plaka` (`otobus_plaka`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `buses`
--
ALTER TABLE `buses`
  MODIFY `otobus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `seferler`
--
ALTER TABLE `seferler`
  MODIFY `sefer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `seferler`
--
ALTER TABLE `seferler`
  ADD CONSTRAINT `otobus_plaka` FOREIGN KEY (`otobus_plaka`) REFERENCES `buses` (`otobus_plaka`);

--
-- Tablo kısıtlamaları `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_plaka` FOREIGN KEY (`otobus_plaka`) REFERENCES `buses` (`otobus_plaka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
