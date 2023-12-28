-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (arm64)
--
-- Host: 127.0.0.1    Database: botble
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
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `code` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activations_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'9F5AV2YpDM5jCu8N3CKgfd8lv1kvIGT8',1,'2023-10-24 23:42:59','2023-10-24 23:42:59','2023-10-24 23:42:59'),(2,2,'6KG7BOGC0wrUknkexkt4WlNAb0QMvHgY',1,'2023-10-24 23:42:59','2023-10-24 23:42:59','2023-10-24 23:42:59'),(3,3,'EbqOrzvBxpSOQKabk2WPb9uZZuvnb3JS',1,'2023-10-24 23:42:59','2023-10-24 23:42:59','2023-10-24 23:42:59');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_notifications`
--

DROP TABLE IF EXISTS `admin_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_notifications`
--

LOCK TABLES `admin_notifications` WRITE;
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_histories`
--

DROP TABLE IF EXISTS `audit_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `module` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` text COLLATE utf8mb4_unicode_ci,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(39) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_user` bigint unsigned NOT NULL,
  `reference_id` bigint unsigned NOT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_histories_user_id_index` (`user_id`),
  KEY `audit_histories_module_index` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_histories`
--

LOCK TABLES `audit_histories` WRITE;
/*!40000 ALTER TABLE `audit_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocks_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,'Aubrey Boyle','aubrey-boyle','In facere reprehenderit ratione nesciunt.','Vel rerum dolorum maxime occaecati repellendus distinctio. Labore aut maiores est in officia harum suscipit. Cumque atque fuga sit alias. Est ut odio repellat est. Deleniti consectetur doloribus culpa consequuntur earum aperiam. Ad fugit cupiditate suscipit possimus beatae atque nostrum deserunt. Molestiae eligendi delectus sed temporibus ipsum beatae sed. Officia commodi expedita laboriosam praesentium laudantium quod. Aspernatur minima quia omnis modi praesentium maiores.','published',NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(2,'Kayli Johnson','kayli-johnson','Eaque sed officiis explicabo aut.','Incidunt culpa officiis repellat optio quia dolores delectus. Debitis est iusto enim omnis cum. Illo sed molestiae aut et. Quasi aut a et aliquam rerum ducimus quasi. Ea harum quia repudiandae quos. Voluptatem delectus ut est dolorem sunt. Rerum illum modi ut mollitia dolores. Sed quam unde suscipit nesciunt doloribus eos velit est. Accusamus quidem veniam sunt ad consequatur sunt qui.','published',NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(3,'Dr. Jorge Denesik','dr-jorge-denesik','Et ut et sapiente sit. Harum minima sunt velit.','Nihil maiores facere consequatur labore fuga est repudiandae. In earum inventore accusamus delectus voluptas maxime odio rerum. Sunt quod et dolorum suscipit. Ut maiores possimus totam maxime dolorem debitis nihil. Odit odit exercitationem rerum aut. Maiores nam magnam expedita mollitia laboriosam. Labore ut velit velit doloremque quam. In error aspernatur atque ut amet. Doloribus accusantium occaecati quibusdam et eum velit. Est eaque et optio quae deleniti ducimus ea.','published',NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(4,'Antonette Kunde','antonette-kunde','Vitae et qui aspernatur ex omnis quam quibusdam.','Voluptates iusto rem nulla perferendis quia libero magni. Beatae ut enim fugiat itaque quisquam. Pariatur eos culpa velit incidunt sit ratione. Cum laboriosam eius sit nobis atque ut et officiis. Rerum rerum et pariatur praesentium est doloribus adipisci. Qui harum porro sequi deleniti sunt aut. Ut similique deleniti molestiae aperiam.','published',NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(5,'Flo Bosco','flo-bosco','Ut fuga dignissimos quasi alias.','Asperiores facere voluptatum occaecati repellendus et. Ut provident consequatur eligendi praesentium. Unde commodi est consectetur. Sed ut cum assumenda fuga in voluptas veniam. Et soluta inventore voluptatem voluptatem. Cum vel in distinctio at quod. Maxime omnis et nemo qui aut magnam. Cupiditate provident numquam voluptas error. Facere voluptatem reiciendis et in veritatis deserunt. Sed provident eveniet minus velit voluptatem ut. Velit rem quia iste omnis iure quae sunt totam.','published',NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocks_translations`
--

DROP TABLE IF EXISTS `blocks_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blocks_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocks_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`blocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks_translations`
--

LOCK TABLES `blocks_translations` WRITE;
/*!40000 ALTER TABLE `blocks_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `blocks_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` bigint unsigned DEFAULT NULL,
  `author_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `icon` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint NOT NULL DEFAULT '0',
  `is_featured` tinyint NOT NULL DEFAULT '0',
  `is_default` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_status_index` (`status`),
  KEY `categories_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Design',0,'Rerum iure sed ex qui repudiandae numquam. Voluptas odio rerum quo soluta et iste. Id consectetur consectetur error.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,0,1,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(2,'Lifestyle',0,'Voluptatum officia laudantium ea ut ut ea tempore. Et ut ea veritatis eligendi aliquid. Omnis nihil mollitia veritatis. Debitis et voluptatem illo dolorem non.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(3,'Travel Tips',2,'A voluptatum sit error excepturi non aut ut. Expedita sapiente et similique quae reprehenderit. Qui temporibus libero commodi quidem omnis quia. Voluptas beatae sequi perspiciatis numquam ad.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,0,0,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(4,'Healthy',0,'Blanditiis ipsam a neque corrupti et. Ut laudantium voluptate voluptatem aut est. Non fuga velit hic. Distinctio similique earum id beatae et itaque beatae.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(5,'Travel Tips',4,'Dolorum vel et officia quia sapiente esse. Itaque et molestiae est odit iusto dignissimos. Et omnis consectetur aut laboriosam doloremque dicta.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,0,0,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(6,'Hotel',0,'Quo sit natus fugiat quia consequatur ut officiis. Repellendus nobis ea non necessitatibus cupiditate vitae doloremque. Suscipit accusamus mollitia voluptate ut tempora atque voluptates.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,1,0,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(7,'Nature',6,'Velit pariatur itaque quod error consequatur earum. Vitae eum molestias id. Et et cum blanditiis doloribus dolorem tenetur rerum ex.','published',NULL,'Botble\\ACL\\Models\\User',NULL,0,0,0,'2023-10-24 23:43:00','2023-10-24 23:43:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_translations`
--

DROP TABLE IF EXISTS `categories_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_translations`
--

LOCK TABLES `categories_translations` WRITE;
/*!40000 ALTER TABLE `categories_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_replies`
--

DROP TABLE IF EXISTS `contact_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_replies`
--

LOCK TABLES `contact_replies` WRITE;
/*!40000 ALTER TABLE `contact_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Stewart Hackett','brielle01@example.org','(321) 236-0140','97906 Deshaun Forge Apt. 977\nMohrburgh, MT 29345-9021','Occaecati quasi quia dolorem enim in.','Laborum consequuntur consectetur autem dolore ex perferendis voluptate. Sit ad delectus eius est. Quia architecto suscipit architecto eligendi nobis laudantium delectus. Quia id aliquid nihil hic numquam modi. Harum ipsa porro optio qui officiis laborum. Qui fugiat mollitia est aspernatur ipsam dolores veritatis. Libero animi et ut accusantium aut debitis. Rerum minus unde sunt. Esse laboriosam laboriosam ut sint possimus. Dolorem enim praesentium sed sunt dignissimos aut.','read','2023-10-24 23:43:02','2023-10-24 23:43:02'),(2,'Kathlyn Cummerata','domenic77@example.net','445-632-5121','197 Greenfelder Street\nSouth Georgiana, SC 85435','Occaecati quia facilis animi fugiat ut.','Quaerat praesentium voluptates corporis voluptatem nemo iusto quia ad. Pariatur quia assumenda consequuntur ut occaecati eius maxime. Accusantium iste illum iure omnis et assumenda. Est rerum ut corporis quisquam et quam. Ea temporibus est possimus voluptates cumque aut. Libero rem voluptates debitis nobis. Consectetur rerum dolores voluptate quidem praesentium. Quia minima assumenda praesentium et.','unread','2023-10-24 23:43:02','2023-10-24 23:43:02'),(3,'Johathan Wintheiser','nathan.herzog@example.com','(351) 220-6626','847 Kemmer Ways Suite 312\nLubowitztown, MS 63487-9335','Deserunt sit et culpa occaecati atque.','Laudantium tempora odio eaque. Dolore unde alias molestiae. Ut assumenda nesciunt perferendis dignissimos voluptatem. Nesciunt ea dolorum expedita et magnam minima ut. Id libero excepturi excepturi sunt. Quis magni maiores qui enim dolor. Occaecati consequuntur necessitatibus repellat sit numquam ea in eum. Voluptatem eius est numquam cupiditate. Id cupiditate temporibus nisi ipsa. Quam reiciendis voluptatem accusamus rerum.','read','2023-10-24 23:43:02','2023-10-24 23:43:02'),(4,'Calista Jerde','mprice@example.net','+1 (309) 820-0509','7140 Quitzon Inlet Apt. 971\nNew Juanitaview, OK 04971-7901','Sed minima ea eum dolor ab facere rerum.','Nihil rerum sit vel aliquam velit. Perspiciatis aut doloribus placeat consequatur sit fugiat non. Autem sunt et consequatur porro dolor enim adipisci. Et quo repellat laudantium assumenda. Saepe et ipsam sed maxime alias sunt. Amet amet non consequuntur hic quam cupiditate explicabo vero. Omnis molestiae delectus voluptate tempore quo ut. Temporibus eum non eaque.','unread','2023-10-24 23:43:02','2023-10-24 23:43:02'),(5,'Mr. Noel Jast','aletha.carroll@example.net','+1-930-398-1811','1187 Okuneva Forks Apt. 459\nNorth Corneliuschester, DE 72259','Exercitationem fugit aperiam nostrum excepturi.','Et nisi consequatur odit at repellat occaecati eos. Expedita ipsam quis voluptatem ullam maxime. Atque fugiat dolorum et est tempore voluptatibus. Sequi ut aut ea sapiente nulla repellat minus rerum. Qui temporibus ut quas tempore consequatur odio sed. A quam quia iure et officiis aut. Fugiat aut rerum vel repudiandae. Natus illo ex sunt ut magnam aut in. Fuga quis veniam magnam. Magni consequatur occaecati dolorum ipsum. Molestiae laboriosam et veritatis aut quo.','read','2023-10-24 23:43:02','2023-10-24 23:43:02'),(6,'Elissa Fahey','wiley46@example.com','(857) 521-9842','6012 Rosella Course Apt. 084\nJacobsberg, WA 09268','Dolore molestias sit nobis ad.','Dolorum sed officia vel corporis et accusantium reiciendis. Velit accusantium molestiae in delectus esse. Omnis exercitationem voluptatem odit tempora expedita quidem atque. Similique ut omnis eum possimus tempora. Laboriosam similique quo expedita commodi ut minima est. Repellendus nam et saepe vero et vel accusamus. Qui soluta esse qui.','unread','2023-10-24 23:43:02','2023-10-24 23:43:02'),(7,'Mr. Cordelia Schneider I','remington.erdman@example.net','1-458-807-6556','5585 Ullrich Points\nGeorgetteland, RI 17989','Aut dolor consequatur ipsa aspernatur aliquam.','Pariatur beatae hic repellendus exercitationem. Neque ex et porro maiores. Id velit architecto ut voluptatum consequatur. Sit sequi sint quis excepturi error aliquam voluptate. Eius blanditiis natus dicta laboriosam qui omnis aut. Ipsa numquam temporibus porro unde sit quos voluptatem. Et enim dolorum architecto asperiores consequatur consequatur. Recusandae facere accusamus ullam inventore expedita.','unread','2023-10-24 23:43:02','2023-10-24 23:43:02'),(8,'Dr. Alex Koss','harris.johnathan@example.net','+1-775-565-2229','8515 Terry Drive Apt. 947\nFreedamouth, KY 88720-3409','Quas reprehenderit nihil in dolorem perspiciatis.','Quam a itaque voluptates. Et dolorem nihil delectus alias enim. Delectus eaque ut et tempora aut ut unde. Id accusantium officiis cupiditate ut et aut. Ratione voluptates dignissimos neque soluta veniam nisi. Est molestiae eaque harum aut. Et dignissimos consequatur ut placeat. Et reiciendis est eaque dolorum. Magnam et inventore voluptates ut. Veniam cupiditate saepe nulla voluptatibus culpa id quaerat. Vero expedita commodi et quaerat provident. Id aut ut omnis deleniti est.','read','2023-10-24 23:43:02','2023-10-24 23:43:02'),(9,'Anissa Bode','smith.brook@example.com','+1 (320) 915-0351','9087 Hoeger Pines\nPort Eloisabury, DE 98681','Debitis et hic eius quia.','Quos quasi ut blanditiis rerum expedita. Facere ea et nihil non qui hic. Illum qui quia et est rerum. Et dolores ut fugiat labore porro voluptatum sequi. At et iusto a vitae et ipsa. Dolores ut eligendi qui placeat qui iusto consequatur. Nesciunt neque sapiente cumque voluptas. Et magni ullam rerum consequatur ipsa. Similique quo consequatur quidem voluptatem eum soluta quia earum. Soluta deserunt consequuntur omnis inventore adipisci.','unread','2023-10-24 23:43:02','2023-10-24 23:43:02'),(10,'Blake Schmidt','christa19@example.com','531-625-8639','1780 Bayer Fall\nTracefort, NJ 55342','Est est quasi corporis iure quibusdam vero nam.','Eos ut deleniti aliquam quas rerum. Ut aspernatur possimus placeat quasi nihil. Dolores odio rem cumque quaerat fuga mollitia dolores. Eveniet qui iusto dignissimos laborum rerum sint dolorum. Voluptatem voluptatem suscipit et doloribus. Non repellendus recusandae esse. Voluptates distinctio amet non rerum officia qui. Asperiores minima iusto officia eligendi. Optio at eaque incidunt dolore doloremque. Sint amet et magni repellendus in voluptates. Praesentium eligendi sed nisi debitis.','read','2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_fields`
--

DROP TABLE IF EXISTS `custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `use_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_for_id` bigint unsigned NOT NULL,
  `field_item_id` bigint unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `custom_fields_field_item_id_index` (`field_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_fields`
--

LOCK TABLES `custom_fields` WRITE;
/*!40000 ALTER TABLE `custom_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_fields_translations`
--

DROP TABLE IF EXISTS `custom_fields_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_fields_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_fields_id` bigint unsigned NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`custom_fields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_fields_translations`
--

LOCK TABLES `custom_fields_translations` WRITE;
/*!40000 ALTER TABLE `custom_fields_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_fields_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_widget_settings`
--

DROP TABLE IF EXISTS `dashboard_widget_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dashboard_widget_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `widget_id` bigint unsigned NOT NULL,
  `order` tinyint unsigned NOT NULL DEFAULT '0',
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_widget_settings_user_id_index` (`user_id`),
  KEY `dashboard_widget_settings_widget_id_index` (`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_widget_settings`
--

LOCK TABLES `dashboard_widget_settings` WRITE;
/*!40000 ALTER TABLE `dashboard_widget_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_widget_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_widgets`
--

DROP TABLE IF EXISTS `dashboard_widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dashboard_widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_widgets`
--

LOCK TABLES `dashboard_widgets` WRITE;
/*!40000 ALTER TABLE `dashboard_widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_widgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `field_groups`
--

DROP TABLE IF EXISTS `field_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `field_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `field_groups_created_by_index` (`created_by`),
  KEY `field_groups_updated_by_index` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_groups`
--

LOCK TABLES `field_groups` WRITE;
/*!40000 ALTER TABLE `field_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_items`
--

DROP TABLE IF EXISTS `field_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `field_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `field_group_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `order` int DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `options` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `field_items_field_group_id_index` (`field_group_id`),
  KEY `field_items_parent_id_index` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_items`
--

LOCK TABLES `field_items` WRITE;
/*!40000 ALTER TABLE `field_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint unsigned NOT NULL DEFAULT '0',
  `order` tinyint unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Perfect','Quibusdam mollitia aspernatur nihil ullam et. Mollitia eligendi consequatur doloribus est. Debitis soluta itaque et qui.',1,0,'galleries/1.jpg',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(2,'New Day','Harum earum assumenda voluptatem distinctio. Veritatis sunt ex perferendis numquam. Quam qui rerum sit odio.',1,0,'galleries/2.jpg',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(3,'Happy Day','Quas exercitationem ab illum est ut. Aut at quidem explicabo praesentium quo.',1,0,'galleries/3.jpg',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(4,'Nature','Maiores ducimus ab explicabo rerum minus nobis. Dolores quia sit harum beatae similique.',1,0,'galleries/4.jpg',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(5,'Morning','Libero exercitationem culpa quaerat qui at. Repellat eaque ut rerum voluptatum accusamus eum dolorem. Veniam sunt nam voluptas beatae.',1,0,'galleries/5.jpg',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(6,'Photography','Ut similique rerum voluptas eum quibusdam. Est aliquid consequatur qui quia culpa. Molestiae fugit iste nobis officiis adipisci nobis numquam.',1,0,'galleries/6.jpg',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries_translations`
--

DROP TABLE IF EXISTS `galleries_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`galleries_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries_translations`
--

LOCK TABLES `galleries_translations` WRITE;
/*!40000 ALTER TABLE `galleries_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_meta`
--

DROP TABLE IF EXISTS `gallery_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_meta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `images` text COLLATE utf8mb4_unicode_ci,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_meta_reference_id_index` (`reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_meta`
--

LOCK TABLES `gallery_meta` WRITE;
/*!40000 ALTER TABLE `gallery_meta` DISABLE KEYS */;
INSERT INTO `gallery_meta` VALUES (1,'[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Voluptatem eligendi quo sunt nesciunt tenetur qui laboriosam omnis. Sed est atque qui molestiae. Deleniti ea veniam officiis voluptas.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Voluptas qui magni nesciunt. Necessitatibus nihil qui nobis provident. Quod ut error quo illum non corporis quod amet.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Libero sunt laborum maiores vel. Aperiam quae ut ut est. Cupiditate voluptatem accusantium necessitatibus sequi.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Amet qui suscipit voluptates est. Et magnam velit eius quidem magnam. Similique odit ut quos eligendi.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Illo consequatur doloremque aspernatur dicta. Eos et tempora molestias. Est commodi ullam cumque dolorem soluta eum.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Itaque at id maiores. Quis non delectus voluptas accusantium officiis.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Pariatur qui corrupti dolor repellat magni voluptatum aut dolore. Ea omnis nobis accusamus officia. Quod non voluptas eos veritatis officia eligendi.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Nemo architecto ea voluptas totam et. Cumque non autem ut culpa. Illum at omnis sed enim voluptatem repellendus. Cum ea officiis qui qui incidunt.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Voluptas illo illum et voluptas. Est sed voluptatibus et vel. Dolorem expedita itaque non magnam cupiditate.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Quod quia laudantium alias numquam vel libero aut. Ullam recusandae est et voluptates incidunt iure voluptatem. Ex suscipit qui et id accusamus et.\"}]',1,'Botble\\Gallery\\Models\\Gallery','2023-10-24 23:42:59','2023-10-24 23:42:59'),(2,'[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Voluptatem eligendi quo sunt nesciunt tenetur qui laboriosam omnis. Sed est atque qui molestiae. Deleniti ea veniam officiis voluptas.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Voluptas qui magni nesciunt. Necessitatibus nihil qui nobis provident. Quod ut error quo illum non corporis quod amet.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Libero sunt laborum maiores vel. Aperiam quae ut ut est. Cupiditate voluptatem accusantium necessitatibus sequi.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Amet qui suscipit voluptates est. Et magnam velit eius quidem magnam. Similique odit ut quos eligendi.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Illo consequatur doloremque aspernatur dicta. Eos et tempora molestias. Est commodi ullam cumque dolorem soluta eum.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Itaque at id maiores. Quis non delectus voluptas accusantium officiis.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Pariatur qui corrupti dolor repellat magni voluptatum aut dolore. Ea omnis nobis accusamus officia. Quod non voluptas eos veritatis officia eligendi.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Nemo architecto ea voluptas totam et. Cumque non autem ut culpa. Illum at omnis sed enim voluptatem repellendus. Cum ea officiis qui qui incidunt.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Voluptas illo illum et voluptas. Est sed voluptatibus et vel. Dolorem expedita itaque non magnam cupiditate.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Quod quia laudantium alias numquam vel libero aut. Ullam recusandae est et voluptates incidunt iure voluptatem. Ex suscipit qui et id accusamus et.\"}]',2,'Botble\\Gallery\\Models\\Gallery','2023-10-24 23:42:59','2023-10-24 23:42:59'),(3,'[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Voluptatem eligendi quo sunt nesciunt tenetur qui laboriosam omnis. Sed est atque qui molestiae. Deleniti ea veniam officiis voluptas.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Voluptas qui magni nesciunt. Necessitatibus nihil qui nobis provident. Quod ut error quo illum non corporis quod amet.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Libero sunt laborum maiores vel. Aperiam quae ut ut est. Cupiditate voluptatem accusantium necessitatibus sequi.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Amet qui suscipit voluptates est. Et magnam velit eius quidem magnam. Similique odit ut quos eligendi.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Illo consequatur doloremque aspernatur dicta. Eos et tempora molestias. Est commodi ullam cumque dolorem soluta eum.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Itaque at id maiores. Quis non delectus voluptas accusantium officiis.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Pariatur qui corrupti dolor repellat magni voluptatum aut dolore. Ea omnis nobis accusamus officia. Quod non voluptas eos veritatis officia eligendi.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Nemo architecto ea voluptas totam et. Cumque non autem ut culpa. Illum at omnis sed enim voluptatem repellendus. Cum ea officiis qui qui incidunt.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Voluptas illo illum et voluptas. Est sed voluptatibus et vel. Dolorem expedita itaque non magnam cupiditate.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Quod quia laudantium alias numquam vel libero aut. Ullam recusandae est et voluptates incidunt iure voluptatem. Ex suscipit qui et id accusamus et.\"}]',3,'Botble\\Gallery\\Models\\Gallery','2023-10-24 23:42:59','2023-10-24 23:42:59'),(4,'[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Voluptatem eligendi quo sunt nesciunt tenetur qui laboriosam omnis. Sed est atque qui molestiae. Deleniti ea veniam officiis voluptas.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Voluptas qui magni nesciunt. Necessitatibus nihil qui nobis provident. Quod ut error quo illum non corporis quod amet.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Libero sunt laborum maiores vel. Aperiam quae ut ut est. Cupiditate voluptatem accusantium necessitatibus sequi.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Amet qui suscipit voluptates est. Et magnam velit eius quidem magnam. Similique odit ut quos eligendi.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Illo consequatur doloremque aspernatur dicta. Eos et tempora molestias. Est commodi ullam cumque dolorem soluta eum.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Itaque at id maiores. Quis non delectus voluptas accusantium officiis.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Pariatur qui corrupti dolor repellat magni voluptatum aut dolore. Ea omnis nobis accusamus officia. Quod non voluptas eos veritatis officia eligendi.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Nemo architecto ea voluptas totam et. Cumque non autem ut culpa. Illum at omnis sed enim voluptatem repellendus. Cum ea officiis qui qui incidunt.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Voluptas illo illum et voluptas. Est sed voluptatibus et vel. Dolorem expedita itaque non magnam cupiditate.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Quod quia laudantium alias numquam vel libero aut. Ullam recusandae est et voluptates incidunt iure voluptatem. Ex suscipit qui et id accusamus et.\"}]',4,'Botble\\Gallery\\Models\\Gallery','2023-10-24 23:42:59','2023-10-24 23:42:59'),(5,'[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Voluptatem eligendi quo sunt nesciunt tenetur qui laboriosam omnis. Sed est atque qui molestiae. Deleniti ea veniam officiis voluptas.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Voluptas qui magni nesciunt. Necessitatibus nihil qui nobis provident. Quod ut error quo illum non corporis quod amet.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Libero sunt laborum maiores vel. Aperiam quae ut ut est. Cupiditate voluptatem accusantium necessitatibus sequi.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Amet qui suscipit voluptates est. Et magnam velit eius quidem magnam. Similique odit ut quos eligendi.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Illo consequatur doloremque aspernatur dicta. Eos et tempora molestias. Est commodi ullam cumque dolorem soluta eum.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Itaque at id maiores. Quis non delectus voluptas accusantium officiis.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Pariatur qui corrupti dolor repellat magni voluptatum aut dolore. Ea omnis nobis accusamus officia. Quod non voluptas eos veritatis officia eligendi.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Nemo architecto ea voluptas totam et. Cumque non autem ut culpa. Illum at omnis sed enim voluptatem repellendus. Cum ea officiis qui qui incidunt.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Voluptas illo illum et voluptas. Est sed voluptatibus et vel. Dolorem expedita itaque non magnam cupiditate.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Quod quia laudantium alias numquam vel libero aut. Ullam recusandae est et voluptates incidunt iure voluptatem. Ex suscipit qui et id accusamus et.\"}]',5,'Botble\\Gallery\\Models\\Gallery','2023-10-24 23:42:59','2023-10-24 23:42:59'),(6,'[{\"img\":\"galleries\\/1.jpg\",\"description\":\"Voluptatem eligendi quo sunt nesciunt tenetur qui laboriosam omnis. Sed est atque qui molestiae. Deleniti ea veniam officiis voluptas.\"},{\"img\":\"galleries\\/2.jpg\",\"description\":\"Voluptas qui magni nesciunt. Necessitatibus nihil qui nobis provident. Quod ut error quo illum non corporis quod amet.\"},{\"img\":\"galleries\\/3.jpg\",\"description\":\"Libero sunt laborum maiores vel. Aperiam quae ut ut est. Cupiditate voluptatem accusantium necessitatibus sequi.\"},{\"img\":\"galleries\\/4.jpg\",\"description\":\"Amet qui suscipit voluptates est. Et magnam velit eius quidem magnam. Similique odit ut quos eligendi.\"},{\"img\":\"galleries\\/5.jpg\",\"description\":\"Illo consequatur doloremque aspernatur dicta. Eos et tempora molestias. Est commodi ullam cumque dolorem soluta eum.\"},{\"img\":\"galleries\\/6.jpg\",\"description\":\"Itaque at id maiores. Quis non delectus voluptas accusantium officiis.\"},{\"img\":\"galleries\\/7.jpg\",\"description\":\"Pariatur qui corrupti dolor repellat magni voluptatum aut dolore. Ea omnis nobis accusamus officia. Quod non voluptas eos veritatis officia eligendi.\"},{\"img\":\"galleries\\/8.jpg\",\"description\":\"Nemo architecto ea voluptas totam et. Cumque non autem ut culpa. Illum at omnis sed enim voluptatem repellendus. Cum ea officiis qui qui incidunt.\"},{\"img\":\"galleries\\/9.jpg\",\"description\":\"Voluptas illo illum et voluptas. Est sed voluptatibus et vel. Dolorem expedita itaque non magnam cupiditate.\"},{\"img\":\"galleries\\/10.jpg\",\"description\":\"Quod quia laudantium alias numquam vel libero aut. Ullam recusandae est et voluptates incidunt iure voluptatem. Ex suscipit qui et id accusamus et.\"}]',6,'Botble\\Gallery\\Models\\Gallery','2023-10-24 23:42:59','2023-10-24 23:42:59');
/*!40000 ALTER TABLE `gallery_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_meta_translations`
--

DROP TABLE IF EXISTS `gallery_meta_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_meta_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_meta_id` bigint unsigned NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`gallery_meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_meta_translations`
--

LOCK TABLES `gallery_meta_translations` WRITE;
/*!40000 ALTER TABLE `gallery_meta_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_meta_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_meta`
--

DROP TABLE IF EXISTS `language_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language_meta` (
  `lang_meta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang_meta_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_meta_origin` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lang_meta_id`),
  KEY `language_meta_reference_id_index` (`reference_id`),
  KEY `meta_code_index` (`lang_meta_code`),
  KEY `meta_origin_index` (`lang_meta_origin`),
  KEY `meta_reference_type_index` (`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_meta`
--

LOCK TABLES `language_meta` WRITE;
/*!40000 ALTER TABLE `language_meta` DISABLE KEYS */;
INSERT INTO `language_meta` VALUES (1,'en_US','57dfed65e432c9d4a09881d021a3addc',1,'Botble\\Menu\\Models\\MenuLocation'),(2,'en_US','26eaba29d32159b4cceb8ed7eeb2eeed',1,'Botble\\Menu\\Models\\Menu'),(3,'en_US','b217dc47baa94afaa44807d8e48ae9b3',2,'Botble\\Menu\\Models\\Menu'),(4,'en_US','53a9e7dc6ccebfe0d9ac064bc348af30',3,'Botble\\Menu\\Models\\Menu');
/*!40000 ALTER TABLE `language_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `lang_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_flag` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_is_default` tinyint unsigned NOT NULL DEFAULT '0',
  `lang_order` int NOT NULL DEFAULT '0',
  `lang_is_rtl` tinyint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  KEY `lang_locale_index` (`lang_locale`),
  KEY `lang_code_index` (`lang_code`),
  KEY `lang_is_default_index` (`lang_is_default`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','en','en_US','us',1,0,0);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_id` bigint unsigned NOT NULL DEFAULT '0',
  `mime_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_files_user_id_index` (`user_id`),
  KEY `media_files_index` (`folder_id`,`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_files`
--

LOCK TABLES `media_files` WRITE;
/*!40000 ALTER TABLE `media_files` DISABLE KEYS */;
INSERT INTO `media_files` VALUES (1,0,'1','1',1,'image/jpeg',33997,'galleries/1.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(2,0,'10','10',1,'image/jpeg',76573,'galleries/10.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(3,0,'2','2',1,'image/jpeg',34422,'galleries/2.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(4,0,'3','3',1,'image/jpeg',52116,'galleries/3.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(5,0,'4','4',1,'image/jpeg',47090,'galleries/4.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(6,0,'5','5',1,'image/jpeg',54420,'galleries/5.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(7,0,'6','6',1,'image/jpeg',32665,'galleries/6.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(8,0,'7','7',1,'image/jpeg',32326,'galleries/7.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(9,0,'8','8',1,'image/jpeg',44869,'galleries/8.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(10,0,'9','9',1,'image/jpeg',54266,'galleries/9.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(11,0,'1','1',2,'image/jpeg',30539,'news/1.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(12,0,'10','10',2,'image/jpeg',32665,'news/10.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(13,0,'11','11',2,'image/jpeg',27172,'news/11.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(14,0,'12','12',2,'image/jpeg',65332,'news/12.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(15,0,'13','13',2,'image/jpeg',31866,'news/13.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(16,0,'14','14',2,'image/jpeg',30404,'news/14.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(17,0,'15','15',2,'image/jpeg',21041,'news/15.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(18,0,'16','16',2,'image/jpeg',46362,'news/16.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(19,0,'2','2',2,'image/jpeg',76573,'news/2.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(20,0,'3','3',2,'image/jpeg',64682,'news/3.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(21,0,'4','4',2,'image/jpeg',55488,'news/4.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(22,0,'5','5',2,'image/jpeg',50780,'news/5.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(23,0,'6','6',2,'image/jpeg',70568,'news/6.jpg','[]','2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(24,0,'7','7',2,'image/jpeg',35710,'news/7.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(25,0,'8','8',2,'image/jpeg',55488,'news/8.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(26,0,'9','9',2,'image/jpeg',44869,'news/9.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(27,0,'1','1',3,'image/jpeg',5890,'members/1.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(28,0,'10','10',3,'image/jpeg',15363,'members/10.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(29,0,'2','2',3,'image/jpeg',8291,'members/2.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(30,0,'3','3',3,'image/jpeg',10888,'members/3.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(31,0,'4','4',3,'image/jpeg',12403,'members/4.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(32,0,'5','5',3,'image/jpeg',7348,'members/5.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(33,0,'6','6',3,'image/jpeg',6831,'members/6.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(34,0,'7','7',3,'image/jpeg',11121,'members/7.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(35,0,'8','8',3,'image/jpeg',10576,'members/8.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL),(36,0,'9','9',3,'image/jpeg',2915,'members/9.jpg','[]','2023-10-24 23:43:00','2023-10-24 23:43:00',NULL);
/*!40000 ALTER TABLE `media_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_folders`
--

DROP TABLE IF EXISTS `media_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_folders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_folders_user_id_index` (`user_id`),
  KEY `media_folders_index` (`parent_id`,`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_folders`
--

LOCK TABLES `media_folders` WRITE;
/*!40000 ALTER TABLE `media_folders` DISABLE KEYS */;
INSERT INTO `media_folders` VALUES (1,0,'galleries','galleries',0,'2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(2,0,'news','news',0,'2023-10-24 23:42:59','2023-10-24 23:42:59',NULL),(3,0,'members','members',0,'2023-10-24 23:43:00','2023-10-24 23:43:00',NULL);
/*!40000 ALTER TABLE `media_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_settings`
--

DROP TABLE IF EXISTS `media_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `media_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_settings`
--

LOCK TABLES `media_settings` WRITE;
/*!40000 ALTER TABLE `media_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_activity_logs`
--

DROP TABLE IF EXISTS `member_activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `reference_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(39) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_activity_logs_member_id_index` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_activity_logs`
--

LOCK TABLES `member_activity_logs` WRITE;
/*!40000 ALTER TABLE `member_activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_password_resets`
--

DROP TABLE IF EXISTS `member_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `member_password_resets_email_index` (`email`),
  KEY `member_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_password_resets`
--

LOCK TABLES `member_password_resets` WRITE;
/*!40000 ALTER TABLE `member_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_id` bigint unsigned DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `email_verify_token` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'John','Smith','I only wish it was,\' the.',NULL,'john.smith@botble.com','$2y$12$nDPeuqMySej4b4Gdi9ucVeAnNbAgRFfbINaVv9FRyEEyqqkWYIhhK',27,'1997-09-03','1-828-793-6683','2023-10-25 06:43:00',NULL,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(2,'Kenna','Daniel','Mock Turtle. \'No, no! The.',NULL,'abelardo83@sauer.info','$2y$12$91b5gMcZRpYrlWeJEd13wOIVs84Uuh8zV7x0sOZD7qnJGagSoM3z6',28,'2013-12-22','+1.928.338.0221','2023-10-25 06:43:01',NULL,NULL,'2023-10-24 23:43:01','2023-10-24 23:43:01'),(3,'Erna','Kling','CHAPTER VI. Pig and Pepper.',NULL,'jharris@beier.com','$2y$12$01.i1G9G3vqYr9dlHP9r7.Ogzp594UGXPCBXj6sz3R9QHn5yLECve',29,'1991-03-09','321-562-3880','2023-10-25 06:43:01',NULL,NULL,'2023-10-24 23:43:01','2023-10-24 23:43:01'),(4,'Brain','Kiehn','Hatter opened his eyes were.',NULL,'samanta.cormier@smith.net','$2y$12$eN43zRtanGV4iT3IBcetFuhDVJyE6JALLsnpb5eJcAv/7qopHHdeq',30,'2013-06-04','743-326-4725','2023-10-25 06:43:01',NULL,NULL,'2023-10-24 23:43:01','2023-10-24 23:43:01'),(5,'Luis','Rolfson','Mock Turtle. \'No, no! The.',NULL,'kozey.lysanne@yahoo.com','$2y$12$Lyz41MmMEBA1REagPQxvjui5wfbC01ZaAYdSBFJRmZJxvOCcqD1WG',31,'2006-02-12','+1.352.398.0925','2023-10-25 06:43:01',NULL,NULL,'2023-10-24 23:43:01','2023-10-24 23:43:01'),(6,'Jerome','Batz','She drew her foot slipped.',NULL,'uharber@sipes.org','$2y$12$K1CParvxjvE715aZQBtWOOWoFAHIBUePaNJBGoeyIjzUkA8b4Z/E2',32,'1996-10-01','+1-731-824-3047','2023-10-25 06:43:01',NULL,NULL,'2023-10-24 23:43:01','2023-10-24 23:43:01'),(7,'Betty','D\'Amore','And the muscular strength.',NULL,'schimmel.wellington@nolan.com','$2y$12$TaehjxT65SxCve4zaMT/YufB/MdlAZLzuocjagqncLqVKAF.cAasW',33,'1992-01-14','+1-573-440-6929','2023-10-25 06:43:02',NULL,NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(8,'Layla','Bartoletti','Queen, the royal children.',NULL,'khagenes@graham.biz','$2y$12$.fEHBJXHJyDUUAdSDekVS.7jIt8a9vSuaqW6u7QbtRHgOSZQwFuz2',34,'2006-03-28','+1.564.240.4977','2023-10-25 06:43:02',NULL,NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(9,'Aditya','Jaskolski','WOULD go with Edgar Atheling.',NULL,'filomena.maggio@cole.info','$2y$12$8FJfmrq/McCMl9bzmnuBBO/y2eDGWnrZsZ0dnf3wOQLhuoFmpuREy',35,'1979-04-10','+1-534-784-6381','2023-10-25 06:43:02',NULL,NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(10,'Carissa','Prosacco','Bill had left off when they.',NULL,'predovic.marie@mcclure.net','$2y$12$TNt1xgG6egEa3/AY/6dKCeTWan9/ffdvFd/ypvv6DnLHeCdiF1tFa',36,'1973-02-03','203-254-8526','2023-10-25 06:43:02',NULL,NULL,'2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_locations`
--

DROP TABLE IF EXISTS `menu_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `location` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_locations_menu_id_created_at_index` (`menu_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_locations`
--

LOCK TABLES `menu_locations` WRITE;
/*!40000 ALTER TABLE `menu_locations` DISABLE KEYS */;
INSERT INTO `menu_locations` VALUES (1,1,'main-menu','2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `menu_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_nodes`
--

DROP TABLE IF EXISTS `menu_nodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_nodes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned NOT NULL DEFAULT '0',
  `reference_id` bigint unsigned DEFAULT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_font` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `has_child` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_nodes_menu_id_index` (`menu_id`),
  KEY `menu_nodes_parent_id_index` (`parent_id`),
  KEY `reference_id` (`reference_id`),
  KEY `reference_type` (`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_nodes`
--

LOCK TABLES `menu_nodes` WRITE;
/*!40000 ALTER TABLE `menu_nodes` DISABLE KEYS */;
INSERT INTO `menu_nodes` VALUES (1,1,0,NULL,NULL,'/',NULL,0,'Home',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(2,1,0,NULL,NULL,'https://botble.com/go/download-cms',NULL,0,'Purchase',NULL,'_blank',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(3,1,0,2,'Botble\\Page\\Models\\Page','/blog',NULL,0,'Blog',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(4,1,0,5,'Botble\\Page\\Models\\Page','/galleries',NULL,0,'Galleries',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(5,1,0,3,'Botble\\Page\\Models\\Page','/contact',NULL,0,'Contact',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(6,2,0,2,'Botble\\Blog\\Models\\Category','/lifestyle',NULL,0,'Lifestyle',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(7,2,0,3,'Botble\\Blog\\Models\\Category','/travel-tips',NULL,0,'Travel Tips',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(8,2,0,4,'Botble\\Blog\\Models\\Category','/healthy',NULL,0,'Healthy',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(9,2,0,6,'Botble\\Blog\\Models\\Category','/hotel',NULL,0,'Hotel',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(10,2,0,7,'Botble\\Blog\\Models\\Category','/nature',NULL,0,'Nature',NULL,'_self',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(11,3,0,NULL,NULL,'https://facebook.com','fab fa-facebook',0,'Facebook',NULL,'_blank',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(12,3,0,NULL,NULL,'https://twitter.com','fab fa-twitter',0,'Twitter',NULL,'_blank',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(13,3,0,NULL,NULL,'https://github.com','fab fa-github',0,'GitHub',NULL,'_blank',0,'2023-10-24 23:43:02','2023-10-24 23:43:02'),(14,3,0,NULL,NULL,'https://linkedin.com','fab fa-linkedin',0,'Linkedin',NULL,'_blank',0,'2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `menu_nodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Main menu','main-menu','published','2023-10-24 23:43:02','2023-10-24 23:43:02'),(2,'Featured Categories','featured-categories','published','2023-10-24 23:43:02','2023-10-24 23:43:02'),(3,'Social','social','published','2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_boxes`
--

DROP TABLE IF EXISTS `meta_boxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meta_boxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_boxes_reference_id_index` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_boxes`
--

LOCK TABLES `meta_boxes` WRITE;
/*!40000 ALTER TABLE `meta_boxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_boxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_04_09_032329_create_base_tables',1),(2,'2013_04_09_062329_create_revisions_table',1),(3,'2014_10_12_000000_create_users_table',1),(4,'2014_10_12_100000_create_password_reset_tokens_table',1),(5,'2015_06_18_033822_create_blog_table',1),(6,'2015_06_29_025744_create_audit_history',1),(7,'2016_05_28_112028_create_system_request_logs_table',1),(8,'2016_06_10_230148_create_acl_tables',1),(9,'2016_06_14_230857_create_menus_table',1),(10,'2016_06_17_091537_create_contacts_table',1),(11,'2016_06_28_221418_create_pages_table',1),(12,'2016_10_03_032336_create_languages_table',1),(13,'2016_10_05_074239_create_setting_table',1),(14,'2016_10_07_193005_create_translations_table',1),(15,'2016_10_13_150201_create_galleries_table',1),(16,'2016_11_28_032840_create_dashboard_widget_tables',1),(17,'2016_12_16_084601_create_widgets_table',1),(18,'2017_02_13_034601_create_blocks_table',1),(19,'2017_03_27_150646_re_create_custom_field_tables',1),(20,'2017_05_09_070343_create_media_tables',1),(21,'2017_10_04_140938_create_member_table',1),(22,'2017_11_03_070450_create_slug_table',1),(23,'2019_01_05_053554_create_jobs_table',1),(24,'2019_08_19_000000_create_failed_jobs_table',1),(25,'2019_12_14_000001_create_personal_access_tokens_table',1),(26,'2021_02_16_092633_remove_default_value_for_author_type',1),(27,'2021_10_25_021023_fix-priority-load-for-language-advanced',1),(28,'2021_12_03_030600_create_blog_translations',1),(29,'2021_12_03_075608_create_page_translations',1),(30,'2021_12_03_081327_create_blocks_translations',1),(31,'2021_12_03_082953_create_gallery_translations',1),(32,'2022_04_19_113923_add_index_to_table_posts',1),(33,'2022_04_20_100851_add_index_to_media_table',1),(34,'2022_04_20_101046_add_index_to_menu_table',1),(35,'2022_04_30_030807_table_custom_fields_translation_table',1),(36,'2022_04_30_034048_create_gallery_meta_translations_table',1),(37,'2022_07_10_034813_move_lang_folder_to_root',1),(38,'2022_08_04_051940_add_missing_column_expires_at',1),(39,'2022_09_01_000001_create_admin_notifications_tables',1),(40,'2022_10_14_024629_drop_column_is_featured',1),(41,'2022_11_18_063357_add_missing_timestamp_in_table_settings',1),(42,'2022_12_02_093615_update_slug_index_columns',1),(43,'2023_01_30_024431_add_alt_to_media_table',1),(44,'2023_02_16_042611_drop_table_password_resets',1),(45,'2023_04_23_005903_add_column_permissions_to_admin_notifications',1),(46,'2023_05_10_075124_drop_column_id_in_role_users_table',1),(47,'2023_07_06_011444_create_slug_translations_table',1),(48,'2023_08_21_090810_make_page_content_nullable',1),(49,'2023_08_29_074620_make_column_author_id_nullable',1),(50,'2023_08_29_075308_make_column_user_id_nullable',1),(51,'2023_09_14_021936_update_index_for_slugs_table',1),(52,'2023_09_14_022423_add_index_for_language_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Homepage','<div>[featured-posts][/featured-posts]</div><div>[recent-posts title=\"What\'s new?\"][/recent-posts]</div><div>[featured-categories-posts title=\"Best for you\" category_id=\"2\"][/featured-categories-posts]</div><div>[all-galleries limit=\"8\" title=\"Galleries\"][/all-galleries]</div>',NULL,NULL,'no-sidebar',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(2,'Blog','---',NULL,NULL,'default',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(3,'Contact','<p>Address: North Link Building, 10 Admiralty Street, 757695 Singapore</p><p>Hotline: 18006268</p><p>Email: contact@botble.com</p><p>[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]</p><p>For the fastest reply, please use the contact form below.</p><p>[contact-form][/contact-form]</p>',NULL,NULL,'default',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(4,'Cookie Policy','<h3>EU Cookie Consent</h3><p>To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.</p><h4>Essential Data</h4><p>The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.</p><p>- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.</p><p>- XSRF-Token Cookie: Laravel automatically generates a CSRF \"token\" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>',NULL,NULL,'default',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59'),(5,'Galleries','<div>[gallery title=\"Galleries\"][/gallery]</div>',NULL,NULL,'default',NULL,'published','2023-10-24 23:42:59','2023-10-24 23:42:59');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_translations`
--

DROP TABLE IF EXISTS `pages_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`pages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_translations`
--

LOCK TABLES `pages_translations` WRITE;
/*!40000 ALTER TABLE `pages_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_categories` (
  `category_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  KEY `post_categories_category_id_index` (`category_id`),
  KEY `post_categories_post_id_index` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
INSERT INTO `post_categories` VALUES (1,1),(5,1),(4,2),(7,2),(4,3),(5,3),(1,4),(5,4),(4,5),(5,5),(1,6),(5,6),(4,7),(7,7),(4,8),(5,8),(3,9),(5,9),(1,10),(6,10),(2,11),(7,11),(3,12),(7,12),(4,13),(6,13),(4,14),(7,14),(1,15),(5,15),(1,16),(6,16);
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tags` (
  `tag_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  KEY `post_tags_tag_id_index` (`tag_id`),
  KEY `post_tags_post_id_index` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tags`
--

LOCK TABLES `post_tags` WRITE;
/*!40000 ALTER TABLE `post_tags` DISABLE KEYS */;
INSERT INTO `post_tags` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(1,2),(2,2),(3,2),(4,2),(5,2),(1,3),(2,3),(3,3),(4,3),(5,3),(1,4),(2,4),(3,4),(4,4),(5,4),(1,5),(2,5),(3,5),(4,5),(5,5),(1,6),(2,6),(3,6),(4,6),(5,6),(1,7),(2,7),(3,7),(4,7),(5,7),(1,8),(2,8),(3,8),(4,8),(5,8),(1,9),(2,9),(3,9),(4,9),(5,9),(1,10),(2,10),(3,10),(4,10),(5,10),(1,11),(2,11),(3,11),(4,11),(5,11),(1,12),(2,12),(3,12),(4,12),(5,12),(1,13),(2,13),(3,13),(4,13),(5,13),(1,14),(2,14),(3,14),(4,14),(5,14),(1,15),(2,15),(3,15),(4,15),(5,15),(1,16),(2,16),(3,16),(4,16),(5,16);
/*!40000 ALTER TABLE `post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` bigint unsigned DEFAULT NULL,
  `author_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `is_featured` tinyint unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int unsigned NOT NULL DEFAULT '0',
  `format_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_status_index` (`status`),
  KEY `posts_author_id_index` (`author_id`),
  KEY `posts_author_type_index` (`author_type`),
  KEY `posts_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'The Top 2020 Handbag Trends to Know','Et et fuga nemo mollitia nostrum dolores enim. Cupiditate facilis ipsa est vel. Qui eos pariatur ut voluptatibus ea id nihil. Id sunt ipsa ut accusamus et rem.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Rabbit noticed Alice, as she had but to her very much of a well?\' \'Take some more of the jurymen. \'It isn\'t mine,\' said the others. \'We must burn the house opened, and a long way back, and see after some executions I have none, Why, I haven\'t had a head unless there was silence for some way, and nothing seems to be in a very deep well. Either the well was very glad to do it?\' \'In my youth,\' said his father, \'I took to the little golden key, and unlocking the door with his head!\' or \'Off with his knuckles. It was the White Rabbit hurried by--the frightened Mouse splashed his way through the neighbouring pool--she could hear the very middle of one! There ought to be sure; but I hadn\'t quite finished my tea when I learn music.\' \'Ah! that accounts for it,\' said Alice. \'Anything you like,\' said the King, \'and don\'t look at them--\'I wish they\'d get the trial done,\' she thought, and looked into its eyes by this time). \'Don\'t grunt,\' said Alice; \'I must be on the slate. \'Herald, read the.</p><p class=\"text-center\"><img src=\"/storage/news/5-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice was too small, but at the stick, running a very fine day!\' said a timid and tremulous sound.] \'That\'s different from what I used to it as you liked.\' \'Is that the Mouse to tell me the list of the trees had a large pigeon had flown into her head. Still she went on again: \'Twenty-four hours, I THINK; or is it twelve? I--\' \'Oh, don\'t talk about wasting IT. It\'s HIM.\' \'I don\'t quite understand you,\' she said, by way of expecting nothing but out-of-the-way things to happen, that it might tell.</p><p class=\"text-center\"><img src=\"/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>In a minute or two she walked sadly down the chimney?--Nay, I shan\'t! YOU do it!--That I won\'t, then!--Bill\'s to go among mad people,\' Alice remarked. \'Oh, you can\'t help that,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know what \"it\" means well enough, when I breathe\"!\' \'It IS the fun?\' said Alice. \'Oh, don\'t talk about cats or dogs either, if you wouldn\'t mind,\' said Alice: \'besides, that\'s not a regular rule: you invented it just missed her. Alice caught the flamingo and brought it back, the fight was over, and both creatures hid their faces in their mouths--and they\'re all over their slates; \'but it doesn\'t understand English,\' thought Alice; but she did not quite like the look of the other players, and shouting \'Off with his head!\' or \'Off with their hands and feet, to make out at the top with its legs hanging down, but generally, just as I was thinking I should think!\' (Dinah was the fan and gloves, and, as a boon, Was kindly permitted to pocket the.</p><p class=\"text-center\"><img src=\"/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Mock Turtle is.\' \'It\'s the thing yourself, some winter day, I will tell you how it was perfectly round, she came upon a little way out of the March Hare, who had been all the rats and--oh dear!\' cried Alice, quite forgetting that she was now more than Alice could see, when she had put on your shoes and stockings for you now, dears? I\'m sure she\'s the best way to hear the very tones of the wood to listen. \'Mary Ann! Mary Ann!\' said the Mock Turtle sighed deeply, and drew the back of one flapper across his eyes. \'I wasn\'t asleep,\' he said in a deep voice, \'What are you getting on now, my dear?\' it continued, turning to the door. \'Call the next moment a shower of saucepans, plates, and dishes. The Duchess took no notice of them attempted to explain it is all the jurors had a bone in his turn; and both the hedgehogs were out of the evening, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful.</p>','published',NULL,'Botble\\ACL\\Models\\User',1,'news/1.jpg',672,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(2,'Top Search Engine Optimization Strategies!','Laboriosam ab quo laborum eveniet nesciunt. Voluptas error voluptates tenetur in veniam. Et incidunt beatae aliquam et vitae. Eius aperiam hic voluptatum veritatis et.','<p>Queen will hear you! You see, she came upon a heap of sticks and dry leaves, and the poor little thing was to twist it up into a large caterpillar, that was said, and went to school every day--\' \'I\'VE been to a mouse, you know. Come on!\' So they began running about in a tone of the Lizard\'s slate-pencil, and the poor child, \'for I never understood what it was: at first was moderate. But the snail replied \"Too far, too far!\" and gave a little way off, and Alice could see, when she noticed a curious croquet-ground in her brother\'s Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse gave a little three-legged table, all made of solid glass; there was no one to listen to me! When I used to do:-- \'How doth the little--\"\' and she tried the effect of lying down on one of the table, but there was no \'One, two, three, and away,\' but they began moving about again, and Alice called out in a rather offended tone, \'Hm! No accounting for tastes! Sing her \"Turtle Soup,\".</p><p class=\"text-center\"><img src=\"/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice as she could, for the next thing is, to get her head to hide a smile: some of the house, and wondering whether she ought not to her, so she set to work very carefully, nibbling first at one corner of it: \'No room! No room!\' they cried out when they passed too close, and waving their forepaws to mark the time, while the rest of the wood to listen. \'Mary Ann! Mary Ann!\' said the Duchess: \'and the moral of that dark hall, and wander about among those beds of bright flowers and the White.</p><p class=\"text-center\"><img src=\"/storage/news/10-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>The hedgehog was engaged in a tone of this ointment--one shilling the box-- Allow me to introduce some other subject of conversation. While she was now the right words,\' said poor Alice, \'to speak to this last word two or three times over to the Gryphon. \'--you advance twice--\' \'Each with a sudden burst of tears, \'I do wish I hadn\'t mentioned Dinah!\' she said this, she came rather late, and the soldiers had to leave off this minute!\' She generally gave herself very good height indeed!\' said the last time she had not a moment like a telescope.\' And so it was only the pepper that had fallen into the air. This time there could be NO mistake about it: it was a sound of many footsteps, and Alice was a good deal: this fireplace is narrow, to be a very fine day!\' said a whiting before.\' \'I can tell you my history, and you\'ll understand why it is almost certain to disagree with you, sooner or later. However, this bottle was NOT marked \'poison,\' it is almost certain to disagree with you.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice was very fond of beheading people here; the great puzzle!\' And she began fancying the sort of thing that would happen: \'\"Miss Alice! Come here directly, and get ready for your walk!\" \"Coming in a great crowd assembled about them--all sorts of things--I can\'t remember things as I used--and I don\'t believe it,\' said the Duchess, \'and that\'s a fact.\' Alice did not like to see a little scream of laughter. \'Oh, hush!\' the Rabbit hastily interrupted. \'There\'s a great many teeth, so she went on, \'and most things twinkled after that--only the March Hare moved into the garden with one eye; \'I seem to have wondered at this, but at last in the prisoner\'s handwriting?\' asked another of the bill, \"French, music, AND WASHING--extra.\"\' \'You couldn\'t have done just as well. The twelve jurors were all writing very busily on slates. \'What are they made of?\' \'Pepper, mostly,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know what you were or might have been a holiday?\' \'Of.</p>','published',NULL,'Botble\\ACL\\Models\\User',1,'news/2.jpg',1670,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(3,'Which Company Would You Choose?','Aliquid labore unde sed suscipit. In eaque labore necessitatibus tempora eos consequatur impedit. Est ducimus qui nemo quo nisi earum laborum.','<p>Alice, that she had wept when she next peeped out the Fish-Footman was gone, and, by the hedge!\' then silence, and then Alice dodged behind a great many more than nine feet high. \'I wish I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, as we were. My notion was that you had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it made Alice quite jumped; but she had got its neck nicely straightened out, and was just in time to wash the things between whiles.\' \'Then you shouldn\'t talk,\' said the Gryphon. \'We can do no more, whatever happens. What WILL become of it; then Alice, thinking it was the Rabbit began. Alice thought the poor little thing grunted in reply (it had left off writing on his slate with one of the cattle in the pool of tears which she had been for some time without hearing anything more: at.</p><p class=\"text-center\"><img src=\"/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice soon began talking again. \'Dinah\'ll miss me very much pleased at having found out that it might appear to others that what you would have called him a fish)--and rapped loudly at the Hatter, \'when the Queen in front of the moment they saw her, they hurried back to yesterday, because I was thinking I should think you\'ll feel it a bit, if you could manage it?) \'And what are they made of?\' \'Pepper, mostly,\' said the King. \'Shan\'t,\' said the Knave, \'I didn\'t write it, and they can\'t prove I.</p><p class=\"text-center\"><img src=\"/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice: \'I don\'t see any wine,\' she remarked. \'It tells the day and night! You see the Queen. \'Their heads are gone, if it had struck her foot! She was walking hand in hand, in couples: they were getting extremely small for a conversation. Alice felt a little pattering of feet on the back. However, it was done. They had not as yet had any sense, they\'d take the roof was thatched with fur. It was so large in the air. Even the Duchess asked, with another dig of her hedgehog. The hedgehog was engaged in a natural way again. \'I should think you could draw treacle out of THIS!\' (Sounds of more broken glass.) \'Now tell me, please, which way I ought to be lost: away went Alice after it, \'Mouse dear! Do come back and finish your story!\' Alice called after her. \'I\'ve something important to say!\' This sounded promising, certainly: Alice turned and came back again. \'Keep your temper,\' said the King, and the whole pack rose up into the Dormouse\'s place, and Alice heard the Queen say only.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Queen\'s shrill cries to the door, staring stupidly up into a doze; but, on being pinched by the Hatter, and, just as she fell past it. \'Well!\' thought Alice \'without pictures or conversations in it, and found quite a long time with great emphasis, looking hard at Alice as he spoke, \'we were trying--\' \'I see!\' said the Pigeon. \'I can tell you my history, and you\'ll understand why it is to give the prizes?\' quite a long silence after this, and Alice rather unwillingly took the cauldron of soup off the fire, and at last came a little way out of sight; and an Eaglet, and several other curious creatures. Alice led the way, was the matter on, What would become of you? I gave her one, they gave him two, You gave us three or more; They all returned from him to you, Though they were gardeners, or soldiers, or courtiers, or three pairs of tiny white kid gloves: she took courage, and went on without attending to her, \'if we had the best cat in the air: it puzzled her a good way off, and she.</p>','published',NULL,'Botble\\ACL\\Models\\User',1,'news/3.jpg',2319,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(4,'Used Car Dealer Sales Tricks Exposed','Animi natus laboriosam eligendi quas neque. Eum odio adipisci ut sequi eius. Et occaecati aut est. Consectetur aut voluptatum reiciendis ut ab.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Queen. \'I haven\'t the slightest idea,\' said the King, \'or I\'ll have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and went by without noticing her. Then followed the Knave \'Turn them over!\' The Knave did so, and were quite silent, and looked at the picture.) \'Up, lazy thing!\' said the Gryphon. \'Well, I should think you could only see her. She is such a thing before, but she could not think of nothing else to do, and perhaps as this before, never! And I declare it\'s too bad, that it seemed quite natural to Alice as he came, \'Oh! the Duchess, who seemed to be an advantage,\' said Alice, as she could guess, she was ready to sink into the wood. \'If it had grown up,\' she said to herself, and once again the tiny hands were clasped upon her arm, and timidly said \'Consider, my dear: she is such a nice soft thing to eat some of them even when they met in the direction it pointed to, without trying to box her own ears for having missed their turns, and she did not.</p><p class=\"text-center\"><img src=\"/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>On every golden scale! \'How cheerfully he seems to be an old Turtle--we used to do:-- \'How doth the little--\"\' and she felt that it was certainly not becoming. \'And that\'s the queerest thing about it.\' (The jury all wrote down all three dates on their throne when they saw the Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon repeated impatiently: \'it begins \"I passed by his face only, she would have done that, you know,\' the Mock Turtle replied; \'and then the Mock.</p><p class=\"text-center\"><img src=\"/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>It was opened by another footman in livery, with a round face, and was going on, as she could, for the moment she appeared on the whole court was a dead silence instantly, and neither of the cupboards as she could do to come upon them THIS size: why, I should have croqueted the Queen\'s shrill cries to the jury, who instantly made a rush at the bottom of a muchness\"--did you ever saw. How she longed to change the subject of conversation. \'Are you--are you fond--of--of dogs?\' The Mouse only shook its head to feel very uneasy: to be sure, this generally happens when one eats cake, but Alice had been broken to pieces. \'Please, then,\' said the King, and the Queen\'s ears--\' the Rabbit was no use speaking to a shriek, \'and just as the question was evidently meant for her. \'Yes!\' shouted Alice. \'Come on, then,\' said Alice, (she had grown so large a house, that she hardly knew what she was surprised to see if there are, nobody attends to them--and you\'ve no idea what to say it any longer than.</p><p class=\"text-center\"><img src=\"/storage/news/11-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice remained looking thoughtfully at the stick, and tumbled head over heels in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went in. The door led right into it. \'That\'s very important,\' the King say in a great deal to ME,\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat in a moment: she looked down at them, and the pair of boots every Christmas.\' And she opened the door as you can--\' \'Swim after them!\' screamed the Queen. \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a hatter.\' Here the Queen was silent. The Dormouse slowly opened his eyes. \'I wasn\'t asleep,\' he said do. Alice looked all round her once more, while the Mock Turtle. \'Very much indeed,\' said Alice. \'Of course not,\' said Alice to herself. \'Shy, they seem to dry me at all.\' \'In that case,\' said the Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon whispered in a tone of great dismay, and began talking again. \'Dinah\'ll miss me.</p>','published',NULL,'Botble\\ACL\\Models\\User',1,'news/4.jpg',925,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(5,'20 Ways To Sell Your Product Faster','Molestiae dolorum atque deserunt. Autem ut possimus libero voluptatem et. Possimus harum est rem molestiae.','<p>Mary Ann, and be turned out of its mouth, and addressed her in such confusion that she had not as yet had any sense, they\'d take the hint; but the Dormouse go on for some way of expressing yourself.\' The baby grunted again, and the shrill voice of the gloves, and she crossed her hands on her hand, and made a rush at the bottom of the legs of the gloves, and was coming back to the jury, of course--\"I GAVE HER ONE, THEY GAVE HIM TWO--\" why, that must be collected at once took up the little golden key and hurried upstairs, in great fear lest she should meet the real Mary Ann, what ARE you talking to?\' said the Caterpillar. \'Well, I\'ve tried hedges,\' the Pigeon the opportunity of taking it away. She did it so VERY nearly at the jury-box, or they would call after her: the last word two or three of her voice. Nobody moved. \'Who cares for fish, Game, or any other dish? Who would not stoop? Soup of the Queen\'s hedgehog just now, only it ran away when it grunted again, and she thought it must.</p><p class=\"text-center\"><img src=\"/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>March Hare, who had spoken first. \'That\'s none of my own. I\'m a deal faster than it does.\' \'Which would NOT be an advantage,\' said Alice, (she had grown up,\' she said to herself; \'his eyes are so VERY tired of this. I vote the young Crab, a little hot tea upon its forehead (the position in which you usually see Shakespeare, in the pool, \'and she sits purring so nicely by the time they were playing the Queen put on his knee, and the bright flower-beds and the Queen\'s absence, and were resting.</p><p class=\"text-center\"><img src=\"/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice, very earnestly. \'I\'ve had nothing yet,\' Alice replied eagerly, for she was ever to get in?\' asked Alice again, for really I\'m quite tired and out of it, and behind it was over at last: \'and I do so like that curious song about the games now.\' CHAPTER X. The Lobster Quadrille The Mock Turtle recovered his voice, and, with tears again as she spoke; \'either you or your head must be getting home; the night-air doesn\'t suit my throat!\' and a Canary called out \'The Queen! The Queen!\' and the little passage: and THEN--she found herself at last she spread out her hand again, and we won\'t talk about cats or dogs either, if you drink much from a Caterpillar The Caterpillar and Alice called after it; and the Queen\'s ears--\' the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at Alice, and sighing. \'It IS a long silence after this, and she crossed her hands up to her that she never knew whether it was certainly not becoming. \'And that\'s the jury-box,\' thought Alice.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Hatter, and here the Mock Turtle in the distance. \'And yet what a wonderful dream it had been, it suddenly appeared again. \'By-the-bye, what became of the tea--\' \'The twinkling of the March Hare moved into the air, mixed up with the tarts, you know--\' She had quite forgotten the Duchess was VERY ugly; and secondly, because she was trying to box her own child-life, and the others looked round also, and all dripping wet, cross, and uncomfortable. The first thing she heard the Rabbit came near her, she began, in a moment: she looked down at her hands, and began:-- \'You are all dry, he is gay as a last resource, she put it. She felt that it was perfectly round, she came upon a time she found her way out. \'I shall be late!\' (when she thought it must be off, and she set to work nibbling at the mushroom (she had grown in the direction it pointed to, without trying to make personal remarks,\' Alice said to herself, \'to be going messages for a good thing!\' she said this, she noticed a curious.</p>','published',NULL,'Botble\\ACL\\Models\\User',1,'news/5.jpg',2171,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(6,'The Secrets Of Rich And Famous Writers','Eum et veniam corrupti voluptas omnis. Architecto qui perspiciatis quos corrupti. Ab quia impedit rerum. Sapiente quis et illo necessitatibus unde optio voluptatum.','<p>Gryphon: and it said nothing. \'This here young lady,\' said the Cat; and this was of very little way off, panting, with its wings. \'Serpent!\' screamed the Gryphon. \'It\'s all about as she was a bright idea came into Alice\'s head. \'Is that the Mouse heard this, it turned round and round Alice, every now and then another confusion of voices--\'Hold up his head--Brandy now--Don\'t choke him--How was it, old fellow? What happened to you? Tell us all about it!\' and he wasn\'t one?\' Alice asked. The Hatter shook his head off outside,\' the Queen put on his slate with one elbow against the door, staring stupidly up into a doze; but, on being pinched by the Hatter, and he checked himself suddenly: the others all joined in chorus, \'Yes, please do!\' but the Dodo solemnly, rising to its feet, \'I move that the mouse to the other side of the house, and found in it about four feet high. \'Whoever lives there,\' thought Alice, \'it\'ll never do to ask: perhaps I shall be late!\' (when she thought it must be a.</p><p class=\"text-center\"><img src=\"/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Duchess said to herself, \'if one only knew how to spell \'stupid,\' and that you weren\'t to talk to.\' \'How are you getting on?\' said the Caterpillar. \'I\'m afraid I am, sir,\' said Alice; \'living at the thought that she looked down, was an old Crab took the thimble, saying \'We beg your pardon!\' cried Alice hastily, afraid that she had read several nice little histories about children who had not gone much farther before she gave one sharp kick, and waited till she had forgotten the words.\' So they.</p><p class=\"text-center\"><img src=\"/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Hatter went on, \'and most of \'em do.\' \'I don\'t see,\' said the youth, \'and your jaws are too weak For anything tougher than suet; Yet you finished the goose, with the bread-and-butter getting so used to read fairy-tales, I fancied that kind of rule, \'and vinegar that makes people hot-tempered,\' she went on to her ear, and whispered \'She\'s under sentence of execution.\' \'What for?\' said the Hatter, \'or you\'ll be telling me next that you have of putting things!\' \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'I don\'t think they play at all anxious to have wondered at this, she came rather late, and the Panther were sharing a pie--\' [later editions continued as follows The Panther took pie-crust, and gravy, and meat, While the Owl and the sounds will take care of the baby?\' said the Queen. \'Well, I shan\'t grow any more--As it is, I can\'t be civil, you\'d better leave off,\' said the Rabbit in a furious passion, and went on talking: \'Dear, dear! How queer everything is to-day! And.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice said to herself; \'I should like to go through next walking about at the sides of it; so, after hunting all about for some minutes. Alice thought she might as well say,\' added the Hatter, and, just as I\'d taken the highest tree in the back. However, it was done. They had not gone (We know it was very nearly in the sun. (IF you don\'t like them!\' When the pie was all about, and called out, \'Sit down, all of them didn\'t know that cats COULD grin.\' \'They all can,\' said the Duchess; \'and most things twinkled after that--only the March Hare: she thought it had come back in their paws. \'And how do you mean by that?\' said the Cat; and this was not a regular rule: you invented it just missed her. Alice caught the flamingo and brought it back, the fight was over, and she ran with all their simple sorrows, and find a number of changes she had not gone much farther before she found to be no chance of her ever getting out of breath, and till the Pigeon went on, turning to Alice, that she.</p>','published',NULL,'Botble\\ACL\\Models\\User',1,'news/6.jpg',2500,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(7,'Imagine Losing 20 Pounds In 14 Days!','Aliquam fugit quia est eum. Cumque excepturi eaque nam praesentium quam.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>VERY nearly at the top of his great wig.\' The judge, by the White Rabbit, \'and that\'s a fact.\' Alice did not much like keeping so close to her ear, and whispered \'She\'s under sentence of execution. Then the Queen merely remarking that a red-hot poker will burn you if you were down here till I\'m somebody else\"--but, oh dear!\' cried Alice, with a knife, it usually bleeds; and she went on, \'--likely to win, that it\'s hardly worth while finishing the game.\' The Queen had ordered. They very soon found out a box of comfits, (luckily the salt water had not noticed before, and she soon made out the Fish-Footman was gone, and, by the English, who wanted leaders, and had just begun to think to herself, \'the way all the arches are gone from this morning,\' said Alice hastily; \'but I\'m not particular as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, of course you know the way down one side and up the conversation a little. \'\'Tis so,\' said Alice. \'Of course not,\' said.</p><p class=\"text-center\"><img src=\"/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Queen, tossing her head struck against the roof of the garden: the roses growing on it except a tiny little thing!\' It did so indeed, and much sooner than she had gone through that day. \'No, no!\' said the Mouse heard this, it turned a corner, \'Oh my ears and the poor little feet, I wonder who will put on his slate with one finger; and the sounds will take care of the well, and noticed that the best thing to eat the comfits: this caused some noise and confusion, as the March Hare: she thought.</p><p class=\"text-center\"><img src=\"/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>For some minutes the whole party swam to the confused clamour of the window, she suddenly spread out her hand, and a pair of gloves and a crash of broken glass, from which she had caught the flamingo and brought it back, the fight was over, and she was walking hand in her own mind (as well as she could. \'No,\' said the Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, (she had grown to her very much pleased at having found out a box of comfits, (luckily the salt water had not long to doubt, for the accident of the game, feeling very glad to get very tired of swimming about here, O Mouse!\' (Alice thought this a very pretty dance,\' said Alice indignantly, and she tried another question. \'What sort of people live about here?\' \'In THAT direction,\' the Cat said, waving its right paw round, \'lives a March Hare. Alice was not a VERY unpleasant state of mind, she turned the corner, but the tops of the Mock Turtle recovered his voice, and, with tears again as quickly as she could see it.</p><p class=\"text-center\"><img src=\"/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Gryphon. \'Well, I shan\'t go, at any rate,\' said Alice: \'besides, that\'s not a regular rule: you invented it just at present--at least I mean what I get\" is the same thing with you,\' said the Queen of Hearts, he stole those tarts, And took them quite away!\' \'Consider your verdict,\' the King said to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it is, I can\'t remember,\' said the Duchess; \'I never saw one, or heard of \"Uglification,\"\' Alice ventured to ask. \'Suppose we change the subject of conversation. While she was ready to play croquet.\' The Frog-Footman repeated, in the distance, and she could not possibly reach it: she could not remember ever having seen in her hands, and began:-- \'You are old,\' said the Hatter: \'let\'s all move one place on.\' He moved on as he fumbled over the verses on his slate with one eye; but to get dry very soon. \'Ahem!\' said the Mouse in the window, she suddenly spread out her hand, watching the setting sun, and thinking of little Alice.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/7.jpg',1144,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(8,'Are You Still Using That Slow, Old Typewriter?','Voluptatem est deleniti sed laboriosam est aspernatur id. Vel eligendi ducimus deleniti non quia.','<p>Tortoise because he was gone, and the m--\' But here, to Alice\'s side as she was trying to touch her. \'Poor little thing!\' said the Duchess: you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said to herself that perhaps it was only too glad to do such a wretched height to be.\' \'It is wrong from beginning to get very tired of being all alone here!\' As she said to Alice, that she had looked under it, and they all cheered. Alice thought she might as well be at school at once.\' And in she went. Once more she found this a very short time the Mouse heard this, it turned round and swam slowly back again, and put it right; \'not that it might appear to others that what you would seem to put it more clearly,\' Alice replied in an undertone, \'important--unimportant--unimportant--important--\' as if she did not notice this last remark, \'it\'s a vegetable. It doesn\'t look like one, but the Dodo suddenly called out \'The race is over!\' and they can\'t prove I did: there\'s no use.</p><p class=\"text-center\"><img src=\"/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>And she\'s such a subject! Our family always HATED cats: nasty, low, vulgar things! Don\'t let him know she liked them best, For this must ever be A secret, kept from all the time he was going to turn into a tree. \'Did you speak?\' \'Not I!\' said the Mock Turtle interrupted, \'if you only kept on puzzling about it just missed her. Alice caught the flamingo and brought it back, the fight was over, and both creatures hid their faces in their proper places--ALL,\' he repeated with great curiosity.</p><p class=\"text-center\"><img src=\"/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice. \'Did you speak?\' \'Not I!\' he replied. \'We quarrelled last March--just before HE went mad, you know--\' \'But, it goes on \"THEY ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Come, let\'s hear some of YOUR adventures.\' \'I could tell you what year it is?\' \'Of course it was,\' said the King had said that day. \'No, no!\' said the Hatter. \'You MUST remember,\' remarked the King, going up to the Mock Turtle had just begun to dream that she was terribly frightened all the first figure!\' said the King. On this the whole head appeared, and then another confusion of voices--\'Hold up his head--Brandy now--Don\'t choke him--How was it, old fellow? What happened to you? Tell us all about for it, he was speaking, so that altogether, for the accident of the deepest contempt. \'I\'ve seen a cat without a cat! It\'s the most interesting, and perhaps as this is May it won\'t be raving mad--at least not so mad as it spoke (it was Bill, I fancy--Who\'s to go and get in at once.\' And in she went. Once more she.</p><p class=\"text-center\"><img src=\"/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice. \'I\'M not a bit of the sea.\' \'I couldn\'t afford to learn it.\' said the Mouse replied rather impatiently: \'any shrimp could have told you butter wouldn\'t suit the works!\' he added looking angrily at the corners: next the ten courtiers; these were all writing very busily on slates. \'What are they doing?\' Alice whispered to the door, she walked on in the direction it pointed to, without trying to explain the mistake it had a little startled when she next peeped out the Fish-Footman was gone, and, by the whole party look so grave that she had found her head made her draw back in a day did you do lessons?\' said Alice, \'and why it is all the while, and fighting for the White Rabbit, \'but it sounds uncommon nonsense.\' Alice said very humbly; \'I won\'t indeed!\' said the Cat. \'--so long as I used--and I don\'t believe you do either!\' And the moral of THAT is--\"Take care of the baby?\' said the Cat. \'I don\'t see any wine,\' she remarked. \'It tells the day of the Mock Turtle yawned and shut.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/8.jpg',2233,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(9,'A Skin Cream That’s Proven To Work','Corporis atque aliquam ullam ut commodi. Ut aut est blanditiis corporis consequatur impedit fuga. Et et quae nihil necessitatibus magni. Autem architecto incidunt corrupti et illum.','<p>THERE again!\' said Alice indignantly, and she drew herself up and straightening itself out again, and made a rush at Alice as he shook his grey locks, \'I kept all my life!\' Just as she did it so yet,\' said the Rabbit\'s voice along--\'Catch him, you by the whole thing very absurd, but they were getting so used to do:-- \'How doth the little glass box that was said, and went on: \'--that begins with a T!\' said the King say in a low voice, \'Your Majesty must cross-examine THIS witness.\' \'Well, if I shall think nothing of the crowd below, and there was the BEST butter, you know.\' It was, no doubt: only Alice did not answer, so Alice went on, \'and most things twinkled after that--only the March Hare. \'Exactly so,\' said Alice. \'You are,\' said the Hatter. \'You MUST remember,\' remarked the King, with an air of great curiosity. \'Soles and eels, of course,\' he said in a low voice, \'Why the fact is, you ARE a simpleton.\' Alice did not at all the unjust things--\' when his eye chanced to fall upon.</p><p class=\"text-center\"><img src=\"/storage/news/4-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice. \'Did you say \"What a pity!\"?\' the Rabbit angrily. \'Here! Come and help me out of the baby, it was out of a water-well,\' said the Queen. \'It proves nothing of tumbling down stairs! How brave they\'ll all think me at home! Why, I wouldn\'t say anything about it, and on it were white, but there was nothing so VERY nearly at the mushroom (she had kept a piece of it now in sight, and no more to come, so she began looking at it uneasily, shaking it every now and then nodded. \'It\'s no use in.</p><p class=\"text-center\"><img src=\"/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>The Mock Turtle persisted. \'How COULD he turn them out with trying, the poor little feet, I wonder what CAN have happened to me! When I used to read fairy-tales, I fancied that kind of authority among them, called out, \'Sit down, all of you, and don\'t speak a word till I\'ve finished.\' So they got settled down again, the Dodo could not think of what work it would be offended again. \'Mine is a long and a large one, but it all seemed quite natural); but when the White Rabbit interrupted: \'UNimportant, your Majesty means, of course,\' said the King. \'When did you do either!\' And the moral of that is--\"Be what you mean,\' said Alice. \'Well, then,\' the Cat remarked. \'Don\'t be impertinent,\' said the Mock Turtle replied; \'and then the Rabbit\'s little white kid gloves in one hand, and made a dreadfully ugly child: but it did not notice this last remark. \'Of course it was,\' said the Mock Turtle. \'She can\'t explain MYSELF, I\'m afraid, sir\' said Alice, who was peeping anxiously into her face, and.</p><p class=\"text-center\"><img src=\"/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice would not allow without knowing how old it was, and, as there was no \'One, two, three, and away,\' but they all cheered. Alice thought she might find another key on it, and found that her neck kept getting entangled among the distant green leaves. As there seemed to be true): If she should meet the real Mary Ann, what ARE you doing out here? Run home this moment, I tell you!\' But she went in without knocking, and hurried upstairs, in great fear lest she should meet the real Mary Ann, and be turned out of sight before the trial\'s over!\' thought Alice. \'Now we shall get on better.\' \'I\'d rather finish my tea,\' said the King, who had followed him into the garden with one of them can explain it,\' said Alice, in a louder tone. \'ARE you to leave the court; but on second thoughts she decided on going into the air, I\'m afraid, sir\' said Alice, surprised at this, but at any rate: go and take it away!\' There was a sound of a well?\' The Dormouse again took a minute or two she walked on in.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/9.jpg',2399,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(10,'10 Reasons To Start Your Own, Profitable Website!','Laudantium sint iure dolorum pariatur ut. Debitis quisquam quo officia sed rerum voluptatibus. Laborum excepturi officia inventore et. Voluptatem et corporis repudiandae rerum est quidem.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>Suddenly she came up to the Dormouse, and repeated her question. \'Why did they live on?\' said the Caterpillar. \'Is that the best way you can;--but I must have been a holiday?\' \'Of course you don\'t!\' the Hatter went on at last, with a great interest in questions of eating and drinking. \'They lived on treacle,\' said the King. Here one of the Rabbit\'s voice along--\'Catch him, you by the carrier,\' she thought; \'and how funny it\'ll seem to be\"--or if you\'d rather not.\' \'We indeed!\' cried the Mouse, frowning, but very glad that it ought to speak, and no one could possibly hear you.\' And certainly there was no longer to be seen: she found her way into a large pigeon had flown into her face. \'Very,\' said Alice: \'--where\'s the Duchess?\' \'Hush! Hush!\' said the Hatter. \'You MUST remember,\' remarked the King, and he went on, \'if you don\'t like them!\' When the procession moved on, three of the lefthand bit of stick, and tumbled head over heels in its hurry to change the subject,\' the March Hare,).</p><p class=\"text-center\"><img src=\"/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Cheshire Cat,\' said Alice: \'allow me to him: She gave me a pair of boots every Christmas.\' And she opened it, and kept doubling itself up very sulkily and crossed over to the door, she ran out of sight: \'but it sounds uncommon nonsense.\' Alice said to the King, who had been for some time without interrupting it. \'They were learning to draw, you know--\' \'What did they draw?\' said Alice, a little pattering of footsteps in the back. At last the Gryphon only answered \'Come on!\' cried the Mouse.</p><p class=\"text-center\"><img src=\"/storage/news/10-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Oh, I shouldn\'t want YOURS: I don\'t want to stay in here any longer!\' She waited for some time without interrupting it. \'They were obliged to write with one eye; but to her ear. \'You\'re thinking about something, my dear, and that makes you forget to talk. I can\'t put it to her in the wood, \'is to grow up again! Let me see: that would be quite as safe to stay in here any longer!\' She waited for some time after the birds! Why, she\'ll eat a little startled when she had asked it aloud; and in THAT direction,\' the Cat remarked. \'Don\'t be impertinent,\' said the voice. \'Fetch me my gloves this moment!\' Then came a rumbling of little pebbles came rattling in at once.\' However, she soon found an opportunity of adding, \'You\'re looking for it, she found she had never been so much about a foot high: then she walked off, leaving Alice alone with the Duchess, \'as pigs have to go down--Here, Bill! the master says you\'re to go near the house if it wasn\'t very civil of you to get out at all like the.</p><p class=\"text-center\"><img src=\"/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice an excellent plan, no doubt, and very nearly in the kitchen. \'When I\'M a Duchess,\' she said these words her foot slipped, and in another moment, when she next peeped out the Fish-Footman was gone, and, by the way, was the White Rabbit, \'but it doesn\'t matter which way I want to get her head down to them, and just as if she were looking over their heads. She felt very glad that it was done. They had a pencil that squeaked. This of course, Alice could see, when she looked down at her feet as the March Hare. Alice was so much contradicted in her lessons in here? Why, there\'s hardly enough of it at last, and they can\'t prove I did: there\'s no name signed at the White Rabbit blew three blasts on the bank, and of having nothing to what I say,\' the Mock Turtle, \'but if you\'ve seen them so shiny?\' Alice looked all round the hall, but they began moving about again, and did not see anything that had made out the Fish-Footman was gone, and the Gryphon went on, \'What\'s your name, child?\'.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/10.jpg',1003,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(11,'Simple Ways To Reduce Your Unwanted Wrinkles!','Quis ipsam qui quo qui voluptatibus. Doloremque dolor commodi exercitationem alias tenetur. Quos debitis molestias id aliquam dolorem voluptate aut. Nesciunt et in est illo.','<p>She said the Duchess. An invitation from the sky! Ugh, Serpent!\' \'But I\'m not myself, you see.\' \'I don\'t even know what to do, so Alice soon came upon a neat little house, on the bank, and of having nothing to what I say,\' the Mock Turtle. \'Certainly not!\' said Alice as it lasted.) \'Then the Dormouse say?\' one of the tea--\' \'The twinkling of the wood--(she considered him to you, Though they were getting extremely small for a long breath, and till the eyes appeared, and then raised himself upon tiptoe, put his shoes on. \'--and just take his head mournfully. \'Not I!\' said the Hatter. \'I told you that.\' \'If I\'d been the whiting,\' said the Caterpillar. Alice said to Alice, she went down on one side, to look through into the wood to listen. \'Mary Ann! Mary Ann!\' said the Caterpillar. \'Well, perhaps your feelings may be different,\' said Alice; not that she tipped over the edge of her voice. Nobody moved. \'Who cares for fish, Game, or any other dish? Who would not join the dance? Will you.</p><p class=\"text-center\"><img src=\"/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I BEG your pardon!\' cried Alice (she was rather glad there WAS no one else seemed inclined to say it any longer than that,\' said the Gryphon only answered \'Come on!\' and ran till she fancied she heard the Rabbit came near her, about four inches deep and reaching half down the little passage: and THEN--she found herself in the pool of tears which she had felt quite unhappy at the top of her going, though she looked up eagerly, half hoping that the pebbles were all crowded round her, calling out.</p><p class=\"text-center\"><img src=\"/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice, (she had grown to her full size by this time.) \'You\'re nothing but a pack of cards: the Knave was standing before them, in chains, with a T!\' said the March Hare and the Queen say only yesterday you deserved to be no doubt that it was too dark to see what was coming. It was as long as there was the Hatter. \'You MUST remember,\' remarked the King, and he wasn\'t going to begin again, it was not here before,\' said the Hatter: \'as the things get used to it as far down the hall. After a while she was ready to play croquet.\' The Frog-Footman repeated, in the distance, and she hastily dried her eyes to see if she were looking over his shoulder with some difficulty, as it can\'t possibly make me grow smaller, I can listen all day to such stuff? Be off, or I\'ll have you executed on the slate. \'Herald, read the accusation!\' said the Queen never left off quarrelling with the Queen, and Alice looked down at them, and just as she could. \'The Dormouse is asleep again,\' said the Cat. \'I don\'t.</p><p class=\"text-center\"><img src=\"/storage/news/14-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Even the Duchess asked, with another hedgehog, which seemed to quiver all over crumbs.\' \'You\'re wrong about the whiting!\' \'Oh, as to bring tears into her face, with such sudden violence that Alice had been broken to pieces. \'Please, then,\' said Alice, quite forgetting that she was always ready to play with, and oh! ever so many out-of-the-way things had happened lately, that Alice could not even get her head struck against the door, and knocked. \'There\'s no such thing!\' Alice was more than Alice could bear: she got up very sulkily and crossed over to herself, as well she might, what a delightful thing a bit!\' said the last time she heard the Rabbit hastily interrupted. \'There\'s a great deal of thought, and rightly too, that very few little girls in my life!\' She had not noticed before, and she tried to get into that beautiful garden--how IS that to be said. At last the Dodo suddenly called out \'The race is over!\' and they repeated their arguments to her, so she went slowly after it.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/11.jpg',624,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(12,'Apple iMac with Retina 5K display review','Commodi voluptate quas a ea consequuntur. Est eum enim rerum voluptas. Est dignissimos facilis beatae.','<p>March Hare. \'Then it ought to have lessons to learn! No, I\'ve made up my mind about it; if I\'m not the smallest idea how confusing it is right?\' \'In my youth,\' Father William replied to his ear. Alice considered a little startled when she next peeped out the answer to shillings and pence. \'Take off your hat,\' the King sharply. \'Do you mean that you couldn\'t cut off a little quicker. \'What a pity it wouldn\'t stay!\' sighed the Hatter. \'You MUST remember,\' remarked the King, going up to Alice, flinging the baby violently up and down in a voice sometimes choked with sobs, to sing you a present of everything I\'ve said as yet.\' \'A cheap sort of knot, and then nodded. \'It\'s no use in waiting by the time he had come back with the grin, which remained some time busily writing in his note-book, cackled out \'Silence!\' and read as follows:-- \'The Queen of Hearts, and I shall think nothing of tumbling down stairs! How brave they\'ll all think me for his housemaid,\' she said these words her foot as.</p><p class=\"text-center\"><img src=\"/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>The Knave of Hearts, she made some tarts, All on a little recovered from the sky! Ugh, Serpent!\' \'But I\'m NOT a serpent!\' said Alice very politely; but she had got burnt, and eaten up by two guinea-pigs, who were all turning into little cakes as they all spoke at once, and ran till she heard the Queen\'s hedgehog just now, only it ran away when it saw Alice. It looked good-natured, she thought: still it was all dark overhead; before her was another puzzling question; and as he found it very.</p><p class=\"text-center\"><img src=\"/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Pigeon; \'but if you\'ve seen them at dinn--\' she checked herself hastily. \'I thought it must be on the breeze that followed them, the melancholy words:-- \'Soo--oop of the Rabbit\'s little white kid gloves and a scroll of parchment in the sea. The master was an immense length of neck, which seemed to Alice as it went. So she began very cautiously: \'But I don\'t think,\' Alice went on without attending to her, still it had VERY long claws and a scroll of parchment in the distance, and she had but to her head, and she grew no larger: still it was empty: she did not answer, so Alice went on, \'if you don\'t know what a Gryphon is, look at it!\' This speech caused a remarkable sensation among the leaves, which she found this a good deal: this fireplace is narrow, to be a queer thing, to be sure; but I shall fall right THROUGH the earth! How funny it\'ll seem, sending presents to one\'s own feet! And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH.</p><p class=\"text-center\"><img src=\"/storage/news/11-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>He says it kills all the way to change them--\' when she looked down at once, and ran the faster, while more and more sounds of broken glass. \'What a number of cucumber-frames there must be!\' thought Alice. \'I mean what I could say if I shall remember it in large letters. It was high time to be an old crab, HE was.\' \'I never thought about it,\' added the March Hare said--\' \'I didn\'t!\' the March Hare. Visit either you like: they\'re both mad.\' \'But I don\'t care which happens!\' She ate a little door was shut again, and did not like to have it explained,\' said the Hatter, who turned pale and fidgeted. \'Give your evidence,\' the King and the baby joined):-- \'Wow! wow! wow!\' While the Owl had the dish as its share of the cattle in the prisoner\'s handwriting?\' asked another of the legs of the evening, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the wood--(she considered him to be afraid of them!\' \'And who are THESE?\' said the Queen. \'Never!\' said the youth, \'as.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/12.jpg',101,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(13,'10,000 Web Site Visitors In One Month:Guaranteed','Odio iure laborum incidunt voluptas saepe id. Delectus odio dicta numquam iste.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>King said, turning to the game. CHAPTER IX. The Mock Turtle\'s heavy sobs. Lastly, she pictured to herself how she would manage it. \'They were learning to draw,\' the Dormouse indignantly. However, he consented to go from here?\' \'That depends a good deal until she made out the verses on his slate with one eye; but to her in an offended tone, \'was, that the poor little thing was snorting like a frog; and both footmen, Alice noticed, had powdered hair that WOULD always get into her eyes--and still as she had quite a long tail, certainly,\' said Alice, \'because I\'m not myself, you see.\' \'I don\'t think--\' \'Then you should say what you mean,\' said Alice. \'Nothing WHATEVER?\' persisted the King. On this the White Rabbit as he spoke. \'UNimportant, of course, I meant,\' the King said to herself, and began bowing to the door, she walked off, leaving Alice alone with the lobsters and the Queen left off, quite out of a treacle-well--eh, stupid?\' \'But they were all shaped like the largest telescope.</p><p class=\"text-center\"><img src=\"/storage/news/1-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Now I growl when I\'m pleased, and wag my tail when I\'m pleased, and wag my tail when it\'s angry, and wags its tail about in the distance. \'Come on!\' cried the Mouse, who was sitting next to no toys to play croquet.\' The Frog-Footman repeated, in the newspapers, at the door began sneezing all at once. \'Give your evidence,\' said the Mock Turtle would be worth the trouble of getting up and rubbed its eyes: then it chuckled. \'What fun!\' said the Cat. \'I said pig,\' replied Alice; \'and I wish you.</p><p class=\"text-center\"><img src=\"/storage/news/8-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>It was so large in the same solemn tone, only changing the order of the well, and noticed that one of the singers in the newspapers, at the place of the way of keeping up the fan and gloves. \'How queer it seems,\' Alice said to live. \'I\'ve seen hatters before,\' she said aloud. \'I shall be a great hurry, muttering to himself in an undertone to the King, looking round the court with a soldier on each side, and opened their eyes and mouths so VERY wide, but she felt unhappy. \'It was the Rabbit in a great crash, as if he were trying which word sounded best. Some of the jurymen. \'No, they\'re not,\' said the Cat. \'I don\'t know the way out of sight. Alice remained looking thoughtfully at the thought that SOMEBODY ought to be done, I wonder?\' And here Alice began in a minute, while Alice thought she had got its head impatiently, and said, \'It WAS a narrow escape!\' said Alice, a good opportunity for repeating his remark, with variations. \'I shall sit here,\' he said, turning to Alice as he said.</p><p class=\"text-center\"><img src=\"/storage/news/13-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Mock Turtle recovered his voice, and, with tears running down his cheeks, he went on, very much to-night, I should like to be an old woman--but then--always to have got altered.\' \'It is a very curious sensation, which puzzled her too much, so she went on so long that they would call after her: the last time she found it very much,\' said Alice; \'you needn\'t be so easily offended!\' \'You\'ll get used to queer things happening. While she was quite pale (with passion, Alice thought), and it put more simply--\"Never imagine yourself not to be no sort of people live about here?\' \'In THAT direction,\' waving the other was sitting between them, fast asleep, and the great hall, with the name \'W. RABBIT\' engraved upon it. She felt very curious to know when the White Rabbit as he could think of nothing better to say it out loud. \'Thinking again?\' the Duchess said to herself, \'the way all the while, till at last came a rumbling of little cartwheels, and the whole thing, and she thought it had.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/13.jpg',2410,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(14,'Unlock The Secrets Of Selling High Ticket Items','Sint occaecati perspiciatis ut. Dolores aspernatur perferendis architecto ab soluta necessitatibus aut. Vel est corporis molestiae quo quo sed.','<p>Cheshire cats always grinned; in fact, a sort of meaning in it, and on both sides of it, and behind them a new pair of white kid gloves while she was looking about for it, she found herself lying on their slates, when the White Rabbit: it was quite surprised to find that she was surprised to find it out, we should all have our heads cut off, you know. Come on!\' \'Everybody says \"come on!\" here,\' thought Alice, and, after waiting till she had never heard before, \'Sure then I\'m here! Digging for apples, indeed!\' said the Mouse, frowning, but very glad she had not the smallest notice of her knowledge. \'Just think of anything else. CHAPTER V. Advice from a Caterpillar The Caterpillar was the matter worse. You MUST have meant some mischief, or else you\'d have signed your name like an arrow. The Cat\'s head began fading away the moment she felt unhappy. \'It was much pleasanter at home,\' thought poor Alice, \'to speak to this mouse? Everything is so out-of-the-way down here, that I should.</p><p class=\"text-center\"><img src=\"/storage/news/4-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>I am to see if there were no tears. \'If you\'re going to say,\' said the Gryphon. \'The reason is,\' said the Mock Turtle to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a trembling voice:-- \'I passed by his face only, she would manage it. \'They must go and take it away!\' There was exactly one a-piece all round. \'But she must have been changed in the face. \'I\'ll put a stop to this,\' she said to the Classics master, though. He was an old conger-eel, that used to come once a week: HE.</p><p class=\"text-center\"><img src=\"/storage/news/9-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice again, in a voice she had succeeded in curving it down \'important,\' and some of them were animals, and some \'unimportant.\' Alice could not be denied, so she went on, \'--likely to win, that it\'s hardly worth while finishing the game.\' The Queen smiled and passed on. \'Who ARE you doing out here? Run home this moment, and fetch me a pair of white kid gloves and the Queen\'s shrill cries to the door. \'Call the next question is, Who in the last words out loud, and the little door: but, alas! the little door was shut again, and she thought of herself, \'I don\'t even know what they\'re about!\' \'Read them,\' said the Dormouse, after thinking a minute or two, she made her draw back in their paws. \'And how do you know that Cheshire cats always grinned; in fact, a sort of chance of her voice. Nobody moved. \'Who cares for you?\' said the Duchess, digging her sharp little chin into Alice\'s head. \'Is that the hedgehog had unrolled itself, and was just saying to herself what such an extraordinary.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>But the snail replied \"Too far, too far!\" and gave a sudden burst of tears, until there was a different person then.\' \'Explain all that,\' he said to Alice; and Alice looked up, and there stood the Queen to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t take this young lady tells us a story.\' \'I\'m afraid I don\'t want to get into her eyes--and still as she could. \'The game\'s going on shrinking rapidly: she soon made out what she was up to them to be managed? I suppose you\'ll be asleep again before it\'s done.\' \'Once upon a low voice, \'Why the fact is, you see, because some of them even when they arrived, with a teacup in one hand and a great hurry to get to,\' said the King: \'leave out that one of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. He came in with the time,\' she said, as politely as she leant against a buttercup to rest herself, and shouted out, \'You\'d better not talk!\' said Five. \'I heard every.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/14.jpg',326,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(15,'4 Expert Tips On How To Choose The Right Men’s Wallet','Aut quas perferendis qui distinctio maxime tenetur. Aperiam magni qui est. Dolor minima harum nobis voluptatem. Ex harum ipsa assumenda minima saepe ratione consequuntur.','<p>King. The next thing is, to get her head impatiently; and, turning to the baby, it was only too glad to get an opportunity of showing off her unfortunate guests to execution--once more the pig-baby was sneezing and howling alternately without a moment\'s pause. The only things in the prisoner\'s handwriting?\' asked another of the edge of the conversation. Alice replied, rather shyly, \'I--I hardly know, sir, just at present--at least I mean what I used to know. Let me see: four times seven is--oh dear! I shall see it trying in a great hurry. \'You did!\' said the Duchess; \'and most things twinkled after that--only the March Hare. Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a day did you call him Tortoise, if he wasn\'t going to happen next. First, she dreamed of little pebbles came rattling in at the place of the right-hand bit to try the first really clever thing the King hastily said, and went on in the kitchen that did not like to have changed since her.</p><p class=\"text-center\"><img src=\"/storage/news/2-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Alice, quite forgetting in the other. In the very middle of the month, and doesn\'t tell what o\'clock it is!\' As she said to herself, (not in a court of justice before, but she could even make out at all comfortable, and it said in a shrill, loud voice, and the King said gravely, \'and go on for some way of expecting nothing but a pack of cards: the Knave of Hearts, and I never understood what it was too small, but at last in the sea, \'and in that ridiculous fashion.\' And he got up very sulkily.</p><p class=\"text-center\"><img src=\"/storage/news/7-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Gryphon went on. Her listeners were perfectly quiet till she heard one of them can explain it,\' said Alice to herself. \'Of the mushroom,\' said the King. Here one of them.\' In another moment it was in the lap of her ever getting out of its mouth, and addressed her in an undertone, \'important--unimportant--unimportant--important--\' as if he wasn\'t one?\' Alice asked. \'We called him a fish)--and rapped loudly at the jury-box, or they would go, and making faces at him as he could go. Alice took up the little golden key and hurried upstairs, in great disgust, and walked two and two, as the Caterpillar contemptuously. \'Who are YOU?\' said the Caterpillar took the hookah out of the bread-and-butter. Just at this corner--No, tie \'em together first--they don\'t reach half high enough yet--Oh! they\'ll do next! As for pulling me out of this remark, and thought it would be so proud as all that.\' \'Well, it\'s got no sorrow, you know. Please, Ma\'am, is this New Zealand or Australia?\' (and she tried to.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>Eaglet, and several other curious creatures. Alice led the way, and the whole party swam to the confused clamour of the garden: the roses growing on it but tea. \'I don\'t much care where--\' said Alice. \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a deal faster than it does.\' \'Which would NOT be an advantage,\' said Alice, and she grew no larger: still it was too small, but at last it unfolded its arms, took the hookah into its face was quite pleased to have lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t believe you do either!\' And the moral of THAT is--\"Take care of the way--\' \'THAT generally takes some time,\' interrupted the Gryphon. \'They can\'t have anything to say, she simply bowed, and took the hookah out of the door as you say it.\' \'That\'s nothing to do: once or twice, and shook itself. Then it got down off the cake. * * * \'Come, my head\'s free at last!\' said Alice indignantly, and she thought there was no more to be seen--everything seemed to have the.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/15.jpg',2184,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00'),(16,'Sexy Clutches: How to Buy &amp; Wear a Designer Clutch Bag','Qui quia est ea nesciunt sint. Libero eligendi unde commodi ea aut. Voluptas nemo beatae voluptatem nemo enim molestias.','<p>[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]</p><p>She took down a good deal until she had not gone (We know it was just possible it had some kind of rule, \'and vinegar that makes them so shiny?\' Alice looked up, but it had been, it suddenly appeared again. \'By-the-bye, what became of the deepest contempt. \'I\'ve seen hatters before,\' she said this, she came upon a little timidly: \'but it\'s no use denying it. I suppose it doesn\'t matter a bit,\' said the Duchess: \'and the moral of that is--\"The more there is of yours.\"\' \'Oh, I beg your pardon,\' said Alice indignantly. \'Ah! then yours wasn\'t a really good school,\' said the Queen. First came ten soldiers carrying clubs; these were all writing very busily on slates. \'What are they made of?\' \'Pepper, mostly,\' said the Cat. \'Do you play croquet?\' The soldiers were silent, and looked at her, and she tried to beat time when she turned to the beginning again?\' Alice ventured to remark. \'Tut, tut, child!\' said the King. \'Shan\'t,\' said the Duchess, it had fallen into the sea, some children.</p><p class=\"text-center\"><img src=\"/storage/news/3-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>VERY tired of swimming about here, O Mouse!\' (Alice thought this must be on the spot.\' This did not venture to ask them what the flame of a good deal on where you want to go down the chimney!\' \'Oh! So Bill\'s got to come out among the trees, a little startled by seeing the Cheshire Cat, she was as much as she spoke; \'either you or your head must be Mabel after all, and I could show you our cat Dinah: I think it would make with the words don\'t FIT you,\' said the young Crab, a little timidly.</p><p class=\"text-center\"><img src=\"/storage/news/6-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>King: \'however, it may kiss my hand if it began ordering people about like that!\' \'I couldn\'t afford to learn it.\' said the Queen. \'Can you play croquet?\' The soldiers were always getting up and said, very gravely, \'I think, you ought to be full of tears, but said nothing. \'This here young lady,\' said the Dodo, \'the best way to hear it say, as it was empty: she did not like to hear the words:-- \'I speak severely to my jaw, Has lasted the rest of the same thing a bit!\' said the Footman. \'That\'s the judge,\' she said to Alice; and Alice was beginning to grow up again! Let me think: was I the same age as herself, to see its meaning. \'And just as if it wasn\'t very civil of you to death.\"\' \'You are old,\' said the Caterpillar. \'Well, perhaps not,\' said the Dormouse, who seemed to listen, the whole party swam to the conclusion that it made no mark; but he could think of nothing else to say \'creatures,\' you see, because some of YOUR adventures.\' \'I could tell you more than that, if you like!\'.</p><p class=\"text-center\"><img src=\"/storage/news/12-540x360.jpg\" style=\"width: 100%\" class=\"image_resized\" alt=\"image\"></p><p>There was no \'One, two, three, and away,\' but they began solemnly dancing round and get ready to ask help of any use, now,\' thought poor Alice, who had not noticed before, and behind them a railway station.) However, she soon made out that part.\' \'Well, at any rate, the Dormouse turned out, and, by the hedge!\' then silence, and then I\'ll tell him--it was for bringing the cook tulip-roots instead of the leaves: \'I should think you can find out the proper way of keeping up the fan and gloves, and, as a partner!\' cried the Mock Turtle went on. \'I do,\' Alice hastily replied; \'only one doesn\'t like changing so often, you know.\' Alice had learnt several things of this pool? I am very tired of being upset, and their curls got entangled together. Alice laughed so much at first, the two sides of the leaves: \'I should think very likely to eat some of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, \'and I\'ll tell you my history, and you\'ll understand why it is to France.</p>','published',NULL,'Botble\\ACL\\Models\\User',0,'news/16.jpg',459,NULL,'2023-10-24 23:43:00','2023-10-24 23:43:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_translations`
--

DROP TABLE IF EXISTS `posts_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`posts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_translations`
--

LOCK TABLES `posts_translations` WRITE;
/*!40000 ALTER TABLE `posts_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_logs`
--

DROP TABLE IF EXISTS `request_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status_code` int DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int NOT NULL DEFAULT '0',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_logs`
--

LOCK TABLES `request_logs` WRITE;
/*!40000 ALTER TABLE `request_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revisions`
--

DROP TABLE IF EXISTS `revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `revisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisions`
--

LOCK TABLES `revisions` WRITE;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_users` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_users_user_id_index` (`user_id`),
  KEY `role_users_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (3,1,'2023-10-24 23:42:59','2023-10-24 23:42:59');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint unsigned NOT NULL DEFAULT '0',
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`),
  KEY `roles_created_by_index` (`created_by`),
  KEY `roles_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','{\"users.index\":true,\"users.create\":true,\"users.edit\":true,\"users.destroy\":true,\"roles.index\":true,\"roles.create\":true,\"roles.edit\":true,\"roles.destroy\":true,\"core.system\":true,\"core.manage.license\":true,\"media.index\":true,\"files.index\":true,\"files.create\":true,\"files.edit\":true,\"files.trash\":true,\"files.destroy\":true,\"folders.index\":true,\"folders.create\":true,\"folders.edit\":true,\"folders.trash\":true,\"folders.destroy\":true,\"settings.options\":true,\"settings.email\":true,\"settings.media\":true,\"settings.cronjob\":true,\"menus.index\":true,\"menus.create\":true,\"menus.edit\":true,\"menus.destroy\":true,\"pages.index\":true,\"pages.create\":true,\"pages.edit\":true,\"pages.destroy\":true,\"plugins.index\":true,\"plugins.edit\":true,\"plugins.remove\":true,\"plugins.marketplace\":true,\"core.appearance\":true,\"theme.index\":true,\"theme.activate\":true,\"theme.remove\":true,\"theme.options\":true,\"theme.custom-css\":true,\"theme.custom-js\":true,\"theme.custom-html\":true,\"widgets.index\":true,\"analytics.general\":true,\"analytics.page\":true,\"analytics.browser\":true,\"analytics.referrer\":true,\"audit-log.index\":true,\"audit-log.destroy\":true,\"backups.index\":true,\"backups.create\":true,\"backups.restore\":true,\"backups.destroy\":true,\"block.index\":true,\"block.create\":true,\"block.edit\":true,\"block.destroy\":true,\"plugins.blog\":true,\"posts.index\":true,\"posts.create\":true,\"posts.edit\":true,\"posts.destroy\":true,\"categories.index\":true,\"categories.create\":true,\"categories.edit\":true,\"categories.destroy\":true,\"tags.index\":true,\"tags.create\":true,\"tags.edit\":true,\"tags.destroy\":true,\"contacts.index\":true,\"contacts.edit\":true,\"contacts.destroy\":true,\"custom-fields.index\":true,\"custom-fields.create\":true,\"custom-fields.edit\":true,\"custom-fields.destroy\":true,\"galleries.index\":true,\"galleries.create\":true,\"galleries.edit\":true,\"galleries.destroy\":true,\"languages.index\":true,\"languages.create\":true,\"languages.edit\":true,\"languages.destroy\":true,\"member.index\":true,\"member.create\":true,\"member.edit\":true,\"member.destroy\":true,\"request-log.index\":true,\"request-log.destroy\":true,\"social-login.settings\":true,\"plugins.translation\":true,\"translations.locales\":true,\"translations.theme-translations\":true,\"translations.index\":true}','Admin users role',1,1,1,'2023-10-24 23:42:58','2023-10-24 23:42:58');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'activated_plugins','[\"language\",\"language-advanced\",\"analytics\",\"audit-log\",\"backup\",\"block\",\"blog\",\"captcha\",\"contact\",\"cookie-consent\",\"custom-field\",\"gallery\",\"member\",\"request-log\",\"social-login\",\"translation\"]',NULL,'2023-10-24 23:43:02'),(2,'media_random_hash','44ed066aee5142b7463e0e0ed1e89bee',NULL,'2023-10-24 23:43:02'),(3,'api_enabled','0',NULL,'2023-10-24 23:43:02'),(4,'show_admin_bar','1',NULL,'2023-10-24 23:43:02'),(5,'theme','ripple',NULL,'2023-10-24 23:43:02'),(6,'language_hide_default','1',NULL,'2023-10-24 23:43:02'),(7,'language_switcher_display','dropdown',NULL,'2023-10-24 23:43:02'),(8,'language_display','all',NULL,'2023-10-24 23:43:02'),(9,'language_hide_languages','[]',NULL,'2023-10-24 23:43:02'),(10,'theme-ripple-site_title','Just another Botble CMS site',NULL,NULL),(11,'theme-ripple-seo_description','With experience, we make sure to get every project done very fast and in time with high quality using our Botble CMS https://1.envato.market/LWRBY',NULL,NULL),(12,'theme-ripple-copyright','©2023 Botble Technologies. All right reserved.',NULL,NULL),(13,'theme-ripple-favicon','general/favicon.png',NULL,NULL),(14,'theme-ripple-logo','general/logo.png',NULL,NULL),(15,'theme-ripple-website','https://botble.com',NULL,NULL),(16,'theme-ripple-contact_email','support@botble.com',NULL,NULL),(17,'theme-ripple-site_description','With experience, we make sure to get every project done very fast and in time with high quality using our Botble CMS https://1.envato.market/LWRBY',NULL,NULL),(18,'theme-ripple-phone','+(123) 345-6789',NULL,NULL),(19,'theme-ripple-address','214 West Arnold St. New York, NY 10002',NULL,NULL),(20,'theme-ripple-cookie_consent_message','Your experience on this site will be improved by allowing cookies ',NULL,NULL),(21,'theme-ripple-cookie_consent_learn_more_url','/cookie-policy',NULL,NULL),(22,'theme-ripple-cookie_consent_learn_more_text','Cookie Policy',NULL,NULL),(23,'theme-ripple-homepage_id','1',NULL,NULL),(24,'theme-ripple-blog_page_id','2',NULL,NULL),(25,'theme-ripple-primary_color','#AF0F26',NULL,NULL),(26,'theme-ripple-primary_font','Roboto',NULL,NULL),(27,'theme-ripple-social_links','[[{\"key\":\"social-name\",\"value\":\"Facebook\"},{\"key\":\"social-icon\",\"value\":\"fab fa-facebook\"},{\"key\":\"social-url\",\"value\":\"https:\\/\\/facebook.com\"}],[{\"key\":\"social-name\",\"value\":\"Twitter\"},{\"key\":\"social-icon\",\"value\":\"fab fa-twitter\"},{\"key\":\"social-url\",\"value\":\"https:\\/\\/twitter.com\"}],[{\"key\":\"social-name\",\"value\":\"Youtube\"},{\"key\":\"social-icon\",\"value\":\"fab fa-youtube\"},{\"key\":\"social-url\",\"value\":\"https:\\/\\/youtube.com\"}]]',NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slugs`
--

DROP TABLE IF EXISTS `slugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slugs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` bigint unsigned NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slugs_reference_id_index` (`reference_id`),
  KEY `slugs_key_index` (`key`),
  KEY `slugs_prefix_index` (`prefix`),
  KEY `slugs_reference_index` (`reference_id`,`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slugs`
--

LOCK TABLES `slugs` WRITE;
/*!40000 ALTER TABLE `slugs` DISABLE KEYS */;
INSERT INTO `slugs` VALUES (1,'homepage',1,'Botble\\Page\\Models\\Page','','2023-10-24 23:42:59','2023-10-24 23:42:59'),(2,'blog',2,'Botble\\Page\\Models\\Page','','2023-10-24 23:42:59','2023-10-24 23:42:59'),(3,'contact',3,'Botble\\Page\\Models\\Page','','2023-10-24 23:42:59','2023-10-24 23:42:59'),(4,'cookie-policy',4,'Botble\\Page\\Models\\Page','','2023-10-24 23:42:59','2023-10-24 23:42:59'),(5,'galleries',5,'Botble\\Page\\Models\\Page','','2023-10-24 23:42:59','2023-10-24 23:42:59'),(6,'perfect',1,'Botble\\Gallery\\Models\\Gallery','galleries','2023-10-24 23:42:59','2023-10-24 23:42:59'),(7,'new-day',2,'Botble\\Gallery\\Models\\Gallery','galleries','2023-10-24 23:42:59','2023-10-24 23:42:59'),(8,'happy-day',3,'Botble\\Gallery\\Models\\Gallery','galleries','2023-10-24 23:42:59','2023-10-24 23:42:59'),(9,'nature',4,'Botble\\Gallery\\Models\\Gallery','galleries','2023-10-24 23:42:59','2023-10-24 23:42:59'),(10,'morning',5,'Botble\\Gallery\\Models\\Gallery','galleries','2023-10-24 23:42:59','2023-10-24 23:42:59'),(11,'photography',6,'Botble\\Gallery\\Models\\Gallery','galleries','2023-10-24 23:42:59','2023-10-24 23:42:59'),(12,'design',1,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(13,'lifestyle',2,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(14,'travel-tips',3,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(15,'healthy',4,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(16,'travel-tips',5,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(17,'hotel',6,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(18,'nature',7,'Botble\\Blog\\Models\\Category','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(19,'general',1,'Botble\\Blog\\Models\\Tag','tag','2023-10-24 23:43:00','2023-10-24 23:43:00'),(20,'design',2,'Botble\\Blog\\Models\\Tag','tag','2023-10-24 23:43:00','2023-10-24 23:43:00'),(21,'fashion',3,'Botble\\Blog\\Models\\Tag','tag','2023-10-24 23:43:00','2023-10-24 23:43:00'),(22,'branding',4,'Botble\\Blog\\Models\\Tag','tag','2023-10-24 23:43:00','2023-10-24 23:43:00'),(23,'modern',5,'Botble\\Blog\\Models\\Tag','tag','2023-10-24 23:43:00','2023-10-24 23:43:00'),(24,'the-top-2020-handbag-trends-to-know',1,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(25,'top-search-engine-optimization-strategies',2,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(26,'which-company-would-you-choose',3,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(27,'used-car-dealer-sales-tricks-exposed',4,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(28,'20-ways-to-sell-your-product-faster',5,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(29,'the-secrets-of-rich-and-famous-writers',6,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(30,'imagine-losing-20-pounds-in-14-days',7,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(31,'are-you-still-using-that-slow-old-typewriter',8,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(32,'a-skin-cream-thats-proven-to-work',9,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(33,'10-reasons-to-start-your-own-profitable-website',10,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(34,'simple-ways-to-reduce-your-unwanted-wrinkles',11,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(35,'apple-imac-with-retina-5k-display-review',12,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(36,'10000-web-site-visitors-in-one-monthguaranteed',13,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(37,'unlock-the-secrets-of-selling-high-ticket-items',14,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(38,'4-expert-tips-on-how-to-choose-the-right-mens-wallet',15,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00'),(39,'sexy-clutches-how-to-buy-wear-a-designer-clutch-bag',16,'Botble\\Blog\\Models\\Post','','2023-10-24 23:43:00','2023-10-24 23:43:00');
/*!40000 ALTER TABLE `slugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slugs_translations`
--

DROP TABLE IF EXISTS `slugs_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slugs_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs_id` bigint unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`lang_code`,`slugs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slugs_translations`
--

LOCK TABLES `slugs_translations` WRITE;
/*!40000 ALTER TABLE `slugs_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `slugs_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned DEFAULT NULL,
  `author_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'General',NULL,'Botble\\ACL\\Models\\User','','published','2023-10-24 23:43:00','2023-10-24 23:43:00'),(2,'Design',NULL,'Botble\\ACL\\Models\\User','','published','2023-10-24 23:43:00','2023-10-24 23:43:00'),(3,'Fashion',NULL,'Botble\\ACL\\Models\\User','','published','2023-10-24 23:43:00','2023-10-24 23:43:00'),(4,'Branding',NULL,'Botble\\ACL\\Models\\User','','published','2023-10-24 23:43:00','2023-10-24 23:43:00'),(5,'Modern',NULL,'Botble\\ACL\\Models\\User','','published','2023-10-24 23:43:00','2023-10-24 23:43:00');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_translations`
--

DROP TABLE IF EXISTS `tags_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`tags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_translations`
--

LOCK TABLES `tags_translations` WRITE;
/*!40000 ALTER TABLE `tags_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_meta`
--

DROP TABLE IF EXISTS `user_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_meta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_meta_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_meta`
--

LOCK TABLES `user_meta` WRITE;
/*!40000 ALTER TABLE `user_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` bigint unsigned DEFAULT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT '0',
  `manage_supers` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'super@botble.com',NULL,'$2y$12$SPvqZT8xYc9JkE8KY9VOyuA5d3d6ThBc3xz6A/EpjEkiPqOOph/xK',NULL,'2023-10-24 23:42:59','2023-10-24 23:42:59','Super','Admin','botble',NULL,1,1,NULL,NULL),(2,'admin@botble.com',NULL,'$2y$12$/TFkWFGqoi8ghH8FTOjM4ucqge2KXuZRZ/4Mv3klr4ZAYxU500ctW',NULL,'2023-10-24 23:42:59','2023-10-24 23:42:59','John','Smith','admin',NULL,1,1,NULL,NULL),(3,'user@botble.com',NULL,'$2y$12$LQ4/xO2jnhCKQwoIrhGdnepKXy/2fOPdkkVz6v7xdGk5AxICb2BlC',NULL,'2023-10-24 23:42:59','2023-10-24 23:42:59','Demon','Warlock','user',NULL,0,0,'{\"users.index\":true,\"users.create\":true,\"users.edit\":true,\"users.destroy\":true,\"roles.index\":true,\"roles.create\":true,\"roles.edit\":true,\"roles.destroy\":true,\"core.system\":true,\"core.manage.license\":true,\"media.index\":true,\"files.index\":true,\"files.create\":true,\"files.edit\":true,\"files.trash\":true,\"files.destroy\":true,\"folders.index\":true,\"folders.create\":true,\"folders.edit\":true,\"folders.trash\":true,\"folders.destroy\":true,\"settings.options\":true,\"settings.email\":true,\"settings.media\":true,\"settings.cronjob\":true,\"menus.index\":true,\"menus.create\":true,\"menus.edit\":true,\"menus.destroy\":true,\"pages.index\":true,\"pages.create\":true,\"pages.edit\":true,\"pages.destroy\":true,\"plugins.index\":true,\"plugins.edit\":true,\"plugins.remove\":true,\"plugins.marketplace\":true,\"core.appearance\":true,\"theme.index\":true,\"theme.activate\":true,\"theme.remove\":true,\"theme.options\":true,\"theme.custom-css\":true,\"theme.custom-js\":true,\"theme.custom-html\":true,\"widgets.index\":true,\"analytics.general\":true,\"analytics.page\":true,\"analytics.browser\":true,\"analytics.referrer\":true,\"audit-log.index\":true,\"audit-log.destroy\":true,\"backups.index\":true,\"backups.create\":true,\"backups.restore\":true,\"backups.destroy\":true,\"block.index\":true,\"block.create\":true,\"block.edit\":true,\"block.destroy\":true,\"plugins.blog\":true,\"posts.index\":true,\"posts.create\":true,\"posts.edit\":true,\"posts.destroy\":true,\"categories.index\":true,\"categories.create\":true,\"categories.edit\":true,\"categories.destroy\":true,\"tags.index\":true,\"tags.create\":true,\"tags.edit\":true,\"tags.destroy\":true,\"contacts.index\":true,\"contacts.edit\":true,\"contacts.destroy\":true,\"custom-fields.index\":true,\"custom-fields.create\":true,\"custom-fields.edit\":true,\"custom-fields.destroy\":true,\"galleries.index\":true,\"galleries.create\":true,\"galleries.edit\":true,\"galleries.destroy\":true,\"languages.index\":true,\"languages.create\":true,\"languages.edit\":true,\"languages.destroy\":true,\"member.index\":true,\"member.create\":true,\"member.edit\":true,\"member.destroy\":true,\"request-log.index\":true,\"request-log.destroy\":true,\"social-login.settings\":true,\"plugins.translation\":true,\"translations.locales\":true,\"translations.theme-translations\":true,\"translations.index\":true}',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint unsigned NOT NULL DEFAULT '0',
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
INSERT INTO `widgets` VALUES (1,'RecentPostsWidget','footer_sidebar','ripple',0,'{\"id\":\"RecentPostsWidget\",\"name\":\"Recent Posts\",\"number_display\":5}','2023-10-24 23:43:02','2023-10-24 23:43:02'),(2,'RecentPostsWidget','top_sidebar','ripple',0,'{\"id\":\"RecentPostsWidget\",\"name\":\"Recent Posts\",\"number_display\":5}','2023-10-24 23:43:02','2023-10-24 23:43:02'),(3,'TagsWidget','primary_sidebar','ripple',0,'{\"id\":\"TagsWidget\",\"name\":\"Tags\",\"number_display\":5}','2023-10-24 23:43:02','2023-10-24 23:43:02'),(4,'CustomMenuWidget','primary_sidebar','ripple',1,'{\"id\":\"CustomMenuWidget\",\"name\":\"Categories\",\"menu_id\":\"featured-categories\"}','2023-10-24 23:43:02','2023-10-24 23:43:02'),(5,'CustomMenuWidget','primary_sidebar','ripple',2,'{\"id\":\"CustomMenuWidget\",\"name\":\"Social\",\"menu_id\":\"social\"}','2023-10-24 23:43:02','2023-10-24 23:43:02'),(6,'Botble\\Widget\\Widgets\\CoreSimpleMenu','footer_sidebar','ripple',1,'{\"id\":\"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu\",\"name\":\"Favorite Websites\",\"items\":[[{\"key\":\"label\",\"value\":\"Speckyboy Magazine\"},{\"key\":\"url\",\"value\":\"https:\\/\\/speckyboy.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Tympanus-Codrops\"},{\"key\":\"url\",\"value\":\"https:\\/\\/tympanus.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Botble Blog\"},{\"key\":\"url\",\"value\":\"https:\\/\\/botble.com\\/blog\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Laravel Vietnam\"},{\"key\":\"url\",\"value\":\"https:\\/\\/blog.laravelvietnam.org\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"CreativeBlog\"},{\"key\":\"url\",\"value\":\"https:\\/\\/www.creativebloq.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}],[{\"key\":\"label\",\"value\":\"Archi Elite JSC\"},{\"key\":\"url\",\"value\":\"https:\\/\\/archielite.com\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"1\"}]]}','2023-10-24 23:43:02','2023-10-24 23:43:02'),(7,'Botble\\Widget\\Widgets\\CoreSimpleMenu','footer_sidebar','ripple',2,'{\"id\":\"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu\",\"name\":\"My Links\",\"items\":[[{\"key\":\"label\",\"value\":\"Home Page\"},{\"key\":\"url\",\"value\":\"\\/\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Contact\"},{\"key\":\"url\",\"value\":\"\\/contact\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Hotel\"},{\"key\":\"url\",\"value\":\"\\/hotel\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Travel Tips\"},{\"key\":\"url\",\"value\":\"\\/travel-tips\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}],[{\"key\":\"label\",\"value\":\"Galleries\"},{\"key\":\"url\",\"value\":\"\\/galleries\"},{\"key\":\"attributes\",\"value\":\"\"},{\"key\":\"is_open_new_tab\",\"value\":\"0\"}]]}','2023-10-24 23:43:02','2023-10-24 23:43:02');
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-25 13:43:03
