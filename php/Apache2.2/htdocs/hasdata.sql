/*
SQLyog v10.2 
MySQL - 5.5.28 : Database - db_bowos_dc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bowos_dc` /*!40100 DEFAULT CHARACTER SET gbk */;

USE `db_bowos_dc`;

/*Table structure for table `tb_aboutus` */

DROP TABLE IF EXISTS `tb_aboutus`;

CREATE TABLE `tb_aboutus` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_aboutus` */

/*Table structure for table `tb_address` */

DROP TABLE IF EXISTS `tb_address`;

CREATE TABLE `tb_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `lianxitel` varchar(25) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `qq` varchar(25) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `tb_address` */

insert  into `tb_address`(`id`,`name`,`address`,`lianxitel`,`tel`,`qq`,`user_id`,`addtime`,`email`) values (9,'战三','重邮','13616311111','13616311111',NULL,160,'2013-05-19','123@qq.cc'),(10,'大海','15栋楼下','13333387111','13333387111',NULL,162,'2013-05-19','123@123.PO');

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(4) NOT NULL DEFAULT '0',
  `name` varchar(25) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `authority` int(4) DEFAULT NULL COMMENT '0涓鸿秴绾х?鐞嗗憳锛?涓虹?鐞嗗憳',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id`,`name`,`pwd`,`email`,`authority`,`time`) values (0,'admin','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL);

/*Table structure for table `tb_areas` */

DROP TABLE IF EXISTS `tb_areas`;

CREATE TABLE `tb_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `areaid` varchar(20) NOT NULL,
  `area` varchar(50) NOT NULL,
  `cityid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_areas` */

/*Table structure for table `tb_attribute` */

DROP TABLE IF EXISTS `tb_attribute`;

CREATE TABLE `tb_attribute` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_attribute` */

/*Table structure for table `tb_cities` */

DROP TABLE IF EXISTS `tb_cities`;

CREATE TABLE `tb_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityid` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `provinceid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_cities` */

/*Table structure for table `tb_complain` */

DROP TABLE IF EXISTS `tb_complain`;

CREATE TABLE `tb_complain` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `complainer_id` int(10) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=gb2312;

/*Data for the table `tb_complain` */

insert  into `tb_complain`(`id`,`complainer_id`,`content`) values (1,116,'店铺一放的肉太少'),(2,117,'店铺二送货太慢，送到时菜已凉'),(3,118,'顾客一到货后不付款，理由是肉不够多'),(7,159,'  阿斯蒂芬'),(8,159,'买家不诚实');

/*Table structure for table `tb_contactus` */

DROP TABLE IF EXISTS `tb_contactus`;

CREATE TABLE `tb_contactus` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_contactus` */

/*Table structure for table `tb_dianpu` */

DROP TABLE IF EXISTS `tb_dianpu`;

CREATE TABLE `tb_dianpu` (
  `id` int(11) NOT NULL COMMENT '卖家ID',
  `companyname` varchar(50) NOT NULL,
  `hostname` varchar(20) NOT NULL COMMENT '负责人姓名',
  `phone` varchar(11) NOT NULL,
  `sendprice` int(11) NOT NULL DEFAULT '0' COMMENT '外送费用',
  `prices` int(11) NOT NULL COMMENT '起送价格',
  `introduction` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `tb_dianpu` */

insert  into `tb_dianpu`(`id`,`companyname`,`hostname`,`phone`,`sendprice`,`prices`,`introduction`) values (159,'我是大卖家','李四','18716311111',1,9,'欢迎光临'),(161,'好时机','王五','18716311119',1,10,'欢迎光临');

/*Table structure for table `tb_dingcantime` */

DROP TABLE IF EXISTS `tb_dingcantime`;

CREATE TABLE `tb_dingcantime` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `begintime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `type` int(2) DEFAULT NULL COMMENT '0:鏃╅?1:鍗堥?2:鏅氶?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_dingcantime` */

/*Table structure for table `tb_dingdan` */

DROP TABLE IF EXISTS `tb_dingdan`;

CREATE TABLE `tb_dingdan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `salerid` int(10) NOT NULL COMMENT '卖家ID',
  `dingdanhao` varchar(125) DEFAULT NULL,
  `spc` varchar(125) DEFAULT NULL COMMENT '里面的取值是菜品的ID号码',
  `slc` varchar(125) DEFAULT NULL COMMENT '里面放的是对应的菜品的数量',
  `shouhuoren` varchar(25) DEFAULT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `dizhi` varchar(125) DEFAULT NULL,
  `youbian` varchar(10) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `zfff` varchar(25) DEFAULT NULL COMMENT '付款方式',
  `leaveword` mediumtext,
  `time` datetime DEFAULT NULL,
  `xiadanren` varchar(25) DEFAULT NULL COMMENT '下单人，提供了买家ID',
  `zt` varchar(50) DEFAULT NULL COMMENT '状态',
  `total` double(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

/*Data for the table `tb_dingdan` */

insert  into `tb_dingdan`(`id`,`salerid`,`dingdanhao`,`spc`,`slc`,`shouhuoren`,`sex`,`dizhi`,`youbian`,`tel`,`email`,`zfff`,`leaveword`,`time`,`xiadanren`,`zt`,`total`) values (236,159,'20130519152237160','297@296@295@294@','1@1@1@1@','战三',NULL,'重邮',NULL,'13616311111','123@qq.cc','','别放咸了','2013-05-19 15:22:37','buyer1','已收款&nbsp;',36.00),(237,159,'20130519152906162','297@295@','1@1@','大海',NULL,'15栋楼下',NULL,'13333387111','123@123.PO','','','2013-05-19 15:29:06','buyer2','已发货&nbsp;',18.00);

/*Table structure for table `tb_favorites` */

DROP TABLE IF EXISTS `tb_favorites`;

CREATE TABLE `tb_favorites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `sp_id` int(4) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_favorites` */

/*Table structure for table `tb_gonggao` */

DROP TABLE IF EXISTS `tb_gonggao`;

CREATE TABLE `tb_gonggao` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `tb_gonggao` */

insert  into `tb_gonggao`(`id`,`title`,`content`,`time`) values (49,'本站成立了！','热烈庆祝本站成立！！！！！！','2013-05-19');

/*Table structure for table `tb_health` */

DROP TABLE IF EXISTS `tb_health`;

CREATE TABLE `tb_health` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `time` varchar(25) DEFAULT NULL,
  `typeid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_health` */

/*Table structure for table `tb_health_type` */

DROP TABLE IF EXISTS `tb_health_type`;

CREATE TABLE `tb_health_type` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `typename` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_health_type` */

/*Table structure for table `tb_leaveword` */

DROP TABLE IF EXISTS `tb_leaveword`;

CREATE TABLE `tb_leaveword` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` int(4) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `content` text,
  `time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `tb_leaveword` */

/*Table structure for table `tb_link` */

DROP TABLE IF EXISTS `tb_link`;

CREATE TABLE `tb_link` (
  `linkid` int(20) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(200) DEFAULT NULL,
  `linkinfo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`linkid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312;

/*Data for the table `tb_link` */

insert  into `tb_link`(`linkid`,`linkname`,`linkinfo`) values (1,'http://localhost/meal3/index.php','前台主页'),(2,'http://localhost/meal3/admin/index.php','管理员主页'),(3,'http://localhost/meal3/saler/index.php','店铺管理员主页');

/*Table structure for table `tb_message` */

DROP TABLE IF EXISTS `tb_message`;

CREATE TABLE `tb_message` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `state` int(1) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `send_id` int(4) DEFAULT NULL,
  `is_delete` int(4) DEFAULT NULL COMMENT '0鏈?垹1鎺ユ敹鏂瑰垹2鍙戦?鏂瑰垹3鐪熸?鎰忎箟涓婂垹',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_message` */

/*Table structure for table `tb_pingjia` */

DROP TABLE IF EXISTS `tb_pingjia`;

CREATE TABLE `tb_pingjia` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` int(4) DEFAULT NULL,
  `spid` int(4) DEFAULT NULL COMMENT '菜品ID',
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `time` varchar(25) DEFAULT 'now()',
  `isshow` int(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `tb_pingjia` */

insert  into `tb_pingjia`(`id`,`userid`,`spid`,`title`,`content`,`time`,`isshow`) values (29,160,294,'很好吃','非常好吃，推荐！！  ','2013-05-19',1);

/*Table structure for table `tb_provinces` */

DROP TABLE IF EXISTS `tb_provinces`;

CREATE TABLE `tb_provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provinceid` varchar(20) NOT NULL,
  `province` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_provinces` */

/*Table structure for table `tb_rank` */

DROP TABLE IF EXISTS `tb_rank`;

CREATE TABLE `tb_rank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rank` varchar(20) DEFAULT '',
  `minpoints` int(10) DEFAULT '0',
  `maxpoints` int(10) DEFAULT NULL COMMENT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_rank` */

/*Table structure for table `tb_shangpin` */

DROP TABLE IF EXISTS `tb_shangpin`;

CREATE TABLE `tb_shangpin` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '菜品ID',
  `salerID` int(10) NOT NULL COMMENT '卖家ID',
  `mingcheng` varchar(25) DEFAULT NULL,
  `jianjie` mediumtext,
  `addtime` varchar(25) DEFAULT NULL,
  `dengji` varchar(5) DEFAULT NULL,
  `tupian` varchar(200) DEFAULT NULL,
  `shuliang` int(4) DEFAULT NULL,
  `cishu` int(4) DEFAULT NULL,
  `tuijian` int(4) DEFAULT NULL,
  `typeid` int(4) DEFAULT NULL,
  `huiyuanjia` varchar(25) DEFAULT NULL,
  `shichangjia` varchar(25) DEFAULT NULL,
  `integral` int(10) DEFAULT '0',
  PRIMARY KEY (`id`,`salerID`)
) ENGINE=MyISAM AUTO_INCREMENT=303 DEFAULT CHARSET=utf8;

/*Data for the table `tb_shangpin` */

insert  into `tb_shangpin`(`id`,`salerID`,`mingcheng`,`jianjie`,`addtime`,`dengji`,`tupian`,`shuliang`,`cishu`,`tuijian`,`typeid`,`huiyuanjia`,`shichangjia`,`integral`) values (297,159,'卖家1的菜品4','好吃、健康','2013-05-19','精品','saler/upimages/19.jpg',20,0,1,45,'9','10',0),(296,159,'卖家1的菜品3','好吃、健康','2013-05-19','精品','saler/upimages/18.jpg',20,0,1,46,'9','10',0),(295,159,'卖家1的菜品2','好吃、健康','2013-05-19','精品','saler/upimages/17.jpg',20,0,1,47,'9','10',0),(294,159,'卖家1的菜品1','好吃、健康','2013-05-19','精品','saler/upimages/16.jpg',20,0,1,47,'9','10',0),(298,161,'卖家2的菜品1','新鲜美味','2013-05-19','精品','saler/upimages/20.jpg',29,0,2,47,'10','14',0),(299,161,'卖家2的菜品2','新鲜美味','2013-05-19','精品','saler/upimages/21.jpg',29,0,2,47,'10','14',0),(300,161,'卖家2的菜品3','新鲜美味','2013-05-19','精品','saler/upimages/22.jpg',29,0,3,47,'10','14',0),(301,161,'卖家2的菜品4','新鲜美味','2013-05-19','精品','saler/upimages/23.jpg',29,0,4,47,'10','14',0),(302,161,'卖家2的菜品5','新鲜美味','2013-05-19','精品','saler/upimages/24.jpg',29,0,4,47,'10','14',0);

/*Table structure for table `tb_time` */

DROP TABLE IF EXISTS `tb_time`;

CREATE TABLE `tb_time` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `breakfastbegin` time DEFAULT NULL,
  `breakfastend` time DEFAULT NULL,
  `lunchbegin` time DEFAULT NULL,
  `lunchend` time DEFAULT NULL,
  `dinnerbegin` time DEFAULT NULL,
  `dinnerend` time DEFAULT NULL,
  `songording` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_time` */

/*Table structure for table `tb_type` */

DROP TABLE IF EXISTS `tb_type`;

CREATE TABLE `tb_type` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `typename` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `tb_type` */

insert  into `tb_type`(`id`,`typename`) values (45,'快餐'),(46,'小炒'),(47,'中餐');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `dongjie` int(11) DEFAULT NULL COMMENT '冻结账号字段',
  `xingbie` int(11) DEFAULT NULL COMMENT '性别',
  `tel` varchar(25) DEFAULT NULL,
  `qq` varchar(25) DEFAULT NULL,
  `tishi` varchar(50) DEFAULT NULL COMMENT '用于找回密码',
  `huida` varchar(50) DEFAULT NULL COMMENT '用于找回密码',
  `dizhi` varchar(100) DEFAULT NULL COMMENT '地址',
  `birthday` date DEFAULT NULL,
  `regtime` varchar(25) DEFAULT NULL COMMENT '注册时间',
  `truename` varchar(25) DEFAULT NULL COMMENT '真实姓名',
  `lianxitel` varchar(25) DEFAULT NULL COMMENT '联系电话可以不要',
  `role` varchar(10) DEFAULT NULL COMMENT '用户角色',
  `integral` int(10) DEFAULT '0' COMMENT '积分',
  `hisintegral` int(10) DEFAULT '0' COMMENT '历史积分',
  `credit` int(10) DEFAULT '0' COMMENT '信誉',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`name`,`pwd`,`email`,`dongjie`,`xingbie`,`tel`,`qq`,`tishi`,`huida`,`dizhi`,`birthday`,`regtime`,`truename`,`lianxitel`,`role`,`integral`,`hisintegral`,`credit`) values (162,'buyer2','e10adc3949ba59abbe56e057f20f883e','12@11.cc',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-19',NULL,NULL,'买家',0,0,0),(161,'saler2','e10adc3949ba59abbe56e057f20f883e','123@qw.cc',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-19',NULL,NULL,'卖家',0,0,0),(159,'saler1','e10adc3949ba59abbe56e057f20f883e','123@123.cc',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-19',NULL,NULL,'卖家',0,0,0),(160,'buyer1','e10adc3949ba59abbe56e057f20f883e','123@123.ccc',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-19',NULL,NULL,'买家',0,0,0);

/*Table structure for table `tb_zipcode` */

DROP TABLE IF EXISTS `tb_zipcode`;

CREATE TABLE `tb_zipcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `areaid` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_zipcode` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
