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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_article` */

insert  into `yx_article`(`article_id`,`article_author`,`article_title`,`article_poster`,`article_content`,`article_status`,`article_add_time`,`article_category`) values (1,1,'水电费','','\r\n                                上的           \r\n&lt;pre&gt;./configure --prefix=/usr/local/php \\        #指定php的安装路径\r\n--with-config-file-path=/usr/local/php/etc \\  #php配置文件所在目录\r\n--enable-fpm \\                                #表示激活PHP-FPM方式服务,即FactCGI方式运行PHP服务。\r\n--with-fpm-user=www \\                         #在lamp/lnmp环境中，要与apache或nginx的用户用户组一致\r\n--with-fpm-group=www \\                        #在lamp/lnmp环境中，要与apache或nginx的用户用户组一致\r\n--with-curl \\                                 #打开curl浏览工具的支持\r\n--with-freetype-dir \\                         #打开对freetype字体库支持\r\n--with-gd \\                                   #打开gd库的支持              \r\n--with-iconv-dir \\\r\n--with-libdir=lib64 \\\r\n--with-libxml-dir \\\r\n--with-mysqli \\\r\n--with-mysql \\\r\n--with-openssl \\\r\n--with-pcre-regex \\\r\n--with-pdo-mysql \\                            #PHP7链接mysql的扩展\r\n--with-pdo-sqlite \\\r\n--with-pear \\\r\n&lt;/pre&gt;                 ',0,'2018-11-23 00:00:00','24'),(2,1,'偶然在知乎上看到一篇回帖，','','&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);&quot;&gt;偶然在知乎上看到一篇回帖，瞬间觉得之前看的那么多资料都不及这一篇回帖让我对&amp;nbsp;&lt;code style=&quot;box-sizing: inherit; font-family: Monaco, &amp;quot;Courier New&amp;quot;, &amp;quot;DejaVu Sans Mono&amp;quot;, &amp;quot;Bitstream Vera Sans Mono&amp;quot;, monospace; font-size: 0.6875em; padding: 0px 3px; color: rgb(189, 65, 71); background: rgb(238, 238, 238); border-radius: 0.25rem; margin: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;&quot;&gt;websocket&lt;/code&gt;&amp;nbsp;的认识深刻有木有。所以转到我博客里，分享一下。比较喜欢看这种博客，读起来很轻松，不枯燥，没有布道师的阵仗，纯粹为分享。废话这么多了，最后再赞一个~&lt;/p&gt;&lt;h2 style=&quot;box-sizing: inherit; margin: 0px 0px 14px; font-family: Arial, sans-serif; line-height: 1.3em; color: rgb(87, 89, 98); font-size: 2.125em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; vertical-align: baseline; overflow-wrap: break-word; letter-spacing: -0.7px;&quot;&gt;&lt;span style=&quot;box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; background-color: rgb(239, 239, 239);&quot;&gt;一&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; color: rgb(68, 68, 68);&quot;&gt;、websocket与http&lt;/span&gt;&lt;/h2&gt;&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);&quot;&gt;WebSocket是HTML5出的东西（协议），也就是说HTTP协议没有变化，或者说没关系，但HTTP是不支持持久连接的（长连接，循环连接的不算）&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);&quot;&gt;首先HTTP有&amp;nbsp;&lt;code style=&quot;box-sizing: inherit; font-family: Monaco, &amp;quot;Courier New&amp;quot;, &amp;quot;DejaVu Sans Mono&amp;quot;, &amp;quot;Bitstream Vera Sans Mono&amp;quot;, monospace; font-size: 0.6875em; padding: 0px 3px; color: rgb(189, 65, 71); background: rgb(238, 238, 238); border-radius: 0.25rem; margin: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;&quot;&gt;1.1&lt;/code&gt;&amp;nbsp;和&amp;nbsp;&lt;code style=&quot;box-sizing: inherit; font-family: Monaco, &amp;quot;Courier New&amp;quot;, &amp;quot;DejaVu Sans Mono&amp;quot;, &amp;quot;Bitstream Vera Sans Mono&amp;quot;, monospace; font-size: 0.6875em; padding: 0px 3px; color: rgb(189, 65, 71); background: rgb(238, 238, 238); border-radius: 0.25rem; margin: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;&quot;&gt;1.0&lt;/code&gt;&amp;nbsp;之说，也就是所谓的&amp;nbsp;&lt;code style=&quot;box-sizing: inherit; font-family: Monaco, &amp;quot;Courier New&amp;quot;, &amp;quot;DejaVu Sans Mono&amp;quot;, &amp;quot;Bitstream Vera Sans Mono&amp;quot;, monospace; font-size: 0.6875em; padding: 0px 3px; color: rgb(189, 65, 71); background: rgb(238, 238, 238); border-radius: 0.25rem; margin: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;&quot;&gt;keep-alive&lt;/code&gt;&amp;nbsp;，把多个HTTP请求合并为一个，但是&amp;nbsp;&lt;code style=&quot;box-sizing: inherit; font-family: Monaco, &amp;quot;Courier New&amp;quot;, &amp;quot;DejaVu Sans Mono&amp;quot;, &amp;quot;Bitstream Vera Sans Mono&amp;quot;, monospace; font-size: 0.6875em; padding: 0px 3px; color: rgb(189, 65, 71); background: rgb(238, 238, 238); border-radius: 0.25rem; margin: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;&quot;&gt;Websocket&lt;/code&gt;&amp;nbsp;其实是一个新协议，跟HTTP协议基本没有关系，只是为了兼容现有浏览器的握手规范而已，也就是说它是HTTP协议上的一种补充可以通过这样一张图理解&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);&quot;&gt;有交集，但是并不是全部。&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(102, 102, 102);&quot;&gt;另外HTML5是指的一系列新的API，或者说新规范，新技术。Http协议本身只有1.0和1.1，而且跟Html本身没有直接关系。。通俗来说，你可以用HTTP协议传输非Html数据，就是这样=。=&lt;/p&gt;\r\n                                                            ',0,'2018-12-04 00:00:00','27');

/*Table structure for table `yx_index_menu` */

DROP TABLE IF EXISTS `yx_index_menu`;

CREATE TABLE `yx_index_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_pid` int(11) NOT NULL DEFAULT '0',
  `menu_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为删除状态 0为使用状态',
  `menu_sort` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_index_menu` */

insert  into `yx_index_menu`(`menu_id`,`menu_name`,`menu_pid`,`menu_status`,`menu_sort`) values (18,'后端开发',0,0,2),(19,'服务器',0,0,3),(20,'前端开发',0,0,1),(21,'CSS/CSS3',20,0,0),(22,'JavaScript/Jquery',20,0,0),(23,'PHP',18,0,0),(24,'Python',18,0,0),(25,'Apache',19,0,0),(26,'nginx',19,0,0),(10,'数据库',0,0,4),(11,'mysql',10,0,0),(12,'mongodb',10,0,0),(14,'其他',0,0,100),(15,'读书&生活',14,0,0),(16,'redis',10,0,0),(17,'linux',19,0,0),(27,'HTML/HTML5',20,0,0),(28,'memcache',10,0,0),(29,'上的',0,1,0);

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

insert  into `yx_role`(`role_id`,`role_name`,`role_describe`,`role_auth`,`role_status`,`role_add_time`) values (1,'超级管理员','整站权限','all',0,'2018-07-21 22:02:45'),(2,'管理员','编辑查看部分权限','admin/System/navMenu,admin/System/addMenu,admin/System/editMenu,admin/User,admin/User/userList,admin/Role/roleList,admin/Order,admin/Article/articleList,admin/Article/addArticle,admin/Article/delArticle,admin/Article/updateArticle,socket/wechat,socket/Index/index',0,'2018-07-18 22:08:13');

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
  `user_head_portrait` varchar(300) NOT NULL COMMENT '用户头像',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_user` */

insert  into `yx_user`(`user_id`,`user_login`,`user_pass`,`user_nicename`,`user_email`,`user_phone`,`user_status`,`user_role`,`user_registered`,`user_head_portrait`) values (1,'admin','$P$BWXu2GZkkk7vthtbbTHURS7UBQT8do1','','admin@sina.com','15889745718',0,1,'2018-07-21 22:01:32','a1.jpg'),(5,'lzc','$P$BGJc/cXuJm58EbmrhKvJ8r1PANd3K..','','lzc@sina.com','15889745718',0,2,'2018-11-12 20:29:48','a4.jpg'),(6,'test','$P$BEYDR8KKMNapxNGV7RHG2IglP5SLnO.','','admin@sina.com','12435892545888',0,2,'2019-07-09 11:52:00','a3.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
