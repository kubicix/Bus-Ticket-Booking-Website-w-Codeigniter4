-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Mar 2024, 22:32:05
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

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delayed_pnr_generation` (IN `new_ticket_id` INT)   BEGIN
    -- 10 saniye bekle
    DO SLEEP(10);

    -- Biletin Kalkış Yaptığı İlin Plaka Kodu
    SET @kalkis_plaka = (SELECT LEFT(otobus_plaka, 2) FROM tickets WHERE ticket_id = new_ticket_id);

    -- Öğleden Önce (ÖÖ) veya Öğleden Sonra (ÖS)
    SET @gun_zamani = CASE
        WHEN DATE_FORMAT((SELECT kalkis_tarih FROM tickets WHERE ticket_id = new_ticket_id), '%p') = 'AM' THEN 'ÖÖ'
        WHEN DATE_FORMAT((SELECT kalkis_tarih FROM tickets WHERE ticket_id = new_ticket_id), '%p') = 'PM' THEN 'ÖS'
        ELSE ''
    END;

    -- Bilet Satış Zamanı
    SET @satis_zamani = DATE_FORMAT((SELECT ticket_date FROM tickets WHERE ticket_id = new_ticket_id), '%d%m%Y%H%i%s');

    -- Peron Numarası (Rastgele Atanacak)
    SET @peron = CHAR(FLOOR(65 + RAND() * 26)); -- Rastgele büyük harf ASCII değeri (A-Z)

    -- Plaka
    SET @plaka = (SELECT otobus_plaka FROM tickets WHERE ticket_id = new_ticket_id);

    -- PNR Kodunu Oluşturma ve güncelleme
    UPDATE tickets
    SET pnr_code = CONCAT(@kalkis_plaka, @gun_zamani, @satis_zamani, @peron, @plaka)
    WHERE ticket_id = new_ticket_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `balances`
--

CREATE TABLE `balances` (
  `TcKimlik` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `TotalBalance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `balances`
--

INSERT INTO `balances` (`TcKimlik`, `TotalBalance`) VALUES
('11111', 9999485);

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
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `TcKimlik` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `AdiSoyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `StripeID` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Product` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Currency` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `İlkDurak` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `SonDurak` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `SeferTarihi` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `payments`
--

INSERT INTO `payments` (`TcKimlik`, `AdiSoyadi`, `email`, `StripeID`, `Product`, `Amount`, `Currency`, `Status`, `created_at`, `İlkDurak`, `SonDurak`, `SeferTarihi`) VALUES
('11111', 'Mutlucan Gokcukur', 'mutlu@gmail.com', '', '9', 310, 'try', 'succeeded', '2024-03-06 21:03:34', 'istanbul', 'antalya', '2024-04-10 15:00:00'),
('11111', 'Mutsuz Deneme', 'mutlu@gmail.com', 'ch_3OrOpdGwjXKy93pL1x2FXlHF', '14', 310, 'try', 'succeeded', '2024-03-06 21:04:46', 'istanbul', 'antalya', '2024-04-10 15:00:00'),
('11111', 'keramet canal', 'kb@stripe.com', 'ch_3OrQJ2GwjXKy93pL1WQQxziW', '36', 310, 'try', 'succeeded', '2024-03-06 22:39:12', 'istanbul', 'antalya', '2024-04-10 15:00:00'),
('11111', 'keramet canal', 'kimkdoe@gmail.com', 'ch_3OrQVPGwjXKy93pL1chAhtoc', '34', 310, 'try', 'succeeded', '2024-03-06 22:51:59', 'istanbul', 'antalya', '2024-04-10 15:00:00');

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
(2, 'istanbul', 'antalya', '41ABC21', '2024-04-10 15:00:00', 310),
(3, 'istanbul', 'edirne', '41KPK17', '2024-02-29 10:00:00', 310),
(4, 'istanbul', 'edirne', '41ABC21', '2024-02-29 02:48:54', 320),
(5, 'istanbul', 'antalya', '41ABC21', '2024-02-29 02:49:10', 330),
(6, 'istanbul', 'istanbul', '41ABC21', '2024-04-18 13:00:00', 333);

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
  `koltuk_no` varchar(255) NOT NULL,
  `is_bought` tinyint(1) NOT NULL,
  `ticket_date` datetime NOT NULL,
  `reservation_expiry_date` datetime DEFAULT NULL,
  `pnr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `kalkis_tarih`, `tcno`, `cinsiyet`, `otobus_plaka`, `koltuk_no`, `is_bought`, `ticket_date`, `reservation_expiry_date`, `pnr_code`) VALUES
(4, '2024-03-01 13:00:00', '0', 'E', '41ABC21', '1A', 1, '2024-02-29 11:06:04', '2024-02-29 11:06:04', NULL),
(5, '2024-03-01 13:00:00', '1', 'K', '41ABC21', '3A', 0, '2024-02-29 11:06:34', '2024-03-02 11:06:34', NULL),
(6, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '1A', 1, '2024-03-06 17:07:44', '0000-00-00 00:00:00', NULL),
(7, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '1A', 1, '2024-03-06 17:10:05', '0000-00-00 00:00:00', NULL),
(8, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '5A', 1, '2024-03-06 17:13:32', '0000-00-00 00:00:00', NULL),
(9, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '2A', 1, '2024-03-06 17:20:46', '0000-00-00 00:00:00', NULL),
(10, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '6A', 1, '2024-03-06 17:26:21', '0000-00-00 00:00:00', NULL),
(11, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '6A', 1, '2024-03-06 17:26:21', '0000-00-00 00:00:00', NULL),
(12, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '10A', 1, '2024-03-06 17:55:05', '0000-00-00 00:00:00', NULL),
(13, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '9A', 1, '2024-03-06 18:03:20', '0000-00-00 00:00:00', NULL),
(14, '2024-04-18 13:00:00', '11111', 'Erkek', '41ABC21', '14A', 1, '2024-03-06 18:04:34', '0000-00-00 00:00:00', NULL),
(15, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '36A', 1, '2024-03-06 19:38:54', '0000-00-00 00:00:00', NULL),
(16, '2024-04-10 15:00:00', '12', 'B', '41ABC21', '1A', 1, '2024-03-06 20:42:08', '2024-03-06 20:42:08', NULL),
(17, '2024-04-10 15:00:00', '6', 'B', '41ABC21', '3A', 1, '2024-03-06 20:45:12', '2024-03-06 20:45:12', NULL),
(18, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '32A', 1, '2024-03-06 19:51:25', NULL, '41ÖS06032024195125A41ABC21'),
(19, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '34A', 1, '2024-03-06 19:51:42', NULL, '41ÖS06032024195142Z41ABC21'),
(20, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '26A, 29A, 30A, 33A', 1, '2024-03-06 19:53:02', NULL, '41ÖS06032024195302Q41ABC21'),
(21, '2024-04-18 13:00:00', '11111', 'B', '41ABC21', '7A', 0, '2024-03-06 19:53:02', '2024-03-08 19:53:02', '41ÖS06032024195302R41ABC21'),
(22, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '28A, 31A', 1, '2024-03-06 21:14:16', NULL, '41ÖS06032024211416Z41ABC21');

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
CREATE TRIGGER `generate_pnr_code_and_set_expiry` BEFORE INSERT ON `tickets` FOR EACH ROW BEGIN
    -- PNR Kodunu Oluşturma
    SET NEW.pnr_code = CONCAT(
        LEFT(NEW.otobus_plaka, 2), -- Biletin Kalkış Yaptığı İlin Plaka Kodu
        CASE
            WHEN DATE_FORMAT(NEW.kalkis_tarih, '%p') = 'AM' THEN 'ÖÖ'
            WHEN DATE_FORMAT(NEW.kalkis_tarih, '%p') = 'PM' THEN 'ÖS'
            ELSE ''
        END,
        DATE_FORMAT(NEW.ticket_date, '%d%m%Y%H%i%s'), -- Bilet Satış Zamanı
        CHAR(FLOOR(65 + RAND() * 26)), -- Peron Numarası (Rastgele Atanacak)
        NEW.otobus_plaka -- Plaka
    );

    -- Rezervasyon son kullanma tarihini ayarlama
    IF NEW.is_bought = 0 THEN
        SET NEW.reservation_expiry_date = DATE_ADD(NEW.ticket_date, INTERVAL 2 DAY);
    ELSE
        SET NEW.reservation_expiry_date = NULL;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `TcKimlik` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `AdiSoyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CepTelefon` int(15) NOT NULL,
  `EMail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Gun` smallint(5) NOT NULL,
  `Ay` smallint(5) NOT NULL,
  `Yil` int(10) NOT NULL,
  `Il` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `Sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Cinsiyeti` varchar(10) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`TcKimlik`, `AdiSoyadi`, `CepTelefon`, `EMail`, `Gun`, `Ay`, `Yil`, `Il`, `Sifre`, `Cinsiyeti`) VALUES
('11111', 'Deneme1', 123456, 'deneme1@gmail.com', 1, 11, 2011, 'Istanbul', 'sifre1', 'E');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`TcKimlik`);

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
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`TcKimlik`);

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
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `balances_ibfk_1` FOREIGN KEY (`TcKimlik`) REFERENCES `users` (`TcKimlik`) ON DELETE CASCADE ON UPDATE CASCADE;

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
