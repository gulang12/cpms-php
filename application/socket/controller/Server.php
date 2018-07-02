<?php
namespace app\socket\controller;

use think\Controller;

use Workerman\Worker; //引入Worker类

use PHPSocketIO\SocketIO;//引入SocketIO类

/**
   Server.php主要用于开启workerman服务。
**/
class Server extends Controller   
{
    public function index()
    {

    	require_once VENDOR_PATH.'/socket/autoload.php';
		
		//创建socket.io服务端，监听3120端口
		$io = new SocketIO(3120);
		
		// 当有客户端连接时触发
        $io->on('connection', function($socket)use($io){
           // 定义chat message事件回调函数
            $socket->on('login', function($uid)use($io,$socket){

           	    $ug = (string)$uid;

           	    $socket->join($ug);  // 加入分组 (其实分组名里面只有对应的uid一个元素，这样可以实现给指定用户发送信息)
           	   
                $socket->uid = $uid; 
	            // 触发所有客户端定义的all login user事件
           	    // $socket->id 生成一个唯一的socket id
	            $io->emit('all login user', $socket->uid);

	            // $io->to($ug)->emit('send to me', 'wo shi'.$uid); // 发送给指定的用户组

            });

            $socket->on('chat message', function($msg)use($io){
              
	            // 触发所有客户端定义了chat message from server事件发送信息
	            $io->emit('chat message from server', '来自socket model index page');

            });

        });

        
        // 当$io启动后监听一个http端口，监听的是通过API推送的信息
        $io->on('workerStart', function()use($io){  
		    // 监听一个http端口
		    $inner_http_worker = new Worker('http://0.0.0.0:2121');  // 要与客户端通过API发送过来的http端口127.0.0.1区分开来

		    // 当http客户端发来数据时触发(调用接口请求时触发)
		    $inner_http_worker->onMessage = function($http_connection, $data)use($io){
		    	
		    	switch(@$_POST['type']){
		    		case 'publish':
		    		$to = @$_POST['to'];
		    		$_POST['content'] = htmlspecialchars(@$_POST['content']);
		                   // 有指定uid则向uid所在socket组发送数据
		    		if($to){
		    			$io->to($to)->emit('new_msg','这条信息是给222的');

		                    // 否则向所有uid推送数据
		    		}else{

		    			$io->emit('new_msg', @$_POST['content']);
		    		}

		    		break;
		    	}

		        return $http_connection->send('返回给客户端的信息');  // 返回给客户端的信息
		    };
		    // 执行监听
		    $inner_http_worker->listen();
		});

        Worker::runAll();
    }

}
