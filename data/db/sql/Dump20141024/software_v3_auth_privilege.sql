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
-- Table structure for table `auth_privilege`
--

DROP TABLE IF EXISTS `auth_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_privilege` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `description` tinytext,
  `module` varchar(150) DEFAULT NULL,
  `controller` varchar(150) DEFAULT NULL,
  `is_visible` int(1) DEFAULT NULL,
  `order` int(3) DEFAULT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_privilege`
--

LOCK TABLES `auth_privilege` WRITE;
/*!40000 ALTER TABLE `auth_privilege` DISABLE KEYS */;
INSERT INTO `auth_privilege` VALUES (1,'login','Login','auth','index',0,0),(2,'logout','Logout','auth','index',0,0),(3,'index','Resumo','log','index',1,0),(4,'error','Erro','log','index',1,1),(5,'database','Db','log','index',1,1),(6,'user','Usuário','log','index',1,1),(7,'system','Sistema','log','index',1,1),(8,'index','Resumo','email','index',1,0),(9,'models','Modelos','email','index',1,1),(10,'history','Histórico','email','index',1,1),(11,'config','Configurações','email','index',1,1),(12,'index','Resumo','backup','index',1,0),(13,'consolidate','Consolidado','backup','index',1,1),(14,'table','Por Tabela','backup','index',1,1),(15,'index','Resumo','integrity','index',1,0),(16,'create','Criar ponto','integrity','index',1,1),(17,'check','Verificar Integridade','integrity','index',1,1),(18,'dashboard','Dashboard','default','index',0,0),(19,'navigation','Navegação','defautl','index',0,0),(20,'error','Erro','default','error',0,0),(21,'create','Adicionar','user','index',0,1),(22,'update','Editar','user','index',0,1),(23,'delete','Remover','user','index',0,1),(24,'update-pass','Alterar Senha','user','index',0,1),(25,'resume','Gerencimanto de Usuários','user','index',1,0),(26,'list','Listar','user','index',0,1),(27,'create','Adicionar','user','level',0,1),(28,'update','Editar','user','level',0,1),(29,'delete','Remover','user','level',0,1),(30,'resume','Níveis de Acesso','user','level',1,1),(31,'list','Listar','user','level',0,1);
/*!40000 ALTER TABLE `auth_privilege` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-24 20:53:25
