### 简介：

##### 项目名：cpms 是Concise practical management system 的首字母缩写，意思是：简洁实用的后台管理系统

做这个系统起初是为了做一个自己的技术博客用的，在做之前看了两天的TP5用法，然后动手写了这个超简单的后台管理系统。

cpms-php是采用TP5.0开发的一个简单的后台脚手架管理系统（包括前台展示和后台管理部分）。主要模块有：用户登入验证、后台管理员增删改查、文章发布、RBAC权限管理、socketIO在线即时聊天

本项目适合学习TP5的新手做练手项目以及学习RBAC权限设计的知识，

该脚手架主要是用来提供学习TP5.0框架的相关知识点所开发的，所以后台系统并没有多少模块，但是涵盖的知识点比较全，
包括：TP5.0验证码的使用、TP5.0分页的使用、TP5.0图片上传的使用 以及常用的TP5全局函数的使用和封装了一些防止脚本攻击的过滤函数

脚手架使用的技术栈：

- UI模板使用h+admin V4.1.0  
- 密码验证采用第三方加密框架 PasswordHash
- 权限采用RBAC设计用户-角色-权限（资源）之间的关系
- 使用Workerman（socketIO）框架，实现聊天
- AJAX异步图片上传
- ......

后台访问地址：http://localhost/admin/index/index

后台帐号：admin 密码：123456

交流技术可以加本人QQ：1226740471 

*使用本脚手架可以快速搭建一个个人博客系统*

![image](https://github.com/gulang12/cpms-php/blob/master/public/static/images/bbbb.png)
![image](https://github.com/gulang12/cpms-php/blob/master/public/static/images/ccc.png)
![image](https://github.com/gulang12/cpms-php/blob/master/public/static/images/dddd.png)
![image](https://github.com/gulang12/cpms-php/blob/master/public/static/images/hhhhhhhhhh.png)

