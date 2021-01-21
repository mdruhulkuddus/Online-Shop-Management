/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.0.45-community-nt : Database - onlineshoping
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onlineshoping` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `onlineshoping`;

/*Table structure for table `aboutus` */

DROP TABLE IF EXISTS `aboutus`;

CREATE TABLE `aboutus` (
  `text_area` text,
  `id` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aboutus` */

insert  into `aboutus`(`text_area`,`id`) values ('our providor service house',1);

/*Table structure for table `categoryinformation` */

DROP TABLE IF EXISTS `categoryinformation`;

CREATE TABLE `categoryinformation` (
  `Item_Name` varchar(20) default NULL,
  `Category_Name` varchar(30) default NULL,
  `Category_ID` varchar(30) NOT NULL,
  PRIMARY KEY  (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `categoryinformation` */

insert  into `categoryinformation`(`Item_Name`,`Category_Name`,`Category_ID`) values ('Laptop','HP','CAT-001'),('Laptop','Tosiba','CAT-002'),('Laptop','DELL','CAT-003'),('Laptop','Lenovo','CAT-004'),('Hardware','MOUSE','CAT-005'),('Hardware','USB','CAT-006'),('Hardware','Keyboard','CAT-007'),('Hardware','Speaker','CAT-008'),('Hardware','Modem','CAT-009'),('Hardware','Printer','CAT-010'),('Hardware','COOLER','CAT-012'),('Laptop','ASUS','CAT-013'),('Monitor','ASUS','CAT-014'),('Monitor','DELL','CAT-015'),('Monitor','Tosiba','CAT-016'),('Monitor','Lenovo','CAT-017'),('Monitor','ACER','CAT-018'),('Monitor','SAMSUNG','CAT-019'),('Monitor','LG','CAT-020'),('Laptop','LG','CAT-021'),('Laptop','SAMSUNG','CAT-022'),('Laptop','ACER','CAT-023'),('Television','SONY','CAT-024'),('Television','SAMSUNG','CAT-025'),('Mobile','SAMSUNG','CAT-026'),('Mobile','Nokia','CAT-027'),('Mobile','I-phone','CAT-028'),('Mobile','Oppo','CAT-029'),('Television','LG','CAT-030');

/*Table structure for table `contactus` */

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `text_area` text,
  `id` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contactus` */

insert  into `contactus`(`text_area`,`id`) values ('dddd',0),('All Client Our Service have our Contact',1);

/*Table structure for table `coustomer_information_bd` */

DROP TABLE IF EXISTS `coustomer_information_bd`;

CREATE TABLE `coustomer_information_bd` (
  `session_id` varchar(100) default NULL,
  `member_name` varchar(30) default NULL,
  `address` text,
  `contact` varchar(30) default NULL,
  `email` varchar(30) default NULL,
  `password` varchar(30) default NULL,
  `confirm_password` varchar(30) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `coustomer_information_bd` */

insert  into `coustomer_information_bd`(`session_id`,`member_name`,`address`,`contact`,`email`,`password`,`confirm_password`) values (NULL,'easin','','','easin','123','123'),(NULL,'hunsm','','','saiful','123',''),(NULL,'nazmul','paglo','','nazmul','123','123'),(NULL,'easin','','','easin@gmail.com','1234',''),('04325659aa16cfb7691f6b936f8e352d','easin2','bbbb','01845703996','easin2@gmail.com','1234',''),('04325659aa16cfb7691f6b936f8e352d','nazmul ','','','na@g.com','123',''),('6c254a7c4c8580cd67ea755c014db23d','yeasin','','','01845709663','255258',''),('c293a8282d3406debe6c1e289906f19e','m','','','mm','m',''),('bc249dd0b8c65b54d5cb3854ade2ef3e','student','','','student','123',''),('d351bb0094d77792b55ef23d43e637b0','asf','asf','fas','asffas','asf','asfas'),('d351bb0094d77792b55ef23d43e637b0','asf','asf','fas','asffas','asf','asfas'),('d351bb0094d77792b55ef23d43e637b0','dd','dd','dd','dd','dd','dd'),('d351bb0094d77792b55ef23d43e637b0','ll','dd','dd','gg','12','dd'),('d351bb0094d77792b55ef23d43e637b0','ll','dd','dd','gg','12','dd');

/*Table structure for table `createadminuser` */

DROP TABLE IF EXISTS `createadminuser`;

CREATE TABLE `createadminuser` (
  `user_name` varchar(20) NOT NULL,
  `email` varchar(20) default NULL,
  `password` varchar(20) default NULL,
  `confirm_password` varchar(20) default NULL,
  PRIMARY KEY  (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `createadminuser` */

insert  into `createadminuser`(`user_name`,`email`,`password`,`confirm_password`) values ('nazmul',' nazmul@gmail.com','234','234'),('rony',' rony@yahoo.com','565','565'),('YASIN',' yasin@gmail.com','123','123');

/*Table structure for table `credit_card` */

DROP TABLE IF EXISTS `credit_card`;

CREATE TABLE `credit_card` (
  `full_name` varchar(20) NOT NULL,
  `account_title` varchar(20) default NULL,
  `account_number` varchar(20) NOT NULL,
  `password` varchar(20) default NULL,
  `amount` varchar(20) default NULL,
  PRIMARY KEY  (`account_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `credit_card` */

insert  into `credit_card`(`full_name`,`account_title`,`account_number`,`password`,`amount`) values ('$full_name',' $acount_title','$acount_number','$password','$amount'),('sfg',' xc','czx','ccc','dczf'),('nb',' fds','dc','dsd','cd'),('rtty','  t','t','gg','t'),('t',' rreeer','tre','rtrt','ret'),('bn',' xc','xx','v','f');

/*Table structure for table `credit_card_user` */

DROP TABLE IF EXISTS `credit_card_user`;

CREATE TABLE `credit_card_user` (
  `customer_name` varchar(30) NOT NULL default '',
  `account_title` varchar(20) default NULL,
  `account_number` varchar(30) NOT NULL default '',
  `email` varchar(30) default NULL,
  `password` varchar(20) NOT NULL,
  `amount` varchar(100) default NULL,
  PRIMARY KEY  (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `credit_card_user` */

insert  into `credit_card_user`(`customer_name`,`account_title`,`account_number`,`email`,`password`,`amount`) values ('',' ','cx','FDF','12','1222'),('','  ','123','easin','123','129997845000');

/*Table structure for table `customerinformation` */

DROP TABLE IF EXISTS `customerinformation`;

CREATE TABLE `customerinformation` (
  `customer_id` varchar(15) NOT NULL,
  `customer_name` varchar(20) default NULL,
  `customer_address` text,
  `customer_phone` int(20) default NULL,
  `customer_email` varchar(20) default NULL,
  `customer_password` varchar(20) default NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customerinformation` */

insert  into `customerinformation`(`customer_id`,`customer_name`,`customer_address`,`customer_phone`,`customer_email`,`customer_password`) values ('01','sdfds','sdfsdf',5252,'hfg','hgn'),('012','fdssddsffds','dsfsdf',0,'sdfsd','fsdsd'),('er','r','e',0,'erw','e'),('gh','gf','>g',0,'g','gf'),('gr','ewe','ewrerw',0,'erw','ew'),('rerew','erw','erw',0,'ewr','erw'),('rr','erwewr','erw',0,'ewr','ew');

/*Table structure for table `delevaryinformation` */

DROP TABLE IF EXISTS `delevaryinformation`;

CREATE TABLE `delevaryinformation` (
  `delevary_id` varchar(20) NOT NULL,
  `delevary_date` date default NULL,
  `shipment_type` varchar(15) default NULL,
  `shipment_name` varchar(15) default NULL,
  `shipment_address` varchar(30) default NULL,
  `shipment_phone` varchar(20) default NULL,
  `shipment_email` varchar(20) default NULL,
  PRIMARY KEY  (`delevary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `delevaryinformation` */

insert  into `delevaryinformation`(`delevary_id`,`delevary_date`,`shipment_type`,`shipment_name`,`shipment_address`,`shipment_phone`,`shipment_email`) values ('ewe','0000-00-00','5254','jjh','ghj','01142','dfgfd'),('sf','2016-01-05','dsffd','FOU','','df','dsf'),('uuu','0000-00-00','jh','wrrw','tryr','yr','rr'),('wrawr','0000-00-00','wrerw','rtgtg','regrft','rtrt','rtrt');

/*Table structure for table `delivery_information_bd` */

DROP TABLE IF EXISTS `delivery_information_bd`;

CREATE TABLE `delivery_information_bd` (
  `session_id` varchar(100) default NULL,
  `delivary_date` date default NULL,
  `shipment_type` varchar(25) default NULL,
  `shipment_to` varchar(20) default NULL,
  `shipment_address` tinytext,
  `contact` varchar(30) default NULL,
  `email` varchar(30) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `delivery_information_bd` */

insert  into `delivery_information_bd`(`session_id`,`delivary_date`,`shipment_type`,`shipment_to`,`shipment_address`,`contact`,`email`) values (NULL,'0000-00-00','ds','sd','ddd','d',''),(NULL,'0000-00-00','232','1212','223','33','23'),(NULL,'0000-00-00','','bjbb','b','nn','bb'),(NULL,'0000-00-00','','bjbb','b','nn','bb'),(NULL,'0000-00-00','','feni','feni','0123',''),('04325659aa16cfb7691f6b936f8e352d','0000-00-00','','feni','feni','0123','easin'),('04325659aa16cfb7691f6b936f8e352d','0000-00-00','','feni','feni','0123','easin'),('04325659aa16cfb7691f6b936f8e352d','0000-00-00','','feni','feni','0123','easin'),('6c254a7c4c8580cd67ea755c014db23d','0000-00-00','','easin','feni','0196422222',''),('bc249dd0b8c65b54d5cb3854ade2ef3e','0000-00-00','','abnoun','dd','01245',''),('d351bb0094d77792b55ef23d43e637b0','0000-00-00','as','as','sa','as','as'),('d351bb0094d77792b55ef23d43e637b0','0000-00-00','as','as','sa','as','as');

/*Table structure for table `iteminformation` */

DROP TABLE IF EXISTS `iteminformation`;

CREATE TABLE `iteminformation` (
  `Item_ID` varchar(20) NOT NULL,
  `Item_name` varchar(20) default NULL,
  PRIMARY KEY  (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `iteminformation` */

insert  into `iteminformation`(`Item_ID`,`Item_name`) values ('ITEM-001','Laptop'),('ITEM-002','Hardware'),('ITEM-003','Monitor'),('ITEM-004','Mobile'),('ITEM-005','Television');

/*Table structure for table `productinformation` */

DROP TABLE IF EXISTS `productinformation`;

CREATE TABLE `productinformation` (
  `Item_name` varchar(20) default NULL,
  `Category_name` varchar(20) default NULL,
  `Product_id` varchar(20) NOT NULL default '',
  `Product_name` varchar(20) default NULL,
  `Product_price` varchar(20) default NULL,
  `Product_details` varchar(50) default NULL,
  `Product_stock` varchar(20) default NULL,
  PRIMARY KEY  (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productinformation` */

insert  into `productinformation`(`Item_name`,`Category_name`,`Product_id`,`Product_name`,`Product_price`,`Product_details`,`Product_stock`) values ('Laptop','HP','PDT-0001','Notebook','35000','Latest','89'),('Laptop','HP','PDT-0002','Probook','40000','Latest','96'),('Laptop','HP','PDT-0004','Pavilion','45000','Latest','20'),('Laptop','HP','PDT-0005','ENVY','35000','Old Verson','65'),('Laptop','HP','PDT-0006','Elitebook','42000','Old verson','45'),('Laptop','HP','PDT-0007','Elitebook 840','41000','Old Version','48'),('Laptop','HP','PDT-0008','Pavilion 75','36000','New ','44'),('Laptop','HP','PDT-0009','Pavilion g4','42000','Latest','88'),('Laptop','HP','PDT-0010','Pavilion g6','42000','Latest','87'),('Laptop','DELL','PDT-0011','Notebook','35000','New','90'),('Laptop','DELL','PDT-0012','Notebook','20000','Latest','89'),('Laptop','DELL','PDT-0013','DeLL G1','45000','Latest','79'),('Laptop','DELL','PDT-0014','DeLL G2','25000','Latest','98'),('Laptop','DELL','PDT-0015','DeLL G3','35000','Latest','89'),('Laptop','Tosiba','PDT-0016','Tosiba h1','25000','New','87'),('Laptop','Tosiba','PDT-0017','Tosiba h2','25000','Latest','89'),('Laptop','Tosiba','PDT-0018','Tosiba h3','35000','new','89'),('Laptop','Tosiba','PDT-0019','Tosiba G1','45000','Latest','89'),('Laptop','Tosiba','PDT-0020','Tosiba G2','50000','Latest','89'),('Laptop','Lenovo','PDT-0021','Levovo L1','28000','Old','88'),('Laptop','Lenovo','PDT-0022','Levovo L2','28000','Latest','89'),('Laptop','Lenovo','PDT-0023','Levovo L3','38000','Latest','88'),('Laptop','Lenovo','PDT-0024','Levovo L4','48000','New','98'),('Laptop','Lenovo','PDT-0025','Levovo L5','40000','Latest','89'),('Laptop','ASUS','PDT-0026','ASUS S1','25000','New','89'),('Laptop','ASUS','PDT-0027','ASUS S2','35000','Latest','89'),('Laptop','ASUS','PDT-0028','ASUS S3','45000','Latest','87'),('Laptop','ASUS','PDT-0029','ASUS S4','50000','New','89'),('Laptop','ASUS','PDT-0030','ASUS S5','45000','New','97'),('Laptop','SAMSUNG','PDT-0031','SAMSUNG P1','21000','Old','89'),('Laptop','SAMSUNG','PDT-0032','SAMSUNG P2','25000','Latest','89'),('Laptop','SAMSUNG','PDT-0033','SAMSUNG P3','35000','Latest','89'),('Laptop','SAMSUNG','PDT-0034','SAMSUNG P4','45000','Latest','88'),('Laptop','SAMSUNG','PDT-0035','SAMSUNG P5','500000','Latest','89'),('Laptop','ACER','PDT-0036','ACER G1','25000','New','89'),('Laptop','ACER','PDT-0037','ACER G2','35000','Latest','98'),('Laptop','ACER','PDT-0038','ACER G3','40000','New','89'),('Laptop','ACER','PDT-0039','ACER G4','40000','New','89'),('Laptop','ACER','PDT-0040','ACER G5','40000','Latest','89'),('Monitor','ASUS','PDT-0041','ASUS M1','15000','NEW','89'),('Monitor','ASUS','PDT-0042','ASUS M2','16000','LATEST','89'),('Monitor','ASUS','PDT-0043','ASUS M3','20000','New','98'),('Monitor','ASUS','PDT-0044','ASUS M4','20000','Latest','89'),('Monitor','ASUS','PDT-0045','ASUS M5','20000','New','89'),('Monitor','DELL','PDT-0046','DELL W1','15000','New','99'),('Monitor','DELL','PDT-0047','DELL W2','25000','New','99'),('Monitor','DELL','PDT-0048','DELL W3','20000','New','99'),('Monitor','DELL','PDT-0049','DELL W4','20000','New','99'),('Monitor','DELL','PDT-0050','DELL W5','20000','New','89'),('Monitor','Tosiba','PDT-0051','TOSIBA R1','15000','New','10'),('Monitor','Tosiba','PDT-0052','TOSIBA R2','15000','New','10'),('Monitor','Tosiba','PDT-0053','TOSIBA R3','15000','New','10'),('Monitor','Tosiba','PDT-0054','TOSIBA R4','15000','Latest','10'),('Monitor','Tosiba','PDT-0055','TOSIBA R5','20000','New','10'),('Hardware','MOUSE','PDT-0056','MOUSE A4tech','500','New','10'),('Hardware','MOUSE','PDT-0057','MOUSE LOG-tech','500','New','10'),('Hardware','MOUSE','PDT-0058','MOUSE Gentus','500','Latest','10'),('Hardware','MOUSE','PDT-0059','MOUSE LX','500','New','9'),('Hardware','MOUSE','PDT-0060','MOUSE Lotus','500','New','9'),('Hardware','Keyboard','PDT-0061','Keyboard A4tech','700','New','15'),('Hardware','Keyboard','PDT-0062','Keyboard FERAN','700','New','15'),('Hardware','Keyboard','PDT-0063','Keyboard LX','700','New','15'),('Hardware','Keyboard','PDT-0064','Keyboard Genius','500','New','15'),('Hardware','Keyboard','PDT-0065','Keyboard LOG-tech','500','New','15'),('Television','SONY','PDT-0066','SONY S1','25000','New','10'),('Television','SONY','PDT-0067','SONY S2','25000','New','10'),('Television','SONY','PDT-0068','SONY S3','20000','New','10'),('Television','SONY','PDT-0069','SONY S4','25000','New','10'),('Television','SONY','PDT-0070','SONY S5','25000','New','10'),('Mobile','SAMSUNG','PDT-0071','SAMSUNG S2','9000','Latest','10'),('Mobile','SAMSUNG','PDT-0072','SAMSUNG S5','12000','Latest','10'),('Mobile','SAMSUNG','PDT-0073','SAMSUNG DOUS2','8000','New','10'),('Mobile','SAMSUNG','PDT-0074','SAMSUNG S3','11000','New','6'),('Mobile','SAMSUNG','PDT-0075','SAMSUNG DOUS3','9000','Latest','10'),('Television','SAMSUNG','PDT-0076','SAMSUNG W1','25000','New','10'),('Laptop','LG','PDT-0077','LG S1','50000','New','10'),('Laptop','LG','PDT-0078','LG S2','25000','New','9'),('Laptop','LG','PDT-0079','LG S3','54000','New','14'),('Laptop','LG','PDT-0080','LG S4','50000','Latest','15'),('Laptop','LG','PDT-0081','LG S5','25000','New','9'),('Laptop','LG','PDT-0082','LG S6','26000','Latest','13'),('Mobile','SAMSUNG','PDT-0083','SAMSUNG J2','13000','LATEST','50'),('Laptop','ACER','PDT-0084','ACER G1','50000','lATEST','50');

/*Table structure for table `shopping_card` */

DROP TABLE IF EXISTS `shopping_card`;

CREATE TABLE `shopping_card` (
  `session_id` varchar(100) default NULL,
  `product_id` varchar(20) default NULL,
  `product_name` varchar(15) default NULL,
  `product_price` float default NULL,
  `quantity` float default NULL,
  `product_details` text,
  `date` varchar(50) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shopping_card` */

insert  into `shopping_card`(`session_id`,`product_id`,`product_name`,`product_price`,`quantity`,`product_details`,`date`) values ('52a2f9b43e4b37c946a2b7d502b2149c','PDT-0060','MOUSE Lotus',500,2,'New','2010-10-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0017','Tosiba h2',25000,1,'Latest','2010-10-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0027','ASUS S2',35000,1,'Latest','2010-12-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0008','Pavilion 75',36000,1,'New ','2010-10-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0033','SAMSUNG P3',35000,1,'Latest','2010-13-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0038','ACER G3',40000,1,'New','2010-10-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0063','Keyboard LX',700,1,'New','2010-15-16'),('14ee69b088e4935456cbe8a0a8509498','PDT-0059','MOUSE LX',500,1,'New','2010-10-16'),('caa7ce993b96e46321282a8a54fd4c14','PDT-0016','Tosiba h1',25000,1,'New','10-10-16'),('17ab82fcecdaf4ce7c61cbbb52ee85b1','PDT-0034','SAMSUNG P4',45000,1,'Latest','11-10-16'),('17ab82fcecdaf4ce7c61cbbb52ee85b1','PDT-0060','MOUSE Lotus',500,1,'New','11-10-16'),('17ab82fcecdaf4ce7c61cbbb52ee85b1','PDT-0002','Probook',40000,1,'Latest','11-10-16'),('ac9c2bfb624f69f7a56a5f38762176ed','PDT-0038','ACER G3',40000,1,'New','11-10-16'),('ac9c2bfb624f69f7a56a5f38762176ed','PDT-0075','SAMSUNG DOUS3',9000,5,'Latest','11-10-16'),('4a6d478932b96e96cac1b79870941565','PDT-0001','Notebook',35000,1,'Latest','12-10-16'),('4a6d478932b96e96cac1b79870941565','PDT-0074','SAMSUNG S3',11000,2,'New','12-10-16'),('4a6d478932b96e96cac1b79870941565','PDT-0001','Notebook',35000,1,'Latest','12-10-16'),('0d790235178b314f2d2ca682557f996e','PDT-0001','Notebook',35000,1,'Latest','13-10-16'),('99d67cc2caf51074e4e9614f3582ebcd','PDT-0011','Notebook',35000,1,'New','14-10-16'),('99d67cc2caf51074e4e9614f3582ebcd','PDT-0013','DeLL G1',45000,1,'Latest','14-10-16'),('74f58bc77bac711a79178bb7d1bc0caa','PDT-0032','SAMSUNG P2',25000,1,'Latest',NULL),('2ebe6a84dd42da5fa760bf8413c26439','PDT-0004','Pavilion',45000,1,'Latest','14-10-16');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
