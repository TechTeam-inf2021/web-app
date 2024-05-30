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
USE di_internet_technologies_project;

DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS tasklists;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    name VARCHAR(255),
    surname VARCHAR(255),
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255),
    email VARCHAR(255),
    simplepushio_key VARCHAR(255)
);

INSERT INTO users (name, surname, username, password, email, simplepushio_key) VALUES
('John', 'Doe', 'johndoe1', 'password1', 'johndoe1@example.com', 'Hza3j3'),
('Jane', 'Smith', 'janesmith1', 'password2', 'janesmith1@example.com', '73utPa'),
('Alice', 'Johnson', 'alicejohnson1', 'password3', 'alicejohnson1@example.com', 'key3'),
('Bob', 'Brown', 'bobbrown1', 'password4', 'bobbrown1@example.com', 'key4'),
('Charlie', 'Davis', 'charliedavis1', 'password5', 'charliedavis1@example.com', 'key5'),
('Eve', 'Miller', 'evemiller1', 'password6', 'evemiller1@example.com', 'key6'),
('Frank', 'Wilson', 'frankwilson1', 'password7', 'frankwilson1@example.com', 'key7'),
('Grace', 'Moore', 'gracemoore1', 'password8', 'gracemoore1@example.com', 'key8'),
('Hank', 'Taylor', 'hanktaylor1', 'password9', 'hanktaylor1@example.com', 'key9'),
('Ivy', 'Anderson', 'ivyanderson1', 'password10', 'ivyanderson1@example.com', 'key10');


CREATE TABLE tasklists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    user_name VARCHAR(255),
    FOREIGN KEY (user_name) REFERENCES users(username)
);

INSERT INTO tasklists (title, user_name) VALUES
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Alpha', 'johndoe1'),
('Project Beta', 'janesmith1'),
('Project Gamma', 'alicejohnson1'),
('Project Delta', 'bobbrown1'),
('Project Epsilon', 'charliedavis1'),
('Project Alpha - Phase 2', 'johndoe1'),
('Project Beta - Phase 2', 'janesmith1'),
('Project Gamma - Phase 2', 'alicejohnson1'),
('Project Delta - Phase 2', 'bobbrown1'),
('Project Epsilon - Phase 2', 'charliedavis1');


CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    date_time DATETIME,
    status VARCHAR(50) DEFAULT 'σε αναμονή',
    assigned_to VARCHAR(255),
    tasklist_id INT,
    FOREIGN KEY (assigned_to) REFERENCES users(username),
    FOREIGN KEY (tasklist_id) REFERENCES tasklists(id)
);

INSERT INTO tasks (title, date_time, status, assigned_to, tasklist_id) VALUES
('Task 1', '2024-05-01 09:00:00', 'σε αναμονή', 'alicejohnson1', 1),
('Task 2', '2024-05-01 10:00:00', 'σε εξέλιξη', 'johndoe1', 1),
('Task 3', '2024-05-01 11:00:00', 'ολοκληρωμένη', 'johndoe1', 1),
('Task 4', '2024-05-02 09:00:00', 'σε αναμονή', 'alicejohnson1', 1),
('Task 5', '2024-05-02 10:00:00', 'σε εξέλιξη', 'johndoe1', 1),
('Task 6', '2024-05-02 11:00:00', 'ολοκληρωμένη', 'johndoe1', 1),
('Task 7', '2024-05-03 09:00:00', 'σε αναμονή', 'johndoe1', 1),
('Task 8', '2024-05-03 10:00:00', 'σε εξέλιξη', 'alicejohnson1', 1),
('Task 9', '2024-05-03 11:00:00', 'ολοκληρωμένη', 'johndoe1', 1),
('Task 10', '2024-05-04 09:00:00', 'σε αναμονή', 'johndoe1', 1),
('Task 11', '2024-05-04 10:00:00', 'σε εξέλιξη', 'alicejohnson1', 1),
('Task 12', '2024-05-04 11:00:00', 'ολοκληρωμένη', 'johndoe1', 1),
('Task 13', '2024-05-05 09:00:00', 'σε αναμονή', 'johndoe1', 6),
('Task 14', '2024-05-05 10:00:00', 'σε εξέλιξη', 'johndoe1', 6),
('Task 15', '2024-05-05 11:00:00', 'ολοκληρωμένη', 'alicejohnson1', 6),
('Task 16', '2024-05-06 09:00:00', 'σε αναμονή', 'alicejohnson1', 6),
('Task 17', '2024-05-06 10:00:00', 'σε εξέλιξη', 'alicejohnson1', 6),
('Task 18', '2024-05-06 11:00:00', 'ολοκληρωμένη', 'johndoe1', 6),
('Task 19', '2024-05-07 09:00:00', 'σε αναμονή', 'johndoe1', 6),
('Task 20', '2024-05-07 10:00:00', 'σε εξέλιξη', 'johndoe1', 6);


-- Add an index on the assigned_to column in the tasks table to speed up queries on this column
CREATE INDEX idx_assigned_to ON tasks(assigned_to);

-- Add an index on the user_name column in the tasklists table to speed up queries on this column
CREATE INDEX idx_user_name ON tasklists(user_name);
