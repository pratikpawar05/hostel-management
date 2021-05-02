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
  `ROOM_ID` varchar(500) NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `cancel_request` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`B_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (65137060321,'2021-03-23 00:00:00','2021-03-26 00:00:00',1,0,'2021-03-06 05:51:37',17,'GO-3','completed','0'),(70520060321,'2021-03-28 00:00:00','2021-03-30 00:00:00',1,0,'2021-03-06 06:05:20',17,'GO-1','completed','0'),(70633060321,'2021-03-28 00:00:00','2021-03-30 00:00:00',1,0,'2021-03-06 06:06:33',17,'GO-2','completed','0'),(73531060321,'2021-03-29 00:00:00','2021-03-31 00:00:00',1,0,'2021-03-06 06:35:31',17,'GO-3','completed','0'),(73828060321,'2021-03-24 00:00:00','2021-03-28 00:00:00',2,1,'2021-03-06 06:38:28',17,'FO-4','completed','0'),(102334040321,'2021-03-05 00:00:00','2021-03-08 00:00:00',1,0,'2021-03-04 09:23:34',17,'GO-5','completed','0'),(102416040321,'2021-03-05 00:00:00','2021-03-08 00:00:00',2,1,'2021-03-04 09:24:16',17,'FO-1','completed','0'),(112004020521,'2021-05-04 00:00:00','2021-05-09 00:00:00',1,0,'2021-05-02 09:20:04',17,'GO-1','pending','0'),(112356020521,'2021-05-11 00:00:00','2021-05-15 00:00:00',1,0,'2021-05-02 09:23:56',17,'GO-1','pending','0');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

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
  `c_otp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_otp_verification_status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `c_created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `users_email_unique` (`c_e_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (4,'International','Justina Kent','Amela Bass','Eos error id dolore  ','Ut voluptatem sequi ','Autem nesciunt null',NULL,'qixagaloho@mailinator.com','2020-07-13','Transgender','Sunt unde eaque at ','Et aute est asperna','5f4dcc3b5aa765d61d8327deb882cf99',NULL,'0','2021-02-17 18:30:00'),(5,'International','Griffith Moss','Alexander Compton','Ut quia temporibus o ','Rem dicta labore rem','Officia consequatur',NULL,'qiqapi@mailinator.com','1994-09-21','Male','Et labore sit sint ','Doloremque obcaecati','5f4dcc3b5aa765d61d8327deb882cf99',NULL,'0','2021-02-17 18:30:00'),(6,'International','Shelly Koch','Brenda Malone','Modi velit et unde c ','Laboriosam est quia','Nam velit laudantium',NULL,'admin@admin.com','1975-10-03','Male','Ut tenetur error asp','Voluptates nihil ips','5f4dcc3b5aa765d61d8327deb882cf99','IHU25','1','2021-02-17 18:30:00'),(7,'Student','Malcolm','Gloria','Eius quis modi quae  ','123','Possimus magna quod',NULL,'sufumimi@mailinator.com','1983-11-01','Female','Aperiam quia neque q','Rem dolorem ad offic','5f4dcc3b5aa765d61d8327deb882cf99',NULL,'0','2021-02-17 18:30:00'),(8,'Student','Steven Sweet','Carolyn Clark','Deserunt ea aut quae ','Aliquid quia soluta ','Fugiat qui quia rei','99','pubitexome@mailinator.com','2004-06-17','Male','Laborum Hic dolor e','Blanditiis delectus','5f4dcc3b5aa765d61d8327deb882cf99',NULL,'0','2021-02-18 18:30:00'),(14,'International','Logan','Quemby','Ex aliquam ea adipis','48','Consequat Odio Nam ','Adipisci','ritep@mailinator.com','1980-11-01','Female','90','Recusandae Ea sapie','5f4dcc3b5aa765d61d8327deb882cf99','3K5w9','1','2021-03-02 18:30:00'),(15,'International','Travis','Ocean','Sunt irure non lauda','9','Esse saepe voluptati','Ametsss','qoxit@mailinator.com','2009-07-02','Female','51','Eum unde eu id qui u','5f4dcc3b5aa765d61d8327deb882cf99','nIxUW','1','2021-03-02 18:30:00'),(16,'Student','Rogan','Quamar','Dignissimos consequa ','88','Eligendi voluptate c','Ducimu','riqodapu@mailinator.com','2017-09-22','Female','96','Non odit sint omnis','5f4dcc3b5aa765d61d8327deb882cf99','lFBkX','1','2021-03-02 18:30:00'),(17,'International','Edward','Ryder','Dolorum libero in et ','73','Veritatis excepturi ','Aquo','togivoxeb@mailinator.com','2017-09-24','Female','30','Id laboris qui modi ','5f4dcc3b5aa765d61d8327deb882cf99','dODdJ','0','2021-03-02 18:30:00');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `complaints` (
  `Complaint_Id` int NOT NULL AUTO_INCREMENT,
  `Complaint_Desc` varchar(255) NOT NULL,
  `Complaint_type` varchar(255) NOT NULL,
  `Complaint_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `C_id` int NOT NULL,
  `Staff_Id` int DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`Complaint_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaints`
--

LOCK TABLES `complaints` WRITE;
/*!40000 ALTER TABLE `complaints` DISABLE KEYS */;
INSERT INTO `complaints` VALUES (7,'food is not good','food','2021-03-24 05:38:33',17,19,'completed'),(8,'Room Quality is too bad.','room','2021-03-24 05:52:47',17,19,'completed'),(9,'simple ','room','2021-05-02 13:35:08',6,NULL,'pending');
/*!40000 ALTER TABLE `complaints` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (17,'chai'),(12,'chairs'),(6,'cubboard'),(3,'dinning table'),(2,'table');
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
  PRIMARY KEY (`id`),
  KEY `fk_facility-room_1_idx` (`facility_id`),
  KEY `fk_facility-room_2_idx` (`room_id`),
  CONSTRAINT `fk_facility-room_1` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`facility_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_facility-room_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`ROOM_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility-room`
--

LOCK TABLES `facility-room` WRITE;
/*!40000 ALTER TABLE `facility-room` DISABLE KEYS */;
INSERT INTO `facility-room` VALUES (5,3,2),(7,12,1),(8,12,2),(9,2,2),(10,2,3),(11,2,4),(13,2,1),(14,2,5),(15,2,6),(16,2,7),(17,6,1),(18,6,2),(19,6,3),(20,6,20),(24,2,8),(28,12,3),(29,12,5),(30,12,20),(31,12,21),(32,12,23);
/*!40000 ALTER TABLE `facility-room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meal` (
  `meal_id` int NOT NULL AUTO_INCREMENT,
  `meal_name` varchar(255) NOT NULL,
  `meal_price` bigint DEFAULT '0',
  `meal_type_id` int NOT NULL,
  PRIMARY KEY (`meal_id`),
  UNIQUE KEY `meal_name_UNIQUE` (`meal_name`),
  KEY `meal_type_id` (`meal_type_id`),
  CONSTRAINT `fk_meal_1` FOREIGN KEY (`meal_type_id`) REFERENCES `meal_type` (`meal_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal`
--

LOCK TABLES `meal` WRITE;
/*!40000 ALTER TABLE `meal` DISABLE KEYS */;
INSERT INTO `meal` VALUES (1,'milk',101,1),(3,'paneer',100,2),(4,'roti',20,2),(5,'meat',250,3),(8,'Popcorn',40,1),(15,'Bread-Butter',2000,2),(16,'veg kolhapuri',450,3),(17,'chhapati',200,2);
/*!40000 ALTER TABLE `meal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal_type`
--

DROP TABLE IF EXISTS `meal_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meal_type` (
  `meal_type_id` int NOT NULL AUTO_INCREMENT,
  `meal_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`meal_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal_type`
--

LOCK TABLES `meal_type` WRITE;
/*!40000 ALTER TABLE `meal_type` DISABLE KEYS */;
INSERT INTO `meal_type` VALUES (1,'Breakfast'),(2,'Lunch'),(3,'Dinner');
/*!40000 ALTER TABLE `meal_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `PAYMENT_ID` varchar(255) NOT NULL,
  `PAYMENT_TYPE` varchar(255) NOT NULL,
  `PAYMENT_METHOD` varchar(255) NOT NULL,
  `PAYMENT_STATUS` varchar(255) NOT NULL,
  `PAYMENT_AMOUNT` varchar(255) NOT NULL,
  `MEAL_ORDER_ID` varchar(255) DEFAULT NULL,
  `B_ID` varchar(255) DEFAULT NULL,
  `STAFF_ID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PAYMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES ('p102334040321','room','offline','paid','3000',NULL,'102334040321','9'),('pay_GiWgUmGfen8kRR','room','online','paid','2100',NULL,'102416040321',NULL),('pay_GiWjNCaKjT3XOz','room','online','paid','2100',NULL,'102659040321',NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_type`
--

LOCK TABLES `room_type` WRITE;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
INSERT INTO `room_type` VALUES (2,'30ft',4,2,7000,'it\'s double bed room','double bed',196000),(5,'30ft',3,6,1800,'It\'s family room','Family room',50400),(29,'Repellendus Delenit',20,59,4700,'simple room','hello',131600),(30,'Voluptatem pariatur',32,36,200,'it\'s ac bed room','Ac with double bed',5600),(32,'20ft',38,10,200,'Obcaecati irure omnis','single bed',5600),(33,'Quibusdam dolore qui',51,47,7,'Inventore ut ex qui ','Ina Randolph',196);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'first floor','Not Available',2),(2,'first floor','Not Available',1),(3,'first floor','Available',2),(4,'first floor','Available',5),(5,'first floor','Available',4),(6,'first floor','Available',4),(7,'first floor','Available',4),(8,'ground floor','Available',1),(9,'ground floor','Available',1),(10,'ground floor','Available',1),(11,'ground floor','Not Available',5),(12,'ground floor','Available',3),(13,'ground floor','Available',3),(14,'ground floor','Available',3),(18,'second-floor','Not Available',4),(19,'second-floor','Not Available',2),(20,'second-floor','Not Available',2),(21,'second-floor','Not Available',2),(23,'third-floor','Not Available',4),(24,'third-floor','Not Available',5);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (9,'Nilesh','admin','admin@admin.in','1',1,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-17 18:30:00'),(10,'Ila Clarks','Noel Haley','kybuhudeso@mailinator.com','1',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-19 18:30:00'),(11,'Aretha Suarez','Stella Collins','rabit@mailinator.com','0',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-19 18:30:00'),(14,'Charity Frederick','Gray Farley','lyrako@mailinator.com','0',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(15,'Aileen Diaz','Ariel Cain','neme@mailinator.com','1',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(16,'Barrett Mercado','Keiko Crosby','hilimygoc@mailinator.com','0',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(17,'Nicholas Adams','Shafira Everett','fyjihigino@mailinator.com','0',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(18,'Sheila Bowen','Meredith Harrison','fuvodisyk@mailinator.com','0',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(19,'test','test','vinayak97@gmail.com','1',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-02-20 18:30:00'),(20,'Pratik','Pawar','eyost@example.org','1',2,'5f4dcc3b5aa765d61d8327deb882cf99','2021-04-24 18:30:00'),(21,'sample','test','test@gmail.com','1',3,'5f4dcc3b5aa765d61d8327deb882cf99','2021-04-24 18:30:00');
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

-- Dump completed on 2021-05-02 20:39:42
