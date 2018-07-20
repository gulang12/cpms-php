<?php
namespace app\admin\controller;

class User  extends AdminBase
{
   
    public function userList()   
    {
    	
        
        $users =  model('User')->getUsers();

        $this->assign("users",$users);
        
        return $this->fetch();
    }

    public function addUser(){
        // $input = input();

        $input = array(
            'user_login'  =>  'thinkphp',
            'email' =>  'thinkphp@qq.com',
            'user_phone' =>  '1226740471'
        );

        $info =  model('User')->addUser($input);
        
        print_r($info);
        exit;
        return json(['code'=>1,'msg'=>'添加成功']);

    }
    
    public function delUser(){
        
        $userId = 3;
        $info   =  model('User')->delUser($userId);
        
        print_r($info);
        exit;
        return json(['code'=>1,'msg'=>'添加成功']);
        
    }
    
    public function updateUser(){
        $input = array(
            'user_login'  =>  'admin5555',
            'email' =>  'thinkphp@qq.com',
            'user_phone' =>  '15889745718'
        );
        $userId = 4;
        $info   =  model('User')->updateUser($input,$userId);
        
        print_r($info);
        exit;
        return json(['code'=>1,'msg'=>'添加成功']);
        
    }

    
}
