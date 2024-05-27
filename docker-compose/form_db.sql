-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: di_internet_technologies_project
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tasklists`
--

DROP TABLE IF EXISTS `tasklists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasklists` (
  `List_Id` int NOT NULL,
  `User_Idf` int NOT NULL,
  `Name_of_List` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`List_Id`),
  KEY `User_Id` (`User_Idf`),
  CONSTRAINT `tasklists_ibfk_1` FOREIGN KEY (`User_Idf`) REFERENCES `user_data` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasklists`
--

LOCK TABLES `tasklists` WRITE;
/*!40000 ALTER TABLE `tasklists` DISABLE KEYS */;
INSERT INTO `tasklists` VALUES (79381455,78228003,'Axileas');
/*!40000 ALTER TABLE `tasklists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `Task_Id` int NOT NULL,
  `list_id` int NOT NULL,
  `usr_id` int NOT NULL,
  `Name_of_task` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_creation` date NOT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`Task_Id`),
  KEY `list_id` (`list_id`),
  KEY `usr_id` (`usr_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `tasklists` (`List_Id`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `user_data` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (28678062,79381455,78228003,'axileas','2024-05-07',0);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_data` (
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `surname` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `simplepush_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78228004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_data`
--

LOCK TABLES `user_data` WRITE;
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
INSERT INTO `user_data` VALUES ('╬æ╧Ç╬┐╧â╧ä╬┐╬╗╬╖╧é','╬¥╬╣╬║╬┐╬╗╬▒╬╣╬┤╬╖╧é','PanNik','1111','axileas32@gmail.com','2345',60150127),('Axileas','╬û╬╡╧ü╬▓╬┐╧é','Kapetan','2222','jack2@gmail.com','1234',78228003);
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-26 12:34:07
