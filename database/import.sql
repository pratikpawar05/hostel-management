-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hostel_management
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `B_ID` bigint NOT NULL,
  `B_CHECK_IN_DATE` datetime NOT NULL,
  `B_CHECK_OUT_DATE` datetime NOT NULL,
  `NUM_OF_ADULT` int NOT NULL,
  `NUM_OF_CHILD` int NOT NULL,
  `B_CREATION_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `C_ID` bigint NOT NULL,
  `ROOM_ID` int NOT NULL,
  PRIMARY KEY (`B_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (120906030321,'2021-03-04 00:00:00','2021-03-08 00:00:00',1,0,'2021-03-03 11:09:06',6,8),(121351030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,0,'2021-03-03 11:13:51',6,4),(121406030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,0,'2021-03-03 11:14:06',6,11),(122327030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,0,'2021-03-03 11:23:27',6,8),(122401030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,0,'2021-03-03 11:24:01',6,9),(122410030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,0,'2021-03-03 11:24:10',6,10),(140224030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,1,'2021-03-03 13:02:24',6,1),(140238030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,1,'2021-03-03 13:02:38',6,2),(140241030321,'2021-03-04 00:00:00','2021-03-07 00:00:00',1,1,'2021-03-03 13:02:41',6,3),(185548030321,'2021-03-10 00:00:00','2021-03-14 00:00:00',2,2,'2021-03-03 17:55:48',6,4),(185559030321,'2021-03-10 00:00:00','2021-03-14 00:00:00',2,2,'2021-03-03 17:55:59',6,11);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility` (
  `facility_id` int NOT NULL AUTO_INCREMENT,
  `facility_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`facility_id`),
  UNIQUE KEY `facility_name_UNIQUE` (`facility_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (3,'chairs'),(2,'table');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility-room`
--

DROP TABLE IF EXISTS `facility-room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility-room` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facility_id` int NOT NULL,
  `room_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility-room`
--

LOCK TABLES `facility-room` WRITE;
/*!40000 ALTER TABLE `facility-room` DISABLE KEYS */;
INSERT INTO `facility-room` VALUES (5,3,2),(7,2,1);
/*!40000 ALTER TABLE `facility-room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_type` (
  `room_type_id` int NOT NULL AUTO_INCREMENT,
  `room_size` varchar(255) NOT NULL,
  `no_of_beds` int NOT NULL,
  `max_occupancy` int NOT NULL,
  `daily_rate` bigint NOT NULL,
  `room_desc` varchar(255) NOT NULL,
  `r_type_name` varchar(255) NOT NULL,
  `monthly_rate` bigint NOT NULL,
  PRIMARY KEY (`room_type_id`),
  UNIQUE KEY `Room Type Name` (`r_type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_type`
--

LOCK TABLES `room_type` WRITE;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
INSERT INTO `room_type` VALUES (1,'30ft',1,1,400,'it\'s a single bed room','single bed',11200),(2,'30ft',2,2,700,'it\'s double bed room','double bed',30000),(4,'30ft',1,3,1200,'It\'s Ac with double bed room','Ac with double bed',33600),(5,'30ft',3,6,1800,'It\'s family room','Family room',50400),(21,'40ft',20,70,63,'Obcaecati illum est','single',1764),(22,'50ft',1,1,22,'1','Singles',1);
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `ROOM_ID` int NOT NULL AUTO_INCREMENT,
  `ROOM_LEVEL` varchar(255) NOT NULL,
  `ROOM_STATUS` varchar(255) NOT NULL,
  `ROOM_TYPE_ID` int NOT NULL,
  PRIMARY KEY (`ROOM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'first floor','Available',1),(2,'first floor','Available',2),(3,'first floor','Available',2),(4,'first floor','Available',5),(5,'first floor','Available',4),(6,'first floor','Available',4),(7,'first floor','Available',4),(8,'ground floor','Available',1),(9,'ground floor','Available',1),(10,'ground floor','Available',1),(11,'ground floor','Available',5),(12,'ground floor','Available',3),(13,'ground floor','Available',3),(14,'ground floor','Available',3),(16,'second-floor','Vacant',21),(17,'second-floor','Vacant',21),(18,'second-floor','Available',4);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-18 22:48:50
