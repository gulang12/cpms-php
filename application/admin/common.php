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

?>