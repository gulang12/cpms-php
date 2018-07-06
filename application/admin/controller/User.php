<?php
namespace app\admin\controller;

class User  extends AdminBase
{
   
    public function userList()   
    {
    	

        return $this->fetch();
    }

    public function userRole()   
    {
    	

        return $this->fetch();
    }

    public function roleAuth()   
    {
    
    
        include APP_PATH."admin/conf/menu.php";

        $this->assign("menu",$menu['admin']);	

        return $this->fetch();
    }


    public function addRoleAuth(){

        if(request()->isPost()) {

            $data = input();
            // $submit_time = ;
            echo microtime(); // 前部分为毫秒 后半部分为秒   用前后先加 就可以获取到当前时间精确到毫秒的时间戳 多次提交表单 时间差在1秒之内就提示

            $role_id      = $data["role_id"];
            $action       = $data['action'];

            return json(['code'=>1,'msg'=>'添加成功']);

        }
       
    }

}
