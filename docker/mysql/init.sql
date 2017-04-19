-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: bde-lyon
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `activityEvent`
--

DROP TABLE IF EXISTS `activityEvent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activityEvent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `initial_proposition_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A48E8E2AC190B4C9` (`initial_proposition_id`),
  CONSTRAINT `FK_A48E8E2AC190B4C9` FOREIGN KEY (`initial_proposition_id`) REFERENCES `event_proposition` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activityEvent`
--

LOCK TABLES `activityEvent` WRITE;
/*!40000 ALTER TABLE `activityEvent` DISABLE KEYS */;
INSERT INTO `activityEvent` VALUES (1,'2017-04-20 13:06:00','fun','tytytytytytyty',0,NULL,NULL),(2,'2017-04-01 13:06:00','Blague','gygygygygygy',0,NULL,NULL);
/*!40000 ALTER TABLE `activityEvent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer_participation_field`
--

DROP TABLE IF EXISTS `answer_participation_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_participation_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participation_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `participation_field_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_22677B416ACE3B73` (`participation_id`),
  KEY `IDX_22677B41A81F8B27` (`participation_field_id`),
  CONSTRAINT `FK_22677B416ACE3B73` FOREIGN KEY (`participation_id`) REFERENCES `participation` (`id`),
  CONSTRAINT `FK_22677B41A81F8B27` FOREIGN KEY (`participation_field_id`) REFERENCES `participation_field` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_participation_field`
--

LOCK TABLES `answer_participation_field` WRITE;
/*!40000 ALTER TABLE `answer_participation_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_participation_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ED4B199F5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_proposition`
--

DROP TABLE IF EXISTS `event_proposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_proposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `proposedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6C4410D3A76ED395` (`user_id`),
  CONSTRAINT `FK_6C4410D3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_proposition`
--

LOCK TABLES `event_proposition` WRITE;
/*!40000 ALTER TABLE `event_proposition` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_proposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_proposition_vote`
--

DROP TABLE IF EXISTS `event_proposition_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_proposition_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `proposition_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_27A2A6DEA76ED395` (`user_id`),
  KEY `IDX_27A2A6DEDB96F9E` (`proposition_id`),
  CONSTRAINT `FK_27A2A6DEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_27A2A6DEDB96F9E` FOREIGN KEY (`proposition_id`) REFERENCES `event_proposition` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_proposition_vote`
--

LOCK TABLES `event_proposition_vote` WRITE;
/*!40000 ALTER TABLE `event_proposition_vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_proposition_vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `footerDisplayed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'Legals Notice','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae ante egestas, pulvinar augue et, maximus enim. Aenean nulla tortor, scelerisque porta tortor a, convallis suscipit lorem. Integer rutrum, massa et elementum fringilla, urna elit volutpat ante, et vestibulum elit dolor quis lectus. Mauris orci magna, vulputate non orci non, lobortis vehicula magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc fermentum ante ex, posuere blandit odio luctus nec. Vivamus nec semper nulla. Etiam pellentesque ipsum in sodales gravida. Vestibulum convallis nibh vitae dapibus hendrerit. Aliquam cursus metus quis volutpat hendrerit. Proin lacinia tincidunt nisl, at luctus velit congue sed. In quis nisl euismod, maximus sapien vel, blandit ante.\r\n\r\nVestibulum gravida pulvinar leo et dignissim. Aenean eu magna sit amet odio scelerisque egestas in eget turpis. Morbi quis sem et est elementum sollicitudin nec sed velit. Aliquam erat volutpat. Phasellus suscipit interdum hendrerit. Curabitur sed massa posuere, mattis enim vel, fermentum lectus. Vestibulum pulvinar vehicula nisl, non fermentum justo vestibulum id. Aenean bibendum diam sed nisl cursus, in lobortis neque scelerisque. Vivamus accumsan nulla id mauris pulvinar, vitae eleifend turpis viverra. Suspendisse rutrum lacus at placerat ornare. Aliquam maximus faucibus ante, tristique dictum sapien lacinia ut. Fusce in massa auctor, tempor purus sit amet, blandit arcu. Praesent erat velit, blandit suscipit metus eu, fermentum laoreet dui. Cras quis nunc vel leo semper iaculis sit amet ac velit. Nam id felis hendrerit, gravida orci sit amet, suscipit enim.\r\n\r\nNullam in luctus libero. Sed vel felis cursus, feugiat sapien non, tristique nisi. Donec lacus lacus, blandit id justo placerat, elementum consectetur ante. Nulla eget luctus quam, et ultrices mi. Nullam id erat blandit, convallis felis vulputate, suscipit velit. Donec vitae iaculis nisl. Vivamus ipsum odio, feugiat tincidunt posuere vitae, placerat nec sem. Praesent viverra, mauris et facilisis euismod, neque arcu tempus mauris, sed rhoncus quam lorem vitae libero. Proin vulputate metus id diam malesuada rhoncus.\r\n\r\nPellentesque ut nisl tincidunt, malesuada mauris non, posuere lorem. Sed consequat at ligula quis pulvinar. Proin at metus ornare, euismod eros at, porta nibh. Fusce libero velit, laoreet nec nisl a, ultricies mattis est. Praesent sit amet rutrum purus. Fusce varius, neque in rutrum ultricies, ipsum augue placerat ligula, vitae interdum ex libero quis quam. Fusce id mauris metus. Mauris dictum, quam sit amet convallis aliquam, ipsum justo tempor justo, ut iaculis enim nibh suscipit purus. Aliquam tristique tincidunt leo vel facilisis.\r\n\r\nVivamus porta pulvinar bibendum. Sed condimentum augue enim. Sed dui metus, laoreet vel lacinia eu, ultrices id nisi. Aliquam erat volutpat. Quisque iaculis convallis consequat. Phasellus leo mi, tincidunt nec malesuada ut, dictum in est. Praesent tincidunt ultrices arcu, a pellentesque leo finibus at. Maecenas molestie lorem sit amet ipsum imperdiet, eget tristique nisl pretium. Mauris sodales et purus a tincidunt.',1),(2,'About','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt, sem at pulvinar viverra, sem massa ornare eros, eu mollis justo lectus nec nisi. Cras dapibus mi vel nibh vulputate pretium. Morbi enim risus, rutrum tincidunt imperdiet sed, vehicula placerat magna. Suspendisse eu consectetur ipsum, ac ornare lacus. Etiam molestie tincidunt turpis id iaculis. Vivamus consequat lectus auctor tellus pellentesque, lacinia lacinia sem mollis. Fusce est nunc, malesuada in velit sed, pretium rutrum eros. Cras condimentum quis risus at vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed facilisis, turpis ut volutpat aliquam, lectus leo maximus metus, quis euismod urna felis at sapien. Donec quis est vitae nisl placerat malesuada.\r\n\r\nSed vulputate turpis ac pulvinar fringilla. Phasellus tempus odio quam, at faucibus est interdum eget. Sed pretium ut lectus id tempus. Curabitur vestibulum risus id neque dignissim tincidunt. Cras ut accumsan lacus. Quisque dignissim massa vel molestie hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi luctus purus pellentesque metus ornare, quis mattis nisl imperdiet. Sed urna sem, vestibulum sed lorem vel, consequat pulvinar mauris. Sed lectus eros, tempor et nulla non, aliquam tincidunt metus.',1),(3,'Contact','To contact us please send an email to the address [bde-lyon@viacesi.fr](mailto:bde-lyon@viacesi.fr)\r\n\r\nPlease don\'t use this email form spamming or advertizing',1),(4,'FAQ','**First question ?**\r\n\r\nFirst answer\r\n\r\n**Second question ?**\r\n\r\nSecond answer...',1);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participation`
--

DROP TABLE IF EXISTS `participation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB55E24FA76ED395` (`user_id`),
  KEY `IDX_AB55E24F71F7E88B` (`event_id`),
  CONSTRAINT `FK_AB55E24F71F7E88B` FOREIGN KEY (`event_id`) REFERENCES `activityEvent` (`id`),
  CONSTRAINT `FK_AB55E24FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participation`
--

LOCK TABLES `participation` WRITE;
/*!40000 ALTER TABLE `participation` DISABLE KEYS */;
/*!40000 ALTER TABLE `participation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participation_field`
--

DROP TABLE IF EXISTS `participation_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participation_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tooltip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5429C8D371F7E88B` (`event_id`),
  CONSTRAINT `FK_5429C8D371F7E88B` FOREIGN KEY (`event_id`) REFERENCES `activityEvent` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participation_field`
--

LOCK TABLES `participation_field` WRITE;
/*!40000 ALTER TABLE `participation_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `participation_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16DB4F8971F7E88B` (`event_id`),
  KEY `IDX_16DB4F89A76ED395` (`user_id`),
  CONSTRAINT `FK_16DB4F8971F7E88B` FOREIGN KEY (`event_id`) REFERENCES `activityEvent` (`id`),
  CONSTRAINT `FK_16DB4F89A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (1,'1.png','2017-04-19 09:57:00',NULL,2),(2,'2.jpg','2017-04-19 09:58:00',NULL,2),(3,'3.png','2017-04-19 09:58:00',NULL,2),(4,'4.jpg','2017-04-19 09:59:00',NULL,2),(5,'5.jpg','2017-04-19 09:59:00',NULL,2),(6,'6.jpg','2017-04-19 09:59:00',NULL,2),(7,'7.png','2017-04-19 09:59:00',NULL,2),(8,'8.jpg','2017-04-19 10:00:00',NULL,2),(9,'10.png','2017-04-19 10:00:00',NULL,2),(10,'12.png','2017-04-19 10:01:00',NULL,2),(11,'13.png','2017-04-19 10:01:00',NULL,2),(12,'15.jpg','2017-04-19 10:01:00',NULL,2);
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture_comment`
--

DROP TABLE IF EXISTS `picture_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8952A6BEEE45BDBF` (`picture_id`),
  KEY `IDX_8952A6BEA76ED395` (`user_id`),
  CONSTRAINT `FK_8952A6BEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_8952A6BEEE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture_comment`
--

LOCK TABLES `picture_comment` WRITE;
/*!40000 ALTER TABLE `picture_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Macaron','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam facilisis metus enim, ac congue ipsum fermentum ac. Vestibulum turpis urna, sagittis eu magna a, pretium convallis tellus. Cras et aliquet enim. Nullam auctor rutrum ante ac dignissim. Nulla nec dignissim ipsum, nec gravida libero. Suspendisse potenti. Quisque interdum sagittis nisl, eu mattis arcu dapibus gravida. Vestibulum in aliquet nunc. Morbi sit amet erat elementum, consectetur enim luctus, scelerisque erat. Quisque vestibulum erat dolor. Ut aliquet mauris erat, faucibus mattis justo semper vitae.','maka.png',0.2,1),(2,'Muffin','Fusce venenatis, mauris a posuere convallis, leo orci ultrices erat, eu laoreet purus lectus sit amet justo. Duis turpis leo, ultrices eu placerat vel, hendrerit sed quam. Proin fermentum dui tellus, non vestibulum odio hendrerit sed. Fusce eget magna ut enim tristique rhoncus. Nullam justo diam, luctus et ultrices vitae, fringilla sed ligula. Aliquam viverra eget magna quis dapibus. Suspendisse id auctor nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec semper leo lacus, vel egestas dui auctor eu. Nulla rhoncus augue sit amet quam scelerisque egestas fringilla ac erat. Praesent viverra volutpat facilisis. Aenean venenatis, mauris sed porta sagittis, eros erat iaculis massa, vitae egestas est mi vitae ex. Phasellus rhoncus aliquam euismod. Donec bibendum elit at ultricies iaculis.','muffin.png',1.5,1),(3,'Panier de légumes','Phasellus eu metus a tellus gravida egestas. Vivamus nec erat sit amet eros molestie blandit eu et lacus. Mauris laoreet et odio et bibendum. Aliquam sollicitudin orci non hendrerit fermentum. Donec interdum suscipit tellus, nec feugiat lectus tincidunt at. Maecenas id pretium felis. Etiam aliquam consequat tortor vel convallis. Morbi non urna vitae orci suscipit dictum. Donec nec posuere ligula, in luctus risus.','panier.png',25,1),(4,'Sanwich mozarella','Nullam aliquam varius euismod. Nam condimentum arcu eu leo malesuada ullamcorper. In ullamcorper suscipit velit, nec sagittis erat efficitur ac. Nullam ullamcorper pretium odio et efficitur. Ut feugiat condimentum augue, nec porta diam auctor quis. Integer semper sem eu molestie commodo. Vivamus mattis dictum velit vitae sagittis. Morbi ultrices lorem euismod sapien pellentesque, volutpat congue ante dapibus. Etiam ut dignissim orci, nec pharetra lorem. Nulla facilisi. Praesent sed nisl ex. Nullam sed ipsum convallis, aliquam purus eu, vulputate tellus. In accumsan turpis sit amet pellentesque consequat. Mauris vel feugiat neque, id pretium libero. Proin vel ligula ex.','sand-mozz.png',5,1),(5,'Sweat 2017','Nulla aliquam fringilla est, eget finibus ante eleifend eget. Vivamus in varius sem. Integer felis dui, commodo ac tincidunt non, maximus at enim. Duis leo lectus, aliquam eget pretium at, consequat eget turpis. Praesent lacinia justo eget sapien aliquam, a posuere nisi varius. Sed eu sapien egestas, hendrerit odio a, tincidunt magna. Aliquam posuere velit ut ligula auctor, at condimentum sapien varius. Morbi orci risus, congue ac pharetra in, porttitor sed libero. Aenean ullamcorper magna elementum libero vestibulum, quis fermentum neque ornare.','sweat.png',35,1),(6,'Tartelette au citron','Nunc tristique leo arcu, ut aliquet justo congue vel. Nam eleifend, risus sit amet vestibulum interdum, neque erat fringilla erat, non posuere est turpis vel metus. Etiam eu libero lectus. Phasellus ultrices ullamcorper lacus, id cursus massa. Maecenas rutrum odio at nunc dictum laoreet. Vestibulum at odio enim. Duis consequat tortor id feugiat semper. Quisque facilisis libero nulla, eu tristique nisi bibendum eget. Cras suscipit, metus volutpat laoreet porttitor, libero enim mattis felis, sed sodales risus libero sit amet augue.','tart-o-citron.png',2.5,1),(10,'Tartelette aux fruits','Tart o frui tart o frui tart o frui','tart-o-fruit.png',2.5,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prom`
--

DROP TABLE IF EXISTS `prom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CC68A9335E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prom`
--

LOCK TABLES `prom` WRITE;
/*!40000 ALTER TABLE `prom` DISABLE KEYS */;
/*!40000 ALTER TABLE `prom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6117D13BA76ED395` (`user_id`),
  CONSTRAINT `FK_6117D13BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (3,2,'2017-04-19 11:56:29'),(5,1,'2017-04-19 12:40:30');
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_product`
--

DROP TABLE IF EXISTS `purchase_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_product` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`product_id`),
  KEY `IDX_C890CED4558FBEB9` (`purchase_id`),
  KEY `IDX_C890CED44584665A` (`product_id`),
  CONSTRAINT `FK_C890CED44584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C890CED4558FBEB9` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_product`
--

LOCK TABLES `purchase_product` WRITE;
/*!40000 ALTER TABLE `purchase_product` DISABLE KEYS */;
INSERT INTO `purchase_product` VALUES (3,1),(5,1),(5,4);
/*!40000 ALTER TABLE `purchase_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prom_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D6497CC070FF` (`prom_id`),
  CONSTRAINT `FK_8D93D6497CC070FF` FOREIGN KEY (`prom_id`) REFERENCES `prom` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'victor','$2y$10$/zl5eW0NhMKGfZibYIwcH.szDwP3WtMHWODbWs9STcjMn1XBWZXLK','vz@cesi.fr',1,'','ROLE_STAFF',NULL,'Victor','Zimmerman'),(2,'thierry','$2y$10$uP.QyiL4DHCjZu/.TCyOk.4D1fH3J4NMyvhBaiXQfQC5YoNZ1.goW','tb@cesi.fr',1,'','ROLE_BOSS',NULL,'Thierry','Blanc'),(3,'user','$2y$10$D3vaPMqi44x2n/MW5yTq1OSr0UxPUylYubKSx0/WoaBN5E.eQGCTq','us@cesi.fr',1,NULL,'ROLE_USER',NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_event_proposition`
--

DROP TABLE IF EXISTS `user_event_proposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_event_proposition` (
  `user_id` int(11) NOT NULL,
  `event_proposition_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`event_proposition_id`),
  KEY `IDX_945BABF8A76ED395` (`user_id`),
  KEY `IDX_945BABF8D2FDD9ED` (`event_proposition_id`),
  CONSTRAINT `FK_945BABF8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_945BABF8D2FDD9ED` FOREIGN KEY (`event_proposition_id`) REFERENCES `event_proposition` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_event_proposition`
--

LOCK TABLES `user_event_proposition` WRITE;
/*!40000 ALTER TABLE `user_event_proposition` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_event_proposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_picture`
--

DROP TABLE IF EXISTS `user_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_picture` (
  `user_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`picture_id`),
  KEY `IDX_4ED65183A76ED395` (`user_id`),
  KEY `IDX_4ED65183EE45BDBF` (`picture_id`),
  CONSTRAINT `FK_4ED65183A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_4ED65183EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_picture`
--

LOCK TABLES `user_picture` WRITE;
/*!40000 ALTER TABLE `user_picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_picture` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 15:07:33
