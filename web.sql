-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `CustID` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `ContactNo` int(11) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`CustID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('Niweera','W.M.D.N.L.','Weerasekara','w.nipuna@gmail.com',766419486,'$2y$10$27/5UsmJ/PHdUH6fdcQhI.4KaSbzW1heCkxF4kuC709Dgv/7C5q8.');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customerissue`
--

DROP TABLE IF EXISTS `customerissue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customerissue` (
  `CustID` varchar(255) NOT NULL,
  `IssueID` varchar(255) NOT NULL,
  PRIMARY KEY (`CustID`,`IssueID`),
  KEY `custrel2` (`IssueID`),
  CONSTRAINT `custrel` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`),
  CONSTRAINT `custrel2` FOREIGN KEY (`IssueID`) REFERENCES `skill` (`SkID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customerissue`
--

LOCK TABLES `customerissue` WRITE;
/*!40000 ALTER TABLE `customerissue` DISABLE KEYS */;
/*!40000 ALTER TABLE `customerissue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `SkID` varchar(255) NOT NULL,
  `SkillName` varchar(255) NOT NULL,
  PRIMARY KEY (`SkID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES ('Carp001','Wood works'),('Elec001','Wiring'),('Ittc001','PC Troubleshooting'),('Ittc002','Virus Removing'),('Mech001','Tinkering'),('Plum001','Pipelining');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technician`
--

DROP TABLE IF EXISTS `technician`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technician` (
  `TechID` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `ContactNo` int(11) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  PRIMARY KEY (`TechID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technician`
--

LOCK TABLES `technician` WRITE;
/*!40000 ALTER TABLE `technician` DISABLE KEYS */;
INSERT INTO `technician` VALUES ('Kamal123','Kamal','Perera','kmk@gmail.com',751234567,'$2y$10$O1N1.VUAU60MwKAf9P5nFuR1mF0e4SKsYq6fhy2bK5yUrpgIoRhqK','Carpenter','Colombo'),('Niweera','W.M.D.N.L.','Weerasekara','w.nipuna@gmail.com',766419486,'$2y$10$YHNmkjwGti6TrIXHWcV7lukwIr4yiMgDOX0bbXDw6wnNGRWniMOAG','IT Technician','Kalutara'),('Niweera2','W.M.D.N.L.','Weerasekara','w.nipuna@gmail.com',766419486,'$2y$10$vuqB232aQJpbn4lzLg5IUO4uYes8mZ.86oA2DXNqWSvPHshjX3/S2','Carpenter','Colombo'),('Niweera22','W.M.D.N.L.','Weerasekara','w.nipuna@gmail.com',766419486,'$2y$10$BGuv1OqbulCyCoxMezDhOuyi68gGO2FWmxHk//KYOD5SvNFBeiwG2','Electrician','Galle'),('Niweera222','W.M.D.N.L.','Weerasekara','w.nipuna@gmail.com',766419486,'$2y$10$nTGVWb1ohJVDz3pfsJz8LOvIhSQPImZ8Bw.0YhjCFVOd4A8s1HM8C','IT Technician','Kalutara');
/*!40000 ALTER TABLE `technician` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `techskill`
--

DROP TABLE IF EXISTS `techskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `techskill` (
  `TechID` varchar(255) NOT NULL,
  `SkID` varchar(255) NOT NULL,
  PRIMARY KEY (`TechID`,`SkID`),
  KEY `techrel` (`SkID`),
  CONSTRAINT `techrel` FOREIGN KEY (`SkID`) REFERENCES `skill` (`SkID`),
  CONSTRAINT `techrel2` FOREIGN KEY (`TechID`) REFERENCES `technician` (`TechID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `techskill`
--

LOCK TABLES `techskill` WRITE;
/*!40000 ALTER TABLE `techskill` DISABLE KEYS */;
INSERT INTO `techskill` VALUES ('Kamal123','Carp001'),('Niweera','Ittc001'),('Niweera','Ittc002'),('Niweera2','Carp001'),('Niweera22','Elec001'),('Niweera222','Ittc001');
/*!40000 ALTER TABLE `techskill` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-05  0:50:52
