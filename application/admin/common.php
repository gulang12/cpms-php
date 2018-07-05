<?php
// +----------------------------------------------------------------------
// | des: admin应用模块的公共函数文件
// +----------------------------------------------------------------------
// | Author: liu <1226740471@qq.com>
// +----------------------------------------------------------------------

/**
  【des:检测用户权限】
* @param $action  模块/控制器/操作
* @param return   true or false 
**/
function check_auth($action){
    
    $roleAuth = array('admin/User','admin/User/userList'); //角色保存的权限数据
    
    if(in_array($action,$roleAuth)) 

    	return true;
    else 
    	return false;
}




?>