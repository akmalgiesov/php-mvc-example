/*
SQLyog Ultimate v8.71 
MySQL - 5.7.33 : Database - taskapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`taskapp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `taskapp`;

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `task` text,
  `status` varchar(20) DEFAULT NULL,
  `edited` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`fio`,`mail`,`task`,`status`,`edited`) values (1,'Акмал','gmali@.ru','gfg','Выполнено','Изменено администратором'),(2,'Акмал','c.chocomoco@yandex.ru','qw','Не выполнено','Изменено администратором'),(3,'Акмал','tophook@yandex.ru','alert(123','Не выполнено',''),(4,'Акмал','c.chocomoco@yandex.ru','ghghg','Не выполнено',''),(5,'Гиесов Акмал Аминджанович','tophook@yandex.ru','Сделать CV','Не выполнено',''),(6,'Акмал','c.chocomoco@yandex.ru','ll','Не выполнено','');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values (1,'admin','123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
