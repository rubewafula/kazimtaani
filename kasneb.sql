/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - smsnow
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smsnow` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `smsnow`;

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) unsigned DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_log` */

insert  into `activity_log`(`id`,`log_name`,`description`,`subject_type`,`subject_id`,`causer_type`,`causer_id`,`properties`,`created_at`,`updated_at`) values 
(1,'default','App\\Models\\Role model has been created','App\\Models\\Role',1,NULL,NULL,'[]','2021-10-25 16:04:43','2021-10-25 16:04:43'),
(2,'default','App\\Models\\Sms_group model has been created','App\\Models\\Sms_group',1,NULL,NULL,'[]','2021-10-25 16:18:47','2021-10-25 16:18:47'),
(3,'default','App\\Models\\Result model has been created','App\\Models\\Result',1,NULL,NULL,'[]','2021-10-25 16:42:53','2021-10-25 16:42:53'),
(4,'default','App\\Models\\Status model has been created','App\\Models\\Status',1,NULL,NULL,'[]','2021-10-25 16:44:45','2021-10-25 16:44:45'),
(5,'default','App\\Models\\Status model has been created','App\\Models\\Status',2,NULL,NULL,'[]','2021-10-25 16:44:55','2021-10-25 16:44:55'),
(6,'default','App\\Models\\Status model has been created','App\\Models\\Status',3,NULL,NULL,'[]','2021-10-25 16:45:16','2021-10-25 16:45:16'),
(7,'default','App\\Models\\Status model has been created','App\\Models\\Status',4,NULL,NULL,'[]','2021-10-25 16:45:25','2021-10-25 16:45:25'),
(8,'default','App\\Models\\Sms_in model has been created','App\\Models\\Sms_in',1,NULL,NULL,'[]','2021-10-25 16:48:35','2021-10-25 16:48:35'),
(9,'default','App\\Models\\Sms_out model has been created','App\\Models\\Sms_out',1,NULL,NULL,'[]','2021-10-25 16:51:33','2021-10-25 16:51:33'),
(10,'default','App\\Models\\Contact model has been created','App\\Models\\Contact',1,NULL,NULL,'[]','2021-10-25 16:53:30','2021-10-25 16:53:30'),
(11,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',1,'App\\Models\\User',1,'[]','2021-10-28 12:20:00','2021-10-28 12:20:00'),
(12,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',2,'App\\Models\\User',1,'[]','2021-10-28 12:21:59','2021-10-28 12:21:59'),
(13,'default','App\\Models\\Campaign model has been deleted','App\\Models\\Campaign',1,'App\\Models\\User',1,'[]','2021-10-28 12:29:38','2021-10-28 12:29:38'),
(14,'default','App\\Models\\Campaign model has been deleted','App\\Models\\Campaign',2,NULL,NULL,'[]','2021-10-29 14:55:18','2021-10-29 14:55:18'),
(15,'default','App\\Models\\Result model has been deleted','App\\Models\\Result',1,NULL,NULL,'[]','2021-10-29 15:01:33','2021-10-29 15:01:33'),
(16,'default','App\\Models\\Contact model has been deleted','App\\Models\\Contact',8,'App\\Models\\User',1,'[]','2021-11-01 16:15:17','2021-11-01 16:15:17'),
(17,'default','App\\Models\\Role model has been created','App\\Models\\Role',2,'App\\Models\\User',1,'[]','2021-11-04 15:52:27','2021-11-04 15:52:27'),
(18,'default','App\\Models\\Permission model has been created','App\\Models\\Permission',1,'App\\Models\\User',1,'[]','2021-11-04 16:02:35','2021-11-04 16:02:35'),
(19,'default','App\\Models\\Permission model has been created','App\\Models\\Permission',2,'App\\Models\\User',1,'[]','2021-11-04 16:03:07','2021-11-04 16:03:07'),
(20,'default','App\\Models\\Sms_out model has been deleted','App\\Models\\Sms_out',1,'App\\Models\\User',1,'[]','2021-11-06 06:54:19','2021-11-06 06:54:19'),
(21,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',3,'App\\Models\\User',1,'[]','2021-11-06 07:48:39','2021-11-06 07:48:39'),
(22,'default','App\\Models\\Sms_out model has been deleted','App\\Models\\Sms_out',4,'App\\Models\\User',1,'[]','2021-11-07 10:26:19','2021-11-07 10:26:19'),
(23,'default','App\\Models\\Sms_out model has been deleted','App\\Models\\Sms_out',5,'App\\Models\\User',1,'[]','2021-11-07 11:52:39','2021-11-07 11:52:39'),
(24,'default','App\\Models\\Sms_group model has been created','App\\Models\\Sms_group',2,'App\\Models\\User',1,'[]','2021-11-07 13:01:34','2021-11-07 13:01:34'),
(25,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',4,'App\\Models\\User',1,'[]','2021-11-07 13:50:06','2021-11-07 13:50:06'),
(26,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',5,'App\\Models\\User',1,'[]','2021-11-07 13:56:55','2021-11-07 13:56:55'),
(27,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',6,'App\\Models\\User',1,'[]','2021-11-07 14:01:12','2021-11-07 14:01:12'),
(28,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',7,'App\\Models\\User',1,'[]','2021-11-07 14:02:04','2021-11-07 14:02:04'),
(29,'default','App\\Models\\Role model has been updated','App\\Models\\Role',1,'App\\Models\\User',1,'[]','2021-11-07 14:06:38','2021-11-07 14:06:38'),
(30,'default','App\\Models\\Role model has been updated','App\\Models\\Role',1,'App\\Models\\User',1,'[]','2021-11-07 14:07:34','2021-11-07 14:07:34'),
(31,'default','App\\Models\\Role model has been updated','App\\Models\\Role',2,'App\\Models\\User',1,'[]','2021-11-07 14:08:31','2021-11-07 14:08:31'),
(32,'default','App\\Models\\Role model has been created','App\\Models\\Role',3,'App\\Models\\User',1,'[]','2021-11-07 14:09:05','2021-11-07 14:09:05'),
(33,'default','App\\Models\\Role model has been created','App\\Models\\Role',4,'App\\Models\\User',1,'[]','2021-11-07 14:09:21','2021-11-07 14:09:21'),
(34,'default','App\\Models\\Role model has been created','App\\Models\\Role',5,'App\\Models\\User',1,'[]','2021-11-07 14:10:03','2021-11-07 14:10:03'),
(35,'default','App\\Models\\Role model has been updated','App\\Models\\Role',5,'App\\Models\\User',1,'[]','2021-11-07 14:10:13','2021-11-07 14:10:13'),
(36,'default','App\\Models\\Role model has been created','App\\Models\\Role',6,'App\\Models\\User',1,'[]','2021-11-07 14:10:52','2021-11-07 14:10:52'),
(37,'default','App\\Models\\Role model has been updated','App\\Models\\Role',1,'App\\Models\\User',1,'[]','2021-11-07 14:11:24','2021-11-07 14:11:24'),
(38,'default','App\\Models\\Campaign model has been deleted','App\\Models\\Campaign',7,'App\\Models\\User',1,'[]','2021-11-07 14:19:12','2021-11-07 14:19:12'),
(39,'default','App\\Models\\Campaign model has been deleted','App\\Models\\Campaign',6,'App\\Models\\User',1,'[]','2021-11-07 14:19:16','2021-11-07 14:19:16'),
(40,'default','App\\Models\\Campaign model has been deleted','App\\Models\\Campaign',5,'App\\Models\\User',1,'[]','2021-11-07 14:19:20','2021-11-07 14:19:20'),
(41,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',8,'App\\Models\\User',1,'[]','2021-11-07 14:20:32','2021-11-07 14:20:32'),
(42,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',9,'App\\Models\\User',1,'[]','2021-11-07 14:21:36','2021-11-07 14:21:36'),
(43,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',10,'App\\Models\\User',1,'[]','2021-11-07 14:22:04','2021-11-07 14:22:04'),
(44,'default','App\\Models\\Sms_group model has been created','App\\Models\\Sms_group',3,'App\\Models\\User',1,'[]','2021-11-07 17:58:32','2021-11-07 17:58:32'),
(45,'default','App\\Models\\Campaign model has been created','App\\Models\\Campaign',11,'App\\Models\\User',1,'[]','2021-11-07 17:59:56','2021-11-07 17:59:56');

/*Table structure for table `campaigns` */

DROP TABLE IF EXISTS `campaigns`;

CREATE TABLE `campaigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_group_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `campaigns` */

insert  into `campaigns`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`sms_group_id`,`message`,`date_sent`,`status_id`,`send_time`) values 
(1,'2021-10-28 12:20:00','2021-10-28 12:29:37','2021-10-28 12:29:37','gfgf',1,'Campaign',NULL,NULL,NULL),
(2,'2021-10-28 12:21:59','2021-10-29 14:55:17','2021-10-29 14:55:17','fdgf',1,'fdgfd',NULL,1,NULL),
(3,'2021-11-06 07:48:39','2021-11-06 07:48:39',NULL,'September 2021',1,'Message',NULL,3,NULL),
(4,'2021-11-07 13:50:05','2021-11-07 13:50:05',NULL,'September 2021',1,'vvcvc',NULL,3,NULL),
(5,'2021-11-07 13:56:55','2021-11-07 14:19:20','2021-11-07 14:19:20','John Doe',2,'November',NULL,3,NULL),
(6,'2021-11-07 14:01:12','2021-11-07 14:19:16','2021-11-07 14:19:16','Titus',2,'gfgfgdf',NULL,3,'2021-11-07 19:01:00'),
(7,'2021-11-07 14:02:04','2021-11-07 14:19:12','2021-11-07 14:19:12','Titus',2,'gfgfgdf',NULL,3,'2021-11-07 19:01:00'),
(8,'2021-11-07 14:20:32','2021-11-07 14:20:32',NULL,'September 2021',2,'This  is  message  for  1st',NULL,3,'2021-11-01 18:19:00'),
(9,'2021-11-07 14:21:36','2021-11-07 14:21:36',NULL,'September 2021',1,'Message  now',NULL,3,'2021-11-03 18:21:00'),
(10,'2021-11-07 14:22:04','2021-11-07 14:22:04',NULL,'John Doe',2,'fgf',NULL,3,'2021-11-06 20:21:00'),
(11,'2021-11-07 17:59:56','2021-11-07 17:59:56',NULL,'test',3,'This message',NULL,3,'2021-11-07 22:59:00');

/*Table structure for table `contact_uploads` */

DROP TABLE IF EXISTS `contact_uploads`;

CREATE TABLE `contact_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) NOT NULL,
  `processed` int(2) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sms_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact_uploads` */

insert  into `contact_uploads`(`id`,`file_name`,`processed`,`created_at`,`updated_at`,`sms_group_id`) values 
(5,'1636290215.csv',1,'2021-11-07 13:03:35','2021-11-07 13:03:35',2),
(6,'1636307946.csv',1,'2021-11-07 17:59:06','2021-11-07 17:59:08',3);

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `msisdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_group_id` int(11) DEFAULT NULL,
  `contact_upload_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`created_at`,`updated_at`,`deleted_at`,`msisdn`,`sms_group_id`,`contact_upload_id`) values 
(9,NULL,NULL,NULL,'710113828',1,4),
(10,NULL,NULL,NULL,'726984654',1,4),
(11,NULL,NULL,NULL,'23456',1,4),
(12,NULL,NULL,NULL,'710113828',2,5),
(13,NULL,NULL,NULL,'726984654',2,5),
(14,NULL,NULL,NULL,'23456',2,5),
(15,NULL,NULL,NULL,'0710113828',3,6),
(16,NULL,NULL,NULL,'3456',3,6),
(17,NULL,NULL,NULL,'34343',3,6),
(18,NULL,NULL,NULL,'544323',3,6);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2016_01_01_193651_create_roles_permissions_tables',2),
(6,'2018_08_01_183154_create_pages_table',2),
(7,'2018_08_04_122319_create_settings_table',2),
(8,'2021_10_25_160022_create_activity_log_table',2),
(9,'2021_10_25_160904_create_sms_groups_table',3),
(10,'2021_10_25_161503_create_sms_groups_table',4),
(11,'2021_10_25_163030_create_campaigns_table',5),
(12,'2021_10_25_164025_create_results_table',6),
(13,'2021_10_25_164358_create_statuses_table',7),
(14,'2021_10_25_164731_create_sms_ins_table',8),
(15,'2021_10_25_165049_create_sms_outs_table',9),
(16,'2021_10_25_165252_create_contacts_table',10),
(17,'2021_10_30_115235_create_jobs_table',11);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values 
(1,2),
(2,2);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`label`,`created_at`,`updated_at`) values 
(1,'results.view','View  Results','2021-11-04 16:02:35','2021-11-04 16:02:35'),
(2,'results.upload','Upload results','2021-11-04 16:03:07','2021-11-04 16:03:07');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `result_uploads` */

DROP TABLE IF EXISTS `result_uploads`;

CREATE TABLE `result_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_file` varchar(100) DEFAULT NULL,
  `sitting` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `processed` int(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `result_uploads` */

insert  into `result_uploads`(`id`,`upload_file`,`sitting`,`year`,`processed`,`created_at`,`updated_at`) values 
(7,'1635854560.csv','May','2020',1,'2021-11-02 12:02:40','2021-11-02 12:02:40');

/*Table structure for table `results` */

DROP TABLE IF EXISTS `results`;

CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scores` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_upload_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3693 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `results` */

insert  into `results`(`id`,`created_at`,`updated_at`,`reg_no`,`name`,`course`,`section`,`sitting`,`scores`,`year`,`result_upload_id`) values 
(3604,NULL,NULL,'CMP/1452','WILLIAM MWENDWA MWANIA','CCP Part 1','Section 1','May','CP12','2020',7),
(3605,NULL,NULL,'CMP/1578','ILTAJUNGWA  ORRE','CCP Part 3','Section 5','May','Fail,CP51,,CP52,,CP53','2020',7),
(3606,NULL,NULL,'CMP/1624','SARAH JEMELI KEMBOI','CCP Part 3','Section 5','May','Fail,CP51,,CP52,,CP53','2020',7),
(3607,NULL,NULL,'CMP/1642','MARY WANGUI KAMAU','CCP Part 3','Section 5','May','Fail,CP51,,CP53,,Section 6,CP61','2020',7),
(3608,NULL,NULL,'CMP/1660','JOSEPH MUHIA MARENYE','CCP Part 3','Section 6','May','Fail,CP61,,CP62,,CP63','2020',7),
(3609,NULL,NULL,'CMP/1768','WINNIE NDANU KASIMU','CCP Part 2','Section 3','May','CP32','2020',7),
(3610,NULL,NULL,'CMP/1801','ANN KASWII MULI','CCP Part 3','Section 6','May','Pass,CP61,,CP62,,CP63','2020',7),
(3611,NULL,NULL,'CMP/1832','DOUGLAS KEMBOI KOMEN','CCP Part 1','Section 1','May','CP11,,CP12','2020',7),
(3612,NULL,NULL,'CMP/1857','JOHN MURAGURI MWANGI','CCP Part 1','Section 2','May','CP22,,CP23','2020',7),
(3613,NULL,NULL,'CMP/1880','JEAN NTHAMBI MUSOMBA','CCP Part 2','Section 3','May','Pass,CP31,Pass,CP32,Pass,CP33,Section 4,CP41,CP42,Fail','2020',7),
(3614,NULL,NULL,'CMP/1943','FAITH NYASUGUTA OBAGA','CCP Part 2','Section 4','May','CP41','2020',7),
(3615,NULL,NULL,'CMP/1949','ESTHER KABOO NGUGI','CCP Part 3','Section 5','May','Fail,CP51,,CP52,,CP53','2020',7),
(3616,NULL,NULL,'CMP/1959','NANCY WAKESHO MWASAO','CCP Part 3','Section 6','May','CP63','2020',7),
(3617,NULL,NULL,'CMP/1992','KIPTOO JOSHUA OLTITI','CCP Part 3','Section 5','May','Fail,CP51,,CP52,,CP53','2020',7),
(3618,NULL,NULL,'CMP/2013','HILLARY ODHIAMBO ONYANGO','CCP Part 1','Section 2','May','CP23','2020',7),
(3619,NULL,NULL,'CMP/2111','HENRY BUNDI NDEGE','CCP Part 3','Section 6','May','Pass,CP61,,CP62,,CP63','2020',7),
(3620,NULL,NULL,'CMP/2113','DAMARIS NYAMBURA KINYA','CCP Part 3','Section 5','May','Fail,CP51,,CP52,,CP53','2020',7),
(3621,NULL,NULL,'CMP/2181','MWANAIDI NAMUKHUNG\'ANIA JUMA','CCP Part 2','Section 4','May','CP42','2020',7),
(3622,NULL,NULL,'CMP/2186','ALEX MISYILI MATI','CCP Part 1','Section 2','May','Pass,CP21,,CP22,,CP23','2020',7),
(3623,NULL,NULL,'CMP/2192','BENSON WAFULA WATAKA','CCP Part 2','Section 3','May','Pass,CP33,,Section 4,,CP41,CP42','2020',7),
(3624,NULL,NULL,'CMP/2224','JAMES NJUGUNA MBEU','CCP Part 3','Section 6','May','CP62','2020',7),
(3625,NULL,NULL,'CMP/2235','CAROL NYAWIRA SHIKANGA','CCP Part 3','Section 5','May','Fail,CP51,Pass,CP52,Pass,CP53,Section 6,CP61,CP62,Pass','2020',7),
(3626,NULL,NULL,'CMP/2289','CAROLINE AWINO WUOW','CCP Part 3','Section 5','May','1 Credit Earned,CP52,Fail,CP53,Pass,Section 6,CP61,CP62,CP63','2020',7),
(3627,NULL,NULL,'CMP/2308','STEPHEN MWATHA KIARIE','CCP Part 3','Section 6','May','Pass,CP61,,CP62,,CP63','2020',7),
(3628,NULL,NULL,'CMP/2312','STANISLAUS MWALYO MWAU','CCP Part 1','Section 2','May','CP23','2020',7),
(3629,NULL,NULL,'CMP/2345','BEATRICE  KIPTUM','CCP Part 2','Section 4','May','CP43','2020',7),
(3630,NULL,NULL,'CMP/2346','CATHERINE AKOTH OGALO','CCP Part 2','Section 3','May','Pass,CP31,Pass,CP32,Pass,Section 4,CP41,CP42,CP43','2020',7),
(3631,NULL,NULL,'CMP/2366','WALTER MUSUSI KLERVY','CCP Part 3','Section 5','May','Pass,CP52,Pass,Section 6,,CP61,CP62,CP63','2020',7),
(3632,NULL,NULL,'CMP/2372','DRAKE SINGA AKOYA','CCP Part 3','Section 6','May','CP61','2020',7),
(3633,NULL,NULL,'CMP/2397','MERCY  CHERONO','CCP Part 1','Section 1','May','CP11,,CP13','2020',7),
(3634,NULL,NULL,'CMP/2402','PETER M. GITAU','CCP Part 3','Section 6','May','Pass,CP61,,CP62,,CP63','2020',7),
(3635,NULL,NULL,'CMP/2425','DUNCAN OUMA OMBURO','CCP Part 2','Section 4','May','CP41,,CP43','2020',7),
(3636,NULL,NULL,'CMP/2426','ANDERSON OTIENO UMALLA','CCP Part 3','Section 5','May','CP53','2020',7),
(3637,NULL,NULL,'CMP/2441','CAROLINE WAWIRA NGONGE','CCP Part 2','Section 3','May','CP31,,CP32','2020',7),
(3638,NULL,NULL,'CMP/2457','CATHERINE  KARAMBU','CCP Part 2','Section 3','May','CP32','2020',7),
(3639,NULL,NULL,'CMP/2518','ERICK MOTARI ONG\'UTI','CCP Part 2','Section 4','May','Absent,CP41,,CP42,,CP43','2020',7),
(3640,NULL,NULL,'CMP/2538','DAVID KIRUTHI NDUNGU','CCP Part 3','Section 5','May','CP52','2020',7),
(3641,NULL,NULL,'CMP/2543','STEPHEN KAARIA MWENDA','CCP Part 2','Section 3','May','CP31,,CP33','2020',7),
(3642,NULL,NULL,'CMP/2553','ANGELA WATIRI NDUNGU','CCP Part 1','Section 1','May','Pass,CP11,Pass,CP12,,CP13,Section 2,CP23','2020',7),
(3643,NULL,NULL,'CMP/2559','EDITH  CHEPKORIR','CCP Part 2','Section 4','May','Pass,CP41,,CP42,,CP43','2020',7),
(3644,NULL,NULL,'CMP/2573','CHARLES OPIYO AYOO','CCP Part 3','Section 5','May','CP52,,CP53','2020',7),
(3645,NULL,NULL,'CMP/2575','EMILY NGESA AYUOYI','CCP Part 2','Section 4','May','Fail,CP41,,CP42,,CP43','2020',7),
(3646,NULL,NULL,'CMP/2583','WILLIAM MORRIS KEAH','CCP Part 3','Section 5','May','CP52,,CP53','2020',7),
(3647,NULL,NULL,'CMP/2596','FAITH MWENDE MWAU','CCP Part 2','Section 3','May','Pass,CP33,,Section 4,,CP41','2020',7),
(3648,NULL,NULL,'CMP/2603','FREDRICK OGENDO ALOO','CCP Part 1','Section 1','May','CP11','2020',7),
(3649,NULL,NULL,'CMP/2607','PATRICK MWIRIGI KABURU','CCP Part 3','Section 5','May','CP52,,CP53','2020',7),
(3650,NULL,NULL,'CMP/2608','BENSON MWITI KABURU','CCP Part 3','Section 5','May','Pass,CP52,Pass,CP53,Pass,Section 6,CP61,CP62,CP63','2020',7),
(3651,NULL,NULL,'CMP/2612','LUCY WANJIRU MUCHUMI','CCP Part 1','Section 1','May','CP11','2020',7),
(3652,NULL,NULL,'CMP/2614','JOYCE LYNAH AYUMA','CCP Part 2','Section 3','May','Pass,CP31,,CP32,,CP33','2020',7),
(3653,NULL,NULL,'CMP/2620','LINET WANJUGU NGINGA','CCP Part 2','Section 3','May','CP31,,CP33','2020',7),
(3654,NULL,NULL,'CMP/2623','HELLEN WAMBUI WAMBUI','CCP Part 1','Section 1','May','Fail,CP12,,Section 2,,CP22,CP23','2020',7),
(3655,NULL,NULL,'CMP/2635','MIRRIAM MINAYO KWEYA','CCP Part 2','Section 3','May','Fail,CP31,,CP32,,CP33','2020',7),
(3656,NULL,NULL,'CMP/2636','SYLVESTER OBIRI ONDIEKI','CCP Part 2','Section 3','May','CP33','2020',7),
(3657,NULL,NULL,'CMP/2642','JEREMIAH CHEPKOK YATICH','CCP Part 1','Section 1','May','CP11','2020',7),
(3658,NULL,NULL,'CMP/2643','NYANGATE KERUBO SARAH','CCP Part 1','Section 1','May','Fail,CP11,,Section 2,,CP22,CP23','2020',7),
(3659,NULL,NULL,'CMP/2647','MICHAEL TITUS RIZIKI','CCP Part 1','Section 1','May','CP11','2020',7),
(3660,NULL,NULL,'CMP/2650','LINET KALUMU KILONZO','CCP Part 1','Section 2','May','Pass,CP21,,CP22,,CP23','2020',7),
(3661,NULL,NULL,'CMP/2655','MAUREEN WANJIRU MACHIRA','CCP Part 2','Section 3','May','CP31,,CP33','2020',7),
(3662,NULL,NULL,'CMP/2658','GRACE KERUBO OMARE','CCP Part 1','Section 1','May','CP11','2020',7),
(3663,NULL,NULL,'CMP/2659','WINNIE KATE INGASIANI','CCP Part 1','Section 1','May','Fail,CP11,Fail,CP12,Absent,CP13,Section 2,CP21,CP22,Absent','2020',7),
(3664,NULL,NULL,'CMP/2660','EMMANUEL KITCHE OWISO','CCP Part 2','Section 3','May','Pass,CP33,,Section 4,,CP41','2020',7),
(3665,NULL,NULL,'CMP/2661','JACKSON NDUNGU KAMAU','CCP Part 2','Section 3','May','Pass,CP33,,Section 4,,CP41','2020',7),
(3666,NULL,NULL,'CMP/2662','EDITH NJOKI MWAURA','CCP Part 1','Section 1','May','CP12','2020',7),
(3667,NULL,NULL,'CMP/2670','JOSEPH MUSYOKI NZIOKI','CCP Part 2','Section 3','May','Pass,CP33,,Section 4,,CP41','2020',7),
(3668,NULL,NULL,'CMP/2671','JOY JEPCHIRCHIR KIBET','CCP Part 2','Section 3','May','CP33','2020',7),
(3669,NULL,NULL,'CMP/2674','BEATRICE NJOKI HUNJA','CCP Part 2','Section 3','May','CP31,,CP33','2020',7),
(3670,NULL,NULL,'CMP/2676','ANDREW MBOTE MBUGUA','CCP Part 2','Section 3','May','Pass,CP33,,Section 4,,CP41','2020',7),
(3671,NULL,NULL,'CMP/2677','DONAR NALWERE KWATUKHA','CCP Part 1','Section 1','May','Pass,CP11,,CP12,,CP13','2020',7),
(3672,NULL,NULL,'CMP/2680','GLORY NYAKAMBI MATARA','CCP Part 1','Section 1','May','Fail,CP11,Fail,CP12,Fail,CP13,Section 2,CP21,CP22,Pass','2020',7),
(3673,NULL,NULL,'CMP/2681','SHEM MASEME SOSPETER','CCP Part 1','Section 1','May','CP11','2020',7),
(3674,NULL,NULL,'CMP/2682','STEPHEN KAMAU MWANGI','CCP Part 1','Section 1','May','CP11','2020',7),
(3675,NULL,NULL,'CMP/2683','NEBERT MUGANDA M\'MAYI','CCP Part 1','Section 1','May','Pass,CP11,,Section 2,,CP23','2020',7),
(3676,NULL,NULL,'CMP/2684','MARK ESSAU MAKHANDIA','CCP Part 1','Section 1','May','Pass,CP11,,CP12,,CP13','2020',7),
(3677,NULL,NULL,'CMP/2685','JOSEPH WATITU KARIUKI','CCP Part 1','Section 1','May','CP11','2020',7),
(3678,NULL,NULL,'CMP/2686','PATRICK ODANGA AMUYUNZU','CCP Part 1','Section 1','May','Pass,CP11,Pass,CP12,Fail,CP13,Section 2,CP21,CP22,Fail','2020',7),
(3679,NULL,NULL,'CMP/2687','PAULINE KENDI MARETE','CCP Part 1','Section 1','May','CP11,,CP12','2020',7),
(3680,NULL,NULL,'CMP/2688','DEBORA  BARASA','CCP Part 1','Section 1','May','CP11','2020',7),
(3681,NULL,NULL,'CMP/2689','ELIZABETH NYAKIO NYAGA','CCP Part 1','Section 1','May','Pass,CP11,,Section 2,,CP23','2020',7),
(3682,NULL,NULL,'CMP/2695','ADAN LIBAN ABDUB','CCP Part 1','Section 1','May','CP11','2020',7),
(3683,NULL,NULL,'CMP/2696','CATHERINE WAIRIMU MURIGI','CCP Part 1','Section 1','May','Pass,CP11,,CP12,,CP13','2020',7),
(3684,NULL,NULL,'CMP/2697','JANE NDIKO NJONGE','CCP Part 1','Section 1','May','CP11','2020',7),
(3685,NULL,NULL,'CMP/2698','JOSEPH MUASYA MUINDE','CCP Part 1','Section 1','May','CP11,,CP12','2020',7),
(3686,NULL,NULL,'CMP/2699','ELIZABETH ATIENO OCHIENG','CCP Part 1','Section 1','May','CP11','2020',7),
(3687,NULL,NULL,'CMP/2700','MARY MWELU MUSAU','CCP Part 1','Section 1','May','CP11','2020',7),
(3688,NULL,NULL,'CMP/2701','LILIAN GRACE OLUOCH','CCP Part 1','Section 1','May','CP11','2020',7),
(3689,NULL,NULL,'CMP/2702','LISPAH WAGIATHA MAINA','CCP Part 1','Section 1','May','CP11,,CP12','2020',7),
(3690,NULL,NULL,'CMP/2705','MARY WAIRIMU MBUTHIA','CCP Part 1','Section 1','May','CP11','2020',7),
(3691,NULL,NULL,'CMP/2707','HILLARY KIBET MUTAI','CCP Part 1','Section 1','May','Pass,CP11,,Section 2,,CP23','2020',7),
(3692,NULL,NULL,'CMP/2708','REBECCA  WAMNJIRU','CCP Part 1','Section 1','May','Pass,CP11,,CP12,,CP13','2020',7);

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`) values 
(1,1),
(2,2);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`label`,`created_at`,`updated_at`) values 
(1,'super_admin','Super Administrator','2021-10-25 16:04:43','2021-11-07 14:11:24'),
(2,'admin','Administrator','2021-11-04 15:52:27','2021-11-07 14:08:31'),
(3,'Audit','Audit','2021-11-07 14:09:05','2021-11-07 14:09:05'),
(4,'finance','Finance','2021-11-07 14:09:21','2021-11-07 14:09:21'),
(5,'marketing','Marketing','2021-11-07 14:10:03','2021-11-07 14:10:13'),
(6,'reports','Reports','2021-11-07 14:10:52','2021-11-07 14:10:52');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

/*Table structure for table `sms_groups` */

DROP TABLE IF EXISTS `sms_groups`;

CREATE TABLE `sms_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sms_groups` */

insert  into `sms_groups`(`id`,`created_at`,`updated_at`,`name`) values 
(1,'2021-10-25 16:18:47','2021-10-25 16:18:47','September 2021'),
(2,'2021-11-07 13:01:34','2021-11-07 13:01:34','November  Intake'),
(3,'2021-11-07 17:58:31','2021-11-07 17:58:31','wafula  group');

/*Table structure for table `sms_ins` */

DROP TABLE IF EXISTS `sms_ins`;

CREATE TABLE `sms_ins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `msisdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_received` datetime DEFAULT NULL,
  `campaign_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sms_ins` */

insert  into `sms_ins`(`id`,`created_at`,`updated_at`,`msisdn`,`reference`,`short_code`,`date_received`,`campaign_id`,`message`,`status_id`) values 
(1,'2021-10-25 16:48:35','2021-10-25 16:48:35','254710113828','ref','322','2021-10-27 14:55:55','2','message','1');

/*Table structure for table `sms_outs` */

DROP TABLE IF EXISTS `sms_outs`;

CREATE TABLE `sms_outs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `msisdn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sms_outs` */

insert  into `sms_outs`(`id`,`created_at`,`updated_at`,`msisdn`,`message`,`status_id`,`date_sent`,`send_time`,`campaign_id`) values 
(1,'2021-11-07 14:20:32',NULL,'710113828','This  is  message  for  1st',0,NULL,'2021-11-01 18:19:00',8),
(2,'2021-11-07 14:20:32',NULL,'726984654','This  is  message  for  1st',0,NULL,'2021-11-01 18:19:00',8),
(3,'2021-11-07 14:20:32',NULL,'23456','This  is  message  for  1st',0,NULL,'2021-11-01 18:19:00',8),
(4,'2021-11-07 14:21:36',NULL,'710113828','Message  now',0,NULL,'2021-11-03 18:21:00',9),
(5,'2021-11-05 14:21:36',NULL,'726984654','Message  now',0,NULL,'2021-11-03 18:21:00',9),
(6,'2021-11-04 14:21:36',NULL,'23456','Message  now',0,NULL,'2021-11-03 18:21:00',9),
(7,'2021-11-03 14:22:04',NULL,'710113828','fgf',0,NULL,'2021-11-06 20:21:00',10),
(8,'2021-11-07 14:22:04',NULL,'726984654','fgf',0,NULL,'2021-11-06 20:21:00',10),
(9,'2021-11-07 14:22:04',NULL,'23456','fgf',0,NULL,'2021-11-06 20:21:00',10),
(10,'2021-11-07 17:59:56',NULL,'0710113828','This message',0,NULL,'2021-11-07 22:59:00',11),
(11,'2021-11-07 17:59:56',NULL,'3456','This message',0,NULL,'2021-11-07 22:59:00',11),
(12,'2021-11-07 17:59:56',NULL,'34343','This message',0,NULL,'2021-11-07 22:59:00',11),
(13,'2021-11-07 17:59:56',NULL,'544323','This message',0,NULL,'2021-11-07 22:59:00',11);

/*Table structure for table `statuses` */

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `statuses` */

insert  into `statuses`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`status_category`) values 
(1,'2021-10-25 16:44:45','2021-10-25 16:44:45',NULL,'Draft','CAMPAIGN'),
(2,'2021-10-25 16:44:55','2021-10-25 16:44:55',NULL,'Sent','CAMPAIGN'),
(3,'2021-10-25 16:45:16','2021-10-25 16:45:16',NULL,'SCHEDULED','CAMPAIGN'),
(4,'2021-10-25 16:45:25','2021-10-25 16:45:25',NULL,'DRAFT','SMS'),
(5,NULL,NULL,NULL,'SCHEDULED','SMS');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Titus G','titusgithiru@gmail.com',NULL,'$2y$10$Umz6z6bINr9c9KrwgOvvleyC3ULciyPgeV8fpKLqym/GfCj1IEKeG',NULL,'2021-10-25 16:05:35','2021-10-30 11:34:00'),
(2,'Reuben  Wafula','rubewafula@gmail.com',NULL,'$2y$10$q0yYF7tdKTIAeQgn/BoEj.ZmBCtcX8Y0kDJfC2U4sDs0kOS/yEYnq',NULL,'2021-11-03 10:14:14','2021-11-06 03:19:56');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
