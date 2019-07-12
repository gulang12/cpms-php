<?php
namespace app\socket\controller;

use think\Controller;

use Workerman\Worker; //引入Worker类

use PHPSocketIO\SocketIO;//引入SocketIO类

/**
   Server.php主要用于开启workerman服务。
**/
class Server
{
    public function index()
    {

		require_once VENDOR_PATH.'/socket/autoload.php';
		
		//创建socket.io服务端，监听3120端口
		$io = new SocketIO(3120);
		
		/**
			这部分主要是用来接收前端页面发送过来的信息，以及服务端推送信息给前端的逻辑处理部分。
			我们可以利用这部分来做一个即时聊天的模块

			【注：客户端与服务端连接成功后，服务端会返回一个sid的值，相当于sessionID，这样每次客户端请求服务端的时候
			会携带这个sid值，服务端通过sid判断这个是哪个客户端发来的信息。并且还可以获取到客户端保存在服务端的信息】

		*/
		// 当有客户端连接时触发，连接成功后，默认触发客户端的connect事件
        $io->on('connection', function($socket)use($io){
          	//由于session信息是保存在Apache服务端的，所以在workerman服务端不能获取到session信息

        	$socket->on("user_online",function($user)use($socket){
        		global $onlineUsers;//数组保存在线用户,只要服务不重启，数据会一直保存在内存中

        		//加入分组 (利用组名可以实现群聊,可以用uid作为组名，这样的话每个用户都有自己的一个组，可以实现给指定用户发信息)
        		$group_name = $user["uId"];

	       	    $socket->join($group_name); 

	            $socket->uid       = $user["uId"];
	            $socket->uName     = $user["uName"];  
	            $socket->uPortrait = $user["uPortrait"];  

	            $socket->broadcast->emit('online_notice',$user); //向除了当前连接的所有客户端发送信息

	            $socket->emit('current_online_notice',$onlineUsers); // 向当前客户端发送事件

	            $onlineUsers[$user["uId"]]= $user;
	            // $io->emit('online_notice', $user); // 向所有客户端发送事件
	            //$io->to($group_name)->emit('send to me', 'wo shi'.$uid); // 发送给指定的用户组        
        	});

            //接收来自客户端的信息，实现聊天的功能
            $socket->on('send_msg_to_server', function($msg)use($socket){
              
	            // 触发所有客户端定义了get_msg_from_server事件发送信息

	            $socket->broadcast->emit('get_msg_from_server',array(

	            	"from_msg"       => $msg,
	            	"from_uname"     => $socket->uName,
	            	"from_uportrait" => $socket->uPortrait,
	        	));

            });

            //用户登入后加入分组，方便后续消息推送
            $socket->on('user_login', function($uid)use($socket){
              
	           $socket->join($uid); 

            });

            //客户端离线默认触发此事件
            $socket->on('disconnect', function()use($socket){
	        	global $onlineUsers;
	        	$leaf = $socket->uid; // 获取当前离线的用户UID
	        	unset($onlineUsers[$leaf]);
	        	$socket->broadcast->emit('off_line_notice', $leaf);
	        });

        });

       


        /*******************【上下两个模块其实是两个不相干的部分】*****************/
        
        /*
         *phpsocket.io提供了workerStart事件回调，也就是当进程启动后准备好接受客户端链接时触发的回调。  
         *一个进程生命周期只会触发一次。可以在这里设置一些全局的事情，比如开一个新的Worker端口、连接redis数据库，初始化全局变量等等。
        */
        $io->on('workerStart', function()use($io){  

		    // 监听一个http端口，我们可以利用这个端口，实现在项目某个环节把数据提交到这里处理(curl_init模拟表单提交数据)，比如在项目的评论模块，当我们提交评论成功后，然后服务端发送消息给指定人已作提醒。
        	// 0.0.0.0 表示本机所有的IP都会监听3121端口。比如：http://127.0.0.1:3121 或 http://10.81.200.193:3121
		    
		    $inner_http_worker = new Worker('http://0.0.0.0:3121');

		    // 当http客户端发来数据时触发(调用接口请求时触发)
		    $inner_http_worker->onMessage = function($http_connection, $data)use($io){
		    	
		    	switch($_POST['type']){
		    		case 'public': // 推送公共信息到所有客户端
		    		$to = $_POST['to'];
		    		$_POST['content'] = htmlspecialchars($_POST['content']);
		                   // 有指定uid则向uid所在socket组发送数据
		    		if($to){

		    			$io->to($to)->emit('push_msg_client',$_POST['content']);

		    		}else{

		    			$io->emit('push_msg_client',$_POST['content']);
		    		}

		    		break;
		    	}

		        return $http_connection->send('connection ok');  // 返回给客户端的信息(客户端指使用curl_init提交数据的地方)
		    };
		    // 执行监听
		    $inner_http_worker->listen();
		});

        Worker::runAll();
    }

}
