-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: recognizer
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `api_users`
--

DROP TABLE IF EXISTS `api_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK83xxhagf8av1gsk674tylkyow` (`username`),
  UNIQUE KEY `UKsmqwylk6tgv7kx8ma2pfomwhm` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_users`
--

LOCK TABLES `api_users` WRITE;
/*!40000 ALTER TABLE `api_users` DISABLE KEYS */;
INSERT INTO `api_users` VALUES (1,'2020-03-06 00:00:00','2020-03-06 00:00:00','cliffordmasi@gmail.com','clifford masi','0192023a7bbd73250516f069df18b500','admin',NULL,NULL),(4,'2020-03-11 07:42:09','2020-03-11 07:42:09','cliffordmasi07@gmail.com','Clifford Masi','$2a$10$UkXqO2GTkYIm/b0BDRABwu9OC4vz/E8y8tIH.WYd2dlmstUFn7g..','masi',1,1);
/*!40000 ALTER TABLE `api_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flyway_schema_history`
--

DROP TABLE IF EXISTS `flyway_schema_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flyway_schema_history` (
  `installed_rank` int(11) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `script` varchar(1000) NOT NULL,
  `checksum` int(11) DEFAULT NULL,
  `installed_by` varchar(100) NOT NULL,
  `installed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `execution_time` int(11) NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`installed_rank`),
  KEY `flyway_schema_history_s_idx` (`success`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flyway_schema_history`
--

LOCK TABLES `flyway_schema_history` WRITE;
/*!40000 ALTER TABLE `flyway_schema_history` DISABLE KEYS */;
INSERT INTO `flyway_schema_history` VALUES (1,'1.1','Add User','SQL','V1.1__Add_User.sql',-42035322,'root','2020-03-10 02:50:05',45,1);
/*!40000 ALTER TABLE `flyway_schema_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `album` varchar(255) DEFAULT NULL,
  `stage_name` varchar(255) DEFAULT NULL,
  `membership_number` varchar(255) DEFAULT NULL,
  `artifact_id` varchar(255) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `duration` bigint(20) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `upload_id` bigint(20) NOT NULL,
  `play_offset` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `band` varchar(255) DEFAULT NULL,
  `track` varchar(255) DEFAULT NULL,
  `year` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKevnptsu0isylsy1flwm0u77fo` (`upload_id`),
  CONSTRAINT `FKevnptsu0isylsy1flwm0u77fo` FOREIGN KEY (`upload_id`) REFERENCES `uploads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,NULL,'frfr','frf','1688560619','Elizabeth Njihia',1241,NULL,'Ciana citu',7,323,'/var/www/html/mcsk/uploads/1-Elizabeth Njihia-Ciana citu.mp3','2020-03-17 09:57:28','2020-03-17 09:57:28',1,1,NULL,'3',NULL),(2,NULL,'frfr','frf','1688560619','Elizabeth Njihia',1241,NULL,'Ciana citu',8,323,'/var/www/html/mcsk/uploads/1-Elizabeth Njihia-Ciana citu.mp3','2020-03-17 09:58:17','2020-03-17 09:58:17',1,1,NULL,'3',NULL),(3,NULL,'frfr','frf','1688560619','Elizabeth Njihia',1241,NULL,'Ciana citu',9,323,'/var/www/html/mcsk/uploads/1-Elizabeth Njihia-Ciana citu.mp3','2020-03-17 09:59:43','2020-03-17 09:59:43',1,1,NULL,'3',NULL),(4,'TAMU TAMU','wdwd','wdw','1806069586','Alex Waweru',1170,NULL,'Curucuru',10,304,'/var/www/html/mcsk/uploads/02-Alex Waweru-Curucuru.mp3','2020-03-17 10:00:34','2020-03-17 10:00:34',1,1,'Alex Waweru;','2',1998),(5,'Kaleidoscope Dream','eded','deded','2','Miguel',678,NULL,'Adorn',11,193,'/var/www/html/mcsk/uploads/2.mp3','2020-03-17 10:11:27','2020-03-17 10:11:27',1,1,NULL,'1',2012),(6,'American Teen','ded','dede','1753594837','Khalid',760,NULL,'Location',12,219,'/var/www/html/mcsk/uploads/03 Location.mp3','2020-03-17 10:23:28','2020-03-17 10:23:28',1,1,NULL,'3',2017),(7,'A Seat at the Table','dede','eded','2084875717','Solange',880,NULL,'Cranes in the Sky',13,248,'/var/www/html/mcsk/uploads/04 Cranes in the Sky.mp3','2020-03-17 10:28:13','2020-03-17 10:28:13',1,1,NULL,'4',2016),(8,'Kaleidoscope Dream','wdw','dwdw','2','Miguel',678,NULL,'Adorn',14,193,'/var/www/html/mcsk/uploads/01 Adorn.mp3','2020-03-17 10:38:36','2020-03-17 10:38:36',1,1,NULL,'1',2012),(9,'Kaleidoscope Dream','dwdwd','wddw','2','Miguel',678,NULL,'Adorn',15,193,'2.mp3','2020-03-17 10:55:07','2020-03-17 10:55:07',1,1,NULL,'1',2012),(10,'Kaleidoscope Dream','deded','edededd','2','Miguel',678,NULL,'Adorn',16,193,'2.mp3','2020-03-17 10:56:25','2020-03-17 10:56:25',1,1,NULL,'1',2012),(11,'Kaleidoscope Dream','qsqsq','qsq','2','Miguel',678,NULL,'Adorn',18,193,'2.mp3','2020-03-17 11:04:02','2020-03-17 11:04:02',1,1,NULL,'1',2012),(12,'TAMU TAMU','e','d','1254822636','Alex Waweru',1045,NULL,'Tamu tamu',19,249,'01-Alex Waweru-Tamu tamu.mp3','2020-03-17 12:06:17','2020-03-17 12:06:17',1,1,'Alex Waweru;','1',1998),(13,'TAMU TAMU','e','e','1254822636','Alex Waweru',1045,NULL,'Tamu tamu',20,249,'01-Alex Waweru-Tamu tamu.mp3','2020-03-17 12:07:24','2020-03-17 12:07:24',1,1,'Alex Waweru;','1',1998),(14,'TAMU TAMU','e','e','1254822636','Alex Waweru',1045,NULL,'Tamu tamu',21,249,'01-Alex Waweru-Tamu tamu.mp3','2020-03-17 12:07:53','2020-03-17 12:07:53',1,1,'Alex Waweru;','1',1998),(15,'TAMU TAMU','w','d','1254822636','Alex Waweru',1045,NULL,'Tamu tamu',22,249,'01-Alex Waweru-Tamu tamu.mp3','2020-03-17 12:13:26','2020-03-17 12:13:26',1,1,'Alex Waweru;','1',1998),(16,'TAMU TAMU','d','','1477976263','Alex Waweru',1225,NULL,'Nduma Ninguthii',23,330,'04-Alex Waweru-Nduma Ninguthii.mp3','2020-03-17 12:14:14','2020-03-17 12:14:14',1,1,'Alex Waweru;','4',1998),(17,'TAMU TAMU','f','e','1806069586','Alex Waweru',1170,NULL,'Curucuru',24,304,'02-Alex Waweru-Curucuru.mp3','2020-03-17 12:24:24','2020-03-17 12:24:24',1,1,'Alex Waweru;','2',1998),(18,'TAMU TAMU','f','e','1477976263','Alex Waweru',5,NULL,'Nduma Ninguthii',25,409,'04-Alex Waweru-Nduma Ninguthii.mp3','2020-03-17 12:24:51','2020-03-17 12:24:51',1,1,'Alex Waweru;','4',1998),(19,'GUTIRI NGAI UNGI','e','','1788543561','Alex Waweru',919,NULL,'Nginyiria Wega',26,275,'11-Alex Waweru-Nginyiria Wega.mp3','2020-03-17 12:25:00','2020-03-17 12:25:00',1,1,'Alex Waweru;','6',2005);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_nb4h0p6txrmfc0xbrd1kglp9t` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ROLE_ADMIN','2020-03-06 08:54:52','2020-03-06 08:54:52',NULL,NULL),(4,'ROLE_USER','2020-03-11 07:42:00','2020-03-11 07:42:01',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `album` varchar(255) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `duration` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `track` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `file` text,
  `membership_number` varchar(255) DEFAULT NULL,
  `stage_name` varchar(255) DEFAULT NULL,
  `band` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `acr_id` varchar(255) DEFAULT NULL,
  `success` bit(1) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','wsws','wsws',NULL,'2020-03-17 09:28:16','2020-03-17 09:28:16','1688560619',NULL,1,1),(2,NULL,NULL,NULL,NULL,NULL,NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','rfr','rfrfrr',NULL,'2020-03-17 09:40:53','2020-03-17 09:40:53','1688560619',NULL,1,1),(3,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','eded','deded',NULL,'2020-03-17 09:47:55','2020-03-17 09:47:55','1688560619',NULL,1,1),(4,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','frf','frfr',NULL,'2020-03-17 09:51:27','2020-03-17 09:51:27','1688560619',NULL,1,1),(5,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','frf','frfr',NULL,'2020-03-17 09:52:46','2020-03-17 09:52:46','1688560619',NULL,1,1),(6,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','frf','frfr',NULL,'2020-03-17 09:55:13','2020-03-17 09:55:13','1688560619',NULL,1,1),(7,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','frf','frfr',NULL,'2020-03-17 09:57:28','2020-03-17 09:57:28','1688560619',NULL,1,1),(8,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','frf','frfr',NULL,'2020-03-17 09:58:17','2020-03-17 09:58:17','1688560619',NULL,1,1),(9,NULL,'Elizabeth Njihia',NULL,'Ciana citu','3',NULL,'/var/www/html/mcsk/uploads/\'1-Elizabeth Njihia-Ciana citu.mp3\'','frf','frfr',NULL,'2020-03-17 09:59:42','2020-03-17 09:59:43','1688560619',NULL,1,1),(10,'TAMU TAMU','Alex Waweru',NULL,'Curucuru','2','1998','/var/www/html/mcsk/uploads/\'02-Alex Waweru-Curucuru.mp3\'','wdw','wdwd','Alex Waweru;','2020-03-17 10:00:33','2020-03-17 10:00:34','1806069586',NULL,1,1),(11,'Kaleidoscope Dream','Miguel',NULL,'Adorn','1','2012','/var/www/html/mcsk/uploads/\'2.mp3\'','deded','eded',NULL,'2020-03-17 10:11:26','2020-03-17 10:11:26','2',NULL,1,1),(12,'American Teen','Khalid',NULL,'Location','3','2017','/var/www/html/mcsk/uploads/\'03 Location.mp3\'','dede','ded',NULL,'2020-03-17 10:23:28','2020-03-17 10:23:28','1073742592',NULL,1,1),(13,'A Seat at the Table','Solange',NULL,'Cranes in the Sky','4','2016','/var/www/html/mcsk/uploads/\'04 Cranes in the Sky.mp3\'','eded','dede',NULL,'2020-03-17 10:28:13','2020-03-17 10:28:13','1073742593',NULL,1,1),(14,'Kaleidoscope Dream','Miguel',NULL,'Adorn','1','2012','/var/www/html/mcsk/uploads/\'01 Adorn.mp3\'','dwdw','wdw',NULL,'2020-03-17 10:38:36','2020-03-17 10:38:36','1073742591',NULL,1,1),(15,'Kaleidoscope Dream','Miguel',NULL,'Adorn','1','2012','/var/www/html/mcsk/uploads/\'01 Adorn.mp3\'','wddw','dwdwd',NULL,'2020-03-17 10:55:07','2020-03-17 10:55:07','1073742591',NULL,1,1),(16,'Kaleidoscope Dream','Miguel',NULL,'Adorn','1','2012','/var/www/html/mcsk/uploads/\'2.mp3\'','edededd','deded',NULL,'2020-03-17 10:56:25','2020-03-17 10:56:25','2',NULL,1,1),(17,'Kaleidoscope Dream','Miguel',NULL,'Adorn','1','2012','/var/www/html/mcsk/uploads/\'2.mp3\'','qsq','qsqsq',NULL,'2020-03-17 11:01:26','2020-03-17 11:01:26','2',NULL,1,1),(18,'Kaleidoscope Dream','Miguel',NULL,'Adorn','1','2012','/var/www/html/mcsk/uploads/\'2.mp3\'','qsq','qsqsq',NULL,'2020-03-17 11:04:02','2020-03-17 11:04:02','2',NULL,1,1),(19,'TAMU TAMU','Alex Waweru',NULL,'Tamu tamu','1','1998','/var/www/html/mcsk/uploads/\'01-Alex Waweru-Tamu tamu.mp3\'','d','e','Alex Waweru;','2020-03-17 12:06:17','2020-03-17 12:06:17','1622208836',NULL,1,1),(20,'TAMU TAMU','Alex Waweru',NULL,'Tamu tamu','1','1998','/var/www/html/mcsk/uploads/\'01-Alex Waweru-Tamu tamu.mp3\'','e','e','Alex Waweru;','2020-03-17 12:07:24','2020-03-17 12:07:24','1622208836',NULL,1,1),(21,'TAMU TAMU','Alex Waweru',NULL,'Tamu tamu','1','1998','/var/www/html/mcsk/uploads/\'01-Alex Waweru-Tamu tamu.mp3\'','e','e','Alex Waweru;','2020-03-17 12:07:53','2020-03-17 12:07:53','1622208836',NULL,1,1),(22,'TAMU TAMU','Alex Waweru',NULL,'Tamu tamu','1','1998','/var/www/html/mcsk/uploads/\'01-Alex Waweru-Tamu tamu.mp3\'','d','w','Alex Waweru;','2020-03-17 12:13:26','2020-03-17 12:13:26','1622208836',NULL,1,1),(23,'TAMU TAMU','Alex Waweru',NULL,'Nduma Ninguthii','4','1998','/var/www/html/mcsk/uploads/\'04-Alex Waweru-Nduma Ninguthii.mp3\'','','d','Alex Waweru;','2020-03-17 12:14:14','2020-03-17 12:14:14','1665152562',NULL,1,1),(24,'TAMU TAMU','Alex Waweru',NULL,'Curucuru','2','1998','/var/www/html/mcsk/uploads/\'02-Alex Waweru-Curucuru.mp3\'','e','f','Alex Waweru;','2020-03-17 12:24:24','2020-03-17 12:24:24','1636523411',NULL,1,1),(25,'GUTIRI NGAI UNGI','Alex Waweru',NULL,'TiaTia Muciari','3','2005','/var/www/html/mcsk/uploads/\'09-Alex Waweru-TiaTia Muciari.mp3\'','e','f','Alex Waweru;','2020-03-17 12:24:51','2020-03-17 12:24:51','1736725440',NULL,1,1),(26,'GUTIRI NGAI UNGI','Alex Waweru',NULL,'Nginyiria Wega','6','2005','/var/www/html/mcsk/uploads/\'11-Alex Waweru-Nginyiria Wega.mp3\'','','e','Alex Waweru;','2020-03-17 12:25:00','2020-03-17 12:25:00','2065960676',NULL,1,1);
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `FKh8ciramu9cc9q3qcqiv4ue8a6` (`role_id`),
  CONSTRAINT `FKh8ciramu9cc9q3qcqiv4ue8a6` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `FKom39r7wgmj238ub3ximjsang` FOREIGN KEY (`user_id`) REFERENCES `api_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1),(4,4);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('Approved','Pending') NOT NULL DEFAULT 'Pending',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (28,'admin','0192023a7bbd73250516f069df18b500','super','cliffordmasi07@gmail.com','Pending','2020-03-03 12:46:11'),(29,'caleb','c7bbf09d0c646508b1d42fff102e457e','admin','calebmogire@gail.com','Pending','2020-03-10 12:23:18'),(30,'dennis','7daacea5f373b4c1c054158b126d317f','user','dennis','Pending','2020-03-10 12:24:51'),(31,'fred','77064f5bd13e417f564e7d880dc7a536','user','fred@gmail.com','Pending','2020-03-10 12:26:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-17 14:23:51
