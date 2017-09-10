# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.19-MariaDB)
# Database: everythingbackpacker
# Generation Time: 2017-08-29 20:13:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Accomodation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Accomodation`;

CREATE TABLE `Accomodation` (
  `ID` bigint(11) NOT NULL,
  `Title` char(80) NOT NULL,
  `Description` varchar(800) NOT NULL,
  `Location` char(100) NOT NULL,
  `State` varchar(10) NOT NULL,
  `Image` varchar(300) NOT NULL,
  `Wifi` varchar(20) NOT NULL,
  `Parking` varchar(20) NOT NULL,
  `Bond` decimal(10,2) NOT NULL,
  `IDad` int(30) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Accomodation` WRITE;
/*!40000 ALTER TABLE `Accomodation` DISABLE KEYS */;

INSERT INTO `Accomodation` (`ID`, `Title`, `Description`, `Location`, `State`, `Image`, `Wifi`, `Parking`, `Bond`, `IDad`)
VALUES
	(0,'1 bedroom for rent','bedroom for rent that include Single bed, tv and ensuite. This is for a single person and not a couple and the owners are a quiet couple so no loud tennants thanks.','Brisbane','QLD','images/accom/adam23@live.co.uk.jpg','Yes','Yes',1000.00,0),
	(1,'Double bed bedroom for single person or couple','lovely double bed room with balcony for either 1 person or a couple. You get your own bathroom and access to kitchen and living room','Melbourne','VIC','images/accom/adam23@live.co.uk.jpg','Yes','No',2000.00,0);

/*!40000 ALTER TABLE `Accomodation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Advertiser
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Advertiser`;

CREATE TABLE `Advertiser` (
  `Permission` int(10) NOT NULL,
  `Fname` char(80) NOT NULL,
  `Sname` char(80) NOT NULL,
  `Email` char(80) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `BusinessName` char(80) NOT NULL,
  `IDad` bigint(20) NOT NULL,
  `Term` int(20) NOT NULL,
  `Joined` date NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  KEY `ID` (`IDad`),
  KEY `IDad` (`IDad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Advertiser` WRITE;
/*!40000 ALTER TABLE `Advertiser` DISABLE KEYS */;

INSERT INTO `Advertiser` (`Permission`, `Fname`, `Sname`, `Email`, `Phone`, `Password`, `BusinessName`, `IDad`, `Term`, `Joined`, `ID`, `EndDate`)
VALUES
	(2,'adam','batten','adam23@live.co.uk',2498298,'password','Autos',0,3,'2016-12-27',0,'2017-03-27'),
	(4,'john','mike','adamda@live.co.uk',45345,'password37','SydneyCo',1,6,'2016-12-27',1,'2017-06-27'),
	(4,'mike','batten','mike@live.co.uk',80808,'password','co',2,12,'2017-07-22',2,'2018-07-22');

/*!40000 ALTER TABLE `Advertiser` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backpacker
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backpacker`;

CREATE TABLE `backpacker` (
  `Permission` int(10) NOT NULL,
  `Fname` char(80) NOT NULL,
  `Sname` char(80) NOT NULL,
  `Email` char(80) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `Term` int(20) NOT NULL,
  `Joined` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `backpacker` WRITE;
/*!40000 ALTER TABLE `backpacker` DISABLE KEYS */;

INSERT INTO `backpacker` (`Permission`, `Fname`, `Sname`, `Email`, `Phone`, `Password`, `ID`, `Term`, `Joined`, `EndDate`)
VALUES
	(1,'adam','batten','adambatten@live.co.uk',495959,'password',0,3,'2017-01-03','2017-04-03'),
	(3,'james','batten','jbatten@live.co.uk',90900,'password',1,6,'2017-01-03','2017-04-03'),
	(1,'james','brown','adam@live.co.uk',80808,'password',0,3,'2017-08-29','2017-11-29');

/*!40000 ALTER TABLE `backpacker` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Jobs`;

CREATE TABLE `Jobs` (
  `ID` bigint(20) NOT NULL,
  `Title` char(100) NOT NULL,
  `Description` varchar(800) NOT NULL,
  `Employer` char(100) NOT NULL,
  `Location` char(100) NOT NULL,
  `State` varchar(10) NOT NULL,
  `Visa` varchar(40) NOT NULL,
  `PayRate` decimal(10,2) NOT NULL,
  `IDad` int(30) NOT NULL,
  `Permission` int(11) DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Jobs` WRITE;
/*!40000 ALTER TABLE `Jobs` DISABLE KEYS */;

INSERT INTO `Jobs` (`ID`, `Title`, `Description`, `Employer`, `Location`, `State`, `Visa`, `PayRate`, `IDad`, `Permission`)
VALUES
	(0,'Farm labour','picking apples, bananas and general labour work.','J&J','brisbane','nsw','Yes',22.00,0,2),
	(2,'General labour','working on a construction site and using a range of power tools','Buidling Co','ljlj','vic','No',40.00,1,4),
	(3,'couple wanted for farm work','need young and fit couple to work around a farm for 2 weeks.','Apple Farm','Mooroopna','nsw','No',26.00,0,2),
	(4,'Skilled Labour wanted for temp work','looking for someone for temporary work that has experience with tools and machinery and can work without supervision','Co','Brisbane','Qld','Yes',24.00,2,4);

/*!40000 ALTER TABLE `Jobs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Transport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Transport`;

CREATE TABLE `Transport` (
  `ID` bigint(20) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Make` char(100) NOT NULL,
  `Model` char(50) NOT NULL,
  `Year` year(4) NOT NULL,
  `Description` varchar(800) NOT NULL,
  `Location` char(100) NOT NULL,
  `State` varchar(10) NOT NULL,
  `Image` varchar(300) NOT NULL,
  `FuelType` varchar(20) NOT NULL,
  `KM` int(255) NOT NULL,
  `IDad` int(30) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Transport` WRITE;
/*!40000 ALTER TABLE `Transport` DISABLE KEYS */;

INSERT INTO `Transport` (`ID`, `Price`, `Make`, `Model`, `Year`, `Description`, `Location`, `State`, `Image`, `FuelType`, `KM`, `IDad`)
VALUES
	(0,2000.00,'Holdon','Commodore','2003','Selling due to updating car. This is a great car with no problems and has recently been serviced. Will accept nearest offers as looking to sell quickly.','Sydney','NSW','images/transport/holdenadamda@live.co.uk.jpg','Diesel',200000,1),
	(1,1000.00,'not','Clio','2002','Great first time car or for a Backpacker looking for a cheap ride. Minor damage to exterior but no internal damage and will need Road Worthy Test.','Chatswood','NSW','images/transport/adamda@live.co.uk.jpg','Petrol',400000,1),
	(3,3000.00,'Ford','Focus','2003','Runs perfect and has been serviced last year. A few minor dents and scratchs but nothing serious. Just had clutch replaced and new front tires.','Redcliffe','QLD','images/transport/adam23@live.co.uk.jpg','Petrol',200000,0);

/*!40000 ALTER TABLE `Transport` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
