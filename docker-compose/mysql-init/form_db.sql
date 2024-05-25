-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 25 Μάη 2024 στις 17:45:10
-- Έκδοση διακομιστή: 10.4.32-MariaDB
-- Έκδοση PHP: 8.0.30
use di_internet_technologies_project;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `form_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tasklists`
--

CREATE TABLE `tasklists` (
  `List_Id` int(11) NOT NULL,
  `User_Idf` int(11) NOT NULL,
  `Name_of_List` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `tasklists`
--

INSERT INTO `tasklists` (`List_Id`, `User_Idf`, `Name_of_List`) VALUES
(79381455, 78228003, 'Axileas');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tasks`
--

CREATE TABLE `tasks` (
  `Task_Id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `Name_of_task` varchar(255) NOT NULL,
  `Date_creation` date NOT NULL,
  `status` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `tasks`
--

INSERT INTO `tasks` (`Task_Id`, `list_id`, `usr_id`, `Name_of_task`, `Date_creation`, `status`) VALUES
(28678062, 79381455, 78228003, 'axileas', '2024-05-07', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_data`
--

CREATE TABLE `user_data` (
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `surname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `simplepush_key` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `user_data`
--

INSERT INTO `user_data` (`name`, `surname`, `username`, `password`, `email`, `simplepush_key`, `user_id`) VALUES
('Αποστολης', 'Νικολαιδης', 'PanNik', 1111, 'axileas32@gmail.com', '2345', 60150127),
('Axileas', 'Ζερβος', 'Kapetan', 2222, 'jack2@gmail.com', '1234', 78228003);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `tasklists`
--
ALTER TABLE `tasklists`
  ADD PRIMARY KEY (`List_Id`),
  ADD KEY `User_Id` (`User_Idf`);

--
-- Ευρετήρια για πίνακα `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Task_Id`),
  ADD KEY `list_id` (`list_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Ευρετήρια για πίνακα `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78228004;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `tasklists`
--
ALTER TABLE `tasklists`
  ADD CONSTRAINT `tasklists_ibfk_1` FOREIGN KEY (`User_Idf`) REFERENCES `user_data` (`user_id`);

--
-- Περιορισμοί για πίνακα `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `tasklists` (`List_Id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `user_data` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
