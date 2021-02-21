-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hostel_management
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

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
-- Table structure for table `staff_type`
--

DROP TABLE IF EXISTS `staff_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_type` (
  `s_type_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `s_type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`s_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_type`
--

LOCK TABLES `staff_type` WRITE;
/*!40000 ALTER TABLE `staff_type` DISABLE KEYS */;
INSERT INTO `staff_type` VALUES (1,'manager'),(2,'room'),(3,'food');
/*!40000 ALTER TABLE `staff_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffs` (
  `s_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `s_f_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_l_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_e_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_type_id` bigint unsigned NOT NULL,
  `s_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `users_email_unique` (`s_e_mail`),
  KEY `s_type_id` (`s_type_id`),
  CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`s_type_id`) REFERENCES `staff_type` (`s_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (9,'Moris','admin','admin@admin.in','1',1,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-17 18:30:00'),(10,'Ila Clarks','Noel Haley','kybuhudeso@mailinator.com','1',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-19 18:30:00'),(11,'Aretha Suarez','Stella Collins','rabit@mailinator.com','0',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-19 18:30:00'),(14,'Charity Frederick','Gray Farley','lyrako@mailinator.com','0',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(15,'Aileen Diaz','Ariel Cain','neme@mailinator.com','1',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(16,'Barrett Mercado','Keiko Crosby','hilimygoc@mailinator.com','0',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(17,'Nicholas Adams','Shafira Everett','fyjihigino@mailinator.com','0',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(18,'Sheila Bowen','Meredith Harrison','fuvodisyk@mailinator.com','0',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00');
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-21 14:20:36
