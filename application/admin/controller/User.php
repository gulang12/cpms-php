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
    	

        return $this->fetch();
    }
}
