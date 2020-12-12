-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: iman_pinjambuku
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Spiderman 3','Iman','Gramedia','2020-12-09 11:24:01','2020-12-09 11:24:04'),(2,'Superman','Andy','Gramedia','2020-12-09 11:24:32','2020-12-09 11:24:34'),(3,'Game of Throne','Ujang','Gramedia','2020-12-09 11:25:04','2020-12-09 11:25:07'),(20,'Maze runner','iman','iman','2020-12-09 19:22:05','2020-12-09 19:22:05'),(1101,'Zelda Adventure','iman','iman','2020-12-09 19:44:33','2020-12-09 19:44:33'),(1102,'Kembalinya Gunung Merapi','aan sudrajat','cipta mekar','2020-12-09 20:00:56','2020-12-09 20:00:56'),(1103,'Atlantis','Andry suhaya','cipta mekar','2020-12-09 20:02:35','2020-12-09 20:02:35'),(1104,'Nenek Sihir','Andry suhaya','cipta mekar','2020-12-09 20:05:29','2020-12-09 20:05:29'),(1106,'Rumah Angker','Andry suhaya','cipta mekar','2020-12-09 20:09:12','2020-12-09 20:09:12'),(1107,'Ksatria Piningit','Andry suhaya','cipta mekar','2020-12-09 20:12:20','2020-12-09 20:12:20'),(1108,'Bunga Mawar','Andry suhaya','cipta mekar','2020-12-09 20:17:12','2020-12-09 20:17:12'),(1109,'Bunga Melati','Andry suhaya','cipta mekar','2020-12-09 20:17:50','2020-12-09 20:17:50'),(1111,'Pelangi','Andry suhaya','cipta mekar','2020-12-09 20:21:39','2020-12-09 20:21:39'),(1113,'Jatuhnya Pohon Kemanggi','Ujang suherman','cipta mekar','2020-12-09 20:26:20','2020-12-09 20:29:39'),(1115,'Jumanji','Ujang suherman','cipta mekar','2020-12-09 20:26:56','2020-12-09 20:26:56'),(1120,'Tekhnik Electro','Andry suhaya','cipta mekar','2020-12-09 20:19:13','2020-12-09 20:46:05'),(1121,'Buta Ijo','Andry suhaya','cipta mekar','2020-12-09 21:36:06','2020-12-11 19:20:24'),(1122,'Beginner Electro','Andry suhaya','cipta mekar','2020-12-10 20:03:40','2020-12-10 20:03:40'),(1123,'Berlatih Kuda','Andry suhaya','cipta rusa karma','2020-12-11 07:18:31','2020-12-11 07:18:31'),(1124,'Sukses UN 2021','ivan hakim','cipta mekar','2020-12-11 07:37:18','2020-12-11 07:37:18');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrowings`
--

DROP TABLE IF EXISTS `borrowings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borrowings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int unsigned NOT NULL,
  `book_id` int unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `return_date` date NOT NULL,
  `created_at_borrow` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `borrowings_member_id_foreign` (`member_id`),
  KEY `borrowings_book_id_foreign` (`book_id`),
  CONSTRAINT `borrowings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `borrowings_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrowings`
--

LOCK TABLES `borrowings` WRITE;
/*!40000 ALTER TABLE `borrowings` DISABLE KEYS */;
INSERT INTO `borrowings` VALUES (1,1,3,'2020-12-11 18:17:33','2020-12-13','2020-12-10','2020-12-10 09:01:41',2),(3,2,1106,'2020-12-11 18:20:40','2020-12-26','2020-12-11','2020-12-10 02:09:52',2),(4,4,1109,'2020-12-11 18:09:40','2020-12-30','2020-12-19','2020-12-10 18:53:54',1),(6,4,1115,'2020-12-11 18:10:11','2020-12-21','2020-12-19','2020-12-11 06:17:05',1),(7,1,1104,'2020-12-11 18:49:31','2020-12-31','2020-12-12','2020-12-11 07:17:00',2),(8,5,1102,'2020-12-11 08:50:06','2020-12-30','2020-12-12','2020-12-11 08:50:06',1),(9,5,1102,'2020-12-11 08:50:39','2020-12-30','2020-12-12','2020-12-11 08:50:39',1),(10,4,1113,'2020-12-11 08:53:41','2020-12-30','2020-12-12','2020-12-11 08:53:41',1),(11,1,1,'2020-12-11 18:38:15','2020-12-23','2020-12-13','2020-12-11 18:35:40',2),(12,1,1106,'2020-12-11 18:36:40','2020-12-28','2020-12-27','2020-12-11 18:36:14',2),(13,4,1124,'2020-12-11 18:37:56','2020-12-13','2020-12-12','2020-12-11 18:37:25',2),(14,2,1120,'2020-12-11 18:55:13','2020-12-14','2020-12-13','2020-12-11 18:54:35',2),(16,1,1124,'2020-12-11 19:36:10','2020-12-13','2020-12-18','2020-12-11 19:35:54',3);
/*!40000 ALTER TABLE `borrowings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Horror','2020-12-09 09:57:57','2020-12-09 09:58:00'),(2,'Action','2020-12-09 09:58:16','2020-12-09 09:58:19'),(3,'Sci-Fi','2020-12-09 09:58:43','2020-12-09 09:58:44'),(4,'Game','2020-12-09 09:59:15','2020-12-09 09:59:17'),(5,'Adventure','2020-12-09 10:00:36','2020-12-09 10:00:38'),(8,'Thriller','2020-12-11 07:30:53','2020-12-11 07:30:53'),(9,'Sma','2020-12-11 07:32:07','2020-12-11 07:32:07'),(10,'Smp','2020-12-11 08:42:31','2020-12-11 08:42:31');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_book`
--

DROP TABLE IF EXISTS `category_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_book` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `book_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_book_category_id_foreign` (`category_id`),
  KEY `category_book_book_id_foreign` (`book_id`),
  CONSTRAINT `category_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_book_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_book`
--

LOCK TABLES `category_book` WRITE;
/*!40000 ALTER TABLE `category_book` DISABLE KEYS */;
INSERT INTO `category_book` VALUES (1,1,2,'2020-12-09 11:25:31','2020-12-09 11:25:33'),(2,1,1,'2020-12-09 11:25:48','2020-12-09 11:25:50'),(3,3,1,'2020-12-09 11:26:16','2020-12-09 11:26:21'),(4,2,3,'2020-12-09 11:26:18','2020-12-09 11:26:23'),(5,2,1101,'2020-12-09 19:44:33','2020-12-09 19:44:33'),(6,4,1102,'2020-12-09 20:00:56','2020-12-09 20:00:56'),(8,4,1111,'2020-12-09 20:21:39','2020-12-09 20:21:39'),(9,5,1111,'2020-12-09 20:21:39','2020-12-09 20:21:39'),(10,4,1113,'2020-12-09 20:26:20','2020-12-09 20:26:20'),(11,5,1113,'2020-12-09 20:26:20','2020-12-09 20:26:20'),(12,5,1115,'2020-12-09 20:26:56','2020-12-09 20:26:56'),(13,1,1121,'2020-12-09 21:36:06','2020-12-09 21:36:06'),(14,2,1121,'2020-12-09 21:36:06','2020-12-09 21:36:06'),(15,3,1122,'2020-12-10 20:03:40','2020-12-10 20:03:40'),(16,4,1122,'2020-12-10 20:03:40','2020-12-10 20:03:40'),(17,5,1123,'2020-12-11 07:18:32','2020-12-11 07:18:32'),(18,9,1124,'2020-12-11 07:37:18','2020-12-11 07:37:18');
/*!40000 ALTER TABLE `category_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Iman','Bandung, West Java','2020-12-09 02:16:01','2020-12-09 02:16:01'),(2,'Andy Wiratman','Surabaya, Indonesia','2020-12-09 02:18:01','2020-12-09 02:19:40'),(4,'Ujang Domba','Medan, Indonesia','2020-12-10 18:51:26','2020-12-10 18:51:26'),(5,'Uncal Cimanggu','Cimanggu, west java','2020-12-11 07:40:49','2020-12-11 07:40:49'),(6,'John Kennedy','atlanta, US','2020-12-11 19:46:09','2020-12-11 19:46:49');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_12_09_064454_create_members_table',1),(5,'2020_12_09_070052_create_categories_table',2),(6,'2020_12_09_070312_create_books_table',3),(7,'2020_12_09_071239_create_category_book_table',3),(8,'2020_12_09_073731_create_borrowings_table',4),(9,'2020_12_10_073440_add_created_at_in_borrowing_table',5),(10,'2020_12_10_074109_add_new_created_at_in_borrowing_table',6),(11,'2020_12_10_074426_remove_unused_field_in_borrowing_table',7),(12,'2020_12_11_154339_add_status_to_borrowing_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2020-12-12  9:56:17
