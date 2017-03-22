/*
SQLyog Ultimate - MySQL GUI v8.22 
MySQL - 5.5.24-log : Database - mg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mg`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `blog` */

insert  into `blog`(`id`,`title`,`description`) values (1,'sdf','sdfsdf'),(4,'Special tour Package ','This si sis demao dna dthis si sdsema odthis si ddemo and this is demko and this si dema dnsd this'),(5,'WordPress Debrief: ','WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015\r\nI\'ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I\'ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...');

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `persons` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `arrivalDate` varchar(255) DEFAULT NULL,
  `description` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

insert  into `booking`(`id`,`name`,`persons`,`email`,`contact`,`country`,`arrivalDate`,`description`) values (11,'sdf','sdf','sdf','sdf','sdf','sdf','sdf'),(12,'s','s','s','s','s','s','s'),(13,'ss','s','s','s','s','s','s'),(14,'sdf','sdf','sdf@hotmail.com','sdf','sdf','sdf','sdf'),(15,'sdf','sdf','sfd@gmail.com','sdf','sfd','sdf','sdf'),(16,'sff','sdf','sdf@hotmail.com','sdf','sdf','sdf','sdfs'),(17,'s','10','sdfsd@hotmail.com','sdf','sdf','sdf',''),(18,'s','1','2@gmail.com','0','sdfsdf','sdf','sdf'),(19,'sdf','23','sdf@gmail.com','ads','asdf','sadf','sadf'),(20,'fsds','2','s@gmail.com','adf','asdf','asdf','sdf'),(21,'sdf','14212412412','S@gmail.com','124','sf','sf','sdf'),(22,'sdf','123','s@gmai.com','sdfa','sdf','sdf','sdfasdf'),(23,'Sayambhu One dayt','2','sdfsd@gmail.com','sdfsd','asd','sd','sdf');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `description` text,
  `order` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`parent_id`,`description`,`order`,`image`) values (111,'January Issue',0,'January Issue',0,''),(116,'February',0,'',0,'');

/*Table structure for table `cms_groups` */

DROP TABLE IF EXISTS `cms_groups`;

CREATE TABLE `cms_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uri',
  `onDate` date NOT NULL DEFAULT '0000-00-00',
  `shortcontents` text COLLATE utf8_unicode_ci NOT NULL,
  `contents` longtext COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cms_grouptype_id` int(11) NOT NULL DEFAULT '0',
  `weight` int(5) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `is_parent` tinyint(1) NOT NULL DEFAULT '0',
  `publish` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `is_listpage` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `dyn_group_id - normal` (`cms_grouptype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_groups` */

insert  into `cms_groups`(`id`,`title`,`link_type`,`onDate`,`shortcontents`,`contents`,`photo`,`cms_grouptype_id`,`weight`,`parent_id`,`is_parent`,`publish`,`is_listpage`) values (29,'Home','Link','2015-06-26','','http://localhost/trek/','',1,5,0,0,'yes','no'),(20,'animation','Image Gallery','2015-06-15','','','',2,5,0,0,'yes','no'),(26,'About Us','Content Page','2015-06-30','','WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\n<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf','e3a625f063532ed9b16af4d6d6511647.jpg',1,10,0,1,'yes','no'),(23,'Trekking Guide','Content Page','2015-06-30','','WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdfWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf','5768df88d8f50a76e34d2ca567c4a13c.png',1,15,0,0,'yes','no'),(24,'Our Blog','Content Page','2015-06-15','','','',1,20,0,0,'yes','no'),(25,'Contact Us','Content Page','2015-06-15','','sdfsdf','',1,25,0,0,'yes','no'),(12,'Product one','Content Page','2013-10-07','','','',1,5,6,0,'no','no'),(13,'Product two','Content Page','2013-10-07','','','',1,10,6,0,'no','no'),(30,'Himalaya Hub Introduction','Content Page','2015-06-26','','Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused Was well organized and provided us a daily plan and schedule that was very reassuring and kept us focused','2e422a84db5f8f3ffdef56e1c65f5520.jpg',1,30,0,0,'yes','no'),(31,'Our Team','Content Page','2015-06-30','','WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\n<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\n<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf','1c748405443f34757c40a4ffee21c2cd.png',1,35,0,0,'yes','no'),(32,'Legal Document','Content Page','2015-06-30','','WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf<br />\r\nWordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015<br />\r\nI&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...WordPress Debrief: Thoughts After Building My First Two SitesBusiness 2 Community (blog)-Jun 1, 2015 I&#39;ve been blogging on WordPress.com for longer than I can remember. In 2010, I started the Riggins blog on dot com. My blog was there from ...sdfsdf','bc8c9015ad1405e236d0a9fb795603c8.png',1,40,0,0,'yes','no'),(33,'Why us ?','Content Page','2015-06-26','','','',1,45,0,0,'yes','no'),(37,'Contact Us','Content Page','2015-06-26','','sdfsdf','02b35f28cc3d12d950a4b5d38bb9d380.jpg',1,50,0,0,'yes','no'),(39,'Testimonials','Link','2015-06-28','','testimonial','',2,10,0,0,'yes','no');

/*Table structure for table `cms_grouptypes` */

DROP TABLE IF EXISTS `cms_grouptypes`;

CREATE TABLE `cms_grouptypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `abbrev` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Navigation groupings. Eg, header, sidebar, footer, etc';

/*Data for the table `cms_grouptypes` */

insert  into `cms_grouptypes`(`id`,`title`,`abbrev`) values (1,'Header Links',''),(2,'Cms Links','');

/*Table structure for table `feedbacks` */

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comment` text,
  `onDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `feedbacks` */

insert  into `feedbacks`(`id`,`name`,`address`,`email`,`country`,`comment`,`onDate`) values (20,'kiran',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `galleries` */

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `caption` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `onDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `galleries` */

insert  into `galleries`(`id`,`groupId`,`weight`,`caption`,`image`,`onDate`) values (22,20,0,'dfsdf','edd81efc0cac2410449aa97b2ecbaa68.jpg','2015-06-15'),(21,20,0,'sfsdfsdfsd','64fad75bc1f8df00d03aaec7f3966d2f.jpg','2015-06-15');

/*Table structure for table `groupfiles` */

DROP TABLE IF EXISTS `groupfiles`;

CREATE TABLE `groupfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` text NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `groupId` int(11) NOT NULL DEFAULT '0',
  `onDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `groupfiles` */

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `address` text,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `description` longtext,
  `onDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`name`,`address`,`phone`,`email`,`product`,`description`,`onDate`) values (1,'','','','','','',NULL),(2,'','','','','','','2014-09-14'),(3,'asdfasdf','sadfasdf','asdfasdf','asdfasdf@hotmail.comsd','asdfas','asdfasdf','2014-09-14'),(4,'','','','','','','2014-09-14'),(5,'','','','','','','2014-09-14'),(7,'','','','','','','2014-09-14'),(8,'asdfasd','asdfasd','asdfasdf','sadfasd@hotmail.com','sdfasd','asdfasdf','2014-09-14'),(9,'sdfs','sfdsdf','sdfs','suneeil_thapa@webmail.com','20kg','dfsdfsdff','2014-09-14'),(10,'sdfad','sdfs','sdfs','sdfsf@hotmail.com','asdfasdf','sdfsdf','2014-09-14'),(11,'sdfsdf','sdfsd','asdfasd','sdfsf@hotmail.com','sdfasd','sdfsdf','2014-09-14'),(12,'asdf','asdfasd','asdfasd','asdf@hotmail.com','asdf','asdfasdf','2014-09-17'),(13,'','','','','','','2014-09-17'),(14,'sdsd','adsfasdf','a','sdsd@hotmail.com','ss','asdfasdfasdf','2014-09-17'),(15,'','','','','','','2014-09-18'),(16,'','','','','','','2014-09-18'),(17,'','','','','','','2014-09-18'),(18,'','','','','','','2014-09-18'),(19,'we','asdfasd','asdfasd','sdfssdfsff@hot','ae','asdfasdf','2014-09-18'),(20,'fdsa','fjkasdf','fds','fds@gmail.com','fdsa','adsfasd','2014-09-18'),(21,'','','','','','','2014-09-18'),(22,'','','','','','','2014-10-13'),(23,'','','','','','','2014-10-13'),(24,'','','','','','','2014-11-07'),(25,'','','','','','','2014-11-23');

/*Table structure for table `postjob` */

DROP TABLE IF EXISTS `postjob`;

CREATE TABLE `postjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(225) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `num_vacancies` int(11) DEFAULT NULL,
  `job_category` varchar(225) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `postjob` */

insert  into `postjob`(`id`,`job_title`,`country`,`job_description`,`num_vacancies`,`job_category`,`salary`) values (1,'dfsd','Korea','sdfsdf',0,'Administration','sdf');

/*Table structure for table `product_choice_type` */

DROP TABLE IF EXISTS `product_choice_type`;

CREATE TABLE `product_choice_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `product_choice_type` */

insert  into `product_choice_type`(`id`,`product_type`,`product_id`) values (10,'best selling',51),(12,'new arrival',52),(13,'new arrival',53),(14,'editor choice',45),(15,'best selling',54),(16,'new arrival',56),(17,'best selling',58),(20,'editor choice',65),(21,'new arrival',89);

/*Table structure for table `product_color` */

DROP TABLE IF EXISTS `product_color`;

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

/*Data for the table `product_color` */

insert  into `product_color`(`id`,`name`,`product_id`,`image`) values (1,NULL,1,'1fd312925843089eceb13ab050e64e95.jpg'),(2,NULL,1,'8b1be059888a6169e6ba6828ad7b470b.jpg'),(3,NULL,44,'4de0305c6b030fdd27a3df6a2ea1140d.jpg'),(4,NULL,44,'c89d33df62667ec2df405cb6d43a7d37.jpg'),(5,NULL,44,'f66053d55cd2f283604a0702f1b8492e.jpg'),(7,NULL,44,'75b217c00f6c3216be195a0472c9e1ef.jpg'),(8,NULL,45,'baae35eb681c0a57a0c66c42d5486ed1.jpg'),(9,NULL,45,'ef4c29a5fd9a212acb6d59751b5621ad.jpg'),(10,NULL,45,'31a38c4e3079537ac49a772d4ab23a5a.jpg'),(11,NULL,45,'43aa2785511542538f3dc35501c9d67d.jpg'),(12,NULL,41,'4cc7b5fa66fcc508429314afdaff46f6.jpg'),(13,NULL,41,'e067fd3cbcbc3177dc4b52a07fd1ca95.jpg'),(17,NULL,49,'2aa79038a60c12510aedb3addbcd7bac.jpg'),(19,NULL,51,'f4b262a0b631b9c54a1fef6309fb5055.jpg'),(20,NULL,52,'82e953ffe3eb2db563711657d3b42710.jpg'),(21,NULL,53,'90c36db2def505a3a236a9ef43aa416c.jpg'),(22,NULL,54,'341d177db593ab926af756009f9e19b3.jpg'),(23,NULL,56,'46463f59fe29764b4e28bcc5183b5a90.jpg'),(24,NULL,56,'f0f120ad745b207ec3a0c2bad958db7c.jpg'),(25,NULL,56,'7206aaa54416f8c033d42bb7916b236e.jpg'),(27,NULL,57,'2b1d668fa4721ac9a3781431be62302c.jpg'),(28,NULL,57,'d97cbcd0b7006c88e442ce541f105264.jpg'),(29,NULL,57,'dcfd58810f17c945ea7ba5bcdd4e8494.jpg'),(31,NULL,58,'7f5b2e267c8c57ea161a49a7f640631e.jpg'),(32,NULL,58,'d90f3d1b178ac8dd81dafb4cf653e9d7.jpg'),(34,NULL,58,'c1069c450827d917a311f52a16b3d919.jpg'),(41,NULL,60,'c1245371db51d65c1f935f402ba548fd.jpg'),(42,NULL,60,'dd18ef210c7f936cb177eb0025f0f234.jpg'),(43,NULL,60,'744a6446b9775d6c5a94658592921a1d.jpg'),(44,NULL,62,'8529ebd85997bd1b19bce374d7f81ac8.jpg'),(45,NULL,62,'54b5a5394f956c6f1f230b34522b22c4.jpg'),(46,NULL,62,'6c3ce7cdd962e4305f4ee62172136d78.jpg'),(50,NULL,65,'fb55f30616aa7a11e3a5da98e1c234c2.jpg'),(51,NULL,65,'d5aba101ea4824b8e60614034e3a2095.jpg'),(52,NULL,65,'66b0fdb830c9d0dfd201fb013d1862c8.jpg'),(53,NULL,66,'0190c9c68fd5465e799d1a6798999637.jpg'),(54,NULL,66,'ceb54f9eddb6a845f674f7c6a358858a.jpg'),(55,NULL,66,'e360dce44c4aeaf188a27390e81ac230.jpg'),(56,NULL,67,'3a2c54251b9aa9a652534b61b322dc21.jpg'),(57,NULL,67,'b93bf38ed6e5afb5e4de0ede19529cd8.jpg'),(58,NULL,67,'6d31d2acd88353938b4cc1b2b1122942.jpg'),(59,NULL,68,'8e8190a5c13da224bb9a0a5e8e853149.jpg'),(60,NULL,68,'5f4cf31dd2f0e09925d7393a13395f3c.jpg'),(61,NULL,68,'112c991f853b960a9f3f5c13bb20185d.jpg'),(62,NULL,69,'db91fec0193a371d88624c090725f405.jpg'),(63,NULL,69,'f0a1a8ce1000e948a250e1ebb869efc4.jpg'),(64,NULL,69,'251a2307b1be2b9b39b7776ee66944b4.jpg'),(65,NULL,70,'9fd2fab2be8b56af09bf5442a6542a16.jpg'),(66,NULL,70,'8e0490248adeee9678db7d23e08f6bdb.jpg'),(67,NULL,70,'39015d5bc5daafe764aebe0903bd0a22.jpg'),(68,NULL,71,'9b4ce24ee223c6810227eaf783ff7ab8.jpg'),(69,NULL,71,'f74c1c0b831f69d70617a5a157f815fb.jpg'),(70,NULL,71,'9a4bd746046d411a98a147a6c40d1201.jpg'),(74,NULL,73,'2befee410115a030456a4dc9c188aa3a.jpg'),(75,NULL,73,'6048694a2335fbddd0d5d30f197deece.jpg'),(76,NULL,73,'95af415b8748a717bf190a5761fedcf6.jpg'),(77,NULL,74,'46a97baed1b0f2d7deff5dd45751aee2.jpg'),(78,NULL,74,'713051b4b7e11eb6deaaabfdcf686dad.jpg'),(79,NULL,74,'bc49aa8b2dd4b0a86836fe22aae92fbf.jpg'),(80,NULL,75,'b642777716128b3d3b8fdc649b1e2b5c.jpg'),(81,NULL,75,'0e1736a3402693df9812f5ad3af30c58.jpg'),(82,NULL,75,'d2f625fb835fb33d5fbd4f1ee4283452.jpg'),(86,NULL,77,'758b97099040cafcededd25eb4da5891.jpg'),(87,NULL,77,'f507567ebcee36b79d75b09d5b0ace28.jpg'),(88,NULL,77,'1ed823cca589850737529cb0f448e55c.jpg'),(89,NULL,78,'5ea0adc334d6f3feaa8fcf0b8652a764.jpg'),(90,NULL,78,'bca6bfc5fdaa942dd7e10b0402b88c4b.jpg'),(91,NULL,78,'248e516d1d7e62922ddcb84ea3d4465a.jpg'),(92,NULL,79,'ac5b860973ca008b1b2cb555d8abae7f.jpg'),(93,NULL,79,'ee51753f320c31f20697330438e1255a.jpg'),(94,NULL,79,'e0d4d09f488ec747a6f52738c3a9682c.jpg'),(95,NULL,80,'aece5e13c79badeffa0a4eae5d8861e1.jpg'),(96,NULL,80,'b037d774e5307df14854dcec70c8257f.jpg'),(97,NULL,80,'17a14c02916cb55fcbd8dbef539fcbd4.jpg'),(98,NULL,82,'f662e194f81dfccd63be2e739987150d.jpg'),(99,NULL,82,'9f61c82413c71c980e3be0e3f2554412.jpg'),(100,NULL,82,'b4c0e9143eb0252490bb58102e29a6ab.jpg'),(101,NULL,83,'b2f9aebf27745f185c8799bf6f5b0632.jpg'),(102,NULL,83,'4477e726422c26697ae4396436b0df65.jpg'),(103,NULL,83,'4ed44e19f9f38234f7389d8fcb3990bb.jpg'),(104,NULL,84,'f130ece150443c332a72f373188bf2cc.jpg'),(105,NULL,84,'30ccbf2a83bc48d67dd222a312439ab6.jpg'),(106,NULL,84,'d142f30e9f8c7141673a048c2f36f732.jpg'),(107,NULL,85,'297d1e27a1d5ff67c282234ee4cc2e9d.jpg'),(108,NULL,85,'a3b550f6d2abb223638efc40bc0c05be.jpg'),(109,NULL,85,'c3cc3abf4cb787c48e1b2eb4f2fc729c.jpg'),(110,NULL,86,'e9485f56dd9e49832f792bac1a77c179.jpg'),(111,NULL,86,'30659c28d22929ac849d8d5fe7b39d03.jpg'),(112,NULL,86,'395f51f07db8d224028c0d1313a8bd69.jpg'),(113,NULL,87,'937ba480aa123ba4ebea84d40cb1724c.jpg'),(114,NULL,87,'b8173f87dd275d5cfcde950f6cb0c8ac.jpg'),(115,NULL,87,'c66c282f0dd2a8be652b0e36591c3bc6.jpg'),(116,NULL,88,'827775a70dc2a212cc27aeeb730fbecc.jpg'),(117,NULL,88,'fa09de802cb2805713c97d8037e7a313.jpg'),(118,NULL,88,'1d6d03597efeea10628a4e91b99636c8.jpg'),(119,NULL,93,'352abff7d195f73a0a9f5b06deb58c35.jpg'),(120,NULL,93,'f228d2f9de7de82c9c90bc31f8d6ba52.jpg'),(122,NULL,93,'5f249517c337f9b947a6b6b3c788730d.jpg');

/*Table structure for table `product_veriety` */

DROP TABLE IF EXISTS `product_veriety`;

CREATE TABLE `product_veriety` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `product_veriety` */

insert  into `product_veriety`(`id`,`name`,`product_id`,`image`) values (1,NULL,1,'ad019221ea0f9b9285ac9ff62a8c0437.jpg'),(2,NULL,1,'7d1bdb6768fc3ce27586bea1bcd16d85.jpg'),(3,NULL,44,'2a8ba5b8d521f02fa4cc62788c938adf.jpg'),(4,NULL,44,'659d201208e36716f9b32d44e2727c83.jpg'),(5,NULL,44,'ad019221ea0f9b9285ac9ff62a8c0437.jpg'),(6,NULL,44,'7d1bdb6768fc3ce27586bea1bcd16d85.jpg'),(7,NULL,44,'2a8ba5b8d521f02fa4cc62788c938adf.jpg'),(11,NULL,45,'55a53f872d61544243b709e6e156e71d.jpg'),(12,NULL,45,'cd58a2c58c6d86d578bf9050bea4b901.jpg'),(13,NULL,45,'9d9c96fd8c4e4ca07bd8df2ca5f2d078.jpg'),(14,NULL,45,'66cd5277f72bacedbe43fff3dd7d2fe4.jpg'),(15,NULL,41,'359da24c1a8814664b1e01f529ea89d2.jpg'),(16,NULL,41,'86b94dbd2a5b9359196ab150e841e3cc.jpg'),(20,NULL,49,'fd3cc2c78f5b88fa0294c973391045c7.jpg'),(22,NULL,51,'46e34cd112d0a3a5470dfa4d2311b1a0.jpg'),(23,NULL,52,'946c5f809019238a0b9db59c53e323ac.jpg'),(24,NULL,53,'8fc61b4c8be9d35a1bedb9f3391a0830.jpg'),(25,NULL,54,'92d10d5eaff601643b0dfbb6016b9034.jpg'),(26,NULL,56,'c89d62a577b980116a24bf8056a3490c.jpg'),(27,NULL,56,'e3aef8e11aa8c676f41941d63ad049f4.jpg'),(28,NULL,56,'547972fea5f7fe64ec4ad5d94da5e3cb.jpg'),(30,NULL,56,'f2589459c81772656763eade97f22fcc.jpg'),(31,NULL,57,'a379aff3c8325da41d8400a3f2d20926.jpg'),(32,NULL,57,'6a7e023699ce7fc47cb1f5d1cc35b6bf.jpg'),(33,NULL,57,'2a37e209f513bfd0829277ae834d21ca.jpg'),(34,NULL,57,'f452e36eb95caec5f6b59b0019efb9e0.jpg'),(35,NULL,58,'6f5757372e070f7f9e50095533bb7d70.jpg'),(36,NULL,58,'49d50ee039197531127aaf69614fd213.jpg'),(37,NULL,58,'9b7139de1d45d76553abaa191093d5b9.jpg'),(38,NULL,58,'84eecf1dff20abc6d578f03cb9c912f8.jpg'),(39,NULL,93,'703239e3febb76644ec2bf8adbd3deea.jpg'),(40,NULL,93,'fd7f4a8e23b7041954a5079c9ae1c6c6.jpg'),(42,NULL,93,'3b4885fe2835b562fdceb015dc32b55c.jpg');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `description` text,
  `description3` text,
  `description4` tinytext,
  `description5` tinytext,
  `cat_id` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `hide_price` varchar(3) DEFAULT 'no',
  `date` date DEFAULT NULL,
  `viewed` int(11) DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`model`,`name`,`price`,`currency`,`dimension`,`description`,`description3`,`description4`,`description5`,`cat_id`,`image`,`order`,`hide_price`,`date`,`viewed`,`slug`) values (318,'','df','0.00','NRs','0','sdf','sfdsdf','','',112,'5ce76db8ee60a4ef0b14c645add11406.jpg',0,'no','0000-00-00',0,'df'),(319,'','test','0.00','NRs','0','test','test','','',112,'0769b586b2cfafa47506641ce4a36250.png',0,'no','2017-03-16',0,'test'),(320,'','What a busy jday','0.00','NRs','0','http://localhost/m/issueshttp://localhost/m/issueshttp://localhost/m/issueshttp://localhost/m/issueshttp://localhost/m/issues','http://localhost/m/issueshttp://localhost/m/issueshttp://localhost/m/issueshttp://localhost/m/issues','','',112,'1a461c25c93abd86825f175684467d99.jpg',0,'no','2017-03-17',0,'what-a-busy-jday'),(321,'','Title one test','0.00','NRs','0','Title one test','Title one test','','',111,'6f905cf16e837131de2dd044e61e3bb4.jpg',0,'yes','2017-03-21',0,'title-one-test'),(322,'','Jan iSsue title two','0.00','NRs','0','Jan iSsue title two','Jan iSsue title two','','',111,NULL,0,'yes','2017-03-21',0,'jan-issue-title-two'),(323,'','test  three issue','0.00','NRs','0','test&nbsp; three issue','test&nbsp; three issue','','',111,'247acae7c8f5dce3cdb27671c1268c3f.jpg',0,'yes','2017-03-21',0,'test--three-issue'),(324,'','test feb','0.00','NRs','0','test feb','test feb','','',116,NULL,0,'no','2017-03-22',0,'test-feb'),(325,'','test feb','0.00','NRs','0','test feb','test feb','','',116,NULL,0,'no','2017-03-22',0,'test-feb');

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comments` text NOT NULL,
  `filename` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `onDate` date NOT NULL DEFAULT '0000-00-00',
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`name`,`email`,`comments`,`filename`,`status`,`onDate`,`order`) values (75,'sdf','s@gmail.com','sfdsdsdfsdfsdf','',0,'2015-06-29',0),(76,'sdfs','sdf@hotmail.com','sdfsdsdfsd','',0,'2015-06-29',0),(77,'sdfs','sdf@hotmail.com','sdfsdsdfsd','',1,'2015-06-29',0),(78,'Nicholas Cage','sdf@gmail.com','I\'ll teach you how to code the necessary view controllers for your applications and how to use the settings application to provide a preferences interface for your users. Finally, i\'ll show you how to make a universal App that supports all the current IOS device form factors, ','716ee6a75a84d7a4593969373e02a120.jpg',1,'2015-06-29',0),(82,'sdfs','sdf@gmail.com','adsfasdf','92069c7fc4c94a9853724e94c0b57c98.png',0,'2015-07-02',0),(83,'sdfs','sdf@gmail.com','','',0,'2015-07-02',0),(84,'Nicho J.','nich@gmail.com','cations and how to use the settings application to provide a preferences interface for your users. Finally, i\'ll show you how to make a universal Ap','164e43a123d891d1a6cec1aa3087fe37.png',1,'2015-07-02',0),(85,'sdfsdf','sf@gmail.com','asdfasdf','390d278c143a2a535dcd0890cad7f5ec.png',0,'2015-07-11',0),(86,'sdfsd','s@gmail.com','asdfasdfsdfsdfsdf','48f13413092867135444ad60bba1397f.jpg',1,'2015-07-11',0),(87,'','','','',0,'2015-07-11',0),(88,'','','','',0,'2015-07-11',0),(89,'sdfs','sd@gmail.com','asdfasdf','7a472e73c5884bae05fe5f34f4850119.png',0,'2015-07-11',0),(90,'er','dsg@gmail.com','asdfasdf','d9252f0ef4852f7f5bfefdb018026784.png',0,'2015-07-11',0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1490173849,1,'Admin','istrator','ADMIN','0'),(2,'\0\0','Blue Rays','fa6253c9485f6262b09cd4509770d4fcd2ea4a7b',NULL,'bluerays@gmail.com',NULL,NULL,NULL,NULL,1370668139,1383104343,1,'Blue','Rays',NULL,NULL);

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupId` int(10) unsigned NOT NULL,
  `title` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `onDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `videos` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
