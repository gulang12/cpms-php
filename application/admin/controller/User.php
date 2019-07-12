<?php
namespace app\admin\controller;

use app\common\util\PasswordHash;
class User  extends AdminBase
{
   
    public function userList()   
    {
    	
        
        $users =  model('User')->getUserList();

        $this->assign("users",$users);

        return $this->fetch();
    }
    
    public function getUser() {
        $userId = input('param.user_id');

        $user   = model("User")->getUser($userId);
        
        return $user;
    }
    
    public function getRoles(){

        $roles  = model('Role')->getSelectRoles();

        return $roles ? json(['code'=>1,'roles'=>$roles,'msg'=>'获取数据成功']) : json(['code'=>0,'roles'=>'','msg'=>'获取数据成功']);
    }
    public function addUser(){
        
        $input = input();

        $info  =  model('User')->addUser($input);
        if($info) {
            $postData =  array(
               "type"     => "public", // 推送公共信息到所有客户端
               "content"  => "推送给uid:6的信息",
               "to"       => '',   // 给指定用户推送信息  to为组名即uid
            );

            sendToSocketServer($postData);
        }
        return $info;
    }
    
    public function delUser(){
        
        $userId = input('param.user_id');
        
        $info   =  model('User')->delUser($userId);
    
        return $info;
        
    }
    
    public function updateUser(){
           
        $input  = input();
         
        $info   = model('User')->updateUser($input);
        
        return $info;
      
    }

    
}
