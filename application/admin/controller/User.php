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

}
