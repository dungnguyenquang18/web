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
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `des` text,
  `quantity` int DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `paidDate` date DEFAULT NULL,
  `vat` int DEFAULT NULL,
  `refContractId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refContractId` (`refContractId`),
  CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`refContractId`) REFERENCES `contracts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (1,'Hóa đơn cung cấp lần n 2024 rolex','Thanh toán dịch vụ bảo hành',1000,'2024-04-05','2024-04-06',10,1),(2,'Hóa đơn cung cấp lần n 2024 casio','Thanh toán dịch vụ thay dây',1250,'2024-04-15','2024-04-16',8,2),(3,'Hóa đơn cung cấp lần 1 2025 rolex','Thanh toán dịch vụ bảo hành',20,'2025-04-05','2025-04-06',10,1),(4,'Hóa đơn cung cấp lần 1 2025 casio','Thanh toán dịch vụ thay dây',50,'2025-04-15','2025-04-16',8,2);
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `providers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `taxCode` varchar(50) DEFAULT NULL,
  `des` text,
  `status` varchar(50) DEFAULT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `updatedDate` date DEFAULT NULL,
  `websiteUrl` varchar(255) DEFAULT NULL,
  `reputation` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Đồng hồ Rolex Việt Nam','123456789','Nhà cung cấp đồng hồ chính hãng','Đang hoạt động','123 Lê Lợi, Q.1, TP.HCM','rolexvn@gmail.com','0912412415','2024-04-01','2024-05-01','https://rolexvn.vn',5),(2,'Đồng hồ Casio','987654321','Nhà cung cấp đồng hồ giá rẻ','Đang hoạt động','456 Trần Hưng Đạo, Q.5, TP.HCM','casio@gmail.com','0912412478','2024-04-05','2024-05-10','https://casio.vn',2),(3,'Đồng hồ olympianus Việt Nam','12','sdadf','Đang hoạt động','123 Lê Lợi, Q.1, TP.HCM','dugnam18@gmail.com','23412',NULL,'2025-06-01','https://authwatch.vn',NULL);
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provideservice`
--

DROP TABLE IF EXISTS `provideservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provideservice` (
  `serviceId` int NOT NULL,
  `providerId` int NOT NULL,
  `providePrice` decimal(15,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`serviceId`,`providerId`),
  KEY `providerId` (`providerId`),
  CONSTRAINT `provideservice_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `services` (`id`),
  CONSTRAINT `provideservice_ibfk_2` FOREIGN KEY (`providerId`) REFERENCES `providers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provideservice`
--

LOCK TABLES `provideservice` WRITE;
/*!40000 ALTER TABLE `provideservice` DISABLE KEYS */;
INSERT INTO `provideservice` VALUES (1,1,20000000.00,'VND','chiếc'),(2,2,800000.00,'VND','chiếc');
/*!40000 ALTER TABLE `provideservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `des` text,
  `status` varchar(50) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Đồng hồ rolex land-dweller 40','dòng sản phẩm cao cấp','Đang cung cấp','2024-05-01','2024-05-01'),(2,'Đồng hồ casio g-sdhock','dòng sản phẩm bình dân','Đang cung cấp','2024-05-10','2024-05-10');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user',
  `status` varchar(20) DEFAULT 'active',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','admin@haravan.com','Admin Haravan','admin','active','2025-05-29 23:53:16','2025-05-29 23:53:16'),(2,'user1','u','user1@example.com','Nguyễn Văn A','user','active','2025-05-29 23:53:16','2025-05-29 23:53:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24 14:22:38
