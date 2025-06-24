-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contracts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `expireDate` date DEFAULT NULL,
  `signedDate` date DEFAULT NULL,
  `nameA` varchar(100) DEFAULT NULL,
  `phoneA` varchar(20) DEFAULT NULL,
  `nameB` varchar(100) DEFAULT NULL,
  `phoneB` varchar(20) DEFAULT NULL,
  `contractUrl` varchar(255) DEFAULT NULL,
  `serviceId` int DEFAULT NULL,
  `providerId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serviceId` (`serviceId`),
  KEY `providerId` (`providerId`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `services` (`id`),
  CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`providerId`) REFERENCES `providers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` VALUES (1,'Hợp đồng rolex cung cấp 2024','Hiệu lực',20000000000.00,'VND','Năm','2025-04-01','2024-04-01','Nguyễn Văn A','0912345678','Trần Văn B','0987654321','https://example.com/contract3.pdf',1,1),(2,'Hợp đồng casio cung cấp 2024','Hiệu lực',1000000000.00,'VND','Năm','2025-04-10','2024-04-10','Nguyễn Văn C','0912123456','Lê Văn D','0987123456','https://example.com/contract4.pdf',2,2),(3,'Hợp đồng rolex cung cấp 2025','Hiệu lực',20000000000.00,'VND','Năm','2026-04-01','2025-04-01','Nguyễn Văn A','0912345678','Trần Văn B','0987654321','https://example.com/contract3.pdf',1,1),(4,'Hợp đồng casio cung cấp 2025','Hiệu lực',1000000000.00,'VND','Năm','2026-04-10','2025-04-10','Nguyễn Văn C','0912123456','Lê Văn D','0987123456','https://example.com/contract4.pdf',2,2);
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24 14:21:28
