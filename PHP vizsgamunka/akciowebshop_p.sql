-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 11. 19:45
-- Kiszolgáló verziója: 8.3.0
-- PHP verzió: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `akciowebshop_p`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `arajanlat`
--

CREATE TABLE `arajanlat` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `language1` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `language2` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `szolgaltatas` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `hatarido` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kuldes` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `fileToUpload` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `message` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `arajanlat`
--

INSERT INTO `arajanlat` (`id`, `name`, `phone`, `email`, `language1`, `language2`, `szolgaltatas`, `hatarido`, `kuldes`, `fileToUpload`, `message`, `created`) VALUES
(1, 'Nagy Noémi', '06203854569', 'valami@gmail.com', 'spanyol', 'torok', '2', '3', '1', 'fileToUpload_661b947e119bb.png', 'vfljhvljh', '0000-00-00 00:00:00'),
(2, 'Nagy Noémi', '06203854569', 'valami@gmail.com', 'magyar', 'nemet', '1', '1', '2', 'fileToUpload_661b949659b33.png', 'hgreaujhgljae', '0000-00-00 00:00:00'),
(3, 'Benhardt Mária', '+491728854571', 'marcsi@gmail.com', 'magyar', 'angol', '1', '2', '1', 'fileToUpload_663fa513d992d.jpeg', 'A csatolt dokumentumra kérek árajánlatot, köszönöm!', '0000-00-00 00:00:00'),
(4, 'Orosz Gábor', '+491728847877', 'ogabo@freemail.hu', 'nemet', 'magyar', '3', '1', '1', 'fileToUpload_663fa81b98842.jpg', '', '0000-00-00 00:00:00'),
(5, 'Bernhardt Dóra', '+36204567851', 'dorcsi@gmail.com', 'magyar', 'nemet', '1', '3', '3', 'fileToUpload_663fad314925b.jpg', '', '0000-00-00 00:00:00'),
(6, 'Kirschneider Tündi', '+491794568451', 'tuncik@gmail.com', 'nemet', 'magyar', '1', '1', '1', 'fileToUpload_663fada36a5c5.jpg', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `arak`
--

CREATE TABLE `arak` (
  `id` int NOT NULL,
  `bizonyitvany` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nyomtatvany` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `idegenrol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `magyarrol` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `lektoralas` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `felarKetto` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `felarEgy` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `arak`
--

INSERT INTO `arak` (`id`, `bizonyitvany`, `nyomtatvany`, `idegenrol`, `magyarrol`, `lektoralas`, `felarKetto`, `felarEgy`, `created`) VALUES
(1, '18,90', '10', '0,008', '0,009', '0,006', '50', '100', '2024-04-14 14:39:55');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `message` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `datum`) VALUES
(4, 'Nagy Noémi', 'valami@gmail.com', 'jgcvjghvl,j', '2024-04-14 08:33:47'),
(5, 'Molnár Anna', 'molnar@gmail.com', 'Vállalnak tolmácsolást telefonon is? Köszönöm!', '2024-05-11 17:18:26'),
(6, 'Dani Károly', 'karoli@gmail.com', 'A fordítási anyagokat nyomdakészre is tudják szerkeszteni?', '2024-05-11 17:19:56'),
(7, 'Ráti Izabella', 'riza@info.hu', 'A határidőknél csak a munkanap számłt?', '2024-05-11 17:21:54'),
(8, 'Kis Angelika', 'angika@gmail.com', 'Nincs kérdésem, csak úgy írok :)', '2024-05-11 17:22:38');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'info@e-forditas.eu', 'admin', 'Szilvi');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `arajanlat`
--
ALTER TABLE `arajanlat`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `arak`
--
ALTER TABLE `arak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `arajanlat`
--
ALTER TABLE `arajanlat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `arak`
--
ALTER TABLE `arak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
