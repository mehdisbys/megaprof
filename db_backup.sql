-- MySQL dump 10.13  Distrib 5.7.10, for osx10.11 (x86_64)
--
-- Host: localhost    Database: megaprof
-- ------------------------------------------------------
-- Server version	5.7.10

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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `presentation` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `experience` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_travel_percentage` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_travel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_5_hours_percentage` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_5_hours` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_10_hours_percentage` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_10_hours` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_webcam_percentage` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_webcam` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_more` text COLLATE utf8_unicode_ci,
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
  `can_receive` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_travel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_webcam` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marketing_video` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `currently_online` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userid_idx` (`user_id`),
  CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adverts`
--

LOCK TABLES `adverts` WRITE;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;
INSERT INTO `adverts` VALUES (49,6,'cours-et-soutien-en-francais-et-lettres-modernes-par-professeur-agrege-de-mathematique','Cours et soutien en Français et Lettres modernes par professeur agrégé de Lettres','Bonjour,\r\nJe suis titulaire de l\'Education Nationale en Lettres Modernes et diplômée d\'un Master 2 en philosophie esthétique. En poste depuis de nombreuses années en collège et lycée, j\'enseigne, pour cette année scolaire, le français à des élèves de 2de générales et 1ère S et L. Depuis deux ans, j\'enseigne également la synthèse littéraire de documents en école de commerce : j\'entraîne mes étudiants de 1ère et 2ème années aux concours Passerelle et Tremplin. Je suis intervenante dans une école de commerce réputée (8ème au classement général selon le magazine Challenges).\r\n\r\nPar ailleurs, ma pédagogie, mon excellente connaissance du programme et des notions s\'y rapportant ainsi que ma maîtrise de la méthodologie répondront à toutes vos attentes.\r\n\r\nEnfin, j\'ai eu la chance d\'avoir de nombreuses classes de différents niveaux au cours de mes expériences éducatives : en effet, par mon expérience de professeur à domicile mais également grâce aux élèves que je suivais les années précédentes aussi bien au collège qu\'au lycée et en école de commerce, il m\'a été donné d\'éprouver un large panel éducatif.\r\nTous mes cours sont assortis de documents et rigoureusement préparés. Je suis à la disposition de mes élèves par mail, webcam et téléphone. Je suis aussi là pour répondre à toutes questions annexes à la scolarité. Entraînement en situation d\'examen ou de concours (Diplôme National du Brevet, oral et écrit de l\'EAF, concours Tremplin et Passerelle) afin de se préparer dans des conditions optimales.\r\nN\'hésitez pas à me demander mes références (Education Nationale, école de commerce et cours particuliers).\r\nEn préparation de mon site (prévu pour mi-janvier 2016) : tarifs avantageux et conditions professionnelles de travail dans un local dédié !','COURS EN INDIVIDUEL :\r\n-- 40 € pour les collégiens,\r\n-- 50 € pour les lycéens,\r\n-- 60 € pour le supérieur.\r\nLe prix de la première heure de cours sera majoré de 5 euros pour un déplacement jusqu\'à 10km, de 10 euros pour un déplacement de plus de 10km.\r\nSi 10 heures sont payées d\'avance, une remise de 5% est appliquée.\r\n\r\nCOURS EN PETITS GROUPES DE TRAVAIL (de 5 à 6 élèves au maximum) :\r\n-- 55 € pour 2 heures (niveau collège).\r\n--100 € pour 4 heures (niveau collège).\r\n-- 75 € pour 2 heures (niveau lycée).\r\n-- 140 € pour 4 heures (niveau lycée).\r\n-- 95 € pour 2 heures (niveau supérieur).\r\n-- 180 € pour 4 heures (niveau supérieur).\r\nLes cours se déroulent dans un local dédié.\r\nSi 10 heures sont payées d\'avance, une remise de 5% est appliquée.\r\n\r\nSTAGES DE 10 HEURES SUR 5 JOURS EN PETITS GROUPES DE TRAVAIL (de 5 à 6 élèves au maximum) :\r\n-- 250 € (niveau collège).\r\n-- 350 € (niveau lycée).\r\n-- 450 € (niveau supérieur).\r\nLes cours se déroulent dans un local dédié.\r\nSi les 10 heures sont payées d\'avance, une remise de 5% est appliquée.','Mon parcours en quelques dates :\r\n2015-2016 : collaboratrice des éditions Le livre scolaire pour la rédaction du manuel scolaire de 3ème.\r\n2014-2016 : En charge des classes de 2de générales et 1ère S et L. Professeur principal et Coordinatrice du français au lycée. Intervenante en école de commerce pour la préparation au concours Passerelle et Tremplin.\r\n2014 : obtention de l\'Agrégation interne de Lettres Modernes.\r\n2013-2014 : Coordinatrice du français au collège.\r\n2007-2013 : Enseignante en lettres modernes et professeur principal. Depuis 2009, correctrice et examinatrice pour le Diplôme National du Brevet et le Baccalauréat.\r\n2006-2007 : Préparation au Capes de Lettres Modernes.\r\n2001-2006 : Etudiante. DEA (actuel Master 2) de philosophie esthétique. Mention Très bien avec félicitations du jury.\r\n2000-2001 : année sabbatique à l\'étranger.\r\n1998-2000 : Hypokhâgne et khâgne a/l au lycée Condorcet (75009).\r\n1998 : Bac littéraire en horaires aménagés au lycée Racine (75008). Mention Bien.',200,'50','250','5','950','10','1800',NULL,NULL,'','','48.8642858','2.37901880000004',10000,'75011','Paris','FR','78 Avenue de la République',NULL,NULL,NULL,'on',NULL,NULL,'2016-01-02 20:33:17',NULL,'2016-01-02 18:40:13','2016-01-02 20:33:17',NULL),(382,6,'laborum-laudantium-ea-quos-numquam-nisi-ea-quibusdam-vel-itaque-quidem-quo-quisquam-id','Arithmétique - Laborum laudantium ea quos numquam nisi ea quibusdam vel itaque quidem quo quisquam id.','Incidunt est aliquam harum numquam ea voluptate occaecati eveniet. Et quis facilis dolores. Et facilis iusto est et officiis est rem. Ut ut quas impedit nemo iste. Placeat cupiditate dolores quia et. Ea cumque qui adipisci in. Est quia id iste autem commodi. Quae eos excepturi voluptatum consectetur. Consectetur quidem dolor vel. Nihil quia rem tempore quidem aliquid quo. Optio omnis a suscipit eos non. Doloribus dolorum non molestiae. Occaecati exercitationem voluptates ut quaerat voluptas repudiandae. Neque officiis nulla incidunt. Voluptas facere beatae magnam quos aut vel laboriosam.','Excepturi adipisci saepe est adipisci voluptatem expedita. Illo id quas recusandae ullam eos nihil et. Quaerat provident officiis harum aut. Voluptate dolore voluptatem aut delectus qui accusamus. Inventore quibusdam fugiat aspernatur qui sequi. Eos tempore voluptatum id sapiente quia enim. Nemo eos deserunt unde. Minima blanditiis voluptatem veritatis numquam nemo. Doloremque est omnis laudantium consequatur quae et. Provident officiis occaecati et.','Culpa recusandae natus earum vitae ipsum non. Culpa sint vel non illo. Earum libero non error eos architecto veniam omnis. Deleniti qui aut quia officiis sint blanditiis. Occaecati consequatur accusamus repudiandae eveniet et. Quis excepturi accusantium sint omnis. Commodi et quis qui molestiae iste facilis. Ut voluptas aut ut. Est neque numquam unde. Eaque non ad accusantium reprehenderit. Eum nulla non excepturi vitae adipisci aut neque aut. Ut est temporibus est repellat in. Dignissimos ipsa rem non blanditiis atque tempore sint. Voluptas nulla ad et soluta error qui. Eaque aut alias nostrum rerum dignissimos ad. Nemo ratione facere iure omnis ut rerum alias saepe. Aliquam provident exercitationem voluptatem pariatur neque molestiae ut. Eos aliquam et ducimus dolor. Quo ut ea quidem tempore delectus et dolores. Error inventore et deleniti autem ut recusandae non.',700,'5','143','4','338','14','2417','10','581','','','31.6343495','-8.0107428',1000,'40000','Marrakech','MA','50 rue sourya',NULL,NULL,'1','1','1',NULL,'1977-10-09 18:13:20',NULL,'1982-02-25 10:24:50','1983-07-07 16:40:49',NULL),(383,6,'dicta-voluptatibus-qui-accusantium-asperiores-aut-dolorum-omnis-voluptates-rerum-quis','Trigonométrie - Dicta voluptatibus qui accusantium asperiores aut dolorum omnis voluptates rerum quis.','Dolor ipsa ullam accusantium optio perspiciatis at et quia. Illo ea asperiores et officia voluptas eum. Qui exercitationem incidunt non voluptatem aspernatur sed iusto quas. Ut ut cum deserunt quia in. Porro illo voluptatem consectetur non voluptas qui. Nisi deleniti est sit. Inventore fugiat maiores incidunt nihil sunt. Est dolorem labore alias laborum dolorem commodi qui. Itaque quod eaque asperiores. Rem culpa est dolor consequatur in rerum quisquam. Minus non aut dolorum sit accusantium id magnam. Inventore voluptas tempora accusamus nam. Tempore incidunt rerum corporis.','Nostrum sit repellendus ut eum id qui earum. Suscipit soluta sit nulla. Magnam voluptas ea molestiae ab distinctio libero. Non doloribus sit quia est consequatur vel. Vel autem nesciunt natus soluta facere. Et occaecati alias et. Ipsa fuga aut rem labore qui. Non quae expedita eius. Voluptas quidem libero ea quaerat enim et. Laborum deserunt qui non eum quod. Voluptas ut aut repudiandae nemo cum. Nobis impedit dolorum possimus nemo. Labore odit qui veritatis non temporibus. Repellat quibusdam sint voluptatem voluptatibus fuga ex. Aut tempora odit officia inventore est consequatur perferendis blanditiis.','Iste consectetur a aut itaque aut. Qui est dolores ipsum praesentium dolores libero aut. Alias quia dolores consequatur et. Magni et deserunt amet suscipit. Beatae alias saepe molestiae magni quisquam. Nostrum voluptatem voluptas dolorem fuga quas asperiores quae. Voluptas quia non aliquam maxime esse cum harum. Dolore alias omnis eum quas tenetur consequatur. Voluptatem aliquam nihil ratione eveniet. Sed ut aut in voluptatem molestiae omnis. Nihil ut eveniet consequatur dolor autem autem voluptatem. Dicta est vel sunt et non. Voluptates maxime quisquam fugit sed velit.',468,'8','97','4','204','16','2140','14','584','','','33.5914950','-7.6012452',1000,'20250','Casablanca','MA','30 boulevard emile zola',NULL,NULL,'0','1','1',NULL,'1975-07-28 08:59:59',NULL,'1981-08-19 19:51:35','1997-06-06 16:29:26',NULL),(384,6,'molestiae-omnis-ut-ut-sequi-minus-ut-perferendis-quis-voluptatem-voluptatibus-ipsum-excepturi-molestiae-accusamus-optio-vitae','Géométrie - Molestiae omnis ut ut sequi minus ut perferendis quis voluptatem voluptatibus ipsum excepturi molestiae accusamus optio vitae.','Autem magnam voluptatum harum aut et ut. Autem repudiandae magnam expedita veniam sit est soluta deleniti. Velit autem necessitatibus magni ipsam et accusantium commodi. Provident labore maxime cumque blanditiis. Dolor quia aut magni sed ut temporibus. Officiis quisquam enim et esse numquam. Quia repellendus est libero. Magnam ut officia harum commodi tempora voluptas rerum. Sint dolor velit dicta sunt. Itaque tenetur earum veritatis eius ad. Nemo sint similique non ut et. Natus magni alias omnis corrupti asperiores aut. Repellat saepe mollitia esse eum ipsum numquam reprehenderit. Eos quibusdam numquam libero doloremque deleniti voluptatem vel. Ratione illum possimus est nihil delectus autem illo. Nostrum et ut ea dolores aperiam. Ut rerum voluptatem nemo perferendis sit est. Repudiandae autem dolores in dolorem illo. Porro debitis perferendis aliquam corrupti dolorem. Quis officiis saepe facere unde distinctio. Voluptas explicabo assumenda inventore quas aperiam.','Deserunt neque in eveniet repellat veniam. Aut fugit vitae qui voluptatibus. Quibusdam molestias rerum quae distinctio eveniet. Molestias enim laborum est voluptas id. Vitae sunt nam et et dolorem. Eligendi laborum sint est quia ut distinctio ab voluptate. Quae nemo magnam nemo accusamus accusantium. Animi labore rem ducimus dolorum autem earum distinctio. Beatae qui placeat non eos tempora. Sed eaque voluptatem saepe.','Sit nulla quo eius incidunt suscipit. Ut quam tenetur nobis maiores sint aspernatur occaecati. Fugiat aperiam et dolor nemo similique. Tempore quaerat veritatis id perspiciatis quia dolores facilis. Magnam eligendi facere ut possimus cum. Molestiae iusto tenetur et illum cupiditate. Ut voluptas quasi fuga iure soluta pariatur. Voluptatem aut sunt facere eum optio culpa. Assumenda laudantium odio facilis explicabo sed sed. At in optio qui voluptatem aut molestiae quae.',154,'6','146','8','350','14','1264','20','301','','','30.4108647','-9.5964080',1000,'80000','Agadir ','MA','20 boulevard du 20 aout',NULL,NULL,'1','1','1',NULL,'1999-08-02 14:07:10',NULL,'1998-09-06 00:13:25','2016-04-06 23:29:31',NULL),(385,6,'autem-quas-amet-eveniet-vel-magni-amet-ut-quis','Trigonométrie - Autem quas amet eveniet vel magni amet ut quis.','Quidem veritatis commodi et. Omnis sed est aut alias excepturi accusantium sit cumque. A perspiciatis placeat facilis beatae similique maiores. Voluptas quia quae ut aut culpa. Distinctio totam fuga recusandae consequatur fugit fuga. Nisi quos tenetur nostrum non. In in minus non et. Est impedit sed nisi veritatis maiores. Laudantium ut quasi non. Repellendus deleniti iste sunt tenetur sed neque omnis consequuntur. Amet quos dolor distinctio nobis expedita cumque. Ullam minus similique ut et vero et. Temporibus aut nihil veniam nam impedit. Qui excepturi doloremque nemo praesentium velit sed. Non aperiam est veritatis autem omnis quo. Consectetur iure provident ut. Cupiditate qui voluptatum aut porro. Sit cum repudiandae alias molestiae alias dolorem a. Illo quo qui magni porro temporibus soluta animi.','Veniam nesciunt corrupti quisquam facilis distinctio. Sapiente cumque omnis in laboriosam voluptatem iste sunt. At asperiores asperiores tempora voluptate. Delectus fugit numquam earum beatae. Voluptas nesciunt est voluptatum omnis doloremque. Rem recusandae harum illo fuga. Excepturi rerum autem consectetur vel. Ea aliquam et laboriosam. Alias labore facilis debitis beatae eius. Qui provident natus consequuntur magni. Consectetur qui magnam ut qui modi voluptatem. Harum et voluptatum ipsa ipsam ad optio. Voluptate pariatur et optio quia architecto. Autem harum similique reiciendis doloremque itaque a. Minima sed porro mollitia iusto neque tenetur dolor. Quas aliquam nobis optio. Iure quo sint officiis similique quas aut. Consectetur corrupti iste qui amet fugiat similique magnam. Repellendus praesentium illum est porro cum omnis provident.','Magni aspernatur amet quis illo accusantium. Quo soluta aut enim facere et beatae est. Incidunt aut deleniti in ducimus. Nisi nemo omnis ea ea et perspiciatis. Aliquam et eaque adipisci rerum possimus. Velit qui repudiandae rem commodi ea aut quo. Consequatur dolorum et officia in alias ipsa. Nisi enim dolore magni porro. Quo et ab voluptatem atque ad eos veniam. Esse at et ex et.',305,'3','136','5','739','12','1473','18','502','','','33.9646175','-6.8938290',1000,'10000','Rabat','MA','20 avenue al madj',NULL,NULL,'1','0','1',NULL,'2004-11-18 12:09:33',NULL,'2011-12-12 04:25:29','1974-05-10 13:00:40',NULL),(386,6,'occaecati-alias-iure-cupiditate-veritatis-autem-perferendis-natus-aut-aut-cumque-non-in','Logique mathématique - Occaecati alias iure cupiditate veritatis autem perferendis natus aut aut cumque non in.','Nemo tenetur aspernatur a non. Corrupti rerum voluptates facere qui repellat et. Dolores occaecati velit quasi ducimus et dolor. Voluptatem vel molestias error voluptas. Ipsam occaecati hic autem. Vel omnis ullam exercitationem quibusdam. Exercitationem recusandae qui quia ut. Consequatur et incidunt blanditiis velit quae dolores earum voluptatem. Veritatis facilis vel magnam nobis aliquam repellendus est culpa. Qui quia labore voluptas consequatur iusto et consequatur. Minima accusamus et aut natus. Nam totam magni dolorum praesentium accusantium et rerum. Porro totam in veritatis vel reiciendis natus. Et architecto qui molestiae voluptatibus qui. Mollitia rerum autem harum maiores nisi quibusdam officiis est. Cumque odit nisi voluptatem qui nihil. Blanditiis tenetur et molestiae qui. Qui quo perferendis mollitia voluptas iure quisquam. Dolorum voluptatem voluptates doloribus qui consequuntur magnam rerum. Necessitatibus ipsam tempora et aperiam. Beatae magni dicta voluptatibus qui perspiciatis neque. Doloribus corrupti et cupiditate quo voluptatibus magni quo sed.','Consequuntur sit pariatur aut voluptas. Ea dolorem accusantium error animi beatae sed corporis. Labore ut quia similique est sint et mollitia. Culpa ut enim provident quaerat delectus. Quo odio earum quos harum eum aut est. Dignissimos saepe ut esse corrupti. Minus saepe nihil autem hic sint ut corrupti. Facilis a itaque et sunt ipsam culpa perferendis. Nobis voluptas et fugit modi. Qui et non sit. Ipsum minima illo autem exercitationem iure possimus nam.','Asperiores sit maiores et explicabo sint consequatur. Cupiditate sapiente aut eligendi et vero. Rem commodi repellendus molestias dignissimos aperiam eveniet exercitationem. Non in doloribus sed et debitis labore. Sint nostrum dignissimos ut sed nisi ab. Voluptas quam et iusto et saepe velit. Magni eum facilis molestiae sit optio. Sint perferendis molestias ullam ut reiciendis rem. Ut nostrum non est. Ipsa distinctio et nesciunt quidem nemo vitae sequi. Ipsum et vero rem recusandae quam doloremque. Nam vero aliquid tenetur porro nobis nulla et. Nostrum rem et occaecati ab atque laborum.',592,'10','93','7','136','20','1928','11','685','','','31.5112891','-9.7697538',1000,'44000','Essaouira','MA','10 avenue du caire',NULL,NULL,'0','0','1',NULL,'2014-01-26 18:40:24',NULL,'1979-08-07 05:46:44','1993-11-28 07:37:47',NULL),(387,6,'ea-dolor-aperiam-provident-perferendis-atque-consequatur-beatae-reprehenderit-et-minus-similique','Trigonométrie - Ea dolor aperiam provident perferendis atque consequatur beatae reprehenderit et minus similique.','Cupiditate totam consequatur rerum doloribus soluta temporibus. Autem qui voluptates voluptas voluptates ullam repellat. Explicabo earum et ut tempora delectus ipsa quo. Saepe id qui tempora neque ratione. Fuga animi possimus autem et ullam ad. Ratione aut vel non et saepe ut. Exercitationem totam sapiente blanditiis laboriosam labore cumque suscipit quia. Repellat odio aperiam aliquam ex voluptas id. Vero ducimus voluptates nobis ea ipsam eveniet. Qui sapiente omnis mollitia et officia quae et. Voluptatibus quos sequi nisi eum aut ipsa officia. Vitae et incidunt explicabo omnis molestias. Voluptatem maiores eaque et aut exercitationem deleniti totam ut. Praesentium delectus mollitia laudantium quae qui sequi.','Aut earum quis non est labore deserunt. Autem ex aut eos quia ipsum aut. Ullam accusamus dignissimos ad ea reiciendis voluptatem. Ut et dolores expedita quaerat quod. Tempora consectetur nihil dignissimos consequatur consequatur ab nisi facere. Rerum atque cupiditate saepe corrupti nihil corporis. Repellat consequuntur sint ducimus qui quia quod sit sequi. Itaque labore rem et ut tempora vel. Ex atque quae consectetur perspiciatis distinctio commodi. Est qui doloremque rem dolor ut porro. Incidunt velit incidunt vel maxime aliquid. Facilis qui cum velit ut non reiciendis quam. Nobis odio vel minus excepturi nesciunt. Labore dolores consequuntur quisquam eveniet sed dicta. Blanditiis nemo est aut animi quas labore officia.','Mollitia repellat consectetur quae nostrum aliquid cum et aliquid. Velit esse quo quia voluptatem quibusdam libero quia nam. Ipsum distinctio iure optio rerum. Corrupti harum animi dolores cum. Quia qui delectus voluptatem consequatur. Et reiciendis dolor fugit et eligendi natus sit. Quod perspiciatis nesciunt adipisci aperiam. Placeat in quasi enim labore. Nihil dolorem quaerat nulla reprehenderit quae rerum temporibus dicta. Odit culpa harum commodi quia quas ea laudantium.',539,'7','140','0','186','12','1381','13','681','','','33.8924092','-5.5333516',1000,'50000','Meknès','MA','10 boulevard essaadiyine',NULL,NULL,'1','0','1',NULL,'1985-07-16 20:37:22',NULL,'2013-10-31 22:42:33','2002-12-21 20:49:54',NULL),(388,6,'expedita-quos-qui-rem-non-ab-libero-qui-ea-nemo-magni-debitis-voluptates-voluptatem','Logique mathématique - Expedita quos qui rem non ab libero qui ea nemo magni debitis voluptates voluptatem.','Quaerat optio incidunt fugit. Dicta eligendi eos libero. Illo eius est adipisci porro similique tempore omnis. Reiciendis rem nihil et non aperiam. Et ut eum ex et aliquid natus sit. Odit ut veritatis iure reprehenderit molestiae sed. Consequuntur quos dolor aperiam quo. Sunt quia pariatur fugit sint qui. Laudantium consectetur reiciendis unde dolor numquam praesentium non et. Ipsum sint quo veniam incidunt. Repudiandae et accusamus atque tenetur. Nihil atque magnam aliquid pariatur. Aliquam perferendis aut culpa dolorem. Consequuntur cupiditate qui ut dolore repellendus voluptates laboriosam. Aliquam earum iste facere nisi. Voluptatum velit eos quae incidunt. Doloremque molestias est sit nihil animi minima.','In et excepturi aut nulla consequatur iure. Natus et dolorum aliquam fugit. Adipisci eos est sit in. Eius iusto optio cumque. Accusantium rerum ex dolore veniam reprehenderit et sint. In saepe eligendi ut recusandae voluptas vero quam. Quia asperiores ut vero voluptate eos sit. Officia soluta beatae fugiat ut voluptates et at. Perspiciatis sed et quaerat debitis. Assumenda sed magnam id aspernatur aut rem. Rem et quisquam cum iure. Voluptates ex dolorum est voluptates eius modi similique. Et maxime architecto excepturi. Facere tempora tempora nostrum quaerat laudantium aut. Adipisci quisquam nemo ipsum eius ullam exercitationem est. Fuga amet cumque voluptas quidem id. Voluptatem ut veniam corrupti. Est delectus autem omnis voluptas.','Ex nisi molestias sed et earum expedita. Quaerat voluptatem quisquam iure doloremque distinctio nulla quae. Est quis architecto doloribus ut et repellat unde dolores. Sit sit iusto quaerat. Dolorum et sed porro adipisci eos eaque incidunt. Commodi aut et reiciendis voluptas reprehenderit facere in blanditiis. Eligendi porro et voluptatum culpa adipisci quibusdam. Quia quia culpa incidunt ut harum. Est voluptatem molestiae ut sed omnis. Quia omnis cupiditate quia odit eos est iusto qui. Qui aspernatur facere est qui quia. Voluptatum repellat corrupti provident. Voluptatum commodi ut voluptatum placeat esse. Quae non et autem sunt soluta. Ea voluptate id ad qui impedit veritatis. Qui totam nesciunt ut accusamus. Consequatur consectetur inventore accusamus itaque odio excepturi voluptatum quo.',607,'9','136','7','123','10','2173','10','442','','','34.0219933','-5.0115126',1000,'30000','Fès','MA','15 Avenue Iben Athir',NULL,NULL,'1','1','0',NULL,'1980-08-08 05:28:51',NULL,'1996-07-21 03:51:26','1989-01-01 20:49:00',NULL),(389,6,'optio-natus-et-officia-aliquid-voluptatem-quo-autem-nulla-sint','Géométrie - Optio natus et officia aliquid voluptatem quo autem nulla sint.','Odio aut commodi magni voluptatibus dolores corrupti. Voluptatem beatae id tempore expedita dolor. Sunt et aliquid aliquam non minima a vero fugiat. Omnis dolores rerum tempora. Aut nobis consequatur libero qui dicta ipsam saepe consequatur. Quod sunt molestiae et similique. Sed voluptatem quisquam qui ea occaecati debitis id. Quam reiciendis vel culpa consequatur animi aspernatur. Atque ut maxime dolorem velit commodi et. Distinctio doloremque voluptate consequatur. Amet ut voluptatem voluptatum nulla et repellat. Iure ut omnis saepe nam. Iste exercitationem quibusdam tempore illo. Aliquam esse reprehenderit et sint doloremque debitis illum.','Similique fuga veritatis quos at dicta omnis. Quidem et quam explicabo quidem voluptatem fuga. Est qui ea autem quia porro. Alias provident sint inventore qui sequi sit quisquam ipsam. Et ut repudiandae veniam voluptatem enim harum ullam. Quasi rem voluptatem et ea error. Et non minima natus voluptatem ratione. Omnis in ut aspernatur et. Laudantium quasi voluptatem nulla eligendi. Esse quae vel ex labore enim ab incidunt. Ea eos non quo amet. Recusandae placeat sit et voluptatem doloribus. Quae minima eaque est ut eum. Et quam hic adipisci et totam nihil velit expedita. Facere libero rerum fugiat voluptate quae ipsa. Illum sit eveniet qui ab animi. Recusandae autem eaque repellendus in ducimus eos. Quo exercitationem quaerat aliquid earum ut. Necessitatibus inventore nostrum sed est. Dignissimos earum quasi sit eius possimus ad enim. Velit ut non qui necessitatibus recusandae repudiandae.','Dolor sapiente sint aut distinctio nostrum dolor. Debitis enim iure consequatur quod et illo. Eius reprehenderit et id facilis ea ut eligendi. Repellendus voluptatem est veniam voluptates ut. Aliquid molestiae voluptatem ipsum incidunt nihil quia totam est. Mollitia quam similique porro velit ut ratione explicabo. Ut eos eius ratione officiis. Ut suscipit numquam sed ab dolor sed eligendi. Rem doloribus hic vel consequatur maiores deserunt pariatur. Quia reprehenderit pariatur quis beatae molestiae ratione. Ipsum nisi veritatis reiciendis reiciendis.',512,'7','144','6','681','18','1126','19','636','','','35.7721730','-5.8300080',1000,'90000','Tanger','MA','25 Avenue Moulay Rachid',NULL,NULL,'0','0','0',NULL,'2008-04-23 15:56:09',NULL,'1983-11-27 20:30:11','2002-06-29 03:27:27',NULL),(390,6,'modi-fugit-distinctio-blanditiis-vel-suscipit-enim-illo-soluta-laboriosam-temporibus-et-et-doloremque-dolores-suscipit-hic','Géométrie - Modi fugit distinctio blanditiis vel suscipit enim illo soluta laboriosam temporibus et et doloremque dolores suscipit hic.','Enim molestiae minima illum minima doloribus repellendus. Nihil qui rem quis non velit. Praesentium ipsam eligendi ipsa suscipit. Esse quia repellendus et esse quia. Facilis nobis ut at quia soluta nihil facilis ea. Explicabo velit qui aut sint sint quisquam non. Facere tempora est et illo minus. Eaque ut ut numquam. Veniam facere aut aut laborum est deserunt inventore. Velit voluptas in quo iste architecto. Est veniam error beatae minima impedit perspiciatis fugit. Non error pariatur et magnam similique nulla esse. Molestias repellat tenetur occaecati officia possimus accusantium minima. Dolore modi esse totam dicta ut. Eos exercitationem minima dolorem dolorum incidunt suscipit quia. Totam quia ipsum sint minima omnis a. Repudiandae iure occaecati reiciendis repudiandae magni. Quae deleniti perspiciatis quos consequatur explicabo accusamus. Ut possimus vel cum architecto vero id.','Similique labore magnam laudantium aperiam eaque. Quisquam beatae architecto dolor in. Aut et quas eius aliquid. Voluptatibus ex perspiciatis quia quia laborum quidem sunt alias. Ducimus id sit vitae necessitatibus. Aut libero dolor velit. Dolor voluptatibus occaecati quae neque nulla. Quod voluptatem ad est voluptate quaerat. Similique corrupti a quisquam maiores perferendis. Recusandae eius non quisquam accusamus. Quo et et sunt sint dolor velit. Exercitationem ut praesentium perferendis magnam eligendi illo impedit. Quas quia itaque quo sed qui et voluptas non. Quisquam enim expedita ab qui commodi. Id doloremque consequatur rerum. Debitis maiores sed consequatur itaque nobis. Dicta velit molestiae autem id sed minus.','Qui cupiditate voluptatibus qui id dolorum quia. Temporibus vel consequatur possimus sunt quidem saepe odit. Laborum tempora magni qui autem eaque voluptas placeat. Accusamus quia adipisci ex qui excepturi voluptatem quas inventore. Natus est voluptatibus ut animi dolores. Culpa quaerat ea ea labore molestiae. Fugiat voluptate explicabo sint aliquam magni consectetur est soluta. Eligendi rerum soluta nam. Ad minus ea placeat alias vero quos nihil voluptatum. Temporibus inventore sint aut iusto dignissimos maiores omnis. Vero repudiandae sint et voluptatem. Voluptas ad ipsum iure quia eius est. Eos minus sint dolor deleniti laudantium et. Qui et fugiat magni quasi. Sed repellendus voluptas ullam ipsam quia molestiae.',272,'0','100','1','508','15','1371','11','317','','','30.9320099','-6.9005277',1000,'45000','Ouarzazate','MA','30 Avenue Moulay Abdellah',NULL,NULL,'1','1','1',NULL,'2011-09-11 15:50:30',NULL,'1991-07-30 14:23:02','2004-09-26 14:33:51',NULL),(391,6,'vitae-ad-eos-dignissimos-et-quis-at-ut-sunt-ratione-fugiat-reiciendis-aperiam-autem-aliquam','Écologie - Vitae ad eos dignissimos et quis at ut sunt ratione fugiat reiciendis aperiam autem aliquam.','Corrupti qui minima quidem. Et tenetur minima repudiandae aut. Accusantium enim laboriosam expedita dolores. Ut blanditiis sed dicta tempore dignissimos beatae tempora rerum. Omnis voluptates odio voluptas. Aut quod tenetur error doloremque alias. Quasi nihil nostrum quis nobis. Voluptate saepe et accusamus doloribus voluptatibus vitae labore. Minima itaque rerum perferendis earum. Minima culpa consequuntur ad sed asperiores. Est est fugit ab autem velit. Aut eligendi minus odit dolorem. Eligendi necessitatibus beatae modi nulla.','Modi doloribus atque possimus aut. Molestiae ut reprehenderit sit unde consectetur. Velit nihil dolorem consequatur officia. Ducimus sapiente aperiam reiciendis maxime est earum consectetur sapiente. Sint sit voluptatem asperiores aut. Omnis aliquam impedit ut consequuntur ut. Tempore ut maxime consequatur dignissimos reiciendis odit quis. Officiis numquam voluptatem nesciunt aut. Illo ut id dolor nisi omnis ab. Et autem eligendi ut natus doloribus. Sit illo laudantium iure voluptate animi dolorem. Cumque impedit magnam enim qui voluptatem eius. Commodi quis consequuntur non consequuntur. Mollitia qui ut earum perferendis repellendus dolor dolores. Hic omnis soluta omnis sed minima doloribus perferendis. Aut necessitatibus qui quia magni.','Labore dolor autem reiciendis corrupti at voluptas sed rerum. Temporibus quisquam aspernatur ut sapiente sapiente. Possimus non id ea et doloremque ut. Voluptas qui facere minus repellendus necessitatibus. Aut autem iste deleniti voluptates distinctio nesciunt. Atque impedit illo et repudiandae possimus at dolorum. Est nisi dolorem dicta tempore aut at. Minima et quasi sequi ab alias iusto eius. Inventore odio iusto dolorem fugiat odit. Voluptatem eos repellendus quae animi distinctio. Facilis aut et commodi exercitationem voluptate quis. Ad excepturi repudiandae enim tempore. Quia dolor et eveniet expedita possimus consequatur. Quisquam sit ratione placeat sit quod nemo. Omnis qui sequi cum quasi. Hic aliquam porro facilis et deserunt nihil. Nobis facilis ipsum aut perferendis in aut et voluptatem. Ducimus sunt ratione quod quae dolor adipisci. Optio excepturi pariatur sapiente. Aut et nulla atque eveniet non.',400,'10','92','0','506','12','2500','15','507','','','34.6829989','-1.8827802',1000,'60000','Oujda','MA','35 Boulevard Allal Al Fassi',NULL,NULL,'0','0','1',NULL,'2003-01-05 10:22:57',NULL,'1982-12-12 20:23:30','2001-04-09 02:07:36',NULL),(392,6,'cupiditate-quidem-error-molestias-ad-asperiores-nihil-quidem-suscipit-iste-ut-quo-modi-incidunt-commodi-rem-nostrum','Écologie - Cupiditate quidem error molestias ad asperiores nihil quidem suscipit iste ut quo modi incidunt commodi rem nostrum.','Rerum facilis accusantium occaecati. Et ut sed maxime sint. Provident consequuntur omnis sed. Quibusdam fugiat placeat repellat accusantium. Ratione rerum quae et voluptatem blanditiis doloribus. Ipsa veniam voluptates laboriosam rerum culpa unde et. Atque aperiam hic nesciunt reprehenderit velit. Voluptatum aliquid labore tempore et. Ipsa ut ea eaque mollitia fugiat et. Voluptatem earum sit blanditiis nemo libero alias sequi animi. Cum temporibus facilis explicabo voluptatum earum.','Perferendis molestiae necessitatibus aliquid voluptas ut qui. Occaecati ut deserunt dolores similique enim aliquid. Voluptatibus qui dolorem culpa qui laboriosam nemo cupiditate voluptatibus. Eos ut vero ut consequuntur. Nihil vero et ut aut quisquam. Amet nihil ullam voluptas aliquid sed libero eum doloremque. Ab ut quis exercitationem repudiandae est. Aut quasi sed cupiditate unde minima accusamus. Exercitationem aliquam aspernatur quis amet eveniet consequatur et. Nisi libero explicabo quia rerum. Quos optio aperiam dolores. Eaque eligendi nihil sit voluptas quis repellat. Quaerat ipsum error voluptate non pariatur nobis cupiditate dolorem. Veniam quae et natus. Accusamus autem distinctio in eos debitis in. Vitae corrupti commodi et ea. Molestiae commodi et vel omnis. Harum hic vitae dolorem cum asperiores. Enim nihil odit commodi sint. Nihil et optio ex et neque est officiis deserunt.','Voluptate distinctio accusantium est dolores qui qui libero voluptas. Et sed ut non totam officia. Suscipit dignissimos natus quis et excepturi sed. Harum non velit officia voluptatem et voluptatem ut. Maxime rerum iure et porro fuga adipisci. Eveniet ratione voluptatem placeat eum. Fuga consequatur odit natus veritatis. Maiores at perspiciatis quibusdam minus accusamus ut. Illum facilis excepturi non molestiae placeat ut amet eligendi. Minima sunt voluptatem et omnis provident. Consequatur quis nam modi reiciendis. Qui iste qui quia est perferendis recusandae. Consequuntur sed tenetur rerum et sint. Et in qui consequatur in nesciunt neque ipsa. Hic ad blanditiis non commodi porro tenetur. Incidunt aut in provident sint ab quis animi sed. Praesentium quas eum ea ut illo et non. Esse molestiae et delectus beatae error. Numquam voluptas aspernatur minus aut. Repellendus est eius hic sed quo.',145,'9','93','1','540','11','1301','20','577','','','35.1701412','-5.2676925',1000,'91000','chefchaouen','MA','40 Av. Moulay Abdelsalam',NULL,NULL,'0','0','1',NULL,'1981-06-13 12:52:21',NULL,'1987-10-26 21:37:06','1983-05-11 00:32:41',NULL),(393,6,'reprehenderit-voluptas-praesentium-debitis-asperiores-asperiores-fuga-et-rem-qui','Logique mathématique - Reprehenderit voluptas praesentium debitis asperiores asperiores fuga et rem qui.','Distinctio est reprehenderit omnis accusantium. Tempore eos explicabo autem impedit. Quaerat iure reprehenderit sit quis distinctio. Nemo dolor molestias et a. Doloribus molestiae ea est aut. Unde modi assumenda delectus ad molestiae unde. Optio libero velit eos facere necessitatibus molestiae. Et qui ex et magni facilis ut. Maiores voluptatem et veniam vitae. Accusamus magni in animi maiores. Debitis corrupti perferendis recusandae aliquid labore vitae. Nulla dolores qui minima. Natus saepe repellendus neque distinctio autem. Non est magnam facilis quos. Quos officiis aut dolor numquam eveniet sequi.','Harum quo eveniet dicta at ea. Cupiditate aut possimus est cum veniam neque. Qui ut voluptas itaque. Beatae perspiciatis voluptas vitae officiis. Quisquam explicabo ipsam cupiditate culpa illum voluptate. Dignissimos et nostrum aspernatur. Quia eligendi quam aspernatur enim reprehenderit. Velit quae dolores facilis. Qui necessitatibus non quo aut. Laboriosam necessitatibus esse neque cumque quis saepe quae dicta. Voluptatem quia quia autem ducimus rerum voluptas. Dolores dolores doloribus dolore at. Nobis quis numquam deleniti consequatur sint libero vel cumque. Pariatur illo sed quia aspernatur aliquam totam vel. Aliquid quia aut eveniet tempore.','Perspiciatis quisquam eum earum ut est quia. Nemo aliquid et quas asperiores quo. Vel dolorem itaque repellat occaecati natus repudiandae. Et beatae nobis in quasi blanditiis dolor facilis voluptatum. Aut neque amet facilis consequatur aut. Reiciendis voluptatem recusandae molestiae unde. Natus nisi provident aut molestiae nam sint molestiae. Accusamus distinctio maxime sunt accusantium tempore nesciunt qui. Dignissimos ut facilis in repellat voluptatum eveniet numquam. Quas animi eveniet laborum animi dolores occaecati tempora. Ut aut ipsa doloremque qui. Non reiciendis accusantium blanditiis ab tempora. Est ea voluptatem porro aliquid. Rerum sed iste minus et. Earum rerum aut necessitatibus enim quia tenetur quibusdam doloribus. Dolor et iste harum recusandae qui. Est et totam quia cum. Cumque repellat ipsa aut possimus corrupti porro rerum. Ut sint expedita ad inventore reiciendis quis. Temporibus nulla in illum laborum consequatur.',691,'0','92','9','673','12','2253','14','655','','','33.6813852','-7.3765308',1000,'20650','mohammédia','MA','50 Boulevard d\'Oran',NULL,NULL,'0','1','0',NULL,'1994-10-24 13:55:12',NULL,'1996-06-06 15:30:16','1999-07-01 08:48:54',NULL),(394,6,'eligendi-atque-et-magni-eos-nisi-omnis-nemo-quas-fugiat-sed-nihil-quam-odio-sed-id','Logique mathématique - Eligendi atque et magni eos nisi omnis nemo quas fugiat sed nihil quam odio sed id.','Nam expedita esse aut neque. Iste cumque dolores ipsa est. Cum dicta laborum sequi possimus ea sapiente. Veritatis id ipsam ex consequuntur error id molestiae voluptas. Fugiat esse maiores voluptatem eos. Tempora et delectus dolor accusantium autem nam animi. Voluptatem repellat ad consectetur illo vel distinctio enim. Hic ut quam aut molestias doloremque. Qui nulla illo est assumenda est. Vel autem rerum repudiandae adipisci. Nulla ut non quo tempora nesciunt. Animi ipsa atque consequatur nulla sit. Qui dolores totam totam. At excepturi doloribus autem voluptate tempora. Ea velit voluptate dignissimos assumenda velit. Aut rerum voluptas praesentium. Et pariatur et quisquam non iure quia. Iste voluptates ex occaecati deserunt. Hic eos saepe ut sit omnis velit.','Architecto hic in in nihil officiis. Accusamus ullam quaerat sapiente non libero. Dolorum cumque aut in quis tempore. Consequatur modi eum enim. Quia inventore iure ducimus ut consectetur. Sunt porro consequatur voluptatem sint aperiam. Voluptatibus incidunt et possimus et soluta consequatur autem. Id ea animi sed. Repellendus rem omnis explicabo et. Commodi laboriosam minus voluptatem sint dolorem excepturi rerum. Mollitia repellendus sint est ea. Id expedita aut rerum modi.','Recusandae harum ut officiis quibusdam. Harum mollitia rem nulla magnam sint aut illum. Et veritatis soluta esse earum non dolores doloribus deleniti. Repellendus minima magni praesentium et. Quo ex similique corporis qui aspernatur saepe id. Est eos fuga aut eaque eveniet quo reiciendis. Quidem itaque officia mollitia. Et cupiditate asperiores eligendi voluptatem quasi ea. Aut quae natus aut. Laborum sint non sed soluta magnam.',599,'3','129','3','145','19','1048','10','668','','','33.5724320','-7.5973439',1000,'20250','Casablanca','MA','60 Boulevard Mohammed VI',NULL,NULL,'0','1','1',NULL,'1994-06-21 09:31:45',NULL,'1995-11-11 17:29:12','1984-04-15 05:24:31',NULL),(395,6,'omnis-consequatur-itaque-autem-dolor-adipisci-dignissimos-voluptates-similique-praesentium-sit','Trigonométrie - Omnis consequatur itaque autem dolor adipisci dignissimos voluptates similique praesentium sit.','Qui sapiente nam dicta sed aut quisquam. Dignissimos omnis nulla ipsa exercitationem rem non. Eligendi quis ducimus error qui architecto aspernatur est. Aut iure et architecto consequatur consequatur repellendus. Et perferendis quis nisi ex. Officia velit qui beatae. Rerum commodi enim dolore rerum fugiat. Est eum cumque blanditiis suscipit temporibus reprehenderit. Accusamus placeat tenetur et ea illo. Voluptatem at numquam molestiae eveniet voluptatibus illo amet. Natus omnis dolorem qui necessitatibus laudantium sit molestiae. Reiciendis animi autem consequatur perspiciatis quis. At eveniet earum velit eos ea. Possimus non sunt illo consectetur. Quis eum maxime et sint et. Similique mollitia qui dolor maxime enim. Id corrupti laudantium modi inventore perspiciatis. Aperiam officiis eos sit sit. Temporibus in fugiat ex qui quod labore blanditiis.','Quibusdam dolorum quia et quae unde. Et et voluptatem qui reiciendis iure dolorem. Dicta assumenda temporibus non at consequatur magnam aut distinctio. Beatae autem velit iste. Animi molestiae placeat nulla reprehenderit error perferendis dignissimos. Voluptatum mollitia dolores est voluptatem est facilis adipisci quisquam. Hic est iste doloribus nisi delectus. Exercitationem ut et quo similique dicta eum repellat. Rerum odit fugiat quaerat deserunt eaque. Velit voluptas et asperiores facere. Quia neque aliquam labore quidem dolor sapiente illum sequi. Et nulla dolore iusto qui facilis ab. Deserunt quia vel odit et odit placeat. Sit debitis consequatur temporibus illo quia quis velit.','Harum possimus esse atque amet quibusdam molestiae. Qui totam dolorem nihil nihil ut modi. Ut veritatis quia fugiat et. Expedita dicta molestias nemo sit. Sit omnis neque deleniti neque. Fugiat commodi ipsam repellat et velit qui. Natus nisi non natus in veritatis. Aliquid aspernatur eos laudantium fuga possimus. Et repudiandae tempora dolore sequi dignissimos. Non inventore voluptatibus quia.',149,'1','124','0','370','14','1330','18','384','','','31.5936190','-8.0301570',1000,'40000','Marrakech','MA','70 Avenue Guemassa',NULL,NULL,'0','0','0',NULL,'1982-10-17 20:06:56',NULL,'1992-05-10 17:50:52','1990-01-18 04:39:57',NULL),(396,6,'laboriosam-voluptas-aut-tempore-similique-amet-non-dolore-tempora-neque-pariatur-quas-fuga-enim-facere','Écologie - Laboriosam voluptas aut tempore similique amet non dolore tempora neque pariatur quas fuga enim facere.','Fugiat perspiciatis occaecati maxime rerum ea quos. Id et dolorum dolorum. Omnis neque ut repudiandae voluptas. Sed et voluptatem ea ipsam at. Voluptatem aliquam esse dolores. Necessitatibus veniam fuga dignissimos assumenda amet. Dolorem optio aperiam sed quia non itaque. At enim voluptatem alias perspiciatis explicabo minima. Molestiae aspernatur nisi odit facere distinctio. Nam eos aliquid dolorem natus. Omnis quisquam libero numquam veniam. Nostrum eveniet id rem eum. Dignissimos molestiae iusto dolore dicta sed. Excepturi sunt dolores maxime aut. Eos similique ratione nemo et. Non consequatur quas saepe necessitatibus. Necessitatibus reprehenderit ipsa alias dolores possimus nostrum quos. Earum ut itaque ut. Rem amet beatae consequuntur reiciendis et. Quos sit laborum natus sed dolore. Ab et modi animi et.','Voluptate dolorum laudantium aut cum. Aut quia similique similique laboriosam minus quisquam. Placeat sed quasi fuga nisi incidunt earum nulla. Et voluptas aliquam aut sit. Culpa ab qui qui qui et voluptas. Dignissimos possimus exercitationem cumque ut. Et alias et qui vel et expedita. Nihil molestiae numquam sequi velit sequi aut. Sunt velit sed numquam pariatur voluptatem rem. In perferendis quasi omnis nemo. Facilis vero ad natus itaque quis. Quis dolorem excepturi quis itaque cum. Earum praesentium non reprehenderit est et cum reprehenderit. Aperiam assumenda recusandae voluptas qui at porro provident. Possimus aut dolor delectus. Aperiam qui placeat vitae qui. Ipsa molestiae amet numquam maxime voluptatem repellendus aut. Sapiente recusandae pariatur tempora. Amet et odio sed voluptate cumque occaecati vel.','Maxime tenetur odio eaque dolores omnis sapiente sit repellendus. Et commodi laudantium omnis asperiores asperiores autem incidunt. Ipsam eveniet in non voluptates. Est autem porro qui voluptatem mollitia omnis. In corrupti magni repellendus est quam veritatis. Pariatur asperiores nihil dolores dolor saepe voluptatibus suscipit. Soluta in at et soluta doloribus. Aut numquam sapiente delectus culpa doloremque qui eos. Voluptatibus totam sunt sequi iste. Dolorem nobis temporibus iusto sed molestiae. Quae ut similique animi omnis. Quis qui qui ea molestiae facilis a quam. Quidem enim quibusdam illum ducimus et hic voluptatem. Et aut laboriosam voluptatem.',503,'1','139','4','667','17','1144','14','553','','','33.9922331','-6.8460765',1000,'10000','Rabat','MA','20 Avenue des Nations Unies',NULL,NULL,'0','0','1',NULL,'1986-08-14 12:08:13',NULL,'2008-07-15 17:32:53','1982-04-27 19:58:45',NULL),(397,6,'delectus-fuga-ducimus-quaerat-nihil-quis-molestiae-sit-eius','Arithmétique - Delectus fuga ducimus quaerat nihil quis molestiae sit eius.','Excepturi sapiente nostrum quia consequatur ad qui. Fugit a nam quae similique labore. Architecto quo quia aut. Ab cumque explicabo dignissimos voluptas dolor cum quo. In earum id ut molestiae magni dignissimos. Nulla et dolorem ut quia dolore eos sunt culpa. Qui laborum ullam hic fuga quas. Impedit nam quasi dolore dolor ipsum temporibus. Officia id consequatur cumque officia aperiam. Quisquam minus explicabo facilis quos. Ad praesentium et aperiam consequatur. Consequatur quos recusandae accusantium quia numquam dolorum dolorum. Incidunt illo enim sint eveniet sint repellat nulla. Temporibus placeat debitis cumque dolores. Praesentium inventore culpa dolores est ipsam dolorum. Dolorem doloribus vel qui placeat id accusantium quidem. Amet officia non est voluptatem et.','Eum voluptatem itaque doloremque animi dolore vitae est. Quas ut exercitationem nemo. Illo magnam voluptate exercitationem vero facilis vel. Illo qui labore ducimus ea nihil ut assumenda. Rem quia sit sit aliquid rerum vitae odio. Dolorem tenetur dolorum quod. Voluptatem adipisci necessitatibus officiis fugiat praesentium culpa reiciendis consequatur. Eum aut voluptatem soluta sint velit quis. Aspernatur eum voluptatibus ex aut vel. Quis non odio necessitatibus quo voluptates. Quod quae possimus deserunt aut omnis nobis. In autem doloremque illo velit eum non error. Beatae nulla numquam odio quia dignissimos delectus. Qui qui veritatis occaecati repellat quis laudantium. Eaque ea rerum hic voluptate error. Facilis voluptatum dolores qui non earum ipsa aut ut. Qui corporis reiciendis exercitationem fugit explicabo odit deserunt. Quas sit distinctio deleniti. Amet labore est mollitia sed ut vel in. Autem autem nulla et.','Accusantium maiores officiis exercitationem aut architecto ut. Sed corporis mollitia non officia. Modi neque reiciendis autem laudantium inventore nihil assumenda. Itaque similique laudantium sunt asperiores. Quibusdam omnis autem in maiores quia tempora. Animi sit sed voluptates qui. Et id occaecati quae minus laudantium voluptas quo. Dicta possimus incidunt tempore maiores consequatur corrupti ut repellat. Itaque dolorum maiores nihil fugit rerum. Sint consequatur aut voluptas quia dignissimos provident non iste. Earum ipsa quia possimus ducimus nobis magnam. Eius aliquid consequuntur et nostrum dicta.',343,'1','105','9','649','14','1278','18','493','','','30.4179615','-9.5761529',1000,'80000','Agadir ','MA','75 Avenue Kadi Ayad',NULL,NULL,'1','0','1',NULL,'1978-02-27 04:17:58',NULL,'1980-05-21 12:48:27','1997-12-21 01:20:28',NULL),(398,6,'harum-suscipit-veniam-autem-id-illum-vel-quis-quia-dolor-est-qui','Trigonométrie - Harum suscipit veniam autem id illum vel quis quia dolor est qui.','Sunt culpa et accusamus ut et fugiat magnam et. Veritatis unde voluptatibus autem vel. Quo aut aut ea iste voluptatem. Et fugiat quo eligendi dolores ipsam consequatur. Non dolor aut vel amet quisquam omnis voluptas. Aperiam vero in porro nihil quis quia deleniti. Nihil dolorem unde dignissimos quam autem. Incidunt aut aut non earum et ut ducimus. Quibusdam voluptatibus voluptatem alias maxime voluptas incidunt. Non esse ab unde dignissimos et vero.','Molestiae quo dicta incidunt doloribus inventore commodi voluptas iusto. Sunt qui fugit quis aperiam qui ut eum id. Sit et natus sed animi ut expedita inventore et. Iusto reiciendis ad voluptatibus. Minus aut voluptatum iste. Et qui deleniti ut fugiat iste optio ipsum qui. Ut sint impedit quibusdam perspiciatis veritatis accusantium qui. Molestiae aperiam labore ullam ut. Et itaque voluptas vitae veritatis nihil et facere. Cumque delectus est ut iste ex. Quasi mollitia ipsum repellendus consequatur eos facilis voluptas. Dolor nulla quia sunt officia sint voluptatem. Esse quo veritatis soluta. Nam voluptatum molestias assumenda. Velit ea sed rerum. Et repellendus excepturi maxime ex cupiditate sed inventore.','At officiis mollitia nihil nobis. Nisi sed dolores rerum et odio ipsam consectetur id. Sed est similique suscipit suscipit. Aut doloribus consequatur dolor laudantium. A occaecati inventore tempora nobis. Culpa ut occaecati culpa nostrum. Illum et praesentium tempore et autem rerum. Aperiam recusandae officia ipsum. Nisi odit animi maxime illum quis eum omnis. Sapiente quasi odit nobis. Exercitationem commodi et nesciunt veniam. Quisquam ipsa dolor est repellat similique aliquam eveniet. Ad earum laudantium ad necessitatibus corrupti. Laudantium ad sed commodi maiores. Non sint et expedita rem soluta.',739,'8','106','10','268','13','2216','19','471','','','35.7755361','-5.8003769',1000,'90000','Tanger','MA','45 Avenue Mohammed V',NULL,NULL,'1','0','1',NULL,'2000-05-15 00:46:28',NULL,'1979-11-12 12:12:39','1986-04-20 17:11:50',NULL),(399,6,'et-eum-qui-sit-adipisci-ad-doloremque-voluptate-quis-veritatis-autem-suscipit','Géométrie - Et eum qui sit adipisci ad doloremque voluptate quis veritatis autem suscipit.','Doloribus corrupti voluptatibus explicabo vero cum magni repellat. Optio libero magni dolorum qui id quidem. Architecto aut fuga perferendis nihil magnam porro. Rerum asperiores quasi neque reiciendis sed maiores similique. Molestiae molestiae in omnis totam suscipit quidem. Alias asperiores cumque aliquid velit. Voluptatibus repudiandae ea tempora numquam numquam blanditiis. Porro eveniet sit voluptate atque. Voluptatibus veritatis deserunt commodi laborum. Et tempora in vel. Dignissimos voluptatem ut sint quia amet rerum totam voluptatem. Laborum saepe omnis doloribus est animi. Quia ut fugiat repellat quidem aspernatur.','Eum quia error possimus dolore numquam nemo. Qui corrupti voluptatem rem odio qui nihil ex. Quia cumque voluptatem et ipsam quasi est repudiandae. Omnis asperiores sapiente quia enim. Impedit aut nesciunt fuga provident. Et necessitatibus deserunt qui sed est quia distinctio dicta. Et et nam perspiciatis nihil expedita ipsum consectetur. Et culpa deleniti fugiat dolor et. Adipisci facere aut ullam et. Doloribus qui sint ut. Hic exercitationem numquam aut provident sequi nesciunt ipsam. Voluptate eum assumenda reiciendis omnis. Saepe dicta eos ut rerum quidem. Earum esse saepe optio sed. Necessitatibus dolorem eveniet alias soluta ipsum. Nesciunt incidunt et aut harum et consequatur voluptatem doloremque.','Eum architecto labore rem sed et sed autem aliquid. Eos voluptas occaecati dolores. Cumque impedit ipsa exercitationem minus. Quis ut veritatis blanditiis eum. Aut non quibusdam voluptas aliquam similique consectetur aliquam. Minus ut consectetur cum quia. Quas sint ab enim distinctio voluptatibus velit quis nesciunt. Optio dolor debitis eligendi sed odio voluptatibus. Ea qui quisquam vel aut vel nemo maxime vel. Dolorem vitae laudantium qui reprehenderit ea omnis. Molestias et explicabo ut quae.',262,'5','134','4','280','10','1540','13','436','','','33.5778450','-7.5650926',1000,'20250','Casablanca','MA','10 Boulevard du Fouarat',NULL,NULL,'0','0','1',NULL,'1987-08-04 23:12:35',NULL,'1997-11-13 22:20:57','2010-04-10 15:47:44',NULL),(400,6,'amet-est-et-nostrum-itaque-corporis-sint-asperiores-odio-consequatur-delectus-ad','Écologie - Amet est et nostrum itaque corporis sint asperiores odio consequatur delectus ad.','Laboriosam aliquid dolor hic qui aut aut asperiores et. Omnis temporibus est ipsum ut nulla eum officiis. Et ut molestiae similique optio rem. Magnam aspernatur laudantium sapiente adipisci. Quam iure veritatis et et eos sequi minus. Porro voluptas at facere et qui. Dolor ad et alias ipsum sed. Placeat ut id maiores repellendus. Est expedita ullam aut itaque doloribus est cumque. Magnam quas similique eos adipisci nobis iure veritatis. Blanditiis quisquam deleniti facere recusandae sed ducimus. Ut aperiam delectus sapiente et aut fugit. Sunt ipsum sit ex pariatur. Occaecati et velit occaecati blanditiis dolor officia. Expedita et sunt unde. Earum odio ex omnis sit deleniti. Quaerat quis earum fuga ex maiores sunt.','Eos expedita et dolores ipsum autem. Saepe eligendi perspiciatis et atque. Necessitatibus facilis cupiditate sit natus fugit doloribus ut. Temporibus ut est aut provident hic et et aut. Nobis delectus sunt dolor corporis et. Aut blanditiis vitae perspiciatis doloremque facere sunt dicta. Est corporis ut voluptates deserunt aspernatur. Neque sed occaecati aut quaerat. Sint repellat neque molestias laboriosam ut odit culpa. Odio veritatis veniam magni quo voluptatem mollitia. Officia quo doloremque et qui sint soluta atque. Voluptatem magnam eos et dicta sapiente molestias illo. Aspernatur nobis culpa voluptatem nostrum ratione consequatur. Harum vel adipisci error eligendi. Quia quis illum consequuntur quas non. Quis sit nisi non molestiae. Beatae qui sed modi necessitatibus. Velit ut perferendis dolorem tempore. Sed sit in dolores libero ipsam. Laborum repellendus est assumenda eius illum accusantium accusantium incidunt.','Praesentium quo dolores ut praesentium. Suscipit maxime numquam dignissimos expedita sit ipsum doloribus. Voluptatibus omnis quo voluptas laudantium corporis. Aperiam exercitationem qui aut unde optio commodi. Quasi eos omnis fugit ab. Natus excepturi voluptas distinctio quae dicta fugiat. Et quia nam sunt commodi beatae nostrum. Aut eum voluptates sed dicta qui. Et beatae omnis veniam commodi. Nihil autem porro aspernatur earum dolor reprehenderit unde.',271,'6','112','5','521','19','2283','15','529','','','33.9745807','-6.8534789',1000,'10000','Rabat','MA','65 Avenue Lalla Meriem',NULL,NULL,'1','1','0',NULL,'1981-10-15 23:46:17',NULL,'2001-11-23 06:25:14','2012-03-15 17:07:49',NULL);
/*!40000 ALTER TABLE `adverts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avatar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `type` set('dashboard','advert') COLLATE utf8_unicode_ci DEFAULT 'advert',
  `advert_id` int(11) unsigned DEFAULT NULL,
  `img` mediumblob,
  `img_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_mime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_size` int(11) DEFAULT NULL,
  `img_cropped` mediumblob,
  `img_cropped_x` int(11) DEFAULT NULL,
  `img_cropped_y` int(11) DEFAULT NULL,
  `img_cropped_w` int(11) DEFAULT NULL,
  `img_cropped_h` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userid_avatar` (`user_id`),
  CONSTRAINT `fk_userid_avatar` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avatar`
--

LOCK TABLES `avatar` WRITE;
/*!40000 ALTER TABLE `avatar` DISABLE KEYS */;
/*!40000 ALTER TABLE `avatar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_lesson`
--

DROP TABLE IF EXISTS `book_lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_id` int(11) unsigned NOT NULL,
  `prof_user_id` int(11) unsigned NOT NULL,
  `student_user_id` int(11) unsigned DEFAULT NULL,
  `subject_id` int(11) unsigned DEFAULT NULL,
  `answer` varchar(5) DEFAULT NULL,
  `presentation` varchar(600) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `pick_a_date` timestamp NULL DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `pick_a_location` varchar(255) DEFAULT NULL,
  `client` varchar(45) DEFAULT NULL,
  `pick_a_client` varchar(45) DEFAULT NULL,
  `birthdate` timestamp NULL DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `addresse` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userid_booking_idx` (`prof_user_id`),
  KEY `fk_studentid_booking_idx` (`student_user_id`),
  KEY `fk_subjectid_booking_idx` (`subject_id`),
  CONSTRAINT `fk_studentid_booking` FOREIGN KEY (`student_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subjectid_booking` FOREIGN KEY (`subject_id`) REFERENCES `sub_subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userid_booking` FOREIGN KEY (`prof_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_lesson`
--

LOCK TABLES `book_lesson` WRITE;
/*!40000 ALTER TABLE `book_lesson` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `source_user_id` int(11) unsigned NOT NULL,
  `target_user_id` int(11) unsigned NOT NULL,
  `owner_advert_id` int(11) unsigned DEFAULT NULL,
  `advert_id` varchar(45) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `stars` varchar(45) DEFAULT NULL,
  `comment_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sourceuserid_comments_idx` (`source_user_id`),
  KEY `fk_targetuserid_comments_idx` (`target_user_id`),
  CONSTRAINT `fk_sourceuserid_comments` FOREIGN KEY (`source_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_targetuserid_comments` FOREIGN KEY (`target_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_12_01_134113_create_subjects_table',1),('2015_12_01_134336_create_sub_subjects_table',1),('2015_12_01_134644_create_levels_table',1),('2015_12_01_134819_create_sub_levels_table',1),('2015_12_01_144819_create_adverts_table',2),('2015_12_01_174336_entrust_setup_tables',2),('2016_01_09_140738_create_jobs_table',3),('2016_04_19_190548_create_adverts_table',0),('2016_04_19_190548_create_avatar_table',0),('2016_04_19_190548_create_book_lesson_table',0),('2016_04_19_190548_create_comments_table',0),('2016_04_19_190548_create_jobs_table',0),('2016_04_19_190548_create_levels_table',0),('2016_04_19_190548_create_notifications_table',0),('2016_04_19_190548_create_password_resets_table',0),('2016_04_19_190548_create_permission_role_table',0),('2016_04_19_190548_create_permissions_table',0),('2016_04_19_190548_create_role_user_table',0),('2016_04_19_190548_create_roles_table',0),('2016_04_19_190548_create_sub_levels_table',0),('2016_04_19_190548_create_sub_subjects_table',0),('2016_04_19_190548_create_subjects_table',0),('2016_04_19_190548_create_subjects_per_advert_table',0),('2016_04_19_190548_create_users_table',0),('2016_04_19_190549_add_foreign_keys_to_permission_role_table',0),('2016_04_19_190549_add_foreign_keys_to_role_user_table',0),('2016_04_19_190549_add_foreign_keys_to_sub_levels_table',0),('2016_04_19_190549_add_foreign_keys_to_sub_subjects_table',0),('2016_04_19_202248_create_adverts_table',0),('2016_04_19_202248_create_avatar_table',0),('2016_04_19_202248_create_book_lesson_table',0),('2016_04_19_202248_create_comments_table',0),('2016_04_19_202248_create_jobs_table',0),('2016_04_19_202248_create_levels_table',0),('2016_04_19_202248_create_notifications_table',0),('2016_04_19_202248_create_password_resets_table',0),('2016_04_19_202248_create_permission_role_table',0),('2016_04_19_202248_create_permissions_table',0),('2016_04_19_202248_create_role_user_table',0),('2016_04_19_202248_create_roles_table',0),('2016_04_19_202248_create_sub_levels_table',0),('2016_04_19_202248_create_sub_subjects_table',0),('2016_04_19_202248_create_subjects_table',0),('2016_04_19_202248_create_subjects_per_advert_table',0),('2016_04_19_202248_create_users_table',0),('2016_04_19_202250_add_foreign_keys_to_adverts_table',0),('2016_04_19_202250_add_foreign_keys_to_avatar_table',0),('2016_04_19_202250_add_foreign_keys_to_book_lesson_table',0),('2016_04_19_202250_add_foreign_keys_to_comments_table',0),('2016_04_19_202250_add_foreign_keys_to_notifications_table',0),('2016_04_19_202250_add_foreign_keys_to_permission_role_table',0),('2016_04_19_202250_add_foreign_keys_to_role_user_table',0),('2016_04_19_202250_add_foreign_keys_to_sub_levels_table',0),('2016_04_19_202250_add_foreign_keys_to_sub_subjects_table',0),('2016_04_19_202250_add_foreign_keys_to_subjects_per_advert_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `advert_id` int(11) unsigned DEFAULT NULL,
  `table` varchar(45) DEFAULT NULL,
  `item_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `channel` varchar(45) NOT NULL,
  `message` varchar(255) NOT NULL,
  `hide` int(11) DEFAULT '0',
  `link` varchar(455) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userid_notif_idx` (`user_id`),
  CONSTRAINT `fk_userid_notif` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (2,10,172,NULL,NULL,'webcam','advert','Donnez des cours à l\'autre bout du monde grâce aux cours via webcam',1,'/modifier-annonce-5/172','2016-04-10 19:21:18','2016-04-10 18:21:18'),(3,10,172,NULL,NULL,'marketing-video','advert','Rajoutez une vidéo à votre annonce pour vous présenter et communiquer votre passion',1,'','2016-04-10 19:31:43','2016-04-10 18:31:43'),(4,10,172,NULL,NULL,'social-networks','advert','Gagnez en visibilité dans les moteurs de recherches en faisant la promotion d\'une de vos annonces sur les réseaux sociaux',1,'','2016-04-10 19:21:19','2016-04-10 18:21:19'),(5,10,172,NULL,NULL,'degree-check','advert','Votre diplôme n\'est pas vérifié. Vérifiez votre diplôme, pour compléter votre profil',1,'','2016-04-10 19:31:44','2016-04-10 18:31:44'),(6,10,172,NULL,NULL,'group-course','advert','Créez une formation ou un stage sur une thématique particulière pour un groupe d\'élèves',1,'','2016-04-10 19:31:45','2016-04-10 18:31:45'),(7,10,172,NULL,NULL,'pro-offer','advert','Découvrez l\'offre professionelle pour booster votre annonce!',1,'','2016-04-10 19:31:47','2016-04-10 18:31:47'),(8,6,51,NULL,NULL,'new_comment','advert','Nouveau commentaire',1,'','2016-04-04 19:08:04','2016-04-04 18:08:04'),(13,6,51,NULL,NULL,'new_comment','advert','Nouveau commentaire de la part de Mehdi',1,'/cours-et-soutien-en-francais-et-lettres-mode','2016-04-10 19:26:32','2016-04-10 18:26:32'),(14,10,173,NULL,NULL,'webcam','advert','Donnez des cours à l\'autre bout du monde grâce aux cours via webcam',1,'/modifier-annonce-5/173','2016-04-10 19:05:57','2016-04-10 18:05:57'),(15,10,173,NULL,NULL,'marketing-video','advert','Rajoutez une vidéo à votre annonce pour vous présenter et communiquer votre passion',1,'','2016-04-10 19:05:59','2016-04-10 18:05:59'),(16,10,173,NULL,NULL,'social-networks','advert','Gagnez en visibilité dans les moteurs de recherches en faisant la promotion d\'une de vos annonces sur les réseaux sociaux',1,'','2016-04-10 19:06:00','2016-04-10 18:06:00'),(17,10,173,NULL,NULL,'degree-check','advert','Votre diplôme n\'est pas vérifié. Vérifiez votre diplôme, pour compléter votre profil',1,'','2016-04-10 19:06:02','2016-04-10 18:06:02'),(18,10,173,NULL,NULL,'group-course','advert','Créez une formation ou un stage sur une thématique particulière pour un groupe d\'élèves',1,'','2016-04-10 19:06:05','2016-04-10 18:06:05'),(19,10,173,NULL,NULL,'pro-offer','advert','Découvrez l\'offre professionelle pour booster votre annonce!',1,'','2016-04-10 19:06:06','2016-04-10 18:06:06'),(26,6,49,NULL,NULL,'new_booking','advert','Nouvelle demande de cours',0,'','2016-04-10 18:18:57','2016-04-10 18:18:57'),(27,10,49,NULL,NULL,'new_comment','advert','Nouveau commentaire de la part de Morgane',1,'/cours-et-soutien-en-francais-et-lettres-modernes-par-professeur-agrege-de-mathematique','2016-04-10 19:31:48','2016-04-10 18:31:48');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'professeur','Professeur',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'eleve','Élève',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'test','Test',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sub_subjects_parent_id_foreign` (`parent_id`),
  CONSTRAINT `sub_subjects_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_subjects`
--

LOCK TABLES `sub_subjects` WRITE;
/*!40000 ALTER TABLE `sub_subjects` DISABLE KEYS */;
INSERT INTO `sub_subjects` VALUES (79,'Aide aux devoirs',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(80,'Français',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(81,'Méthodologie',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(82,'Soutien scolaire',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(83,'Lecture',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(84,'Philosophie',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(85,'Lettres modernes',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(86,'Orthographe',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(87,'Sortie d\'école & Baby-sitting',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(88,'Latin',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(89,'Aide à la rédaction de CV - lettre de motivation',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(90,'Alphabétisation',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(91,'Conjugaison',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(92,'Grammaire',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(93,'Lettres classiques',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(94,'Aide à la rédaction de mémoires et thèses',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(95,'Grec ancien',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(96,'Préparation concours Normale Sup',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(97,'Préparation Concours / Examen',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(98,'Orientation scolaire',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(99,'Graphothérapie',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(100,'Écriture créative',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(101,'Préparation Concours Enseignement',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(102,'Lecture rapide',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(103,'Préparation Concours Fonction publique',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(104,'Préparation Concours de Police',1,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(105,'Mathématiques',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(106,'Physique',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(107,'Chimie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(108,'Biologie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(109,'Sciences de l\'ingénieur',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(110,'SVT',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(111,'Mécanique',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(112,'Technologie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(113,'Autres sciences',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(114,'Statistiques',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(115,'Dessin industriel',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(116,'Préparation concours école d\'ingénieur',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(117,'Électricité',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(118,'Pharmacie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(119,'PACES',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(120,'Chimie organique',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(121,'Médecine',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(122,'Géologie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(123,'Sciences médico-sociales',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(124,'Infirmier',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(125,'Géométrie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(126,'Écologie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(127,'Logique mathématique',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(128,'Arithmétique',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(129,'Trigonométrie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(130,'Paramédical',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(131,'Kinésithérapie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(132,'Développement durable',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(133,'Ostéopathie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(134,'Énergies renouvelables',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(135,'Odontologie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(136,'Diététique',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(137,'Sage-femme',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(138,'Algèbre',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(139,'Anatomie',2,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(140,'Économie',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(141,'Comptabilité',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(142,'Gestion comptable',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(143,'Finance',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(144,'Marketing',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(145,'Préparation concours écoles de commerce',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(146,'Fiscalité',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(147,'Vente',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(148,'Économétrie',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(149,'Création d\'entreprise',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(150,'Gestion de projet',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(151,'Management et gestion d\'entreprise',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(152,'TAGE MAGE',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(153,'Gestion des risques',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(154,'SES',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(155,'Start up',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(156,'Microéconomie',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(157,'Macroéconomie',3,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(158,'Anglais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(159,'Espagnol',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(160,'Allemand',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(161,'Italien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(162,'Russe',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(163,'Chinois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(164,'FLE Français Langue Étrangère',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(165,'Arabe',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(166,'Traduction - anglais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(167,'Autres langues',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(168,'TOEIC',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(169,'TOEFL',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(170,'Traduction - espagnol',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(171,'Portugais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(172,'Japonais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(173,'Mandarin',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(174,'Techniques de traduction',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(175,'IELTS',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(176,'Traduction - italien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(177,'Anglais américain',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(178,'Portugais brésilien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(179,'Interprétation',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(180,'Anglais britannique',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(181,'FCE',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(182,'CAE',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(183,'Coréen',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(184,'Traduction - allemand',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(185,'Polonais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(186,'Traduction - chinois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(187,'Grec moderne',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(188,'Catalan',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(189,'Ukrainien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(190,'CPE',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(191,'Valencien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(192,'Roumain',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(193,'Hébreu',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(194,'Néerlandais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(195,'Turc',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(196,'Traduction - arabe',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(197,'Serbo-croate',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(198,'Cantonais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(199,'Persan',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(200,'Suédois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(201,'Vietnamien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(202,'Langue des signes',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(203,'Hindi',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(204,'Réduction d\'accent',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(205,'DELF',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(206,'Galicien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(207,'Thaïlandais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(208,'Tchèque',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(209,'PET',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(210,'DALF',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(211,'Arménien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(212,'Hongrois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(213,'Malais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(214,'Albanais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(215,'Indonésien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(216,'Bulgare',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(217,'Basque',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(218,'GMAT',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(219,'Norvégien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(220,'Créole',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(221,'Danois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(222,'Letton',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(223,'Bengali',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(224,'Slovaque',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(225,'Breton',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(226,'Réduction d\'accent espagnol',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(227,'Traduction - autres langues',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(228,'Espéranto',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(229,'Népalais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(230,'Yiddish',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(231,'Luxembourgeois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(232,'Lao',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(233,'Lituanien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(234,'Occitan',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(235,'Sanskrit',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(236,'Khmer',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(237,'Géorgien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(238,'Swahili',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(239,'Malgache',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(240,'Estonien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(241,'Finnois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(242,'Tamoul',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(243,'Marathi',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(244,'Mongol',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(245,'Urdu',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(246,'Cingalais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(247,'Birman',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(248,'Javanais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(249,'Corse',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(250,'Réduction d\'accent arabe',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(251,'Réduction d\'accent - autres langues',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(252,'Réduction d\'accent français',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(253,'Réduction d\'accent chinois',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(254,'Réduction d\'accent italien',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(255,'Réduction d\'accent japonais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(256,'Farsi',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(257,'Réduction d\'accent allemand',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(258,'Kurde',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(259,'Traduction - japonais',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(260,'Afrikaans',4,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(261,'Droit civil',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(262,'Droit public',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(263,'Droit pénal',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(264,'Droit du travail',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(265,'Droit international',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(266,'Droit fiscal',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(267,'Droit des affaires',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(268,'Droit constitutionnel',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(269,'Droit administratif',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(270,'Droit européen',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(271,'Propriété intellectuelle',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(272,'Droit immobilier',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(273,'Préparation examen CRFPA',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(274,'Préparation concours ENM',5,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(275,'Histoire',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(276,'Géographie',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(277,'Culture générale',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(278,'Sociologie',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(279,'Éducation civique',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(280,'Sciences sociales',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(281,'Sciences politiques',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(282,'Préparation concours Sciences Po',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(283,'Psychologie',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(284,'Communication',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(285,'Ressources humaines',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(286,'Secrétariat',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(287,'Archéologie',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(288,'Autres sciences humaines',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(289,'Graphologie',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(290,'Préparation Tests psychotechniques',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(291,'Relations internationales',6,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(292,'Initiation informatique',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(293,'Bureautique',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(294,'Photoshop',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(295,'Programmation',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(296,'Excel',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(297,'Graphisme',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(298,'Word',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(299,'Base de données',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(300,'Logiciels',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(301,'Illustrator',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(302,'InDesign',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(303,'Développement Web',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(304,'Powerpoint',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(305,'Infographie',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(306,'PAO',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(307,'Vidéo',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(308,'Initiation Internet',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(309,'Électronique',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(310,'Télécommunications',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(311,'AutoCAD',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(312,'Réseaux sociaux',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(313,'Création de site web',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(314,'Sécurité informatique',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(315,'Système d\'exploitation',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(316,'Référencement',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(317,'SketchUp',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(318,'CAO',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(319,'DAO',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(320,'Réseaux informatiques',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(321,'ArchiCAD',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(322,'CATIA',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(323,'SIG',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(324,'Revit',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(325,'Animation 3D',7,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(326,'Piano',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(327,'Solfège',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(328,'Guitare',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(329,'Instruments à cordes',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(330,'Improvisation musicale',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(331,'Chant',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(332,'Autres instruments',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(333,'Composition',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(334,'Éveil musical',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(335,'Violon',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(336,'Batterie',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(337,'Basse',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(338,'Percussions',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(339,'Flûte traversière',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(340,'Saxophone',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(341,'Histoire de la musique',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(342,'Violoncelle',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(343,'Instruments à vent',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(344,'Chorale',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(345,'Clarinette',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(346,'MAO',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(347,'Alto',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(348,'Accordéon',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(349,'Synthétiseur',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(350,'Mix - DJ',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(351,'Flûte',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(352,'Contrebasse',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(353,'Trompette',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(354,'Harpe',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(355,'Ukulélé',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(356,'Clavecin',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(357,'Orgue',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(358,'Djembé',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(359,'Musicothérapie',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(360,'Luth',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(361,'Harmonica',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(362,'Mandoline',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(363,'Trombone',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(364,'Hautbois',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(365,'Viole de Gambe',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(366,'Basson',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(367,'Guitare acoustique',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(368,'Guitare flamenca',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(369,'Flûte piccolo',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(370,'Guitare classique',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(371,'Didgeridoo',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(372,'Chant lyrique',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(373,'Cornemuse',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(374,'Cithare',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(375,'Banjo',8,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(376,'Coach sportif',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(377,'Yoga',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(378,'Remise en forme',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(379,'Danse',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(380,'Fitness',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(381,'Autres sports',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(382,'Musculation',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(383,'Relaxation',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(384,'Éveil sportif',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(385,'Arts martiaux',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(386,'Stretching',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(387,'Course à pied',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(388,'Chorégraphie',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(389,'Self-défense',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(390,'Tennis',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(391,'Salsa',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(392,'Natation',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(393,'Boxe',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(394,'Pilates',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(395,'Méditation',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(396,'Danses latines',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(397,'Gymnastique',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(398,'Massage',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(399,'Danses de salon',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(400,'Athlétisme',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(401,'Hip hop',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(402,'Tango',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(403,'Danse classique',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(404,'Qi Gong',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(405,'Krav maga',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(406,'Barre au sol',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(407,'Danse africaine',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(408,'Danse orientale',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(409,'Valse',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(410,'Rock',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(411,'Boxe thaï',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(412,'Tai chi',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(413,'Zumba',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(414,'Karaté',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(415,'Aquagym',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(416,'Basket',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(417,'Football',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(418,'Kick boxing',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(419,'Triathlon',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(420,'Équitation',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(421,'Nutrition du sport',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(422,'Cyclisme',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(423,'Kung-fu',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(424,'Breakdance',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(425,'Flamenco',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(426,'Pole dance',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(427,'Skate',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(428,'Badminton',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(429,'Handball',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(430,'Rugby',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(431,'Tennis de table',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(432,'Roller',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(433,'Claquettes',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(434,'Judo',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(435,'Sevillanas',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(436,'Capoeira',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(437,'Volley',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(438,'Patinage',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(439,'Squash',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(440,'Plongée sous-marine',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(441,'Ski',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(442,'Golf',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(443,'Surf',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(444,'Escalade',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(445,'Hula-hoop',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(446,'Hockey sur glace',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(447,'Danse contemporaine',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(448,'Navigation',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(449,'Gymnastique rythmique',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(450,'Stand up paddle',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(451,'Ultimate',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(452,'Escrime',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(453,'Hockey sur gazon',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(454,'Danse indienne',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(455,'Danse Bollywood',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(456,'Danse moderne',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(457,'Danse jazz',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(458,'Comédie musicale',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(459,'Baby-foot',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(460,'Padel',9,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(461,'Dessin',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(462,'Peinture',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(463,'Histoire de l\'art',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(464,'Photographie',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(465,'Théâtre',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(466,'Cinéma',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(467,'Architecture',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(468,'Sculpture',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(469,'Illustration',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(470,'Design',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(471,'Bande dessinée',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(472,'Calligraphie',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(473,'Art thérapie',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(474,'Improvisation théâtrale',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(475,'Architecture d\'intérieur',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(476,'Poterie',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(477,'Aérographie',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(478,'Préparation concours école d\'architecture',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(479,'Nihonga',10,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(480,'Couture',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(481,'Cuisine',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(482,'Autres loisirs',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(483,'Échecs',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(484,'Modélisme',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(485,'Décoration',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(486,'Pâtisserie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(487,'Broderie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(488,'Stylisme',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(489,'Scrapbooking',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(490,'Magie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(491,'Maquillage',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(492,'Tricot',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(493,'Astrologie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(494,'Sophrologie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(495,'Relooking',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(496,'Bricolage',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(497,'Autres jeux de cartes',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(498,'Œnologie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(499,'Crochet',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(500,'Bijouterie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(501,'Cuisine du monde',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(502,'Jardinage',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(503,'Feng shui',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(504,'Encadrement',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(505,'Coiffure',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(506,'Origami',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(507,'Gastronomie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(508,'Cuisine traditionnelle',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(509,'Cartonnage',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(510,'Jonglage',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(511,'Cocktail',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(512,'Composition florale',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(513,'Travaux manuels',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(514,'DIY',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(515,'Cartomancie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(516,'Poker',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(517,'Généalogie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(518,'Cuisine italienne',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(519,'Pliage',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(520,'Tarot',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(521,'Gravure',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(522,'Cuisine végétarienne',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(523,'Secourisme',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(524,'Mémorisation',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(525,'Mosaïque',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(526,'Éducation canine',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(527,'Cuisine Bio',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(528,'Cuisine asiatique',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(529,'Conduite',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(530,'Bridge',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(531,'Développement personnel',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(532,'Tapisserie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(533,'Ébénisterie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(534,'Plomberie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(535,'Rénovation de meubles',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(536,'Chiromancie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(537,'Menuiserie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(538,'Jeux vidéo',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(539,'Rubik\'s cube',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(540,'Cuisine sans gluten',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(541,'Cuisine diététique',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(542,'Animation d\'évènements',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(543,'Apiculture',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(544,'Cirque',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(545,'Métallerie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(546,'Soudure',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(547,'Sellerie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(548,'Réfection de sièges',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(549,'Ikebana',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(550,'Belote',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(551,'Cuisine française',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(552,'Flair bartending',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(553,'Pétanque',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(554,'Kitesurf',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(555,'Maroquinerie',11,'2016-04-19 19:59:38','2016-04-19 19:59:55'),(556,'Cuisine moléculaire',11,'2016-04-19 19:59:38','2016-04-19 19:59:55');
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
  `advert_id` int(11) unsigned DEFAULT NULL,
  `subject_id` int(11) unsigned DEFAULT NULL,
  `level_ids` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjectid_subjects_idx` (`subject_id`),
  CONSTRAINT `fk_subjectid_subjects` FOREIGN KEY (`subject_id`) REFERENCES `sub_subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=370 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects_per_advert`
--

LOCK TABLES `subjects_per_advert` WRITE;
/*!40000 ALTER TABLE `subjects_per_advert` DISABLE KEYS */;
INSERT INTO `subjects_per_advert` VALUES (311,51,81,'[\"11\"]','2016-03-28 14:11:11','2016-03-28 14:16:48'),(351,382,128,'[\"11\"]',NULL,NULL),(352,383,129,'[\"11\"]',NULL,NULL),(353,384,125,'[\"11\"]',NULL,NULL),(354,385,129,'[\"11\"]',NULL,NULL),(355,386,127,'[\"11\"]',NULL,NULL),(356,387,129,'[\"11\"]',NULL,NULL),(357,388,127,'[\"11\"]',NULL,NULL),(358,389,125,'[\"11\"]',NULL,NULL),(359,390,125,'[\"11\"]',NULL,NULL),(360,391,126,'[\"11\"]',NULL,NULL),(361,392,126,'[\"11\"]',NULL,NULL),(362,393,127,'[\"11\"]',NULL,NULL),(363,394,127,'[\"11\"]',NULL,NULL),(364,395,129,'[\"11\"]',NULL,NULL),(365,396,126,'[\"11\"]',NULL,NULL),(366,397,128,'[\"11\"]',NULL,NULL),(367,398,129,'[\"11\"]',NULL,NULL),(368,399,125,'[\"11\"]',NULL,NULL),(369,400,126,'[\"11\"]',NULL,NULL);
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
  `firstname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_token` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `auto_created` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `premium_credit` int(11) DEFAULT '0',
  `stripe_customer_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last4` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exp_month` int(11) DEFAULT NULL,
  `exp_year` int(11) DEFAULT NULL,
  `brand` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Morgane','Test','ramses@yopmail.com',NULL,NULL,NULL,'$2y$10$45wxzzb4xk2nbp0Ndbz5TebX1YNMe5h9dodkWjLS7o1SEwsYUP8xu','LMkxiwHSKGmQk83IZwJRoDpPpi4BOV','4JBzUGK6gt5d6JGIfIijD4OmT6yMrfhS7Ormcm5mQm0ne6FUFsWBJtZyxhCc',NULL,1,NULL,'2016-01-09 13:53:11','2016-04-10 18:28:10',0,NULL,NULL,NULL,NULL,NULL),(10,'Mehdi','Testos','mehdi.souihed@gmail.com.com','074531877456666','man','0000-00-00 00:00:00','$2y$10$Xkrhb8AwaQpNox8OM2U1p.QUMNtVQIRqT.67ZDoTMtDosV8xBA8J.','','mYuRdJmTDV2OfRdbaT6iaRNV162IY2hkSXJpTB1PwGX7YAKM5XdpAU5slSnf',NULL,1,NULL,'2016-01-09 15:01:15','2016-05-17 20:20:50',0,NULL,NULL,NULL,NULL,NULL),(11,'Stéphane','Charlie','chayeb.yacine@gmail.com',NULL,NULL,NULL,'$2y$10$K0ZnVtErqorHAXsqzxMF8OwcMWMOZdKhYw0N5bL/.DikM0iza0gEm','','o7MQ1tpW3Ix0Fd0yJPzaUTxv5w09N4QFjHFQ3UzJf5dL1sgSJvEOCwtIwwwf',NULL,1,NULL,'2016-01-29 21:30:14','2016-01-29 21:39:20',0,NULL,NULL,NULL,NULL,NULL),(12,'Stéphane','Charlie','chayebc2@msn.com',NULL,NULL,NULL,'$2y$10$kqjfwZ/cPKjxEvxZDmpYA.hkuHq7ixCoxkbYCGPgKpaLoUWjVpCCu','7K922anVnX4u1PyLGXOuVBUps5gT62',NULL,NULL,0,NULL,'2016-01-29 21:40:23','2016-01-29 21:40:23',0,NULL,NULL,NULL,NULL,NULL),(13,'Ramses2','Egyptien','ramses2@yopmail.com',NULL,NULL,NULL,'$2y$10$WW/N0L/pu67tPIQaFtdarOjHpAm2fFiI.rvoHJPyFghjVZPtcKabq','','i7A0qhhtBgoYRJy727u8HMOOleOMvaiXWAy32hBmmY3mwvJXaviU431kJrM0',NULL,1,NULL,'2016-03-23 17:07:07','2016-03-23 17:33:34',0,NULL,NULL,NULL,NULL,NULL),(14,'Ima Batz','Dortha Moen','Lloyd.Green@Lynch.biz',NULL,NULL,NULL,'$2y$10$UHTiyHmN3t8bqBYvnRuRV.rPdVQYVZzatAz1nuYRPe9SuGqk4YlFa','0j1DAlURaJXEh1TUUzWqAAYtBefqPI',NULL,NULL,0,NULL,'2016-03-23 17:39:17','2016-03-23 17:39:17',0,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2016-05-22 20:07:13
