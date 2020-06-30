-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: t_shirts
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(45) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `localidad` varchar(60) NOT NULL,
  `provincia` varchar(90) NOT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Nicolas Maza','enimaza@gmail.com','1134857896','La Chilca 1883','Ciudad Evita','Buenos Aires',NULL),(2,'Augusto Maza','debianmaza@gmail.com','1161669201','Felix de Azara 1871 1C','Banfield','Buenos Aires',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_pedido` date NOT NULL,
  `cod_prod` varchar(10) NOT NULL,
  `talle` varchar(2) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `importe` decimal(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `localidad` varchar(60) NOT NULL,
  `provincia` varchar(90) NOT NULL,
  `estado` enum('stand-by','Aprobado') DEFAULT 'stand-by',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,'2020-06-30','REM-000001','XL','REMERA STONES NEGRA',400.00,1,'Augusto Maza','debianmaza@gmail.com','1161669201','Felix de Azara 1871 1C','Banfield','Buenos Aires','stand-by'),(2,'2020-06-30','REM-000003','XL','REMERA THE CURE NEGRA',1200.00,3,'Augusto Maza','debianmaza@gmail.com','1161669201','Felix de Azara 1871 1C','Banfield','Buenos Aires','stand-by'),(3,'2020-06-30','REM-000002','XL','REMERA GUNS BLANCA',400.00,1,'Augusto Maza','debianmaza@gmail.com','1161669201','Felix de Azara 1871 1C','Banfield','Buenos Aires','stand-by'),(4,'2020-06-30','REM-000001','M','REMERA STONES NEGRA',800.00,2,'Augusto Maza','debianmaza@gmail.com','1161669201','Felix de Azara 1871 1C','Banfield','Buenos Aires','stand-by');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_prod` varchar(10) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `importe` decimal(8,2) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'REM-000001','REMERA STONES NEGRA',400.00,'N','../../pics/pic22.png'),(2,'REM-000002','REMERA GUNS BLANCA',400.00,'N','../../pics/pic24.png'),(3,'REM-000003','REMERA THE CURE NEGRA',400.00,'N','../../pics/pic26.png');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador','root','tshirtsadm',1),(3,'Nicolas Maza','enimaza','enimaza123',1),(4,'Augusto Maza','aumaza','slack142',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-30 16:52:31
