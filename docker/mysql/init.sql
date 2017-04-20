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
  `initial_proposition_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A48E8E2AC190B4C9` (`initial_proposition_id`),
  CONSTRAINT `FK_A48E8E2AC190B4C9` FOREIGN KEY (`initial_proposition_id`) REFERENCES `event_proposition` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activityEvent`
--

LOCK TABLES `activityEvent` WRITE;
/*!40000 ALTER TABLE `activityEvent` DISABLE KEYS */;
INSERT INTO `activityEvent` VALUES (1,NULL,'2017-04-21 01:00:00','Mega groovy party','Laborum qui nam quisquam **non**. Molestias est et provident veniam aut id. Qui unde quia magnam molestias earum veniam. Sit et aut adipisci. *Sapiente dolores* recusandae voluptatem reiciendis facilis. Cum accusamus culpa iste cumque.\r\n\r\nEt voluptatibus et dolores sint omnis. Voluptatem quam voluptatem dolorem fuga dolorum. Vitae quia laborum **voluptatem** culpa reprehenderit tempora provident. Enim excepturi officiis dolore aut non.',15,NULL),(2,NULL,'2016-04-20 18:41:00','Cesiades 2016','Error corrupti neque pariatur iste debitis sequi repellendus. Earum harum enim neque tempore facere deleniti tenetur. Ut et quas fugit quae molestiae velit tempore amet. Incidunt culpa neque voluptate itaque vel quos suscipit. Debitis nihil et aliquid et doloremque. Voluptatibus rerum qui iusto est in doloremque.\r\n\r\nUnde nobis ut modi. **Officiis quidem in nisi odit** cum *nemo*. Totam qui natus ut qui quod officia blanditiis. Fugiat quis sit qui fugit facere. Aut adipisci quidem quo quasi itaque optio.',85,NULL),(3,NULL,'2017-04-25 13:50:00','Apres-midi cuisine','Laborum qui nam quisquam non. Molestias est et provident veniam aut id. Qui unde quia magnam molestias earum veniam. Sit et aut adipisci. Sapiente dolores recusandae voluptatem reiciendis facilis. Cum accusamus culpa iste cumque.\r\n\r\nEt voluptatibus et dolores sint omnis. Voluptatem quam voluptatem dolorem fuga dolorum. Vitae quia laborum voluptatem culpa reprehenderit tempora provident. Enim excepturi officiis dolore aut non.',0,NULL);
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
  `participation_field_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_proposition`
--

LOCK TABLES `event_proposition` WRITE;
/*!40000 ALTER TABLE `event_proposition` DISABLE KEYS */;
INSERT INTO `event_proposition` VALUES (1,7,'Ping-pong tournament','Error corrupti neque pariatur iste debitis sequi repellendus. Earum harum enim neque tempore facere deleniti tenetur. Ut et quas fugit quae molestiae velit tempore amet. Incidunt culpa neque voluptate itaque vel quos suscipit. Debitis nihil et aliquid et doloremque. Voluptatibus rerum qui iusto est in doloremque.','2017-04-24 14:30:00'),(2,5,'Party at the Boston bar','Laborum qui nam quisquam non. Molestias est et provident veniam aut id. Qui unde quia magnam molestias earum veniam. Sit et aut adipisci. Sapiente dolores recusandae voluptatem reiciendis facilis. Cum accusamus culpa iste cumque.','2017-05-19 21:01:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_proposition_vote`
--

LOCK TABLES `event_proposition_vote` WRITE;
/*!40000 ALTER TABLE `event_proposition_vote` DISABLE KEYS */;
INSERT INTO `event_proposition_vote` VALUES (1,7,1,'2017-04-24 14:30:00'),(2,2,1,'2017-04-24 14:30:00'),(3,1,1,'2017-04-24 14:30:00'),(4,5,1,'2017-04-24 14:30:00'),(5,5,2,'2017-05-19 21:01:00'),(6,2,2,'2017-05-19 21:01:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participation`
--

LOCK TABLES `participation` WRITE;
/*!40000 ALTER TABLE `participation` DISABLE KEYS */;
INSERT INTO `participation` VALUES (1,2,1),(2,5,1),(3,4,1),(4,2,2),(5,4,2),(6,6,2),(7,6,3),(8,5,3),(9,2,3),(10,7,3);
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
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
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
INSERT INTO `picture` VALUES (1,2,2,'37c29f15c8dbf435bd31f45560716f0694ab18f3.png','2017-04-20 14:34:00'),(2,1,5,'4ab18bfbd9ae16c5ee1c051774d4912c91a0059b.jpeg','2017-04-20 14:38:39'),(3,1,5,'551e54ed96181eb272fffced7f9aef7c40ec6817.jpeg','2017-04-20 14:39:13'),(4,1,4,'efd456827e440a99aaff9d919e3827d1f00dd09d.jpeg','2017-04-20 14:40:50'),(5,2,6,'2865c98a1a67736b1809e0447c58137909b89643.jpeg','2017-04-20 14:49:08'),(6,2,6,'53b447f7e39971e6cb8e63226895e52dd3e4502f.jpeg','2017-04-20 14:49:20'),(7,3,5,'0aff990d7cd874d4794d4f9682acfa51e52dca92.jpeg','2017-04-20 14:52:33'),(8,3,2,'169550dd5bbb896d0719d0188b65f789c5f5fb4f.jpeg','2017-04-20 14:54:04'),(9,3,2,'6aa5772dc3469ab1407db88739f71e143e322101.jpeg','2017-04-20 14:54:12'),(10,3,2,'0f3b2ce57de8ab2d1475878ec332935341fc7173.jpeg','2017-04-20 14:54:32'),(11,3,7,'2e191f1ac152be30e3e5532b9829e962940e7988.jpeg','2017-04-20 14:55:58'),(12,3,7,'873c2b922013ccb4e7b3741f8079c11fd6e65093.jpeg','2017-04-20 14:56:08');
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
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8952A6BEEE45BDBF` (`picture_id`),
  KEY `IDX_8952A6BEA76ED395` (`user_id`),
  CONSTRAINT `FK_8952A6BEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_8952A6BEEE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture_comment`
--

LOCK TABLES `picture_comment` WRITE;
/*!40000 ALTER TABLE `picture_comment` DISABLE KEYS */;
INSERT INTO `picture_comment` VALUES (1,1,5,'2017-04-20 14:38:47','Ahah awesome !'),(2,8,7,'2017-04-20 14:56:22','Mhh... ça a l\'air bon :D');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Tartelette aux fruits','Nihil dolorem et adipisci et. Ad molestias ut pariatur. Delectus voluptatem totam sunt porro qui. Rerum facilis nam quisquam ad cumque. Fugit est aliquid voluptas sed dolor soluta sequi.','tart-o-fruit.png',1.22,1),(2,'Macaron','Nobis rerum aut autem qui perspiciatis quo aut eaque. Expedita qui molestiae vero quos. Amet sint hic sit. Consequuntur odio nostrum illo quisquam aliquam quam.','maka.png',2.15,1),(3,'Muffin','Inventore dolor sunt sit explicabo aut dolores officia. Est vel nam facilis. Consequuntur accusamus et fuga esse omnis expedita. Ut dolore culpa nihil laborum laborum distinctio dolor est. Vel nostrum distinctio hic error quae. Nisi qui et asperiores ut nulla.','muffin.png',0.55,1),(4,'Panier de légumes','Quia quia aperiam qui iusto cum unde quia rerum. Aliquam velit illo illo commodi. Sed sint eum quidem aut. Asperiores veniam aut aut assumenda consequatur accusantium. Et commodi dolorem occaecati nostrum inventore architecto et rerum.','panier.png',25,1),(5,'Sanwich mozarella','Ut culpa aliquam consequatur mollitia rerum pariatur nihil. Sed deserunt animi inventore omnis ratione. Repellat qui ratione eos. Aliquid ipsum architecto ab. Et maxime sint neque sequi id rerum.','sand-mozz.png',5.5,1),(6,'Sweat 2017','Error corrupti neque pariatur iste debitis sequi repellendus. Earum harum enim neque tempore facere deleniti tenetur. Ut et quas fugit quae molestiae velit tempore amet. Incidunt culpa neque voluptate itaque vel quos suscipit. Debitis nihil et aliquid et doloremque. Voluptatibus rerum qui iusto est in doloremque.','sweat.png',35,1),(7,'Tartelette au citron','Unde nobis ut modi. Officiis quidem in nisi odit cum nemo. Totam qui natus ut qui quod officia blanditiis. Fugiat quis sit qui fugit facere. Aut adipisci quidem quo quasi itaque optio.','tart-o-citron.png',2.5,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prom`
--

LOCK TABLES `prom` WRITE;
/*!40000 ALTER TABLE `prom` DISABLE KEYS */;
INSERT INTO `prom` VALUES (6,'Ei A1'),(8,'Ei A2'),(9,'Ei A3'),(10,'Ei A4'),(11,'Ei A5'),(1,'Exia A1'),(2,'Exia A2'),(3,'Exia A3'),(4,'Exia A4'),(5,'Exia A5');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,5,'2017-04-20 15:03:18');
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
INSERT INTO `purchase_product` VALUES (1,3),(1,5);
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
  `prom_id` int(11) DEFAULT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D6497CC070FF` (`prom_id`),
  CONSTRAINT `FK_8D93D6497CC070FF` FOREIGN KEY (`prom_id`) REFERENCES `prom` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,'tblanc',NULL,NULL,'$2y$13$187JRsrnTtGtxkfq5x3BquuFrfgcwks4As1evoebNabQjqS.5KGpO','tb@cesi.fr',1,NULL,'ROLE_BOSS',NULL),(2,NULL,'vzimmerman','Victor','Zimmerman','$2y$13$1RbXYgRmRmhsZOaATCu5aezUHrPSczx/tvJ7EipYfFeXytjImnqTq','vz@cesi.fr',1,'b4cd5ba50e965cb44d9817e13e4cd1f80c27a2f8.png','ROLE_STAFF',NULL),(3,NULL,'user','Timmy',NULL,'$2y$13$sb7uQ9tKYnrlsmD54fFT/ehFO/IfQEiZL7/Wfx67P1udSxs.6hhIO','us@cesi.fr',1,'12cef9d4b77c0accd6fc79b9ce3edb46a93c8864.png','ROLE_USER',NULL),(4,8,'echirac','Eric','Chirac','$2y$13$Xq3CWQBs3p9h/boZ64orJ.3F1Rw98hQA0r/u3fudwDLuJ4mkHPb/a','ec@cesi.fr',1,'710a91d9380c5dc4d6da315747851a734a6f02ee.png','ROLE_STAFF',NULL),(5,2,'rjunca','Romain','Junca','$2y$13$SL22xbFOEFhrFC7wgpRDselRy2oFJcQifReUS9FmckckUfWhkaSda','rj@cesi.fr',1,'8f7cbf78ac41240179fd3f4efff40e918ee29a19.jpeg','ROLE_USER',NULL),(6,2,'jgponsard','Jean-Guillaume','Ponsard','$2y$13$71Ffe1w9CVSi9bBNN3ewU.7R6c66Ta6iYqFvD16EK0M8lzQeHeSMu','jgp@cesi.fr',1,'4ae45b073809063f9bb0f374fa9dda3a9a160fb5.png','ROLE_USER',NULL),(7,2,'tblochet','Tanguy','Blochet','$2y$13$/mRGmLpJ9QlByNuffnW0keWQ/68qQhVbLzf7Zq.lHbRkJL1klLN/e','tnb@cesi.fr',1,'5386118e9f1632e134996b237f8c7e4c958af4a8.gif','ROLE_USER',NULL),(8,2,'bsaclier','Baptiste','Saclier','$2y$13$5Uz4OG54DAJSjVKEh4pPr.w7tRJTufYlX0PIVjPVkVCYNXag8wpei','bs@cesi.fr',1,'34a0d73a488e3ec406b0b451f1aa936c8a64abe9.png','ROLE_USER',NULL),(9,8,'pmanuel','Paul','Manuel','$2y$13$qscfeUiDOHD0JzXECYv9O.DWRaQUL4a9bCPtUVPuxUzhaBd2o6FA2','pm@cesi.fr',1,'f350a8a90b0abdeb3ab5558560bed6ee773a21f3.jpeg','ROLE_USER',NULL);
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
INSERT INTO `user_picture` VALUES (2,8),(2,9),(2,10),(5,1),(5,2),(7,8);
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

-- Dump completed on 2017-04-20 17:03:47
