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
function check_auth($action){
    
    include APP_PATH."admin/conf/menu.php";  // 后台菜单

    $role_id  = session("role_id");

    $roleAuth = db('role')->where("role_id",$role_id)->column('role_auth');

    
    
    // $roleAuth = array('admin/User','admin/User/userList'); //角色保存的权限数据
    
    // if(in_array($action,$roleAuth)) 

    // 	return true;
    // else 
    // 	return false;

    	return true;
}





?>