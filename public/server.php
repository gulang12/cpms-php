<?php
// +----------------------------------------------------------------------
// |  [ 开启phpsocket.io 的 workman服务 文件 ]
// +----------------------------------------------------------------------
// | Author: liu zai chun 122674047@qq.com
// +----------------------------------------------------------------------

// [ 开启phpsocket.io 的 workman服务 文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

//绑定socketio模块下的Server控制器(Server.php)

define('BIND_MODULE','socket/Server');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
