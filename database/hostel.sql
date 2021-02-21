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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `c_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `c_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_f_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_l_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_nic` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_e_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_dob` date DEFAULT NULL,
  `c_gender` enum('Male','Female','Transgender') COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `users_email_unique` (`c_e_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (4,'International','Justina Kent','Amela Bass','Eos error id dolore  ','Ut voluptatem sequi ','Autem nesciunt null',NULL,'qixagaloho@mailinator.com','2020-07-13','Transgender','Sunt unde eaque at ','Et aute est asperna','5f4dcc3b5aa765d61d8327deb882cf99','2021-02-17 18:30:00'),(5,'International','Griffith Moss','Alexander Compton','Ut quia temporibus o ','Rem dicta labore rem','Officia consequatur',NULL,'qiqapi@mailinator.com','1994-09-21','Male','Et labore sit sint ','Doloremque obcaecati','5f4dcc3b5aa765d61d8327deb882cf99','2021-02-17 18:30:00'),(6,'International','Shelly Koch','Brenda Malone','Modi velit et unde c ','Laboriosam est quia','Nam velit laudantium',NULL,'admin@admin.com','1975-10-03','Male','Ut tenetur error asp','Voluptates nihil ips','5f4dcc3b5aa765d61d8327deb882cf99','2021-02-17 18:30:00'),(7,'Student','Malcolm','Gloria','Eius quis modi quae  ','123','Possimus magna quod',NULL,'sufumimi@mailinator.com','1983-11-01','Female','Aperiam quia neque q','Rem dolorem ad offic','5f4dcc3b5aa765d61d8327deb882cf99','2021-02-17 18:30:00'),(8,'Student','Steven Sweet','Carolyn Clark','Deserunt ea aut quae ','Aliquid quia soluta ','Fugiat qui quia rei','99','pubitexome@mailinator.com','2004-06-17','Male','Laborum Hic dolor e','Blanditiis delectus','5f4dcc3b5aa765d61d8327deb882cf99','2021-02-18 18:30:00'),(9,'','pratik','pawar','\"VISHWAREKHA\" Plot No. 7, Swami Muktanand Nagar(Board No.4), Bhadgaon Road ','424101','India','11111111111111','icanpratikpawar@gmail.com','2021-02-26','Male','08830081411','Chalisgaon','dc1fe64bac63ad21054534afce389e65','2021-02-20 18:30:00'),(10,'Student','Jakeem','May','In perspiciatis et  ','17','Et do sit pariatur ','Velquinostru','cukiwip@mailinator.com','1985-02-09','Male','8830081411','Nobis vel exercitati','5f4dcc3b5aa765d61d8327deb882cf99','2021-02-21 18:30:00');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-22  0:15:26
