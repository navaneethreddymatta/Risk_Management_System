-- MySQL dump 10.13  Distrib 5.7.11, for Win64 (x86_64)
--
-- Host: localhost    Database: rms
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `bas`
--

DROP TABLE IF EXISTS `bas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bas`
--

LOCK TABLES `bas` WRITE;
/*!40000 ALTER TABLE `bas` DISABLE KEYS */;
INSERT INTO `bas` VALUES (1,'Charlotte','North Carolina'),(2,'Columbia','South Carolina'),(3,'Fremont','California'),(4,'Phoenix','Arizona'),(5,'Denver','Colorado'),(6,'Tallahassee','Florida'),(7,'Atlanta','Georgia'),(8,'Indianapolis','Indiana'),(9,'Topeka','Kansas'),(10,'Frankfort','Kentucky'),(11,'Jackson','Mississippi'),(12,'Jefferson City','Missouri'),(13,'Helena','Montana'),(14,'Trenton','New Jersey'),(15,'Columbus','Ohio'),(16,'New York','New York');
/*!40000 ALTER TABLE `bas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'General Ledger - Journals','Dealing with General Ledger - Journals departments of the organisation.'),(2,'Strategic, including competitor and consumer','Dealing with Strategic, including competitor and consumer departments of the organisation.'),(3,'Finance & Treasury','Dealing with Finance & Treasury department of the organisation.'),(4,'Brand partners, key supplier and reputation','Dealing with Brand partners, key supplier and reputation of the organisation.'),(5,'Systems & Technology','Dealing with Systems & Technology of the organisation.'),(6,'People','Dealing with people of the organisation.'),(7,'Economic, Political and Environmental','Dealing with the Economic, Political and Environmental aspects of the organisation.'),(8,'Tax, Pensions and Insurance','Dealing with Tax, Pensions and Insurance aspects of the organisation.'),(9,'Legal & Regulatory','Dealing with Legal & Regulatory aspects of the organisation.');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas`
--

DROP TABLE IF EXISTS `mas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `impReduction` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas`
--

LOCK TABLES `mas` WRITE;
/*!40000 ALTER TABLE `mas` DISABLE KEYS */;
INSERT INTO `mas` VALUES (1,'Delegated authority must reconcile all material balance sheet accounts','On a monthly basis the Finance Managers with delegated authority must reconcile all material balance sheet accounts to ensure that financial transactions in sub ledgers are correctly captured in the General Ledger. All reconciliations and reviews must be formally documented and signed (& dated) as evidence of review',50),(2,'Manual Journals must be initiated using a Journal Input form','Manual Journals must be initiated using a Journal Input form',30),(3,'Manual journals must be independently reviewed by Finance before they are processed','Manual journals must be independently reviewed by Finance before they are processed in the system. A formal Journal Input form must be formally approved with a signature (manual or electronic where available).',40),(4,'High value / irregular manual journals must be additionally reviewed by Finance on a monthly basis','High value / irregular manual journals (As defined by local market criteria) must be additionally reviewed by Finance on a monthly basis using a journals exception report, which must be formally signed as evidence of review. Each market needs to define their local market policy that will determine the journals criteria that needs to be reviewed',50),(5,'Posting manual journals directly into the General Ledger control accounts must be prohibited','Posting manual journals directly into the General Ledger control accounts and accounts that have not been setup in the chart of accounts must be prohibited (and where possible system enforced)',60),(6,'Segregation of duties between staff who are able to create/change manual journals','There must be segregation of duties between staff who are able to create/change manual journals and those who are able to approve / post journals in the system',40),(7,'All judgemental areas of the accounts including provisions, accruals and prepayment calculations must be specifically reviewed for accuracy','All judgemental areas of the accounts including provisions, accruals and prepayment calculations must be specifically reviewed for accuracy and completeness during month end procedures by a Finance Manager with the delegated authority. The manual journals should be supported by a documented description of the rationale, a detailed calculation of the amount and the conditions for release of the provision.',60),(8,'On a monthly basis all sub ledgers must be reconciled to the GL','On a monthly basis all sub ledgers must be reconciled to the GL and unposted transactions (batches) must be reviewed for appropriateness by a Finance Manager with the delegated authority. Any unusual reconciling items or mismatches must be investigated and rectified',30),(9,'On a monthly basis the Finance Managers with delegated authority must reconcile all material balance sheet accounts','On a monthly basis the Finance Managers with delegated authority must reconcile all material balance sheet accounts to ensure that financial transactions in sub ledgers are correctly captured in the General Ledger. All reconciliations and reviews must be formally documented and signed (& dated) as evidence of review',40),(10,'Access to opening and closing of general ledger and sub ledgers must be restricted to a nominated Finance Manager','Access to opening and closing of general ledger and sub ledgers must be restricted to a nominated Finance Manager in each local Market. Where ledgers are re-opened post close, this must only be for such time as is necessary to carry out the necessary transactions',50),(11,'Bank Accounts with Higher transactional volume must reconciled bybe  Finance on a weekly basis at a minimum','Bank Accounts with Higher transactional volume (i.e. used in commercial trading or a major clearing account) must be reconciled by Finance on a weekly basis at a minimum',20),(12,'Open items must be cleared on a regular basis when bank statements are imported into the system.','Open items (such as unpaid invoices) must be cleared (when the functionality exists, this should be automated) on a regular basis when bank statements are imported into the system.',50);
/*!40000 ALTER TABLE `mas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `selectedBA` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'admin','admin','admin','admin',1,2),(2,'analyst','analyst','analyst','analyst',2,4);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riskinstances`
--

DROP TABLE IF EXISTS `riskinstances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riskinstances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ba` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `risk` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `netScore` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riskinstances`
--

LOCK TABLES `riskinstances` WRITE;
/*!40000 ALTER TABLE `riskinstances` DISABLE KEYS */;
INSERT INTO `riskinstances` VALUES (1,1,1,1,90,90),(2,2,1,1,90,45),(3,3,1,1,90,45),(4,4,1,1,90,45),(5,5,1,1,90,90),(6,6,1,1,90,90),(7,7,1,1,90,90),(8,8,1,1,90,90),(9,9,1,1,90,90),(10,10,1,1,90,90),(11,11,1,1,90,90),(12,12,1,1,90,90),(13,13,1,1,90,90),(14,14,1,1,90,90),(15,15,1,1,90,90),(16,1,1,2,90,90),(17,2,1,2,90,36),(18,3,1,2,90,54),(19,4,1,2,90,54),(20,5,1,2,90,90),(21,6,1,2,90,90),(22,7,1,2,90,90),(23,8,1,2,90,90),(24,9,1,2,90,90),(25,10,1,2,90,90),(26,11,1,2,90,90),(27,12,1,2,90,90),(28,13,1,2,90,90),(29,14,1,2,90,90),(30,15,1,2,90,90),(31,1,1,3,90,90),(32,2,1,3,90,45),(33,3,1,3,90,45),(34,4,1,3,90,36),(35,5,1,3,90,90),(36,6,1,3,90,90),(37,7,1,3,90,90),(38,8,1,3,90,90),(39,9,1,3,90,90),(40,10,1,3,90,90),(41,11,1,3,90,90),(42,12,1,3,90,90),(43,13,1,3,90,90),(44,14,1,3,90,90),(45,15,1,3,90,90),(46,1,1,4,90,90),(47,2,1,4,90,90),(48,3,1,4,90,90),(49,4,1,4,90,90),(50,5,1,4,90,90),(51,6,1,4,90,90),(52,7,1,4,90,90),(53,8,1,4,90,90),(54,9,1,4,90,90),(55,10,1,4,90,90),(56,11,1,4,90,90),(57,12,1,4,90,90),(58,13,1,4,90,90),(59,14,1,4,90,90),(60,15,1,4,90,90),(61,1,7,5,90,45),(62,2,7,5,90,90),(63,3,7,5,90,23),(64,4,7,5,90,54),(65,5,7,5,90,90),(66,6,7,5,90,90),(67,7,7,5,90,90),(68,8,7,5,90,90),(69,9,7,5,90,90),(70,10,7,5,90,90),(71,11,7,5,90,90),(72,12,7,5,90,90),(73,13,7,5,90,90),(74,14,7,5,90,90),(75,15,7,5,90,90),(76,1,2,6,90,45),(77,2,2,6,90,90),(78,3,2,6,90,45),(79,4,2,6,90,90),(80,5,2,6,90,90),(81,6,2,6,90,90),(82,7,2,6,90,90),(83,8,2,6,90,90),(84,9,2,6,90,90),(85,10,2,6,90,90),(86,11,2,6,90,90),(87,12,2,6,90,90),(88,13,2,6,90,90),(89,14,2,6,90,90),(90,15,2,6,90,90),(91,1,2,7,90,54),(92,2,2,7,90,90),(93,3,2,7,92,46),(94,4,2,7,90,90),(95,5,2,7,90,90),(96,6,2,7,90,90),(97,7,2,7,90,90),(98,8,2,7,90,90),(99,9,2,7,90,90),(100,10,2,7,90,90),(101,11,2,7,90,90),(102,12,2,7,90,90),(103,13,2,7,90,90),(104,14,2,7,90,90),(105,15,2,7,90,90),(106,16,1,1,0,0),(107,16,1,2,0,0),(108,16,1,3,0,0),(109,16,1,4,0,0),(110,16,7,5,0,0),(111,16,2,6,0,0),(112,16,2,7,0,0);
/*!40000 ALTER TABLE `riskinstances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riskinstmas`
--

DROP TABLE IF EXISTS `riskinstmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riskinstmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ri` int(11) NOT NULL,
  `ma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riskinstmas`
--

LOCK TABLES `riskinstmas` WRITE;
/*!40000 ALTER TABLE `riskinstmas` DISABLE KEYS */;
INSERT INTO `riskinstmas` VALUES (1,76,1),(2,91,3),(3,61,1),(4,2,1),(5,17,7),(6,32,1),(7,3,1),(8,18,3),(9,33,4),(10,78,1),(11,93,1),(12,63,1),(13,63,4),(14,4,1),(15,19,3),(16,34,7),(17,64,9);
/*!40000 ALTER TABLE `riskinstmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `risks`
--

DROP TABLE IF EXISTS `risks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `risks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `risks`
--

LOCK TABLES `risks` WRITE;
/*!40000 ALTER TABLE `risks` DISABLE KEYS */;
INSERT INTO `risks` VALUES (1,'Manual Journal entries are not authorised or may be incorrctly recorded','Manual Journal entries are not authorised or may be incorrctly recorded',1),(2,'All Manual or automated journal entries have not been processed to the GL','All Manual or automated journal entries have not been processed to the GL',1),(3,'Manual or automated journals entries have not been correctly recorded in the GL','Manual or automated journals entries have not been correctly recorded in the GL',1),(4,'Inappropriate postings in prior periods','Inappropriate postings in prior periods',1),(5,'Bank transactions are incorrectly recorded and outstanding items are note followed up.','Bank transactions are incorrectly recorded and outstanding items are note followed up.',7),(6,'Accruals are calculated or posted incorrectly','Accruals are calculated or posted incorrectly',2),(7,'Inappropriate postings in prior periods','Inappropriate postings in prior periods',2);
/*!40000 ALTER TABLE `risks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'Analyst');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-20 12:27:35
