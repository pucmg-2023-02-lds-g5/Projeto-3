-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: lab_projeto
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `transacoes`
--

DROP TABLE IF EXISTS `transacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transacoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `professor_id` bigint unsigned NOT NULL,
  `aluno_id` bigint unsigned DEFAULT NULL,
  `quantidade` int NOT NULL,
  `mensagem` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transacoes_professor_id_foreign` (`professor_id`),
  KEY `transacoes_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `transacoes_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacoes`
--

LOCK TABLES `transacoes` WRITE;
/*!40000 ALTER TABLE `transacoes` DISABLE KEYS */;
INSERT INTO `transacoes` VALUES (1,1,1,50,'teste','2023-10-30 01:10:44','2023-10-30 01:10:44'),(2,1,1,50,'teste','2023-10-30 01:12:26','2023-10-30 01:12:26'),(3,1,1,50,'teste teste','2023-10-30 01:15:58','2023-10-30 01:15:58'),(4,2,5,5,'teste','2023-10-30 05:10:39','2023-10-30 05:10:39'),(5,2,6,10,'Teste','2023-10-30 10:25:56','2023-10-30 10:25:56'),(6,1,5,35,'Vai comprar coisa','2023-11-03 04:59:34','2023-11-03 04:59:34'),(7,3,9,50,'Brilha','2023-11-06 03:33:32','2023-11-06 03:33:32'),(8,1,10,5,'Teste email','2023-11-19 04:35:37','2023-11-19 04:35:37'),(9,1,10,5,'Teste email','2023-11-19 04:36:42','2023-11-19 04:36:42'),(10,1,10,5,'Teste email','2023-11-19 04:38:06','2023-11-19 04:38:06'),(11,1,10,5,'Teste email','2023-11-19 04:38:33','2023-11-19 04:38:33'),(12,1,10,5,'Teste email','2023-11-19 04:41:51','2023-11-19 04:41:51'),(13,1,10,5,'Teste email','2023-11-19 04:43:35','2023-11-19 04:43:35'),(14,1,10,5,'Teste email','2023-11-19 04:44:01','2023-11-19 04:44:01'),(15,1,10,5,'Teste email','2023-11-19 04:45:29','2023-11-19 04:45:29'),(16,1,10,1,'teste email','2023-11-19 04:47:31','2023-11-19 04:47:31'),(17,1,10,1,'teste email','2023-11-19 05:06:27','2023-11-19 05:06:27'),(18,1,10,1,'123213','2023-11-19 05:21:44','2023-11-19 05:21:44');
/*!40000 ALTER TABLE `transacoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-19 12:14:07
