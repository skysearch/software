CREATE DATABASE  IF NOT EXISTS `software_v3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `software_v3`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: software_v3
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `core_log`
--

DROP TABLE IF EXISTS `core_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` tinyint(2) DEFAULT NULL,
  `priorityName` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text,
  `uri` varchar(255) DEFAULT NULL,
  `session` varchar(100) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `pid` varchar(45) DEFAULT NULL,
  `useragent` text,
  PRIMARY KEY (`log_id`),
  UNIQUE KEY `log_id_UNIQUE` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_log`
--

LOCK TABLES `core_log` WRITE;
/*!40000 ALTER TABLE `core_log` DISABLE KEYS */;
INSERT INTO `core_log` VALUES (61,6,'INFO','2014-10-07 15:58:07','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1235',NULL),(62,6,'INFO','2014-10-07 15:59:18','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1497',NULL),(63,6,'INFO','2014-10-07 16:07:19','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1233',''),(64,6,'INFO','2014-10-07 16:07:57','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'220',''),(65,6,'INFO','2014-10-07 16:09:33','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'2670','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(66,6,'INFO','2014-10-07 16:11:57','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1499','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(67,6,'INFO','2014-10-07 16:13:00','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1235','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(68,6,'INFO','2014-10-07 16:42:22','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1497','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(69,6,'INFO','2014-10-07 18:41:31','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1235','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(70,6,'INFO','2014-10-07 19:26:23','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1498','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(71,6,'INFO','2014-10-07 19:26:25','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1498','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(72,6,'INFO','2014-10-07 19:26:27','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','04v73hne420rca44ts4p8sf6f7','::1',NULL,'1498','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0'),(73,6,'INFO','2014-10-07 19:26:38','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','mpir4k624me80ebj9ealsaf161','::1',NULL,'1235','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36'),(74,6,'INFO','2014-10-07 19:26:45','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','mpir4k624me80ebj9ealsaf161','::1',NULL,'1497','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36'),(75,6,'INFO','2014-10-08 18:22:32','pagina de logi do modulo','/~mac1/software_v3/public/auth/index/login','9efl69n3ao2j9tusg25gttrvk2','::1',NULL,'5058','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0');
/*!40000 ALTER TABLE `core_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-13 20:51:31
