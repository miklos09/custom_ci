/*
SQLyog Ultimate v9.02 
MySQL - 5.5.27 : Database - custom_ci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`custom_ci` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `custom_ci`;

/*Table structure for table `core_group` */

DROP TABLE IF EXISTS `core_group`;

CREATE TABLE `core_group` (
  `group_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_group` */

/*Table structure for table `core_menu` */

DROP TABLE IF EXISTS `core_menu`;

CREATE TABLE `core_menu` (
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `order` tinyint(4) DEFAULT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_menu` */

/*Table structure for table `core_module` */

DROP TABLE IF EXISTS `core_module`;

CREATE TABLE `core_module` (
  `module_id` int(11) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `trail` varchar(100) DEFAULT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_module` */

/*Table structure for table `core_organization` */

DROP TABLE IF EXISTS `core_organization`;

CREATE TABLE `core_organization` (
  `organization_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_organization` */

/*Table structure for table `core_permissions` */

DROP TABLE IF EXISTS `core_permissions`;

CREATE TABLE `core_permissions` (
  `permission_id` int(11) NOT NULL,
  `description` text,
  `group_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_permissions` */

/*Table structure for table `core_role` */

DROP TABLE IF EXISTS `core_role`;

CREATE TABLE `core_role` (
  `role_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_role` */

/*Table structure for table `core_users` */

DROP TABLE IF EXISTS `core_users`;

CREATE TABLE `core_users` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `core_users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
