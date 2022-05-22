/*
SQLyog Ultimate v10.00 Beta1
MySQL - 8.0.27 : Database - library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `library`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `bookid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `pages` int NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `book` */

insert  into `book`(`bookid`,`title`,`author`,`pages`) values (1,'Harry Potter','J.K.Rowling',500),(2,'Dune','Frank Herbert',412),(3,'Eragon','Christopher Paolini',544),(4,'Demian','Herman Hesse',119),(5,'The Lord of the Rings','J.R.R. Tolkien',654),(6,'It','Stephen King',854),(7,'To Kill a Mockingbird','Harper Lee',430),(11,'Malign Field','Ukvard Mil',254),(17,'Inferno','Dan Brown',653),(19,'Oliver Twist','Charles Dickens',358),(20,'Illiad','Homer',210),(21,'Robin Hood','Henry Gilbert',234),(25,'Conversations With Friends','Sally Rooney',260),(26,'The Virgin Suicides','Jeffrey Eugenides',250),(27,'The Bat','Jo Nesbo',375),(28,'The Girl on the Train','Paula Hawkins',380),(30,'Leuron','Ukvard Mil',110),(31,'A Man Called Ove','Fredrik Backman',368),(32,'The Truth About the Harry Quebert Affair','Joël Dicker',650),(33,'Metro 2033\r\n','Dmitry Glukhovsky\r\n',331),(34,'Animal Farm','George Orwell',91),(35,'Lord of the Flies','William Golding',226),(36,'War and Peace','Leo Tolstoy',1225),(51,'Crime and Punishment','Fyodor Dostoevsky',650);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`userid`,`username`,`password`,`email`) values (1,'admin','admin','admin@admin.com'),(2,'vasivuk','vale','vasivuk@yahoo.com'),(6,'root','vakula','vale@yahoo.com'),(7,'admin','asd','vasivuk@as.com'),(8,'asd','asd','vasivuk@asd.com'),(9,'mila','123','mila@yahoo.com'),(10,'gyumill','123','mila@gmail.com');

/*Table structure for table `userbooks` */

DROP TABLE IF EXISTS `userbooks`;

CREATE TABLE `userbooks` (
  `userid` int NOT NULL,
  `bookid` int NOT NULL,
  PRIMARY KEY (`userid`,`bookid`),
  KEY `bookid` (`bookid`),
  CONSTRAINT `userbooks_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  CONSTRAINT `userbooks_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `userbooks` */

insert  into `userbooks`(`userid`,`bookid`) values (2,1),(2,3),(2,4),(2,5),(10,5),(2,7),(10,26),(10,27),(10,28),(10,34),(10,51);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
