/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.53 : Database - yxadmin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yxadmin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `yxadmin`;

/*Table structure for table `yx_article` */

DROP TABLE IF EXISTS `yx_article`;

CREATE TABLE `yx_article` (
  `article_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_author` int(11) NOT NULL COMMENT '文章作者',
  `article_title` varchar(200) NOT NULL COMMENT '文章标题',
  `article_poster` varchar(250) NOT NULL COMMENT '文章封面',
  `article_content` text NOT NULL COMMENT '文章内容',
  `article_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章状态 0:正常',
  `article_add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  `article_category` varchar(100) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_article` */

/*Table structure for table `yx_index_menu` */

DROP TABLE IF EXISTS `yx_index_menu`;

CREATE TABLE `yx_index_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_pid` int(11) NOT NULL DEFAULT '0',
  `menu_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为删除状态 0为使用状态',
  `menu_sort` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_index_menu` */

insert  into `yx_index_menu`(`menu_id`,`menu_name`,`menu_pid`,`menu_status`,`menu_sort`) values (18,'后端开发',0,0,2),(19,'服务器',0,0,3),(20,'前端开发',0,0,1),(21,'CSS/CSS3',20,0,0),(22,'JavaScript',20,0,0),(23,'PHP',18,0,0),(24,'Python',18,0,0),(25,'Apache',19,0,0),(26,'nginx',19,0,0),(10,'数据库',0,0,4),(11,'mysql',10,0,0),(12,'mongodb',10,0,0),(14,'其他',0,0,100),(15,'读书&生活',14,0,0),(16,'redis',10,0,0),(17,'linux',19,0,0);

/*Table structure for table `yx_role` */

DROP TABLE IF EXISTS `yx_role`;

CREATE TABLE `yx_role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL COMMENT '角色名',
  `role_describe` text NOT NULL COMMENT '角色描述',
  `role_auth` text NOT NULL COMMENT '角色权限',
  `role_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '角色状态 0:正常',
  `role_add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '角色添加时间',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_role` */

insert  into `yx_role`(`role_id`,`role_name`,`role_describe`,`role_auth`,`role_status`,`role_add_time`) values (1,'超级管理员','整站权限','all',0,'2018-07-21 22:02:45'),(2,'管理员','编辑查看部分权限','admin/System/navMenu,admin/System/addMenu,admin/System/editMenu,admin/User,admin/User/userList,admin/Role/roleList,admin/Order,admin/Article/articleList,admin/Article/addArticle,admin/Article/delArticle,admin/Article/updateArticle',0,'2018-07-18 22:08:13');

/*Table structure for table `yx_user` */

DROP TABLE IF EXISTS `yx_user`;

CREATE TABLE `yx_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL COMMENT '用户登入名',
  `user_pass` varchar(255) NOT NULL COMMENT '用户密码',
  `user_nicename` varchar(50) NOT NULL COMMENT '用户别名',
  `user_email` varchar(100) NOT NULL COMMENT '用户邮箱',
  `user_phone` varchar(30) NOT NULL COMMENT '用户电话',
  `user_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户状态',
  `user_role` int(11) unsigned NOT NULL COMMENT '用户所属角色ID',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户注册时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_user` */

insert  into `yx_user`(`user_id`,`user_login`,`user_pass`,`user_nicename`,`user_email`,`user_phone`,`user_status`,`user_role`,`user_registered`) values (1,'admin','$P$BWXu2GZkkk7vthtbbTHURS7UBQT8do1','','admin@sina.com','15889745718',0,1,'2018-07-21 22:01:32'),(5,'lzc','$P$BGJc/cXuJm58EbmrhKvJ8r1PANd3K..','','lzc@sina.com','15889745718',0,2,'2018-11-12 20:29:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
