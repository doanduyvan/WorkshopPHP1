-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: workshopphp1_pet
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `chitietdathang`
--

DROP TABLE IF EXISTS `chitietdathang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietdathang` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `dathang_id` int DEFAULT NULL,
  `sanpham_id` int DEFAULT NULL,
  `SoLuong` int DEFAULT NULL,
  `dongia` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `dathang_id` (`dathang_id`),
  KEY `sanpham_id` (`sanpham_id`),
  CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`dathang_id`) REFERENCES `dathang` (`ID`),
  CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietdathang`
--

LOCK TABLES `chitietdathang` WRITE;
/*!40000 ALTER TABLE `chitietdathang` DISABLE KEYS */;
INSERT INTO `chitietdathang` VALUES (4,3,23,1,1000),(5,3,25,2,3000),(6,4,27,1,5000),(7,5,25,1,3000),(8,6,11,1,443),(9,7,26,1,4000),(10,8,30,1,8000),(11,9,23,2,1000),(12,10,22,1,0),(13,10,23,1,1000);
/*!40000 ALTER TABLE `chitietdathang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (6,'WOMEN\'S'),(7,'MEN\'S');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dathang`
--

DROP TABLE IF EXISTS `dathang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dathang` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `taikhoan_id` int DEFAULT NULL,
  `NgayDat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TrangThai` int DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `totalprice` float DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dathang`
--

LOCK TABLES `dathang` WRITE;
/*!40000 ALTER TABLE `dathang` DISABLE KEYS */;
INSERT INTO `dathang` VALUES (3,11,'2024-07-19 09:44:45',2,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',7000),(4,11,'2024-07-19 09:50:43',3,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',5000),(5,11,'2024-07-19 17:09:23',3,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',3000),(6,11,'2024-07-19 17:21:14',1,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',443),(7,11,'2024-07-19 17:23:10',1,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',4000),(8,11,'2024-07-19 17:25:15',3,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',8000),(9,11,'2024-07-19 17:26:34',3,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',2000),(10,12,'2024-07-20 06:53:22',3,'Doan Duy Van','0932202921','137 nguyen thi thap, lien chieu, Da Nang',1000);
/*!40000 ALTER TABLE `dathang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TenSP` varchar(250) NOT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `MoTa` text,
  `SoLuong` int NOT NULL,
  `HinhAnh` varchar(250) DEFAULT NULL,
  `danhmuc_id` int DEFAULT NULL,
  `taikhoan_id` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `danhmuc_id` (`danhmuc_id`),
  KEY `taikhoan_id` (`taikhoan_id`),
  CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`ID`),
  CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (11,'san pham 2 6',443.00,'kkkk',0,'stt.jpg',7,10),(22,'dax fix',0.00,'ok rồi',0,'duyvan1.jpg',7,10),(23,'Áo thun nam',1000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',10,'product_1.png',6,NULL),(24,'Áo thun nữ',2000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',20,'product_2.png',6,NULL),(25,'Áo khoác nam',3000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',30,'product_3.png',6,NULL),(26,'Áo khoác nữ',4000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',40,'product_4.png',6,NULL),(27,'Quần nam',5000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',50,'product_5.png',6,NULL),(28,'Quần nữ',6000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',60,'product_6.png',6,NULL),(29,'Giày nam',7000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',70,'product_7.png',6,NULL),(30,'Giày nữ',8000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',80,'product_8.png',6,NULL),(31,'Túi xách nam',9000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',90,'product_9.png',6,NULL),(32,'Túi xách nữ',10000.00,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec',100,'product_10.png',6,NULL);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taikhoan` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TenTK` varchar(225) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HinhAnh` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `GioiTinh` varchar(20) DEFAULT NULL,
  `VaiTro` varchar(50) DEFAULT 'customer',
  `NgayTao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taikhoan`
--

LOCK TABLES `taikhoan` WRITE;
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` VALUES (10,'duyvan','admin@gmail.com','123',NULL,NULL,NULL,NULL,'admin','2024-07-13 16:38:13'),(11,'Đoàn Duy Vấn','duyvan@gmail.com','123',NULL,NULL,NULL,NULL,'customer','2024-07-14 07:49:48'),(12,'hieu','hieu@gmail.com','123',NULL,NULL,NULL,NULL,'customer','2024-07-20 06:52:53');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-20 16:48:53
