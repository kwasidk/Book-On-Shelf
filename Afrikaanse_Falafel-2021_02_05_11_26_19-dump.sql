-- MySQL dump 10.13  Distrib 8.0.23, for osx10.16 (x86_64)
--
-- Host: 127.0.0.1    Database: bookonshelf
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblBooks`
--

DROP TABLE IF EXISTS `tblBooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblBooks` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `BoekNaam` varchar(255) NOT NULL,
  `Schrijver` varchar(50) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `ISBN` varchar(70) NOT NULL,
  `Taal` varchar(50) NOT NULL,
  `Pagina` int NOT NULL,
  `Voorraad` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `tblBooks_ISBN_uindex` (`ISBN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Alle boeken van de online bibliotheek';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblBooks`
--

LOCK TABLES `tblBooks` WRITE;
/*!40000 ALTER TABLE `tblBooks` DISABLE KEYS */;
INSERT INTO `tblBooks` VALUES (3,'De Wim Hof methode','Wim Hof','Zelfhulp','9789021578422','Nederlands',296,15),(5,'Atomic Habits','James Clear','Zelfhulp','2354354524','Engels',188,3);
/*!40000 ALTER TABLE `tblBooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblBorrowedBooks`
--

DROP TABLE IF EXISTS `tblBorrowedBooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblBorrowedBooks` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FK_UserID` int NOT NULL,
  `FK_BookID` int NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `tblBorrowedBooks_tblBooks_ID_fk` (`FK_BookID`),
  KEY `tblBorrowedBooks_tblUsers_ID_fk` (`FK_UserID`),
  CONSTRAINT `tblBorrowedBooks_tblBooks_ID_fk` FOREIGN KEY (`FK_BookID`) REFERENCES `tblBooks` (`ID`),
  CONSTRAINT `tblBorrowedBooks_tblUsers_ID_fk` FOREIGN KEY (`FK_UserID`) REFERENCES `tblUsers` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblBorrowedBooks`
--

LOCK TABLES `tblBorrowedBooks` WRITE;
/*!40000 ALTER TABLE `tblBorrowedBooks` DISABLE KEYS */;
INSERT INTO `tblBorrowedBooks` VALUES (119,4,5,'2021-02-05','2021-02-05'),(120,4,5,'2021-02-05',NULL),(121,4,5,'2021-02-05',NULL),(122,6,5,'2021-02-05','2021-02-05');
/*!40000 ALTER TABLE `tblBorrowedBooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblUsers`
--

DROP TABLE IF EXISTS `tblUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblUsers` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(50) NOT NULL,
  `Tussenvoegsel` varchar(50) DEFAULT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Straat` varchar(50) NOT NULL,
  `Huisnummer` int NOT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Woonplaats` varchar(50) NOT NULL,
  `Wachtwoord` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Rol` varchar(50) DEFAULT 'Klant',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `tblUsers_Email_uindex` (`Email`),
  UNIQUE KEY `tblUsers_Postcode_uindex` (`Postcode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Table with all the information about the Book-on-Shelf users.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsers`
--

LOCK TABLES `tblUsers` WRITE;
/*!40000 ALTER TABLE `tblUsers` DISABLE KEYS */;
INSERT INTO `tblUsers` VALUES () /* In this SQL line was some classified information, I cant make it public. */
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-05 11:26:19
