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
-- Table structure for table `auth_user`
--

DROP TABLE IF EXISTS `auth_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(5) unsigned zerofill DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `protected` tinyint(1) unsigned zerofill NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `session` varchar(150) DEFAULT NULL,
  `useragent` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `session_UNIQUE` (`session`),
  KEY `username_index` (`username`),
  KEY `email_index` (`email`),
  KEY `auth_index` (`username`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_user`
--

LOCK TABLES `auth_user` WRITE;
/*!40000 ALTER TABLE `auth_user` DISABLE KEYS */;
INSERT INTO `auth_user` VALUES (1,00001,'renato@db9.com.br','dea4b6300d5d7211e875f3e884652ed134fc79e6','renato@db9.com.br',1,1,NULL,'string(1317) \"a:28:{s:21:\"browser_compatibility\";s:7:\"Firefox\";s:14:\"browser_engine\";s:5:\"Gecko\";s:12:\"browser_name\";s:7:\"Firefox\";s:13:\"browser_token\";s:19:\"Intel Mac OS X 10.9\";s:15:\"browser_version\";s:4:\"32.0\";s:7:\"comment\";a:2:{s:4:\"full\";s:39:\"Macintosh; Intel Mac OS X 10.9; rv:32.0\";s:6:\"detail\";a:3:{i:0;s:9:\"Macintosh\";i:1;s:20:\" Intel Mac OS X 10.9\";i:2;s:8:\" rv:32.0\";}}s:18:\"compatibility_flag\";s:9:\"Macintosh\";s:15:\"device_os_token\";s:7:\"rv:32.0\";s:6:\"others\";a:2:{s:4:\"full\";s:27:\"Gecko/20100101 Firefox/32.0\";s:6:\"detail\";a:2:{i:0;a:3:{i:0;s:14:\"Gecko/20100101\";i:1;s:5:\"Gecko\";i:2;s:8:\"20100101\";}i:1;a:3:{i:0;s:12:\"Firefox/32.0\";i:1;s:7:\"Firefox\";i:2;s:4:\"32.0\";}}}s:12:\"product_name\";s:7:\"Mozilla\";s:15:\"product_version\";s:3:\"5.0\";s:10:\"user_agent\";s:11:\"Mozilla/5.0\";s:18:\"is_wireless_device\";b:0;s:9:\"is_mobile\";b:0;s:10:\"is_desktop\";b:1;s:9:\"is_tablet\";b:0;s:6:\"is_bot\";b:0;s:8:\"is_email\";b:0;s:7:\"is_text\";b:0;s:25:\"device_claims_web_support\";b:0;s:9:\"client_ip\";s:3:\"::1\";s:11:\"php_version\";s:6:\"5.4.30\";s:9:\"server_os\";s:6:\"apache\";s:17:\"server_os_version\";s:6:\"2.2.26\";s:18:\"server_http_accept\";s:63:\"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\";s:27:\"server_http_accept_language\";s:35:\"pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3\";s:9:\"server_ip\";s:3:\"::1\";s:11:\"server_name\";s:9:\"localhost\";}\"','2014-10-07 14:32:14','2014-10-07 14:32:14'),(2,00002,'renato@skysearch.info','dea4b6300d5d7211e875f3e884652ed134fc79e6','renato@skysearch.info',0,1,'p4d8s7luurlbtn597g0c0qc5m0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:33.0) Gecko/20100101 Firefox/33.0','2014-10-07 14:33:31','2014-10-07 14:33:31');
/*!40000 ALTER TABLE `auth_user` ENABLE KEYS */;
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
