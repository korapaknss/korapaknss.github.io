-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Mar 2023, 22:30
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_komputerowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Monitory'),
(2, 'Klawiatury'),
(3, 'Myszki'),
(4, 'Słuchawki'),
(5, 'Obudowy'),
(6, 'Karty Graficzne'),
(7, 'Procesory'),
(8, 'Chłodzenia'),
(9, 'Pamięć RAM'),
(10, 'Dyski Twarde'),
(11, 'Karty Dźwiękowe'),
(12, 'Karty Sieciowe'),
(13, 'Zasilacze'),
(14, 'Mikrofony'),
(15, 'Konserwacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` int(11) NOT NULL,
  `apartment_number` int(11) NOT NULL,
  `phone_number` int(9) NOT NULL,
  `regular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `birthdate`, `country`, `city`, `postal_code`, `street`, `house_number`, `apartment_number`, `phone_number`, `regular`) VALUES
(1, 'marcin', 'marcinmucha@gmail.com', 'Haslo123!', 'Marcin', 'Mucha', '2023-03-16', 'Polska', 'Wejcherowo', '41-200', 'Papajowa', 12, 2, 877342123, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `qt_in_stock` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `qt_in_stock`, `image`, `category_id`) VALUES
(1, 'Myszka', 159.99, 40, '..\\images\\mouse.jpg', 3),
(2, 'Klawiatura', 439.99, 200, '..\\images\\keyboard.jpg', 2),
(3, 'Monitor', 649.99, 154, '..\\images\\monitor.jpg', 1),
(4, 'Mikrofon', 319.99, 53, '..\\images\\microphone.jpg', 14),
(5, 'Karta Graficzna', 1999.99, 49, '..\\images\\gcard.jpg', 6),
(6, 'Chłodzenie', 289.99, 93, '..\\images\\cooling.jpg', 8),
(7, 'Pamięć RAM', 244.99, 109, '..\\images\\ram.jpg', 9),
(8, 'Dysk Twardy', 359.99, 211, '..\\images\\drive.jpg', 10),
(9, 'Słuchawki', 109.99, 272, '..\\images\\headphones.jpg', 4),
(10, 'Obudowa', 159.99, 132, '..\\images\\case.jpg', 5),
(11, 'Pasta termoprzewodząca', 59.99, 420, '..\\images\\paste.jpg', 15),
(12, 'Procesor', 1299.99, 190, '..\\images\\processor.jpg', 7),
(13, 'Zasilacz', 699.99, 111, '..\\images\\psu.jpg', 13),
(14, 'Karta Sieciowa', 129.99, 232, '..\\images\\network.jpg', 12),
(15, 'Karta Dźwiękowa', 89.99, 254, '..\\images\\sound.jpg', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `percent_off` int(11) NOT NULL,
  `new_price` float NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(30) NOT NULL,
  `delivery_method` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `sales`
--
ALTER TABLE `sales`
  ADD KEY `product_id` (`product_id`);

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ograniczenia dla tabeli `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ograniczenia dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
