<?php
// +----------------------------------------------------------------------
// | des: admin应用模块的公共函数文件
// +----------------------------------------------------------------------
// | Author: liu <1226740471@qq.com>
// +----------------------------------------------------------------------

/**
  【des:检测用户权限】
* @param $action  模块/控制器/操作
* return boolean   true or false 
**/
function check_auth($action=''){
    
    include APP_PATH."admin/conf/menu.php";  // 后台菜单
    
    $role_id  = session("user_role");

    if($role_id == 1) { // 超级管理员
        
        return true;
    }

    $roleAuth = db('role')->where("role_id",$role_id)->column('role_auth');

    $roleAuth = explode(",",$roleAuth[0]);

    if(in_array($action,$roleAuth)) 

    	return true;
    else 
    	return false;
}


/**
  【des:防止表单在极短时间重复提交】
* return boolean   true or false 
**/
function repeatSubmitLimit() {

  // microtime()前部分为毫秒 后半部分为秒   用前后先加 就可以获取到当前时间
    // 精确到毫秒的时间戳 多次提交表单 时间差在1秒之内就提示
    $submit_time = explode(' ', microtime());
    $submit_time = ($submit_time[0]/1000)+$submit_time[1];
    
    // 防止表单在极短时间重复提交  （有些强迫症患者提交按钮时喜欢快速点击两次）
    if(!Session('submit_time')) {

        Session('submit_time',$submit_time);
        
         // to do thomthing

    }else{

        $session_submit_time = Session('submit_time');

        if(($submit_time - $session_submit_time) < 1)  

            return json(['code'=>1,'msg'=>'不要重复提交表单']);
        else

            Session('submit_time',$submit_time); // 刷新session值
            
            // to do
    }
}

/**
  【des:获取登入用户信息】
*  @param  $field  用户字段  默认为空则获取用户所有字段信息
*  return  string
**/
function getLoginUserInfo($field='') {
    
    $user_id  = session('user_id');
    
    if($field=='user_id') {
        return $user_id;
    }
    
    if($field) {
        $fieldInfo = db('user')->where("user_id",$user_id)->column($field);

        return $fieldInfo[0];

    }else{
        
        $allFieldInfo = db('user')->where("user_id",$user_id)->select();

        $allFieldInfo = collection($allFieldInfo)->toArray();

        return $allFieldInfo;
    }
}

/**
 * 【模拟提交参数，支持https提交 可用于各类api请求】
 * @param string $url ： 提交的地址
 * @param array $data :  POST数组（post请求需要传数组参数）
 * @param string $method : POST/GET，默认GET方式（参数直接拼接在$url上）
 * @return mixed
 */
function httpRequest($url, $data='', $method='GET'){ 
	$curl = curl_init(); // 启动一个CURL会话
	curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
	curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
	if($method=='POST'){
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
		if ($data != ''){
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
		}
	}
	curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
	curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
	$tmpInfo = curl_exec($curl); // 执行操作
	curl_close($curl); // 关闭CURL会话
	return $tmpInfo; // 返回数据
}

/**
   *模拟表单提交信息到socket服务，socket服务在推送到指定客户端，
   *@param  $postData 数组  推送的信息 
   // array(
   //     "type" => $type,   // 推送信息类型
   //     "content"=>$content, // 推送信息内容
   //     "to"=>$to          // 推送给指定的组/人
   // ) 
*/
function sendToSocketServer($postData) {

    //利用API推送信息给socket服务器  推送的url地址，使用自己的服务器地址
    $push_api_url = "http://127.0.0.1:3121";  // 这个要与服务端的 new Worker('http://0.0.0.0:2121')做区分
   
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postData );
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
    $return = curl_exec ( $ch );
    curl_close ( $ch );
    var_dump($return);
}

?>
