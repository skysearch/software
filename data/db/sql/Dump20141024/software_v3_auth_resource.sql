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
-- Table structure for table `auth_resource`
--

DROP TABLE IF EXISTS `auth_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_resource` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext,
  `module` varchar(150) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `help` text,
  `nav` varchar(255) DEFAULT NULL,
  `order` int(3) unsigned zerofill NOT NULL,
  `is_visible` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`resource_id`),
  UNIQUE KEY `RESOURCE_UNIQUE` (`module`,`controller`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_resource`
--

LOCK TABLES `auth_resource` WRITE;
/*!40000 ALTER TABLE `auth_resource` DISABLE KEYS */;
INSERT INTO `auth_resource` VALUES (1,'Autenticação','auth','index',NULL,'0',000,0,'2014-10-07 14:22:36'),(2,'Log','log','index',NULL,'module',000,1,'2014-10-22 19:20:04'),(3,'E-mail','email','index',NULL,'module',000,1,'2014-10-22 19:20:04'),(4,'Backup','backup','index',NULL,'module',000,1,'2014-10-22 19:20:04'),(5,'Integridade','integrity','index',NULL,'module',000,1,'2014-10-22 19:20:04'),(6,'Padrão','default','index',NULL,'0',000,0,'2014-10-22 22:22:35'),(7,'Error','default','error',NULL,'0',000,0,'2014-10-22 22:23:00'),(8,'Usuário','user','index',NULL,'module',000,1,'2014-10-24 21:46:10'),(9,'Níveis','user','level',NULL,'module',000,1,'2014-10-24 21:53:20');
/*!40000 ALTER TABLE `auth_resource` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-24 20:53:29
