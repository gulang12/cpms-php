<?php
namespace app\admin\controller;

use app\common\util\PasswordHash;
class User  extends AdminBase
{
   
    public function userList()   
    {
    	
        
        $users =  model('User')->getUsers();

        $this->assign("users",$users);

        return $this->fetch();
    }

    public function addUser(){

        
        $input = input();

        $info  =  model('User')->addUser($input);
       
        return $info;
    }
    
    public function delUser(){
        
        $userId = 3;
        $info   =  model('User')->delUser($userId);
        
        print_r($info);
        exit;
        return json(['code'=>1,'msg'=>'添加成功']);
        
    }
    
    public function updateUser(){
        
        if(request()->isPost()) {
           
            $input  = input();
           
             
            $info   = model('User')->updateUser($input,$userId);
            
           
            exit;
            return json(['code'=>1,'msg'=>'添加成功']);
        
        }
        
    }

    
}
