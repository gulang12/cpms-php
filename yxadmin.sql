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
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_article` */

insert  into `yx_article`(`article_id`,`article_author`,`article_title`,`article_poster`,`article_content`,`article_status`,`article_add_time`) values (10,1,'20180818测试文章03','','444',0,'2018-08-18 14:26:10'),(11,1,'20180818测试文章04','','爱我的',0,'2018-08-18 14:26:28'),(12,1,'20180818测试文章05','','为儿女',0,'2018-08-18 14:26:39'),(13,1,'20180818测试文章06','','是否',0,'2018-08-18 14:26:50'),(14,1,'20180818测试文章06','','是否',0,'2018-08-18 14:26:57'),(15,1,'20180818测试文章07','','去儿女',0,'2018-08-18 14:27:08'),(16,1,'20180818测试文章07','','去儿女save',0,'2018-08-18 14:27:33'),(2,1,'第二次测试','','\r\n                                <h2>水电费首付多少地方 水电费水电费是否</h2>\r\n                            ',0,'2018-08-13 21:16:50'),(3,1,'热特让他','','\r\n                                &lt;h2&gt;H+ 后台主题&lt;/h2&gt;\r\n                                &lt;p&gt;H+是一个完全响应式，基于Bootstrap3.3.6最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.1)，当然，也集成了很多功能强大，用途广泛的就jQuery插件，她可以用于所有的Web应用程序，如&lt;b&gt;网站管理后台&lt;/b&gt;，&lt;b&gt;网站会员中心&lt;/b&gt;，&lt;b&gt;C&lt;/b&gt;&lt;/p&gt;\r\n                            ',0,'2018-08-11 21:51:48'),(4,1,'热特让他777777777777','\\upload\\article\\20180812\\157289b89721c5738168e05177241655.jpg','\r\n                                \r\n                                \r\n                                &lt;h1&gt;双方都色粉 水电费盛世嫡妃s&lt;/h1&gt;&lt;p&gt;水电费水电费水电费&lt;/p&gt;&lt;p&gt;&amp;lt;tr&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;ID&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;标题&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;作者&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;封面&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;发布时间&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;操作&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/tr&amp;gt;&lt;/p&gt;                                                                                    ',0,'2018-08-11 21:53:29'),(8,1,'20180818测试文章01','','问问v',0,'2018-08-18 14:24:56'),(9,1,'20180818测试文章02','','胜多负少的 水电费',0,'2018-08-18 14:25:46'),(6,1,'请问','','\r\n                                &lt;h2&gt;H+ 后台主题&lt;/h2&gt;\r\n                                &lt;p&gt;H+是一个完全响应式，基于Bootstrap3.3.6最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.1)，当然，也集成了很多功能强大，用途广泛的就jQuery插件，她可以用于所有的Web应用程序，如&lt;b&gt;网站管理后台&lt;/b&gt;，&lt;b&gt;网站会员中心&lt;/b&gt;，&lt;b&gt;CMS&lt;/b&gt;，&lt;b&gt;CRM&lt;/b&gt;，&lt;b&gt;OA&lt;/b&gt;等等，当然，您也可以对她进行深度定制，以做出更强系统。&lt;/p&gt;\r\n                                &lt;p&gt;\r\n                                    &lt;b&gt;当前版本：&lt;/b&gt;v4.1.0\r\n                                &lt;/p&gt;\r\n                            ',0,'2018-08-11 21:57:14'),(7,1,'舒服舒服','\\upload\\article\\20180811\\7a1099104eed8831f379946330badefe.jpg','\r\n                                \r\n                                &amp;lt;h2&amp;gt;H+ 后台主题&amp;lt;/h2&amp;gt;\r\n                                &amp;lt;p&amp;gt;H+是一个完全响应式，基于Bootstrap3.3.6最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.1)，当然，也集成了很多功能强大，用途广泛的就jQuery插件，她可以用于所有的Web应用程序，如&amp;lt;b&amp;gt;网站管理后台&amp;lt;/b&amp;gt;，&amp;lt;b&amp;gt;网站会员中心&amp;lt;/b&amp;gt;，&amp;lt;b&amp;gt;CMS&amp;lt;/b&amp;gt;，&amp;lt;b&amp;gt;CRM&amp;lt;/b&amp;gt;，&amp;lt;b&amp;gt;OA&amp;lt;/b&amp;gt;等等，当然，您也可以对她进行深度定制，以做出更强系统。&amp;lt;/p&amp;gt;\r\n                                &amp;lt;p&amp;gt;\r\n                                    &amp;lt;b&amp;gt;当前版本：&amp;lt;/b&amp;gt;v4.1.0\r\n                                &amp;lt;/p&amp;gt;\r\n                                                        ',0,'2018-08-11 21:57:33');

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

insert  into `yx_role`(`role_id`,`role_name`,`role_describe`,`role_auth`,`role_status`,`role_add_time`) values (1,'超级管理员','整站权限','all',0,'2018-07-21 22:02:45'),(2,'管理员','编辑查看部分权限','admin/User,admin/User/userList,admin/Role/roleList,admin/Order,admin/Article/articleList,admin/Article/addArticle,admin/Article/delArticle,admin/Article/updateArticle',0,'2018-07-18 22:08:13'),(3,'客服','查看','',0,'2018-07-24 20:04:12'),(4,'审核员','审查资料呢','',0,'2018-07-24 20:06:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `yx_user` */

insert  into `yx_user`(`user_id`,`user_login`,`user_pass`,`user_nicename`,`user_email`,`user_phone`,`user_status`,`user_role`,`user_registered`) values (1,'admin','$P$BWXu2GZkkk7vthtbbTHURS7UBQT8do1','','admin@sina.com','15889745718',0,1,'2018-07-21 22:01:32');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
