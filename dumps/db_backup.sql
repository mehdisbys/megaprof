-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: megaprof
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2-log

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
-- Table structure for table `adverts`
--

DROP TABLE IF EXISTS `adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adverts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `header` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `footer` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_travel_supplement` int(11) DEFAULT NULL,
  `degressive_5_hours` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degressive_10_hours` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_variation_desc` text COLLATE utf8_unicode_ci,
  `location` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `location_lat` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_long` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `travel_radius` int(11) DEFAULT NULL,
  `location_postcode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_street` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_house_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_more_details` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `webcam_bool` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adverts`
--

LOCK TABLES `adverts` WRITE;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;
INSERT INTO `adverts` VALUES (1,1,'','','','','',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-12-13 18:02:38','2015-12-13 18:02:38'),(2,1,'','','','','',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-12-13 18:03:00','2015-12-13 18:03:00'),(3,1,'','','','','',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-12-13 18:03:15','2015-12-13 18:03:15');
/*!40000 ALTER TABLE `adverts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Niveau','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_12_01_134113_create_subjects_table',1),('2015_12_01_134336_create_sub_subjects_table',1),('2015_12_01_134644_create_levels_table',1),('2015_12_01_134819_create_sub_levels_table',1),('2015_12_01_144819_create_adverts_table',2),('2015_12_01_174336_entrust_setup_tables',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_levels`
--

DROP TABLE IF EXISTS `sub_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sub_levels_parent_id_foreign` (`parent_id`),
  CONSTRAINT `sub_levels_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `levels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_levels`
--

LOCK TABLES `sub_levels` WRITE;
/*!40000 ALTER TABLE `sub_levels` DISABLE KEYS */;
INSERT INTO `sub_levels` VALUES (9,'Primaire',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'Collège',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Seconde',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'Première',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'Terminale',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'Baccalauréat',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'BTS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'Supérieur',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'Débutant',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'Intermédiaire',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'Avancé',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sub_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_subjects`
--

DROP TABLE IF EXISTS `sub_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sub_subjects_parent_id_foreign` (`parent_id`),
  CONSTRAINT `sub_subjects_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=557 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_subjects`
--

LOCK TABLES `sub_subjects` WRITE;
/*!40000 ALTER TABLE `sub_subjects` DISABLE KEYS */;
INSERT INTO `sub_subjects` VALUES (79,'Aide aux devoirs',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,'Français',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,'Méthodologie',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,'Soutien scolaire',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,'Lecture',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,'Philosophie',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,'Lettres modernes',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,'Orthographe',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,'Sortie d\'école & Baby-sitting',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,'Latin',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,'Aide à la rédaction de CV - lettre de motivation',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,'Alphabétisation',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,'Conjugaison',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,'Grammaire',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,'Lettres classiques',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,'Aide à la rédaction de mémoires et thèses',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,'Grec ancien',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,'Préparation concours Normale Sup',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,'Préparation Concours / Examen',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,'Orientation scolaire',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,'Graphothérapie',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,'Écriture créative',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,'Préparation Concours Enseignement',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,'Lecture rapide',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,'Préparation Concours Fonction publique',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,'Préparation Concours de Police',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,'Mathématiques',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,'Physique',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,'Chimie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,'Biologie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,'Sciences de l\'ingénieur',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(110,'SVT',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,'Mécanique',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,'Technologie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(113,'Autres sciences',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,'Statistiques',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(115,'Dessin industriel',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(116,'Préparation concours école d\'ingénieur',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,'Électricité',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(118,'Pharmacie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,'PACES',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,'Chimie organique',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,'Médecine',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(122,'Géologie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,'Sciences médico-sociales',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(124,'Infirmier',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(125,'Géométrie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(126,'Écologie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(127,'Logique mathématique',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(128,'Arithmétique',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(129,'Trigonométrie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(130,'Paramédical',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(131,'Kinésithérapie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(132,'Développement durable',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(133,'Ostéopathie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(134,'Énergies renouvelables',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(135,'Odontologie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(136,'Diététique',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(137,'Sage-femme',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(138,'Algèbre',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(139,'Anatomie',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(140,'Économie',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(141,'Comptabilité',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(142,'Gestion comptable',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(143,'Finance',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(144,'Marketing',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(145,'Préparation concours écoles de commerce',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(146,'Fiscalité',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(147,'Vente',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(148,'Économétrie',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(149,'Création d\'entreprise',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(150,'Gestion de projet',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(151,'Management et gestion d\'entreprise',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(152,'TAGE MAGE',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(153,'Gestion des risques',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(154,'SES',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(155,'Start up',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(156,'Microéconomie',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(157,'Macroéconomie',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(158,'Anglais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(159,'Espagnol',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(160,'Allemand',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(161,'Italien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(162,'Russe',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(163,'Chinois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(164,'FLE Français Langue Étrangère',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(165,'Arabe',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(166,'Traduction - anglais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(167,'Autres langues',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(168,'TOEIC',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(169,'TOEFL',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(170,'Traduction - espagnol',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(171,'Portugais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(172,'Japonais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(173,'Mandarin',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(174,'Techniques de traduction',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(175,'IELTS',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(176,'Traduction - italien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(177,'Anglais américain',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(178,'Portugais brésilien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(179,'Interprétation',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(180,'Anglais britannique',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(181,'FCE',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(182,'CAE',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(183,'Coréen',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(184,'Traduction - allemand',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(185,'Polonais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(186,'Traduction - chinois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(187,'Grec moderne',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(188,'Catalan',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(189,'Ukrainien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(190,'CPE',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(191,'Valencien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(192,'Roumain',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(193,'Hébreu',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(194,'Néerlandais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(195,'Turc',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(196,'Traduction - arabe',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(197,'Serbo-croate',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(198,'Cantonais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(199,'Persan',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(200,'Suédois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(201,'Vietnamien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(202,'Langue des signes',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(203,'Hindi',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(204,'Réduction d\'accent',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(205,'DELF',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(206,'Galicien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(207,'Thaïlandais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(208,'Tchèque',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(209,'PET',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(210,'DALF',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(211,'Arménien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(212,'Hongrois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(213,'Malais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(214,'Albanais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(215,'Indonésien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(216,'Bulgare',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(217,'Basque',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(218,'GMAT',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(219,'Norvégien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(220,'Créole',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(221,'Danois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(222,'Letton',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(223,'Bengali',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(224,'Slovaque',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(225,'Breton',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(226,'Réduction d\'accent espagnol',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(227,'Traduction - autres langues',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(228,'Espéranto',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(229,'Népalais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(230,'Yiddish',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(231,'Luxembourgeois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(232,'Lao',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(233,'Lituanien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(234,'Occitan',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(235,'Sanskrit',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(236,'Khmer',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(237,'Géorgien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(238,'Swahili',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(239,'Malgache',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(240,'Estonien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(241,'Finnois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(242,'Tamoul',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(243,'Marathi',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(244,'Mongol',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(245,'Urdu',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(246,'Cingalais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(247,'Birman',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(248,'Javanais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(249,'Corse',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(250,'Réduction d\'accent arabe',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(251,'Réduction d\'accent - autres langues',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(252,'Réduction d\'accent français',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(253,'Réduction d\'accent chinois',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(254,'Réduction d\'accent italien',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(255,'Réduction d\'accent japonais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(256,'Farsi',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(257,'Réduction d\'accent allemand',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(258,'Kurde',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(259,'Traduction - japonais',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(260,'Afrikaans',4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(261,'Droit civil',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(262,'Droit public',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(263,'Droit pénal',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(264,'Droit du travail',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(265,'Droit international',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(266,'Droit fiscal',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(267,'Droit des affaires',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(268,'Droit constitutionnel',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(269,'Droit administratif',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(270,'Droit européen',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(271,'Propriété intellectuelle',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(272,'Droit immobilier',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(273,'Préparation examen CRFPA',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(274,'Préparation concours ENM',5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(275,'Histoire',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(276,'Géographie',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(277,'Culture générale',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(278,'Sociologie',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(279,'Éducation civique',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(280,'Sciences sociales',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(281,'Sciences politiques',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(282,'Préparation concours Sciences Po',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(283,'Psychologie',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(284,'Communication',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(285,'Ressources humaines',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(286,'Secrétariat',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(287,'Archéologie',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(288,'Autres sciences humaines',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(289,'Graphologie',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(290,'Préparation Tests psychotechniques',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(291,'Relations internationales',6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(292,'Initiation informatique',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(293,'Bureautique',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(294,'Photoshop',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(295,'Programmation',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(296,'Excel',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(297,'Graphisme',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(298,'Word',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(299,'Base de données',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(300,'Logiciels',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(301,'Illustrator',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(302,'InDesign',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(303,'Développement Web',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(304,'Powerpoint',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(305,'Infographie',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(306,'PAO',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(307,'Vidéo',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(308,'Initiation Internet',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(309,'Électronique',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(310,'Télécommunications',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(311,'AutoCAD',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(312,'Réseaux sociaux',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(313,'Création de site web',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(314,'Sécurité informatique',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(315,'Système d\'exploitation',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(316,'Référencement',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(317,'SketchUp',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(318,'CAO',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(319,'DAO',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(320,'Réseaux informatiques',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(321,'ArchiCAD',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(322,'CATIA',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(323,'SIG',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(324,'Revit',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(325,'Animation 3D',7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(326,'Piano',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(327,'Solfège',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(328,'Guitare',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(329,'Instruments à cordes',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(330,'Improvisation musicale',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(331,'Chant',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(332,'Autres instruments',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(333,'Composition',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(334,'Éveil musical',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(335,'Violon',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(336,'Batterie',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(337,'Basse',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(338,'Percussions',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(339,'Flûte traversière',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(340,'Saxophone',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(341,'Histoire de la musique',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(342,'Violoncelle',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(343,'Instruments à vent',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(344,'Chorale',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(345,'Clarinette',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(346,'MAO',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(347,'Alto',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(348,'Accordéon',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(349,'Synthétiseur',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(350,'Mix - DJ',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(351,'Flûte',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(352,'Contrebasse',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(353,'Trompette',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(354,'Harpe',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(355,'Ukulélé',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(356,'Clavecin',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(357,'Orgue',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(358,'Djembé',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(359,'Musicothérapie',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(360,'Luth',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(361,'Harmonica',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(362,'Mandoline',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(363,'Trombone',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(364,'Hautbois',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(365,'Viole de Gambe',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(366,'Basson',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(367,'Guitare acoustique',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(368,'Guitare flamenca',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(369,'Flûte piccolo',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(370,'Guitare classique',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(371,'Didgeridoo',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(372,'Chant lyrique',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(373,'Cornemuse',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(374,'Cithare',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(375,'Banjo',8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(376,'Coach sportif',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(377,'Yoga',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(378,'Remise en forme',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(379,'Danse',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(380,'Fitness',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(381,'Autres sports',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(382,'Musculation',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(383,'Relaxation',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(384,'Éveil sportif',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(385,'Arts martiaux',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(386,'Stretching',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(387,'Course à pied',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(388,'Chorégraphie',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(389,'Self-défense',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(390,'Tennis',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(391,'Salsa',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(392,'Natation',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(393,'Boxe',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(394,'Pilates',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(395,'Méditation',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(396,'Danses latines',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(397,'Gymnastique',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(398,'Massage',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(399,'Danses de salon',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(400,'Athlétisme',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(401,'Hip hop',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(402,'Tango',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(403,'Danse classique',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(404,'Qi Gong',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(405,'Krav maga',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(406,'Barre au sol',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(407,'Danse africaine',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(408,'Danse orientale',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(409,'Valse',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(410,'Rock',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(411,'Boxe thaï',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(412,'Tai chi',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(413,'Zumba',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(414,'Karaté',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(415,'Aquagym',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(416,'Basket',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(417,'Football',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(418,'Kick boxing',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(419,'Triathlon',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(420,'Équitation',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(421,'Nutrition du sport',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(422,'Cyclisme',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(423,'Kung-fu',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(424,'Breakdance',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(425,'Flamenco',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(426,'Pole dance',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(427,'Skate',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(428,'Badminton',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(429,'Handball',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(430,'Rugby',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(431,'Tennis de table',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(432,'Roller',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(433,'Claquettes',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(434,'Judo',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(435,'Sevillanas',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(436,'Capoeira',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(437,'Volley',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(438,'Patinage',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(439,'Squash',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(440,'Plongée sous-marine',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(441,'Ski',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(442,'Golf',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(443,'Surf',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(444,'Escalade',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(445,'Hula-hoop',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(446,'Hockey sur glace',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(447,'Danse contemporaine',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(448,'Navigation',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(449,'Gymnastique rythmique',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(450,'Stand up paddle',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(451,'Ultimate',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(452,'Escrime',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(453,'Hockey sur gazon',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(454,'Danse indienne',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(455,'Danse Bollywood',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(456,'Danse moderne',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(457,'Danse jazz',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(458,'Comédie musicale',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(459,'Baby-foot',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(460,'Padel',9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(461,'Dessin',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(462,'Peinture',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(463,'Histoire de l\'art',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(464,'Photographie',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(465,'Théâtre',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(466,'Cinéma',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(467,'Architecture',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(468,'Sculpture',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(469,'Illustration',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(470,'Design',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(471,'Bande dessinée',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(472,'Calligraphie',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(473,'Art thérapie',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(474,'Improvisation théâtrale',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(475,'Architecture d\'intérieur',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(476,'Poterie',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(477,'Aérographie',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(478,'Préparation concours école d\'architecture',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(479,'Nihonga',10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(480,'Couture',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(481,'Cuisine',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(482,'Autres loisirs',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(483,'Échecs',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(484,'Modélisme',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(485,'Décoration',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(486,'Pâtisserie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(487,'Broderie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(488,'Stylisme',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(489,'Scrapbooking',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(490,'Magie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(491,'Maquillage',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(492,'Tricot',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(493,'Astrologie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(494,'Sophrologie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(495,'Relooking',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(496,'Bricolage',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(497,'Autres jeux de cartes',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(498,'Œnologie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(499,'Crochet',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(500,'Bijouterie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(501,'Cuisine du monde',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(502,'Jardinage',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(503,'Feng shui',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(504,'Encadrement',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(505,'Coiffure',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(506,'Origami',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(507,'Gastronomie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(508,'Cuisine traditionnelle',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(509,'Cartonnage',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(510,'Jonglage',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(511,'Cocktail',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(512,'Composition florale',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(513,'Travaux manuels',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(514,'DIY',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(515,'Cartomancie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(516,'Poker',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(517,'Généalogie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(518,'Cuisine italienne',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(519,'Pliage',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(520,'Tarot',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(521,'Gravure',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(522,'Cuisine végétarienne',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(523,'Secourisme',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(524,'Mémorisation',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(525,'Mosaïque',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(526,'Éducation canine',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(527,'Cuisine Bio',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(528,'Cuisine asiatique',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(529,'Conduite',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(530,'Bridge',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(531,'Développement personnel',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(532,'Tapisserie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(533,'Ébénisterie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(534,'Plomberie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(535,'Rénovation de meubles',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(536,'Chiromancie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(537,'Menuiserie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(538,'Jeux vidéo',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(539,'Rubik\'s cube',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(540,'Cuisine sans gluten',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(541,'Cuisine diététique',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(542,'Animation d\'évènements',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(543,'Apiculture',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(544,'Cirque',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(545,'Métallerie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(546,'Soudure',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(547,'Sellerie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(548,'Réfection de sièges',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(549,'Ikebana',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(550,'Belote',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(551,'Cuisine française',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(552,'Flair bartending',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(553,'Pétanque',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(554,'Kitesurf',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(555,'Maroquinerie',11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(556,'Cuisine moléculaire',11,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sub_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Soutien scolaire / Lettres','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Sciences','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Economie','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Langues','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Droit','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Sciences humaines','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Informatique','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Musique','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Sports','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'Arts','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Loisirs','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects_per_advert`
--

DROP TABLE IF EXISTS `subjects_per_advert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects_per_advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_id` varchar(45) DEFAULT NULL,
  `subject_id` varchar(45) DEFAULT NULL,
  `level_id` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects_per_advert`
--

LOCK TABLES `subjects_per_advert` WRITE;
/*!40000 ALTER TABLE `subjects_per_advert` DISABLE KEYS */;
INSERT INTO `subjects_per_advert` VALUES (1,'1','79',NULL,'2015-12-13 18:02:38','2015-12-13 18:02:38'),(2,'1','80',NULL,'2015-12-13 18:02:38','2015-12-13 18:02:38'),(3,'1','82',NULL,'2015-12-13 18:02:38','2015-12-13 18:02:38'),(4,'2','79',NULL,'2015-12-13 18:03:00','2015-12-13 18:03:00'),(5,'2','80',NULL,'2015-12-13 18:03:00','2015-12-13 18:03:00'),(6,'2','82',NULL,'2015-12-13 18:03:01','2015-12-13 18:03:01'),(7,'3','79',NULL,'2015-12-13 18:03:15','2015-12-13 18:03:15'),(8,'3','80',NULL,'2015-12-13 18:03:15','2015-12-13 18:03:15'),(9,'3','82',NULL,'2015-12-13 18:03:15','2015-12-13 18:03:15');
/*!40000 ALTER TABLE `subjects_per_advert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyid` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_confirmation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_token` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `auto_created` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adverts_credit` int(11) DEFAULT '0',
  `free_adverts_credit` int(11) DEFAULT '0',
  `premium_credit` int(11) DEFAULT '0',
  `stripe_customer_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last4` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exp_month` int(11) DEFAULT NULL,
  `exp_year` int(11) DEFAULT NULL,
  `brand` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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

-- Dump completed on 2015-12-13 18:26:59
