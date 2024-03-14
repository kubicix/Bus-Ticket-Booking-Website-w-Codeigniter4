-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Mar 2024, 11:29:24
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
  `TcKimlik` varchar(15) NOT NULL,
  `TotalBalance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `balances`
--

INSERT INTO `balances` (`TcKimlik`, `TotalBalance`) VALUES
('11111', 10001105),
('1234567', 199997);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `TcKimlik` varchar(15) NOT NULL,
  `AdiSoyadi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `StripeID` varchar(255) DEFAULT NULL,
  `Product` varchar(255) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Currency` varchar(3) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `İlkDurak` varchar(255) NOT NULL,
  `SonDurak` varchar(255) NOT NULL,
  `SeferTarihi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `payments`
--

INSERT INTO `payments` (`TcKimlik`, `AdiSoyadi`, `email`, `StripeID`, `Product`, `Amount`, `Currency`, `Status`, `created_at`, `İlkDurak`, `SonDurak`, `SeferTarihi`) VALUES
('11111', 'Mutlucan Gokcukur', 'mutlu@gmail.com', 'ch_3OsUd5GwjXKy93pL0639CB1o', '1A', 333.00, 'try', 'returned', '2024-03-09 18:28:20', 'istanbul', 'istanbul', '2024-04-18 13:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resetpassword`
--

CREATE TABLE `resetpassword` (
  `email` varchar(50) NOT NULL,
  `reset_token_hash` varchar(255) DEFAULT NULL,
  `reset_token_expires_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `kalkis_tarih`, `tcno`, `cinsiyet`, `otobus_plaka`, `koltuk_no`, `is_bought`, `ticket_date`, `reservation_expiry_date`, `pnr_code`) VALUES
(4, '2024-04-10 15:00:00', '11111', 'E', '41ABC21', '1A, 2A, 5A, 10A', 1, '2024-03-09 23:09:13', NULL, '41ÖS09032024230913S41ABC21'),
(5, '2024-04-10 15:00:00', '11111', 'E', '41ABC21', '2A, 3A, 5A, 6A, 7A', 0, '2024-03-09 23:09:22', '2024-03-11 23:09:22', '41ÖS09032024230922F41ABC21'),
(6, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '1A, 2A, 5A', 0, '2024-03-09 23:09:49', '2024-03-11 23:09:49', '41ÖS09032024230949J41ABC21'),
(7, '2024-04-18 13:00:00', '11111', 'E', '41ABC21', '3A, 6A, 7A, 11A', 1, '2024-03-09 23:10:01', NULL, '41ÖS09032024231001P41ABC21'),
(8, '2024-04-10 15:00:00', '11111', 'E', '41ABC21', '40A', 1, '2024-03-10 19:05:08', NULL, '41ÖS10032024190508I41ABC21');

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
  `TcKimlik` varchar(15) NOT NULL,
  `AdiSoyadi` varchar(255) NOT NULL,
  `CepTelefon` int(15) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Gun` smallint(5) NOT NULL,
  `Ay` smallint(5) NOT NULL,
  `Yil` int(10) NOT NULL,
  `Il` varchar(60) NOT NULL,
  `Sifre` varchar(255) NOT NULL,
  `Cinsiyeti` varchar(10) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`TcKimlik`, `AdiSoyadi`, `CepTelefon`, `EMail`, `Gun`, `Ay`, `Yil`, `Il`, `Sifre`, `Cinsiyeti`, `is_admin`) VALUES
('11111', 'Deneme1', 123456, 'a@gmail.com', 1, 11, 2011, 'Istanbul', 'denemesifre1', 'E', 1),
('1234567', 'mutsuz', 3456, 'm@gmail.com', 1, 1, 2021, 'Kocaeli', 'sifre22', 'Erkek', 0);

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
-- Tablo için indeksler `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD KEY `reset_token_hash` (`reset_token_hash`);

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
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
