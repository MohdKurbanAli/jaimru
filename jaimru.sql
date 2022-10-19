/*
SQLyog Professional v12.09 (32 bit)
MySQL - 10.4.21-MariaDB : Database - jaimru
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jaimru` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `jaimru`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

/*Table structure for table `contact_qry` */

DROP TABLE IF EXISTS `contact_qry`;

CREATE TABLE `contact_qry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `msg_subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `contact_qry` */

insert  into `contact_qry`(`id`,`name`,`email`,`phone_number`,`msg_subject`,`message`,`created_at`) values (1,'','','','','','2020-11-04 23:28:10'),(2,'jai','jaikashyap22@gmail.com','07838153420','asd','test','2020-11-04 23:28:38'),(3,'jai','jaikashyap22@gmail.com','07838153420','asd','test','2020-11-04 23:28:53'),(4,'jai','jaikashyap22@gmail.com','07838153420','asd','test','2020-11-04 23:28:56'),(5,'Rohan Kapoor','jai.kashyap@prakharsoftwares.com','07838153420','test','test','2020-11-04 23:29:29'),(6,'Chaplin','test@test.com','09876543210','asd','asda','2020-11-04 23:31:45'),(7,'asd','asd@asd.com','undefined','asdad','asd','2020-11-04 23:40:19'),(8,'Jai Kashyap','jaikashyap22@gmail.com','undefined','test1','test1','2020-11-05 14:34:52'),(9,'Jai Kashyap','jaikashyap22@gmail.com','undefined','test1','test1','2020-11-05 14:36:47'),(10,'asf','asd@asd.com','undefined','asd','asdasa','2020-11-05 14:38:34'),(11,'asdfq','asd@asd.com','undefined','asd','asd','2020-11-05 14:40:32'),(12,'sadas','asd@asd.com','undefined','asdasd','asdsadda','2020-11-05 14:42:36'),(13,'sadas','asd@asd.com','undefined','asdasd','asdsadda','2020-11-05 14:43:45'),(14,'asd','asd@asd.com','asd','asd','asdadsa','2020-11-05 14:45:22'),(15,'asd','asd@asd.com','asd','asd','asdadsa','2020-11-05 14:46:53'),(16,'asd','asd@asd.com','asd','asd','asdadsa','2020-11-05 14:46:55'),(17,'asd','asd@asd.com','asd','asd','asdadsa','2020-11-05 14:46:55'),(18,'asd','asd@asd.com','asd','asd','asdadsa','2020-11-05 14:46:55'),(19,'asd','asd@asd.com','asd','asd','asdadsa','2020-11-05 14:46:55'),(20,'asd','asd@asd.com','undefined','asd','asdada','2020-11-05 14:47:04');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `gst` varchar(50) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=680 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`customer_id`,`name`,`email`,`phone`,`company`,`address1`,`address2`,`state`,`zipcode`,`country`,`agent`,`gst`,`status`,`added_by`) values (663,'Manju','manju@jaimru.com','8802141741','Jaimru Technology','Mehrauli','','Delhi','110030','India','admin','','Active',1),(664,'Jai','jaikashyap22@gmail.com','7838153420','SBC Exports Limited','HN 178 M 33 A/1 WARD NO. 2','123','Delhi','110030','India','admin','','Active',1),(665,'Sanjay Store','pbansal_17@yahoo.com','9818120813','Sanjay Store','Vasant Kunj','','Delhi','110070','India','admin','07ALAPB5861D2ZJ','Active',1),(666,'Amit Pai','admin@admin.com','9892144086','Amit Pai','Mumbai','','Maharashtra','400084','India','0','','Active',1),(667,'Rohit Raj Kashyap','rohit@admin.com','8194001390','Rohit Raj Kashyap','Punjab','','Punjab','110000','India','admin','','Active',1),(668,'Anil','anil@jaimru.com','7840037154','NA','NA','','Delhi','NA','India','admin','','Active',1),(669,'Ajay Kolkata','ajay@jaimru.com','8420744295','ajay','NA','','West Bengal','NA','India','0','','Active',1),(670,'PANKAJ BANSAL','NA','9818047361','Sanjay Store','Ground Floor Shop No. 5, Sec A, Pocket B','New Delhi','Delhi','110070','India','admin','07ALAPB5861D2ZJ','Active',1),(671,'asdad','jai@sbcel.com','8745009911','asdsa','Patparganj','','Delhi','110092','India','0','','Active',1),(672,'Rajiv Verma','rajiv.verma@shriramteleinfra.com','9810249334','SHRIRAM TELEINFRA','1826 Amar Nath Building','Bhagirath Palace','Delhi','110095','India','admin','07AAAPV0728J1ZM','Active',1),(673,'Shilpi Gautam','shilpigautam@talentshapers.net','9910054812','TALENT SHAPERS','C-105, National Apartments, Sector-3, Plot-4','Dwarka','Delhi','110075','India','admin','07AAFFT5117L1ZZ','Active',1),(674,'Brajmohan Kashyap','info@shivnetworksolutions.com','9818378139','Shiv Network Solutions','Ground Floor, Pvt -9, Prop. No. 177/C-3','Saraswati Apartment, Near prince Public school Ward No. 2, Mehrauli','Delhi','110030','India','admin','07BLHPM6483L1ZG','Active',1),(675,'Monu Kaushik','mkaushik.mdlandbase@gmail.com','9999999999','Advance India Projects Limited','AIPL Joy Gallery, Sec 66','Gurgaon','Haryana','242221','India','admin','06AACCA9859J1ZB','Active',1),(676,'SUPDT/DDO/HOO','supdtjjb3@gmail.com','01127650884','Juvenile Justice Board -3 <br>Department of Women & Child Development','Sewa Kutir','Kingsway Camp','Delhi','110009','India','admin','','Active',1),(677,'Amit Raj Kashyap','sales@harshith.co.in','8279752106','Harshith Manufacturers Pvt. Ltd','Khasra No - 150 Industrial Park 4 ','Begampur Haridwar','Uttarakhand','249403','India','admin','05AAFCH8549B1ZO','Active',1),(678,'Deepak Jain','dj4010@gmail.com','7011421493','Deepak Jain','NA','','Delhi','110030','India','admin','','Active',1),(679,'Mohit','jobsearchedofficial@gmail.com','8750506164','Job Searched','','','Delhi','','India','0','','Active',1);

/*Table structure for table `department_group` */

DROP TABLE IF EXISTS `department_group`;

CREATE TABLE `department_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(250) DEFAULT NULL,
  `group_status` varchar(250) DEFAULT NULL,
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `department_group` */

insert  into `department_group`(`group_id`,`group_name`,`group_status`) values (1,'Account','Active'),(2,'Sale','Active'),(3,'Operation','Active');

/*Table structure for table `estimate` */

DROP TABLE IF EXISTS `estimate`;

CREATE TABLE `estimate` (
  `es_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `es_number` varchar(255) DEFAULT NULL,
  `es_date` date DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `items` text DEFAULT NULL,
  `oum` text DEFAULT NULL,
  `hsn` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `estimate` */

insert  into `estimate`(`es_id`,`customer_id`,`es_number`,`es_date`,`ex_date`,`currency`,`status`,`agent`,`note`,`items`,`oum`,`hsn`,`price`,`qty`,`amount`,`sub_total`,`tax`,`added_at`) values (3,673,'JMRT-QTT-001','2021-04-08','2021-04-10','INR','Draft','','','[\"Web Software\"]','null','[\"998314\"]','[\"27000\"]','[\"1\"]','[\"27000\"]','','123','2021-04-08 22:54:44'),(4,675,'JMRT-QTT-004','2021-04-27','2021-05-05','INR','Draft','','','[\"Google Ads\",\"Facebook Ads\",\"Bulk SMS Service\"]','null','[\"998361\",\"998361\",\"998413\"]','[\"40000\",\"20000\",\"15000\"]','[\"1\",\"1\",\"1\"]','[\"40000\",\"20000\",\"15000\"]','','123','2021-04-27 15:52:28');

/*Table structure for table `group_id` */

DROP TABLE IF EXISTS `group_id`;

CREATE TABLE `group_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `group_id` */

insert  into `group_id`(`id`,`group_name`) values (1,'ADMIN'),(2,'MANAGER'),(3,'AGENT');

/*Table structure for table `india_state` */

DROP TABLE IF EXISTS `india_state`;

CREATE TABLE `india_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `india_state` */

insert  into `india_state`(`state_id`,`state_name`) values (1,'Andaman and Nicobar (AN)'),(2,'Andhra Pradesh (AP)'),(3,'Arunachal Pradesh (AR)'),(4,'Assam (AS)'),(5,'Bihar (BR)'),(6,'Chandigarh (CH)'),(7,'Chhattisgarh (CG)'),(8,'Dadra and Nagar Haveli (DN)'),(9,'Daman and Diu (DD)'),(10,'Delhi (DL)'),(11,'Goa (GA)'),(12,'Gujarat (GJ)'),(13,'Haryana (HR)'),(14,'Himachal Pradesh (HP)'),(15,'Jammu and Kashmir (JK)'),(16,'Jharkhand (JH)'),(17,'Karnataka (KA)'),(18,'Kerala (KL)'),(19,'Lakshadweep (LD)'),(20,'Madhya Pradesh (MP)'),(21,'Maharashtra (MH)'),(22,'Manipur (MN)'),(23,'Meghalaya (ML)'),(24,'Mizoram (MZ)'),(25,'Odisha (OD)'),(26,'Puducherry (PY)'),(27,'Punjab (PB)'),(28,'Rajasthan (RJ)'),(29,'Sikkim (SK)'),(30,'Tamil Nadu (TN)'),(31,'Telangana (TS)'),(32,'Tripura (TR)'),(33,'Uttar Pradesh (UP)'),(34,'Uttarakhand (UK)'),(35,'West Bengal (WB)');

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `in_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `in_number` varchar(255) DEFAULT NULL,
  `trip_ids` varchar(250) NOT NULL,
  `in_date` date DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `items` text DEFAULT NULL,
  `oum` text DEFAULT NULL,
  `hsn` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `gst_applicable` enum('Yes','No') DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `shipto_name` varchar(255) DEFAULT NULL,
  `shipto_address` text DEFAULT NULL,
  `shipto_state` varchar(100) DEFAULT NULL,
  `shipto_zipcode` varchar(10) DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `added_by` varchar(250) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`in_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `invoice` */

insert  into `invoice`(`in_id`,`customer_id`,`in_number`,`trip_ids`,`in_date`,`ex_date`,`destination`,`status`,`agent`,`note`,`items`,`oum`,`hsn`,`price`,`qty`,`amount`,`sub_total`,`gst_applicable`,`tax`,`shipto_name`,`shipto_address`,`shipto_state`,`shipto_zipcode`,`added_at`,`added_by`,`updated_at`,`updated_by`) values (1,665,'JMRT/21-22/0001','665','2021-04-01','2021-04-10',NULL,NULL,NULL,NULL,'[\"Web Software\",\"SMS Service\",\"Hosting Service\"]','[\"998314\",\"998413\",\"998315\"]','null','[\"14000\",\"0.10\",\"1000\"]','[\"1\",\"10000\",\"1\"]','[\"14000\",\"1000\",\"1000\"]',NULL,'Yes','2880',NULL,NULL,NULL,NULL,'2021-04-07 01:08:33','1',NULL,NULL),(2,672,'JMRT/21-22/0002','672','2021-04-03','2021-04-10',NULL,NULL,NULL,NULL,'[\"Hosting Service\",\"Website Maintenance\"]','[\"998315\",\"998319\"]','null','[\"5000\",\"3000\"]','[\"1\",\"1\"]','[\"5000\",\"3000\"]',NULL,'Yes','1440',NULL,NULL,NULL,NULL,'2021-04-07 15:10:48','1',NULL,NULL),(3,673,'JMRT/21-22/0003','673','2021-04-12','2021-04-15',NULL,NULL,NULL,NULL,'[\"Online Exam Portal Web Software\"]','[\"998314\"]','null','[\"27000\"]','[\"1\"]','[\"27000\"]',NULL,'Yes','4860',NULL,NULL,NULL,NULL,'2021-04-14 22:44:51','1','2021-04-17 17:22:37','1'),(4,674,'JMRT/21-22/0004','674','2021-04-14','2021-04-19',NULL,NULL,NULL,NULL,'[\"Hosting Service and Website Maintenance of (www.shivnetworksolutions.com) Duration 3 Year\"]','[\"998315\"]','null','[\"6000\"]','[\"1\"]','[\"6000\"]',NULL,'Yes','1080',NULL,NULL,NULL,NULL,'2021-04-14 22:45:43','1','2021-04-17 17:30:02','1'),(6,676,'JMRT/21-22/0005','676','2021-10-01','2021-10-04',NULL,NULL,NULL,NULL,'[\"A4 Size Notice Pad\",\"A4 Size Social Investigation Report Pad\"]','[\"4820\",\"4820\"]','null','[\"92\",\"92\"]','[\"50\",\"20\"]','[\"4600\",\"1840\"]',NULL,'Yes','1159.2',NULL,NULL,NULL,NULL,'2021-10-01 00:16:05','1',NULL,NULL),(7,677,'JMRT/21-22/0006','677','2021-10-16','2021-10-20',NULL,NULL,NULL,NULL,'[\"Facebook Ads for 5 days\"]','[\"998361\"]','null','[\"100\"]','[\"5\"]','[\"500\"]',NULL,'Yes','90',NULL,NULL,NULL,NULL,'2021-11-10 12:51:01','1',NULL,NULL),(8,677,'JMRT/21-22/0007','677','2021-11-08','2021-11-13',NULL,NULL,NULL,NULL,'[\"Facebook Ads for 10 days\"]','[\"998361\"]','null','[\"100\"]','[\"10\"]','[\"1000\"]',NULL,'Yes','180',NULL,NULL,NULL,NULL,'2021-11-10 12:54:13','1',NULL,NULL),(9,674,'JMRT/21-22/0008','674','2021-11-19','2021-12-05',NULL,NULL,NULL,NULL,'[\"Google Ads(12 Nov 2021 to 11 Dec 2021)\"]','[\"998361\"]','null','[\"5000\"]','[\"1\"]','[\"5000\"]',NULL,'Yes','900',NULL,NULL,NULL,NULL,'2021-12-01 19:51:56','1','2021-12-01 19:54:27','1'),(10,674,'JMRT/21-22/00009','674','2021-12-02','2021-12-06',NULL,NULL,NULL,NULL,'[\"Domain Purchase/Renewal(1 year)\"]','[\"90302000\"]','null','[\"1000\"]','[\"1\"]','[\"1000\"]',NULL,'Yes','180',NULL,NULL,NULL,NULL,'2021-12-02 17:48:56','1','2021-12-02 17:50:17','1'),(11,665,'JMRT/21-22/00010','665','2022-01-10','2022-01-15',NULL,NULL,NULL,NULL,'[\"Hosting Service (1 Year)\"]','[\"998315\"]','null','[\"5000\"]','[\"1\"]','[\"5000\"]',NULL,'Yes','900',NULL,NULL,NULL,NULL,'2022-01-12 15:46:22','1',NULL,NULL),(12,678,'001','678','2022-01-12','2022-01-27',NULL,NULL,NULL,NULL,'[\"Domain Purchase/Renewal(5 year))\"]','[\"90302000\"]','null','[\"900\"]','[\"5\"]','[\"4500\"]',NULL,'No','0',NULL,NULL,NULL,NULL,'2022-01-12 15:54:55','1','2022-01-16 19:47:30','1'),(13,674,'JMRT/21-22/00011','674','2022-01-12','2022-01-15',NULL,NULL,NULL,NULL,'[\"Google Ads Google Ads(12 Dec 2021 to 11 Jan 2022)\"]','[\"998361\"]','null','[\"5000\"]','[\"1\"]','[\"5000\"]',NULL,'Yes','900',NULL,NULL,NULL,NULL,'2022-01-12 16:13:18','1',NULL,NULL),(14,679,'002','679','2022-01-16','2022-01-20',NULL,NULL,NULL,NULL,'[\"Website Design\"]','[\"998314\"]','null','[\"14500\"]','[\"1\"]','[\"14500\"]',NULL,'No','0',NULL,NULL,NULL,NULL,'2022-01-16 19:52:59','1',NULL,NULL),(15,676,'JMRT/21-22/00012','676','2022-01-05','2022-02-15',NULL,NULL,NULL,NULL,'[\"Printing Pad\"]','[\"49111090\"]','null','[\"92\"]','[\"60\"]','[\"5520\"]',NULL,'Yes','993.6',NULL,NULL,NULL,NULL,'2022-01-25 15:46:47','1',NULL,NULL);

/*Table structure for table `invoice_records` */

DROP TABLE IF EXISTS `invoice_records`;

CREATE TABLE `invoice_records` (
  `ir_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ir_invoice_number` varchar(255) NOT NULL,
  `ir_wo` varchar(255) NOT NULL,
  `ir_month` varchar(255) NOT NULL,
  `ir_add_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ir_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invoice_records` */

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `item_uom` varchar(255) DEFAULT NULL,
  `item_hsn` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`item_name`,`item_uom`,`item_hsn`,`status`) values (28,'Website Design','NA','998314','Active'),(29,'Web Software','NA','998314','Active'),(30,'Bulk SMS Service','NA','998413','Active'),(31,'Hosting Service','NA','998315','Active'),(32,'Website Maintenance','NA','998319','Active'),(33,'Payment Gateway Integration','NA','998314','Active'),(35,'Google Ads','NA','998361','Active'),(36,'Facebook Ads','NA','998361','Active'),(37,'Printing','Paper Printing','49111090','Active'),(38,'A4 Size Social Investigation Report Pad','A4 Size Social Investigation Report Pad','4820','Active'),(39,'A4 Size Notice Pad','A4 Size Notice Pad','4820','Active'),(40,'Domain Purchase/Renewal','Domain Purchase/Renewal','90302000','Active');

/*Table structure for table `jk_user` */

DROP TABLE IF EXISTS `jk_user`;

CREATE TABLE `jk_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email_id` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_type` enum('Admin','Agent','MANAGER') NOT NULL DEFAULT 'Agent',
  `manage_user` varchar(250) NOT NULL,
  `user_department` varchar(250) NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `jk_user` */

insert  into `jk_user`(`user_id`,`user_email_id`,`user_password`,`user_name`,`user_type`,`manage_user`,`user_department`,`user_status`) values (1,'admin@admin.com','123456','admin','Admin','1','1','Active');

/*Table structure for table `newsletter` */

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `newsletter` */

insert  into `newsletter`(`id`,`email`,`created_at`) values (2,'jai@kashyap.com','2020-11-05 00:07:34'),(3,'jai@kashyap.com','2020-11-05 00:07:40'),(4,'jaikashyap22@gmail.com','2020-11-05 00:11:57');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `payment_amount` varchar(255) DEFAULT NULL,
  `added_at` varchar(255) DEFAULT NULL,
  `is_varify` tinyint(1) DEFAULT 0,
  `added_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1245 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`id`,`invoice_id`,`payment_date`,`note`,`transaction_id`,`payment_mode`,`payment_amount`,`added_at`,`is_varify`,`added_by`,`updated_at`,`updated_by`) values (1073,813,'2019-12-16','Yes Bank','N350191009918874','Bank','4600','2019-12-17 10:59:12',0,'3',NULL,NULL),(1074,785,'2019-12-16','HDFC','153501737','Bank','4800','2019-12-17 11:02:56',0,'3',NULL,NULL),(1075,863,'2019-12-16','ICICI','81805000758','Bank','8000','2019-12-17 11:05:52',0,'3',NULL,NULL),(1076,865,'2019-12-16','Yes Bank','','Bank','80000','2019-12-17 11:37:10',0,'3',NULL,NULL),(1077,554,'2019-12-17','Received in office','na','Cash','1100','2019-12-18 06:43:19',0,'3',NULL,NULL),(1078,846,'2019-12-17','HDFC','','Bank','12000','2019-12-18 06:44:41',0,'3',NULL,NULL),(1079,846,'2019-12-10','Payu','289993645','Bank','5000','2019-12-18 06:45:33',0,'3',NULL,NULL),(1080,824,'2019-12-17','Sbi','cash deposit','Bank','35500','2019-12-18 06:48:18',0,'3',NULL,NULL),(1081,858,'2019-12-17','Received in office','na','Cash','100000','2019-12-18 06:54:54',0,'3',NULL,NULL),(1082,641,'2019-12-17','HDFC','na','Bank','25000','2019-12-18 07:28:29',0,'3',NULL,NULL),(1083,382,'2019-12-17','HDFC','na','Bank','20000','2019-12-18 07:30:20',0,'3',NULL,NULL),(1084,873,'2019-12-17','HDFC','na','Bank','30000','2019-12-18 07:39:54',0,'3',NULL,NULL),(1085,873,'2019-12-17','Sbi','na','Bank','22700','2019-12-18 07:40:52',0,'3',NULL,NULL),(1086,749,'2019-12-17','HDFC','935046463768','Bank','14000','2019-12-18 07:44:55',0,'3',NULL,NULL),(1087,729,'2019-12-17','Payu','291132646','Bank','10100','2019-12-18 07:51:22',0,'3',NULL,NULL),(1088,753,'2019-12-17','Payu','291132646','Bank','38900','2019-12-18 07:53:42',0,'3',NULL,NULL),(1089,690,'2019-12-17','Payu','291162304','Bank','10000','2019-12-18 08:47:35',0,'3',NULL,NULL),(1090,425,'2019-12-18','Yes Bank','na','Bank','10000','2019-12-19 10:35:17',0,'3',NULL,NULL),(1091,872,'2019-12-18','Yes Bank','AXSK193520028012','Bank','50000','2019-12-19 10:38:46',0,'3',NULL,NULL),(1092,878,'2019-12-18','Payu','291427008','Bank','12000','2019-12-19 10:42:02',0,'3',NULL,NULL),(1093,654,'2019-12-18','Kotak','935213113861','Bank','16559','2019-12-19 10:46:16',0,'3',NULL,NULL),(1094,879,'2019-12-19','SBI','935242248720','Bank','50000','2019-12-20 09:12:44',0,'3',NULL,NULL),(1095,641,'2019-12-19','HDFC','cash deposit','Bank','20000','2019-12-20 09:15:34',0,'3',NULL,NULL),(1096,641,'2019-12-19','HDFC','na','Bank','24000','2019-12-20 09:19:04',0,'3',NULL,NULL),(1097,845,'2019-12-19','Received In Office','na','Cash','26900','2019-12-20 09:37:49',0,'3',NULL,NULL),(1098,881,'2019-12-19','SBI','na','Bank','3000','2019-12-20 10:17:03',0,'3',NULL,NULL),(1099,751,'2019-12-19','HDFC','KKBKH19353767443','Bank','97700','2019-12-20 10:23:01',0,'3',NULL,NULL),(1100,864,'2019-12-20','HDFC','935311070461','Bank','11100','2019-12-20 10:31:58',0,'3',NULL,NULL),(1101,544,'2019-12-19','SBI','na','Bank','5000','2019-12-20 10:49:24',0,'3',NULL,NULL),(1102,861,'2019-12-19','HDFC','104801596','Bank','8400','2019-12-20 10:51:48',0,'3',NULL,NULL),(1103,844,'2019-12-19','ICICI','21808341821','Bank','50000','2019-12-20 10:58:46',0,'3',NULL,NULL),(1104,656,'2019-12-19','Kotak','935317129808','Bank','20000','2019-12-20 11:13:39',0,'3',NULL,NULL),(1106,889,'2019-12-20','Kotak','935416588701','Bank','30000','2019-12-21 11:10:06',0,'3',NULL,NULL),(1107,738,'2019-12-20','Payu','291711617','Bank','4000','2019-12-21 11:13:55',0,'3',NULL,NULL),(1108,656,'2019-12-20','Payu','291790669','Bank','20000','2019-12-21 11:19:40',0,'3',NULL,NULL),(1109,858,'2019-12-21','received in Office','na','Cash','100000','2019-12-23 09:26:55',0,'3',NULL,NULL),(1110,889,'2019-12-21','Payu','291807160','Bank','31000','2019-12-23 09:43:42',0,'3',NULL,NULL),(1111,889,'2019-12-23','Kotak','935417381849','Bank','8000','2019-12-23 09:46:05',0,'3',NULL,NULL),(1112,879,'2019-12-21','Sbi','935440952353','Bank','25000','2019-12-23 09:47:36',0,'3',NULL,NULL),(1113,836,'2019-12-21','Kotak','935514775395','Bank','35000','2019-12-23 10:11:53',0,'3',NULL,NULL),(1114,836,'2019-12-21','Kotak','935514775395','Bank','35000','2019-12-23 10:11:55',0,'3',NULL,NULL),(1115,857,'2019-12-21','HDFC','na','Bank','17000','2019-12-23 10:17:22',0,'3',NULL,NULL),(1116,888,'2019-12-20','Received in Office','na','Cash','325','2019-12-23 10:22:14',0,'3',NULL,NULL),(1117,859,'2019-12-13','ICICI','','Bank','13500','2019-12-23 11:38:12',0,'3',NULL,NULL),(1118,859,'2019-12-21','Icici','1875671538','Bank','1000','2019-12-23 11:45:18',0,'3',NULL,NULL),(1119,656,'2019-12-21','Payu','29179066','Bank','11480','2019-12-23 12:03:47',0,'3',NULL,NULL),(1120,631,'2019-12-23','Kotak 10k+6600','935711045789  935711055581','Bank','16600','2019-12-24 09:59:52',0,'3',NULL,NULL),(1121,896,'2019-12-23','HDFC','na','Bank','47500','2019-12-24 10:01:54',0,'3',NULL,NULL),(1122,896,'2019-12-23','HDFC','na','Bank','3500','2019-12-24 10:05:12',0,'3',NULL,NULL),(1123,690,'2019-12-23','Yes Bank','N355191014506489','Bank','1500','2019-12-24 10:51:51',0,'3',NULL,NULL),(1124,411,'2019-12-23','HDFC','na','Bank','10000','2019-12-24 10:58:25',0,'3',NULL,NULL),(1125,894,'2019-12-23','HDFC','na','Bank','6320','2019-12-24 11:09:51',0,'3',NULL,NULL),(1126,0,'2019-12-28','1','1','Cash','1','2019-12-28 07:44:50',0,'3',NULL,NULL),(1127,0,'2019-12-28','1','1','Cash','1','2019-12-28 07:45:19',0,'3',NULL,NULL),(1129,16,'0000-00-00','gsrgheryh','cash deposit','Bank','5000','2020-01-02 11:46:34',0,'11',NULL,NULL),(1131,953,'0000-00-00','Kotak','412148191/412766501','Bank','9000','2020-01-06 14:29:32',0,'29',NULL,NULL),(1132,879,'0000-00-00','Sbi','000416074538','Bank','8000','2020-01-06 14:31:49',0,'65',NULL,NULL),(1134,1068,'0000-00-00','ICICI','na','Bank','15000','2020-02-20 16:16:41',0,'50','2020-02-21 10:29:43','3'),(1137,1067,'0000-00-00','HDFC','na','Bank','22000','2020-02-21 11:01:31',0,'50',NULL,NULL),(1139,1073,'2020-02-22','Easebuzz','na','Bank','67000','2020-02-27 11:30:31',0,'65',NULL,NULL),(1140,1072,'2020-01-07','Kotak','000720658234','Bank','12000','2020-02-27 11:53:20',0,'5','2020-02-27 11:54:35','3'),(1141,1072,'2020-01-20','Kotak','na','Bank','20000','2020-02-27 11:54:14',0,'5',NULL,NULL),(1142,1072,'2020-02-19','Received at \r\nPeninsula Hotel','na','Cash','16000','2020-02-27 11:56:08',0,'5',NULL,NULL),(1143,1071,'2020-02-14','Sbi','na','Bank','20000','2020-02-27 12:09:14',0,'5',NULL,NULL),(1144,1071,'2020-02-15','sbi','4610390728','Bank','20000','2020-02-27 12:09:55',0,'5',NULL,NULL),(1145,1071,'2020-02-17','sbi','4809746597','Bank','20000','2020-02-27 12:13:49',0,'5',NULL,NULL),(1146,1071,'2020-02-17','SBI','4716393479','Bank','20000','2020-02-27 12:14:28',0,'5',NULL,NULL),(1147,1070,'2020-02-21','HDFC','na','Cash','2000','2020-02-27 12:15:09',0,'5',NULL,NULL),(1148,1068,'2020-02-19','ICICI','na','Bank','15000','2020-02-27 12:16:36',0,'50',NULL,NULL),(1149,1066,'2020-02-15','CashRecived in office','na','Cash','300000','2020-02-27 14:15:20',0,'21',NULL,NULL),(1150,1066,'2020-02-26','HDFC','na','Bank','96000','2020-02-27 14:16:06',0,'21',NULL,NULL),(1151,1065,'2020-02-15','Expense','na','Cash','2350','2020-02-27 14:16:36',0,'44',NULL,NULL),(1152,1064,'2020-02-11','Kotak','001142782988','Bank','3000','2020-02-28 13:13:34',0,'10',NULL,NULL),(1153,1064,'2020-02-18','Kotak','4640609073','Bank','4000','2020-02-28 13:14:13',0,'10',NULL,NULL),(1154,1064,'2020-02-20','Cash','na','Cash','10000','2020-02-28 13:14:39',0,'10',NULL,NULL),(1156,1064,'2020-02-20','Kotak','5145450368','Bank','13000','2020-02-28 13:16:08',0,'10',NULL,NULL),(1157,1063,'2020-02-07','HDFC','na','Bank','1500','2020-02-28 13:20:22',0,'5',NULL,NULL),(1158,1063,'2020-02-10','Cash','na','Cash','12000','2020-02-28 13:20:49',0,'5',NULL,NULL),(1159,1062,'2020-02-12','HDFC','4317078842','Bank','25000','2020-02-28 14:38:52',0,'5',NULL,NULL),(1160,1062,'2020-02-12','HDFC','4351627242','Bank','5000','2020-02-28 14:39:32',0,'5',NULL,NULL),(1161,1061,'2020-02-10','Kotak','4118169587','Bank','30000','2020-02-28 14:41:12',0,'11',NULL,NULL),(1162,1061,'2020-02-17','Kotak','4811144970','Bank','23000','2020-02-28 14:42:32',0,'11',NULL,NULL),(1163,1060,'2020-02-03','Easebuzz','na','Bank','27000','2020-02-28 14:44:22',0,'11',NULL,NULL),(1164,1060,'2020-02-11','ICICI','na','Bank','10000','2020-02-28 14:45:19',0,'11',NULL,NULL),(1165,1060,'2020-02-17','ICICI','na','Bank','21000','2020-02-28 14:46:51',0,'11',NULL,NULL),(1166,1059,'2020-02-11','SBI','na','Bank','14500','2020-02-28 14:53:08',0,'5',NULL,NULL),(1167,1059,'2020-02-12','SBI','na','Bank','16500','2020-02-28 14:53:41',0,'5',NULL,NULL),(1168,1056,'2020-02-05','HDFC','na','Bank','63000','2020-02-28 14:57:26',0,'21',NULL,NULL),(1169,1055,'2020-02-10','expense','na','Bank','259','2020-02-28 14:58:07',0,'44',NULL,NULL),(1170,1054,'2020-02-07','expense','na','Bank','175','2020-02-28 14:58:38',0,'44',NULL,NULL),(1171,1053,'2020-01-30','expense','na','Bank','1690','2020-02-28 14:59:28',0,'44',NULL,NULL),(1173,1052,'2020-01-30','Expense','na','Bank','598','2020-02-28 15:11:21',0,'44',NULL,NULL),(1174,1051,'2020-02-17','Received to Govind Sir','na','Bank','12800','2020-02-28 15:17:07',0,'42',NULL,NULL),(1175,1050,'2020-02-17','Received at Govind Sir','na','Bank','6037','2020-02-28 15:20:10',0,'42',NULL,NULL),(1176,1049,'2020-02-17','Received by Govind Sir','na','Bank','8029','2020-02-28 15:21:43',0,'42',NULL,NULL),(1177,1048,'2020-02-17','Received by Govind Sir','na','Bank','6355','2020-02-28 15:26:58',0,'42',NULL,NULL),(1178,1047,'2020-02-17','Received by Govind Sir','na','Bank','6520','2020-02-28 15:27:42',0,'42',NULL,NULL),(1179,1046,'2020-02-17','Received by Govind Sir','na','Bank','8000','2020-02-28 15:28:33',0,'42',NULL,NULL),(1180,1045,'2020-02-17','Received by Govind Sir','na','Bank','197','2020-02-28 15:29:24',0,'42',NULL,NULL),(1181,1045,'2020-02-17','Received by Govind Sir','na','Bank','4403','2020-02-28 15:29:54',0,'42',NULL,NULL),(1182,1044,'2020-02-22','Received by Govind Sir','na','Bank','5280','2020-02-28 15:31:44',0,'42',NULL,NULL),(1183,1043,'2020-02-22','Received by Govind Sir','na','Bank','5860','2020-02-28 15:41:31',0,'42',NULL,NULL),(1184,1099,'2020-11-03','test','test','Cash','50','2020-11-03 17:47:49',0,'34',NULL,NULL),(1185,1204,'2020-11-05','HDFC BANK ','422599671','Bank','13700','2020-11-12 13:31:25',0,'19',NULL,NULL),(1186,1180,'2020-10-17','MAHESH GOA TAXI RECIVED TO DIRECT GUEST ','DIRECT ','Cash','2200','2020-11-12 13:34:36',0,'19',NULL,NULL),(1187,1280,'2020-11-18','IN HDFC ACCOUNT ','32312365696','Bank','1400','2020-11-19 14:52:41',0,'19',NULL,NULL),(1188,1277,'2020-11-16','IN HDFC ACCOUNT ','80191803','Bank','1000','2020-11-19 14:53:51',0,'19',NULL,NULL),(1189,1279,'2020-11-15','DIRECT CHECK INN THE HOTEL ','DIRECT ','Cash','5000','2020-11-19 14:55:35',0,'19',NULL,NULL),(1190,1278,'2020-11-12','TRANSFER  IN KOTAK ','KOTAK','Bank','1000','2020-11-19 14:57:34',0,'19',NULL,NULL),(1191,1276,'2020-11-19','received in ICICI BANK  ','202011111777860','Bank','10625','2020-11-19 15:39:30',0,'19',NULL,NULL),(1192,1274,'2020-11-10','RECEIVED IN HDFC BANK ','031501355670','Bank','5000','2020-11-19 15:41:02',0,'19',NULL,NULL),(1193,1273,'2020-11-09','RECEIVED IN SBI ACCOUNT ','031222815981','Bank','6000','2020-11-19 15:42:14',0,'19',NULL,NULL),(1194,1272,'2020-11-19','RECEIVED IN HDFC BANK ','3126742196','Bank','4140','2020-11-19 15:45:12',0,'19',NULL,NULL),(1195,1269,'2020-11-07','RECEIVED IN HDFC BANK ','031213206499','Bank','1000','2020-11-19 15:46:44',0,'19',NULL,NULL),(1196,1271,'2020-11-06','RECEIVED IN PAY U ','374874583','Cash','5000','2020-11-19 15:48:04',0,'19',NULL,NULL),(1197,1270,'2020-11-04','RECEIVED IN HDFC ','30911270598','Cash','2000','2020-11-19 15:49:48',0,'19',NULL,NULL),(1198,1268,'2020-11-01','received in kotak bank ','KOTAK','Bank','500','2020-11-20 11:12:13',0,'19',NULL,NULL),(1199,1268,'2020-11-20','direct received at hotel ','DIRECT ','Cash','5500','2020-11-20 11:13:05',0,'19',NULL,NULL),(1200,1155,'2020-08-14','cash collect at the hotel ','DIRECT ','Cash','1800','2020-11-20 11:30:29',0,'19',NULL,NULL),(1201,1272,'2020-11-19','cash collect the hotel ','DIRECT ','Cash','9660','2020-11-20 11:35:40',0,'19',NULL,NULL),(1202,1178,'2020-10-14','hdfc','neft','Bank','7000','2020-11-20 14:36:08',0,'19',NULL,NULL),(1203,1178,'2020-11-04','HDFC','NEFT','Bank','10000','2020-11-20 14:37:19',0,'19',NULL,NULL),(1204,1282,'2020-11-21','DIRECT PAY THE HOTEL PENINSULA BEACH RESORT ','DIRECT ','Cash','6300','2020-11-23 11:44:00',0,'19',NULL,NULL),(1205,1283,'2020-11-21','received in SBI bank ','186565257','Bank','5000','2020-11-26 12:39:16',0,'19',NULL,NULL),(1206,1288,'2020-11-26','direct pay to the hotel from guest ','DIRECT ','Cash','12500','2020-11-26 12:42:28',0,'19',NULL,NULL),(1207,1295,'2020-12-02','in hdfc account ','337210075147','Bank','1020','2020-12-03 14:56:33',0,'19',NULL,NULL),(1208,1294,'2020-12-02','in hdfc account ','2012021812375443405623','Bank','5000','2020-12-03 15:08:55',0,'19',NULL,NULL),(1209,1293,'2020-12-02','cash received at  office ','shanu ','Cash','2700','2020-12-03 15:09:57',0,'19',NULL,NULL),(1210,1292,'2020-11-28','in kotak bank ','received ','Bank','1250','2020-12-03 15:10:57',0,'19',NULL,NULL),(1211,1291,'2020-11-29','direct pay to peninsula beach resort ','hotel ','Cash','3200','2020-12-03 15:12:32',0,'19',NULL,NULL),(1212,1275,'2020-11-21','hdfc account ','100405000664','Bank','1000','2020-12-03 15:20:09',0,'19',NULL,NULL),(1213,1280,'2020-11-20','direct oay to hotel ','peninsula beach resort ','Cash','5500','2020-12-03 15:21:52',0,'19',NULL,NULL),(1214,1270,'2020-11-28','hdfc','33317236714','Cash','4800','2020-12-03 15:25:59',0,'19',NULL,NULL),(1215,1304,'2020-12-15','','ICICI CASH DEPOSIT ','Cash','16500','2020-12-16 15:50:09',0,'19',NULL,NULL),(1216,1304,'2020-12-16','CASHG DEPOSIT IN ICICI BANK ','ICICI ','Cash','21800','2020-12-16 15:51:10',0,'19',NULL,NULL),(1217,1301,'2020-12-12','ICICI BANK ','034714597690','Bank','5000','2020-12-16 15:53:08',0,'19',NULL,NULL),(1218,1300,'2020-12-07','recived in office ','direct ','Cash','5000','2020-12-16 16:03:26',0,'19',NULL,NULL),(1219,1300,'2020-12-11','received in office ','direct ','Cash','5000','2020-12-16 16:05:21',0,'19',NULL,NULL),(1220,1298,'2020-12-12','hdfc','34715475238','Bank','2000','2020-12-16 16:16:50',0,'19',NULL,NULL),(1221,1299,'2020-12-02','paytm machine ','000017','Bank','2000','2020-12-16 16:28:45',0,'19',NULL,NULL),(1222,1299,'2020-12-09','direct pay to hotel ','hotel ','Cash','12000','2020-12-16 16:30:06',0,'19',NULL,NULL),(1223,1295,'2020-12-04','cash received in hotel ','direct ','Cash','3060','2020-12-16 16:31:30',0,'19',NULL,NULL),(1224,1294,'2020-12-03','hdfc','t2012031718567514066572','Bank','9000','2020-12-16 16:32:41',0,'19',NULL,NULL),(1225,1302,'2020-12-13','received in pay u ','pay you ','Bank','5000','2020-12-16 16:34:36',0,'19',NULL,NULL),(1226,1289,'2020-12-05','cash received in peninsula Beach resort ','direct ','Cash','4800','2020-12-16 16:36:09',0,'19',NULL,NULL),(1227,1276,'2020-11-21','received in peninsula beach resort ','direct ','Cash','31875','2020-12-16 16:37:53',0,'19',NULL,NULL),(1228,1277,'2020-12-07','cash received in peninsula beach resort ','direct ','Cash','5000','2020-12-16 16:39:44',0,'19',NULL,NULL),(1229,1277,'2020-12-08','cash received in peninsula beach resort ','direct ','Cash','5100','2020-12-16 16:41:09',0,'19',NULL,NULL),(1230,1278,'2020-12-04','received in kotak ','google pay ','Bank','3300','2020-12-16 16:42:31',0,'19',NULL,NULL),(1231,1271,'2020-12-05','cash received in peninsula beach resort ','direct ','Cash','12000','2020-12-16 16:43:56',0,'19',NULL,NULL),(1232,1302,'2020-12-16','pay U','38779519','Bank','1800','2020-12-17 15:46:45',0,'19',NULL,NULL),(1233,1269,'2020-12-14','hdfc ','t20120317185675198854949','Bank','10','2020-12-17 16:19:31',0,'19',NULL,NULL),(1234,1269,'2020-12-14','hdfc','t201203106540964212867','Cash','5790','2020-12-17 16:20:49',0,'19',NULL,NULL),(1235,1307,'2020-12-16','icici bank ','','Cash','11500','2020-12-22 16:33:15',0,'19',NULL,NULL),(1236,1306,'2020-12-21','direct pay to taxi driver mahesh ','direct ','Cash','9400','2020-12-22 16:35:34',0,'19',NULL,NULL),(1237,1303,'2020-12-22','kotak bank ','t2012172144402610832844','Bank','6500','2020-12-22 16:36:45',0,'19',NULL,NULL),(1238,1302,'2020-12-18','kotak bank ','035311160636','Bank','700','2020-12-22 16:37:48',0,'19',NULL,NULL),(1239,1,'2021-04-01','','UPI','Bank','12000','2021-04-10 23:47:19',0,'1',NULL,NULL),(1240,1,'2021-04-12','Google Pay transfered','NA','Bank','5000','2021-04-14 22:56:00',0,'1',NULL,NULL),(1241,2,'2021-04-13','To Jaimru Technology Yes Bank','NA','Bank','9440','2021-04-14 23:20:44',0,'1',NULL,NULL),(1242,3,'2021-04-13','To Jaimru Technology (Yes Bank)','NA','Bank','31860','2021-04-14 23:21:53',0,'1',NULL,NULL),(1243,4,'2021-04-07','Paid From SBI Card','NA','Bank','5300','2021-04-14 23:25:22',0,'1',NULL,NULL),(1244,14,'2021-12-08','','Google Pay','Bank','7000','2022-01-16 19:56:37',0,'1',NULL,NULL);

/*Table structure for table `portfolio` */

DROP TABLE IF EXISTS `portfolio`;

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `added_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `portfolio` */

insert  into `portfolio`(`id`,`name`,`link`,`type`,`img`,`added_at`,`updated_at`,`added_by`,`status`) values (3,'Rahul','https://www.jaimru.com/','Prasad','5652f9301eccfc14b7c9c0175cd6a135.png','2021-11-08 12:04:28','2021-11-08 12:17:56',1,'Active'),(4,'Shiv Network Solutions','http://shivnetworksolutions.com/','Website and ERP','311caef3f59d09358a7ad262f4d29e2b.jpg','2021-11-08 12:18:57','2021-11-08 12:19:30',1,'Inactive'),(5,'delhicoder','https://www.jaimru.com/','Website','97ecdc1767c0db5d792f891bd6e689ac.jpg','2021-11-08 12:21:02','2021-11-08 12:22:18',1,'Active');

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

/*Data for the table `positions` */

insert  into `positions`(`id`,`position`) values (1,'Account Executive'),(2,'Account Officer'),(3,'Accountant'),(4,'Accounts Manager'),(5,'Block Level e Manager'),(6,'Business Analyst'),(7,'Data Entry Operator'),(8,'Data Entry Operator '),(9,'DEO cum Inventory Coordintor'),(10,'e-Bank Manager'),(11,'e-Merchant Manager '),(12,'Executive HR'),(13,'IT Assistant '),(14,'Management Consulatant 1'),(15,'Management Consultant'),(16,'Management Consultant Stage 1'),(17,'Management Consultant Stage 3'),(18,'Management Consultant-Stage 2'),(19,'Manager IT '),(20,'MTS'),(21,'MTS (Driver)'),(22,'MTS Level 1'),(23,'MTS Level 1A'),(24,'MTS Level 2'),(25,'MTS Level 3'),(26,'Network Manager'),(27,'Office Assistance Level 1'),(28,'Office Assistance Level 2'),(29,'Office Assistance Level 2A'),(30,'Office Assistance Level 3'),(31,'Office Assistance Level 3A'),(32,'Office Assistance Level 4'),(33,'Office Assistant'),(34,'Operation Manager'),(35,'Project Assistant'),(36,'Project Co-Ordinater '),(37,'Rollout Senior Manager'),(38,'Security Expert Stage-I'),(39,'Sr.Software Developer Stage-I'),(40,'Sr.Software Developer Stage-II'),(41,'Sr.Software Developer Stage-III'),(42,'Software Developer'),(43,'Software support Assistant'),(44,'Software Trainer'),(45,'Sr. Business Analyst Stage 2'),(46,'Sr. Software Developer'),(47,'Security Expert Stage-II'),(48,'Security Expert Stage-III'),(49,'Technical Assistant '),(51,'Consultant(Payment Integration)'),(52,'Consultant HR'),(53,'Office Assistant (Finance)'),(54,'Executive Assistant '),(55,'Technical Executive'),(56,'MTS (working in Canteen)'),(57,'Sr. Executive'),(58,'Sr. Consultant'),(59,'PS to ACEO'),(60,'Business Intelligence Analyst'),(61,'Admin Executive'),(62,'Mobile Application Developer '),(63,'UI Designer/Web Designer stage 2'),(64,'Sr. Software Developer / Team Leader stage 2'),(65,'Mobile Application Developer stage 2'),(66,'Principal Solution Architect / Principal Consultant'),(67,'Testing Engineer'),(68,'System Integrator, Stage 2'),(69,'IT Assistant, Stage 1'),(70,'Project Manager'),(71,'Personal Secretary to CEO');

/*Table structure for table `purchase_products` */

DROP TABLE IF EXISTS `purchase_products`;

CREATE TABLE `purchase_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_invoice_id` int(11) DEFAULT NULL,
  `purchase_payment_date` date DEFAULT NULL,
  `purchase_note` text DEFAULT NULL,
  `purchase_transaction_id` varchar(255) DEFAULT NULL,
  `purchase_payment_mode` varchar(255) DEFAULT NULL,
  `purchase_payment_amount` varchar(255) DEFAULT NULL,
  `vendor` varchar(250) NOT NULL,
  `added_at` varchar(255) DEFAULT NULL,
  `is_varify` tinyint(1) DEFAULT 0,
  `added_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `purchase_products` */

insert  into `purchase_products`(`id`,`purchase_invoice_id`,`purchase_payment_date`,`purchase_note`,`purchase_transaction_id`,`purchase_payment_mode`,`purchase_payment_amount`,`vendor`,`added_at`,`is_varify`,`added_by`,`updated_at`,`updated_by`) values (1,1,'2021-04-02','10000 SMS Purchased','NA','Cash','700','178',NULL,0,'1',NULL,NULL),(2,2,'2021-04-04','SBI Credit Card Payment','NA','Cash','3200','179',NULL,0,'1',NULL,NULL),(3,3,'2021-04-14','Paid Commission to Rajat','NA','Bank','4500','179',NULL,0,'1',NULL,NULL),(4,15,'2022-01-05','','NA','Cash','4500','180',NULL,0,'1',NULL,NULL);

/*Table structure for table `reminder` */

DROP TABLE IF EXISTS `reminder`;

CREATE TABLE `reminder` (
  `rm_id` int(11) NOT NULL AUTO_INCREMENT,
  `ud_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rm_datetime` date NOT NULL,
  `rm_time` varchar(100) DEFAULT NULL,
  `rm_notes` text DEFAULT NULL,
  `rm_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`rm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

/*Data for the table `reminder` */

insert  into `reminder`(`rm_id`,`ud_id`,`user_id`,`rm_datetime`,`rm_time`,`rm_notes`,`rm_added_at`) values (33,18,1,'2017-07-29','05:15:00','safsdfsa','2017-07-30 00:02:33'),(34,18,1,'2017-07-29','05:15:00','safsdfsa','2017-07-30 00:04:57'),(35,18,1,'2017-07-29','05:15:00','safsdfsa','2017-07-30 01:07:07'),(36,18,1,'2017-07-29','05:15:00','safsdfsa','2017-07-30 01:09:26'),(37,18,1,'2017-07-29','12:50','safsdfsa','2017-07-30 01:26:14'),(38,20,1,'2017-07-29','18:30','asdsadsa','2017-07-30 01:26:35'),(39,20,1,'2017-07-29','18:30','asdsadsa','2017-07-30 01:28:59'),(40,20,1,'2017-07-29','18:32','asdsadsa','2017-07-30 01:30:33'),(41,22,1,'2017-07-31','11:35','Call Him now','2017-07-31 18:33:43'),(42,22,1,'2017-07-31','11:38','Call Him now','2017-07-31 18:36:52'),(43,22,1,'2017-07-31','11:40','Call Him now','2017-07-31 18:39:45'),(44,15,5,'2017-07-31','12:30','Call to mr Jai','2017-07-31 19:27:45'),(45,15,5,'2018-07-16','16:00','Call to mr Jai,\r\n\r\ncall in evening','2018-07-16 09:00:44'),(46,36,2,'2018-07-16','16:00','call him after 4:','2018-07-16 09:07:54'),(47,38,2,'2018-07-16','12:45','asadad','2018-07-16 09:08:16'),(48,465,11,'2018-07-26','11:45','Phone Out of reachable...mail ','2018-07-26 07:26:33'),(49,981,11,'2018-07-27','10:00','MORNING TOMOROW','2018-07-26 09:41:28'),(50,981,11,'2018-07-26','11:45','Out of service...Mail','2018-07-26 10:14:03'),(51,653,11,'0000-00-00','11:45','Switch off ...Mail','2018-07-26 11:18:57'),(52,987,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:20:01'),(53,741,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:20:22'),(54,788,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:20:41'),(55,998,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:20:59'),(56,932,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:21:17'),(57,760,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:21:56'),(58,892,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:22:12'),(59,892,11,'2018-07-27','12:00','Yes..Mail...Call Tomorrow ....8130441598','2018-07-26 11:26:17'),(60,898,11,'0000-00-00','11:45','No..Mail,Wats App','2018-07-26 11:38:15'),(61,897,11,'0000-00-00','','Our Of reachable ....Mail','2018-07-26 12:09:20'),(62,897,11,'0000-00-00','','Our Of reachable ....Mail','2018-07-26 12:10:12'),(63,835,11,'0000-00-00','11:45','Yes..Mail..Watsapp..Tomorrow..9953946441...info@shipaassociates.in','2018-07-26 12:15:23'),(64,973,11,'0000-00-00','','Busy...Mail,Watsapp','2018-07-26 12:34:49'),(65,973,11,'0000-00-00','','No...Mail,Watsapp...import from Dubai','2018-07-26 12:43:53'),(66,771,11,'0000-00-00','','Yes..Mail,watsapp,,September','2018-07-27 06:50:35'),(67,636,11,'0000-00-00','','No..Mail ,Watsapp','2018-07-27 06:56:35'),(68,918,11,'0000-00-00','','Yes...Mail , WatsApp,(abhishek@hayakawaindia.com),30 july','2018-07-27 07:06:57'),(69,822,11,'0000-00-00','','No...Mail','2018-07-27 07:23:31'),(70,762,11,'0000-00-00','','Yes..Mail,watsapp,(avikchakraborty@ilfsengg.com),30 July','2018-07-27 07:40:42'),(71,758,11,'0000-00-00','','No..Mail...','2018-07-27 07:52:18'),(72,652,11,'0000-00-00','','No ...Mail,wats app','2018-07-27 07:53:34'),(73,609,11,'0000-00-00','','No,Mail Done','2018-07-27 09:57:56'),(74,609,11,'0000-00-00','','No,Mail Done','2018-07-27 10:00:28'),(75,581,11,'0000-00-00','','No, mail done','2018-07-27 10:01:54'),(76,581,11,'0000-00-00','','No, mail done','2018-07-27 10:04:41'),(77,709,11,'0000-00-00','','Yes,Mail, Wats app , Monday 11 am','2018-07-27 10:10:55'),(78,893,11,'0000-00-00','','Wrong No,Mail','2018-07-27 10:43:31'),(79,907,11,'0000-00-00','','Mail Done','2018-07-27 10:45:30'),(80,907,11,'0000-00-00','','Mail Done','2018-07-27 11:15:28'),(81,567,11,'0000-00-00','','Yes,Mail,Watsapp,(ashish@aafindia.net), September','2018-07-27 11:17:58'),(82,1072,11,'0000-00-00','','Wrong No,Mail done','2018-07-27 11:43:41'),(83,1072,11,'0000-00-00','','Wrong No,Mail done','2018-07-27 11:49:30'),(84,653,11,'0000-00-00','11:45','Switch off ...Mail','2018-07-27 11:51:08'),(85,957,11,'0000-00-00','','yes, mail & watsapp done..(ambersharma@oyorooms.com),September ','2018-08-02 06:15:05'),(86,697,11,'0000-00-00','','Saturday...after 10 am','2018-08-02 06:24:20'),(87,1054,11,'0000-00-00','','Mail Done','2018-08-02 09:14:11'),(88,967,11,'0000-00-00','','No..Mail Done','2018-08-02 09:15:35'),(89,674,11,'0000-00-00','','Wrong No..Mail Done','2018-08-02 09:18:00'),(90,742,11,'0000-00-00','','Yes..Mail done ...Talk to Hr team..September','2018-08-02 09:20:15'),(91,967,11,'0000-00-00','','No..Mail Done','2018-08-02 09:20:34'),(92,1054,11,'0000-00-00','','Mail Done','2018-08-02 09:20:54'),(93,612,11,'0000-00-00','','No....Mail Done','2018-08-02 09:34:27'),(94,954,11,'0000-00-00','','No..Mail Done','2018-08-02 09:49:43'),(95,757,11,'0000-00-00','','Busy...Mail Done','2018-08-02 09:56:38'),(96,633,11,'0000-00-00','','Yes.Mail Done , Wats App Done (anil.kumar2@isgec.co.in)...6 August','2018-08-02 10:17:19'),(97,633,11,'0000-00-00','11:45','Yes.Mail Done , Wats App Done (anil.kumar2@isgec.co.in)...6 August','2018-08-02 10:25:21'),(98,633,11,'0000-00-00','','Yes.Mail Done , Wats App Done (anil.kumar2@isgec.co.in)...6 August','2018-08-02 10:28:06'),(99,894,11,'0000-00-00','','','2018-08-02 10:36:34'),(100,860,11,'0000-00-00','','Yes ...Mail and wats app Done , 4:30 PM','2018-08-02 10:40:36'),(101,793,11,'0000-00-00','','Wrong No.,Mail Done','2018-08-02 10:51:01'),(102,894,11,'0000-00-00','','no...Mail Done','2018-08-06 06:49:39'),(103,608,11,'0000-00-00','','No...Mail Done','2018-08-06 07:33:58'),(104,890,11,'0000-00-00','','No ...Mail Done','2018-08-06 09:18:51'),(105,890,11,'0000-00-00','','No ...Mail Done','2018-08-06 09:18:52'),(106,857,11,'0000-00-00','','No..mail Done','2018-08-06 09:26:54'),(107,608,11,'0000-00-00','','No...Mail Done','2018-08-06 09:27:13'),(108,864,11,'0000-00-00','','Yes...Mail Done ....September','2018-08-06 09:42:28'),(109,698,11,'0000-00-00','','No..Mail Done','2018-08-06 09:47:51'),(110,854,11,'0000-00-00','','No...Mail Done','2018-08-06 09:49:21'),(111,1025,11,'0000-00-00','','No..Mail Done','2018-08-06 09:54:36'),(112,1061,11,'0000-00-00','','No.mail Done','2018-08-06 09:57:47'),(113,1061,11,'0000-00-00','','No.mail Done','2018-08-06 10:01:57'),(114,660,11,'0000-00-00','','No..Mail Done','2018-08-06 10:05:35'),(115,1045,11,'0000-00-00','','No.. mail Done','2018-08-06 10:06:50'),(116,949,11,'0000-00-00','','Wrong No...Mail Done','2018-08-06 10:20:14'),(117,869,11,'0000-00-00','','No...Mail Done','2018-08-06 10:25:13'),(118,620,11,'0000-00-00','','No...Mail Done','2018-08-06 10:29:54'),(119,620,11,'0000-00-00','','Yes...Mail Done','2018-08-06 10:39:09'),(120,928,11,'0000-00-00','','No...Mail Done','2018-08-06 11:02:17'),(121,740,11,'0000-00-00','','No...Mail Done','2018-08-06 11:15:11'),(122,1033,11,'0000-00-00','','No...mail Done','2018-08-06 11:17:49'),(123,931,11,'0000-00-00','','mail Done','2018-08-06 11:22:11'),(124,840,11,'0000-00-00','','Yes...Mail Done....8527098694..Rachna ...Admin','2018-08-06 11:39:16'),(125,591,11,'0000-00-00','','No....Mail Done','2018-08-06 11:41:36'),(126,576,11,'0000-00-00','','No ....Mail Done','2018-08-06 11:51:27'),(127,840,11,'0000-00-00','','Yes...Mail Done....8527098694..Rachna ...Admin(rachna.satra@cairnindia.com)','2018-08-06 11:59:55');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `states` */

insert  into `states`(`id`,`name`,`country_id`) values (1,'Andaman and Nicobar Islands',101),(2,'Andhra Pradesh',101),(3,'Arunachal Pradesh',101),(4,'Assam',101),(5,'Bihar',101),(6,'Chandigarh',101),(7,'Chhattisgarh',101),(8,'Dadra and Nagar Haveli',101),(9,'Daman and Diu',101),(10,'Delhi',101),(11,'Goa',101),(12,'Gujarat',101),(13,'Haryana',101),(14,'Himachal Pradesh',101),(15,'Jammu and Kashmir',101),(16,'Jharkhand',101),(17,'Karnataka',101),(18,'Kenmore',101),(19,'Kerala',101),(20,'Lakshadweep',101),(21,'Madhya Pradesh',101),(22,'Maharashtra',101),(23,'Manipur',101),(24,'Meghalaya',101),(25,'Mizoram',101),(26,'Nagaland',101),(27,'Narora',101),(28,'Natwar',101),(29,'Odisha',101),(30,'Paschim Medinipur',101),(31,'Pondicherry',101),(32,'Punjab',101),(33,'Rajasthan',101),(34,'Sikkim',101),(35,'Tamil Nadu',101),(36,'Telangana',101),(37,'Tripura',101),(38,'Uttar Pradesh',101),(39,'Uttarakhand',101),(40,'Vaishali',101),(41,'West Bengal',101);

/*Table structure for table `tblestimates` */

DROP TABLE IF EXISTS `tblestimates`;

CREATE TABLE `tblestimates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `datesend` datetime DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `expirydate` date DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `clientnote` text DEFAULT NULL,
  `adminnote` text DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) DEFAULT NULL,
  `invoiceid` int(11) DEFAULT NULL,
  `invoiced_date` datetime DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT 0,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_estimate` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `pipeline_order` int(11) NOT NULL DEFAULT 0,
  `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `currency` (`currency`),
  KEY `project_id` (`project_id`),
  KEY `sale_agent` (`sale_agent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tblestimates` */

/*Table structure for table `upload_data` */

DROP TABLE IF EXISTS `upload_data`;

CREATE TABLE `upload_data` (
  `ud_id` int(11) NOT NULL AUTO_INCREMENT,
  `ud_name` varchar(255) DEFAULT NULL,
  `ud_email` varchar(100) DEFAULT NULL,
  `ud_phone` varchar(15) DEFAULT NULL,
  `ud_organisation` varchar(255) DEFAULT NULL,
  `ud_location` varchar(100) DEFAULT NULL,
  `ud_status` enum('Running','Closed','Converted') NOT NULL,
  `ud_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ud_added_by` varchar(100) DEFAULT NULL,
  `ud_assignto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `upload_data` */

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gst` varchar(50) DEFAULT NULL,
  `added_by` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

/*Data for the table `vendor` */

insert  into `vendor`(`vendor_id`,`name`,`email`,`phone`,`company`,`address1`,`address2`,`state`,`zipcode`,`country`,`gst`,`added_by`,`status`) values (178,'KINGFINITY 7 MARKETING HUB PVT. LTD.','office@k7marketinghub.com','06280181833','KINGFINITY 7 MARKETING HUB PVT. LTD.','1959 Opp. CM Model School','Rajpura Town','Punjab','140401','India','','1','Active'),(179,'One.com','info@one.com','9999999999','One.com','USA','USA','','','India','','1','Active'),(180,'NA','admin@admin.com','9999999999','NA','NA','NA','Delhi','110030','India','','1','Active');

/*Table structure for table `wo_contact_master` */

DROP TABLE IF EXISTS `wo_contact_master`;

CREATE TABLE `wo_contact_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wo_id` int(11) DEFAULT NULL,
  `wo_client_contact_person` varchar(255) DEFAULT NULL,
  `wo_client_designation` varchar(255) DEFAULT NULL,
  `wo_client_contact` varchar(255) DEFAULT NULL,
  `wo_client_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `wo_contact_master` */

insert  into `wo_contact_master`(`id`,`wo_id`,`wo_client_contact_person`,`wo_client_designation`,`wo_client_contact`,`wo_client_email`) values (1,2985,'N','asdsad','asdsada','asda'),(2,123,'$wo_client_contact_person_new','$wo_client_designation_new','$wo_client_contact_new','$wo_client_email_new'),(3,2994,'aaa','aa','aaa','aaa'),(4,2994,'bb','bbb','bbbb','bb'),(5,2994,'ccc','ccc','ccc','ccc'),(8,2995,'eee','eee','eee','eee'),(9,2995,'sssss','ssss','ss','ss'),(12,2995,'asdsadsa','asdad','asdada','asdada'),(13,2995,'aaaa','aaa','aaa','aa'),(15,2996,'bbb','ee','ddd','dfsfsd'),(16,2996,'sadfsda','fsdfdsa','fsdf','asfdsaf'),(18,2996,'asdadasadsadsadsadsa','asdadasadsadsadsadsa','asdadasadsadsadsadsa','asdadasadsadsadsadsa'),(19,2996,'bbbbbbbbbbbbbbbbbb','bbbbbbbbbbbbbbbbbb','bbbbbbbbbbbbbbbbbb','bbbbbbbbbbbbbbbbbb'),(20,2997,'','','',''),(21,2998,'','','',''),(22,2996,'','','',''),(23,2996,'','','',''),(24,2996,'','','',''),(25,2996,'','','',''),(26,2996,'','','',''),(27,2996,'','','',''),(28,2996,'','','',''),(29,2996,'','','',''),(30,1,'D S Nagalakshmi','Deputy Director ','9810842297','ds.nagalakshmi@gem.gov.in'),(31,2,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(32,2,'','','',''),(33,2,'','','',''),(34,3,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(35,4,'Mr.Awadhesh Pandit','Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(36,5,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(37,6,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(38,7,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(39,8,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(40,9,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(41,10,'Mr.Awadhesh Pandit','(Assistant.General Manager-Finance&Accounts','8130913390','panditmd@becil.com'),(42,10,'','','',''),(43,5,'','','',''),(44,5,'','','',''),(45,9,'','','','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
